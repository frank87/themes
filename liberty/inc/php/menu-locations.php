<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Register menus
 */

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary'   => esc_html__( 'Main Menu - Inline or Left side', 'liberty' ),
	'primary2'   => esc_html__( 'Main Menu - Right side', 'liberty' ),
	'top_menu'   => esc_html__( 'Top Menu', 'liberty' ),
	'contribute' => esc_html__( 'Action menu', 'liberty' ),
	'footer_navigation' => esc_html__( 'Footer Navigation', 'liberty' )
) );