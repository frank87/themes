<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$loop_data = get_query_var( 'fw_portfolio_loop_data' );

$thumbnails = fw_ext_portfolio_get_gallery_images();
$thumbnails_number = count($thumbnails);

$this_post_meta = liberty_fw_get_db_post_option(get_the_id());
$show_video = (isset($this_post_meta['video_switch']) && !empty($this_post_meta['video_switch'])) ? $this_post_meta['video_switch'] : 'no';

?>
<div class="tb-portfolio-img col-xs-6 col-sm-3 fadeIn tbWow">
	<a href="<?php the_permalink() ?>">
		<?php
		if( has_post_thumbnail() ) {
			$imageA = wp_get_attachment_image_src(get_post_thumbnail_id(), 'liberty-thumb-xl');
			$image = $imageA[0];
		} else {
			$image = fw()->extensions->get('portfolio')->locate_URI('/static/img/no-photo.jpg');
		}
		?>
		<img src="<?php echo esc_url($image) ?>" />
		<span>
		<h3><?php the_title(); ?></h3>
		</span>
	</a>

</div>