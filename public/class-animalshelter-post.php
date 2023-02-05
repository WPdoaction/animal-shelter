<?php

class Animalshelter_Post {
	public string $prefix = ANIMALSHELTER_PREFIX;
	public string $cpt;
	public string $taxonomy_breed = ANIMALSHELTER_TAXONOMY_BREED;

	public function __construct( $id = 0 ) {
		if ( empty( $id ) ) {
			$id = get_the_ID();
		}
		$this->id = $id;
	}

	function getTitle(): string {
		return get_the_title( $this->id );
	}

	function getURI(): bool|string {
		return get_the_permalink( $this->id );
	}

	function getLink( $title = '', $classes = [] ): string {
		if ( empty( $title ) ) {
			$title = $this->getTitle();
		}
		$class = '';
		if ( ! empty( $classes ) && is_array( $classes ) ) {
			$class = ' class="' . implode( ' ', $classes ) . '"';
		}

		return '<a href="' . esc_url( $this->getURI() ) . '"' . $class . '>' . esc_html( $title ) . '</a>';
	}

	function getEditURI(): ?string {
		return get_edit_post_link( $this->id );
	}

	function getExcerpt(): string {
		return get_the_excerpt( $this->id );
	}

	function getExcerptLimited( $limit ): string {
		return wp_trim_words( $this->getExcerpt(), $limit );
	}

	function isPublished(): bool {
		return ( get_post_status( $this->id ) == 'publish' );
	}

	function getAuthorId(): array|int|string {
		return get_post_field( 'post_author', $this->id );
	}

	function isUserAllowed(): bool {
		if ( get_post_type( $this->id ) == $this->cpt &&
			(
				current_user_can( 'edit_others_posts', $this->id ) ||
				get_post_field( 'post_author', $this->id ) == get_current_user_id()
			)
		) {
			return true;
		}

		return false;
	}

	function getPublicationDate( $dateFormat = 'U' ): bool|int|string {
		return get_the_time( $dateFormat, $this->id );
	}

	function getModificationDate( $dateFormat = 'U' ): bool|int|string {
		return get_the_modified_time( $dateFormat, $this->id );
	}

	function getPageSummary(): string {
		return get_the_excerpt( $this->id );
	}

	function isChild(): bool {
		if ( wp_get_post_parent_id( $this->id ) ) {
			return true;
		}
		return false;
	}

	/* Taxonomy */
	function getBreed(): WP_Error|array {
		return $this->getTerms( $this->taxonomy_breed );
	}

	function getTerms( $taxonomy ): WP_Error|array {
		return wp_get_post_terms( $this->id, $taxonomy );
	}

	/* Meta */
	function getValue( $key ): string {
		$values = '';
		if ( ! empty( $this->id ) ) {
			$values = get_post_meta( $this->id, $key, true );
			$values = ( $values == '' ) ? '' : $values;
		}

		return $values;
	}

	function setValue( $key, $value ): bool|int {
		if ( ! empty( $this->id ) ) {
			return update_post_meta( $this->id, $key, $value );
		}

		return false;
	}

	function removeValue( $key, $value = '' ): bool|int {
		if ( ! empty( $this->id ) ) {
			if ( empty( $value ) ) {
				return delete_post_meta( $this->id, $key );
			} else {
				return delete_post_meta( $this->id, $key, $value );
			}
		}

		return 0;
	}

	function timeNow(): int {
		return (int) time();
	}

}
