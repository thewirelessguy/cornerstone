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

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div id="primary" class="auto cell site-content">
			<div id="content" role="main">

				<?php woocommerce_content(); ?>

			</div>
		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>