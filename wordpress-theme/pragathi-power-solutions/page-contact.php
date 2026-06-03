<?php
/**
 * Template Name: PPS Contact
 * Page template for the Contact page (slug: contact).
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

pps_page_header(
	'Talk to Our Authorized Tata Power Solar Channel Partner',
	array(
		'Get expert guidance from experienced solar professionals — not sales agents.',
		'Free consultation • Transparent pricing • End-to-end execution',
		'Whether you\'re planning a residential, commercial, or industrial solar project, we\'re here to help. Contact us by phone, WhatsApp, email, or by filling out the form below.',
		'We typically respond within a few hours and will guide you through every step of your solar journey.',
	),
	array(
		array( 'label' => 'Home', 'href' => home_url( '/' ) ),
		array( 'label' => 'Contact' ),
	)
);

/**
 * Render a single contact info card.
 */
function pps_contact_card( $icon, $title, $line, $href = '', $external = false, $accent = false ) {
	$cls   = $accent ? 'contact-card accent sun-gradient card-hover' : 'contact-card card-hover';
	$open  = $href ? sprintf( '<a href="%s"%s class="%s">', esc_url( $href ), $external ? ' target="_blank" rel="noopener noreferrer"' : '', esc_attr( $cls ) ) : '<div class="' . esc_attr( $cls ) . '">';
	$close = $href ? '</a>' : '</div>';
	echo $open; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	?>
	<div class="cc-row">
		<span class="cc-icon"><?php pps_icon( $icon, 22 ); ?></span>
		<div>
			<p class="cc-label"><?php echo esc_html( $title ); ?></p>
			<?php foreach ( (array) $line as $cc_line ) : ?>
				<p class="cc-line"><?php echo esc_html( $cc_line ); ?></p>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
	echo $close; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
?>

<section class="section-pad">
	<div class="container contact-grid">
		<aside class="contact-aside">
			<?php
			pps_contact_card( 'phone', 'Call Us', pps( 'phone' ), pps( 'phone_href' ), false, true );
			pps_contact_card( 'whatsapp', 'WhatsApp', 'Quick quote on chat', pps( 'whatsapp' ), true );
			pps_contact_card( 'mail', 'Email', pps( 'email' ), 'mailto:' . pps( 'email' ) );
			pps_contact_card( 'pin', 'Visit Office', pps( 'address' ) );
			pps_contact_card( 'clock', 'Working Hours', array( 'Mon - Sat : 9:00 AM - 8:00 PM', 'Sun : 9:00 AM - 1:30 PM' ) );
			?>
			<div class="card" style="padding:1.5rem">
				<p style="font-size:.875rem;font-weight:600;color:var(--navy)">Follow us</p>
				<div class="social-row">
					<a href="<?php echo esc_url( pps( 'facebook' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="social-ic"><?php pps_icon( 'facebook', 18 ); ?></a>
					<a href="<?php echo esc_url( pps( 'instagram' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="social-ic"><?php pps_icon( 'instagram', 18 ); ?></a>
					<a href="<?php echo esc_url( pps( 'youtube' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="social-ic"><?php pps_icon( 'youtube', 18 ); ?></a>
					<a href="<?php echo esc_url( pps( 'linkedin' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="social-ic"><?php pps_icon( 'linkedin', 18 ); ?></a>
				</div>
			</div>
		</aside>

		<div>
			<?php pps_contact_form(); ?>
		</div>
	</div>
</section>

<!-- MAP -->
<section class="section-pad bg-soft-up">
	<div class="container">
		<?php pps_section_header( 'Find Us', 'Visit our Tirupati office', 'Drop in for a chat, a system tour, or to see real components up close.' ); ?>
		<div class="map-wrap">
			<iframe title="Pragathi Power Solutions, Tirupati office map"
				src="https://www.openstreetmap.org/export/embed.html?bbox=79.41%2C13.62%2C79.45%2C13.66&amp;layer=mapnik&amp;marker=13.6404%2C79.4290"
				loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<p class="map-note">Ramanuja Circle, Tiruchanoor Road, opp. Fly Over Pillar No: 2, Tirupati 517501.</p>
	</div>
</section>

<!-- FAQ -->
<section class="section-pad">
	<div class="container split-header">
		<?php pps_section_header( 'FAQ', 'Quick answers before you call', 'Have a different question? Drop it in the form above — we respond within a few hours.', 'left' ); ?>
		<?php pps_faq_accordion(); ?>
	</div>
</section>

<div class="spacer-16"></div>

<?php
get_footer();
