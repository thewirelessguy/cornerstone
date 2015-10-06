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

		global $wp_styles;

		wp_enqueue_style(
			'normalize',
			get_template_directory_uri() . '/css/normalize.css',
			array(),
			'3.0.3',
			'all'
		);

		wp_enqueue_style(
			'foundation_css',
			get_template_directory_uri() . '/css/foundation.min.css',
			array('normalize'),
			'5.5.3',
			'all'
		);

		wp_enqueue_style(
			'foundation_ie8_grid',
			get_template_directory_uri() . '/css/ie8-grid-foundation-4.css',
			array( 'foundation_css' ),
			'1.0',
			'all'
		);

		$wp_styles->add_data( 'foundation_ie8_grid', 'conditional', 'lt IE 8' );

	}

}

if ( ! function_exists( 'load_cornerstone_scripts' ) ) {

	function load_cornerstone_scripts() {

		wp_enqueue_script(
			'foundation_modernizr_js',
			get_template_directory_uri() . '/js/modernizr.js',
			array(),
			'2.8.3',
			false
		);

		wp_enqueue_script(
			'foundation_js',
			get_template_directory_uri() . '/js/foundation.min.js',
			array('jquery'),
			'5.5.3',
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