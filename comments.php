<?php
if ( post_password_required() ) {
	return;
}

	$commenter = wp_get_current_commenter();
?>
<div id="comments" class="bg-white px-4 py-6 rounded-xl md:!p-8 md:!rounded-3xl">
	<!-- Start feedback block-->
	<div class="relative my-4 md:!mb-8">
		<?php
			$comment_field = '
				<div class="col-span-full order-4 md:!col-span-6">
					<textarea
						class="block resize-none bg-grizzly-light w-full h-full rounded-xl border-0 px-5 py-4 font-bold text-xl placeholder:text-grizzly"
						id="comment-form-textarea"
						name="comment-form-textarea"
						rows="3"
						required
						placeholder="' . esc_attr__( 'Start writing', 'custom-theme' ) . '"
					></textarea>
				</div>';

			$toggle_admin_field = '
				<div class="col-span-full order-2">
					<label class="relative inline-flex items-center cursor-pointer">
						<input id="is-get-auth-data" name="is-get-auth-data" type="checkbox" value="true" class="sr-only peer" />
						<div
							class="switcher w-11 h-6 bg-gray-200 rounded-full peer peer-focus:outline-none peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[\'\'] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all"
						></div>
						<span class="ms-3 text-sm font-medium">' . esc_html__( 'Save current username and email?', 'custom-theme' ) . '</span>
					</label>
				</div>';

			$author_field = '
				<div class="col-span-full order-1 flex flex-col gap-4 md:!order-3 md:!col-span-4">
					<div class="comment-form-author">
						<input
							class="block bg-grizzly-light w-full rounded-xl border-0 px-5 py-4 font-bold text-xl placeholder:text-grizzly"
							id="comment-form-author"
							type="text"
							name="comment-form-author"
							required
							placeholder="' . esc_attr__( 'Enter your name', 'custom-theme' ) . '"
							value="' . esc_attr( $commenter['comment_author'] ) . '"
						/>
					</div>';

			$email_field = '
					<div class="comment-form-email">
						<input
							class="block bg-grizzly-light w-full rounded-xl border-0 px-5 py-4 font-bold text-xl placeholder:text-grizzly"
							id="comment-form-email"
							type="email"
							name="comment-form-email"
							autocomplete="email"
							required
							placeholder="' . esc_attr__( 'Enter your email', 'custom-theme' ) . '"
							value="' . esc_attr( $commenter['comment_author_email'] ) . '"
						/>
					</div>
				</div>' . $comment_field;

			$rating_field = '
				<div class="col-span-full order-3 md:!order-1">
					<input 
						class="comment-rating-hidden" 
						id="rating" 
						name="rating" 
						type="hidden"
						value=""
					/>
					<div class="h-full flex items-center gap-2 md:!gap-4">';

		for ( $i = 1; $i <= 5; $i++ ) {
			$rating_field .= '
						<div id="star-' . $i . '" data-value="' . $i . '" class="comment-star flex-1 cursor-pointer bg-grizzly-light rounded-xl py-2 md:!py-4">
							<div class="star flex justify-center items-center">
								<svg
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
									class="w-8 h-8 md:!w-10 md:!h-10"
								>
									<path
										d="M23.4833 11.0095C23.9655 10.4664 24.1217 9.72154 23.9032 9.01914C23.6848 8.31555 23.1369 7.81028 22.4419 7.66626L16.8512 6.51408C16.6871 6.47984 16.5456 6.37242 16.4629 6.22013L13.6852 1.03059C13.3388 0.384845 12.7083 0 11.9997 0C11.2911 0 10.6617 0.384845 10.3153 1.03059L7.53754 6.22013C7.45491 6.37242 7.31342 6.47984 7.14816 6.51408L1.55862 7.66626C0.862471 7.81028 0.315747 8.31555 0.097281 9.01914C-0.122315 9.72154 0.0350062 10.4664 0.517216 11.0095L4.39075 15.3679C4.50395 15.4966 4.55827 15.6702 4.53789 15.8437L3.86214 21.7451C3.77838 22.4794 4.06927 23.1782 4.64429 23.6127C4.98388 23.87 5.37667 24 5.77285 24C6.04791 24 6.32522 23.9373 6.58783 23.811L11.7597 21.3154C11.9125 21.2422 12.0868 21.2422 12.2396 21.3154L17.4126 23.811C18.0544 24.1203 18.78 24.0471 19.3551 23.6127C19.9301 23.1782 20.2221 22.4794 20.1384 21.7451L19.4615 15.8449C19.4411 15.6702 19.4954 15.4966 19.6109 15.3679L23.4833 11.0095Z"
										fill="currentColor"
									></path>
								</svg>
							</div>
						</div>
					';
		}

			$rating_field .= '
					</div>
				</div>';

			$submit_field = '
				<div class="col-span-full order-5">
					%1$s %2$s
				</div>
			</div>';

			$comments_args = array(
				'id_form'              => 'comment_form',
				'comment_field'        => '<div class="grid gap-4 grid-cols-10">',
				'fields'               => array(
					'rating'           => $rating_field,
					'is-get-auth-data' => $toggle_admin_field,
					'author'           => $author_field,
					'email'            => $email_field,
				),
				'submit_field'         => $submit_field,
				'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="main-button comment-submit relative text-xl font-bold w-full rounded-xl py-5 cursor-pointer disabled:opacity-75 %3$s" value="%4$s" />',
				'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title mt-3 mb-6 font-semibold text-2xl">',
				'title_reply_after'    => '</h5>',
				'title_reply'          => esc_html__( 'Leave a feedback', 'custom-theme' ),
				'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'custom-theme' ),
				'comment_notes_before' => null,
				'logged_in_as'         => null,
				'label_submit'         => esc_html__( 'Send', 'custom-theme' ),
				'cancel_reply_before'  => '<span class="inline-block ml-1">',
				'cancel_reply_after'   => '</span>',
				'cancel_reply_link'    => esc_html__( 'Cancel', 'custom-theme' ),
				'action'               => '',
			);

			comment_form( $comments_args );
			?>

	</div>
	<!-- End feedback block-->

	<!-- Start comments block-->

	<?php $comments_number = get_comments_number(); ?>

	<div class="comments-wrapper">
		<p id="comments-count" class="font-medium text-xl mt-8 mb-4 md:!mt-10" data-comments-count="<?php echo esc_attr( $comments_number ); ?>">
			<?php 
				comments_number(
					__( '0 comments', 'custom-theme' ),
					__( '1 comment', 'custom-theme' ),
					__( '% comments', 'custom-theme' ) 
				); 
				?>
		</p>

		<?php if ( have_comments() ) : ?>
			<ul class="comment-list border-t divide-y">
				<?php
					wp_list_comments(
						array(
							'avatar_size' => 0,
							'style'       => 'ul',
							'callback'    => 'comment_custom',
							'short_ping'  => true,
							'reply_text'  => esc_html__( 'Reply', 'custom-theme' ),
						)
					);
				?>
			</ul>

			<?php
			
			$max_comments_number = get_option( 'comments_per_page' );

			if ( $comments_number > $max_comments_number ) {
				?>

				<div class="flex justify-center border-t pt-6">
					<button 
						id="load-comments" 
						class="w-80 py-3 bg-grizzly-light text-dark font-bold text-xl rounded-xl md:!py-5"
						data-post-id="<?php echo esc_attr( get_the_ID() ); ?>"
						data-comment-per-page="<?php echo esc_attr( $max_comments_number ); ?>"
						data-comment-all-count="<?php echo esc_attr( $comments_number ); ?>"
					>
						<span>
							<?php echo esc_html__( 'Show more', 'custom-theme' ); ?>
						</span>
					</button>
				</div>

			<?php } ?>
		<?php endif; ?>
	</div>
	<!-- End comments block-->
</div>
