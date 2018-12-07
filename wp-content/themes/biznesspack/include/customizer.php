<?php
/**
 * Biznesspack: Customizer
 *
 * @package Biznesspack
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 
 

function biznesspack_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_image'  )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'biznesspack_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'biznesspack_customize_partial_blogdescription',
	) );
	
	
	/**
	 * Theme options.
	 */
	 $default = biznesspack_default_theme_options();
	 
	 $wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'biznesspack' ),
			'priority'   => 200,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Header Section.
	$wp_customize->add_section( 'section_header',
		array(
			'title'      => esc_html__( 'Header Options', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting show_top_header.
	$wp_customize->add_setting( 'show_top_header',
		array(
			'default'           => $default['show_top_header'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'show_top_header',
		array(
			'label'    			=> esc_html__( 'Show Header - Top', 'biznesspack' ),
			'section'  			=> 'section_header',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	// Setting top left header.
	$wp_customize->add_setting( 'left_section',
		array(
			'default'           => $default['left_section'],
			'sanitize_callback' => 'biznesspack_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'left_section',
		array(
			'label'    			=> esc_html__( 'Top Header Left Section', 'biznesspack' ),
			'section'  			=> 'section_header',
			'type'     			=> 'radio',
			'priority' 			=> 100,
			'choices'  			=> array(
									'contact'  => esc_html__( 'Contact Details', 'biznesspack' ),
									'top-social' => esc_html__( 'Social Links', 'biznesspack' ),
								),
			'active_callback' 	=> 'biznesspack_is_top_header_active',
		)
	);
	
	// Setting top right header.
	$wp_customize->add_setting( 'right_section',
		array(
			'default'           => $default['right_section'],
			'sanitize_callback' => 'biznesspack_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'right_section',
		array(
			'label'    			=> esc_html__( 'Top Header Right Section', 'biznesspack' ),
			'section'  			=> 'section_header',
			'type'     			=> 'radio',
			'priority' 			=> 100,
			'choices'  			=> array(
									'contact'  => esc_html__( 'Contact Details', 'biznesspack' ),
									'top-social' => esc_html__( 'Social Links', 'biznesspack' ),
								),
			'active_callback' 	=> 'biznesspack_is_top_header_active',
		)
	);
	
	// Setting facebook.
	$wp_customize->add_setting( 'facebook_link',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'facebook_link',
		array(
			'label'    		=> esc_html__( 'facebook', 'biznesspack' ),
			'description'      =>  __( 'e.g: http://example.com', 'biznesspack' ),
			'section'  		  => 'section_header',
			'type'     		 => 'url',
			'priority' 		 => 100,
			'active_callback'  => 'biznesspack_is_top_header_active',
		)
	);
	
	// Setting twitter.
	$wp_customize->add_setting( 'twitter_link',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'twitter_link',
		array(
			'label'    		=> esc_html__( 'Twitter', 'biznesspack' ),
			'description'      =>  __( 'e.g: http://example.com', 'biznesspack' ),
			'section'  		  => 'section_header',
			'type'     		 => 'url',
			'priority' 		 => 100,
			'active_callback'  => 'biznesspack_is_top_header_active',
		)
	);
	
	// Setting instagram.
	$wp_customize->add_setting( 'instagram_link',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'instagram_link',
		array(
			'label'    		=> esc_html__( 'Instagram', 'biznesspack' ),
			'description'      =>  __( 'e.g: http://example.com', 'biznesspack' ),
			'section'  		  => 'section_header',
			'type'     		 => 'url',
			'priority' 		 => 100,
			'active_callback'  => 'biznesspack_is_top_header_active',
		)
	);
	
	// Setting google_plus.
	$wp_customize->add_setting( 'google_link',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'google_link',
		array(
			'label'    		=> esc_html__( 'Google Plus', 'biznesspack' ),
			'description'      =>  __( 'e.g: http://example.com', 'biznesspack' ),
			'section'  		  => 'section_header',
			'type'     		 => 'url',
			'priority' 		 => 100,
			'active_callback'  => 'biznesspack_is_top_header_active',
		)
	);
	
	// Setting Address.
	$wp_customize->add_setting( 'top_address',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'top_address',
		array(
			'label'    			=> esc_html__( 'Address/Location', 'biznesspack' ),
			'section'  			=> 'section_header',
			'type'     			=> 'text',
			'priority' 			=> 100,
			'active_callback' 	=> 'biznesspack_is_top_header_active',
		)
	);
	
	// Setting Phone.
	$wp_customize->add_setting( 'top_phone',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'top_phone',
		array(
			'label'    		  => esc_html__( 'Phone Number', 'biznesspack' ),
			'section'  			=> 'section_header',
			'type'     		   => 'text',
			'priority' 		   => 100,
			'active_callback' 	=> 'biznesspack_is_top_header_active',
		)
	);
	
	// Setting Email.
	$wp_customize->add_setting( 'top_email',
		array(
			'sanitize_callback' => 'sanitize_email',
		)
	);
	
	$wp_customize->add_control( 'top_email',
		array(
			'label'    		=> esc_html__( 'Email', 'biznesspack' ),
			'section'  		  => 'section_header',
			'type'     		 => 'email',
			'priority' 		 => 100,
			'active_callback'  => 'biznesspack_is_top_header_active',
		)
	);
	

	// Breadcrumb Section.
	$wp_customize->add_section( 'section_breadcrumb',
		array(
			'title'      => esc_html__( 'Breadcrumb Options', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'breadcrumb_type',
		array(
			'default'           => $default['breadcrumb_type'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'breadcrumb_type',
		array(
			'label'       => esc_html__( 'Breadcrumb Type', 'biznesspack' ),
			'section'     => 'section_breadcrumb',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'disable' => esc_html__( 'Disable', 'biznesspack' ),
				'normal'  => esc_html__( 'Normal', 'biznesspack' ),
			),
		)
	);

	
	// Footer Section.
	$wp_customize->add_section( 'section_footer',
		array(
			'title'      => esc_html__( 'Footer Options', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting copyright_text.
	$wp_customize->add_setting( 'copyright_text',
		array(
			'default'           => $default['copyright_text'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'copyright_text',
		array(
			'label'    => esc_html__( 'Copyright Text', 'biznesspack' ),
			'section'  => 'section_footer',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	// Back To Top Section.
	$wp_customize->add_section( 'section_back_to_top',
		array(
			'title'      => esc_html__( 'Back To Top Options', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'back_to_top_type',
		array(
			'default'           => $default['back_to_top'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'back_to_top_type',
		array(
			'label'       => esc_html__( 'Active?', 'biznesspack' ),
			'section'     => 'section_back_to_top',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'disable' => esc_html__( 'Disable', 'biznesspack' ),
				'enable'  => esc_html__( 'Enable', 'biznesspack' ),
			),
		)
	);
	
	// Slider Section.
	$wp_customize->add_section( 'biznesspack_post_slider',
		array(
			'title'      => esc_html__( 'Post Slider', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting slider.
	$wp_customize->add_setting( 'biznesspack_post_status',
		array(
			'default'           => $default['biznesspack_post_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_post_status',
		array(
			'label'       => esc_html__( 'Post Slider', 'biznesspack' ),
			'description' => esc_html__('Note: Hide Header Image If you Want Post Slider.', 'biznesspack' ),
			'section'     => 'biznesspack_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	
	//post count
	$wp_customize->add_setting( 'biznesspack_post_count',
		array(
			'default'           => absint( $default['biznesspack_post_count'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_post_count',
		array(
			'label'       => esc_html__( 'Number Of Slider', 'biznesspack' ),
			'section'     => 'biznesspack_post_slider',
			'type'        => 'select',
			'priority'    => 100,
			'choices'     => array(
				'2' => esc_html__( '2', 'biznesspack' ),
				'3'  => esc_html__( '3', 'biznesspack' ),
				'4'  => esc_html__( '4', 'biznesspack' ),
				'5'  => esc_html__( '5', 'biznesspack' )
			),
		)
	);
	
	
	//post navigation
	$wp_customize->add_setting( 'biznesspack_post_navigation',
		array(
			'default'           => $default['biznesspack_post_navigation'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_post_navigation',
		array(
			'label'       => esc_html__( 'Post Navigation', 'biznesspack' ),
			'section'     => 'biznesspack_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post pagination
	$wp_customize->add_setting( 'biznesspack_post_pagination',
		array(
			'default'           => $default['biznesspack_post_pagination'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_post_pagination',
		array(
			'label'       => esc_html__( 'Post Pagination', 'biznesspack' ),
			'section'     => 'biznesspack_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post content
	$wp_customize->add_setting( 'biznesspack_post_content',
		array(
			'default'           => $default['biznesspack_post_content'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_post_content',
		array(
			'label'       => esc_html__( 'Post Content', 'biznesspack' ),
			'section'     => 'biznesspack_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post time
	$wp_customize->add_setting( 'biznesspack_post_time',
		array(
			'default'           => $default['biznesspack_post_time'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_post_time',
		array(
			'label'       => esc_html__( 'Post Time', 'biznesspack' ),
			'section'     => 'biznesspack_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	// Setting post_excerpt.
	$wp_customize->add_setting( 'biznesspack_post_excerpt',
		array(
			'default'           => absint( $default['biznesspack_post_excerpt'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_post_excerpt',
		array(
			'label'    => esc_html__( 'Post Excerpt', 'biznesspack' ),
			'section'  => 'biznesspack_post_slider',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	//featured slider section
	
	/* Option list of all post */  
    $pages = array();
	$args = array(
		'sort_order' => 'desc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'meta_key' => '',
		'meta_value' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
    $pages_obj = get_pages( $args );
    $pages[''] = esc_html__( 'Choose Page', 'biznesspack' );
    foreach ( $pages_obj as $posts ) {
    	$pages[$posts->ID] = $posts->post_title;
    }
	 
	$wp_customize->add_section( 'biznesspack_featured_slider',
		array(
			'title'      => esc_html__( 'Page Slider', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'biznesspack_fontpage_section_panel',
		)
	);
	
	// Setting slider.
	$wp_customize->add_setting( 'biznesspack_featured_status',
		array(
			'default'           => $default['biznesspack_featured_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featured_status',
		array(
			'label'       => esc_html__( 'Enable Slider', 'biznesspack' ),
			'description' => esc_html__('Note: Hide Header Image If you Want Page Slider. How to create a slider :- First, when you create a page, Enter the page title, page descritpion or upload image to the page,if you have created a slider page, get it selected here. You can slide on only Frontpage', 'biznesspack' ),
			'section'     => 'biznesspack_featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	//Select Post One
	$wp_customize->add_setting('biznesspack_slider_post_one',
		array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=>'biznesspack_sanitize_select',
		)
	);
            
	$wp_customize->add_control('biznesspack_slider_post_one',
		array(
			'label'		=> esc_html__( 'Select Page One', 'biznesspack'),
			'section'	  => 'biznesspack_featured_slider',
			'type'  		 => 'select',
			'priority'    => 100,
			'choices'	  => $pages
		)
	);
	
	//Select Post Two
	$wp_customize->add_setting('biznesspack_slider_post_two',
		array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=>'biznesspack_sanitize_select',
		)
	);
            
	$wp_customize->add_control('biznesspack_slider_post_two',
		array(
			'label'		=> esc_html__( 'Select Page Two', 'biznesspack'),
			'section'	  => 'biznesspack_featured_slider',
			'type'  		 => 'select',
			'priority'    => 100,
			'choices'	  => $pages
		)
	);
	
	//Select Post Three
	$wp_customize->add_setting('biznesspack_slider_post_three',
		array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=>'biznesspack_sanitize_select',
		)
	);
            
	$wp_customize->add_control('biznesspack_slider_post_three',
		array(
			'label'		=> esc_html__( 'Select Page Three', 'biznesspack'),
			'section'	  => 'biznesspack_featured_slider',
			'type'  		 => 'select',
			'priority'    => 100,
			'choices'	  => $pages
		)
	);
	
	//page navigation
	$wp_customize->add_setting( 'biznesspack_featured_navigation',
		array(
			'default'           => $default['biznesspack_featured_navigation'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featured_navigation',
		array(
			'label'       => esc_html__( 'Slider Navigation', 'biznesspack' ),
			'section'     => 'biznesspack_featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//page pagination
	$wp_customize->add_setting( 'biznesspack_featured_pagination',
		array(
			'default'           => $default['biznesspack_featured_pagination'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featured_pagination',
		array(
			'label'       => esc_html__( 'Slider Pagination', 'biznesspack' ),
			'section'     => 'biznesspack_featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//page content
	$wp_customize->add_setting( 'biznesspack_featured_content',
		array(
			'default'           => $default['biznesspack_featured_content'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featured_content',
		array(
			'label'       => esc_html__( 'Page Content', 'biznesspack' ),
			'section'     => 'biznesspack_featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	// Setting page_excerpt.
	$wp_customize->add_setting( 'biznesspack_slider_excerpt',
		array(
			'default'           => absint( $default['biznesspack_slider_excerpt'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_slider_excerpt',
		array(
			'label'    => esc_html__( 'Slider Excerpt', 'biznesspack' ),
			'section'  => 'biznesspack_featured_slider',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	//frontpage panel
	$wp_customize->add_panel( 'biznesspack_fontpage_section_panel',
		array(
			'title'      => esc_html__( 'Frontpage Section', 'biznesspack' ),
			'priority'   => 200,
			'capability' => 'edit_theme_options',
		)
	);
	
	// feature box Section.
	$wp_customize->add_section( 'biznesspack_featurebox_type1_section',
		array(
			'title'      => esc_html__( 'Feature Box 1', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'biznesspack_fontpage_section_panel',
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_section_status',
		array(
			'default'           => $default['biznesspack_featurebox_type1_section_status'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_section_status',
		array(
			'label'    		   => esc_html__( 'Active', 'biznesspack' ),
			'section'  			 => 'biznesspack_featurebox_type1_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	//featurebox one
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_one',
		array(
			'default'           => $default['biznesspack_featurebox_type1_one'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_one',
		array(
			'label'    		   => esc_html__( 'Feature Box 1', 'biznesspack' ),
			'section'  			 => 'biznesspack_featurebox_type1_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_one_icon',
		array(
			'default'           => $default['biznesspack_featurebox_type1_one_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_one_icon',
		array(
			'label'    			=> esc_html__( 'Icon', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type1_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_one_title',
		array(
			'default'           => $default['biznesspack_featurebox_type1_one_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_one_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type1_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	//featurebox two
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_two',
		array(
			'default'           => $default['biznesspack_featurebox_type1_two'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_two',
		array(
			'label'    		   => esc_html__( 'Feature Box 2', 'biznesspack' ),
			'section'  			 => 'biznesspack_featurebox_type1_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_two_icon',
		array(
			'default'           => $default['biznesspack_featurebox_type1_two_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_two_icon',
		array(
			'label'    			=> esc_html__( 'Icon', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type1_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_two_title',
		array(
			'default'           => $default['biznesspack_featurebox_type1_two_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_two_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type1_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	//feature box three
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_three',
		array(
			'default'           => $default['biznesspack_featurebox_type1_three'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_three',
		array(
			'label'    		  => esc_html__( 'Feature Box 3', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type1_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_three_icon',
		array(
			'default'           => $default['biznesspack_featurebox_type1_three_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_three_icon',
		array(
			'label'    			=> esc_html__( 'Icon', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type1_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_three_title',
		array(
			'default'           => $default['biznesspack_featurebox_type1_three_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_three_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type1_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	//feature box 4
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_four',
		array(
			'default'           => $default['biznesspack_featurebox_type1_four'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_four',
		array(
			'label'    		   => esc_html__( 'Feature Box 4', 'biznesspack' ),
			'section'  			 => 'biznesspack_featurebox_type1_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_four_icon',
		array(
			'default'           => $default['biznesspack_featurebox_type1_four_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_four_icon',
		array(
			'label'    			=> esc_html__( 'Icon', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type1_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type1_four_title',
		array(
			'default'           => $default['biznesspack_featurebox_type1_four_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type1_four_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type1_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	// about page Section.
	$wp_customize->add_section( 'biznesspack_about_page_section',
		array(
			'title'      => esc_html__( 'About Page', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'biznesspack_fontpage_section_panel',
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_about_page_section_status',
		array(
			'default'           => $default['biznesspack_about_page_section_status'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_about_page_section_status',
		array(
			'label'    			=> esc_html__( 'About Page', 'biznesspack' ),
			'section'  			=> 'biznesspack_about_page_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	
	$wp_customize->add_setting('biznesspack_about_page_title',
		array(
			'default'	=> $default['biznesspack_about_page_title'],
			'sanitize_callback' => 'sanitize_text_field',
			'capability'		=> 'edit_theme_options',
		)
	);
            
	$wp_customize->add_control('biznesspack_about_page_title',
		array(
			'label'		=> esc_html__( 'Title', 'biznesspack'),
			'section'	  => 'biznesspack_about_page_section',
			'type'  		 => 'text',
			'priority'    => 100,
		)
	);
	
	//Select Page
	$wp_customize->add_setting('biznesspack_about_page_content',
		array(
			'default'	=> $default['biznesspack_about_page_content'],
			'capability'		=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post'
		)
	);
            
	$wp_customize->add_control('biznesspack_about_page_content',
		array(
			'label'		=> esc_html__( 'Content', 'biznesspack'),
			'section'	  => 'biznesspack_about_page_section',
			'type'  		 => 'textarea',
			'priority'    => 100,
		)
	);
	
	$wp_customize->add_setting('biznesspack_about_page_image',
		array(
			'default' => $default['biznesspack_about_page_image'],
			'transport'	=> 'refresh',
			'height'        => 650,
			'width'        => 780,
			'sanitize_callback' => 'esc_url_raw',
    ));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'biznesspack_about_page_image', array(
        'label' => __('Page Image', 'biznesspack'),
		'description' => 'Image Size 780x650',
        'section' => 'biznesspack_about_page_section',
        'settings' => 'biznesspack_about_page_image',
    )));
	
	//page button
	$wp_customize->add_setting('biznesspack_about_page_button',
		array(
			'default'	=> $default['biznesspack_about_page_button'],
			'sanitize_callback' => 'sanitize_text_field',
			'capability'		=> 'edit_theme_options',
		)
	);
            
	$wp_customize->add_control('biznesspack_about_page_button',
		array(
			'label'		=> esc_html__( 'Button', 'biznesspack'),
			'section'	  => 'biznesspack_about_page_section',
			'type'  		 => 'text',
			'priority'    => 100,
		)
	);
	
	// Setting google_plus.
	$wp_customize->add_setting( 'biznesspack_about_page_button_link',
		array(
			'default'	=> $default['biznesspack_about_page_button_link'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_about_page_button_link',
		array(
			'label'    		=> esc_html__( 'Link', 'biznesspack' ),
			'description'      =>  __( 'e.g: http://example.com', 'biznesspack' ),
			'section'  		  => 'biznesspack_about_page_section',
			'type'     		 => 'url',
			'priority' 		 => 100,
		)
	);
	
	
	// feature box 2 Section.
	$wp_customize->add_section( 'biznesspack_featurebox_type2_section',
		array(
			'title'      => esc_html__( 'Feature Box 2', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'biznesspack_fontpage_section_panel',
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_section_status',
		array(
			'default'           => $default['biznesspack_featurebox_type2_section_status'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_section_status',
		array(
			'label'    		  => esc_html__( 'Active', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type2_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);
	
	//featurebox one
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_one',
		array(
			'default'           => $default['biznesspack_featurebox_type2_one'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_one',
		array(
			'label'    		  => esc_html__( 'Feature Box 1', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type2_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_one_icon',
		array(
			'default'           => $default['biznesspack_featurebox_type2_one_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_one_icon',
		array(
			'label'    			=> esc_html__( 'Icon', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_one_title',
		array(
			'default'           => $default['biznesspack_featurebox_type2_one_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_one_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_one_content',
		array(
			'default'           => $default['biznesspack_featurebox_type2_one_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_one_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);
	
	//featurebox two
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_two',
		array(
			'default'           => $default['biznesspack_featurebox_type2_two'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_two',
		array(
			'label'    			=> esc_html__( 'Feature Box 2', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type2_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_two_icon',
		array(
			'default'           => $default['biznesspack_featurebox_type2_two_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_two_icon',
		array(
			'label'    			=> esc_html__( 'Icon', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_two_title',
		array(
			'default'           => $default['biznesspack_featurebox_type2_two_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_two_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_two_content',
		array(
			'default'           => $default['biznesspack_featurebox_type2_two_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_two_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);
	
	//feature box three
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_three',
		array(
			'default'           => $default['biznesspack_featurebox_type2_three'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_three',
		array(
			'label'    			=> esc_html__( 'Feature Box 3', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type2_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_three_icon',
		array(
			'default'           => $default['biznesspack_featurebox_type2_three_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_three_icon',
		array(
			'label'    			=> esc_html__( 'Icon', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_three_title',
		array(
			'default'           => $default['biznesspack_featurebox_type2_three_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_three_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_three_content',
		array(
			'default'           => $default['biznesspack_featurebox_type2_three_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_three_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);
	
	//feature box 4
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_four',
		array(
			'default'           => $default['biznesspack_featurebox_type2_four'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_four',
		array(
			'label'    			=> esc_html__( 'Feature Box 4', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type2_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_four_icon',
		array(
			'default'           => $default['biznesspack_featurebox_type2_four_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_four_icon',
		array(
			'label'    			=> esc_html__( 'Icon', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_four_title',
		array(
			'default'           => $default['biznesspack_featurebox_type2_four_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_four_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type2_four_content',
		array(
			'default'           => $default['biznesspack_featurebox_type2_four_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type2_four_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type2_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);
	
	//featurebox 3 section
	$wp_customize->add_section( 'biznesspack_featurebox_type3_section',
		array(
			'title'      => esc_html__( 'Feature Box 3', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'biznesspack_fontpage_section_panel',
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type3_section_status',
		array(
			'default'           => $default['biznesspack_featurebox_type3_section_status'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_section_status',
		array(
			'label'    		  => esc_html__( 'Active', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type3_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_featurebox_type3_section_title',
		array(
			'default'           => $default['biznesspack_featurebox_type3_section_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_section_title',
		array(
			'label'    			=> esc_html__( 'Section Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);
	
	//featurebox one
	$wp_customize->add_setting( 'biznesspack_featurebox_type3_one',
		array(
			'default'           => $default['biznesspack_featurebox_type3_one'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_one',
		array(
			'label'    		  => esc_html__( 'Feature Box 1', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type3_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_one_title',
		array(
			'default'           => $default['biznesspack_featurebox_type3_one_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_one_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_one_content',
		array(
			'default'           => $default['biznesspack_featurebox_type3_one_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_one_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);

	//featurebox two
	$wp_customize->add_setting( 'biznesspack_featurebox_type3_two',
		array(
			'default'           => $default['biznesspack_featurebox_type3_two'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_two',
		array(
			'label'    		  => esc_html__( 'Feature Box 2', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type3_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_two_title',
		array(
			'default'           => $default['biznesspack_featurebox_type3_two_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_two_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_two_content',
		array(
			'default'           => $default['biznesspack_featurebox_type3_two_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_two_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);

	//featurebox three
	$wp_customize->add_setting( 'biznesspack_featurebox_type3_three',
		array(
			'default'           => $default['biznesspack_featurebox_type3_three'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_three',
		array(
			'label'    		  => esc_html__( 'Feature Box 3', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type3_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_three_title',
		array(
			'default'           => $default['biznesspack_featurebox_type3_three_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_three_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_three_content',
		array(
			'default'           => $default['biznesspack_featurebox_type3_three_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_three_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);

	//featurebox four
	$wp_customize->add_setting( 'biznesspack_featurebox_type3_four',
		array(
			'default'           => $default['biznesspack_featurebox_type3_four'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_four',
		array(
			'label'    		  => esc_html__( 'Feature Box 4', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type3_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_four_title',
		array(
			'default'           => $default['biznesspack_featurebox_type3_four_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_four_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_four_content',
		array(
			'default'           => $default['biznesspack_featurebox_type3_four_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_four_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);

	//featurebox five
	$wp_customize->add_setting( 'biznesspack_featurebox_type3_five',
		array(
			'default'           => $default['biznesspack_featurebox_type3_five'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_five',
		array(
			'label'    		  => esc_html__( 'Feature Box 5', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type3_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_five_title',
		array(
			'default'           => $default['biznesspack_featurebox_type3_five_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_five_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_five_content',
		array(
			'default'           => $default['biznesspack_featurebox_type3_five_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_five_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);

	//featurebox six
	$wp_customize->add_setting( 'biznesspack_featurebox_type3_six',
		array(
			'default'           => $default['biznesspack_featurebox_type3_six'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_six',
		array(
			'label'    		  => esc_html__( 'Feature Box 6', 'biznesspack' ),
			'section'  			=> 'biznesspack_featurebox_type3_section',
			'type'     		   => 'checkbox',
			'priority' 		   => 100,
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_six_title',
		array(
			'default'           => $default['biznesspack_featurebox_type3_six_title'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_six_title',
		array(
			'label'    			=> esc_html__( 'Title', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'text',
			'priority' 			 => 100
		)
	);

	$wp_customize->add_setting( 'biznesspack_featurebox_type3_six_content',
		array(
			'default'           => $default['biznesspack_featurebox_type3_six_content'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_featurebox_type3_six_content',
		array(
			'label'    			=> esc_html__( 'Content', 'biznesspack' ),
			'section'  			  => 'biznesspack_featurebox_type3_section',
			'type'     			 => 'textarea',
			'priority' 			 => 100
		)
	);
	
	// latest post Section.
	$wp_customize->add_section( 'biznesspack_latest_post_section',
		array(
			'title'      => esc_html__( 'Latest Post', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'biznesspack_fontpage_section_panel',
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_latest_post_section_status',
		array(
			'default'           => $default['biznesspack_latest_post_section_status'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_latest_post_section_status',
		array(
			'label'    			=> esc_html__( 'Latest Post', 'biznesspack' ),
			'section'  			=> 'biznesspack_latest_post_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_latest_post_section_title',
		array(
			'default'           => $default['biznesspack_latest_post_section_title'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_latest_post_section_title',
		array(
			'label'    => esc_html__( 'Section Title', 'biznesspack' ),
			'section'  => 'biznesspack_latest_post_section',
			'type'     => 'text',
			'priority' => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_latest_post_section_subtitle',
		array(
			'default'           => $default['biznesspack_latest_post_section_subtitle'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_latest_post_section_subtitle',
		array(
			'label'    => esc_html__( 'Section Sub Title', 'biznesspack' ),
			'section'  => 'biznesspack_latest_post_section',
			'type'     => 'textarea',
			'priority' => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_latest_post_title',
		array(
			'default'           => $default['biznesspack_latest_post_title'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_latest_post_title',
		array(
			'label'    			=> esc_html__( 'Show Title', 'biznesspack' ),
			'section'  			=> 'biznesspack_latest_post_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_latest_post_time',
		array(
			'default'           => $default['biznesspack_latest_post_time'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_latest_post_time',
		array(
			'label'    			=> esc_html__( 'Show Time', 'biznesspack' ),
			'section'  			=> 'biznesspack_latest_post_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	//post count
	$wp_customize->add_setting( 'biznesspack_latest_post_item',
		array(
			'default'           => absint( $default['biznesspack_latest_post_item'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'biznesspack_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_latest_post_item',
		array(
			'label'       => esc_html__( 'Item to Show', 'biznesspack' ),
			'section'     => 'biznesspack_latest_post_section',
			'type'        => 'select',
			'priority'    => 100,
			'choices'     => array(
				'2' => esc_html__( '2', 'biznesspack' ),
				'3'  => esc_html__( '3', 'biznesspack' ),
				'4'  => esc_html__( '4', 'biznesspack' )
			),
		)
	);
	
	// call to Section.
	$wp_customize->add_section( 'biznesspack_callto_action',
		array(
			'title'      => esc_html__( 'Call To Action', 'biznesspack' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'biznesspack_fontpage_section_panel',
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_callto_action_status',
		array(
			'default'           => $default['biznesspack_callto_action_status'],
			'sanitize_callback' => 'biznesspack_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_callto_action_status',
		array(
			'label'    			=> esc_html__( 'Call To Action', 'biznesspack' ),
			'section'  			=> 'biznesspack_callto_action',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_callto_action_content',
		array(
			'default'           => $default['biznesspack_callto_action_content'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_callto_action_content',
		array(
			'label'    => esc_html__( 'Content', 'biznesspack' ),
			'section'  => 'biznesspack_callto_action',
			'type'     => 'textarea',
			'priority' => 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_callto_action_button',
		array(
			'default'           => $default['biznesspack_callto_action_button'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_callto_action_button',
		array(
			'label'    			=> esc_html__( 'Button Title', 'biznesspack' ),
			'section'  			=> 'biznesspack_callto_action',
			'type'     			=> 'text',
			'priority' 			=> 100
		)
	);
	
	$wp_customize->add_setting( 'biznesspack_callto_action_link',
		array(
			'default'           => $default['biznesspack_callto_action_link'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'biznesspack_callto_action_link',
		array(
			'label'    		=> esc_html__( 'Button Link', 'biznesspack' ),
			'description'      =>  __( 'e.g: http://example.com', 'biznesspack' ),
			'section'  		  => 'biznesspack_callto_action',
			'type'     		 => 'url',
			'priority' 		 => 100,
		)
	);
		
}
add_action( 'customize_register', 'biznesspack_customize_register' );


/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function biznesspack_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Biznesspack 1.0
 * @see biznesspack_customize_register()
 *
 * @return void
 */
function biznesspack_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Biznesspack 1.0
 * @see biznesspack_customize_register()
 *
 * @return void
 */
function biznesspack_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function biznesspack_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function biznesspack_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

if ( ! function_exists( 'biznesspack_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function biznesspack_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;

if ( ! function_exists( 'biznesspack_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function biznesspack_sanitize_select( $input, $setting ) {

		// Ensure input is clean.
		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'biznesspack_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function biznesspack_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_top_header'] 	= false;
		$defaults['left_section'] 		= 'contact';
		$defaults['right_section'] 		= 'top-social';

		//Back To Top
		$defaults['back_to_top']  	= 'disable';

		// Footer.
		$defaults['copyright_text'] 	= esc_html__( 'Copyright &copy; All rights reserved.', 'biznesspack' );

		// Breadcrumb.
		$defaults['breadcrumb_type'] 	= 'disable';
		
		//slider active
		$defaults['biznesspack_post_status'] = false;
		
		//post count
		$defaults['biznesspack_post_count'] = 2;
		
		//post navigation
		$defaults['biznesspack_post_navigation'] = true;
		
		//post pagination
		$defaults['biznesspack_post_pagination'] = true;
		
		//post content
		$defaults['biznesspack_post_content'] = false;
		
		//post date
		$defaults['biznesspack_post_time'] = false;
		
		//post excerpt
		$defaults['biznesspack_post_excerpt'] = 25;
		
		//featured slider
		$defaults['biznesspack_featured_status'] = false;
		
		//featured navigation
		$defaults['biznesspack_featured_navigation'] = true;
		
		//featured pagination
		$defaults['biznesspack_featured_pagination'] = true;
		
		//featured content
		$defaults['biznesspack_featured_content'] = true;
		
		//featured excerpt
		$defaults['biznesspack_slider_excerpt'] = 10;
		
		//call to action section
		$defaults['biznesspack_callto_action_status'] = false;
		
		//call to action content
		$defaults['biznesspack_callto_action_content'] = esc_html__('We ensure quality & support. People love us & we love them. We provide services more than 100000 Customers worldwide. Customer satisfaction is our first goal.', 'biznesspack');
		
		//call to action button title
		$defaults['biznesspack_callto_action_button'] = esc_html__( 'Contact Now', 'biznesspack' );
		
		//call to action link
		$defaults['biznesspack_callto_action_link'] = '#';
		
		//latest post section
		$defaults['biznesspack_latest_post_section_status'] = false;
		
		//latest post section title
		$defaults['biznesspack_latest_post_section_title'] = esc_html__( 'Latest News', 'biznesspack' );
		
		//latest post section subtitle
		$defaults['biznesspack_latest_post_section_subtitle'] = esc_html__( 'Build Awesome and Beautiful Premium HTML, WordPress, Magento, Joomla, E-commerce Themes and Email Templates.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'biznesspack' );
		
		//post title
		$defaults['biznesspack_latest_post_title'] = true;
		
		//post time
		$defaults['biznesspack_latest_post_time'] = true;
		
		//post item
		$defaults['biznesspack_latest_post_item'] = 4;
		
		//featured box section
		$defaults['biznesspack_featurebox_type1_section_status'] = false;
		
		//featurebox one
		$defaults['biznesspack_featurebox_type1_one'] = false;
		
		//featurebox two
		$defaults['biznesspack_featurebox_type1_two'] = false;
		
		//featurebox three
		$defaults['biznesspack_featurebox_type1_three'] = false;
		
		//featurebox four
		$defaults['biznesspack_featurebox_type1_four'] = false;
		
		//feature box one icon
		$defaults['biznesspack_featurebox_type1_one_icon'] = 'fa fa-th-large';
		
		//featurebox one title
		$defaults['biznesspack_featurebox_type1_one_title'] = esc_html__( 'Creative Design', 'biznesspack' );
		
		//feature box two icon
		$defaults['biznesspack_featurebox_type1_two_icon'] = 'fa fa-pencil-square-o';
		
		//featurebox two title
		$defaults['biznesspack_featurebox_type1_two_title'] = esc_html__( 'Easy To Customize', 'biznesspack' );
		
		//feature box three icon
		$defaults['biznesspack_featurebox_type1_three_icon'] = 'fa fa-mobile';
		
		//featurebox three title
		$defaults['biznesspack_featurebox_type1_three_title'] = esc_html__( '100% Responsive', 'biznesspack' );
		
		//feature box four icon
		$defaults['biznesspack_featurebox_type1_four_icon'] = 'fa fa-phone';
		
		//featurebox four title
		$defaults['biznesspack_featurebox_type1_four_title'] = esc_html__( 'Full Support', 'biznesspack' );
		
		//featured box section
		$defaults['biznesspack_featurebox_type2_section_status'] = false;
		
		//featurebox one
		$defaults['biznesspack_featurebox_type2_one'] = false;
		
		//featurebox two
		$defaults['biznesspack_featurebox_type2_two'] = false;
		
		//featurebox three
		$defaults['biznesspack_featurebox_type2_three'] = false;
		
		//featurebox four
		$defaults['biznesspack_featurebox_type2_four'] = false;
		
		//feature box one icon
		$defaults['biznesspack_featurebox_type2_one_icon'] = 'fa fa-user';
		
		//featurebox one title
		$defaults['biznesspack_featurebox_type2_one_title'] = esc_html__( 'Customer First', 'biznesspack' );
		
		//featurebox content
		$defaults['biznesspack_featurebox_type2_one_content'] = esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'biznesspack' );
		
		//feature box two icon
		$defaults['biznesspack_featurebox_type2_two_icon'] = 'fa fa-thumbs-o-up';
		
		//featurebox two title
		$defaults['biznesspack_featurebox_type2_two_title'] = esc_html__( '10+ Year Experience', 'biznesspack' );
		
		//featurebox content
		$defaults['biznesspack_featurebox_type2_two_content'] = esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'biznesspack' );
		
		//feature box three icon
		$defaults['biznesspack_featurebox_type2_three_icon'] = 'fa fa-users';
		
		//featurebox three title
		$defaults['biznesspack_featurebox_type2_three_title'] = esc_html__( 'Professional Team', 'biznesspack' );
		
		//featurebox content
		$defaults['biznesspack_featurebox_type2_three_content'] = esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'biznesspack' );
		
		//feature box four icon
		$defaults['biznesspack_featurebox_type2_four_icon'] = 'fa fa-phone';
		
		//featurebox four title
		$defaults['biznesspack_featurebox_type2_four_title'] = esc_html__( 'Full Support', 'biznesspack' );
		
		//featurebox content
		$defaults['biznesspack_featurebox_type2_four_content'] = esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 'biznesspack' );
		
		//about page section
		$defaults['biznesspack_about_page_section_status'] = false;
		
		//about page image
		$defaults['biznesspack_about_page_image'] = get_template_directory_uri() . '/assets/images/page-thumb.jpg';
		
		//about page title
		$defaults['biznesspack_about_page_title'] = esc_html__('About Company', 'biznesspack');
		
		//page conent
		$defaults['biznesspack_about_page_content'] = wp_kses_post('<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus. Proin viverra nisi at nisl imperdiet auctor. Donec ornare,  sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget.</p>
<p>Nunc facilisis erat at ligula blandit tempor. Mauris iaculis magna ipsum, sit amet pretium risus dictum cursus. Morbi id massa sed risus eleifend rutrum. at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget.</p>
<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus. Proin viverra nisi at nisl imperdiet auctor. Donec ornare,  sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget.</p>
<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus. Proin viverra nisi at nisl imperdiet auctor.</p>');
		
		//page button
		$defaults['biznesspack_about_page_button'] = esc_html__('Learn More', 'biznesspack');
		
		//page link
		$defaults['biznesspack_about_page_button_link'] = '#';

		//featurebox3 section
		$defaults['biznesspack_featurebox_type3_section_status'] = false;
		
		//featurebox3 section title
		$defaults['biznesspack_featurebox_type3_section_title'] = esc_html__( 'Why Choose Biznesspack?', 'biznesspack' );
		
		//featurebox3 one
		$defaults['biznesspack_featurebox_type3_one'] = false;
		
		//featurebox one title
		$defaults['biznesspack_featurebox_type3_one_title'] = esc_html__( 'Ultra Responsive Design', 'biznesspack' );
		
		//featurebox one content
		$defaults['biznesspack_featurebox_type3_one_content'] = esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et culpa dolore odio voluptate suscipit corporis sed ad sunt autem! Lorem ipsum dolor sit amet, Lorem ipsum dolor consectetur adipisicing elit.', 'biznesspack' );
		
		//featurebox3 two
		$defaults['biznesspack_featurebox_type3_two'] = false;
		
		//featurebox two title
		$defaults['biznesspack_featurebox_type3_two_title'] = esc_html__( 'Modern and clean Design', 'biznesspack' );
		
		//featurebox two content
		$defaults['biznesspack_featurebox_type3_two_content'] = esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et culpa dolore odio voluptate suscipit corporis sed ad sunt autem! Lorem ipsum dolor sit amet, Lorem ipsum dolor consectetur adipisicing elit.', 'biznesspack' );
		
		//featurebox3 three
		$defaults['biznesspack_featurebox_type3_three'] = false;
		
		//featurebox three title
		$defaults['biznesspack_featurebox_type3_three_title'] = esc_html__( 'Well Documentation Included', 'biznesspack' );
		
		//featurebox three content
		$defaults['biznesspack_featurebox_type3_three_content'] = esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et culpa dolore odio voluptate suscipit corporis sed ad sunt autem! Lorem ipsum dolor sit amet, Lorem ipsum dolor consectetur adipisicing elit.', 'biznesspack' );

		//featurebox3 four
		$defaults['biznesspack_featurebox_type3_four'] = false;
		
		//featurebox four title
		$defaults['biznesspack_featurebox_type3_four_title'] = esc_html__( 'Unlimited Features Avail', 'biznesspack' );
		
		//featurebox four content
		$defaults['biznesspack_featurebox_type3_four_content'] = esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et culpa dolore odio voluptate suscipit corporis sed ad sunt autem! Lorem ipsum dolor sit amet, Lorem ipsum dolor consectetur adipisicing elit.', 'biznesspack' );

		//featurebox3 five
		$defaults['biznesspack_featurebox_type3_five'] = false;
		
		//featurebox five title
		$defaults['biznesspack_featurebox_type3_five_title'] = esc_html__( 'Life Time Free Updates', 'biznesspack' );
		
		//featurebox five content
		$defaults['biznesspack_featurebox_type3_five_content'] = esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et culpa dolore odio voluptate suscipit corporis sed ad sunt autem! Lorem ipsum dolor sit amet, Lorem ipsum dolor consectetur adipisicing elit.', 'biznesspack' );

		//featurebox3 six
		$defaults['biznesspack_featurebox_type3_six'] = false;
		
		//featurebox six title
		$defaults['biznesspack_featurebox_type3_six_title'] = esc_html__( 'Friendly Customer Support', 'biznesspack' );
		
		//featurebox six content
		$defaults['biznesspack_featurebox_type3_six_content'] = esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et culpa dolore odio voluptate suscipit corporis sed ad sunt autem! Lorem ipsum dolor sit amet, Lorem ipsum dolor consectetur adipisicing elit.', 'biznesspack' );


		return $defaults;
	}

endif;

if ( ! function_exists( 'biznesspack_is_top_header_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function biznesspack_is_top_header_active( $control ) {

		if ( true == $control->manager->get_setting( 'show_top_header' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'biznesspack_get_option' ) ) :

	/**
	 * Get theme option.
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function biznesspack_get_option( $key ) {

		if ( empty( $key ) ) {

			return;

		}

		$value 			= '';

		$default 		= biznesspack_default_theme_options();

		$default_value 	= null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {

			$default_value = $default[ $key ];

		}

		if ( null !== $default_value ) {

			$value = get_theme_mod( $key, $default_value );

		}else {

			$value = get_theme_mod( $key );

		}

		return $value;

	}

endif;
if ( ! function_exists( 'biznesspack_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see biznesspack_custom_header_setup().
 */
function biznesspack_header_style() { 

$header_text_color = get_header_textcolor();
	if( !empty( $header_text_color ) ): ?>
		<style type="text/css">
			   .site-header a,
			   .site-header p{
					color: #<?php echo esc_attr( $header_text_color ); ?>;
			   }
		</style>
			
		<?php
	endif;
}

endif;

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function biznesspack_customize_preview_js() {
	wp_enqueue_script( 'biznesspack-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'biznesspack_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function biznesspack_panels_js() {
	wp_enqueue_script( 'biznesspack-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'biznesspack_panels_js' );
