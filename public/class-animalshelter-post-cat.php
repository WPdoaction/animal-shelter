<?php

class Animalshelter_Post_Cat extends Animalshelter_Post {
	public function __construct( $id = 0 ) {
		$this->cpt = ANIMALSHELTER_CPT_CAT;
		parent::__construct( $id );
	}

	public function get_variable() {
		//example
		return $this->get_value( $this->prefix . '_variable' );
	}

}
