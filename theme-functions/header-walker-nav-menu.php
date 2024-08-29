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
				'dropdown-menu space-y-4 mt-4 ring-gray-900/5 xl:!mt-0',
				( $depth >= 1 ? 'sub-menu pl-8' : 'hidden rounded-b-xl xl:!block xl:!space-y-0 xl:absolute xl:left-0 xl:top-full xl:z-10 xl:overflow-hidden xl:group-hover/main:visible xl:invisible xl:shadow-lg xl:w-80' ),
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
				( $depth === 0 ? 'main-menu-item text-2xl xl:flex xl:items-center xl:!m-0 xl:!text-lg transition border-primary-brightest [&.current-menu-item]:border-b-4 [&.current-menu-parent]:border-b-4' : '' ),
				( $depth >= 1 ? 'sub-menu-item' : '' ),
				'menu-item-depth-' . $depth,
			);
			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

			$is_dropdown_item = isset( $args->has_children ) && $args->has_children;

			$dropdown_classes = array();

			if ( $is_dropdown_item ) {
				// with child elements - dropdown item
				$dropdown_classes[] = 'dropdown relative [&:last-child>ul]:left-auto [&:last-child>ul]:right-0';
				$dropdown_classes[] = $depth > 0 ? 'group/sub' : 'group/main';
			}

			$dropdown_class_names = esc_attr( implode( ' ', $dropdown_classes ) );

			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			// build html
			$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $dropdown_class_names . '  ' . $class_names . '">';

			$link_classes = array(
				$depth > 0 ? 'sub-menu-link block text-lg no-underline transition xl:px-8 xl:py-4' : 'main-menu-link no-underline xl:flex xl:items-center xl:h-full xl:px-8',
			);

			if ( isset( $args->has_children ) && $args->has_children && $args->depth > 1 ) {
				// for only top link with child
				if ( 0 === $depth ) {
					$link_classes[] = 'dropdown-toggle cursor-pointer';
				}

				$link_classes[] = 'w-full flex items-center gap-x-2 xl:w-auto';
			}

			$link_class_names = implode( ' ', $link_classes );

			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) . '"' : '';
			$attributes .= ' class="menu-link ' . $link_class_names . '"';

			// dropdown arrow
			$dropdown_arrow_html = '
				<svg
					class="dropdown-arrow xl:hidden"
					xmlns="http://www.w3.org/2000/svg"
					width="28"
					height="18"
					viewBox="0 0 28 18"
					fill="none"
				>
					<path
						d="M0 9H26M26 9L18.3607 1M26 9L18.3607 17"
						stroke-width="2"
						stroke="currentColor"
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
