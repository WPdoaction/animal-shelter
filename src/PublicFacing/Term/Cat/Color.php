<?php
/**
 * Cat Color term helper
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\PublicFacing\Term\Cat;

use AnimalShelter\PublicFacing\Term\Term;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Color extends Term {
	public function __construct( $id = 0 ) {
		$this->taxonomy = ANIMALSHELTER_TAXONOMY_COLOR_CAT;
		parent::__construct( $id );
	}
}
