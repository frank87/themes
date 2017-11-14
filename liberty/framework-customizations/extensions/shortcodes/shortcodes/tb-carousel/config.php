<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Post Carousel', 'liberty' ),
	'description' => esc_html__( 'Show carousel of posts (several types available)', 'liberty' ),
	'tab'         => esc_html__( 'ThemeBlossom', 'liberty' )
);