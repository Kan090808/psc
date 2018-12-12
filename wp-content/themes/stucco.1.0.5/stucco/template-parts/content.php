<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Stucco
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-list'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-image">
			 <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			 	<?php
				
				?>
				<?php the_post_thumbnail('stucco-smallfeatured'); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="card-block">
		<?php 
			the_title( '<h4 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); 
			
			if ( is_sticky() ) :
					echo '<i class="fa fa-thumb-tack" aria-hidden="true"></i>';
				endif;
		?>

		<div class="entry-meta">
		<?php if ( get_theme_mod('hide_post_meta', true) != false ) { ?>
			<?php stucco_entry_author(); ?>
			<?php stucco_posted_on(); ?>
		<?php }?>
		</div><!-- .entry-meta -->

		<p class="card-text">
			<?php the_excerpt(); ?>
		</p>
	</div>

</article><!-- #post-## -->

