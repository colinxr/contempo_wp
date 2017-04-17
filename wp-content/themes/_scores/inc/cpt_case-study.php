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
		'has_archive'   => true,
		'rewrite' 			=> array( 'with_front' => false, 'slug' => 'case-studies' ),
		'menu_icon' 		=> 'dashicons-welcome-write-blog',
		'taxonomies'    => array( 'category' )

	);
	register_post_type( 'case_study', $args );
}
add_action( 'init', 'register_cpt_case' );

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
			'name' => 'Brand',
			'id'   => $prefix . 'brand',
			'type' => 'text',
	) );

    $cmb->add_field( array(
	    'name' => 'Video Embed',
	    'id'   => $prefix . 'video_embed',
	    'type' => 'textarea',
	) );

	// how to
	// https://cmb2.io/docs/


}


?>
