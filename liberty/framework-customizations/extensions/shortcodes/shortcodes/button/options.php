<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'  => array(
		'label' => esc_html__( 'Label', 'liberty' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'liberty' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'btn_link_group' => array(
		'type' => 'group',
		'options' => array(
			'link'   => array(
				'label' => esc_html__( 'Link', 'liberty' ),
				'desc'  => esc_html__( 'Where should your button link to?', 'liberty' ),
				'type'  => 'text',
				'value' => '#'
			),
		    'target' => array(
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
	'btn_style'  => array(
        'label' => esc_html__( 'Style', 'liberty' ),
        'desc'  => esc_html__( 'Choose button style', 'liberty' ),
        'type'  => 'radio',
        'value' => 'btn-tb-primary',
        'choices' => $GLOBALS['button_type']
    ),
    'btn_size'  => array(
        'label' => esc_html__( 'Size', 'liberty' ),
        'desc'  => esc_html__( 'Choose button size', 'liberty' ),
        'type'  => 'radio',
        'value' => 'btn-default-size',
        'choices' => $GLOBALS['button_size']
    ),
    'btn_width'  => array(
        'label' => esc_html__( 'Width', 'liberty' ),
        'desc'  => esc_html__( 'Choose button width', 'liberty' ),
        'type'  => 'radio',
        'value' => 'default',
        'choices' => $GLOBALS['button_width']
    ),
    'btn_alignment' => array(
        'label' => esc_html__( 'Alignment', 'liberty' ),
        'desc'  => esc_html__( 'Choose button alignment', 'liberty' ),
        'type'  => 'radio',
        'value' => 'default_text_align',
        'choices' => $GLOBALS['text_align']
    ),
    'btn_inline_alignment' => array(
        'label' => esc_html__( 'Inline Alignment', 'liberty' ),
        'desc'  => esc_html__( 'Choose button inline alignment', 'liberty' ),
        'type'  => 'radio',
        'value' => 'default_float_align',
        'choices' => $GLOBALS['float_align']
    ),
	'btn_padding'  => array(
		'label' => esc_html__( 'Padding', 'liberty' ),
		'desc'  => esc_html__( 'Top/Bottom', 'liberty' ),
		'type'  => 'short-text',
		'value' => '10'
	),
    'btn_icon_group' => array(
	    'type' => 'group',
	    'options' => array(
		    'icon' => array(
		        'type'  => 'icon',
		        'label' => esc_html__( 'Icon', 'liberty' )
		    ),
		    'icon_position' => array(
		        'type'  => 'switch',
		        'label' => esc_html__( '', 'liberty' ),
		        'desc'  => esc_html__( 'Choose the icon position', 'liberty' ),
		        'right-choice' => array(
			        'value' => 'pull-right',
			        'label' => esc_html__('Right', 'liberty'),
		        ),
		        'left-choice' => array(
			        'value' => '',
			        'label' => esc_html__('Left', 'liberty'),
		        ),
		    ),
	    )
    ),


    'animation_group' => array(
        'type' => 'group',
        'options' => array(
            'animation_effect'  => array(
                'type'  => 'select',
                'value' => 'none',
                'label' => esc_html__('Animation Effect', 'liberty'),
                'choices' => $GLOBALS['animation_select']
            ),
            'animation_delay'  => array(
                'type'  => 'select',
                'value' => '0',
                'label' => esc_html__('Animation Delay', 'liberty'),
                'choices' => $GLOBALS['animation_delay']
            )
        )
    ),

    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'liberty' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
);