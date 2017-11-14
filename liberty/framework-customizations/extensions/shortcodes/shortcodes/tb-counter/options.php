<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$sizes = array();

$value = 0;
$max_value = 155;

while ($value <= $max_value) {
	$sizes[$value] = $value . "px";
	$value++;
}

$time_an = array();
$value = 100;
$max_value = 2000;

while ($value <= $max_value) {
    $time_an[$value] = $value;
    $value += 100;
}

$options = array(
    'number'  => array(
        'label' => esc_html__( 'Number', 'liberty' ),
        'desc'  => esc_html__( 'Several formats available - please check documentation', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
    'font_size' => array(
        'label' => esc_html__( 'Font Size', 'liberty' ),
        'type'  => 'select',
        'value' => '16',
        'choices' => $sizes
    ),
    'font_line' => array(
        'label' => esc_html__( 'Line Height', 'liberty' ),
        'type'  => 'select',
        'value' => '25',
        'choices' => $sizes
    ),
    'font_color' => array(
        'label' => esc_html__('Color', 'liberty'),
        'value'   => '#282828',
        'type'    => 'color-picker'
    ),
    'text_before'  => array(
        'label' => esc_html__( 'Text Before', 'liberty' ),
        'desc'  => esc_html__( 'Inline with counter', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
    'text_after'  => array(
        'label' => esc_html__( 'Text After', 'liberty' ),
        'desc'  => esc_html__( 'Inline with counter', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
    'time_an' => array(
        'label' => esc_html__( 'Animation Time', 'liberty' ),
        'desc' => esc_html__( 'In ms', 'liberty' ),
        'type'  => 'select',
        'value' => '400',
        'choices' => $time_an
    ),
    'padding' => array(
        'label' => esc_html__( 'Top and bottom padding', 'liberty' ),
        'type'  => 'select',
        'value' => '10',
        'choices' => $sizes
    ),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'liberty' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
);
