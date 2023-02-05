<?php
/**
 * Register Taxonomy - Breed
 *
 * @package Animal Shelter
 * @since 1.0.0
 */
 
if ( ! function_exists('animalshelter_breed_tx') ) {

	/**
	 * Registers the Breed Taxonomy
	 *
	 * @return void
	 */
	function animalshelter_breed_tx() {

		$labels = array(
			'name'                       => _x( 'Breeds', 'Taxonomy General Name', 'animal-shelter' ),
			'singular_name'              => _x( 'Breed', 'Taxonomy Singular Name', 'animal-shelter' ),
			'menu_name'                  => __( 'Breed', 'animal-shelter' ),
			'all_items'                  => __( 'All Breeds', 'animal-shelter' ),
			'parent_item'                => __( 'Parent Breed', 'animal-shelter' ),
			'parent_item_colon'          => __( 'Parent Breed:', 'animal-shelter' ),
			'new_item_name'              => __( 'New Breed Name', 'animal-shelter' ),
			'add_new_item'               => __( 'Add New Breed', 'animal-shelter' ),
			'edit_item'                  => __( 'Edit Breed', 'animal-shelter' ),
			'update_item'                => __( 'Update Breed', 'animal-shelter' ),
			'view_item'                  => __( 'View Breed', 'animal-shelter' ),
			'separate_items_with_commas' => __( 'Separate breeds with commas', 'animal-shelter' ),
			'add_or_remove_items'        => __( 'Add or remove breeds', 'animal-shelter' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'animal-shelter' ),
			'popular_items'              => __( 'Popular Breeds', 'animal-shelter' ),
			'search_items'               => __( 'Search Breeds', 'animal-shelter' ),
			'not_found'                  => __( 'Not Found', 'animal-shelter' ),
			'no_terms'                   => __( 'No Breeds', 'animal-shelter' ),
			'items_list'                 => __( 'Breeds list', 'animal-shelter' ),
			'items_list_navigation'      => __( 'Breeds list navigation', 'animal-shelter' ),
		);
		$rewrite = array(
			'slug'                       => 'breed',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'breed', array( 'page' ), $args );

	}
	add_action( 'init', 'animalshelter_breed_tx', 0 );

}
