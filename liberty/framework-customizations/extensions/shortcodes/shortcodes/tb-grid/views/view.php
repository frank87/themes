<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php

$helpArray = array(
	'post_type' => 'post',
	'post'		=> array(
		'taxonomy' => 0
	)
);


$tax_array = array(
	'post' => 'category',
	'issue' => 'issues_categories'
);


$post_type_select = (isset($atts['post_type_select']) && $atts['post_type_select']) ? $atts['post_type_select'] : $helpArray;
$post_type = $post_type_select['post_type'];
$post_taxonomy = $post_type_select[$post_type]['taxonomy'];

$post_order = (isset($atts['order']) && $atts['order']) ? $atts['order'] : 'date-DESC';
$post_orderA = liberty_string_explode($post_order);

$posts_number = (isset($atts['grid_type']) && $atts['grid_type']) ? intval($atts['grid_type']) : 10;

// colors
$color = (isset($atts['text_color']) && $atts['text_color']) ? $atts['text_color'] : '#ffffff';
$background_color = (isset($atts['background_color']) && $atts['background_color']) ? $atts['background_color'] : '#281a70';
// overlay
$title_color = (isset($atts['title_color']) && $atts['title_color']) ? $atts['title_color'] : '#ffffff';
$title_background = (isset($atts['title_background']) && $atts['title_background']) ? $atts['title_background'] : '#B2081D';
$title_padding = (isset($atts['title_padding']) && $atts['title_padding']) ? $atts['title_padding'] : '30';
$title_margin = (isset($atts['title_margin']) && $atts['title_margin']) ? $atts['title_margin'] : '0';
$with_border = (isset($atts['with_border']) && $atts['with_border']) ? $atts['with_border'] : 'no';
$main_title = (isset($atts['main_title']) && $atts['main_title']) ? $atts['main_title'] : '';
$main_subtitle = (isset($atts['main_subtitle']) && $atts['main_subtitle']) ? $atts['main_subtitle'] : '';

$custom_id = (isset($atts['myid']) && $atts['myid']) ? $atts['myid'] : 'slick' . rand(10000, 99999);
$custom_class = (isset($atts['class']) && $atts['class']) ? $atts['class'] : 'slick' . rand(10000, 99999);

$args = array();
$args['post_type'] = $post_type;
$args['posts_per_page'] = $posts_number;
$args['orderby'] = $post_orderA[0];

if (isset($post_orderA[1])) {
	$args['order'] = $post_orderA[1];
}

if (isset($post_taxonomy) && $post_taxonomy) {
	$args['tax_query'] = array(
        array(
            'taxonomy' => $tax_array[$post_type],
            'field' => 'id',
            'terms' => $post_taxonomy
        )
    );
}

$overlay = $overlay_bckg = $overlay_opacity = $overlay_style = false;
$overlay_options = (isset($atts['overlay_options']) && $atts['overlay_options']) ? $atts['overlay_options'] : false;
if ($overlay_options) {
	$overlay = $overlay_options['overlay'];
	if ($overlay == 'yes') {
		$overlay_bckg = $overlay_options['yes']['background'];
		$overlay_opacity = $overlay_options['yes']['overlay_opacity_image'];
		$overlay_style = ' style="background: ' . $overlay_bckg . '; opacity: ' . floatval($overlay_opacity / 100) . ';" ';
	}
}

$our_query = new WP_Query($args);

if ($our_query->have_posts()) :

$indexC = 1;
$indexR = 1;
$index10 = 1;
$indexClosed = 1;
$delay = 0;

?>

<?php
while ($our_query->have_posts()) : $our_query->the_post();


if ($indexC == 1 && $index10 != 5) {
	echo '<div class="row">'; // let's open the row
	$indexClosed = 0;
}

if ($indexC == 1 && $index10 == 5) {
	echo '<div class="row absolutecenter-stretch">'; // let's open the row
	$indexClosed = 0;
}

?>

<?php
$post_title = get_the_title();
$post_link = get_permalink();
$this_post_id = get_the_id();
$this_post_meta = liberty_fw_get_db_post_option($this_post_id);


	
?>

<div class="tb-posts-grid col-md-3 col-sm-6 col-xs-12 nopadding fadeIn tbWow" <?php if ($delay) {echo ' data-wow-delay="' . esc_attr($delay) . 's" ';} ?>>

<a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>" class="absolute100"><?php echo esc_attr($post_title); ?></a>

<div class="grid_overlay" <?php echo '' . $overlay_style; ?>></div>

<h2 class="grid_post_title" style="color: <?php echo esc_attr($color); ?>;">
<?php echo esc_attr($post_title); ?>
</h2>

<div class="grid_content_holder absolutecenter-rows" style="background: <?php echo esc_attr($background_color); ?>; color: <?php echo esc_attr($color); ?>;">
	<div>

	<?php
	$content = (isset($this_post_meta['slogan']) && !empty($this_post_meta['slogan'])) ? $this_post_meta['slogan'] : '';
	if ($content) {
	echo esc_attr($content) . '<br><br>';
	}
	?>
	
	<a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>" class="btn btn-lg btn-border1"><?php echo __('View More', 'liberty'); ?></a>

	</div>
</div>

<?php if (has_post_thumbnail()) : ?>

	<?php the_post_thumbnail('liberty-wide-thumbnail2'); ?>

<?php endif; // thumbnail ?>

</div>

<?php

if ($index10 == 5) {
?>
<div class="hidden-xs hidden-sm tb-posts-grid col-sm-6 col-xs-12 nopadding fadeIn tbWow" <?php if ($delay) {echo ' data-wow-delay="' . esc_attr($delay) . 's" ';} ?> style="background: <?php echo esc_attr($title_background); ?>; color: <?php echo esc_attr($title_color); ?>;">

	<div class="tb-posts-grid-main-title absolutecenter-rows <?php if ($with_border == 'yes') { echo 'borderWt'; } ?>" <?php if ($title_margin) { echo 'style="top: ' . $title_margin . 'px; bottom: ' . $title_margin . 'px; left: ' . $title_margin . 'px; right: ' . $title_margin . 'px; padding: ' . $title_padding . 'px; "'; } ?>>
		<?php if ($main_title) { ?>
		<h1 style="color: <?php echo esc_attr($title_color); ?>;"><?php echo esc_attr($main_title); ?></h1>
		<?php } ?>
		<?php if ($main_subtitle) { ?>
		<p><?php echo esc_attr($main_subtitle); ?></p>
		<?php } ?>
	</div>

</div>
<?php

$indexC += 2;

}


$indexC++;
$delay += 0.3;


if ($indexC == 5) {
	$indexC = 1;
	$indexR++;
	echo '</div>'; // let's close the row
	$indexClosed = 1;
	$delay = 0;
}
if ($posts_number == 10) {
	$index10++;
}

endwhile;
?>

<?php

if (!$indexClosed) {
	echo '</div>'; // let's close the row
}

endif;

wp_reset_postdata(); // reset query

?>