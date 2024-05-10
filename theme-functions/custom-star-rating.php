<?php

function custom_star_rating( $args = array() ) {
	$allowed_star_html = array(
		'div'  => array(
			'class' => true,
		),
		'svg'  => array(
			'width'   => true,
			'height'  => true,
			'viewbox' => true,
			'fill'    => true,
			'xmlns'   => true,
			'class'   => true,
		),
		'g'    => array(
			'mask' => true,
		),
		'mask' => array(
			'id'        => true,
			'style'     => true,
			'maskUnits' => true,
			'x'         => true,
			'y'         => true,
			'width'     => true,
			'height'    => true,
		),
		'path' => array(
			'd'            => true,
			'fill'         => true,
			'fill-rule'    => true,
			'clip-rule'    => true,
			'stroke'       => true,
			'stroke-width' => true,
			'class'        => true,
		),
		'rect' => array(
			'x'      => true,
			'y'      => true,
			'width'  => true,
			'height' => true,
			'fill'   => true,
			'class'  => true,
		),
	);

	$defaults = array(
		'rating'              => 0,
		'echo'                => true,
		'rating_stars_number' => 0,
		'wrapper_classes'     => 'gap-x-1',
		'star_classes'        => '',
	);

	$parsed_args = wp_parse_args( $args, $defaults );

	$rating_stars_number = $parsed_args['rating_stars_number'];

	if ( ! $rating_stars_number ) {
		if ( get_option( 'custom_rating_stars_number' ) ) {
			$rating_stars_number = get_option( 'custom_rating_stars_number' );
		} else {
			$rating_stars_number = 5;
		}
	} 

	$rating = (float) str_replace( ',', '.', $parsed_args['rating'] );

	$full_stars = floor( $rating );

	if ( $full_stars > $rating_stars_number ) {
		$full_stars = $rating_stars_number;
		$rating     = $rating_stars_number;
	}

	$half_stars  = ceil( $rating - $full_stars );
	$empty_stars = $rating_stars_number - $full_stars - $half_stars;

	$star_classes = $parsed_args['star_classes'];

	$star_el = '
		<svg
			width="12"
			height="12"
			viewBox="0 0 24 24"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
			class="' . $star_classes . '"
		>
			<path
				d="M23.4833 11.0095C23.9655 10.4664 24.1217 9.72154 23.9032 9.01914C23.6848 8.31555 23.1369 7.81028 22.4419 7.66626L16.8512 6.51408C16.6871 6.47984 16.5456 6.37242 16.4629 6.22013L13.6852 1.03059C13.3388 0.384845 12.7083 0 11.9997 0C11.2911 0 10.6617 0.384845 10.3153 1.03059L7.53754 6.22013C7.45491 6.37242 7.31342 6.47984 7.14816 6.51408L1.55862 7.66626C0.862471 7.81028 0.315747 8.31555 0.097281 9.01914C-0.122315 9.72154 0.0350062 10.4664 0.517216 11.0095L4.39075 15.3679C4.50395 15.4966 4.55827 15.6702 4.53789 15.8437L3.86214 21.7451C3.77838 22.4794 4.06927 23.1782 4.64429 23.6127C4.98388 23.87 5.37667 24 5.77285 24C6.04791 24 6.32522 23.9373 6.58783 23.811L11.7597 21.3154C11.9125 21.2422 12.0868 21.2422 12.2396 21.3154L17.4126 23.811C18.0544 24.1203 18.78 24.0471 19.3551 23.6127C19.9301 23.1782 20.2221 22.4794 20.1384 21.7451L19.4615 15.8449C19.4411 15.6702 19.4954 15.4966 19.6109 15.3679L23.4833 11.0095Z"
				fill="currentColor"
			></path>
		</svg>
	';

	$star_half_el = '
		<svg 
			width="24"
			height="24"
			viewbox="0 0 24 24"
			fill="none" 
			xmlns="http://www.w3.org/2000/svg"
			class="' . $star_classes . '"
		>
			<path 
				fill-rule="evenodd" 
				clip-rule="evenodd" 
				d="M23.4833 11.0095C23.9655 10.4664 24.1217 9.72154 23.9032 9.01914C23.6848 8.31555 23.1369 7.81028 22.4419 7.66626L16.8512 6.51408C16.6871 6.47984 16.5456 6.37242 16.4629 6.22013L13.6852 1.03059C13.3388 0.384845 12.7083 0 11.9997 0C11.2911 0 10.6617 0.384845 10.3153 1.03059L7.53754 6.22013C7.45491 6.37242 7.31342 6.47984 7.14816 6.51408L1.55862 7.66626C0.862471 7.81028 0.315747 8.31555 0.097281 9.01914C-0.122315 9.72154 0.0350062 10.4664 0.517216 11.0095L4.39075 15.3679C4.50395 15.4966 4.55827 15.6702 4.53789 15.8437L3.86214 21.7451C3.77838 22.4794 4.06927 23.1782 4.64429 23.6127C4.98388 23.87 5.37667 24 5.77285 24C6.04791 24 6.32522 23.9373 6.58783 23.811L11.7597 21.3154C11.9125 21.2422 12.0868 21.2422 12.2396 21.3154L17.4126 23.811C18.0544 24.1203 18.78 24.0471 19.3551 23.6127C19.9301 23.1782 20.2221 22.4794 20.1384 21.7451L19.4615 15.8449C19.4411 15.6702 19.4954 15.4966 19.6109 15.3679L23.4833 11.0095Z" 
				class="star"
				fill="currentColor"
			/>
			<mask id="mask0_67_16031" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
				<path 
					fill-rule="evenodd" 
					clip-rule="evenodd" 
					d="M23.4833 11.0095C23.9655 10.4664 24.1217 9.72154 23.9032 9.01914C23.6848 8.31555 23.1369 7.81028 22.4419 7.66626L16.8512 6.51408C16.6871 6.47984 16.5456 6.37242 16.4629 6.22013L13.6852 1.03059C13.3388 0.384845 12.7083 0 11.9997 0C11.2911 0 10.6617 0.384845 10.3153 1.03059L7.53754 6.22013C7.45491 6.37242 7.31342 6.47984 7.14816 6.51408L1.55862 7.66626C0.862471 7.81028 0.315747 8.31555 0.097281 9.01914C-0.122315 9.72154 0.0350062 10.4664 0.517216 11.0095L4.39075 15.3679C4.50395 15.4966 4.55827 15.6702 4.53789 15.8437L3.86214 21.7451C3.77838 22.4794 4.06927 23.1782 4.64429 23.6127C4.98388 23.87 5.37667 24 5.77285 24C6.04791 24 6.32522 23.9373 6.58783 23.811L11.7597 21.3154C11.9125 21.2422 12.0868 21.2422 12.2396 21.3154L17.4126 23.811C18.0544 24.1203 18.78 24.0471 19.3551 23.6127C19.9301 23.1782 20.2221 22.4794 20.1384 21.7451L19.4615 15.8449C19.4411 15.6702 19.4954 15.4966 19.6109 15.3679L23.4833 11.0095Z" 
					class="star"
					fill="currentColor"
				/>
			</mask>
			<g mask="url(#mask0_67_16031)">
				<rect x="-2" y="11" width="26" height="18" class="star active" fill="currentColor"/>
			</g>
		</svg>
	';


	$empty_star_el = '<div class="star">' . $star_el . '</div>';
	$half_star_el  = '<div>' . $star_half_el . '</div>';
	$full_star_el  = '<div class="star active">' . $star_el . '</div>';

	$wrapper_classes = $parsed_args['wrapper_classes'];

	$output  = '<div class="flex ' . $wrapper_classes . '">';
	$output .= str_repeat( $full_star_el, $full_stars );
	$output .= str_repeat( $half_star_el, $half_stars );
	$output .= str_repeat( $empty_star_el, $empty_stars );
	$output .= '</div>';
	 
	if ( $parsed_args['echo'] ) {
		echo wp_kses( $output, $allowed_star_html );
	}
	 
	return $output;
}
