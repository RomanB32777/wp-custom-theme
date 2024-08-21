<?php

/*  Add Custom Text Field Start */

function custom_text_field_display_meta_box( $field_name, $post, $editor_args = array(), $label = '' ) {

	$post_type = $post->post_type;

	wp_nonce_field( "{$post_type}_{$field_name}_box", "{$post_type}_{$field_name}_nonce" );

	$field_value = get_post_meta( $post->ID, "{$post_type}_{$field_name}", false );
	
	?>

	<div class="components-base-control">
		<div class="components-base-control__field">
			<?php
			if ( empty( $field_value[0] ) ) {
				$field_value[0] = '';
			}

			if ( ! empty( $label ) ) { 
				?>

				<label class="components-base-control__label">
					<?php echo esc_html( $label ); ?>
				</label>
				
				<?php 
			}

			wp_editor( $field_value[0], "{$post_type}_{$field_name}", $editor_args );
			?>
		</div>
	</div>

	<?php
}

function custom_save_post_type_field( $post_type, $field_name, $post_id ) {

	if ( ! isset( $_POST[ "{$post_type}_{$field_name}_nonce" ] ) ) {
		return $post_id;
	}

	$nonce = $_POST[ "{$post_type}_{$field_name}_nonce" ];

	if ( ! wp_verify_nonce( $nonce, "{$post_type}_{$field_name}_box" ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( $post_type === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	}

	if ( isset( $_POST[ "{$post_type}_{$field_name}" ] ) ) {
		update_post_meta( $post_id, "{$post_type}_{$field_name}", sanitize_text_field( wp_unslash( $_POST[ "{$post_type}_{$field_name}" ] ) ) );
	}
}

/*  Add Custom Text Field End */

/** Custom Lecturers - Start  */

require_once __DIR__ . '/custom-post-types/lecturers.php';

/**  Custom Lecturers - End  */

/** Custom Services - Start  */

require_once __DIR__ . '/custom-post-types/services.php';

/**  Custom Services - End  */

/** Custom Documents - Start  */

require_once __DIR__ . '/custom-post-types/documents.php';

/**  Custom Documents - End  */
