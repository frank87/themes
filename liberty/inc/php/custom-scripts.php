<?php



/***********************************************************************************/
/**
/* CUSTOM SCRIPTS AND STYLES
**/
/***********************************************************************************/
if (!function_exists('liberty_custom_footer_scripts')) {
	add_action('wp_footer', 'liberty_custom_footer_scripts', 1000);
	do_action('liberty_custom_footer_scripts');
	
	function liberty_custom_footer_scripts() {
	
		$liberty_theme_options = get_liberty_theme_options();
		
		// custom js
		$customJS = liberty_default_array($liberty_theme_options, 'custom-js-code', '');
		if (trim($customJS)) {
			echo '<script type="text/javascript">' . esc_js($customJS) . '</script>';
		}

		// Sticky Navigation
		$showStickyNavigation = liberty_default_array($liberty_theme_options, 'sticky-navigation', 1);
		if ($showStickyNavigation) {

		?>
		
		<script>



			var screenRes = jQuery(window).width();

			stickyNavigation();
			jQuery(window).scroll(function(){
				stickyNavigation();
			});

			function stickyNavigation() {

			if (screenRes > 991 && jQuery('body').hasClass('showStickyNavigation')) {

				if (jQuery('body').hasClass('showPromoLine')) {
					promoLineHeight = jQuery('#promo').height() + 1;
				} else {
					promoLineHeight = 0;
				}

				var yScroll = jQuery(window).scrollTop();

				if(yScroll >= promoLineHeight) {
					jQuery('#site-branding')
					.addClass('make-it-sticky')
					.addClass('put-it-on-screen');
				} else {
					jQuery('#site-branding')
					.removeClass('make-it-sticky')
					.removeClass('put-it-on-screen');
				}

				<?php
				if ( liberty_check_val($liberty_theme_options, 'main-logo') ) {
					if ( $liberty_theme_options['main-logo']['url'] ) {
						?>

						if(yScroll >= promoLineHeight) {
							jQuery('#main-logo img').css('height', <?php echo ceil($liberty_theme_options['main-logo']['height'] / 2); ?>)
								.css('width', <?php echo ceil($liberty_theme_options['main-logo']['width'] / 2); ?>);
							jQuery('#main-logo-area').addClass('nobackground');
						} else {
							jQuery('#main-logo img').css('height', <?php echo intval($liberty_theme_options['main-logo']['height']); ?>)
								.css('width', <?php echo intval($liberty_theme_options['main-logo']['width']); ?>);
							jQuery('#main-logo-area').removeClass('nobackground');
						}

						<?php
					}					
				}
				?>

			}

		}
		
		</script>		
  
		<?php

		}
		
		$useAnimate = liberty_default_array($liberty_theme_options, 'switch-use-animation', 0);
		if ($useAnimate) : 
		?>
		
		<script>
			wow = new WOW(
				{
					boxClass: 		'tbWow',
					animateClass: 	'animated',
					offset:       	0,
					mobile:			false
				}
			);
			wow.init();
		</script>		
  
		<?php 
		endif;
		
		$useStickySidebar = liberty_default_array($liberty_theme_options, 'switch-sticky-sidebar', 0);

		if ($useStickySidebar) :

			$stickySidebarMarginTop = 60;

			if (is_user_logged_in()) {
				$stickySidebarMarginTop += 32;
			}

		?>
		
		<script>
			jQuery(document).ready(function() {

				jQuery('#secondary, .custom-sidebar-widget').theiaStickySidebar({
					// Settings
					additionalMarginTop: <?php echo floor($stickySidebarMarginTop); ?>
				});

			});
		</script>		
  
		<?php
		endif;

		?>

		<?php if (class_exists('WooCommerce') && is_single()) : ?>	
		
		<script>
			jQuery(document).ready(function() {
				if (jQuery('.tb-single-product').hasClass('product-type-variable')) {
					jQuery('.single_add_to_cart_button').addClass('btn').addClass('btn-tb-primary');
				}
			});
		</script>

		<?php endif; ?>

		<?php
	}
}

