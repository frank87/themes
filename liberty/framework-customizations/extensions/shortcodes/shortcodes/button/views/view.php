<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );

	/**
	 * @var array $atts
	 */
} ?>
<?php
$icon = $before_btn = $after_btn = $style = '';
if($atts['icon'] != ''){
    $icon_position = $atts['icon_position'];
    $icon = '<i class="'.$atts['icon_position'].' '.$atts['icon'].'"></i>';
}

if(isset($atts['btn_alignment']) && $atts['btn_alignment'] != 'default_float_align'){
    $before_btn = '<div class="'.$atts['btn_alignment'].'">';
    $after_btn = '</div>';
}


if(isset($atts['btn_padding']) && intval($atts['btn_padding']) > 0){
    $style = ' padding-top: ' . intval($atts['btn_padding']) . 'px; padding-bottom: ' . intval($atts['btn_padding']) . 'px; ';
}



$animationClass = $animationDelay = '';

if (isset($atts['animation_effect']) && !empty($atts['animation_effect']) && $atts['animation_effect'] != 'none') {
    $animationClass = ' tbWow ' . $atts['animation_effect'] . ' ';

    if (isset($atts['animation_delay']) && !empty($atts['animation_delay']) && $atts['animation_delay'] != '0') {
        $animationDelay = $atts['animation_delay'];
    }
}

?>
<?php echo '' . $before_btn; ?>
<a href="<?php echo esc_url($atts['link']); ?>"
    target="<?php echo esc_attr($atts['target']); ?>"
    class="btn <?php echo esc_attr($atts['btn_size']); ?> <?php echo esc_attr($atts['btn_width']); ?> <?php echo esc_attr($atts['btn_style']); ?> <?php echo esc_attr($atts['btn_inline_alignment']); ?> <?php echo esc_attr($atts['class']); ?>   <?php echo esc_attr($animationClass); ?>" <?php if (!empty($style)) { echo ' style="' . $style . '" '; } ?> <?php if ($animationDelay) { echo ' data-wow-delay="' . esc_attr($animationDelay) . '"'; } ?> ><span><?php echo "$icon"; echo esc_attr($atts['label']); ?></span></a>
<?php echo '' . $after_btn; ?>