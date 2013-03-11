	<!-- Footer -->
	<footer class="row">
	
		<div class="large-12 columns"><hr></div>
	
			<div class="row">
			
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar')) : ?>
					<h4>Hey! You!</h4>
					<p>You should like, so test out this dynamic footer sidebar. Check it out in Appearance > Widgets!</p>
					<?php endif; ?>
				
			</div>
	
	</footer>
	<!-- Footer -->

	<?php wp_footer(); ?>

<script>
$(document).foundation();
</script>
</body>
</html>