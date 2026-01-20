<?php
/**
 * Dog Color term helper
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\PublicFacing\Term\Dog;

use AnimalShelter\PublicFacing\Term\Term;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Color extends Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_COLOR_DOG;
		parent::__construct( $id );
	}
}
