<?php

// Disable WordPress version reporting as a basic protection against attacks
function remove_generators() {
	return '';
}
add_filter('the_generator','remove_generators');

// This theme supports a variety of post formats.
add_theme_support('post-formats', array('aside', 'image', 'link', 'quote', 'status'));

// Add thumbnail support
add_theme_support('post-thumbnails');

// Add widget live previews support
add_theme_support('widget-customizer');

// Disable the admin bar, set to true if you want it to be visible.
show_admin_bar(FALSE);

// Add theme support for Automatic Feed Links
add_theme_support( 'automatic-feed-links' );

// Enqueue CSS and scripts

if ( ! function_exists( 'load_cornerstone_css' ) ) {

	function load_cornerstone_css() {

		global $wp_styles;

		wp_enqueue_style(
			'normalize',
			get_template_directory_uri() . '/css/normalize.css',
			array(),
			'3.0.1',
			'all'
		);

		wp_enqueue_style(
			'foundation_css',
			get_template_directory_uri() . '/css/foundation.min.css',
			array('normalize'),
			'5.3.0',
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
			'2.8.2',
			false
		);

		wp_enqueue_script(
			'foundation_js',
			get_template_directory_uri() . '/js/foundation.min.js',
			array('jquery'),
			'5.3.0',
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


// load Foundation specific functions
require_once('inc/foundation.php');


/**
 * Register Navigation Menus
 */

// Register wp_nav_menus
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


// Sidebars

if (function_exists('register_sidebar')) {

	// Right Sidebar

	register_sidebar(array(
		'name'=> 'Right Sidebar',
		'id' => 'right_sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// Footer Sidebar

	register_sidebar(array(
		'name'=> 'Footer Sidebar',
		'id' => 'footer_sidebar',
		'before_widget' => '<div id="%1$s" class="small-12 medium-4 columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}


// Comments

if ( ! function_exists( 'cornerstone_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own cornerstone_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function cornerstone_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'cornerstone' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'cornerstone' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'cornerstone' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'cornerstone' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'cornerstone' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'cornerstone' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'cornerstone' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;


// Custom Pagination
/**
 * Retrieve or display pagination code.
 *
 * The defaults for overwriting are:
 * 'page' - Default is null (int). The current page. This function will
 *      automatically determine the value.
 * 'pages' - Default is null (int). The total number of pages. This function will
 *      automatically determine the value.
 * 'range' - Default is 3 (int). The number of page links to show before and after
 *      the current page.
 * 'gap' - Default is 3 (int). The minimum number of pages before a gap is
 *      replaced with ellipses (...).
 * 'anchor' - Default is 1 (int). The number of links to always show at begining
 *      and end of pagination
 * 'before' - Default is '<div class="emm-paginate">' (string). The html or text
 *      to add before the pagination links.
 * 'after' - Default is '</div>' (string). The html or text to add after the
 *      pagination links.
 * 'next_page' - Default is '__('&raquo;')' (string). The text to use for the
 *      next page link.
 * 'previous_page' - Default is '__('&laquo')' (string). The text to use for the
 *      previous page link.
 * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
 *      to 0 (zero).
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param array|string $args Optional. Override default arguments.
 * @return string HTML content, if not displaying.
 */
function emm_paginate($args = null) {
	$defaults = array(
		'page' => null, 'pages' => null,
		'range' => 3, 'gap' => 3, 'anchor' => 1,
		'before' => '<ul class="pagination">', 'after' => '</ul>',
		'title' => __('<li class="unavailable"></li>'),
		'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
		'echo' => 1
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	if (!$page && !$pages) {
		global $wp_query;

		$page = get_query_var('paged');
		$page = !empty($page) ? intval($page) : 1;

		$posts_per_page = intval(get_query_var('posts_per_page'));
		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
	}

	$output = "";
	if ($pages > 1) {
		$output .= "$before<li>$title</li>";
		$ellipsis = "<li class='unavailable'>...</li>";

		if ($page > 1 && !empty($previouspage)) {
			$output .= "<li><a href='" . get_pagenum_link($page - 1) . "'>$previouspage</a></li>";
		}

		$min_links = $range * 2 + 1;
		$block_min = min($page - $range, $pages - $min_links);
		$block_high = max($page + $range, $min_links);
		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

		if ($left_gap && !$right_gap) {
			$output .= sprintf('%s%s%s',
				emm_paginate_loop(1, $anchor),
				$ellipsis,
				emm_paginate_loop($block_min, $pages, $page)
			);
		}
		else if ($left_gap && $right_gap) {
			$output .= sprintf('%s%s%s%s%s',
				emm_paginate_loop(1, $anchor),
				$ellipsis,
				emm_paginate_loop($block_min, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else if ($right_gap && !$left_gap) {
			$output .= sprintf('%s%s%s',
				emm_paginate_loop(1, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else {
			$output .= emm_paginate_loop(1, $pages, $page);
		}

		if ($page < $pages && !empty($nextpage)) {
			$output .= "<li><a href='" . get_pagenum_link($page + 1) . "'>$nextpage</a></li>";
		}

		$output .= $after;
	}

	if ($echo) {
		echo $output;
	}

	return $output;
}

/**
 * Helper function for pagination which builds the page links.
 *
 * @access private
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param int $start The first link page.
 * @param int $max The last link page.
 * @return int $page Optional, default is 0. The current page.
 */
function emm_paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i))
			? "<li class='current'><a href='#'>$i</a></li>"
			: "<li><a href='" . get_pagenum_link($i) . "'>$i</a></li>";
	}
	return $output;
}

if ( ! function_exists( 'cornerstone_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own cornerstone_entry_meta() to override in a child theme.
 *
 * @since Cornerstone 2.1.2
 */
function cornerstone_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'cornerstone' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'cornerstone' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'cornerstone' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'cornerstone' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'cornerstone' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'cornerstone' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Cornerstone 3.0.3
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function cornerstone_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'cornerstone' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'cornerstone_wp_title', 10, 2 );
?>