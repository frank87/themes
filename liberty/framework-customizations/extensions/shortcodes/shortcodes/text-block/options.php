<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'    => 'wp-editor',
		'tinymce' => true,
		'reinit'  => true,
		'wpautop' => false,
		'label'   => esc_html__( 'Content', 'liberty' ),
		'desc'    => esc_html__( 'Enter some content for this texblock', 'liberty' )
	),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'liberty' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
);
