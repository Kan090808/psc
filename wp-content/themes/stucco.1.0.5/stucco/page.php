<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Stucco
 */

get_header(); 

$banner_hide = get_theme_mod('page_header_banner_hide', true );
?>
<?php get_template_part( 'sections/page', 'header-banner' ); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<main id="main" class="col-md-8 site-main" role="main">
			
				<?php if ( false == $banner_hide ){ ?>
					<header class="page-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
				<?php } ?>

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
			<div class="col-md-4 sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div><!-- #primary -->

<?php
get_footer();
