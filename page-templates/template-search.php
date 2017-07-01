<?php
/**
 * Template Name: Search Page
 *
 * Description: Cornerstone loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 5.1.0
 */

get_header(); ?>

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div id="primary" class="cell site-content">
			<main id="content" role="main">

			<?php do_action( 'cornerstone_before_content' ); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>

					<?php do_action( 'cornerstone_page_before_entry_content' ); ?>
					<div class="entry-content">
						<?php get_search_form(); ?>
					</div>
					<?php do_action( 'cornerstone_page_after_entry_content' ); ?>

					<?php if ( get_edit_post_link() ) : ?>
						<footer class="entry-meta-footer">
							<?php edit_post_link(
									sprintf(
										/* translators: %s: Name of current post */
										esc_html__( 'Edit %s', 'cornerstone' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									),
									'<span class="edit-link">',
									'</span>'
								); ?>
						</footer>
					<?php endif; ?>

				</article>


			<?php do_action( 'cornerstone_after_content' ); ?>

			</main>
		</div>

	</div>
</div>

<?php get_footer(); ?>