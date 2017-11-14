<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'shortcode' => array(
        'label' => esc_html__('Enter Shortcode', 'liberty'),
        'type'  => 'text'
    ),
);
