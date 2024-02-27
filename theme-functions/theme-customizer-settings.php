<?php

function theme_customizer_setting( $wp_customize ) {
	$primary_color   = ! empty( $_ENV['PRIMARY_COLOR'] ) ? $_ENV['PRIMARY_COLOR'] : '#17946d';
	$secondary_color = ! empty( $_ENV['SECONDARY_COLOR'] ) ? $_ENV['SECONDARY_COLOR'] : '#f9b002';
	
	$links_color       = ! empty( $_ENV['LINKS_COLOR'] ) ? $_ENV['LINKS_COLOR'] : '#d63031';
	$links_hover_color = ! empty( $_ENV['LINKS_HOVER_COLOR'] ) ? $_ENV['LINKS_HOVER_COLOR'] : '#d63031';
	
	$body_color         = ! empty( $_ENV['BODY_COLOR'] ) ? $_ENV['BODY_COLOR'] : '#4e4e4e';
	$body_content_color = ! empty( $_ENV['BODY_CONTENT_COLOR'] ) ? $_ENV['BODY_CONTENT_COLOR'] : '#fff';
	
	$header_color                     = ! empty( $_ENV['HEADER_COLOR'] ) ? $_ENV['HEADER_COLOR'] : '#17946d';
	$header_menu_color                = ! empty( $_ENV['HEADER_MENU_LINK_COLOR'] ) ? $_ENV['HEADER_MENU_LINK_COLOR'] : '#fff';
	$header_hover_menu_color          = ! empty( $_ENV['HEADER_MENU_LINK_HOVER_COLOR'] ) ? $_ENV['HEADER_MENU_LINK_HOVER_COLOR'] : '#2e3246';
	$header_sub_menu_background_color = ! empty( $_ENV['HEADER_SUBMENU_COLOR'] ) ? $_ENV['HEADER_SUBMENU_COLOR'] : '#fff';
	$header_sub_menu_color            = ! empty( $_ENV['HEADER_SUBMENU_LINK_COLOR'] ) ? $_ENV['HEADER_SUBMENU_LINK_COLOR'] : '#121212';
	$header_hover_sub_menu_color      = ! empty( $_ENV['HEADER_SUBMENU_LINK_HOVER_COLOR'] ) ? $_ENV['HEADER_SUBMENU_LINK_HOVER_COLOR'] : '#2e3246';

	$header_mobile_color                       = ! empty( $_ENV['HEADER_MOBILE_COLOR'] ) ? $_ENV['HEADER_MOBILE_COLOR'] : '#17946d';
	$header_mobile_menu_color                  = ! empty( $_ENV['HEADER_MOBILE_MENU_LINK_COLOR'] ) ? $_ENV['HEADER_MOBILE_MENU_LINK_COLOR'] : '#fff';
	$header_mobile_hover_menu_color            = ! empty( $_ENV['HEADER_MOBILE_MENU_LINK_HOVER_COLOR'] ) ? $_ENV['HEADER_MOBILE_MENU_LINK_HOVER_COLOR'] : '#2e3246';
	$header_mobile_hover_menu_background_color = ! empty( $_ENV['HEADER_MOBILE_MENU_LINK_HOVER_BACKGROUND_COLOR'] ) ? $_ENV['HEADER_MOBILE_MENU_LINK_HOVER_BACKGROUND_COLOR'] : '#fff';
	$header_mobile_sub_menu_background_color   = ! empty( $_ENV['HEADER_MOBILE_SUBMENU_COLOR'] ) ? $_ENV['HEADER_MOBILE_SUBMENU_COLOR'] : '#fff';
	$header_mobile_sub_menu_color              = ! empty( $_ENV['HEADER_MOBILE_SUBMENU_LINK_COLOR'] ) ? $_ENV['HEADER_MOBILE_SUBMENU_LINK_COLOR'] : '#fff';
	$header_mobile_hover_sub_menu_color        = ! empty( $_ENV['HEADER_MOBILE_SUBMENU_LINK_HOVER_COLOR'] ) ? $_ENV['HEADER_MOBILE_SUBMENU_LINK_HOVER_COLOR'] : '#2e3246';

	$footer_color            = ! empty( $_ENV['FOOTER_COLOR'] ) ? $_ENV['FOOTER_COLOR'] : '#353535';
	$footer_content_color    = ! empty( $_ENV['FOOTER_CONTENT_COLOR'] ) ? $_ENV['FOOTER_CONTENT_COLOR'] : '#fff';
	$footer_menu_color       = ! empty( $_ENV['FOOTER_MENU_LINK_COLOR'] ) ? $_ENV['FOOTER_MENU_LINK_COLOR'] : '#fff';
	$footer_hover_menu_color = ! empty( $_ENV['FOOTER_MENU_LINK_HOVER_COLOR'] ) ? $_ENV['FOOTER_MENU_LINK_HOVER_COLOR'] : '#fff';

	$table_color            = ! empty( $_ENV['TABLE_COLOR'] ) ? $_ENV['TABLE_COLOR'] : '#3e7966';
	$table_content_color    = ! empty( $_ENV['TABLE_CONTENT_COLOR'] ) ? $_ENV['TABLE_CONTENT_COLOR'] : '#fff';
	$table_border_color     = ! empty( $_ENV['TABLE_BORDER_COLOR'] ) ? $_ENV['TABLE_BORDER_COLOR'] : '#3e7966';
	$table_th_color         = ! empty( $_ENV['TABLE_TH_COLOR'] ) ? $_ENV['TABLE_TH_COLOR'] : '#0e5a43';
	$table_th_content_color = ! empty( $_ENV['TABLE_TH_CONTENT_COLOR'] ) ? $_ENV['TABLE_TH_CONTENT_COLOR'] : '#fff';

	/*  --- Primary color ---  */

	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => $primary_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label'    => esc_html__( 'Primary color', 'custom-theme' ),
				'section'  => 'colors',
				'settings' => 'primary_color',
			)
		)
	);

	/*  --- Secondary color ---  */

	$wp_customize->add_setting(
		'secondary_color',
		array(
			'default'           => $secondary_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_color',
			array(
				'label'    => esc_html__( 'Secondary color', 'custom-theme' ),
				'section'  => 'colors',
				'settings' => 'secondary_color',
			)
		)
	);

	/*  --- Links color ---  */

	$wp_customize->add_setting(
		'links_color',
		array(
			'default'           => $links_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'links_color',
			array(
				'label'    => esc_html__( 'Links color', 'custom-theme' ),
				'section'  => 'colors',
				'settings' => 'links_color',
			)
		)
	);

	/*  --- Links hover color ---  */

	$wp_customize->add_setting(
		'links_hover_color',
		array(
			'default'           => $links_hover_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'links_hover_color',
			array(
				'label'    => esc_html__( 'Links hover color', 'custom-theme' ),
				'section'  => 'colors',
				'settings' => 'links_hover_color',
			)
		)
	);

	/*  --- Body color ---  */

	$wp_customize->add_setting(
		'body_color',
		array(
			'default'           => $body_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_color',
			array(
				'label'    => esc_html__( 'Body color', 'custom-theme' ),
				'section'  => 'colors',
				'settings' => 'body_color',
			)
		)
	);

	$wp_customize->add_setting(
		'body_content_color',
		array(
			'default'           => $body_content_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_content_color',
			array(
				'label'    => esc_html__( 'Body content color', 'custom-theme' ),
				'section'  => 'colors',
				'settings' => 'body_content_color',
			)
		)
	);

	
	/*  --- Header Settings ---  */

	$wp_customize->add_panel(
		'theme_header_settings',
		array(
			'priority'   => 130,
			'capability' => 'edit_theme_options',
			'title'      => esc_html__( 'Header', 'custom-theme' ),
		)
	);

	$wp_customize->add_section(
		'theme_header_settings',
		array(
			'title' => esc_html__( 'Header colors', 'custom-theme' ),
			'panel' => 'theme_header_settings',
		) 
	);

	$wp_customize->add_section(
		'theme_mobile_header_settings',
		array(
			'title' => esc_html__( 'Mobile header colors', 'custom-theme' ),
			'panel' => 'theme_header_settings',
		) 
	);

	/*  --- Header color ---  */

	$wp_customize->add_setting(
		'header_color',
		array(
			'default'           => $header_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_color',
			array(
				'label'    => esc_html__( 'Header color', 'custom-theme' ),
				'section'  => 'theme_header_settings',
				'settings' => 'header_color',
			)
		)
	);

	/*  --- Main menu link color ---  */

	$wp_customize->add_setting(
		'header_menu_color',
		array(
			'default'           => $header_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_menu_color',
			array(
				'label'    => esc_html__( 'Main menu link color', 'custom-theme' ),
				'section'  => 'theme_header_settings',
				'settings' => 'header_menu_color',
			)
		)
	);

	/*  --- Header mobile color ---  */

	$wp_customize->add_setting(
		'header_mobile_color',
		array(
			'default'           => $header_mobile_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_mobile_color',
			array(
				'label'    => esc_html__( 'Header mobile color', 'custom-theme' ),
				'section'  => 'theme_mobile_header_settings',
				'settings' => 'header_mobile_color',
			)
		)
	);

	$wp_customize->add_setting(
		'header_mobile_menu_color',
		array(
			'default'           => $header_mobile_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_mobile_menu_color',
			array(
				'label'    => esc_html__( 'Main menu mobile link color', 'custom-theme' ),
				'section'  => 'theme_mobile_header_settings',
				'settings' => 'header_mobile_menu_color',
			)
		)
	);

	/*  --- Main menu link hover color ---  */

	$wp_customize->add_setting(
		'header_hover_menu_color',
		array(
			'default'           => $header_hover_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_hover_menu_color',
			array(
				'label'    => esc_html__( 'Main menu link hover color', 'custom-theme' ),
				'section'  => 'theme_header_settings',
				'settings' => 'header_hover_menu_color',
			)
		)
	);

	$wp_customize->add_setting(
		'header_mobile_hover_menu_color',
		array(
			'default'           => $header_mobile_hover_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_mobile_hover_menu_color',
			array(
				'label'    => esc_html__( 'Main menu mobile link hover color', 'custom-theme' ),
				'section'  => 'theme_mobile_header_settings',
				'settings' => 'header_mobile_hover_menu_color',
			)
		)
	);

	/*  --- Main menu link hover color ---  */

	$wp_customize->add_setting(
		'header_mobile_hover_menu_background_color',
		array(
			'default'           => $header_mobile_hover_menu_background_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_mobile_hover_menu_background_color',
			array(
				'label'    => esc_html__( 'Main menu mobile link hover background color', 'custom-theme' ),
				'section'  => 'theme_mobile_header_settings',
				'settings' => 'header_mobile_hover_menu_background_color',
			)
		)
	);

	/*  --- Submenu background color ---  */

	$wp_customize->add_setting(
		'header_sub_menu_background_color',
		array(
			'default'           => $header_sub_menu_background_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_sub_menu_background_color',
			array(
				'label'    => esc_html__( 'Submenu background color', 'custom-theme' ),
				'section'  => 'theme_header_settings',
				'settings' => 'header_sub_menu_background_color',
			)
		)
	);

	$wp_customize->add_setting(
		'header_mobile_sub_menu_background_color',
		array(
			'default'           => $header_mobile_sub_menu_background_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_mobile_sub_menu_background_color',
			array(
				'label'    => esc_html__( 'Submenu mobile background color', 'custom-theme' ),
				'section'  => 'theme_mobile_header_settings',
				'settings' => 'header_mobile_sub_menu_background_color',
			)
		)
	);

	/*  --- Submenu link color ---  */

	$wp_customize->add_setting(
		'header_sub_menu_color',
		array(
			'default'           => $header_sub_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_sub_menu_color',
			array(
				'label'    => esc_html__( 'Submenu link color', 'custom-theme' ),
				'section'  => 'theme_header_settings',
				'settings' => 'header_sub_menu_color',
			)
		)
	);

	$wp_customize->add_setting(
		'header_mobile_sub_menu_color',
		array(
			'default'           => $header_mobile_sub_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_mobile_sub_menu_color',
			array(
				'label'    => esc_html__( 'Submenu mobile link color', 'custom-theme' ),
				'section'  => 'theme_mobile_header_settings',
				'settings' => 'header_mobile_sub_menu_color',
			)
		)
	);

	/*  --- Submenu link hover color ---  */

	$wp_customize->add_setting(
		'header_hover_sub_menu_color',
		array(
			'default'           => $header_hover_sub_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_hover_sub_menu_color',
			array(
				'label'    => esc_html__( 'Submenu link hover color', 'custom-theme' ),
				'section'  => 'theme_header_settings',
				'settings' => 'header_hover_sub_menu_color',
			)
		)
	);

	$wp_customize->add_setting(
		'header_mobile_hover_sub_menu_color',
		array(
			'default'           => $header_mobile_hover_sub_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_mobile_hover_sub_menu_color',
			array(
				'label'    => esc_html__( 'Submenu mobile link hover color', 'custom-theme' ),
				'section'  => 'theme_mobile_header_settings',
				'settings' => 'header_mobile_hover_sub_menu_color',
			)
		)
	);

	/*  --- Footer Settings ---  */

	$wp_customize->add_section(
		'theme_footer_settings',
		array(
			'title'    => esc_html__( 'Footer', 'custom-theme' ),
			'priority' => 140,
		) 
	);

	/*  --- Footer color ---  */

	$wp_customize->add_setting(
		'footer_color',
		array(
			'default'           => $footer_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_color',
			array(
				'label'    => esc_html__( 'Footer color', 'custom-theme' ),
				'section'  => 'theme_footer_settings',
				'settings' => 'footer_color',
			)
		)
	);

	$wp_customize->add_setting(
		'footer_content_color',
		array(
			'default'           => $footer_content_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_content_color',
			array(
				'label'    => esc_html__( 'Footer content color', 'custom-theme' ),
				'section'  => 'theme_footer_settings',
				'settings' => 'footer_content_color',
			)
		)
	);

	$wp_customize->add_setting(
		'footer_menu_color',
		array(
			'default'           => $footer_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_menu_color',
			array(
				'label'    => esc_html__( 'Footer menu link color', 'custom-theme' ),
				'section'  => 'theme_footer_settings',
				'settings' => 'footer_menu_color',
			)
		)
	);

	$wp_customize->add_setting(
		'footer_hover_menu_color',
		array(
			'default'           => $footer_hover_menu_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_hover_menu_color',
			array(
				'label'    => esc_html__( 'Footer menu link hover color', 'custom-theme' ),
				'section'  => 'theme_footer_settings',
				'settings' => 'footer_hover_menu_color',
			)
		)
	);

	/*  --- Footer description ---  */

	$wp_customize->add_setting(
		'footer_description',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		) 
	);
	
		$wp_customize->add_control(
			'footer_description',
			array(
				'type'        => 'textarea',
				'section'     => 'theme_footer_settings',
				'label'       => esc_html__( 'Footer Description', 'custom-theme' ),
				'description' => esc_html__( 'Add your description to the footer.', 'custom-theme' ),
			) 
		);

	/*  --- Theme Settings ---  */

	$wp_customize->add_panel(
		'theme_settings',
		array(
			'priority'   => 150,
			'capability' => 'edit_theme_options',
			'title'      => esc_html__( 'Theme settings', 'custom-theme' ),
		)
	);

	/*  --- Table colors ---  */

	$wp_customize->add_section(
		'theme_settings_table_colors',
		array(
			'title' => esc_html__( 'Table colors', 'custom-theme' ),
			'panel' => 'theme_settings',
		) 
	);

	/*  --- Table color ---  */

	$wp_customize->add_setting(
		'table_color',
		array(
			'default'           => $table_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'table_color',
			array(
				'label'    => esc_html__( 'Table background color', 'custom-theme' ),
				'section'  => 'theme_settings_table_colors',
				'settings' => 'table_color',
			)
		)
	);

	$wp_customize->add_setting(
		'table_border_color',
		array(
			'default'           => $table_border_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'table_border_color',
			array(
				'label'    => esc_html__( 'Table border color', 'custom-theme' ),
				'section'  => 'theme_settings_table_colors',
				'settings' => 'table_border_color',
			)
		)
	);


	$wp_customize->add_setting(
		'table_th_color',
		array(
			'default'           => $table_th_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'table_th_color',
			array(
				'label'    => esc_html__( 'Table header background color', 'custom-theme' ),
				'section'  => 'theme_settings_table_colors',
				'settings' => 'table_th_color',
			)
		)
	);

	$wp_customize->add_setting(
		'table_th_content_color',
		array(
			'default'           => $table_th_content_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'table_th_content_color',
			array(
				'label'    => esc_html__( 'Table header text color', 'custom-theme' ),
				'section'  => 'theme_settings_table_colors',
				'settings' => 'table_th_content_color',
			)
		)
	);

	$wp_customize->add_setting(
		'table_content_color',
		array(
			'default'           => $table_content_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'table_content_color',
			array(
				'label'    => esc_html__( 'Table body text color', 'custom-theme' ),
				'section'  => 'theme_settings_table_colors',
				'settings' => 'table_content_color',
			)
		)
	);
}
add_action( 'customize_register', 'theme_customizer_setting' );

