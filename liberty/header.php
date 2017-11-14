<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->


<?php

// create a global variable
$liberty_theme_options = get_liberty_theme_options();

?>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php

	if (has_site_icon()) {
		wp_site_icon();
	} else {

		$favicon = isset($liberty_theme_options['favicon']['url']) ? $liberty_theme_options['favicon']['url'] : '';
		if ($favicon) {
		?>
		<link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>">
		<?php
		}

		$apple_touch_icon = isset($liberty_theme_options['apple_touch_icon']['url']) ? $liberty_theme_options['favicon']['url'] : '';
		if ($apple_touch_icon) {
		?>
		<link rel="apple-touch-icon" href="<?php echo esc_url($apple_touch_icon); ?>">
		<?php
		}

	}
	?>

	<?php wp_head(); ?>
</head>

<?php

//special behavior
$animate = liberty_default_array($liberty_theme_options, 'switch-use-animation', 0);
$usePrettyPhoto = liberty_default_array($liberty_theme_options, 'switch-use-prettyPhoto', 1);
$showStickyNavigation = liberty_default_array($liberty_theme_options, 'sticky-navigation', 1);
$inlineNavigation = liberty_default_array($liberty_theme_options, 'inline-navigation', 1);
$showPromoLine = liberty_default_array($liberty_theme_options, 'switch-promo', 0);

?>

<body <?php body_class(); ?>>

<?php
$showLoadingScreen = liberty_default_array($liberty_theme_options, 'show-loading-screen', 1);
if ($showLoadingScreen) {
	?>

	<div id="themeblossom_loading_screen" class="pace absolutecenter-all">
		<div id="themeblossom_loading_screen_logo">

		<div class="loader_ring"></div>

		<?php

		if (liberty_check_val($liberty_theme_options, 'ls-logo')) {
			if ($liberty_theme_options['ls-logo']['url']) {
				echo '<img src="' . esc_url($liberty_theme_options['ls-logo']['url']) . '"  width="' . intval($liberty_theme_options['ls-logo']['width']) . 'px;">';
			}					
		}

		?>		

		</div>
	</div>

	<?php
}
?>

