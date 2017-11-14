<?php if (!defined('FW')) die('Forbidden');


$revSliders = tb_get_rev_sliders();

$options = array(
	'main' => array(
		'title'   => esc_html__( 'Portfolio Options', 'liberty' ),
		'type'    => 'box',
		'options' => array(			
			'featured_title'=> array(
				'label' => esc_html__( 'Extra title', 'liberty' ),
				'desc' => esc_html__( 'It will be shown on the promo image area', 'liberty' ),
				'type'  => 'text',
				'value' => '',
			),			
			'featured_subtitle'=> array(
				'label' => esc_html__( 'Extra subtitle', 'liberty' ),
				'desc' => esc_html__( 'It will be shown on the promo image area', 'liberty' ),
				'type'  => 'text',
				'value' => '',
			),
			'thumbnail_type'                    => array(
				'label'        => esc_html__( 'Thumbnail Type?', 'liberty' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'circle',
					'label' => esc_html__( 'Circle', 'liberty' )
				),
				'left-choice'  => array(
					'value' => 'regular',
					'label' => esc_html__( 'Regular', 'liberty' )
				),
				'value'        => 'circle'
			),
			'video_switch'                    => array(
				'label'        => esc_html__( 'Show video instead gallery?', 'liberty' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'liberty' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'liberty' )
				),
				'value'        => 'no'
			),				
			'video_url'=> array(
				'label' => esc_html__( 'Video URL', 'liberty' ),
				'type'  => 'text',
				'value' => esc_html__('', 'liberty'),
			),
		),
	),
	'side' => array(
		'title' => esc_html__( 'Header Image', 'liberty' ),
		'type'  => 'box',
		'context' => 'side',
		'priority' => 'low',
		'options' => array(	
			'header_image' => array(
				'label' => esc_html__( 'Add Image', 'liberty' ),
				'desc'  => esc_html__( 'Upload header image', 'liberty' ),
				'type'  => 'upload',			
			),
			'featured_height'=> array(
				'label' => esc_html__( 'Promo Image Height', 'liberty' ),
				'type'  => 'short-text',
				'value' => '300',
			),
		    'slider' => array(
		        'label' => esc_html__('Choose slider', 'liberty'),
		        'type'  => 'select',
		        'value' => '0',
		        'choices' => $revSliders,
		    )
		),
	),
);