<?php

/*  Custom Options Menu Item Start */

function custom_options_page() {
	add_menu_page(
		esc_html__( 'Custom settings', 'custom-theme' ),
		esc_html__( 'Custom settings', 'custom-theme' ),
		'manage_options',
		'custom-settings',
		'theme_options_page_html',
		'dashicons-admin-generic',
		59
	);
}
add_action( 'admin_menu', 'custom_options_page' );

/*  Custom Options Menu Item End */

/*  Custom Options Page Start */

function theme_options_page_html() {

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_GET['settings-updated'] ) ) {
		add_settings_error( 'custom_messages', 'custom_message', esc_html__( 'Settings Saved', 'custom-theme' ), 'updated' );
	}

	settings_errors( 'custom_messages' );

	$active_tab = 'main_tab';

	?>

<div class="wrap">
	<style type="text/css">
		form h2 {
			color: #e74c3c;
		}
	</style>
	<h1 class="wp-heading-inline"><?php echo esc_html( get_admin_page_title() ); ?><span class="title-count theme-count"><?php echo esc_html( $GLOBALS['custom_theme_version'] ); ?></span></h1>
	
	<form method="post" action="options.php">
		<?php

		settings_fields( $active_tab );
		do_settings_sections( $active_tab );

		submit_button( esc_html__( 'Save Settings', 'custom-theme' ) );

		?>
	</form>
</div>

	<?php
}

/*  Custom Options Page End */

function custom_textfield_name_callback( $args ) {
	$option      = esc_attr( get_option( $args['option_name'] ) );
	$id          = $args['id'];
	$option_name = $args['option_name'];

	?>
	<input type="text" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $option_name ); ?>" value="<?php echo esc_attr( $option ); ?>" class="regular-text" />
	<?php
}

function custom_tab_titles_callback( $args ) {
	?>
	<p id="<?php echo esc_attr( $args['id'] ); ?>">
		<?php esc_html_e( 'Here you can change the default titles.', 'custom-theme' ); ?>
	</p>
		<?php
}

function custom_textfield_button_title_callback( $args ) {
	$option      = esc_attr( get_option( $args['option_name'] ) );
	$id          = $args['id'];
	$option_name = $args['option_name'];
	?>
	<input type="text" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $option_name ); ?>" value="<?php echo esc_attr( $option ); ?>" placeholder="<?php echo esc_attr( 'Default &quot;Follow&quot;' ); ?>" class="regular-text" />
		<?php
}

function custom_textfield_permalink_button_title_callback( $args ) {
	$option      = esc_attr( get_option( $args['option_name'] ) );
	$id          = $args['id'];
	$option_name = $args['option_name'];
	?>
	<input type="text" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $option_name ); ?>" value="<?php echo esc_attr( $option ); ?>" placeholder="<?php echo esc_attr( 'Default &quot;Read&quot;' ); ?>" class="regular-text" />
		<?php
}

/*  Main settings - Start  */

function main_settings_init() {

	/*  Main settings tab - Start  */

	/*  --- The setting sections ---  */

	add_settings_section(
		'main_tab_info',
		esc_html__( 'Info settings', 'custom-theme' ),
		'custom_tab_titles_callback',
		'main_tab'
	);

	/*
	----------------
	Title setting fields
	----------------  */

	add_settings_field(
		'main_phone',
		esc_html__( 'Main phone', 'custom-theme' ),
		'custom_textfield_name_callback',
		'main_tab',
		'main_tab_info',
		array(
			'id'          => 'main_phone', 
			'option_name' => 'main_phone',
		)  
	);
	register_setting( 'main_tab', 'main_phone', 'esc_attr' );

	add_settings_field(
		'main_email',
		esc_html__( 'Main email', 'custom-theme' ),
		'custom_textfield_name_callback',
		'main_tab',
		'main_tab_info',
		array(
			'id'          => 'main_email', 
			'option_name' => 'main_email',
		)  
	);
	register_setting( 'main_tab', 'main_email', 'esc_attr' );

	add_settings_field(
		'main_address',
		esc_html__( 'Main address', 'custom-theme' ),
		'custom_textfield_name_callback',
		'main_tab',
		'main_tab_info',
		array(
			'id'          => 'main_address', 
			'option_name' => 'main_address',
		)  
	);
	register_setting( 'main_tab', 'main_address', 'esc_attr' );

	add_settings_field(
		'main_description',
		esc_html__( 'Main description', 'custom-theme' ),
		'custom_textfield_name_callback',
		'main_tab',
		'main_tab_info',
		array(
			'id'          => 'main_description', 
			'option_name' => 'main_description',
		)  
	);
	register_setting( 'main_tab', 'main_description', 'esc_attr' );
}

add_action( 'admin_init', 'main_settings_init' );
