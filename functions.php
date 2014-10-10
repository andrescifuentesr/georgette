<?php
/**
 * georgette functions and definitions
 *
 * @package georgette
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'georgette_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function georgette_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on georgette, use a find and replace
	 * to change 'georgette' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'georgette', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'georgette' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'georgette_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // georgette_setup
add_action( 'after_setup_theme', 'georgette_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function georgette_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'georgette' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'georgette_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function georgette_scripts() {
	wp_enqueue_style( 'georgette-style', get_template_directory_uri() . '/css/build/minified/global.css', array(), '20140624', 'all' );
	
	//modernizr
	wp_enqueue_script( 'georgette-modernizr', get_template_directory_uri() . '/js/libs/modernizr.custom.63353.js', array(), '20140624', false );

	// Enqueue Google maps
	wp_enqueue_script( 'georgette-GoogleMaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyArEmbqneDepMsMr0aZAYE-XAVxRsl2B9E&sensor=false', false );	
	
	//Production JS
	wp_enqueue_script( 'georgette-main', get_template_directory_uri() . '/js/build/production.min.js', array('jquery'), '20140624', true );

}
add_action( 'wp_enqueue_scripts', 'georgette_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Library Functions
 */
require get_template_directory() . '/inc/template-functions-theme.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
