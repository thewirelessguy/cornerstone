<?php
/**
 * The default template for displaying grid content. Used for index/archive/search.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 5.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
		<div class="small-12 medium-4 columns">
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?></a>
		</div>
	<?php endif; ?>

	<div class="columns">

		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<div class="entry-meta-header">
				<?php do_action( 'cornerstone_entry_meta_header' ); ?>
			</div>
		</header>

		<?php do_action( 'cornerstone_page_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div>
		<?php do_action( 'cornerstone_page_after_entry_content' ); ?>

		<footer class="entry-meta-footer">
			<?php do_action( 'cornerstone_entry_meta_footer' ); ?>
		</footer>

	</div>

</article>
