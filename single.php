<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
 */

get_header(); ?>

<div class="row">
	<div id="content" class="large-8 columns" role="main">

		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		    <?php comments_template( '', true ); ?>

		<?php endwhile; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>