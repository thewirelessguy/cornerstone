<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width; "/>
	
	<title><?php wp_title(''); ?></title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<nav class="top-bar">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
    	<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <?php
          wp_nav_menu( array(
              'theme_location' => 'header-menu-left',
              'container' => false,
              'depth' => 0,
              'items_wrap' => '<ul class="left">%3$s</ul>',
              'fallback_cb' => 'cornerstone_menu_fallback', // workaround to show a message to set up a menu
              'walker' => new cornerstone_walker( array(
                  'in_top_bar' => true,
                  'item_type' => 'li'
              ) ),
          ) );
      ?>

    <!-- Right Nav Section -->
    <?php
          wp_nav_menu( array(
              'theme_location' => 'header-menu-right',
              'container' => false,
              'depth' => 0,
              'items_wrap' => '<ul class="right">%3$s</ul>',
              'fallback_cb' => 'cornerstone_menu_fallback', // workaround to show a message to set up a menu
              'walker' => new cornerstone_walker( array(
                  'in_top_bar' => true,
                  'item_type' => 'li'
              ) ),
          ) );
      ?>
  </section>
</nav>