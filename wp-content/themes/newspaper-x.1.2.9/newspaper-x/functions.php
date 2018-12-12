<?php

/**
 * Newspaper X functions and definitions.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Newspaper_X
 */
@ini_set('upload_max_size', '128M');
@ini_set('post_max_size', '128M');
@ini_set('max_execution_time', '3000');
/**
 * Start Newspaper_X theme framework
 */
require_once dirname(__FILE__) . '/inc/class-newspaper-x-autoloader.php';

$newspaper_x = new Newspaper_X();

require_once dirname(__FILE__) . '/inc/newspaper-x-deprecated.php';