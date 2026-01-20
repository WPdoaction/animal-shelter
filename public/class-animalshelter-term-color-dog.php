<?php
/**
 * Dog Color term helper
 *
 * @package AnimalShelter
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Animalshelter_Term_Color_Dog extends Animalshelter_Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_COLOR_DOG;
		parent::__construct( $id );
	}
}
