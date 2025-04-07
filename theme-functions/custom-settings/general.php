<?php 

/*  General settings - Start  */

function general_settings_init() {

	/*  General settings tab - Start  */

	/*  --- The setting sections ---  */

	add_settings_section(
		'general_tab_author',
		esc_html__( 'Author page', 'custom-theme' ),
		'custom_tab_author_callback',
		'general_tab'
	);

	function custom_tab_author_callback( $args ) {
		?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>">
			<?php esc_html_e( 'General author page settings.', 'custom-theme' ); ?>
		</p>
			<?php
	}

	/*  --- Tabs titles ---  */

	add_settings_field(
		'general_organizations_tab_title',
		esc_html__( 'The title of the &quot;Organizations&quot; tab', 'custom-theme' ),
		'custom_textfield_name_callback',
		'general_tab',
		'general_tab_author',
		array(
			'id'          => 'general_organizations_tab_title', 
			'option_name' => 'general_organizations_tab_title',
		)  
	);
	register_setting( 'general_tab', 'general_organizations_tab_title', 'esc_attr' );

	add_settings_field(
		'general_custom_articles_tab_title',
		esc_html__( 'The title of the &quot;Custom Articles&quot; tab', 'custom-theme' ),
		'custom_textfield_name_callback',
		'general_tab',
		'general_tab_author',
		array(
			'id'          => 'general_custom_articles_tab_title', 
			'option_name' => 'general_custom_articles_tab_title',
		)  
	);
	register_setting( 'general_tab', 'general_custom_articles_tab_title', 'esc_attr' );

	add_settings_field(
		'general_other_articles_tab_title',
		esc_html__( 'The title of the &quot;Other Articles&quot; tab', 'custom-theme' ),
		'custom_textfield_name_callback',
		'general_tab',
		'general_tab_author',
		array(
			'id'          => 'general_other_articles_tab_title', 
			'option_name' => 'general_other_articles_tab_title',
		)  
	);
	register_setting( 'general_tab', 'general_other_articles_tab_title', 'esc_attr' );

	/*  --- Buttons titles ---  */

	add_settings_field(
		'general_show_more_title',
		esc_html__( 'The title of the &quot;Show more&quot; button', 'custom-theme' ),
		'custom_textfield_name_callback',
		'general_tab',
		'general_tab_author',
		array(
			'id'          => 'general_show_more_title', 
			'option_name' => 'general_show_more_title',
		)  
	);
	register_setting( 'general_tab', 'general_show_more_title', 'esc_attr' );

	add_settings_field(
		'general_show_less_title',
		esc_html__( 'The title of the &quot;Show less&quot; button', 'custom-theme' ),
		'custom_textfield_name_callback',
		'general_tab',
		'general_tab_author',
		array(
			'id'          => 'general_show_less_title', 
			'option_name' => 'general_show_less_title',
		)  
	);
	register_setting( 'general_tab', 'general_show_less_title', 'esc_attr' );
}

add_action( 'admin_init', 'general_settings_init' );
