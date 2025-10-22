<?php
$pageTitle = 'Contact TradeEase AI';
$metaDescription = 'Connect with TradeEase AI sales, support, and global offices to discuss automated trading solutions.';
$activeNav = 'contact';
$pageClass = 'page-contact';

require __DIR__ . '/includes/layout-start.php';
?>
<section class="page-hero">
    <div class="container">
        <div>
            <h1>Let’s build your next trading advantage</h1>
            <p>Reach our specialists for demos, partnership opportunities, or technical support.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="index.php#demo-form">Book demo</a>
                <a class="btn btn-outline" href="#support">Contact support</a>
            </div>
        </div>
        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-number">24/5</div>
                <div class="stat-label">Trading desk</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">6</div>
                <div class="stat-label">Regional hubs</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">2h</div>
                <div class="stat-label">Average SLA</div>
            </div>
        </div>
    </div>
</section>
<section class="page-section">
    <div class="container contact-grid">
        <div class="contact-card" data-animate>
            <h3>Sales &amp; Partnerships</h3>
            <p>Share your goals and we’ll design a customized roadmap.</p>
            <ul class="insight-list">
                <li><strong>Email:</strong> growth@tradeease.ai</li>
                <li><strong>Phone:</strong> +44 20 3011 9000</li>
                <li><strong>Hours:</strong> Monday – Friday, 8am – 8pm GMT</li>
            </ul>
            <a class="btn btn-primary" href="mailto:growth@tradeease.ai">Email our team</a>
        </div>
        <div class="card" data-animate>
            <h3>Send us a message</h3>
            <form class="demo-form">
                <div class="form-group full-width">
                    <label for="contactName">Full name</label>
                    <input type="text" id="contactName" placeholder="Your name">
                </div>
                <div class="form-group full-width">
                    <label for="contactEmail">Business email</label>
                    <input type="email" id="contactEmail" placeholder="you@company.com">
                </div>
                <div class="form-group full-width">
                    <label for="contactTopic">Topic</label>
                    <select id="contactTopic">
                        <option>Book a demo</option>
                        <option>Partnership inquiry</option>
                        <option>Press &amp; media</option>
                        <option>Support request</option>
                    </select>
                </div>
                <div class="form-group full-width">
                    <label for="contactMessage">Message</label>
                    <textarea id="contactMessage" placeholder="How can we help?"></textarea>
                </div>
                <button type="button" class="btn btn-submit">Send message</button>
            </form>
        </div>
    </div>
</section>
<section class="page-section" id="support">
    <div class="container">
        <div class="section-header">
            <h2>Support channels</h2>
            <p>Always-on assistance tailored to your plan.</p>
        </div>
        <div class="support-options">
            <div class="support-option" data-animate>
                <h3>Trading Desk</h3>
                <p>24/5 coverage for execution questions, market events, and urgent adjustments.</p>
                <a class="link-arrow" href="tel:+442030119000">Call +44 20 3011 9000 →</a>
            </div>
            <div class="support-option" data-animate>
                <h3>Client Portal</h3>
                <p>Submit tickets, access onboarding checklists, and view SLA metrics.</p>
                <a class="link-arrow" href="#">Log into client portal →</a>
            </div>
            <div class="support-option" data-animate>
                <h3>Emergency Desk</h3>
                <p>Enterprise clients receive direct lines for market disruption and continuity planning.</p>
                <a class="link-arrow" href="mailto:priority@tradeease.ai">priority@tradeease.ai →</a>
            </div>
        </div>
    </div>
</section>
<section class="page-section">
    <div class="container">
        <div class="section-header">
            <h2>Global offices</h2>
            <p>Dedicated teams supporting clients around the clock.</p>
        </div>
        <div class="office-grid">
            <div class="office-card" data-animate>
                <h4>London</h4>
                <p>25 Churchill Place, E14 5RE</p>
            </div>
            <div class="office-card" data-animate>
                <h4>Singapore</h4>
                <p>8 Marina View, Asia Square Tower</p>
            </div>
            <div class="office-card" data-animate>
                <h4>New York</h4>
                <p>545 Madison Avenue, 18th Floor</p>
            </div>
            <div class="office-card" data-animate>
                <h4>Dubai</h4>
                <p>Dubai International Financial Centre</p>
            </div>
            <div class="office-card" data-animate>
                <h4>Sydney</h4>
                <p>161 Castlereagh Street</p>
            </div>
            <div class="office-card" data-animate>
                <h4>Toronto</h4>
                <p>121 King Street West</p>
            </div>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/includes/layout-end.php';
