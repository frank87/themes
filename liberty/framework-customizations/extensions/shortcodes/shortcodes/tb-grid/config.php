<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Post Grid', 'liberty' ),
	'description' => esc_html__( 'Show grid of posts (several types available)', 'liberty' ),
	'tab'         => esc_html__( 'ThemeBlossom', 'liberty' )
);