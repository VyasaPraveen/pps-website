<?php
/**
 * Central content data for the Pragathi Power Solutions theme.
 * Mirrors the original site data so templates stay declarative.
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Site-wide details. Values fall back to these defaults but can be
 * overridden in Appearance > Customize > Pragathi: Company Details.
 */
function pps_site() {
	$defaults = array(
		'name'          => 'Pragathi Power Solutions',
		'short_name'    => 'PPS',
		'tagline'       => 'Power from Sun to Power Everyone',
		'tagline_hindi' => 'Ghar Ghar mei Suraj ki Shakti',
		'founded'       => 'December 2012',
		'designation'   => 'Authorised TATA Power Solar Partners in Rayalaseema',
		'city'          => 'Tirupati',
		'region'        => 'Rayalaseema, Andhra Pradesh',
		'address'       => 'Ramanuja Circle, Tiruchanoor Road, OPP Fly Over Pillar No: 2, Tirupati - 517501',
		'phone'         => '+91 9701426440',
		'phone_raw'     => '919701426440',
		'email'         => 'ppstirupathi@gmail.com',
		'whatsapp'      => 'https://wa.link/r70puj',
		'whatsapp_raw'  => 'https://wa.me/919701426440',
		'facebook'      => 'https://facebook.com/PragathiPowerSolutions',
		'instagram'     => 'https://instagram.com/pragathi_power_solutions',
		'youtube'       => 'https://youtube.com/@PragathiPowerSolutionsOfficial',
		'linkedin'      => 'https://www.linkedin.com/company/pragathi-power-solutions',
	);

	// Allow Customizer overrides where set.
	$map = array(
		'name'        => 'pps_name',
		'designation' => 'pps_designation',
		'address'     => 'pps_address',
		'phone'       => 'pps_phone',
		'phone_raw'   => 'pps_phone_raw',
		'email'       => 'pps_email',
		'whatsapp'    => 'pps_whatsapp',
		'facebook'    => 'pps_facebook',
		'instagram'   => 'pps_instagram',
		'youtube'     => 'pps_youtube',
		'linkedin'    => 'pps_linkedin',
	);
	foreach ( $map as $key => $setting ) {
		$val = get_theme_mod( $setting, '' );
		if ( '' !== $val ) {
			$defaults[ $key ] = $val;
		}
	}

	$defaults['phone_href']    = 'tel:' . preg_replace( '/[^0-9+]/', '', $defaults['phone'] );
	$defaults['years']         = ( (int) gmdate( 'Y' ) ) - 2012;
	$defaults['whatsapp_raw']  = 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $defaults['phone_raw'] );

	return $defaults;
}

/** Convenience getter for a single site value. */
function pps( $key ) {
	$s = pps_site();
	return isset( $s[ $key ] ) ? $s[ $key ] : '';
}

/** Primary navigation used for the fallback menu. */
function pps_nav_links() {
	return array(
		array( 'slug' => '', 'label' => 'Home' ),
		array( 'slug' => 'about', 'label' => 'About' ),
		array( 'slug' => 'services', 'label' => 'Services' ),
		array( 'slug' => 'projects', 'label' => 'Projects' ),
		array( 'slug' => 'gallery', 'label' => 'Gallery' ),
		array( 'slug' => 'contact', 'label' => 'Contact' ),
	);
}

