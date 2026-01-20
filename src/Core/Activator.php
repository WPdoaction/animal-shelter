<?php
/**
 * Fired during plugin activation
 *
 * @since      1.0.0
 *
 * @package    AnimalShelter
 * @subpackage AnimalShelter/Core
 */

namespace AnimalShelter\Core;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    AnimalShelter
 * @subpackage AnimalShelter/Core
 */
class Activator {

	/**
	 * Run during plugin activation.
	 *
	 * This method is called when the plugin is activated. Currently empty but reserved
	 * for future activation tasks such as creating database tables, setting default options,
	 * or scheduling cron events.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function activate(): void {
	}

}
