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

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div id="primary" class="cell site-content">
			<div id="content" role="main">
				<?php do_action( 'cornerstone_before_content' ); ?>
				<?php if ( function_exists( 'OrbitSlider' ) ) { OrbitSlider(null, null, null, true); } ?>
				<?php do_action( 'cornerstone_after_content' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>