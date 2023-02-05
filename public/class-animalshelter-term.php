<?php

class Animalshelter_Term {
	public string $prefix = ANIMALSHELTER_PREFIX;
	public string $cpt_dog = ANIMALSHELTER_CPT_DOG;
	public string $cpt_cat = ANIMALSHELTER_CPT_CAT;
	public string $taxonomy;

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

	function getTitle() {
		return $this->name;
	}

	function getURI() {
		return get_term_link( $this->id, $this->taxonomy );
	}

	function getLink( $title = '', $classes = [] ) {
		if ( empty( $title ) ) {
			$title = $this->getTitle();
		}
		$class = '';
		if ( ! empty( $classes ) && is_array( $classes ) ) {
			$class = ' class="' . implode( ' ', $classes ) . '"';
		}

		return '<a href="' . esc_url( $this->getURI() ) . '"' . $class . '>' . esc_html( $title ) . '</a>';
	}

	/* Meta */
	function getValue( $key, $array = false ) {
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
