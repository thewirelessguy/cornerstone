<?php
/**
 * Theme support
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 3.5.3
 */

if ( ! function_exists( 'cornerstone_theme_support' ) ) :
function cornerstone_theme_support() {

	// Add language support
	load_theme_textdomain( 'Cornerstone', get_template_directory() . '/languages' );

	// Add menu support
	add_theme_support( 'menus' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add post formats support: http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

	// Add widget live previews support
	add_theme_support('widget-customizer');

	// Disable the admin bar, set to true if you want it to be visible.
	show_admin_bar(FALSE);

	// Declare Woocommerce support
	add_theme_support( 'woocommerce' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'widgets' ) );

}
add_action( 'after_setup_theme', 'cornerstone_theme_support' );
endif;




