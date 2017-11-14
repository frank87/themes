<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$pages = liberty_get_posts_admin('page', 1);

$options = array(
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
    'thumbnail_type'                    => array(
        'label'        => esc_html__( 'Thumbnail Type?', 'liberty' ),
        'type'         => 'switch',
        'right-choice' => array(
            'value' => 'circle',
            'label' => esc_html__( 'Circle', 'liberty' )
        ),
        'left-choice'  => array(
            'value' => 'regular',
            'label' => esc_html__( 'Regular', 'liberty' )
        ),
        'value'        => 'circle'
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