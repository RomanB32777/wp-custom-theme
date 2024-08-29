<?php

/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

<main class="pt-20 pb-16 overflow-hidden xl:!pt-40 xl:!pb-32">
	<div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
		<div class="py-4 md:!py-8">
			<div class="[&>*]:my-4 [&>*]:md:!my-8">
				<div class="space-y-8">
					<?php if ( have_posts() ) : ?>
						<?php 
						while ( have_posts() ) :
							the_post(); 
							
							global $post;
			
							get_template_part( '/theme-parts/cards/search' );
		
						endwhile; 
						?>
						
					<?php else : ?>
						<h3 class="text-center">
							<?php echo esc_html__( 'Sorry, nothing found for your request', 'custom-theme' ); ?>:
							<span>
								<?php echo get_search_query(); ?>
							</span>
						</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