/**
HEADER
**/
if (!function_exists('liberty_custom_header_scripts')) {
	add_action('wp_head', 'liberty_custom_header_scripts', 1000);
	do_action('liberty_custom_header_scripts');
	
	function liberty_custom_header_scripts() {
	
	$liberty_theme_options = get_liberty_theme_options();
	
	echo '<style type="text/css">';

	/**
	Navigation and Logo
	**/


	$inlineNavigation = liberty_default_array($liberty_theme_options, 'inline-navigation', 1);

	$logoAreaWidth = liberty_default_array($liberty_theme_options, 'logo-width', 70);
	$logoAreaWidthSmall = liberty_default_array($liberty_theme_options, 'logo-width-small', 70);

	if (!$inlineNavigation) {
		echo "#main-logo-area {width: ". $logoAreaWidth ."px; margin-left: -" . ceil($logoAreaWidth/2) . "px;}";
		echo "@media screen and (max-width: 767px) { #main-logo-area {width: ". $logoAreaWidthSmall ."px; margin-left: 0;} }";
		echo "#primary-navigation {padding-right: " . ceil($logoAreaWidth/2) . "px;}";
		echo "#primary-navigation2 {padding-left: " . ceil($logoAreaWidth/2) . "px;}";
	} else {
		echo "#main-logo-area-inline {width: ". $logoAreaWidth ."px;}";		
	}

	$loadingScreen = 173;
	if (liberty_check_val($liberty_theme_options, 'ls-logo')) {
		$loadingScreen = max(intval($liberty_theme_options['ls-logo']['width']), intval($liberty_theme_options['ls-logo']['width'])) + 30;
	}
	echo "#themeblossom_loading_screen_logo {width: " . $loadingScreen . "px; height: " . $loadingScreen . "px;}";
	echo "#themeblossom_loading_screen_logo .loader_ring {width: " . $loadingScreen . "px; height: " . $loadingScreen . "px; border-radius:  " . $loadingScreen . "px;}";

	$navigationLinkLH = isset($liberty_theme_options['navigation-typography']) ? $liberty_theme_options['navigation-typography']['line-height'] : '72px';
	echo ".primary-navigation ul li:hover > ul {top: $navigationLinkLH" . ";}";

	$navigationLinkFS = isset($liberty_theme_options['navigation-typography']) ? $liberty_theme_options['navigation-typography']['font-size'] : '12px';
	echo ".primary-navigation ul li {font-size: $navigationLinkFS ;}";

	$navigationLinkC = isset($liberty_theme_options['navigation-typography']) ? $liberty_theme_options['navigation-typography']['color'] : '#535353';
	echo "#tb-responsive-nav-trigger {color: $navigationLinkC ;}";

	$navigationL1Typo = isset($liberty_theme_options['navigation-link-color-level1']) ? $liberty_theme_options['navigation-link-color-level1']['hover'] : '#e4161d';
	echo "#primary-navigation > div > ul > li > a:hover, #primary-navigation > div > ul > li:hover > a, #primary-navigation > div > ul > li.current-menu-item > a, #primary-navigation > div > ul > li.current-menu-ancestor > a {color: $navigationL1Typo ; }";
	echo "#primary-navigation2 > div > ul > li > a:hover, #primary-navigation2 > div > ul > li:hover > a, #primary-navigation2 > div > ul > li.current-menu-item > a, #primary-navigation2 > div > ul > li.current-menu-ancestor > a {color: $navigationL1Typo ; }";

	$navigationL2Typo = isset($liberty_theme_options['navigation-link-color-level2']) ? $liberty_theme_options['navigation-link-color-level2']['hover'] : '#3ebcd8';
	echo "#masthead .primary-navigation .mega-menu ul .current-menu-item a {color: $navigationL2Typo ; }";

	/**
	Buttons
	**/
	$buttonDefaultBckg = isset($liberty_theme_options['default-button-bckg-color']) ? $liberty_theme_options['default-button-bckg-color']['regular'] : '#D20921';
	$buttonDefaultBckgHover = isset($liberty_theme_options['default-button-bckg-color']) ? $liberty_theme_options['default-button-bckg-color']['hover'] : '#F30A26';

	echo ".btn-tb-primary, #tribe-bar-form .tribe-bar-submit input.btn-tb-primary[type=\"submit\"], .woocommerce .button.btn-tb-primary, .woocommerce a.button.btn-tb-primary {background-color: $buttonDefaultBckg !important; background: $buttonDefaultBckg !important; } .btn-tb-primary:hover, .btn-tb-secondary.current, #tribe-bar-form .tribe-bar-submit input.btn-tb-primary[type=\"submit\"]:hover, .woocommerce .button.btn-tb-primary:hover, .woocommerce a.button.btn-tb-primary:hover {background-color: $buttonDefaultBckgHover !important; background: $buttonDefaultBckgHover !important;}";
	
	$buttonSecondaryBckg = isset($liberty_theme_options['secondary-button-bckg-color']) ? $liberty_theme_options['secondary-button-bckg-color']['regular'] : '#043174';
	$buttonSecondaryBckgHover = isset($liberty_theme_options['secondary-button-bckg-color']) ? $liberty_theme_options['secondary-button-bckg-color']['hover'] : '#053f95';

	echo ".btn-tb-secondary, #tribe-bar-form .tribe-bar-submit input.btn-tb-secondary[type=\"submit\"], .woocommerce .button.btn-tb-secondary, .woocommerce a.button.btn-tb-secondary {background-color: $buttonSecondaryBckg ; background: $buttonSecondaryBckg ; } .btn-tb-secondary:hover, .btn-tb-primary.current, #tribe-bar-form .tribe-bar-submit input.btn-tb-secondary[type=\"submit\"]:hover, .woocommerce .button.btn-tb-secondary:hover, .woocommerce a.button.btn-tb-secondary:hover {background-color: $buttonSecondaryBckgHover !important; background: $buttonSecondaryBckgHover !important;}";
	
	$buttonBorder1Bckg = isset($liberty_theme_options['border-button1-bckg-color']) ? $liberty_theme_options['border-button1-bckg-color']['regular'] : '#D20921';
	$buttonBorder1BckgHover = isset($liberty_theme_options['border-button1-bckg-color']) ? $liberty_theme_options['border-button1-bckg-color']['hover'] : '#FFFFFF';

	echo ".btn-border1 {background-color: $buttonBorder1Bckg ; background: $buttonBorder1Bckg ; } .btn-border1:hover {background-color: $buttonBorder1BckgHover ; background: $buttonBorder1BckgHover ;}";
	
	$buttonBorder2Bckg = isset($liberty_theme_options['border-button2-bckg-color']) ? $liberty_theme_options['border-button2-bckg-color']['regular'] : '#043174';
	$buttonBorder2BckgHover = isset($liberty_theme_options['border-button2-bckg-color']) ? $liberty_theme_options['border-button2-bckg-color']['hover'] : '#FFFFFF';

	echo ".btn-border2 {background-color: $buttonBorder2Bckg ; background: $buttonBorder2Bckg ; } .btn-border2:hover {background-color: $buttonBorder2BckgHover ; background: $buttonBorder2BckgHover ;}";

	/**
	Content
	**/
	
	$dateBoxBckg = isset($liberty_theme_options['date-box-bckg']) ? $liberty_theme_options['date-box-bckg'] : '#281A70';
	$dateBoxBckg2 = isset($liberty_theme_options['date-box-bckg2']) ? $liberty_theme_options['date-box-bckg2'] : '#32288D';
	
	$dateBoxBckgSecondary = isset($liberty_theme_options['date-box-bckg-secondary']) ? $liberty_theme_options['date-box-bckg-secondary'] : '#B1091C';
	$dateBoxBckg2Secondary = isset($liberty_theme_options['date-box-bckg2-secondary']) ? $liberty_theme_options['date-box-bckg2-secondary'] : '#990314';
	?>
	
	.featured-image-holder.show-date .date-box span.day {
	    background: <?php echo esc_attr($dateBoxBckg); ?>;
	}
	
	.featured-image-holder.show-date .date-box span.month {
	    background: <?php echo esc_attr($dateBoxBckg2); ?>;
	}
	
	.featured-image-holder.show-date .date-box span.city {
	    background: <?php echo esc_attr($dateBoxBckgSecondary); ?>;
	}
	
	.featured-image-holder.show-date .date-box #single-event-countdown, .featured-image-holder.show-date .date-box.date-box-event span.day, .featured-image-holder.show-date .date-box.date-box-event span.month {
	    background: <?php echo esc_attr($dateBoxBckg2Secondary); ?>;
	}
	
	.featured-image-holder.show-date:hover .date-box span.day {
	    background: <?php echo esc_attr($dateBoxBckgSecondary); ?>;
	}
	
	.featured-image-holder.show-date:hover .date-box span.month {
	    background: <?php echo esc_attr($dateBoxBckg2Secondary); ?>;
	}
	
	.featured-image-holder.show-date:hover .date-box span.city {
	    background: <?php echo esc_attr($dateBoxBckg); ?>;
	}
	
	.featured-image-holder.show-date:hover .date-box #single-event-countdown, .featured-image-holder.show-date:hover .date-box.date-box-event span.day, .featured-image-holder.show-date:hover .date-box.date-box-event span.month {
	    background: <?php echo esc_attr($dateBoxBckg2); ?>;
	}

	<?php
	/**
	Newsletter
	**/
	$newsletterBckg = isset($liberty_theme_options['newsletter-submit-bckg']) ? $liberty_theme_options['newsletter-submit-bckg']['regular'] : '#D20921';
	$newsletterBckgHover = isset($liberty_theme_options['newsletter-submit-bckg']) ? $liberty_theme_options['newsletter-submit-bckg']['hover'] : '#F30A26';
	$newsletterBckgActive = isset($liberty_theme_options['newsletter-submit-bckg']) ? $liberty_theme_options['newsletter-submit-bckg']['active'] : '#F30A26';

	echo 'aside.widget_newsletterwidget input[type="submit"].newsletter-submit '  .  "{background-color: $newsletterBckg ; background: $newsletterBckg ; }";
	echo 'aside.widget_newsletterwidget input[type="submit"].newsletter-submit:hover, aside.widget_newsletterwidget input[type="submit"].newsletter-submit:focus '  .  "{background-color: $newsletterBckgHover ; background: $newsletterBckgHover ; }";
	echo 'aside.widget_newsletterwidget input[type="submit"].newsletter-submit:active '  .  "{background-color: $newsletterBckgActive ; background: $newsletterBckgActive ; }";



	$inputNewsletterColor = isset($liberty_theme_options['newsletter-input-color']) ? $liberty_theme_options['newsletter-input-color']['regular'] : '#A9A3C6';
	$inputNewsletterColorHover = isset($liberty_theme_options['newsletter-input-color']) ? $liberty_theme_options['newsletter-input-color']['hover'] : '#ffffff';
	$inputNewsletterBckg = isset($liberty_theme_options['newsletter-input-bckg']) ? $liberty_theme_options['newsletter-input-bckg']['regular'] : '#281A70';
	$inputNewsletterBckgHover = isset($liberty_theme_options['newsletter-input-bckg']) ? $liberty_theme_options['newsletter-input-bckg']['hover'] : '#180B58';

	echo 'aside.widget_newsletterwidget input[type="text"], aside.widget_newsletterwidget input[type="email"], aside.widget_newsletterwidget input[type="password"], aside.widget_newsletterwidget textarea, aside.widget_newsletterwidget select, aside.widget_newsletterwidget .selectize-input, aside.widget_newsletterwidget .selectize-dropdown, aside.widget_newsletterwidget .selectize-control .selectize-dropdown-content > div[data-selectable] '  .  "{background-color: $inputNewsletterBckg; background: $inputNewsletterBckg; color: $inputNewsletterColor; }";
	echo 'aside.widget_newsletterwidget input[type="text"]:focus, aside.widget_newsletterwidget input[type="email"]:focus, aside.widget_newsletterwidget input[type="password"]:focus, aside.widget_newsletterwidget textarea:focus, aside.widget_newsletterwidget select, aside.widget_newsletterwidget .selectize-control.single .selectize-input.input-active, aside.widget_newsletterwidget .selectize-dropdown, aside.widget_newsletterwidget .selectize-control .selectize-dropdown-content > div[data-selectable]:hover, aside.widget_newsletterwidget .selectize-control .selectize-dropdown-content > div[data-selectable].selected '  .  "{background-color: $inputNewsletterBckgHover; background: $inputNewsletterBckgHover; color: $inputNewsletterColorHover; }";

	/**
	Forms
	**/
	$submitDefaultBckg = isset($liberty_theme_options['default-submit-bckg']) ? $liberty_theme_options['default-submit-bckg']['regular'] : '#D20921';
	$submitDefaultBckgHover = isset($liberty_theme_options['default-submit-bckg']) ? $liberty_theme_options['default-submit-bckg']['hover'] : '#F30A26';
	$submitDefaultBckgActive = isset($liberty_theme_options['default-submit-bckg']) ? $liberty_theme_options['default-submit-bckg']['active'] : '#F30A26';

	echo 'input[type="button"], input[type="reset"], input[type="submit"] '  .  "{background-color: $submitDefaultBckg ; background: $submitDefaultBckg ; }";
	echo 'input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus '  .  "{background-color: $submitDefaultBckgHover ; background: $submitDefaultBckgHover ; }";
	echo 'input[type="button"]:active, input[type="reset"]:active, input[type="submit"]:active '  .  "{background-color: $submitDefaultBckgActive ; background: $submitDefaultBckgActive ; }";


	// TYPE 1
	$submitStyle1Bckg = isset($liberty_theme_options['style1-submit-bckg']) ? $liberty_theme_options['style1-submit-bckg']['regular'] : '#D20921';
	$submitStyle1BckgHover = isset($liberty_theme_options['style1-submit-bckg']) ? $liberty_theme_options['style1-submit-bckg']['hover'] : '#F30A26';
	$submitStyle1BckgActive = isset($liberty_theme_options['style1-submit-bckg']) ? $liberty_theme_options['style1-submit-bckg']['active'] : '#F30A26';

	echo '.liberty_form_style1 input[type="button"], .liberty_form_style1 input[type="reset"], .liberty_form_style1 input[type="submit"] '  .  "{background-color: $submitStyle1Bckg ; background: $submitStyle1Bckg ; }";
	echo '.liberty_form_style1 input[type="button"]:hover, .liberty_form_style1 input[type="reset"]:hover, .liberty_form_style1 input[type="submit"]:hover, .liberty_form_style1 input[type="button"]:focus, .liberty_form_style1 input[type="reset"]:focus, .liberty_form_style1 input[type="submit"]:focus '  .  "{background-color: $submitStyle1BckgHover ; background: $submitStyle1BckgHover ; }";
	echo '.liberty_form_style1 input[type="button"]:active, .liberty_form_style1 input[type="reset"]:active, .liberty_form_style1 input[type="submit"]:active '  .  "{background-color: $submitStyle1BckgActive ; background: $submitStyle1BckgActive ; }";

	$inputStyle1Color = isset($liberty_theme_options['style1-input-color']) ? $liberty_theme_options['style1-input-color']['regular'] : '#2A2A2A';
	$inputStyle1ColorHover = isset($liberty_theme_options['style1-input-color']) ? $liberty_theme_options['style1-input-color']['hover'] : '#F9F9F9';
	$inputStyle1Bckg = isset($liberty_theme_options['style1-input-bckg']) ? $liberty_theme_options['style1-input-bckg']['regular'] : '#E0E5EB';
	$inputStyle1BckgHover = isset($liberty_theme_options['style1-input-bckg']) ? $liberty_theme_options['style1-input-bckg']['hover'] : '#043174';

	echo '.liberty_form_style1 .wrap-forms input[type="text"], .liberty_form_style1 .wrap-forms input[type="email"], .liberty_form_style1 .wrap-forms input[type="password"], .liberty_form_style1 .wrap-forms textarea, .liberty_form_style1 .wrap-forms select, .liberty_form_style1 .wrap-forms .selectize-input, .liberty_form_style1 .wrap-forms .selectize-dropdown, .liberty_form_style1 .wrap-forms .selectize-control .selectize-dropdown-content > div[data-selectable], .liberty_form_style1 input[type="text"], .liberty_form_style1 input[type="email"], .liberty_form_style1 input[type="password"], .liberty_form_style1 textarea, .liberty_form_style1 select, .liberty_form_style1 .selectize-input, .liberty_form_style1 .selectize-dropdown, .liberty_form_style1 .selectize-control .selectize-dropdown-content > div[data-selectable] '  .  "{background-color: $inputStyle1Bckg; background: $inputStyle1Bckg; color: $inputStyle1Color; }";
	echo '.liberty_form_style1 .wrap-forms input[type="text"]:focus, .liberty_form_style1 .wrap-forms input[type="email"]:focus, .liberty_form_style1 .wrap-forms input[type="password"]:focus, .liberty_form_style1 .wrap-forms textarea:focus, .liberty_form_style1 .wrap-forms select, .liberty_form_style1 .wrap-forms .selectize-control.single .selectize-input.input-active, .liberty_form_style1 .wrap-forms .selectize-dropdown, .liberty_form_style1 .wrap-forms .selectize-control .selectize-dropdown-content > div[data-selectable]:hover, .liberty_form_style1 .wrap-forms .selectize-control .selectize-dropdown-content > div[data-selectable].selected, .liberty_form_style1 input[type="text"]:focus, .liberty_form_style1 input[type="email"]:focus, .liberty_form_style1 input[type="password"]:focus, .liberty_form_style1 textarea:focus, .liberty_form_style1 select, .liberty_form_style1 .selectize-control.single .selectize-input.input-active, .liberty_form_style1 .selectize-dropdown, .liberty_form_style1 .selectize-control .selectize-dropdown-content > div[data-selectable]:hover, .liberty_form_style1 .selectize-control .selectize-dropdown-content > div[data-selectable].selected '  .  "{background-color: $inputStyle1BckgHover; background: $inputStyle1BckgHover; color: $inputStyle1ColorHover; }";

	tb_output_placeholder('.liberty_form_style1 .wrap-forms, .liberty_form_style1', $inputStyle1Color);

	/**
	Related / Featured Posts
	**/
	$relatedColorR = isset($liberty_theme_options['related-posts-color']) ? $liberty_theme_options['related-posts-color']['regular'] : '#281A70';
	$relatedColorH = isset($liberty_theme_options['related-posts-color']) ? $liberty_theme_options['related-posts-color']['hover'] : '#ffffff';

	$relatedColorBckgR = isset($liberty_theme_options['related-posts-bckg-color']) ? $liberty_theme_options['related-posts-bckg-color']['regular'] : '#ffffff';
	$relatedColorBckgH = isset($liberty_theme_options['related-posts-bckg-color']) ? $liberty_theme_options['related-posts-bckg-color']['hover'] : '#281A70';

	echo ".tb-posts-carousel .tb-post-carousel-content {color: $relatedColorR ; background-color: $relatedColorBckgR ;}";
	echo ".tb-posts-carousel .slick-slide:hover .tb-post-carousel-content {color: $relatedColorH ; background-color: $relatedColorBckgH ;}";
	echo ".tb-posts-carousel .tb-post-carousel-content h2 {color: $relatedColorR ; }";
	echo ".tb-posts-carousel .slick-slide:hover .tb-post-carousel-content h2 {color: $relatedColorH ; }";
	echo ".tb-post-carousel-content .date-box {background-color: $dateBoxBckgSecondary ;}";
	echo ".slick-slide:hover .tb-post-carousel-content .date-box {background-color: $dateBoxBckg2Secondary ;}";

	$relatedColorLinkR = isset($liberty_theme_options['related-posts-link-color']) ? $liberty_theme_options['related-posts-link-color']['regular'] : '#A02E2F';
	$relatedColorLinkH = isset($liberty_theme_options['related-posts-link-color']) ? $liberty_theme_options['related-posts-link-color']['hover'] : '#ffffff';

	$relatedLinkColorBckgR = isset($liberty_theme_options['related-posts-link-bckg-color']) ? $liberty_theme_options['related-posts-link-bckg-color']['regular'] : '#ffffff';
	$relatedLinkColorBckgH = isset($liberty_theme_options['related-posts-link-bckg-color']) ? $liberty_theme_options['related-posts-link-bckg-color']['hover'] : '#1E125D';

	echo ".tb-posts-carousel .read-more {color: $relatedColorLinkR ; background-color: $relatedLinkColorBckgR ;}";
	echo ".tb-posts-carousel .slick-slide:hover .read-more {color: $relatedColorLinkH ; background-color: $relatedLinkColorBckgH ;}";

	$relatedOverlayColor = isset($liberty_theme_options['related-posts-overlay-bckg-color']) ? $liberty_theme_options['related-posts-overlay-bckg-color'] : '#000000';
	$relatedOverlayOpacity = isset($liberty_theme_options['related-posts-overlay-opacity']) ? $liberty_theme_options['related-posts-overlay-opacity'] : '0.4';
	$relatedOverlayTitleColor = isset($liberty_theme_options['related-posts-overlay-color']) ? $liberty_theme_options['related-posts-overlay-color'] : '#ffffff';

	echo ".tb-related-posts span {background-color: " . liberty_hex2rgb_output($relatedOverlayColor, $relatedOverlayOpacity) . " ;}";
	echo ".tb-related-posts h4 {color: " . $relatedOverlayTitleColor . " ;}";



	/**
	Issues
	**/
	$issuesBckg = isset($liberty_theme_options['issues-bckg-color']) ? $liberty_theme_options['issues-bckg-color']['regular'] : '#32288D';
	$issuesBckgOuter = isset($liberty_theme_options['issues-bckg-color']) ? $liberty_theme_options['issues-bckg-color']['hover'] : '#281A70';

	$issuesLink = isset($liberty_theme_options['issues-link-color']) ? $liberty_theme_options['issues-link-color']['regular'] : '#ffffff';
	$issuesLinkHover = isset($liberty_theme_options['issues-link-color']) ? $liberty_theme_options['issues-link-color']['hover'] : '#A02E2F';

	$issuesTitleColor = isset($liberty_theme_options['issues-title-color']) ? $liberty_theme_options['issues-title-color'] : '#ffffff';
	$issuesOverlayColor = isset($liberty_theme_options['issues-overlay-bckg-color']) ? $liberty_theme_options['issues-overlay-bckg-color'] : '#ffffff';

	echo ".tb-issues-holder .ch-item {background-color: $issuesBckgOuter ;}";
	echo ".tb-issues-holder .ch-info-back {background-color: $issuesBckg ;}";
	echo ".tb-issues-holder .ch-info h3, .ch-info i:before {color: $issuesTitleColor ;}";
	echo "#issues-list-bar {background: $issuesOverlayColor ;}";

	/**
	Gallery / Portfolio
	**/
	$portfolioOverlay = isset($liberty_theme_options['portfolio-overlay-bckg-color']) ? $liberty_theme_options['portfolio-overlay-bckg-color'] : '#043174';
	$portfolioOverlayOpacity = isset($liberty_theme_options['portfolio-overlay-opacity']) ? $liberty_theme_options['portfolio-overlay-opacity'] : '0.7';
	$portfolioColor = isset($liberty_theme_options['portfolio-color']) ? $liberty_theme_options['portfolio-color'] : '#ffffff';

	echo ".tb-portfolio-img span, .tb-issues-holder.tb-gallery-list .ch-info-back {background-color: " . liberty_hex2rgb_output($portfolioOverlay, $portfolioOverlayOpacity) . " ;}";
	echo ".tb-portfolio-img h3, .tb-portfolio-img p, .tb-issues-holder.tb-gallery-list .ch-info i:before {color: $portfolioColor;}";

	/**
	Footer
	**/
	// WIDE FOOTER FORMS
	$submitWFBckg = isset($liberty_theme_options['footer-wide-submit-bckg']) ? $liberty_theme_options['footer-wide-submit-bckg']['regular'] : '#B3AED2';
	$submitWFBckgHover = isset($liberty_theme_options['footer-wide-submit-bckg']) ? $liberty_theme_options['footer-wide-submit-bckg']['hover'] : '#9894b3';
	$submitWFBckgActive = isset($liberty_theme_options['footer-wide-submit-bckg']) ? $liberty_theme_options['footer-wide-submit-bckg']['active'] : '#9894b3';

	echo '#wide-footer input[type="button"], #wide-footer input[type="reset"], #wide-footer input[type="submit"], #wide-footer aside.widget_newsletterwidget input[type="submit"].newsletter-submit '  .  "{background-color: $submitWFBckg ; background: $submitWFBckg ; }";
	echo '#wide-footer input[type="button"]:hover, #wide-footer input[type="reset"]:hover, #wide-footer input[type="submit"]:hover, #wide-footer input[type="button"]:focus, #wide-footer input[type="reset"]:focus, #wide-footer input[type="submit"]:focus, #wide-footer aside.widget_newsletterwidget input[type="submit"].newsletter-submit:hover, #wide-footer aside.widget_newsletterwidget input[type="submit"].newsletter-submit:focus  '  .  "{background-color: $submitWFBckgHover ; background: $submitWFBckgHover ; }";
	echo '#wide-footer input[type="button"]:active, #wide-footer input[type="reset"]:active, #wide-footer input[type="submit"]:active, #wide-footer aside.widget_newsletterwidget input[type="submit"].newsletter-submit:active '  .  "{background-color: $submitWFBckgActive ; background: $submitWFBckgActive ; }";

	/* .wide-footer */
	$submitWFBckg = isset($liberty_theme_options['footer-wide-secondary-submit-bckg']) ? $liberty_theme_options['footer-wide-secondary-submit-bckg']['regular'] : '#281A70';
	$submitWFBckgHover = isset($liberty_theme_options['footer-wide-secondary-submit-bckg']) ? $liberty_theme_options['footer-wide-secondary-submit-bckg']['hover'] : '#180B58';
	$submitWFBckgActive = isset($liberty_theme_options['footer-wide-secondary-submit-bckg']) ? $liberty_theme_options['footer-wide-secondary-submit-bckg']['active'] : '#180B58';

	echo '.wide-footer input[type="button"], .wide-footer input[type="reset"], .wide-footer input[type="submit"], .wide-footer aside.widget_newsletterwidget input[type="submit"].newsletter-submit '  .  "{background-color: $submitWFBckg ; background: $submitWFBckg ; }";
	echo '.wide-footer input[type="button"]:hover, .wide-footer input[type="reset"]:hover, .wide-footer input[type="submit"]:hover, .wide-footer input[type="button"]:focus, .wide-footer input[type="reset"]:focus, .wide-footer input[type="submit"]:focus, .wide-footer aside.widget_newsletterwidget input[type="submit"].newsletter-submit:hover, .wide-footer aside.widget_newsletterwidget input[type="submit"].newsletter-submit:focus  '  .  "{background-color: $submitWFBckgHover ; background: $submitWFBckgHover ; }";
	echo '.wide-footer input[type="button"]:active, .wide-footer input[type="reset"]:active, .wide-footer input[type="submit"]:active, .wide-footer aside.widget_newsletterwidget input[type="submit"].newsletter-submit:active '  .  "{background-color: $submitWFBckgActive ; background: $submitWFBckgActive ; }";

	$inputWFColor = isset($liberty_theme_options['footer-wide-input-color']) ? $liberty_theme_options['footer-wide-input-color']['regular'] : '#A4A0C4';
	$inputWFColorHover = isset($liberty_theme_options['footer-wide-input-color']) ? $liberty_theme_options['footer-wide-input-color']['hover'] : '#C2BFD6';
	$inputWFBckg = isset($liberty_theme_options['footer-wide-input-bckg']) ? $liberty_theme_options['footer-wide-input-bckg']['regular'] : '#443690';
	$inputWFBckgHover = isset($liberty_theme_options['footer-wide-input-bckg']) ? $liberty_theme_options['footer-wide-input-bckg']['hover'] : '#372a73';
	$inputWFHeight = isset($liberty_theme_options['footer-wide-input-height']) ? $liberty_theme_options['footer-wide-input-height'] : '38';

	echo '#wide-footer input[type="text"], #wide-footer input[type="email"], #wide-footer input[type="password"], #wide-footer textarea, #wide-footer select, #wide-footer .selectize-input, #wide-footer .selectize-dropdown, #wide-footer .selectize-control .selectize-dropdown-content > div[data-selectable] '  .  "{background-color: $inputWFBckg; background: $inputWFBckg; color: $inputWFColor; }";
	echo '#wide-footer input[type="submit"], #wide-footer input[type="text"], #wide-footer input[type="email"], #wide-footer input[type="password"], #wide-footer select, #wide-footer .selectize-input, #wide-footer .selectize-dropdown, #wide-footer .selectize-control .selectize-dropdown-content > div[data-selectable] '  .  "{height: " . $inputWFHeight . "px; }";
	echo '#wide-footer span '  .  "{height: " . $inputWFHeight . "px; line-height: " . $inputWFHeight . "px; font-size: 60%; right: 15px; }";
	echo '#wide-footer input[type="text"]:focus, #wide-footer input[type="email"]:focus, #wide-footer input[type="password"]:focus, #wide-footer textarea:focus, #wide-footer select, #wide-footer .selectize-control.single .selectize-input.input-active, #wide-footer .selectize-dropdown, #wide-footer .selectize-control .selectize-dropdown-content > div[data-selectable]:hover, #wide-footer .selectize-control .selectize-dropdown-content > div[data-selectable].selected '  .  "{background-color: $inputWFBckgHover; background: $inputWFBckgHover; color: $inputWFColorHover; }";
	

	/* .wide-footer */

	$inputWFColor = isset($liberty_theme_options['footer-wide-secondary-input-color']) ? $liberty_theme_options['footer-wide-secondary-input-color']['regular'] : '#CC979A';
	$inputWFColorHover = isset($liberty_theme_options['footer-wide-secondary-input-color']) ? $liberty_theme_options['footer-wide-secondary-input-color']['hover'] : '#F1CCCE';
	$inputWFBckg = isset($liberty_theme_options['footer-wide-secondary-input-bckg']) ? $liberty_theme_options['footer-wide-secondary-input-bckg']['regular'] : '#9F071A';
	$inputWFBckgHover = isset($liberty_theme_options['footer-wide-secondary-input-bckg']) ? $liberty_theme_options['footer-wide-secondary-input-bckg']['hover'] : '#7E000F';
	$inputWFHeight = isset($liberty_theme_options['footer-wide-secondary-input-height']) ? $liberty_theme_options['footer-wide-secondary-input-height'] : '38';

	echo '.wide-footer input[type="text"], .wide-footer input[type="email"], .wide-footer input[type="password"], .wide-footer textarea, .wide-footer select, .wide-footer .selectize-input, .wide-footer .selectize-dropdown, .wide-footer .selectize-control .selectize-dropdown-content > div[data-selectable] '  .  "{background-color: $inputWFBckg; background: $inputWFBckg; color: $inputWFColor; }";
	echo '.wide-footer input[type="submit"], .wide-footer input[type="text"], .wide-footer input[type="email"], .wide-footer input[type="password"], .wide-footer select, .wide-footer .selectize-input, .wide-footer .selectize-dropdown, .wide-footer .selectize-control .selectize-dropdown-content > div[data-selectable] '  .  "{height: " . $inputWFHeight . "px; }";
	echo '.wide-footer span '  .  "{height: " . $inputWFHeight . "px; line-height: " . $inputWFHeight . "px; font-size: 60%; right: 15px; }";
	echo '.wide-footer input[type="text"]:focus, .wide-footer input[type="email"]:focus, .wide-footer input[type="password"]:focus, .wide-footer textarea:focus, .wide-footer select, .wide-footer .selectize-control.single .selectize-input.input-active, .wide-footer .selectize-dropdown, .wide-footer .selectize-control .selectize-dropdown-content > div[data-selectable]:hover, .wide-footer .selectize-control .selectize-dropdown-content > div[data-selectable].selected '  .  "{background-color: $inputWFBckgHover; background: $inputWFBckgHover; color: $inputWFColorHover; }";

	/**
	CUSTOM CSS
	**/
	$customCSS = liberty_default_array($liberty_theme_options, 'custom-css-code', '');
	if ($customCSS) {
		echo esc_attr($customCSS);
	}

	$customCSSXS = liberty_default_array($liberty_theme_options, 'custom-xs-css-code', '');
	if ($customCSSXS) {
		echo "@media screen and (max-width: 767px) {";
		echo esc_attr($customCSSXS);
		echo "}";
	}	
	
	echo '</style>';

	} // liberty_custom_header_scripts

} // exists liberty_custom_header_scripts ?

?>