<?php
/**
 * Piratenpartij Nederland.
 *
 * This file adds WooCommerce setup functions to the Piratenpartij Nederland Theme.
 *
 * @package Piratenpartij Nederland
 * @author  Forsite 
 * @license GPL-2.0+
 * @link    https://piratenpartij.nl/
 */

// Add product gallery support.
if ( class_exists( 'WooCommerce' ) ) {

	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-zoom' );

}

add_action( 'wp_enqueue_scripts', 'ppnl_products_match_height', 99 );
/**
 * Print an inline script to the footer to keep products the same height.
 *
 * @since 1.1.1
 */
function ppnl_products_match_height() {

	// If WooCommerce isn't active or not on a WooCommerce page, exit early.
	if ( ! class_exists( 'WooCommerce' ) || ( ! is_shop() && ! is_woocommerce() && ! is_cart() ) ) {
		return;
	}

	wp_enqueue_script( 'ppnl-match-height', get_stylesheet_directory_uri() . '/js/jquery.matchHeight.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_add_inline_script( 'ppnl-match-height', "jQuery(document).ready( function() { jQuery( '.product .woocommerce-LoopProduct-link').matchHeight(); });" );

}

add_filter( 'woocommerce_style_smallscreen_breakpoint', 'ppnl_woocommerce_breakpoint' );
/**
 * Modify the default WooCommerce breakpoints.
 *
 * @since 1.1.0
 *
 * @return string Pixel value of the new breakpoint.
 */
function ppnl_woocommerce_breakpoint() {

	$current = genesis_site_layout();
	$layouts = array(
		'content-sidebar',
		'sidebar-content',
	);

	if ( in_array( $current, $layouts ) ) {
		return '1200px';
	} else {
		return '860px';
	}

}

add_filter( 'genesiswooc_default_products_per_page', 'ppnl_default_products_per_page' );
/**
 * Set the shop default products per page count.
 *
 * @since 1.1.0
 *
 * @return int Number of products per page.
 */
function ppnl_default_products_per_page( $count ) {
	return 6;
}

add_filter( 'loop_shop_columns', 'ppnl_product_archive_columns' );
/**
 * Modify the default WooCommerce column count for product thumbnails.
 *
 * @since 1.1.0
 *
 * @return int Number of columns for product archives.
 */
function ppnl_product_archive_columns() {
	return 3;
}

add_filter( 'woocommerce_pagination_args', 	'ppnl_woocommerce_pagination' );
/**
 * Update the next and previous arrows to the default Genesis style.
 *
 * @since 1.1.0
 *
 * @return string New next and previous text string.
 */
function ppnl_woocommerce_pagination( $args ) {

	$args['prev_text'] = sprintf( '&laquo; %s', __( 'Previous Page', 'ppnl' ) );
	$args['next_text'] = sprintf( '%s &raquo;', __( 'Next Page', 'ppnl' ) );

	return $args;

}

add_action( 'after_switch_theme', 'ppnl_woocommerce_image_dimensions_after_theme_setup', 1 );
/**
 * Define WooCommerce image sizes on activation.
 *
 * @since 1.1.0
 */
function ppnl_woocommerce_image_dimensions_after_theme_setup() {

	global $pagenow;

	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' || ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	ppnl_update_woocommerce_image_dimensions();

}

add_action( 'activated_plugin', 'ppnl_woocommerce_image_dimensions_after_woo_activation', 10, 2 );
/**
 * Define WooCommerce image sizes on activation of the WooCommerce plugin.
 *
 * @since 1.1.0
 */
function ppnl_woocommerce_image_dimensions_after_woo_activation( $plugin ) {

	// Conditional check to see if we're activating WooCommerce.
	if ( $plugin !== 'woocommerce/woocommerce.php' ) {
		return;
	}

	ppnl_update_woocommerce_image_dimensions();

}

/**
 * Update the WooCommerce image dimensions.
 *
 * @since 1.1.0
 */
function ppnl_update_woocommerce_image_dimensions() {

	$catalog = array(
		'width'  => '660', // px
		'height' => '660', // px
		'crop'   => 1,     // true
	);
	$single = array(
		'width'  => '750', // px
		'height' => '750', // px
		'crop'   => 1,     // true
	);
	$thumbnail = array(
		'width'  => '180', // px
		'height' => '180', // px
		'crop'   => 1,     // true
	);

	// Image sizes.
	update_option( 'shop_catalog_image_size', $catalog );     // Product category thumbs.
	update_option( 'shop_single_image_size', $single );       // Single product image.
	update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs.

}
