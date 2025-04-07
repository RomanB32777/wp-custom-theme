<?php 

/*  Registration settings - Start  */

function registration_settings_init() {

	/*  Registration settings tab - Start  */

	/*  --- The setting sections ---  */

	add_settings_section(
		'registration_tab_titles',
		esc_html__( 'Titles', 'custom-theme' ),
		'custom_tab_titles_callback',
		'registration_tab'
	);

	add_settings_section(
		'registration_tab_slugs',
		esc_html__( 'Slugs', 'custom-theme' ),
		'custom_tab_slugs_callback',
		'registration_tab'
	);

	add_settings_section(
		'registration_tab_other_settings',
		esc_html__( 'Other settings', 'custom-theme' ),
		'registration_tab_other_settings_callback',
		'registration_tab'
	);

	/*  --- Descriptions ---  */

	function registration_tab_other_settings_callback( $args ) {
		?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>">
			<?php esc_html_e( 'Other settings for registration.', 'custom-theme' ); ?>
		</p>
			<?php
	}

	/*
	----------------
	Title setting fields
	----------------  */

	/*  --- "Registration" section title ---  */

	add_settings_field(
		'registration_section_name',
		esc_html__( 'The title of the &quot;Registration&quot; custom post type', 'custom-theme' ),
		'custom_textfield_name_callback',
		'registration_tab',
		'registration_tab_titles',
		array(
			'id'          => 'registration_section_name', 
			'option_name' => 'registration_section_name',
		)  
	);
	register_setting( 'registration_tab', 'registration_section_name', 'esc_attr' );

	/*
	------------------------
	Slugs setting fields
	------------------------  */

	/*  --- Registration slug ---  */

	add_settings_field(
		'registration_section_slug',
		esc_html__( 'The slug of the &quot;Registration&quot; custom post type', 'custom-theme' ),
		'custom_textfield_name_callback',
		'registration_tab',
		'registration_tab_slugs',
		array(
			'id'          => 'registration_slug', 
			'option_name' => 'registration_section_slug',
		)  
	);
	register_setting( 'registration_tab', 'registration_section_slug', 'esc_attr' );

	/*
	----------------

	Other settings fields

	----------------  */

	/*  --- The title "Follow" button of a registration ---  */

	add_settings_field(
		'registration_button_title',
		esc_html__( 'The global title of the &quot;Follow&quot; button', 'custom-theme' ),
		'custom_textfield_button_title_callback',
		'registration_tab',
		'registration_tab_other_settings',
		array(
			'id'          => 'registration_button_title', 
			'option_name' => 'registration_button_title',
		)  
	);
	register_setting( 'registration_tab', 'registration_button_title', 'esc_attr' );

	/*  --- The title "Permalink" button of a registration ---  */

	add_settings_field(
		'registration_permalink_button_title',
		esc_html__( 'The global title of the &quot;Permalink&quot; button', 'custom-theme' ),
		'custom_textfield_permalink_button_title_callback',
		'registration_tab',
		'registration_tab_other_settings',
		array(
			'id'          => 'registration_permalink_button_title', 
			'option_name' => 'registration_permalink_button_title',
		)  
	);
	register_setting( 'registration_tab', 'registration_permalink_button_title', 'esc_attr' );

	/*  --- The number of stars in the rating ---  */

	add_settings_field(
		'registration_rating_stars_number',
		esc_html__( 'The number of stars', 'custom-theme' ),
		'custom_rating_stars_number_callback',
		'registration_tab',
		'registration_tab_other_settings',
		array(
			'id'          => 'registration_rating_stars_number', 
			'option_name' => 'registration_rating_stars_number',
		)
	);
	register_setting( 'registration_tab', 'registration_rating_stars_number', 'esc_attr' );
}

add_action( 'admin_init', 'registration_settings_init' );
