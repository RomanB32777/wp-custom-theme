<?php
/*
	Template Name: Services
*/
?>

<?php get_header(); ?>

<main class="pt-36 pb-16 overflow-hidden lg:!pt-60 lg:!pb-0">
	<div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">

		<h1 class="mb-8 lg:!mb-16">
			<?php echo esc_html( get_the_title() ); ?>
		</h1>

		<div class="main-blocks [&>*]:my-4">
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

	<!-- Services Start -->

	<?php 

	$categories = get_terms(
		array(
			'taxonomy'   => 'services_category',
			'hide_empty' => false,
		) 
	);

	?>

	<div class="services-wrapper pt-12 pb-16 lg:!pb-32">
		<div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
			<div class="services max-w-screen-lg mx-auto">
				<div class="mb-16">
					<div class="autocomplete-block relative">
						<div class="flex justify-between gap-x-4 px-5 py-6 lg:!px-8 rounded-xl border-2 bg-white main-border">
							<input
								class="search-input block w-full outline-none focus:outline-none text-xl"
								type="text"
								name="search"
								autocomplete="search"
								placeholder="Введите текст для поиска"
							/>
							<button type="button" aria-expanded="false">
								<span class="sr-only">Icon</span>
								<img 
									src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/search-primary.svg" 
									alt="<?php esc_attr_e( 'search icon', 'custom-theme' ); ?>"
									width="29" 
									height="29"
								>
							</button>
						</div>
						<div 
							class="autocomplete-results invisible opacity-0 transition-opacity ease-in duration-200 absolute z-10 inset-x-0 top-[90%] bg-white rounded-b-xl border-2 main-border px-5 py-6 max-h-96 overflow-y-scroll lg:!px-8"
						></div>
					</div>
				</div>

				<div class="space-y-2">
					<?php
					foreach ( $categories as $index => $category ) {
						$services_query = new WP_Query(
							array(
								'post_type'      => 'services',
								'posts_per_page' => -1,
								'tax_query'      => array(
									array(
										'taxonomy' => 'services_category',
										'field'    => 'slug',
										'terms'    => array( $category->slug ),
										'operator' => 'IN',
									),
								),
							) 
						);

						if ( $services_query->have_posts() ) : 

							?>
							<div
								class="service group px-5 py-3 bg-white rounded-xl duration-200 md:!px-8 md:!py-5"
								data-service="<?php echo esc_attr( $index ); ?>"
							>
								<div class="title-block cursor-pointer flex items-center justify-between">
									<h5 class="service-title text-xl font-bold basis-5/6 md:!text-2xl">
										<?php echo esc_html( $category->name ); ?>
									</h5>
									<div class="flex justify-end basis-1/6">
										<div class="arrow-wrapper duration-200">
											<div class="flex items-center p-2">
												<div class="more-arrow">
													<svg
														width="16"
														height="27"
														viewBox="0 0 16 27"
														fill="none"
														xmlns="http://www.w3.org/2000/svg"
													>
														<path
															d="M2 2L13 13.5183L2.03756 25"
															stroke="currentColor"
															stroke-width="3"
															stroke-miterlimit="10"
															stroke-linecap="round"
														></path>
													</svg>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="service-content text-base mt-3 md:!text-lg mt:mb-6 hidden">
									<ul class="services-list space-y-2">
										<?php   
										while ( $services_query->have_posts() ) :
											$services_query->the_post(); 

											get_template_part( '/theme-parts/cards/service' );
											
											endwhile; 
										?>
									</ul>
								</div>
							</div>
						
							<?php 
							endif;
							wp_reset_postdata();
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<!-- Services End -->
</main>

<?php get_footer(); ?>
