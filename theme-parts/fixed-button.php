<?php 
	$page_id     = get_the_id();
	$button_link = get_field( 'bottom_banner_link', $page_id );

if ( ! empty( $button_link ) && ! empty( $button_link['title'] ) ) {
	?>

<div class="main-button fixed bottom-0 z-10 w-full duration-200 invisible opacity-0" id="fixed-button">
	<div class="mx-auto max-w-7xl py-3 px-4 sm:px-6 lg:px-8 text-center">
		<a 
			href="<?php echo esc_url( $button_link['url'] ); ?>" 
			title="<?php echo esc_attr( $button_link['title'] ); ?>" 
			target="<?php echo esc_attr( $button_link['target'] ); ?>" 
			rel="nofollow"
			class="font-bold text-3xl"
		>
			<?php echo esc_html( $button_link['title'] ); ?>
		</a>
	
	</div>
</div>

<?php } ?>
