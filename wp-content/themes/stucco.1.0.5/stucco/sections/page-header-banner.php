<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Stucco
 */

$page_banner = get_theme_mod('page_header_banner_hide',true);
$banner_url = get_header_image();

if ( $banner_url != '' ){
	$banner_bg_image = get_header_image() ;
} else { 
	$banner_bg_image = STUCCO_THEME_DIR_URI . '/assets/images/page-banner.jpg' ;
}
$style = 'background:url('. esc_url($banner_bg_image) .') no-repeat center center fixed ; background-size:cover;
-webkit-background-size: cover;
-o-background-size: cover;
-ms-background-size: cover;
-moz-background-size: cover;';
?>
 
<!-- banner -->
<?php if ( $page_banner == true){ ?>
	<section class="page-header-banner" style="<?php echo $style ;?>">
		<div class="container">
			<div class="inner">
				<div class="inner-meta">
					<?php 
					if ( is_search() )
					{ ?>
						<h1 class="header-banner-title"><?php printf( esc_html__( 'Search Results for: %s', 'stucco' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php 
					} 
					elseif ( is_archive() )
					{ 
						the_archive_title( '<h1 class="header-banner-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
 					} 
					else 
					{ 
						the_title( '<h1 class="header-banner-title">', '</h1>' ); 
					}
					?>
				</div>
			</div>
		</div><!--.container-->
	</section>
<?php

}

?>