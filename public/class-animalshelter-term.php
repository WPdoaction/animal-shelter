<?php

class Animalshelter_Term {
	public string $prefix = ANIMALSHELTER_PREFIX;
	public int $id;
	public string $name;
	public string $slug;
	public string $taxonomy;
	public string $description;
	/**
	 * @var array|mixed|WP_Error|WP_Term|null
	 */
	public mixed $term;

	public string $cpt_dog = ANIMALSHELTER_CPT_DOG;
	public string $cpt_cat = ANIMALSHELTER_CPT_CAT;


	public function __construct( $term ) {
		if ( is_int( $term ) ) {
			$term = get_term( $term );
		}

		if ( ! is_wp_error( $term ) ) {
			$this->id          = $term->term_id;
			$this->name        = $term->name;
			$this->slug        = $term->slug;
			$this->taxonomy    = $term->taxonomy;
			$this->description = $term->description;
			$this->term        = $term;
		}
	}

	public function get_title(): string {
		return $this->name;
	}

	public function get_URI(): string {
		$link = get_term_link( $this->id, $this->taxonomy );

		if ( false !== is_wp_error( $link ) ) {
			return '';
		}

		return $link;
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

	// Meta
	public function get_value( $key, $array = false ) {
		$values = '';
		$single = true;
		if ( $array ) {
			$single = false;
		}
		if ( ! empty( $this->id ) ) {
			$values = get_term_meta( $this->id, $key, $single );
			$values = empty( $values ) ? '' : $values;
		}

		return $values;
	}
}
