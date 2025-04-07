<?php 

global $post;

$current_post_type = get_post_type();
$parent            = get_post( $post->post_parent );

$is_organization_post_type = 'organization' === $current_post_type;

$custom_title     = get_post_meta( get_the_ID(), "{$current_post_type}_custom_title", true );
$overall_rating   = esc_html( get_post_meta( get_the_ID(), "{$current_post_type}_overall_rating", true ) );
$external_link    = esc_url( get_post_meta( get_the_ID(), "{$current_post_type}_external_link", true ) );
$button_title     = esc_html( get_post_meta( get_the_ID(), "{$current_post_type}_button_title", true ) );
$bonus_value      = esc_html( get_post_meta( get_the_ID(), "{$current_post_type}_bonus_value", true ) );
$promotional_code = esc_html( get_post_meta( get_the_ID(), "{$current_post_type}_promotional_code", true ) );
$funds_withdrawal = esc_html( get_post_meta( $is_organization_post_type ? get_the_ID() : $parent->ID, 'organization_funds_withdrawal', true ) );

$rating_stars_number_value = 5;

if ( 'organization' === $current_post_type ) {
	if ( get_option( 'custom_rating_stars_number' ) ) {
		$rating_stars_number_value = get_option( 'custom_rating_stars_number' );
	}
} elseif ( get_option( "{$current_post_type}_rating_stars_number" ) ) {
	$rating_stars_number_value = get_option( "{$current_post_type}_rating_stars_number" );
}

if ( ! $is_organization_post_type ) {
	if ( empty( $bonus_value ) ) {
		$bonus_value = esc_html( get_post_meta( $parent->ID, 'organization_bonus_value', true ) );
	}
	
	if ( empty( $promotional_code ) ) {
		$promotional_code = esc_html( get_post_meta( $parent->ID, 'organization_promotional_code', true ) );
	}
}

$organization_payment_systems = array();

if ( function_exists( 'get_field' ) ) {

	$current_referral_link = array();
			
	$referral_links = get_field( 'referral_links' );

	foreach ( $referral_links as $referral_link ) {
		$curr_custom_pages = $referral_link['custom_page'];

		if ( is_array( $curr_custom_pages ) ) {
			$founded_id = array_filter( $curr_custom_pages, fn( $item ) => $post->ID === $item );
					
			if ( $founded_id ) {
				$current_referral_link = $referral_link;
			}
		} elseif ( $page_id === $curr_custom_page ) {
			$current_referral_link = $referral_link;
		}          
	}

	if ( $current_referral_link ) {
		$external_link = $current_referral_link['referral_link'];
	}

	if ( $is_organization_post_type ) {
		$organization_payment_systems = get_field( 'organization_payment_systems' );   
	} else {
		$organization_payment_systems = get_field( 'organization_payment_systems', $parent->ID );   
	}
}

if ( empty( $button_title ) ) {
	$button_title_option = $is_organization_post_type ? get_option( 'organizations_play_now_title' ) : get_option( "{$custom_post_type}_button_title" );

	if ( $button_title_option ) {
		$button_title = esc_html( $button_title_option );
	} else {
		$button_title = $is_organization_post_type ? esc_html__( 'Play Now', 'custom-theme' ) : esc_html__( 'Follow', 'custom-theme' );
	}
}
	
$is_exist_post_attachment_image = ! empty( wp_get_attachment_image( get_post_thumbnail_id() ) );

