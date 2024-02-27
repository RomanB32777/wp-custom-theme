<?php

function star_rating( $args = array() ) {
	$defaults = array(
		'rating'       => 0,
		'type'         => 'rating',
		'stars_number' => 0,
		'echo'         => true,
	);
	
	$parsed_args = wp_parse_args( $args, $defaults );
	$rating      = $parsed_args['rating'];

	$rating       = (float) str_replace( ',', '.', $parsed_args['rating'] );
	$stars_number = $parsed_args['stars_number'];

	$full_stars  = floor( $rating );
	$empty_stars = $stars_number - $full_stars;

	$star_el = '
		<svg
			width="12"
			height="12"
			viewbox="0 0 12 12"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
		>
			<path
				d="M5.30345 0.963523C5.45313 0.502869 6.10483 0.502872 6.25451 0.963528L7.15601 3.7381C7.22294 3.94411 7.41492 4.08359 7.63154 4.08359H10.5489C11.0333 4.08359 11.2347 4.7034 10.8428 4.9881L8.48262 6.70288C8.30737 6.8302 8.23405 7.05588 8.30098 7.26189L9.20249 10.0365C9.35216 10.4971 8.82492 10.8802 8.43307 10.5955L6.07287 8.88071C5.89763 8.75339 5.66033 8.75339 5.48509 8.88071L3.12487 10.5955C2.73302 10.8802 2.20578 10.4971 2.35545 10.0365L3.25698 7.2619C3.32392 7.05588 3.25059 6.8302 3.07535 6.70288L0.715164 4.9881C0.323307 4.7034 0.524694 4.08359 1.00906 4.08359H3.92639C4.14301 4.08359 4.33498 3.94412 4.40192 3.7381L5.30345 0.963523Z"
				fill="currentColor"
			></path>
		</svg>
	';

	$empty_star_el = '<div class="text-grizzly-light">' . $star_el . '</div>';
	$full_star_el  = '<div class="text-secondary">' . $star_el . '</div>';

	$output  = '<div class="flex gap-x-1">';
	$output .= str_repeat( $full_star_el, $full_stars );
	$output .= str_repeat( $empty_star_el, $empty_stars );
	$output .= '</div>';
	 
	if ( $parsed_args['echo'] ) {
		echo $output;
	}
	 
	return $output;
}

function comment_custom_template( $comment, $comment_class = '', $depth = 1, $args = array() ) {
	$comment_id = $comment->comment_ID;
	$rating     = get_comment_meta( $comment_id, 'rating', true );

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li ';
		$add_below = 'div-comment';
	}

	?>

	<<?php echo esc_attr( $tag ); ?><?php comment_class( $comment_class . ' my-3 [&>ul]:ml-8', $comment ); ?> id="comment-<?php echo esc_attr( $comment_id ); ?>">

		<?php if ( 'div' != $args['style'] ) { ?>
			<div id="div-comment-<?php echo esc_attr( $comment_id ); ?>" class="comment-wrapper relative rounded-lg border p-4 sm:!py-8 sm:!px-6">
		<?php } ?>

		<div class="comment-content">
			<div class="flex flex-col mb-6 sm:items-center sm:justify-between sm:!flex-row">
				<div class="mb-2 flex items-center sm:mb-0">
					<p class="comment-author font-roboto font-semibold text-lg">
						<?php echo esc_html( get_comment_author( $comment_id ) ); ?>
					</p>
					<div class="ml-4 flex gap-x-1">
						<?php
						star_rating(
							array(
								'rating'       => $rating,
								'type'         => 'rating',
								'stars_number' => '5',
							)
						);
						?>
					</div>
				</div>

				<p class="font-roboto text-grizzly-light font-medium text-sm">
					<?php echo esc_html( get_comment_date( get_option( 'date_format' ), $comment_id ) ); ?>
				</p>
			</div>
			<div class="font-roboto text-base font-normal mb-6">
				<?php comment_text( $comment_id ); ?>
			</div>

			<?php edit_comment_link( '(' . esc_html__( 'Edit', 'custom-theme' ) . ')', '  ', '' ); ?>
			<?php 
				comment_reply_link(
					array_merge( 
						$args, 
						array( 
							'add_below' => $add_below, 
							'depth'     => $depth, 
							'max_depth' => $args['max_depth'], 
						) 
					) 
				); 
			?>
		</div>
	<?php if ( 'div' !== $args['style'] ) { ?>
		</div>
		<?php 
	}
}

function comment_custom( $comment, $args, $depth ) {
	$comment_class = empty( $args['has_children'] ) ? '' : 'parent';

	comment_custom_template( $comment, $comment_class, $depth, $args ); 
}