<?php if (has_nav_menu( 'contribute' )) : ?>
<div id="overlay-menu" class="hidden-xs">
	<div id="overlay-menu-trigger"><i class="icon-cross"></i></div>

	<div class="absolutecenter">
		<div id="overlay-menu-holder">
			<?php wp_nav_menu( array( 'theme_location' => 'contribute', 'menu_class' => 'overlay-menu absolutecenter', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<div id="page" class="hfeed site">

	<header id="masthead" class="site-header">

	<?php if (!$inlineNavigation) { ?>
		<div id="main-logo-area">
			<h1 class="site-title" id="main-logo">

				<a id="main-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

				<?php
				$logoC = false;

				if (liberty_check_val($liberty_theme_options, 'main-logo')) {
					if ($liberty_theme_options['main-logo']['url']) {
						echo '<img src="' . esc_url($liberty_theme_options['main-logo']['url']) . '" alt="' . get_option( 'blogname' ) . '" class="hidden-xs">';
						$logoC = true;
					}					
				}

				if (liberty_check_val($liberty_theme_options, 'main-logo-small')) {
					if ($liberty_theme_options['main-logo-small']['url']) {
						echo '<img src="' . esc_url($liberty_theme_options['main-logo-small']['url']) . '" alt="' . get_option( 'blogname' ) . '" class="hidden-sm hidden-md hidden-lg visible-xs">';
						$logoC = true;
					}					
				}

				if (!$logoC && liberty_check_val($liberty_theme_options, 'text-logo')) {
					if ($liberty_theme_options['text-logo']) {
						echo esc_attr( $liberty_theme_options['text-logo'] );
						$logoC = true;
					}
				}

				if (!$logoC) {
					echo get_option( 'blogname' );
				}
				?>
				</a>

			</h1>
		</div>
		<?php } // not inline navigation ?>

		<?php

		if ($showPromoLine) { ?>
	
		<div id="promo" class="hidden-xs">
			<div class="container">

			<div class="row">

			<div class="col-xs-12 col-sm-6">
					
			<?php

			$promoLeft = liberty_default_array($liberty_theme_options, 'header-promo-left', 'menu');

			if ($promoLeft == 'menu') {
				wp_nav_menu( array( 'theme_location' => 'top_menu', 'menu_class' => 'top-nav-menu' ) );
			}

			if ($promoLeft == 'text') {
				$promoLeftText = liberty_default_array($liberty_theme_options, 'header-promo-text', '');
				if (trim($promoLeftText)) {
					echo esc_attr( $promoLeftText );
				}
			}

			?>

			</div>
			
			<div class="col-xs-12 col-sm-6">

			<?php
			$promoRight = liberty_default_array($liberty_theme_options, 'header-promo-right', 'icons');

			if ($promoRight != 'hide') {
				echo '<div class="alignright">';
				echo liberty_social_buttons('', 2);
			}

			if ($promoRight == 'search') { ?>

			<a href="#search-container" class="search-button hidden-xs"><span class="icon-search"></span></a>

			<?php
			}


			if ($promoRight != 'hide') {
				echo '</div>';
			}
			?>

			</div>

			<?php if ($promoRight == 'search') { ?>
			<div id="search-container" class="search-box-wrapper">
				<div class="search-box">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php } ?>

			</div>
			
			</div>
		</div>

		<?php
		}
		?>
		<div id="site-branding" class="header-main">

			<div class="container">

				<?php if ($inlineNavigation) { ?>
				<h1 class="site-title" id="main-logo">

					<a id="main-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

					<?php
					$logoC = false;

					if (liberty_check_val($liberty_theme_options, 'main-logo')) {
						if ($liberty_theme_options['main-logo']['url']) {
							echo '<img src="' . esc_url($liberty_theme_options['main-logo']['url']) . '" alt="' . get_option( 'blogname' ) . '" class="hidden-xs" style="">';
							$logoC = true;
						}					
					}

					if (liberty_check_val($liberty_theme_options, 'main-logo-small')) {
						if ($liberty_theme_options['main-logo-small']['url']) {
							echo '<img src="' . esc_url($liberty_theme_options['main-logo-small']['url']) . '" alt="' . get_option( 'blogname' ) . '" class="hidden-sm hidden-md hidden-lg visible-xs">';
							$logoC = true;
						}					
					}

					if (!$logoC && liberty_check_val($liberty_theme_options, 'text-logo')) {
						if ($liberty_theme_options['text-logo']) {
							echo esc_attr( $liberty_theme_options['text-logo'] );
							$logoC = true;
						}
					}

					if (!$logoC) {
						echo get_option( 'blogname' );
					}
					?>
					</a>

				</h1>
				<?php } // inline navigation ?>

				<nav id="primary-navigation" class="site-navigation primary-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</nav>


				<?php if (!$inlineNavigation) { ?>
				<nav id="primary-navigation2" class="site-navigation primary-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary2', 'menu_class' => 'nav-menu' ) ); ?>
				</nav>
				<?php } // not inline navigation ?>
			
			</div>
		</div>
	</header><!-- #masthead -->

	<?php if (is_page_template('page-templates/visual-builder-template.php')) : ?>

	<div id="main" class="site-main nopadding">

	<?php else : ?>

	<?php

	$this_post_promo_image = $this_post_promo_url = $this_post_slider = 0;

	if (is_single() || is_page()) {

		$this_post_id = get_the_id();
		$this_post_meta = liberty_fw_get_db_post_option($this_post_id);

		$this_post_promo_image = isset($this_post_meta['header_image']) ? $this_post_meta['header_image'] : '';
		$this_post_slider = isset($this_post_meta['slider']) ? $this_post_meta['slider'] : 0;

		if ($this_post_slider) {
			$this_post_promo_image = 0;
		}
	}

	if (is_archive()) {
		if (is_tax('fw-portfolio-category')) {
			$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
			$ext_portfolio_settings = $ext_portfolio_instance->get_settings();

			$taxonomy        = $ext_portfolio_settings['taxonomy_name'];
			$term            = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
			$term_id         = ( ! empty( $term->term_id ) ) ? $term->term_id : 0;

			$this_post_promo_image = fw_get_db_term_option($term_id, $taxonomy, 'header_image', '');
		}
	}

	$featuredImage = isset($liberty_theme_options['featured-image']) ? $liberty_theme_options['featured-image'] : array();

	$featuredImageHeight = isset($liberty_theme_options['featured-image-height']['height']) ? $liberty_theme_options['featured-image-height']['height'] : '136';

	$featuredSpecialClass = '';

	if (class_exists('WooCommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
		$featuredImageHeightShop = isset($liberty_theme_options['woocommerce-featured-image-height']['height']) ? $liberty_theme_options['woocommerce-featured-image-height']['height'] : '136';
		if ($featuredImageHeightShop) {
			$featuredImageHeight = $featuredImageHeightShop;
			$featuredSpecialClass = ' onshop ';
		}
	}

	if (defined('THEMEBLOSSOM_ISSUES_CPT') && (is_singular(THEMEBLOSSOM_ISSUES_CPT) || is_post_type_archive(THEMEBLOSSOM_ISSUES_CPT))) {
		$featuredImageHeightIssues = isset($liberty_theme_options['issues-featured-image-height']['height']) ? $liberty_theme_options['issues-featured-image-height']['height'] : '136';
		if ($featuredImageHeightIssues) {
			$featuredImageHeight = $featuredImageHeightIssues;
			$featuredSpecialClass = ' onissues ';
		}		
	}

	if ( class_exists( 'Tribe__Events__Main' ) && ( tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' )) ) {
		$featuredImageHeightEvents = isset($liberty_theme_options['events-featured-image-height']['height']) ? $liberty_theme_options['events-featured-image-height']['height'] : '136';
		if ($featuredImageHeightEvents) {
			$featuredImageHeight = $featuredImageHeightEvents;
			$featuredSpecialClass = ' onevents ';
		}		
	}

	$featured_image_style = '';

	if ((isset($this_post_promo_image) && !empty($this_post_promo_image) && $this_post_promo_image) || (!empty($featuredImage))) {

		if ($this_post_promo_image) {
			$this_post_promo_url = $this_post_promo_image['url'];	
		}

		if ($this_post_promo_url) :
			$this_post_promo_height = str_replace('px', '', $this_post_meta['featured_height']);

			$featured_image_style = ' style="';

			$featured_image_style .= 'background-image: url(' . esc_url($this_post_promo_url) .');';

			if (isset($this_post_promo_height) && !empty($this_post_promo_height) && intval($this_post_promo_height) != $featuredImageHeight ) {
				$featuredImageHeight = intval($this_post_promo_height) . 'px';
				$featured_image_style .= 'height: ' . $featuredImageHeight . ';';
			}

			$featured_image_style .= '" ';
		endif;
	
	if ($featuredImageHeight != '0px' && !$this_post_slider) {
		echo '<section id="featured-image" class="hidden-xs ' . $featuredSpecialClass . '"' . $featured_image_style . '><div class="container absolutecenter-left"><div class="featured-titles">';

		if (isset($this_post_meta['featured_subtitle']) && !empty($this_post_meta['featured_subtitle'])) {
			echo "<h3>" . $this_post_meta['featured_subtitle'] . "</h3>";
		}

		if (isset($this_post_meta['featured_title']) && !empty($this_post_meta['featured_title'])) {
			echo "<h2>" . $this_post_meta['featured_title'] . "</h2>";
		}

		echo '</div></div></section>';
	}

	if (isset($this_post_slider) && $this_post_slider) {
		echo do_shortcode('[rev_slider alias="' . $this_post_slider . '"]');
	}

	} // there is a header image

	?>

	<?php
	if (is_home() || is_front_page() || is_page_template('page-templates/visual-builder-template.php') || !class_exists('WPSEO_Breadcrumbs') ) :
		$showBreadcrumbs = 0;
	else :
		$showBreadcrumbs = liberty_default_array($liberty_theme_options, 'show-breadcrumbs', 1);
	endif;

	if ($showBreadcrumbs) :

	$breadcrumbsType = 0;

	$showPrevNext = liberty_default_array($liberty_theme_options, 'show-breadcrumbs-prevnext', 1);

	if (class_exists('WPSEO_Breadcrumbs')) {
		$breadcrumbsType = 'normal';
	}

	if ( class_exists('WooCommerce') && is_woocommerce() ) {
		$breadcrumbsType = 'woocommerce';
	}

	if ( class_exists( 'Tribe__Events__Main' ) && tribe_is_event()) {
		$breadcrumbsType = 'tribe-event';
	}

	if ( class_exists( 'Tribe__Events__Main' ) && ( tribe_is_upcoming() || tribe_is_past() || tribe_is_day() || tribe_is_month() ) ) {
		$breadcrumbsType = 'tribe-events';
	}

	if ($breadcrumbsType) :
	?>
	
	<div id="breadcrumbs">
		<div class="container">

		<?php
		
		if ($breadcrumbsType == 'woocommerce') {
			woocommerce_breadcrumb();
		}
		
		if ($breadcrumbsType == 'normal') {
			yoast_breadcrumb('<nav class="breadcrumbs alignleft" itemprop="breadcrumb">', '</nav>');

			if ($showPrevNext && (
						is_singular('post')
						|| (is_singular('fw-portfolio'))
						|| (is_singular('issue'))
					)
				) :

				$next_post = get_next_post();
				$prev_post = get_previous_post();

				if (!empty($next_post) || !empty($prev_post)) :
		?>

				<nav class="prevnext alignright">
					<ul>
						<?php if (!empty($prev_post)) : ?>
						<li>&laquo; <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"><?php echo esc_attr($prev_post->post_title); ?></a></li>
						<?php endif; ?>

						<?php if (!empty($next_post)) : ?>
						<li><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_attr( $next_post->post_title ); ?></a> &raquo;</li>
						<?php endif; ?>
					</ul>
				</nav>

		<?php
				endif; // prev/next exists

			endif; // show prev/next
		}

		if ($breadcrumbsType == 'tribe-events') {
			echo '<nav class="breadcrumbs tec-breadcrumbs alignleft" itemprop="breadcrumb"><a href="' . esc_url( home_url() ) . '"  rel="v:url" property="v:title">' . esc_html__('Home', 'liberty') . '</a> &raquo ' . esc_html__('Events', 'liberty') . '</nav>';
		}

		if ($breadcrumbsType == 'tribe-event') {
			echo liberty_yoast_breadcrumbs_tec('<nav class="breadcrumbs tec-breadcrumbs alignleft" itemprop="breadcrumb">', '</nav>', yoast_breadcrumb('', '', false));

			if ($showPrevNext) :
		?>

			<nav class="prevnext alignright">
				<ul>
					<?php if ( tribe_get_prev_event_link() ) : ?>
						<li>&laquo; <?php tribe_the_prev_event_link( '%title%' ) ?></li>
					<?php endif; ?>

					<?php if ( tribe_get_next_event_link() ) : ?>
						<li><?php tribe_the_next_event_link( '%title%' ) ?> &raquo;</li>
					<?php endif; ?>
				</ul>
			</nav>

		<?php

			endif; // show prev/next
		
		}

		?>
		
		</div>

	</div>

	<?php
	endif; // if breadcrumbs class exists

	endif; // if breadcrumbs
	?>

	<div id="main" class="site-main">

		<div class="container">
		
			<div class="row">
	<?php endif; // not visual builder ?>