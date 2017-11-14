<?php
/**
 * Piratenpartij Nederland.
 *
 * This file adds functions to the Piratenpartij Nederland Theme.
 *
 * @package Piratenpartij Nederland
 * @author  Forsite 
 * @license GPL-2.0+
 * @link    https://piratenpartij.nl/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Piratenpartij Nederland' );
define( 'CHILD_THEME_URL', 'https://piratenpartij.nl/' );
define( 'CHILD_THEME_VERSION', '2.0.3' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

add_action( 'after_setup_theme', 'ppnl_localization_setup' );
/**
 * Set Localization (do not remove).
 * @return [type] [description]
 */
function ppnl_localization_setup(){
	load_child_theme_textdomain( 'ppnl', get_stylesheet_directory() . '/languages' );
}

// Add the theme's helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add the required WooCommerce setup functions.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the Customizer CSS for the WooCommerce.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Include notice to install Genesis Connect for WooCommerce.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

add_action( 'wp_enqueue_scripts', 'ppnl_enqueue_scripts_styles' );
/**
 * Enqueue Scripts and Styles.
 * @return [type] [description]
 */
function ppnl_enqueue_scripts_styles() {

	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'ppnl-responsive-menu', get_stylesheet_directory_uri() . '/assets/js/responsive-menus' . $suffix . '.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'ppnl-responsive-menu',
		'genesis_responsive_menu',
		ppnl_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function ppnl_responsive_menu_settings() {

	$settings = array(
		'mainMenu'    => __( 'Menu', 'ppnl' ),
		'subMenu'     => __( 'Submenu', 'ppnl' ),
		'menuClasses' => array(
			'combine' => array(
				'.nav-header',
				'.nav-primary',
			),
		),
	);

	return $settings;

}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 
	'caption', 
	'comment-form', 
	'comment-list', 
	'gallery', 
	'search-form' 
) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( 
	'404-page', 
	'drop-down-menu', 
	'headings', 
	'rems', 
	'search-form', 
	'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add Image Sizes.
add_image_size( 'piraat', 300, 200, TRUE );
add_image_size( 'featured-image', 640, 640, TRUE );
add_image_size( 'featured-image-large', 1000, 1000, TRUE );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Remove site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content' );

add_filter( 'wp_nav_menu_items', 'ppnl_menu_extras', 10, 2 );
/**
 * Filter menu items, appending either a search form or today's date.
 *
 * @param string   $menu HTML string of list items.
 * @param stdClass $args Menu arguments.
 *
 * @return string Amended HTML string of list items.
 */
function ppnl_menu_extras( $menu, $args ) {
	//* Change 'primary' to 'secondary' to add extras to the secondary navigation menu
	if ( 'primary' !== $args->theme_location )
		return $menu;
	
	ob_start();
	get_search_form();
	$search = ob_get_clean();
	$menu  .= '<li class="right search">' . $search . '</li>';
	
	return $menu;
}


add_action( 'genesis_theme_settings_metaboxes', 'ppnl_remove_genesis_metaboxes' );
/**
 * Remove navigation meta box.
 * @param  [type] $_genesis_theme_settings_pagehook [description]
 * @return [type]                                   [description]
 */
function ppnl_remove_genesis_metaboxes( $_genesis_theme_settings_pagehook ) {
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_theme_settings_pagehook, 'main' );
}

add_filter( 'genesis_skip_links_output', 'ppnl_skip_links_output' );
/**
 * Remove skip link for primary navigation and add skip link for footer widgets.
 * @param  [type] $links [description]
 * @return [type]        [description]
 */
function ppnl_skip_links_output( $links ) {

	$new_links = $links;
	array_splice( $new_links, 3 );

	if ( is_active_sidebar( 'flex-footer' ) ) {
		$new_links['footer'] = __( 'Skip to footer', 'ppnl' );
	}

	return array_merge( $new_links, $links );

}

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 
	'primary'	=> __( 'After Header Menu', 'ppnl' ), 
	'secondary'	=> __( 'Footer Menu', 'ppnl' ) 
) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

add_filter( 'wp_nav_menu_args', 'ppnl_secondary_menu_args' );
/**
 * Reduce the secondary navigation menu to one level depth.
 * @param  [type] $args [description]
 * @return [type]       [description]
 */
function ppnl_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

//add_action( 'genesis_entry_content', 'ppnl_featured_image', 1 );
/**
 * Add featured image on single post.
 * @return [type] [description]
 */
function ppnl_featured_image() {

	$add_single_image = get_theme_mod( 'ppnl_single_image_setting', true );

	$image = genesis_get_image( array(
			'format'  => 'html',
			'size'    => 'featured-image-large',
			'context' => '',
			'attr'    => array ( 'alt' => the_title_attribute( 'echo=0' ), 'class' => 'aligncenter' ),
		) );

	if ( is_singular() && ( true === $add_single_image ) ) {
		if ( $image ) {
			printf( '<div class="featured-image">%s</div>', $image );
		}
	}

}

add_filter( 'genesis_author_box_gravatar_size', 'ppnl_author_box_gravatar' );
/**
 * Modify size of the Gravatar in the author box.
 * @param  [type] $size [description]
 * @return [type]       [description]
 */
