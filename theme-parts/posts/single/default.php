<?php
	global $post;

	$default_single_allowed_html = array(
		'a'      => array(
			'href'   => true,
			'title'  => true,
			'target' => true,
			'rel'    => true,
		),
		'img'    => array(
			'src' => true,
			'alt' => true,
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
		'ul'     => array(),
		'ol'     => array(),
		'li'     => array(),
	);

	$custom_post_type = get_post_type();
	$parent           = get_post( $post->post_parent );

	$custom_title     = get_post_meta( get_the_ID(), "{$custom_post_type}_custom_title", true );
	$short_desc       = get_post_meta( get_the_ID(), "{$custom_post_type}_short_desc", true );
	$overall_rating   = esc_html( get_post_meta( get_the_ID(), "{$custom_post_type}_overall_rating", true ) );
	$external_link    = esc_url( get_post_meta( get_the_ID(), "{$custom_post_type}_external_link", true ) );
	$button_title     = esc_html( get_post_meta( get_the_ID(), "{$custom_post_type}_button_title", true ) );
	$bonus_value      = esc_html( get_post_meta( get_the_ID(), "{$custom_post_type}_bonus_value", true ) );
	$promotional_code = esc_html( get_post_meta( get_the_ID(), "{$custom_post_type}_promotional_code", true ) );

	$background_image_width  = 1920;
	$background_image_height = 820;
	$background_image_id     = esc_html( get_post_meta( get_the_ID(), "{$custom_post_type}_background_image", true ) );
	$src_background_image    = wp_get_attachment_image_src( $background_image_id, 'full' );

	$rating_stars_number_value = 5;

	if ( get_option( "{$custom_post_type}_rating_stars_number" ) ) {
		$rating_stars_number_value = get_option( "{$custom_post_type}_rating_stars_number" );
	}

	if ( empty( $bonus_value ) ) {
		$bonus_value = esc_html( get_post_meta( $parent->ID, 'organization_bonus_value', true ) );
	}

	if ( empty( $promotional_code ) ) {
		$promotional_code = esc_html( get_post_meta( $parent->ID, 'organization_promotional_code', true ) );
	}

	if ( empty( $button_title ) ) {
		if ( get_option( "{$custom_post_type}_button_title" ) ) {
			$button_title = esc_html( get_option( "{$custom_post_type}_button_title" ) );
		} else {
			$button_title = esc_html__( 'Follow', 'custom-theme' );
		}
	}

	?>

<main class="pt-20 pb-10">

	<!-- Post Header Start -->

	<div class="relative bg-dark py-8">
		<div class="relative flex flex-col gap-y-3 gap-x-10 mx-auto max-w-7xl px-4 sm:px-6 lg:!flex-row lg:px-8">
			<div class="text-grizzly text-lg mb-7 lg:hidden">
				<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>
			</div>

			<div class="flex-1">
				<div class="hidden mb-4 text-grizzly text-lg lg:!block">
					<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>
				</div>

				<?php if ( wp_get_attachment_image( get_post_thumbnail_id() ) ) { ?>
					<div class="mb-3 lg:!mb-4">
						<?php 
							echo wp_get_attachment_image(
								get_post_thumbnail_id(),
								array( 512, 200 ),
								'',
								array(
									'class' => 'h-full w-auto max-w-64 max-h-28 object-cover object-center lg:!max-w-none',
									'alt'   => $post_title_attr,
								) 
							); 
						?>
					</div>
				<?php } ?>

				<h1 class="font-semibold text-white text-3xl mb-3 lg:!text-5xl lg:!mb-4">
					<?php 
					if ( $custom_title ) {
						echo esc_html( $custom_title );
					} else {
						the_title();
					} 
					?>
				</h1>
	
				<?php if ( function_exists( 'custom_star_rating' ) ) { ?>
					<div class="flex relative items-center gap-x-2 mb-8 lg:!mb-6">
						<?php
							custom_star_rating(
								array(
									'rating'              => $overall_rating,
									'rating_stars_number' => $rating_stars_number_value,
									'wrapper_classes'     => 'gap-x-2',
									'star_classes'        => 'w-6 h-6',
								)
							);
						?>

						<?php if ( $overall_rating ) { ?>
							<span class="text-base text-white font-medium lg:!text-xl">
								<?php echo esc_html( number_format( round( $overall_rating, 1 ), 1, '.', ',' ) ); ?>
							</span>
						<?php } ?>
					</div>
				<?php } ?>
	
				<?php if ( $short_desc ) { ?>
					<div class="text-base text-grizzly mb-6 lg:!text-xl">
						<?php echo wp_kses( $short_desc, $default_single_allowed_html ); ?>
					</div>
				<?php } ?>

				<?php if ( $bonus_value || $promotional_code ) { ?>
					<div class="flex flex-col items-center gap-y-4 gap-x-5 mb-8 lg:!flex-row">
						<?php if ( $promotional_code ) { ?>
							<div 
								class="bonus-border copy-button group duration-200 self-stretch bg-dark-opacity flex flex-1 items-center justify-between gap-3 p-4 rounded-xl cursor-pointer lg:!p-5"
								data-copy-text="<?php echo esc_attr( $promotional_code ); ?>"
							>
								<div class="flex items-center gap-3 md:!gap-5">
									<div class="bg-white rounded-full w-11 h-11 min-w-11 flex items-center justify-center">
										<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
											<mask 
												id="mask0_44_14348" 
												style="mask-type:luminance"
												maskUnits="userSpaceOnUse" 
												x="6" 
												y="6" 
												width="18" 
												height="18"
											>
												<path 
													fill-rule="evenodd" 
													clip-rule="evenodd"
													d="M22 6H8C6.9 6 6 6.9 6 8V22C6 23.1 6.9 24 8 24H22C23.1 24 24 23.1 24 22V8C24 6.9 23.1 6 22 6ZM10.5 21C9.67 21 9 20.33 9 19.5C9 18.67 9.67 18 10.5 18C11.33 18 12 18.67 12 19.5C12 20.33 11.33 21 10.5 21ZM10.5 12C9.67 12 9 11.33 9 10.5C9 9.67 9.67 9 10.5 9C11.33 9 12 9.67 12 10.5C12 11.33 11.33 12 10.5 12ZM15 16.5C14.17 16.5 13.5 15.83 13.5 15C13.5 14.17 14.17 13.5 15 13.5C15.83 13.5 16.5 14.17 16.5 15C16.5 15.83 15.83 16.5 15 16.5ZM19.5 21C18.67 21 18 20.33 18 19.5C18 18.67 18.67 18 19.5 18C20.33 18 21 18.67 21 19.5C21 20.33 20.33 21 19.5 21ZM19.5 12C18.67 12 18 11.33 18 10.5C18 9.67 18.67 9 19.5 9C20.33 9 21 9.67 21 10.5C21 11.33 20.33 12 19.5 12Z" 
													fill="white"
												/>
											</mask>
											<g mask="url(#mask0_44_14348)">
												<rect x="2" y="2" width="26" height="26" fill="black"/>
											</g>
										</svg>
									</div>

									<span class="font-semibold text-xl text-white lg:!text-2xl">
										<?php echo esc_html( $promotional_code ); ?>
									</span>
								</div>

								<div class="main-link flex-none text-lg font-medium uppercase relative">
									<div class="flex items-center gap-2 duration-200 group-[.active]:!hidden">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
											<path 
												d="M5.83366 5.83334V2.50001C5.83366 2.27899 5.92146 2.06703 6.07774 1.91075C6.23402 1.75447 6.44598 1.66667 6.66699 1.66667H17.5003C17.7213 1.66667 17.9333 1.75447 18.0896 1.91075C18.2459 2.06703 18.3337 2.27899 18.3337 2.50001V13.3333C18.3337 13.5544 18.2459 13.7663 18.0896 13.9226C17.9333 14.0789 17.7213 14.1667 17.5003 14.1667H14.167V17.4942C14.167 17.9575 13.7928 18.3333 13.3278 18.3333H2.50616C2.39593 18.3334 2.28676 18.3118 2.18489 18.2697C2.08303 18.2276 1.99048 18.1657 1.91253 18.0878C1.83459 18.0099 1.77278 17.9173 1.73065 17.8154C1.68851 17.7136 1.66688 17.6044 1.66699 17.4942L1.66949 6.67251C1.66949 6.20917 2.04366 5.83334 2.50866 5.83334H5.83366ZM7.50033 5.83334H13.3278C13.7912 5.83334 14.167 6.20751 14.167 6.67251V12.5H16.667V3.33334H7.50033V5.83334ZM3.33616 7.50001L3.33366 16.6667H12.5003V7.50001H3.33616Z" 
												fill="currentColor"
											/>
										</svg>

										<span>
											<?php esc_html_e( 'copy', 'custom-theme' ); ?>
										</span>
									</div>

									<?php if ( $external_link ) { ?>
										<a 
											href="<?php echo esc_url( $external_link ); ?>" 
											title="<?php echo esc_attr( $button_title ); ?>" 
											class="hidden no-underline items-center gap-2 duration-200 group-[.active]:flex" 
											rel="nofollow" 
											target="_blank"
										>
											<span>
												<?php esc_html_e( 'visit site', 'custom-theme' ); ?>
											</span>

											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
												<path 
													d="M10 16L20 8L10 0V5C4.477 5 0 9.477 0 15C0 15.273 0.0100002 15.543 0.0319996 15.81C1.54 12.95 4.542 11 8 11H10V16Z" 
													fill="currentColor"
												/>
											</svg>
										</a>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
		
						<?php if ( $bonus_value ) { ?>
							<div class="bonus-border flex flex-col items-center self-stretch bg-dark-opacity p-4 rounded-xl lg:!p-5">
								<p class="text-base text-white uppercase">
									<?php esc_html_e( 'bonus', 'custom-theme' ); ?>
								</p>
								<p class="text-2xl text-yellow">
									<?php echo esc_html( $bonus_value ); ?>
								</p>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
	
				<?php if ( $external_link ) { ?>
					<a 
						href="<?php echo esc_url( $external_link ); ?>" 
						title="<?php echo esc_attr( $button_title ); ?>" 
						class="main-button inline-block w-full py-5 px-16 rounded-xl text-xl text-center font-bold no-underline lg:!w-auto" 
						rel="nofollow" 
						target="_blank"
					>
						<?php echo esc_html( $button_title ); ?> 
					</a>
				<?php } ?>
			</div>

			<div class="hidden lg:!flex-1 lg:!block">
				<div class="h-full flex items-center lg:!justify-center">
					<?php if ( ! empty( $src_background_image ) ) { ?>
						<img
							class="h-full w-full max-w-28 max-h-96 object-contain object-center lg:!max-w-none"
							src=<?php echo esc_url( $src_background_image[0] ); ?>
							alt="<?php echo esc_attr( $post_title_attr ); ?>"
							width="<?php echo esc_attr( $background_image_width ); ?>"
							height="<?php echo esc_attr( $background_image_height ); ?>"
						/>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Post Header End -->

	<div class="mx-auto max-w-7xl px-4 sm:px-6 md:!mt-24 lg:px-8">
		<div class="main-blocks [&>*]:my-14 [&>*]:md:!my-24">
			<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
			endif; 
			?>
		</div>
	
		<div class="[&>*]:my-7 [&>*]:md:!my-14">
	
			<!-- Author Info Start -->
	
			<?php
				get_template_part( '/theme-parts/author-info' );
				get_author_info( get_the_author_meta( 'ID' ), esc_html__( 'Author', 'custom-theme' ), 40, false );
			?>
	
			<!-- Author Info End -->
	
			<!-- Comments Start -->
	
			<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
	
			<!-- Comments End -->
	
		</div>
	</div>

</main>
