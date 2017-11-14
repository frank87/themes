<?php

/**
SINGLE/BLOG FUNCTIONS
**/
// Navigation - Choice
if ( ! function_exists('liberty_navigation') ) {
	function liberty_navigation($navigation_choice = 'paged', $query = '', $prev_next = true) {
		
		$navigation_choice = esc_attr($navigation_choice);

		if ($navigation_choice == 'linked') {
			liberty_linked_navigation();
		} else {
			liberty_paged_navigation($query, $prev_next);
		}
	}
}

// Navigation - Page Numbers
if ( ! function_exists('liberty_paged_navigation') ) {
	function liberty_paged_navigation($query = '', $prev_next = true) {
		
		$prev_next = (bool) $prev_next;
		
		// let's deal with queries
		if ($query) {
			$total = $query->max_num_pages;
		} else {
			global $wp_query;
			$total = $wp_query->max_num_pages;
		}
		
		// pagination
		$gqv_paged = get_query_var('paged');
		if ($gqv_paged) {
			$current_page = $gqv_paged;
		} else {
			$gqv_page = get_query_var('page');
			if ($gqv_page) {
				$current_page = $gqv_page;
			} else {
				$current_page = 1;
			}
		}
		
		// structure of “format” depends on whether we’re using pretty permalinks
		$permalink_structure = get_option('permalink_structure');
		if (empty($permalink_structure))
		{
			if (is_front_page())
			{
				$format = '?paged=%#%';
			}
			else
			{
				$format = '&paged=%#%';
			}
		}
		else
		{
			$format = 'page/%#%/';
		}
		
		if (!is_search()) {
			$navigation = paginate_links(array(
				'base' => get_pagenum_link(1) . '%_%',
				'format' => $format,
				'current' => $current_page,
				'total' => $total,
				'type' => 'list',
				'prev_next' => $prev_next,
				'prev_text' => esc_html__('&lsaquo; Previous', 'liberty'),
				'next_text' => esc_html__('Next &rsaquo;', 'liberty')
			));			
		} else {
			
			$big = 999999999;
			
			$navigation = paginate_links(array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => $current_page,
				'total' => $total,
				'type' => 'list',
				'prev_next' => $prev_next,
				'prev_text' => esc_html__('&lsaquo; Previous', 'liberty'),
				'next_text' => esc_html__('Next &rsaquo;', 'liberty')
			));						
		}
		

		
		if ($navigation) {
			?>
			<nav id="archive-navigation" class="paging-navigation tbWow fadeInUp" role="navigation">
			<?php echo str_replace(array("a class='page-numbers", 'prev page-numbers', 'next page-numbers', "span class='page-numbers"), array("a class='page-numbers btn btn-pagination btn-tb-primary", 'prev page-numbers btn btn-pagination btn-tb-primary', 'next page-numbers btn btn-pagination btn-tb-primary', "span class='page-numbers btn btn-pagination btn-tb-primary"), $navigation); ?>
			</nav>
			<?php
		}
		
	}
}

