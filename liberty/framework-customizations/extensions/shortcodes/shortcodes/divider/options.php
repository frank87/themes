<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => __( 'Ruler Type', 'liberty' ),
				'desc'    => __( 'Here you can set the styling and size of the HR element', 'liberty' ),
				'choices' => array(
					'line'  => __( 'Line', 'liberty' ),
					'space' => __( 'Whitespace', 'liberty' ),
				)
			)
		),
		'choices'     => array(
			'space' => array(
				'height' => array(
					'label' => __( 'Height', 'liberty' ),
					'desc'  => __( 'How much whitespace do you need? Enter a pixel value. Positive value will increase the whitespace, negative value will reduce it. eg: \'50\', \'-25\', \'200\'', 'liberty' ),
					'type'  => 'text',
					'value' => '50'
				),
			    'special' => array(
			        'label' => esc_html__('Special Look', 'liberty'),
			        'type'  => 'select',
			        'value' => 'no-special-look',
			        'choices' => array(
			        	'no-special-look' => esc_html__('None', 'liberty'),
			        	'title-with-spacer' => esc_html__('Left Spacer', 'liberty'),
			        	'title-with-center-spacer' => esc_html__('Center Spacer', 'liberty'),
			        	'title-with-right-spacer' => esc_html__('Right Spacer', 'liberty')
			        ),
			    )
			)
		)
	)
);
