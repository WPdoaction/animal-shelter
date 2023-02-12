<?php

class Animalshelter_Post_Cat extends Animalshelter_Post {
	public function __construct( $id = 0 ) {
		$this->cpt = ANIMALSHELTER_CPT_CAT;
		$this->taxonomy_breed = ANIMALSHELTER_TAXONOMY_BREED_CAT;
		$this->taxonomy_status = ANIMALSHELTER_TAXONOMY_STATUS_CAT;
		$this->taxonomy_size = ANIMALSHELTER_TAXONOMY_SIZE_CAT;
		$this->taxonomy_energy = ANIMALSHELTER_TAXONOMY_ENERGY_CAT;
		parent::__construct( $id );
	}

	public function get_variable() {
		//example
		return $this->get_value( $this->prefix . '_variable' );
	}

}
