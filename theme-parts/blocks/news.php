<?php

$news_query = new WP_Query(
	array(
		'posts_per_page' => 8,
		'post_status'    => 'publish',
		'order'          => 'DESC',
		'orderby'        => 'date', 
	)
); 

if ( $news_query->have_posts() ) { ?>
	<div>
		<h1 class="mb-8 lg:!mb-16">
			Новости и события
		</h1>

		<div class="news relative">
			<div class="flex flex-col gap-4 md:!grid md:grid-cols-2 xl:!grid-cols-4 md:!gap-8">
				<?php 
				while ( $news_query->have_posts() ) :
					$news_query->the_post(); 
					
					get_template_part( '/theme-parts/cards/news' );

					endwhile;
					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
<?php } ?>
