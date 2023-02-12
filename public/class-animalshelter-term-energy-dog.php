<?php

class Animalshelter_Term_Energy_Dog extends Animalshelter_Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_ENERGY_DOG;
		parent::__construct( $id );
	}
}
