<?php
/**
 * Dog Status Taxonomy
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\Admin\Taxonomy\Dog;

use AnimalShelter\Admin\Taxonomy\Taxonomy;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Status extends Taxonomy {
    public function __construct() {
		parent::__construct();
        $this->taxonomy         = ANIMALSHELTER_TAXONOMY_STATUS_DOG;
		$this->taxonomy_rewrite = 'status-dog';
	}

	public function initTaxonomy() {
		add_action( 'init', array( $this, 'taxonomy_register' ) );
		//add_action( 'init', array( $this, 'add_taxonomy_metaboxes' ) );
	}

	public function taxonomy_register() {
		$args           = $this->taxonomy_register_public_default_args();
		$args['labels'] = $this->get_taxonomies_status_labels();

		register_taxonomy( $this->taxonomy, array( $this->cpt_dog ), $args );
	}

	public function add_taxonomy_metaboxes() {

	}

}
