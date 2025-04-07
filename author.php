<?php get_header(); ?>

<?php

$author_id                   = get_the_author_meta( 'ID' );
$default_author_posts_number = 5;

$general_organizations_tab_title   = esc_html__( 'Reviews', 'custom-theme' );
$general_custom_articles_tab_title = esc_html__( 'Articles', 'custom-theme' );
$general_other_articles_tab_title  = esc_html__( 'Other Articles', 'custom-theme' );
$show_more_button_label            = esc_html__( 'Show more', 'custom-theme' );
$show_less_button_label            = esc_html__( 'Show less', 'custom-theme' );

if ( get_option( 'general_organizations_tab_title' ) ) {
	$general_organizations_tab_title = get_option( 'general_organizations_tab_title' );
}

if ( get_option( 'general_custom_articles_tab_title' ) ) {
	$general_custom_articles_tab_title = get_option( 'general_custom_articles_tab_title' );
}

if ( get_option( 'general_other_articles_tab_title' ) ) {
	$general_other_articles_tab_title = get_option( 'general_other_articles_tab_title' );
}

if ( get_option( 'general_show_more_title' ) ) {
	$show_more_button_label = get_option( 'general_show_more_title' );
}

if ( get_option( 'general_show_less_title' ) ) {
	$show_less_button_label = get_option( 'general_show_less_title' );
}

$author_tabs = array(
	array(
		'tab_id'    => uniqid(),
		'post_type' => array( 'organization' ),
		'title'     => $general_organizations_tab_title,
	),
	array(
		'tab_id'    => uniqid(),
		'post_type' => array( 'app', 'payment', 'bonus', 'registration', 'promo' ),
		'title'     => $general_custom_articles_tab_title,
	),
	array(
		'tab_id'    => uniqid(),
		'post_type' => array( 'post', 'page' ),
		'title'     => $general_other_articles_tab_title,
	),
);

$all_count_posts_query = new WP_Query(
	array(
		'author' => $author_id,
	)
);

$all_count_found_posts = $all_count_posts_query->found_posts;

?>

<main class="pt-20 pb-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
	<div class="main-content [&>*]:my-7">

		<!-- Title Box Start -->

		<?php
			get_template_part( '/theme-parts/author-info' );
			get_author_info();
		?>
	
		<!-- Title Box End -->

		<!-- Tabs Box Start -->

		<div class="bg-white rounded-xl p-4 md:!px-8 md:!py-8 md:!rounded-3xl">
			<?php if ( $all_count_found_posts > 0 ) { ?>
			<div class="custom-tabs">
				<div class="font-medium text-center overflow-auto no-scrollbar text-gray-500 border-b dark:text-gray-400">
					<ul class="flex w-max -mb-px">
						<?php
						
						foreach ( $author_tabs as $author_tab ) {
							$curr_tab_id     = $author_tab['tab_id'];
							$curr_post_types = $author_tab['post_type'];
							$curr_tab_title  = $author_tab['title']; 

							$count_posts_query = new WP_Query(
								array(
									'post_type' => $curr_post_types,
									'author'    => $author_id,
								)
							);

							$curr_found_posts = $count_posts_query->found_posts;

							if ( $curr_found_posts > 0 ) {
								?>
									<li 
										class="tab-button me-2 tab-title inline-block p-4 border-b-2 rounded-t-lg cursor-pointer border-transparent duration-200 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
										data-tab-id="<?php echo esc_attr( $curr_tab_id ); ?>"
									>
										<h5 class="tab-title">
											<?php echo esc_html( $curr_tab_title ); ?> (<?php echo esc_html( $curr_found_posts ); ?>)
										</h5>
									</li>
								<?php 
							} 
						} 
						?>
					</ul>
				</div>

				<div class="tabs-content">
					<?php

					foreach ( $author_tabs as $author_tab ) {
						$curr_tab_id     = $author_tab['tab_id'];
						$curr_post_types = $author_tab['post_type'];

						$curr_posts_query = new WP_Query(
							array(
								'author'         => $author_id,
								'post_type'      => $curr_post_types,
								'posts_per_page' => $default_author_posts_number,
							)
						);
						
						$is_visible_more_btn = $curr_posts_query->post_count < $curr_posts_query->found_posts;

						?>

						<div 
							id='author-tab-content-<?php echo esc_attr( $curr_tab_id ); ?>'
							class="tab-content hidden" 
						>
							<?php if ( $curr_posts_query->have_posts() ) { ?>
								<div class="posts-list flex flex-col gap-y-5 mt-5">
									<?php render_author_post_cards( $curr_posts_query ); ?>
								</div>

								<?php if ( $is_visible_more_btn ) { ?>
									<div class="flex justify-center mt-5">
										<button
											class="posts-more-btn main-button w-80 py-5 font-bold text-xl rounded-xl"
											data-block-id="<?php echo esc_attr( $curr_tab_id ); ?>"
											data-post-type="<?php echo esc_attr( implode( ',', $curr_post_types ) ); ?>"
											data-items-number="<?php echo esc_attr( $default_author_posts_number ); ?>"
											data-more-text="<?php echo esc_attr( $show_more_button_label ); ?>"
											data-less-text="<?php echo esc_attr( $show_less_button_label ); ?>"
										>
											<span>
												<?php echo esc_html( $show_more_button_label ); ?>
											</span>
										</button>
									</div>
									<?php 
								}  
							} 
							?>
						</div>

					<?php } ?>
				</div>
			</div>
			<?php } else { ?>
				<!-- Posts not found Start -->
	
				<div class="text-center">
					<h2>
						<?php esc_html_e( 'Posts not found', 'custom-theme' ); ?>
					</h2>
					<p>
						<?php esc_html_e( 'No posts has been found. Please return to the homepage.', 'custom-theme' ); ?>
					</p>
				</div>
	
				<!-- Posts not found End -->
			<?php } ?>

		</div>

		<!-- Tabs Box End -->
	</div>
</main>

<?php get_footer(); ?>
