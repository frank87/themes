<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$options = array(

    'img_settings' => array(
        'type' => 'group',
        'options' => array(
            'upload_img' => array(
                'label' => esc_html__('Image', 'liberty'),
                'desc'  => esc_html__('Upload image', 'liberty'),
                'type'  => 'upload',
            ),
        )
    ),

    'img_size' => array(
        'label' => '',
        'desc'  => esc_html__( 'Select image size', 'liberty' ),
        'type'  => 'radio',
        'value' => 'full',
        'choices' => array(
            'full' => esc_html__('Full', 'liberty'),
            'wide' => esc_html__('Wide (600x300)', 'liberty'),
            'square' => esc_html__('Square (600x600)', 'liberty'),
        ),
    ),

    'position' => array(
        'label' => '',
        'desc'  => esc_html__( 'Select image position', 'liberty' ),
        'type'  => 'radio',
        'value' => 'textaligncenter',
        'choices' => array(
            'textalignleft' => esc_html__('Left', 'liberty'),
            'textaligncenter' => esc_html__('Center', 'liberty'),
            'textalignright' => esc_html__('Right', 'liberty'),
        ),
    ),
    'open_img' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'icon-box-img' => array(
                'label' => esc_html__( 'On Click', 'liberty' ),
                'desc'  =>  esc_html__( 'What happens when you click the image?', 'liberty' ),
                'type'  => 'radio',
                'value' => 'nothing',
                'choices' => array(
                    'nothing' => esc_html__( 'Nothing happens', 'liberty' ),
                    'popup' => esc_html__( 'Open in pop-up', 'liberty' ),
                    'link' => esc_html__( 'Open custom Link', 'liberty' )
                ),
            ),
        ),
        'choices' => array(
            'popup' => array(
                'image_popup' => array(
                    'type'  => 'multi-picker',
                    'label' => false,
                    'desc'  => false,
                    'picker' => array(
                        'icon-box-img' => array(
                            'label' => '',
                            'desc'  => '',
                            'type'  => 'radio',
                            'value' => 'img',
                            'choices' => array(
                                'img' => esc_html__( 'Original image', 'liberty' ),
                                'tb-single-image-icon' => esc_html__( 'Video', 'liberty' )
                            ),
                        ),
                    ),
                    'choices' => array(
                        'tb-single-image-icon' => array(
                            'upload_video' => array(
                                'label' => '',
                                'desc'  => esc_html__('Enter Youtube or Vimeo video URL', 'liberty'),
                                'type'  => 'text',
                            ),
                        ),
                    )
                )
            ),
            'link' => array(
                'custom_link' => array(
                    'label' => '',
                    'desc'  => esc_html__('Enter your custom URL link', 'liberty'),
                    'type'  => 'text'
                ),
                'open' => array(
                    'type'  => 'switch',
                    'value' => '',
                    'label' => '',
                    'desc'  => esc_html__('Open link in new window', 'liberty'),
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
        )
    ),

    'hover_effect' => array(
        'label' => '',
        'desc'  => esc_html__( 'Hover effect', 'liberty' ),
        'type'  => 'radio',
        'value' => 'default',
        'choices' => array(
            'default' => esc_html__('Default', 'liberty'),
            'opacity90' => esc_html__('Opacity', 'liberty')
        ),
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