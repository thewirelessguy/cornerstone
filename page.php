<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="site-content small-12 medium-8 columns">
		<div id="content" role="main">

		<?php do_action( 'cornerstone_before_content' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>

					<?php do_action( 'cornerstone_page_before_entry_content' ); ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
					<?php do_action( 'cornerstone_page_after_entry_content' ); ?>

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'cornerstone' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>

				</article>

				<?php do_action( 'cornerstone_page_before_comments' ); ?>
				<?php comments_template( '', true ); ?>
				<?php do_action( 'cornerstone_page_after_comments' ); ?>

			<?php endwhile; ?>

			<?php do_action( 'cornerstone_after_content' ); ?>

		</div>
	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>