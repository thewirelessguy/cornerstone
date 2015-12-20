<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="utf-8" />

<meta name="viewport" content="initial-scale=1.0" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'cornerstone_after_body' ); ?>
<nav>
	<div class="title-bar" data-responsive-toggle="top-menu" data-hide-for="large">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="float-left"><?php bloginfo( 'name' ); ?></a>
		<div class="float-right">
			<div class="title-bar-title">Menu</div>
			<button class="menu-icon" type="button" data-toggle></button>
		</div>
	</div>

	<div class="top-bar" id="top-menu">
		<div class="top-bar-left">
			<ul class="vertical large-horizontal dropdown menu" data-responsive-menu="drilldown large-dropdown">
				<li class="menu-text">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="show-for-large"><?php bloginfo( 'name' ); ?></a>
				</li>
				<?php
				if ( has_nav_menu( 'header-menu-left' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'header-menu-left',
						'container' => false,
						'depth' => 0,
						'items_wrap' => '%3$s',
						'fallback_cb' => false,
						'walker' => new cornerstone_walker( array(
							'in_top_bar' => true,
							'item_type' => 'li'
							) ),
						) );
				}
				?>
			</ul>
		</div>
		<div class="top-bar-right">
			<?php
			if ( has_nav_menu( 'header-menu-right' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'header-menu-right',
					'container' => false,
					'depth' => 0,
					'items_wrap' => '<ul class="dropdown menu" data-dropdown-menu>%3$s</ul>',
					'fallback_cb' => false,
					'walker' => new cornerstone_walker( array(
						'in_top_bar' => true,
						'item_type' => 'li'
						) ),
					) );
			}
			?>
		</div>
	</div>
</nav>
<?php do_action( 'cornerstone_after_header' ); ?>
