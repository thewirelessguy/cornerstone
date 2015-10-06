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
				'header-menu-left' => __( 'Header Menu (left)', 'cornerstone' ),
				'header-menu-right' => __( 'Header Menu (right)', 'cornerstone' ),
				'footer-menu' => __( 'Footer Menu', 'cornerstone' )
			)
		);

	}
}
add_action( 'init', 'cornerstone_menus' );


/**
 * Add a class to the wp_page_menu fallback
 */
if ( ! function_exists( 'foundation_page_menu_class' ) ) {
	function foundation_page_menu_class($ulclass) {
		return preg_replace('/<ul>/', '<ul class="nav-bar">', $ulclass, 1);
	}
}
add_filter('wp_page_menu','foundation_page_menu_class');
