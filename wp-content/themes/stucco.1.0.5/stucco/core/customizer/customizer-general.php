<?php
function stucco_general_customizer( $wp_customize ) {

		//Add "Switcher" support to the theme customizer
		class Stucco_Customizer_Switcher_Control extends WP_Customize_Control {
			public $type = 'switcher';
		 
			public function render_content() {
				?>
					<label>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<input class="ios-switch green bigswitch" type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> /><div class="ios-switch-div" ><div></div></div>
					</label>				
				<?php
			}
		}
	
			// Add Radio-Image control support to the theme customizer
		class Stucco_Customizer_Radio_Image_Control extends WP_Customize_Control {
			public $type = 'radio-image';
			
			public function enqueue() {
				wp_enqueue_script( 'jquery-ui-button' );
			}
			
			// Markup for the field's title
			public function title() {
				echo '<span class="customize-control-title">';
					$this->label();
					$this->description();
				echo '</span>';
			}

			// The markup for the label.
			public function label() {
				// The label has already been sanitized in the Fields class, no need to re-sanitize it.
				echo $this->label;
			}

			// Markup for the field's description
			public function description() {
				if ( ! empty( $this->description ) ) {
					// The description has already been sanitized in the Fields class, no need to re-sanitize it.
					echo '<span class="description customize-control-description">' . $this->description . '</span>';
				}
			}
			
			public function render_content() {
				if ( empty( $this->choices ) ) {
					return;
				}
				$name = '_customize-radio-' . esc_attr($this->id);
				?>
				<?php $this->title(); ?>
				<div id="input_<?php echo esc_attr($this->id); ?>" class="image">
					<?php foreach ( $this->choices as $value => $label ) : ?>
						<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr($this->id) . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
							<label for="<?php echo esc_attr($this->id) . $value; ?>">
								<img src="<?php echo esc_html( $label ); ?>">
							</label>
						</input>
					<?php endforeach; ?>
				</div>
				<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo esc_attr($this->id); ?>"]' ).buttonset(); });</script>
				<?php
			}
		}
	
	
	
		
	//General Settings
	$wp_customize->add_panel( 
		'stucco_general_setting', 
		array(
			'priority'       => 1,
			'capability'     => 'edit_theme_options',
			'title'      => __('General Settings', 'stucco'),
		) 
	);
	

 
	 //Social
	 $wp_customize->add_section(
        'home_general_settings_social',
        array(
            'title' => __('Social Media','stucco'),
			'panel'  => 'stucco_general_setting',)
    );
	 
	//Facebook
	 $wp_customize->add_setting(
		'home_general_facebook',
			array(
				'default' => '',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		)	
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
		$wp_customize,
		'home_general_facebook',
			array(
				'label' => __('Facebook Page URL','stucco'),
				'section' => 'home_general_settings_social',
				'type' => 'url',
			)
		)
	);
	
	//Twitter
	 $wp_customize->add_setting(
		'home_general_twitter',
			array(
				'default' => '',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		)	
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
		$wp_customize,
		'home_general_twitter',
			array(
				'label' => __('Twitter URL','stucco'),
				'section' => 'home_general_settings_social',
				'type' => 'url',
			)
		)
	);
	
	//Google Plus
	 $wp_customize->add_setting(
		'home_general_gplus',
			array(
				'default' => '',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		)	
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
		$wp_customize,
		'home_general_gplus',
			array(
				'label' => __('Google + URL','stucco'),
				'section' => 'home_general_settings_social',
				'type' => 'url',
			)
		)
	);

	//YouTube
	 $wp_customize->add_setting(
		'home_general_youtube',
			array(
				'default' => '',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		)	
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
		$wp_customize,
		'home_general_youtube',
			array(
				'label' => __('YouTube Channel URL','stucco'),
				'section' => 'home_general_settings_social',
				'type' => 'url',
			)
		)
	);
	
	//Instagram
	 $wp_customize->add_setting(
		'home_general_instagram',
			array(
				'default' => '',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		)	
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
		$wp_customize,
		'home_general_instagram',
			array(
				'label' => __('Instagram URL','stucco'),
				'section' => 'home_general_settings_social',
				'type' => 'url',
			)
		)
	);
	
	//RSS Feed
	 $wp_customize->add_setting(
		'home_general_rssfeed',
			array(
				'default' => '',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
		)	
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
		$wp_customize,
		'home_general_rssfeed',
			array(
				'label' => __('RSS Feed URL','stucco'),
				'section' => 'home_general_settings_social',
				'type' => 'url',
			)
		)
	);

	//Search
	 $wp_customize->add_section(
        'home_general_settings_searchfield',
        array(
            'title' => __('Search Field','stucco'),
			'panel'  => 'stucco_general_setting',
			)
    );
	 
	//Hide Home Features Section
	$wp_customize->add_setting(
		'home_general_hidesearch',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'stucco_sanitize_checkbox',
		)	
	);
	$wp_customize->add_control(
			new Stucco_Customizer_Switcher_Control(
				$wp_customize,			
				'home_general_hidesearch', 
				array(
					'label' => __('Header Search Field','stucco'),
					'section' => 'home_general_settings_searchfield',
			)
		)
	);
	
 
	//Header Image
	 $wp_customize->add_section(
        'header_image',
        array(
            'title' => __('Header Image For Pages','stucco'),
			'panel'  => 'stucco_general_setting',)
    );
	
	//Hide Page header background image
	$wp_customize->add_setting(
		'page_header_banner_hide',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'stucco_sanitize_checkbox',
		)	
	);
	$wp_customize->add_control(
			new Stucco_Customizer_Switcher_Control(
				$wp_customize,			
				'page_header_banner_hide', 
				array(
					'label' => __('Banner Image on Pages','stucco'),
					'section' => 'header_image',
			)
		)
	);

	//Post Meta
	 $wp_customize->add_section(
        'general_post_meta',
        array(
            'title' => __('Post Settings','stucco'),
			'panel'  => 'stucco_general_setting',
			)
    );
 	
	// Post Meta
	$wp_customize->add_setting(
		'hide_post_meta',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'stucco_sanitize_checkbox',
		)	
	);
	$wp_customize->add_control(
			new Stucco_Customizer_Switcher_Control(
				$wp_customize,			
				'hide_post_meta', 
				array(
					'label' => __('All Post Meta','stucco'),
					'section' => 'general_post_meta',
			)
		)
	);
	
	// Post Date
	$wp_customize->add_setting(
		'hide_post_date',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'stucco_sanitize_checkbox',
		)	
	);
	$wp_customize->add_control(
			new Stucco_Customizer_Switcher_Control(
				$wp_customize,			
				'hide_post_date', 
				array(
					'label' => __('Post Date','stucco'),
					'section' => 'general_post_meta',
			)
		)
	);
	
	// Post Category
	$wp_customize->add_setting(
		'hide_post_categories',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'stucco_sanitize_checkbox',
		)	
	);
	$wp_customize->add_control(
			new Stucco_Customizer_Switcher_Control(
				$wp_customize,			
				'hide_post_categories', 
				array(
					'label' => __('Post Category','stucco'),
					'section' => 'general_post_meta',
			)
		)
	);
	
	//Comments Counts
	$wp_customize->add_setting(
		'hide_comments_counts_post_meta',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'stucco_sanitize_checkbox',
		)	
	);
	$wp_customize->add_control(
			new Stucco_Customizer_Switcher_Control(
				$wp_customize,			
				'hide_comments_counts_post_meta', 
				array(
					'label' => __('Comments Count','stucco'),
					'section' => 'general_post_meta',
			)
		)
	);
	
	//Posted By
	$wp_customize->add_setting(
		'hide_posted_by_post_meta',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'stucco_sanitize_checkbox',
		)	
	);
	$wp_customize->add_control(
			new Stucco_Customizer_Switcher_Control(
				$wp_customize,			
				'hide_posted_by_post_meta', 
				array(
					'label' => __('Posted By','stucco'),
					'section' => 'general_post_meta',
			)
		)
	);
	 
	//Post Author
	$wp_customize->add_setting(
		'hide_post_author_post_meta',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'stucco_sanitize_checkbox',
		)	
	);
	$wp_customize->add_control(
			new Stucco_Customizer_Switcher_Control(
				$wp_customize,			
				'hide_post_author_post_meta', 
				array(
					'label' => __('About The Author','stucco'),
					'section' => 'general_post_meta',
			)
		)
	);
	
	/*Colors*/
	$wp_customize->add_setting(
		'theme_colors',
			array(
			'default' => '#1F73BE',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
		$wp_customize,
		'theme_colors',
				array(
				'label'   => __('Theme Color','stucco'),
				'section' => 'colors',
				'type' => 'color',
			 ) 
		 ) 
	 );
	 
	 /* Hover Colors*/
	$wp_customize->add_setting(
		'theme_hover_colors',
			array(
			'default' => '#052369',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
		$wp_customize,
		'theme_hover_colors',
				array(
				'label'   => __('Theme Hover Color','stucco'),
				'section' => 'colors',
				'type' => 'color',
			 ) 
		 ) 
	 );

	
	/**/
	//Footer Settings
	 $wp_customize->add_section(
        'general_footer',
        array(
            'title' => __('Footer Settings','stucco'),
			'panel'  => 'stucco_general_setting',
			)
    );
 	
	// Footer
	$wp_customize->add_setting(
		'general_footer_copyright',
			array(
			'default' => __('Powered by WordPress','stucco'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		new WP_Customize_Control(
		$wp_customize,
		'general_footer_copyright',
				array(
				'label'   => __('Copyright','stucco'),
				'section' => 'general_footer',
				'type' => 'text',
			 ) 
		 ) 
	 );
	 
	 
	//Footer Column Widgets
	$wp_customize->add_setting(
		'general_footer_columns',
		array(
			'default' => '0',
			'sanitize_callback' => 'absint',
			)
	);
	$wp_customize->add_control(	
		new Stucco_Customizer_Radio_Image_Control(
			$wp_customize,
			'general_footer_columns', array(
			'label' 	=> __('Footer Column Widgets', 'stucco'),
			'description' =>  __('Select the number of Widget Columns to display in the Footer area. To add widgets go to Appearance > Widgets, then add widgets to the columns.', 'stucco'),
			'section' => 'general_footer',
			'choices' => array(
				'0' 	=> get_template_directory_uri() .'/assets/images/footer/widget-off.png',
				'1' 	=> get_template_directory_uri() .'/assets/images/footer/column-1.png',
				'2' 	=> get_template_directory_uri() .'/assets/images/footer/column-2.png',
				'3' 	=> get_template_directory_uri() .'/assets/images/footer/column-3.png',
				'4' 	=> get_template_directory_uri() .'/assets/images/footer/column-4.png',
				),
			)
		)
	);	
	
}
add_action( 'customize_register', 'stucco_general_customizer' );



function stucco_customize_css() {
    $stucco_theme_color   = get_theme_mod('theme_colors','#1F73BE');
    $stucco_hover_color   = get_theme_mod('theme_hover_colors','#052369');
    $stucco_header_text = get_header_textcolor();

    ?>
    <style type="text/css">
    <?php if ( isset( $stucco_header_text ) ) { ?>
		.site-description{
			color: #<?php echo esc_attr($stucco_header_text); ?>;
        }
    <?php } ?>
    <?php if ( isset( $stucco_theme_color ) ) { ?>
        .main-navigation, .main-navigation ul ul, .main-navigation #main-menu, input[type="submit"], .logo span a, .head-bottom, .btn-readmore, .widget .tagcloud a, .pagination .current, .footer-bottom, .content-single .thecategory a {
			background-color: <?php echo esc_attr($stucco_theme_color); ?>;
		}
		.page-links a, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], textarea, .social a,#wp-calendar caption, #wp-calendar thead, .content-single .fa, .content-list .fa, .content-single .entry-content a {
			color: <?php echo esc_attr($stucco_theme_color); ?>;
		}
		.search-bar, blockquote {
			border-color: <?php echo esc_attr($stucco_theme_color); ?>;
		}
    <?php } ?>
    <?php if ( isset( $stucco_hover_color ) ) { ?>
		a:focus, a:hover, .widget_meta li:hover a, .widget_categories li:hover a,
		.widget_recent_entries li:hover a, .widget_archive li:hover, .widget_recent_comments li:hover{
			color: <?php echo esc_attr( $stucco_hover_color ); ?>;
		}
		.widget_meta li:hover, .widget_archive li:hover, .widget_categories li:hover,.widget_recent_entries li:hover, .widget_recent_comments li:hover{
			border-left: 10px solid <?php echo esc_attr( $stucco_hover_color ); ?>;
			border-bottom: 1px solid <?php echo esc_attr( $stucco_hover_color ); ?>;
		}
		input[type="submit"]:hover, .social a:hover, .btn-readmore:hover,.widget .tagcloud a:hover, .main-navigation a:hover, .main-navigation li.current-menu-item > a, .main-navigation li.current_page_item > a, .main-navigation li.current-menu-parent > a, .main-navigation li.current_page_parent > a, .main-navigation li.current-menu-ancestor > a, .main-navigation li.current_page_ancestor > a, .main-navigation button, .content-single .thecategory a:hover{
			background-color: <?php echo esc_attr( $stucco_hover_color ); ?>;
		}
		input[type="submit"]:hover{
			border-color: <?php echo esc_attr( $stucco_hover_color ); ?>;
		}
    <?php } ?>
    </style>
    <?php

}
add_action( 'wp_head', 'stucco_customize_css');


?>