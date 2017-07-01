<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since 1.0
 */
?>
<aside class="small-12 medium-4 cell sidebar" role="complementary">
	<?php do_action( 'cornerstone_before_sidebar' ); ?>
	<?php if ( is_active_sidebar( 'right_sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'right_sidebar' ); ?>
	<?php endif; ?>
	<?php do_action( 'cornerstone_after_sidebar' ); ?>
</aside>