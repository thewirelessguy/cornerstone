<?php

// Shortcodes

// Allow shortcodes in widgets

add_filter('widget_text', 'do_shortcode');

// Rows [row][/row]

function shortcode_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'row', 'shortcode_row' );

// Columns [column span="3" center="true"][/column]

function shortcode_column( $atts, $content = null ) {

  extract( shortcode_atts( array(
  	'center' => '',
		'span' => '',//Between 1 and 12
		), $atts ) );

	// Set the 'center' variable
	if ($center == 'true') {
	$center = 'centered';
	}

	return '<div class="columns-' . esc_attr($span) . ' ' . esc_attr($center) .'">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'column', 'shortcode_column' );

// Sections [sections type="tabs"] [section title="Section Title"]Content[/section] [/sections]

function shortcode_sections( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'type' => ''
		), $atts ) );

	return '<div class="section-container '. esc_attr($type) . '" data-section="'. esc_attr($type) . '">' . do_shortcode($content) . '</div>';

}

add_shortcode( 'sections', 'shortcode_sections' );

// Section [section title="Section Title"]Content[/section]

function shortcode_section( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'title' => ''
		), $atts ) );

	return '<section><p class="title" data-section-title><a href="#">'. esc_attr($title) . '</a></p><div class="content" data-section-content>' . do_shortcode($content) . '</div></section>';

}

add_shortcode( 'section', 'shortcode_section' );

?>
