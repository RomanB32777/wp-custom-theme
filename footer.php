<!-- Start footer-->
<footer>
	<div class="mx-auto max-w-7xl p-4 sm:!p-6 lg:!p-8">
		<div class="divide-y divide-dark-grizzly [&>*]:py-6">
			<div class="flex items-start flex-wrap gap-6 sm:!gap-10">
				<div class="flex items-start gap-6">
					<img class="w-14 sm:!w-20" width="80" height="80" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/icon1.png" alt="support icon">
					<div>
						<h5 class="font-roboto text-lg font-semibold mb-1 sm:!mb-3">Customer Support</h5>
						<p class="font-roboto text-base opacity-75">Avallable 24/7 to assist you</p>
					</div>
				</div>
				<div class="flex items-start gap-6">
					<img class="w-14 sm:!w-20" width="80" height="80" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/icon1.png" alt="guide icon">
					<div>
						<h5 class="font-roboto text-lg font-semibold mb-1 sm:!mb-3">New Member Guide</h5>
						<p class="font-roboto text-base opacity-75 mb-1 sm:!mb-3">Check out FAQ and guides</p>
						<a
							href="#"
							class="font-bold no-underline duration-200"
						>
							Explore Now
						</a>
					</div>
				</div>
				<div class="flex items-start gap-6">
					<img class="w-14 sm:!w-20" width="80" height="80" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/icon2.png" alt="brand icon">
					<div>
						<h5 class="font-roboto text-lg font-semibold mb-1 sm:!mb-3">Brand Ambassador</h5>
						<p class="font-roboto text-base opacity-75 mb-1 sm:!mb-3">Play with celebrity</p>
						<a
							href="#"
							class="font-bold no-underline duration-200"
						>
							Have Fun Now
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
					<?php echo esc_html( date( 'Y' ) ); ?> 
					<?php esc_html_e( '&copy;', 'custom-organization-theme' ); ?> 
					<?php echo esc_html( get_bloginfo( 'name' ) ); ?> | All Rights Reserved | <?php esc_html_e( 'Powered by', 'custom-organization-theme' ); ?>
					<a class="no-underline duration-200" href="<?php echo esc_url( __( 'https://wordpress.org', 'custom-organization-theme' ) ); ?>" target="_blank" title="<?php esc_attr_e( 'WordPress', 'custom-organization-theme' ); ?>">
						<?php esc_html_e( 'WordPress', 'custom-organization-theme' ); ?>
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
