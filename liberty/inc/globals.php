<?php

/**
Set Proper Parent/Child theme paths for inclusion
**/
@define( 'PARENT_DIR', get_template_directory() );
@define( 'CHILD_DIR', get_stylesheet_directory() );
@define( 'PARENT_URL', get_template_directory_uri() );
@define( 'CHILD_URL', get_stylesheet_directory_uri() );

/**
GLOBAL ARRAYS
**/
$GLOBALS['text_align'] = array(
			'textalignleft' => esc_html__('Text Align Left', 'liberty'),
			'textaligncenter' => esc_html__('Text Align Center', 'liberty'),
			'textalignright' => esc_html__('Text Align Right', 'liberty'),
			'default_text_align' => esc_html__('Default', 'liberty'),
		);


$GLOBALS['float_align'] = array(
			'alignleft' => esc_html__('Align Left', 'liberty'),
			'aligncenter' => esc_html__('Align Center', 'liberty'),
			'alignright' => esc_html__('Align Right', 'liberty'),
			'default_float_align' => esc_html__('Default', 'liberty'),
		);

$GLOBALS['button_type'] = array(
			'btn-tb-primary' => esc_html__('Primary - No Border', 'liberty'),
			'btn-tb-secondary' => esc_html__('Secondary - No Border', 'liberty'),
			'btn-border1' => esc_html__('Button with Border 1', 'liberty'),
			'btn-border2' => esc_html__('Button with Border 2', 'liberty'),
			'default_button_type' => esc_html__('Default', 'liberty'),
		);

$GLOBALS['button_size'] = array(
            'btn-xs' => esc_html__( 'Extra Small', 'liberty' ),
            'btn-sm' => esc_html__( 'Small', 'liberty' ),
            'btn-default-size' => esc_html__( 'Default', 'liberty' ),
            'btn-lg' => esc_html__( 'Large', 'liberty' ),
		);

$GLOBALS['button_width'] = array(
            'default_button_width' => esc_html__( 'Default', 'liberty' ),
            'btn25' => esc_html__( '25%', 'liberty' ),
            'btn32' => esc_html__( '32%', 'liberty' ),
            'btn32m' => esc_html__( '32% Middle', 'liberty' ),
            'btn33' => esc_html__( '33%', 'liberty' ),
            'btn48' => esc_html__( '48%', 'liberty' ),
            'btn100' => esc_html__( '100%', 'liberty' ),
		);

$GLOBALS['form_type'] = array(
            'liberty_form_default' => esc_html__( 'Default', 'liberty' ),
            'liberty_form_style1' => esc_html__( 'Style 1', 'liberty' ),
		);

$GLOBALS['show_labels'] = array(
            'nolabels' => esc_html__( 'No', 'liberty' ),
            'show_labels' => esc_html__( 'Yes', 'liberty' ),
		);

$GLOBALS['animation_select'] = array(
			'none' => esc_html__('No Effect', 'liberty'),
			'fadeIn' => esc_html__('Fade In', 'liberty'),
			'fadeInUp' => esc_html__('Fade In Up', 'liberty'),
			'fadeInDown' => esc_html__('Fade In Down', 'liberty'),
			'fadeInLeft' => esc_html__('Fade In Left', 'liberty'),
			'fadeInRight' => esc_html__('Fade In Right', 'liberty'),
			'bounceIn' => esc_html__('Bounce In', 'liberty'),
			'zoomIn' => esc_html__('Zoom In', 'liberty'),
			'rotateIn' => esc_html__('Rotate In', 'liberty'),
		);

$GLOBALS['animation_delay'] = array(
			'0' => esc_html__('No Delay', 'liberty'),
			'0.1s' => esc_html__('0.1 seconds', 'liberty'),
			'0.2s' => esc_html__('0.2 seconds', 'liberty'),
			'0.3s' => esc_html__('0.3 seconds', 'liberty'),
			'0.4s' => esc_html__('0.4 seconds', 'liberty'),
			'0.5s' => esc_html__('0.5 seconds', 'liberty'),
			'0.6s' => esc_html__('0.6 seconds', 'liberty'),
			'0.7s' => esc_html__('0.7 seconds', 'liberty'),
			'0.8s' => esc_html__('0.8 seconds', 'liberty'),
			'0.9s' => esc_html__('0.9 seconds', 'liberty'),
			'1s' => esc_html__('1 second', 'liberty'),
			'1.1s' => esc_html__('1.1 seconds', 'liberty'),
			'1.2s' => esc_html__('1.2 seconds', 'liberty'),
			'1.3s' => esc_html__('1.3 seconds', 'liberty'),
			'1.4s' => esc_html__('1.4 seconds', 'liberty'),
			'1.5s' => esc_html__('1.5 seconds', 'liberty'),
		);

?>