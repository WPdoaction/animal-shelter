<?php

class Animalshelter_Admin_Cpt_Cat extends Animalshelter_Admin_Cpt {

	public function __construct() {
		parent::__construct();
		$this->cpt         = ANIMALSHELTER_CPT_CAT;
		$this->rewrite     = 'cat';
		$this->label       = __( 'Cat', 'animal-shelter' );
		$this->description = __( 'Animal: Cat', 'animal-shelter' );
		$this->menu_icon   = 'dashicons-portfolio';
	}

	public function initCPT() {
		add_action( 'init', array( $this, 'cpt_register' ) );
		//add_action( 'init', array( $this, 'add_cpt_metaboxes' ) );
	}

	public function cpt_register() {
		$args           = $this->cpt_register_public_default_args();
		$args['labels'] = array(
			'name'                  => _x( 'Cats', 'Post Type General Name', 'animal-shelter' ),
			'singular_name'         => _x( 'Cat', 'Post Type Singular Name', 'animal-shelter' ),
			'menu_name'             => __( 'Cats', 'animal-shelter' ),
			'name_admin_bar'        => __( 'Cat', 'animal-shelter' ),
			'archives'              => __( 'Cat archives', 'animal-shelter' ),
			'attributes'            => __( 'Cat attributes', 'animal-shelter' ),
			'parent_item_colon'     => __( 'Parent cat:', 'animal-shelter' ),
			'all_items'             => __( 'All cats', 'animal-shelter' ),
			'add_new_item'          => __( 'Add new cat', 'animal-shelter' ),
			'add_new'               => __( 'Add new', 'animal-shelter' ),
			'new_item'              => __( 'New cat', 'animal-shelter' ),
			'edit_item'             => __( 'Edit cat', 'animal-shelter' ),
			'update_item'           => __( 'Update cat', 'animal-shelter' ),
			'view_item'             => __( 'View cat', 'animal-shelter' ),
			'view_items'            => __( 'View cats', 'animal-shelter' ),
			'search_items'          => __( 'Search cat', 'animal-shelter' ),
			'not_found'             => __( 'Not found', 'animal-shelter' ),
			'not_found_in_trash'    => __( 'Not found in trash', 'animal-shelter' ),
			'insert_into_item'      => __( 'Insert into cat', 'animal-shelter' ),
			'uploaded_to_this_item' => __( 'Uploaded to this cat', 'animal-shelter' ),
			'items_list'            => __( 'Cats list', 'animal-shelter' ),
			'items_list_navigation' => __( 'Cats list navigation', 'animal-shelter' ),
			'filter_items_list'     => __( 'Filter cats list', 'animal-shelter' ),
		);
		register_post_type( $this->cpt, $args );
	}

	public function add_cpt_metaboxes() {

	}


}
