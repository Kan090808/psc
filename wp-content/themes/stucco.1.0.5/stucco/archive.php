<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Stucco
 */
$banner_hide = get_theme_mod('page_header_banner_hide',true);
get_header(); ?>

<?php get_template_part( 'sections/page', 'header-banner' ); ?>

<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<main id="main" class="col-md-8 site-main" role="main">

			<?php
			if ( have_posts() ) : 
				if ( false == $banner_hide ){ ?>
				<header class="page-header card">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->
				<?php } ?>
				<?php
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
