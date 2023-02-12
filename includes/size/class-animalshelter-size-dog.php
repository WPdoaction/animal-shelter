<?php

class Animalshelter_Size_Dog {
	/**
	 * @var string[]
	 */
	private array $sizes;

	public function __construct() {
		$this->sizes = array(
			'unknown' => array( 'name' => __( 'Unknown', 'animal-shelter' ) ),
			'mini' => array( 'name' => _x( 'Mini (< 3kg/6lbs)', 'Size of a dog', 'animal-shelter' ) ),
			'small' => array( 'name' => __( 'Small (3kg/6lbs - 10kg/22lbs)', 'Size of a dog', 'animal-shelter' ) ),
			'medium' => array( 'name' => __( 'Medium (10kg/22lbs - 25kg/55lbs)', 'Size of a dog', 'animal-shelter' ) ),
			'large' => array( 'name' => __( 'Large (25kg/55lbs - 50kg/110lbs)', 'Size of a dog', 'animal-shelter' ) ),
			'giant' => array( 'name' => __( 'Giant (> 50kg/110lbs)', 'Size of a dog', 'animal-shelter' ) ),
		);

	}

	public function get_select_array(): array {
		// TODO
	}

	public function get_name( $key ): string {
		// TODO
	}
}
