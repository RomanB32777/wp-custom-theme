<?php 

function render_author_post_cards( $query ) {
	while ( $query->have_posts() ) :
		$query->the_post();
		?>

		<div class="post-item border rounded-xl p-4">
			<div class="text-xs">
				<span>
					<?php echo get_the_date(); ?>
				</span>
			</div>
			
			<h5 class="my-3">
				<a class="no-underline duration-200" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_title(); ?>
				</a>
			</h5>
			
			<p class="font-base">
				<?php echo esc_html( wp_trim_words( get_the_excerpt(), 48, ' ...' ) ); ?>
			</p>
		</div>

		<?php

	endwhile;
	wp_reset_postdata();
}
