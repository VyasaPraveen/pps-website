<?php
/**
 * Template Name: PPS Gallery
 * Page template for the Gallery page (slug: gallery).
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

pps_page_header(
	'Snapshots from the field.',
	'A curated look at recent installations across Tirupati, Chittoor, Madanapalle and beyond. Real plants, real customers, real sunshine.',
	array(
		array( 'label' => 'Home', 'href' => home_url( '/' ) ),
		array( 'label' => 'Gallery' ),
	)
);
?>

<section class="section-pad">
	<div class="container">
		<?php pps_section_header( 'Installations', 'Solar in action', "Browse a sample of the systems we've delivered. We add new projects each month." ); ?>
		<div class="gallery-grid">
			<?php foreach ( pps_gallery_tiles() as $tile ) : ?>
				<figure class="tile card-hover">
					<span class="tile-bg <?php echo esc_attr( $tile['grad'] ); ?>" aria-hidden="true"></span>
					<span class="bg-grid" style="opacity:.2" aria-hidden="true"></span>
					<span class="tile-icon"><?php pps_icon( $tile['icon'], 120 ); ?></span>
					<figcaption>
						<span class="tile-cat"><?php echo esc_html( $tile['category'] ); ?></span>
						<p class="tile-title"><?php echo esc_html( $tile['title'] ); ?></p>
						<p class="tile-cap"><?php echo esc_html( $tile['caption'] ); ?></p>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
pps_cta_banner(
	'Want a virtual tour of a real installation?',
	"Call us — we'll happily arrange a visit to a customer site close to you."
);
?>
<div class="spacer-16"></div>

<?php
get_footer();
