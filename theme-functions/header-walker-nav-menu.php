<?php

// Check if Class Exists.
if ( ! class_exists( 'Header_Walker_Nav_Menu' ) ) {
	/**
	 * Header_Walker_Nav_Menu class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class Header_Walker_Nav_Menu extends Walker_Nav_Menu {

		// add classes to ul sub-menus
		function start_lvl( &$output, $depth = 0, $args = null ) {
			// depth dependent classes
			$indent        = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			$display_depth = ( $depth + 1 ); // because it counts the first submenu as 0
			$classes       = array(
				'dropdown-menu mt-2 space-y-2 duration-200 hidden ring-gray-900/5 rounded-lg md:opacity-0 md:group-hover:opacity-100 md:!block md:invisible md:group-hover:visible md:!mt-0 md:!space-y-0 md:absolute md:-left-2 md:top-full md:z-10 md:w-max md:max-w-md md:overflow-hidden md:shadow-lg md:ring-1 md:p-2',
				( $display_depth >= 2 ? 'sub-sub-menu' : '' ),
				'menu-depth-' . $display_depth,
			);
			$class_names   = implode( ' ', $classes );

			// build html
			$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}

		// add main/sub classes to li's and links
		function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
			global $wp_query;

			// Restores the more descriptive, specific name for use within this method.
			$item = $data_object;

			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

			// depth dependent classes (<li>)
			$depth_classes     = array(
				( $depth === 0 ? 'main-menu-item -mx-3 pt-2 md:!m-0 md:!py-1' : 'sub-menu-item font-lineSeedJp relative flex items-center gap-x-6 p-2 text-base font-bold md:!font-normal' ),
				( $depth >= 2 ? 'sub-sub-menu-item' : '' ),
				'menu-item-depth-' . $depth,
			);
			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

			$is_dropdown_item = isset( $args->has_children ) && $args->has_children;
			$dropdown_classes = array();

			if ( $is_dropdown_item ) {
				// with child elements - dropdown item
				$dropdown_classes[] = 'dropdown group relative';
			} elseif ( $depth === 0 ) {
				// without child elements - simple item
				$dropdown_classes[] = 'font-lineSeedJp font-bold -mx-3 pt-2 text-base md:!py-1 md:!m-0 md:!font-normal';
			}
			$dropdown_class_names = esc_attr( implode( ' ', $dropdown_classes ) );

			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			// build html
			$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $dropdown_class_names . '  ' . $class_names . '">';

			$link_class_names = $depth > 0 ? 'sub-menu-link block no-underline rounded-lg py-2 pl-6 pr-3 w-full duration-200 md:!p-0' : 'main-menu-link no-underline block px-3 py-2 rounded-lg duration-200 md:!px-0 md:!py-0 md:!inline md:!rounded-none';

			if ( isset( $args->has_children ) && $args->has_children && 0 === $depth && $args->depth > 1 ) {
				$link_class_names = 'main-menu-link dropdown-toggle font-lineSeedJp w-full flex justify-between items-center gap-x-1 text-base font-bold duration-200 pl-3 py-2 rounded-lg pr-3.5 md:!font-normal md:!pl-0 md:!pr-0 md:!py-0 md:!rounded-none md:!w-auto';
			}

			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) . '"' : '';
			$attributes .= ' class="menu-link ' . $link_class_names . '"';

			// dropdown arrow
			$dropdown_arrow_html = '
				<svg
					class="dropdown-arrow h-5 w-5 flex-none duration-200 md:group-hover:rotate-180"
					viewbox="0 0 20 20"
					fill="currentColor"
					aria-hidden="true"
				>
					<path
						fill-rule="evenodd"
						d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
						clip-rule="evenodd"
					></path>
				</svg>';

			$item_output = sprintf(
				'%1$s<a%2$s>%3$s%4$s%5$s%6$s</a>%7$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				( $is_dropdown_item && 0 === $depth ? $dropdown_arrow_html : '' ),
				$args->after
			);

			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
			$id_field = $this->db_fields['id'];
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
			}
			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}
	}
}
