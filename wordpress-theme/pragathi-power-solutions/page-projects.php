<?php
/**
 * Template Name: PPS Projects
 * Page template for the Projects page (slug: projects).
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

pps_page_header(
	'Real plants. Real savings. Real customers.',
	"A snapshot of solar systems we've installed across Rayalaseema — from family rooftops to industrial sheds.",
	array(
		array( 'label' => 'Home', 'href' => home_url( '/' ) ),
		array( 'label' => 'Projects' ),
	)
);
?>

<!-- PROJECT CARDS -->
<section class="section-pad">
	<div class="container">
		<div class="cards-3">
			<?php foreach ( pps_projects() as $p ) : ?>
				<article class="proj-card card-hover">
					<div class="proj-top sun-gradient">
						<span class="bg-grid" style="opacity:.2" aria-hidden="true"></span>
						<span class="spin animate-solar-spin"><?php pps_icon( 'sun', 80 ); ?></span>
						<span class="proj-tag <?php echo esc_attr( pps_project_type_class( $p['type'] ) ); ?>"><?php echo esc_html( $p['type'] ); ?></span>
						<span class="proj-year"><?php echo esc_html( $p['year'] ); ?></span>
					</div>
					<div class="proj-body">
						<h3><?php echo esc_html( $p['title'] ); ?></h3>
						<p class="proj-loc"><?php pps_icon( 'pin', 14 ); ?> <?php echo esc_html( $p['location'] ); ?></p>
						<p class="proj-cap"><span class="pill"><?php echo esc_html( $p['capacity'] ); ?></span></p>
						<p class="proj-blurb"><?php echo esc_html( $p['blurb'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- BY THE NUMBERS -->
<section class="section-pad bg-soft-up">
	<div class="container">
		<?php pps_section_header( 'By the Numbers', 'Solar at scale across Rayalaseema' ); ?>
		<div class="bignum-grid">
			<?php
			$nums = array(
				array( 'v' => '5+', 'l' => 'Megawatts Installed' ),
				array( 'v' => '1500+', 'l' => 'Homes Powered' ),
				array( 'v' => '50+', 'l' => 'Commercial Sites' ),
				array( 'v' => '₹4Cr+', 'l' => 'Annual Savings (Customer)' ),
			);
			foreach ( $nums as $n ) :
				?>
				<div class="bignum sun-gradient">
					<p class="v"><?php echo esc_html( $n['v'] ); ?></p>
					<p class="l"><?php echo esc_html( $n['l'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- SECTORS -->
<section class="section-pad">
	<div class="container">
		<?php pps_section_header( 'Sectors', 'We power every kind of property' ); ?>
		<div class="cards-3">
			<?php foreach ( pps_sectors() as $s ) : ?>
				<div class="sector-card card-hover">
					<div class="emoji"><?php echo esc_html( $s['emoji'] ); ?></div>
					<h3><?php echo esc_html( $s['title'] ); ?></h3>
					<p><?php echo esc_html( $s['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
pps_cta_banner(
	'Be our next success story',
	"Whether it's your home, factory or farm — we'll size it, finance it and switch it on."
);
?>
<div class="spacer-16"></div>

<?php
get_footer();
