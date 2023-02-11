<?php

class Animalshelter_Term_Status_Dog extends Animalshelter_Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_STATUS_DOG;
		parent::__construct( $id );
	}
}
