<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stucco
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<?php wp_head(); ?>

</head>

<body <?php body_class('wow fadeIn'); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'stucco' ); ?></a>
	
	<!-- HEADER-->	
		<!--start-main-->
<header id="masthead" class="header">
        <div class="header-top">
	        <div class="container">
				<div class="site-branding">
					<div class="logo">
					<?php if ( has_custom_logo() ) { ?>
						<div class="logo-image">
							<?php the_custom_logo(); ?>
						</div>
					<?php } else { ?>
						<h1 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php } ?>
					</div>
					
					
				</div>			
				<?php do_action( 'stucco_search_bar' ); ?>
				<?php do_action( 'stucco_social_links' ); ?>	
				<div class="clearfix"></div>
			</div>
		</div><!--head-top-->
			
		
		<nav id="site-navigation" class="main-navigation border-bottom" role="navigation">
			<span class="header-menu-button"><i class="fa fa-bars"></i></span>
			<div id="main-menu" class="container stucco-mobile-menu-standard-color-scheme">
				<div class="main-menu-close"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></div>
				<?php wp_nav_menu( array( 
						'theme_location' => 'primary', 
						'container_class' => 'main-navigation-inner' 
						) 
					); 
				?>
			</div>

		</nav><!-- #site-navigation -->
								
</header>	

	<div id="content" class="site-content">