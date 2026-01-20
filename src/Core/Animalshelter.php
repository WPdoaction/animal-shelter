<?php
/**
 * Core plugin class
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\Core;

use AnimalShelter\Admin\Admin;
use AnimalShelter\PublicFacing\PublicMain;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin class.
 *
 * This is the core class that bootstraps the plugin, loads dependencies,
 * defines constants, and initializes admin and public-facing functionality.
 *
 * @since 1.0.0
 * @package AnimalShelter
 * @subpackage AnimalShelter/Core
 */
final class Animalshelter {

	/**
	 * Initialize the plugin.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
	}

	/**
	 * Load the plugin.
	 *
	 * Defines content constants, registers hooks for upgrade checks and translations,
	 * and initializes admin and public components.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function load(): void {
		//Load constants
		$this->contentConstants();

		//Init environment
		add_action( 'admin_init', array( $this, 'upgrader' ) );
		add_action( 'init', array( $this, 'languages' ), 1 );

		//Load and execute
		$this->includes();
		add_action( 'init', array( $this, 'init' ), 10 );
	}

	/**
	 * Define content-related constants.
	 *
	 * Defines constants for custom post types and taxonomies used throughout the plugin.
	 * All constants are limited to 20 characters max (WordPress limitation).
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function contentConstants(): void {
		if ( ! defined( 'ANIMALSHELTER_CPT_DOG' ) ) {
			define( 'ANIMALSHELTER_CPT_DOG', 'as_dog' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_CPT_CAT' ) ) {
			define( 'ANIMALSHELTER_CPT_CAT', 'as_cat' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_TAXONOMY_BREED_CAT' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_BREED_CAT', 'as_breed_cat' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_TAXONOMY_BREED_DOG' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_BREED_DOG', 'as_breed_dog' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_TAXONOMY_STATUS_DOG' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_STATUS_DOG', 'as_status_dog' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_TAXONOMY_STATUS_CAT' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_STATUS_CAT', 'as_status_cat' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_TAXONOMY_SIZE_DOG' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_SIZE_DOG', 'as_size_dog' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_TAXONOMY_SIZE_CAT' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_SIZE_CAT', 'as_size_cat' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_TAXONOMY_COLOR_DOG' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_COLOR_DOG', 'as_color_dog' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_TAXONOMY_COLOR_CAT' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_COLOR_CAT', 'as_color_cat' ); //20 characters max.
		}

      if ( ! defined( 'ANIMALSHELTER_TAXONOMY_ENERGY_DOG' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_ENERGY_DOG', 'as_energy_dog' ); //20 characters max.
		}

		if ( ! defined( 'ANIMALSHELTER_TAXONOMY_ENERGY_CAT' ) ) {
			define( 'ANIMALSHELTER_TAXONOMY_ENERGY_CAT', 'as_energy_cat' ); //20 characters max.
		}
	}

	/**
	 * Handle plugin version upgrades.
	 *
	 * Runs on admin_init to check if plugin version has changed. If so, performs
	 * necessary upgrade tasks such as flushing rewrite rules and updating the stored version.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function upgrader(): void {
		$current_ver = get_option( 'ANIMALSHELTER_version', '0.0' );

		if ( version_compare( $current_ver, ANIMALSHELTER_VERSION, '==' ) ) {
			return;
		}

		delete_option( 'ANIMALSHELTER_flush_rewrite_rules_flag' );

		if ( $current_ver !== '0.0' ) {
			// Upgrade code
		}

		update_option( 'ANIMALSHELTER_version', ANIMALSHELTER_VERSION, true );
	}

	/**
	 * Load plugin text domain for translations.
	 *
	 * Loads the plugin's translation files from the languages directory.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function languages(): void {
		load_plugin_textdomain( 'animal-shelter', false, ANIMALSHELTER_PLUGIN_LANGUAGES_DIR );
	}

	/**
	 * Include required files (deprecated).
	 *
	 * This method is no longer needed as Composer autoloader handles class loading.
	 * Kept for backwards compatibility.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function includes(): void {
		// No longer needed - Composer autoloader handles class loading
	}

	/**
	 * Initialize admin and public components.
	 *
	 * Creates instances of Admin and PublicMain managers and calls their load methods.
	 * Runs on 'init' hook with priority 10.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init(): void {
		$animalshelter_admin = new Admin();
		$animalshelter_admin->load();

		$animalshelter_public = new PublicMain();
		$animalshelter_public->load();
	}
}
