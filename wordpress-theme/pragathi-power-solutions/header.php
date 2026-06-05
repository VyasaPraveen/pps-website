<?php
/**
 * Header: opens the document and renders the sticky navbar.
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="theme-color" content="#1d2f7e" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<script>document.documentElement.className += ' js';</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'pps' ); ?></a>

<header class="site-header" data-header>
	<span class="header-accent" aria-hidden="true"></span>
	<div class="container">
		<div class="nav-bar">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" aria-label="<?php echo esc_attr( pps( 'name' ) ); ?> home">
				<?php pps_logo_full(); ?>
			</a>

			<nav class="nav-menu" aria-label="<?php esc_attr_e( 'Primary', 'pps' ); ?>">
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'items_wrap'     => '%3$s',
							'depth'          => 1,
						)
					);
				} else {
					foreach ( pps_nav_links() as $link ) {
						$url    = home_url( '/' . $link['slug'] );
						$active = ( '' === $link['slug'] && is_front_page() ) || ( $link['slug'] && is_page( $link['slug'] ) );
						printf(
							'<a href="%s" class="%s">%s</a>',
							esc_url( $url ),
							$active ? 'active' : '',
							esc_html( $link['label'] )
						);
					}
				}
				?>
			</nav>

			<div class="nav-cta">
				<a href="<?php echo esc_attr( pps( 'phone_href' ) ); ?>" class="btn btn-primary nav-call"><?php pps_icon( 'phone', 18 ); ?> Call Now</a>
			</div>

			<button type="button" class="nav-toggle" data-nav-toggle aria-label="<?php esc_attr_e( 'Toggle menu', 'pps' ); ?>" aria-expanded="false">
				<span data-icon-menu><?php pps_icon( 'menu', 24 ); ?></span>
				<span data-icon-close hidden><?php pps_icon( 'close', 24 ); ?></span>
			</button>
		</div>
	</div>

	<div class="mobile-menu" data-mobile-menu>
		<nav aria-label="<?php esc_attr_e( 'Mobile', 'pps' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'items_wrap'     => '%3$s',
						'depth'          => 1,
					)
				);
			} else {
				foreach ( pps_nav_links() as $link ) {
					printf( '<a href="%s">%s</a>', esc_url( home_url( '/' . $link['slug'] ) ), esc_html( $link['label'] ) );
				}
			}
			?>
			<div class="mobile-cta">
				<a href="<?php echo esc_attr( pps( 'phone_href' ) ); ?>" class="btn btn-outline"><?php pps_icon( 'phone', 18 ); ?> Call</a>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Get Quote</a>
			</div>
		</nav>
	</div>
</header>

<main class="site-main" id="content">
