<?php

function theme_customizer_setting( $wp_customize ) {
	$primary_color   = ! empty( $_ENV['PRIMARY_COLOR'] ) ? $_ENV['PRIMARY_COLOR'] : '#1fb1c1';
	$secondary_color = ! empty( $_ENV['SECONDARY_COLOR'] ) ? $_ENV['SECONDARY_COLOR'] : '#ff8d3f';
	
	$primary_text_color = ! empty( $_ENV['PRIMARY_TEXT_COLOR'] ) ? $_ENV['PRIMARY_TEXT_COLOR'] : '#324b4f';

	$border_color = ! empty( $_ENV['PRIMARY_COLOR'] ) ? $_ENV['PRIMARY_COLOR'] : '#1fb1c1';
	
	$buttons_content_color = ! empty( $_ENV['BUTTONS_CONTENT_COLOR'] ) ? $_ENV['BUTTONS_CONTENT_COLOR'] : '#fff';
	
	$body_color         = ! empty( $_ENV['BODY_COLOR'] ) ? $_ENV['BODY_COLOR'] : '#fff';
	$body_content_color = ! empty( $_ENV['BODY_CONTENT_COLOR'] ) ? $_ENV['BODY_CONTENT_COLOR'] : '#000';
	
	$header_color                           = ! empty( $_ENV['HEADER_COLOR'] ) ? $_ENV['HEADER_COLOR'] : '#1fb1c1';
	$header_menu_color                      = ! empty( $_ENV['HEADER_MENU_LINK_COLOR'] ) ? $_ENV['HEADER_MENU_LINK_COLOR'] : '#fff';
	$header_sub_menu_background_color       = ! empty( $_ENV['HEADER_SUBMENU_COLOR'] ) ? $_ENV['HEADER_SUBMENU_COLOR'] : '#e6f4f1';
	$header_hover_sub_menu_background_color = ! empty( $_ENV['HEADER_SUBMENU_HOVER_COLOR'] ) ? $_ENV['HEADER_SUBMENU_HOVER_COLOR'] : '#1ca5b4';
	$header_sub_menu_color                  = ! empty( $_ENV['HEADER_SUBMENU_LINK_COLOR'] ) ? $_ENV['HEADER_SUBMENU_LINK_COLOR'] : '#121212';
	$header_hover_sub_menu_color            = ! empty( $_ENV['HEADER_SUBMENU_LINK_HOVER_COLOR'] ) ? $_ENV['HEADER_SUBMENU_LINK_HOVER_COLOR'] : '#fff';

	$header_mobile_color          = ! empty( $_ENV['HEADER_MOBILE_COLOR'] ) ? $_ENV['HEADER_MOBILE_COLOR'] : '#fff';
	$header_mobile_menu_color     = ! empty( $_ENV['HEADER_MOBILE_MENU_LINK_COLOR'] ) ? $_ENV['HEADER_MOBILE_MENU_LINK_COLOR'] : '#1fb1c1';
	$header_mobile_sub_menu_color = ! empty( $_ENV['HEADER_MOBILE_SUBMENU_LINK_COLOR'] ) ? $_ENV['HEADER_MOBILE_SUBMENU_LINK_COLOR'] : '#324b4f';

	$footer_color            = ! empty( $_ENV['FOOTER_COLOR'] ) ? $_ENV['FOOTER_COLOR'] : '#106c77';
	$footer_content_color    = ! empty( $_ENV['FOOTER_CONTENT_COLOR'] ) ? $_ENV['FOOTER_CONTENT_COLOR'] : '#fff';
	$footer_menu_color       = ! empty( $_ENV['FOOTER_MENU_LINK_COLOR'] ) ? $_ENV['FOOTER_MENU_LINK_COLOR'] : '#fff';
	$footer_hover_menu_color = ! empty( $_ENV['FOOTER_MENU_LINK_HOVER_COLOR'] ) ? $_ENV['FOOTER_MENU_LINK_HOVER_COLOR'] : '#fff';

	$table_odd_color        = ! empty( $_ENV['TABLE_COLOR'] ) ? $_ENV['TABLE_COLOR'] : '#3e7966';
	$table_even_color       = ! empty( $_ENV['TABLE_COLOR'] ) ? $_ENV['TABLE_COLOR'] : '#3e7966';
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

	$wp_customize->add_setting(
		'primary_text_color',
		array(
			'default'           => $primary_text_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_text_color',
			array(
				'label'    => esc_html__( 'Primary text color', 'custom-theme' ),
				'section'  => 'colors',
				'settings' => 'primary_text_color',
			)
		)
	);

	/*  --- Border color ---  */

	$wp_customize->add_setting(
		'border_color',
		array(
			'default'           => $border_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'border_color',
			array(
				'label'    => esc_html__( 'Border color', 'custom-theme' ),
				'section'  => 'colors',
				'settings' => 'border_color',
			)
		)
	);

	/*  --- Buttons content color ---  */

	$wp_customize->add_setting(
		'buttons_content_color',
		array(
			'default'           => $buttons_content_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buttons_content_color',
			array(
				'label'    => esc_html__( 'Buttons content color', 'custom-theme' ),
				'section'  => 'colors',
				'settings' => 'buttons_content_color',
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

	/*  --- Submenu hover colors ---  */

	$wp_customize->add_setting(
		'header_hover_sub_menu_background_color',
		array(
			'default'           => $header_hover_sub_menu_background_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_hover_sub_menu_background_color',
			array(
				'label'    => esc_html__( 'Submenu hover background color', 'custom-theme' ),
				'section'  => 'theme_header_settings',
				'settings' => 'header_hover_sub_menu_background_color',
			)
		)
	);

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

	/*  --- Theme Settings ---  */

	$wp_customize->add_panel(
		'theme_settings',
		array(
			'priority'   => 150,
			'capability' => 'edit_theme_options',
			'title'      => esc_html__( 'Theme settings', 'custom-theme' ),
		)
	);

	/*  --- Table settings ---  */

	$wp_customize->add_section(
		'theme_settings_table_settings',
		array(
			'title' => esc_html__( 'Table settings', 'custom-theme' ),
			'panel' => 'theme_settings',
		) 
	);

	/*  --- Table color ---  */

	$wp_customize->add_setting(
		'table_odd_color',
		array(
			'default'           => $table_odd_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'table_odd_color',
			array(
				'label'    => esc_html__( 'Table background odd rows color', 'custom-theme' ),
				'section'  => 'theme_settings_table_settings',
				'settings' => 'table_odd_color',
			)
		)
	);

	$wp_customize->add_setting(
		'table_even_color',
		array(
			'default'           => $table_even_color,
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'table_even_color',
			array(
				'label'    => esc_html__( 'Table background even rows color', 'custom-theme' ),
				'section'  => 'theme_settings_table_settings',
				'settings' => 'table_even_color',
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
				'section'  => 'theme_settings_table_settings',
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
				'section'  => 'theme_settings_table_settings',
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
				'section'  => 'theme_settings_table_settings',
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
				'section'  => 'theme_settings_table_settings',
				'settings' => 'table_content_color',
			)
		)
	);

	/*  --- Table border radius ---  */

	$wp_customize->add_setting(
		'table_border_radius',
		array(
			'default'   => 0,
			'transport' => 'postMessage',
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'table_border_radius',
			array(
				'label'   => esc_html__( 'Table border radius', 'custom-theme' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'section' => 'theme_settings_table_settings',
			) 
		) 
	);

	/*  --- Modal settings ---  */

	$wp_customize->add_section(
		'theme_settings_form_modal',
		array(
			'title' => esc_html__( 'Form modal settings', 'custom-theme' ),
			'panel' => 'theme_settings',
		) 
	);

	/*  --- Modal form shortcode ---  */

	$wp_customize->add_setting(
		'modal_form_shortcode',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
		) 
	);
	
	$wp_customize->add_control(
		'modal_form_shortcode',
		array(
			'type'    => 'text',
			'section' => 'theme_settings_form_modal',
			'label'   => esc_html__( 'Modal form shortcode', 'custom-theme' ),
		) 
	);

	/*  --- Modal title ---  */

	$wp_customize->add_setting(
		'modal_title',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
		) 
	);
	
	$wp_customize->add_control(
		'modal_title',
		array(
			'type'    => 'textarea',
			'section' => 'theme_settings_form_modal',
			'label'   => esc_html__( 'Modal title', 'custom-theme' ),
		) 
	);


	$wp_customize->add_setting(
		'modal_success_text',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
		) 
	);
	
	$wp_customize->add_control(
		'modal_success_text',
		array(
			'type'    => 'textarea',
			'section' => 'theme_settings_form_modal',
			'label'   => esc_html__( 'Modal success text', 'custom-theme' ),
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
		$secondary_custom_color = '#ff8d3f';
	} else {
		$secondary_custom_color = get_theme_mod( 'secondary_color' );
	}

	if ( ! $primary_text_custom_color = get_theme_mod( 'primary_text_color' ) ) {
		$primary_text_custom_color = '#324b4f';
	} else {
		$primary_text_custom_color = get_theme_mod( 'primary_text_color' );
	}

	if ( ! $border_custom_color = get_theme_mod( 'border_color' ) ) {
		$border_custom_color = '#1fb1c1';
	} else {
		$border_custom_color = get_theme_mod( 'border_color' );
	}

	if ( ! $buttons_custom_content_color = get_theme_mod( 'buttons_content_color' ) ) {
		$buttons_custom_content_color = '#fff';
	} else {
		$buttons_custom_content_color = get_theme_mod( 'buttons_content_color' );
	}

	if ( ! $body_custom_color = get_theme_mod( 'body_color' ) ) {
		$body_custom_color = '#fff';
	} else {
		$body_custom_color = get_theme_mod( 'body_color' );
	}

	if ( ! $body_custom_content_color = get_theme_mod( 'body_content_color' ) ) {
		$body_custom_content_color = '#000';
	} else {
		$body_custom_content_color = get_theme_mod( 'body_content_color' );
	}

	if ( ! $header_custom_color = get_theme_mod( 'header_color' ) ) {
		$header_custom_color = '#1fb1c1';
	} else {
		$header_custom_color = get_theme_mod( 'header_color' );
	}

	if ( ! $header_custom_menu_color = get_theme_mod( 'header_menu_color' ) ) {
		$header_custom_menu_color = '#fff';
	} else {
		$header_custom_menu_color = get_theme_mod( 'header_menu_color' );
	}

	if ( ! $header_custom_mobile_menu_color = get_theme_mod( 'header_mobile_menu_color' ) ) {
		$header_custom_mobile_menu_color = '#1fb1c1';
	} else {
		$header_custom_mobile_menu_color = get_theme_mod( 'header_mobile_menu_color' );
	}

	if ( ! $header_custom_sub_menu_background_color = get_theme_mod( 'header_sub_menu_background_color' ) ) {
		$header_custom_sub_menu_background_color = '#e6f4f1';
	} else {
		$header_custom_sub_menu_background_color = get_theme_mod( 'header_sub_menu_background_color' );
	}

	if ( ! $header_custom_hover_sub_menu_background_color = get_theme_mod( 'header_hover_sub_menu_background_color' ) ) {
		$header_custom_hover_sub_menu_background_color = '#1ca5b4';
	} else {
		$header_custom_hover_sub_menu_background_color = get_theme_mod( 'header_hover_sub_menu_background_color' );
	}

	if ( ! $header_custom_sub_menu_color = get_theme_mod( 'header_sub_menu_color' ) ) {
		$header_custom_sub_menu_color = '#121212';
	} else {
		$header_custom_sub_menu_color = get_theme_mod( 'header_sub_menu_color' );
	}

	if ( ! $header_custom_mobile_sub_menu_color = get_theme_mod( 'header_mobile_sub_menu_color' ) ) {
		$header_custom_mobile_sub_menu_color = '#324b4f';
	} else {
		$header_custom_mobile_sub_menu_color = get_theme_mod( 'header_mobile_sub_menu_color' );
	}

	if ( ! $header_custom_hover_sub_menu_color = get_theme_mod( 'header_hover_sub_menu_color' ) ) {
		$header_custom_hover_sub_menu_color = '#fff';
	} else {
		$header_custom_hover_sub_menu_color = get_theme_mod( 'header_hover_sub_menu_color' );
	}

	if ( ! $header_custom_mobile_color = get_theme_mod( 'header_mobile_color' ) ) {
		$header_custom_mobile_color = '#fff';
	} else {
		$header_custom_mobile_color = get_theme_mod( 'header_mobile_color' );
	}

	if ( ! $footer_custom_color = get_theme_mod( 'footer_color' ) ) {
		$footer_custom_color = '#106c77';
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

	if ( ! $table_custom_odd_color = get_theme_mod( 'table_odd_color' ) ) {
		$table_custom_odd_color = '#3e7966';
	} else {
		$table_custom_odd_color = get_theme_mod( 'table_odd_color' );
	}

	if ( ! $table_custom_even_color = get_theme_mod( 'table_even_color' ) ) {
		$table_custom_even_color = '#3e7966';
	} else {
		$table_custom_even_color = get_theme_mod( 'table_even_color' );
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

	if ( ! $table_custom_border_radius = get_theme_mod( 'table_border_radius' ) ) {
		$table_custom_border_radius = 0;
	} else {
		$table_custom_border_radius = get_theme_mod( 'table_border_radius' );
	}

	if ( ! $is_priority_theme_primary_color = get_theme_mod( 'is_priority_theme_primary_color' ) ) {
		$is_priority_theme_primary_color = false;
	} else {
		$is_priority_theme_primary_color = get_theme_mod( 'is_priority_theme_primary_color' );
	}

	$custom_css = '
		body.theme-body,
		.editor-styles-wrapper {
			background-color: ' . esc_attr( $body_custom_color ) . ';
			color: ' . esc_attr( $body_custom_content_color ) . ';
		}

		header,
		.header-base {
			background-color: ' . esc_attr( $header_custom_color ) . ';
		}

		.main-menu-link {
			color: ' . esc_attr( $header_custom_mobile_menu_color ) . ';
		}

		.sub-menu-link {
			color: ' . esc_attr( $header_custom_mobile_sub_menu_color ) . ';
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

		.main-border,
		.outline-button,
		.divide-primary>:not([hidden])~:not([hidden]),
		.wpcf7-form input[type="text"],
		.wpcf7-form input[type="email"],
		.wpcf7-form input[type="tel"],
		.wpcf7-form input[type="radio"],
	    .wpcf7-form input[type="checkbox"] {
			border-color: ' . esc_attr( $border_custom_color ) . ' !important;
		}

		.main-button {
			background-color: ' . esc_attr( $secondary_custom_color ) . ' !important;
		}

		.main-link,
		.mobile-email,
		.card-color,
		.search-submit,
		.document-link,
		.services-list,
		.service .title-block,
		.wpcf7-form input[type="radio"],
	    .wpcf7-form input[type="checkbox"] {
			color: ' . esc_attr( $primary_custom_color ) . ';
		}

		.news-block:hover,
		.search-card:hover,
		.services-wrapper,
		.lecturer-card,
		.accessibility-button {
			background-color: ' . esc_attr( $primary_custom_color ) . ';
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		h1 a,
		h2 a,
		h3 a,
		h4 a,
		h5 a,
		h6 a,
		.card-date,
		.modal-title,
		.search-input,
		.content-text,
		.search-not-found,
		.wpcf7-form input[type="text"],
		.wpcf7-form input[type="email"],
		.wpcf7-form input[type="tel"],
		.wpcf7-form span.wpcf7-list-item,
		.wpcf7-form span.wpcf7-list-item label {
			color: ' . esc_attr( $primary_text_custom_color ) . ';
		}

		.main-button,
		.main-button a,
		.main-button span,
		.secondary-button,
		.secondary-button a,
		.secondary-button span,
		.outline-button.active,
		.outline-button.active a,
		.outline-button.active span {
			color: ' . esc_attr( $buttons_custom_content_color ) . ' !important;
		}

		.outline-button {
			color: ' . esc_attr( $border_custom_color ) . ';
		}

		.outline-button.active {
			background-color: ' . esc_attr( $border_custom_color ) . ';
		}

		.wp-block-table table {
			border-collapse: separate;
			border-spacing: 0;
		}

		.wp-block-table table tbody tr:nth-child(odd) > * {
			background-color: ' . esc_attr( $table_custom_odd_color ) . ';
		}

		.wp-block-table table tbody tr:nth-child(even) > * {
			background-color: ' . esc_attr( $table_custom_even_color ) . ';
		}

		.wp-block-table table th {
			color: ' . esc_attr( $table_custom_th_content_color ) . ';
			background-color: ' . esc_attr( $table_custom_th_color ) . ';
		}

		.wp-block-table table td {
			color: ' . esc_attr( $table_custom_content_color ) . ';
			border-right: 1px solid ' . esc_attr( $table_custom_th_color ) . ';
			border-bottom: 1px solid ' . esc_attr( $table_custom_th_color ) . ';
		}

		.wp-block-table table tr th,
		.wp-block-table table tr td {
			border-right: 1px solid ' . esc_attr( $table_custom_border_color ) . ';
			border-bottom: 1px solid ' . esc_attr( $table_custom_border_color ) . ';
			border-color: ' . esc_attr( $table_custom_border_color ) . ';
		}

		.wp-block-table table tr th:first-child,
		.wp-block-table table tr td:first-child {
			border-left: 1px solid ' . esc_attr( $table_custom_border_color ) . ';
		}

		.wp-block-table table tr th {
			border-top: 1px solid ' . esc_attr( $table_custom_border_color ) . ';
			border-color: ' . esc_attr( $table_custom_border_color ) . ';
		}

		.wp-block-table table tr:first-child th:first-child {
			border-top-left-radius: ' . esc_attr( $table_custom_border_radius ) . 'px;
		}

		.wp-block-table table tr:first-child th:last-child {
			border-top-right-radius: ' . esc_attr( $table_custom_border_radius ) . 'px;
		}

		.wp-block-table table tr:last-child td:first-child {
			border-bottom-left-radius: ' . esc_attr( $table_custom_border_radius ) . 'px;
		}

		.wp-block-table table tr:last-child td:last-child {
			border-bottom-right-radius: ' . esc_attr( $table_custom_border_radius ) . 'px;
		}

		@media (min-width: 1280px) {
			.main-menu-link {
				color: ' . esc_attr( $header_custom_menu_color ) . ';
			}

			.dropdown-menu {
				background-color: ' . esc_attr( $header_custom_sub_menu_background_color ) . ';
			}

			.sub-menu-link {
				color: ' . esc_attr( $header_custom_sub_menu_color ) . ' !important;
			}

			.sub-menu-link:hover {
				color: ' . esc_attr( $header_custom_hover_sub_menu_color ) . ' !important;
				background-color: ' . esc_attr( $header_custom_hover_sub_menu_background_color ) . ' !important;
			}
		}
	';

	if ( $is_priority_theme_primary_color ) {
		$custom_css .= '
			.wp-custom-blocks-button button {
				background-color: ' . esc_attr( $primary_custom_color ) . ' !important;
			}
		';
	}

	$key = 'page-style-custom';

	wp_register_style( $key, false, array(), true, true );
	wp_add_inline_style( $key, $custom_css );
	wp_enqueue_style( $key );
}
add_action( 'wp_enqueue_scripts', 'theme_customizer_style_settings' );
add_action( 'enqueue_block_editor_assets', 'theme_customizer_style_settings' );
