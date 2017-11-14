<?php

/**
 * Register widget areas.
 * @internal
 */
function _action_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'liberty' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Default sidebar section of the site.', 'liberty' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Issues Sidebar Widget Area', 'liberty' ),
		'id'            => 'issues',
		'description'   => esc_html__( 'Sidebar for issues pages.', 'liberty' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	
	if (class_exists('Tribe__Events__Main')) :	
	register_sidebar( array(
		'name'          => esc_html__( 'Events Sidebar Widget Area', 'liberty' ),
		'id'            => 'events',
		'description'   => esc_html__( 'Sidebar for event pages.', 'liberty' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	endif;


	if (class_exists('WooCommerce')) :
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar Widget Area', 'liberty' ),
		'id'            => 'shop',
		'description'   => esc_html__( 'Sidebar for shop pages.', 'liberty' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	endif;

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Wide Widget Area', 'liberty' ),
		'id'            => 'footer-wide',
		'description'   => esc_html__( 'Wide Widget Area.', 'liberty' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	$liberty_theme_options = get_liberty_theme_options();

	$footerColumns = liberty_default_array($liberty_theme_options, 'footer-widgets', '4cols');

	if ($footerColumns != 'no') :

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area 1', 'liberty' ),
		'id'            => 'footer1',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'liberty' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area 2', 'liberty' ),
		'id'            => 'footer2',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'liberty' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area 3', 'liberty' ),
		'id'            => 'footer3',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'liberty' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	if ($footerColumns == '4cols') {

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Area 4', 'liberty' ),
			'id'            => 'footer4',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'liberty' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	}

	endif;
}

add_action( 'widgets_init', '_action_theme_widgets_init' );

?>