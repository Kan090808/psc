<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Stucco
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function stucco_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'stucco_body_classes' );

function stucco_search_cb(){ 	
    $hide_search = get_theme_mod('home_general_hidesearch', true);
	if ( true == $hide_search ) {
	?>
	<div class="search-bar">
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="screen-reader-text"><?php esc_attr_e( 'Search for', 'stucco' ); ?></span>
			<input type="text" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'stucco' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'stucco' ); ?>">
			<input type="submit" class="search-submit" value="" />   
		</form>
	</div>
	<?php 
	}
} 
add_action( 'stucco_search_bar', 'stucco_search_cb' );


function stucco_social_cb(){ 	
	$facebook = get_theme_mod('home_general_facebook','');
	$twitter = get_theme_mod('home_general_twitter','');
	$gplus = get_theme_mod('home_general_gplus','');
	$youtube = get_theme_mod('home_general_youtube','');
	$instagram = get_theme_mod('home_general_instagram','');
	$rss = get_theme_mod('home_general_rssfeed','');
	?>
	<div class="social">
		<ul>
		<?php if (!empty($facebook)) { ?>
			<li><a href="<?php echo esc_url($facebook)?>" class="facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<?php 
		} 
		if (!empty($twitter)) {
		?>		
			<li><a href="<?php echo esc_url($twitter)?>" class="twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<?php 
		} 
		if (!empty($gplus)) {
		?>	
			<li><a href="<?php echo esc_url($gplus)?>" class="gplus" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			<?php 
		} 
		if (!empty($youtube)) {
		?>	
			<li><a href="<?php echo esc_url($youtube)?>" class="youtube" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
		<?php 
		} 
		if (!empty($instagram)) {
		?>	
			<li><a href="<?php echo esc_url($instagram)?>" class="instagram" title="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
			<?php 
		} 
		if (!empty($rss)) {
		?>	
			<li><a href="<?php echo esc_url($rss)?>" class="rss" title="RSS" target="_blank"><i class="fa fa-rss"></i></a></li>
		<?php 
		} 
		?>	
		</ul>
	</div>
	<?php 
} 
add_action( 'stucco_social_links', 'stucco_social_cb' );

function stucco_footer(){

$copyright = get_theme_mod('general_footer_copyright', '');
$footer_columns = get_theme_mod( 'general_footer_columns' );
 // Footer Columns Area Widgets
$column = 4;
if ( $footer_columns != '0' ) {		
	$column = get_theme_mod( 'general_footer_columns' );
		if( $column == 1) $ft_class = 'col-md-12 col-sm-12 footer-column';
		if( $column == 2) $ft_class = 'col-md-6 col-sm-6 footer-column';
		if( $column == 3) $ft_class = 'col-md-4 col-sm-6 footer-column';
		if( $column == 4) $ft_class = 'col-md-3 col-sm-6 footer-column';
}
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<?php
		if ( ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) && $column > 0 ) 
		{ 
		if ( $footer_columns != '0' ) {
		?>		
		<div class="footer-top">
			<div class="container">
			
					<?php $i = 0; while ( $i < $column ) { $i++; ?>
						<?php if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
							<div class="<?php echo esc_attr( $ft_class ); ?>">
								<div class="widget-area">
									<?php dynamic_sidebar( 'footer-' . $i ); ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				
				
			
			</div>
		</div>	
		<?php 
			} 
		}
		?>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="site-info">
					<div class="copyright float-l">
						<?php 
						if ($copyright) { 
							echo wp_kses_post( $copyright ) ;
						} else { ?>
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'stucco' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'stucco' ), 'WordPress' ); ?>
							</a>
						<?php }?>
					</div>
					<div class="theme-by float-r">
						<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'stucco' ), '<a href="//www.icynets.com/stucco-clean-free-wordpress-blog-theme/" target="_blank">Stucco</a>', '<a href="//www.icynets.com/" target="_blank">icyNETS</a>' ); ?>
					</div>
				</div><!-- .site-info -->
			</div>
		</div>	
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
	
	<?php
}