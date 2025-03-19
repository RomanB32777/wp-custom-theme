<?php
global $post;

$custom_post_type = get_post_type();

$background_image_width  = 1920;
$background_image_height = 820;
$background_image_id     = esc_html( get_post_meta( get_the_ID(), "{$custom_post_type}_background_image", true ) );
$src_background_image    = wp_get_attachment_image_src( $background_image_id, 'full' );

?>

<main class="pt-20 pb-10">

	<!-- Post Header Start -->

	<div class="page-header relative bg-dark py-8">
		<div class="relative flex flex-col gap-y-3 gap-x-10 mx-auto max-w-7xl px-4 sm:px-6 lg:!flex-row lg:px-8">
			<div class="text-grizzly text-lg lg:hidden">
				<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>
			</div>

			<div class="flex-auto lg:max-w-3xl">
				<!-- Content Block Start -->

				<?php get_template_part( '/theme-parts/posts/single/page-header-content' ); ?>

				<!-- Content Block End -->
			</div>

			<div class="hidden lg:flex-auto lg:!block">
				<div class="h-full flex items-center lg:!justify-center">
					<?php if ( ! empty( $src_background_image ) ) { ?>
						<img
							class="h-full w-full max-w-28 max-h-96 object-contain object-center lg:!max-w-none"
							src=<?php echo esc_url( $src_background_image[0] ); ?>
							alt="<?php echo esc_attr( $post_title_attr ); ?>"
							width="<?php echo esc_attr( $background_image_width ); ?>"
							height="<?php echo esc_attr( $background_image_height ); ?>"
						/>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Post Header End -->

	<div class="mx-auto max-w-7xl px-4 sm:px-6 md:!mt-24 lg:px-8">
		<div class="main-blocks [&>*]:my-14 [&>*]:md:!my-24">
			<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
			endif; 
			?>
		</div>
	
		<div class="[&>*]:my-7 [&>*]:md:!my-14">
	
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
	
		</div>
	</div>

</main>
