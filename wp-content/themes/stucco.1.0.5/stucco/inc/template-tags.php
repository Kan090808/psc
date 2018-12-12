<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Stucco
 */
 
if ( ! function_exists( 'stucco_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function stucco_posted_on() {
	$hide_post_date = get_theme_mod('hide_post_date', true );
	if ( true == $hide_post_date ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( '%s ', 'post date', 'stucco' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	 
		echo '<span class="posted-on"><i class="space fa fa-calendar"></i> ' . $posted_on . '</span> ';
	}
}
endif;


// Prints Author Name.
if ( ! function_exists( 'stucco_entry_author' ) ) :
function stucco_entry_author() {
	$post_meta = get_theme_mod('hide_posted_by_post_meta', true);
	if ( true == $post_meta ) {
		if ( 'post' == get_post_type() ) {
		$byline = sprintf(
			_x( '%s ', 'post author', 'stucco' ),
			'<span class="author vcard"><span class="url fn"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> ' . esc_html( get_the_author() ) . '</a></span></span>'
		);
				echo '<span class="theauthor">'. esc_attr_e('Posted By: ','stucco') . $byline . '</span>  ';
	   }
	}
}
endif;


// Prints Category.
if ( ! function_exists( 'stucco_entry_category' ) ) :
function stucco_entry_category() {
	if ( get_theme_mod('hide_post_meta', true) != false ) {
		$hide_post_categories = get_theme_mod('hide_post_categories', true);
		if ( true == $hide_post_categories ) {
			if ( 'post' == get_post_type() ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( ' ' );
				if ( $categories_list && stucco_categorized_blog() ) {
					echo '<div class="thecategory">'. $categories_list .' </div>';
				}
			}
		}
	}
}
endif;


// Prints number of Comments.
if ( ! function_exists( 'stucco_entry_comments' ) ) :
function stucco_entry_comments() {
	$hide_comments_counts = get_theme_mod('hide_comments_counts_post_meta',true);
	if ( true == $hide_comments_counts ) {
		if ( 'post' == get_post_type() ) {
              $num_comments = get_comments_number(); 
			  // get_comments_number returns only a numeric value
                  if ( comments_open() ) {
                       if ( $num_comments == 0 ) {
		       $comments = __('No Comments', 'stucco' );
	               } elseif ( $num_comments > 1 ) {
		       $comments = $num_comments . __(' Comments', 'stucco' );
	               } else {
           	       $comments = __('1 Comment', 'stucco' );
	               }
	               $write_comments = $comments;
                       } else {
	               $write_comments =  __('Comments Off!', 'stucco' );
                  }
    
		if ( $write_comments ) {
			printf( '<span class="comments"><i class="fa fa-comments"></i> ' . __( '%1$s ', 'stucco' ) . '</span>', $write_comments );
			}
		}
	}
}
endif;

if ( ! function_exists( 'stucco_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function stucco_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list(' ');
		if ( $tags_list ) {
			echo '<span class="tags-links">'. $tags_list .' </span>';
			 // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'stucco' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'stucco' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function stucco_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'stucco_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'stucco_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so stucco_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so stucco_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in stucco_categorized_blog.
 */
function stucco_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'stucco_categories' );
}
add_action( 'edit_category', 'stucco_category_transient_flusher' );
add_action( 'save_post',     'stucco_category_transient_flusher' );
