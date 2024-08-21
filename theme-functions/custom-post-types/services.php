<?php

/*  Services - Post Type Start */

add_action( 'init', 'init_custom_services', 0 );

function init_custom_services() {

	$services_name = esc_html__( 'Services', 'custom-theme' );

	$services_args = array(
		'labels'             => array(
			'name'         => $services_name,
			'add_new'      => esc_html__( 'Add New', 'custom-theme' ),
			'edit_item'    => esc_html__( 'Edit Item', 'custom-theme' ),
			'add_new_item' => esc_html__( 'Add New', 'custom-theme' ),
			'view_item'    => esc_html__( 'View Item', 'custom-theme' ),
		),
		'singular_label'     => __( 'service' ),
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
			'thumbnail',
			'excerpt',
			'revisions',
		),
		'taxonomies'         => array( 'services_category' ),
		'has_archive'        => false,
		'rest_base'          => 'services',
		'rewrite'            => array( 'slug' => 'services' ),
	);

	register_post_type( 'services', $services_args );

	/* --- Category: Custom Taxonomy --- */

	$services_category_title = esc_html__( 'Services category', 'custom-theme' );

	$category_labels = array(
		'name'              => $services_category_title,
		'singular_name'     => $services_category_title,
		'search_items'      => esc_html__( 'Find Taxonomy', 'custom-theme' ),
		'all_items'         => esc_html__( 'All ', 'custom-theme' ) . $services_category_title,
		'parent_item'       => esc_html__( 'Parent Taxonomy', 'custom-theme' ),
		'parent_item_colon' => esc_html__( 'Parent Taxonomy:', 'custom-theme' ),
		'edit_item'         => esc_html__( 'Edit Taxonomy', 'custom-theme' ),
		'view_item'         => esc_html__( 'View Taxonomy', 'custom-theme' ),
		'update_item'       => esc_html__( 'Update Taxonomy', 'custom-theme' ),
		'add_new_item'      => esc_html__( 'Add New Taxonomy', 'custom-theme' ),
		'new_item_name'     => esc_html__( 'Taxonomy', 'custom-theme' ),
		'menu_name'         => $services_category_title,
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

	register_taxonomy( 'services_category', 'services', $category_args );
}

/*  Services - Post Type End */
