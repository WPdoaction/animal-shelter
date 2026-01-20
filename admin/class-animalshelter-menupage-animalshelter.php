<?php
/**
 * Animal Shelter settings page
 *
 * @package AnimalShelter
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Animalshelter_Menupage_Animalshelter extends Animalshelter_Menupage {

	public function __construct() {
		$this->available_tabs = array(
			'animals' => __( 'Animals', 'animal-shelter' ),
			'breeds'  => __( 'Breeds', 'animal-shelter' ),
		);
		$this->default_tab    = 'animals';
		$this->page           = 'animalshelter';
		parent::__construct();
	}

	public function register_sub_menu() {
		add_menu_page(
			__( 'Animal shelter', 'animal-shelter' ),
			__( 'Animal shelter', 'animal-shelter' ),
			'manage_options',
			$this->page,
			array(
				$this,
				'body',
			),
		);
	}

	public function body() {
		if ( $this->is_saving_data() && $this->get_page === $this->page ) {
			$this->save();
		}

		echo '<div class="wrap animalshelter-settings">';
			$this->heading();
			$this->tabs();
			echo '<form action="" method="post" class="validate" enctype="multipart/form-data">';
				echo '<input type="hidden" name="' . esc_attr( $this->page ) . '" value="' . esc_attr( $this->page ) . '"/>';
				$this->content();
			echo '</form>';
		echo '</div>';
	}

	public function heading() {
		echo '<h2>' . esc_html__( 'Animal shelter', 'animal-shelter' ) . '</h2>';
	}

	public function content() {
		if ( 'animals' === $this->tab ) {
			$this->show_title( __( 'Animals', 'animal-shelter' ) );
			$this->show_description( __( 'Select which animals you will see in the admin panel.', 'animal-shelter' ) );
			$this->table_start();
			// TODO
			// Input
			$this->table_end();
			$this->nonce();
			submit_button();

		} elseif ( 'breeds' === $this->tab ) {
			$this->show_title( __( 'Breeds', 'animal-shelter' ) );
			$this->show_description( __( 'Load default breeds.', 'animal-shelter' ) );
			$this->table_start();
			// TODO
			// Input
			$this->table_end();
			$this->nonce();
			submit_button();
		}
	}

	public function save(): void {
		// Verify user has permission to save settings.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die(
				esc_html__( 'You do not have permission to perform this action.', 'animal-shelter' ),
				esc_html__( 'Permission Denied', 'animal-shelter' ),
				array( 'response' => 403 )
			);
		}

		if ( 'animals' === $this->tab ) {
			// TODO: Implement saving logic.
			// Remember to sanitize all inputs with appropriate functions:
			// - sanitize_text_field() for text
			// - sanitize_email() for emails
			// - absint() for positive integers
			// - sanitize_key() for option keys
		} elseif ( 'breeds' === $this->tab ) {
			// TODO: Implement saving logic.
			// Remember to sanitize all inputs.
		}
	}

}
