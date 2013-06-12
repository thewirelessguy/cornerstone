<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
 */

get_header(); ?>

<div id="row">
	<div id="content" class="large-12 columns" role="main">
		<article id="post-0" class="post error404 no-results not-found">

			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'cornerstone' ); ?></h1>
			</header>

			<div class="entry-content">
				<div data-alert class="alert-box">404!</div>
				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentytwelve' ); ?></p>
				<?php get_search_form(); ?>
			</div>

		</article>
	</div>
</div>

<?php get_footer(); ?>