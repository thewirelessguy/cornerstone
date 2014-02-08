<?php
/**
 * Template Name: Orbit
 *
 * Description: Displays the Foundation Orbit Slider.
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="site-content small-12 medium-12 large-8 columns large-centered">
		<div id="content" role="main">
			<?php OrbitSlider(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>