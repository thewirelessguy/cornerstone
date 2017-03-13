<?php
/**
 * Entry meta information for posts
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 3.5.3
 */


if ( ! function_exists( 'cornerstone_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own cornerstone_entry_meta() to override in a child theme.
 *
 * @since Cornerstone 2.1.2
 */

	function cornerstone_entry_meta( $args ) {
		$defaults = array(
			'date'			=>	array(
				'format'		=>	'jS F, Y',
				'prefix'		=>	__('Posted on ', 'cornerstone'),
				'suffix'		=>	', ',
				),
			'author'		=>	array(
				'prefix'		=>	__('by ', 'cornerstone'),
				'suffix'		=>	'',
				'archive_link'	=>	true
				),
			'categories'	=>	array(
				'prefix'		=>	__('Posted in ', 'cornerstone'),
				'suffix'		=>	'',
				'separator'	=>	', ',
				),
			'tags'			=>	array(
				'prefix'		=>	__('Tagged ', 'cornerstone'),
				'suffix'		=>	'',
				'separator'		=>	', ',
				),
			'entry_meta_prefix'		=>	'',
			'entry_meta_suffix'		=>	'',
			'order'					=>	array('date', 'author', 'categories', 'tags')
			);
		$args = wp_parse_args( $args, $defaults );

		$entrymeta = cornerstone_entry_meta_prefix($args['entry_meta_prefix']);

		/**
		 * Default order: 'date', 'author', 'categories', 'tags'
		 * Removing an item from the order array also stops it displaying.
		 */
		$order = $args['order'];

		foreach ($order as $items) {
			if ($items == 'date') {
				$date_prefix = cornerstone_entry_meta_prefix($args['date']['prefix']);
				$date_suffix = cornerstone_entry_meta_prefix($args['date']['suffix']);
				$date_format = ! empty($args['date']['format']) ? $args['date']['format'] : '';
				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
					$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
				}
				$time_string = sprintf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date( $date_format ) ),
					esc_attr( get_the_modified_date( 'c' ) ),
					esc_html( get_the_modified_date( $date_format ) )
				);
				$posted_on = sprintf(
					esc_html_x( 'Posted on %s', 'post date', 'cornerstone' ),
					'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
				);
				$entrymeta .= '<span class="posted-on">' . $posted_on . '</span> ';
			} elseif ($items == 'author') {
				$byline_prefix = cornerstone_entry_meta_prefix($args['author']['prefix']);
				$byline_suffix = cornerstone_entry_meta_prefix($args['author']['suffix']);
				if ($args['author']['archive_link']) {
					$author = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';
				} else {
					$author = '<span class="fn">' . esc_html( get_the_author() ) . '</span>';
				}
				$byline = sprintf(
					esc_html_x( '%s', 'post author', 'cornerstone' ),
					$byline_prefix . '<span class="author vcard">' . $author . '</span>'. $byline_suffix
				);
				$entrymeta .= '<span class="byline">' . $byline . '</span> ';
			} elseif ($items == 'categories') {
				$categories_prefix = cornerstone_entry_meta_prefix($args['categories']['prefix']);
				$categories_suffix = cornerstone_entry_meta_prefix($args['categories']['suffix']);
				$cat_sep = $args['categories']['separator'];

				// Translators: used between list items, there is a space after the comma.
				$categories_list = get_the_category_list( empty($cat_sep) ? esc_html__( ', ', 'cornerstone' ) : $cat_sep );
				if ( '' != $categories_list) {
					$entrymeta .= '<span class="category">' . $categories_prefix . $categories_list . $categories_suffix . '</span> ';
				}
			} elseif ($items == 'tags' && get_the_tag_list()) {
				// Translators: used between list items, there is a space after the comma.
				$tags_prefix = cornerstone_entry_meta_prefix($args['tags']['prefix']);
				$tags_suffix = cornerstone_entry_meta_prefix($args['tags']['suffix']);
				$tag_sep = empty($args['tags']['separator']) ? __( ', ' , 'cornerstone' ) : $args['tags']['separator'];
				$tag_list = get_the_tag_list( $tags_prefix, $tag_sep, $tags_suffix );
				$entrymeta .= '<span class="tags">' . $tag_list . '</span> ';
			}
		}

		$entrymeta .= cornerstone_entry_meta_prefix($args['entry_meta_suffix']);

		echo $entrymeta;
	}
endif;


if ( ! function_exists( 'cornerstone_entry_meta_prefix' ) ) :
	function cornerstone_entry_meta_prefix( $args ) {
		if (is_array($args)) {
			if (isset($args['fonticon'])) {
				// eg 'fa fa-calendar' will add prefix of <i class="fa fa-calendar"></i>
				$prefix = '<i class="' . esc_attr($args['fonticon']) . '"> </i>';;
			} else if (isset($args['image'])) {
				$prefix = '<img src="' . esc_url($args['image']['src']) . '" alt="' . esc_attr($args['image']['alt']) . '" class="' . esc_attr($args['image']['class']) . '">';;
			}
		} else {
			$prefix = esc_attr($args);
		}
		return $prefix;
	}
endif;


/**
 * Set up the default entry meta in the theme.
 */
add_action('init', 'cornerstone_entry_meta_init');
if ( ! function_exists( 'cornerstone_entry_meta_init' ) ) :
	function cornerstone_entry_meta_init() {
		$entry_meta_args_top = array('order' => array('date', 'author'));
		$entry_meta_args_bottom = array('order' => array('categories', 'tags'));
		add_action( 'cornerstone_entry_meta_header', function() use ( $entry_meta_args_top ) { cornerstone_entry_meta($entry_meta_args_top); } );
		add_action( 'cornerstone_entry_meta_footer', function() use ( $entry_meta_args_bottom ) { cornerstone_entry_meta($entry_meta_args_bottom); } );
	}
endif;