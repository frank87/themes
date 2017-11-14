<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => esc_html__( 'Page Options', 'liberty' ),
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

		),
	),
);