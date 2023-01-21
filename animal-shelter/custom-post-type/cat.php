<?php
if ( ! function_exists('cat_cpt') ) {

	// Register Custom Post Type
	function cat_cpt() {

		$labels = array(
			'name'                  => _x( 'Cats', 'Post Type General Name', 'animal-shelter' ),
			'singular_name'         => _x( 'Cat', 'Post Type Singular Name', 'animal-shelter' ),
			'menu_name'             => __( 'Post Types', 'animal-shelter' ),
			'name_admin_bar'        => __( 'Post Type', 'animal-shelter' ),
			'archives'              => __( 'Item Archives', 'animal-shelter' ),
			'attributes'            => __( 'Item Attributes', 'animal-shelter' ),
			'parent_item_colon'     => __( 'Parent Item:', 'animal-shelter' ),
			'all_items'             => __( 'All Items', 'animal-shelter' ),
			'add_new_item'          => __( 'Add New Item', 'animal-shelter' ),
			'add_new'               => __( 'Add New', 'animal-shelter' ),
			'new_item'              => __( 'New Item', 'animal-shelter' ),
			'edit_item'             => __( 'Edit Item', 'animal-shelter' ),
			'update_item'           => __( 'Update Item', 'animal-shelter' ),
			'view_item'             => __( 'View Item', 'animal-shelter' ),
			'view_items'            => __( 'View Items', 'animal-shelter' ),
			'search_items'          => __( 'Search Item', 'animal-shelter' ),
			'not_found'             => __( 'Not found', 'animal-shelter' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'animal-shelter' ),
			'featured_image'        => __( 'Featured Image', 'animal-shelter' ),
			'set_featured_image'    => __( 'Set featured image', 'animal-shelter' ),
			'remove_featured_image' => __( 'Remove featured image', 'animal-shelter' ),
			'use_featured_image'    => __( 'Use as featured image', 'animal-shelter' ),
			'insert_into_item'      => __( 'Insert into item', 'animal-shelter' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'animal-shelter' ),
			'items_list'            => __( 'Items list', 'animal-shelter' ),
			'items_list_navigation' => __( 'Items list navigation', 'animal-shelter' ),
			'filter_items_list'     => __( 'Filter items list', 'animal-shelter' ),
		);
		$rewrite = array(
			'slug'                  => 'cat',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Cat', 'animal-shelter' ),
			'description'           => __( 'Animal: Cog', 'animal-shelter' ),
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
			'has_archive'           => 'cat',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'cat_pt', $args );

	}
	add_action( 'init', 'cat_cpt', 0 );

}