function pps_services() {
	return array(
		array(
			'slug'        => 'rooftop',
			'title'       => 'Solar Rooftop Systems',
			'short'       => 'On-grid power plants for homes and businesses.',
			'icon'        => 'panel',
			'highlights'  => array(
				'On-grid, off-grid and hybrid configurations',
				'Net metering with state DISCOM',
				'PM Surya Ghar subsidy assistance',
				'TATA Power Solar premium panels',
			),
		),
		array(
			'slug'        => 'thermal',
			'title'       => 'Solar Thermal & Hot Water',
			'short'       => 'Reliable hot water for homes, hotels and industry.',
			'icon'        => 'thermal',
			'highlights'  => array(
				'100 to 5,000 litres per day capacity',
				'Pressurised and non-pressurised models',
				'BIS-certified collectors',
				'Cuts geyser power use to near zero',
			),
		),
		array(
			'slug'        => 'street-lights',
			'title'       => 'Solar Street Lights',
			'short'       => 'All-in-one lighting powered entirely by sunlight.',
			'icon'        => 'streetlight',
			'highlights'  => array(
				'12W to 60W integrated luminaires',
				'Auto dusk-to-dawn operation',
				'Lithium-ion storage, 5+ year life',
				'Zero electricity bills',
			),
		),
		array(
			'slug'        => 'fence',
			'title'       => 'Solar Fencing',
			'short'       => 'Solar-powered electric fences for farms and estates.',
			'icon'        => 'fence',
			'highlights'  => array(
				'Solar-charged energiser',
				'Up to 10 km perimeter on a single charger',
				'Audible alarm and battery backup',
				'Crop and livestock protection',
			),
		),
		array(
			'slug'        => 'pumps',
			'title'       => 'Solar Pumpsets',
			'short'       => 'Diesel-free water pumping for agriculture.',
			'icon'        => 'pump',
			'highlights'  => array(
				'AC and DC pump configurations',
				'MNRE-approved controllers',
				'PM-KUSUM scheme assistance',
				'5-year manufacturer warranty',
			),
		),
		array(
			'slug'        => 'amc',
			'title'       => 'Operation & Maintenance (AMC)',
			'short'       => 'Annual care to keep your plant generating at peak.',
			'icon'        => 'amc',
			'highlights'  => array(
				'Quarterly preventive maintenance',
				'Performance ratio monitoring',
				'24x7 priority support',
				'Spare parts and inverter service',
			),
		),
	);
}

function pps_benefits() {
	return array(
		array( 'icon' => 'rupee', 'title' => 'Lower Bills', 'description' => 'Slash monthly electricity expenses by 70-90% from day one.' ),
		array( 'icon' => 'sun', 'title' => 'Unlimited Energy', 'description' => 'Sunlight is infinite. Tirupati gets 300+ sunny days a year.' ),
		array( 'icon' => 'leaf', 'title' => 'Clean & Green', 'description' => 'Zero emissions. Each kW saves ~1.2 tonnes of CO₂ every year.' ),
		array( 'icon' => 'wrench', 'title' => 'Easy Care', 'description' => 'Just monthly cleaning. No moving parts, no fuel, no fuss.' ),
		array( 'icon' => 'battery', 'title' => 'Self-Sufficient', 'description' => 'Reduce reliance on the grid with battery storage options.' ),
		array( 'icon' => 'gift', 'title' => 'Govt. Subsidies', 'description' => 'Up to ₹78,000 under PM Surya Ghar Muft Bijli Yojana.' ),
		array( 'icon' => 'home', 'title' => 'Higher Property Value', 'description' => 'Solar homes resell for measurably more in Indian metros.' ),
		array( 'icon' => 'shield', 'title' => 'Continuous Supply', 'description' => 'Hybrid systems keep critical loads on during outages.' ),
		array( 'icon' => 'scale', 'title' => 'Flexible Setup', 'description' => 'Scale from a 1 kW home to a megawatt commercial plant.' ),
		array( 'icon' => 'rocket', 'title' => 'Advanced Tech', 'description' => 'Mono-PERC, bifacial and TopCon panels for maximum yield.' ),
		array( 'icon' => 'mute', 'title' => 'Silent Operation', 'description' => 'Generates power in absolute silence. Zero noise pollution.' ),
		array( 'icon' => 'trending', 'title' => 'Tax Benefits', 'description' => 'Accelerated depreciation and GST advantages for businesses.' ),
	);
}

function pps_process() {
	return array(
		array( 'step' => 1, 'title' => 'Free Consultation', 'description' => 'Share your bill and roof details. We assess your needs over a call or visit at no cost.' ),
		array( 'step' => 2, 'title' => 'Site Survey & Design', 'description' => 'Our engineers measure shading, structure load and orientation to design your custom plant.' ),
		array( 'step' => 3, 'title' => 'Professional Installation', 'description' => 'Certified technicians install panels, inverters and net-meter as per CEIG and DISCOM norms.' ),
		array( 'step' => 4, 'title' => 'Switch On & Save', 'description' => 'Plant is commissioned and you start generating clean power. We handle subsidy paperwork end-to-end.' ),
	);
}

function pps_stats() {
	return array(
		array( 'value' => '13', 'suffix' => '+', 'label' => 'Years in Solar' ),
		array( 'value' => '1500', 'suffix' => '+', 'label' => 'Happy Households' ),
		array( 'value' => '5', 'suffix' => 'MW+', 'label' => 'Installed Capacity' ),
		array( 'value' => '140', 'suffix' => '+', 'label' => 'AMC Contracts' ),
	);
}

