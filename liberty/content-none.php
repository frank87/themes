<?php
/**
 * @package Greenback
 */

$liberty_theme_options = get_liberty_theme_options(); 

$container_type = liberty_default_array($liberty_theme_options, 'container-type', 'wide');

// default settings
$title404 = liberty_default_array($liberty_theme_options, '404-title', 'Page not found');
$message404 = liberty_default_array($liberty_theme_options, '404-message', 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.');
$extra404 = liberty_default_array($liberty_theme_options, '404-extra', 'search');



?>

<article id="404-error-not-found" <?php post_class('col-xs-12'); ?>>
	
	<header class="entry-header">

	<h1 class="entry-title"><?php echo esc_attr( $title404 ); ?></h1>
		
	</header>

	<?php echo apply_filters('the_content', $message404); ?>

	<?php if ($extra404 == 'search') {
	?>

	<section id="404-search-form" class="margin15">
		<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<p>
				<label class="input-group width60p">
					<span class="screen-reader-text"><?php esc_html_e('Search for:', 'liberty'); ?></span>
					<input type="search" class="search-field form-control" placeholder="<?php esc_html_e('Search', 'liberty'); ?>" value="" name="s" title="<?php esc_html_e('Search for:', 'liberty'); ?>">
				</label>
			</p>
			<p>
				<input type="submit" class="search-submit btn" value="Search">
			</p>		
		</form>
	</section>

	<?php
	}
	?>

	<?php
	if ($extra404 == 'latest' || $extra404 == 'random') {

		$args['post_type'] = 'post';

		if ($extra404 == 'random') {
			$args['orderby'] = 'rand';
		}
		
		$customQuery = new WP_Query( $args );
		?>

		<?php if ( $customQuery->have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $customQuery->have_posts() ) : $customQuery->the_post(); ?>
			
				<?php				
				
				?>

			<?php endwhile; ?>

		<?php endif;
	}
	?>
	

</article><!-- #post-## -->