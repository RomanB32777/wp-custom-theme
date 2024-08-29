<?php get_header(); ?>

<main class="pt-20 overflow-hidden xl:!pt-40">
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
	</div>
</main>

<?php 
get_footer();
