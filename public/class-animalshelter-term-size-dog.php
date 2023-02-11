<?php

class Animalshelter_Term_Size_Dog extends Animalshelter_Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_SIZE_DOG;
		parent::__construct( $id );
	}
}
