<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 2.2.2
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; // is_single()
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta-header">
				<?php do_action( 'cornerstone_entry_meta_header' ); ?>
			</div>
		<?php endif; ?>
	</header>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php else :
		do_action( 'cornerstone_page_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content( sprintf(
				/* translators: %s: Name of current post. */
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'cornerstone' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cornerstone' ), 'after' => '</div>' ) ); ?>
		</div>
		<?php do_action( 'cornerstone_page_after_entry_content' ); ?>
	<?php endif; ?>

	<footer class="entry-meta-footer">
		<?php if ( 'post' === get_post_type() ) :
			do_action( 'cornerstone_entry_meta_footer' );
		endif;
		edit_post_link( __( 'Edit', 'cornerstone' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>

</article>
