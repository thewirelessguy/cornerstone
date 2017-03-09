<?php
/**
 * The template used for displaying page content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 4.2.4.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php do_action( 'cornerstone_page_before_entry_content' ); ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php do_action( 'cornerstone_page_after_entry_content' ); ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-meta-footer">
			<?php edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', '_s' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				); ?>
		</footer>
	<?php endif; ?>

</article>
