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
				'offCanvasLeft' => esc_html__( 'Off Canvas Left (mobile)', 'cornerstone'),
				'offCanvasRight' => esc_html__( 'Off Canvas Right (mobile)', 'cornerstone'),
				'header-menu-left' => esc_html__( 'Header Menu (left)', 'cornerstone' ),
				'header-menu-right' => esc_html__( 'Header Menu (right)', 'cornerstone' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'cornerstone' )
			)
		);

	}
}
add_action( 'init', 'cornerstone_menus' );
