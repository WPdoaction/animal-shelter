<?php

class Animalshelter_Term_Color_Cat extends Animalshelter_Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_COLOR_CAT;
		parent::__construct( $id );
	}
}
