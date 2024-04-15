<?php 
	$item_id                      = get_the_ID();
	$organization_name            = get_the_title( $item_id );
	$organization_logo_id         = get_post_thumbnail_id( $item_id );
	$organization_mobile_image_id = esc_html( get_post_meta( get_the_ID(), 'organization_mobile_image', true ) );
	$organization_overall_rating  = esc_html( get_post_meta( $item_id, 'organization_overall_rating', true ) );
	$organization_external_link   = esc_url( get_post_meta( $item_id, 'organization_external_link', true ) );
	$organization_button_title    = esc_html( get_post_meta( $item_id, 'organization_button_title', true ) );
	$organization_bonus_value     = esc_html( get_post_meta( get_the_ID(), 'organization_bonus_value', true ) );

if ( empty( $organization_button_title ) ) {
	if ( get_option( 'organizations_play_now_title' ) ) {
		$organization_button_title = esc_html( get_option( 'organizations_play_now_title' ) );
	} else {
		$organization_button_title = esc_html__( 'Play Now', 'custom-theme' );
	}
}
?>

<div class="fixed-button fixed bottom-0 z-10 w-full duration-200 invisible opacity-0" id="fixed-button">
	<div class="relative mx-auto max-w-7xl py-3 px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col gap-y-6 justify-between md:!flex-row md:items-center">
			<div class="flex gap-4 md:items-center">
				<?php 
				if ( $organization_logo_id ) {
					$image_size = 44;
					$src_image  = wp_get_attachment_image_src(
						$organization_logo_id,
						array(
							$image_size,
							$image_size,
						)
					);

					$src_mobile_image = wp_get_attachment_image_src(
						$organization_mobile_image_id,
						array(
							$image_size,
							$image_size,
						)
					);
					?>

					<div class="w-11 h-11">
						<img
							class="h-full w-auto rounded-md object-cover object-center"
							src="<?php echo esc_url( $src_mobile_image ? $src_mobile_image[0] : $src_image[0] ); ?>"
							alt="<?php echo esc_attr( $organization_name ); ?>"
							width="<?php echo esc_attr( $image_size ); ?>"
							height="<?php echo esc_attr( $image_size ); ?>"
						>
					</div>
				<?php } ?>

				<div class="flex flex-col ga-y-2 gap-x-4 md:items-center md:!flex-row">
					<p class="text-xl font-medium">
						<?php echo esc_html( $organization_name ); ?>
					</p>
						
					<?php if ( $organization_overall_rating ) { ?>
						<div class="flex items-center gap-2">
							<?php 
							if ( function_exists( 'custom_star_rating' ) ) {
								custom_star_rating(
									array(
										'rating'          => $organization_overall_rating,
										'wrapper_classes' => 'gap-x-2',
										'star_classes'    => 'w-5 h-5',
									)
								);
							} 
							?>
	
							<span class="text-lg text-white font-medium">
								<?php echo esc_html( number_format( (float) $organization_overall_rating, 1, '.', ',' ) ); ?>
							</span>
						</div>
					<?php } ?>
				</div>
		
			</div>
	
			<?php if ( $organization_external_link ) { ?>
				<a 
					href="<?php echo esc_url( $organization_external_link ); ?>" 
					title="<?php echo esc_attr( $organization_button_title ); ?>" 
					class="main-button inline-block py-2 px-6 rounded-md text-lg text-center font-medium no-underline" 
					rel="nofollow" 
					target="_blank"
				>
					<?php echo esc_html( $organization_button_title ); ?> 
				</a>
			<?php } ?>
		</div>

		<button id="close-fixed-button" class="absolute top-0 right-1.5 rounded-md text-white p-2.5 md:hidden" type="button">
			<span class="sr-only">Close banner</span>
			<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
			</svg>
		</button>
	</div>

	<?php if ( $organization_bonus_value ) { ?>
		<div class="fixed-bonus relative h-full mt-3 lg:!absolute lg:top-0 lg:left-[40%] lg:!mt-0">
			<div class="background-bonus absolute inset-0 lg:-skew-x-[30deg]"></div>

			<div class="relative h-full flex justify-center items-center gap-2 text-white font-bold text-xl uppercase px-10 py-3 lg:!py-0">
				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="32" viewBox="0 0 22 32" fill="none">
					<path 
						d="M9.66507 14.6944L9.98829 14.1047C10.126 13.8541 10.3079 13.665 10.5445 13.527C11.0762 13.217 11.7784 13.217 12.7754 13.217H13.4588L7.52039 3.00791C7.15403 2.39922 6.5108 2.03578 5.79896 2.03578C5.43655 2.03578 5.07953 2.13537 4.76746 2.32341C4.30869 2.59917 3.98404 3.0378 3.8546 3.55841C3.72517 4.07793 3.8057 4.61761 4.08255 5.07781L9.66507 14.6944ZM18.9676 2.00658C18.9676 0.900249 18.0673 0 16.96 0C15.8537 0 14.9534 0.900267 14.9534 2.00658V13.218L18.9669 13.2202V2.00597L18.9676 2.00658ZM18.5376 14.3078H12.753C11.6546 14.3078 11.2538 14.3362 11.0427 14.5052L10.968 14.585C10.8428 14.7622 10.7792 15.1207 10.7792 15.6492C10.7792 17.5033 12.2867 19.0119 14.1405 19.0119H15.8135C16.114 19.0119 16.3589 19.2567 16.3589 19.5576C16.3589 19.8582 16.114 20.1023 15.8135 20.1023C13.9302 20.1023 12.3979 21.6346 12.3979 23.5179C12.3979 23.8188 12.1531 24.0636 11.8521 24.0636C11.5516 24.0636 11.3075 23.8188 11.3075 23.5179C11.3075 22.3472 11.7583 21.2377 12.5781 20.3924L12.9743 19.9833L12.4479 19.7661C12.1865 19.6583 11.9165 19.5062 11.6214 19.3013L11.2295 19.0287L11.0439 19.4684C10.7862 20.0786 10.3544 20.5786 9.79348 20.916C9.3153 21.2047 8.76769 21.3578 8.18387 21.3578H8.17201L7.63738 21.3409L7.70498 21.7961C7.7643 22.1959 7.74381 22.6 7.64457 22.9981C7.44612 23.8013 6.94672 24.4771 6.237 24.9036C5.25115 25.4975 3.96654 25.49 2.96312 24.8428L2.01004 24.228L2.38899 25.2969C3.80991 29.3061 7.61302 32 11.8526 32C17.392 32 21.8997 27.4925 21.9007 21.9519V17.6709C21.8999 15.8158 20.3914 14.3075 18.538 14.3075L18.5376 14.3078ZM4.64041 24.2565H4.64149C5.00641 24.2565 5.36307 24.1569 5.67225 23.9685C6.13209 23.6913 6.45675 23.2519 6.58618 22.7324C6.71489 22.2132 6.634 21.6743 6.35823 21.2148L3.7268 16.8436C3.36079 16.2342 2.7172 15.8711 2.00426 15.8711C1.64257 15.8711 1.28591 15.97 0.974508 16.1584C0.514665 16.4345 0.19001 16.8738 0.0605734 17.3934C-0.0692222 17.914 0.0109576 18.4537 0.287803 18.9124L2.91924 23.2843C3.28525 23.8927 3.92847 24.2565 4.64031 24.2565L4.64041 24.2565ZM7.28409 12.8545C6.91772 12.2458 6.27449 11.8823 5.56265 11.8823C5.20024 11.8823 4.84359 11.9819 4.53115 12.17C4.07203 12.4461 3.74773 12.8847 3.6183 13.405C3.4885 13.9252 3.56976 14.4645 3.8466 14.9244L6.47804 19.2956C6.84513 19.905 7.48865 20.2681 8.20058 20.2681C8.56335 20.2681 8.92 20.1685 9.23097 19.9801C9.6901 19.7043 10.0144 19.2653 10.1438 18.7451C10.2733 18.2248 10.1927 17.6848 9.91697 17.2268L7.28409 12.8545Z" 
						fill="currentColor"
					/>
				</svg>

				<span>
					<?php esc_html_e( 'bonus', 'custom-theme' ); ?>:
					<?php echo esc_html( $organization_bonus_value ); ?>
				</span>
			</div>
		</div>
	<?php } ?>
</div>
