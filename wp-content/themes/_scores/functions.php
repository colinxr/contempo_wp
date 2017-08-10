<?php
/**
 * contempo functions and definitions
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

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails', array ('post', 'page', 'case_study', 'brand') );


	// Adds excerpts to pages -> used on Contract Publishing Page
	add_post_type_support( 'page', 'excerpt' );

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


/* ---------------------------------
	Widgets
--------------------------------- */

// register sidebar area
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

// remove default widgets
function unregister_default_widgets() {
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


/* ---------------------------------
 Underscores includes
--------------------------------- */
require_once get_template_directory() . '/inc/jetpack.php';


/* ---------------------------------
	Scripts
--------------------------------- */

// Moves JS from <head> to right before </body> tag
function remove_head_scripts(){
	remove_action( 'wp_head', 'wp_print_scripts' );
	remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
	remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

	add_action( 'wp_footer', 'wp_print_scripts', 5 );
	add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
	add_action( 'wp_footer', 'wp_print_head_scripts', 5 );
}
//add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

// Enqueue scripts and styles
function contempo_scripts() {
	wp_register_style( 'contempo-style', get_stylesheet_uri() );
	wp_enqueue_style( 'contempo-style');

	wp_register_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-awesome' );

	wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/build/modernizr.js', array( 'jquery' ), '2.8.3', false );
	wp_enqueue_script( 'modernizr' );

	wp_register_script( 'vendor', get_template_directory_uri() . '/assets/js/build/vendor.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'vendor' );

	wp_register_script( 'contempo-app', get_template_directory_uri() . '/assets/js/build/app.js', array( 'vendor' ), '1.0', true  );
	wp_enqueue_script( 'contempo-app' );

}
add_action( 'wp_enqueue_scripts', 'contempo_scripts' );

function dns_prefetch() {
	echo '<meta http-equiv="x-dns-prefetch-control" content="on">
	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">';

}
add_action( 'wp_head', 'dns_prefetch', 0);


/* ---------------------------------
	Images
--------------------------------- */

// add image sizes
add_image_size( 'carousel', '1600x856', 1600, 856, true);
add_image_size( 'jumbotron-page', '1600x644', 1600, 644, true);
add_image_size( 'case-study', '1170x444', 1170, 444, array( 'center', 'center' ) );

// set default image link location to 'None'
update_option('image_default_link_type','none');

// Add SVGs to media library – Chris Coyier Fix
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
  	return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
  	'ext'             => $filetype['ext'],
  	'type'            => $filetype['type'],
  	'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
	echo '<style type="text/css">
				.attachment-266x266, .thumbnail img {
        	width: 100% !important;
          height: auto !important;
        }
        </style>';
}

add_action( 'admin_head', 'fix_svg' );


/* ---------------------------------
	CPT's
--------------------------------- */

require_once get_template_directory() . '/inc/cpt_brands.php';
require_once get_template_directory() . '/inc/cpt_case-study.php';

/* ---------------------------------
	Theme Options Page
--------------------------------- */

require_once get_template_directory() . '/inc/options-page.php';


/* ---------------------------------
	Page Custom Metaboxes
--------------------------------- */

// Contract Publishing page
add_action( 'cmb2_init', 'contempo_contract_metaboxes' );
function contempo_contract_metaboxes() {

	$prefix = '_contract_';

	$cmb = new_cmb2_box( array (
		'id'            => $prefix . 'metabox',
		'title'         => __( 'General Info', 'cmb2' ),
		'object_types'  => array( 'page' ),
		'show_on'      => array( 'key' => 'id', 'value' => array( 31 ) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
		) );

		$cmb->add_field( array(
	  	'name' => 'Page Hed',
	    'id'   => $prefix . 'page-hed',
	    'type' => 'text',
		) );

		$cmb->add_field( array(
	  	'name' => 'Page Dek',
	    'id'   => $prefix . 'page-dek',
	    'type' => 'textarea',
		) );

		$cmb->add_field( array(
			'name' => 'Main Brand Photo',
			'id'   => $prefix . 'jumbotron-page',
			'type' => 'file',
		) );

}

// Contact Page Custom Metaboxes
add_action( 'cmb2_init', 'contempo_contact_metaboxes' );
function contempo_contact_metaboxes() {

	$prefix = '_contact_';

	$cmb = new_cmb2_box( array (
		'id'            => $prefix . 'metabox',
		'title'         => __( 'General Info', 'cmb2' ),
		'object_types'  => array( 'page' ),
		'show_on'      => array( 'key' => 'id', 'value' => array( 24 ), 'key' => 'id', 'value' => array( 107 ) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
		) );

		$cmb->add_field( array(
	  	'name' => 'Page Hed',
	    'id'   => $prefix . 'page-hed',
	    'type' => 'text',
		) );

		$cmb->add_field( array(
	  	'name' => 'Page Dek',
	    'id'   => $prefix . 'page-dek',
	    'type' => 'textarea',
		) );

		$cmb1 = new_cmb2_box( array (
			'id'            => $prefix . '_management_metabox',
			'title'         => __( 'Ownership', 'cmb2' ),
			'object_types'  => array( 'page' ),
			'show_on'      => array( 'key' => 'id', 'value' => array( 24 ) ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			) );

		$cmb1->add_field( array(
			'name' => 'Publisher Info',
			'id'   => $prefix . 'john_title',
			'desc' => 'John McGouran',
			'type' => 'title',

		) );

			$cmb1->add_field( array(
		  	'name' => 'Name',
		    'id'   => $prefix . 'pub_name',
		    'type' => 'text',
			) );

			$cmb1->add_field( array(
		  	'name' => 'Bio',
		    'id'   => $prefix . 'pub_bio',
		    'type' => 'textarea',
			) );

			$cmb1->add_field( array(
		  	'name' => 'Photo',
		    'id'   => $prefix . 'pub_img',
		    'type' => 'file',
			) );

			$cmb1->add_field( array(
		  	'name' => 'Email',
		    'id'   => $prefix . 'pub_email',
		    'type' => 'text',
			) );

			$cmb1->add_field( array(
				'name' => 'Creative & Editorial Director',
				'id'   => $prefix . 'michael_title',
				'desc' => 'Michael La Fave',
				'type' => 'title',

			) );

			$cmb1->add_field( array(
		  	'name' => 'Name',
		    'id'   => $prefix . 'cd_name',
		    'type' => 'text',
			) );

			$cmb1->add_field( array(
		  	'name' => 'Bio',
		    'id'   => $prefix . 'cd_bio',
		    'type' => 'textarea',
			) );

			$cmb1->add_field( array(
		  	'name' => 'Photo',
		    'id'   => $prefix . 'cd_img',
		    'type' => 'file',
			) );

			$cmb1->add_field( array(
		  	'name' => 'Email',
		    'id'   => $prefix . 'cd_email',
		    'type' => 'text',
			) );

			$cmb2 = new_cmb2_box( array (
				'id'            => $prefix . 'sharp_eic_metabox',
				'title'         => __( 'Sharp Editor-In-Cheif', 'cmb2' ),
				'object_types'  => array( 'page' ),
				'show_on'      => array( 'key' => 'id', 'value' => array( 24 ) ),
				'context'       => 'normal',
				'priority'      => 'high',
				'show_names'    => true,
				) );

			$cmb2->add_field( array(
				'name' => 'Sharp EIC Contact Info',
				'id'   => $prefix . 'sharp_title',
				'type' => 'title',

			) );

			$cmb2->add_field( array(
		  	'name' => 'Name',
		    'id'   => $prefix . 'sharp_eic_name',
		    'type' => 'text',
			) );

			$cmb2->add_field( array(
		  	'name' => 'Photo',
		    'id'   => $prefix . 'sharp_eic_img',
		    'type' => 'file',
			) );

			$cmb2->add_field( array(
		  	'name' => 'Email',
		    'id'   => $prefix . 'sharp_eic_email',
		    'type' => 'text',
			) );

			$cmb3 = new_cmb2_box( array (
				'id'            => $prefix . 'smag_eic_metabox',
				'title'         => __( 'S/ magazine Editor-In-Cheif', 'cmb2' ),
				'object_types'  => array( 'page' ),
				'show_on'      => array( 'key' => 'id', 'value' => array( 24 ) ),
				'context'       => 'normal',
				'priority'      => 'high',
				'show_names'    => true,
				) );

			$cmb3->add_field( array(
				'name' => 'S/ magazine EIC Contact Info',
				'id'   => $prefix . 'smag_title',
				'type' => 'title',

			) );

			$cmb3->add_field( array(
		  	'name' => 'Name',
		    'id'   => $prefix . 'smag_eic_name',
		    'type' => 'text',
			) );

			$cmb3->add_field( array(
		  	'name' => 'Photo',
		    'id'   => $prefix . 'smag_eic_img',
		    'type' => 'file',
			) );

			$cmb3->add_field( array(
		  	'name' => 'Email',
		    'id'   => $prefix . 'smag_eic_email',
		    'type' => 'text',
			) );

			$cmb4 = new_cmb2_box( array (
				'id'            => $prefix . 'art_metabox',
				'title'         => __( 'S/ Mag Editor-In-Cheif', 'cmb2' ),
				'object_types'  => array( 'page' ),
				'show_on'      => array( 'key' => 'id', 'value' => array( 24 ) ),
				'context'       => 'normal',
				'priority'      => 'high',
				'show_names'    => true,
				) );

			$cmb4->add_field( array(
				'name' => 'Art Director Contact Info',
				'id'   => $prefix . 'art_title',
				'type' => 'title',

			) );

			$cmb4->add_field( array(
		  	'name' => 'Name',
		    'id'   => $prefix . 'art_name',
		    'type' => 'text',
			) );

			$cmb4->add_field( array(
		  	'name' => 'Photo',
		    'id'   => $prefix . 'art_img',
		    'type' => 'file',
			) );

			$cmb4->add_field( array(
		  	'name' => 'Email',
		    'id'   => $prefix . 'art_email',
		    'type' => 'text',
			) );


			$cmb5 = new_cmb2_box( array (
				'id'            => $prefix . '_address_metabox',
				'title'         => __( 'Contact Info', 'cmb2' ),
				'object_types'  => array( 'page' ),
				'show_on'       => array( 'key' => 'id', 'value' => array( 24 ) ),
				'context'       => 'normal',
				'priority'      => 'high',
				'show_names'    => true,
				) );

			$cmb5->add_field( array(
				'name' => 'Company Contact Info',
				'id'   => $prefix . 'address_title',
				'desc' => 'HTML List of Generic Contact Info',
				'type' => 'title',

			) );

			$cmb5->add_field( array(
		  	'name' => 'Contact: Address Info',
		    'id'   => $prefix . 'address_info',
		    'type' => 'textarea',
			) );

			$cmb6 = new_cmb2_box( array (
				'id'            => $prefix . '_sales_metabox',
				'title'         => __( 'Sales Contact Info', 'cmb2' ),
				'object_types'  => array( 'page' ),
				'show_on'       => array( 'key' => 'id', 'value' => array( 24 ) ),
				'context'       => 'normal',
				'priority'      => 'high',
				'show_names'    => true,
				) );

			$cmb6->add_field( array(
				'name' => 'Sales Contact Info',
				'id'   => $prefix . 'sales-info_title',
				'desc' => 'HTML List of Sales Contacts',
				'type' => 'title',

			) );

			$cmb6->add_field( array(
		  	'name' => 'Contact: Sales',
		    'id'   => $prefix . 'sales',
		    'type' => 'textarea',
			) );

			$cmb7 = new_cmb2_box( array (
				'id'            => $prefix . '_edit_metabox',
				'title'         => __( 'Editorial Contact Info', 'cmb2' ),
				'object_types'  => array( 'page' ),
				'show_on'       => array( 'key' => 'id', 'value' => array( 24 ) ),
				'context'       => 'normal',
				'priority'      => 'high',
				'show_names'    => true,
				) );

			$cmb7->add_field( array(
				'name' => 'Editorial Contact Info',
				'id'   => $prefix . 'edit-info_title',
				'desc' => 'HTML List of Editorial Contacts',
				'type' => 'title',

			) );

			$cmb7->add_field( array(
		  	'name' => 'Contact: Edit',
		    'id'   => $prefix . 'edit',
		    'type' => 'textarea',
			) );


}

/* ---------------------------------
	Page Custom Metaboxes
--------------------------------- */

add_action( 'cmb2_init', 'contempo_post_metaboxes' );
function contempo_post_metaboxes() {

	$prefix = '_post_';

	$cmb = new_cmb2_box( array(
			'id'           => $prefix . 'metabox',
			'title'        => 'Link URL',
			'object_types' => array( 'post', ), // post type
			'context'      => 'normal', //  'normal', 'advanced', or 'side'
			'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
			'show_names'   => true, // Show field names on the left
		) );

		$cmb->add_field( array(
			'name' => 'Is this a link post?',
			'desc' => 'Does this post link out to another website?',
			'id'   => $prefix . 'link_checkbox',
			'type' => 'checkbox',
		) );

		$cmb->add_field( array(
			'name' => __( 'Website URL', 'cmb2' ),
			'id'   => $prefix . 'url',
			'type' => 'text_url',
			// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
		) );
}


/* ---------------------------------
	Menus
--------------------------------- */

// register menu locations
function register_menus() {
	register_nav_menus(
		array(
			'header-menu' 	=> __( 'Header Menu '),
			'footer-nav' 		=> __( 'Footer Nav'),
			'footer-brands' => __( 'Footer Brands')
		)
	);
}

add_action( 'init', 'register_menus' );

// Bootstrap Nav Walker -> enabled bootstrap dropdown
require_once( get_template_directory() .  '/inc/wp-bootstrap-navwalker.php');

?>
