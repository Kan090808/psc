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
						<?php the_post_thumbnail('stucco-smallfeatured'); ?>
				 </a>
				</div>
			<?php endif; ?>

			<div class="card-block">
				<?php 
				the_title( '<h4 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
			<?php if ('post' === get_post_type()):?>
				<div class="entry-meta">
					<ul>
						<li><?php stucco_entry_author(); ?></li>
						<li><?php stucco_posted_on(); ?></li>
					</ul>
				</div><!-- .entry-meta -->
			<?php endif; ?>
				<p class="card-text">
					<?php the_excerpt(); ?>
				</p>
								
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-readmore">
					<?php _e( 'Read More', 'stucco' ); ?> 
				</a>
			</div>

</article><!-- #post-## -->