if ( ! function_exists( 'liberty_linked_navigation' ) ) :
function liberty_linked_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav id="archive-navigation" class="paging-navigation info-line" role="navigation">
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( esc_html__( '<span class="meta-nav">&lsaquo;</span> Older posts', 'liberty' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts <span class="meta-nav">&rsaquo;</span>', 'liberty' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'liberty_theme_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function liberty_theme_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	
	?>
	
	<nav id="archive-post-navigation" class="post-navigation" role="navigation">
	
	<?php
	
	$postType = get_post_type();
	
	if ($postType == 'post') :
		previous_post_link( '%link', _x( '<span class="meta-nav">&lsaquo;</span> Previous', 'Previous post link', 'liberty' ) );
		next_post_link(     '%link', _x( 'Next <span class="meta-nav">&rsaquo;</span>', 'Next post link',     'liberty' ) );
	elseif ($postType == 'tribe_events') :
		tribe_the_prev_event_link(  _x( '<span class="meta-nav">&lsaquo;</span> Previous', 'Previous event link', 'liberty' ) );
		tribe_the_next_event_link(  _x( 'Next <span class="meta-nav">&rsaquo;</span>', 'Next post link',     'liberty' ) );
	else :
	endif;
	?>
	
	</nav><!-- .navigation -->
	<?php
	
	
}
endif;

/**
Generates thumbnail with special effects, author's thumb, date box, etc

@param $postLink - Link of the appropriate post
@param $postTitle - title of post
@param $thumbID
@param $size - size of the featured image
@param $type - border|rounded|circle
@params $author|$date - shows author's thumb or date box
@param $imageSrc - popup the image in the pretty photo effect
@param $echo - echo or return
**/
if (!function_exists('liberty_post_thumbnail')) :

function liberty_post_thumbnail($postLink = 0, $postTitle = 0, $thumbID, $size = 'liberty-blog-full', $type = 'border', $author = 0, $date = 'normal', $imageSrc = 0, $echo = 1) {

	// DATA VALIDATION
	if ($postLink) {
		$postLink = esc_url($postLink);
	}

	$postTitle = esc_attr($postTitle);

	$size = esc_attr($size);
	$type = esc_attr($type);
	$date = esc_attr($date);
	// DATA VALIDATION ends.
	
	if ($imageSrc) {
		$liberty_theme_options = get_liberty_theme_options();
	
		$prettyPhoto = liberty_default_array($liberty_theme_options, 'switch-use-prettyPhoto', 1);
		if ($prettyPhoto) {
			$relPP = ' rel="prettyPhoto"';
		} else {
			$relPP = '';
		}
	}
	
	$holderClass = 'featured-image-holder';
	if ($author) {
		$holderClass .= ' show-author';
	}
	if ($date != 'no') {
		$holderClass .= ' show-date';
	}
	
	$imgTitle = '';
	if ($postTitle) {
		$imgTitle = " alt='$postTitle' title='$postTitle'";
	}
	
	$return = '<div class="' . $holderClass . '">';
	
	$image = wp_get_attachment_image_src($thumbID, $size);
	
	if ($imageSrc) {
		$fullImage = wp_get_attachment_image_src($thumbID, 'full');
	}
	
	$extra = '';
	$extraAuthor = '';
	$extraDate = '';
	$imageData = '';
	
	$extra .= " tbWow fadeIn";
	//$imageData = ' data-wow-duration="0.3s" data-wow-delay="0.3s"';
	$extraAuthor = " tbWow bounceIn";
	
	if ($author) {
		$return .= liberty_show_author_thumb($extraAuthor);
	}

	$return .= '<div>';
	
	if ($date != 'no' && $date != 'event_countdown') {
		$return .= liberty_show_date_box($extraDate);
	}
	
	if ($date != 'no' && $date == 'event_countdown') {
		$return .= liberty_show_date_box_event($extraDate);
	}
	
	if ($imageSrc) {
		$return .= '<a href="' . $fullImage[0] . '"' . $relPP . '>';
	} else {
		$return .= '<a href="' . $postLink . '">';
	}

	$return .= '<img src="' . $image[0] . '" width="' . $image[1] . '" height="' . $image[2] . '" class="' . liberty_image_class($type, $extra) . '"' . $imgTitle . '>';
	$return .= '</a>';
	
	$return .= '</div>';

	$return .= '</div>';
	
	if ($echo) {
		echo /* validated */ $return;
	} else {
		return $return;
	}
}

endif;

if ( !function_exists('liberty_show_author_thumb')) :
function liberty_show_author_thumb($class = '') {
	
	$authorMeta = get_the_author_meta( 'ID' );
	$authorLink = esc_url( get_author_posts_url( $authorMeta ) );
	$avatarImg = get_avatar($authorMeta, '80');
		
	$return = '';
	$return .= '<div class="author-thumbnail hidden-xs ' . $class . '">';
	
	$return .= '<a href="' . $authorLink . '">';
	$return .= $avatarImg;
	$return .= '<span></span>';

	$return .= '</a>';
	
	$return .= '</div>';
	
	return $return;
}
endif;

/**
THUMBNAILS
**/
// Get thumbnail (dimension can be string value: thumbnail, medium, large, ...; or int value: it will be used for square image)
if (!function_exists('liberty_image_class')) :
function liberty_image_class($type = 'border', $extra = '') {
	$return = '';

	// DATA VALIDATION
	$type = esc_attr($type);
	$extra = esc_attr($extra);
	// DATA VALIDATION ends.
	
	if ($type == 'border' || $type == 'img-thumbnail') {
		$return .= 'img-thumbnail';
	} elseif ($type == 'circle' || $type == 'img-circle') {
		$return .= 'img-circle';
	} elseif ($type == 'none') {
		$return .= '';
	} elseif ($type == 'img-rounded' || $type == 'normal') {
		$return .= 'img-rounded';
	} else {
		$return = ' ';
	}
	
	$return .= " $extra";
	
	return $return;
}
endif;

if (!function_exists('liberty_get_thumbnail')) :
function liberty_get_thumbnail($id, $dimension = array(50, 50), $class = '', $default = '') {	
	if ($class) {
		$postThumbnail = get_the_post_thumbnail($id, $dimension, array('class' => $class, 'title' => ''));
	} else {
		$postThumbnail = get_the_post_thumbnail($id, $dimension, array('title' => ''));
	}
	
	if (!$postThumbnail && $default) {$postThumbnail = '<img src="' . $default . '" alt="' . get_bloginfo('name') . ' thumbnail">';}
	
	return $postThumbnail;
}
endif;




?>