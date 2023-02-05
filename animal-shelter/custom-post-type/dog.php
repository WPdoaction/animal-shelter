<?php
/**
 * Register Custom Post Type - Dog
 *
 * @package Animal Shelter
 * @since 1.0.0
 */
 
if ( ! function_exists('dog_cpt') ) {

	/**
	 * Registers the Dog Custom Post Type
	 *
	 * @return void
	 */
	function dog_cpt() {

		$labels = array(
			'name'                  => _x( 'Dogs', 'Post Type General Name', 'animal-shelter' ),
			'singular_name'         => _x( 'Dog', 'Post Type Singular Name', 'animal-shelter' ),
			'menu_name'             => __( 'Dogs', 'animal-shelter' ),
			'name_admin_bar'        => __( 'Dog', 'animal-shelter' ),
			'archives'              => __( 'Dog Archives', 'animal-shelter' ),
			'attributes'            => __( 'Dog Attributes', 'animal-shelter' ),
			'parent_item_colon'     => __( 'Parent Dog:', 'animal-shelter' ),
			'all_items'             => __( 'All Dogs', 'animal-shelter' ),
			'add_new_item'          => __( 'Add New Dog', 'animal-shelter' ),
			'add_new'               => __( 'Add New', 'animal-shelter' ),
			'new_item'              => __( 'New Dog', 'animal-shelter' ),
			'edit_item'             => __( 'Edit Dog', 'animal-shelter' ),
			'update_item'           => __( 'Update Dog', 'animal-shelter' ),
			'view_item'             => __( 'View Dog', 'animal-shelter' ),
			'view_items'            => __( 'View Dogs', 'animal-shelter' ),
			'search_items'          => __( 'Search Dog', 'animal-shelter' ),
			'not_found'             => __( 'Not found', 'animal-shelter' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'animal-shelter' ),
			'featured_image'        => __( 'Featured Image', 'animal-shelter' ),
			'set_featured_image'    => __( 'Set featured image', 'animal-shelter' ),
			'remove_featured_image' => __( 'Remove featured image', 'animal-shelter' ),
			'use_featured_image'    => __( 'Use as featured image', 'animal-shelter' ),
			'insert_into_item'      => __( 'Insert into dog', 'animal-shelter' ),
			'uploaded_to_this_item' => __( 'Uploaded to this dog', 'animal-shelter' ),
			'items_list'            => __( 'Dogs list', 'animal-shelter' ),
			'items_list_navigation' => __( 'Dogs list navigation', 'animal-shelter' ),
			'filter_items_list'     => __( 'Filter dogs list', 'animal-shelter' ),
		);
		$rewrite = array(
			'slug'                  => 'dog',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Dog', 'animal-shelter' ),
			'description'           => __( 'Animal: Dog', 'animal-shelter' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'dog',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'dog_pt', $args );

	}
	add_action( 'init', 'dog_cpt', 0 );

}
