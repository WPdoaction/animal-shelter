<?php

class Animalshelter_Cpt_Dog extends Animalshelter_Cpt {

	public function __construct() {
		parent::__construct();
		$this->cpt         = ANIMALSHELTER_CPT_DOG;
		$this->rewrite     = 'dog';
		$this->label       = __( 'Dog', 'animal-shelter' );
		$this->description = __( 'Animal: Dog', 'animal-shelter' );
		$this->title_post  = __( 'Name of the dog', 'animal-shelter' );
		$this->menu_icon   = plugins_url( 'admin/img/dog.svg', ANIMALSHELTER_PLUGIN_FILE );
		$this->menu_icon   = 'dashicons-portfolio';
		// Set Dog fields
		$this->fields			 = array(
			// Gender
			array(
				'key' => 'gender',
				'label' => __('Gender', 'animal-shelter'),
				'description' => __('', 'animal-shelter'),
				'type' => 'array',
				'values' => array(
					array(
						'value' => 'male',
						'label' => __('Male', 'animal-shelter'),
					),
					array(
						'value' => 'female',
						'label' => __('Female', 'animal-shelter'),
					),
				),
				'default' => 'male',
				'auth_callback' => function( $value ){ return in_array( $value, array( 'male', 'female' ) ); },
			),
			// Birthdate
			array(
				'key' => 'birthdate',
				'label' => __('Birthdate', 'animal-shelter'),
				'description' => __('', 'animal-shelter'),
				'type' => 'date',
				'sanitize_callback' => function( $value ){ return date_i18n( 'Y-m-d', strtotime($value) ); },
			),
		);
	}

	public function initCPT() {
		add_action( 'init', array( $this, 'cpt_register' ) );
		//add_action( 'init', array( $this, 'add_cpt_metaboxes' ) );
	}

	public function cpt_register() {
		$args           = $this->cpt_register_public_default_args();
		$args['labels'] = array(
			'name'                  => _x( 'Dogs', 'Post Type General Name', 'animal-shelter' ),
			'singular_name'         => _x( 'Dog', 'Post Type Singular Name', 'animal-shelter' ),
			'menu_name'             => __( 'Dogs', 'animal-shelter' ),
			'name_admin_bar'        => __( 'Dog', 'animal-shelter' ),
			'archives'              => __( 'Dog archives', 'animal-shelter' ),
			'attributes'            => __( 'Dog attributes', 'animal-shelter' ),
			'parent_item_colon'     => __( 'Parent dog:', 'animal-shelter' ),
			'all_items'             => __( 'All dogs', 'animal-shelter' ),
			'add_new_item'          => __( 'Add new dog', 'animal-shelter' ),
			'add_new'               => __( 'Add new', 'animal-shelter' ),
			'new_item'              => __( 'New dog', 'animal-shelter' ),
			'edit_item'             => __( 'Edit dog', 'animal-shelter' ),
			'update_item'           => __( 'Update dog', 'animal-shelter' ),
			'view_item'             => __( 'View dog', 'animal-shelter' ),
			'view_items'            => __( 'View dogs', 'animal-shelter' ),
			'search_items'          => __( 'Search dog', 'animal-shelter' ),
			'not_found'             => __( 'Not found', 'animal-shelter' ),
			'not_found_in_trash'    => __( 'Not found in trash', 'animal-shelter' ),
			'insert_into_item'      => __( 'Insert into dog', 'animal-shelter' ),
			'uploaded_to_this_item' => __( 'Uploaded to this dog', 'animal-shelter' ),
			'items_list'            => __( 'Dogs list', 'animal-shelter' ),
			'items_list_navigation' => __( 'Dogs list navigation', 'animal-shelter' ),
			'filter_items_list'     => __( 'Filter dogs list', 'animal-shelter' ),
		);
		register_post_type( $this->cpt, $args );
	}

	public function add_cpt_metaboxes() {

	}


}
