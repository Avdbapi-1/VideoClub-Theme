<?php
/**
 * VideoClub functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package videoclub
 */

if ( ! function_exists( 'videoclub_setup' ) ) :

function videoclub_setup() {

	load_theme_textdomain( 'videoclub', get_template_directory() . '/languages' );

	add_theme_support( "wp-block-styles" );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "align-wide" );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add theme support for Custom Logo.
	// Custom logo.
	$logo_width  = 300;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	$args = array(
		'height'      => $logo_height,
		'width'       => $logo_width,
		'flex-height' => true,
		'flex-width'  => true,
	);

	add_theme_support('custom-logo', $args);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top' => esc_html__( 'Top Menu', 'videoclub' ),
		'primary' => esc_html__( 'Primary Menu', 'videoclub' ),
		'secondary' => esc_html__( 'Secondary Menu', 'videoclub' ),		
		'footer' => esc_html__( 'Footer Menu', 'videoclub' ),	
		'mobile' => esc_html__( 'Mobile Menu', 'videoclub' ),						
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
	add_theme_support( 'custom-background', apply_filters( 'videoclub_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	$editor_stylesheet_path = './assets/css/editor-style.css';

	// Enqueue editor styles.
	add_editor_style( $editor_stylesheet_path );  

}
endif;

add_action( 'after_setup_theme', 'videoclub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
// Set content-width.
global $content_width;

if ( ! isset( $content_width ) ) {
	$content_width = 858;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function videoclub_sidebar_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'General Sidebar', 'videoclub' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'videoclub' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Single Post Sidebar', 'videoclub' ),
		'id'            => 'sidebar-post',
		'description'   => esc_html__( 'Add widgets here.', 'videoclub' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );	

}
add_action( 'widgets_init', 'videoclub_sidebar_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * SVG Icons.
 */
require get_template_directory() . '/inc/classes/class-videoclub-svg-icons.php';

/**
 * Menu Walker.
 */
require get_template_directory() . '/inc/classes/class-videoclub-walker-page.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

/**
 * Load about page.
 */
require get_template_directory() . '/inc/about.php';

/**
 * Load metabox functionality.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Load taxonomy functionality.
 */
require get_template_directory() . '/inc/taxonomy.php';

/**
 * Google fonts.
 */
if ( ! function_exists( 'videoclub_fonts_url' ) ) :
	/**
	 * Register Google fonts for VideoClub
	 *
	 * Create your own videoclub_fonts_url() function to override in a child theme.
	 *
	 * @since 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function videoclub_fonts_url() {
		$fonts_url = '';

		/* Translators: If there are characters in your language that are not
		* supported by Poppins, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$font_families = array( 'Inter:wght@400;600;700' );

		if ( ! empty( $font_families  ) ) {

			$query_args = array(
				'family' => implode( '&family=', $font_families ), //urlencode( implode( '|', $font_families ) ),
				// 'subset' => urlencode( 'latin,latin-ext' ),
				'display' => 'swap',
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
		}

		if ( ! class_exists( 'WPTT_WebFont_Loader' ) ) {
			// Load Google fonts from Local.
			require_once get_theme_file_path( 'inc/lib/wptt-webfont-loader.php' );
		}

		return esc_url( wptt_get_webfont_url( $fonts_url ) );
	}
endif;

/**
 * Enqueues scripts and styles.
 */
function videoclub_scripts() {

    // load jquery if it isn't

    wp_enqueue_script('jquery');

	//  Enqueues Javascripts
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/superfish.js', array(), '', true );
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '', true );
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '', true );                                          		
    wp_enqueue_script( 'videoclub-index', get_template_directory_uri() . '/assets/js/index.js', array(), '20240911', true );     
	wp_enqueue_script( 'videoclub-custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20240911', true );	

    // Enqueues CSS styles
	wp_enqueue_style( 'videoclub-fonts', videoclub_fonts_url(), array(), null );
    wp_enqueue_style( 'videoclub-style', get_stylesheet_uri(), array(), '20240911' );   
	wp_enqueue_style( 'videoclub-responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20240911' );       
    wp_enqueue_style( 'genericons-style',   get_template_directory_uri() . '/genericons/genericons.css' );
	wp_enqueue_style( 'font-awesome-style',   get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '20240911' );
	wp_enqueue_style( 'videoclub-video-metabox-style',   get_template_directory_uri() . '/assets/css/video-metabox.css', array(), '20240911' );       	    
	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'videoclub_scripts' );

function videoclub_editor_styles() {
	// Enqueue editor styles.
	add_editor_style(
		array(
			videoclub_fonts_url(),
		)
	);
}
add_action( 'admin_init', 'videoclub_editor_styles' );

/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'videoclub_post_thumb', 480, 270, true );
}

/**
 * Admin Scripts.
 */
add_action( 'admin_enqueue_scripts', 'videoclub_backend_styles' );

function videoclub_backend_styles() {

  // Enqueue your backend CSS file
  wp_enqueue_style( 'videoclub-backend-style', get_stylesheet_directory_uri() . '/assets/css/admin-style.css', array(), '1.0.0', 'all' );

  // (Optional) If your CSS file depends on other styles (like WordPress core styles)
  // wp_enqueue_style( 'my-backend-style', get_stylesheet_directory_uri() . '/admin.css', array( 'wp-admin' ) );
}