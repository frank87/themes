<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
    'title'  => array(
        'label' => esc_html__( 'Block title', 'liberty' ),
        'type'  => 'text',
        'value' => 'View more',
    ),
    'img_spacer' => array(
        'label' => esc_html__('Image spacer', 'liberty'),
        'desc'  => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
        'type'  => 'upload',
    ),
    'button_label'  => array(
        'label' => esc_html__( 'Main Button Label', 'liberty' ),
        'desc'    => esc_html__( 'Events Page Link Button', 'liberty' ),
        'type'  => 'text',
        'value' => 'View Program',
    ),
	'custom_button' => array(
		'type' => 'group',
		'options' => array(
		    'show_custom_button' => array(
		        'type'  => 'switch',
				'label' => esc_html__( '', 'liberty' ),
				'desc'  => esc_html__( 'Show custom button?', 'liberty' ),
		        'value' => 'no',
		        'right-choice' => array(
		            'value' => 'yes',
		            'label' => esc_html__('Yes', 'liberty'),
		        ),
		        'left-choice' => array(
		            'value' => 'no',
		            'label' => esc_html__('No', 'liberty'),
		        ),
		    ),
			'cb_label'   => array(
				'label' => esc_html__( 'Custom Button Label', 'liberty' ),
				'desc' => esc_html__( 'Reservation page, i.e.', 'liberty' ),
				'type'  => 'text',
				'value' => 'Label'
			),
			'cb_link'   => array(
				'label' => esc_html__( 'Link', 'liberty' ),
				'type'  => 'text',
				'value' => '#'
			),
		    'cb_target' => array(
		        'type'  => 'switch',
				'label' => esc_html__( '', 'liberty' ),
				'desc'  => esc_html__( 'Open link in new window?', 'liberty' ),
		        'value' => '_self',
		        'right-choice' => array(
		            'value' => '_blank',
		            'label' => esc_html__('Yes', 'liberty'),
		        ),
		        'left-choice' => array(
		            'value' => '_self',
		            'label' => esc_html__('No', 'liberty'),
		        ),
		    ),
		)
	),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'liberty' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
);