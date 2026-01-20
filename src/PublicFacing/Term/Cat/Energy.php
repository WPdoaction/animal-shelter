<?php
/**
 * Cat Energy term helper
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\PublicFacing\Term\Cat;

use AnimalShelter\PublicFacing\Term\Term;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Energy extends Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_ENERGY_CAT;
		parent::__construct( $id );
	}
}
