<?php
/**
 * Fallback template (blog index / archives / search).
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$header_title = is_search()
	? sprintf( esc_html__( 'Search results for: %s', 'pps' ), get_search_query() )
	: ( is_home() ? esc_html__( 'From the Blog', 'pps' ) : wp_get_document_title() );

pps_page_header( $header_title, '', array( array( 'label' => 'Home', 'href' => home_url( '/' ) ), array( 'label' => 'Blog' ) ) );
?>

<section class="section-pad">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="cards-3">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'card card-hover' ); ?> style="padding:1.5rem">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" style="display:block;border-radius:1rem;overflow:hidden;margin-bottom:1rem"><?php the_post_thumbnail( 'medium_large' ); ?></a>
						<?php endif; ?>
						<h2 style="font-size:1.25rem;font-weight:700"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p style="margin-top:.5rem;font-size:.875rem;color:var(--slate-600)"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
						<a href="<?php the_permalink(); ?>" class="link-more">Read more <?php pps_icon( 'arrow-right', 16 ); ?></a>
					</article>
					<?php
				endwhile;
				?>
			</div>
			<div style="margin-top:3rem;text-align:center"><?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?></div>
		<?php else : ?>
			<p class="text-center" style="color:var(--slate-600)"><?php esc_html_e( 'Nothing found.', 'pps' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<div class="spacer-16"></div>
<?php
get_footer();
