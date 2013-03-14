<div id="footer">
	<footer class="row">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar')) : ?>
		<h4>Hey! You!</h4>
		<p>You should like, so test out this dynamic footer sidebar. Check it out in Appearance > Widgets!</p>
		<?php endif; ?>	
	</footer>
</div>

<?php wp_footer(); ?>

<script>
jQuery(document).foundation();
</script>
</body>
</html>