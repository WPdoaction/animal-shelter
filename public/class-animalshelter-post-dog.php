<?php

class Animalshelter_Post_Dog extends Animalshelter_Post {
	function __construct( $id = 0 ) {
		$this->cpt = ANIMALSHELTER_CPT_DOG;
		parent::__construct( $id );
	}

	function getVariable() { //example
		return $this->getValue( $this->prefix.'_variable' );
	}

}
