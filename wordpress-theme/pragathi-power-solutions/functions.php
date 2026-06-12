<?php
/**
 * Pragathi Power Solutions theme functions.
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PPS_VERSION', '1.3.2' );

require_once get_template_directory() . '/inc/data.php';
require_once get_template_directory() . '/inc/icons.php';
require_once get_template_directory() . '/inc/template-helpers.php';
require_once get_template_directory() . '/inc/service-pages.php';

/**
 * Theme setup.
 */
function pps_setup() {
	load_theme_textdomain( 'pps', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 840,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'pps' ),
			'footer'  => __( 'Footer Menu', 'pps' ),
		)
	);
}
add_action( 'after_setup_theme', 'pps_setup' );

/**
 * Enqueue styles and scripts.
 */
function pps_assets() {
	$theme_uri = get_template_directory_uri();

	// Google Font: Poppins (matches the original design).
	wp_enqueue_style(
		'pps-fonts',
		'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'pps-style', get_stylesheet_uri(), array( 'pps-fonts' ), PPS_VERSION );

	wp_enqueue_script(
		'pps-main',
		$theme_uri . '/assets/js/main.js',
		array(),
		PPS_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	// Pass site data the calculator/contact form need.
	wp_localize_script(
		'pps-main',
		'PPS',
		array(
			'whatsappRaw' => pps( 'whatsapp_raw' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'pps_assets' );

/**
 * Preconnect to the Google Fonts hosts so the Poppins webfont starts
 * downloading sooner (faster first paint).
 */
function pps_resource_hints( $hints, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$hints[] = array(
			'href' => 'https://fonts.googleapis.com',
		);
		$hints[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'pps_resource_hints', 10, 2 );

/**
 * Remove the WordPress emoji detection script and styles (performance).
 * Modern browsers render native unicode emoji fine without this.
 */
function pps_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'pps_disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'pps_disable_emojis_dns_prefetch', 10, 2 );
}
add_action( 'init', 'pps_disable_emojis' );

/** Strip the emoji TinyMCE plugin. */
function pps_disable_emojis_tinymce( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

/** Drop the s.w.org emoji dns-prefetch hint. */
function pps_disable_emojis_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		$emoji_svg = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/' );
		$urls      = array_diff( $urls, array( $emoji_svg ) );
	}
	return $urls;
}

/**
 * Preload the header logo (the above-the-fold LCP image on every page).
 */
function pps_preload_lcp() {
	printf(
		'<link rel="preload" as="image" href="%s" type="image/webp" fetchpriority="high" />' . "\n",
		esc_url( get_template_directory_uri() . '/assets/img/pps-logo-full.webp' )
	);
}
add_action( 'wp_head', 'pps_preload_lcp', 1 );

/**
 * Emit LocalBusiness structured data (JSON-LD) for local SEO / rich results.
 * Complements Yoast's WebSite/WebPage graph with full business details.
 */
function pps_local_business_schema() {
	if ( ! is_front_page() && ! is_page( 'contact' ) ) {
		return;
	}

	$same_as = array_values(
		array_filter(
			array( pps( 'facebook' ), pps( 'instagram' ), pps( 'youtube' ) )
		)
	);

	$schema = array(
		'@context'                  => 'https://schema.org',
		'@type'                     => 'LocalBusiness',
		'@id'                       => home_url( '/#business' ),
		'name'                      => pps( 'name' ),
		'description'               => 'Authorised TATA Power Solar channel partner in the Tirupati & Chittoor districts. Rooftop solar, solar water heating & heat pumps, street lights, fencing, pumpsets and AMC.',
		'url'                       => home_url( '/' ),
		'logo'                      => get_template_directory_uri() . '/assets/img/pps-logo-mark.png',
		'image'                     => get_template_directory_uri() . '/assets/img/pps-logo-full.png',
		'telephone'                 => pps( 'phone' ),
		'email'                     => pps( 'email' ),
		'priceRange'                => '₹₹',
		'foundingDate'              => '2012',
		'address'                   => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => 'Ground Floor, Ramanujam Circle, 19-3-12/J, Tiruchanoor Road',
			'addressLocality' => 'Tirupati',
			'addressRegion'   => 'Andhra Pradesh',
			'postalCode'      => '517501',
			'addressCountry'  => 'IN',
		),
		'geo'                       => array(
			'@type'     => 'GeoCoordinates',
			'latitude'  => '13.6256759',
			'longitude' => '79.430764',
		),
		'areaServed'                => array( 'Tirupati', 'Chittoor', 'Rayalaseema', 'Andhra Pradesh' ),
		'openingHoursSpecification' => array(
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ),
				'opens'     => '09:00',
				'closes'    => '20:00',
			),
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => 'Sunday',
				'opens'     => '09:00',
				'closes'    => '13:30',
			),
		),
	);

	if ( $same_as ) {
		$schema['sameAs'] = $same_as;
	}

	echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
}
add_action( 'wp_head', 'pps_local_business_schema' );

