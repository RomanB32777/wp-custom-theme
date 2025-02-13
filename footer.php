<!-- Start footer-->

<footer>
	<div class="mx-auto max-w-7xl p-4 sm:!p-6 lg:!p-8">
		<div class="divide-y divide-dark-grizzly [&>*]:py-6">
			<div class="flex md:!flex-row gap-8">
				<div class="basis-full md:!basis-3/12">
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
				<div class="basis-full md:!basis-3/12">
					<p class="text-base font-semibold mb-3">
						<?php esc_html_e( 'Special Pages', 'custom-theme' ); ?>
					</p>
					<?php
						wp_nav_menu( 
							array( 
								'theme_location' => 'footer-specials',
								'depth'          => 1,
								'container'      => null,
								'menu_class'     => 'flex flex-col flex-1 gap-3 justify-between',
								'walker'         => new Footer_Walker_Nav_Menu(),
							) 
						); 
						?>
				</div>
			</div>
			<div class="flex flex-col items-start justify-between gap-6 sm:!flex-row sm:!items-center ">
				<p class="text-sm">
					<?php echo esc_html( gmdate( 'Y' ) ); ?> 
					<?php esc_html_e( '&copy;' ); ?> 
					<?php echo esc_html( get_bloginfo( 'name' ) ); ?> | <?php esc_html_e( 'All Rights Reserved', 'custom-theme' ); ?>
				</p>

				<?php if ( is_active_sidebar( 'social-widgets' ) ) { ?>
					<div>
						<?php dynamic_sidebar( 'social-widgets' ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</footer>

<!-- End footer-->

<!-- Back to Top Start -->

<button class="fixed-button fixed z-10 right-4 sm:right-6 lg:right-8 w-20 h-20 p-7 border-none rounded-xl duration-200 invisible opacity-0" id="back-to-top">
	<svg
		xmlns="http://www.w3.org/2000/svg"
		fill="none"
		viewBox="0 0 18 11"
		stroke="currentColor"
	>
	<path
		d="M9 3.99949L1.99969 11L-8.74115e-08 9.00026L9 -3.93402e-07L18 9.00026L16.0003 11L9 3.99949Z"
		fill="currentColor"
	/>
	</svg>
</button>

<!-- Back to Top End -->

<?php wp_footer(); ?>

</body>

</html>
