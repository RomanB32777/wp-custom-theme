<?php 
	$login_link   = '#';
	$sign_up_link = '#';
?>

<div class="flex gap-3">
	<a class="auth-btn no-underline" href="<?php echo esc_url( $login_link ); ?>">
		<button
			class="button-login rounded-lg p-3"
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
			class="button-sign-up rounded-lg p-3"
			type="button"
			aria-expanded="false"
		>
			<span class="font-roboto text-base xl:!text-sm font-bold text-white">
				<?php esc_html_e( 'Sign Up', 'custom-theme' ); ?>
			</span>
		</button>
	</a>
</div>
