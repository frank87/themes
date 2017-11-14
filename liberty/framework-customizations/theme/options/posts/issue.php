<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'main' => array(
		'title'   => esc_html__( 'Issue Options', 'liberty' ),
		'type'    => 'box',
		'options' => array(
			'slogan'=> array(
				'label' => esc_html__( 'Slogan', 'liberty' ),
				'desc' => esc_html__( 'It will be shown on some shortcodes of page builder (posts grid, i.e.)', 'liberty' ),
				'type'  => 'text',
			),				
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
			'featured_switch'                    => array(
				'label'        => esc_html__( 'Show featured image below title?', 'liberty' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'liberty' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'liberty' )
				),
				'value'        => 'yes'
			),	
			'issue_icon' => array(
				'label' => esc_html__( 'Issue Icon', 'liberty' ),
				'desc'  => esc_html__( 'It will be used for page builder.', 'liberty' ),
				'type'  => 'upload',			
			),
		),
	),
	'side' => array(
		'title' => esc_html__( 'Header Image ', 'liberty' ),
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
		),
	),
);