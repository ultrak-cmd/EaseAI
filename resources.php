<?php
$pageTitle = 'TradeEase AI Resources';
$metaDescription = 'Access the TradeEase AI academy, insights, integrations, and support resources.';
$activeNav = 'resources';
$pageClass = 'page-resources';

require __DIR__ . '/includes/layout-start.php';
?>
<section class="page-hero">
    <div class="container">
        <div>
            <h1>Knowledge to accelerate every trading decision</h1>
            <p>Empower your team with insights, education, and integration guides curated by TradeEase AI experts.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="#academy">Explore academy</a>
                <a class="btn btn-outline" href="#support">Get support</a>
            </div>
        </div>
        <div class="badge-list" data-animate>
            <span class="badge">Weekly market outlooks</span>
            <span class="badge">200+ tutorial videos</span>
            <span class="badge">Integration blueprints</span>
        </div>
    </div>
</section>
<section class="page-section" id="academy">
    <div class="container">
        <div class="section-header">
            <h2>TradeEase Academy</h2>
            <p>Structured learning paths help traders adopt AI-driven workflows with confidence.</p>
        </div>
        <div class="resource-grid">
            <div class="resource-card" data-animate>
                <h3>Foundations</h3>
                <p>Understand AI trading fundamentals, risk management, and platform navigation.</p>
                <a class="link-arrow" href="#">Start foundation track →</a>
            </div>
            <div class="resource-card" data-animate>
                <h3>Strategy Labs</h3>
                <p>Deep dives into macro, swing, and intraday models with downloadable templates.</p>
                <a class="link-arrow" href="#">View labs calendar →</a>
            </div>
            <div class="resource-card" data-animate>
                <h3>Executive Briefings</h3>
                <p>Quarterly reports and webinars covering market regimes, regulation, and portfolio themes.</p>
                <a class="link-arrow" href="#">Access latest briefing →</a>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="insights">
    <div class="container">
        <div class="section-header">
            <h2>Market insights</h2>
            <p>Stay ahead with curated intelligence produced by our quant research desk.</p>
        </div>
        <div class="resource-grid">
            <div class="resource-card" data-animate>
                <h3>AI Volatility Monitor</h3>
                <p>Weekly digest of cross-asset volatility regimes with actionable adjustments.</p>
                <span class="badge">Updated Mondays</span>
            </div>
            <div class="resource-card" data-animate>
                <h3>Macro Heatmap</h3>
                <p>Interactive dashboard combining macroeconomic indicators with AI sentiment scoring.</p>
                <span class="badge">Pro tier</span>
            </div>
            <div class="resource-card" data-animate>
                <h3>Quant Perspectives Podcast</h3>
                <p>Interviews with industry leaders on algorithmic innovation, risk, and automation.</p>
                <span class="badge">New episodes bi-weekly</span>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="integrations">
    <div class="container detail-grid">
        <div data-animate>
            <h2>Integration ecosystem</h2>
            <p>Certified connections with brokers, OMS/EMS platforms, and data providers ensure a seamless workflow.</p>
            <div class="integration-logos">
                <span>MetaTrader</span>
                <span>cTrader</span>
                <span>Interactive Brokers</span>
                <span>TradingView</span>
                <span>Bloomberg</span>
                <span>Snowflake</span>
                <span>Salesforce</span>
            </div>
        </div>
        <div class="card" data-animate>
            <h3>Developer resources</h3>
            <ul class="insight-list">
                <li>REST &amp; WebSocket API references</li>
                <li>Sample bots in Python, Node.js, and C#</li>
                <li>Webhook playbooks for order and alert automation</li>
            </ul>
            <a class="btn btn-primary" href="#">Download SDK</a>
        </div>
    </div>
</section>
<section class="page-section" id="faq">
    <div class="container">
        <div class="section-header">
            <h2>Knowledge base</h2>
            <p>Answers and guidance for the most common platform questions.</p>
        </div>
        <div class="faq-accordion">
            <div class="faq-panel" data-animate>
                <h3>How do I connect my broker?</h3>
                <p>Use the integration wizard to authenticate via API keys or OAuth. Detailed guides cover each supported broker.</p>
            </div>
            <div class="faq-panel" data-animate>
                <h3>Where can I find release notes?</h3>
                <p>All platform updates are archived in the Release Center with change logs, rollout status, and replay webinars.</p>
            </div>
            <div class="faq-panel" data-animate>
                <h3>Is there a sandbox environment?</h3>
                <p>Yes. Launch a simulated environment with delayed market data and pre-funded demo capital to test automation.</p>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="support">
    <div class="container detail-grid">
        <div class="support-card" data-animate>
            <h2>Need assistance?</h2>
            <p>Our global support organization combines trading desks, technical engineers, and compliance specialists.</p>
            <ul>
                <li>24/5 trading desk with escalation to quant team</li>
                <li>Support center with SLAs and multilingual coverage</li>
                <li>Priority response for Professional and Enterprise plans</li>
            </ul>
            <div class="hero-actions">
                <a class="btn btn-primary" href="contact.php">Open support case</a>
                <a class="btn btn-outline" href="index.php#demo-form">Book demo</a>
            </div>
        </div>
        <div class="card" data-animate>
            <h3>Community channels</h3>
            <p>Join TradeEase AI community forums to collaborate with fellow traders, share strategies, and learn best practices.</p>
            <a class="link-arrow" href="#">Access community hub →</a>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/includes/layout-end.php';
