<?php
/**
 * @package liberty
 */

get_header(); ?>



<div id="main-content" class="main-content">

	<div id="primary" class="content-area col-xs-12 col-sm-8">
		<div id="content" class="site-content" role="main">

		<?php get_template_part( 'content', 'none' ); ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- #main-content -->

<?php get_footer(); ?>
