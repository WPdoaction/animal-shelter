<?php

class Animalshelter_Taxonomy {
	public string $taxonomy;
	public string $taxonomy_rewrite;

	public string $cpt_dog = ANIMALSHELTER_CPT_DOG;
	public string $cpt_cat = ANIMALSHELTER_CPT_CAT;

	public function __construct() {

	}

	public function get_taxonomies_breed_labels(): array {
		return array(
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
	}

	public function get_taxonomies_status_labels(): array {
		return array(
			'name'                       => _x( 'Status', 'Taxonomy General Name', 'animal-shelter' ),
			'singular_name'              => _x( 'Status', 'Taxonomy Singular Name', 'animal-shelter' ),
			'menu_name'                  => __( 'Status', 'animal-shelter' ),
			'all_items'                  => __( 'All status', 'animal-shelter' ),
			'parent_item'                => __( 'Parent status', 'animal-shelter' ),
			'parent_item_colon'          => __( 'Parent status:', 'animal-shelter' ),
			'new_item_name'              => __( 'New status bame', 'animal-shelter' ),
			'add_new_item'               => __( 'Add new status', 'animal-shelter' ),
			'edit_item'                  => __( 'Edit status', 'animal-shelter' ),
			'update_item'                => __( 'Update status', 'animal-shelter' ),
			'view_item'                  => __( 'View status', 'animal-shelter' ),
			'separate_items_with_commas' => __( 'Separate status with commas', 'animal-shelter' ),
			'add_or_remove_items'        => __( 'Add or remove status', 'animal-shelter' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'animal-shelter' ),
			'popular_items'              => __( 'Popular status', 'animal-shelter' ),
			'search_items'               => __( 'Search status', 'animal-shelter' ),
			'not_found'                  => __( 'Not Found', 'animal-shelter' ),
			'no_terms'                   => __( 'No status', 'animal-shelter' ),
			'items_list'                 => __( 'Status list', 'animal-shelter' ),
			'items_list_navigation'      => __( 'Status list navigation', 'animal-shelter' ),
		);
	}

	public function taxonomy_register_public_default_args(): array {
		$rewrite = array(
			'slug'         => $this->taxonomy_rewrite,
			'with_front'   => true,
			'hierarchical' => false,
		);
		$args    = array(
			'labels'            => array(),
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'rewrite'           => $rewrite,
			'show_in_rest'      => true,
		);

		return $args;
	}

	// Query helpers
	public function get_terms( $hide_empty = true ): array {
		$terms = get_terms(
			array(
				'taxonomy'   => $this->taxonomy,
				'hide_empty' => $hide_empty,
			)
		);

		if ( false !== is_wp_error( $terms ) ) {
			return [];
		}

		return $terms;
	}

}



