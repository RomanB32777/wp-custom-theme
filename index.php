<?php get_header(); ?>

<main class="pt-20 pb-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
	<div class="theme-main-content [&>*]:my-7">
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
			$author_title = 'লেখক';

			get_template_part( '/theme-parts/author-info' );
			get_author_info( get_the_author_meta( 'ID' ), $author_title, 40 );
		?>

		<!-- Author Info End -->

		<?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	</div>
</main>

<?php get_footer(); ?>
