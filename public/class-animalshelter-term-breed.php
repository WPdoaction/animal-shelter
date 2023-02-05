<?php

class Animalshelter_Term_Breed extends Animalshelter_Term {
	function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_BREED;
		parent::__construct( $id );
	}
}
