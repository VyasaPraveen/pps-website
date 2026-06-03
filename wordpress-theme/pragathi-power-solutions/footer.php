<?php
/**
 * Footer: closes the main content, renders the footer + WhatsApp float.
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- .site-main -->

<footer class="site-footer">
	<span class="footer-blob1" aria-hidden="true"></span>
	<span class="footer-blob2" aria-hidden="true"></span>
	<div class="container footer-inner">
		<div class="footer-grid">
			<div>
				<span class="footer-logo"><?php pps_logo_mark(); ?></span>
				<p class="footer-brand-name"><?php echo esc_html( pps( 'name' ) ); ?></p>
				<p class="footer-about"><?php echo esc_html( pps( 'designation' ) ); ?>. Powering homes, farms and businesses across Tirupati and Rayalaseema since 2012.</p>
				<div class="footer-social">
					<a href="<?php echo esc_url( pps( 'facebook' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><?php pps_icon( 'facebook', 18 ); ?></a>
					<a href="<?php echo esc_url( pps( 'instagram' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><?php pps_icon( 'instagram', 18 ); ?></a>
					<a href="<?php echo esc_url( pps( 'youtube' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><?php pps_icon( 'youtube', 18 ); ?></a>
					<a href="<?php echo esc_url( pps( 'linkedin' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><?php pps_icon( 'linkedin', 18 ); ?></a>
				</div>
			</div>

			<div class="footer-col">
				<h3>Quick Links</h3>
				<ul>
					<?php foreach ( pps_nav_links() as $link ) : ?>
						<li><a href="<?php echo esc_url( home_url( '/' . $link['slug'] ) ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="footer-col">
				<h3>Our Services</h3>
				<ul>
					<?php foreach ( pps_services() as $s ) : ?>
						<li><a href="<?php echo esc_url( home_url( '/services/#' . $s['slug'] ) ); ?>"><?php echo esc_html( $s['title'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="footer-col">
				<h3>Get in Touch</h3>
				<ul class="footer-contact">
					<li><span class="fc-ic"><?php pps_icon( 'pin', 18 ); ?></span><span><?php echo esc_html( pps( 'address' ) ); ?></span></li>
					<li><span class="fc-ic"><?php pps_icon( 'phone', 18 ); ?></span><a href="<?php echo esc_attr( pps( 'phone_href' ) ); ?>"><?php echo esc_html( pps( 'phone' ) ); ?></a></li>
					<li><span class="fc-ic"><?php pps_icon( 'mail', 18 ); ?></span><a href="mailto:<?php echo esc_attr( pps( 'email' ) ); ?>"><?php echo esc_html( pps( 'email' ) ); ?></a></li>
				</ul>
			</div>
		</div>

		<div class="footer-bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( pps( 'name' ) ); ?>. All rights reserved.</p>
			<p class="live"><span class="dot"></span> <?php echo esc_html( pps( 'designation' ) ); ?></p>
		</div>
	</div>
</footer>

<a href="<?php echo esc_url( pps( 'whatsapp' ) ); ?>" target="_blank" rel="noopener noreferrer" class="wa-float animate-sun-pulse" aria-label="Chat on WhatsApp">
	<?php pps_icon( 'whatsapp', 28 ); ?>
	<span class="sr-only">Chat with us on WhatsApp</span>
</a>

<?php wp_footer(); ?>
</body>
</html>
