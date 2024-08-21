<?php 

$image_src      = get_template_directory_uri() . '/src/assets/images/background.png';
$image_alt      = esc_html__( 'Background image', 'custom-theme' );
$main_phone     = get_option( 'main_phone' );
$form_shortcode = get_theme_mod( 'modal_form_shortcode' );

?>

<div class="relative w-screen isolate overflow-hidden bg-primary-light left-1/2 -translate-x-2/4">
	<img
		class="absolute inset-0 -z-10 h-full object-cover object-center hidden w-1/2 lg:!block"
		src="<?php echo esc_url( $image_src ); ?>" 
		alt="<?php echo esc_attr( $image_alt ); ?>"
		width="1920"
		height="520"
	/>
	<div class="flex flex-col mx-auto max-w-screen-2xl lg:!flex-row lg:px-8">
		<div class="relative flex-1 py-16 px-4 sm:!px-10 lg:!px-0 lg:flex lg:items-center">
			<img 
				class="absolute inset-0 -z-10 h-full object-center lg:hidden"
				src="<?php echo esc_url( $image_src ); ?>" 
				alt="<?php echo esc_attr( $image_alt ); ?>"
				width="1920"
				height="520" 
			>
			<div class="text-white">
				<h5 class="mb-6 text-3xl font-bold tracking-tight lg:!text-5xl text-white">Записаться на обучение</h5>
				<div class="text-lg lg:!text-2xl">
					<p class="mb-6">Заполните форму<br />и отправьте заявку на обучение</p>
					<p class="mb-4">Или позвоните нам по телефону</p>
				</div>
				<?php if ( ! empty( $main_phone ) ) { ?>
					<a class="text-3xl font-medium lg:!text-5xl" href="tel:<?php echo esc_attr( $main_phone ); ?>">
						<?php echo esc_html( $main_phone ); ?>
					</a>	
				<?php } ?>
			</div>
		</div>
		<div class="flex-1 px-4 sm:!px-10 lg:!px-0">
			<div class="py-16 lg:p-16">
				<div class="form-shortcode">
					<?php echo do_shortcode( $form_shortcode ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
