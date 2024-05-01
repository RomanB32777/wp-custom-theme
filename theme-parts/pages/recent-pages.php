<?php

$recent_query = new WP_Query(
	array(
		'post_type'      => 'page',
		'posts_per_page' => get_option( 'posts_per_page' ),
		'post_status'    => 'publish',
		'order'          => 'DESC',
		'orderby'        => 'date', 
		'post__not_in'   => array( get_the_ID() ),
	)
); 

if ( $recent_query->have_posts() ) {

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

	?>

	<div class="recent-pages relative">
		<h5 class="block-title mb-6 md:text-2xl">
			<span>
				<?php esc_html_e( 'Read more', 'custom-theme' ); ?>
			</span>
		</h5>

		<div class="overflow-hidden px-px pb-14">
			<div class="swiper-slider"
				id="swiper-recent-pages"
				data-slider-loop="<?php echo esc_attr( boolval( get_theme_mod( 'is_loop_slider' ) ) ? 'true' : 'false' ); ?>"
				data-slider-disable-autoplay="<?php echo esc_attr( boolval( get_theme_mod( 'is_disable_autoplay' ) ) ? 'true' : 'false' ); ?>"
				data-slider-autoplay-delay="<?php echo esc_attr( ! empty( get_theme_mod( 'slider_autoplay_delay' ) ) ? get_theme_mod( 'slider_autoplay_delay' ) : 5000 ); ?>"
				data-slides-per-view-xs="<?php echo esc_attr( ! empty( get_theme_mod( 'slider_mobile_slides_per_view' ) ) ? get_theme_mod( 'slider_mobile_slides_per_view' ) : 1 ); ?>"
				data-slides-per-view-sm="<?php echo esc_attr( ! empty( get_theme_mod( 'slider_tablet_slides_per_view' ) ) ? get_theme_mod( 'slider_tablet_slides_per_view' ) : 2 ); ?>"
				data-slides-per-view-md="<?php echo esc_attr( ! empty( get_theme_mod( 'slider_laptop_slides_per_view' ) ) ? get_theme_mod( 'slider_laptop_slides_per_view' ) : 3 ); ?>"
				data-slides-per-view-xl="<?php echo esc_attr( ! empty( get_theme_mod( 'slider_desktop_slides_per_view' ) ) ? get_theme_mod( 'slider_desktop_slides_per_view' ) : 4 ); ?>"
				data-slides-space-between-xs="<?php echo esc_attr( ! empty( get_theme_mod( 'slider_mobile_space_between' ) ) ? get_theme_mod( 'slider_mobile_space_between' ) : 24 ); ?>"
				data-slides-space-between-sm="<?php echo esc_attr( ! empty( get_theme_mod( 'slider_tablet_space_between' ) ) ? get_theme_mod( 'slider_tablet_space_between' ) : 24 ); ?>"
				data-slides-space-between-md="<?php echo esc_attr( ! empty( get_theme_mod( 'slider_laptop_space_between' ) ) ? get_theme_mod( 'slider_laptop_space_between' ) : 24 ); ?>"
				data-slides-space-between-xl="<?php echo esc_attr( ! empty( get_theme_mod( 'slider_desktop_space_between' ) ) ? get_theme_mod( 'slider_desktop_space_between' ) : 24 ); ?>"
			>
				<div class="swiper-wrapper">
					<?php 
					while ( $recent_query->have_posts() ) :
						$recent_query->the_post(); 

						$author_id          = get_the_author_meta( 'ID' );
						$author_posts_url   = get_author_posts_url( $author_id );
						$author_name        = get_the_author_meta( 'display_name', $author_id );
						$author_avatar_size = 40;
						$author_avatar_url  = get_avatar_url( $author_id, array( 'size' => $author_avatar_size ) );

						?>
							<div class="swiper-slide flex flex-col !h-auto border main-border">

							<!-- image here -->

								<div class="flex flex-col h-full gap-5 p-4 sm:!py-8 sm:!px-6">
									<div class="flex justify-between items-center">
										<div class="flex gap-3 items-center">
											<a class="title-link no-underline text-base duration-200 hover:text-secondary" href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
												<?php echo wp_kses( $author_name, $allowed_html ); ?>
											</a>

											<div class="w-10 h-10">
												<a href="<?php echo esc_url( $author_posts_url ); ?>">
													<img 
														src="<?php echo esc_url( $author_avatar_url ); ?>" 
														width="<?php echo esc_attr( $author_avatar_size ); ?>" 
														height="<?php echo esc_attr( $author_avatar_size ); ?>" 
														alt="<?php echo esc_attr( $author_name ); ?>" 
														class="avatar h-full w-full max-w-10 max-h-10 object-cover object-center border rounded-full main-border"
													>
												</a>
											</div>
										</div>
	
										<small>
											<?php the_time( get_option( 'date_format' ) ); ?>
										</small>
									</div>								
	
									<div class="flex-1">
										<a class="title-link font-bold text-base duration-200 hover:text-secondary no-underline" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="page">
											<?php the_title(); ?>
										</a>
									</div>

									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="main-button text-base font-bold text-center py-3 px-4 no-underline">
										<span>
											<?php esc_html_e( 'Read another articles', 'custom-theme' ); ?>
										</span>
									</a>
								</div>
								
							</div>
						<?php
							endwhile;
							wp_reset_postdata();
					?>
				</div>
				<div class="swiper-pagination [&>*]:mr-3 [&>*:last-child]:mr-0"></div>
			</div>
		</div>
	</div>
<?php } ?>
