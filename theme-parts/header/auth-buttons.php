<?php 
	$login_text = ! empty( get_theme_mod( 'header_login_button_text' ) ) ? get_theme_mod( 'header_login_button_text' ) : __( 'Log In', 'custom-theme' );
	$login_link = get_theme_mod( 'header_login_button_url' ); 

	$sign_text = ! empty( get_theme_mod( 'header_sign_button_text' ) ) ? get_theme_mod( 'header_sign_button_text' ) : __( 'Sign Up', 'custom-theme' );
	$sign_link = get_theme_mod( 'header_sign_button_url' ); 

	$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'span'   => array(),
	);
	?>

<div class="flex gap-3">
	<a class="auth-btn no-underline" href="<?php echo esc_url( $login_link ); ?>">
		<button
			class="main-button button-login rounded-lg p-3"
			type="button"
			aria-expanded="false"
		>
			<span class="font-roboto text-base xl:!text-sm font-bold">
				<?php echo wp_kses( $login_text, $allowed_html ); ?>
			</span>
		</button>
	</a>

	<a class="auth-btn no-underline" href="<?php echo esc_url( $sign_link ); ?>">
		<button
			class="main-button button-sign-up rounded-lg p-3"
			type="button"
			aria-expanded="false"
		>
			<span class="font-roboto text-base xl:!text-sm font-bold">
				<?php echo wp_kses( $sign_text, $allowed_html ); ?>
			</span>
		</button>
	</a>
</div>
