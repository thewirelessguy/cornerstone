<?php
/**
 * Various clean up functions
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 3.5.3
 */

if ( ! function_exists( 'cornerstone_start_cleanup' ) ) :
function cornerstone_start_cleanup() {
	// Disable WordPress version reporting as a basic protection against attacks
	add_filter( 'the_generator', 'cornerstone_remove_generators' );
	// remove all filters from searchform.php
	add_action('pre_get_search_form', 'cornerstone_search_form_no_filters');
}
add_action( 'after_setup_theme','cornerstone_start_cleanup' );
endif;

// Disable WordPress version reporting as a basic protection against attacks
if ( ! function_exists( 'cornerstone_remove_generators' ) ) :
function cornerstone_remove_generators() { return ''; }
endif;

if ( ! function_exists( 'cornerstone_search_form_no_filters' ) ) :
function cornerstone_search_form_no_filters() {
  // look for local searchform template
  $search_form_template = locate_template( 'searchform.php' );
  if ( '' !== $search_form_template ) {
    // searchform.php exists, remove all filters
    remove_all_filters('get_search_form');
  }
}
endif;