<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php

$custom_id = (isset($atts['myid']) && $atts['myid']) ? $atts['myid'] : '';
$custom_class = (isset($atts['class']) && $atts['class']) ? $atts['class'] : '';

$post_order = (isset($atts['order']) && $atts['order']) ? $atts['order'] : 'date-DESC';
$post_orderA = liberty_string_explode($post_order);

$item_number = (isset($atts['item_number']) && $atts['item_number']) ? intval($atts['item_number']) : 12;
$thumbnail_type = (isset($atts['thumbnail_type']) && $atts['thumbnail_type']) ? $atts['thumbnail_type'] : 'circle';

// let's create some magic :)
$args = array();
$args['posts_per_page'] = $item_number;

$args['orderby'] = $post_orderA[0];

if (isset($post_orderA[1])) {
	$args['order'] = $post_orderA[1];
}

$args['post_type'] = 'fw-portfolio';
$args['meta_key'] = '_thumbnail_id';

$our_query = new WP_Query($args);

if ($our_query->have_posts()) :
?>

<div class="entry-content row <?php echo esc_attr($custom_class); ?>" <?php if ($custom_id) {echo ' id="' . esc_attr($custom_id) . '"';} ?>>

<?php
$delay = 0;

while ($our_query->have_posts()) :
$our_query->the_post();

if ($delay > 1) {
	$delay = 0;
}

$thumbnails = fw_ext_portfolio_get_gallery_images();
$thumbnails_number = count($thumbnails);

$this_post_meta = liberty_fw_get_db_post_option(get_the_id());
$show_video = (isset($this_post_meta['video_switch']) && !empty($this_post_meta['video_switch'])) ? $this_post_meta['video_switch'] : 'no';


if( has_post_thumbnail() ) {
	$imageA = wp_get_attachment_image_src(get_post_thumbnail_id(), 'liberty-thumb-xl');
	$image = $imageA[0];
} else {
	$image = fw()->extensions->get('portfolio')->locate_URI('/static/img/no-photo.jpg');
}

if ($thumbnail_type == 'circle') {

?>
<div class="tb-issues-holder tb-gallery-list col-xs-6 col-sm-3 tbWow fadeIn" <?php if ($delay) {echo ' data-wow-delay="' . esc_attr($delay) . 's" ';} ?>>
	<div class="ch-item ch-img-1" style="background-image: url(<?php echo esc_url($image); ?>);">
		<a href="<?php echo the_permalink(); ?>" class="absolute100"><?php the_title(); ?></a>
		<div class="ch-info-wrap">
			<div class="ch-info">
				<div class="ch-info-front"></div>
				<div class="ch-info-back">
					<h3><?php the_title(); ?></h3>
				</div>	
			</div>
		</div>
	</div>
</div>

<?php

} else {
?>

<div class="tb-portfolio-img col-xs-6 col-sm-3 fadeIn tbWow" <?php if ($delay) {echo ' data-wow-delay="' . esc_attr($delay) . 's" ';} ?>>
	<a href="<?php the_permalink() ?>">
		<img src="<?php echo esc_url($image); ?>" />
		<span>
		<h3><?php the_title(); ?></h3>
		</span>
	</a>

</div>

<?php

} // if circle

$delay += 0.3;

endwhile;
?>

</div>

<?php
endif;

wp_reset_postdata(); // reset query

?>