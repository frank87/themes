<?php if (!defined('FW')) die('Forbidden');

$img = $atts['upload_img'];

$open_img = $atts['open_img'];
$position = $atts['position'];
$class = esc_attr($atts['class']);
$img_size = (isset($atts['img_size'])) ? $atts['img_size'] : 'full';

$img_src = $img['url'];
if ($img_size != 'full') {
    $img_width = 600;
    $img_height = 600;

    if ($img_size == 'wide') {
        $img_width = 600;
        $img_height = 300;
    }

    $img_src = fw_resize($img['attachment_id'], $img_width, $img_height, true);
}


$hover_effect = (isset($atts['hover_effect'])) ? $atts['hover_effect'] : 'default';
if ($hover_effect == 'default') {
    $single_image_class = 'tb-single-image-icon';
}

$animationClass = $animationDelay = '';

if (isset($atts['animation_effect']) && !empty($atts['animation_effect']) && $atts['animation_effect'] != 'none') {
    $animationClass = ' tbWow ' . $atts['animation_effect'] . ' ';

    if (isset($atts['animation_delay']) && !empty($atts['animation_delay']) && $atts['animation_delay'] != '0') {
        $animationDelay = $atts['animation_delay'];
    }
}

?>
<?php if (!empty($img)): ?>

    <?php if ($open_img['icon-box-img'] == 'nothing'): ?>

        <div class="tb-single-image <?php echo esc_attr($class) . ' ' . esc_attr($position); ?> <?php echo esc_attr($animationClass); ?>" <?php if ($animationDelay) { echo ' data-wow-delay="' . esc_attr($animationDelay) . '"'; } ?> >
            <span class="tb-single-image-wrap" >
                <img src="<?php echo esc_url($img_src); ?>" alt="img">
            </span>
        </div>

    <?php elseif ($open_img['icon-box-img'] == 'popup'): ?>
        <?php $popup_video = ($open_img['popup']['image_popup']['icon-box-img'] == 'tb-single-image-icon') ? $open_img['popup']['image_popup']['tb-single-image-icon']['upload_video'] : ''; ?>

        <div class="tb-single-image <?php echo "$single_image_class"; ?> <?php echo (!empty($popup_video)) ? 'tb-single-image-video' : ''; ?> <?php echo esc_attr($class) . ' ' . esc_attr($position); ?> <?php echo esc_attr($animationClass); ?>" <?php if ($animationDelay) { echo ' data-wow-delay="' . esc_attr($animationDelay) . '"'; } ?> >
            <a class="tb-single-image-wrap <?php echo "$hover_effect"; ?>" href="<?php echo !(empty($popup_video)) ? esc_url($popup_video) : esc_url($img['url']); ?>"
                data-rel="prettyPhoto">
                <img src="<?php echo esc_url($img_src); ?>" alt="img">
                <i class="<?php echo (empty($popup_video)) ? 'tb-icon-zoom' : 'tb-icon-video'; ?>"></i>
            </a>
        </div>

    <?php else: ?>
        <?php $open_link = ($open_img['link']['open'] == 'yes') ? "target='_blank'" : ''; ?>

        <div class="tb-single-image <?php echo "$single_image_class"; ?> <?php echo esc_attr($class) . ' ' . esc_attr($position); ?> <?php echo esc_attr($animationClass); ?>" <?php if ($animationDelay) { echo ' data-wow-delay="' . esc_attr($animationDelay) . '"'; } ?> >
            <a class="tb-single-image-wrap <?php echo "$hover_effect"; ?>" href="<?php echo esc_url($open_img['link']['custom_link']); ?>" <?php echo esc_attr($open_link); ?>>
                <img src="<?php echo esc_url($img_src); ?>" alt="img">
                <i class="tb-icon-link"></i>
            </a>
        </div>

    <?php endif; ?>

<?php endif; ?>