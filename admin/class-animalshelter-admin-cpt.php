<?php

class Animalshelter_Admin_Cpt {

	public string $class_prefix = ANIMALSHELTER_PREFIX;
	public string $cpt;
	public string $rewrite;
	public string $label;
	public string $description;
	public string $taxonomy_breed = ANIMALSHELTER_TAXONOMY_BREED;

	function __construct() {

	}

	function cpt_register_default_args(): array {
		$rewrite = array(
			'slug'                  => $this->rewrite,
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => $this->label,
			'description'           => $this->description,
			'labels'                => [],
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => $this->rewrite,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		return $args;
	}

	function getQueryBasicArgs() {
		$args = array(
			'post_type'           => array( $this->cpt ),
			'post_status'         => array( 'publish' ),
			'posts_per_page'      => '-1',
			'ignore_sticky_posts' => true
		);

		return $args;
	}

	function getQueryTermsArgs( $terms, $relation = 'AND' ) {
		$args = $this->getQueryBasicArgs();
		if ( ! is_array( $terms ) && is_a( $terms, 'WP_Term' ) ) {
			$term  = $terms;
			$terms = [ $term ];
		}
		if ( ! empty( $terms ) ) {
			if ( sizeof( $terms ) > 1 ) {
				$tax_query['relation'] = $relation;
			}
			foreach ( $terms as $term ) {
				$tax_query[]       = [
					'taxonomy' => $term->taxonomy,
					'terms'    => $term->term_id
				];
				$args['tax_query'] = $tax_query;
			}
		}

		return $args;
	}

	function getMainQueryArgs() {
		global $wp_query;
		if ( ! empty( $wp_query->query_vars ) ) {
			return $wp_query->query_vars;
		} else {
			return array();
		}
	}

	function archiveURL() {
		echo site_url() . '/' . $this->rewrite . '/';
	}

	// On save action
	function verifyOnSave( $post_id, $post ) {
		return $this->isCPTOK( $post ) && ! $this->isAutoSave() && $this->hasPermissions( $post_id );
	}

	function isAutoSave() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return true;
		}

		return false;
	}

	function hasPermissions( $post_id ) {
		if ( current_user_can( 'edit_post', $post_id ) ) {
			return true;
		}

		return false;
	}

	function isCPTOK( $post ) {
		if ( $post->post_type == $this->cpt ) {
			return true;
		}

		return false;
	}

	//Tools
	function getIdsFromArgs( $args ) {
		$idsArray = array();

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$idsArray[] = get_the_ID();
			}
		}
		wp_reset_postdata();

		return $idsArray;
	}

	function getSelectorListFromArgs( $args ) {
		$listArray = array();

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$listArray[ get_the_ID() ] = get_the_title();
			}
		}
		wp_reset_postdata();

		return $listArray;
	}

	function getIDsPublished() {
		$args  = $this->getQueryBasicArgs();
		$query = new WP_Query( $args );
		$ids   = wp_list_pluck( $query->posts, 'ID' );

		return $ids;
	}

	function timeNow() {
		return (int) time();
	}

}
