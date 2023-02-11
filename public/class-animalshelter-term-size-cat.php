<?php

class Animalshelter_Term_Size_Cat extends Animalshelter_Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_SIZE_CAT;
		parent::__construct( $id );
	}
}
