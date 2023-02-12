<?php

class Animalshelter_Breed_Cat {
	/**
	 * @var string[]
	 */
	private array $breeds;

	public function __construct() {
		$this->breeds = array(
			'unknown'                             => array( 'name' => __( 'Unknown', 'animal-shelter' ) ),
			'mixed'                               => array( 'name' => _x( 'Mixed', 'Breed of a cat', 'animal-shelter' ) ),
			'abyssinian'                          => array( 'name' => _x( 'Abyssinian', 'Breed of a cat', 'animal-shelter' ) ),
			'american-bobtail'                    => array( 'name' => _x( 'American Bobtail', 'Breed of a cat', 'animal-shelter' ) ),
			'american-curl'                       => array( 'name' => _x( 'American Curl', 'Breed of a cat', 'animal-shelter' ) ),
			'american-shorthair'                  => array( 'name' => _x( 'American Shorthair', 'Breed of a cat', 'animal-shelter' ) ),
			'american-wirehair'                   => array( 'name' => _x( 'American Wirehair', 'Breed of a cat', 'animal-shelter' ) ),
			'applehead-siamese'                   => array( 'name' => _x( 'Applehead Siamese', 'Breed of a cat', 'animal-shelter' ) ),
			'balinese'                            => array( 'name' => _x( 'Balinese', 'Breed of a cat', 'animal-shelter' ) ),
			'bengal'                              => array( 'name' => _x( 'Bengal', 'Breed of a cat', 'animal-shelter' ) ),
			'birman'                              => array( 'name' => _x( 'Birman', 'Breed of a cat', 'animal-shelter' ) ),
			'bombay'                              => array( 'name' => _x( 'Bombay', 'Breed of a cat', 'animal-shelter' ) ),
			'british-shorthair'                   => array( 'name' => _x( 'British Shorthair', 'Breed of a cat', 'animal-shelter' ) ),
			'burmese'                             => array( 'name' => _x( 'Burmese', 'Breed of a cat', 'animal-shelter' ) ),
			'burmilla'                            => array( 'name' => _x( 'Burmilla', 'Breed of a cat', 'animal-shelter' ) ),
			'calico'                              => array( 'name' => _x( 'Calico', 'Breed of a cat', 'animal-shelter' ) ),
			'canadian-hairless'                   => array( 'name' => _x( 'Canadian Hairless', 'Breed of a cat', 'animal-shelter' ) ),
			'chartreux'                           => array( 'name' => _x( 'Chartreux', 'Breed of a cat', 'animal-shelter' ) ),
			'chausie'                             => array( 'name' => _x( 'Chausie', 'Breed of a cat', 'animal-shelter' ) ),
			'chinchilla'                          => array( 'name' => _x( 'Chinchilla', 'Breed of a cat', 'animal-shelter' ) ),
			'cornish-rex'                         => array( 'name' => _x( 'Cornish Rex', 'Breed of a cat', 'animal-shelter' ) ),
			'cymric'                              => array( 'name' => _x( 'Cymric', 'Breed of a cat', 'animal-shelter' ) ),
			'devon-rex'                           => array( 'name' => _x( 'Devon Rex', 'Breed of a cat', 'animal-shelter' ) ),
			'dilute-calico'                       => array( 'name' => _x( 'Dilute Calico', 'Breed of a cat', 'animal-shelter' ) ),
			'dilute-tortoiseshell'                => array( 'name' => _x( 'Dilute Tortoiseshell', 'Breed of a cat', 'animal-shelter' ) ),
			'domestic-long-hair'                  => array( 'name' => _x( 'Domestic Long Hair', 'Breed of a cat', 'animal-shelter' ) ),
			'domestic-medium-hair'                => array( 'name' => _x( 'Domestic Medium Hair', 'Breed of a cat', 'animal-shelter' ) ),
			'domestic-short-hair'                 => array( 'name' => _x( 'Domestic Short Hair', 'Breed of a cat', 'animal-shelter' ) ),
			'egyptian-mau'                        => array( 'name' => _x( 'Egyptian Mau', 'Breed of a cat', 'animal-shelter' ) ),
			'exotic-shorthair'                    => array( 'name' => _x( 'Exotic Shorthair', 'Breed of a cat', 'animal-shelter' ) ),
			'extra-toes-cat-hemingway-polydactyl' => array( 'name' => _x( 'Extra-Toes Cat - Hemingway Polydactyl', 'Breed of a cat', 'animal-shelter' ) ),
			'havana'                              => array( 'name' => _x( 'Havana', 'Breed of a cat', 'animal-shelter' ) ),
			'himalayan'                           => array( 'name' => _x( 'Himalayan', 'Breed of a cat', 'animal-shelter' ) ),
			'japanese-bobtail'                    => array( 'name' => _x( 'Japanese Bobtail', 'Breed of a cat', 'animal-shelter' ) ),
			'javanese'                            => array( 'name' => _x( 'Javanese', 'Breed of a cat', 'animal-shelter' ) ),
			'korat'                               => array( 'name' => _x( 'Korat', 'Breed of a cat', 'animal-shelter' ) ),
			'laperm'                              => array( 'name' => _x( 'LaPerm', 'Breed of a cat', 'animal-shelter' ) ),
			'maine-coon'                          => array( 'name' => _x( 'Maine Coon', 'Breed of a cat', 'animal-shelter' ) ),
			'manx'                                => array( 'name' => _x( 'Manx', 'Breed of a cat', 'animal-shelter' ) ),
			'munchkin'                            => array( 'name' => _x( 'Munchkin', 'Breed of a cat', 'animal-shelter' ) ),
			'nebelung'                            => array( 'name' => _x( 'Nebelung', 'Breed of a cat', 'animal-shelter' ) ),
			'norwegian-forest-cat'                => array( 'name' => _x( 'Norwegian Forest Cat', 'Breed of a cat', 'animal-shelter' ) ),
			'ocicat'                              => array( 'name' => _x( 'Ocicat', 'Breed of a cat', 'animal-shelter' ) ),
			'oriental-long-hair'                  => array( 'name' => _x( 'Oriental Long Hair', 'Breed of a cat', 'animal-shelter' ) ),
			'oriental-short-hair'                 => array( 'name' => _x( 'Oriental Short Hair', 'Breed of a cat', 'animal-shelter' ) ),
			'oriental-tabby'                      => array( 'name' => _x( 'Oriental Tabby', 'Breed of a cat', 'animal-shelter' ) ),
			'persian'                             => array( 'name' => _x( 'Persian', 'Breed of a cat', 'animal-shelter' ) ),
			'pixiebob'                            => array( 'name' => _x( 'Pixiebob', 'Breed of a cat', 'animal-shelter' ) ),
			'ragamuffin'                          => array( 'name' => _x( 'Ragamuffin', 'Breed of a cat', 'animal-shelter' ) ),
			'ragdoll'                             => array( 'name' => _x( 'Ragdoll', 'Breed of a cat', 'animal-shelter' ) ),
			'russian-blue'                        => array( 'name' => _x( 'Russian Blue', 'Breed of a cat', 'animal-shelter' ) ),
			'scottish-fold'                       => array( 'name' => _x( 'Scottish Fold', 'Breed of a cat', 'animal-shelter' ) ),
			'selkirk-rex'                         => array( 'name' => _x( 'Selkirk Rex', 'Breed of a cat', 'animal-shelter' ) ),
			'siamese'                             => array( 'name' => _x( 'Siamese', 'Breed of a cat', 'animal-shelter' ) ),
			'siberian'                            => array( 'name' => _x( 'Siberian', 'Breed of a cat', 'animal-shelter' ) ),
			'silver'                              => array( 'name' => _x( 'Silver', 'Breed of a cat', 'animal-shelter' ) ),
			'singapura'                           => array( 'name' => _x( 'Singapura', 'Breed of a cat', 'animal-shelter' ) ),
			'snowshoe'                            => array( 'name' => _x( 'Snowshoe', 'Breed of a cat', 'animal-shelter' ) ),
			'somali'                              => array( 'name' => _x( 'Somali', 'Breed of a cat', 'animal-shelter' ) ),
			'sphynx---hairless-cat'               => array( 'name' => _x( 'Sphynx - Hairless Cat', 'Breed of a cat', 'animal-shelter' ) ),
			'tabby'                               => array( 'name' => _x( 'Tabby', 'Breed of a cat', 'animal-shelter' ) ),
			'tiger'                               => array( 'name' => _x( 'Tiger', 'Breed of a cat', 'animal-shelter' ) ),
			'tonkinese'                           => array( 'name' => _x( 'Tonkinese', 'Breed of a cat', 'animal-shelter' ) ),
			'torbie'                              => array( 'name' => _x( 'Torbie', 'Breed of a cat', 'animal-shelter' ) ),
			'tortoiseshell'                       => array( 'name' => _x( 'Tortoiseshell', 'Breed of a cat', 'animal-shelter' ) ),
			'turkish-angora'                      => array( 'name' => _x( 'Turkish Angora', 'Breed of a cat', 'animal-shelter' ) ),
			'turkish-van'                         => array( 'name' => _x( 'Turkish Van', 'Breed of a cat', 'animal-shelter' ) ),
			'tuxedo'                              => array( 'name' => _x( 'Tuxedo', 'Breed of a cat', 'animal-shelter' ) ),
			'york-chocolate'                      => array( 'name' => _x( 'York Chocolate', 'Breed of a cat', 'animal-shelter' ) ),
		);

	}

	public function get_select_array(): array {
		// TODO
	}

	public function get_name( $key ): string {
		// TODO
	}
}
