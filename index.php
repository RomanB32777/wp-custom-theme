<?php get_header(); ?>

<main class="pt-20 pb-16 overflow-hidden xl:!pt-40 xl:!pb-32">
	<div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
		<div class="py-4 md:!py-8">
			<div class="main-blocks [&>*]:my-4 [&>*]:md:!my-8">
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
			
		<!-- Contacts Start -->

		<?php get_template_part( '/theme-parts/blocks/contacts' ); ?>

		<!-- Contacts End -->	
	
	</div>
</main>

<?php get_footer(); ?>
