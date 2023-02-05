<?php

class Animalshelter_Admin_Taxonomy_Breed extends Animalshelter_Admin_Taxonomy {
	function __construct() {
		parent::__construct();
		$this->taxonomy         = ANIMALSHELTER_TAXONOMY_BREED;
		$this->taxonomy_rewrite = 'breed';
	}

	public function initTaxonomy() {
		add_action( 'init', array( $this, 'taxonomy_register' ) );
		add_action( 'init', array( $this, 'add_taxonomy_metaboxes' ) );
	}

	function taxonomy_register() {
		$args = $this->taxonomy_register_default_args();
		$args['labels'] = array(
			'name'                       => _x( 'Breeds', 'Taxonomy General Name', 'animal-shelter' ),
			'singular_name'              => _x( 'Breed', 'Taxonomy Singular Name', 'animal-shelter' ),
			'menu_name'                  => __( 'Breed', 'animal-shelter' ),
			'all_items'                  => __( 'All breeds', 'animal-shelter' ),
			'parent_item'                => __( 'Parent breed', 'animal-shelter' ),
			'parent_item_colon'          => __( 'Parent breed:', 'animal-shelter' ),
			'new_item_name'              => __( 'New breed bame', 'animal-shelter' ),
			'add_new_item'               => __( 'Add new breed', 'animal-shelter' ),
			'edit_item'                  => __( 'Edit breed', 'animal-shelter' ),
			'update_item'                => __( 'Update breed', 'animal-shelter' ),
			'view_item'                  => __( 'View breed', 'animal-shelter' ),
			'separate_items_with_commas' => __( 'Separate breeds with commas', 'animal-shelter' ),
			'add_or_remove_items'        => __( 'Add or remove breeds', 'animal-shelter' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'animal-shelter' ),
			'popular_items'              => __( 'Popular breeds', 'animal-shelter' ),
			'search_items'               => __( 'Search breeds', 'animal-shelter' ),
			'not_found'                  => __( 'Not Found', 'animal-shelter' ),
			'no_terms'                   => __( 'No breeds', 'animal-shelter' ),
			'items_list'                 => __( 'Breeds list', 'animal-shelter' ),
			'items_list_navigation'      => __( 'Breeds list navigation', 'animal-shelter' ),
		);
		register_taxonomy( $this->taxonomy, [$this->cpt_dog, $this->cpt_cat] , $args );
	}

	function add_taxonomy_metaboxes() {

	}

}



