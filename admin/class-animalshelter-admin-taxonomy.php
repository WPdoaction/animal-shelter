<?php

class Animalshelter_Admin_Taxonomy {
	public string $taxonomy;
	public string $taxonomy_rewrite;

	public string $cpt_dog = ANIMALSHELTER_CPT_DOG;
	public string $cpt_cat = ANIMALSHELTER_CPT_CAT;

	public function __construct() {

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
	public function get_terms( $hide_empty = true ): array|WP_Error|string {
		return get_terms(
			array(
				'taxonomy'   => $this->taxonomy,
				'hide_empty' => $hide_empty,
			)
		);
	}

}



