<?php

class Animalshelter_Admin {
	public string $prefix = ANIMALSHELTER_PREFIX;

	public static function unregister_custom_post_types(): void {
		unregister_post_type( ANIMALSHELTER_CPT_DOG );
		unregister_post_type( ANIMALSHELTER_CPT_CAT );
	}

	public function load(): void {
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

		//Taxonomies register, and their configuration.
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-taxonomy.php';
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-taxonomy-breed-dog.php';
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-taxonomy-breed-cat.php';
    require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-taxonomy-status-dog.php';
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-taxonomy-status-cat.php';

		// Custom options page on backend
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-menupage.php';
		require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-menupage-animalshelter.php';
	}

	private function inits(): void {
		//add_action( 'admin_enqueue_scripts', array( $this, 'register_css' ) );
		//add_action( 'admin_enqueue_scripts', array( $this, 'register_js' ) );

		$cpt_dog = new Animalshelter_Cpt_Dog();
		$cpt_dog->initCPT();
		$cpt_cat = new Animalshelter_Cpt_Cat();
		$cpt_cat->initCPT();

		$taxonomy_breed_dog = new Animalshelter_Taxonomy_Breed_Dog();
		$taxonomy_breed_dog->initTaxonomy();

		$taxonomy_breed_cat = new Animalshelter_Taxonomy_Breed_Cat();
		$taxonomy_breed_cat->initTaxonomy();

		$options_page = new Animalshelter_Menupage_Animalshelter();
		$options_page->init();

		// Flush rewrite rules in init, after CPTs and Taxonomies are registered
		add_action( 'init', array( $this, 'flush_rewrite_rules' ), 999 );
		
		$taxonomy_status_dog = new Animalshelter_Taxonomy_Status_Dog();
		$taxonomy_status_dog->initTaxonomy();

		$taxonomy_status_cat = new Animalshelter_Taxonomy_Status_Cat();
		$taxonomy_status_cat->initTaxonomy();
	}

	public function register_css( $hook ): void {
		wp_register_style( $this->prefix . '-admin', plugins_url( '/css/admin.css', __FILE__ ), array(), ANIMALSHELTER_VERSION, 'all' );
		wp_enqueue_style( $this->prefix . '-admin' );
	}

	public function register_js( $hook ): void {
		wp_register_script( $this->prefix . '-admin', plugins_url( '/js/admin.js', __FILE__ ), array(), ANIMALSHELTER_VERSION, true );
		wp_enqueue_script( $this->prefix . '-admin' );
	}

	public function flush_rewrite_rules(): void {
		// When flag is not set, flush rewrite rules
		if ( get_option( 'ANIMALSHELTER_flush_rewrite_rules_flag' ) === false ) {
			update_option( 'ANIMALSHELTER_flush_rewrite_rules_flag', 'no', true );
			flush_rewrite_rules();
		}
	}

}
