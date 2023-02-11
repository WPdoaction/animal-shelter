<?php
/**
 * Defines the Dog CPT
 *
 * @package    WordPress
 * @author     Fran Torres <frantorres@gmail.com>
 * @copyright  2023 WordPress Granada
 * @version    1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class for Animal Shelter Dog CPT.
 */
class Animalshelter_Cpt_Dog extends Animalshelter_Cpt {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->cpt         = ANIMALSHELTER_CPT_DOG;
		$this->rewrite     = __( 'dogs', 'animal-shelter' );
		$this->label       = __( 'Dog', 'animal-shelter' );
		$this->description = __( 'Animal: Dog', 'animal-shelter' );
		$this->menu_icon   = 'dashicons-portfolio';
	}

	/**
	 * Register the CPT
	 */
	public function initCPT() {
		add_action( 'init', array( $this, 'cpt_register' ) );
		
		// Register Meta box for post type dog.
		add_action( 'add_meta_boxes', array( $this, 'metabox_dog' ) );
		add_action( 'save_post', array( $this, 'save_metaboxes_dog' ) );
	}

	/**
	 * Register the CPT
	 */
	public function cpt_register() {
		$args           = $this->cpt_register_public_default_args();
		$args['labels'] = array(
			'name'                  => _x( 'Dogs', 'Post Type General Name', 'animal-shelter' ),
			'singular_name'         => _x( 'Dog', 'Post Type Singular Name', 'animal-shelter' ),
			'menu_name'             => __( 'Dogs', 'animal-shelter' ),
			'name_admin_bar'        => __( 'Dog', 'animal-shelter' ),
			'archives'              => __( 'Dog archives', 'animal-shelter' ),
			'attributes'            => __( 'Dog attributes', 'animal-shelter' ),
			'parent_item_colon'     => __( 'Parent dog:', 'animal-shelter' ),
			'all_items'             => __( 'All dogs', 'animal-shelter' ),
			'add_new_item'          => __( 'Add new dog', 'animal-shelter' ),
			'add_new'               => __( 'Add new', 'animal-shelter' ),
			'new_item'              => __( 'New dog', 'animal-shelter' ),
			'edit_item'             => __( 'Edit dog', 'animal-shelter' ),
			'update_item'           => __( 'Update dog', 'animal-shelter' ),
			'view_item'             => __( 'View dog', 'animal-shelter' ),
			'view_items'            => __( 'View dogs', 'animal-shelter' ),
			'search_items'          => __( 'Search dog', 'animal-shelter' ),
			'not_found'             => __( 'Not found', 'animal-shelter' ),
			'not_found_in_trash'    => __( 'Not found in trash', 'animal-shelter' ),
			'insert_into_item'      => __( 'Insert into dog', 'animal-shelter' ),
			'uploaded_to_this_item' => __( 'Uploaded to this dog', 'animal-shelter' ),
			'items_list'            => __( 'Dogs list', 'animal-shelter' ),
			'items_list_navigation' => __( 'Dogs list navigation', 'animal-shelter' ),
			'filter_items_list'     => __( 'Filter dogs list', 'animal-shelter' ),
		);
		register_post_type( $this->cpt, $args );
	}

	public function add_cpt_metaboxes() {

	}
	/**
	 * Adds metabox
	 *
	 * @return void
	 */
	public function metabox_dog() {
		add_meta_box(
			'animal_shetler_dog',
			__( 'Dogs Meta', 'animal-shelter' ),
			'metabox_show_dog',
			'dog',
			'normal'
		);
	}

	/**
	 * Metabox inputs for post type.
	 *
	 * @param object $post Post object.
	 * @return void
	 */
	function metabox_show_dog( $post ) {
		?>
		<table>
			<?php echo $this->meta_input_html( 'dog_year', 'text', 'Dog Key 1' ); ?>

		</table>
		<?php
	}

	/**
	 * Save metaboxes
	 *
	 * @param int $post_id Post id.
	 * @return void
	 */
	function save_metaboxes_dog( $post_id ) {
		if ( isset( $_POST['dog_key1'] ) ) {
			update_post_meta( $post_id, 'dog_key1', $_POST['dog_key1'] );
		}
		if ( isset( $_POST['dog_key2'] ) ) {
			update_post_meta( $post_id, 'dog_key2', $_POST['dog_key2'] );
		}
		if ( isset( $_POST['dog_key3'] ) ) {
			update_post_meta( $post_id, 'dog_key3', $_POST['dog_key3'] );
		}
		if ( isset( $_POST['dog_key4'] ) ) {
			update_post_meta( $post_id, 'dog_key4', $_POST['dog_key4'] );
		}
		if ( isset( $_POST['dog_key5'] ) ) {
			update_post_meta( $post_id, 'dog_key5', $_POST['dog_key5'] );
		}
	}

}
