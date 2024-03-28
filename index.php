<?php get_header(); ?>

<main class="pt-32 pb-10 mx-auto max-w-7xl px-4 sm:px-6 md:!pt-48 lg:!pt-32 lg:px-8">
	<?php
		global $post;

		$page_id          = get_the_ID();
		$post_title       = $post->post_title;
		$page_description = get_field( 'top-description', $page_id );

		$approver_info     = null;
		$approver_taxonomy = 'approver';
		$approvers         = wp_get_post_terms( $page_id, $approver_taxonomy );

	if ( ! empty( $approvers ) ) {
		$approver      = $approvers[0];
		$approver_info = get_user_by( 'id', $approver->name );
	}

	$allowed_html = array(
		'a'      => array(
			'href'   => true,
			'title'  => true,
			'target' => true,
			'rel'    => true,
			'class'  => true,
			'style'  => true,
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'span'   => array(
			'class' => true,
			'style' => true,
		),
		'div'    => array(
			'class' => true,
		),
		'p'      => array(
			'class' => true,
			'style' => true,
		),
	);
	?>

	<!-- Breadcrumbs Start -->

	<?php 
	if ( ! is_front_page() ) {
		get_template_part( '/theme-parts/breadcrumbs' );
	} 
	?>

	<!-- Breadcrumbs End -->

	<div class="divide-y divide-primary">

		<?php if ( ! empty( $post_title ) ) { ?>
		
			<!-- Title Box Start -->
		
			<h1 class="font-lineSeedJp py-8 text-center font-bold text-2xl md:!text-5xl">
				<?php echo wp_kses( $post_title, $allowed_html ); ?>
			</h1>
		
			<!-- Title Box End -->

		<?php } ?>

		<!-- Info Box Start -->
	
		<?php
			get_template_part( '/theme-parts/pages/page-info' );
			get_page_info( $approver_info->ID );
		?>
	
		<!-- Info Box End -->

		<?php if ( ! empty( $page_description ) ) { ?>

			<!-- Description Box Start -->

			<div class="font-lineSeedJp py-8">
				<?php echo wp_kses( $page_description, $allowed_html ); ?>
			</div>

			<!-- Description Box End -->

		<?php } ?>

	</div>

	
	<div class="flex flex-col justify-between gap-x-5 pt-7 border-t main-border lg:!flex-row">
		<div class="order-2 main-content w-full lg:!w-[70%] lg:!order-1">

			<div class="main-blocks [&>*]:my-7">
				<?php 
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile;
				endif; 
				?>
			</div>
		
			<div class="[&>*]:my-7">
		
				<!-- Author Info Start -->
		
				<?php
					get_template_part( '/theme-parts/author-info' );
					get_author_info( get_the_author_meta( 'ID' ), esc_html__( 'Author', 'custom-theme' ), 40, false );
				?>
		
				<!-- Author Info End -->
		
				<!-- Comments Start -->
		
				<?php
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
		
				<!-- Comments End -->

				<!-- Authors Box Start -->

				<?php get_template_part( '/theme-parts/pages/authors-info' ); ?>

				<!-- Authors Box End -->

				<!-- Recent Pages Start -->

				<?php get_template_part( '/theme-parts/pages/recent-pages' ); ?>

				<!-- Recent Pages End -->

				<!-- Bottom Widgets Start -->
				
				<?php
				if ( is_active_sidebar( 'bottom-widgets' ) ) {
					dynamic_sidebar( 'bottom-widgets' );
				}
				?>
				
				<!-- Bottom Widgets End -->

			</div>
		</div>
		
		<div class="order-1 w-full lg:!w-[30%] lg:!order-2 [&>*]:my-7">
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
