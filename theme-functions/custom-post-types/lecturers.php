<?php

/* Lecturers - Post Type Start */

add_action( 'init', 'init_custom_lecturers', 0 );

function init_custom_lecturers() {

	$lecturer_name = esc_html__( 'Lecturers', 'custom-theme' );

	$lecturer_args = array(
		'labels'             => array(
			'name'         => $lecturer_name,
			'add_new'      => esc_html__( 'Add New', 'custom-theme' ),
			'edit_item'    => esc_html__( 'Edit Item', 'custom-theme' ),
			'add_new_item' => esc_html__( 'Add New', 'custom-theme' ),
			'view_item'    => esc_html__( 'View Item', 'custom-theme' ),
		),
		'singular_label'     => __( 'lecturer' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
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
		'rest_base'          => 'lecturer',
		'rewrite'            => false,
	);

	register_post_type( 'lecturer', $lecturer_args );
}

/*  Lecturers - Post Type End */

/*  Lecturers - Position Start */

add_action( 'admin_init', 'lecturer_position_field' );

function lecturer_position_field() {
	$post_type  = 'lecturer';
	$field_name = 'position';

	add_meta_box(
		"{$post_type}_{$field_name}_meta_box",
		esc_html__( 'Position', 'custom-theme' ),
		"{$post_type}_{$field_name}_display_meta_box",
		$post_type,
		'normal',
		'high'
	);
}

function lecturer_position_display_meta_box( $post ) {
	custom_text_field_display_meta_box(
		'position',
		$post,
		array(
			'tinymce'       => false,
			'quicktags'     => false,
			'media_buttons' => false,
			'textarea_rows' => 1,
		)
	);
}

add_action( 'save_post', 'lecturer_position_save_field', 10, 2 );

function lecturer_position_save_field( $post_id ) {
	custom_save_post_type_field( 'lecturer', 'position', $post_id );
}

/*  Lecturers - Position End */
