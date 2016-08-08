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
<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

  	<?php do_action( 'cornerstone_after_off_canvas_wrapper_inner' ); ?>

  	<?php // off-canvas title bar for 'small' and 'medium' screen ?>
  	<div class="title-bar" data-responsive-toggle="widemenu" data-hide-for="large">
  		<div class="title-bar-left">
  			<?php if ( has_nav_menu( 'offCanvasLeft' ) ) { ?>
  				<button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
  			<?php } ?>
  			<span class="title-bar-title" itemscope itemtype="http://schema.org/Organization">
				<?php if ( function_exists( 'the_custom_logo' ) ) {
					$logo = get_custom_logo();
					if(!empty($logo)) {
						echo $logo;
					} else { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" itemprop="url" tabindex="0"><?php bloginfo( 'name' ); ?></a>
					<?php }
				} ?>
  			</span>
  		</div>
  		<?php if ( has_nav_menu( 'offCanvasRight' ) ) { ?>
  		<div class="title-bar-right">
  			<button class="menu-icon" type="button" data-open="offCanvasRight"></button>
  		</div>
  		<?php } ?>
  	</div>

  	<?php // off-canvas left menu
  	if ( has_nav_menu( 'offCanvasLeft' ) ) { ?>
  	<div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
  		<?php wp_nav_menu( array(
			'theme_location' => 'offCanvasLeft',
			'container' => false,
			'depth' => 0,
			'items_wrap' => '<ul class="vertical menu" data-accordion-menu>%3$s</ul>',
			'fallback_cb' => false,
			'walker' => new Foundation_Accordion_Menu_Walker(),
		)); ?>
  	</div>
  	<?php } ?>

  	<?php // off-canvas right menu
  	if ( has_nav_menu( 'offCanvasRight' ) ) { ?>
  	<div class="off-canvas position-right" id="offCanvasRight" data-off-canvas data-position="right">
  		<?php wp_nav_menu( array(
			'theme_location' => 'offCanvasRight',
			'container' => false,
			'depth' => 0,
			'items_wrap' => '<ul class="vertical menu" data-accordion-menu>%3$s</ul>',
			'fallback_cb' => false,
			'walker' => new Foundation_Accordion_Menu_Walker(),
		)); ?>
  	</div>
  	<?php } ?>

	<?php // "wider" top-bar menu for 'large' and up ?>
	<div id="widemenu" class="top-bar">
		<div class="top-bar-left">
			<ul class="dropdown menu" data-dropdown-menu>
				<li class="menu-text" itemscope itemtype="http://schema.org/Organization">
					<?php if ( function_exists( 'the_custom_logo' ) ) {
						$logo = get_custom_logo();
						if(!empty($logo)) {
							echo $logo;
						} else { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" itemprop="url" tabindex="0"><?php bloginfo( 'name' ); ?></a>
						<?php }
					} ?>
				</li>
				<?php if ( has_nav_menu( 'header-menu-left' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'header-menu-left',
						'container' => false,
						'depth' => 0,
						'items_wrap' => '%3$s',
						'fallback_cb' => false,
						'walker' => new Foundation_Dropdown_Menu_Walker(),
					));
				} ?>
			</ul>
		</div>
		<div class="top-bar-right">
			<?php if ( has_nav_menu( 'header-menu-right' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'header-menu-right',
					'container' => false,
					'depth' => 0,
					'items_wrap' => '<ul class="dropdown menu" data-dropdown-menu>%3$s</ul>',
					'fallback_cb' => false,
					'walker' => new Foundation_Dropdown_Menu_Walker(),
				));
			} ?>
		</div>
	</div>

<?php do_action( 'cornerstone_after_header' ); ?>
<div class="off-canvas-content" data-off-canvas-content>