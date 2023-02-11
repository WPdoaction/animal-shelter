<?php

class Animalshelter_Admin {
	public string $prefix = ANIMALSHELTER_PREFIX;

	public function load() {
		$this->constants();
		$this->includes();
		$this->inits();
	}

	private function constants(): void {

	}

	private function includes(): void {
		//CPTs register, and their configuration.
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-cpt.php';
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-cpt-dog.php';
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-cpt-cat.php';

		//Commons labels register.
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-labels-breed.php';

		//Taxonomies register, and their configuration.
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-taxonomy.php';
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-taxonomy-breed-dog.php';
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-taxonomy-breed-cat.php';
	}

	private function inits(): void {
		//add_action( 'admin_enqueue_scripts', array( $this, 'register_css' ) );
		//add_action( 'admin_enqueue_scripts', array( $this, 'register_js' ) );

		$cpt_dog = new Animalshelter_Cpt_Dog();
		$cpt_dog->initCPT();
		$cpt_cat = new Animalshelter_Cpt_Cat();
		$cpt_cat->initCPT();

		$labels_breed = new Animalshelter_Labels_Breed();

		$taxonomy_breed_dog = new Animalshelter_Taxonomy_Breed_Dog( $labels_breed );
		$taxonomy_breed_dog->initTaxonomy();

		$taxonomy_breed_cat = new Animalshelter_Taxonomy_Breed_Cat( $labels_breed );
		$taxonomy_breed_cat->initTaxonomy();
	}

	public function register_css( $hook ): void {
		wp_register_style( $this->prefix . '-admin', plugins_url( '/css/admin.css', __FILE__ ), array(), ANIMALSHELTER_VERSION, 'all' );
		wp_enqueue_style( $this->prefix . '-admin' );
	}

	public function register_js( $hook ): void {
		wp_register_script( $this->prefix . '-admin', plugins_url( '/js/admin.js', __FILE__ ), array(), ANIMALSHELTER_VERSION, true );
		wp_enqueue_script( $this->prefix . '-admin' );
	}
}
