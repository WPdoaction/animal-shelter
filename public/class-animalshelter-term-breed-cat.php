<?php

class Animalshelter_Term_Breed_Cat extends Animalshelter_Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_BREED_CAT;
		parent::__construct( $id );
	}
}
