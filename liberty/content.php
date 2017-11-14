<?php

$liberty_theme_options = get_liberty_theme_options();

$postID = intval( get_the_ID() );
$postLink = get_permalink();
$postTitle = esc_attr( get_the_title() );
$post_thumbnail_id = get_post_thumbnail_id();

$show_featured_image = 'yes';
$show_related_posts = 'no';

$related_posts_title = '';

$this_post_meta = 0;

if (is_single()) {
	$this_post_meta = liberty_fw_get_db_post_option($postID);
	$show_featured_image = (isset($this_post_meta['featured_switch']) && !empty($this_post_meta['featured_switch'])) ? $this_post_meta['featured_switch'] : $show_featured_image;
	$show_related_posts = (isset($this_post_meta['related_switch']) && !empty($this_post_meta['related_switch'])) ? $this_post_meta['related_switch'] : $show_related_posts;
	$related_posts_title = (isset($this_post_meta['related_subtitle']) && !empty($this_post_meta['related_subtitle'])) ? $this_post_meta['related_subtitle'] : $related_posts_title;
}

?>
<article id="post-<?php echo intval($postID); ?>" <?php post_class("post clearfix"); ?>>

	<?php if($post_thumbnail_id && $show_featured_image == 'yes') : ?>
		<?php

		$image = wp_get_attachment_image_src($post_thumbnail_id, 'liberty-blog-full');

		if (is_single()) {
			$showDatebox = liberty_default_array($liberty_theme_options, 'archive-date-box', 'normal');

			liberty_post_thumbnail($postLink, $postTitle, $post_thumbnail_id, 'liberty-blog-full', 'none', 0, $showDatebox, 1);

			echo '<div class="clear height30"></div>';

			?>

			<?php

		} else {

			$link = $postLink;

			$showDatebox = liberty_default_array($liberty_theme_options, 'archive-date-box', 'normal');

			liberty_post_thumbnail($postLink, $postTitle, $post_thumbnail_id, 'liberty-blog-full', 'none', 0, $showDatebox);

			echo '<div class="clear height30"></div>';
		}
		

		?>

	<?php endif; ?>

	<header class="entry-header">

		<?php
		if (is_archive()) {
			$title_tag = 'h2';
			$title_class = '';
		} else {
			$title_tag = 'h1';
			$title_class = ' title-with-spacer ';
		}
		?>

        <<?php echo esc_attr($title_tag); ?> class="entry-title tbWow fadeIn <?php echo esc_attr($title_class ); ?>">

        <?php if (!is_single()) : ?>
        <a href="<?php echo esc_url($postLink); ?>">
        <?php the_title(); ?>
        </a>
    	<?php else : ?>
        <?php the_title(); ?>
    	<?php endif; ?>

        </<?php echo esc_attr($title_tag); ?>>
	</header>

    <div class="entry-content clearfix">
        <?php
        if (is_single()) {
        	the_content();
        } else {
        	the_content();
        }
        ?>


        <?php wp_link_pages( array(
            'before'      => '<div class="info-line"><span class="page-links-title">' . esc_html__( 'Pages:', 'liberty' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) ); ?>
    </div>

	<footer class="entry-meta clearfix">
        <?php
        $extra_class = '';
        if (!is_single()) {
        	$extra_class = "";
        	//$extra_class = " noborder ";
        }
        liberty_info_line(1, 1, 1, 1, ' / ', $extra_class);
        ?>
    </footer>
</article>

<?php

if (!is_single()) {
	$show_related_posts = 'no';
}

if ($show_related_posts == 'yes') {

if (!empty($related_posts_title)) {
	echo "<h2>" . $related_posts_title . "</h2>";
}

$related_query = liberty_related_posts($postID, 3);

if ($related_query->have_posts()) :

?>

<div class="row overflowhidden">

<?php

$delay = 0;

while ($related_query->have_posts()) : $related_query->the_post();

if ($delay > 1) {
	$delay = 0;
}

$post_title = get_the_title();
$post_link = get_permalink();

?>

<div class="tb-related-posts col-xs-6 col-sm-4 fadeIn tbWow" <?php if ($delay) {echo ' data-wow-delay="' . esc_attr($delay) . 's" ';} ?>>
	<a href="<?php echo esc_url($post_link); ?>">
		<?php the_post_thumbnail('liberty-thumb-xl'); ?>
		<span>
		<h4><?php echo esc_attr($post_title); ?></h4>
		</span>
	</a>

</div>

<?php

$delay += 0.4;

endwhile;

?>

</div>


<?php

endif;

wp_reset_postdata();

} // show related posts

?>