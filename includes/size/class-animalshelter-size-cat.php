<?php

class Animalshelter_Size_Cat {
	/**
	 * @var string[]
	 */
	private array $sizes;

	public function __construct() {
		$this->sizes = array(
			'unknown' => array( 'name' => __( 'Unknown', 'animal-shelter' ) ),


			'mini' => array( 'name' => _x( 'Mini (< 3kg/6lbs)', 'Size of a dog', 'animal-shelter' ) ),
			'small' => array( 'name' => _x( 'Small (3kg/6lbs - 10kg/22lbs)', 'Size of a dog', 'animal-shelter' ) ),
			'medium' => array( 'name' => _x( 'Medium (10kg/22lbs - 25kg/55lbs)', 'Size of a dog', 'animal-shelter' ) ),
			'large' => array( 'name' => _x( 'Large (25kg/55lbs - 50kg/110lbs)', 'Size of a dog', 'animal-shelter' ) ),
			'giant' => array( 'name' => _x( 'Giant (> 50kg/110lbs)', 'Size of a dog', 'animal-shelter' ) ),


		);

	}

	public function get_select_array(): array {
		// TODO
	}

	public function get_name( $key ): string {
		// TODO
	}
}
