<?php
/**
 * Front page (Home).
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<!-- HERO -->
<section class="hero hero-gradient">
	<span class="bg-grid" aria-hidden="true"></span>
	<span class="blob blob-1" aria-hidden="true"></span>
	<span class="blob blob-2" aria-hidden="true"></span>
	<div class="container hero-inner">
		<div class="hero-grid">
			<div class="animate-fade-up">
				<span class="hero-badge"><span class="ping"></span>Government of India &middot; Rooftop Solar Scheme</span>
				<h1>PM Surya Ghar <span class="text-shimmer">Muft Bijli Yojana</span></h1>
				<p class="hero-sub">Free electricity for every home with rooftop solar</p>
				<p class="hero-lead">Get up to &#8377;78,000 central subsidy on rooftop solar under the Government of India&rsquo;s flagship scheme. Pragathi Power Solutions handles your application, installation and subsidy &mdash; end to end.</p>

				<div class="countdown glass" data-countdown data-deadline="2027-03-31T23:59:59+05:30" role="timer" aria-label="Time remaining to avail the PM Surya Ghar scheme">
					<p class="countdown-label"><?php pps_icon( 'sun', 16 ); ?> Limited-period subsidy &mdash; avail it now <span class="countdown-end">Subsidy ends 31<sup>st</sup> March 2027</span></p>
					<div class="countdown-grid">
						<div class="cd-box"><span class="cd-num" data-cd-days>00</span><span class="cd-unit">Days</span></div>
						<div class="cd-box"><span class="cd-num" data-cd-hours>00</span><span class="cd-unit">Hours</span></div>
						<div class="cd-box"><span class="cd-num" data-cd-mins>00</span><span class="cd-unit">Mins</span></div>
						<div class="cd-box"><span class="cd-num" data-cd-secs>00</span><span class="cd-unit">Secs</span></div>
					</div>
				</div>

				<ul class="hero-points">
					<?php foreach ( array( 'Up to ₹78,000 PM Surya Ghar subsidy', '14+ Years Experience', 'End-to-end paperwork handled' ) as $point ) : ?>
						<li><span class="dot"><?php pps_icon( 'check', 14 ); ?></span><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="hero-actions">
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Get a Free Quote <?php pps_icon( 'arrow-right', 18 ); ?></a>
					<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-outline">Explore Services</a>
				</div>
			</div>

			<div class="animate-fade-up delay-120 hero-visual-col">
				<?php pps_branch_strip( 'hero' ); ?>
				<div class="pm-visual">
						<div class="pm-photo-ring">
							<div class="pm-photo-wrap">
								<picture><source srcset="<?php echo esc_url( pps_img( 'pm-modi.webp' ) ); ?>" type="image/webp" /><img src="<?php echo esc_url( pps_img( 'pm-modi.jpg' ) ); ?>" alt="Shri Narendra Modi, Hon&rsquo;ble Prime Minister of India" width="760" height="688" class="pm-photo" loading="eager" decoding="async" fetchpriority="high" /></picture>
							</div>
						</div>
						<div class="pm-caption glass">
							<p class="pm-name">Shri Narendra Modi</p>
							<p class="pm-role">Hon&rsquo;ble Prime Minister of India</p>
						</div>
						<div class="hv-float pm-badge glass animate-float-slow">
							<span class="pm-badge-val">&#8377;78,000</span>
							<span class="pm-badge-label">Max central subsidy</span>
						</div>
						<div class="hv-float pm-tag glass animate-float-slow">
							<?php pps_icon( 'sun', 14 ); ?><span>PM Surya Ghar</span>
						</div>
					</div>
				</div>
			</div>

		<div class="hero-stats">
			<?php foreach ( pps_stats() as $stat ) : ?>
				<div class="stat-box glass">
					<p class="stat-val"><?php echo esc_html( $stat['value'] ); ?><span class="suffix"><?php echo esc_html( $stat['suffix'] ); ?></span></p>
					<p class="stat-label"><?php echo esc_html( $stat['label'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- SERVICES -->
<section class="section-pad">
	<div class="container">
		<?php pps_section_header( 'What We Offer', 'End-to-End Solar Solutions, Backed by Expertise', 'We have rich experience in solar rooftop 1 KW to megawatt solar power plants — including solar hybrid systems, solar hot water, solar street lights, solar fencing, solar agriculture pump sets & any solar power services.' ); ?>
		<div class="cards-3">
			<?php foreach ( pps_services() as $s ) { pps_service_card( $s ); } ?>
		</div>
	</div>
</section>

<!-- BENEFITS -->
<section class="section-pad bg-soft-up">
	<div class="container">
		<?php pps_section_header( 'Why Solar', '12 reasons to switch to solar today', "Solar isn't just clean — it's the smartest financial decision a homeowner or business can make in 2026." ); ?>
		<div class="cards-4">
			<?php foreach ( pps_benefits() as $b ) { pps_benefit_card( $b ); } ?>
		</div>
	</div>
</section>

<!-- PM SURYA GHAR SUBSIDY -->
<section class="section-pad subsidy" id="subsidy">
	<span class="bg-grid faint" aria-hidden="true"></span>
	<div class="container">
		<div class="section-header sh-center">
			<span class="eyebrow"><span class="eyebrow-dot"></span>Government of India Scheme</span>
			<h2 class="section-title">PM Surya Ghar: Muft Bijli Yojana Subsidy <span class="spin-sun" aria-hidden="true"><?php pps_icon( 'sun', 30 ); ?></span></h2>
			<p class="section-desc">Central-government subsidy you can claim on your rooftop solar — Pragathi Power Solutions files the entire application for you.</p>
		</div>

		<div class="subsidy-grid">
			<div class="subsidy-col">
				<h3 class="subsidy-coltitle">For Residential Households</h3>
				<div class="subsidy-cards">
					<div class="subsidy-card"><p class="sc-amt">&#8377;30,000</p><p class="sc-unit">per kW</p><p class="sc-note">up to 2 kW</p></div>
					<div class="subsidy-card"><p class="sc-amt">&#8377;18,000</p><p class="sc-unit">per kW</p><p class="sc-note">for additional capacity up to 3 kW</p></div>
					<div class="subsidy-card highlight"><p class="sc-amt">&#8377;78,000</p><p class="sc-unit">maximum</p><p class="sc-note">total subsidy for systems larger than 3 kW</p></div>
				</div>
			</div>
			<div class="subsidy-col">
				<h3 class="subsidy-coltitle">For GHS / RWA</h3>
				<div class="subsidy-cards">
					<div class="subsidy-card"><p class="sc-amt">&#8377;18,000</p><p class="sc-unit">per kW</p><p class="sc-note">Group Housing Society / Resident Welfare Association — common facilities incl. EV charging, up to 500 kW (@3 kW per house)</p></div>
				</div>
				<p class="subsidy-special"><?php pps_icon( 'check', 16 ); ?> <span>Special states get an additional <strong>10% subsidy</strong> per kW.</span></p>
			</div>
		</div>

		<div class="subsidy-table-wrap">
			<p class="subsidy-table-title">Suitable rooftop solar capacity for your home</p>
			<table class="subsidy-table">
				<thead><tr><th>Avg. monthly consumption (units)</th><th>0&ndash;150</th><th>150&ndash;300</th><th>&gt; 300</th></tr></thead>
				<tbody><tr><td>Suitable rooftop solar capacity</td><td>1&ndash;2 kW</td><td>2&ndash;3 kW</td><td>Above 3 kW</td></tr></tbody>
			</table>
		</div>

		<div class="subsidy-cta">
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Check your subsidy <?php pps_icon( 'arrow-right', 18 ); ?></a>
			<a href="<?php echo esc_url( pps( 'whatsapp' ) ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp"><?php pps_icon( 'whatsapp', 18 ); ?> Ask on WhatsApp</a>
		</div>
	</div>
</section>

<!-- CALCULATOR -->
<section class="section-pad">
	<div class="container">
		<?php pps_section_header( 'Calculate', 'See how much you save with solar', 'A 3 kW rooftop plant in Tirupati typically saves ₹30,000+ a year. Run the numbers for your home below.' ); ?>
		<div style="margin-top:3rem"><?php pps_savings_calculator(); ?></div>
	</div>
</section>

<!-- PROCESS -->
<section class="section-pad bg-soft-down">
	<div class="container">
		<?php pps_section_header( 'How It Works', 'Solar in four simple steps', 'From the first call to the day your meter starts spinning backwards — we handle everything.' ); ?>
		<div style="margin-top:3rem"><?php pps_process_timeline(); ?></div>
	</div>
</section>

<!-- TATA PARTNER -->
<section class="section-pad">
	<div class="container">
		<div class="split">
			<div class="partner-visual">
				<div class="layer sun sun-gradient" aria-hidden="true"></div>
				<div class="layer brand brand-gradient" aria-hidden="true"></div>
				<div class="partner-card">
					<?php pps_logo_full(); ?>
					<div class="partner-mini">
						<div class="box"><p class="num">14+</p><p class="lab">Years</p></div>
						<div class="box"><p class="num">4700+</p><p class="lab">Customers</p></div>
						<div class="box"><p class="num">30MW+</p><p class="lab">Installed</p></div>
					</div>
				</div>
			</div>
			<div>
				<span class="eyebrow">Authorised Partner</span>
				<h2 class="lead-h2">We&rsquo;re TATA Power Solar Partners in Rayalaseema</h2>
				<p class="lead-p">Pragathi Power Solutions has been a trusted name in solar since <?php echo esc_html( pps( 'founded' ) ); ?>. As authorised TATA Power Solar partners, we deliver the most reliable solar technology backed by India&rsquo;s most trusted brand — with local service you can count on.</p>
				<ul class="feature-list">
					<?php
					$features = array(
						'Tier-1 mono-PERC and TopCon panels',
						'Premium string and microinverters',
						'25-year linear performance warranty',
						'Full subsidy & net-metering paperwork',
						'Local Tirupati service team',
					);
					foreach ( $features as $f ) :
						?>
						<li><span class="ck"><?php pps_icon( 'check', 14 ); ?></span><span><?php echo esc_html( $f ); ?></span></li>
					<?php endforeach; ?>
				</ul>
				<div class="btn-row">
					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-primary">About Us <?php pps_icon( 'arrow-right', 16 ); ?></a>
					<a href="<?php echo esc_url( home_url( '/clients-and-projects/' ) ); ?>" class="btn btn-outline">See Our Projects</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- WHY CHOOSE -->
<section class="section-pad">
	<div class="container">
		<?php pps_section_header( 'Why Choose Us', 'Why Choose Tata Power Solar + Pragathi Power Solutions', 'The right choice for a safe, reliable and long-lasting solar solution — compared point by point.' ); ?>
		<div class="compare" style="margin-top:3rem">
			<div class="compare-head">
				<span class="ch-bad">Local Vendors / Ordinary Installers</span>
				<span class="ch-good">Pragathi Power Solutions + Tata Power Solar</span>
			</div>
			<?php foreach ( pps_compare() as $row ) : ?>
				<div class="compare-row">
					<span class="cmp cmp-bad"><span class="cmp-ic"><?php pps_icon( 'close', 16 ); ?></span><span><?php echo esc_html( $row['bad'] ); ?></span></span>
					<span class="cmp cmp-good"><span class="cmp-ic"><?php pps_icon( 'check', 16 ); ?></span><span><?php echo esc_html( $row['good'] ); ?></span></span>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="compare-foot">
			<div><strong>Tata Power Solar Standard</strong><span>Quality &middot; Safety &middot; Reliability &middot; Performance</span></div>
			<div><strong>Pragathi Power Solutions</strong><span>Experience you can trust, performance you can rely on.</span></div>
		</div>
	</div>
</section>

<!-- MATERIAL SUPPLY -->
<section class="section-pad bg-soft-down">
	<div class="container">
		<?php pps_section_header( 'Material Supply', 'Single Source. Single Warranty. Total Peace of Mind with Tata Power Solar', 'Your entire solar system is sourced from a single trusted provider, ensuring seamless service and hassle-free support.' ); ?>
		<div class="split" style="margin-top:3rem">
			<div class="card supply-card">
				<p>All materials are supplied as per the <strong>Tata Bill of Material (BOM)</strong>. The major advantage is that the entire solar system is sourced from a single provider — including Solar Modules, Inverter, ACDB, DCDB, Earthing and Lightning Arrestor (LA) materials.</p>
				<p>This ensures a <strong>single comprehensive warranty</strong> for the complete system. In many other cases customers receive separate warranties from different manufacturers — one for the solar modules, another for the inverter, and often no warranty cover for the BOS components.</p>
				<p>If any service issue arises, customers may need to coordinate with multiple suppliers. With Tata Power Solar there is a <strong>single point of contact</strong> for warranty claims and after-sales support — making service and maintenance far simpler and more convenient.</p>
			</div>
			<div>
				<span class="eyebrow">Covered under one BOM</span>
				<h2 class="lead-h2">Everything from one trusted source</h2>
				<p class="lead-p">No chasing different manufacturers for different parts — one Tata Power Solar BOM covers your whole system end to end.</p>
				<ul class="feature-list">
					<?php
					$bom = array( 'Solar Modules', 'Inverter', 'ACDB & DCDB', 'Earthing', 'Lightning Arrestor (LA)', 'Single system-wide warranty' );
					foreach ( $bom as $bom_item ) :
						?>
						<li><span class="ck"><?php pps_icon( 'check', 14 ); ?></span><span><?php echo esc_html( $bom_item ); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- OUR IMPACT -->
<section class="section-pad impact-section">
	<div class="container">
		<?php pps_section_header( 'Our Impact', 'Pragathi Power Solutions Has Installed 30 MW of Solar', 'And that 30 MW is already making a real difference. As on 31 March 2026, here is the environmental and social impact our installations deliver for the planet and society.' ); ?>
		<div class="impact-grid">
			<?php foreach ( pps_impact() as $im ) : ?>
				<div class="impact-card card-hover">
					<span class="impact-ic"><?php pps_icon( $im['icon'], 26 ); ?></span>
					<p class="impact-val"><?php echo esc_html( $im['value'] ); ?></p>
					<p class="impact-lab"><?php echo esc_html( $im['label'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<p class="impact-tagline"><strong>Pragathi Power Solutions</strong> — Powering a Sustainable Tomorrow with Trusted Solar Solutions Since 2012.</p>
	</div>
</section>

<!-- TESTIMONIALS -->
<section class="section-pad bg-soft-up">
	<div class="container">
		<?php pps_section_header( 'Customer Voices', 'Trusted by 4700+ customers across Rayalaseema' ); ?>
		<div class="testi-grid">
			<?php foreach ( pps_testimonials() as $t ) : ?>
				<figure class="testi card-hover">
					<div class="testi-stars"><?php for ( $i = 0; $i < 5; $i++ ) { pps_icon( 'star', 18 ); } ?></div>
					<blockquote>&ldquo;<?php echo esc_html( $t['quote'] ); ?>&rdquo;</blockquote>
					<figcaption>
						<span class="testi-avatar sun-gradient"><?php echo esc_html( mb_substr( $t['name'], 0, 1 ) ); ?></span>
						<div>
							<p class="testi-name"><?php echo esc_html( $t['name'] ); ?></p>
							<p class="testi-loc"><?php echo esc_html( $t['location'] ); ?></p>
						</div>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- FAQ -->
<section class="section-pad">
	<div class="container split-header">
		<?php pps_section_header( 'FAQ', 'Common questions, clear answers', 'Everything you need to know before going solar. Still curious? Call us — we love these conversations.', 'left' ); ?>
		<?php pps_faq_accordion(); ?>
	</div>
</section>

<?php pps_cta_banner(); ?>
<div class="spacer-16"></div>

<?php
get_footer();
