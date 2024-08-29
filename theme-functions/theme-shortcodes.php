<?php

add_shortcode( 'news-theme-shortcode', 'news_theme_shortcode' );
function news_theme_shortcode( $atts ) {

	ob_start();

	$attributes = shortcode_atts(
		array(
			'title' => esc_html__( 'News and Events', 'custom-theme' ),
		),
		$atts,
	);

	$title = $attributes['title'];

	$news_query = new WP_Query(
		array(
			'posts_per_page' => 8,
			'post_status'    => 'publish',
			'order'          => 'DESC',
			'orderby'        => 'date', 
		)
	); 

	if ( $news_query->have_posts() ) { ?>

		<!-- News Start -->

		<div class="news-theme-shortcode">
			<?php if ( ! empty( $title ) ) { ?>
				<h1 class="mb-8 lg:!mb-16">
					<?php echo esc_html( $title ); ?>
				</h1>
			<?php } ?>

			<div class="news relative">
				<div class="flex flex-col gap-4 md:!grid md:grid-cols-2 xl:!grid-cols-4 md:!gap-8">
					<?php 
					while ( $news_query->have_posts() ) :
						$news_query->the_post(); 
						
						get_template_part( '/theme-parts/cards/news' );

						endwhile;
						wp_reset_postdata();
					?>
				</div>
			</div>
		</div>

		<!-- News End -->

		<?php 

		$items = ob_get_clean();

		return $items; 
	}
}

add_action( 'init', 'news_theme_shortcode' );

add_shortcode( 'lecturers-theme-shortcode', 'lecturers_theme_shortcode' );
function lecturers_theme_shortcode( $atts ) {

	ob_start();

	$attributes = shortcode_atts(
		array(
			'title' => esc_html__( 'Our lecturers', 'custom-theme' ),
		),
		$atts,
	);

	$title = $attributes['title'];

	$lecturers_query = new WP_Query(
		array(
			'posts_per_page' => -1,
			'post_type'      => 'lecturer',
			'post_status'    => 'publish',
			'order'          => 'DESC',
			'orderby'        => 'date', 
		)
	); 

	if ( $lecturers_query->have_posts() ) { 
		?>

		<!-- Lecturers Start -->

		<div class="lecturers-theme-shortcode">
			<?php if ( ! empty( $title ) ) { ?>
				<h1 class="mb-8 lg:!mb-16">
					<?php echo esc_html( $title ); ?>
				</h1>
			<?php } ?>
			
			<div class="flex flex-col gap-4 md:!grid md:grid-cols-2 md:!gap-8">
				<?php 
				while ( $lecturers_query->have_posts() ) :
					$lecturers_query->the_post(); 
		
					get_template_part( '/theme-parts/cards/lecturer' );
					
					endwhile;
					wp_reset_postdata();
				?>
			</div>
		</div>

		<!-- Lecturers End -->

		<?php 

		$items = ob_get_clean();

		return $items; 
	}
}

add_action( 'init', 'lecturers_theme_shortcode' );

add_shortcode( 'registration-theme-shortcode', 'registration_theme_shortcode' );
function registration_theme_shortcode( $atts ) {

	ob_start();

	$attributes = shortcode_atts(
		array(
			'title' => esc_html__( 'Sign up for training', 'custom-theme' ),
		),
		$atts,
	);

	$title = $attributes['title'];

	$image_src      = get_template_directory_uri() . '/src/assets/images/background.png';
	$image_alt      = esc_html__( 'Background image', 'custom-theme' );
	$main_phone     = get_option( 'main_phone' );
	$form_shortcode = get_theme_mod( 'modal_form_shortcode' );

	?>

	<!-- Registration Form Start -->

	<div class="registration-theme-shortcode relative w-screen isolate overflow-hidden bg-primary-light left-1/2 -translate-x-2/4">
		<img
			class="absolute inset-0 -z-10 h-full object-cover object-center hidden w-1/2 lg:!block"
			src="<?php echo esc_url( $image_src ); ?>" 
			alt="<?php echo esc_attr( $image_alt ); ?>"
			width="1920"
			height="520"
		/>
		<div class="flex flex-col mx-auto max-w-screen-xl lg:!flex-row lg:px-8">
			<div class="relative flex-1 py-16 px-4 sm:!px-10 lg:!px-0 lg:flex lg:items-center">
				<img 
					class="absolute inset-0 -z-10 h-full object-center lg:hidden"
					src="<?php echo esc_url( $image_src ); ?>" 
					alt="<?php echo esc_attr( $image_alt ); ?>"
					width="1920"
					height="520" 
				>
				<div class="text-white">
					<?php if ( ! empty( $title ) ) { ?>
						<h5 class="mb-6 text-3xl font-bold tracking-tight lg:!text-4xl text-white">
							<?php echo esc_html( $title ); ?>
						</h5>
					<?php } ?>

					<div class="text-lg lg:!text-2xl">
						<p class="mb-6">
							<?php echo esc_html__( 'Fill out the form and submit an application for training', 'custom-theme' ); ?>	
						</p>
						<p class="mb-4">
							<?php echo esc_html__( 'Or call us by phone', 'custom-theme' ); ?>	
						</p>
					</div>
					<?php if ( ! empty( $main_phone ) ) { ?>
						<a class="text-3xl font-medium lg:!text-4xl" href="tel:<?php echo esc_attr( $main_phone ); ?>">
							<?php echo esc_html( $main_phone ); ?>
						</a>	
					<?php } ?>
				</div>
			</div>
			<div class="flex-1 px-4 sm:!px-10 lg:!px-0">
				<div class="py-16 lg:p-16">
					<div class="form-shortcode">
						<?php echo do_shortcode( $form_shortcode ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Registration Form End -->

	<?php 

	$items = ob_get_clean();

	return $items; 
}

add_action( 'init', 'registration_theme_shortcode' );
