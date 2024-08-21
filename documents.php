<?php
/*
	Template Name: Documents
*/
?>

<?php get_header(); ?>

<main class="pt-36 pb-16 overflow-hidden lg:!pt-60 lg:!pb-32">

	<!-- Documents Start -->

	<?php 

		$categories = get_terms(
			array(
				'taxonomy'   => 'documens',
				'hide_empty' => false,
			) 
		);
		?>

	<div class="documents-wrapper mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
		<h1 class="mb-8 lg:!mb-16">
			<?php echo esc_html( get_the_title() ); ?>
		</h1>

		<div class="flex flex-wrap gap-3 md:!gap-7">
			<?php
			foreach ( $categories as $index => $category ) {
				$documents_query = new WP_Query(
					array(
						'post_type'      => 'files',
						'posts_per_page' => -1,
						'tax_query'      => array(
							array(
								'taxonomy' => 'documens',
								'field'    => 'slug',
								'terms'    => array( $category->slug ),
								'operator' => 'IN',
							),
						),
					) 
				); 

				?>

					<button
						class="document-category outline-button border-2 flex items-center text-xl font-medium rounded-xl"
						type="button"
						aria-expanded="false"
						data-category="<?php echo esc_attr( $index ); ?>"
					>
						<span class="py-2 mx-auto px-8">
							<?php echo esc_html( $category->name ); ?>
						</span>
					</button>

			<?php } ?>

		</div>
		
		<div class="documents max-w-screen-lg mx-auto md:!mt-16">
			<?php
			foreach ( $categories as $index => $category ) {
				$documents_query = new WP_Query(
					array(
						'post_type'      => 'files',
						'posts_per_page' => -1,
						'tax_query'      => array(
							array(
								'taxonomy' => 'documens',
								'field'    => 'slug',
								'terms'    => array( $category->slug ),
								'operator' => 'IN',
							),
						),
					) 
				);

				if ( $documents_query->have_posts() ) : 

					?>
					<div class="document-content hidden mt-8" data-category="<?php echo esc_attr( $index ); ?>">
						<div class="space-y-2">
							<?php   
							while ( $documents_query->have_posts() ) :
								$documents_query->the_post(); 

								get_template_part( '/theme-parts/cards/document' );

								endwhile; 
							?>
						</div>
					</div>
				
					<?php 
					endif;

				wp_reset_postdata();
			}
			?>
		</div>
	</div>

	<!-- Documents End -->
</main>

<?php get_footer(); ?>
