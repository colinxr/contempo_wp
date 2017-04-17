<?php
function register_cpt_brand()
{
	 $labels = array(
    'name' 							 => _x( 'Brands', 'brand' ),
    'singular_name' 		 => _x( 'Brand', 'brand' ),
    'add_new' 					 => _x( 'Add New', 'Brand' ),
    'add_new_item' 			 => _x( 'Add New Brand', 'brand' ),
    'brand_item' 				 => _x( 'Brand Brand', 'brand' ),
    'new_item' 					 => _x( 'New Brand', 'brand' ),
    'view_item' 				 => _x( 'View Brand', 'brand' ),
    'search_items' 			 => _x( 'Search Brands', 'brand' ),
    'not_found' 				 => _x( 'No Brands found', 'brand' ),
    'not_found_in_trash' => _x( 'No Brands found in Trash', 'brand' ),
    'parent_item_colon'  => _x( 'Parent Brand:', 'brand' ),
    'menu_name' 				 => _x( 'Brands', 'brand' )
    );
	$args = array(
		'labels'        => $labels,
		'description'   => 'brand',
		'public'        => true,
		'supports'      => array( 'title', 'thumbnail', 'editor', 'excerpt', 'revisions' ),
		'has_archive'   => false,
		'rewrite' 			=> array( 'with_front' => false, 'slug' => 'brands' ),
		'menu_icon' 		=> 'dashicons-category',
		'taxonomies'    => array( 'category' ),
	);
	register_post_type( 'brand', $args );
}
add_action( 'init', 'register_cpt_brand' );


/* ---------------------------------
	Metaboxes
--------------------------------- */
add_action( 'cmb2_init', 'contempo_brand_metaboxes' );

function contempo_brand_metaboxes()
{
    $prefix = '_brand_';


     $cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Brand Info', 'cmb2' ),
		'object_types'  => array( 'brand'),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );


    $cmb->add_field( array(
	    'name' => 'Homepage Dek',
	    'id'   => $prefix . 'homepage_dek',
	    'type' => 'textarea',
	) );

		$cmb->add_field( array(
			'name' => 'Ad Name',
			'id'   => $prefix . 'ad_name',
			'type' => 'text',
	) );

		$cmb->add_field( array(
			'name' => 'Ad Email',
			'id'   => $prefix . 'ad_email',
			'type' => 'text',
	) );

		$cmb->add_field( array(
			'name' => 'Ad Phone',
			'id'   => $prefix . 'ad_phone',
			'type' => 'text',
		) );

		$cmb->add_field( array(
			'name' => 'Edit Name',
			'id'   => $prefix . 'edit_name',
			'type' => 'text',
	) );

		$cmb->add_field( array(
			'name' => 'Edit Email',
			'id'   => $prefix . 'edit_email',
			'type' => 'text',
	) );

	$cmb->add_field( array(
	    'name' => 'Print Media Kit URL',
	    'id'   => $prefix . 'print_media_kit',
			'type' => 'file',
	) );



	$cmb->add_field( array(
	    'name' => 'Digital Media Kit URL',
	    'id'   => $prefix . 'digital_media_kit',
			'type' => 'file',
	) );

	$cmb->add_field( array(
	    'name' => 'Special Media Kit URL',
	    'id'   => $prefix . 'special_media_kit',
			'type' => 'file',
	) );

	$cmb->add_field( array(
			'name' => 'Footer Magazine Cover',
			'id'   => $prefix . 'footer_mag_cover',
			'type' => 'file',
	) );

	// how to access the file
	// https://cmb2.io/docs/field-types#-types-file

	//$image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_brand_print_media_kit_id', 1 ), 'medium' );


}


?>