function render_support_funds_blocks( $funds_withdrawal_value ) {
	?>

	<div class="flex flex-col-reverse gap-4 md:!flex-row">
		<div class="customer-support bg-white text-dark flex flex-col justify-between rounded-xl px-4 py-2">
			<p class="font-semibold text-xl mb-2 lg:!leading-5 lg:!text-base lg:!mb-1">
				<?php esc_html_e( 'Customer Support', 'custom-theme' ); ?>
			</p>

			<div class="flex items-center gap-4 md:!justify-between">
				<div class="flex items-center gap-1">
					<svg fill="currentColor" width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.748 5.773S11.418 5 10.914 5c-.496 0-.754.229-.926.387S6.938 7.91 6.938 7.91s-.837.731-.773 2.106c.054 1.375.323 3.332 1.719 6.058 1.386 2.72 4.855 6.876 7.047 8.337 0 0 2.031 1.558 3.921 2.191.549.173 1.647.398 1.903.398.26 0 .719 0 1.246-.385.536-.389 3.543-2.807 3.543-2.807s.736-.665-.119-1.438c-.859-.773-3.467-2.492-4.025-2.944-.559-.459-1.355-.257-1.699.054-.343.313-.956.828-1.031.893-.112.086-.419.365-.763.226-.438-.173-2.234-1.148-3.899-3.426-1.655-2.276-1.837-3.02-2.084-3.824a.56.56 0 0 1 .225-.657c.248-.172 1.161-.933 1.161-.933s.591-.583.344-1.27-1.906-4.716-1.906-4.716z"></path></g></svg>
					
					<p class="text-xl font-semibold lg:!text-lg">
						<?php esc_html_e( 'Yes', 'custom-theme' ); ?>
					</p>
				</div>

				<p class="text-xl font-semibold lg:!text-lg">24/7</p>
			</div>
		</div>

		<?php if ( $funds_withdrawal_value ) { ?>
			<div class="bg-white text-dark flex flex-col justify-between rounded-xl px-4 py-2">
				<p class="font-semibold text-xl mb-2 lg:!leading-5 lg:!text-base lg:!mb-1">
					<?php esc_html_e( 'Funds withdrawal', 'custom-theme' ); ?>
				</p>

				<div class="flex items-center gap-4 md:!justify-between">
					<div class="main-button flex justify-center items-center min-w-8 w-8 h-8 rounded-full">
						<span class="text-xl">$</span>
					</div>

					<p class="text-xl font-semibold lg:!leading-5 lg:!text-lg">
						<?php echo esc_html( $funds_withdrawal_value ); ?>
					</p>
				</div>
			</div>
		<?php } ?>
	</div>

	<?php 
}

$max_visible_payments_count = 11;

?>

<div class="hidden mb-4 text-grizzly text-lg lg:!block">
	<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>
</div>

