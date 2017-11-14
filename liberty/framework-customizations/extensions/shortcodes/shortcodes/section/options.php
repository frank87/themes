<?php if (!defined('FW')) {
	die('Forbidden');
}

$admin_url = admin_url();

$options = array(
	'is_boxed' => array(
		'label' => esc_html__('Boxed Content', 'liberty'),
		'type'  => 'switch',
		'desc'  => 'Make the content inside this section to be boxed?',
		'value' => 'Yes',
		'right-choice' => array(
			'value' => 'Yes',
			'label' => esc_html__('Yes', 'liberty'),
		),
		'left-choice' => array(
			'value' => 'No',
			'label' => esc_html__('No', 'liberty'),
		),
	),
	'is_stretched' => array(
		'label' => esc_html__('Stretched Content', 'liberty'),
		'type'  => 'switch',
		'desc'  => 'Use the same height for all inside elements',
		'value' => 'nostretch',
		'right-choice' => array(
			'value' => 'absolutecenter-stretch',
			'label' => esc_html__('Yes', 'liberty'),
		),
		'left-choice' => array(
			'value' => 'nostretch',
			'label' => esc_html__('No', 'liberty'),
		),
	),
	'section_padding' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Padding Section?', 'liberty' ),
		'desc'  => esc_html__( 'Left and Right spacing.', 'liberty' ),
		'value' => 'nopadding-left-right',
		'right-choice' => array(
			'value' => 'use-default-padding',
			'label' => esc_html__('Yes', 'liberty'),
		),
		'left-choice' => array(
			'value' => 'nopadding-left-right',
			'label' => esc_html__('No', 'liberty'),
		),
	),
	'padding'  => array(
		'label' => esc_html__( 'Section Padding', 'liberty' ),
		'desc'  => esc_html__( 'Top and Bottom spacing. Enter the section padding value in pixels (i.e: 100)', 'liberty' ),
		'help'  => esc_html__( 'Value in px.', 'liberty' ),
		'type'  => 'text',
		'value' => '',
	),
	'margin_bottom'   => array(
		'label' => esc_html__('Section Overlap', 'liberty'),
		'desc'  => esc_html__('Enter the section overlap value in pixels (i.e: 100)', 'liberty'),
		'help'  => esc_html__('The content that follows will overlap this section with the specified pixel amount.', 'liberty'),
		'type'  => 'text',
		'value' => '',
	),
	
	'background_options' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'background' => array(
				'label' => esc_html__('Background', 'liberty'),
				'desc'  => esc_html__('Select the background for your section', 'liberty'),
				'type'  => 'radio',
				'choices' => array(
					'none'    => esc_html__('None', 'liberty'),
					'image'   => esc_html__('Image', 'liberty'),
					'slider'   => esc_html__('Slider', 'liberty'),
					'video'   => esc_html__('Video', 'liberty'),
					'color'   => esc_html__('Color', 'liberty'),
				),
				'value' => 'none'
			),
		),
		'choices' => array(
			'none' => array(),
			'image' => array(
				'background_image' => array(
					'label'   => esc_html__( '', 'liberty' ),
					'type'    => 'background-image',
					'choices' => array(//	in future may will set predefined images
					)
				),
				'background_color' => array(
                    'label'   => esc_html__('', 'liberty'),
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
				'attachment' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Background Attachment', 'liberty' ),
					'value' => 'scroll',
					'right-choice' => array(
						'value' => 'scroll',
						'label' => esc_html__('Scroll', 'liberty'),
					),
					'left-choice' => array(
						'value' => 'fixed',
						'label' => esc_html__('Fixed', 'liberty'),
					),
				),
				'parallax' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Parallax Effect', 'liberty' ),
					'desc'  => esc_html__( 'Create a parallax effect on scroll?', 'liberty' ),
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
				'overlay_options' => array(
					'type'  => 'multi-picker',
					'label' => false,
					'desc'  => false,
					'picker' => array(
						'overlay' => array(
							'type'  => 'switch',
							'label' => esc_html__( 'Overlay Color', 'liberty' ),
							'desc'  => esc_html__( 'Enable image overlay color?', 'liberty' ),
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
					),
					'choices' => array(
						'no'  => array(),
						'yes' => array(
                            'background' => array(
                                'label'   => esc_html__('', 'liberty'),
                                'desc'  => esc_html__('Select the overlay color', 'liberty'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            ),
							'overlay_opacity_image' => array(
								'type'  => 'slider',
								'value' => 100,
								'properties' => array(
									'min' => 0,
									'max' => 100,
									'sep' => 1,
								),
								'label' => esc_html__('', 'liberty'),
								'desc'  => esc_html__('Select the overlay color opacity in %', 'liberty'),
							)
						),
					),
				),
			),
			'slider' => array(
				'background_image' => array(
					'label'   => esc_html__( 'Background Image 1', 'liberty' ),
					'type'    => 'background-image',
					'choices' => array(//	in future may will set predefined images
					)
				),
				'background_image2' => array(
					'label'   => esc_html__( 'Background Image 2', 'liberty' ),
					'type'    => 'background-image',
					'choices' => array(//	in future may will set predefined images
					)
				),
				'background_image3' => array(
					'label'   => esc_html__( 'Background Image 3', 'liberty' ),
					'type'    => 'background-image',
					'choices' => array(//	in future may will set predefined images
					)
				),
				'overlay_options' => array(
					'type'  => 'multi-picker',
					'label' => false,
					'desc'  => false,
					'picker' => array(
						'overlay' => array(
							'type'  => 'switch',
							'label' => esc_html__( 'Overlay Color', 'liberty' ),
							'desc'  => esc_html__( 'Enable image overlay color?', 'liberty' ),
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
					),
					'choices' => array(
						'no'  => array(),
						'yes' => array(
                            'background' => array(
                                'label'   => esc_html__('', 'liberty'),
                                'desc'  => esc_html__('Select the overlay color', 'liberty'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            ),
							'overlay_opacity_slider' => array(
								'type'  => 'slider',
								'value' => 100,
								'properties' => array(
									'min' => 0,
									'max' => 100,
									'sep' => 1,
								),
								'label' => esc_html__('', 'liberty'),
								'desc'  => esc_html__('Select the overlay color opacity in %', 'liberty'),
							)
						),
					),
				),
			),
			'video' => array(
				'video' => array(
					'label' => esc_html__('', 'liberty'),
					'desc'  => esc_html__('Insert a YouTube or Vimeo video URL', 'liberty'),
					'type'  => 'text',
				),
				'overlay_options' => array(
					'type'  => 'multi-picker',
					'label' => false,
					'desc'  => false,
					'picker' => array(
						'overlay' => array(
							'type'  => 'switch',
							'label' => esc_html__( 'Overlay Color', 'liberty' ),
							'desc'  => esc_html__( 'Enable video overlay color?', 'liberty' ),
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
					),
					'choices' => array(
						'no'  => array(),
						'yes' => array(
                            'background' => array(
                                'label'   => esc_html__('', 'liberty'),
                                'desc'    => esc_html__('Select the overlay color', 'liberty'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            ),
							'overlay_opacity_video' => array(
								'type'  => 'slider',
								'value' => 100,
								'properties' => array(
									'min' => 0,
									'max' => 100,
									'sep' => 1,
								),
								'label' => esc_html__('', 'liberty'),
                                'desc'  => esc_html__('Select the overlay color opacity in %', 'liberty'),
							)
						),
					),
				),
			),
			'color' => array(
				'background_color' => array(
                    'label'   => esc_html__('', 'liberty'),
                    'desc'    => esc_html__( 'Select the background color', 'liberty' ),
                    'value'   => '',
                    'type'    => 'color-picker'
				),
			),
		),
		'show_borders' => false,
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