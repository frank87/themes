<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$pages = liberty_get_posts_admin('page', 1);

$post_types = array();
$post_types['posts'] = esc_html__( 'Portfolio', 'liberty' );

if (class_exists( 'WooCommerce' )) {
    $post_types['product'] = esc_html__( 'Products', 'liberty' );
    $post_types['product_cat'] = esc_html__( 'Product Categories', 'liberty' );
}

$options = array(
    'post_type' => array(
        'label' => esc_html__( 'Choose Type', 'liberty' ),
        'type'  => 'select',
        'value' => '',
        'choices' => $post_types
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

	'item_number'   => array(
		'label' => esc_html__( 'Number of Columns', 'liberty' ),
		'desc'  => esc_html__( 'Number of visible items of carousel.', 'liberty' ),
		'type'  => 'switch',
		'value' => '4',
        'right-choice' => array(
            'value' => '4',
            'label' => esc_html__( '4 Items', 'liberty' )
        ),
        'left-choice'  => array(
            'value' => '5',
            'label' => esc_html__( '5 Items', 'liberty' )
        ),  
	),

    'show_caption' => array(
        'label' => esc_html__('Position of the Caption Block?', 'liberty'),
        'type'  => 'select',
        'value' => 'centered',
        'choices' => array(
            'hidden' => esc_html__('Hidden', 'liberty'),
            'centered' => esc_html__('Centered', 'liberty'),
            'left' => esc_html__('Left Aligned', 'liberty'),
        ),
    ),
    
    'background_options' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'background' => array(
                'label' => esc_html__('Background', 'liberty'),
                'desc'  => esc_html__('Select the background for your caption area', 'liberty'),
                'type'  => 'radio',
                'choices' => array(
                    'none'    => esc_html__('None', 'liberty'),
                    'image'   => esc_html__('Image + Color', 'liberty'),
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
                    'choices' => array(//   in future may will set predefined images
                    )
                ),
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
    'caption_img' => array(
        'label' => esc_html__('Logo', 'liberty'),
        'desc'  => esc_html__('Upload image - 300x430 max, please', 'liberty'),
        'type'  => 'upload',
    ),
    'color' => array(
        'label' => esc_html__('Caption and Title Color', 'liberty'),
        'value'   => '#ffffff',
        'type'    => 'color-picker'
    ),
    'a_color' => array(
        'label' => esc_html__('Caption Link Color', 'liberty'),
        'value'   => '#ffffff',
        'type'    => 'color-picker'
    ),
    'caption_text' => array(
        'label' => esc_html__('Caption', 'liberty'),
        'value'   => '',
        'type'    => 'text'
    ),
    'view_more_text' => array(
        'label' => esc_html__('View More Text', 'liberty'),
        'value'   => 'View More',
        'type'    => 'text'
    ),
    'caption_page' => array(
        'label' => esc_html__('View More Link', 'liberty'),
        'desc' => esc_html__('Leave blank if you don\'t want to show link', 'liberty'),
        'type'  => 'select',
        'choices' => $pages,
        'value' => '',
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