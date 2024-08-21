<?php

/*  Documents - Post Type Start */

add_action( 'init', 'init_custom_documents', 0 );

function init_custom_documents() {

	$document_name = esc_html__( 'Documents', 'custom-theme' );

	$document_args = array(
		'labels'             => array(
			'name'         => $document_name,
			'add_new'      => esc_html__( 'Add New', 'custom-theme' ),
			'edit_item'    => esc_html__( 'Edit Item', 'custom-theme' ),
			'add_new_item' => esc_html__( 'Add New', 'custom-theme' ),
			'view_item'    => esc_html__( 'View Item', 'custom-theme' ),
		),
		'singular_label'     => __( 'document' ),
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
		'rest_base'          => 'document',
		'rewrite'            => false,
	);

	register_post_type( 'files', $document_args );

	/* --- Category: Custom Taxonomy --- */

	$document_category_title = esc_html__( 'Document category', 'custom-theme' );

	$category_labels = array(
		'name'              => $document_category_title,
		'singular_name'     => $document_category_title,
		'search_items'      => esc_html__( 'Find Taxonomy', 'custom-theme' ),
		'all_items'         => esc_html__( 'All ', 'custom-theme' ) . $document_category_title,
		'parent_item'       => esc_html__( 'Parent Taxonomy', 'custom-theme' ),
		'parent_item_colon' => esc_html__( 'Parent Taxonomy:', 'custom-theme' ),
		'edit_item'         => esc_html__( 'Edit Taxonomy', 'custom-theme' ),
		'view_item'         => esc_html__( 'View Taxonomy', 'custom-theme' ),
		'update_item'       => esc_html__( 'Update Taxonomy', 'custom-theme' ),
		'add_new_item'      => esc_html__( 'Add New Taxonomy', 'custom-theme' ),
		'new_item_name'     => esc_html__( 'Taxonomy', 'custom-theme' ),
		'menu_name'         => $document_category_title,
	); 

	$category_args = array(
		'labels'                => $category_labels,
		'public'                => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_tagcloud'         => true,
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		'query_var'             => '',
		'capabilities'          => array(),
		'_builtin'              => false,
	);

	register_taxonomy( 'documens', 'files', $category_args );
}

/*  Documents - Post Type End */
