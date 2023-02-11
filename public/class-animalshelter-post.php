<?php

class Animalshelter_Post {
	public string $prefix = ANIMALSHELTER_PREFIX;
	public string $cpt;
	public int $id;

	public string $taxonomy_breed = ANIMALSHELTER_TAXONOMY_BREED_DOG;

	public function __construct( $id = 0 ) {
		if ( empty( $id ) ) {
			$id = get_the_ID();
		}
		$this->id = $id;
	}

	// Get basic data
	public function get_title(): string {
		return get_the_title( $this->id );
	}

	public function get_URI(): string {
		return (string)get_the_permalink( $this->id );
	}

	public function get_link( $title = '', $classes = array() ): string {
		if ( empty( $title ) ) {
			$title = $this->get_title();
		}
		$class = '';
		if ( ! empty( $classes ) && is_array( $classes ) ) {
			$class = ' class="' . implode( ' ', $classes ) . '"';
		}

		return '<a href="' . esc_url( $this->get_URI() ) . '"' . $class . '>' . esc_html( $title ) . '</a>';
	}

	public function get_edit_URI(): ?string {
		return get_edit_post_link( $this->id );
	}

	public function get_excerpt(): string {
		return get_the_excerpt( $this->id );
	}

	public function get_excerpt_limited( $limit ): string {
		return wp_trim_words( $this->get_excerpt(), $limit );
	}

	// Author info
	public function get_author_id(): int {
		return (int) get_post_field( 'post_author', $this->id );
	}

	// Publication info
	public function is_published(): bool {
		return ( get_post_status( $this->id ) === 'publish' );
	}

	public function is_child(): bool {
		if ( wp_get_post_parent_id( $this->id ) ) {
			return true;
		}

		return false;
	}

	public function get_publication_date( $dateFormat = 'U' ): string {
		return (string)get_the_time( $dateFormat, $this->id );
	}

	public function get_modification_date( $dateFormat = 'U' ): string {
		return (string)get_the_modified_time( $dateFormat, $this->id );
	}

	// Permissions
	public function isUserAllowed() {
		if ( get_post_type( $this->id ) === $this->cpt &&
			 (
				 current_user_can( 'edit_others_posts', $this->id ) ||
				 $this->get_author_id() === get_current_user_id()
			 )
		) {
			return true;
		}

		return false;
	}

	// Taxonomy
	public function get_Breed(): array {
		$terms = $this->get_terms( $this->taxonomy_breed );

		if ( false !== is_wp_error( $terms ) ) {
			return [];
		}

		return $terms;
	}

	public function get_terms( $taxonomy ): array {
		$taxonomy = wp_get_post_terms( $this->id, $taxonomy );

		if ( false !== is_wp_error( $taxonomy ) ) {
			return [];
		}

		return $taxonomy;
	}

	// Meta
	public function get_value( $key ) {
		$values = '';
		if ( ! empty( $this->id ) ) {
			$values = get_post_meta( $this->id, $key, true );
			$values = ( $values === '' ) ? '' : $values;
		}

		return $values;
	}

	public function set_value( $key, $value ): int {
		if ( ! empty( $this->id ) ) {
			return (int)update_post_meta( $this->id, $key, $value );
		}

		return 0;
	}

	public function remove_value( $key, $value = '' ): int {
		if ( ! empty( $this->id ) ) {
			if ( empty( $value ) ) {
				return (int)delete_post_meta( $this->id, $key );
			} else {
				return (int)delete_post_meta( $this->id, $key, $value );
			}
		}

		return 0;
	}

	public function time_now(): int {
		return (int) time();
	}

}
