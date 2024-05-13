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

	if ( empty( $button_title ) ) {
		if ( get_option( 'organizations_play_now_title' ) ) {
			$button_title = esc_html( get_option( 'organizations_play_now_title' ) );
		} else {
			$button_title = esc_html__( 'Play Now', 'custom-theme' );
		}
	}

	function custom_organization_meta_rating( $args ) {
		$defaults = array(
			'meta_rating'              => 0,
			'default_title'            => '',
			'rating_title_option_name' => '',
		);
		
		$parsed_args = wp_parse_args( $args, $defaults );

		$meta_rating              = $parsed_args['meta_rating'];
		$default_title            = $parsed_args['default_title'];
		$rating_title_option_name = $parsed_args['rating_title_option_name'];

		if ( $meta_rating ) { ?>
			<div class="w-full flex items-center gap-4 sm:!w-[45%]">
				<div class="flex items-center gap-1 py-1 px-2 bg-white rounded-2xl shadow">
					<span class="font-bold text-base text-dark">
						<?php echo esc_html( number_format( (float) $meta_rating, 1, '.', ',' ) ); ?>
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
					<?php  

					$rating_title = get_option( $rating_title_option_name );

					if ( $rating_title ) {
						echo esc_html( $rating_title );
					} else {
						echo esc_html( $default_title );
					} 
					?>
				</p>
			</div>
			<?php 
		} 
	}

	?>

<main class="pt-20 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

	<div class="pb-10">
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
						<span class="font-bold text-base text-dark">
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
							class="main-button relative flex items-center justify-center text-center text-base font-bold rounded-lg py-4 px-10 no-underline xl:!text-sm"
							rel="nofollow" 
							target="_blank"
						>
							<div
								class="background absolute w-full h-full rounded-lg transform -skew-x-12"
							></div>
							<span class="relative uppercase italic">
								<?php echo esc_html( $button_title ); ?> 
							</span>
						</a>
					</div>
						
					<!-- Button End -->
	
				<?php } ?>
			</div>
	
			<!-- Organization Header End -->
	
			<!-- Ratings Block Start -->
	
			<div class="flex flex-col-reverse max-w-4xl mx-auto gap-y-6 py-10 md:justify-around md:!flex-row md:items-center">
	
				<?php if ( is_numeric( $overall_rating ) ) { ?>
					
					<div class="flex flex-wrap justify-between gap-y-3 md:w-3/4">
	
						<?php 
							custom_organization_meta_rating(
								array(
									'meta_rating'   => $rating_trust,
									'rating_title_option_name' => 'rating_1',
									'default_title' => 'Trust & Fairness',
								) 
							); 
							
							custom_organization_meta_rating(
								array(
									'meta_rating'   => $rating_games,
									'rating_title_option_name' => 'rating_2',
									'default_title' => 'Games & Software',
								) 
							); 
							
							custom_organization_meta_rating(
								array(
									'meta_rating'   => $rating_bonus,
									'rating_title_option_name' => 'rating_3',
									'default_title' => 'Bonuses & Promotions',
								) 
							); 
						
							custom_organization_meta_rating(
								array(
									'meta_rating'   => $rating_customer,
									'rating_title_option_name' => 'rating_4',
									'default_title' => 'Customer Support',
								) 
							); 
						
							custom_organization_meta_rating(
								array(
									'meta_rating'   => $rating_pre,
									'rating_title_option_name' => 'rating_5',
									'default_title' => 'Pre',
								) 
							); 
						
							custom_organization_meta_rating(
								array(
									'meta_rating'   => $rating_live,
									'rating_title_option_name' => 'rating_6',
									'default_title' => 'Live',
								) 
							); 
							
							custom_organization_meta_rating(
								array(
									'meta_rating'   => $rating_coef,
									'rating_title_option_name' => 'rating_7',
									'default_title' => 'Coefficients',
								) 
							); 
						
							custom_organization_meta_rating(
								array(
									'meta_rating'   => $rating_payments,
									'rating_title_option_name' => 'rating_8',
									'default_title' => 'Convenience of payments',
								) 
							); 
						
							custom_organization_meta_rating(
								array(
									'meta_rating'   => $rating_features,
									'rating_title_option_name' => 'rating_9',
									'default_title' => 'Interface/Features',
								) 
							); 
						?>
					
					</div>
	
				<?php } ?>

				<div class="text-center">
					<p class="text-5xl font-bold">
						<?php echo esc_html( number_format( (float) $overall_rating, 1, '.', ',' ) ); ?>
					</p>
					<p class="text-base">
						<?php
						$overall_rating_title = get_option( 'overall_rating' );
	
						if ( $overall_rating_title ) {
							echo esc_html( $overall_rating_title );
						} else {
							esc_html_e( 'Overall Rating', 'custom-theme' );
						} 
						?>
					</p>
				</div>
			</div>
	
			<!-- Ratings Block End -->
	
		</div>
	
	
		<div class="main-blocks [&>*]:my-7">
			<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
			endif; 
			?>
		</div>
	</div>

	<!-- Comments Start -->

	<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>

	<!-- Comments End -->

	<!-- Start subscribe block-->

	<?php get_template_part( 'theme-parts/subscribe' ); ?>

	<!-- End subscribe block-->

</main>
