<?php
/**
 * Navigation
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 3.5.3
 */

/**
 * Register wp_nav_menus
 */
if ( ! function_exists( 'cornerstone_menus' ) ) {
	function cornerstone_menus() {

		register_nav_menus(
			array(
				'offCanvasLeft' => __ ( 'Off Canvas Left (mobile)', 'cornerstone'),
				'offCanvasRight' => __ ( 'Off Canvas Right (mobile)', 'cornerstone'),
				'header-menu-left' => __( 'Header Menu (left)', 'cornerstone' ),
				'header-menu-right' => __( 'Header Menu (right)', 'cornerstone' ),
				'footer-menu' => __( 'Footer Menu', 'cornerstone' )
			)
		);

	}
}
add_action( 'init', 'cornerstone_menus' );