/**
 * Customizer: company details so non-developers can edit contact info.
 */
function pps_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'pps_company',
		array(
			'title'    => __( 'Pragathi: Company Details', 'pps' ),
			'priority' => 30,
		)
	);

	$fields = array(
		'pps_name'        => __( 'Company Name', 'pps' ),
		'pps_designation' => __( 'Designation / Tagline line', 'pps' ),
		'pps_address'     => __( 'Address', 'pps' ),
		'pps_phone'       => __( 'Phone (display)', 'pps' ),
		'pps_phone_raw'   => __( 'Phone (digits only, for WhatsApp)', 'pps' ),
		'pps_email'       => __( 'Email', 'pps' ),
		'pps_whatsapp'    => __( 'WhatsApp link', 'pps' ),
		'pps_facebook'    => __( 'Facebook URL', 'pps' ),
		'pps_instagram'   => __( 'Instagram URL', 'pps' ),
		'pps_youtube'     => __( 'YouTube URL', 'pps' ),
	);

	foreach ( $fields as $id => $label ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'   => $label,
				'section' => 'pps_company',
				'type'    => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'pps_customize_register' );

/**
 * One-time setup on activation: create the core pages, assign them the
 * matching templates, set the static front page, and build a primary menu.
 * This makes the theme render the full site immediately after activation.
 */
function pps_after_switch_theme() {
	$pages = array(
		'home'     => array( 'title' => 'Home', 'template' => '' ),
		'about'    => array( 'title' => 'About', 'template' => '' ),
		'services' => array( 'title' => 'Services', 'template' => '' ),
		'projects' => array( 'title' => 'Projects', 'template' => '' ),
		'gallery'  => array( 'title' => 'Gallery', 'template' => '' ),
		'contact'  => array( 'title' => 'Contact', 'template' => '' ),
	);

	$ids = array();
	foreach ( $pages as $slug => $info ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			$ids[ $slug ] = $existing->ID;
			continue;
		}
		$ids[ $slug ] = wp_insert_post(
			array(
				'post_title'   => $info['title'],
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			)
		);
	}

	// Static front page -> Home; templates resolve via page-{slug}.php.
	if ( ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
	}

	// Build a primary menu if one is not already assigned.
	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( empty( $locations['primary'] ) ) {
		$menu_name = 'Primary';
		$menu      = wp_get_nav_menu_object( $menu_name );
		$menu_id   = $menu ? $menu->term_id : wp_create_nav_menu( $menu_name );

		if ( ! is_wp_error( $menu_id ) ) {
			$order = 1;
			foreach ( array( 'home', 'about', 'services', 'projects', 'gallery', 'contact' ) as $slug ) {
				if ( empty( $ids[ $slug ] ) ) {
					continue;
				}
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-object-id' => $ids[ $slug ],
						'menu-item-object'    => 'page',
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
						'menu-item-position'  => $order++,
					)
				);
			}
			$locations['primary'] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	// Seed the individual service pages (editable in Gutenberg).
	pps_seed_service_pages();

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'pps_after_switch_theme' );

/**
 * Add a body class so we can scope per-template styles if needed.
 */
function pps_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'pps-front';
	}
	return $classes;
}
add_filter( 'body_class', 'pps_body_classes' );
