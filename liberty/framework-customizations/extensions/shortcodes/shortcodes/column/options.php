<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}


$admin_url = admin_url();

$options = array(
	'default_padding' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Default Spacing', 'liberty' ),
		'desc'  => esc_html__( 'Use default left and right spacing?', 'liberty' ),
		'help'  => esc_html__( "Default left and right spacings are set to 15px", 'liberty' ),
        'value' => 'use-default-padding',
        'right-choice' => array(
            'value' => 'use-default-padding',
            'label' => esc_html__('Yes', 'liberty'),
        ),
        'left-choice' => array(
            'value' => 'nopadding-left-right',
            'label' => esc_html__('No', 'liberty'),
        ),
	),


	'padding_group' => array(
		'type' => 'group',
		'options' => array(
			'html_label'  => array(
				'type'  => 'html',
				'value' => '',
				'label' => esc_html__('Additional Spacing', 'liberty'),
				'html'  => '',
			),
			'padding_top'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'top', 'liberty' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_right'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'right', 'liberty' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_bottom'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'bottom', 'liberty' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_left'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'left', 'liberty' ),
				'type'  => 'short-text',
				'value' => '0',
			),
		)
	),
    'is_centered' => array(
        'label' => esc_html__('Centered Content', 'liberty'),
        'type'  => 'switch',
        'desc'  => 'Everything will be positioned in the absolute center of the block',
        'value' => 'noabsolutecenter',
        'right-choice' => array(
            'value' => 'absolutecenter',
            'label' => esc_html__('Yes', 'liberty'),
        ),
        'left-choice' => array(
            'value' => 'noabsolutecenter',
            'label' => esc_html__('No', 'liberty'),
        ),
    ),

    'background_options' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'background' => array(
                'label' => esc_html__('Background', 'liberty'),
                'desc'  => esc_html__('Select the background for your column', 'liberty'),
                'type'  => 'radio',
                'choices' => array(
                    'none'  => esc_html__('None', 'liberty'),
                    'image' => esc_html__('Image', 'liberty'),
                    'color' => esc_html__('Color', 'liberty'),
                ),
                'value' => 'none'
            ),
        ),
        'choices' => array(
            'none' => array(),
            'color' => array(
                'background_color' => array(
                    'label' => esc_html__('', 'liberty'),
                    'desc'    => esc_html__( 'Select the background color', 'liberty' ),
                    'value'   => '',
                    'type'    => 'color-picker'
                ),
            ),
            'image' => array(
                'background_image' => array(
                    'label'   => esc_html__( '', 'liberty' ),
                    'type'    => 'background-image',
                    'choices' => array(//	in future may will set predefined images
                    )
                ),
                'background_color' => array(
                    'label' => esc_html__('', 'liberty'),
                    'desc'    => esc_html__( 'Select the background color', 'liberty' ),
                    'value'   => '',
                    'type'    => 'color-picker'
                ),
                'repeat' => array(
                    'label' => esc_html__( '', 'liberty' ),
                    'desc'  => esc_html__( 'Select how will the background repeat', 'liberty' ),
                    'type'  => 'short-select',
                    'value' => 'no-repeat',
                    'choices' => array(
                        'no-repeat' => esc_html__( 'No-Repeat', 'liberty' ),
                        'repeat' => esc_html__( 'Repeat', 'liberty' ),
                        'repeat-x' => esc_html__( 'Repeat-X', 'liberty' ),
                        'repeat-y' => esc_html__( 'Repeat-Y', 'liberty' ),
                    )
                ),
                'bg_position_x' => array(
                    'label' => esc_html__( 'Position', 'liberty' ),
                    'desc'  => esc_html__( 'Select the horizontal background position', 'liberty' ),
                    'type'  => 'short-select',
                    'value' => 'center',
                    'choices' => array(
                        'left' => esc_html__( 'Left', 'liberty' ),
                        'center' => esc_html__( 'Center', 'liberty' ),
                        'right' => esc_html__( 'Right', 'liberty' ),
                    )
                ),
                'bg_position_y' => array(
                    'label' => esc_html__( '', 'liberty' ),
                    'desc'  => esc_html__( 'Select the vertical background position', 'liberty' ),
                    'type'  => 'short-select',
                    'value' => 'center',
                    'choices' => array(
                        'top' => esc_html__( 'Top', 'liberty' ),
                        'center' => esc_html__( 'Center', 'liberty' ),
                        'bottom' => esc_html__( 'Bottom', 'liberty' ),
                    )
                ),
                'bg_size' => array(
                    'label' => esc_html__( 'Size', 'liberty' ),
                    'desc'  => esc_html__( 'Select the background size', 'liberty' ),
                    'help'  => esc_html__( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'liberty' ),
                    'type'  => 'short-select',
                    'value' => 'cover',
                    'choices' => array(
                        'auto' => esc_html__( 'Auto', 'liberty' ),
                        'cover' => esc_html__( 'Cover', 'liberty' ),
                        'contain' => esc_html__( 'Contain', 'liberty' ),
                    )
                ),

            ),
        ),
        'show_borders' => false,
    ),
    'column_color' => array(
        'label' => esc_html__('Column Color', 'liberty'),
        'desc'    => esc_html__( 'Select the column color', 'liberty' ),
        'value'   => '',
        'type'    => 'color-picker'
    ),
    /*
    'change_link_colors' => array(
        'type'  => 'switch',
        'label' => esc_html__( 'Set Link Colors', 'liberty' ),
        'desc'  => esc_html__( 'Do you want to set specific link colors?', 'liberty' ),
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
    'column_link_color' => array(
        'label' => esc_html__('Link Color', 'liberty'),
        'desc'    => esc_html__( 'Select the link color', 'liberty' ),
        'value'   => '',
        'type'    => 'color-picker'
    ),
    'column_link_color_hover' => array(
        'label' => esc_html__('Link Color - Hover', 'liberty'),
        'desc'    => esc_html__( 'Select the link color - hover state', 'liberty' ),
        'value'   => '',
        'type'    => 'color-picker'
    ),*/
	'tablet'  => array(
		'label' => esc_html__( 'Responsive Layout for Tablet', 'liberty' ),
		'desc'  => esc_html__( 'Choose the responsive tablet display for this column', 'liberty' ),
		'help'  => esc_html__( 'Use this option in order to control how this column behaves on tablets (and devices with the resoution between 768px - 990px).', 'liberty' ),
		'type'  => 'select',
		'value' => '',
		'choices' => array(
			''             => esc_html__( 'Default layout', 'liberty' ),
            'col-sm-2'  => esc_html__( 'Make it a 1/6 column', 'liberty' ),
            'col-sm-3'  => esc_html__( 'Make it a 1/4 column', 'liberty' ),
            'col-sm-4'  => esc_html__( 'Make it a 1/3 column', 'liberty' ),
            'col-sm-6'  => esc_html__( 'Make it a 1/2 column', 'liberty' ),
            'col-sm-8'  => esc_html__( 'Make it a 2/3 column', 'liberty' ),
            'col-sm-9'  => esc_html__( 'Make it a 3/4 column', 'liberty' ),
            'col-sm-12' => esc_html__( 'Make it a 1/1 column', 'liberty' ),
		)
	),


    'myid'  => array(
        'label' => esc_html__( 'Custom ID', 'liberty' ),
        'desc'  => esc_html__( 'Enter custom ID', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'liberty' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
);

?>