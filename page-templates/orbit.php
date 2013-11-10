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

<div id="primary" class="row site-content">
	<div id="content" class="large-8 columns large-centered" role="main">
		<?php SliderContent(); ?>
	</div>
</div>

<?php get_footer(); ?>