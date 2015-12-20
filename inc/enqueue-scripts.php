<?php
/**
 * Enqueue CSS and scripts
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 3.5.3
 */

if ( ! function_exists( 'load_cornerstone_css' ) ) {

	function load_cornerstone_css() {

		wp_enqueue_style(
			'foundation_css',
			get_template_directory_uri() . '/css/foundation.min.css',
			array(),
			false,
			'all'
		);

		wp_enqueue_style(
			'motion-ui_css',
			get_template_directory_uri() . '/css/motion-ui.min.css',
			array('foundation_css'),
			false,
			'all'
		);

	}

}

if ( ! function_exists( 'load_cornerstone_scripts' ) ) {

	function load_cornerstone_scripts() {

		wp_enqueue_script(
			'foundation_js',
			get_template_directory_uri() . '/js/foundation.min.js',
			array('jquery'),
			false,
			true
		);

		wp_enqueue_script(
			'what-input_js',
			get_template_directory_uri() . '/js/what-input.min.js',
			array('jquery'),
			false,
			true
		);

	}

}

add_action( 'wp_enqueue_scripts', 'load_cornerstone_css', 0 );
add_action( 'wp_enqueue_scripts', 'load_cornerstone_scripts', 0 );


// load Foundation initialisation script in footer

if ( ! function_exists( 'cornerstone_foundation_init' ) ) {
	function cornerstone_foundation_init() { ?>
	<script type="text/javascript">jQuery.noConflict();jQuery(document).foundation();</script>
	<?php }
}
add_action( 'wp_footer', 'cornerstone_foundation_init', 9999 );