<?php

function get_author_info( $user_id, $block_title = '', $description_size = 15, $is_show_email = true ) {

	$author_posts_url   = get_author_posts_url( $user_id );
	$author_name        = get_the_author_meta( 'display_name', $user_id );
	$author_email       = get_the_author_meta( 'user_email', $user_id );
	$author_avatar_size = 80;
	$author_avatar_url  = get_avatar_url( $user_id, array( 'size' => $author_avatar_size ) );

	?>
	<div class="author-info">
		<?php if ( ! empty( $block_title ) ) { ?>
			<h5 class="block-title mb-6 md:text-2xl">
				<?php echo esc_html( $block_title ); ?>
			</h5>
		<?php } ?>
		<div class="flex flex-col gap-4 md:!py-6 lg:!flex-row lg:!gap-16">
			<div class="flex gap-2 flex-col md:!flex-row md:!gap-10">
				<div class="flex gap-3 flex-col items-start justify-center md:!items-center">
					<div class="w-20 h-20">
						<a href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
							<img 
								src="<?php echo esc_url( $author_avatar_url ); ?>" 
								width="<?php echo esc_attr( $author_avatar_size ); ?>" 
								height="<?php echo esc_attr( $author_avatar_size ); ?>" 
								alt="<?php echo esc_attr( $author_name ); ?>" 
								class="avatar h-full w-full max-w-20 max-h-20 object-cover object-center border rounded-full main-border"
							>
						</a>
					</div>
					<?php if ( $is_show_email ) { ?>
						<a class="title-link duration-200 hover:text-secondary underline" href="mailto:<?php echo esc_html( $author_email ); ?>" rel="author-email">
							<?php echo esc_html( $author_email ); ?>
						</a>
					<?php } ?>
				</div>
				<div>
					<a class="title-link duration-200 hover:text-secondary no-underline" href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
						<?php echo esc_html( $author_name ); ?>
					</a>
					<p class="mt-2">
						<?php echo esc_html( wp_trim_words( get_the_author_meta( 'description', $user_id ), $description_size, ' ...' ) ); ?>
					</p>
				</div>
			</div>
			<div class="flex items-center justify-center min-w-48">
				<a class="main-button inline-block w-full text-center p-3 no-underline" href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>">
					<span class="text-base xl:!text-sm font-bold">
						<?php esc_html_e( 'Read more', 'custom-theme' ); ?>
					</span>
				</a>
			</div>
		</div>
	</div>

<?php } ?>
