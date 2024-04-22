<main class="pt-32 pb-10 mx-auto max-w-7xl px-4 md:px-6 md:!pt-48 lg:!pt-32 lg:px-8">

	<!-- Breadcrumbs Start -->

	<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>

	<!-- Breadcrumbs End -->

	<div class="flex flex-col-reverse justify-between gap-x-5 lg:!flex-row">
		<div class="main-content w-full lg:!w-[70%]">
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

				<!-- Bottom Widgets Start -->
				
				<?php
				if ( is_active_sidebar( 'bottom-widgets' ) ) {
					dynamic_sidebar( 'bottom-widgets' );
				}
				?>
				
				<!-- Bottom Widgets End -->
		
			</div>
		</div>
		<div class="w-full lg:!w-[30%] [&>*]:my-7">
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
