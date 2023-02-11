<?php

class Animalshelter_Post_Dog extends Animalshelter_Post {
	public function __construct( $id = 0 ) {
		$this->cpt = ANIMALSHELTER_CPT_DOG;
		$this->taxonomy_breed = ANIMALSHELTER_TAXONOMY_BREED_DOG;
		$this->taxonomy_status = ANIMALSHELTER_TAXONOMY_STATUS_DOG;
		parent::__construct( $id );
	}

	public function get_variable() {
		//example
		return $this->get_value( $this->prefix . '_variable' );
	}

}
