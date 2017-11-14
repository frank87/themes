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
                'value' => '',
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
	'posts_number'   => array(
		'label' => esc_html__( 'Number of Posts', 'liberty' ),
		'desc'  => esc_html__( 'Enter the number of posts to display (maximum is 50)', 'liberty' ),
		'type'  => 'short-text',
		'value' => get_option('posts_per_page')
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