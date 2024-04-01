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
				'dropdown-menu mt-2 space-y-2 duration-200 hidden ring-gray-900/5 rounded-lg xl:opacity-0 xl:group-hover:opacity-100 xl:!block xl:invisible xl:group-hover:visible xl:!mt-0 xl:!space-y-0 xl:absolute xl:-left-2 xl:top-full xl:z-10 xl:w-max xl:max-w-md xl:overflow-hidden xl:shadow-lg xl:ring-1 xl:p-2',
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
				( $depth === 0 ? 'main-menu-item -mx-3 pt-2 xl:!m-0 xl:!py-1' : 'sub-menu-item relative flex items-center gap-x-6 p-2 text-sm font-semibold xl:!font-bold' ),
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
				$dropdown_classes[] = 'font-semibold -mx-3 pt-2 text-base xl:!py-1 xl:!m-0 xl:!text-sm xl:!font-bold';
			}
			$dropdown_class_names = esc_attr( implode( ' ', $dropdown_classes ) );

			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			// build html
			$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $dropdown_class_names . '  ' . $class_names . '">';

			$link_class_names = $depth > 0 ? 'sub-menu-link block no-underline rounded-lg py-2 pl-6 pr-3 w-full duration-200 xl:!p-0' : 'main-menu-link no-underline block px-3 py-2 rounded-lg duration-200 xl:!px-0 xl:!py-0 xl:!inline xl:!rounded-none';

			if ( isset( $args->has_children ) && $args->has_children && 0 === $depth && $args->depth > 1 ) {
				$link_class_names = 'main-menu-link dropdown-toggle w-full flex justify-between items-center gap-x-1 text-base font-semibold duration-200 pl-3 py-2 rounded-lg pr-3.5 xl:!font-bold xl:!text-sm xl:!pl-0 xl:!pr-0 xl:!py-0 xl:!rounded-none xl:!w-auto';
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
					class="dropdown-arrow h-5 w-5 flex-none duration-200 xl:group-hover:rotate-180"
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
