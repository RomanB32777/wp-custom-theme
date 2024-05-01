<?php

function get_page_info( $approver_id ) {
	$approver_name = '';
	$author_name   = get_the_author_meta( 'display_name' );

	$allowed_html = array(
		'a'      => array(
			'href'   => true,
			'title'  => true,
			'target' => true,
			'rel'    => true,
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'span'   => array(
			'class' => true,
		),
		'div'    => array(
			'class' => true,
		),
		'p'      => array(),
	);

	if ( ! empty( $approver_id ) ) {
		$approver_name = get_the_author_meta( 'display_name', $approver_id );
	}
	?>
	<div class="py-8 flex flex-row flex-wrap items-center justify-center gap-y-3 divide-x divide-primary">
		<?php if ( ! empty( $author_name ) ) { ?>
			<div class="flex flex-col items-center pr-5 text-base sm:!pr-7">
				<p class="mb-2">
					<?php esc_html_e( 'Author', 'custom-theme' ); ?>
				</p>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
					<?php echo wp_kses( $author_name, $allowed_html ); ?>
				</a>
			</div>
		<?php } ?>
		<?php if ( ! empty( $approver_id ) ) { ?>
			<div class="flex flex-col items-center px-5 text-base sm:!px-7">
				<p class="mb-2">
					✅ <?php esc_html_e( 'Verified by experts', 'custom-theme' ); ?>
				</p>
				<a href="<?php echo esc_url( get_author_posts_url( $approver_id ) ); ?>" title="<?php echo esc_attr( $approver_name ); ?>" rel="approver">
					<?php echo wp_kses( $approver_name, $allowed_html ); ?>
				</a>
			</div>
		<?php } ?>
		<div class="flex flex-col items-center px-5 text-base sm:!px-7">
			<p class="mb-2">
				<?php esc_html_e( 'Renew', 'custom-theme' ); ?>
			</p>
			<p>
				<?php echo wp_kses( get_the_modified_date(), $allowed_html ); ?>
			</p>
		</div>
		<div class="flex flex-col items-center pl-5 text-base sm:!pl-7">
			<p class="mb-2">
				<?php esc_html_e( 'Comments', 'custom-theme' ); ?>
			</p>
			<p class="text-center">
				<?php
					comments_number(
						__( '0 comments', 'custom-theme' ),
						__( '1 comment', 'custom-theme' ),
						__( '% comments', 'custom-theme' ) 
					); 
				?>
			</p>
		</div>
	</div>

<?php } ?>
