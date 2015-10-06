<div id="footer">
	<footer class="row" role="contentinfo">
		<?php do_action( 'cornerstone_before_footer' ); ?>
		<?php if (is_active_sidebar('footer_sidebar')) { ?>
			<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
				<?php dynamic_sidebar('footer_sidebar'); ?>
			</ul>
		<?php } ?>
		<?php if ( has_nav_menu( 'footer-menu' ) ) {
			echo '<div class="row">';
			wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'inline-list', 'container' => 'nav', 'container_class' => 'small-12 medium-12 columns' ) );
			echo '</div>';
		} ?>
		<?php do_action( 'cornerstone_after_footer' ); ?>
	</footer>
</div>
<?php wp_footer(); ?>
<?php do_action( 'cornerstone_before_closing_body' ); ?>
</body>
</html>