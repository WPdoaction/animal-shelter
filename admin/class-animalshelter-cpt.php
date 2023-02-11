<?php

class Animalshelter_Cpt {
	public string $class_prefix = ANIMALSHELTER_PREFIX;
	public string $cpt;
	public string $rewrite;
	public string $label;
	public string $description;
	public string $menu_icon;

	public string $taxonomy_breed = ANIMALSHELTER_TAXONOMY_BREED_DOG;

	public function __construct() {

	}

	public function cpt_register_public_default_args(): array {
		$rewrite = array(
			'slug'       => $this->rewrite,
			'with_front' => true,
			'pages'      => true,
			'feeds'      => true,
		);
		return array(
			'label'               => $this->label,
			'description'         => $this->description,
			'labels'              => array(),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => false,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => $this->rewrite,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
			'menu_icon'           => $this->menu_icon,
		);
	}

	public function get_archive_URL(): string {
		return esc_url( site_url() ) . '/' . esc_url( $this->rewrite ) . '/';
	}

	// WP_Query arguments helpers
	public function get_query_basic_args(): array {
		return array(
			'post_type'           => array( $this->cpt ),
			'post_status'         => array( 'publish' ),
			'posts_per_page'      => '-1',
			'ignore_sticky_posts' => true,
		);
	}

	public function get_query_terms_args( $terms, $relation = 'AND' ): array {
		$args = $this->get_query_basic_args();
		if ( ! is_array( $terms ) && is_a( $terms, 'WP_Term' ) ) {
			$term  = $terms;
			$terms = array( $term );
		}
		if ( ! empty( $terms ) ) {
			if ( count( $terms ) > 1 ) {
				$tax_query['relation'] = $relation;
			}
			foreach ( $terms as $term ) {
				$tax_query[]       = array(
					'taxonomy' => $term->taxonomy,
					'terms'    => $term->term_id,
				);
				$args['tax_query'] = $tax_query;
			}
		}

		return $args;
	}

	public function get_main_query_args(): array {
		global $wp_query;
		if ( ! empty( $wp_query->query_vars ) ) {
			return $wp_query->query_vars;
		} else {
			return array();
		}
	}

	// Admin screen
	public function admin_is_his_screen(): bool {
		$screen = get_current_screen();
		if ( ! empty( $screen ) && ! empty( $this->cpt ) ) {
			if ( $screen->post_type === $this->cpt ) {
				return true;
			}
		}
		return false;
	}

	// Time
	public function time_now(): int {
		return (int) time();
	}

	// WP_Query helpers
	public function get_query_ids( $args ): array {
		$query = new WP_Query( $args );
		return wp_list_pluck( $query->posts, 'ID' );
	}

	public function get_query_ids_published(): array {
		return $this->get_query_ids( $this->get_query_basic_args() );
	}

	public function get_query_custom( $args ): array {
		$postArray = array();
		$query     = new WP_Query( $args );
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$postArray[] = get_the_ID();
			}
		}
		wp_reset_postdata();
		return $postArray;
	}

	public function get_query_selector_list( $args ): array {
		$listArray = array();
		$query     = new WP_Query( $args );
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$listArray[ get_the_ID() ] = get_the_title();
			}
		}
		wp_reset_postdata();
		return $listArray;
	}

	// Check permissions on 'save' action
	public function verify_on_save( $post_id, $post ) {
		return $this->is_this_CPT( $post ) && ! $this->is_auto_save() && $this->currentuser_has_edit_permissions( $post_id );
	}

	private function is_auto_save() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return true;
		}

		return false;
	}

	private function currentuser_has_edit_permissions( $post_id ) {
		if ( current_user_can( 'edit_post', $post_id ) ) {
			return true;
		}

		return false;
	}

	private function is_this_CPT( $post ) {
		if ( $post->post_type === $this->cpt ) {
			return true;
		}

		return false;
	}

}
