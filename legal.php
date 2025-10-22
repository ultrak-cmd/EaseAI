<?php
$pageTitle = 'TradeEase AI Legal Center';
$metaDescription = 'Review TradeEase AI terms of service, privacy commitments, and regulatory compliance overview.';
$activeNav = 'company';
$pageClass = 'page-legal';

require __DIR__ . '/includes/layout-start.php';
?>
<section class="page-hero" id="terms">
    <div class="container">
        <div>
            <h1>Legal transparency &amp; compliance</h1>
            <p>We operate with rigorous governance to protect client capital and data across every jurisdiction we serve.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="#privacy">Privacy policy</a>
                <a class="btn btn-outline" href="#compliance">Regulatory commitments</a>
            </div>
        </div>
        <div class="badge-list" data-animate>
            <span class="badge">SOC 2 aligned</span>
            <span class="badge">GDPR compliant</span>
            <span class="badge">ISO 27001 controls</span>
        </div>
    </div>
</section>
<section class="page-section">
    <div class="container legal-grid">
        <article class="legal-card" id="terms-content" data-animate>
            <h2>Terms of Service</h2>
            <p>These terms outline the relationship between TradeEase AI and our clients, covering platform access, acceptable use, liability, and dispute resolution.</p>
            <ul class="legal-list">
                <li>Clients maintain control over their capital and brokerage relationships.</li>
                <li>TradeEase AI provides automation services under a software-as-a-service agreement.</li>
                <li>Users must comply with local regulations and refrain from prohibited activities.</li>
                <li>All strategies include configurable risk parameters and trade limits.</li>
                <li>Disputes are handled under English law with arbitration available upon request.</li>
            </ul>
            <a class="link-arrow" href="#">Download full terms →</a>
        </article>
        <article class="legal-card" id="privacy" data-animate>
            <h2>Privacy Policy</h2>
            <p>Protecting personal and trading data is central to our operations. We minimize data collection and maintain strict retention schedules.</p>
            <ul class="legal-list">
                <li>Data encrypted in transit (TLS 1.3) and at rest (AES-256).</li>
                <li>Role-based access controls with audit trails on every data interaction.</li>
                <li>Client data stored within EU or UK data centers unless otherwise agreed.</li>
                <li>Third-party subprocessors undergo annual security assessments.</li>
                <li>Users can request data export or deletion at any time.</li>
            </ul>
            <a class="link-arrow" href="#">Read privacy documentation →</a>
        </article>
    </div>
</section>
<section class="page-section" id="compliance">
    <div class="container">
        <div class="section-header">
            <h2>Regulatory compliance</h2>
            <p>Our framework aligns with major global regulators and industry standards.</p>
        </div>
        <div class="regulation-grid">
            <div class="regulation-card" data-animate>
                <h4>United Kingdom</h4>
                <p>FCA-aligned procedures including CASS controls, transaction reporting, and SMCR accountability.</p>
            </div>
            <div class="regulation-card" data-animate>
                <h4>European Union</h4>
                <p>MiFID II best execution, RTS 27/28 reporting, and GDPR-compliant data handling.</p>
            </div>
            <div class="regulation-card" data-animate>
                <h4>Asia-Pacific</h4>
                <p>ASIC, MAS, and SFC guidelines covering algorithmic controls, investor suitability, and disaster recovery.</p>
            </div>
            <div class="regulation-card" data-animate>
                <h4>North America</h4>
                <p>FINRA, IIROC, and NFA standards for supervisory procedures, surveillance, and client communications.</p>
            </div>
        </div>
    </div>
</section>
<section class="page-section">
    <div class="container detail-grid">
        <div class="card" data-animate>
            <h3>Risk disclosure</h3>
            <p>Trading involves risk of loss. Clients should evaluate their risk tolerance and ensure AI automation aligns with investment objectives.</p>
            <ul class="legal-list">
                <li>Past performance does not guarantee future results.</li>
                <li>Leverage amplifies gains and losses; use responsibly.</li>
                <li>System availability may be impacted by market or infrastructure events.</li>
            </ul>
        </div>
        <div class="card" data-animate>
            <h3>Contact compliance</h3>
            <p>For regulatory inquiries or documentation requests, contact compliance@tradeease.ai.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="mailto:compliance@tradeease.ai">Email compliance</a>
                <a class="btn btn-outline-dark" href="resources.php#support">Visit support center</a>
            </div>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/includes/layout-end.php';
