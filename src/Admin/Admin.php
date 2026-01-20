<?php
/**
 * Admin functionality
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\Admin;

use AnimalShelter\Admin\CPT\Dog as DogCPT;
use AnimalShelter\Admin\CPT\Cat as CatCPT;
use AnimalShelter\Admin\Taxonomy\Dog\Breed as DogBreed;
use AnimalShelter\Admin\Taxonomy\Cat\Breed as CatBreed;
use AnimalShelter\Admin\Taxonomy\Dog\Status as DogStatus;
use AnimalShelter\Admin\Taxonomy\Cat\Status as CatStatus;
use AnimalShelter\Admin\Taxonomy\Dog\Size as DogSize;
use AnimalShelter\Admin\Taxonomy\Cat\Size as CatSize;
use AnimalShelter\Admin\Taxonomy\Dog\Color as DogColor;
use AnimalShelter\Admin\Taxonomy\Cat\Color as CatColor;
use AnimalShelter\Admin\Taxonomy\Dog\Energy as DogEnergy;
use AnimalShelter\Admin\Taxonomy\Cat\Energy as CatEnergy;
use AnimalShelter\Admin\Menupage\AnimalShelter as AnimalShelterMenupage;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin functionality manager.
 *
 * Handles all admin-facing functionality including CPT/taxonomy registration,
 * admin pages, and rewrite rule flushing.
 *
 * @since 1.0.0
 * @package AnimalShelter
 * @subpackage AnimalShelter/Admin
 */
class Admin {
	/**
	 * Plugin prefix.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $prefix = ANIMALSHELTER_PREFIX;

	/**
	 * Unregister all custom post types.
	 *
	 * Called during plugin deactivation to clean up registered CPTs.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function unregister_custom_post_types(): void {
		unregister_post_type( ANIMALSHELTER_CPT_DOG );
		unregister_post_type( ANIMALSHELTER_CPT_CAT );
	}

	/**
	 * Load admin functionality.
	 *
	 * Initializes constants, includes, and all admin components.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function load(): void {
		$this->constants();
		$this->includes();
		$this->inits();
	}

	/**
	 * Define admin constants (reserved for future use).
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function constants(): void {

	}

	/**
	 * Include required files (deprecated).
	 *
	 * No longer needed as Composer autoloader handles class loading.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function includes(): void {
		// No longer needed - Composer autoloader handles class loading
	}

	/**
	 * Initialize admin components.
	 *
	 * Registers CPTs, taxonomies, admin pages, and schedules rewrite rule flush.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function inits(): void {
		//add_action( 'admin_enqueue_scripts', array( $this, 'register_css' ) );
		//add_action( 'admin_enqueue_scripts', array( $this, 'register_js' ) );

		$cpt_dog = new DogCPT();
		$cpt_dog->initCPT();
		$cpt_cat = new CatCPT();
		$cpt_cat->initCPT();

		$taxonomy_breed_dog = new DogBreed();
		$taxonomy_breed_dog->initTaxonomy();

		$taxonomy_breed_cat = new CatBreed();
		$taxonomy_breed_cat->initTaxonomy();

		$options_page = new AnimalShelterMenupage();
		$options_page->init();

		// Flush rewrite rules in init, after CPTs and Taxonomies are registered
		add_action( 'init', array( $this, 'flush_rewrite_rules' ), 999 );

		$taxonomy_status_dog = new DogStatus();
		$taxonomy_status_dog->initTaxonomy();

		$taxonomy_status_cat = new CatStatus();
		$taxonomy_status_cat->initTaxonomy();

		$taxonomy_size_dog = new DogSize();
		$taxonomy_size_dog->initTaxonomy();

		$taxonomy_size_cat = new CatSize();
		$taxonomy_size_cat->initTaxonomy();

		$taxonomy_color_dog = new DogColor();
		$taxonomy_color_dog->initTaxonomy();

		$taxonomy_color_cat = new CatColor();
		$taxonomy_color_cat->initTaxonomy();

    $taxonomy_energy_dog = new DogEnergy();
		$taxonomy_energy_dog->initTaxonomy();

		$taxonomy_energy_cat = new CatEnergy();
		$taxonomy_energy_cat->initTaxonomy();
	}

	/**
	 * Register and enqueue admin CSS.
	 *
	 * @since 1.0.0
	 * @param string $hook Current admin page hook.
	 * @return void
	 */
	public function register_css( $hook ): void {
		wp_register_style( $this->prefix . '-admin', plugins_url( '/css/admin.css', __FILE__ ), array(), ANIMALSHELTER_VERSION, 'all' );
		wp_enqueue_style( $this->prefix . '-admin' );
	}

	/**
	 * Register and enqueue admin JavaScript.
	 *
	 * @since 1.0.0
	 * @param string $hook Current admin page hook.
	 * @return void
	 */
	public function register_js( $hook ): void {
		wp_register_script( $this->prefix . '-admin', plugins_url( '/js/admin.js', __FILE__ ), array(), ANIMALSHELTER_VERSION, true );
		wp_enqueue_script( $this->prefix . '-admin' );
	}

	/**
	 * Flush rewrite rules if needed.
	 *
	 * Uses a flag-based approach to flush rewrite rules only once after plugin activation
	 * or upgrade, avoiding unnecessary performance impact on every page load.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function flush_rewrite_rules(): void {
		// When flag is not set, flush rewrite rules
		if ( get_option( 'ANIMALSHELTER_flush_rewrite_rules_flag' ) === false ) {
			update_option( 'ANIMALSHELTER_flush_rewrite_rules_flag', 'no', true );
			flush_rewrite_rules();
		}
	}

}
