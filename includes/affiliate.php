<?php
declare(strict_types=1);

/**
 * Wolf Pro and Affise integration helpers for the TradeEase landing experience.
 * This file mirrors the behaviour of the provided WordPress implementation without
 * relying on any WP-specific functions.
 */

if (!function_exists('tradeease_sanitize_text_field')) {
    function tradeease_sanitize_text_field(?string $value): string
    {
        if ($value === null) {
            return '';
        }
        $value = strip_tags($value);
        $value = preg_replace('/[\r\n\t]+/u', ' ', $value ?? '') ?? '';
        return trim($value);
    }
}

if (!function_exists('tradeease_sanitize_email')) {
    function tradeease_sanitize_email(?string $value): string
    {
        if ($value === null) {
            return '';
        }
        $value = filter_var($value, FILTER_SANITIZE_EMAIL);
        return $value !== false ? trim($value) : '';
    }
}

function tradeease_generate_wolf_pro_password(int $length = 12): string
{
    $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789!@#$%';
    $maxIndex = strlen($alphabet) - 1;
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $alphabet[random_int(0, $maxIndex)];
    }
    return $password;
}

function tradeease_submit_wolf_pro_lead(array $form_data, array $config): array
{
    $affise_clickid = tradeease_sanitize_text_field($form_data['affise_clickid'] ?? ($form_data['clickid'] ?? ''));
    $pid = tradeease_sanitize_text_field($form_data['pid'] ?? '');
    $offer_id = tradeease_sanitize_text_field($form_data['offer_id'] ?? '');

    $sub1 = tradeease_sanitize_text_field($form_data['sub1'] ?? '');
    $sub2 = tradeease_sanitize_text_field($form_data['sub2'] ?? '');
    $sub3 = tradeease_sanitize_text_field($form_data['sub3'] ?? '');
    $sub4 = tradeease_sanitize_text_field($form_data['sub4'] ?? '');
    $sub5 = tradeease_sanitize_text_field($form_data['sub5'] ?? '');

    error_log("Affise: clickid={$affise_clickid}, pid={$pid}, offer_id={$offer_id}");
    error_log("Wolf Pro mapping: sub1={$sub1} (aff_sub), sub2={$sub2} (aff_sub2)");

    $first_name = tradeease_sanitize_text_field($form_data['first_name'] ?? '');
    $last_name = tradeease_sanitize_text_field($form_data['last_name'] ?? '');
    $email = tradeease_sanitize_email($form_data['email'] ?? '');

    $country_code = tradeease_sanitize_text_field($form_data['country_code'] ?? '');
    $raw_phone = tradeease_sanitize_text_field($form_data['phone_number'] ?? ($form_data['phone'] ?? ''));

    error_log("Phone input: raw='{$raw_phone}', country='{$country_code}'");

    $phone = '';
    if ($raw_phone !== '') {
        if ($country_code === '') {
            error_log('Parsing phone in PHP');
            if (preg_match('/^\+44(\d{10,11})$/', $raw_phone, $m)) {
                $country_code = '+44';
                $phone = $m[1];
                if (strlen($phone) === 11 && $phone[0] === '0') {
                    $phone = substr($phone, 1);
                }
            } elseif (preg_match('/^\+1(\d{10})$/', $raw_phone, $m)) {
                $country_code = '+1';
                $phone = $m[1];
            } elseif (preg_match('/^\+49(\d{10,11})$/', $raw_phone, $m)) {
                $country_code = '+49';
                $phone = $m[1];
            } elseif (preg_match('/^\+33(\d{9})$/', $raw_phone, $m)) {
                $country_code = '+33';
                $phone = $m[1];
            } elseif (preg_match('/^\+(\d{1,4})(\d{6,})$/', $raw_phone, $m)) {
                $country_code = '+' . $m[1];
                $phone = $m[2];
            } else {
                $country_code = '+44';
                $phone = preg_replace('/\D/', '', $raw_phone);
                if ($phone !== '' && $phone[0] === '0') {
                    $phone = substr($phone, 1);
                }
            }
        } else {
            if (strpos($raw_phone, $country_code) === 0) {
                $phone = substr($raw_phone, strlen($country_code));
            } else {
                $phone = preg_replace('/\D/', '', $raw_phone);
            }
            if ($country_code === '+44' && $phone !== '' && $phone[0] === '0') {
                $phone = substr($phone, 1);
            }
        }
    }

    if ($country_code === '') {
        $country_code = '+44';
    }
    if ($phone === '') {
        $phone = preg_replace('/\D/', '', $raw_phone);
        if ($country_code === '+44' && $phone !== '' && $phone[0] === '0') {
            $phone = substr($phone, 1);
        }
    }
    $phone = preg_replace('/\D/', '', $phone);

    error_log("Phone final: country='{$country_code}', local='{$phone}'");

    if (strlen($phone) < 6) {
        error_log('Phone too short: ' . $phone);
        return ['success' => false, 'message' => 'Please enter a valid phone number'];
    }

    if (!preg_match('/^\+\d{1,4}$/', $country_code)) {
        error_log('Invalid country code: ' . $country_code);
        $country_code = '+44';
    }

    $namePattern = '/^\p{L}{2,}(?:[ \'-]\p{L}{2,})*$/u';
    if (!preg_match($namePattern, $first_name) || !preg_match($namePattern, $last_name)) {
        error_log('Name validation failed');
        return ['success' => false, 'message' => 'Names must contain only letters (min 2 chars)'];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        error_log('Email validation failed: ' . $email);
        return ['success' => false, 'message' => 'Please enter a valid email address'];
    }

    $password = tradeease_generate_wolf_pro_password();

    $wolf_token = (string)($config['wolfpro_token'] ?? '');
    $wolf_affid = (string)($config['wolfpro_affid'] ?? '396');
    $wolf_funnel = (string)($config['wolfpro_funnel'] ?? 'cryptocfdtrader');

    $wolf_data = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => $password,
        'funnel' => $wolf_funnel,
        'source' => $form_data['source'] ?? ($_SERVER['HTTP_HOST'] ?? ''),
        'area_code' => $country_code,
        'phone' => $phone,
        'aff_sub' => $sub1 !== '' ? $sub1 : 'direct',
        'aff_sub2' => $sub2 !== '' ? $sub2 : 'none',
        'aff_sub3' => $offer_id !== '' ? $offer_id : 'none',
        'aff_sub4' => $pid !== '' ? $pid : 'none',
        'aff_sub5' => $affise_clickid !== '' ? $affise_clickid : 'none',
        'affid' => $wolf_affid !== '' ? $wolf_affid : '396',
        '_ip' => $_SERVER['HTTP_X_FORWARDED_FOR'] ?? ($_SERVER['REMOTE_ADDR'] ?? ''),
        'hitid' => uniqid('wp_', true),
    ];

    error_log('Sending to Wolf Pro: ' . json_encode($wolf_data));

    $response = tradeease_http_post('https://api.proapi.org/leads', $wolf_data, 30);
    if ($response['error']) {
        error_log('Wolf Pro connection error: ' . $response['error']);
        return ['success' => false, 'message' => 'Connection failed: ' . $response['error']];
    }

    $response_code = $response['status'] ?? 0;
    $response_body = $response['body'] ?? '';

    error_log('Wolf Pro Response: ' . $response_code);
    error_log('Wolf Pro Body: ' . $response_body);

    $wolf_response_data = json_decode($response_body, true);

    if ($response_code === 200 || $response_code === 201) {
        error_log('Wolf Pro submission successful');

        if ($affise_clickid !== '') {
            $affise_postback = [
                'clickid' => $affise_clickid,
                'action_id' => (string)($config['affise_registration_action_id'] ?? '1'),
                'status' => '1',
            ];
            $affise_url = rtrim((string)($config['affise_postback_base_url'] ?? ''), '?') . '?' . http_build_query($affise_postback);
            error_log('Affise registration postback: ' . $affise_url);
            tradeease_http_get($affise_url, 10);
        }

        $tracking_data = [
            'email' => strtolower(trim($email)),
            'affise_clickid' => $affise_clickid,
            'pid' => $pid,
            'offer_id' => $offer_id,
            'sub1' => $sub1,
            'sub2' => $sub2,
            'sub3' => $sub3,
            'sub4' => $sub4,
            'sub5' => $sub5,
        ];

        return [
            'success' => true,
            'message' => 'Lead submitted successfully',
            'password' => $password,
            'country_code' => $country_code,
            'local_phone' => $phone,
            'wolf_response' => $wolf_response_data,
            'tracking' => $tracking_data,
        ];
    }

    error_log('Wolf Pro submission failed: ' . $response_code);
    return [
        'success' => false,
        'message' => 'Submission failed',
        'code' => $response_code,
        'error' => $response_body,
    ];
}

function tradeease_http_post(string $url, array $payload, int $timeout = 30): array
{
    $ch = curl_init($url);
    if ($ch === false) {
        return ['status' => 0, 'body' => null, 'error' => 'Unable to initialise cURL'];
    }

    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => http_build_query($payload),
        CURLOPT_TIMEOUT => $timeout,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
    ]);

    $body = curl_exec($ch);
    $error = curl_errno($ch) ? curl_error($ch) : '';
    $status = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'status' => $status,
        'body' => $body,
        'error' => $error,
    ];
}

function tradeease_http_get(string $url, int $timeout = 30): array
{
    $ch = curl_init($url);
    if ($ch === false) {
        return ['status' => 0, 'body' => null, 'error' => 'Unable to initialise cURL'];
    }

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => $timeout,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_HTTPHEADER => ['Accept: application/json, */*'],
    ]);

    $body = curl_exec($ch);
    $error = curl_errno($ch) ? curl_error($ch) : '';
    $status = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'status' => $status,
        'body' => $body,
        'error' => $error,
    ];
}

