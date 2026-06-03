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
					<p class="countdown-label"><?php pps_icon( 'sun', 16 ); ?> Limited-period subsidy &mdash; avail it now</p>
					<div class="countdown-grid">
						<div class="cd-box"><span class="cd-num" data-cd-days>00</span><span class="cd-unit">Days</span></div>
						<div class="cd-box"><span class="cd-num" data-cd-hours>00</span><span class="cd-unit">Hours</span></div>
						<div class="cd-box"><span class="cd-num" data-cd-mins>00</span><span class="cd-unit">Mins</span></div>
						<div class="cd-box"><span class="cd-num" data-cd-secs>00</span><span class="cd-unit">Secs</span></div>
					</div>
				</div>

				<ul class="hero-points">
					<?php foreach ( array( 'Up to ₹78,000 PM Surya Ghar subsidy', '13+ years experience', 'End-to-end paperwork handled' ) as $point ) : ?>
						<li><span class="dot"><?php pps_icon( 'check', 14 ); ?></span><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="hero-actions">
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Get a Free Quote <?php pps_icon( 'arrow-right', 18 ); ?></a>
					<a href="<?php echo esc_url( pps( 'whatsapp' ) ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp"><?php pps_icon( 'whatsapp', 18 ); ?> WhatsApp Us</a>
					<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-outline">Explore Services</a>
				</div>
			</div>

			<div class="animate-fade-up delay-120">
				<div class="pm-visual">
						<div class="pm-photo-ring">
							<div class="pm-photo-wrap">
								<img src="<?php echo esc_url( pps_img( 'pm-modi.jpg' ) ); ?>" alt="Shri Narendra Modi, Hon&rsquo;ble Prime Minister of India" width="760" height="688" class="pm-photo" />
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
						<div class="box"><p class="num">13+</p><p class="lab">Years</p></div>
						<div class="box"><p class="num">1500+</p><p class="lab">Homes</p></div>
						<div class="box"><p class="num">5MW+</p><p class="lab">Installed</p></div>
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
					<a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="btn btn-outline">See Our Projects</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- TESTIMONIALS -->
<section class="section-pad bg-soft-up">
	<div class="container">
		<?php pps_section_header( 'Customer Voices', 'Trusted by 1500+ households across Tirupati' ); ?>
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
