<?php

function comment_custom_template( $comment, $comment_class = '', $depth = 1, $args = array() ) {
	$allowed_comment_html = array(
		'a'      => array(
			'href'       => true,
			'title'      => true,
			'target'     => true,
			'class'      => true,
			'rel'        => true,
			'data-*'     => true,
			'aria-label' => true, 
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'span'   => array(),
		'p'      => array(),
		'div'    => array(
			'class' => true,
		),
		'svg'    => array(
			'width'   => true,
			'height'  => true,
			'viewbox' => true,
			'fill'    => true,
			'xmlns'   => true,
		),
		'path'   => array(
			'd'    => true,
			'fill' => true,
		),
	);

	$comment_id = $comment->comment_ID;
	$post_id    = $comment->comment_post_ID;
	$rating     = get_comment_meta( $comment_id, 'rating', true );

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li ';
		$add_below = 'div-comment';
	}

	$comment_classes = $comment_class . ' py-6 [&>ul]:ml-8 [&>ul]:divide-y';
	?>

	<<?php echo esc_attr( $tag ); ?><?php comment_class( $comment_classes, $comment ); ?> id="comment-<?php echo esc_attr( $comment_id ); ?>">

		<?php if ( 'div' !== $args['style'] ) { ?>
			<div id="div-comment-<?php echo esc_attr( $comment_id ); ?>" class="comment-wrapper relative">
		<?php } ?>

		<div class="comment-content">
			<div class="mb-4">
				<p class="comment-author mb-2 font-semibold text-xl">
					<?php echo esc_html( get_comment_author( $comment_id ) ); ?>
				</p>

				<div class="flex items-center justify-between gap-x-2 md:!gap-x-4 md:!justify-start">
					<?php if ( function_exists( 'custom_star_rating' ) ) { ?>
						<?php
							custom_star_rating(
								array(
									'rating' => $rating,
								)
							);
						?>
					<?php } ?>
					
					<p class="text-grizzly-dark font-medium text-sm">
						<?php echo esc_html( get_comment_date( get_option( 'date_format' ), $comment_id ) ); ?>
					</p>
				</div>
			</div>
			<div class="text-lg">
				<?php comment_text( $comment_id ); ?>
			</div>

			<?php
				$is_can_edit_comment = current_user_can( 'edit_comment', $comment_id );
				$reply_link          = get_comment_reply_link(
					array_merge( 
						$args, 
						array( 
							'add_below' => $add_below, 
							'depth'     => $depth, 
							'max_depth' => $args['max_depth'], 
						)
					),
					$comment_id,
					$post_id 
				);

			if ( $is_can_edit_comment || ! empty( $reply_link ) ) { 
				$edit_link = '<a class="comment-edit-link" href="' . esc_url( get_edit_comment_link( $comment ) ) . '">(' . esc_html__( 'Edit', 'custom-theme' ) . ')</a>';
	
				?>
					<div class="mt-3 [&>a]:no-underline">  
						<?php echo wp_kses( $edit_link, $allowed_comment_html ); ?>
						<?php echo wp_kses( $reply_link, $allowed_comment_html ); ?>
					</div>
	
			<?php } ?>
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
