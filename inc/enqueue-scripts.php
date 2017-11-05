<?php
/**
 * Enqueue CSS and scripts
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 3.5.3
 */

/**
 * Enqueue CSS
 */
if ( ! function_exists( 'load_cornerstone_css' ) ) {
	function load_cornerstone_css() {

		wp_enqueue_style(
			'foundation-style',
			get_theme_file_uri( 'css/foundation.min.css' ),
			array(),
			false,
			'all'
		);

		wp_enqueue_style(
			'motion-ui-style',
			get_theme_file_uri( 'css/motion-ui.min.css' ),
			array( 'foundation-style' ),
			false,
			'all'
		);

	}
}


/**
 * Enqueue main stylesheet
 */
if ( ! function_exists( 'load_cornerstone_main_css' ) ) {
	function load_cornerstone_main_css() {

		wp_enqueue_style(
			'theme-style',
			get_theme_file_uri( 'style.css' ),
			array( 'foundation-style' ),
			false,
			'all'
		);

	}
}


/**
 * Enqueue JavaScript
 */
if ( ! function_exists( 'load_cornerstone_scripts' ) ) {
	function load_cornerstone_scripts() {

		wp_enqueue_script(
			'what-input-script',
			get_theme_file_uri( 'js/what-input.min.js' ),
			array('jquery'),
			false,
			true
		);

		wp_enqueue_script(
			'foundation-script',
			get_theme_file_uri( 'js/foundation.min.js' ),
			array('jquery'),
			false,
			true
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
}


/**
 * Foundation initialization
 */
if ( ! function_exists( 'cornerstone_foundation_init' ) ) {
	function cornerstone_foundation_init() {
		wp_add_inline_script(
			'foundation-script',
			'jQuery.noConflict(),jQuery(document).foundation()',
			'after');
	}
}


/**
 * Add Responsive Embed to YouTube and Vimeo Embeds
 */
if ( ! function_exists( 'cornerstone_responsive_embed' ) ) {
	function cornerstone_responsive_embed() {
		$inline_js = 'jQuery(function($) {$(\'iframe[src*="youtube.com"], iframe[src*="vimeo.com"], iframe[src*="facebook.com"]\').each(function() {if ( $(this).innerWidth() / $(this).innerHeight() > 1.5 ) {$(this).wrap(\'<div class="responsive-embed widescreen"/>\');} else {$(this).wrap(\'<div class="responsive-embed"/>\');}});});';
		wp_add_inline_script(
			'foundation-script',
			$inline_js,
			'after');
	}
}


add_action( 'wp_enqueue_scripts', 'load_cornerstone_css', 0 );
add_action( 'wp_enqueue_scripts', 'load_cornerstone_main_css', 50 );
add_action( 'wp_enqueue_scripts', 'load_cornerstone_scripts', 0 );
add_action( 'wp_enqueue_scripts', 'cornerstone_foundation_init', 9999 );
add_action( 'wp_enqueue_scripts', 'cornerstone_responsive_embed', 9999 );