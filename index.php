<?php get_header(); ?>

<main class="pt-36 pb-16 overflow-hidden lg:!pt-60 lg:!pb-32">
	<div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
		<div class="main-blocks [&>*]:my-8 [&>*]:md:!my-16">
			<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
			endif; 
			?>
		</div>
			
		<!-- Contacts Start -->

		<?php get_template_part( '/theme-parts/blocks/contacts' ); ?>

		<!-- Contacts End -->	
	
	</div>
</main>

<?php get_footer(); ?>
