<?php
/*
Plugin Name: Animal Shelter
Plugin URI: https://wordpress.org/plugins/animal-shelter/
Description: Animal Shelter plugin
Version: 1.0.0
Requires at least: 6.1
Tested: 6.1
Requires PHP: 7.4
Tested PHP: 8.1
Author: WordPress Granada Community
Author URI: https://wpgranada.es/
License: EUPL 1.2
License URI: https://eupl.eu/1.2/en/
Text Domain: animal-shelter
*/
defined( 'ABSPATH' ) or die( 'Bye bye!' );

function wpvul_plugin_init() {
	load_plugin_textdomain( 'animal-shelter', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

require_once( plugin_dir_path( __FILE__ ) . '/custom-post-type/dog.php' );
require_once( plugin_dir_path( __FILE__ ) . '/custom-post-type/cat.php' );
