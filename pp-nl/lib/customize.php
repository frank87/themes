<?php
/**
 * Piratenpartij Nederland.
 *
 * This file adds the Customizer additions to the Piratenpartij Nederland Theme.
 *
 * @package Piratenpartij Nederland
 * @author  Forsite 
 * @license GPL-2.0+
 * @link    https://piratenpartij.nl/
 */

add_action( 'customize_register', 'ppnl_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function ppnl_customizer_register( $wp_customize ) {

	$images = apply_filters( 'ppnl_images', array( '1', '3', '5' ) );

	$wp_customize->add_section( 'ppnl-settings', array(
		'description' => __( 'Use the included default images or personalize your site by uploading your own images.<br /><br />The default images are <strong>1800 pixels wide and 1000 pixels tall</strong>.', 'ppnl' ),
		'title'       => __( 'Front Page Background Images', 'ppnl' ),
		'priority'    => 80.1,
	) );

	foreach( $images as $image ){

		$wp_customize->add_setting( $image .'-ppnl-image', array(
			'default' => sprintf( '%s/images/bg-%s.jpg', get_stylesheet_directory_uri(). '/assets/', $image ),
			'type'    => 'option',
		) );

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				$image .'-ppnl-image',
				array(
					'label'    => sprintf( __( 'Featured Section %s Image:', 'ppnl' ), $image ),
					'section'  => 'ppnl-settings',
					'settings' => $image .'-ppnl-image',
					'priority' => $image+1,
				)
			)
		);

	}

	$wp_customize->add_setting(
		'ppnl_link_color',
		array(
			'default'           => ppnl_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ppnl_link_color',
			array(
				'description' => __( 'Change the default color for post meta links, the hover color for linked titles, menu links, pagination buttons, and more.', 'ppnl' ),
			    'label'       => __( 'Link Color', 'ppnl' ),
			    'section'     => 'colors',
			    'settings'    => 'ppnl_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'ppnl_accent_color',
		array(
			'default'           => ppnl_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ppnl_accent_color',
			array(
				'description' => __( 'Change the default hover color for buttons, sub-menu links, footer links, and other accents.', 'ppnl' ),
			    'label'       => __( 'Accent Color', 'ppnl' ),
			    'section'     => 'colors',
			    'settings'    => 'ppnl_accent_color',
			)
		)
	);

    // Add single image section to the Customizer.
    $wp_customize->add_section(
		'ppnl_single_image_section',
		array(
			'title'       => __( 'Post and Page Images', 'ppnl' ),
			'description' => __( 'Choose if you would like to display the featured image above the content on single posts and pages.', 'ppnl' ),
			'priority'    => 158.85,
		)
	);

    // Add single image setting to the Customizer.
    $wp_customize->add_setting(
		'ppnl_single_image_setting',
		array(
			'default'    => true,
			'capability' => 'edit_theme_options',
		)
	);

    $wp_customize->add_control(
		'ppnl_single_image_setting',
		array(
			'section'  => 'ppnl_single_image_section',
			'settings' => 'ppnl_single_image_setting',
			'label'    => __( 'Show featured image on posts and pages?', 'ppnl' ),
			'type'     => 'checkbox',
		)
	);

}
