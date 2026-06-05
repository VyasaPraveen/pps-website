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
		<?php pps_branch_strip( 'footer' ); ?>
		<div class="footer-grid">
			<div>
				<span class="footer-logo"><?php pps_logo_mark(); ?></span>
				<p class="footer-brand-name"><?php echo esc_html( pps( 'name' ) ); ?></p>
				<p class="footer-about"><?php echo esc_html( pps( 'designation' ) ); ?>. Powering homes, farms and businesses across Tirupati and Rayalaseema since 2012.</p>
				<div class="footer-social">
					<a href="<?php echo esc_url( pps( 'facebook' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><?php pps_icon( 'facebook', 18 ); ?></a>
					<a href="<?php echo esc_url( pps( 'instagram' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><?php pps_icon( 'instagram', 18 ); ?></a>
					<a href="<?php echo esc_url( pps( 'youtube' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><?php pps_icon( 'youtube', 18 ); ?></a>
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
					<li><span class="fc-ic"><?php pps_icon( 'pin', 18 ); ?></span><span><strong class="fc-branch">Tirupati Office</strong><?php echo esc_html( pps( 'address' ) ); ?></span></li>
					<li><span class="fc-ic"><?php pps_icon( 'pin', 18 ); ?></span><span><strong class="fc-branch">Srikalahasthi Branch <em>(Opening Soon)</em></strong>#7-508, Ground Floor, P.V. Road, Opp RTC Bus Stand, Sri Kalahasthi</span></li>
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

<a href="<?php echo esc_url( pps( 'whatsapp' ) ); ?>" target="_blank" rel="noopener noreferrer" class="wa-float" aria-label="Chat on WhatsApp">
	<?php pps_icon( 'whatsapp', 28 ); ?>
	<span class="sr-only">Chat with us on WhatsApp</span>
</a>

<!-- New branch announcement (home page only, once per session) -->
<?php if ( is_front_page() ) : ?>
<div class="announce" data-announce hidden>
	<div class="announce-backdrop" data-announce-close></div>
	<div class="announce-card" role="dialog" aria-modal="true" aria-labelledby="announce-title" aria-describedby="announce-text">
		<button type="button" class="announce-close" data-announce-close aria-label="<?php esc_attr_e( 'Close', 'pps' ); ?>"><?php pps_icon( 'close', 22 ); ?></button>
		<span class="announce-badge"><?php pps_icon( 'pin', 16 ); ?> New Branch &middot; Opening Soon</span>
		<h3 id="announce-title">New Office Opening Soon in <span class="announce-place">Srikalahasthi</span></h3>
		<p id="announce-text">Pragathi Power Solutions is expanding! Our new branch in <strong>Srikalahasthi</strong> opens soon &mdash; bringing trusted TATA Power Solar solutions, subsidies and service even closer to you.</p>
		<p class="announce-addr"><?php pps_icon( 'pin', 16 ); ?> <span>#7-508, Ground Floor, P.V. Road, Opp RTC Bus Stand, Sri Kalahasthi</span></p>
		<div class="announce-actions">
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Get in Touch <?php pps_icon( 'arrow-right', 16 ); ?></a>
			<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-outline">Services</a>
		</div>
	</div>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
