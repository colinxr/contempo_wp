<?php
/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class Contempo_Admin {

	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	protected $key = 'contempo_options';

	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	protected $metabox_id = 'contempo_option_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Holds an instance of the object
	 *
	 * @var Contempo_Admin
	 */
	protected static $instance = null;

	/**
	 * Returns the running object
	 *
	 * @return Contempo_Admin
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->hooks();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	protected function __construct() {
		// Set our title
		$this->title = __( 'Site Options', 'contempo' );
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );

		// Include CMB CSS in the head to avoid FOUC
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		// hook in our save notices
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );

		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );

		// Set our CMB2 fields

		//'These pages are generated automatically by WordPress and thus lack the back-end controls found on the Brand and Contact Pages. Use these fields to set copy, image or other elements found on the page. '

		$cmb->add_field( array(
			'name' => 'Contempo Homepage',
			'desc' => 'contempomedia.com',
			'type' => 'title',
			'id'   => 'contempo_homepage_title'
		) );

		$cmb->add_field( array(
			'id'     => 'home_jumbotron_img',
			'name'   => 'Homepage Hero Image',
			'desc'   => 'Images must be 2000xTk.',
			'type'   => 'file',
			'preview_size' => array( 155, 100 ),
			'text'   => array(
				'add_upload_files_text' => 'Add Images'
			), // Change upload button text. Default: "Add or Upload File"
			'query_args' => array(
				'type' => 'image'
			), // Only images attachment
		) );

		$cmb->add_field( array(
			'name' => __( 'Hero Image Header Copy', 'contempo' ),
			'desc' => __( 'Bold Text on Homepage Hero Image', 'contempo' ),
			'id'   => 'home_jumbotron_hed',
			'type' => 'text',
			'default' => 'Default Text',
		) );

		$cmb->add_field( array(
			'name' => __( 'Hero Image Header Dek', 'contempo' ),
			'desc' => __( 'Secondary copy for Homepage Hero Image', 'contempo' ),
			'id'   => 'home_jumbotron_dek',
			'type' => 'textarea',
			'default' => 'Default Text',
		) );

		$cmb->add_field( array(
			'name' => __( 'About Us Header Copy', 'contempo' ),
			'desc' => __( 'Header Copy on Homepage About Us section', 'contempo' ),
			'id'   => 'home_about-us_hed',
			'type' => 'text',
			'default' => 'Default Text',
		) );

		$cmb->add_field( array(
			'name' => __( 'Carousel Header Copy', 'contempo' ),
			'desc' => __( 'Header Copy on Homepage Client Carousel', 'contempo' ),
			'id'   => 'client_carousel_hed',
			'type' => 'text',
			'default' => 'Default Text',
		) );

		$cmb->add_field( array(
			'name' => 'Case Studies Page',
			'desc' => 'contempomedia.com/case-studies',
			'type' => 'title',
			'id'   => 'contempo_case_studies_title'
		) );

		$cmb->add_field( array(
			'name' => __( 'Case Study Hed', 'contempo' ),
			'desc' => __( 'Main title copy for Case Studies Archive page', 'contempo' ),
			'id'   => 'case_study_hed',
			'type' => 'text',
			'default' => 'Default Text',
		) );

		$cmb->add_field( array(
			'name' => __( 'Case Study Dek', 'contempo' ),
			'desc' => __( 'Secondary copy for Case Studies Archive page', 'contempo' ),
			'id'   => 'case_study_dek',
			'type' => 'textarea',
			'default' => 'Default Text',
		) );

		$cmb->add_field( array(
			'name' => 'Press Page',
			'desc' => 'contempomedia.com/press',
			'type' => 'title',
			'id'   => 'contempo_press_title'
		) );

		$cmb->add_field( array(
			'name' => __( 'Press Hed', 'contempo' ),
			'desc' => __( 'Main title copy for Press page', 'contempo' ),
			'id'   => 'press_page_hed',
			'type' => 'text',
			'default' => 'Default Text',
		) );

		$cmb->add_field( array(
			'name' => __( 'Press Dek', 'contempo' ),
			'desc' => __( 'Secondary copy for Press page', 'contempo' ),
			'id'   => 'press_page_dek',
			'type' => 'textarea',
			'default' => 'Default Text',
		) );

	}

	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key
	 * @param  array $updated   Array of updated fields
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}

		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'contempo' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the Contempo_Admin object
 * @since  0.1.0
 * @return Contempo_Admin object
 */
function contempo_admin() {
	return Contempo_Admin::get_instance();
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function contempo_get_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( contempo_admin()->key, $key, $default );
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( contempo_admin()->key, $default );

	$val = $default;

	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}

	return $val;
}

// Get it started
contempo_admin();
