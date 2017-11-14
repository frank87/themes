<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
TGM Plugin Activation
**/
if (is_admin()) {
	require get_template_directory() . '/inc/php/class-tgm-plugin-activation.php';
	require get_template_directory() . '/inc/php/tgm_plugin_activation.php';
}

/**
Globals
**/
require get_template_directory() . '/inc/globals.php';

/**
Setup
**/
if ( ! function_exists( 'liberty_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function liberty_theme_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'inc/css/editor-style.css', fw_theme_font_url() ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'liberty-blog-fullhd', 1920, 675, true);
	add_image_size( 'liberty-blog-full', 1170, 675, true);
	add_image_size( 'liberty-thumb-xl', 600, 600, true);
	add_image_size( 'liberty-wide-thumbnail', 600, 300, true);
	add_image_size( 'liberty-wide-thumbnail2', 600, 450, true);
	add_image_size( 'liberty-portrait-thumbnail', 300, 600, true);
	add_image_size( 'liberty-wide-s-thumbnail', 300, 150, true);

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// Add theme support for Translation
	load_theme_textdomain( 'liberty', get_template_directory() . '/languages' );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	add_theme_support( 'woocommerce' );

}
endif; // liberty_theme_setup
add_action( 'after_setup_theme', 'liberty_theme_setup' );

if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}


/**
PHP - can be changed in child theme's function file
**/
if (!function_exists('get_liberty_theme_options')) :
	function get_liberty_theme_options() {
		global $liberty_theme_options_master;

		return $liberty_theme_options_master;
	}
endif;


if (!function_exists('liberty_load_extras')) {
	function liberty_load_extras() {
		require get_template_directory() . '/inc/extras.php';		
	}
}

liberty_load_extras();

//
if (!function_exists('liberty_body_class')) : 
	function liberty_body_class($wp_classes) {

		$liberty_theme_options = get_liberty_theme_options();

		$animate = liberty_default_array($liberty_theme_options, 'switch-use-animation', 0);
		if ($animate) {
			$classes[] = " animation-effect";
		}

		$usePrettyPhoto = liberty_default_array($liberty_theme_options, 'switch-use-prettyPhoto', 1);
		if ($usePrettyPhoto) {
			$classes[] = ' usePrettyPhoto';
		}

		$showStickyNavigation = liberty_default_array($liberty_theme_options, 'sticky-navigation', 1);
		if ($showStickyNavigation) {
			$classes[] = ' showStickyNavigation';
		}

		$inlineNavigation = liberty_default_array($liberty_theme_options, 'inline-navigation', 1);
		if ($inlineNavigation) {
			$classes[] = ' inlineNavigation';
		}

		$showPromoLine = liberty_default_array($liberty_theme_options, 'switch-promo', 0);
		if ($showStickyNavigation) {
			$classes[] = ' showPromoLine';
		}

		$wp_classes = array_merge($wp_classes, $classes);

		return $wp_classes;
	}
endif;
add_filter( 'body_class', 'liberty_body_class' );

if (!function_exists('liberty_custom_wp_admin_style')) {
	function liberty_custom_wp_admin_style() {
	        wp_register_style( 'liberty_admin_style', PARENT_URL . '/inc/css/themeblossom-admin.css', false, '1.0.0' );
	        wp_enqueue_style( 'liberty_admin_style' );
	}

	add_action( 'admin_enqueue_scripts', 'liberty_custom_wp_admin_style' );
}

?>