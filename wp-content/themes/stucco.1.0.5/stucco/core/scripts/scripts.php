<?php

/**
 * Enqueue scripts and styles.
 */
function stucco_scripts() {
	wp_enqueue_style( 'bootstrap', STUCCO_THEME_DIR_URI . '/assets/css/bootstrap.css' );
	
	wp_enqueue_style( 'stucco-style', get_stylesheet_uri() );
		
	wp_enqueue_style( 'stucco-theme', STUCCO_THEME_DIR_URI . '/assets/css/theme-default.css' );
	
	wp_enqueue_style( 'animate', STUCCO_THEME_DIR_URI . '/assets/css/animate.css' );

	wp_enqueue_style( 'animate', STUCCO_THEME_DIR_URI . '/assets/css/editor-style.css' );
	
	wp_enqueue_style( 'font-awesome', STUCCO_THEME_DIR_URI .'/font-awesome/css/font-awesome.css' );
	
	/*Main Font*/
	wp_enqueue_style( 'playfair-display-font', '//fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700i|Playfair+Display:400,400i,700,700i,900,900i' );

	wp_enqueue_script( 'stucco-custom-js', STUCCO_THEME_DIR_URI . '/assets/js/custom.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'stucco-navigation', STUCCO_THEME_DIR_URI . '/js/navigation.js', array(), '20151215', true );
	
	/*--Animation scripts--*/
	wp_enqueue_script( 'wow-js', STUCCO_THEME_DIR_URI . '/assets/js/wow.min.js', array(), '', false );

	wp_enqueue_script( 'stucco-skip-link-focus-fix', STUCCO_THEME_DIR_URI . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stucco_scripts' );

?>