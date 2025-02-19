<?php

function get_author_info( $user_id, $block_title = '', $description_size = 15 ) {

	$allowed_author_html = array(
		'a'      => array(
			'href'   => true,
			'title'  => true,
			'target' => true,
			'class'  => true,
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'span'   => array(),
		'p'      => array(),
	);

	$author_posts_url    = get_author_posts_url( $user_id );
	$author_name         = get_the_author_meta( 'display_name', $user_id );
	$author_position     = get_the_author_meta( 'position', $user_id );
	$author_rating       = get_the_author_meta( 'rating', $user_id );
	$author_facebook_url = get_the_author_meta( 'facebook', $user_id );
	$author_linkedin_url = get_the_author_meta( 'linkedin', $user_id );
	
	$author_avatar_url = get_avatar_url( $user_id, array( 'size' => 200 ) );

	function render_author_socials( $args = array() ) {
		$defaults = array(
			'facebook'     => '',
			'linkedin'     => '',
			'item_classes' => '',
		);
		
		$parsed_args = wp_parse_args( $args, $defaults );

		$facebook_url = $parsed_args['facebook'];
		$linkedin_url = $parsed_args['linkedin'];

		$item_classes     = array(
			'social-icon flex items-center justify-center w-11 h-11 rounded-lg no-underline',
			$parsed_args['item_classes'],
		);
		$item_class_names = esc_attr( implode( ' ', $item_classes ) );

		if ( $facebook_url || $linkedin_url ) { ?>
			<div class="flex gap-4">
				<?php if ( $facebook_url ) { ?>
					<a 
						class="<?php echo esc_attr( $item_class_names ); ?>"
						href="<?php echo esc_url( $facebook_url ); ?>"
						title="facebook" 
						rel="nofollow" 
						target="_blank"
					>
						<svg xmlns="http://www.w3.org/2000/svg" width="9" height="18" viewBox="0 0 9 18" fill="none">
							<path 
								fill-rule="evenodd" 
								clip-rule="evenodd" 
								d="M6.13437 17.8742V9.16936H8.53729L8.85573 6.16962H6.13437L6.13846 4.66822C6.13846 3.88585 6.21279 3.46663 7.33651 3.46663H8.83872V0.466553H6.43546C3.54876 0.466553 2.53272 1.92175 2.53272 4.36893V6.16996H0.733337V9.1697H2.53272V17.8742H6.13437Z" 
								fill="currentColor"
							/>
						</svg>
					</a>
				<?php } ?>

				<?php if ( $linkedin_url ) { ?>
					<a
						class="<?php echo esc_attr( $item_class_names ); ?>"
						href="<?php echo esc_url( $facebook_url ); ?>"
						title="facebook" 
						rel="nofollow" 
						target="_blank"
					>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="20px" height="20px">
							<g 
								fill="currentColor" 
								fill-rule="nonzero" 
								stroke="none" 
								stroke-width="1" 
								stroke-linecap="butt" 
								stroke-linejoin="miter" 
								stroke-miterlimit="10" 
								stroke-dasharray="" 
								stroke-dashoffset="0" 
								font-family="none" 
								font-weight="none" 
								font-size="none" 
								text-anchor="none" 
								style="mix-blend-mode: normal"
							>
								<g transform="scale(5.12,5.12)">
									<path d="M41,4h-32c-2.76,0 -5,2.24 -5,5v32c0,2.76 2.24,5 5,5h32c2.76,0 5,-2.24 5,-5v-32c0,-2.76 -2.24,-5 -5,-5zM17,20v19h-6v-19zM11,14.47c0,-1.4 1.2,-2.47 3,-2.47c1.8,0 2.93,1.07 3,2.47c0,1.4 -1.12,2.53 -3,2.53c-1.8,0 -3,-1.13 -3,-2.53zM39,39h-6c0,0 0,-9.26 0,-10c0,-2 -1,-4 -3.5,-4.04h-0.08c-2.42,0 -3.42,2.06 -3.42,4.04c0,0.91 0,10 0,10h-6v-19h6v2.56c0,0 1.93,-2.56 5.81,-2.56c3.97,0 7.19,2.73 7.19,8.26z"/>
								</g>
							</g>
						</svg>
					</a>
				<?php } ?>
			</div>
			<?php 
		} 
	}

	?>
	<div class="author-info bg-white rounded-xl md:!rounded-3xl">
		<div class="p-4 md:!px-8 md:!py-8">
			<div class="flex gap-4 flex-col-reverse md:!flex-row md:!gap-10">
				<div>
					<div class="w-52 h-60 mx-auto md:!mx-0">
						<a href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
							<img 
								width="208" 
								height="240" 
								src="<?php echo esc_url( $author_avatar_url ); ?>" 
								alt="<?php echo esc_attr( $author_name ); ?>" 
								class="avatar h-full w-full max-w-52 max-h-60 object-cover object-center"
							>
						</a>
					</div>
				</div>

				<div class="flex flex-1 flex-col items-center md:!items-start">
					<div class="mb-1">
						<a 
							class="title-link font-bold text-xl duration-200 hover:text-secondary no-underline md:!text-3xl" 
							href="<?php echo esc_url( $author_posts_url ); ?>"
							title="<?php echo esc_attr( $author_name ); ?>" 
							rel="author"
						>
							<?php echo esc_html( $author_name ); ?>
						</a>
					</div>

					<p class="text-grizzly text-sm mb-2 md:!mb-4 md:!text-xl ">
						<?php echo esc_html( $author_position ); ?>
					</p>

					<div class="flex items-center justify-between md:w-full">
						<?php if ( function_exists( 'custom_star_rating' ) ) { ?>
							<div class="flex relative items-center gap-x-2">
								<?php
									custom_star_rating(
										array(
											'rating'       => $author_rating,
											'rating_stars_number' => 5,
											'wrapper_classes' => 'gap-x-2',
											'star_classes' => 'w-6 h-6',
										)
									);
								?>
								<span class="text-grizzly text-base font-medium md:!text-xl">
									<?php echo esc_html( number_format( round( (float) $author_rating, 1 ), 1, '.', ',' ) ); ?>
								</span>
							</div>
						<?php } ?>
							
						<div class="hidden md:!block">
							<?php 
								render_author_socials(
									array(
										'facebook' => $author_facebook_url,
										'linkedin' => $author_linkedin_url,
									)
								); 
							?>
						</div>
					</div>

					<p class="text-grizzly text-xl pt-4 md:!pt-8">
						<?php
						
						$more_link = '...
							<a 
								class="main-link duration-200 underline" 
								href="' . esc_url( $author_posts_url ) . '"
								title="' . esc_attr( $author_name ) . '" 
							>
								' . esc_html__( 'More', 'custom-theme' ) . '
							</a>';
						?>
						<?php echo wp_kses( wp_trim_words( get_the_author_meta( 'description', $user_id ), $description_size, $more_link ), $allowed_author_html ); ?>
					</p>
				</div>
			</div>
		</div>

		<div class="p-4 pt-0 md:hidden">
			<?php 
				render_author_socials(
					array(
						'facebook'     => $author_facebook_url,
						'linkedin'     => $author_linkedin_url,
						'item_classes' => 'flex-1',
					)
				); 
			?>
		</div>
	</div>

<?php } ?>
