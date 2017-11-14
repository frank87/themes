<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$admin_url = admin_url();
$template_directory = get_template_directory_uri();

$options = array(

    'box-alignment' => array(
        'label' => esc_html__('Box Alignment', 'liberty'),
        'type'  => 'select',
        'value' => 'textalignleft',
        'choices' => array(
            'textalignleft' => esc_html__('Left', 'liberty'),
            'textaligncenter' => esc_html__('Center', 'liberty'),
            'textalignright' => esc_html__('Right', 'liberty'),
        ),
    ),
    'box-title' => array(
        'label' => esc_html__('Title', 'liberty'),
        'desc'  => esc_html__('Enter the icon box title', 'liberty'),
        'type'  => 'text',
    ),
    'heading-type' => array(
        'label' => esc_html__('Title Heading', 'liberty'),
        'type'  => 'select',
        'value' => 'h1',
        'choices' => array(
            'h1' => esc_html__('H1', 'liberty'),
            'h2' => esc_html__('H2', 'liberty'),
            'h3' => esc_html__('H3', 'liberty'),
            'h4' => esc_html__('H4', 'liberty'),
            'h5' => esc_html__('H5', 'liberty'),
            'h6' => esc_html__('H6', 'liberty'),
        ),
    ),

    'box-subtitle' => array(
        'label' => esc_html__('Subtitle', 'liberty'),
        'desc'  => esc_html__('Enter the icon box subtitle', 'liberty'),
        'type'  => 'text',
    ),
    'subheading-type' => array(
        'label' => esc_html__('Subitle Heading', 'liberty'),
        'type'  => 'select',
        'value' => 'h3',
        'choices' => array(
            'h1' => esc_html__('H1', 'liberty'),
            'h2' => esc_html__('H2', 'liberty'),
            'h3' => esc_html__('H3', 'liberty'),
            'h4' => esc_html__('H4', 'liberty'),
            'h5' => esc_html__('H5', 'liberty'),
            'h6' => esc_html__('H6', 'liberty'),
        ),
    ),
    'box-desc' => array(
        'label' => esc_html__('Description', 'liberty'),
        'desc'  => esc_html__('Enter the icon box description', 'liberty'),
        'type'    => 'wp-editor',
        'tinymce' => true,
        'reinit'  => true,
        'wpautop' => false,
    ),
    'link'   => array(
        'label' => esc_html__( 'Link', 'liberty' ),
        'desc'  => esc_html__( 'Please add link if you want to link titles and icons?', 'liberty' ),
        'type'  => 'text',
        'value' => '#'
    ),
    'full_link' => array(
        'type'  => 'switch',
        'label'   => esc_html__( '', 'liberty' ),
        'desc'    => esc_html__( 'Make complete box clickable?', 'liberty' ),
        'value' => 'no',
        'right-choice' => array(
            'value' => 'absolute100',
            'label' => esc_html__('Yes', 'liberty'),
        ),
        'left-choice' => array(
            'value' => 'no',
            'label' => esc_html__('No', 'liberty'),
        ),
    ),
    'target' => array(
        'type'  => 'switch',
        'label'   => esc_html__( '', 'liberty' ),
        'desc'    => esc_html__( 'Open link in new window?', 'liberty' ),
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
    'icon-type-picker' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'icon-box-type' => array(
                'label' => esc_html__('Style', 'liberty'),
                'type'  => 'select',
                'value' => 'above',
                'desc'  => esc_html__('Choose the icon box style', 'liberty'),
                'choices' => array(
                    'above' => esc_html__('Above', 'liberty'),
                    'inline' => esc_html__('Inline', 'liberty'),
                ),
            ),
        ),
        'choices' => array(
            'inline' => array(
                'icon-position' => array(
                    'type'  => 'switch',
                    'value' => '',
                    'label' => esc_html__('Icon Position', 'liberty'),
                    'desc'  => esc_html__('Select your prefered icon position', 'liberty'),
                    'left-choice' => array(
                        'value' => 'alignleft',
                        'label' => esc_html__('Left', 'liberty'),
                    ),
                    'right-choice' => array(
                        'value' => 'alignright',
                        'label' => esc_html__('Right', 'liberty'),
                    )
                ),
            )
        )
    ),

    'icon-type' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'icon-box-img' => array(
                'label' => esc_html__( 'Icon', 'liberty' ),
                'desc'  => esc_html__('Select icon type','liberty'),
                'type'  => 'radio',
                'value' => 'icon-class',
                'choices' => array(
                    'icon-class' => esc_html__( 'Font Awesome', 'liberty' ),
                    'upload-icon' => esc_html__( 'Custom Upload', 'liberty' ),
                    'skip' => esc_html__( 'No Icon', 'liberty' ),
                ),
            ),
        ),
        'choices' => array(
            'icon-class' => array(
                'icon_class' => array(
                    'type' => 'icon',
                    'value' => '',
                    'label' => '',
                ),
                'icon-color' => array(
                    'label' => esc_html__('Icon Color','liberty'),
                    'desc' => esc_html__('Select icon color','liberty'),
                    'value'   => '',
                    'type'    => 'color-picker'
                ),
                'icon-bg-type' => array(
                    'type'  => 'multi-picker',
                    'label' => false,
                    'desc'  => false,
                    'picker' => array(
                        'icon-box-img' => array(
                            'label' => esc_html__( 'Background', 'liberty' ),
                            'desc'  => esc_html__( 'Select the background type', 'liberty' ),
                            'type'  => 'radio',
                            'value' => 'bg-none',
                            'choices' => array(
                                'bg-none' => esc_html__( 'None', 'liberty' ),
                                'icon-rounded' => esc_html__( 'Square', 'liberty' ),
                                'icon-circle' => esc_html__( 'Circle', 'liberty' )
                            ),
                        ),
                    ),
                    'choices' => array(
                        'icon-rounded' => array(
                            'bg-color' => array(
                                'label'   => esc_html__('', 'liberty'),
                                'desc' => esc_html__('Select icon background color','liberty'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            )
                        ),
                        'icon-circle' => array(
                            'bg-color' => array(
                                'label'   => esc_html__('', 'liberty'),
                                'desc' => esc_html__('Select icon background color','liberty'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            )
                        )
                    )
                )
            ),
            'upload-icon' => array(
                'upload-custom-img' => array(
                    'label' => '',
                    'type'  => 'upload',
                ),
                'rounded' => array(
                    'type'  => 'switch',
                    'value' => 'img-rounded',
                    'label' => '',
                    'desc'  => esc_html__('Make the image circle?', 'liberty'),
                    'left-choice' => array(
                        'value' => 'img-rounded',
                        'label' => esc_html__('No', 'liberty'),
                    ),
                    'right-choice' => array(
                        'value' => 'img-circle',
                        'label' => esc_html__('Yes', 'liberty'),
                    )
                ),
            ),
        )
    ),

    'icon-box-btn' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'show_btn' => array(
                'type'  => 'switch',
                'value' => 'no',
                'label' => esc_html__('Button', 'liberty'),
                'desc'  => esc_html__('Show button?', 'liberty'),
                'left-choice' => array(
                    'value' => 'no',
                    'label' => esc_html__('No', 'liberty'),
                ),
                'right-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__('Yes', 'liberty'),
                )
            ),
        ),
        'choices' => array(
            'yes' => array(
                'label'  => array(
                    'label' => esc_html__( 'Label', 'liberty' ),
                    'desc'  => esc_html__( 'This is the text that appears on your button', 'liberty' ),
                    'type'  => 'text',
                    'value' => 'Submit'
                ),
                'link'   => array(
                    'label' => esc_html__( 'Link', 'liberty' ),
                    'desc'  => esc_html__( 'Where should your button link to ?', 'liberty' ),
                    'type'  => 'text',
                    'value' => '#'
                ),
                'target' => array(
                    'type'  => 'switch',
                    'label'   => esc_html__( '', 'liberty' ),
                    'desc'    => esc_html__( 'Open link in new window?', 'liberty' ),
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
                'btn_size'  => array(
                    'label' => esc_html__( 'Size', 'liberty' ),
                    'desc'  => esc_html__( 'Choose button size', 'liberty' ),
                    'type'  => 'radio',
                    'value' => 'btn-default-size',
                    'choices' => $GLOBALS['button_size']
                ),
                'btn_style'  => array(
                    'label' => esc_html__( 'Style', 'liberty' ),
                    'desc'  => esc_html__( 'Choose button style', 'liberty' ),
                    'type'  => 'radio',
                    'value' => 'btn-tb-primary',
                    'choices' => $GLOBALS['button_type']
                ),
                'btn_alignment' => array(
                    'label' => esc_html__( 'Alignment', 'liberty' ),
                    'desc'  => esc_html__( 'Choose button alignment', 'liberty' ),
                    'type'  => 'radio',
                    'value' => 'textalignleft',
                    'choices' => array(
                        'textalignleft' => esc_html__( 'Left', 'liberty' ),
                        'textaligncenter' => esc_html__( 'Center', 'liberty' ),
                        'textalignright' => esc_html__( 'Right', 'liberty' ),
                    ),
                ),
            )
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