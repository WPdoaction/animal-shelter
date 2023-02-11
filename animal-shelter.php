<?php
/**
 * Plugin Name: Animal Shelter
 * Plugin URI: https://github.com/WPdoaction/animal-shelter/
 * Description: Animal Shelter plugin for WordPress
 * Version: 1.0.0
 * Requires at least: 6.1
 * Tested: 6.1
 * Requires PHP: 7.4
 * Tested PHP: 8.1
 * Author: WordPress Granada Community
 * Author URI: https://wpgranada.es/
 * License: EUPL 1.2
 * License URI: https://eupl.eu/1.2/en/
 * Text Domain: animal-shelter
 *
 * @package AnimalShelter
 * @since 1.0.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
if ( ! defined( 'ANIMALSHELTER_VERSION' ) ) {
	define( 'ANIMALSHELTER_VERSION', '1.0.0' );
}
animalshelter_constants();

if ( ! class_exists( 'Animalshelter' ) ) {
	final class Animalshelter {

		public function __construct() {
		}

		public function load(): void {
			//Load constants
			$this->contentConstants();

			//Init environment
			add_action( 'admin_init', array( $this, 'upgrader' ) );
			add_action( 'plugins_loaded', array( $this, 'languages' ) );

			//Load and execute
			$this->includes();
			add_action( 'plugins_loaded', array( $this, 'init' ) );
		}

		public function contentConstants(): void {
			if ( ! defined( 'ANIMALSHELTER_CPT_DOG' ) ) {
				define( 'ANIMALSHELTER_CPT_DOG', 'as_dog' ); //20 characters max.
			}

			if ( ! defined( 'ANIMALSHELTER_CPT_CAT' ) ) {
				define( 'ANIMALSHELTER_CPT_CAT', 'as_cat' ); //20 characters max.
			}

			if ( ! defined( 'ANIMALSHELTER_TAXONOMY_BREED_CAT' ) ) {
				define( 'ANIMALSHELTER_TAXONOMY_BREED_CAT', 'as_cat_breed' ); //20 characters max.
			}

			if ( ! defined( 'ANIMALSHELTER_TAXONOMY_BREED_DOG' ) ) {
				define( 'ANIMALSHELTER_TAXONOMY_BREED_DOG', 'as_dog_breed' ); //20 characters max.
			}
		}

		public function upgrader(): void {
			$current_ver = get_option( 'ANIMALSHELTER_version', '0.0' );

			if ( version_compare( $current_ver, ANIMALSHELTER_VERSION, '==' ) ) {
				return;
			}

			if ( $current_ver !== '0.0' ) {
				// Upgrade code
			}

			update_option( 'ANIMALSHELTER_version', ANIMALSHELTER_VERSION, true );
		}

		public function languages(): void {
			load_plugin_textdomain( 'animal-shelter', false, ANIMALSHELTER_PLUGIN_LANGUAGES_DIR );
		}

		private function includes(): void {
			require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-admin.php';
			require_once ANIMALSHELTER_PLUGIN_PUBLIC_DIR . 'class-animalshelter-public.php';
		}

		public function init(): void {
			$animalshelter_admin = new Animalshelter_Admin();
			$animalshelter_admin->load();

			$animalshelter_public = new Animalshelter_Public();
			$animalshelter_public->load();
		}
	}

	$animalshelter = new Animalshelter();
	$animalshelter->load();
}

/**
 * The code that runs during plugin activation.
 */
function animalshelter_activate(): void {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-animalshelter-activator.php';
	Animalshelter_Activator::activate();
}
register_activation_hook( __FILE__, 'animalshelter_activate' );

/**
 * The code that runs during plugin deactivation.
 */
function animalshelter_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-animalshelter-deactivator.php';
	Animalshelter_Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'animalshelter_deactivate' );

/**
 * Defines constants for use throughout the plugin.
 *
 * @return void
 */
function animalshelter_constants(): void {
	// Plugin prefix.
	if ( ! defined( 'ANIMALSHELTER_PREFIX' ) ) {
		define( 'ANIMALSHELTER_PREFIX', 'animalshelter' );
	}

	// Plugin Folder Path.
	if ( ! defined( 'ANIMALSHELTER_PLUGIN_DIR' ) ) {
		define( 'ANIMALSHELTER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
	}

	// Plugin Admin Path.
	if ( ! defined( 'ANIMALSHELTER_PLUGIN_ADMIN_DIR' ) ) {
		define( 'ANIMALSHELTER_PLUGIN_ADMIN_DIR', ANIMALSHELTER_PLUGIN_DIR . 'admin/' );
	}

	// Plugin Public Path.
	if ( ! defined( 'ANIMALSHELTER_PLUGIN_PUBLIC_DIR' ) ) {
		define( 'ANIMALSHELTER_PLUGIN_PUBLIC_DIR', ANIMALSHELTER_PLUGIN_DIR . 'public/' );
	}

	// Plugin Includes Path.
	if ( ! defined( 'ANIMALSHELTER_PLUGIN_INCLUDES_DIR' ) ) {
		define( 'ANIMALSHELTER_PLUGIN_INCLUDES_DIR', ANIMALSHELTER_PLUGIN_DIR . 'includes/' );
	}

	// Plugin Languages Path.
	if ( ! defined( 'ANIMALSHELTER_PLUGIN_LANGUAGES_DIR' ) ) {
		define( 'ANIMALSHELTER_PLUGIN_LANGUAGES_DIR', ANIMALSHELTER_PLUGIN_DIR . 'languages/' );
	}

	// Plugin Folder URL.
	if ( ! defined( 'ANIMALSHELTER_PLUGIN_URL' ) ) {
		define( 'ANIMALSHELTER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
	}

	// Plugin Admin URL.
	if ( ! defined( 'ANIMALSHELTER_PLUGIN_ADMIN_URL' ) ) {
		define( 'ANIMALSHELTER_PLUGIN_ADMIN_URL', ANIMALSHELTER_PLUGIN_URL . 'admin/' );
	}

	// Plugin Public URL.
	if ( ! defined( 'ANIMALSHELTER_PLUGIN_PUBLIC_URL' ) ) {
		define( 'ANIMALSHELTER_PLUGIN_PUBLIC_URL', ANIMALSHELTER_PLUGIN_URL . 'public/' );
	}

	// Plugin Root File.
	if ( ! defined( 'ANIMALSHELTER_PLUGIN_FILE' ) ) {
		define( 'ANIMALSHELTER_PLUGIN_FILE', __FILE__ );
	}
}
