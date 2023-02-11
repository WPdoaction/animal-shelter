<?php

class Animalshelter_Taxonomy_Status_Cat extends Animalshelter_Taxonomy {
    public function __construct() {
		parent::__construct();
        $this->taxonomy         = ANIMALSHELTER_TAXONOMY_STATUS_CAT;
		$this->taxonomy_rewrite = 'status-cat';
	}

	public function initTaxonomy() {
		add_action( 'init', array( $this, 'taxonomy_register' ) );
		//add_action( 'init', array( $this, 'add_taxonomy_metaboxes' ) );
	}

	public function taxonomy_register() {
		$args           = $this->taxonomy_register_public_default_args();
		$args['labels'] = $this->get_taxonomies_status_labels();

		register_taxonomy( $this->taxonomy, array( $this->cpt_cat ), $args );
	}

	public function add_taxonomy_metaboxes() {

	}

}