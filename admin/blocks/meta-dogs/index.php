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

/**
 * Regiters block
 *
 * @return void
 */
function animalshelter_register_blocks() {
	register_block_type_from_metadata( ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'blocks/meta-dogs' );

	register_meta(
		'post',
		'_blocks_course_post_subtitle',
		array(
			'single'            => true,
			'type'              => 'string',
			'show_in_rest'      => true,
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'animalshelter_register_blocks' );
