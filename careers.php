<?php
$pageTitle = 'Careers at TradeEase AI';
$metaDescription = 'Explore open roles and culture at TradeEase AI across engineering, research, and client teams.';
$activeNav = 'company';
$pageClass = 'page-careers';

require __DIR__ . '/includes/layout-start.php';
?>
<section class="page-hero">
    <div class="container">
        <div>
            <h1>Build the future of intelligent trading</h1>
            <p>Join a mission-driven team combining quantitative finance, engineering, and design to empower traders worldwide.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="#open-roles">View open roles</a>
                <a class="btn btn-outline" href="company.php#culture">Our culture</a>
            </div>
        </div>
        <div class="badge-list" data-animate>
            <span class="badge">Remote-first</span>
            <span class="badge">Quarterly summits</span>
            <span class="badge">Learning stipend</span>
        </div>
    </div>
</section>
<section class="page-section">
    <div class="container detail-grid">
        <div class="card" data-animate>
            <h3>Why TradeEase AI</h3>
            <p>We invest in people who thrive in collaborative, high-ownership environments. Expect ambitious challenges, supportive mentorship, and global impact.</p>
            <ul class="insight-list">
                <li>Competitive compensation with equity</li>
                <li>Wellness benefits and flexible schedules</li>
                <li>Dedicated time for research and innovation</li>
            </ul>
        </div>
        <div class="card" data-animate>
            <h3>Interview process</h3>
            <div class="timeline">
                <div class="timeline-step">
                    <h4>Intro conversation</h4>
                    <p>Meet with our talent partner to align on goals and experience.</p>
                </div>
                <div class="timeline-step">
                    <h4>Technical deep dive</h4>
                    <p>Role-specific session with future teammates solving real scenarios.</p>
                </div>
                <div class="timeline-step">
                    <h4>Leadership panel</h4>
                    <p>Discuss strategic vision, culture, and how we support your growth.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="open-roles">
    <div class="container">
        <div class="section-header">
            <h2>Open roles</h2>
            <p>We’re hiring across multiple disciplines. Roles update weekly.</p>
        </div>
        <div class="career-grid">
            <div class="career-card" data-animate>
                <h4>Machine Learning Engineer</h4>
                <p>London · Research Engineering</p>
                <a class="link-arrow" href="#">Apply now →</a>
            </div>
            <div class="career-card" data-animate>
                <h4>Senior UX Designer</h4>
                <p>Remote (EU/UK)</p>
                <a class="link-arrow" href="#">Apply now →</a>
            </div>
            <div class="career-card" data-animate>
                <h4>Institutional Sales Director</h4>
                <p>New York</p>
                <a class="link-arrow" href="#">Apply now →</a>
            </div>
            <div class="career-card" data-animate>
                <h4>DevOps Specialist</h4>
                <p>Singapore</p>
                <a class="link-arrow" href="#">Apply now →</a>
            </div>
        </div>
    </div>
</section>
<section class="page-section">
    <div class="container detail-grid">
        <div class="support-card" data-animate>
            <h2>Life at TradeEase AI</h2>
            <p>Cross-functional teams gather quarterly to align on vision, celebrate wins, and explore new markets.</p>
            <ul>
                <li>Innovation retreats blending workshops with market immersion</li>
                <li>Mentorship programs pairing senior leaders with new hires</li>
                <li>Community outreach through financial literacy initiatives</li>
            </ul>
        </div>
        <div class="card" data-animate>
            <h3>How to apply</h3>
            <p>Send your resume, portfolio, and a note describing the impact you want to create to careers@tradeease.ai.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="mailto:careers@tradeease.ai">Email careers team</a>
                <a class="btn btn-outline-dark" href="contact.php">Contact us</a>
            </div>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/includes/layout-end.php';
