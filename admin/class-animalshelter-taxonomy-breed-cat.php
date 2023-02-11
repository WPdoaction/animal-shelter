<?php

class Animalshelter_Taxonomy_Breed_Cat extends Animalshelter_Taxonomy {
    private Animalshelter_Labels_Breed $labels;
    
	public function __construct( $labels ) {
		parent::__construct();
        $this->labels			= $labels;
		$this->taxonomy         = ANIMALSHELTER_TAXONOMY_BREED_CAT;
		$this->taxonomy_rewrite = 'breed-cat';
	}

	public function initTaxonomy() {
		add_action( 'init', array( $this, 'taxonomy_register' ) );
		//add_action( 'init', array( $this, 'add_taxonomy_metaboxes' ) );
	}

	public function taxonomy_register() {
		$args           = $this->taxonomy_register_public_default_args();
		$args['labels'] = $this->labels->get_labels();

		register_taxonomy( $this->taxonomy, array( $this->cpt_cat ), $args );
	}

	public function add_taxonomy_metaboxes() {

	}

}