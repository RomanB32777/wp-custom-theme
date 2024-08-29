<!-- Start footer-->

<?php 

$posts_per_page   = 4;
$posts_query      = new WP_Query( "posts_per_page=$posts_per_page&orderby=date&order=DESC" );
$main_description = get_option( 'main_description' );
$main_address     = get_option( 'main_address' );
$main_email       = get_option( 'main_email' );
$main_phone       = get_option( 'main_phone' );

?>

<footer>
	<div class="pt-10 pb-16 lg:!pb-20 mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
		<div class="flex flex-col gap-16 lg:!grid lg:!grid-cols-4">
			<div class="block">
				<div class="mb-5">
					<?php get_template_part( 'theme-parts/logo' ); ?>
				</div>
				
				<?php if ( ! empty( $main_description ) ) { ?>
					<p class="text-lg leading-4 mb-6">
						<?php echo esc_html( $main_description ); ?>
					</p>
				<?php } ?>

				<?php if ( is_active_sidebar( 'social-widgets' ) ) { ?>
					<div>
						<?php dynamic_sidebar( 'social-widgets' ); ?>
					</div>
				<?php } ?>
			</div>
			<div>
				<button
					class="main-button handle-form-modal flex text-lg font-medium rounded-xl min-w-52 w-full mb-6"
					type="button"
					aria-expanded="false"
				>
					<span class="py-2 mx-auto px-4">
						<?php echo esc_html__( 'Submit your application', 'custom-theme' ); ?>	
					</span>
				</button>

				<?php if ( ! empty( $main_phone ) ) { ?>
					<a class="inline-block font-bold text-2xl mb-4" href="tel:<?php echo esc_attr( $main_phone ); ?>">
						<?php echo esc_html( $main_phone ); ?>
					</a>	
				<?php } ?>

				<div class="text-lg">
					<?php if ( ! empty( $main_address ) ) { ?>
						<p>
							<?php echo esc_html( $main_address ); ?>
						</p>
					<?php } ?>

					<?php if ( ! empty( $main_email ) ) { ?>
						<p>
							e-mail: 
							<a href="mailto:<?php echo esc_attr( $main_email ); ?>">
								<?php echo esc_html( $main_email ); ?>
							</a>
						</p>
					<?php } ?>
				</div>
			</div>
			<?php if ( $posts_query->have_posts() ) { ?>
				<div class="col-span-2">
					<p class="font-bold text-xl mb-8 lg:!mb-14">
						<?php echo esc_html__( 'News and Events', 'custom-theme' ); ?>	
					</p>

					<div class="grid gap-y-6 gap-x-20 lg:grid-cols-2">
						<?php 
						while ( $posts_query->have_posts() ) :
							
							$posts_query->the_post(); 
							?>
							
						<div class="text-xl">
							<p class="mb-1">
								<?php the_time( get_option( 'date_format' ) ); ?>
							</p>
							<a class="font-bold underline" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
						</div>
						
						<?php endwhile; ?>
					</div>
				</div>
			<?php } ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</footer>

<!-- End footer-->

<!-- Form Modal Start -->

<?php get_template_part( '/theme-parts/form-modal' ); ?>

<!-- Form Modal End -->

<?php wp_footer(); ?>

</body>

</html>
