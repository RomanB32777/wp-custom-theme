<?php 

$card_link = get_option( 'card_link' );

?>

<div class="theme-contacts">
	<h1 class="mb-8 lg:!mb-16">
		<?php echo esc_html__( 'Contacts', 'custom-theme' ); ?>	
	</h1>

	<div class="flex flex-col gap-8 xl:!flex-row">
		<div class="flex-1 space-y-8">
			<?php 
			if ( is_active_sidebar( 'contacts-widgets' ) ) { 
				dynamic_sidebar( 'contacts-widgets' ); 
			} 
			?>

			<button
				class="main-button handle-form-modal flex text-xl font-medium rounded-xl min-w-52"
				type="button"
				aria-expanded="false"
			>
				<span class="py-4 mx-auto px-8">
					<?php echo esc_html__( 'Submit your application', 'custom-theme' ); ?>	
				</span>
			</button>
		</div>

		<div class="flex-1">
			<?php if ( ! empty( $card_link ) ) { ?>
				<iframe 
					src="<?php echo esc_url( $card_link ); ?>" 
					width="100%" 
					height="100%" 
					frameborder="1"
					class="main-border h-48 border-2 rounded-xl xl:!h-full"
				>
				</iframe>
			<?php } ?>
		</div>
	</div>
</div>
