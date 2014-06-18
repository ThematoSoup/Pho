<?php
/**
 * Pho functions and definitions
 *
 * @package Pho
 */


if ( ! function_exists( 'pho_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pho_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 780; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Pho, use a find and replace
	 * to change 'pho' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pho', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'  => __( 'Primary Menu', 'pho' ),
		'footer'   => __( 'Footer Menu', 'pho' ),
		'social'   => __( 'Social Menu', 'pho' )
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pho_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // pho_setup
add_action( 'after_setup_theme', 'pho_setup' );

/**
 * Add image size.
 */
add_image_size( 'masonry-thumb', 370, 210, true );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pho_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'pho' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'pho' ),
		'id'            => 'footer-widget-area',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'pho_widgets_init' );

/**
 * Enqueue scripts and styles.
 *
 * @uses pho_get_google_font_url()
 */
function pho_scripts() {
	// CSS
	wp_register_style( 'pho-social-menu', get_stylesheet_directory_uri() . '/css/social-menu.css' );
	if ( has_nav_menu( 'social' ) ) {
		wp_enqueue_style( 'pho-social-menu' );
	}
	if ( pho_get_google_font_url() ) {
		wp_register_style( 'pho-fonts', pho_get_google_font_url() );
		wp_enqueue_style( 'pho-fonts' );
	}
	wp_enqueue_style( 'pho-style', get_stylesheet_uri() );

	// JS
	wp_enqueue_script( 'pho-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'pho-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_archive() || is_home() ) {
		wp_enqueue_script( 'masonry' );
	}
}
add_action( 'wp_enqueue_scripts', 'pho_scripts' );

/**
 * Initialize Masonry.
 */
function pho_masonry_init() {
if ( is_archive() || is_home() ) { ?>
<script type="text/javascript">
	var container = document.querySelector('#masonry-wrapper');
	var msnry;

	imagesLoaded( container, function() {
		msnry = new Masonry( container, {
			itemSelector: '.hentry',
			gutter:       30
		});
	});
</script>
<?php }
}
add_action( 'wp_footer', 'pho_masonry_init', 100 );

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
 * Load THA hooks.
 */
require get_template_directory() . '/inc/libraries/tha/tha-theme-hooks.php';