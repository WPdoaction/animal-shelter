<?php

class Animalshelter_Public {
	public string $prefix = ANIMALSHELTER_PREFIX;

	public function load() {
		$this->constants();
		$this->includes();
		$this->inits();
	}

	private function constants(): void {

	}

	private function includes(): void {
		//Posts.
		require_once ANIMALSHELTER_PLUGIN_PUBLIC_DIR . 'class-animalshelter-post.php';
		require_once ANIMALSHELTER_PLUGIN_PUBLIC_DIR . 'class-animalshelter-post-dog.php';
		require_once ANIMALSHELTER_PLUGIN_PUBLIC_DIR . 'class-animalshelter-post-cat.php';

		//Terms.
		require_once ANIMALSHELTER_PLUGIN_PUBLIC_DIR . 'class-animalshelter-term.php';
		require_once ANIMALSHELTER_PLUGIN_PUBLIC_DIR . 'class-animalshelter-term-breed.php';
	}

	private function inits(): void {
		//add_action( 'wp_enqueue_scripts', array( $this, 'register_css' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'register_js' ) );
	}

	function register_css( $hook ) {
		wp_register_style( $this->prefix . '-public', plugins_url( '/css/public.css', __FILE__ ), array(), ANIMALSHELTER_VERSION, 'all' );
		wp_enqueue_style( $this->prefix . '-public' );
	}

	function register_js( $hook ) {
		wp_register_script( $this->prefix . '-public', plugins_url( '/js/public.js', __FILE__ ), array(), ANIMALSHELTER_VERSION, true );
		wp_enqueue_script( $this->prefix . '-public' );
	}
}
