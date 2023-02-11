<?php

class Animalshelter_Breed_Cat {
	/**
	 * @var string[]
	 */
	private array $breeds;

	public function __construct() {
		$this->breeds = array(
			'unknown'                             => array( 'name' => __( 'Unknow', 'animal-shelter' ) ),
			'mixed'                               => array( 'name' => __( 'Mixed', 'animal-shelter' ) ),
			'abyssinian'                          => array( 'name' => __( 'Abyssinian', 'animal-shelter' ) ),
			'american-bobtail'                    => array( 'name' => __( 'American Bobtail', 'animal-shelter' ) ),
			'american-curl'                       => array( 'name' => __( 'American Curl', 'animal-shelter' ) ),
			'american-shorthair'                  => array( 'name' => __( 'American Shorthair', 'animal-shelter' ) ),
			'american-wirehair'                   => array( 'name' => __( 'American Wirehair', 'animal-shelter' ) ),
			'applehead-siamese'                   => array( 'name' => __( 'Applehead Siamese', 'animal-shelter' ) ),
			'balinese'                            => array( 'name' => __( 'Balinese', 'animal-shelter' ) ),
			'bengal'                              => array( 'name' => __( 'Bengal', 'animal-shelter' ) ),
			'birman'                              => array( 'name' => __( 'Birman', 'animal-shelter' ) ),
			'bombay'                              => array( 'name' => __( 'Bombay', 'animal-shelter' ) ),
			'british-shorthair'                   => array( 'name' => __( 'British Shorthair', 'animal-shelter' ) ),
			'burmese'                             => array( 'name' => __( 'Burmese', 'animal-shelter' ) ),
			'burmilla'                            => array( 'name' => __( 'Burmilla', 'animal-shelter' ) ),
			'calico'                              => array( 'name' => __( 'Calico', 'animal-shelter' ) ),
			'canadian-hairless'                   => array( 'name' => __( 'Canadian Hairless', 'animal-shelter' ) ),
			'chartreux'                           => array( 'name' => __( 'Chartreux', 'animal-shelter' ) ),
			'chausie'                             => array( 'name' => __( 'Chausie', 'animal-shelter' ) ),
			'chinchilla'                          => array( 'name' => __( 'Chinchilla', 'animal-shelter' ) ),
			'cornish-rex'                         => array( 'name' => __( 'Cornish Rex', 'animal-shelter' ) ),
			'cymric'                              => array( 'name' => __( 'Cymric', 'animal-shelter' ) ),
			'devon-rex'                           => array( 'name' => __( 'Devon Rex', 'animal-shelter' ) ),
			'dilute-calico'                       => array( 'name' => __( 'Dilute Calico', 'animal-shelter' ) ),
			'dilute-tortoiseshell'                => array( 'name' => __( 'Dilute Tortoiseshell', 'animal-shelter' ) ),
			'domestic-long-hair'                  => array( 'name' => __( 'Domestic Long Hair', 'animal-shelter' ) ),
			'domestic-medium-hair'                => array( 'name' => __( 'Domestic Medium Hair', 'animal-shelter' ) ),
			'domestic-short-hair'                 => array( 'name' => __( 'Domestic Short Hair', 'animal-shelter' ) ),
			'egyptian-mau'                        => array( 'name' => __( 'Egyptian Mau', 'animal-shelter' ) ),
			'exotic-shorthair'                    => array( 'name' => __( 'Exotic Shorthair', 'animal-shelter' ) ),
			'extra-toes-cat-hemingway-polydactyl' => array( 'name' => __( 'Extra-Toes Cat - Hemingway Polydactyl', 'animal-shelter' ) ),
			'havana'                              => array( 'name' => __( 'Havana', 'animal-shelter' ) ),
			'himalayan'                           => array( 'name' => __( 'Himalayan', 'animal-shelter' ) ),
			'japanese-bobtail'                    => array( 'name' => __( 'Japanese Bobtail', 'animal-shelter' ) ),
			'javanese'                            => array( 'name' => __( 'Javanese', 'animal-shelter' ) ),
			'korat'                               => array( 'name' => __( 'Korat', 'animal-shelter' ) ),
			'laperm'                              => array( 'name' => __( 'LaPerm', 'animal-shelter' ) ),
			'maine-coon'                          => array( 'name' => __( 'Maine Coon', 'animal-shelter' ) ),
			'manx'                                => array( 'name' => __( 'Manx', 'animal-shelter' ) ),
			'munchkin'                            => array( 'name' => __( 'Munchkin', 'animal-shelter' ) ),
			'nebelung'                            => array( 'name' => __( 'Nebelung', 'animal-shelter' ) ),
			'norwegian-forest-cat'                => array( 'name' => __( 'Norwegian Forest Cat', 'animal-shelter' ) ),
			'ocicat'                              => array( 'name' => __( 'Ocicat', 'animal-shelter' ) ),
			'oriental-long-hair'                  => array( 'name' => __( 'Oriental Long Hair', 'animal-shelter' ) ),
			'oriental-short-hair'                 => array( 'name' => __( 'Oriental Short Hair', 'animal-shelter' ) ),
			'oriental-tabby'                      => array( 'name' => __( 'Oriental Tabby', 'animal-shelter' ) ),
			'persian'                             => array( 'name' => __( 'Persian', 'animal-shelter' ) ),
			'pixiebob'                            => array( 'name' => __( 'Pixiebob', 'animal-shelter' ) ),
			'ragamuffin'                          => array( 'name' => __( 'Ragamuffin', 'animal-shelter' ) ),
			'ragdoll'                             => array( 'name' => __( 'Ragdoll', 'animal-shelter' ) ),
			'russian-blue'                        => array( 'name' => __( 'Russian Blue', 'animal-shelter' ) ),
			'scottish-fold'                       => array( 'name' => __( 'Scottish Fold', 'animal-shelter' ) ),
			'selkirk-rex'                         => array( 'name' => __( 'Selkirk Rex', 'animal-shelter' ) ),
			'siamese'                             => array( 'name' => __( 'Siamese', 'animal-shelter' ) ),
			'siberian'                            => array( 'name' => __( 'Siberian', 'animal-shelter' ) ),
			'silver'                              => array( 'name' => __( 'Silver', 'animal-shelter' ) ),
			'singapura'                           => array( 'name' => __( 'Singapura', 'animal-shelter' ) ),
			'snowshoe'                            => array( 'name' => __( 'Snowshoe', 'animal-shelter' ) ),
			'somali'                              => array( 'name' => __( 'Somali', 'animal-shelter' ) ),
			'sphynx---hairless-cat'               => array( 'name' => __( 'Sphynx - Hairless Cat', 'animal-shelter' ) ),
			'tabby'                               => array( 'name' => __( 'Tabby', 'animal-shelter' ) ),
			'tiger'                               => array( 'name' => __( 'Tiger', 'animal-shelter' ) ),
			'tonkinese'                           => array( 'name' => __( 'Tonkinese', 'animal-shelter' ) ),
			'torbie'                              => array( 'name' => __( 'Torbie', 'animal-shelter' ) ),
			'tortoiseshell'                       => array( 'name' => __( 'Tortoiseshell', 'animal-shelter' ) ),
			'turkish-angora'                      => array( 'name' => __( 'Turkish Angora', 'animal-shelter' ) ),
			'turkish-van'                         => array( 'name' => __( 'Turkish Van', 'animal-shelter' ) ),
			'tuxedo'                              => array( 'name' => __( 'Tuxedo', 'animal-shelter' ) ),
			'york-chocolate'                      => array( 'name' => __( 'York Chocolate', 'animal-shelter' ) ),
		);

	}

	public function get_select_array(): array {
		// TODO
	}

	public function get_name( $key ): string {
		// TODO
	}
}
