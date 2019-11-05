<?php
/**
 * Menu walkers
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 3.5.3
 */

/**
 * Custom menu walkers for the Zurb Foundation menu structure
 */
if ( ! class_exists( 'Foundation_Dropdown_Menu_Walker' ) ) :
class Foundation_Dropdown_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"menu\">\n";
	}
}
endif;


if ( ! class_exists( 'Foundation_Accordion_Menu_Walker' ) ) :
class Foundation_Accordion_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical nested menu\" data-accordion-menu data-submenu-toggle=\"true\">\n";
    }
}
endif;

class Foundation_Drilldown_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu drilldown\" data-drilldown>\n";
	}
}
