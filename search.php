<?php

/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

<main class="pt-36 pb-16 overflow-hidden lg:!pt-60 lg:!pb-32">
	<div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
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
</main>

<?php get_footer(); ?>
