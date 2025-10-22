<?php
declare(strict_types=1);

$root = dirname(__DIR__);
require $root . '/includes/affiliate.php';

$config = require $root . '/includes/config.php';
if (!is_array($config)) {
    $config = [];
}

$result = tradeease_check_pending_ftds_with_postback($config);

echo "Processed leads: {$result['processed']}\n";
echo "FTDs found: {$result['ftd_found']}\n";
echo "Remaining pending: {$result['remaining']}\n";
if (!empty($result['errors'])) {
    echo "Errors:\n";
    foreach ($result['errors'] as $error) {
        echo " - {$error}\n";
    }
}