function theme_customizer_style_settings() {
	if ( ! $primary_custom_color = get_theme_mod( 'primary_color' ) ) {
		$primary_custom_color = '#17946d';
	} else {
		$primary_custom_color = get_theme_mod( 'primary_color' );
	}

	if ( ! $secondary_custom_color = get_theme_mod( 'secondary_color' ) ) {
		$secondary_custom_color = '#f9b002';
	} else {
		$secondary_custom_color = get_theme_mod( 'secondary_color' );
	}

	if ( ! $links_custom_color = get_theme_mod( 'links_color' ) ) {
		$links_custom_color = '#d63031';
	} else {
		$links_custom_color = get_theme_mod( 'links_color' );
	}

	if ( ! $links_custom_hover_color = get_theme_mod( 'links_hover_color' ) ) {
		$links_custom_hover_color = '#d63031';
	} else {
		$links_custom_hover_color = get_theme_mod( 'links_hover_color' );
	}

	if ( ! $body_custom_color = get_theme_mod( 'body_color' ) ) {
		$body_custom_color = '#4e4e4e';
	} else {
		$body_custom_color = get_theme_mod( 'body_color' );
	}

	if ( ! $body_custom_content_color = get_theme_mod( 'body_content_color' ) ) {
		$body_custom_content_color = '#fff';
	} else {
		$body_custom_content_color = get_theme_mod( 'body_content_color' );
	}

	if ( ! $header_custom_color = get_theme_mod( 'header_color' ) ) {
		$header_custom_color = '#17946d';
	} else {
		$header_custom_color = get_theme_mod( 'header_color' );
	}

	if ( ! $header_custom_menu_color = get_theme_mod( 'header_menu_color' ) ) {
		$header_custom_menu_color = '#fff';
	} else {
		$header_custom_menu_color = get_theme_mod( 'header_menu_color' );
	}

	if ( ! $header_custom_mobile_menu_color = get_theme_mod( 'header_mobile_menu_color' ) ) {
		$header_custom_mobile_menu_color = '#fff';
	} else {
		$header_custom_mobile_menu_color = get_theme_mod( 'header_mobile_menu_color' );
	}

	if ( ! $header_custom_hover_menu_color = get_theme_mod( 'header_hover_menu_color' ) ) {
		$header_custom_hover_menu_color = '#2e3246';
	} else {
		$header_custom_hover_menu_color = get_theme_mod( 'header_hover_menu_color' );
	}

	if ( ! $header_custom_mobile_hover_menu_color = get_theme_mod( 'header_mobile_hover_menu_color' ) ) {
		$header_custom_mobile_hover_menu_color = '#2e3246';
	} else {
		$header_custom_mobile_hover_menu_color = get_theme_mod( 'header_mobile_hover_menu_color' );
	}

	if ( ! $header_custom_mobile_hover_menu_background_color = get_theme_mod( 'header_mobile_hover_menu_background_color' ) ) {
		$header_custom_mobile_hover_menu_background_color = '#fff';
	} else {
		$header_custom_mobile_hover_menu_background_color = get_theme_mod( 'header_mobile_hover_menu_background_color' );
	}

	if ( ! $header_custom_sub_menu_background_color = get_theme_mod( 'header_sub_menu_background_color' ) ) {
		$header_custom_sub_menu_background_color = '#fff';
	} else {
		$header_custom_sub_menu_background_color = get_theme_mod( 'header_sub_menu_background_color' );
	}

	if ( ! $header_custom_mobile_sub_menu_background_color = get_theme_mod( 'header_mobile_sub_menu_background_color' ) ) {
		$header_custom_mobile_sub_menu_background_color = '#fff';
	} else {
		$header_custom_mobile_sub_menu_background_color = get_theme_mod( 'header_mobile_sub_menu_background_color' );
	}

	if ( ! $header_custom_sub_menu_color = get_theme_mod( 'header_sub_menu_color' ) ) {
		$header_custom_sub_menu_color = '#121212';
	} else {
		$header_custom_sub_menu_color = get_theme_mod( 'header_sub_menu_color' );
	}

	if ( ! $header_custom_mobile_sub_menu_color = get_theme_mod( 'header_mobile_sub_menu_color' ) ) {
		$header_custom_mobile_sub_menu_color = '#121212';
	} else {
		$header_custom_mobile_sub_menu_color = get_theme_mod( 'header_mobile_sub_menu_color' );
	}

	if ( ! $header_custom_hover_sub_menu_color = get_theme_mod( 'header_hover_sub_menu_color' ) ) {
		$header_custom_hover_sub_menu_color = '#2e3246';
	} else {
		$header_custom_hover_sub_menu_color = get_theme_mod( 'header_hover_sub_menu_color' );
	}

	if ( ! $header_custom_mobile_hover_sub_menu_color = get_theme_mod( 'header_mobile_hover_sub_menu_color' ) ) {
		$header_custom_mobile_hover_sub_menu_color = '#2e3246';
	} else {
		$header_custom_mobile_hover_sub_menu_color = get_theme_mod( 'header_mobile_hover_sub_menu_color' );
	}

	if ( ! $header_custom_mobile_color = get_theme_mod( 'header_mobile_color' ) ) {
		$header_custom_mobile_color = '#17946d';
	} else {
		$header_custom_mobile_color = get_theme_mod( 'header_mobile_color' );
	}

	if ( ! $footer_custom_color = get_theme_mod( 'footer_color' ) ) {
		$footer_custom_color = '#353535';
	} else {
		$footer_custom_color = get_theme_mod( 'footer_color' );
	}

	if ( ! $footer_custom_content_color = get_theme_mod( 'footer_content_color' ) ) {
		$footer_custom_content_color = '#fff';
	} else {
		$footer_custom_content_color = get_theme_mod( 'footer_content_color' );
	}

	if ( ! $footer_custom_menu_color = get_theme_mod( 'footer_menu_color' ) ) {
		$footer_custom_menu_color = '#fff';
	} else {
		$footer_custom_menu_color = get_theme_mod( 'footer_menu_color' );
	}

	if ( ! $footer_custom_hover_menu_color = get_theme_mod( 'footer_hover_menu_color' ) ) {
		$footer_custom_hover_menu_color = '#fff';
	} else {
		$footer_custom_hover_menu_color = get_theme_mod( 'footer_hover_menu_color' );
	}

	if ( ! $table_custom_color = get_theme_mod( 'table_color' ) ) {
		$table_custom_color = '#3e7966';
	} else {
		$table_custom_color = get_theme_mod( 'table_color' );
	}

	if ( ! $table_custom_border_color = get_theme_mod( 'table_border_color' ) ) {
		$table_custom_border_color = '#3e7966';
	} else {
		$table_custom_border_color = get_theme_mod( 'table_border_color' );
	}

	if ( ! $table_custom_th_color = get_theme_mod( 'table_th_color' ) ) {
		$table_custom_th_color = '#0e5a43';
	} else {
		$table_custom_th_color = get_theme_mod( 'table_th_color' );
	}

	if ( ! $table_custom_th_content_color = get_theme_mod( 'table_th_content_color' ) ) {
		$table_custom_th_content_color = '#fff';
	} else {
		$table_custom_th_content_color = get_theme_mod( 'table_th_content_color' );
	}

	if ( ! $table_custom_content_color = get_theme_mod( 'table_content_color' ) ) {
		$table_custom_content_color = '#fff';
	} else {
		$table_custom_content_color = get_theme_mod( 'table_content_color' );
	}

	if ( ! $is_priority_theme_primary_color = get_theme_mod( 'is_priority_theme_primary_color' ) ) {
		$is_priority_theme_primary_color = false;
	} else {
		$is_priority_theme_primary_color = get_theme_mod( 'is_priority_theme_primary_color' );
	}

	$custom_css = '
		body {
			background-color: ' . esc_attr( $body_custom_color ) . ';
		}

		body,
		#back-to-top,
		#fixed-button {
			color: ' . esc_attr( $body_custom_content_color ) . ';
		}

		header {
			background-color: ' . esc_attr( $header_custom_color ) . ';
		}

		.main-menu-link {
			color: ' . esc_attr( $header_custom_mobile_menu_color ) . ';
		}

		.main-menu-link:hover,
		.dropdown-toggle:hover {
			color: ' . esc_attr( $header_custom_mobile_hover_menu_color ) . ';
		}

		header .menu-link:hover {
			background-color: ' . esc_attr( $header_custom_mobile_hover_menu_background_color ) . ';
		}

		.dropdown-menu-lang {
			background-color: ' . esc_attr( $header_custom_mobile_sub_menu_background_color ) . ';
		}

		.sub-menu-link {
			color: ' . esc_attr( $header_custom_mobile_sub_menu_color ) . ';
		}

		.sub-menu-link:hover {
			color: ' . esc_attr( $header_custom_mobile_hover_sub_menu_color ) . ';
		}

		.mobile-menu-wrapper {
			background-color: ' . esc_attr( $header_custom_mobile_color ) . ';
		}

		footer {
			background-color: ' . esc_attr( $footer_custom_color ) . ';
			color: ' . esc_attr( $footer_custom_content_color ) . ';
		}

		footer a {
			color: ' . esc_attr( $footer_custom_menu_color ) . ';
		}

		footer a:hover {
			color: ' . esc_attr( $footer_custom_hover_menu_color ) . ';
		}

		.theme-main-content ul li::before,
		.button-login,
		.author-read-link,
		.comment-submit,
		input[type=checkbox]:checked ~ .switcher,
		#back-to-top {
			background-color: ' . esc_attr( $primary_custom_color ) . ' !important;
		}

		.comment-list .comment .comment-wrapper {
			border-color: ' . esc_attr( $primary_custom_color ) . ';
		}

		.comment-list .comment .comment-wrapper .comment-author {
			color: ' . esc_attr( $primary_custom_color ) . ';
		}

		.button-sign-up,
		#fixed-button {
			background-color: ' . esc_attr( $secondary_custom_color ) . ' !important;
		}

		main a:not(.ez-toc-link) {
			color: ' . esc_attr( $links_custom_color ) . ' !important;
		}

		main a:not(.ez-toc-link):hover {
			color: ' . esc_attr( $links_custom_hover_color ) . ' !important;
		}

		.wp-block-table table {
			border-color: ' . esc_attr( $table_custom_border_color ) . ';
			background-color: ' . esc_attr( $table_custom_color ) . ';
		}

		.wp-block-table table th {
			border-color: ' . esc_attr( $table_custom_border_color ) . ';
			color: ' . esc_attr( $table_custom_th_content_color ) . ';
			background-color: ' . esc_attr( $table_custom_th_color ) . ';
		}

		.wp-block-table table td {
			border-color: ' . esc_attr( $table_custom_border_color ) . ';
			color: ' . esc_attr( $table_custom_content_color ) . ';
		}

		.wp-block-table table td,
		.wp-block-table table tr td {
			border-right: 1px solid ' . esc_attr( $table_custom_th_color ) . ';
			border-bottom: 1px solid ' . esc_attr( $table_custom_th_color ) . ';
		}

		@media (min-width: 1280px) {
			.main-menu-link {
				color: ' . esc_attr( $header_custom_menu_color ) . ';
			}

			.dropdown-menu {
				background-color: ' . esc_attr( $header_custom_sub_menu_background_color ) . ';
			}

			.sub-menu-link {
				color: ' . esc_attr( $header_custom_sub_menu_color ) . ';
			}

			.main-menu-link:hover,
			.dropdown-toggle:hover {
				color: ' . esc_attr( $header_custom_hover_menu_color ) . ';
			}

			header .menu-link:hover {
				background-color: transparent;
			}

			.sub-menu-link:hover {
				color: ' . esc_attr( $header_custom_hover_sub_menu_color ) . ';
			}
		}
	';

	if ( $is_priority_theme_primary_color ) {
		$primary_custom_grizzly_color   = 'rgb(' . esc_attr( join( ' ', sscanf( $primary_custom_color, '#%02x%02x%02x' ) ) ) . ' / 50%)';
		$primary_custom_light_color     = 'rgb(' . esc_attr( join( ' ', sscanf( $primary_custom_color, '#%02x%02x%02x' ) ) ) . ' / 25%)';
		$primary_custom_brightest_color = 'rgb(' . esc_attr( join( ' ', sscanf( $primary_custom_color, '#%02x%02x%02x' ) ) ) . ' / 10%)';

		$custom_css .= '
			.wp-custom-blocks-questions .question {
				border-color: ' . esc_attr( $primary_custom_light_color ) . ' !important;
			}

			.wp-custom-blocks-questions .question.active,
			.wp-custom-blocks-questions .question:hover {
				background-color: ' . $primary_custom_brightest_color . ' !important;
			}

			.wp-custom-blocks-questions .question .more-arrow.active {
				background-color: ' . esc_attr( $primary_custom_color ) . ' !important;
			}

			.wp-custom-blocks-cards .item-card button {
				background-color: ' . esc_attr( $primary_custom_color ) . ' !important;
			}

			.wp-custom-blocks-steps .step .line,
			.wp-custom-blocks-steps .step .number {
				background-color: ' . esc_attr( $primary_custom_color ) . ' !important;
			}

			.wp-custom-blocks-steps .step .description {
				border-color: ' . $primary_custom_grizzly_color . ' !important;
			}

			.wp-custom-blocks-banner {
				border-color: ' . $primary_custom_grizzly_color . ' !important;
			}

			.wp-custom-blocks-banner .bonus-button {
				background-color: ' . esc_attr( $primary_custom_color ) . ' !important;
			}

			.wp-custom-blocks-banner .domain {
				color: ' . esc_attr( $primary_custom_color ) . ' !important;
			}

			.wp-custom-blocks-banner .payment {
				background-color: ' . $primary_custom_brightest_color . ' !important;
			}

			.wp-custom-blocks-author {
				background-color: ' . esc_attr( $primary_custom_color ) . ' !important;
			}

			.wp-custom-blocks-bonuses .link-button {
				background-color: ' . esc_attr( $secondary_custom_color ) . ' !important;
			}
	
			.wp-custom-blocks-bonuses .bonus .title {
				color: ' . esc_attr( $secondary_custom_color ) . ' !important;
			}
	
			.wp-custom-blocks-bonuses .bonus .bonus-button {
				background-color: ' . esc_attr( $secondary_custom_color ) . ' !important;
			}
		';
	}

	$key = 'page-style-custom';

	wp_register_style( $key, false, array(), true, true );
	wp_add_inline_style( $key, $custom_css );
	wp_enqueue_style( $key );
}
add_action( 'wp_enqueue_scripts', 'theme_customizer_style_settings' );
