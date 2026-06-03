<?php
/**
 * Generic page template (any page without a more specific template).
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	pps_page_header( get_the_title(), '', array( array( 'label' => 'Home', 'href' => home_url( '/' ) ), array( 'label' => get_the_title() ) ) );
	?>
	<section class="section-pad">
		<div class="container" style="max-width:48rem">
			<div class="prose entry-content"><?php the_content(); ?></div>
		</div>
	</section>
	<div class="spacer-16"></div>
	<?php
endwhile;

get_footer();
