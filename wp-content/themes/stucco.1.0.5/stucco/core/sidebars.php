<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 
 
function stucco_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stucco' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'stucco' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	/*--Widget Area--*/

	if ( get_theme_mod( 'general_footer_columns' ) != '0' ) {
		
	//register Footer widgets
	if ( get_theme_mod('general_footer_columns') >= '1' ) { 
		register_sidebar(array( 
			'name' 			=> esc_html__( 'Footer 1', 'stucco'),
			'id' 			=> 'footer-1', 
			'description' 	=> esc_html__( 'Footer Column Widget 1', 'stucco'), 
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			)); 
		}
		
		if ( get_theme_mod('general_footer_columns') >= '2' ) {
		register_sidebar(array( 
			'name' 			=> esc_html__( 'Footer 2','stucco'),
			'id' 			=> 'footer-2', 
			'description' 	=> esc_html__( 'Footer Column Widget 2','stucco'), 
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			)); 
		}
		
		if ( get_theme_mod('general_footer_columns') >= '3' ) { 
		register_sidebar(array( 
			'name' 			=> esc_html__( 'Footer 3','stucco'),
			'id' 			=> 'footer-3', 
			'description' 	=> esc_html__( 'Footer Column Widget 3', 'stucco'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			)); 
		}
		
		if ( get_theme_mod('general_footer_columns') >= '4' ) { 
		register_sidebar(array( 
			'name' 			=> esc_html__( 'Footer 4','stucco'),
			'id' 			=> 'footer-4', 
			'description' 	=> esc_html__( 'Footer Column Widget 4', 'stucco'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			)); 
		}
	}
}
add_action( 'widgets_init', 'stucco_widgets_init' );






?>