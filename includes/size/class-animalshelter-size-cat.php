<?php

class Animalshelter_Size_Cat {
	/**
	 * @var string[]
	 */
	private array $sizes;

	public function __construct() {
		$this->sizes = array(
			'unknown' => array( 'name' => __( 'Unknown', 'animal-shelter' ) ),
			'small' => array( 'name' => _x( 'Small (< 2kg/5lbs)', 'Size of a cat', 'animal-shelter' ) ),
			'medium' => array( 'name' => _x( 'Medium (2kg/5lbs - 4kg/8lbs)', 'Size of a cat', 'animal-shelter' ) ),
			'large' => array( 'name' => _x( 'Large (> 4kg/8lbs)', 'Size of a cat', 'animal-shelter' ) ),
		);

	}

	public function get_select_array(): array {
		// TODO
	}

	public function get_name( $key ): string {
		// TODO
	}
}
