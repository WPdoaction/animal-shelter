<?php

/**
 * Fired during plugin deactivation
 *
 * @since      1.0.0
 *
 * @package    Animalshelter
 * @subpackage Animalshelter/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Animalshelter
 * @subpackage Animalshelter/includes
 */
class Animalshelter_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate(): void {
		delete_option( 'ANIMALSHELTER_flush_rewrite_rules_flag' );
		Animalshelter_Admin::unregister_custom_post_types();
		flush_rewrite_rules();
	}

}
