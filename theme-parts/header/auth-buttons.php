<?php 
	$login_link   = 'https://baji-live999.com/main';
	$sign_up_link = 'https://baji-live999.com/main';
?>

<div class="flex gap-3">
	<a class="auth-btn no-underline" href="<?php echo esc_url( $login_link ); ?>">
		<button
			class="main-button button-login rounded-lg p-3"
			type="button"
			aria-expanded="false"
		>
			<span class="font-roboto text-base xl:!text-sm font-bold text-white">
				<?php esc_html_e( 'Log in', 'custom-theme' ); ?>
			</span>
		</button>
	</a>

	<a class="auth-btn no-underline" href="<?php echo esc_url( $sign_up_link ); ?>">
		<button
			class="main-button button-sign-up rounded-lg p-3"
			type="button"
			aria-expanded="false"
		>
			<span class="font-roboto text-base xl:!text-sm font-bold text-white">
				<?php esc_html_e( 'Sign Up', 'custom-theme' ); ?>
			</span>
		</button>
	</a>
</div>
