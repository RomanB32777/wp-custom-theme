<?php
	global $post;

	$organization_single_allowed_html = array(
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

	$short_desc     = get_post_meta( get_the_ID(), 'organization_short_desc', true );
	$overall_rating = esc_html( get_post_meta( get_the_ID(), 'organization_overall_rating', true ) );
	$external_link  = esc_url( get_post_meta( get_the_ID(), 'organization_external_link', true ) );
	$button_title   = esc_html( get_post_meta( get_the_ID(), 'organization_button_title', true ) );
	
	$rating_trust    = esc_html( get_post_meta( get_the_ID(), 'organization_rating_trust', true ) );
	$rating_games    = esc_html( get_post_meta( get_the_ID(), 'organization_rating_games', true ) );
	$rating_bonus    = esc_html( get_post_meta( get_the_ID(), 'organization_rating_bonus', true ) );
	$rating_customer = esc_html( get_post_meta( get_the_ID(), 'organization_rating_customer', true ) );
	$rating_pre      = esc_html( get_post_meta( get_the_ID(), 'organization_rating_pre', true ) );
	$rating_live     = esc_html( get_post_meta( get_the_ID(), 'organization_rating_live', true ) );
	$rating_coef     = esc_html( get_post_meta( get_the_ID(), 'organization_rating_coef', true ) );
	$rating_payments = esc_html( get_post_meta( get_the_ID(), 'organization_rating_payments', true ) );
	$rating_features = esc_html( get_post_meta( get_the_ID(), 'organization_rating_features', true ) );

	$without_ratings = 
		empty( $rating_trust ) && 
		empty( $rating_games ) && 
		empty( $rating_bonus ) && 
		empty( $rating_customer ) && 
		empty( $rating_pre ) &&
		empty( $rating_live ) &&
		empty( $rating_coef ) &&
		empty( $rating_payments ) &&
		empty( $rating_features );

	if ( empty( $button_title ) ) {
		if ( get_option( 'organizations_play_now_title' ) ) {
			$button_title = esc_html( get_option( 'organizations_play_now_title' ) );
		} else {
			$button_title = esc_html__( 'Play Now', 'custom-theme' );
		}
	}

	?>

<main class="pt-20 pb-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

	<div class="divide-y divide-primary">

		<!-- Organization Header Start -->

		<div class="py-12 flex flex-col justify-between items-center gap-10 lg:!flex-row">
			<div class="relative aspect-h-1 aspect-w-1 bg-gray-200 w-32 h-32 lg:aspect-none">
				<?php
					$post_title_attr = the_title_attribute( 'echo=0' );
		
				if ( wp_get_attachment_image( get_post_thumbnail_id() ) ) {
					echo wp_get_attachment_image(
						get_post_thumbnail_id(),
						array( 128, 128 ),
						'',
						array(
							'class' => 'h-full w-full object-cover object-center',
							'alt'   => $post_title_attr,
						) 
					);
				} 
				?>
		
				<div class="absolute -right-4 -top-4 flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
					<span class="font-bold text-base">
						<?php echo esc_html( number_format( (float) $overall_rating, 1, '.', ',' ) ); ?>
					</span>
					<div class="star active">
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
				</div>
			</div>
	
			<div class="flex-1 text-center lg:!text-left">
				<!-- Title Start -->
			
				<h1 class="font-bold text-4xl">
					<?php the_title(); ?>
				</h1>
			
				<!-- Title End -->
			
				<?php if ( $short_desc ) { ?>
			
					<!-- Short Description of the organization Start -->
			
					<div class="text-base text-grizzly-light mt-4">
						<?php echo wp_kses( $short_desc, $organization_single_allowed_html ); ?>
					</div>
			
					<!-- Short Description of the organization End -->
			
				<?php } ?>
								
			</div>
	
			<?php if ( $external_link ) { ?>

				<!-- Button Start -->
				
				<div>
					<a 
						href="<?php echo esc_url( $external_link ); ?>" 
						title="<?php echo esc_attr( $button_title ); ?>" 
						class="main-button text-xl text-center py-4 px-10 no-underline" 
						rel="nofollow" 
						target="_blank"
					>
						<?php echo esc_html( $button_title ); ?> 
					</a>
				</div>
					
				<!-- Button End -->

			<?php } ?>
		</div>

		<!-- Organization Header End -->

		<!-- Ratings Block Start -->

		<div class="flex flex-col max-w-4xl mx-auto gap-y-6 py-10 md:justify-around md:!flex-row md:items-center">

			<?php if ( ! boolval( $without_ratings ) ) { ?>
				
				<div class="order-2 flex flex-wrap justify-between gap-y-3 md:!order-2 md:w-3/4">

					<?php if ( $rating_trust ) { ?>
						<div class="w-full flex items-center gap-4 sm:!w-[45%]">
							<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
								<span class="font-bold text-base">
									<?php echo esc_html( number_format( (float) $rating_trust, 1, '.', ',' ) ); ?>
								</span>
								<div class="star active">
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
							</div>
		
							<p class="text-base">
								<?php $rating_1_title = get_option( 'rating_1' ); ?>
									
								<?php
								if ( $rating_1_title ) {
									echo esc_html( $rating_1_title );
								} else {
									esc_html_e( 'Trust & Fairness', 'custom-theme' );
								} 
								?>
							</p>
						</div>
					<?php } ?>

					<?php if ( $rating_games ) { ?>
						<div class="w-full flex items-center gap-4 sm:!w-[45%]">
							<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
								<span class="font-bold text-base">
									<?php echo esc_html( number_format( (float) $rating_games, 1, '.', ',' ) ); ?>
								</span>
								<div class="star active">
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
							</div>
		
							<p class="text-base">
								<?php $rating_2_title = get_option( 'rating_2' ); ?>
									
								<?php
								if ( $rating_2_title ) {
									echo esc_html( $rating_2_title );
								} else {
									esc_html_e( 'Games & Software', 'custom-theme' );
								}  
								?>
							</p>
						</div>
					<?php } ?>

					<?php if ( $rating_bonus ) { ?>
						<div class="w-full flex items-center gap-4 sm:!w-[45%]">
							<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
								<span class="font-bold text-base">
									<?php echo esc_html( number_format( (float) $rating_bonus, 1, '.', ',' ) ); ?>
								</span>
								<div class="star active">
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
							</div>
		
							<p class="text-base">
								<?php $rating_3_title = get_option( 'rating_3' ); ?>
									
								<?php
								if ( $rating_3_title ) {
									echo esc_html( $rating_3_title );
								} else {
									esc_html_e( 'Bonuses & Promotions', 'custom-theme' );
								} 
								?>
							</p>
						</div>
					<?php } ?>

					<?php if ( $rating_customer ) { ?>
						<div class="w-full flex items-center gap-4 sm:!w-[45%]">
							<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
								<span class="font-bold text-base">
									<?php echo esc_html( number_format( (float) $rating_customer, 1, '.', ',' ) ); ?>
								</span>
								<div class="star active">
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
							</div>
		
							<p class="text-base">
								<?php $rating_4_title = get_option( 'rating_4' ); ?>
									
								<?php
								if ( $rating_4_title ) {
									echo esc_html( $rating_4_title );
								} else {
									esc_html_e( 'Customer Support', 'custom-theme' );
								}  
								?>
							</p>
						</div>
					<?php } ?>

					<?php if ( $rating_pre ) { ?>
						<div class="w-full flex items-center gap-4 sm:!w-[45%]">
							<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
								<span class="font-bold text-base">
									<?php echo esc_html( number_format( (float) $rating_pre, 1, '.', ',' ) ); ?>
								</span>
								<div class="star active">
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
							</div>
		
							<p class="text-base">
								<?php $rating_5_title = get_option( 'rating_5' ); ?>
									
								<?php
								if ( $rating_5_title ) {
									echo esc_html( $rating_5_title );
								} else {
									esc_html_e( 'Pre', 'custom-theme' );
								}  
								?>
							</p>
						</div>
					<?php } ?>

					<?php if ( $rating_live ) { ?>
						<div class="w-full flex items-center gap-4 sm:!w-[45%]">
							<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
								<span class="font-bold text-base">
									<?php echo esc_html( number_format( (float) $rating_live, 1, '.', ',' ) ); ?>
								</span>
								<div class="star active">
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
							</div>
		
							<p class="text-base">
								<?php $rating_6_title = get_option( 'rating_6' ); ?>
									
								<?php
								if ( $rating_6_title ) {
									echo esc_html( $rating_6_title );
								} else {
									esc_html_e( 'Live', 'custom-theme' );
								}  
								?>
							</p>
						</div>
					<?php } ?>

					<?php if ( $rating_coef ) { ?>
						<div class="w-full flex items-center gap-4 sm:!w-[45%]">
							<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
								<span class="font-bold text-base">
									<?php echo esc_html( number_format( (float) $rating_coef, 1, '.', ',' ) ); ?>
								</span>
								<div class="star active">
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
							</div>
		
							<p class="text-base">
								<?php $rating_7_title = get_option( 'rating_7' ); ?>
									
								<?php
								if ( $rating_7_title ) {
									echo esc_html( $rating_7_title );
								} else {
									esc_html_e( 'Coefficients', 'custom-theme' );
								}  
								?>
							</p>
						</div>
					<?php } ?>

					<?php if ( $rating_payments ) { ?>
						<div class="w-full flex items-center gap-4 sm:!w-[45%]">
							<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
								<span class="font-bold text-base">
									<?php echo esc_html( number_format( (float) $rating_payments, 1, '.', ',' ) ); ?>
								</span>
								<div class="star active">
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
							</div>
		
							<p class="text-base">
								<?php $rating_8_title = get_option( 'rating_8' ); ?>
									
								<?php
								if ( $rating_8_title ) {
									echo esc_html( $rating_8_title );
								} else {
									esc_html_e( 'Convenience of payments', 'custom-theme' );
								}  
								?>
							</p>
						</div>
					<?php } ?>

					<?php if ( $rating_features ) { ?>
						<div class="w-full flex items-center gap-4 sm:!w-[45%]">
							<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
								<span class="font-bold text-base">
									<?php echo esc_html( number_format( (float) $rating_features, 1, '.', ',' ) ); ?>
								</span>
								<div class="star active">
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
							</div>
		
							<p class="text-base">
								<?php $rating_9_title = get_option( 'rating_9' ); ?>
									
								<?php
								if ( $rating_9_title ) {
									echo esc_html( $rating_9_title );
								} else {
									esc_html_e( 'Interface/Features', 'custom-theme' );
								}  
								?>
							</p>
						</div>
					<?php } ?>
				</div>

			<?php } ?>
			<div class="order-1 text-center md:!order-2">
				<p class="text-5xl font-bold">
					<?php echo esc_html( number_format( (float) $overall_rating, 1, '.', ',' ) ); ?>
				</p>
				<p class="text-base">
					<?php
					$rating_overall_title = get_option( 'rating_overall' );

					if ( $rating_overall_title ) {
						echo esc_html( $rating_overall_title );
					} else {
						esc_html_e( 'Overall Rating', 'custom-theme' );
					} 
					?>
				</p>
			</div>
		</div>

		<!-- Ratings Block End -->

	</div>


	<div class="theme-main-content [&>*]:my-7">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
		endif; 
		?>
	</div>

	<div class="[&>*]:my-7">

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
</main>
