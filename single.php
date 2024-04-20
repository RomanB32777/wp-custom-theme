<?php get_header(); ?>

<?php if ( is_singular( 'organization' ) ) { ?>

	<?php get_template_part( '/theme-parts/posts/single/organization' ); ?>

	<!-- Float Button Start -->

	<?php get_template_part( '/theme-parts/posts/single/fixed-button' ); ?>

	<!-- Float Button End -->


<?php } else { ?>
	<main class="pt-20 pb-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

		<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>

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
		
	</main>

<?php } ?>


<?php get_footer(); ?>
