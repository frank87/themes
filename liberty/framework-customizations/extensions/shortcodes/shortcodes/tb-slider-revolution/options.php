<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$revSliders = tb_get_rev_sliders();

$options = array(
    'slider' => array(
        'label' => esc_html__('Choose slider', 'liberty'),
        'type'  => 'select',
        'value' => '0',
        'choices' => $revSliders,
    ),
);
