<?php

class Animalshelter_Term_Status_Cat extends Animalshelter_Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_STATUS_CAT;
		parent::__construct( $id );
	}
}
