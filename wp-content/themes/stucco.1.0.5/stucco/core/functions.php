<?php 
/**
 * Stucco functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Stucco
 */



 
if ( ! function_exists( 'stucco_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function stucco_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Stucco, use a find and replace
	 * to change 'stucco' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'stucco', STUCCO_THEME_DIR . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'stucco-smallfeatured', 280, 250, array('center','top') ); //featured image
	add_image_size( 'stucco-full', 1130, 580, array( 'center', 'center' ) );  // Single Post Image
	
	/*
	 * Enable support for Custom Logo.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
	 */
	add_theme_support( 'custom-logo', array(
	'height'      => 90,
	'width'       => 350,
	'flex-height' => false,
	'flex-width'  => false,
	'header-text' => array( 'site-title', 'site-description' ),
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'stucco' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'stucco_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * Styles the visual editor to resemble the theme style
 	 */
	add_editor_style( 'assets/css/editor-style.css' );
}
endif;
add_action( 'after_setup_theme', 'stucco_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stucco_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stucco_content_width', 640 );
}
add_action( 'after_setup_theme', 'stucco_content_width', 0 );

/*
if( !is_admin() ){
	function stucco_new_excerpt_more (){
		return ' &hellip;';
	}
	add_filter('excerpt_more','stucco_new_excerpt_more');

		//Edit the Excerpt lenth.
	function stucco_custom_excerpt_length ($lenth){
		return 30; // Excerpts
	}
	add_filter( 'excerpt_length', 'stucco_custom_excerpt_length' );
}
*/

// Excerpt Length
function stucco_custom_excerpt_length() {
	if ( is_admin() ) 
	{
		return $length;
	}

	$length =  30;

	return $length;
}
add_filter( 'excerpt_length', 'stucco_custom_excerpt_length', 999 );

// Excerpt More
function stucco_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p><a href="%1$s" class="btn btn-readmore">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More <span class="screen-reader-text"> "%s"</span>', 'stucco' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'stucco_excerpt_more' );


//Display meta info if enabled.
function stucco_post_meta(){ 
	if ( get_theme_mod('hide_post_meta', true) != false ) { ?>
		<ul class="post-meta">
			<li><?php stucco_entry_author(); ?></li>
			<li><?php stucco_posted_on(); ?></li>
			<li><?php stucco_entry_comments(); ?></li>
		</ul>
<?php }
}

//Display Post Next/Prev buttons if enabled.
function stucco_next_prev_post() { ?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php 
				previous_post_link( '<div class="nav-previous"> %link</div>', '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>'. __(' Previous Post','stucco'));
				next_post_link( '<div class="nav-next">%link</div>', __('Next Post ','stucco'). '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>' );
			?>
		</div><!-- .next_prev_post -->
	</nav>
	<div class="clearfix"></div>
<?php }  

//Display Author box if enabled.
function stucco_author_box() {
		if ( get_theme_mod('hide_post_author_post_meta', true) != false  ) { ?>
			<div class="post-author-box card">
				<div class="postauthor">
					<h4><?php _e('About The Author', 'stucco'); ?></h4>
					<div class="author-box">
						<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '150' );  } ?>
						<div class="author-box-content">
							<div class="vcard clearfix">
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" rel="nofollow" class="fn"><i class="fa fa-user"></i><?php the_author(); ?></a>
							</div>
							<?php if( get_the_author_meta( 'description' ) ) { ?>
								<p><?php the_author_meta('description') ?></p>
							<?php }?>
						</div>
					</div>
				</div>
			</div>		
	<?php }
}                 



?>