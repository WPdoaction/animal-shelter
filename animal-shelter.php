<?php
/**
 * Plugin Name: Animal Shelter
 * Plugin URI: https://github.com/WPdoaction/animal-shelter/
 * Description: Animal Shelter plugin for WordPress
 * Version: 1.0.0
 * Requires at least: 6.6
 * Requires PHP: 7.4
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

// Load Composer autoloader
if ( file_exists( ANIMALSHELTER_PLUGIN_DIR . 'vendor/autoload.php' ) ) {
	require_once ANIMALSHELTER_PLUGIN_DIR . 'vendor/autoload.php';
} else {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>';
		echo esc_html__( 'Animal Shelter: Run "composer install" to generate autoloader.', 'animal-shelter' );
		echo '</p></div>';
	} );
	return;
}

// Initialize plugin
$animalshelter = new \AnimalShelter\Core\Animalshelter();
$animalshelter->load();

/**
 * The code that runs during plugin activation.
 */
function animalshelter_activate(): void {
	\AnimalShelter\Core\Activator::activate();
}

register_activation_hook( __FILE__, 'animalshelter_activate' );

/**
 * The code that runs during plugin deactivation.
 */
function animalshelter_deactivate() {
	\AnimalShelter\Core\Deactivator::deactivate();
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
