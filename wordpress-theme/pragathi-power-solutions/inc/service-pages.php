<?php
/**
 * Individual service pages — content seeded as editable Gutenberg blocks.
 *
 * Each service gets a real WordPress page (post_type=page) whose content is
 * stored as core block markup, so it is fully editable in the default
 * Gutenberg block editor. Pages are created on theme activation and can also
 * be (re)seeded with: wp eval 'pps_seed_service_pages();'
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Definitions for the six service pages.
 *
 * Keyed by the page slug. Each entry: title, intro, included[], why,
 * optional extra section (note_h / note_p).
 *
 * @return array
 */
function pps_service_pages() {
	return array(
		'solar-rooftop-systems' => array(
			'title'    => 'Solar Rooftop Systems',
			'intro'    => 'Turn your rooftop into a power plant. We design, supply and install on-grid, off-grid and hybrid rooftop solar systems for homes, housing societies, commercial buildings and industries across the Tirupati & Chittoor districts — engineered with Tata Power Solar components and backed by full subsidy and net-metering support.',
			'included_heading' => 'Key Benefits',
			'included' => array(
				'Reduce electricity bills by up to 80–90%',
				'25+ years of solar panel life',
				'Low maintenance and high reliability',
				'Environment-friendly renewable energy',
				'Increase property value',
				'Net Metering facility to export excess power to the grid',
				'Eligible for government subsidies (as applicable)',
			),
			'suitable_for' => array(
				'Individual Houses',
				'Apartments & Residential Communities',
				'Commercial Buildings',
				'Industries & Factories',
				'Educational Institutions',
				'Hospitals & Government Buildings',
			),
			'types_heading' => 'Types of Solar Rooftop Systems',
			'types_lead' => 'There are three main types of solar rooftop systems:',
			'types' => array(
				'On-Grid Solar System',
				'Off-Grid Solar System',
				'Hybrid System',
			),
			'why'      => 'A rooftop plant cuts your electricity bill by 70–90% from day one and typically pays for itself in 4–6 years — after which you get decades of nearly free power. It also raises your property value and sharply reduces your carbon footprint.',
			'note_h'   => 'Sizing & space',
			'note_p'   => 'Systems scale from 1 kW for homes up to multi-MW for industry. A typical 3 kW home system needs about 230–250 sq ft of shade-free roof. We confirm the right size with a free site survey.',
		),
		'solar-water-heating'  => array(
			'title'    => 'Solar Thermal — Water Heating Solutions',
			'intro'    => 'Reliable, eco-friendly hot water for homes, hotels, hospitals, hostels, commercial establishments and industries — delivered with solar water heaters and heat pumps sized precisely to your daily demand.',
			'included' => array(
				'Available in capacities from 100 litres per day (LPD) upward',
				'Choice of pressurised and non-pressurised models',
				'High-performance BIS-certified solar collectors',
				'Heat-pump option for low-sunlight or space-constrained sites',
				'Significant reduction in geyser electricity usage',
				'Reliable year-round hot water with low maintenance',
			),
			'why'      => 'Water heating is one of the biggest electricity loads in any building. A solar water heater or heat pump slashes that cost, runs quietly for years and needs very little upkeep — paying back quickly for homes, hotels, hostels and industry alike.',
			'note_h'   => 'Short on roof space?',
			'note_p'   => 'Where rooftop area or sunlight is limited, we install a Heat Pump that delivers the same reliable hot water using a fraction of the electricity of a conventional geyser.',
		),
		'solar-street-lights'  => array(
			'title'    => 'Solar Street Lights',
			'intro'    => 'All-in-one integrated solar street lights that switch on at dusk and off at dawn — no wiring, no trenching and no electricity bills. Ideal for layouts, gated communities, roads, factories, farms and campuses.',
			'included' => array(
				'Integrated all-in-one luminaires starting from 12W up to 60W',
				'Automatic dusk-to-dawn operation with motion sensing',
				'Lithium-ion storage with 5+ year life',
				'Zero electricity bills and minimal maintenance',
				'Quick pole-mount installation with no grid cabling',
			),
			'why'      => 'Because each light is self-powered, there is no cabling to lay and no monthly bill to pay. They are perfect for new layouts and remote stretches where running grid power is expensive or impractical.',
		),
		'solar-fencing'        => array(
			'title'    => 'Solar Fencing',
			'intro'    => 'Protect your farm, estate or property with solar-powered electric fencing — a safe, high-voltage low-current deterrent that runs entirely on sunlight and keeps working through power cuts.',
			'included' => array(
				'Solar-charged energiser — no grid power required',
				'Up to 10 km perimeter on a single energiser',
				'Audible alarm and battery backup',
				'Effective crop and livestock protection',
				'Low running cost and minimal maintenance',
			),
			'why'      => 'A solar electric fence deters intruders, stray cattle and wildlife without harming them, protecting your crops and assets around the clock — even during outages, thanks to onboard battery backup.',
		),
		'solar-pumpsets'       => array(
			'title'    => 'Solar Pumpsets',
			'intro'    => 'Diesel-free, bill-free water pumping for agriculture. Our solar pumpsets run your borewell or open-well pump directly on solar power, with PM-KUSUM subsidy assistance handled for you.',
			'included' => array(
				'AC and DC pump configurations',
				'MNRE-approved controllers',
				'PM-KUSUM scheme assistance',
				'Surface and submersible pump options',
				'5-year manufacturer warranty',
			),
			'why'      => 'Solar pumping removes the cost and hassle of diesel and unreliable grid supply, giving farmers dependable daytime irrigation at almost zero running cost — with strong government subsidy support under PM-KUSUM.',
		),
		'solar-amc'            => array(
			'title'    => 'Operation & Maintenance (AMC)',
			'intro'    => 'Keep your solar plant generating at its peak with our Annual Maintenance Contracts. Preventive care, performance monitoring and priority support ensure your investment keeps paying back, year after year.',
			'included' => array(
				'Quarterly preventive maintenance and panel cleaning',
				'Performance ratio monitoring and reporting',
				'24×7 priority support',
				'Spare parts and inverter service',
				'Health checks and prompt fault rectification',
			),
			'why'      => 'Dust, shading and ageing components quietly erode solar output over time. A structured AMC keeps generation high, catches faults early and protects your warranty — so you get the full return your plant was designed for.',
		),
	);
}

