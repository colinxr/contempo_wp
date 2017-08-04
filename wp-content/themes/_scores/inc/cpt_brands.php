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
		'edit_item'					 => _x( 'Edit Brand', 'brand'),
		'update_item'				 => _x( 'Update Brand', 'brand'),
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
		'menu_position' => 5,
		'rewrite' 			=> array( 'with_front' => false, 'slug' => 'brands' ),
		'menu_icon' 		=> 'dashicons-category'
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

		// General Info Custom Meta Box

    $cmb = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => __( 'General Info', 'cmb2' ),
			'object_types'  => array( 'brand'),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$cmb->add_field( array(
			'name' => 'Brand Logo',
			'id'   => $prefix . 'page-logo',
			'type' => 'file',
			'options' => array(
				'url' => false, // Hide the text input for the url
			),
		) );

		$cmb->add_field( array(
			'name' => 'Brand Homepage Logo',
			'id'   => $prefix . 'home_logo',
			'type' => 'file',
			'options' => array(
				'url' => false, // Hide the text input for the url
			),
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

		// Media Kit Custom Meta Box

		$cmb1 = new_cmb2_box( array(
			'id'            => $prefix . 'metabox1',
			'title'         => __( 'Media Kits', 'cmb1' ),
			'object_types'  => array( 'brand'),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$cmb1->add_field( array(
			'name' => 'Media Kits',
			'id'   => $prefix . 'media-kit_title',
			'desc' => 'Section for Media Kit Links',
			'type' => 'title',
		) );

		$cmb1->add_field( array(
		    'name' => 'Print Media Kit URL',
		    'id'   => $prefix . 'print_media_kit',
				'type' => 'file',
				'options' => array(
					'url' => false, // Hide the text input for the url
				),
				'text'    => array(
					'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
				),
				// query_args are passed to wp.media's library query.
				'query_args' => array(
					'type' => 'application/pdf', // Make library only display PDFs.
				),
		) );

		$cmb1->add_field( array(
		    'name' => 'Digital Media Kit URL',
		    'id'   => $prefix . 'digital_media_kit',
				'type' => 'file',
				'options' => array(
					'url' => false, // Hide the text input for the url
				),
				'text'    => array(
					'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
				),
				// query_args are passed to wp.media's library query.
				'query_args' => array(
					'type' => 'application/pdf', // Make library only display PDFs.
				),
		) );

		$cmb1->add_field( array(
		    'name'    => 'Special Media Kit URL',
		    'id'      => $prefix . 'special_media_kit',
				'type'    => 'file',
				'options' => array(
					'url' => false, // Hide the text input for the url
				),
				'text'    => array(
					'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
				),
				// query_args are passed to wp.media's library query.
				'query_args' => array(
					'type' => 'application/pdf', // Make library only display PDFs.
				),
		) );

		// Audience Meta Box

		$cmb2 = new_cmb2_box( array(
			'id'            => $prefix . 'metabox2',
			'title'         => __( 'Audience Info', 'cmb2' ),
			'object_types'  => array( 'brand'),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$cmb2->add_field( array(
			'name' => 'Audience Info',
			'id'   => $prefix . 'brand-audience-info',
			'desc' => 'Circulation Numbers, Social, Analytics  KPI',
			'type' => 'title',
		) );

		$cmb2->add_field( array(
			'name' => 'Show Audience Data?',
			'desc' => 'Show section with Audience Data',
			'id'   => $prefix . 'audience_checkbox',
			'type' => 'checkbox',
		) );


		$cmb2->add_field( array(
	  	'name' => 'Monthly Uniques',
	    'id'   => $prefix . 'uniques',
	    'type' => 'text',
		) );

		$cmb2->add_field( array(
	  	'name' => 'Pageviews',
	    'id'   => $prefix . 'pageviews',
	    'type' => 'text',
		) );

		$cmb2->add_field( array(
	  	'name' => 'Social Reach',
	    'id'   => $prefix . 'social-reach',
	    'type' => 'text',
		) );

		$cmb2->add_field( array(
	  	'name' => 'Facebook Fans',
	    'id'   => $prefix . 'facebook',
	    'type' => 'text',
		) );

		$cmb2->add_field( array(
	  	'name' => 'Instagram',
	    'id'   => $prefix . 'instagram',
	    'type' => 'text',
		) );

		$cmb2->add_field( array(
	  	'name' => 'Print Readers',
	    'id'   => $prefix . 'print',
	    'type' => 'text',
		) );

		$cmb2->add_field( array(
	  	'name' => 'Circulation',
	    'id'   => $prefix . 'circulation',
	    'type' => 'text',
		) );

		// Carousel Info Meta Box

		$cmb3 = new_cmb2_box( array(
			'id'            => $prefix . 'metabox3',
			'title'         => __( 'Carousel', 'cmb3' ),
			'object_types'  => array( 'brand'),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$cmb3->add_field( array(
			'name' => 'Carousel',
			'id'   => $prefix . 'brand-carousel_title',
			'desc' => 'Carousel Background Images, Logos & Description',
			'type' => 'title',
		) );

		$cmb3->add_field( array(
			'id'     => $prefix . 'carousel_bg',
			'name'   => 'Carousel bg',
			'desc'   => 'Images must be 1600xTk.',
			'type'   => 'file',
			'text'   => array(
				'add_upload_files_text' => 'Add Images'
			), // Change upload button text. Default: "Add or Upload File"
			'query_args' => array(
				'type' => 'image'
			), // Only images attachment
		) );

		$cmb3->add_field( array(
			'name' => 'Carousel Logo',
			'id'   => $prefix . 'carousel_logo',
			'type' => 'file',
			'options' => array(
				'url' => false, // Hide the text input for the url
			),
		) );

		$cmb3->add_field( array(
			'name' => 'Carousel Description',
			'id'   => $prefix . 'carousel_desc',
			'type' => 'textarea',
		) );

		$cmb3->add_field( array(
			'name' => 'Second Carousel Slide?',
			'desc' => 'Enable Carousel',
			'id'   => $prefix . 'carousel_checkbox',
			'type' => 'checkbox',
		) );

		$cmb3->add_field( array(
			'id'     => $prefix . 'carousel2_bg',
			'name'   => 'Carousel bg',
			'desc'   => 'Images must be 1600xTk.',
			'type'   => 'file',
			'text'   => array(
				'add_upload_files_text' => 'Add Images'
			), // Change upload button text. Default: "Add or Upload File"
			'query_args' => array(
				'type' => 'image'
			), // Only images attachment
		) );

		$cmb3->add_field( array(
			'name' => 'Second Carousel Logo',
			'id'   => $prefix . 'carousel2_logo',
			'type' => 'file',
			'options' => array(
				'url' => false, // Hide the text input for the url
			),
		) );

		$cmb3->add_field( array(
			'name' => 'Second Carousel Description',
			'id'   => $prefix . 'carousel2_desc',
			'type' => 'textarea',
		) );

		// Brand Contact Info Meta Box

		$cmb4 = new_cmb2_box( array(
			'id'            => $prefix . 'metabox4',
			'title'         => __( 'Brand Contacts', 'cmb4' ),
			'object_types'  => array( 'brand'),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$cmb4->add_field( array(
			'name' => 'Brand Information',
			'id'   => $prefix . 'brand-info_title',
			'desc' => 'Contacts and Emails',
			'type' => 'title',

		) );

		$cmb4->add_field( array(
			'name' => 'Ad Name',
			'id'   => $prefix . 'ad_name',
			'type' => 'text',
		) );

		$cmb4->add_field( array(
			'name' => 'Ad Email',
			'id'   => $prefix . 'ad_email',
			'type' => 'text',
		) );

		$cmb4->add_field( array(
			'name' => 'Ad Phone',
			'id'   => $prefix . 'ad_phone',
			'type' => 'text',
		) );

		$cmb4->add_field( array(
			'name' => 'Edit Name',
			'id'   => $prefix . 'ed_name',
			'type' => 'text',
		) );

		$cmb4->add_field( array(
			'name' => 'Edit Email',
			'id'   => $prefix . 'ed_email',
			'type' => 'text',
		) );

		$cmb4->add_field( array(
			'name' => 'Site URL',
			'id'   => $prefix . 'site_url',
			'type' => 'text',
		) );

		$cmb4->add_field( array(
			'name' => 'Store URL',
			'id'   => $prefix . 'shop_url',
			'type' => 'text',
		) );

		$cmb4->add_field( array(
			'name' => 'Footer Magazine Cover',
			'id'   => $prefix . 'footer_mag_cover',
			'type' => 'file',
		) );
}


?>
