<?php

class Animalshelter_Taxonomy_Energy_Dog extends Animalshelter_Taxonomy {
    public function __construct() {
		parent::__construct();
        $this->taxonomy         = ANIMALSHELTER_TAXONOMY_ENERGY_DOG;
		$this->taxonomy_rewrite = 'energy-dog';
	}

	public function initTaxonomy() {
		add_action( 'init', array( $this, 'taxonomy_register' ) );
		//add_action( 'init', array( $this, 'add_taxonomy_metaboxes' ) );
	}

	public function taxonomy_register() {
		$args           = $this->taxonomy_register_public_default_args();
		$args['labels'] = $this->get_taxonomies_energy_labels();

		register_taxonomy( $this->taxonomy, array( $this->cpt_dog ), $args );
	}

	public function add_taxonomy_metaboxes() {

	}

}