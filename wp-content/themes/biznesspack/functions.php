<?php
/**
 *
 * Biznesspack functions and definitions
 * @package Biznesspack
 *
 */

/**
 * Biznesspack only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/include/back-compat.php';
	return;
}

$biznesspack_theme_path = get_template_directory();

require( $biznesspack_theme_path .'/include/fonts.php');

 //Sets up theme defaults and registers support for various WordPress features.
function biznesspack_setup() {
	
	//Make theme available for translation.
	load_theme_textdomain( 'biznesspack' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'biznesspack-featured-image', 1600, 750, true );

	add_image_size( 'biznesspack-thumbnail-avatar', 100, 100, true );
	
	add_image_size( 'biznesspack-post-image-medium', 750, 750 );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'    => __( 'Primary Menu', 'biznesspack' ),
		'social' => __( 'Social Links Menu', 'biznesspack' ),
	) );

	//Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', biznesspack_fonts_url() ) );

	
	// Add theme support for Custom Background.
	$args = array( 
				'default-color' => '#ffffff',
				'default-image' =>''
		);
	
	add_theme_support( 'custom-background', $args );
	
	$args = array(
					'flex-width'    => true,
					'width'         => 1600,
					'flex-height'    => true,
					'height'        => 750,
					'default-text-color' => '',
					'default-image' => get_template_directory_uri() . '/assets/images/header.jpg',
					'wp-head-callback' => 'biznesspack_header_style',
	);
	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/header.jpg',
			'thumbnail_url' => '%s/assets/images/header.jpg',
			'description'   => __( 'Default Header Image', 'biznesspack' ),
		),
	) );
	
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'biznesspack_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * @global int $content_width
 */
function biznesspack_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( biznesspack_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Biznesspack content width of the theme.
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'biznesspack_content_width', $content_width );
}
add_action( 'template_redirect', 'biznesspack_content_width', 0 );

/**
 * Add preconnect for Google Fonts.
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function biznesspack_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'biznesspack-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'biznesspack_resource_hints', 10, 2 );

/**
 * Register widget areas.
 */
function biznesspack_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'biznesspack' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'biznesspack' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'biznesspack' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'biznesspack' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'biznesspack' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'biznesspack' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'biznesspack' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'biznesspack' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'biznesspack' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'biznesspack' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'biznesspack_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function biznesspack_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	return sprintf( '<div class="read-more"><a class="btn read-more-link" href="%1$s">%2$s</a></div>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'biznesspack' )
    );
}
add_filter( 'excerpt_more', 'biznesspack_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 */
function biznesspack_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'biznesspack_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function biznesspack_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'biznesspack_pingback_header' );

/**
 * Enqueue scripts and styles.
 */

function biznesspack_scripts() {
	
	// Theme stylesheet.
	wp_enqueue_style( 'biznesspack-style', get_template_directory_uri() . '/style.css', array(), '1.0' );
	
	//bootstrap rtl
	if ( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.css');
    }
	
	//Bootstrap stylesheet.
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	
	//Fontawesome web stylesheet.
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/assets/css/font-awesome.css' );
	
	//OwlCarousel stylesheet.
	wp_enqueue_style( 'owlcarousel-style', get_template_directory_uri() . '/assets/css/owl-carousel.css' );
	
	//Animate
	wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/assets/css/animate.css' );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'biznesspack-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'biznesspack-style' ), '1.0' );
		wp_style_add_data( 'biznesspack-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'biznesspack-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'biznesspack-style' ), '1.0' );
	wp_style_add_data( 'biznesspack-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'biznesspack-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$biznesspack_l10n = array(
		'quote'          => biznesspack_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'biznesspack-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$biznesspack_l10n['expand']         = __( 'Expand child menu', 'biznesspack' );
		$biznesspack_l10n['collapse']       = __( 'Collapse child menu', 'biznesspack' );
		$biznesspack_l10n['icon']           = biznesspack_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'biznesspack-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );
	
	wp_enqueue_script( 'owlcarousel-script', get_theme_file_uri( '/assets/js/owl-carousel.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'biznesspack-theme-script', get_theme_file_uri( '/assets/js/theme.js' ), array( 'jquery' ), '1.0', true );

	wp_localize_script( 'biznesspack-skip-link-focus-fix', 'biznesspackScreenReaderText', $biznesspack_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'biznesspack_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *	values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function biznesspack_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'biznesspack_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function biznesspack_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'biznesspack_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality for post thumbnails.
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function biznesspack_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'biznesspack_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function biznesspack_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'biznesspack_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size and use list format for better accessibility.
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function biznesspack_widget_tag_cloud_args( $args ) {
	$args['largest']  = 12;
	$args['smallest'] = 12;
	$args['unit']     = 'px';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'biznesspack_widget_tag_cloud_args' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/include/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/include/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/include/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/include/icon-functions.php' );

/**
 * breadcrumb.
 */
require get_parent_theme_file_path( '/template-parts/header/breadcrumb.php' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function biznesspack_custom_excerpt_length( $length ) {
	if( is_admin() ) return $length;
    return 30 ;
}

add_filter( 'excerpt_length', 'biznesspack_custom_excerpt_length');

function clearPostContent($content){
	$newContent = preg_replace('(\[(?:\[??[^\[]*?\]))', '', $content);
	$newContent = mb_substr($newContent, 0, 90, "utf-8");

	if(strlen($content) > strlen($newContent)){
		$newContent.="...";
	}

	return $newContent;
}

function register_general_phone_1_admin_text(){
	register_setting('general', 'admin_phone_1_text', 'esc_attr');
	add_settings_field('admin_phone_1_text', '<label for="admin_phone_1_text">'.__('Телефон 1' , 'admin_phone_1_text' ).'</label>' , 'print_admin_phone_1_text', 'general');
}
function register_general_phone_2_admin_text(){
	register_setting('general', 'admin_phone_2_text', 'esc_attr');
	add_settings_field('admin_phone_2_text', '<label for="admin_phone_2_text">'.__('Телефон 2' , 'admin_phone_2_text' ).'</label>' , 'print_admin_phone_2_text', 'general');
}

function print_admin_phone_1_text(){
	$value = get_option( 'admin_phone_1_text', '' );
	echo '<input style="width:100%;" type="text" id="admin_phone_1_text" name="admin_phone_1_text" value="' . $value . '" />';
}
function print_admin_phone_2_text(){
	$value = get_option( 'admin_phone_2_text', '' );
	echo '<input style="width:100%;" type="text" id="admin_phone_2_text" name="admin_phone_2_text" value="' . $value . '" />';
}

add_filter('admin_init', 'register_general_phone_1_admin_text');
add_filter('admin_init', 'register_general_phone_2_admin_text');
