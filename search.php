<?php
/**
 * The template for displaying Search Results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 3.0.0
 */

get_header(); ?>

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<section id="primary" class="auto cell site-content">
			<main id="content">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'cornerstone' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

				<?php /* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
			else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'cornerstone' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'cornerstone' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</article>

			<?php endif; ?>

			</main>
		</section>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>