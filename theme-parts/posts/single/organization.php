<?php

global $post;

$rating_trust    = esc_html( get_post_meta( get_the_ID(), 'organization_rating_trust', true ) );
$rating_games    = esc_html( get_post_meta( get_the_ID(), 'organization_rating_games', true ) );
$rating_bonus    = esc_html( get_post_meta( get_the_ID(), 'organization_rating_bonus', true ) );
$rating_customer = esc_html( get_post_meta( get_the_ID(), 'organization_rating_customer', true ) );
$rating_pre      = esc_html( get_post_meta( get_the_ID(), 'organization_rating_pre', true ) );
$rating_live     = esc_html( get_post_meta( get_the_ID(), 'organization_rating_live', true ) );
$rating_coef     = esc_html( get_post_meta( get_the_ID(), 'organization_rating_coef', true ) );
$rating_payments = esc_html( get_post_meta( get_the_ID(), 'organization_rating_payments', true ) );
$rating_features = esc_html( get_post_meta( get_the_ID(), 'organization_rating_features', true ) );
$overall_rating  = esc_html( get_post_meta( get_the_ID(), 'organization_overall_rating', true ) );

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

	$rating_stars_number_value = '5';

	if ( get_option( 'custom_rating_stars_number' ) ) {
		$rating_stars_number_value = get_option( 'custom_rating_stars_number' );
	} 

	if ( $meta_rating ) { ?>
		<div class="rating-block py-2 first:pt-0 last:pb-0">
			<div class="w-full flex flex-wrap items-center justify-between gap-4 mb-2">
				<p class="font-semibold text-lg">
						<?php 
						$rating_title = get_option( $rating_title_option_name );

						if ( $rating_title ) {
							echo esc_html( $rating_title );
						} else {
							echo esc_html( $default_title );
						} 
						?>
				</p>

				<div class="font-semibold text-lg">
						<?php echo esc_html( number_format( (float) $meta_rating, 0 ) . '/' . number_format( (float) $rating_stars_number_value, 0 ) ); ?>
				</div>
			</div>

			<div class="rating-line relative w-full rounded-xl bg-primary-light overflow-hidden h-4">
				<div 
					class="gradient-line absolute left-0 top-0 h-full rounded-xl bg-gradient-to-r from-primary-brightest to-primary"
					style="width: <?php echo esc_attr( round( ( $meta_rating / $rating_stars_number_value ) * 100 ) ); ?>%;"
				></div>
			</div>
		</div>
			<?php 
	} 
}

?>

<main class="pt-20 pb-10">

	<!-- Organization Header Start -->

	<div class="page-header relative bg-dark py-8">
		<div class="relative flex flex-col gap-y-3 gap-x-10 mx-auto max-w-7xl px-4 sm:px-6 lg:!flex-row lg:!justify-between lg:px-8">
			<div class="text-grizzly text-lg lg:hidden">
				<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>
			</div>

			<div class="w-full xl:max-w-3xl">
				<!-- Content Block Start -->

				<?php get_template_part( '/theme-parts/posts/single/page-header-content' ); ?>

				<!-- Content Block End -->
			</div>

			<!-- Ratings Block Start -->
		
			<?php if ( is_numeric( $overall_rating ) ) { ?>
				<div class="bg-white text-dark hidden h-fit rounded-xl p-4 flex-1 xl:!block">
					<p class="font-semibold text-2xl mb-2">
						<?php esc_html_e( 'Specifications:', 'custom-theme' ); ?>
					</p>

					<div class="divide-y">
						<?php 
						custom_organization_meta_rating(
							array(
								'meta_rating'              => $rating_trust,
								'rating_title_option_name' => 'rating_1',
								'default_title'            => 'Trust & Fairness',
							) 
						); 
						?>
						<?php 
						custom_organization_meta_rating(
							array(
								'meta_rating'              => $rating_games,
								'rating_title_option_name' => 'rating_2',
								'default_title'            => 'Games & Software',
							) 
						); 
						?>
						<?php 
						custom_organization_meta_rating(
							array(
								'meta_rating'              => $rating_bonus,
								'rating_title_option_name' => 'rating_3',
								'default_title'            => 'Bonuses & Promotions',
							) 
						); 
						?>
						<?php 
						custom_organization_meta_rating(
							array(
								'meta_rating'              => $rating_customer,
								'rating_title_option_name' => 'rating_4',
								'default_title'            => 'Customer Support',
							) 
						); 
						?>
						<?php 
						custom_organization_meta_rating(
							array(
								'meta_rating'              => $rating_pre,
								'rating_title_option_name' => 'rating_5',
								'default_title'            => 'Pre',
							) 
						); 
						?>
						<?php 
						custom_organization_meta_rating(
							array(
								'meta_rating'              => $rating_live,
								'rating_title_option_name' => 'rating_6',
								'default_title'            => 'Live',
							) 
						); 
						?>
						<?php 
						custom_organization_meta_rating(
							array(
								'meta_rating'              => $rating_coef,
								'rating_title_option_name' => 'rating_7',
								'default_title'            => 'Coefficients',
							) 
						); 
						?>
						<?php 
						custom_organization_meta_rating(
							array(
								'meta_rating'              => $rating_payments,
								'rating_title_option_name' => 'rating_8',
								'default_title'            => 'Convenience of payments',
							) 
						); 
						?>
						<?php 
						custom_organization_meta_rating(
							array(
								'meta_rating'              => $rating_features,
								'rating_title_option_name' => 'rating_9',
								'default_title'            => 'Interface/Features',
							) 
						); 
						?>
					</div>

				</div>
			<?php } ?>
		
			<!-- Ratings Block End -->
		</div>
	</div>

	<!-- Organization Header End -->

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
				get_author_info( get_the_author_meta( 'ID' ), esc_html__( 'Author', 'custom-theme' ), 40 );
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
