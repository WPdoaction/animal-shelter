<?php
/**
 * Dog Color Taxonomy
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\Admin\Taxonomy\Dog;

use AnimalShelter\Admin\Taxonomy\Taxonomy;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Color extends Taxonomy {
    public function __construct() {
		parent::__construct();
        $this->taxonomy         = ANIMALSHELTER_TAXONOMY_COLOR_DOG;
		$this->taxonomy_rewrite = 'color-dog';
	}

	public function initTaxonomy() {
		add_action( 'init', array( $this, 'taxonomy_register' ) );
		//add_action( 'init', array( $this, 'add_taxonomy_metaboxes' ) );
	}

	public function taxonomy_register() {
		$args           = $this->taxonomy_register_public_default_args();
		$args['labels'] = $this->get_taxonomies_color_labels();

		register_taxonomy( $this->taxonomy, array( $this->cpt_dog ), $args );
	}

	public function add_taxonomy_metaboxes() {

	}

}
