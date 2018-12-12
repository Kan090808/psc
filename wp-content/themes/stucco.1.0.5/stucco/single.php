<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Stucco
 */

get_header();

?>

<div id="primary" class=" content-single">
	<div class="container">

		<?php
		while ( have_posts() ) : the_post(); 

			if ( has_post_thumbnail() )
			{
			$stucco_thumb_id = get_post_thumbnail_id();
			$stucco_img_url = wp_get_attachment_image_src($stucco_thumb_id, 'stucco-full', true);	
			$stucco_fullimg = $stucco_img_url[0];
			}
			else
			{
				$stucco_fullimg = STUCCO_THEME_DIR_URI . '/assets/images/stucco-thumb-full.png';
			}
			$style = 'background:url('. esc_url( $stucco_fullimg ) .') no-repeat center top; background-size:cover;-webkit-background-size: cover;-o-background-size: cover;-ms-background-size: cover;-moz-background-size: cover;';
		?>
		
			<div class="post-image" style="<?php echo esc_attr($style);?>">	
				<?php
				 //the_post_thumbnail('stucco-full'); ?>
			</div>	

		<main id="main" class="col-md-8 site-main" role="main">
			<header class="entry-header">
				<div class="content-title">
				
					<?php stucco_entry_category(); ?>
					
					<?php
						the_title( '<h1 class="entry-title">', '</h1>' );
					?>
						<?php
						if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php stucco_post_meta(); ?>
						</div><!-- .entry-meta -->
						<?php
						endif; ?>
				</div>	
			</header><!-- .entry-header -->
				<?php
					get_template_part( 'template-parts/content', 'single' );
				?>
				<?php stucco_author_box(); ?>

					<?php stucco_next_prev_post(); ?>

		
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) : ?>
						
						<div class="">	
							<?php comments_template(); ?>
						</div>	
						
					<?php	
						endif;

						endwhile; // End of the loop.
					?>
				
		</main><!-- #main -->
			
		<div class="col-md-4 sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
		
</div><!-- #primary -->

<?php
get_footer();
