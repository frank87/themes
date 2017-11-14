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

$posts_number = (isset($atts['posts_number']) && $atts['posts_number']) ? intval($atts['posts_number']) : get_option('posts_per_page');
if (intval($posts_number) > 50) {
	$posts_number = 50;
}
if (!intval($posts_number)) {
	$posts_number = get_option('posts_per_page');
}

// colors
$color = (isset($atts['color']) && $atts['color']) ? $atts['color'] : '#21477F';
$color_hover = (isset($atts['color_hover']) && $atts['color_hover']) ? $atts['color_hover'] : '#ffffff';
$a_color = (isset($atts['a_color']) && $atts['a_color']) ? $atts['a_color'] : '#A02E2F';
$a_color_hover = (isset($atts['a_color_hover']) && $atts['a_color_hover']) ? $atts['a_color_hover'] : '#FFFFFF';
$background_color = (isset($atts['background_color']) && $atts['background_color']) ? $atts['background_color'] : '#ffffff';
$background_color_hover = (isset($atts['background_color_hover']) && $atts['background_color_hover']) ? $atts['background_color_hover'] : '#D20921';
$overlay_color = (isset($atts['overlay_color']) && $atts['overlay_color']) ? $atts['overlay_color'] : '#043174';


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

$our_query = new WP_Query($args);

if ($our_query->have_posts()) :
?>

<div class="tb-posts-carousel">

<?php
while ($our_query->have_posts()) : $our_query->the_post();
?>

<?php
$post_title = get_the_title();
$post_link = get_permalink();
?>

<div>

	<a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>" class="absolute100"><?php echo esc_attr($post_title); ?></a>

<?php if (has_post_thumbnail()) : ?>

<div class="tb-post-carousel-thumbnail">

	<?php the_post_thumbnail('liberty-wide-thumbnail'); ?>

</div>
<?php endif; // thumbnail ?>

<div class="tb-post-carousel-content">

<?php
if ($post_type == 'post') {
?>
<div class="date-box">
	<span class="day"><?php echo get_the_date('d'); ?></span>
	<span class="month"><?php echo get_the_date('M'); ?></span>
</div>
<?php } ?>

<div>

<h2>
<?php echo esc_attr($post_title); ?>
</h2>

<div class="hidden-xs hidden-sm">
<?php
if ($post_type == 'post') {
	the_excerpt();
} else {
	echo wp_trim_words(get_the_content(), 25);
}
?>
</div>

</div>

<div class="read-more"><?php echo esc_html__('Read more', 'liberty'); ?></div>

</div>
</div>

<?php
endwhile;
?>

</div>

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.tb-posts-carousel').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
  		infinite: true,
	  	autoplay: true,
	  	autoplaySpeed: 5000,
  		speed: 600,
		responsive: [
		{
		  breakpoint: 767,
		  settings: {
		    slidesToShow: 2,
		    slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
		    slidesToShow: 1,
		    slidesToScroll: 1
		  }
		}
		]
	});
});
		</script>

<?php
endif;

wp_reset_postdata(); // reset query

?>