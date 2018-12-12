<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Stucco
 */
$banner_hide = get_theme_mod('page_header_banner_hide', true );
get_header(); ?>
<?php get_template_part( 'sections/page', 'header-banner' ); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<main id="main" class="col-md-8 site-main" role="main">

				<?php
				if ( have_posts() ) : 
					if ( false == $banner_hide ){ ?>
					<header class="card page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'stucco' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->
					<?php
					}
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

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
