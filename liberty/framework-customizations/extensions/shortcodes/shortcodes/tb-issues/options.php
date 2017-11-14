<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$pages = liberty_get_posts_admin('page', 1);

$options = array(
    'category' => array(
        'label' => esc_html__('Category', 'liberty'),
        'type'  => 'select',
        'value' => '',
        'choices' => liberty_taxonomy('issues_categories', 1),
    ),
    'show_icons' => array(
        'label' => esc_html__('Show Icons?', 'liberty'),
        'type'  => 'switch',
        'desc'  => 'Only if you choose to show a category list.',
        'value' => 'No',
        'right-choice' => array(
            'value' => 'Yes',
            'label' => esc_html__('Yes', 'liberty'),
        ),
        'left-choice' => array(
            'value' => 'No',
            'label' => esc_html__('No', 'liberty'),
        ),
    ),
    'show_images' => array(
        'label' => esc_html__('Show Images?', 'liberty'),
        'type'  => 'switch',
        'desc'  => 'Only if you choose to show a category list.',
        'value' => 'No',
        'right-choice' => array(
            'value' => 'Yes',
            'label' => esc_html__('Yes', 'liberty'),
        ),
        'left-choice' => array(
            'value' => 'No',
            'label' => esc_html__('No', 'liberty'),
        ),
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
		'label' => esc_html__( 'Number of Items', 'liberty' ),
		'desc'  => esc_html__( 'Number of visible items of the gallery.', 'liberty' ),
        'type'  => 'select',
        'value' => '12',
        'choices' => array(
            '4' => esc_html__( '4 items', 'liberty' ),
            '8' => esc_html__( '8 items', 'liberty' ),
            '12' => esc_html__( '12 items', 'liberty' ),
            '16' => esc_html__( '16 items', 'liberty' ),
            '-1' => esc_html__( 'All', 'liberty' ),
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
    ),
);