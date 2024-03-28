<?php

$authors = get_users(
	array(
		'role' => 'author',
	)
);

if ( ! empty( $authors ) ) {

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

	<div class="authors-info relative">
		<h5 class="block-title font-lineSeedJp mb-6 md:text-2xl">
			<span>
				<?php esc_html_e( 'Authors', 'custom-theme' ); ?>
			</span>
		</h5>

		<div class="overflow-hidden px-px pb-14">
			<div class="swiper-slider"
				id="swiper-authors"
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
					foreach ( $authors as $author ) {
						$author_id          = $author->ID;
						$author_posts_url   = get_author_posts_url( $author_id );
						$author_name        = get_the_author_meta( 'display_name', $author_id );
						$author_avatar_size = 144;
						$author_avatar_url  = get_avatar_url( $author_id, array( 'size' => $author_avatar_size ) );

						?>
							<div class="swiper-slide flex flex-col items-center px-7 py-5 border main-border">
								<div class="mb-4 w-36 h-36">
									<a href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
										<img 
											src="<?php echo esc_url( $author_avatar_url ); ?>" 
											width="<?php echo esc_attr( $author_avatar_size ); ?>" 
											height="<?php echo esc_attr( $author_avatar_size ); ?>" 
											alt="<?php echo esc_attr( $author_name ); ?>" 
											class="avatar h-full w-full max-w-36 max-h-36 object-cover object-center border rounded-full main-border"
										>
									</a>
								</div>
								<p class="font-lineSeedJp font-base">
									<a class="title-link duration-200 hover:text-secondary no-underline" href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
										<?php echo wp_kses( $author_name, $allowed_html ); ?>
									</a>
								</p>
							</div>
					<?php } ?>
				</div>
				<div class="swiper-pagination [&>*]:mr-3 [&>*:last-child]:mr-0"></div>
			</div>
		</div>
	</div>
<?php } ?>
