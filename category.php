<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 3.0.0
 */

get_header();

/**
 * Get the blog layout (e.g 'classic', 'grid', 'cards')
 */
get_template_part( 'template-parts/loop', 'classic' );

get_footer();