<?php

/**
 * The template for displaying archive pages.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Newspaper X
 */

get_header(); ?>

<?php
$name = single_cat_title("", false);
global $wp_query;
?>

		<div class="col-md-3" style="display:inline-block">
			<?php get_sidebar(); ?>
		</div>
		<div class="col-md-9"style="display:inline-block">
			<div class="row" >
        <?php echo do_shortcode('[flexy_breadcrumb]'); ?>
				<header class="col-xs-12">
					<?php
    the_archive_title('<h3 class="page-title"><span>', '</span></h3>');
    the_archive_description('<div class="taxonomy-description">', '</div>');
    ?>
				</header><!-- .page-header -->
			</div>
			<div class="row">
				<div id="primary" class="newspaper-x-content newspaper-x-archive-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<main id="main" class="site-main" role="main">
					
						<?php
      echo do_shortcode('[posts_data_table columns="title,category,date" category="' . $name . '" 
						rows_per_page="10" ]');
      ?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- #row -->
		</div>
<?php
get_footer();
