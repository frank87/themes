<?php
/**
 * Piratenpartij Nederland.
 *
 * This file adds the front page to the Piratenpartij Nederland Theme.
 *
 * @package Piratenpartij Nederland
 * @author  Forsite 
 * @license GPL-2.0+
 * @link    https://piratenpartij.nl/
 */

add_filter( 'genesis_site_title_wrap', 'ppnl_h1_for_site_title' );
/**
 * Use h1 for site title
 */
function ppnl_h1_for_site_title( $wrap ) {
	return 'h1';
}

add_action( 'genesis_meta', 'ppnl_front_page_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 * @since 1.0.0
 */
function ppnl_front_page_genesis_meta() {

	if ( is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-3' ) || is_active_sidebar( 'front-page-4' ) || is_active_sidebar( 'front-page-5' )  || is_active_sidebar( 'front-page-6' ) ) {

		// Enqueue scripts.
		add_action( 'wp_enqueue_scripts', 'ppnl_enqueue_front_script_styles' );

		// Add front-page body class.
		add_filter( 'body_class', 'ppnl_body_class' );

		// Hook sticky message before site header.
		add_action( 'genesis_before', 'ppnl_sticky_message' );

		// Remove breadcrumbs.
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		// Remove the default Genesis loop.
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		// Add homepage widgets.
		add_action( 'genesis_loop', 'ppnl_front_page_widgets' );

		// Force full width content layout.
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

	}

}

// Define front page scripts.
function ppnl_enqueue_front_script_styles() {

	wp_enqueue_script( 'ppnl-front-script', get_stylesheet_directory_uri() . '/assets/js/front-page.js', array( 'jquery' ), '1.0.0' );

	wp_enqueue_style( 'ppnl-front-styles', get_stylesheet_directory_uri() . '/assets/css/style-front.css' );

}

// Define front-page body class.
function ppnl_body_class( $classes ) {

	$classes[] = 'front-page';

	return $classes;

}

// Add markup for the sticky message.
function ppnl_sticky_message() {

	genesis_widget_area( 'sticky-message', array(
		'before' => '<div class="sticky-message widget-area"><div class="wrap">',
		'after'  => '<a class="dismiss dashicons dashicons-no-alt" href="#"><span class="screen-reader-text">Verwijder</span></a></div></div>',
	) );

}

/**
 * Add markup for front page widgets.
 *
 * If needed use <h3 class="widget-title">Laatste nieuws</h3> to add a title somewhere for now.
 * @todo  make addition of title per section available via the Customizer
 * @return [type] [description]
 */
function ppnl_front_page_widgets() {

	echo '<h2 class="screen-reader-text">' . __( 'Hoofdinhoud', 'ppnl' ) . '</h2>';

	genesis_widget_area( 'front-page-0', array(
		'before' => '<div id="front-page-0" class="front-page-0"><div class="flexible-widgets widget-area' . ppnl_widget_area_class( 'front-page-0' ) . '"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-1', array(
		'before' => '<div id="front-page-1" class="front-page-1 image-section"><div class="flexible-widgets widget-area' . ppnl_widget_area_class( 'front-page-1' ) . '"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-2', array(
		'before' => '<div id="front-page-2" class="front-page-2"><div class="flexible-widgets widget-area' . ppnl_widget_area_class( 'front-page-2' ) . '"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-3', array(
		'before' => '<div id="front-page-3" class="front-page-3 image-section"><div class="flexible-widgets widget-area' . ppnl_widget_area_class( 'front-page-3' ) . '"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-4', array(
		'before' => '<div id="front-page-4" class="front-page-4"><div class="flexible-widgets widget-area' . ppnl_widget_area_class( 'front-page-4' ) . '"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-5', array(
		'before' => '<div id="front-page-5" class="front-page-5 image-section"><div class="flexible-widgets widget-area' . ppnl_widget_area_class( 'front-page-5' ) . '"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-6', array(
		'before' => '<div id="front-page-6" class="front-page-6"><div class="flexible-widgets widget-area' . ppnl_widget_area_class( 'front-page-6' ) . '"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

}

// Run the Genesis loop.
genesis();
