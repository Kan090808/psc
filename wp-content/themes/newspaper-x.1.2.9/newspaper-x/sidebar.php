<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newspaper X
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-lg-12 col-md-12 col-sm-12 newspaper-x-sidebar" role="complementary">
	<div class="newspaper-x-blog-sidebar">
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	</div>
</aside><!-- #secondary -->
