<?php

$form_shortcode               = get_theme_mod( 'banner_form_shortcode' );
$is_enabled_banner            = boolval( get_theme_mod( 'is_enabled_banner_modal' ) );
$banner_background_image      = get_theme_mod( 'banner_background_image' );
$banner_title                 = get_theme_mod( 'banner_title' );
$banner_subscribe_button_url  = get_theme_mod( 'banner_subscribe_button_url' );
$banner_subscribe_description = get_theme_mod( 'banner_subscribe_description' );
$banner_visible_delay         = ! empty( get_theme_mod( 'banner_visible_delay' ) ) ? get_theme_mod( 'banner_visible_delay' ) : 7000;

if ( ! empty( $form_shortcode ) && $is_enabled_banner ) {

	?>
	<div 
		id="banner-banner-modal" 
		data-banner-visible-delay="<?php echo esc_attr( $banner_visible_delay ); ?>" 
		class="fixed inset-0 z-50 invisible opacity-0 transition-opacity ease-in duration-200" 
		aria-labelledby="modal-title" 
		role="dialog" 
		aria-modal="true"
	>
		<div class="fixed inset-0 bg-dark-opacity close-banner-modal"></div>

		<div class="flex min-h-full justify-center items-center p-4 text-center sm:p-0 w-screen overflow-y-auto">
			<div class="relative transform overflow-hidden bg-white text-left shadow-xl transition-all ease-in duration-200 sm:my-8 sm:w-full sm:max-w-screen-md">
				<?php if ( ! empty( $banner_background_image ) ) { ?>
					<img
						class="absolute inset-0 -z-10 h-full w-full object-cover md:object-center"
						src="<?php echo esc_url( $banner_background_image ); ?>"
						alt="banner background"
						width="768"
						height="364"
					/>
				<?php } ?>
				<div class="px-2 pt-2 pb-3 sm:!pt-4 sm:!px-4 sm:!pb-6">
					<div class="mb-3">
						<?php get_template_part( 'theme-parts/logo' ); ?>
					</div>

					<h2 class="text-white font-extrabold mb-6 w-4/6 text-2xl sm:!text-5xl sm:!mb-5">
						<?php echo esc_html( $banner_title ); ?>		
					</h2>

					<?php echo do_shortcode( $form_shortcode ); ?>
				</div>
				<div class="bg-white p-2 flex items-center gap-x-2 sm:!gap-x-4 sm!:py-3 sm:!px-4">
					<div>
						<a 
							href="<?php echo esc_url( $banner_subscribe_button_url ); ?>" 
							rel="nofollow" 
							target="_blank"
						>
							<div class="bg-blue w-max flex rounded-3xl items-center gap-x-2 px-3 py-1 sm:gap-x-3 sm:!px-6 sm:!py-2">
								<img class="w-4 h-4 sm:!w-6 sm:!h-6" width="24" height="24" src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/telegram.svg" alt="<?php esc_attr_e( 'telegram icon', 'custom-theme' ); ?>">
								<p class="text-white text-sm font-semibold sm:!text-xl">Subscribe</p>
							</div>
						</a>
					</div>
					<p class="text-grizzly text-xs sm:!text-base">
						<?php echo esc_html( $banner_subscribe_description ); ?>	
					</p>
				</div>
				<button class="absolute top-0 right-1.5 rounded-md text-white p-2.5 close-banner-modal" type="button">
					<span class="sr-only">Close banner</span>
					<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
		</div>
	</div>

<?php } ?>
