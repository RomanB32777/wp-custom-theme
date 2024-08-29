<form class="bg-primary-light w-full xl:!bg-white" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="flex text-xl gap-4">
		<input
			id="s"
			name="s" 
			type="text"
			value="<?php echo get_search_query(); ?>" 
			class="search-input block w-full bg-primary-light outline-none focus:outline-none xl:!bg-white"
			placeholder="<?php echo esc_attr__( 'Enter the text to search for', 'custom-theme' ); ?>"
		/>
		<input type="hidden" name="post_type" value="services" />
		<input 
			class="search-submit font-bold cursor-pointer hidden xl:!block" 
			type="submit" 
			id="searchsubmit" 
			value="<?php echo esc_attr__( 'Search', 'custom-theme' ); ?>" 
		/>
	</div>
</form>
