<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 2.2.2
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="aside">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cornerstone' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'cornerstone' ) ); ?>
		</div>
	</div>

	<footer class="entry-meta">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cornerstone' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
		<?php if ( comments_open() ) : ?>
		<div class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'cornerstone' ) . '</span>', __( '1 Reply', 'cornerstone' ), __( '% Replies', 'cornerstone' ) ); ?>
		</div>
		<?php endif; // comments_open() ?>
		<?php edit_post_link( __( 'Edit', 'cornerstone' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>