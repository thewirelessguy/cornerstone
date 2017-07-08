<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since 1.0
 */
?>
	<div id="footer">
		<footer class="grid-container site-footer">
			<?php do_action( 'cornerstone_before_footer' );
			if (is_active_sidebar('footer_sidebar')) { ?>
				<div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-4">
					<?php dynamic_sidebar('footer_sidebar'); ?>
				</div>
			<?php }
			if ( has_nav_menu( 'footer-menu' ) ) {
				wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'menu align-center', 'container' => false ) );
			}
			do_action( 'cornerstone_after_footer' ); ?>
		</footer>
	</div>
</div> <?php // close .off-canvas-content
wp_footer();
do_action( 'cornerstone_before_closing_body' ); ?>
</body>
</html>