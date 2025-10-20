<?php
$logFilePath = __DIR__ . '/tradeease-demo-requests.log';
$errorMessage = '';
$formData = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = [
        'firstName'   => trim((string)($_POST['firstName'] ?? '')),
        'lastName'    => trim((string)($_POST['lastName'] ?? '')),
        'email'       => trim((string)($_POST['email'] ?? '')),
        'phone'       => trim((string)($_POST['phone'] ?? '')),
        'country'     => trim((string)($_POST['country'] ?? '')),
        'investment'  => trim((string)($_POST['investment'] ?? '')),
        'experience'  => trim((string)($_POST['experience'] ?? '')),
        'goals'       => trim((string)($_POST['goals'] ?? '')),
        'terms'       => isset($_POST['terms']) ? 'Yes' : 'No',
        'marketing'   => isset($_POST['marketing']) ? 'Yes' : 'No',
        'gclid'       => trim((string)($_POST['gclid'] ?? '')),
        'utm_source'  => trim((string)($_POST['utm_source'] ?? '')),
        'utm_medium'  => trim((string)($_POST['utm_medium'] ?? '')),
        'utm_campaign'=> trim((string)($_POST['utm_campaign'] ?? '')),
        'utm_term'    => trim((string)($_POST['utm_term'] ?? '')),
        'utm_content' => trim((string)($_POST['utm_content'] ?? '')),
        'ip_address'  => $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN',
        'user_agent'  => $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN',
        'referrer'    => $_SERVER['HTTP_REFERER'] ?? 'UNKNOWN',
    ];

    $requiredFields = ['firstName', 'lastName', 'email', 'phone', 'country', 'investment', 'experience'];
    $missingFields = array_filter($requiredFields, static function (string $field) use ($formData): bool {
        return $formData[$field] === '';
    });

    if (!empty($missingFields)) {
        $errorMessage = 'Please fill in all required fields before submitting the form.';
    } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Please provide a valid business email address.';
    } elseif ($formData['terms'] !== 'Yes') {
        $errorMessage = 'You must agree to the Terms & Conditions and Privacy Policy to continue.';
    } else {
        $timestamp = (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s \U\T\C');
        $logEntry = "==============================\n" .
                    "Submission Time: {$timestamp}\n" .
                    "First Name: {$formData['firstName']}\n" .
                    "Last Name: {$formData['lastName']}\n" .
                    "Email: {$formData['email']}\n" .
                    "Phone: {$formData['phone']}\n" .
                    "Country: {$formData['country']}\n" .
                    "Investment Range: {$formData['investment']}\n" .
                    "Experience: {$formData['experience']}\n" .
                    "Goals: {$formData['goals']}\n" .
                    "Marketing Opt-In: {$formData['marketing']}\n" .
                    "GCLID: {$formData['gclid']}\n" .
                    "UTM Source: {$formData['utm_source']}\n" .
                    "UTM Medium: {$formData['utm_medium']}\n" .
                    "UTM Campaign: {$formData['utm_campaign']}\n" .
                    "UTM Term: {$formData['utm_term']}\n" .
                    "UTM Content: {$formData['utm_content']}\n" .
                    "Agreed to Terms: {$formData['terms']}\n" .
                    "IP Address: {$formData['ip_address']}\n" .
                    "User Agent: {$formData['user_agent']}\n" .
                    "Referrer: {$formData['referrer']}\n" .
                    "==============================\n\n";

        $writeResult = @file_put_contents($logFilePath, $logEntry, FILE_APPEND | LOCK_EX);

        if ($writeResult === false) {
            $errorMessage = 'We were unable to store your request at this time. Please try again later.';
        } else {
            $queryParams = ['submitted' => '1'];
            if ($formData['firstName'] !== '') {
                $queryParams['first'] = $formData['firstName'];
            }
            $redirectUrl = 'thank-you.php';
            if (!empty($queryParams)) {
                $redirectUrl .= '?' . http_build_query($queryParams);
            }
            header('Location: ' . $redirectUrl);
            exit;
        }
    }
}

$pageTitle = 'TradeEase AI | Professional Automated Trading Platform | Book Demo';
$metaDescription = 'Book a personalized TradeEase AI demo and explore institutional-grade automated trading strategies, analytics, and support.';
$activeNav = 'home';
$pageClass = 'page-home';

