<?php 

$main_email = get_option( 'main_email' );
$main_phone = get_option( 'main_phone' );


?>

<div class="mobile-menu hidden xl:!hidden" id="mobile-menu" role="dialog" aria-modal="true">
	<div class="handle-visible-menu fixed inset-0 z-10 bg-black opacity-70"></div>
	<div
		class="mobile-menu-wrapper fixed inset-y-0 left-0 z-10 flex flex-col w-full overflow-y-auto px-4 pt-28 pb-8 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10"
	>
		<div class="flow-root grow">
			<div class="flex flex-col h-full gap-y-16">
				<div>
					<?php
						wp_nav_menu( 
							array( 
								'theme_location' => 'header',
								'depth'          => 5,
								'container'      => null,
								'menu_class'     => 'space-y-4 mb-8',
								'walker'         => new Header_Walker_Nav_Menu(),
							) 
						); 
						?>
					<div>
						<button 
							id="special-mobile-button"
							class="accessibility-button px-3 py-5 rounded-xl" 
							type="button" 
							aria-expanded="false"
						>
							<span class="sr-only">Icon</span>
							<img 
								class="icon-button" 
								src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/eye-light.svg" 
								alt="<?php esc_attr_e( 'eye icon', 'custom-theme' ); ?>"
								width="35" 
								height="20"
							>
						</button>
					</div>
				</div>

				<div class="flex flex-col gap-y-4">
					<?php if ( ! empty( $main_phone ) ) { ?>
						<a class="text-3xl" href="tel:<?php echo esc_attr( $main_phone ); ?>">
							<?php echo esc_html( $main_phone ); ?>
						</a>	
					<?php } ?>

					<?php if ( ! empty( $main_email ) ) { ?>
						<a class="mobile-email text-2xl" href="mailto:<?php echo esc_attr( $main_email ); ?>">
							<?php echo esc_html( $main_email ); ?>
						</a>
					<?php } ?>

					<?php if ( is_active_sidebar( 'social-widgets' ) ) { ?>
						<div>
							<?php dynamic_sidebar( 'social-widgets' ); ?>
						</div>
					<?php } ?>
				</div>

				<div>
					<button
						class="main-button handle-form-modal flex text-xl font-medium rounded-xl min-w-52 w-full"
						type="button"
						aria-expanded="false"
					>
						<span class="py-4 mx-auto">Оставить заявку</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
