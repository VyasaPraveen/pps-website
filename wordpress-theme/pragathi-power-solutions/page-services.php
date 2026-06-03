<?php
/**
 * Template Name: PPS Services
 * Page template for the Services page (slug: services).
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

pps_page_header(
	'Complete solar solutions, one trusted partner.',
	'Whether you need a 1 kW home rooftop or a 100 kW industrial plant — we design, supply, install and maintain it end-to-end.',
	array(
		array( 'label' => 'Home', 'href' => home_url( '/' ) ),
		array( 'label' => 'Services' ),
	)
);
?>

<!-- SERVICES GRID -->
<section class="section-pad">
	<div class="container">
		<?php pps_section_header( 'Our Services', 'Six pillars of clean energy', 'Every solution we offer is designed to maximise your savings, ease, and peace of mind.' ); ?>
		<div class="cards-3">
			<?php foreach ( pps_services() as $s ) { pps_service_card( $s ); } ?>
		</div>
	</div>
</section>

<!-- SYSTEM TYPES -->
<section class="section-pad bg-soft-up">
	<div class="container">
		<?php pps_section_header( 'System Types', 'On-grid, Off-grid or Hybrid?', 'The right configuration depends on your power-cut frequency, budget and self-consumption goals.' ); ?>
		<div class="sys-grid">
			<?php foreach ( pps_system_types() as $t ) : ?>
				<article class="sys-card card-hover">
					<span class="pill"><?php echo esc_html( $t['tag'] ); ?></span>
					<h3><?php echo esc_html( $t['title'] ); ?></h3>
					<p class="txt"><?php echo esc_html( $t['text'] ); ?></p>
					<ul class="check-list">
						<?php foreach ( $t['features'] as $f ) : ?>
							<li><span class="check-i"><?php pps_icon( 'check', 16 ); ?></span><span><?php echo esc_html( $f ); ?></span></li>
						<?php endforeach; ?>
					</ul>
					<p class="best">Best for: <?php echo esc_html( $t['best_for'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- CALCULATOR -->
<section class="section-pad">
	<div class="container">
		<?php pps_section_header( 'Estimate', 'Calculate your solar payback', 'A 3 kW residential plant typically pays back in under 5 years and runs for 25+.' ); ?>
		<div style="margin-top:3rem"><?php pps_savings_calculator(); ?></div>
	</div>
</section>

<!-- PROCESS -->
<section class="section-pad bg-soft-down">
	<div class="container">
		<?php pps_section_header( 'Process', 'From enquiry to commissioning', 'A predictable, transparent journey. No surprises. Just sunlight to power.' ); ?>
		<div style="margin-top:3rem"><?php pps_process_timeline(); ?></div>
	</div>
</section>

<?php
pps_cta_banner(
	'Got a project in mind?',
	"Send your latest electricity bill on WhatsApp. We'll send back a sized proposal within 24 hours."
);
?>
<div class="spacer-16"></div>

<?php
get_footer();
