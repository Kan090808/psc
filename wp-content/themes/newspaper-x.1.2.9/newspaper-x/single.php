<?php

/**
 * The template for displaying all single posts.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Newspaper X
 */

get_header(); ?>
    <div class="row">
      <div class="col-md-3">
        <?php get_sidebar(); ?>
      </div>
      <div id="primary" class="content-area col-md-9 col-sm-9 col-xs-12 newspaper-x-sidebar">
        <main id="main" class="site-main" role="main">
        <?php

        while (have_posts()) : the_post();
        $post_id = get_the_ID();
        get_template_part('template-parts/content', get_post_format());
        ?>
        </main><!-- #main -->
      </div><!-- #primary -->
      
    </div>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
      comments_template();
    endif;
    ?>
    </div>
    <?php
    endwhile; // End of the loop.
    get_footer();
