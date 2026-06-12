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
		'founded'       => '2012',
		'designation'   => 'Authorised TATA Power Solar Channel Partners in Tirupati & Chittoor Districts',
		'city'          => 'Tirupati',
		'region'        => 'Tirupati & Chittoor Districts, Andhra Pradesh',
		'address'       => 'Ground Floor, Ramanujam Circle, 19-3-12/J, Tiruchanoor Rd, Tirupati, Andhra Pradesh 517501',
		'phone'         => '+91 9701426440',
		'phone_raw'     => '919701426440',
		'email'         => 'ppstirupathi@gmail.com',
		'whatsapp'      => 'https://wa.link/r70puj',
		'whatsapp_raw'  => 'https://wa.me/919701426440',
		'facebook'      => 'https://facebook.com/PragathiPowerSolutions',
		'instagram'     => 'https://instagram.com/pragathi_power_solutions',
		'youtube'       => 'https://youtube.com/@PragathiPowerSolutionsOfficial',
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
		array( 'slug' => 'clients-and-projects', 'label' => 'Clients & Projects' ),
		array( 'slug' => 'gallery', 'label' => 'Gallery' ),
		array( 'slug' => 'contact', 'label' => 'Contact' ),
	);
}

function pps_services() {
	return array(
		array(
			'slug'        => 'rooftop',
			'page'        => 'solar-rooftop-systems',
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
			'page'        => 'solar-water-heating',
			'title'       => 'Solar Thermal — Water Heating Solutions',
			'short'       => 'Solar Hot Water & Heat Pump — efficient, eco-friendly hot water for homes, hotels, hospitals, hostels, commercial establishments and industries.',
			'icon'        => 'thermal',
			'highlights'  => array(
				'Available in capacities from 100 litres per day (LPD)',
				'Choice of pressurised and non-pressurised models',
				'High-performance BIS-certified solar collectors',
				'Cuts electricity use by minimising geyser usage',
				'Reliable hot water year-round with low maintenance',
				'Space constraint? We also install Heat Pumps',
			),
		),
		array(
			'slug'        => 'street-lights',
			'page'        => 'solar-street-lights',
			'title'       => 'Solar Street Lights',
			'short'       => 'All-in-one lighting powered entirely by sunlight.',
			'icon'        => 'streetlight',
			'highlights'  => array(
				'Integrated all-in-one luminaires starting from 12W',
				'Auto dusk-to-dawn operation',
				'Lithium-ion storage, 5+ year life',
				'Zero electricity bills',
			),
		),
		array(
			'slug'        => 'fence',
			'page'        => 'solar-fencing',
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
			'page'        => 'solar-pumpsets',
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
			'page'        => 'solar-amc',
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
		array( 'icon' => 'globe', 'title' => 'Reduce Carbon Emissions', 'description' => 'Every kW of solar offsets ~1.2 tonnes of CO₂ a year — shrinking your carbon footprint.' ),
		array( 'icon' => 'tree', 'title' => 'Eco-Friendly', 'description' => 'Clean, renewable energy that protects nature for generations to come.' ),
		array( 'icon' => 'rupee', 'title' => 'Cost Saving', 'description' => 'Slash electricity bills by 70–90% from day one and recover your investment in 4–6 years.' ),
		array( 'icon' => 'battery', 'title' => 'Energy Independence', 'description' => 'Generate your own power and cut reliance on the grid and rising tariffs.' ),
		array( 'icon' => 'sun', 'title' => 'Unlimited Energy', 'description' => 'Sunlight is infinite — Tirupati enjoys 300+ sunny days every year.' ),
		array( 'icon' => 'shield', 'title' => 'Continuous Supply', 'description' => 'Hybrid systems with battery backup keep critical loads running through outages.' ),
	);
}

function pps_process() {
	return array(
		array( 'step' => 1, 'title' => 'Free Consultation', 'description' => 'Share your bill and roof details. We assess your needs over a call or visit at no cost.' ),
		array( 'step' => 2, 'title' => 'Site Survey & Design', 'description' => 'Our engineers measure shading, structure load and orientation to design your custom plant.' ),
		array( 'step' => 3, 'title' => 'Supply', 'description' => 'All materials are supplied as per the Tata Bill of Material (BOM). The major advantage is that the entire solar system is sourced from a single provider — including Solar Modules, Inverter, ACDB, DCDB, Earthing and Lightning Arrestor (LA) materials.' ),
		array( 'step' => 4, 'title' => 'Professional Installation', 'description' => 'Certified technicians install panels, inverters and net-meter as per CEIG and DISCOM norms.' ),
		array( 'step' => 5, 'title' => 'Switch On & Save', 'description' => 'Plant is commissioned and you start generating clean power. We handle subsidy paperwork end-to-end.' ),
	);
}

function pps_stats() {
	return array(
		array( 'value' => '14', 'suffix' => '+', 'label' => 'Years in Solar' ),
		array( 'value' => '4700', 'suffix' => '+', 'label' => 'Happy Customers' ),
		array( 'value' => '30', 'suffix' => 'MW+', 'label' => 'Installed Capacity' ),
		array( 'value' => '100', 'suffix' => '%', 'label' => 'Subsidy Assistance' ),
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
		array( 'emoji' => '🏭', 'title' => 'Factories & Industry', 'text' => '100 kW+ rooftop and ground-mount plants for manufacturing units across the Tirupati & Chittoor districts.' ),
		array( 'emoji' => '🏫', 'title' => 'Schools & Colleges', 'text' => 'Solar campuses that cut operating budgets and teach students about clean energy.' ),
		array( 'emoji' => '🚜', 'title' => 'Farms & Agriculture', 'text' => 'PM-KUSUM solar pumpsets and farm electrification for irrigation and dairy.' ),
		array( 'emoji' => '🏘️', 'title' => 'Gated Communities', 'text' => 'Common-area lighting, water pumping and street lights — fully solar.' ),
	);
}

/**
 * Key projects & clients, grouped by sector. Each group has a headline
 * installed capacity and a list of client => capacity entries.
 */
function pps_key_projects() {
	return array(
		array(
			'emoji'   => '🎓',
			'title'   => 'Educational Institutions',
			'total'   => '4 MW+',
			'clients' => array(
				array( 'APREIS Schools and College', '70 KW' ),
				array( 'Edify, Padmavathi Pharmacy', '180 KW' ),
				array( 'Krishna Teja (Chadalavada)', '150 KW' ),
				array( 'MITS – Madanapalle', '150 KW' ),
				array( 'Ambedkar Law College', '45 KW' ),
				array( 'Sainik Schools – Kalikiri', '150 KW' ),
				array( 'SV University', '1.8 MW' ),
				array( 'Seven Hills Pharmacy', '50 KW' ),
			),
		),
		array(
			'emoji'   => '🏭',
			'title'   => 'Industries',
			'total'   => '12 MW+',
			'clients' => array(
				array( 'Vishnu Barium Pvt. Ltd', '4.5 MW' ),
				array( 'Apache Foot Wears, INDIA Ltd', '2 MW' ),
				array( 'ITC Ltd – Hyderabad', '1 MW' ),
				array( 'Indus Coffee – TADA', '1 MW' ),
				array( 'Amara Raja Electronics Ltd (Diguvamagham)', '5 KW' ),
				array( 'Bhaskar Rice Mill – Yelamanda', '20 KW' ),
				array( 'Haritha Dairy – Yelamanda', '60 KW' ),
				array( 'SEAWARD Packaging Ltd.', '500 KW' ),
				array( 'Sapphire Global Cold Storage, Palamaneru', '250 KW' ),
				array( 'TATA Motors – Showroom, Tirupati', '60 KW' ),
			),
		),
		array(
			'emoji'   => '🏢',
			'title'   => 'Commercial Sites',
			'total'   => '135 KW+',
			'clients' => array(
				array( 'Basavaiah & Co', '30 KW' ),
				array( 'Chalapathi Towers', '20 KW' ),
				array( 'Gokul Heights', '75 KW' ),
				array( 'Prasanth Lodge', '25 KW' ),
				array( 'Ashok Function Hall', '40 KW' ),
				array( 'KVR Jewellers', '15 KW' ),
			),
		),
		array(
			'emoji'   => '🏥',
			'title'   => 'Hospitals',
			'total'   => '1 MW+',
			'clients' => array(
				array( 'Sruthi Hospitals', '20 KW' ),
				array( 'SVRR Govt. Hospitals', '423 KW' ),
				array( 'PES – Kuppam', '500 KW' ),
				array( 'Gayatri Hospital, Tirupati', '20 KW' ),
				array( 'J.P. Dental Hospital, Tirupati', '15 KW' ),
				array( 'Sneha Hospital', '—' ),
			),
		),
		array(
			'emoji'   => '🏛️',
			'title'   => 'Govt. & NGOs',
			'total'   => '100 KW+',
			'clients' => array(
				array( 'Govt. ITI, Tirupati', '5 KW' ),
				array( 'Collector Office – Chittoor', '5 KW' ),
				array( 'OVR ITI', '9 KW' ),
				array( 'Govt. High School, Puthalapattu', '5 KW' ),
				array( 'Z.P. Office – Chittoor', '35 KW' ),
			),
		),
		array(
			'emoji'   => '🏠',
			'title'   => 'Domestic',
			'total'   => '800 KW+',
			'clients' => array(
				array( 'Smt Galla Aruna Kumari', '3 KW' ),
				array( 'Sri Balakrishna Reddy M (Hotel Bliss)', '5 KW' ),
				array( 'Sri K Ranganatham (Ex CMD – SPDCL)', '3 KW' ),
				array( 'Sri Ram Mohan Reddy (Rtd. Bank Employee)', '3 KW' ),
				array( 'Dr Tarachand (Ophthalmologist)', '5 KW' ),
				array( 'Sri P Muni Reddy (Advocate)', '10 KW' ),
				array( 'Smt M Sulochanamma (Edify Group)', '10 KW' ),
				array( 'Sri A Gangi Reddy (SVCE Group)', '10 KW' ),
				array( 'Sri Madhusudhana (Chartered Accountant)', '6 KW' ),
			),
		),
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
		array( 'stat' => '14+ yrs', 'title' => 'Industry Experience', 'text' => 'Over a decade of pure solar focus. We\'ve seen every roof type and use case.' ),
		array( 'stat' => 'TATA', 'title' => 'Premium Hardware', 'text' => 'Authorised TATA Power Solar Channel partners. Tier-1 panels with 25-year warranty.' ),
		array( 'stat' => '4700+', 'title' => 'Customers Powered', 'text' => 'From village homes to gated villas, our installations span every segment.' ),
		array( 'stat' => '100%', 'title' => 'Local Service', 'text' => 'Tirupati-based engineering team. We answer the phone every single time.' ),
	);
}

/** Environmental & social impact of installed capacity (as on 31/03/2026). */
function pps_impact() {
	return array(
		array( 'icon' => 'rupee', 'value' => '₹30+ Crore', 'label' => 'Electricity bill savings every month (approx.)' ),
		array( 'icon' => 'leaf', 'value' => '45,000+ Tons', 'label' => 'CO₂ emissions reduced every year' ),
		array( 'icon' => 'tree', 'value' => '15,00,000+', 'label' => 'Trees planted every year (equivalent)' ),
		array( 'icon' => 'bolt', 'value' => 'Clean Energy', 'label' => 'For thousands of homes, businesses & institutions' ),
		array( 'icon' => 'globe', 'value' => 'Greener India', 'label' => 'Contributing to a sustainable future' ),
	);
}

/** "Why choose us" comparison: ordinary installers vs PPS + Tata Power Solar. */
function pps_compare() {
	return array(
		array( 'bad' => 'Limited experience in rooftop solar', 'good' => '14+ years of proven solar experience since 2012' ),
		array( 'bad' => 'Mostly limited to simple rooftop installations', 'good' => 'Expertise in RCC rooftop, elevated structures, sheet roofs & ground-mounted systems' ),
		array( 'bad' => 'Small-scale installation exposure only', 'good' => 'Experience from 1 kW to multi-MW projects (up to 4.5 MW single location)' ),
		array( 'bad' => 'May not be approved for Government subsidy projects', 'good' => 'Authorized vendor for the PM Surya Ghar Subsidy Programme' ),
		array( 'bad' => 'Local registrations only', 'good' => 'Registered vendor with NREDCAP for projects across Andhra Pradesh' ),
		array( 'bad' => 'Local brand dependency', 'good' => 'Exclusive Tata Power Solar Channel Partner' ),
		array( 'bad' => 'Third-party technicians or electricians', 'good' => 'Dedicated in-house trained installation team' ),
		array( 'bad' => 'Basic or lightweight structure materials', 'good' => 'Complete Hot Dip Galvanized (HDG) structure with legs, purlins & wrappers' ),
		array( 'bad' => 'Improper roof sealing may cause leakage', 'good' => 'Chemical anchoring & leak-proof sealing methods' ),
		array( 'bad' => 'Lower grade or undersized cables', 'good' => 'Tata-approved Polycab / KEI copper cables' ),
		array( 'bad' => 'Limited warranty on BOS items', 'good' => 'Tata-approved ACDB & DCDB with warranty' ),
		array( 'bad' => 'Earthing quality may not be tested properly', 'good' => 'Proper earthing & LA with megger testing below 5 ohms' ),
		array( 'bad' => 'Unsafe DC cable routing practices', 'good' => 'Separate conduit routing for positive & negative DC cables' ),
		array( 'bad' => 'Open conduit ends may attract rodents/insects', 'good' => 'Protective foam sealing for conduit ends' ),
		array( 'bad' => 'Poor cable identification & servicing issues', 'good' => 'Proper ferrules and identification labeling' ),
		array( 'bad' => 'No standard installation SOP', 'good' => 'Installation strictly as per Tata Power Solar SOP' ),
		array( 'bad' => 'Mixed BOS material sourcing', 'good' => 'Complete BOS supply directly from Tata Power Solar' ),
		array( 'bad' => 'Multiple vendors for warranty claims', 'good' => 'Single comprehensive warranty support' ),
		array( 'bad' => 'Limited or no quality inspection', 'good' => 'Third-party quality inspection before warranty activation' ),
		array( 'bad' => 'Service support depends on local technician availability', 'good' => 'Tata Power Solar authorized service support & toll-free assistance' ),
		array( 'bad' => 'Insurance support may not be included', 'good' => 'System insurance support through Tata Power Solar' ),
	);
}
