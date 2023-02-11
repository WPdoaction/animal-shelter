<?php
/**
 * Loads Block
 *
 * @package    WordPress
 * @author     David Perez <david@closemarketing.es>
 * @copyright  2023 Closemarketing
 * @version    1.0
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'animalshelter_register_blocks' );
/**
 * Regiters block
 *
 * @return void
 */
function animalshelter_register_blocks() {
	register_block_type_from_metadata( ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'blocks/meta-dogs' );

	/*
	wp_register_script(
		'animal-shelter',
		ANIMALSHELTER_PLUGIN_URL . 'admin/blocks/meta-dogs/build/index.js',
		$assets_file['dependencies'],
		ANIMALSHELTER_VERSION,
		true
	);

	register_block_type(
		'animal-shelter/meta-dogs',
		array(
			'editor_script' => 'animal-shelter',
		)
	);
	*/
}