require __DIR__ . '/includes/layout-start.php';
?>
<section class="hero home-hero">
    <div class="hero-container" >
        <div class="hero-content">
            <h1>Institutional-Grade Trading <span class="highlight">Powered by AI</span></h1>
            <p class="hero-subtitle">Experience the future of automated trading with our proprietary AI algorithms, trusted by over 20,000 traders worldwide.</p>

            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">£250</div>
                    <div class="stat-label">Minimum Investment</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">87%</div>
                    <div class="stat-label">Win Rate Average</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Market Coverage</div>
                </div>
            </div>

            <div class="hero-actions">
                <a class="btn btn-primary" href="platform.php">Explore Platform</a>
                <a class="btn btn-outline" href="#features">Discover Features</a>
            </div>
        </div>

        <div class="demo-form-container" id="demo-form">
            <div class="form-header">
                <h2>Schedule Your Demo</h2>
                <p>See our platform in action with a personalized walkthrough</p>
            </div>
            <?php if ($errorMessage !== ''): ?>
                <div class="form-alert error" role="alert"><?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>
            <form class="demo-form" method="post" action="#demo-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name *</label>
                        <input type="text" id="firstName" name="firstName" required value="<?= htmlspecialchars($formData['firstName'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name *</label>
                        <input type="text" id="lastName" name="lastName" required value="<?= htmlspecialchars($formData['lastName'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                </div>
                <div class="form-group full-width">
                    <label for="email">Business Email *</label>
                    <input type="email" id="email" name="email" required value="<?= htmlspecialchars($formData['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="form-group full-width">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" required value="<?= htmlspecialchars($formData['phone'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="country">Country *</label>
                        <select id="country" name="country" required>
                            <option value="">Select Country</option>
                            <?php
                            $countries = ['UK' => 'United Kingdom', 'US' => 'United States', 'CA' => 'Canada', 'AU' => 'Australia', 'DE' => 'Germany', 'FR' => 'France', 'ES' => 'Spain', 'IT' => 'Italy', 'NL' => 'Netherlands', 'Other' => 'Other'];
                            $selectedCountry = $formData['country'] ?? '';
                            foreach ($countries as $code => $name):
                                $selected = $selectedCountry === $code ? 'selected' : '';
                                echo "<option value=\"{$code}\" {$selected}>{$name}</option>";
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="investment">Investment Range *</label>
                        <select id="investment" name="investment" required>
                            <option value="">Select Amount</option>
                            <?php
                            $ranges = [
                                '250-500' => '£250 - £500',
                                '500-1000' => '£500 - £1,000',
                                '1000-5000' => '£1,000 - £5,000',
                                '5000-10000' => '£5,000 - £10,000',
                                '10000+' => '£10,000+',
                            ];
                            $selectedRange = $formData['investment'] ?? '';
                            foreach ($ranges as $value => $label):
                                $selected = $selectedRange === $value ? 'selected' : '';
                                echo "<option value=\"{$value}\" {$selected}>{$label}</option>";
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group full-width">
                    <label for="experience">Trading Experience *</label>
                    <select id="experience" name="experience" required>
                        <option value="">Select Experience Level</option>
                        <?php
                        $experienceLevels = [
                            'none' => 'No Experience',
                            'beginner' => 'Beginner (Less than 1 year)',
                            'intermediate' => 'Intermediate (1-3 years)',
                            'advanced' => 'Advanced (3-5 years)',
                            'expert' => 'Expert (5+ years)',
                        ];
                        $selectedExperience = $formData['experience'] ?? '';
                        foreach ($experienceLevels as $value => $label):
                            $selected = $selectedExperience === $value ? 'selected' : '';
                            echo "<option value=\"{$value}\" {$selected}>{$label}</option>";
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group full-width">
                    <label for="goals">Trading Goals (Optional)</label>
                    <textarea id="goals" name="goals" placeholder="Tell us about your investment goals and what you hope to achieve..."><?= htmlspecialchars($formData['goals'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
                <div class="form-checkbox">
                    <input type="checkbox" id="terms" name="terms" value="1" required <?= ($formData['terms'] ?? '') === 'Yes' ? 'checked' : ''; ?>>
                    <label for="terms">I agree to the <a href="legal.php#terms">Terms &amp; Conditions</a> and <a href="legal.php#privacy">Privacy Policy</a></label>
                </div>
                <div class="form-checkbox">
                    <input type="checkbox" id="marketing" name="marketing" value="1" <?= ($formData['marketing'] ?? '') === 'Yes' ? 'checked' : ''; ?>>
                    <label for="marketing">I'd like to receive updates about trading insights and platform features</label>
                </div>
                <input type="hidden" name="gclid" value="<?= htmlspecialchars($formData['gclid'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="utm_source" value="<?= htmlspecialchars($formData['utm_source'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="utm_medium" value="<?= htmlspecialchars($formData['utm_medium'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="utm_campaign" value="<?= htmlspecialchars($formData['utm_campaign'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="utm_term" value="<?= htmlspecialchars($formData['utm_term'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="utm_content" value="<?= htmlspecialchars($formData['utm_content'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" class="btn btn-submit">Book My Demo</button>
            </form>
            <div class="form-footer">
                <p>Your demo includes platform walkthrough, strategy consultation, and Q&amp;A session</p>
                <div class="trust-badges">
                    <div class="trust-badge">
                        <span>🔒</span>
                        <span>SSL Secured</span>
                    </div>
                    <div class="trust-badge">
                        <span>✓</span>
                        <span>GDPR Compliant</span>
                    </div>
                    <div class="trust-badge">
                        <span>⚡</span>
                        <span>Instant Confirmation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="features" id="features">
    <div class="container">
        <div class="section-header">
            <h2>Advanced Trading Technology</h2>
            <p>Leverage institutional-grade tools and AI-driven insights for superior trading performance</p>
        </div>
        <div class="features-grid">
            <div class="feature-card" data-animate>
                <div class="feature-icon">📊</div>
                <h3>AI Market Analysis</h3>
                <p>Real-time analysis of market conditions using machine learning algorithms trained on 30+ years of market data.</p>
            </div>
            <div class="feature-card" data-animate>
                <div class="feature-icon">🎯</div>
                <h3>Precision Execution</h3>
                <p>Automated trade execution with microsecond precision, ensuring optimal entry and exit points.</p>
            </div>
            <div class="feature-card" data-animate>
                <div class="feature-icon">🛡️</div>
                <h3>Risk Management</h3>
                <p>Advanced risk controls with automatic stop-loss, position sizing, and portfolio diversification strategies.</p>
            </div>
            <div class="feature-card" data-animate>
                <div class="feature-icon">📈</div>
                <h3>Strategy Optimization</h3>
                <p>Continuous strategy refinement based on market conditions and performance metrics.</p>
            </div>
            <div class="feature-card" data-animate>
                <div class="feature-icon">🔔</div>
                <h3>Smart Alerts</h3>
                <p>Intelligent notifications for market opportunities, executed trades, and portfolio performance.</p>
            </div>
            <div class="feature-card" data-animate>
                <div class="feature-icon">📱</div>
                <h3>Multi-Platform Access</h3>
                <p>Trade from anywhere with our web platform, mobile apps, and API integration capabilities.</p>
            </div>
        </div>
    </div>
</section>
<section class="insights" id="insights">
    <div class="container">
        <div class="insights-grid">
            <div class="insights-card" data-animate>
                <h3>Performance at a Glance</h3>
                <p>Institutions leveraging TradeEase AI realize an average <strong>23.4% total return</strong> and maintain <strong>87% win rates</strong> during volatile markets.</p>
                <div class="insight-metrics">
                    <div>
                        <span class="metric-label">Monthly Trades</span>
                        <span class="metric-value">1.2M+</span>
                    </div>
                    <div>
                        <span class="metric-label">Assets Covered</span>
                        <span class="metric-value">47</span>
                    </div>
                    <div>
                        <span class="metric-label">Automation</span>
                        <span class="metric-value">94%</span>
                    </div>
                </div>
                <a class="link-arrow" href="platform.php">View live analytics →</a>
            </div>
            <div class="insights-card" data-animate>
                <h3>Security &amp; Compliance</h3>
                <p>Our infrastructure is audited quarterly, SOC 2 aligned, and adheres to stringent KYC/AML protocols to safeguard capital and data integrity.</p>
                <ul class="insight-list">
                    <li>End-to-end encryption across trading channels</li>
                    <li>Automated risk scoring with anomaly detection</li>
                    <li>Granular audit trails for every execution</li>
                </ul>
                <a class="link-arrow" href="legal.php#compliance">Review compliance framework →</a>
            </div>
        </div>
    </div>
</section>
<section class="platform-preview" id="platform-overview">
    <div class="preview-container">
        <div class="preview-content" data-animate>
            <h2>Professional Trading Platform</h2>
            <p>Our comprehensive platform combines cutting-edge technology with intuitive design, making professional trading accessible to everyone.</p>
            <ul class="preview-features">
                <li>
                    <span class="check-icon">✓</span>
                    <div>
                        <strong>Real-Time Market Data</strong> - Live prices, charts, and market depth across multiple exchanges
                    </div>
                </li>
                <li>
                    <span class="check-icon">✓</span>
                    <div>
                        <strong>Automated Trading Strategies</strong> - Pre-configured and customizable AI trading algorithms
                    </div>
                </li>
                <li>
                    <span class="check-icon">✓</span>
                    <div>
                        <strong>Portfolio Analytics</strong> - Comprehensive performance tracking and risk metrics
                    </div>
                </li>
                <li>
                    <span class="check-icon">✓</span>
                    <div>
                        <strong>Educational Resources</strong> - Trading academy with expert tutorials and market insights
                    </div>
                </li>
            </ul>
            <div class="preview-cta">
                <a class="btn btn-primary" href="platform.php">Platform Tour</a>
                <a class="btn btn-outline-dark" href="resources.php#integrations">View Integrations</a>
            </div>
        </div>
        <div class="preview-visual" data-animate>
            <div class="dashboard-mock">
                <div class="dashboard-header">
                    <div class="dashboard-title">Trading Dashboard</div>
                    <div class="dashboard-status">
                        <span class="status-dot"></span>
                        <span>Live Trading</span>
                    </div>
                </div>
                <div class="chart-container">
                    <div class="chart-line"></div>
                </div>
                <div class="metrics-row">
                    <div class="metric-card">
                        <div class="metric-label">Total Return</div>
                        <div class="metric-value">+23.4%</div>
                        <div class="metric-change">↑ 2.3% today</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-label">Win Rate</div>
                        <div class="metric-value">87.2%</div>
                        <div class="metric-change">15 of 17 trades</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-label">Active Positions</div>
                        <div class="metric-value">4</div>
                        <div class="metric-change">£2,847 invested</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="process" id="process">
    <div class="container">
        <div class="section-header">
            <h2>Your Journey to Automated Trading</h2>
            <p>Simple onboarding process with expert guidance every step of the way</p>
        </div>
        <div class="process-steps">
            <div class="process-step" data-animate>
                <div class="step-number">1</div>
                <h3>Book Demo</h3>
                <p>Schedule a personalized platform walkthrough with our trading experts</p>
            </div>
            <div class="process-step" data-animate>
                <div class="step-number">2</div>
                <h3>Account Setup</h3>
                <p>Complete registration and configure your trading preferences</p>
            </div>
            <div class="process-step" data-animate>
                <div class="step-number">3</div>
                <h3>Fund Account</h3>
                <p>Deposit your initial investment starting from just £250</p>
            </div>
            <div class="process-step" data-animate>
                <div class="step-number">4</div>
                <h3>Start Trading</h3>
                <p>Activate AI trading and monitor your portfolio's growth</p>
            </div>
        </div>
    </div>
</section>
<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="section-header">
            <h2>Trusted by Thousands of Traders</h2>
            <p>See what our clients say about their experience with TradeEase AI</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial" data-animate>
                <p class="testimonial-text">"The AI technology is genuinely impressive. I've been trading for years, and this platform has consistently outperformed my manual strategies. The risk management features give me peace of mind."</p>
                <div class="testimonial-author">
                    <div class="author-info">
                        <div class="author-name">James Richardson</div>
                        <div class="author-title">Portfolio Manager, London</div>
                    </div>
                    <div class="testimonial-rating">★★★★★</div>
                </div>
            </div>
            <div class="testimonial" data-animate>
                <p class="testimonial-text">"As a complete beginner, I was skeptical at first. But the personal mentoring and educational resources made everything clear. I'm now seeing consistent returns with minimal effort."</p>
                <div class="testimonial-author">
                    <div class="author-info">
                        <div class="author-name">Sarah Mitchell</div>
                        <div class="author-title">Business Owner, Manchester</div>
                    </div>
                    <div class="testimonial-rating">★★★★★</div>
                </div>
            </div>
            <div class="testimonial" data-animate>
                <p class="testimonial-text">"The platform's performance during volatile markets is remarkable. The AI adapts quickly to changing conditions, something I struggled with when trading manually."</p>
                <div class="testimonial-author">
                    <div class="author-info">
                        <div class="author-name">Michael Chen</div>
                        <div class="author-title">Software Engineer, Edinburgh</div>
                    </div>
                    <div class="testimonial-rating">★★★★★</div>
                </div>
            </div>
            <div class="testimonial" data-animate>
                <p class="testimonial-text">"Professional-grade tools at an accessible price point. The £250 minimum allowed me to test the waters, and I've since scaled up significantly based on the results."</p>
                <div class="testimonial-author">
                    <div class="author-info">
                        <div class="author-name">Emma Thompson</div>
                        <div class="author-title">Financial Analyst, Birmingham</div>
                    </div>
                    <div class="testimonial-rating">★★★★★</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pricing" id="pricing">
    <div class="container">
        <div class="section-header">
            <h2>Transparent Investment Plans</h2>
            <p>Choose the plan that aligns with your trading goals</p>
        </div>
        <div class="pricing-cards">
            <div class="pricing-card" data-animate>
                <h3>Starter</h3>
                <div class="price">£250</div>
                <div class="price-subtitle">Minimum deposit</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✓</span> Full platform access</li>
                    <li><span class="check-icon">✓</span> AI trading algorithms</li>
                    <li><span class="check-icon">✓</span> Basic support</li>
                    <li><span class="check-icon">✓</span> Educational resources</li>
                </ul>
                <a class="btn btn-pricing" href="#demo-form">Get Started</a>
            </div>
            <div class="pricing-card featured" data-animate>
                <h3>Professional</h3>
                <div class="price">£1,000</div>
                <div class="price-subtitle">Recommended deposit</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✓</span> Everything in Starter</li>
                    <li><span class="check-icon">✓</span> Priority support</li>
                    <li><span class="check-icon">✓</span> Advanced strategies</li>
                    <li><span class="check-icon">✓</span> 1-on-1 mentoring</li>
                    <li><span class="check-icon">✓</span> Custom indicators</li>
                </ul>
                <a class="btn btn-pricing" href="#demo-form">Book Demo</a>
            </div>
            <div class="pricing-card" data-animate>
                <h3>Enterprise</h3>
                <div class="price">£5,000+</div>
                <div class="price-subtitle">Premium features</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✓</span> Everything in Professional</li>
                    <li><span class="check-icon">✓</span> Dedicated account manager</li>
                    <li><span class="check-icon">✓</span> Custom AI models</li>
                    <li><span class="check-icon">✓</span> API access</li>
                </ul>
                <a class="btn btn-pricing" href="contact.php">Contact Sales</a>
            </div>
        </div>
    </div>
</section>
<section class="cta-strip" data-animate>
    <div class="container">
        <div class="cta-content">
            <h2>Ready to unlock institutional-grade trading?</h2>
            <p>Join thousands of traders leveraging TradeEase AI for consistent, automated performance across global markets.</p>
        </div>
        <div class="cta-actions">
            <a class="btn btn-primary" href="#demo-form">Book a demo</a>
            <a class="btn btn-outline" href="resources.php#faq">View FAQ</a>
        </div>
    </div>
</section>
<section class="faq" id="faq">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
            <p>Answers to the most common questions about TradeEase AI</p>
        </div>
        <div class="faq-grid">
            <div class="faq-item" data-animate>
                <h3>What markets does TradeEase AI support?</h3>
                <p>TradeEase AI operates across equities, forex, commodities, and cryptocurrency markets with adaptive strategies optimized per asset class.</p>
            </div>
            <div class="faq-item" data-animate>
                <h3>Can I customize the trading strategies?</h3>
                <p>Yes. You can deploy pre-built strategies or collaborate with our quant team to tailor models specific to your risk tolerance and objectives.</p>
            </div>
            <div class="faq-item" data-animate>
                <h3>How quickly can I start trading?</h3>
                <p>Most clients complete onboarding within 48 hours. Our specialists guide you from verification to live deployment.</p>
            </div>
            <div class="faq-item" data-animate>
                <h3>Is my capital protected?</h3>
                <p>Your capital remains with your chosen broker or exchange. TradeEase AI connects securely via API with granular permission controls.</p>
            </div>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/includes/layout-end.php';
