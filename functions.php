<?php
/**
 * Cornerstone functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
 */

/**
 * Various clean up functions
 */
require_once( 'inc/cleanup.php' );

/**
 * Add theme support
 */
require_once( 'inc/theme-support.php' );

/**
 * Enqueue CSS and scripts
 */
require_once( 'inc/enqueue-scripts.php' );

/**
 * Register navigation menus
 */
require_once( 'inc/navigation.php' );

/**
 * Menu walkers
 */
require_once( 'inc/menu-walker.php' );

/**
 * Create widget areas in sidebar and footer
 */
require_once( 'inc/widget-areas.php' );

/**
 * Comments
 */
require_once( 'inc/comments.php' );

/**
 * Return entry meta information for posts
 */
require_once( 'inc/entry-meta.php' );

/**
 * Zurb Foundation specific functions
 */
require_once('inc/foundation.php');

/**
 * Orbit Slider
 */
require_once('inc/orbit.php');
