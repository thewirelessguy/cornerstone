<?php
/**
 * Template Name: Orbit
 *
 * Description: Displays the Foundation Orbit Slider. Requires Orbit Slider for WordPress plugin.
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="site-content small-12 medium-12 large-8 columns large-centered">
		<div id="content" role="main">
			<?php do_action( 'cornerstone_before_content' ); ?>
			<?php if ( function_exists( 'OrbitSlider' ) ) { OrbitSlider(null, null, null, true); } ?>
			<?php do_action( 'cornerstone_after_content' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>