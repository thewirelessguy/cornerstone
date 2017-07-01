<?php do_action('cornerstone_before_searchform'); ?>
<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<div class="grid-x">
		<?php do_action('cornerstone_searchform_top'); ?>
		<div class="auto cell">
			<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'cornerstone'); ?>">
		</div>
		<?php do_action('cornerstone_searchform_before_search_button'); ?>
		<div class="shrink cell">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'cornerstone'); ?>" class="prefix button">
		</div>
		<?php do_action('cornerstone_searchform_after_search_button'); ?>
	</div>
</form>
<?php do_action('cornerstone_after_searchform'); ?>