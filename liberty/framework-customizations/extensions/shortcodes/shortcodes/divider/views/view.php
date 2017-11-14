<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( 'line' === $atts['style']['ruler_type'] ): ?>
	<div class="fw-divider-line"><hr/></div>
<?php endif; ?>

<?php if ( 'space' === $atts['style']['ruler_type'] ): ?>
	<?php
	if ( isset($atts['style']['space']['special']) ) {
		$special_class = $atts['style']['space']['special'];
	} else {
		$special_class = 'no-special-look';
	}
	?>
	<div class="fw-divider-space <?php echo esc_attr($special_class); ?>" style="padding-top: <?php echo (int) $atts['style']['space']['height']; ?>px;"></div>
<?php endif; ?>