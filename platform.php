<?php
$pageTitle = 'TradeEase AI Platform Overview';
$metaDescription = 'Discover the TradeEase AI platform capabilities including live data, automation, analytics, and enterprise-grade controls.';
$activeNav = 'platform';
$pageClass = 'page-platform';

require __DIR__ . '/includes/layout-start.php';
?>
<section class="page-hero">
    <div class="container">
        <div>
            <h1>Performance engineered for market leadership</h1>
            <p>TradeEase AI brings enterprise-grade infrastructure, intelligent automation, and intuitive design together so you can execute strategies with speed and confidence.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="#capabilities">Platform capabilities</a>
                <a class="btn btn-outline" href="index.php#demo-form">Request demo</a>
            </div>
        </div>
        <div class="badge-list" data-animate>
            <span class="badge">99.98% platform uptime</span>
            <span class="badge">Sub-50ms order routing</span>
            <span class="badge">Global market connectivity</span>
            <span class="badge">24/7 surveillance</span>
        </div>
    </div>
</section>
<section class="page-section" id="capabilities">
    <div class="container">
        <div class="section-header">
            <h2>Core capabilities</h2>
            <p>Modular systems that adapt to your execution style and governance requirements.</p>
        </div>
        <div class="card-grid">
            <div class="card" data-animate>
                <h3>Market Intelligence</h3>
                <p>Consolidated Level I/II data feeds, sentiment scoring, and volatility forecasting accessible in a single console.</p>
                <div class="stat-bar"><span style="width: 92%"></span></div>
            </div>
            <div class="card" data-animate>
                <h3>Autonomous Execution</h3>
                <p>AI strategies monitor microstructure signals and execute across venues with adaptive slippage protection.</p>
                <div class="stat-bar"><span style="width: 89%"></span></div>
            </div>
            <div class="card" data-animate>
                <h3>Portfolio Intelligence</h3>
                <p>360° risk, performance attribution, and scenario modeling provide a control tower for every account.</p>
                <div class="stat-bar"><span style="width: 95%"></span></div>
            </div>
        </div>
    </div>
</section>
<section class="page-section">
    <div class="container detail-grid">
        <div class="card" data-animate>
            <h3>Execution cockpit</h3>
            <p>Coordinate discretionary and automated flows from a configurable cockpit featuring algorithm selection, routing preferences, and risk overrides. Multi-screen layouts support trader workflows from monitoring to intervention.</p>
            <ul class="insight-list">
                <li>Smart order router with liquidity heatmaps</li>
                <li>Shadow mode for forward-testing strategies</li>
                <li>Automated hedging triggers based on VaR limits</li>
            </ul>
        </div>
        <div class="card" data-animate>
            <h3>Live diagnostics</h3>
            <p>Operational dashboards provide latency, fill ratios, and market impact metrics so you can act before issues escalate.</p>
            <div class="insight-metrics">
                <div>
                    <span class="metric-label">Average latency</span>
                    <span class="metric-value">42ms</span>
                </div>
                <div>
                    <span class="metric-label">Order success</span>
                    <span class="metric-value">99.4%</span>
                </div>
                <div>
                    <span class="metric-label">Strategies live</span>
                    <span class="metric-value">68</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section">
    <div class="container detail-grid">
        <div data-animate>
            <h2>Governance without friction</h2>
            <p>Enterprise administrators can define guardrails across desks, strategies, and jurisdictions while traders operate with clarity.</p>
            <div class="timeline">
                <div class="timeline-step">
                    <h4>Role-based controls</h4>
                    <p>Granular entitlements with 2FA enforcement and optional biometric verification.</p>
                </div>
                <div class="timeline-step">
                    <h4>Policy automation</h4>
                    <p>Pre-trade checks, AML/KYC verification, and regulatory reporting handled automatically.</p>
                </div>
                <div class="timeline-step">
                    <h4>Audit and recovery</h4>
                    <p>Immutable audit logs with export-ready packages for MiFID II, FINRA, and FCA reporting.</p>
                </div>
            </div>
        </div>
        <div class="card" data-animate>
            <h3>Deployment options</h3>
            <p>Select the infrastructure that meets your latency, security, and residency requirements.</p>
            <ul class="insight-list">
                <li>Private cloud with dedicated hardware acceleration</li>
                <li>On-premise deployment with VPN-backed connectivity</li>
                <li>Hybrid approach with sovereign data residency</li>
            </ul>
            <div class="hero-actions">
                <a class="btn btn-primary" href="solutions.php">Explore solutions</a>
                <a class="btn btn-outline-dark" href="resources.php#integrations">Integration partners</a>
            </div>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/includes/layout-end.php';
