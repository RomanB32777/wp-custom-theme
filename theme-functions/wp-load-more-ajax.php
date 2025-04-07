<?php

function ajax_load_more_custom_posts() {
	$items_number = 5;
	$post_type    = 'page';
	$paged        = 1;

	$query_params = wp_unslash( $_POST );

	if ( isset( $query_params['itemsNumber'] ) ) {
		$items_number = (int) $query_params['itemsNumber'];
	}
	if ( isset( $query_params['postType'] ) && is_string( $query_params['postType'] ) ) {
		$post_type = explode( ',', trim( $query_params['postType'] ) );
	}
	if ( isset( $query_params['paged'] ) ) {
		$paged = (int) $query_params['paged'];
	}

	$args = array(
		'posts_per_page' => $items_number,
		'paged'          => $paged,
		'post_type'      => $post_type,
		'post_status'    => 'publish',
	);


	$query = new WP_Query( $args );

	render_author_post_cards( $query );

	if ( intval( $paged ) === intval( $query->max_num_pages ) ) { ?>
		<div class="is-all-pages"></div>
		<?php
	}

	die;
}

add_action( 'wp_ajax_load_more_custom_posts', 'ajax_load_more_custom_posts' );
add_action( 'wp_ajax_nopriv_load_more_custom_posts', 'ajax_load_more_custom_posts' );
