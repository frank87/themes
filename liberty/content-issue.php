
<?php

$liberty_theme_options = get_liberty_theme_options();

$postID = intval( get_the_ID() );
$post_title = get_the_title();
$post_link = get_permalink();
$post_thumbnail_id = get_post_thumbnail_id();

$show_featured_image = 'yes';

if (is_single()) :


$this_post_meta = liberty_fw_get_db_post_option($postID);
$show_featured_image = (isset($this_post_meta['featured_switch']) && !empty($this_post_meta['featured_switch'])) ? $this_post_meta['featured_switch'] : $show_featured_image;

?>
<article id="post-<?php echo intval($postID); ?>" <?php post_class("post single-issue clearfix tbWow fadeIn"); ?>>
	<header class="entry-header">
        <h1 class="entry-title tbWow fadeIn"><?php if(is_sticky()) echo '<i class="fa fa-bookmark-o"></i> '; ?><a href="<?php echo esc_url($postLink); ?>"><?php the_title(); ?></a></h1>
	</header>

	<?php if($post_thumbnail_id && $show_featured_image == 'yes') : ?>
		<?php

		$image = wp_get_attachment_image_src($post_thumbnail_id, 'liberty-blog-full');		
		$fullImage = wp_get_attachment_image_src($post_thumbnail_id, 'full');
		$link = $fullImage[0];
		$extra_rel = ' data-rel="prettyPhoto"';
		$icon_extra = 'zoom';
		
		?>

        <div id="tb-content-thumbnail" class="tb-single-image tb-single-image-icon tbWow fadeIn">
            <a class="tb-single-image-wrap" href="<?php echo esc_url($link); ?>" <?php echo '' . $extra_rel; ?>>
                <img src="<?php echo esc_url($image[0]); ?>">
                <i class="tb-icon-<?php echo esc_attr($icon_extra); ?>"></i>
            </a>
        </div>
	<?php endif; ?>

    <div class="entry-content clearfix">
        <?php the_content(); ?>

        <?php wp_link_pages( array(
            'before'      => '<div class="info-line"><span class="page-links-title">' . esc_html__( 'Pages:', 'liberty' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) ); ?>
    </div>
</article>

<?php
else:
?>

<div class="col-xs-6 col-sm-3">

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

<?php endif; ?>