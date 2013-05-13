<?php get_header(); ?>

<!-- Main Row -->
<div class="row">
	<div class="large-8 columns" role="main">

		<?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

					<div class="entry-meta">
						<?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?>
					</div>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<footer class="entry-meta">
					Posted in <?php the_category(', '); ?>
				</footer>

			</article>

		    <?php comments_template( '', true ); ?>

		<?php endwhile; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>