function pps_faqs() {
	return array(
		array( 'q' => 'How long do solar panels last?', 'a' => 'Modern panels carry a 25-year linear performance warranty and typically generate for 30+ years. Inverters are replaced once every 10-15 years.' ),
		array( 'q' => 'How much roof space do I need?', 'a' => 'A 3 kW system needs about 230-250 sq ft of shadow-free roof. We do a free site survey to confirm what your roof can fit.' ),
		array( 'q' => 'What does maintenance involve?', 'a' => 'Just monthly water cleaning of the panels and an annual professional check-up. Our AMC handles everything if you prefer to hand it off.' ),
		array( 'q' => 'What government subsidy is available?', 'a' => 'PM Surya Ghar Muft Bijli Yojana offers up to ₹78,000 for residential rooftop installations. We file the entire subsidy application for you.' ),
		array( 'q' => 'Will it work during a power cut?', 'a' => 'On-grid systems shut down for safety during outages. Hybrid systems with battery backup keep your essential loads running through power cuts.' ),
		array( 'q' => 'How quickly do I recover my investment?', 'a' => 'Most residential customers in Tirupati break even in 4 to 6 years. The remaining 20+ years of generation is essentially free electricity.' ),
	);
}

function pps_projects() {
	return array(
		array( 'title' => 'Residential Rooftop', 'location' => 'Tirupati, A.P.', 'capacity' => '5 kW On-Grid', 'type' => 'Residential', 'year' => '2024', 'blurb' => 'TATA Power Solar mono-PERC panels with net metering. Cut monthly bill from ₹4,200 to ₹180.' ),
		array( 'title' => 'Educational Campus', 'location' => 'Chittoor, A.P.', 'capacity' => '50 kW On-Grid', 'type' => 'Institutional', 'year' => '2023', 'blurb' => 'Rooftop plant powering classrooms, hostels and labs across two academic blocks.' ),
		array( 'title' => 'Hotel & Hospitality', 'location' => 'Tirumala Road', 'capacity' => '30 kW Hybrid', 'type' => 'Commercial', 'year' => '2024', 'blurb' => 'Hybrid system with battery backup keeps critical kitchen and lobby loads running 24x7.' ),
		array( 'title' => 'Industrial Shed', 'location' => 'Renigunta', 'capacity' => '100 kW On-Grid', 'type' => 'Industrial', 'year' => '2023', 'blurb' => 'Crystalline panels mounted on factory shed. Drives down operating cost for the manufacturing unit.' ),
		array( 'title' => 'Solar Pumpset', 'location' => 'Madanapalle', 'capacity' => '5 HP DC Pump', 'type' => 'Agricultural', 'year' => '2024', 'blurb' => 'PM-KUSUM submersible pump for groundnut and tomato irrigation. Diesel-free for the farmer.' ),
		array( 'title' => 'Street Lighting', 'location' => 'Gated Community, Tirupati', 'capacity' => '40 × 24W', 'type' => 'Commercial', 'year' => '2023', 'blurb' => 'Integrated solar LED street lights with motion sensors across an entire layout.' ),
	);
}

function pps_project_type_class( $type ) {
	$map = array(
		'Residential'   => 'tag-emerald',
		'Commercial'    => 'tag-blue',
		'Institutional' => 'tag-purple',
		'Industrial'    => 'tag-orange',
		'Agricultural'  => 'tag-amber',
	);
	return isset( $map[ $type ] ) ? $map[ $type ] : 'tag-white';
}

function pps_testimonials() {
	return array(
		array( 'name' => 'Ramesh Reddy', 'location' => 'Air Bypass Road, Tirupati', 'quote' => 'Bill went from ₹4,200 to under ₹200. Subsidy paperwork was completely handled by Pragathi team. Installation in 4 days flat.' ),
		array( 'name' => 'Sushma Devi', 'location' => 'Padmavathi Nagar', 'quote' => 'We installed 3 kW for our home and a solar water heater. Two years in and still zero issues. Their AMC team is responsive.' ),
		array( 'name' => 'Sri Venkateswara Hotels', 'location' => 'Tirumala Road', 'quote' => '30 kW hybrid system has been a game-changer for our hospitality business. Power cuts don\'t bother us anymore.' ),
	);
}

