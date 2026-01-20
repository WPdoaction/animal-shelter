<?php
/**
 * Custom Post Type base class
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\Admin\CPT;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Base class for Custom Post Types.
 *
 * Provides common functionality for all animal CPTs including registration args,
 * query helpers, and permission checks.
 *
 * @since 1.0.0
 * @package AnimalShelter
 * @subpackage AnimalShelter/Admin/CPT
 */
class Cpt {
	/**
	 * Class prefix for namespacing.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $class_prefix = ANIMALSHELTER_PREFIX;

	/**
	 * Custom post type slug.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $cpt;

	/**
	 * CPT rewrite slug.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $rewrite;

	/**
	 * CPT label.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $label;

	/**
	 * CPT description.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $description;

	/**
	 * Dashicon class for menu.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $menu_icon;

	/**
	 * Custom title placeholder text.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $title_post;

	/**
	 * Breed taxonomy slug.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $taxonomy_breed = ANIMALSHELTER_TAXONOMY_BREED_DOG;

	/**
	 * Constructor.
	 *
	 * Registers the custom title filter.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'enter_title_here', array( $this, 'custom_enter_title' ) );
	}

	/**
	 * Get default registration arguments for public CPT.
	 *
	 * Returns an array of arguments for register_post_type() with sensible defaults
	 * for a public-facing animal CPT with REST API support.
	 *
	 * @since 1.0.0
	 * @return array Registration arguments.
	 */
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

	/**
	 * Custom title for CPT
	 *
	 * @param string $input Input title.
	 * @return string
	 */
	public function custom_enter_title( $input ) {
		if ( $this->cpt === get_post_type() ) {
			return $this->title_post;
		}

		return $input;
	}

	/**
	 * Get archive URL for this CPT.
	 *
	 * @since 1.0.0
	 * @return string Archive URL.
	 */
	public function get_archive_URL(): string {
		return esc_url( site_url() ) . '/' . esc_url( $this->rewrite ) . '/';
	}

	/**
	 * Get basic WP_Query arguments.
	 *
	 * Returns basic query args for fetching posts of this CPT type with default ordering.
	 *
	 * @since 1.0.0
	 * @return array WP_Query arguments.
	 */
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
		$query = new \WP_Query( $args );
		return wp_list_pluck( $query->posts, 'ID' );
	}

	public function get_query_ids_published(): array {
		return $this->get_query_ids( $this->get_query_basic_args() );
	}

	public function get_query_custom( $args ): array {
		$postArray = array();
		$query     = new \WP_Query( $args );
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
		$query     = new \WP_Query( $args );
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
