<?php

$lecturers_query = new WP_Query(
	array(
		'post_type'   => 'lecturer',
		'post_status' => 'publish',
		'order'       => 'DESC',
		'orderby'     => 'date', 
	)
); 

if ( $lecturers_query->have_posts() ) { ?>
	<div>
		<h1 class="mb-8 lg:!mb-16">
			Наши преподаватели
		</h1>
		
		<div class="flex flex-col gap-4 md:!grid md:grid-cols-2 md:!gap-8">
			<?php 
			while ( $lecturers_query->have_posts() ) :
				$lecturers_query->the_post(); 
	
				get_template_part( '/theme-parts/cards/lecturer' );
				
				endwhile;
				wp_reset_postdata();
			?>
		</div>
	</div>
<?php } ?>
