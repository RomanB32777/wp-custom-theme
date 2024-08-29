<?php

global $custom_theme_version;
$custom_theme_version = '1.2.0';

$vendor_dir = __DIR__ . '/vendor';
$env_file   = __DIR__ . '/.env';

if ( is_dir( $vendor_dir ) && file_exists( $env_file ) ) {
	require_once __DIR__ . '/vendor/autoload.php';

	$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
	$dotenv->load();
}

add_theme_support( 'title-tag' );

function register_custom_menus() {
	register_nav_menus(
		array(
			'header-menu' => esc_html__( 'Header Menu', 'custom-theme' ),
		)
	);
}
add_action( 'init', 'register_custom_menus' );

function link_localize_theme( $locale ) {
	if ( isset( $_GET['lang'] ) ) {
		return esc_attr( $_GET['lang'] );
	}
	return $locale;
}
add_filter( 'locale', 'link_localize_theme' );

function custom_theme_setup() {
	add_theme_support( 'post-thumbnails' );

	load_theme_textdomain( 'custom-theme', get_template_directory() . '/languages' );

	require_once get_template_directory() . '/theme-functions/header-walker-nav-menu.php';
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

function custom_logo_setup() {
	$defaults = array(
		'height'      => 32,
		'width'       => 32,
		'flex-height' => true,
		'flex-width'  => true,
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'custom_logo_setup' );

function enqueue_time_versioned_style( $handle, $src = '', $deps = array(), $media = 'all' ) {
	$host_path      = get_theme_file_uri( $src );
	$directory_path = get_stylesheet_directory() . $src;

	wp_register_style( $handle, $host_path, $deps, @filemtime( $directory_path ), $media );
	wp_enqueue_style( $handle );
}

function fonts_theme() {
	wp_enqueue_style( 'googlefonts', '//fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700;900&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'fonts_theme' );
add_action( 'enqueue_block_editor_assets', 'fonts_theme' );

function style_theme() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
	enqueue_time_versioned_style( 'wp_custom_main_style', 'dist/css/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'style_theme' );
add_action( 'enqueue_block_editor_assets', 'style_theme' );

function style_loader_tag_filter_preload( $tag, $handle, $href ) {
	if ( 'googlefonts' === $handle ) {
		$noscript = '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';

		return str_replace( "media='all'", "media='print' onload='this.onload=null;this.media=" . '"all"' . "'", $tag ) . $noscript;
	}

	if ( 'wp-block-library' === $handle ) {
		$noscript = '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';
		$new_tag  = str_replace( "rel='stylesheet'", "rel='preload' as='style'", $tag );

		return str_replace( "type='text/css'", "media='all' onload='this.onload=null;this.rel=" . '"stylesheet"' . "'", $new_tag ) . $noscript;
	}

	return $tag;
}
add_filter( 'style_loader_tag', 'style_loader_tag_filter_preload', 10, 4 );

function enqueue_theme_versioned_script( $handle, $path = '', $deps = array() ) {
	$main_path = get_theme_file_uri( $path );

	wp_register_script(
		$handle,
		$main_path,
		$deps,
		@filemtime( $main_path ),
		array(
			'in_footer' => true,
			'strategy'  => 'async',
		)
	);
	wp_enqueue_script( $handle );
}

function scripts_theme() {
	wp_enqueue_script( 'jquery' );
	
	enqueue_theme_versioned_script( 'wp_custom_main_script', '/dist/js/main.js', array( 'jquery' ) );
	wp_localize_script( 'wp_custom_main_script', 'ajax_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	wp_enqueue_script( 'uhpv', 'https://lidrekon.ru/slep/js/uhpv-full.min.js', array( 'jquery' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'scripts_theme' );

// Alter search posts per page
function change_wp_search_size( $query ) {
	if ( isset( $_REQUEST['s'] ) ) { 
		$query['posts_per_page'] = -1; 
	}

	return $query; 
}
add_filter( 'request', 'change_wp_search_size' ); 

/**  Custom Settings Page - Start  */

require_once __DIR__ . '/theme-functions/custom-settings-page.php';

/**  Custom Settings Page - End  */

/** Custom Post Type - Start  */

require_once __DIR__ . '/theme-functions/custom-post-types.php';

/**  Custom Post Type - End  */

/** Custom Theme Shortcodes - Start  */

require_once __DIR__ . '/theme-functions/theme-shortcodes.php';

/**  Custom Theme Shortcodes - End  */

/** Theme Customizer Range - Start  */

require_once __DIR__ . '/theme-functions/class-wp-customize-range.php';

/**  Theme Customizer Range - End  */

/** Theme Customizer Colors - Start  */

require_once __DIR__ . '/theme-functions/theme-customizer-settings.php';

/** Theme Customizer Colors - End  */

// logo
function change_logo_class( $html ) {
	$html = str_replace( 'custom-logo-link', '[&>img]:h-12 xl:[&>img]:!h-16 [&>img]:w-auto', $html );
	
	return $html;
}
add_filter( 'get_custom_logo', 'change_logo_class' );

// ajax search
require_once __DIR__ . '/theme-functions/wp-search-services-ajax.php';

/*  Widgets Setup Start  */

add_action( 'widgets_init', 'theme_widgets_init' );
function theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Social widgets', 'custom-theme' ),
			'id'            => 'social-widgets',
			'description'   => esc_html__( 'Social widgets here.', 'custom-theme' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Contacts widgets', 'custom-theme' ),
			'id'            => 'contacts-widgets',
			'description'   => esc_html__( 'Contacts widgets here.', 'custom-theme' ),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
