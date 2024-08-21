<?php

function search_services_ajax_handler() {
	$search_value = '';

	$query_params = wp_unslash( $_POST );

	if ( isset( $query_params['search_value'] ) ) {
		$search_value = trim( $query_params['search_value'] );
	}

	if ( ! empty( $search_value ) ) {
		$args = array(
			'post_type'      => 'services',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			's'              => $search_value,
		);

	
		$ajax_services = new WP_Query( $args ); 
	
		if ( $ajax_services->have_posts() ) { ?>
			<ul class="services-list space-y-2">
			<?php 
			while ( $ajax_services->have_posts() ) {
				
				$ajax_services->the_post();
	
				get_template_part( '/theme-parts/cards/service' );
	
			} 
			?>
		</ul>	   
		<?php } else { ?>
			<p class="search-not-found text-2xl font-medium">
				<?php echo esc_html__( 'Nothing was found for your query', 'custom-theme' ); ?>
			</p>
	
			<?php 
		}
	}

	wp_die();
}

add_action( 'wp_ajax_search_services', 'search_services_ajax_handler' );
add_action( 'wp_ajax_nopriv_search_services', 'search_services_ajax_handler' );
