<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Stucco
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<main id="main" class="col-md-8 site-main" role="main">

			<?php
			if ( have_posts() ) :


				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content' );

				endwhile;

				the_posts_pagination( 
				    array(
	                    'mid_size' => 3,
	                    'prev_text' => '<i class="fa fa-chevron-left"></i>',
	                    'next_text' => '<i class="fa fa-chevron-right"></i>',
	                ) 
	            );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</main><!-- #main -->
			<div class="col-md-4 sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div><!-- #primary -->

<?php
get_footer();