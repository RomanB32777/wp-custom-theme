<?php

function get_author_info( $user_id, $block_title = '', $description_size = 15, $is_show_email = true ) {

	$author_posts_url = get_author_posts_url( $user_id );
	$author_name      = get_the_author_meta( 'display_name', $user_id );
	$author_email     = get_the_author_meta( 'user_email', $user_id );

	?>
	<div class="author-info">
		<?php if ( ! empty( $block_title ) ) { ?>
			<h5 class="font-roboto mb-6 md:text-2xl">
				<?php echo esc_html( $block_title ); ?>
			</h5>
		<?php } ?>
		<div class="rounded-lg flex flex-col gap-4 md:!py-6 lg:!flex-row lg:!gap-16">
			<div class="flex gap-2 flex-col md:!flex-row md:!gap-10">
				<div class="flex gap-3 flex-col items-start justify-center md:!items-center">
					<a class="w-20 h-20 [&>img]:rounded-full [&>img]:h-full [&>img]:w-full [&>img]:object-cover [&>img]:object-center" href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
						<?php echo get_avatar( $user_id, 80, 'mystery', $author_name ); ?>
					</a>
					<?php if ( $is_show_email ) { ?>
						<a class="underline" href="mailto:<?php echo esc_html( $author_email ); ?>" rel="author-email">
							<?php echo esc_html( $author_email ); ?>
						</a>
					<?php } ?>
				</div>
				<div>
					<a class="underline" href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>" rel="author">
						<?php echo esc_html( $author_name ); ?>
					</a>
					<p class="mt-2">
						<?php echo esc_html( wp_trim_words( get_the_author_meta( 'description', $user_id ), $description_size, ' ...' ) ); ?>
					</p>
				</div>
			</div>
			<div class="flex items-center justify-center min-w-48">
				<a class="main-button inline-block w-full text-center rounded-lg p-3 no-underline" href="<?php echo esc_url( $author_posts_url ); ?>" title="<?php echo esc_attr( $author_name ); ?>">
					<span class="font-roboto text-base xl:!text-sm font-bold">
						<?php esc_html_e( 'Read more', 'custom-theme' ); ?>
					</span>
				</a>
			</div>
		</div>
	</div>

<?php } ?>
