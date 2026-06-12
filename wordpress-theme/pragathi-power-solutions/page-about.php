<?php
/**
 * Template Name: PPS About
 * Page template for the About page (slug: about).
 *
 * @package Pragathi_Power_Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

pps_page_header(
	'Powering Up with the Power of the Sun',
	sprintf( "Founded in %s by industry veterans, Pragathi Power Solutions is the most trusted name in solar across the Tirupati & Chittoor districts — and the authorised TATA Power Solar Channel Partner for the region.", pps( 'founded' ) ),
	array(
		array( 'label' => 'Home', 'href' => home_url( '/' ) ),
		array( 'label' => 'About Us' ),
	)
);
?>

<!-- STORY -->
<section class="section-pad">
	<div class="container about-grid">
		<div>
			<span class="eyebrow">Our Story</span>
			<h2 class="lead-h2">Over a decade of pioneering clean energy in the Tirupati &amp; Chittoor Districts</h2>
			<div class="prose">
				<p>Pragathi Power Solutions (PPS) was founded in <?php echo esc_html( pps( 'founded' ) ); ?> by <strong>Mr. K. Chandra Sekhar</strong> and <strong>Mr. Balaji Kiran Gilledu</strong> with a single mission — to put the power of the sun into every home, farm and business in Andhra Pradesh.</p>
				<p>Headquartered at Ramanujam Circle in Tirupati, we have grown into the most trusted solar partner across the Tirupati &amp; Chittoor districts, with installations spanning residential rooftops, schools, hotels, factories and farmlands. Our designation as <strong>Authorised TATA Power Solar Channel Partners</strong> means our customers get tier-1 panels and inverters — backed by a name India trusts.</p>
				<p>More than a decade on, we still answer every call ourselves, run every site survey personally, and stand behind every kilowatt we install.</p>
			</div>
			<div class="stat-mini-grid">
				<?php foreach ( pps_stats() as $s ) : ?>
					<div class="stat-mini">
						<p class="v"><?php echo esc_html( $s['value'] ); ?><span class="suffix"><?php echo esc_html( $s['suffix'] ); ?></span></p>
						<p class="l"><?php echo esc_html( $s['label'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="pillars">
			<?php
			$pillars = array(
				array( 'icon' => 'sun', 'title' => 'Mission', 'text' => 'Make solar the default choice for every roof in the Tirupati & Chittoor districts by 2030.', 'grad' => true ),
				array( 'icon' => 'leaf', 'title' => 'Vision', 'text' => 'A self-sufficient, carbon-free South India powered by clean energy.', 'grad' => false ),
				array( 'icon' => 'shield', 'title' => 'Values', 'text' => 'Honest pricing, premium components, and lifelong service.', 'grad' => false ),
				array( 'icon' => 'rocket', 'title' => 'Strengths', 'text' => '14+ years of expertise, an in-house engineering team and Tata-grade components — delivered end to end with local Tirupati service.', 'grad' => true ),
			);
			foreach ( $pillars as $p ) :
				$cls = $p['grad'] ? 'pillar grad sun-gradient' : 'pillar';
				?>
				<div class="<?php echo esc_attr( $cls ); ?>">
					<span class="p-icon"><?php pps_icon( $p['icon'], 32 ); ?></span>
					<h3><?php echo esc_html( $p['title'] ); ?></h3>
					<p><?php echo esc_html( $p['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- FOUNDERS -->
<section class="section-pad bg-soft-up">
	<div class="container">
		<?php pps_section_header( 'Leadership', 'Meet the founders', 'Engineers and entrepreneurs who built PPS one rooftop at a time.' ); ?>
		<div class="founders">
			<?php
			$founders = array(
				array( 'name' => 'K. Chandra Sekhar', 'role' => 'Co-Founder & Director', 'bio' => 'Leads engineering, system design and large commercial deployments. Hands-on through every site assessment.', 'grad' => true ),
				array( 'name' => 'Balaji Kiran Gilledu', 'role' => 'Co-Founder & Director', 'bio' => 'Drives strategy, partnerships and customer experience. Personally oversees the AMC and service operations.', 'grad' => false ),
			);
			foreach ( $founders as $f ) :
				$parts    = preg_split( '/\s+/', $f['name'] );
				$initials = '';
				foreach ( array_slice( $parts, 0, 2 ) as $part ) {
					$initials .= mb_substr( $part, 0, 1 );
				}
				$circle = $f['grad'] ? 'sun-gradient' : '';
				$circle_style = $f['grad'] ? '' : 'background:var(--eco-500);';
				?>
				<article class="founder card-hover">
					<span class="bg-circle <?php echo esc_attr( $circle ); ?>" style="<?php echo esc_attr( $circle_style ); ?>" aria-hidden="true"></span>
					<div class="avatar sun-gradient"><?php echo esc_html( $initials ); ?></div>
					<h3><?php echo esc_html( $f['name'] ); ?></h3>
					<p class="role"><?php echo esc_html( $f['role'] ); ?></p>
					<p><?php echo esc_html( $f['bio'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- WHY CHOOSE -->
<section class="section-pad">
	<div class="container">
		<?php pps_section_header( 'Why Choose PPS', 'Why families and businesses choose us' ); ?>
		<div class="cards-4">
			<?php foreach ( pps_why_choose() as $w ) : ?>
				<div class="why-card card-hover">
					<p class="stat text-shimmer"><?php echo esc_html( $w['stat'] ); ?></p>
					<h3><?php echo esc_html( $w['title'] ); ?></h3>
					<p><?php echo esc_html( $w['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="text-center" style="margin-top:3rem">
			<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-primary">Explore Our Services <?php pps_icon( 'arrow-right', 16 ); ?></a>
		</div>
	</div>
</section>

<?php
pps_cta_banner(
	'Want to know if solar is right for your home?',
	'Book a free site survey with our Tirupati team. No commitments, just honest answers.'
);
?>
<div class="spacer-16"></div>

<?php
get_footer();
