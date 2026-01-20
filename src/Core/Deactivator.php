<?php

/**
 * Fired during plugin deactivation
 *
 * @since      1.0.0
 *
 * @package    AnimalShelter
 * @subpackage AnimalShelter/Core
 */

namespace AnimalShelter\Core;

use AnimalShelter\Admin\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    AnimalShelter
 * @subpackage AnimalShelter/Core
 */
class Deactivator {

	/**
	 * Run during plugin deactivation.
	 *
	 * This method performs cleanup tasks when the plugin is deactivated:
	 * - Deletes the rewrite rules flush flag
	 * - Unregisters custom post types
	 * - Flushes WordPress rewrite rules
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function deactivate(): void {
		delete_option( 'ANIMALSHELTER_flush_rewrite_rules_flag' );
		Admin::unregister_custom_post_types();
		flush_rewrite_rules();
	}

}
