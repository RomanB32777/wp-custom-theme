<a
	class="search-card relative group block border-2 main-border rounded-xl overflow-hidden p-4 no-underline transition md:!p-8"
	href="<?php the_permalink(); ?>" 
	title="<?php the_title(); ?>"
>
	<div class="relative flex flex-col h-full">
		<div
			class="flex flex-col flex-1 justify-between gap-y-4 card-color transition group-hover:text-white"
		>
			<h4 class="relative font-bold text-xl underline md:!text-2xl card-color group-hover:text-white">
				<?php the_title(); ?>
			</h4>

			<p class="content-text text-lg md:!text-xl">
				<?php the_excerpt(); ?>
			</p>

			<svg
				xmlns="http://www.w3.org/2000/svg"
				width="28"
				height="18"
				viewBox="0 0 28 18"
				fill="none"
			>
				<path
					d="M0 9H26M26 9L18.3607 1M26 9L18.3607 17"
					stroke="currentColor"
					stroke-width="2"
				></path>
			</svg>
		</div>
	</div>
</a>
