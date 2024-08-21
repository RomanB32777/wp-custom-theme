<div>
	<h1 class="mb-8 lg:!mb-16">
		Контакты
	</h1>

	<div class="flex flex-col gap-8 xl:!flex-row">
		<div class="flex-1 space-y-8">
			<?php if ( is_active_sidebar( 'contacts-widgets' ) ) { 
				dynamic_sidebar( 'contacts-widgets' ); 
			} ?>

			<button
				class="main-button handle-form-modal flex text-xl font-medium rounded-xl min-w-52"
				type="button"
				aria-expanded="false"
			>
				<span class="py-4 mx-auto px-8">Оставить заявку</span>
			</button>
		</div>

		<div class="flex-1">
			<iframe 
				src="https://yandex.ru/map-widget/v1/?um=constructor%3A714d05e8c679734437e4585ed7a1e2d6200d8daf431a78734ec412be3ca02524&amp;source=constructor" 
				width="100%" 
				height="100%" 
				frameborder="1"
				class="main-border h-48 border-2 rounded-xl xl:!h-full"
			>
			</iframe>
		</div>
	</div>
</div<
