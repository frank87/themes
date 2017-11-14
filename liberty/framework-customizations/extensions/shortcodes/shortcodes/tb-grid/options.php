<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'post_type_select' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'post_type' => array(
                'label' => esc_html__( 'Choose Post Type', 'liberty' ),
                'type'  => 'select',
                'value' => 'issue',
                'choices' => array(
                    'post' => esc_html__( 'Posts', 'liberty' ),
                    'issue' => esc_html__( 'Issues', 'liberty' )
                ),
            ),
        ),
        'choices' => array(
            'post' => array(
                'taxonomy' => array(
                    'label' => esc_html__('Choose category', 'liberty'),
                    'desc'  => esc_html__('Leave blank to show all', 'liberty'),
                    'type'  => 'select',
                    'value' => '',
                    'choices' => liberty_taxonomy('category', 1),
                )
            ),
            'issue' => array(
                'taxonomy' => array(
                    'label' => esc_html__('Choose category', 'liberty'),
                    'desc'  => esc_html__('Leave blank to show all', 'liberty'),
                    'type'  => 'select',
                    'value' => '',
                    'choices' => liberty_taxonomy('issues_categories', 1),
                )
            ),
        )
    ),
    'order' => array(
        'label' => esc_html__('Order of posts', 'liberty'),
        'type'  => 'select',
        'value' => 'date-DESC',
        'choices' => array(
            'date-DESC' => esc_html__('Descending by date', 'liberty'),
            'date-ASC' => esc_html__('Ascending by date', 'liberty'),
            'order-DESC' => esc_html__('Descending by order', 'liberty'),
            'order-ASC' => esc_html__('Ascending by order', 'liberty'),
            'rand' => esc_html__('Random Order', 'liberty')
        ),
    ),
    'grid_type' => array(
        'label' => esc_html__('Type of Grid', 'liberty'),
        'type'  => 'select',
        'value' => '10',
        'choices' => array(
            '10' => esc_html__('10 - with title', 'liberty'),
            '8' => esc_html__('8 - no title', 'liberty')
        ),
    ),
    'text_color' => array(
        'label' => esc_html__('Color', 'liberty'),
        'desc'    => esc_html__( 'Select the color of titles and text', 'liberty' ),
        'value'   => '#ffffff',
        'type'    => 'color-picker'
    ),
    'background_color' => array(
        'label' => esc_html__('Background color', 'liberty'),
        'desc'    => esc_html__( 'It will be used for content holder', 'liberty' ),
        'value'   => '#281a70',
        'type'    => 'color-picker'
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
                    'value'   => '#000000',
                    'type'    => 'color-picker'
                ),
                'overlay_opacity_image' => array(
                    'type'  => 'slider',
                    'value' => 30,
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
    'main_title'  => array(
        'label' => esc_html__( 'Main Title', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
    'main_subtitle'  => array(
        'label' => esc_html__( 'Main Subtitle', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
    'title_color' => array(
        'label' => esc_html__('Title Color', 'liberty'),
        'desc'    => esc_html__( 'Select the color of the main title area', 'liberty' ),
        'value'   => '#ffffff',
        'type'    => 'color-picker'
    ),
    'title_background' => array(
        'label' => esc_html__('Title - Background color', 'liberty'),
        'desc'    => esc_html__( 'It will be used for title holder', 'liberty' ),
        'value'   => '#B2081D',
        'type'    => 'color-picker'
    ),
    'title_padding'  => array(
        'label' => esc_html__('Padding', 'liberty'),
        'type'  => 'slider',
        'value' => 30,
        'properties' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        )
    ),
    'title_margin'  => array(
        'label' => esc_html__('Margin', 'liberty'),
        'type'  => 'slider',
        'value' => 30,
        'properties' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        )
    ),
    'with_border' => array(
        'type'  => 'switch',
        'label' => esc_html__( 'Show Title Border', 'liberty' ),
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
    )
);

?>