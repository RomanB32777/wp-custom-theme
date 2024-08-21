<?php 

$post_title_attr   = the_title_attribute( 'echo=0' );
$lecturer_position = get_post_meta( get_the_ID(), 'lecturer_position', true );

?>

<div class="lecturer-card relative flex flex-col-reverse rounded-xl overflow-hidden px-4 pt-8 xl:!block xl:!px-8 xl:!py-14">
	<div class="relative overflow-hidden rounded-xl w-full h-full xl:!absolute xl:!w-1/2 xl:inset-0">
		<?php 
			echo wp_get_attachment_image(
				get_post_thumbnail_id(),
				array(),
				'',
				array(
					'class' => 'h-full w-full object-cover object-right',
					'alt'   => $post_title_attr,
				) 
			); 
			?>
	</div>
	<div class="relative xl:w-1/2 xl:float-right">
		<h4 class="relative font-bold text-3xl mb-4 text-white">
			<?php the_title(); ?>
		</h4>
		<?php if ( ! empty( $lecturer_position ) ) { ?>
			<p class="text-xl mb-8 text-white">
				<?php echo esc_html( $lecturer_position ); ?>
			</p>
		<?php } ?>
		<p class="text-2xl text-white">
			<?php echo esc_html( wp_trim_words( get_the_excerpt(), 90, ' ...' ) ); ?>
		</p>
	</div>
</div>
