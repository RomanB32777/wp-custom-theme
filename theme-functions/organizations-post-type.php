<?php

/*  Organizations - Post Type Start */

add_action( 'init', 'init_organizations', 0 );

function init_organizations() {

	$organization_slug = 'organization';
	$organization_name = esc_html__( 'Organizations', 'custom-theme' );

	$args = array(
		'labels'             => array(
			'name'         => $organization_name,
			'add_new'      => esc_html__( 'Add New', 'custom-theme' ),
			'edit_item'    => esc_html__( 'Edit Item', 'custom-theme' ),
			'add_new_item' => esc_html__( 'Add New', 'custom-theme' ),
			'view_item'    => esc_html__( 'View Item', 'custom-theme' ),
		),
		'singular_label'     => __( 'organization' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-welcome-widgets-menus',
		'_builtin'           => false,
		'_edit_link'         => 'post.php?post=%d',
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'supports'           => array(
			'title',
			'editor',
			'author',
			'comments',
			'thumbnail',
			'excerpt',
			'revisions',
		),
		'has_archive'        => false,
		'rest_base'          => 'organization',
		'rewrite'            => array(
			'slug'       => $organization_slug,
			'with_front' => false,
		),
	);

	register_post_type( 'organization', $args );

	/* --- Deposit Methods: Custom Taxonomy --- */

	$organizations_deposit_method_title = esc_html__( 'Deposit Methods', 'custom-theme' );
	if ( get_option( 'organizations_deposit_method_title' ) ) {
		$organizations_deposit_method_title = get_option( 'organizations_deposit_method_title', 'Deposit Methods' );
	}

	$labels = array(
		'name'              => $organizations_deposit_method_title,
		'singular_name'     => $organizations_deposit_method_title,
		'search_items'      => esc_html__( 'Find Taxonomy', 'custom-theme' ),
		'all_items'         => esc_html__( 'All ', 'custom-theme' ) . $organizations_deposit_method_title,
		'parent_item'       => esc_html__( 'Parent Taxonomy', 'custom-theme' ),
		'parent_item_colon' => esc_html__( 'Parent Taxonomy:', 'custom-theme' ),
		'edit_item'         => esc_html__( 'Edit Taxonomy', 'custom-theme' ),
		'view_item'         => esc_html__( 'View Taxonomy', 'custom-theme' ),
		'update_item'       => esc_html__( 'Update Taxonomy', 'custom-theme' ),
		'add_new_item'      => esc_html__( 'Add New Taxonomy', 'custom-theme' ),
		'new_item_name'     => esc_html__( 'Taxonomy', 'custom-theme' ),
		'menu_name'         => $organizations_deposit_method_title,
	); 

	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_tagcloud'         => true,
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		'query_var'             => '',
		'capabilities'          => array(),
		'_builtin'              => false,
	);

	register_taxonomy( 'deposit-method', 'organization', $args );

	/* --- Devices: Custom Taxonomy --- */

	$organizations_devices_title = esc_html__( 'Devices', 'custom-theme' );
	if ( get_option( 'organizations_devices_title' ) ) {
		$organizations_devices_title = get_option( 'organizations_devices_title', 'Devices' );
	}

	$labels = array(
		'name'              => $organizations_devices_title,
		'singular_name'     => $organizations_devices_title,
		'search_items'      => esc_html__( 'Find Taxonomy', 'custom-theme' ),
		'all_items'         => esc_html__( 'All ', 'custom-theme' ) . $organizations_devices_title,
		'parent_item'       => esc_html__( 'Parent Taxonomy', 'custom-theme' ),
		'parent_item_colon' => esc_html__( 'Parent Taxonomy:', 'custom-theme' ),
		'edit_item'         => esc_html__( 'Edit Taxonomy', 'custom-theme' ),
		'view_item'         => esc_html__( 'View Taxonomy', 'custom-theme' ),
		'update_item'       => esc_html__( 'Update Taxonomy', 'custom-theme' ),
		'add_new_item'      => esc_html__( 'Add New Taxonomy', 'custom-theme' ),
		'new_item_name'     => esc_html__( 'Taxonomy', 'custom-theme' ),
		'menu_name'         => $organizations_devices_title,
	); 

	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_tagcloud'         => true,
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		'query_var'             => '',
		'capabilities'          => array(),
		'_builtin'              => false,
	);

	register_taxonomy( 'device', 'organization', $args );
}

