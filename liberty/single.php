<?php
/**
 * @package liberty
 */

get_header(); ?>



<div id="main-content" class="main-content">

	<div id="primary" class="content-area col-xs-12 col-sm-8">
		<div id="content" class="site-content" role="main">
		<?php

			$format = get_post_type();

			if (!$format) {
				$format = get_post_format();
			}

			if (!$format) {
				$format = '';
			}


			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					get_template_part( 'content', $format );

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template('', true);
					endif;

				endwhile;

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar($format); ?>
</div><!-- #main-content -->


<?php get_footer(); ?>