/**
 * Build the Gutenberg block markup for one service page.
 *
 * @param array $d Service definition.
 * @return string Block markup for post_content.
 */
function pps_build_service_content( $d ) {
	$contact = esc_url( home_url( '/contact/' ) );
	$wa      = esc_url( pps( 'whatsapp' ) );

	$out  = "<!-- wp:paragraph -->\n<p>" . esc_html( $d['intro'] ) . "</p>\n<!-- /wp:paragraph -->\n\n";

	$inc_heading = ! empty( $d['included_heading'] ) ? $d['included_heading'] : 'What&#8217;s included';
	$out .= "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">" . esc_html( $inc_heading ) . "</h2>\n<!-- /wp:heading -->\n\n";
	$out .= "<!-- wp:list -->\n<ul class=\"wp-block-list\">";
	foreach ( $d['included'] as $item ) {
		$out .= "<!-- wp:list-item -->\n<li>" . esc_html( $item ) . "</li>\n<!-- /wp:list-item -->\n";
	}
	$out .= "</ul>\n<!-- /wp:list -->\n\n";

	if ( ! empty( $d['suitable_for'] ) ) {
		$out .= "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Suitable For</h2>\n<!-- /wp:heading -->\n\n";
		$out .= "<!-- wp:list -->\n<ul class=\"wp-block-list\">";
		foreach ( $d['suitable_for'] as $item ) {
			$out .= "<!-- wp:list-item -->\n<li>" . esc_html( $item ) . "</li>\n<!-- /wp:list-item -->\n";
		}
		$out .= "</ul>\n<!-- /wp:list -->\n\n";
	}

	if ( ! empty( $d['why'] ) ) {
		$out .= "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Why it makes sense</h2>\n<!-- /wp:heading -->\n\n";
		$out .= "<!-- wp:paragraph -->\n<p>" . esc_html( $d['why'] ) . "</p>\n<!-- /wp:paragraph -->\n\n";
	}

	if ( ! empty( $d['note_h'] ) ) {
		$out .= "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">" . esc_html( $d['note_h'] ) . "</h2>\n<!-- /wp:heading -->\n\n";
		$out .= "<!-- wp:paragraph -->\n<p>" . esc_html( $d['note_p'] ) . "</p>\n<!-- /wp:paragraph -->\n\n";
	}

	if ( ! empty( $d['types'] ) ) {
		$types_heading = ! empty( $d['types_heading'] ) ? $d['types_heading'] : 'Types';
		$out .= "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">" . esc_html( $types_heading ) . "</h2>\n<!-- /wp:heading -->\n\n";
		if ( ! empty( $d['types_lead'] ) ) {
			$out .= "<!-- wp:paragraph -->\n<p>" . esc_html( $d['types_lead'] ) . "</p>\n<!-- /wp:paragraph -->\n\n";
		}
		$out .= "<!-- wp:list {\"ordered\":true} -->\n<ol class=\"wp-block-list\">";
		foreach ( $d['types'] as $item ) {
			$out .= "<!-- wp:list-item -->\n<li>" . esc_html( $item ) . "</li>\n<!-- /wp:list-item -->\n";
		}
		$out .= "</ol>\n<!-- /wp:list -->\n\n";
	}

	$out .= "<!-- wp:separator -->\n<hr class=\"wp-block-separator has-alpha-channel-opacity\"/>\n<!-- /wp:separator -->\n\n";

	$out .= "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Talk to our solar team</h2>\n<!-- /wp:heading -->\n\n";
	$out .= "<!-- wp:paragraph -->\n<p>Get a free consultation and a sized proposal for your site. We handle design, installation, subsidy paperwork and after-sales support end to end.</p>\n<!-- /wp:paragraph -->\n\n";

	$out .= "<!-- wp:buttons -->\n<div class=\"wp-block-buttons\">";
	$out .= "<!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link wp-element-button\" href=\"" . $contact . "\">Get a Free Quote</a></div>\n<!-- /wp:button -->\n";
	$out .= "<!-- wp:button {\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link wp-element-button\" href=\"" . $wa . "\">WhatsApp Us</a></div>\n<!-- /wp:button -->";
	$out .= "</div>\n<!-- /wp:buttons -->";

	return $out;
}

