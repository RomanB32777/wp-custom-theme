<a
	class="news-block relative group block border-2 main-border rounded-xl overflow-hidden p-4 no-underline transition md:!p-8"
	href="<?php the_permalink(); ?>" 
	title="<?php the_title(); ?>"
>
	<div class="relative flex flex-col h-full">
		<p class="card-date text-xl mb-8 transition group-hover:text-white">
			<?php the_time( get_option( 'date_format' ) ); ?>
		</p>
		<div
			class="flex flex-col flex-1 justify-between card-color gap-y-16 transition"
		>
			<h4 class="relative font-bold text-xl underline md:!text-2xl card-color group-hover:text-white">
				<?php the_title(); ?>
			</h4>
			<svg
				class="group-hover:text-white"
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
