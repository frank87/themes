<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$map_shortcode = fw()->extensions->get( 'shortcodes' )->get_shortcode('map2');

$options = array(
	'data_provider' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'population_method' => array(
				'label'   => esc_html__('Population Method', 'liberty'),
				'desc'    => esc_html__( 'Select map population method.', 'liberty' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices' => $map_shortcode->_get_picker_choices(),
		'show_borders' => true,
	),
	'gmap-key' => array_merge(
		array(
			'label' => __( 'Google Maps API Key', 'liberty' ),
			'desc' => sprintf(
				__( 'Create an application in %sGoogle Console%s and add the Key here.', 'liberty' ),
				'<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">',
				'</a>'
			),
		),
		version_compare(fw()->manifest->get_version(), '2.5.7', '>=')
		? array(
			'type' => 'gmap-key',
		)
		: array(
			'type' => 'text',
			'fw-storage' => array(
				'type'      => 'wp-option',
				'wp_option' => 'fw-option-types:gmap-key',
			),
		)
	),
    'map_type' => array(
        'label' => esc_html__('Map Type', 'liberty'),
        'desc'  => esc_html__('Select map type', 'liberty'),
        'type'  => 'select',
        'value' => '',
        'choices' => array(
            'roadmap' => esc_html__('Roadmap', 'liberty'),
            'terrain' => esc_html__('Terrain', 'liberty'),
            'satellite' => esc_html__('Satellite', 'liberty'),
            'hybrid' => esc_html__('Hybrid', 'liberty')
        ),
    ),
	'map_height' => array(
		'label' => esc_html__('Map Height', 'liberty'),
		'desc'  => esc_html__('Set map height (Ex: 300)', 'liberty'),
		'type'  => 'text'
	),
	'map_style' => array(
		'label' => esc_html__('Map Style', 'liberty'),
		'desc'  => esc_html__('Get styles from https://snazzymaps.com, i.e. Please use minified string (no line breaks): http://www.textfixer.com/tools/remove-line-breaks.php', 'liberty'),
		'type'  => 'textarea'
	),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'liberty' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'liberty' ),
        'type'  => 'text',
        'value' => '',
    ),
);