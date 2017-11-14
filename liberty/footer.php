<?php

/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */

?>

	<?php if (is_page_template('page-templates/visual-builder-template.php')) : ?>

	</div><!-- #main -->

	<?php else : ?>
			</div>
		</div>
	</div><!-- #main -->
	<?php endif; ?>


		

<?php

$liberty_theme_options = get_liberty_theme_options();

$showFooterTwitterWidget = liberty_default_array($liberty_theme_options, 'switch-footer-wide', 0);
$wideFooterShortcode = liberty_default_array($liberty_theme_options, 'footer-wide-shortcode', '');

if ($showFooterTwitterWidget && (is_active_sidebar( 'footer-wide' ) || !empty($wideFooterShortcode) ) ) :
?>

		<footer id="wide-footer">
			<div class="container">
				<div class="row">

				<?php
				
				dynamic_sidebar( 'footer-wide' );

				?>

				<?php
				if (!empty($wideFooterShortcode)) {
					echo do_shortcode($wideFooterShortcode);
				}
				?>
				
				</div>

			</div>
		</footer>

<?php
endif; // footer promo
?>

	<footer id="main-footer" class="site-footer">

<?php
$footerColumns = liberty_default_array($liberty_theme_options, 'footer-widgets', '4cols');
if ($footerColumns != 'no') :
	$footerClass = ' col-sm-3 ';

	if ($footerColumns == '3cols') {
		$footerClass = ' col-sm-4 ';
	}

	$numberOfFooterCols = intval(str_replace('cols', '', $footerColumns));

	$footerClass .= ' col-xs-12 ';

	$footerWidgetExists = 0;

	$footerColumnsCounter = 1;

	while ($footerColumnsCounter <= $numberOfFooterCols) {
		$widgetArea = 'footer' . $footerColumnsCounter;

		if (is_active_sidebar($widgetArea )) :
			$footerWidgetExists = 1;
			break;
		endif;

		$footerColumnsCounter++;
	}

	if ($footerWidgetExists) :
	?>
		<div class="container">
			<div class="row">
	<?php
	endif;

	$footerColumnsCounter = 1;

	while ($footerColumnsCounter <= $numberOfFooterCols) {
		$widgetArea = 'footer' . $footerColumnsCounter;

		if (is_active_sidebar($widgetArea )) :
			echo '<div class="' . $footerClass . '">';
			dynamic_sidebar($widgetArea);
			echo '</div>';
		endif;

		$footerColumnsCounter++;
	}

	if ($footerWidgetExists) :
	?>
			</div>
		</div>
	<?php
	endif;
endif;
?>


	
		<div id="footer-navigation">
		
			<div class="container">
			
			<div class="row">

			<div class="disclaimer-area col-sm-6">
			
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_navigation', 'depth' => 1, 'fallback_cb' => false ) ); ?>
			</nav>

			<div class="clear"></div>

			<div class="clear">
				<?php
				$footerText = liberty_default_array($liberty_theme_options, 'footer-text', '');
				if ($footerText) {
					echo apply_filters( 'the_content', $footerText);
				}
				?>
			</div>

			</div>

			<div class="col-xs-12 col-sm-6">

			<?php
			$emptyArray = array();
			$footerLogoFile = liberty_default_array($liberty_theme_options, 'footer-logo', $emptyArray);

			if (!empty($footerLogoFile) && liberty_default_array($footerLogoFile, 'url', '')) :
			?>
			<h2 id="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $footerLogoFile["url"] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a></h2>
			<?php endif; ?>
		
			</div>

			</div>
			
			</div>
			
		</div>

	</footer>

	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
