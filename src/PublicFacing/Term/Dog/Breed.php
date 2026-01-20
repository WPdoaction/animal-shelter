<?php
/**
 * Dog Breed term helper
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\PublicFacing\Term\Dog;

use AnimalShelter\PublicFacing\Term\Term;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Breed extends Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_BREED_DOG;
		parent::__construct( $id );
	}
}
