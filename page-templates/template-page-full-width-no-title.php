<?php
/**
 * Template Name: Page Template, Full Width, No Title
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
 * @since Cornerstone 5.2.0
 */

get_header(); ?>

<div class="grid-container full">
	<div class="grid-x">
		<div id="primary" class="auto cell site-content">
			<main id="content">

				<?php do_action( 'cornerstone_before_content' );

				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'template-parts/content', 'page-no-title' );

					do_action( 'cornerstone_page_before_comments' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					do_action( 'cornerstone_page_after_comments' );

				endwhile;

				do_action( 'cornerstone_after_content' ); ?>

			</main>
		</div>

	</div>
</div>

<?php get_footer(); ?>