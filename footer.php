<!-- Start footer-->

<footer class="main-border border-t">
	<div class="py-10 mx-auto max-w-7xl px-4 sm:!px-6 lg:!px-8">
		<div class="flex flex-col gap-8 items-center">
			<?php get_template_part( 'theme-parts/logo' ); ?>

			<?php 
			if ( is_active_sidebar( 'footer-widgets' ) ) {
				dynamic_sidebar( 'footer-widgets' ); 
			} 
			?>

			<?php
				wp_nav_menu( 
					array( 
						'theme_location' => 'footer',
						'depth'          => 1,
						'container'      => null,
						'menu_class'     => 'flex gap-4 justify-around items-center flex-wrap',
						'walker'         => new Footer_Walker_Nav_Menu(),
						// 'fallback_cb'       => 'theme_walker_nav_menu::fallback',
					) 
				); 
				?>

			<p class="text-sm text-center">
				<?php echo esc_html( gmdate( 'Y' ) ); ?> 
				<?php esc_html_e( '&copy;' ); ?>
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</p>
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
