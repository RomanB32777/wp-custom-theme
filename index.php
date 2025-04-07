<?php get_header(); ?>

<main class="pt-20 pb-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
	<div class="main-blocks">

		<?php if ( ! is_front_page() ) { ?>
			<div class="my-8 md:!my-12">
				<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>
			</div>
		<?php } ?>
	
		<div class="[&>*]:my-14 [&>*]:md:!my-24">
	
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

	<div class="[&>*]:my-7 [&>*]:md:!my-14">

		<!-- Recent Pages Start -->

		<?php get_template_part( '/theme-parts/pages/recent-pages' ); ?>

		<!-- Recent Pages End -->

		<!-- Author Info Start -->

		<?php
			get_template_part( '/theme-parts/author-info' );
			get_author_info( esc_html__( 'Author', 'custom-theme' ), 40 );
		?>

		<!-- Author Info End -->

		<!-- Comments Start -->

		<?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

		<!-- Comments End -->
	</div>
</main>

<?php get_footer(); ?>
