<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array( 
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'liberty' ),
        'desc'  => esc_html__( 'Enter custom CSS class. ID breadcrumbs will be added automatically.', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
);
