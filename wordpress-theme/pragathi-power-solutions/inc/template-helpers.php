<?php
/**
 * Reusable presentational helpers (ports of the original React components).
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Theme image URL helper. */
function pps_img( $file ) {
	return get_template_directory_uri() . '/assets/img/' . $file;
}

/** Full horizontal logo (prefers a Customizer custom logo when set). */
function pps_logo_full( $class = '' ) {
	$custom = get_theme_mod( 'custom_logo' );
	if ( $custom ) {
		$src = wp_get_attachment_image_url( $custom, 'full' );
		if ( $src ) {
			printf(
				'<img src="%s" alt="%s" class="%s" />',
				esc_url( $src ),
				esc_attr( get_bloginfo( 'name' ) ),
				esc_attr( $class )
			);
			return;
		}
	}
	printf(
		'<img src="%s" alt="%s" class="%s" width="1000" height="144" fetchpriority="high" />',
		esc_url( pps_img( 'pps-logo-full.png' ) ),
		esc_attr( pps( 'name' ) . ' — ' . pps( 'tagline' ) ),
		esc_attr( $class )
	);
}

/** Square / icon-only logo mark. */
function pps_logo_mark( $class = '' ) {
	printf(
		'<img src="%s" alt="%s" class="%s" width="600" height="266" />',
		esc_url( pps_img( 'pps-logo-mark.png' ) ),
		esc_attr( pps( 'name' ) . ' logo' ),
		esc_attr( $class )
	);
}

/** Eyebrow pill used above section titles. */
function pps_eyebrow( $text ) {
	return '<span class="eyebrow"><span class="eyebrow-dot"></span>' . esc_html( $text ) . '</span>';
}

/** Section header block. */
function pps_section_header( $eyebrow, $title, $description = '', $align = 'center' ) {
	$align_class = 'left' === $align ? 'sh-left' : 'sh-center';
	echo '<div class="section-header ' . esc_attr( $align_class ) . '">';
	if ( $eyebrow ) {
		echo wp_kses_post( pps_eyebrow( $eyebrow ) );
	}
	echo '<h2 class="section-title">' . esc_html( $title ) . '</h2>';
	if ( $description ) {
		echo '<p class="section-desc">' . esc_html( $description ) . '</p>';
	}
	echo '</div>';
}

/** Inner hero header for sub-pages. */
function pps_page_header( $title, $description = '', $crumbs = array() ) {
	?>
	<section class="page-header hero-gradient">
		<div class="bg-grid" aria-hidden="true"></div>
		<span class="blob blob-sun" aria-hidden="true"></span>
		<div class="container page-header-inner">
			<?php if ( ! empty( $crumbs ) ) : ?>
				<nav aria-label="Breadcrumb" class="crumbs">
					<ol>
						<?php
						$count = count( $crumbs );
						foreach ( $crumbs as $i => $c ) :
							?>
							<li>
								<?php if ( ! empty( $c['href'] ) ) : ?>
									<a href="<?php echo esc_url( $c['href'] ); ?>"><?php echo esc_html( $c['label'] ); ?></a>
								<?php else : ?>
									<span class="crumb-current"><?php echo esc_html( $c['label'] ); ?></span>
								<?php endif; ?>
								<?php if ( $i < $count - 1 ) : ?>
									<span class="crumb-sep"><?php pps_icon( 'arrow-right', 12 ); ?></span>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ol>
				</nav>
			<?php endif; ?>
			<h1 class="page-title"><?php echo esc_html( $title ); ?></h1>
			<?php if ( $description ) : ?>
				<?php foreach ( (array) $description as $desc_para ) : ?>
					<p class="page-desc"><?php echo esc_html( $desc_para ); ?></p>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>
	<?php
}

/** Single service card. */
function pps_service_card( $s ) {
	?>
	<article id="<?php echo esc_attr( $s['slug'] ); ?>" class="service-card card-hover">
		<span class="service-blob" aria-hidden="true"></span>
		<div class="service-inner">
			<span class="service-icon sun-gradient"><?php pps_icon( $s['icon'], 28 ); ?></span>
			<h3 class="service-title"><?php echo esc_html( $s['title'] ); ?></h3>
			<p class="service-short"><?php echo esc_html( $s['short'] ); ?></p>
			<ul class="check-list">
				<?php foreach ( $s['highlights'] as $h ) : ?>
					<li><span class="check-i"><?php pps_icon( 'check', 16 ); ?></span><span><?php echo esc_html( $h ); ?></span></li>
				<?php endforeach; ?>
			</ul>
			<a href="<?php echo esc_url( home_url( '/services/#' . $s['slug'] ) ); ?>" class="link-more">
				Learn more <?php pps_icon( 'arrow-right', 16 ); ?>
			</a>
		</div>
	</article>
	<?php
}