function pps_system_types() {
	return array(
		array(
			'tag'      => 'Most Popular',
			'title'    => 'On-Grid Solar',
			'text'     => 'Connected to the utility grid via net metering. Excess generation flows back to DISCOM and credits your bill.',
			'features' => array( 'Lowest upfront cost', 'Eligible for PM Surya Ghar subsidy', 'Net metering with state DISCOM', 'Fastest payback (4-6 years)' ),
			'best_for' => 'Homes & businesses with stable grid',
		),
		array(
			'tag'      => 'Independent',
			'title'    => 'Off-Grid Solar',
			'text'     => 'Standalone system with battery storage. No DISCOM connection — you produce, store and consume your own power.',
			'features' => array( 'Complete grid independence', 'Battery backup included', 'Ideal for remote sites', 'Diesel-genset replacement' ),
			'best_for' => 'Farms, telecom towers, remote homes',
		),
		array(
			'tag'      => 'Best of Both',
			'title'    => 'Hybrid Solar',
			'text'     => 'Combines net metering with battery storage. You stay grid-connected and ride through outages seamlessly.',
			'features' => array( 'Power-cut protection', 'Net metering benefits', 'Critical loads always on', 'Smart energy management' ),
			'best_for' => 'Hotels, hospitals, premium homes',
		),
	);
}

function pps_sectors() {
	return array(
		array( 'emoji' => '🏠', 'title' => 'Residential Homes', 'text' => '1 kW to 10 kW rooftop systems with full subsidy assistance for individual homes and apartments.' ),
		array( 'emoji' => '🏨', 'title' => 'Hotels & Resorts', 'text' => 'Hybrid systems that handle 24x7 operations and ride through power cuts smoothly.' ),
		array( 'emoji' => '🏭', 'title' => 'Factories & Industry', 'text' => '100 kW+ rooftop and ground-mount plants for manufacturing units across Rayalaseema.' ),
		array( 'emoji' => '🏫', 'title' => 'Schools & Colleges', 'text' => 'Solar campuses that cut operating budgets and teach students about clean energy.' ),
		array( 'emoji' => '🚜', 'title' => 'Farms & Agriculture', 'text' => 'PM-KUSUM solar pumpsets and farm electrification for irrigation and dairy.' ),
		array( 'emoji' => '🏘️', 'title' => 'Gated Communities', 'text' => 'Common-area lighting, water pumping and street lights — fully solar.' ),
	);
}

function pps_gallery_tiles() {
	return array(
		array( 'title' => 'Residential Rooftop', 'caption' => '5 kW mono-PERC plant — Tirupati', 'category' => 'Rooftop', 'grad' => 'grad-amber', 'icon' => 'panel' ),
		array( 'title' => 'Hotel Hybrid', 'caption' => '30 kW with battery backup', 'category' => 'Commercial', 'grad' => 'grad-rose', 'icon' => 'panel' ),
		array( 'title' => 'Solar Water Heater', 'caption' => '200 LPD ETC system', 'category' => 'Water Heater', 'grad' => 'grad-sky', 'icon' => 'thermal' ),
		array( 'title' => 'Integrated Street Light', 'caption' => '24W with motion sensor', 'category' => 'Street Light', 'grad' => 'grad-yellow', 'icon' => 'streetlight' ),
		array( 'title' => 'Industrial Shed', 'caption' => '100 kW factory rooftop', 'category' => 'Commercial', 'grad' => 'grad-red', 'icon' => 'panel' ),
		array( 'title' => 'Solar Pumpset', 'caption' => '5 HP submersible — PM-KUSUM', 'category' => 'Pumpset', 'grad' => 'grad-teal', 'icon' => 'sun' ),
		array( 'title' => 'School Campus', 'caption' => '20 kW educational institute', 'category' => 'Rooftop', 'grad' => 'grad-purple', 'icon' => 'panel' ),
		array( 'title' => 'Layout Lighting', 'caption' => '40 street lights — gated community', 'category' => 'Street Light', 'grad' => 'grad-yellow', 'icon' => 'streetlight' ),
		array( 'title' => 'Hospital Hybrid', 'caption' => '50 kW with critical-load backup', 'category' => 'Commercial', 'grad' => 'grad-indigo', 'icon' => 'panel' ),
	);
}

function pps_why_choose() {
	return array(
		array( 'stat' => '13+ yrs', 'title' => 'Industry Experience', 'text' => 'Over a decade of pure solar focus. We\'ve seen every roof type and use case.' ),
		array( 'stat' => 'TATA', 'title' => 'Premium Hardware', 'text' => 'Authorised TATA Power Solar partners. Tier-1 panels with 25-year warranty.' ),
		array( 'stat' => '1500+', 'title' => 'Households Powered', 'text' => 'From village homes to gated villas, our installations span every segment.' ),
		array( 'stat' => '100%', 'title' => 'Local Service', 'text' => 'Tirupati-based engineering team. We answer the phone every single time.' ),
	);
}
