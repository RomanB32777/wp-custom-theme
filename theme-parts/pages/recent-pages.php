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

	$slider_id                    = 'swiper-recent-pages';
	$is_disable_slider_pagination = boolval( get_theme_mod( 'is_disable_slider_pagination' ) );
	$is_disable_slider_navigation = boolval( get_theme_mod( 'is_disable_slider_navigation' ) );

	$swiper_wrapper_classes     = array(
		'overflow-hidden px-px rounded-xl md:!rounded-3xl',
		! $is_disable_slider_pagination ? 'pb-14' : '',
	);
	$swiper_wrapper_class_names = esc_attr( implode( ' ', $swiper_wrapper_classes ) );

	?>

	<div class="recent-pages relative">
		<div class="<?php echo esc_attr( $swiper_wrapper_class_names ); ?>">
			<div class="swiper-slider"
				id="<?php echo esc_attr( $slider_id ); ?>"
				data-slider-loop="<?php echo esc_attr( boolval( get_theme_mod( 'is_loop_slider' ) ) ? 'true' : 'false' ); ?>"
				data-slider-disable-navigation="<?php echo esc_attr( $is_disable_slider_navigation ? 'true' : 'false' ); ?>"
				data-slider-disable-pagination="<?php echo esc_attr( $is_disable_slider_pagination ? 'true' : 'false' ); ?>"
				data-slider-disable-autoplay="<?php echo esc_attr( boolval( get_theme_mod( 'is_disable_slider_autoplay' ) ) ? 'true' : 'false' ); ?>"
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

						$author_id             = get_the_author_meta( 'ID' );
						$author_posts_url      = get_author_posts_url( $author_id );
						$author_name           = get_the_author_meta( 'display_name', $author_id );
						$post_thumbnail_width  = 380;
						$post_thumbnail_height = 224;
						$post_thumbnail_url    = get_the_post_thumbnail_url( get_the_ID(), array( $post_thumbnail_width, $post_thumbnail_height ) );

						?>
							<div class="swiper-slide flex flex-col !h-auto rounded-xl bg-white md:!rounded-3xl">
								<?php if ( $post_thumbnail_url ) { ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="page">
										<img 
											src="<?php echo esc_url( $post_thumbnail_url ); ?>" 
											alt="<?php the_title(); ?>" 
											width="<?php echo esc_attr( $post_thumbnail_width ); ?>" 
											height="<?php echo esc_attr( $post_thumbnail_height ); ?>" 
											class="rounded-t-xl w-full max-h-56 object-cover object-center md:!rounded-t-3xl"
										>
									</a>
								<?php } ?>

								<div class="flex flex-col h-full gap-4 p-4 sm:!p-6">
									<div class="flex justify-between items-center">
										<a class="title-link no-underline font-semibold text-sm duration-200 hover:text-secondary" href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
											<?php echo wp_kses( $author_name, $allowed_html ); ?>
										</a>
	
										<small class="text-grizzly-dark font-medium text-sm">
											<?php the_time( get_option( 'date_format' ) ); ?>
										</small>
									</div>								
	
									<a class="title-link font-bold text-base duration-200 hover:text-secondary no-underline" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="page">
										<?php the_title(); ?>
									</a>

									<p class="font-base text-grizzly-dark">
										<?php echo esc_html( wp_trim_words( get_the_excerpt(), 48, ' ...' ) ); ?>
									</p>
								</div>
								
							</div>
						<?php
							endwhile;
							wp_reset_postdata();
					?>
				</div>

				<?php if ( ! $is_disable_slider_pagination ) { ?>
					<div class="swiper-pagination [&>*]:mr-3 [&>*:last-child]:mr-0"></div>
				<?php } ?>
			</div>
		</div>

		<?php if ( ! $is_disable_slider_navigation ) { ?>
			<div class="slider-navigation absolute -inset-x-10 top-1/2 -translate-y-1/2 z-10 hidden justify-between xl:!flex">
				<div class="group rotate-180 arrow-left-<?php echo esc_attr( $slider_id ); ?>">
					<div class="flex items-center cursor-pointer group-[.nav-disabled]:opacity-50 group-[.nav-disabled]:pointer-events-none">
						<div class="slider-arrow w-16 h-16 rounded-full shadow flex items-center justify-center bg-white text-grizzly">
							<svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 11 18" fill="none">
								<path d="M7.00051 9L0 1.99969L1.99974 0L11 9L1.99974 18L0 16.0003L7.00051 9Z" fill="currentColor"/>
							</svg>
						</div>
					</div>
				</div>
				<div class="group arrow-right-<?php echo esc_attr( $slider_id ); ?>">
					<div class="flex items-center cursor-pointer group-[.nav-disabled]:opacity-50 group-[.nav-disabled]:pointer-events-none">
						<div class="slider-arrow w-16 h-16 rounded-full shadow flex items-center justify-center bg-white text-grizzly">
							<svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 11 18" fill="none">
								<path d="M7.00051 9L0 1.99969L1.99974 0L11 9L1.99974 18L0 16.0003L7.00051 9Z" fill="currentColor"/>
							</svg>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
<?php } ?>
