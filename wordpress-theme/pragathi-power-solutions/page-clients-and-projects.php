<?php
/**
 * Template for the Clients & Projects page (slug: clients-and-projects).
 *
 * Auto-selected by WordPress via the page-{slug}.php template hierarchy.
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

pps_page_header(
	'Our Key Clients & Projects',
	'From family rooftops to multi-megawatt industrial plants — a snapshot of the institutions, industries, hospitals and homes we have powered across the Tirupati & Chittoor districts.',
	array(
		array( 'label' => 'Home', 'href' => home_url( '/' ) ),
		array( 'label' => 'Clients & Projects' ),
	)
);
?>

<!-- KEY PROJECTS -->
<section class="section-pad">
	<div class="container">
		<?php pps_section_header( 'Our Key Projects', 'Trusted across every sector', 'Solar systems delivered for educational institutions, industries, commercial sites, hospitals, government bodies and homes.' ); ?>

		<div class="kp-grid">
			<?php foreach ( pps_key_projects() as $group ) : ?>
				<article class="kp-card card-hover">
					<header class="kp-head">
						<span class="kp-emoji" aria-hidden="true"><?php echo esc_html( $group['emoji'] ); ?></span>
						<h3 class="kp-title"><?php echo esc_html( $group['title'] ); ?></h3>
						<span class="kp-total-badge"><strong><?php echo esc_html( $group['total'] ); ?></strong><small>Installed</small></span>
					</header>
					<ul class="kp-list">
						<?php foreach ( $group['clients'] as $client ) : ?>
							<li class="kp-item">
								<span class="kp-name"><?php echo esc_html( $client[0] ); ?></span>
								<span class="kp-cap"><?php echo esc_html( $client[1] ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>

		<p class="kp-note"><?php pps_icon( 'sun', 16 ); ?> A representative list &mdash; we have powered <strong>4700+ customers</strong> and <strong>30&nbsp;MW+</strong> of installed capacity in total.</p>
	</div>
</section>

<?php
pps_cta_banner(
	'Add your name to this list',
	"Whether it's your home, factory, hospital or campus — we'll size it, secure the subsidy and switch it on."
);
?>
<div class="spacer-16"></div>

<?php
get_footer();
