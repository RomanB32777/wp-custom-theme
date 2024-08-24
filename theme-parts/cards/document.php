<?php

$document_url = get_field( 'file', get_the_ID() );

?>

<div class="flex justify-between flex-col gap-y-4 border-2 main-border rounded-xl text-xl px-5 py-3 md:!px-8 md:!flex-row md:!items-center">
	<div class="flex items-center gap-x-4 md:!gap-x-8 md:w-[70%]">
		<img
			src="<?php bloginfo( 'template_directory' ); ?>/src/assets/icons/document.svg" 
			alt="<?php esc_attr_e( 'document icon', 'custom-theme' ); ?>"
			width="22"
			height="28"
		/>
		<a 
			href="<?php echo esc_url( $document_url ); ?>" 
			class="document-link font-bold no-underline"
			rel="nofollow" 
			target="_blank"
		>
			<?php echo esc_html( the_title() ); ?>
		</a>
	</div>

	<span class="card-date md:w-1/4">
		<?php the_time( 'j F Y в G:i' ); ?>
	</span>
</div>
