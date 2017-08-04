<?php
function register_cpt_case()
{
	 $labels = array(
		'name' 							 => _x( 'Case Studies', 'contempo' ),
		'singular_name' 		 => _x( 'Case Study', 'contempo' ),
		'add_new' 					 => _x( 'Add New', 'contempo' ),
		'add_new_item' 			 => _x( 'Add New Case Study', 'contempo' ),
		'brand_item' 				 => _x( 'Case Study Case Study', 'contempo' ),
		'new_item' 					 => _x( 'New Case Study', 'contempo' ),
		'view_item' 				 => _x( 'View Case Study', 'contempo' ),
		'search_items' 			 => _x( 'Search Case Studies', 'contempo' ),
		'not_found' 				 => _x( 'No Case Studies found', 'contempo' ),
		'not_found_in_trash' => _x( 'No Case Studies found in Trash', 'contempo' ),
		'parent_item_colon'  => _x( 'Parent Case Study:', 'contempo' ),
		'menu_name' 				 => _x( 'Case Studies', 'contempo' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'case study',
		'public'        => true,
		'supports'      => array( 'title', 'thumbnail', 'editor', 'excerpt', 'revisions' ),
		'menu_position' => 5,
		'has_archive'   => true,
		'rewrite' 			=> array( 'with_front' => false, 'slug' => 'case-studies' ),
		'menu_icon' 		=> 'dashicons-welcome-write-blog',
		'taxonomies'    => array( 'category' ),
	);
	register_post_type( 'case_study', $args );
}
add_action( 'init', 'register_cpt_case' );

// Register Custom Taxonomy
function custom_platform_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Platforms', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Platform', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Platforms', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'platforms', array( 'case_study' ), $args );

}
add_action( 'init', 'custom_platform_taxonomy', 0 );


/* ---------------------------------
	Metaboxes
--------------------------------- */
add_action( 'cmb2_init', 'contempo_case_metaboxes' );

function contempo_case_metaboxes()
{
    $prefix = '_case_';
		$cmb = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
		  'title'         => __( 'Case Study Info', 'cmb2' ),
			'object_types'  => array( 'case_study'),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
	) );

    $cmb->add_field( array(
	    'name' => 'Video Embed',
	    'id'   => $prefix . 'video_embed',
	    'type' => 'textarea',
	) );

		$cmb->add_field( array(
			'id'     => $prefix . 'file_list',
			'name'   => 'Images',
			'desc'   => 'Images must be 1170x444.',
			'type'   => 'file_list',
			'query_args' => array( 'type' => 'image' ), // Only images attachment
			'text'    => array(
			'add_upload_files_text' => 'Add Images', // Change upload button text. Default: "Add or Upload File"
			),
	) );

	// how to
	// https://cmb2.io/docs/

}

// Outputs template tag to generate CMB2 file_list -> Photos after a post.
function cmb2_output_images( $file_list_meta_key, $img_size = 'case-study' ) {
	// Get the list of files
	$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

	echo '<div class="container case-img-list">';
	// Loop through $files and output images
	foreach ( (array) $files as $attachment_id => $attachment_url ) {
		echo '<div class="case-img-list__img">';
		echo wp_get_attachment_image( $attachment_id, $img_size );
		echo '</div>';
	}
	echo '</div>';
}

/* ---------------------------------
	Archive Text
--------------------------------- */
add_action('tk', 'add_cpt_archive_title');

function add_cpt_archive_title() {
	if ( is_post_type_archive( 'case_study' ) ){
		echo '<h1 class="page-title animate-pop-in">How We Work</h1>';
	}
}

?>
