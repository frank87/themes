<?php
/**
 * @package liberty
 * 
 * Template Name: Blog
 */

get_header(); 

$liberty_theme_options = get_liberty_theme_options();

$layoutClass = "col-xs-12 col-sm-8";

$post_id = get_the_id();
$main_post_meta = liberty_fw_get_db_post_option($post_id);

$selected_categories = liberty_default_array($main_post_meta, 'page_select_categories', '');

if (!empty($selected_categories)) {
	$main_cat = implode(',', $selected_categories);
} else {
	$main_cat = -1;
}

?>
<div id="main-content" class="main-content">

	<div id="primary" class="content-area <?php echo esc_attr($layoutClass); ?>">
		<div id="content" class="site-content" role="main">
		
		
		<?php
		$args['post_type'] = 'post'; 
		
		if ($main_cat > 0) {
			$args['cat'] = $main_cat;
		}
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args['paged'] = $paged;  
		
		$customQuery = new WP_Query( $args );
		?>

		<?php if ( $customQuery->have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $customQuery->have_posts() ) : $customQuery->the_post(); ?>

			<?php
			$postID = intval( get_the_ID() );
			$postLink = get_permalink();
			$postTitle = esc_attr( get_the_title() );
			$post_thumbnail_id = get_post_thumbnail_id();
			?>
			<article id="post-<?php echo intval($postID); ?>" <?php post_class("post clearfix"); ?>>

				<?php if($post_thumbnail_id) : ?>
					<?php

					$link = $postLink;
					$icon_extra = 'link';

					$showDatebox = liberty_default_array($liberty_theme_options, 'archive-date-box', 'normal');

					liberty_post_thumbnail($postLink, $postTitle, $post_thumbnail_id, 'liberty-blog-full', 'none', 0, $showDatebox);
					echo '<div class="clear height30"></div>';
					
					?>
				<?php endif; ?>

				<header class="entry-header">
			        <h1 class="entry-title tbWow fadeIn title-with-spacer"><?php if(is_sticky()) echo '<i class="fa fa-bookmark-o"></i> '; ?><a href="<?php echo esc_url($postLink); ?>"><?php the_title(); ?></a></h1>
				</header>

			    <div class="entry-content clearfix">
			        <?php the_content(); ?>
			    </div>
				<footer class="entry-meta clearfix">
			        <?php liberty_info_line(1, 1, 1, 1, ' / '); ?>
			    </footer>
			</article>

			<?php endwhile; ?>

			<div class="clear"></div>

			<?php	
			
			$navigation_choice = liberty_default_array($liberty_theme_options, 'blog-navigation-type', 'paged');			
			$prev_next = liberty_default_array($liberty_theme_options, 'blog-navigation-paginated-prevnext', true);
					
			liberty_navigation($navigation_choice, $customQuery, $prev_next);		

		else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div>


	</div><!-- #primary -->

	<?php 
	get_sidebar();
	?>
			
</div><!-- #main -->

<?php get_footer(); ?>