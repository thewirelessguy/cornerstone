<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
 */

get_header(); ?>

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div id="primary" class="cell site-content">
			<main id="content" role="main">

			<?php do_action( 'cornerstone_before_content' );

				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'template-parts/content', 'page' );

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