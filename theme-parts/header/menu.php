<nav class="relative h-16 hidden xl:!flex">
	<?php
		wp_nav_menu( 
			array( 
				'theme_location' => 'header',
				'depth'          => 5,
				'container'      => null,
				'menu_class'     => 'flex gap-x-5 h-full',
				'walker'         => new Header_Walker_Nav_Menu(),
			) 
		); 
		?>
</nav>
