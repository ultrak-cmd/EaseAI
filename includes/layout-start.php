<?php
$config = [];
$configPath = __DIR__ . '/config.php';
if (is_readable($configPath)) {
    $config = require $configPath;
}
if (!is_array($config)) {
    $config = [];
}

$googleAnalyticsMeasurementId = $googleAnalyticsMeasurementId
    ?? trim((string)($config['google_analytics_measurement_id'] ?? ''));
$googleAdsConversionId = $googleAdsConversionId
    ?? trim((string)($config['google_ads_conversion_id'] ?? ''));
$googleAdsConversionLabel = $googleAdsConversionLabel
    ?? trim((string)($config['google_ads_conversion_label'] ?? ''));
$googleAdsConversionValue = $googleAdsConversionValue
    ?? trim((string)($config['google_ads_conversion_value'] ?? ''));
$googleAdsConversionCurrency = $googleAdsConversionCurrency
    ?? trim((string)($config['google_ads_conversion_currency'] ?? 'GBP'));

if (!isset($googleAdsConversionSendTo)) {
    $googleAdsConversionSendTo = '';
    if ($googleAdsConversionId !== '') {
        $googleAdsConversionSendTo = $googleAdsConversionId;
        if ($googleAdsConversionLabel !== '') {
            $googleAdsConversionSendTo .= '/' . $googleAdsConversionLabel;
        }
    }
}

$googleTagIds = array_values(array_filter([
    $googleAnalyticsMeasurementId,
    $googleAdsConversionId,
]));

if (!isset($pageTitle)) {
    $pageTitle = 'TradeEase AI | Institutional-Grade Automated Trading';
}
if (!isset($metaDescription)) {
    $metaDescription = 'TradeEase AI delivers institutional-grade automated trading with AI strategies, risk controls, and personalized support.';
}
if (!isset($activeNav)) {
    $activeNav = 'home';
}
$navItems = [
    ['id' => 'home', 'label' => 'Home', 'href' => 'index.php'],
    ['id' => 'platform', 'label' => 'Platform', 'href' => 'platform.php'],
    ['id' => 'solutions', 'label' => 'Solutions', 'href' => 'solutions.php'],
    ['id' => 'pricing', 'label' => 'Pricing', 'href' => 'pricing.php'],
    ['id' => 'resources', 'label' => 'Resources', 'href' => 'resources.php'],
    ['id' => 'company', 'label' => 'Company', 'href' => 'company.php'],
    ['id' => 'contact', 'label' => 'Contact', 'href' => 'contact.php'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <?php if (!empty($googleTagIds)): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?= rawurlencode($googleTagIds[0]); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            <?php foreach ($googleTagIds as $tagId): ?>
            gtag('config', <?= json_encode($tagId, JSON_UNESCAPED_SLASHES); ?>);
            <?php endforeach; ?>
        </script>
    <?php endif; ?>
</head>
<body class="<?= isset($pageClass) ? htmlspecialchars($pageClass, ENT_QUOTES, 'UTF-8') : ''; ?>">
    <div class="page-wrapper">
        <div class="announcement-bar">
            <span>New</span>
            <p>TradeEase AI achieves <strong>87% win rate</strong> benchmarked against Q1 market volatility.</p>
        </div>
        <header class="header" data-header>
            <div class="header-container">
                <a class="logo-container" href="index.php">
                    <div class="logo-icon">TE</div>
                    <div class="logo-text">TradeEase<span>AI</span></div>
                </a>
                <nav class="nav" data-nav>
                    <ul class="nav-menu">
                        <?php foreach ($navItems as $item): ?>
                            <?php $isActive = $activeNav === $item['id'] ? 'is-active' : ''; ?>
                            <li class="nav-item <?= $isActive; ?>">
                                <a href="<?= htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="btn btn-demo" href="index.php#demo-form">Book Demo</a>
                </nav>
                <button class="nav-toggle" data-nav-toggle aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </header>
        <main class="page-content">
