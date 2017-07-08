<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
 */

get_header(); ?>

<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div id="primary" class="cell site-content">
			<main id="content">
				<?php do_action( 'cornerstone_before_content' ); ?>
				<section id="post-0" class="error-404 not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cornerstone' ); ?></h1>
					</header>

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cornerstone' ); ?></p>

						<?php
							get_search_form();
							the_widget( 'WP_Widget_Recent_Posts' );

							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'cornerstone' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
							the_widget( 'WP_Widget_Tag_Cloud' );
						?>

					</div>
				</section>
				<?php do_action( 'cornerstone_after_content' ); ?>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>