/*  Organizations - Post Type End */

/*  Organizations - Short Description Start */

add_action( 'admin_init', 'organizations_short_fields' );

function organizations_short_fields() {
	add_meta_box(
		'organizations_short_meta_box',
		esc_html__( 'Short Description', 'custom-theme' ),
		'organizations_short_display_meta_box',
		'organization',
		'normal',
		'high'
	);
}

function organizations_short_display_meta_box( $organization ) {

	wp_nonce_field( 'organizations_short_box', 'organizations_short_nonce' );

	$organization_short_desc = get_post_meta( $organization->ID, 'organization_short_desc', false );
	
	$editor_args = array(
		'tinymce'       => array(
			'toolbar1' => 'bold,italic,underline,bullist,numlist,link,unlink,undo,redo',
		),
		'quicktags'     => array(
			'buttons' => 'em,strong,link,ul,li,ol,close',
		),
		'media_buttons' => false,
		'textarea_rows' => 4,
	);
	?>

<div class="components-base-control organization_short_desc">
	<div class="components-base-control__field">
		<?php
		if ( empty( $organization_short_desc[0] ) ) {
			$organization_short_desc[0] = '';
		}
		wp_editor( $organization_short_desc[0], 'organization_short_desc', $editor_args );
		?>
	</div>
</div>

	<?php
}

add_action( 'save_post', 'organizations_short_save_fields', 10, 2 );

