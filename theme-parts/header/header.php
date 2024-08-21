<!-- Start header-->

<?php

$main_description = get_option( 'main_description' );
$main_phone       = get_option( 'main_phone' );

?>

<header class="fixed z-50 inset-x-0 shadow">
	<div class="header-base relative z-20 mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
		<div class="relative w-screen isolate overflow-hidden bg-white hidden left-1/2 -translate-x-2/4 xl:!block">
			<div class="flex justify-end mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
				<div class="flex items-center justify-between py-3 w-5/6">
					<?php if ( ! empty( $main_description ) ) { ?>
						<p class="text-base text-grizzly leading-4 max-w-72">
							<?php echo esc_html( $main_description ); ?>
						</p>
					<?php } ?>

					<div class="flex items-center gap-8">
						<div class="flex items-center gap-2">
							<img 
								class="icon-button" 
								src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/phone.svg" 
								alt="<?php esc_attr_e( 'phone icon', 'custom-theme' ); ?>"
								width="23" 
								height="23"
							>
							
							<?php if ( ! empty( $main_phone ) ) { ?>
								<a class="text-xl" href="tel:<?php echo esc_attr( $main_phone ); ?>">
									<?php echo esc_html( $main_phone ); ?>
								</a>	
							<?php } ?>
						</div>

						<?php if ( is_active_sidebar( 'social-widgets' ) ) { ?>
							<div>
								<?php dynamic_sidebar( 'social-widgets' ); ?>
							</div>
						<?php } ?>

						<div class="flex items-center gap-4">
							<button
								class="main-button handle-form-modal flex text-xl font-medium rounded-xl min-w-52"
								type="button"
								aria-expanded="false"
							>
								<span class="py-4 mx-auto px-8">Оставить заявку</span>
							</button>
							
							<button
								class="search-button search-open !bg-primary-dark flex text-xl font-medium rounded-xl py-3 px-2"
								type="button"
								aria-expanded="false"
							>
								<span class="sr-only">Icon</span>
								<img
									class="mx-3 my-2"
									src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/search.svg" 
									alt="<?php esc_attr_e( 'search icon', 'custom-theme' ); ?>"
									width="19"
									height="19"
								/>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div
			class="absolute inset-y-0 left-8 bg-primary-dark p-5 hidden xl:!flex xl:justify-center xl:items-center"
		>
			<div class="flex items-center min-w-fit h-fit no-underline">
				<div class="-m-1.5 p-1.5">
					<span class="sr-only"></span>

					<?php get_template_part( 'theme-parts/logo' ); ?>
				</div>
			</div>
		</div>
		<div>
			<div class="flex justify-between items-center gap-x-8 xl:!justify-end">
				<div class="xl:hidden">
					<button
						class="hamburger-btn handle-visible-menu inline-flex items-center justify-center rounded-md -m-2.5 p-2.5"
						type="button"
					>
						<span class="sr-only">Open main menu</span>
						<img
							class="hamburger-icon"
							src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/hamburger.svg"
							alt="<?php esc_attr_e( 'hamburger icon', 'custom-theme' ); ?>"
							width="24" 
							height="24"
						>
						<img
							class="close-icon hidden xl:hidden"
							src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/close.svg"
							alt="<?php esc_attr_e( 'close icon', 'custom-theme' ); ?>"
							width="23" 
							height="22"
						>
					</button>
				</div>

				<div class="bg-primary-dark p-4 xl:hidden">
					<?php get_template_part( 'theme-parts/logo' ); ?>
				</div>
				
				<!-- Main menu-->
				<?php get_template_part( 'theme-parts/header/menu' ); ?>

				<div>
					<button 
						class="search-button search-open flex rounded-xl xl:!hidden" 
						type="button" 
						aria-expanded="false"
					>
						<span class="sr-only">Icon</span>
						<img 
							src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/search.svg" 
							alt="<?php esc_attr_e( 'search icon', 'custom-theme' ); ?>"
							width="28" 
							height="28"
						>
					</button>

					<a 
						id="specialButton" 
						href="#"
						class="!hidden !bg-white px-3 py-2 rounded-xl xl:!flex" 
						type="button" 
						aria-expanded="false"
					>
						<span class="sr-only">Icon</span>
						<img 
							class="icon-button" 
							src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/eye.svg" 
							alt="<?php esc_attr_e( 'eye icon', 'custom-theme' ); ?>"
							width="35" 
							height="20"
						>
					</a>
				</div>
			</div>

		</div>
	</div>

	<div class="search-block relative bg-primary-light z-30 py-6 overflow-hidden hidden invisible opacity-0 transition-opacity ease-in duration-200 xl:!block xl:!py-7 xl:!absolute xl:inset-0 xl:!bg-white">
		<div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
			<div class="flex flex-row-reverse justify-between gap-x-2 xl:!flex-col">
				<img
					class="search-button cursor-pointer xl:ml-auto xl:mb-10"
					src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/close-primary.svg"
					alt="<?php esc_attr_e( 'close icon', 'custom-theme' ); ?>"
					width="23" 
					height="22"
				>
				
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>

	<!-- Mobile menu-->
	<?php get_template_part( 'theme-parts/header/mobile-menu' ); ?>
</header>

<!-- End header-->
