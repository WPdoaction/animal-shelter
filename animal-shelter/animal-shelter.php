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

defined( 'ABSPATH' ) or die( 'Bye bye!' );

/**
 * Loads plugin text domain for translation.
 *
 * @since 1.0.0
 */
function wpvul_plugin_init() {
	load_plugin_textdomain( 'animal-shelter', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Include CPT for dogs.
 *
 * @since 1.0.0
 */
require_once( plugin_dir_path( __FILE__ ) . '/custom-post-type/dog.php' );

/**
 * Include CPT for cats.
 *
 * @since 1.0.0
 */
require_once( plugin_dir_path( __FILE__ ) . '/custom-post-type/cat.php' );
