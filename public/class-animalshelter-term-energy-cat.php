<?php

class Animalshelter_Term_Energy_Cat extends Animalshelter_Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_ENERGY_CAT;
		parent::__construct( $id );
	}
}