function ppnl_author_box_gravatar( $size ) {
	return 90;
}

add_filter( 'genesis_comment_list_args', 'ppnl_comments_gravatar' );
/**
 * Modify size of the Gravatar in the entry comments.
 * @param  [type] $args [description]
 * @return [type]       [description]
 */
function ppnl_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

// Setup widget counts.
function ppnl_count_widgets( $id ) {

	$sidebars_widgets = wp_get_sidebars_widgets();

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		return count( $sidebars_widgets[ $id ] );
	}

}

// Set the widget class for flexible widgets.
function ppnl_widget_area_class( $id ) {

	$count = ppnl_count_widgets( $id );

	$class = '';

	if ( $count == 1 ) {
		$class .= ' widget-full';
	} elseif ( $count % 3 == 0 ) {
		$class .= ' widget-thirds';
	} elseif ( $count % 4 == 0 ) {
		$class .= ' widget-fourths';
	} elseif ( $count % 2 == 1 ) {
		$class .= ' widget-halves uneven';
	} else {
		$class .= ' widget-halves';
	}

	return $class;

}

add_action( 'genesis_before_footer', 'ppnl_before_footer_widget' );
/**
 * Add the before footer widget area.
 * @return [type] [description]
 */
function ppnl_before_footer_widget() {

	genesis_widget_area( 'before-footer', array(
		'before' => '<div id="before-footer" class="before-footer"><h2 class="genesis-sidebar-title screen-reader-text">' . __( 'Before Footer', 'ppnl' ) . '</h2><div class="flexible-widgets widget-area ' . ppnl_widget_area_class( 'before-footer' ) . '"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

}

add_action( 'genesis_before_footer', 'ppnl_footer_widgets' );
/**
 * Add the flexible footer widget area.
 * @return [type] [description]
 */
function ppnl_footer_widgets() {

	genesis_widget_area( 'flex-footer', array(
		'before' => '<div id="footer" class="flex-footer footer-widgets"><h2 class="genesis-sidebar-title screen-reader-text">' . __( 'Footer', 'ppnl' ) . '</h2><div class="flexible-widgets widget-area ' . ppnl_widget_area_class( 'flex-footer' ) . '"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

}

// Register widget areas.
genesis_register_sidebar( array(
	'id'          => 'sticky-message',
	'name'        => __( 'Sticky Message', 'ppnl' ),
	'description' => __( 'This is the sticky message section that appears on the front page.', 'ppnl' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-0',
	'name'        => __( 'Front Page 0', 'ppnl' ),
	'description' => __( 'This is the front page 0 section.', 'ppnl' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-1',
	'name'        => __( 'Front Page 1', 'ppnl' ),
	'description' => __( 'This is the front page 1 section.', 'ppnl' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-2',
	'name'        => __( 'Front Page 2', 'ppnl' ),
	'description' => __( 'This is the front page 2 section.', 'ppnl' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-3',
	'name'        => __( 'Front Page 3', 'ppnl' ),
	'description' => __( 'This is the front page 3 section.', 'ppnl' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-4',
	'name'        => __( 'Front Page 4', 'ppnl' ),
	'description' => __( 'This is the front page 4 section.', 'ppnl' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-5',
	'name'        => __( 'Front Page 5', 'ppnl' ),
	'description' => __( 'This is the front page 5 section.', 'ppnl' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-6',
	'name'        => __( 'Front Page 6', 'ppnl' ),
	'description' => __( 'This is the front page 6 section.', 'ppnl' ),
) );
genesis_register_sidebar( array(
	'id'          => 'before-footer',
	'name'        => __( 'Before Footer', 'ppnl' ),
	'description' => __( 'This is the before footer section.', 'ppnl' ),
) );
genesis_register_sidebar( array(
	'id'          => 'flex-footer',
	'name'        => __( 'Footer', 'ppnl' ),
	'description' => __( 'This is the footer section.', 'ppnl' ),
) );

add_filter( 'genesis_footer_creds_text', 'forsite_footer_creds_text' );
/**
 * Custom credits text.
 *
 * @since @@release
 */
function forsite_footer_creds_text() {
	echo '<div class="copyright-area">';
	echo 'CC0 1.0 Universal Public Domain Dedication 2010 – ';
	echo  date( 'Y' ); ?> <a title="Piratenpartij Nederland" href="https://piratenpartij.nl/">Piratenpartij Nederland</a>
	<?php
	//echo ' – ';
	//echo ' <small>Gemaakt door <a href="http://forsite.frl">Forsite</a></small>';
	echo '</div>';
}

add_action( 'genesis_before_sidebar_widget_area', 'ppnl_word_lid_cta' ); 
function ppnl_word_lid_cta() {
	echo '<div class="join-donate">
			<span class="button orange">
				<a class="icon group" title="Word Lid" href="https://lidworden.piratenpartij.nl">Word Lid</a>
			</span>
			<span class="button red">
				<a class="icon doneren" title="Doneer" href="https://piratenpartij.nl/doneren">Doneer</a>
			</span>
		</div>';
}
