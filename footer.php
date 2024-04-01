<?php 
	$guide_text = ! empty( get_theme_mod( 'footer_guide_text' ) ) ? get_theme_mod( 'footer_guide_text' ) : __( 'Explore Now', 'custom-theme' );
	$guide_link = get_theme_mod( 'footer_guide_url' ); 

	$brand_text = ! empty( get_theme_mod( 'footer_brand_text' ) ) ? get_theme_mod( 'footer_brand_text' ) : __( 'Have Fun Now', 'custom-theme' );
	$brand_link = get_theme_mod( 'footer_brand_url' ); 

	$allowed_footer_html = array(
		'a'      => array(
			'href'   => true,
			'title'  => true,
			'target' => true,
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'span'   => array(),
		'p'      => array(),
	);
	?>

<!-- Start footer-->

<footer>
	<div class="mx-auto max-w-7xl p-4 sm:!p-6 lg:!p-8">
		<div class="divide-y divide-dark-grizzly [&>*]:py-6">
			<div class="flex items-start flex-wrap gap-6 sm:!gap-10">
				<div class="flex items-start gap-6">
					<img class="w-14 sm:!w-20" width="80" height="80" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/icon1.png" alt="<?php esc_attr_e( 'support icon', 'custom-theme' ); ?>">
					<div>
						<h5 class="text-lg font-semibold mb-1 sm:!mb-3"><?php esc_html_e( 'Customer Support', 'custom-theme' ); ?></h5>
						<p class="text-base opacity-75"><?php esc_html_e( 'Avallable 24/7 to assist you', 'custom-theme' ); ?></p>
					</div>
				</div>
				<div class="flex items-start gap-6">
					<img class="w-14 sm:!w-20" width="80" height="80" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/icon1.png" alt="<?php esc_attr_e( 'guide icon', 'custom-theme' ); ?>">
					<div>
						<h5 class="text-lg font-semibold mb-1 sm:!mb-3"><?php esc_html_e( 'New Member Guide', 'custom-theme' ); ?></h5>
						<p class="text-base opacity-75 mb-1 sm:!mb-3"><?php esc_html_e( 'Check out FAQ and guides', 'custom-theme' ); ?></p>
						<a
							href="<?php echo esc_url( $guide_link ); ?>"
							class="font-bold no-underline duration-200"
						>
							<?php echo wp_kses( $guide_text, $allowed_footer_html ); ?>
						</a>
					</div>
				</div>
				<div class="flex items-start gap-6">
					<img class="w-14 sm:!w-20" width="80" height="80" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/icon2.png" alt="<?php esc_attr_e( 'brand icon', 'custom-theme' ); ?>">
					<div>
						<h5 class="text-lg font-semibold mb-1 sm:!mb-3"><?php esc_html_e( 'Brand Ambassador', 'custom-theme' ); ?></h5>
						<p class="text-base opacity-75 mb-1 sm:!mb-3"><?php esc_html_e( 'Play with celebrity', 'custom-theme' ); ?></p>
						<a
							href="<?php echo esc_url( $brand_link ); ?>"
							class="font-bold no-underline duration-200"
						>
							<?php echo wp_kses( $brand_text, $allowed_footer_html ); ?>
						</a>
					</div>
				</div>
			</div>
			<div class="flex flex-col md:!flex-row gap-8">
				<div class="w-full basis-full md:!basis-3/12">
					<p class="text-base font-semibold mb-3">
						<?php esc_html_e( 'Menu', 'custom-theme' ); ?>
					</p>
					<?php
						wp_nav_menu( 
							array( 
								'theme_location' => 'footer',
								'depth'          => 1,
								'container'      => null,
								'menu_class'     => 'flex flex-col flex-1 gap-3 justify-between',
								'walker'         => new Footer_Walker_Nav_Menu(),
							) 
						); 
						?>
				</div>

				<div class="basis-full">
					<?php 
					if ( is_active_sidebar( 'footer-widgets' ) ) {
						dynamic_sidebar( 'footer-widgets' ); 
					} 
					?>
				</div>
			</div>
			<?php if ( ! empty( get_theme_mod( 'footer_description' ) ) ) { ?>
				<p class="text-sm">
					<?php echo wp_kses( get_theme_mod( 'footer_description' ), $allowed_footer_html ); ?>
				</p>
			<?php } ?>
			<div class="flex flex-col items-center justify-between gap-6 sm:!flex-row">
				<?php get_template_part( 'theme-parts/logo' ); ?>
				<p class="text-sm text-center">
					<?php echo esc_html( gmdate( 'Y' ) ); ?> 
					<?php esc_html_e( '&copy;' ); ?> 
					<?php echo esc_html( get_bloginfo( 'name' ) ); ?> | <?php esc_html_e( 'All Rights Reserved', 'custom-theme' ); ?> | <?php esc_html_e( 'Powered by', 'custom-theme' ); ?>
					<a class="no-underline duration-200" href="https://wordpress.org" target="_blank" title="WordPress">
						WordPress
					</a>
				</p>
			</div>
		</div>
	</div>
</footer>

<!-- End footer-->

<!-- Back to Top Start -->

<button class="main-button fixed z-10 right-4 sm:right-6 lg:right-8 w-10 h-10 p-2 border-none rounded-full duration-200 invisible opacity-0" id="back-to-top">
	<svg
		xmlns="http://www.w3.org/2000/svg"
		fill="none"
		viewBox="0 0 24 24"
		stroke="currentColor"
	>
	<path
		stroke-linecap="round"
		stroke-linejoin="round"
		stroke-width="2"
		d="M7 11l5-5m0 0l5 5m-5-5v12"
	/>
	</svg>
</button>

<!-- Back to Top End -->

<?php wp_footer(); ?>

</body>

</html>
