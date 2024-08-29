<?php

$form_shortcode     = get_theme_mod( 'modal_form_shortcode' );
$modal_title        = get_theme_mod( 'modal_title' );
$modal_success_text = ! empty( get_theme_mod( 'modal_success_text' ) ) ? get_theme_mod( 'modal_success_text' ) : __( 'Your data has been sent successfully!', 'custom-theme' );

if ( ! empty( $form_shortcode ) ) {

	?>
	<div 
		id="form-modal" 
		data-modal-success-text="<?php echo esc_attr( $modal_success_text ); ?>" 
		class="fixed inset-0 z-50 invisible opacity-0 transition-opacity ease-in duration-200" 
		aria-labelledby="modal-title" 
		role="dialog" 
		aria-modal="true"
	>
		<div class="fixed inset-0 bg-dark-opacity handle-form-modal"></div>

		<div class="flex min-h-full justify-center items-center p-4 text-center sm:p-0 w-screen overflow-y-auto">
			<div class="relative rounded-xl transform overflow-hidden bg-white text-left shadow-xl transition-all ease-in duration-200 sm:my-8 sm:w-full sm:max-w-screen-md">
				<div class="p-6 md:!p-10">
					<?php if ( ! empty( $modal_title ) ) { ?>
						<h3 class="modal-title font-bold mb-6 text-xl sm:!text-2xl sm:!mb-5">
							<?php echo esc_html( $modal_title ); ?>		
						</h3>
					<?php } ?>

					<div class="form-shortcode">
						<?php echo do_shortcode( $form_shortcode ); ?>
					</div>
				</div>
				<button class="absolute top-0 right-1.5 rounded-md text-white p-2.5 handle-form-modal" type="button">
					<span class="sr-only">
						<?php echo esc_html__( 'Close modal', 'custom-theme' ); ?>
					</span>
					
					<img
						src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/close-primary.svg"
						alt="<?php esc_attr_e( 'close icon', 'custom-theme' ); ?>"
						width="23" 
						height="22"
					>
				</button>
			</div>
		</div>
	</div>

<?php } ?>
