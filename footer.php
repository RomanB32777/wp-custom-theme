<?php 
	$guide_link = '#';
	$brand_link = '#';
?>

<!-- Start footer-->

<footer>
	<div class="mx-auto max-w-7xl p-4 sm:!p-6 lg:!p-8">
		<div class="divide-y divide-dark-grizzly [&>*]:py-6">
			<div class="flex items-start flex-wrap gap-6 sm:!gap-10">
				<div class="flex items-start gap-6">
					<img class="w-14 sm:!w-20" width="80" height="80" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/icon1.png" alt="<?php esc_attr_e( 'support icon', 'custom-theme' ); ?>">
					<div>
						<h5 class="font-roboto text-lg font-semibold mb-1 sm:!mb-3"><?php esc_html_e( 'Customer Support', 'custom-theme' ); ?></h5>
						<p class="font-roboto text-base opacity-75"><?php esc_html_e( 'Avallable 24/7 to assist you', 'custom-theme' ); ?></p>
					</div>
				</div>
				<div class="flex items-start gap-6">
					<img class="w-14 sm:!w-20" width="80" height="80" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/icon1.png" alt="<?php esc_attr_e( 'guide icon', 'custom-theme' ); ?>">
					<div>
						<h5 class="font-roboto text-lg font-semibold mb-1 sm:!mb-3"><?php esc_html_e( 'New Member Guide', 'custom-theme' ); ?></h5>
						<p class="font-roboto text-base opacity-75 mb-1 sm:!mb-3"><?php esc_html_e( 'Check out FAQ and guides', 'custom-theme' ); ?></p>
						<a
							href="<?php echo esc_url( $guide_link ); ?>"
							class="font-bold no-underline duration-200"
						>
							<?php esc_html_e( 'Explore Now', 'custom-theme' ); ?>
						</a>
					</div>
				</div>
				<div class="flex items-start gap-6">
					<img class="w-14 sm:!w-20" width="80" height="80" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/icon2.png" alt="<?php esc_attr_e( 'brand icon', 'custom-theme' ); ?>">
					<div>
						<h5 class="font-roboto text-lg font-semibold mb-1 sm:!mb-3"><?php esc_html_e( 'Brand Ambassador', 'custom-theme' ); ?></h5>
						<p class="font-roboto text-base opacity-75 mb-1 sm:!mb-3"><?php esc_html_e( 'Play with celebrity', 'custom-theme' ); ?></p>
						<a
							href="<?php echo esc_url( $brand_link ); ?>"
							class="font-bold no-underline duration-200"
						>
							<?php esc_html_e( 'Have Fun Now', 'custom-theme' ); ?>
						</a>
					</div>
				</div>
			</div>
			<div class="flex flex-col md:!flex-row gap-8">
				<div class="w-full basis-full md:!basis-3/12">
					<p class="font-roboto text-base font-semibold mb-3">Menu</p>
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
					<p class="font-roboto text-base font-semibold mb-3">Payments</p>
					<?php
						wp_nav_menu( 
							array( 
								'theme_location' => 'payments',
								'depth'          => 1,
								'container'      => null,
								'menu_class'     => 'flex flex-wrap gap-3 justify-between',
								'walker'         => new Payments_Walker_Nav_Menu(),
							) 
						); 
						?>
				</div>
			</div>
			<?php if ( ! empty( get_theme_mod( 'footer_description' ) ) ) { ?>
				<p class="font-roboto text-sm">
					<?php
					$allowed_html = array(
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
					echo wp_kses( get_theme_mod( 'footer_description' ), $allowed_html );
							
					?>
				</p>
			<?php } ?>
			<div class="flex flex-col items-center justify-between gap-6 sm:!flex-row">
				<?php get_template_part( 'theme-parts/logo' ); ?>
				<p class="font-roboto text-sm text-center">
					<?php echo esc_html( gmdate( 'Y' ) ); ?> 
					<?php esc_html_e( '&copy;' ); ?> 
					<?php echo esc_html( get_bloginfo( 'name' ) ); ?> | All Rights Reserved | <?php esc_html_e( 'Powered by', 'custom-theme' ); ?>
					<a class="no-underline duration-200" href="https://wordpress.org" target="_blank" title="WordPress">
						WordPress
					</a>
				</p>
			</div>
		</div>
	</div>
</footer>

<!-- End footer-->

<?php wp_footer(); ?>

</body>

</html>