<div class="grid grid-cols-5 gap-4 md:!grid-cols-4">
	<?php if ( $is_exist_post_attachment_image ) { ?>
		<?php $post_title_attr = the_title_attribute( 'echo=0' ); ?>

		<div class="flex items-center col-span-2 md:col-span-1">
			<?php 
				echo wp_get_attachment_image(
					get_post_thumbnail_id(),
					array( 512, 200 ),
					'',
					array(
						'class' => 'w-auto max-w-32 h-32 object-cover object-center rounded-full md:!max-w-36 md:!h-36',
						'alt'   => $post_title_attr,
					) 
				); 
			?>
		</div>

	<?php } ?>

	<div class="flex flex-col h-full justify-center col-span-3 md:!col-span-5">
		<h1 class="font-semibold text-3xl mb-3 lg:!text-5xl lg:!mb-4">
			<?php 
			if ( $custom_title ) {
				echo esc_html( $custom_title );
			} else {
				the_title();
			} 
			?>
		</h1>

		<div class="flex flex-col gap-4 md:!flex-row md:!items-start xl:!justify-between">
			<?php if ( function_exists( 'custom_star_rating' ) ) { ?>
				<div class="flex relative items-center gap-x-2">
					<?php
						$rating_wrapper_classes = array(
							' gap-x-2',
							( intval( $rating_stars_number_value ) > 5 ? 'justify-center flex-wrap' : '' ),
						);

						$rating_wrapper_classnames = implode( ' ', $rating_wrapper_classes );

						custom_star_rating(
							array(
								'rating'              => $overall_rating,
								'rating_stars_number' => $rating_stars_number_value,
								'wrapper_classes'     => $rating_wrapper_classnames,
								'star_classes'        => 'w-6 h-6',
							)
						);
					?>
					<?php if ( $overall_rating ) { ?>
						<span class="text-base font-medium lg:!text-xl">
							<?php echo esc_html( number_format( round( $overall_rating, 1 ), 1, '.', ',' ) ); ?>
						</span>
					<?php } ?>
				</div>
			<?php } ?>

			<div class="hidden lg:!block">
				<?php render_support_funds_blocks( $funds_withdrawal ); ?>
			</div>
		</div>
	</div>

	<?php
		$content_column_classes = implode(
			' ', 
			array(
				'col-span-5 flex flex-col gap-4',
				( $is_exist_post_attachment_image ? 'md:col-start-2' : '' ),
			)
		);
		?>

	<div class="<?php echo esc_attr( $content_column_classes ); ?>">
		<div class="lg:hidden">
			<?php render_support_funds_blocks( $funds_withdrawal ); ?>
		</div>

		<?php if ( $organization_payment_systems ) { ?>
			<div class="bg-white text-dark rounded-xl p-4 flex-1">
				<p class="font-semibold text-xl mb-2">
					<?php esc_html_e( 'Payments methods:', 'custom-theme' ); ?>
				</p>

				<?php 
				
				$organization_payment_systems_count = count( $organization_payment_systems );

				$organization_payments_row_classes = implode(
					' ', 
					array(
						'payment-systems flex items-center gap-3 flex-wrap',
						( $organization_payment_systems_count <= 4 ? 'justify-center' : '' ),
					)
				);

				$hidden_payments_count = 0;

				?>

				<div class="<?php echo esc_attr( $organization_payments_row_classes ); ?>">
					<?php

					$organization_payments_item_default_classes = 'overflow-hidden w-16 h-12 bg-white-light py-2 rounded-md';

					foreach ( $organization_payment_systems as $index => $organization_payment_system ) {
						$curr_payment_system     = get_term_by( 'id', $organization_payment_system, 'payment-system' );
						$payment_system_image_id = get_term_meta( $organization_payment_system, 'taxonomy-image-id', true );

						if ( empty( $payment_system_image_id ) ) {
							continue;
						}

						$src_payment_system_image = wp_get_attachment_image_src( $payment_system_image_id, );

						$image_src    = $src_payment_system_image[0];
						$image_width  = $src_payment_system_image[1];
						$image_height = $src_payment_system_image[2];
						$image_alt    = $curr_payment_system->name;

						$is_hidden_payment = $index >= $max_visible_payments_count;

						if ( $is_hidden_payment ) {
							++$hidden_payments_count;
						}

						$organization_payments_item_classes = implode(
							' ', 
							array(
								'payment-system-item',
								$organization_payments_item_default_classes,
								( $is_hidden_payment ? 'toggle-visible-item hidden md:!block' : '' ),
							)
						);

						?>
							<div class="<?php echo esc_attr( $organization_payments_item_classes ); ?>">
								<div class="flex justify-center h-full w-full">
									<img
										class="w-auto h-full object-cover object-center"
										src="<?php echo esc_url( $image_src ); ?>"
										width="<?php echo esc_attr( $image_width ); ?>"
										height="<?php echo esc_attr( $image_height ); ?>"
										alt="<?php echo esc_attr( $image_alt ); ?>"
									>
								</div>
							</div>
					<?php } ?>

					<?php if ( $hidden_payments_count > 0 ) { ?>
						<div class="payments-show-button <?php echo esc_attr( $organization_payments_item_default_classes ); ?> cursor-pointer md:!hidden">
							<div class="flex justify-center items-center">
								<span class="text-lg font-semibold">...</span>
							</div>
						</div>
					<?php } ?>
				</div>

			</div>
		<?php } ?>

		<?php if ( $bonus_value || $promotional_code ) { ?>
			<div class="flex flex-col gap-4 lg:!flex-row">
				<?php if ( $promotional_code ) { ?>
					<div 
						class="bonus-border copy-button group duration-200 bg-white text-dark flex flex-col justify-between flex-1 p-4 rounded-xl cursor-pointer lg:!p-5"
						data-copy-text="<?php echo esc_attr( $promotional_code ); ?>"
					>
						<p class="text-base text-center text-dark font-semibold uppercase">
							<?php esc_html_e( 'promo code', 'custom-theme' ); ?>
						</p>

						<div class="flex items-center justify-between gap-3">
							<div class="flex items-center gap-1">
								<div class="bg-white rounded-full w-10 h-10 min-w-10 flex items-center justify-center">
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
										<mask 
											id="mask0_44_14348" 
											style="mask-type:luminance"
											maskUnits="userSpaceOnUse" 
											x="6" 
											y="6" 
											width="18" 
											height="18"
										>
											<path 
												fill-rule="evenodd" 
												clip-rule="evenodd"
												d="M22 6H8C6.9 6 6 6.9 6 8V22C6 23.1 6.9 24 8 24H22C23.1 24 24 23.1 24 22V8C24 6.9 23.1 6 22 6ZM10.5 21C9.67 21 9 20.33 9 19.5C9 18.67 9.67 18 10.5 18C11.33 18 12 18.67 12 19.5C12 20.33 11.33 21 10.5 21ZM10.5 12C9.67 12 9 11.33 9 10.5C9 9.67 9.67 9 10.5 9C11.33 9 12 9.67 12 10.5C12 11.33 11.33 12 10.5 12ZM15 16.5C14.17 16.5 13.5 15.83 13.5 15C13.5 14.17 14.17 13.5 15 13.5C15.83 13.5 16.5 14.17 16.5 15C16.5 15.83 15.83 16.5 15 16.5ZM19.5 21C18.67 21 18 20.33 18 19.5C18 18.67 18.67 18 19.5 18C20.33 18 21 18.67 21 19.5C21 20.33 20.33 21 19.5 21ZM19.5 12C18.67 12 18 11.33 18 10.5C18 9.67 18.67 9 19.5 9C20.33 9 21 9.67 21 10.5C21 11.33 20.33 12 19.5 12Z" 
												fill="white"
											/>
										</mask>
										<g mask="url(#mask0_44_14348)">
											<rect x="2" y="2" width="26" height="26" fill="black"/>
										</g>
									</svg>
								</div>
	
								<span class="font-semibold text-2xl">
									<?php echo esc_html( $promotional_code ); ?>
								</span>
							</div>
	
							<div class="main-link flex-none text-lg font-medium uppercase relative">
								<div class="flex items-center gap-2 duration-200 group-[.active]:!hidden">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<path 
											d="M5.83366 5.83334V2.50001C5.83366 2.27899 5.92146 2.06703 6.07774 1.91075C6.23402 1.75447 6.44598 1.66667 6.66699 1.66667H17.5003C17.7213 1.66667 17.9333 1.75447 18.0896 1.91075C18.2459 2.06703 18.3337 2.27899 18.3337 2.50001V13.3333C18.3337 13.5544 18.2459 13.7663 18.0896 13.9226C17.9333 14.0789 17.7213 14.1667 17.5003 14.1667H14.167V17.4942C14.167 17.9575 13.7928 18.3333 13.3278 18.3333H2.50616C2.39593 18.3334 2.28676 18.3118 2.18489 18.2697C2.08303 18.2276 1.99048 18.1657 1.91253 18.0878C1.83459 18.0099 1.77278 17.9173 1.73065 17.8154C1.68851 17.7136 1.66688 17.6044 1.66699 17.4942L1.66949 6.67251C1.66949 6.20917 2.04366 5.83334 2.50866 5.83334H5.83366ZM7.50033 5.83334H13.3278C13.7912 5.83334 14.167 6.20751 14.167 6.67251V12.5H16.667V3.33334H7.50033V5.83334ZM3.33616 7.50001L3.33366 16.6667H12.5003V7.50001H3.33616Z" 
											fill="currentColor"
										/>
									</svg>
	
									<span>
										<?php esc_html_e( 'copy', 'custom-theme' ); ?>
									</span>
								</div>
	
								<?php if ( $external_link ) { ?>
									<a 
										href="<?php echo esc_url( $external_link ); ?>" 
										title="<?php echo esc_attr( $button_title ); ?>" 
										class="hidden no-underline items-center gap-2 duration-200 group-[.active]:flex" 
										rel="nofollow" 
										target="_blank"
									>
										<span>
											<?php esc_html_e( 'visit site', 'custom-theme' ); ?>
										</span>
	
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
											<path 
												d="M10 16L20 8L10 0V5C4.477 5 0 9.477 0 15C0 15.273 0.0100002 15.543 0.0319996 15.81C1.54 12.95 4.542 11 8 11H10V16Z" 
												fill="currentColor"
											/>
										</svg>
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>

				<?php if ( $bonus_value ) { ?>
					<div class="bonus-border flex flex-col justify-between flex-1 text-center bg-white p-4 rounded-xl lg:!p-5">
						<p class="text-base text-dark font-semibold uppercase">
							<?php esc_html_e( 'bonus', 'custom-theme' ); ?>
						</p>

						<p class="text-2xl font-semibold line-clamp-2 text-yellow lg:!text-xl">
							<?php echo esc_html( $bonus_value ); ?>
						</p>
					</div>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if ( $external_link ) { ?>
			<a 
				href="<?php echo esc_url( $external_link ); ?>" 
				title="<?php echo esc_attr( $button_title ); ?>" 
				class="main-button inline-block w-full py-5 px-16 rounded-xl text-xl text-center font-bold no-underline" 
				rel="nofollow" 
				target="_blank"
			>
				<?php echo esc_html( $button_title ); ?> 
			</a>
		<?php } ?>
	</div>
</div>
