<?php
/**
 * Doyel Grid functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Doyel Grid
 */

if ( ! defined( 'DOYEL_GRID_VERSION' ) ) {
	$doyel_grid_theme = wp_get_theme();
	define( 'DOYEL_GRID_VERSION', $doyel_grid_theme->get( 'Version' ) );
}


/**
 * Enqueue scripts and styles.
 */
function doyel_grid_scripts() {
    wp_enqueue_style( 'doyel-grid-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','doyel-default-block','doyel-style'), '', 'all');
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_style( 'doyel-grid-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), DOYEL_GRID_VERSION, 'all');
    wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.min.js',array('jquery'), DOYEL_GRID_VERSION, true );
    wp_enqueue_script( 'doyel-grid-main-js', get_stylesheet_directory_uri() . '/assets/js/doyel-grid-main.js',array('jquery','doyel-script'), DOYEL_GRID_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'doyel_grid_scripts' );

/**
 * Custom excerpt length.
 */
function doyel_grid_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 19;
}
add_filter( 'excerpt_length', 'doyel_grid_excerpt_length', 999 );

/**
 * Custom excerpt More.
 */
function doyel_grid_excerpt_more( $more ) {
    if ( is_admin() ) return $more;
    return '.';
}
add_filter( 'excerpt_more', 'doyel_grid_excerpt_more' );

/**
 * Load Doyel Tags files.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';