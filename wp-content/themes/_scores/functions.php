<?php
/**
 * contempo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package contempo
 */

if ( ! function_exists( 'contempo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function contempo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on contempo, use a find and replace
	 * to change 'contempo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'contempo', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails', array ('post', 'case_study', 'brand') );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'contempo' ),
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
	add_theme_support( 'custom-background', apply_filters( 'contempo_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'contempo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function contempo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'contempo_content_width', 640 );
}
add_action( 'after_setup_theme', 'contempo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function contempo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'contempo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'contempo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'contempo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function contempo_scripts() {
	wp_enqueue_style( 'contempo-style', get_stylesheet_uri() );

	wp_enqueue_script( 'contempo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//main.min.js

	wp_enqueue_script( 'contempo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'contempo_scripts' );

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
 * Colin's Edits
 */



 /* ---------------------------------
 	Image Sizes
 --------------------------------- */


 add_image_size( 'jumbotron-page', '1600x444', 1600, 444, true );
 add_image_size( 'small-card', '500_375', 500, 375, true );
 add_image_size( 'inline-card', '262_176', 262, 175, true );

 /*  How to get responsive images

 // https://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/

 <?php
 $img_src = wp_get_attachment_image_url( $attachment_id, 'medium' );
 $img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'medium' );
 ?>
 <img src="<?php echo esc_url( $img_src ); ?>"
      srcset="<?php echo esc_attr( $img_srcset ); ?>"
      sizes="(max-width: 50em) 87vw, 680px" alt="A rad wolf">


 */




/* ---------------------------------
	CPT's
--------------------------------- */

require get_template_directory() . '/inc/cpt_case-study.php';
require get_template_directory() . '/inc/cpt_brands.php';



/* ---------------------------------
	Remove Default Widgets
--------------------------------- */
function unregister_default_widgets()
{
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'unregister_default_widgets', 11);

/**
 * Media - set default image link location to 'None'
 */

update_option('image_default_link_type','none');

?>
