<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Upcoming Event', 'liberty' ),
	'description' => esc_html__( 'Show upcoming event', 'liberty' ),
	'tab'         => esc_html__( 'ThemeBlossom', 'liberty' )
);