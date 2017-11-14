<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header();

$liberty_theme_options = get_liberty_theme_options();

?>



<div id="main-content" class="main-content">

	<div id="primary" class="content-area col-xs-12 col-sm-8">
		<div id="content" class="site-content" role="main">
			<header>
				<?php
					the_archive_title( '<h1 class="entry-title tbWow fadeIn">', '</h1>' );
				?>
			</header><!-- .page-header -->  

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() );

				endwhile;

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		<div class="clear"></div>

		<?php	
		
		$navigation_choice = liberty_default_array($liberty_theme_options, 'blog-navigation-type', 'paged');			
		$prev_next = liberty_default_array($liberty_theme_options, 'blog-navigation-paginated-prevnext', true);
				
		liberty_navigation($navigation_choice, '', $prev_next);		

		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- #main-content -->

<?php
get_footer();
