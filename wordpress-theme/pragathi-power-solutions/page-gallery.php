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
		<?php pps_section_header( 'Installations', 'Solar in action', 'Browse our work by category — from rooftop plants to ground-mount farms, water heaters, fencing and farm pumpsets. We add new projects each month.' ); ?>
		<?php
		$gallery_categories = array(
			array(
				'icon'  => 'home',
				'title' => 'Rooftop Solar (RCC)',
				'desc'  => 'Solar power plants mounted on concrete (RCC) rooftops of homes and buildings.',
				'photos' => array(
					array( 'file' => 'rcc-1.jpg', 'title' => 'RCC rooftop solar plant' ),
					array( 'file' => 'rcc-2.jpg', 'title' => 'Hilltop RCC rooftop plant' ),
					array( 'file' => 'rcc-3.jpg', 'title' => 'Commercial RCC rooftop plant' ),
				),
			),
			array(
				'icon'  => 'panel',
				'title' => 'Elevated Structure Solar',
				'desc'  => 'Raised mounting structures that keep the space below free for parking or movement.',
				'photos' => array(
					array( 'file' => 'elevated-1.jpg', 'title' => 'Elevated rooftop solar array' ),
					array( 'file' => 'elevated-2.jpg', 'title' => 'Elevated car-park solar structure' ),
					array( 'file' => 'elevated-3.jpg', 'title' => 'Large elevated rooftop array' ),
				),
			),
			array(
				'icon'  => 'sun',
				'title' => 'Ground-Mounted Solar',
				'desc'  => 'Open-ground and field-mounted solar arrays for larger capacities.',
				'photos' => array(
					array( 'file' => 'ground-1.jpg', 'title' => 'Ground-mounted solar farm' ),
					array( 'file' => 'ground-2.jpg', 'title' => 'Open-field ground-mount array' ),
					array( 'file' => 'ground-3.jpg', 'title' => 'Utility ground-mount rows' ),
				),
			),
			array(
				'icon'  => 'bolt',
				'title' => 'Sheet-Roof Solar',
				'desc'  => 'Solar on metal and sheet roofs of factories, sheds and warehouses.',
				'photos' => array(
					array( 'file' => 'sheet-1.jpg', 'title' => 'Metal sheet-roof installation' ),
					array( 'file' => 'sheet-2.jpg', 'title' => 'Industrial sheet-roof solar' ),
					array( 'file' => 'sheet-3.jpg', 'title' => 'Factory sheet-roof plant' ),
				),
			),
			array(
				'icon'  => 'thermal',
				'title' => 'Solar Water Heaters',
				'desc'  => 'Rooftop solar water heating systems for homes and commercial use.',
				'photos' => array(
					array( 'file' => 'heater-1.jpg', 'title' => 'Solar water heating system' ),
					array( 'file' => 'heater-2.jpg', 'title' => 'Rooftop solar water heater' ),
					array( 'file' => 'heater-3.jpg', 'title' => 'Twin solar water heaters' ),
				),
			),
			array(
				'icon'  => 'pump',
				'title' => 'Solar Pumpsets',
				'desc'  => 'Solar-powered agricultural water pumping for farmers — diesel-free irrigation.',
				'photos' => array(
					array( 'file' => 'pump-1.jpg', 'title' => 'Solar borewell pumpset' ),
					array( 'file' => 'pump-2.jpg', 'title' => 'Solar agriculture pumpset' ),
					array( 'file' => 'pump-3.jpg', 'title' => 'Farm solar water pumping' ),
				),
			),
			array(
				'icon'  => 'fence',
				'title' => 'Solar Fencing',
				'desc'  => 'Solar-powered electric fencing for farm and property security.',
				'photos' => array(
					array( 'file' => 'fencing-1.jpg', 'title' => 'Solar fencing with live wires' ),
					array( 'file' => 'fencing-2.jpg', 'title' => 'Solar fenced farm entrance' ),
					array( 'file' => 'fencing-3.jpg', 'title' => 'Perimeter solar fencing' ),
				),
			),
		);

		foreach ( $gallery_categories as $cat ) :
			?>
			<div class="gcat">
				<div class="gcat-head">
					<span class="gcat-ic"><?php pps_icon( $cat['icon'], 24 ); ?></span>
					<div>
						<h3 class="gcat-title"><?php echo esc_html( $cat['title'] ); ?></h3>
						<p class="gcat-desc"><?php echo esc_html( $cat['desc'] ); ?></p>
					</div>
				</div>
				<div class="photo-gallery">
					<?php
					foreach ( $cat['photos'] as $photo ) :
						$src = pps_img( 'gallery/' . $photo['file'] );
						?>
						<a class="gphoto" href="<?php echo esc_url( $src ); ?>" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo esc_url( $src ); ?>" alt="<?php echo esc_attr( $photo['title'] . ' — ' . $cat['title'] ); ?>" width="1200" height="900" loading="lazy" decoding="async" />
							<span class="gphoto-cap">
								<span class="gphoto-title"><?php echo esc_html( $photo['title'] ); ?></span>
							</span>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
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
