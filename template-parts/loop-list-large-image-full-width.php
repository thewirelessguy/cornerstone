<?php
/**
 * The default template for displaying blog list medium image full width layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 5.0.0
 */
?>

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div id="primary" class="cell site-content">
			<main id="content">

				<?php if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header class="entry-header">
							<h1 class="entry-title"><?php single_post_title(); ?></h1>
						</header> <?php
					elseif (is_archive()) :
						the_archive_title( '<header class="entry-header"><h1 class="page-title">', '</h1></header>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					endif;

					do_action( 'cornerstone_before_content' );

					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/list-large-image/content', get_post_format() );
					endwhile;

					do_action( 'cornerstone_before_pagination' );

					// Pagination
					if (function_exists("emm_paginate")) :
					    emm_paginate();
					endif;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;

				do_action( 'cornerstone_after_content' ); ?>

			</main>
		</div>

	</div>
</div>