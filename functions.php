<?php

/* REGISTER CHILD THEME STYLES */
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/* REMOVE PROJECTS CPT */
function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );

/* CUSTOM STYLES MAIN.CSS */
function customStyles()
{
    wp_register_style('maincss', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('maincss');
    
    wp_register_script('mainjs', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    wp_enqueue_style('mainjs');
    
    wp_register_style( 'fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'fontawesome' );
}
add_action('wp_enqueue_scripts', 'customStyles');

/* CUSTOM SCRIPTS */
function customScripts()
{
    wp_register_script('mainjs', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('mainjs');
}
add_action('wp_enqueue_scripts', 'customScripts');

// CUSTOM IMAGE SIZES
if ( function_exists( 'add_theme_support' ) ) {

    // Add Thumbnail Theme Support.
    add_image_size( 'featured-product', 600, 600, true );
	add_image_size('promo-flyer', 612, 792, true);
}

include 'functions/tinymce.php';
include 'functions/shortcodes.php';
include 'functions/acf.php';
include 'functions/promotions.php';
include 'functions/top-header.php';
include 'functions/main-navigation.php';
include 'functions/brand-grid.php';
include 'functions/hide-post-menu-item.php';