<?php

// Check if Class Exists.
if ( ! class_exists( 'Payments_Walker_Nav_Menu' ) ) {
	/**
	 * Payments_Walker_Nav_Menu class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class Payments_Walker_Nav_Menu extends Walker_Nav_Menu {
	

		// add classes to ul sub-menus
		function start_lvl( &$output, $depth = 0, $args = null ) {
			// depth dependent classes
			$indent      = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			$classes     = array();
			$class_names = implode( ' ', $classes );

			// build html
			$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}

		// add main/sub classes to li's and links
		function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
			global $wp_query;

			// Restores the more descriptive, specific name for use within this method.
			$item = $data_object;

			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

			// depth dependent classes
			$custom_classes     = array(
				'max-h-8 max-w-20 flex justify-center items-center duration-200 grayscale hover:grayscale-0',
			);
			$custom_class_names = esc_attr( implode( ' ', $custom_classes ) );

			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			// build html
			$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $custom_class_names . ' ' . $class_names . '">';

			$link_class_names = 'no-underline';

			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ' target="_blank"';
			$attributes .= ' rel="noopener noreferrer"';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
			$attributes .= ' class="menu-link ' . $link_class_names . '"';

			$item_output = sprintf(
				'%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);

			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}