function organizations_short_save_fields( $post_id ) {

	if ( ! isset( $_POST['organizations_short_nonce'] ) ) {
		return $post_id;
	}

		$nonce = $_POST['organizations_short_nonce'];

	if ( ! wp_verify_nonce( $nonce, 'organizations_short_box' ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( 'organization' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	}

		$organization_short_desc = $_POST['organization_short_desc'];
		update_post_meta( $post_id, 'organization_short_desc', $organization_short_desc );
}

/*  Organizations - Short Description End */


/*  Organizations - Ratings Start */

add_action( 'admin_init', 'organizations_ratings_fields' );

function organizations_ratings_fields() {

	add_meta_box(
		'organizations_ratings_meta_box',
		esc_html__( 'Item Ratings', 'custom-theme' ),
		'organizations_ratings_display_meta_box',
		'organization',
		'normal',
		'high'
	);
}

function organizations_ratings_display_meta_box( $organization ) {

	wp_nonce_field( 'organizations_ratings_box', 'organizations_ratings_nonce' );
	$meta = get_post_meta( $organization->ID );

	$organization_rating_trust    = ( isset( $meta['organization_rating_trust'][0] ) && '' !== $meta['organization_rating_trust'][0] ) ? $meta['organization_rating_trust'][0] : '';
	$organization_rating_games    = ( isset( $meta['organization_rating_games'][0] ) && '' !== $meta['organization_rating_games'][0] ) ? $meta['organization_rating_games'][0] : '';
	$organization_rating_bonus    = ( isset( $meta['organization_rating_bonus'][0] ) && '' !== $meta['organization_rating_bonus'][0] ) ? $meta['organization_rating_bonus'][0] : '';
	$organization_rating_customer = ( isset( $meta['organization_rating_customer'][0] ) && '' !== $meta['organization_rating_customer'][0] ) ? $meta['organization_rating_customer'][0] : '';
	$organization_rating_pre      = ( isset( $meta['organization_rating_pre'][0] ) && '' !== $meta['organization_rating_pre'][0] ) ? $meta['organization_rating_pre'][0] : '';
	$organization_rating_live     = ( isset( $meta['organization_rating_live'][0] ) && '' !== $meta['organization_rating_live'][0] ) ? $meta['organization_rating_live'][0] : '';
	$organization_rating_coef     = ( isset( $meta['organization_rating_coef'][0] ) && '' !== $meta['organization_rating_coef'][0] ) ? $meta['organization_rating_coef'][0] : '';
	$organization_rating_payments = ( isset( $meta['organization_rating_payments'][0] ) && '' !== $meta['organization_rating_payments'][0] ) ? $meta['organization_rating_payments'][0] : '';
	$organization_rating_features = ( isset( $meta['organization_rating_features'][0] ) && '' !== $meta['organization_rating_features'][0] ) ? $meta['organization_rating_features'][0] : '';

	// Get the number of stars in the rating

	if ( get_option( 'custom_rating_stars_number' ) ) {
		$rating_stars_number_value = get_option( 'custom_rating_stars_number' );
	} else {
		$rating_stars_number_value = '5';
	}

	?>

<style type="text/css">
	.custom-theme-single-rating-box {
		padding-bottom: 10px;
	}
	
	.custom-theme-single-rating-box label {
		padding-right: 12px;
	}

	.custom-theme-single-rating-box label:last-child {
		padding-right: 0;
	}

	.custom-theme-single-rating-box label input[type=radio] {
		margin-right: 0 !important;
	}
</style>

<div class="components-base-control organization_rating_trust">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_1_title = get_option( 'rating_1' );
			if ( $rating_1_title ) {
				echo esc_html( $rating_1_title );
			} else {
				esc_html_e( 'Trust & Fairness', 'custom-theme' );
			} 
			?>
		</label>

		<div class="custom-theme-single-rating-box">
			<?php
			for ( $i = 0; $i <= $rating_stars_number_value; $i++ ) {
				?>
				<label>
					<input type="radio" name="organization_rating_trust" value="<?php esc_attr_e( $i ); ?>" <?php checked( $organization_rating_trust, $i ); ?>>
					<?php esc_attr_e( $i ); ?>
				</label>
				<?php
			}
			?>
		</div>
	</div>
</div>

<div class="components-base-control organization_rating_games">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_2_title = get_option( 'rating_2' );
			if ( $rating_2_title ) {
				echo esc_html( $rating_2_title );
			} else {
				esc_html_e( 'Games & Software', 'custom-theme' );
			} 
			?>
		</label>
		<div class="custom-theme-single-rating-box">
			<?php
			for ( $i = 0; $i <= $rating_stars_number_value; $i++ ) {
				?>
				<label>
					<input type="radio" name="organization_rating_games" value="<?php esc_attr_e( $i ); ?>" <?php checked( $organization_rating_games, $i ); ?>>
					<?php esc_attr_e( $i ); ?>
				</label>
				<?php
			}
			?>
		</div>
	</div>
</div>

<div class="components-base-control organization_rating_bonus">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_3_title = get_option( 'rating_3' );
			if ( $rating_3_title ) {
				echo esc_html( $rating_3_title );
			} else {
				esc_html_e( 'Bonuses & Promotions', 'custom-theme' );
			} 
			?>
		</label>
		<div class="custom-theme-single-rating-box">
			<?php
			for ( $i = 0; $i <= $rating_stars_number_value; $i++ ) {
				?>
				<label>
					<input type="radio" name="organization_rating_bonus" value="<?php esc_attr_e( $i ); ?>" <?php checked( $organization_rating_bonus, $i ); ?>>
					<?php esc_attr_e( $i ); ?>
				</label>
				<?php
			}
			?>
		</div>
	</div>
</div>

<div class="components-base-control organization_rating_customer">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_4_title = get_option( 'rating_4' );
			if ( $rating_4_title ) {
				echo esc_html( $rating_4_title );
			} else {
				esc_html_e( 'Customer Support', 'custom-theme' );
			} 
			?>
		</label>
		<div class="custom-theme-single-rating-box">
			<?php
			for ( $i = 0; $i <= $rating_stars_number_value; $i++ ) {
				?>
				<label>
					<input type="radio" name="organization_rating_customer" value="<?php esc_attr_e( $i ); ?>" <?php checked( $organization_rating_customer, $i ); ?>>
					<?php esc_attr_e( $i ); ?>
				</label>
				<?php
			}
			?>
		</div>
	</div>
</div>

<div class="components-base-control organization_rating_pre">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_5_title = get_option( 'rating_5' );
			if ( $rating_5_title ) {
				echo esc_html( $rating_5_title );
			} else {
				esc_html_e( 'In the pre', 'custom-theme' );
			} 
			?>
		</label>
		<div class="custom-theme-single-rating-box">
			<?php
			for ( $i = 0; $i <= $rating_stars_number_value; $i++ ) {
				?>
				<label>
					<input type="radio" name="organization_rating_pre" value="<?php esc_attr_e( $i ); ?>" <?php checked( $organization_rating_pre, $i ); ?>>
					<?php esc_attr_e( $i ); ?>
				</label>
				<?php
			}
			?>
		</div>
	</div>
</div>

<div class="components-base-control organization_rating_live">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_6_title = get_option( 'rating_6' );
			if ( $rating_6_title ) {
				echo esc_html( $rating_6_title );
			} else {
				esc_html_e( 'Live', 'custom-theme' );
			} 
			?>
		</label>
		<div class="custom-theme-single-rating-box">
			<?php
			for ( $i = 0; $i <= $rating_stars_number_value; $i++ ) {
				?>
				<label>
					<input type="radio" name="organization_rating_live" value="<?php esc_attr_e( $i ); ?>" <?php checked( $organization_rating_live, $i ); ?>>
					<?php esc_attr_e( $i ); ?>
				</label>
				<?php
			}
			?>
		</div>
	</div>
</div>

<div class="components-base-control organization_rating_coef">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_7_title = get_option( 'rating_7' );
			if ( $rating_7_title ) {
				echo esc_html( $rating_7_title );
			} else {
				esc_html_e( 'Coefficients', 'custom-theme' );
			} 
			?>
		</label>
		<div class="custom-theme-single-rating-box">
			<?php
			for ( $i = 0; $i <= $rating_stars_number_value; $i++ ) {
				?>
				<label>
					<input type="radio" name="organization_rating_coef" value="<?php esc_attr_e( $i ); ?>" <?php checked( $organization_rating_coef, $i ); ?>>
					<?php esc_attr_e( $i ); ?>
				</label>
				<?php
			}
			?>
		</div>
	</div>
</div>

<div class="components-base-control organization_rating_payments">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_8_title = get_option( 'rating_8' );
			if ( $rating_8_title ) {
				echo esc_html( $rating_8_title );
			} else {
				esc_html_e( 'Convenience of payments', 'custom-theme' );
			} 
			?>
		</label>
		<div class="custom-theme-single-rating-box">
			<?php
			for ( $i = 0; $i <= $rating_stars_number_value; $i++ ) {
				?>
				<label>
					<input type="radio" name="organization_rating_payments" value="<?php esc_attr_e( $i ); ?>" <?php checked( $organization_rating_payments, $i ); ?>>
					<?php esc_attr_e( $i ); ?>
				</label>
				<?php
			}
			?>
		</div>
	</div>
</div>

<div class="components-base-control organization_rating_features">
	<div class="components-base-control__field">
		<label class="components-base-control__label">
			<?php
			$rating_9_title = get_option( 'rating_9' );
			if ( $rating_9_title ) {
				echo esc_html( $rating_9_title );
			} else {
				esc_html_e( 'Interface/Features', 'custom-theme' );
			} 
			?>
		</label>
		<div class="custom-theme-single-rating-box">
			<?php
			for ( $i = 0; $i <= $rating_stars_number_value; $i++ ) {
				?>
				<label>
					<input type="radio" name="organization_rating_features" value="<?php esc_attr_e( $i ); ?>" <?php checked( $organization_rating_features, $i ); ?>>
					<?php esc_attr_e( $i ); ?>
				</label>
				<?php
			}
			?>
		</div>
	</div>
</div>

	<?php
}

add_action( 'save_post', 'organizations_ratings_save_fields', 10, 2 );

function organizations_ratings_save_fields( $post_id ) {

	if ( ! isset( $_POST['organizations_ratings_nonce'] ) ) {
		return $post_id;
	}

		$nonce = $_POST['organizations_ratings_nonce'];

	if ( ! wp_verify_nonce( $nonce, 'organizations_ratings_box' ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( 'organization' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	}

	if ( isset( $_POST['organization_rating_trust'] ) ) {
		update_post_meta( $post_id, 'organization_rating_trust', sanitize_text_field( wp_unslash( $_POST['organization_rating_trust'] ) ) );
	}

	if ( isset( $_POST['organization_rating_games'] ) ) {
		update_post_meta( $post_id, 'organization_rating_games', sanitize_text_field( wp_unslash( $_POST['organization_rating_games'] ) ) );
	}

	if ( isset( $_POST['organization_rating_bonus'] ) ) {
		update_post_meta( $post_id, 'organization_rating_bonus', sanitize_text_field( wp_unslash( $_POST['organization_rating_bonus'] ) ) );
	}

	if ( isset( $_POST['organization_rating_customer'] ) ) {
		update_post_meta( $post_id, 'organization_rating_customer', sanitize_text_field( wp_unslash( $_POST['organization_rating_customer'] ) ) );
	}

	if ( isset( $_POST['organization_rating_pre'] ) ) {
		update_post_meta( $post_id, 'organization_rating_pre', sanitize_text_field( wp_unslash( $_POST['organization_rating_pre'] ) ) );
	}

	if ( isset( $_POST['organization_rating_live'] ) ) {
		update_post_meta( $post_id, 'organization_rating_live', sanitize_text_field( wp_unslash( $_POST['organization_rating_live'] ) ) );
	}

	if ( isset( $_POST['organization_rating_coef'] ) ) {
		update_post_meta( $post_id, 'organization_rating_coef', sanitize_text_field( wp_unslash( $_POST['organization_rating_coef'] ) ) );
	}

	if ( isset( $_POST['organization_rating_payments'] ) ) {
		update_post_meta( $post_id, 'organization_rating_payments', sanitize_text_field( wp_unslash( $_POST['organization_rating_payments'] ) ) );
	}

	if ( isset( $_POST['organization_rating_features'] ) ) {
		update_post_meta( $post_id, 'organization_rating_features', sanitize_text_field( wp_unslash( $_POST['organization_rating_features'] ) ) );
	}

	if ( ! wp_is_post_revision( $post_id ) ) {

		$organization_rating_trust    = get_post_meta( $post_id, 'organization_rating_trust', true );
		$organization_rating_games    = get_post_meta( $post_id, 'organization_rating_games', true );
		$organization_rating_bonus    = get_post_meta( $post_id, 'organization_rating_bonus', true );
		$organization_rating_customer = get_post_meta( $post_id, 'organization_rating_customer', true );
		$organization_rating_pre      = get_post_meta( $post_id, 'organization_rating_pre', true );
		$organization_rating_live     = get_post_meta( $post_id, 'organization_rating_live', true );
		$organization_rating_coef     = get_post_meta( $post_id, 'organization_rating_coef', true );
		$organization_rating_payments = get_post_meta( $post_id, 'organization_rating_payments', true );
		$organization_rating_features = get_post_meta( $post_id, 'organization_rating_features', true );
		
		$organization_ratings_all = array(
			$organization_rating_trust,
			$organization_rating_games,
			$organization_rating_bonus,
			$organization_rating_customer,
			$organization_rating_pre,
			$organization_rating_live,
			$organization_rating_coef,
			$organization_rating_payments,
			$organization_rating_features,
		);
		
		$organization_ratings_all_filtered = array_filter( $organization_ratings_all, fn( $rating ) => intval( $rating ) > 0 );

		$organization_overall_rating = esc_html( array_sum( $organization_ratings_all_filtered ) / count( $organization_ratings_all_filtered ) );

		if ( is_float( $organization_overall_rating ) ) {
			$organization_overall_rating = number_format( $organization_overall_rating, 1 ); }

		update_post_meta( $post_id, 'organization_overall_rating', $organization_overall_rating );

	}
}

/*  Organizations - Ratings End */

/*  The standard field for the upload Mobile image of organization single page - Start  */

function custom_mobile_image_uploader( $name, $value = '' ) {
	$image   = ' button">' . esc_html__( 'Upload image', 'custom-theme' );
	$display = 'none';
 
	if ( $image_attributes = wp_get_attachment_image_src( $value, 'mercury-2000-400' ) ) {
		$image   = '"><img src="' . $image_attributes[0] . '" style="max-width: 100%; width: auto; display: block;" />';
		$display = 'block';
	} 
 
	return '
		<div style="margin-top: 1em;">
			<a href="#" style="display: inline-block;" class="custom_upload_mobile_button' . $image . '</a>
			<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . esc_attr( $value ) . '" />
			<a href="#" class="custom_remove_mobile_button components-button is-link is-destructive" style="margin-top: 1em; display:' . $display . '">' . esc_html__( 'Remove mobile image', 'custom-theme' ) . '</a>
		</div>
	';
}

/*  The standard field for the upload Mobile image of organization single page - End  */

/*  Upload Mobile image of organization single page - Start  */

function custom_organization_mobile_image_block() {
	add_meta_box(
		'custom_mobile_image_box',
		esc_html__( 'Mobile Image', 'custom-theme' ),
		'custom_organization_mobile_image_block_show',
		'organization',
		'normal',
		'core'
	);
}
add_action( 'admin_menu', 'custom_organization_mobile_image_block' );

function custom_organization_mobile_image_block_show( $organization ) {

	wp_nonce_field( 'custom_organization_mobile_box', 'custom_organization_mobile_nonce' );
	$organization_mobile_image = 'organization_mobile_image';

	echo custom_mobile_image_uploader( $organization_mobile_image, get_post_meta( $organization->ID, $organization_mobile_image, true ) );
}
 
function custom_organization_mobile_image_block_save( $post_id ) {

	if ( ! isset( $_POST['custom_organization_mobile_nonce'] ) ) {
		return $post_id;
	}

	$nonce = $_POST['custom_organization_mobile_nonce'];

	if ( ! wp_verify_nonce( $nonce, 'custom_organization_mobile_box' ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( 'organization' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	}

	$organization_mobile_image = 'organization_mobile_image';
	update_post_meta( $post_id, $organization_mobile_image, sanitize_text_field( $_POST[ $organization_mobile_image ] ) );
}
add_action( 'save_post', 'custom_organization_mobile_image_block_save' );

/*  Upload Mobile image of organization single page - End  */

/*  Organizations - Additional Fields Start */

add_action( 'admin_init', 'organizations_fields' );

function organizations_fields() {
	add_meta_box(
		'organizations_meta_box',
		esc_html__( 'Additional information', 'custom-theme' ),
		'organizations_display_meta_box',
		'organization',
		'side',
		'high'
	);
}

function organizations_display_meta_box( $organization ) {

	wp_nonce_field( 'organizations_box', 'organizations_nonce' );
	$organization_id                     = get_post_custom( $organization->ID );
	$organization_external_link          = get_post_meta( $organization->ID, 'organization_external_link', true );
	$organization_button_title           = get_post_meta( $organization->ID, 'organization_button_title', true );
	$organization_permalink_button_title = get_post_meta( $organization->ID, 'organization_permalink_button_title', true );

	$editor_args = array(
		'tinymce'       => array(
			'toolbar1' => 'bold,italic,underline,link,unlink,undo,redo',
		),
		'quicktags'     => array(
			'buttons' => 'em,strong,link,close',
		),
		'media_buttons' => false,
		'textarea_rows' => 8,
	);

	?>

<div class="components-base-control organization_external_link">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="organization_external_link-0"><?php esc_html_e( 'External URL for the', 'custom-theme' ); ?> <strong><?php esc_html_e( 'Play Now', 'custom-theme' ); ?></strong> <?php esc_html_e( 'button', 'custom-theme' ); ?></label>
		<input type="url" name="organization_external_link" id="organization_external_link-0" value="<?php echo esc_url( $organization_external_link ); ?>" style="display: block; margin-bottom: 10px;" />
	</div>
</div>

<div class="components-base-control organization_button_title">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="organization_button_title-0"><?php esc_html_e( 'Custom title for the', 'custom-theme' ); ?> <strong><?php esc_html_e( 'Play Now', 'custom-theme' ); ?></strong> <?php esc_html_e( 'button', 'custom-theme' ); ?></label>
		<input type="text" name="organization_button_title" id="organization_button_title-0" value="<?php echo esc_attr( $organization_button_title ); ?>" style="display: block; margin-bottom: 10px;" />
	</div>
</div>

<div class="components-base-control organization_permalink_button_title">
	<div class="components-base-control__field">
		<label class="components-base-control__label" for="organization_permalink_button_title-0"><?php esc_html_e( 'Custom title for the', 'custom-theme' ); ?> <strong><?php esc_html_e( 'Read Review', 'custom-theme' ); ?></strong> <?php esc_html_e( 'button', 'custom-theme' ); ?></label>
		<input type="text" name="organization_permalink_button_title" id="organization_permalink_button_title-0" value="<?php echo esc_attr( $organization_permalink_button_title ); ?>" style="display: block; margin-bottom: 10px;" />
	</div>
</div>

	<?php
}

add_action( 'save_post', 'organizations_save_fields', 10, 2 );

function organizations_save_fields( $post_id ) {

	if ( ! isset( $_POST['organizations_nonce'] ) ) {
		return $post_id;
	}

		$nonce = $_POST['organizations_nonce'];

	if ( ! wp_verify_nonce( $nonce, 'organizations_box' ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( 'organization' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	}

		$organization_external_link = esc_url( $_POST['organization_external_link'] );
		update_post_meta( $post_id, 'organization_external_link', $organization_external_link );

		$organization_button_title = sanitize_text_field( $_POST['organization_button_title'] );
		update_post_meta( $post_id, 'organization_button_title', $organization_button_title );

		$organization_permalink_button_title = sanitize_text_field( $_POST['organization_permalink_button_title'] );
		update_post_meta( $post_id, 'organization_permalink_button_title', $organization_permalink_button_title );
}

/*  Organizations - Additional Fields End */

/*  Add Deposit Methods logo Start  */

/* --- Add custom taxonomy field --- */

function add_deposit_method_taxonomy_image( $taxonomy ) {
	?>
<div class="form-field term-group">
	<label for="taxonomy-image-id">
		<?php esc_html_e( 'Logo', 'custom-theme' ); ?>
	</label>
	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
	<div id="taxonomy-image-wrapper"></div>
	<p>
		<input type="button" class="button button-secondary custom_media_button" id="custom_media_button" name="custom_media_button" value="<?php esc_attr_e( 'Add Logo', 'custom-theme' ); ?>" />
		<input type="button" class="button button-secondary custom_media_remove" id="custom_media_remove" name="custom_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'custom-theme' ); ?>" />
	</p>
</div>
	<?php
}

add_action( 'deposit-method_add_form_fields', 'add_deposit_method_taxonomy_image', 10, 2 );

/* --- Save the custom taxonomy field --- */

function save_deposit_method_taxonomy_image( $term_id, $tt_id ) {
	if ( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ) {
		$image = esc_attr( $_POST['taxonomy-image-id'] );
		add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action( 'created_deposit-method', 'save_deposit_method_taxonomy_image', 10, 2 );

/* --- Add custom taxonomy field for edit --- */

function edit_deposit_method_image_upload( $term, $taxonomy ) {
	?>
<tr class="form-field term-group-wrap">
	<th scope="row">
		<label for="taxonomy-image-id">
			<?php esc_html_e( 'Logo', 'custom-theme' ); ?>
		</label>
	</th>
	<td>
		<?php $image_id = get_term_meta( $term->term_id, 'taxonomy-image-id', true ); ?>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
		<div id="taxonomy-image-wrapper">
		<?php if ( $image_id ) { ?>
			<?php echo wp_get_attachment_image( $image_id ); ?>
		<?php } ?>
			</div>
			<p>
			<input type="button" class="button button-secondary custom_media_button" id="custom_media_button" name="custom_media_button" value="<?php esc_attr_e( 'Add Logo', 'custom-theme' ); ?>" />
			<input type="button" class="button button-secondary custom_media_remove" id="custom_media_remove" name="custom_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'custom-theme' ); ?>" />
		</p>
	</td>
</tr>
	<?php
}

add_action( 'deposit-method_edit_form_fields', 'edit_deposit_method_image_upload', 10, 2 );

/* --- Save the edited value of the custom taxonomy field --- */

function update_deposit_method_image_upload( $term_id, $tt_id ) {
	if ( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ) {
		$image = esc_attr( $_POST['taxonomy-image-id'] );
		update_term_meta( $term_id, 'taxonomy-image-id', $image );
	} else {
		update_term_meta( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action( 'edited_deposit-method', 'update_deposit_method_image_upload', 10, 2 );

/*  Add Deposit Methods logo End  */


/*  Add Devices logo Start  */

/* --- Add custom taxonomy field --- */

function add_device_taxonomy_image( $taxonomy ) {
	?>
<div class="form-field term-group">
	<label for="taxonomy-image-id">
		<?php esc_html_e( 'Logo', 'custom-theme' ); ?>
	</label>
	<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
	<div id="taxonomy-image-wrapper"></div>
	<p>
		<input type="button" class="button button-secondary custom_media_button" id="custom_media_button" name="custom_media_button" value="<?php esc_attr_e( 'Add Logo', 'custom-theme' ); ?>" />
		<input type="button" class="button button-secondary custom_media_remove" id="custom_media_remove" name="custom_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'custom-theme' ); ?>" />
	</p>
</div>
	<?php
}

add_action( 'device_add_form_fields', 'add_device_taxonomy_image', 10, 2 );

/* --- Save the custom taxonomy field --- */

function save_device_taxonomy_image( $term_id, $tt_id ) {
	if ( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ) {
		$image = esc_attr( $_POST['taxonomy-image-id'] );
		add_term_meta( $term_id, 'taxonomy-image-id', $image, true );
	}
}

add_action( 'created_device', 'save_device_taxonomy_image', 10, 2 );

/* --- Add custom taxonomy field for edit --- */

function edit_device_image_upload( $term, $taxonomy ) {
	?>
<tr class="form-field term-group-wrap">
	<th scope="row">
		<label for="taxonomy-image-id">
			<?php esc_html_e( 'Logo', 'custom-theme' ); ?>
		</label>
	</th>
	<td>
		<?php $image_id = get_term_meta( $term->term_id, 'taxonomy-image-id', true ); ?>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
		<div id="taxonomy-image-wrapper">
		<?php if ( $image_id ) { ?>
			<?php echo wp_get_attachment_image( $image_id ); ?>
		<?php } ?>
			</div>
			<p>
			<input type="button" class="button button-secondary custom_media_button" id="custom_media_button" name="custom_media_button" value="<?php esc_attr_e( 'Add Logo', 'custom-theme' ); ?>" />
			<input type="button" class="button button-secondary custom_media_remove" id="custom_media_remove" name="custom_media_remove" value="<?php esc_attr_e( 'Remove Logo', 'custom-theme' ); ?>" />
		</p>
	</td>
</tr>
	<?php
}

add_action( 'device_edit_form_fields', 'edit_device_image_upload', 10, 2 );

/* --- Save the edited value of the custom taxonomy field --- */

function update_device_image_upload( $term_id, $tt_id ) {
	if ( isset( $_POST['taxonomy-image-id'] ) && '' !== $_POST['taxonomy-image-id'] ) {
		$image = esc_attr( $_POST['taxonomy-image-id'] );
		update_term_meta( $term_id, 'taxonomy-image-id', $image );
	} else {
		update_term_meta( $term_id, 'taxonomy-image-id', '' );
	}
}

add_action( 'edited_device', 'update_device_image_upload', 10, 2 );

/*  Add Devices logo End  */