/**
 * Create the six service pages if they do not already exist.
 *
 * Idempotent: existing pages are left untouched so user edits in Gutenberg are
 * never overwritten.
 */
function pps_seed_service_pages() {
	foreach ( pps_service_pages() as $slug => $d ) {
		if ( get_page_by_path( $slug ) ) {
			continue;
		}
		wp_insert_post(
			array(
				'post_title'   => $d['title'],
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => pps_build_service_content( $d ),
			)
		);
	}
}

/**
 * Force the six service pages to the theme's content and the default template.
 *
 * Unlike pps_seed_service_pages(), this OVERWRITES existing pages — used once
 * to replace any leftover page-builder pages that happen to share these slugs.
 * Run with: wp eval 'pps_reseed_service_pages();'
 */
function pps_reseed_service_pages() {
	foreach ( pps_service_pages() as $slug => $d ) {
		$existing = get_page_by_path( $slug );
		$args     = array(
			'post_title'   => $d['title'],
			'post_name'    => $slug,
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => pps_build_service_content( $d ),
		);
		if ( $existing ) {
			$args['ID'] = $existing->ID;
			$pid        = wp_update_post( $args );
		} else {
			$pid = wp_insert_post( $args );
		}
		if ( $pid && ! is_wp_error( $pid ) ) {
			// Render through the default template, clearing any page-builder template.
			update_post_meta( $pid, '_wp_page_template', 'default' );
			foreach ( array( '_elementor_edit_mode', '_elementor_template_type', '_elementor_data', '_elementor_version', '_elementor_page_settings', '_elementor_css' ) as $meta ) {
				delete_post_meta( $pid, $meta );
			}
		}
	}
}
