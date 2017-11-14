<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php

$liberty_theme_options = get_liberty_theme_options();


$bckg = isset($liberty_theme_options['issues-bckg-color']) ? $liberty_theme_options['issues-bckg-color']['regular'] : '#32288D';
$bckgOuter = isset($liberty_theme_options['issues-bckg-color']) ? $liberty_theme_options['issues-bckg-color']['hover'] : '#281A70';

$link = isset($liberty_theme_options['issues-link-color']) ? $liberty_theme_options['issues-link-color']['regular'] : '#ffffff';
$linkHover = isset($liberty_theme_options['issues-link-color']) ? $liberty_theme_options['issues-link-color']['hover'] : '#A02E2F';

$titleColor = isset($liberty_theme_options['issues-title-color']) ? $liberty_theme_options['issues-title-color'] : '#ffffff';
$overlayColor = isset($liberty_theme_options['issues-overlay-bckg-color']) ? $liberty_theme_options['issues-overlay-bckg-color'] : '#ffffff';

$custom_id = (isset($atts['myid']) && $atts['myid']) ? $atts['myid'] : '';
$custom_class = (isset($atts['class']) && $atts['class']) ? $atts['class'] : '';

$post_order = (isset($atts['order']) && $atts['order']) ? $atts['order'] : 'date-DESC';
$post_orderA = liberty_string_explode($post_order);

$item_number = (isset($atts['item_number']) && $atts['item_number']) ? intval($atts['item_number']) : 12;

// let's create some magic :)
$args = array();
$args['posts_per_page'] = $item_number;

$args['orderby'] = $post_orderA[0];

if (isset($post_orderA[1])) {
	$args['order'] = $post_orderA[1];
}



if (defined('THEMEBLOSSOM_ISSUES_CPT')) {
	$args['post_type'] = THEMEBLOSSOM_ISSUES_CPT;

	$category = liberty_default_array($atts, 'category', 0);
	if ($category) {
		$args['tax_query'] = array(
				array(
					'taxonomy' 	=> THEMEBLOSSOM_ISSUE_TAX,
					'field'		=> 'term_id',
					'terms'		=> $category
					)
			);
	}
}

$our_query = new WP_Query($args);

if ($our_query->have_posts()) :

$entryContentRow = 'row';
if ($category > 0) {
	$entryContentRow = '';
}

?>

<div class="entry-content <?php echo esc_attr($entryContentRow); ?> <?php echo esc_attr($custom_class); ?>" <?php if ($custom_id) {echo ' id="' . esc_attr($custom_id) . '"';} ?>>

<?php

if ($category > 0) :

$issuesList = array();
$issuesContent = array();

while ($our_query->have_posts()) :
$our_query->the_post();

$post_id = get_the_id();
$post_title = get_the_title();
$post_link = get_permalink();
$post_content = get_the_content();

$post_thumbnail_id = 0;

if ( isset($atts['show_images']) && $atts['show_images'] != 'No') {
	$post_thumbnail_id = get_post_thumbnail_id();
}

$issuesList[] = array(
	'id' => $post_id,
	'title' => $post_title
	);

$issuesContent[] = array(
	'id' => $post_id,
	'title' => $post_title,
	'content' => $post_content,
	'thumb' => $post_thumbnail_id
	);

endwhile;

?>

<div id="issues-list-bar" class="hidden-xs">

<div class="container">

<ul>

<?php
foreach ($issuesList as $issuesListItem) {
	?>
	<li><a class="scroll" href="#issue-<?php echo esc_attr($issuesListItem['id']); ?>"><?php echo esc_attr($issuesListItem['title']); ?></a></li>
	<?php
}

?>

</ul>

</div>

</div> <!-- issues list bar -->

<div id="issues-list-content">

<?php
foreach ($issuesContent as $issuesContentItem) {
	echo '<div id="issue-' . esc_attr($issuesContentItem['id']) . '">';
	echo '<div class="container">';
	echo '<div class="padding15-xs">';

	$spacer_class = 'title-with-center-spacer';
	if ( isset($atts['show_icons']) && $atts['show_icons'] != 'No') {
		$post_meta = liberty_fw_get_db_post_option($issuesContentItem['id']);
		$issue_icon = isset($post_meta['issue_icon']) ? $post_meta['issue_icon'] : '';
		if ($issue_icon && isset($issue_icon['url']) && $issue_icon['url']) {
			$spacer_class = '';
			echo '<div class="margin15"><img class="tbWow fadeInUp" src="' . esc_url($issue_icon['url']) . '"></div>';
		}
	}

	echo '<h1 class="' . $spacer_class . ' tbWow fadeIn">' . esc_attr($issuesContentItem['title']) . '</h1>';
	echo '<div class="tbWow fadeIn">';

	if (isset($issuesContentItem['thumb']) && $issuesContentItem['thumb'] > 0) {

		$image = wp_get_attachment_image_src($issuesContentItem['thumb'], 'liberty-blog-full');		
		$fullImage = wp_get_attachment_image_src($issuesContentItem['thumb'], 'full');
		$link = $fullImage[0];
		$extra_rel = ' data-rel="prettyPhoto"';
		$icon_extra = 'zoom';
		
		?>

        <div id="tb-content-thumbnail" class="tb-single-image tb-single-image-icon">
            <a class="tb-single-image-wrap" href="<?php echo esc_url($link); ?>" <?php echo '' . $extra_rel; ?>>
                <img src="<?php echo esc_url($image[0]); ?>">
                <i class="tb-icon-<?php echo esc_attr($icon_extra); ?>"></i>
            </a>
        </div>

	<?php

	}

	echo apply_filters('the_content', $issuesContentItem['content']);
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
?>

</div> <!-- issues list content -->

<?php

else : // no category

while ($our_query->have_posts()) :
$our_query->the_post();

?>

<?php
$post_title = get_the_title();
$post_link = get_permalink();
$post_link = get_permalink();
$post_thumbnail_id = get_post_thumbnail_id();
?>

<div class="tb-issues-holder col-xs-6 col-sm-3 tbWow fadeIn">

<?php

$issues_bckg = '';

if (has_post_thumbnail()) : 
$image = wp_get_attachment_image_src($post_thumbnail_id, 'liberty-thumb-xl');
$issues_bckg .= "background-image: url( $image[0] ); ";
endif;

?>


<div class="ch-item ch-img-1" <?php if ($issues_bckg) { echo 'style="' . esc_attr($issues_bckg) . '"'; } ?>>
	<a href="<?php echo esc_url($post_link); ?>" class="absolute100"><?php echo esc_attr($post_title); ?></a>
	<div class="ch-info-wrap">
		<div class="ch-info">
			<div class="ch-info-front"></div>
			<div class="ch-info-back">
				<h3><?php echo esc_attr($post_title); ?></h3>
			</div>	
		</div>
	</div>
</div>

</div> <!-- col -->

<?php
endwhile;

endif; // if category
?>

</div> <!-- entry-content -->

<?php
endif;

wp_reset_postdata(); // reset query

?>