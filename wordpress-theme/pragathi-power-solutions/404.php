<?php
/**
 * 404 — not found.
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<section class="page-header hero-gradient">
	<span class="bg-grid" aria-hidden="true"></span>
	<span class="blob blob-sun" aria-hidden="true" style="top:-6rem;right:-6rem;height:18rem;width:18rem"></span>
	<div class="container page-header-inner text-center" style="max-width:42rem;margin-inline:auto">
		<p class="text-shimmer" style="font-size:5rem;font-weight:800;line-height:1">404</p>
		<h1 class="page-title" style="margin-inline:auto">This page drifted off the grid.</h1>
		<p class="page-desc" style="margin-inline:auto">The page you&rsquo;re looking for doesn&rsquo;t exist or has moved. Let&rsquo;s get you back into the sunshine.</p>
		<div class="btn-row" style="justify-content:center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Home <?php pps_icon( 'arrow-right', 16 ); ?></a>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline">Contact Us</a>
		</div>
	</div>
</section>
<div class="spacer-16"></div>
<?php
get_footer();
