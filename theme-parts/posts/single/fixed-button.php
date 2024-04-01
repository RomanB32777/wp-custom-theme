<?php 
	$item_id                     = get_the_ID();
	$organization_logo_id        = get_post_thumbnail_id( $item_id );
	$organization_overall_rating = esc_html( get_post_meta( $item_id, 'organization_overall_rating', true ) );
	$organization_external_link  = esc_url( get_post_meta( $item_id, 'organization_external_link', true ) );
	$organization_button_title   = esc_html( get_post_meta( $item_id, 'organization_button_title', true ) );

if ( get_option( 'custom_rating_stars_number' ) ) {
	$rating_stars_number = get_option( 'custom_rating_stars_number' );
} else {
	$rating_stars_number = '5';
}

if ( empty( $organization_button_title ) ) {
	if ( get_option( 'organizations_play_now_title' ) ) {
		$organization_button_title = esc_html( get_option( 'organizations_play_now_title' ) );
	} else {
		$organization_button_title = esc_html__( 'Play Now', 'custom-theme' );
	}
}
?>

<div class="fixed-button fixed bottom-0 z-10 w-full duration-200 invisible opacity-0" id="fixed-button">
	<div class="mx-auto max-w-7xl py-3 px-4 sm:px-6 lg:px-8">
		<div class="flex items-center justify-between">
			<div class="flex items-center gap-3 sm:!gap-6">
				<?php if ( $organization_logo_id ) { ?>
					<?php echo wp_get_attachment_image( $organization_logo_id, array( 80, 80 ) ); ?>
				<?php } ?>
		
				<div>
					<p class="font-bold text-base mb-1 sm:!mb-2 sm:!text-2xl">
						<?php echo esc_html( get_the_title( $item_id ) ); ?>
					</p>
					
					<?php if ( $organization_overall_rating ) { ?>
						<div class="flex items-center gap-1">
							<div class="hidden sm:!block">
								<?php 
								if ( function_exists( 'custom_star_rating' ) ) {
									custom_star_rating(
										array(
											'rating'       => $organization_overall_rating,
											'stars_number' => $rating_stars_number,
											'star_classes' => 'w-4 h-4',
										)
									);
								} 
								?>
							</div>

							<div class="star active sm:!hidden">
								<svg
									width="16"
									height="16"
									viewbox="0 0 12 12"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M5.30345 0.963523C5.45313 0.502869 6.10483 0.502872 6.25451 0.963528L7.15601 3.7381C7.22294 3.94411 7.41492 4.08359 7.63154 4.08359H10.5489C11.0333 4.08359 11.2347 4.7034 10.8428 4.9881L8.48262 6.70288C8.30737 6.8302 8.23405 7.05588 8.30098 7.26189L9.20249 10.0365C9.35216 10.4971 8.82492 10.8802 8.43307 10.5955L6.07287 8.88071C5.89763 8.75339 5.66033 8.75339 5.48509 8.88071L3.12487 10.5955C2.73302 10.8802 2.20578 10.4971 2.35545 10.0365L3.25698 7.2619C3.32392 7.05588 3.25059 6.8302 3.07535 6.70288L0.715164 4.9881C0.323307 4.7034 0.524694 4.08359 1.00906 4.08359H3.92639C4.14301 4.08359 4.33498 3.94412 4.40192 3.7381L5.30345 0.963523Z"
										fill="currentColor"
									></path>
								</svg>
							</div>

							<span class="text-base text-grizzly-light">
								<?php echo esc_html( number_format( (float) $organization_overall_rating, 1, '.', ',' ) ); ?>/<?php echo esc_html( $rating_stars_number ); ?>
							</span>
						</div>
					<?php } ?>
				</div>
		

			</div>
	
			<?php if ( $organization_external_link ) { ?>
				<div>
					<a 
						href="<?php echo esc_url( $organization_external_link ); ?>" 
						title="<?php echo esc_attr( $organization_button_title ); ?>" 
						class="main-button text-base text-center no-underline py-2 px-3 sm:!text-lg sm:!py-4 sm:!px-6" 
						rel="nofollow" 
						target="_blank"
					>
						<?php echo esc_html( $organization_button_title ); ?> 
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
