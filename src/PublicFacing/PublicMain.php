<?php
/**
 * Public-facing functionality
 *
 * @package AnimalShelter
 */

namespace AnimalShelter\PublicFacing;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Public-facing functionality manager.
 *
 * Handles all public-facing (frontend) functionality including scripts,
 * styles, and public helpers.
 *
 * @since 1.0.0
 * @package AnimalShelter
 * @subpackage AnimalShelter/PublicFacing
 */
class PublicMain {
	/**
	 * Plugin prefix.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public string $prefix = ANIMALSHELTER_PREFIX;

	/**
	 * Load public functionality.
	 *
	 * Initializes constants, includes, and all public components.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function load() {
		$this->constants();
		$this->includes();
		$this->inits();
	}

	/**
	 * Define public constants (reserved for future use).
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function constants(): void {

	}

	/**
	 * Include required files (deprecated).
	 *
	 * No longer needed as Composer autoloader handles class loading.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function includes(): void {
		// No longer needed - Composer autoloader handles class loading
	}

	/**
	 * Initialize public components.
	 *
	 * Reserved for enqueuing scripts and styles (currently commented out).
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function inits(): void {
		//add_action( 'wp_enqueue_scripts', array( $this, 'register_css' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'register_js' ) );
	}

	/**
	 * Register and enqueue public CSS.
	 *
	 * @since 1.0.0
	 * @param string $hook Current page hook.
	 * @return void
	 */
	public function register_css( $hook ): void {
		wp_register_style( $this->prefix . '-public', plugins_url( '/css/public.css', __FILE__ ), array(), ANIMALSHELTER_VERSION, 'all' );
		wp_enqueue_style( $this->prefix . '-public' );
	}

	/**
	 * Register and enqueue public JavaScript.
	 *
	 * @since 1.0.0
	 * @param string $hook Current page hook.
	 * @return void
	 */
	public function register_js( $hook ): void {
		wp_register_script( $this->prefix . '-public', plugins_url( '/js/public.js', __FILE__ ), array(), ANIMALSHELTER_VERSION, true );
		wp_enqueue_script( $this->prefix . '-public' );
	}
}
