<?php
$pageTitle = 'About TradeEase AI';
$metaDescription = 'Learn about TradeEase AI mission, leadership, culture, and career opportunities.';
$activeNav = 'company';
$pageClass = 'page-company';

require __DIR__ . '/includes/layout-start.php';
?>
<section class="page-hero" id="mission">
    <div class="container">
        <div>
            <h1>Advancing automated trading with integrity</h1>
            <p>TradeEase AI empowers traders and institutions to harness machine intelligence responsibly, transparently, and profitably.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="#leadership">Meet leadership</a>
                <a class="btn btn-outline" href="careers.php">View careers</a>
            </div>
        </div>
        <div class="badge-list" data-animate>
            <span class="badge">Founded in London</span>
            <span class="badge">Global team across 6 hubs</span>
            <span class="badge">FCA, ASIC, CySEC aligned</span>
        </div>
    </div>
</section>
<section class="page-section" id="mission-detail">
    <div class="container detail-grid">
        <div data-animate>
            <h2>Our mission</h2>
            <p>Bridge institutional trading sophistication with intuitive experiences, enabling investors of every scale to unlock AI-driven performance while safeguarding capital.</p>
            <div class="values-grid">
                <div class="value-card">
                    <h3>Performance with purpose</h3>
                    <p>We design systems that prioritize risk-adjusted returns and capital preservation.</p>
                </div>
                <div class="value-card">
                    <h3>Transparent innovation</h3>
                    <p>Every model is explainable, auditable, and deployed with governance in mind.</p>
                </div>
                <div class="value-card">
                    <h3>Client partnership</h3>
                    <p>Our teams integrate with yours, building strategies and infrastructure together.</p>
                </div>
            </div>
        </div>
        <div class="card" data-animate>
            <h3>Impact in numbers</h3>
            <div class="impact-stats">
                <div class="impact-stat">
                    <div class="stat-number">20k+</div>
                    <div class="stat-label">Active traders</div>
                </div>
                <div class="impact-stat">
                    <div class="stat-number">£12B</div>
                    <div class="stat-label">Total volume</div>
                </div>
                <div class="impact-stat">
                    <div class="stat-number">87%</div>
                    <div class="stat-label">Average win rate</div>
                </div>
                <div class="impact-stat">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Client retention</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="leadership">
    <div class="container">
        <div class="section-header">
            <h2>Leadership</h2>
            <p>Seasoned executives combining quantitative finance, technology, and regulatory expertise.</p>
        </div>
        <div class="leadership-grid">
            <div class="team-card" data-animate>
                <h3>Elena Brooks</h3>
                <p>Chief Executive Officer</p>
                <p>Former Managing Director at a top-tier investment bank with 15 years of algorithmic trading leadership.</p>
            </div>
            <div class="team-card" data-animate>
                <h3>Martin Osei</h3>
                <p>Chief Technology Officer</p>
                <p>Built low-latency trading systems for hedge funds, specializing in distributed architecture and AI pipelines.</p>
            </div>
            <div class="team-card" data-animate>
                <h3>Alicia Romero</h3>
                <p>Chief Risk &amp; Compliance Officer</p>
                <p>Guided regulatory strategy at fintech scale-ups and oversees TradeEase AI global compliance.</p>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="culture">
    <div class="container">
        <div class="section-header">
            <h2>Culture of excellence</h2>
            <p>Empowered teams deliver remarkable client outcomes.</p>
        </div>
        <div class="detail-grid">
            <div class="card" data-animate>
                <h3>Hybrid collaboration</h3>
                <p>Distributed teams work from London, Singapore, New York, Dubai, Sydney, and Toronto, connected via quarterly summits.</p>
            </div>
            <div class="card" data-animate>
                <h3>Innovation sprints</h3>
                <p>Bi-monthly hackathons invite engineers, quants, and clients to co-create features and trading models.</p>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="careers">
    <div class="container">
        <div class="section-header">
            <h2>Careers</h2>
            <p>Join a cross-functional team reshaping the future of trading technology.</p>
        </div>
        <div class="career-grid">
            <div class="career-card" data-animate>
                <h4>Senior Quantitative Researcher</h4>
                <p>London · Research &amp; Strategy</p>
                <a class="link-arrow" href="#">View description →</a>
            </div>
            <div class="career-card" data-animate>
                <h4>Full-Stack Engineer</h4>
                <p>Toronto · Product Engineering</p>
                <a class="link-arrow" href="#">View description →</a>
            </div>
            <div class="career-card" data-animate>
                <h4>Client Success Director</h4>
                <p>Singapore · Client Operations</p>
                <a class="link-arrow" href="#">View description →</a>
            </div>
            <div class="career-card" data-animate>
                <h4>Market Surveillance Analyst</h4>
                <p>New York · Risk &amp; Compliance</p>
                <a class="link-arrow" href="#">View description →</a>
            </div>
        </div>
        <div class="hero-actions" data-animate>
            <a class="btn btn-primary" href="contact.php">Introduce yourself</a>
            <a class="btn btn-outline-dark" href="index.php#demo-form">Book demo</a>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/includes/layout-end.php';
