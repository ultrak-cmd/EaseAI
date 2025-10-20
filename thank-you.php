<?php
$submitted = isset($_GET['submitted']) && $_GET['submitted'] === '1';
$firstName = trim((string)($_GET['first'] ?? ''));
$pageTitle = 'Thank You | TradeEase AI';
$metaDescription = 'Thank you for booking a personalized TradeEase AI demo. Discover what happens next and explore resources while our team prepares your walkthrough.';
$activeNav = '';
$pageClass = 'page-thank-you';

require __DIR__ . '/includes/layout-start.php';
?>
<section class="page-hero thank-you-hero">
    <div class="container">
        <div class="thank-you-intro" data-animate>
            <h1><?= $firstName !== '' ? 'Thank you, ' . htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') . '!' : 'Thank you for booking a demo!'; ?></h1>
            <p>We have received your request and one of our trading specialists will reach out within one business day to schedule your personalized platform walkthrough.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="resources.php">Explore Resources</a>
                <a class="btn btn-outline" href="platform.php">Preview the Platform</a>
            </div>
        </div>
    </div>
</section>
<section class="page-section thank-you-next">
    <div class="container">
        <div class="thank-you-summary" data-animate>
            <h2>What happens next</h2>
            <p>We coordinate every demo to match your goals, trading experience, and preferred markets. Here is what to expect in the coming hours.</p>
        </div>
        <div class="thank-you-steps">
            <article class="thank-you-step" data-animate>
                <span class="step-icon">1</span>
                <h3>Instant confirmation</h3>
                <p>Check your inbox for a confirmation email with a summary of your request and optional pre-demo resources tailored to your profile.</p>
            </article>
            <article class="thank-you-step" data-animate>
                <span class="step-icon">2</span>
                <h3>Specialist outreach</h3>
                <p>A senior consultant will contact you to coordinate timing, gather any additional requirements, and ensure the demo focuses on the markets you trade.</p>
            </article>
            <article class="thank-you-step" data-animate>
                <span class="step-icon">3</span>
                <h3>Live strategy review</h3>
                <p>During the session we showcase live automations, performance analytics, and answer technical, compliance, or integration questions from your team.</p>
            </article>
        </div>
    </div>
</section>
<section class="page-section thank-you-resources">
    <div class="container">
        <div class="thank-you-summary" data-animate>
            <h2>Prepare for your consultation</h2>
            <p>Accelerate the conversation by exploring these hand-picked materials while we finalize your demo slot.</p>
        </div>
        <div class="resource-list">
            <a class="resource-card" href="solutions.php" data-animate>
                <h3>Solution playbooks</h3>
                <p>Review how TradeEase AI supports hedge funds, proprietary desks, and emerging managers with tailored automation frameworks.</p>
                <span class="link-arrow">Explore playbooks →</span>
            </a>
            <a class="resource-card" href="pricing.php" data-animate>
                <h3>Investment plans</h3>
                <p>Compare deposit tiers, included services, and mentorship options so your stakeholders can align on the ideal package.</p>
                <span class="link-arrow">View pricing →</span>
            </a>
            <a class="resource-card" href="resources.php" data-animate>
                <h3>Insights library</h3>
                <p>Access strategy briefs, compliance guides, and performance benchmarks to share internally before we connect.</p>
                <span class="link-arrow">Browse insights →</span>
            </a>
        </div>
    </div>
</section>
<?php if ($submitted && $googleAdsConversionSendTo !== ''): ?>
    <script>
        window.addEventListener('load', function () {
            if (typeof gtag === 'function') {
                const conversionEvent = {
                    send_to: <?= json_encode($googleAdsConversionSendTo, JSON_UNESCAPED_SLASHES); ?>
                };
                <?php if ($googleAdsConversionValue !== ''): ?>
                conversionEvent.value = <?= json_encode((float) $googleAdsConversionValue); ?>;
                <?php endif; ?>
                <?php if ($googleAdsConversionCurrency !== ''): ?>
                conversionEvent.currency = <?= json_encode($googleAdsConversionCurrency); ?>;
                <?php endif; ?>
                gtag('event', 'conversion', conversionEvent);
            }
        });
    </script>
<?php endif; ?>
<?php
require __DIR__ . '/includes/layout-end.php';
