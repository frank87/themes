<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'header_image' => array(
		'label' => esc_html__( 'Add Image', 'liberty' ),
		'desc'  => esc_html__( 'Upload header image', 'liberty' ),
		'type'  => 'upload',			
	),
	'featured_height'=> array(
		'label' => esc_html__( 'Promo Image Height', 'liberty' ),
		'type'  => 'short-text',
		'value' => '300',
	),
);