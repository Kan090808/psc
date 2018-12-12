<?php
/**
 * Stucco functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Stucco
 */

 //Constants
define ('STUCCO_THEME_DIR_URI', get_template_directory_uri() );
define ('STUCCO_THEME_DIR', get_template_directory() );
define ('STUCCO_THEME_FUNCTIONS_DIR', STUCCO_THEME_DIR . '/core' );
 
//Include other PHP files
require (STUCCO_THEME_FUNCTIONS_DIR . '/scripts/scripts.php');
require (STUCCO_THEME_FUNCTIONS_DIR . '/functions.php');
require (STUCCO_THEME_FUNCTIONS_DIR . '/sidebars.php');

/**
 * Implement the Custom Header feature.
 */
require STUCCO_THEME_DIR . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require STUCCO_THEME_DIR . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require STUCCO_THEME_DIR . '/inc/extras.php';

/**
 * Customizer additions.
 */
require STUCCO_THEME_DIR . '/core/customizer/customizer.php';
require STUCCO_THEME_DIR . '/core/customizer/customizer-general.php';

/**
 * Load Jetpack compatibility file.
 */
require STUCCO_THEME_DIR . '/inc/jetpack.php';