/** Single benefit card. */
function pps_benefit_card( $b ) {
	?>
	<div class="benefit-card card-hover">
		<span class="benefit-icon"><?php pps_icon( $b['icon'], 24 ); ?></span>
		<h3 class="benefit-title"><?php echo esc_html( $b['title'] ); ?></h3>
		<p class="benefit-desc"><?php echo esc_html( $b['description'] ); ?></p>
	</div>
	<?php
}

/** Four-step process timeline. */
function pps_process_timeline() {
	?>
	<div class="timeline">
		<div class="timeline-line" aria-hidden="true"></div>
		<div class="timeline-grid">
			<?php foreach ( pps_process() as $i => $step ) : ?>
				<div class="timeline-card card-hover">
					<div class="timeline-top">
						<span class="timeline-num sun-gradient"><?php echo (int) $step['step']; ?></span>
						<span class="timeline-step">Step <?php echo (int) ( $i + 1 ); ?></span>
					</div>
					<h3 class="timeline-title"><?php echo esc_html( $step['title'] ); ?></h3>
					<p class="timeline-desc"><?php echo esc_html( $step['description'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}

/** FAQ accordion (first item open by default). */
function pps_faq_accordion() {
	echo '<div class="faq" data-faq>';
	foreach ( pps_faqs() as $i => $faq ) {
		$open = 0 === $i ? ' is-open' : '';
		?>
		<div class="faq-item<?php echo esc_attr( $open ); ?>">
			<button type="button" class="faq-q" aria-expanded="<?php echo 0 === $i ? 'true' : 'false'; ?>">
				<span><?php echo esc_html( $faq['q'] ); ?></span>
				<span class="faq-toggle"><?php pps_icon( 'plus', 16 ); ?></span>
			</button>
			<div class="faq-a"><p><?php echo esc_html( $faq['a'] ); ?></p></div>
		</div>
		<?php
	}
	echo '</div>';
}

/** Interactive savings calculator (JS-driven). */
function pps_savings_calculator() {
	?>
	<div class="calc" data-calc>
		<div class="calc-input card">
			<h3 class="calc-h">Estimate Your Savings</h3>
			<p class="calc-sub">Drag the slider to your average monthly electricity bill.</p>
			<div class="calc-field">
				<label for="pps-bill">Monthly Electricity Bill</label>
				<div class="calc-billrow">
					<p class="calc-bill" data-calc-bill>₹2,500</p>
					<span class="calc-kwlabel"><span data-calc-kw>1</span> kW system</span>
				</div>
				<input id="pps-bill" type="range" min="1000" max="20000" step="500" value="2500" data-calc-range aria-label="Monthly electricity bill" />
				<div class="calc-rangelabels"><span>₹1,000</span><span>₹20,000</span></div>
			</div>
			<div class="calc-mini">
				<div class="calc-minibox"><p class="calc-minilabel">Plant Size</p><p class="calc-minival"><span data-calc-kw2>1</span> kW</p></div>
				<div class="calc-minibox"><p class="calc-minilabel">Roof Required</p><p class="calc-minival"><span data-calc-space>80</span> sq ft</p></div>
			</div>
		</div>

		<div class="calc-result sun-gradient">
			<h3 class="calc-h light">Your Estimated Returns</h3>
			<p class="calc-sub light">Based on Tirupati irradiance and ₹8.5/unit average tariff.</p>
			<div class="calc-cards">
				<div class="calc-card big"><p class="calc-clabel">Annual Savings</p><p class="calc-cval" data-calc-annual>₹0</p></div>
				<div class="calc-row2">
					<div class="calc-card"><p class="calc-clabel">Monthly Save</p><p class="calc-cval sm" data-calc-monthly>₹0</p></div>
					<div class="calc-card"><p class="calc-clabel">Subsidy</p><p class="calc-cval sm" data-calc-subsidy>₹0</p></div>
				</div>
				<div class="calc-row2">
					<div class="calc-card"><p class="calc-clabel">Net Cost</p><p class="calc-cval sm" data-calc-net>₹0</p></div>
					<div class="calc-card"><p class="calc-clabel">Payback</p><p class="calc-cval sm" data-calc-payback>0 yrs</p></div>
				</div>
			</div>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-white calc-cta">
				Get a Detailed Quote <?php pps_icon( 'arrow-right', 18 ); ?>
			</a>
			<p class="calc-note">Estimates only. Actual figures depend on site conditions and DISCOM tariff.</p>
		</div>
	</div>
	<?php
}

/** Bottom call-to-action banner. */
function pps_cta_banner( $title = 'Ready to switch to solar?', $description = 'Talk to our experts in Tirupati. Free consultation, transparent pricing, end-to-end execution.' ) {
	?>
	<section class="cta-wrap">
		<div class="container">
			<div class="cta">
				<span class="blob blob-sun cta-blob1" aria-hidden="true"></span>
				<span class="blob blob-eco cta-blob2" aria-hidden="true"></span>
				<div class="bg-grid faint" aria-hidden="true"></div>
				<div class="cta-inner">
					<div class="cta-text">
						<h2><?php echo esc_html( $title ); ?></h2>
						<p><?php echo esc_html( $description ); ?></p>
					</div>
					<div class="cta-actions">
						<a href="<?php echo esc_attr( pps( 'phone_href' ) ); ?>" class="btn btn-primary"><?php pps_icon( 'phone', 18 ); ?> <?php echo esc_html( pps( 'phone' ) ); ?></a>
						<a href="<?php echo esc_url( pps( 'whatsapp' ) ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp"><?php pps_icon( 'whatsapp', 18 ); ?> WhatsApp Quote</a>
						<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-white">Contact Form <?php pps_icon( 'arrow-right', 18 ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}

/** Contact form (submits to WhatsApp via JS). */
function pps_contact_form() {
	$services = array(
		'Solar Rooftop',
		'Solar Water Heater',
		'Solar Street Lights',
		'Solar Fencing',
		'Solar Pumpset',
		'Operation & Maintenance (AMC)',
		'Other',
	);
	?>
	<form class="contact-form card" data-contact-form>
		<div data-form-body>
			<h3 class="cf-title">Get a free quote</h3>
			<p class="cf-sub">Fill in your details. We&rsquo;ll send a sized proposal within 24 hours.</p>
			<div class="cf-grid">
				<label class="cf-field"><span class="cf-label">Full Name<span class="req">*</span></span>
					<input type="text" name="name" required placeholder="Ramesh Reddy" class="form-input" /></label>
				<label class="cf-field"><span class="cf-label">Phone<span class="req">*</span></span>
					<input type="tel" name="phone" required pattern="[0-9+\s-]{10,15}" placeholder="9701426440" class="form-input" /></label>
				<label class="cf-field"><span class="cf-label">Email</span>
					<input type="email" name="email" placeholder="you@example.com" class="form-input" /></label>
				<label class="cf-field"><span class="cf-label">City<span class="req">*</span></span>
					<input type="text" name="city" required value="Tirupati" placeholder="Tirupati" class="form-input" /></label>
				<label class="cf-field"><span class="cf-label">Service Interested In<span class="req">*</span></span>
					<select name="service" class="form-input">
						<?php foreach ( $services as $s ) : ?>
							<option value="<?php echo esc_attr( $s ); ?>"><?php echo esc_html( $s ); ?></option>
						<?php endforeach; ?>
					</select></label>
				<label class="cf-field cf-span2"><span class="cf-label">Message</span>
					<textarea name="message" rows="4" placeholder="Tell us about your roof, location, or any specific needs." class="form-input"></textarea></label>
			</div>
			<button type="submit" class="btn btn-primary cf-submit">Send Enquiry on WhatsApp <?php pps_icon( 'arrow-right', 18 ); ?></button>
			<p class="cf-privacy">We respect your privacy. Your details are sent directly to our team — never shared.</p>
		</div>
		<div class="cf-success" data-form-success hidden>
			<div class="cf-check"><?php pps_icon( 'check', 32 ); ?></div>
			<h3>Thanks!</h3>
			<p>Your enquiry has been sent on WhatsApp. Our team will respond within a few hours.</p>
			<button type="button" class="btn btn-outline" data-form-reset>Send another enquiry</button>
		</div>
	</form>
	<?php
}
