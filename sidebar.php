<!-- sidebar -->
<div class="sidebar large-4 columns">

	<?php if ( is_active_sidebar( 'right_sidebar' ) ) : ?>

		<?php dynamic_sidebar( 'right_sidebar' ); ?>

	<?php else : ?>

		<!-- This content shows up if there are no widgets defined in the admin. -->

		<div class="alert-box">Please activate some Widgets.</div>

	<?php endif; ?>
						

</div>
<!-- sidebar -->
