<?php
/**
 * Cat Breed term helper
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\PublicFacing\Term\Cat;

use AnimalShelter\PublicFacing\Term\Term;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Breed extends Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_BREED_CAT;
		parent::__construct( $id );
	}
}
