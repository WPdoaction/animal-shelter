<?php

class Animalshelter_Menupage {
	public string $class_prefix = ANIMALSHELTER_PREFIX;
	public string $page         = 'animalshelter_options';
	public string $tab;
	public array $available_tabs = array();
	public string $default_tab   = 'main';
	public string $get_page;

	public function __construct() {
		// Security: GET is being verified against local variables.
		// phpcs:ignore WordPress.Security.NonceVerification
		if ( ! empty( $_GET['page'] ) && $this->page === $_GET['page'] ) {
			$this->get_page = $this->page;
		}

		// phpcs:ignore WordPress.Security.NonceVerification
		if ( ! empty( $_GET['tab'] ) && ! empty( $this->available_tabs ) && array_key_exists( esc_attr( $_GET['tab'] ), $this->available_tabs ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification
			$this->tab = esc_attr( $_GET['tab'] );
		} else {
			$this->tab = $this->default_tab;
		}
	}

	public function init(): void {
		add_action( 'admin_menu', array( $this, 'register_sub_menu' ) );
		//add_action( 'admin_enqueue_scripts', array( $this, 'register_css' ) );
		//add_action( 'admin_enqueue_scripts', array( $this, 'register_js' ) );
	}

	public function register_js( $hook ): void {
		wp_register_script( $this->class_prefix . '-menupage', plugins_url( '/js/options.js', __FILE__ ), array(), ANIMALSHELTER_VERSION, true );
		wp_enqueue_script( $this->class_prefix . '-menupage' );
	}

	public function register_css( $hook ): void {
		wp_register_style( $this->class_prefix . '-menupage', plugins_url( '/css/options.css', __FILE__ ), array(), ANIMALSHELTER_VERSION, 'all' );
		wp_enqueue_style( $this->class_prefix . '-menupage' );
	}

	public function show_title( $title ): void {
		?>
		<h3><?php echo esc_html( $title ); ?></h3>
		<?php
	}

	public function show_description( $description ): void {
		?>
		<p><?php echo esc_html( $description ); ?></p>
		<?php
	}

	public function table_start(): void {
		?>
		<table class="form-table"><tbody>
		<?php
	}

	public function table_end(): void {
		?>
		</tbody></table>
		<?php
	}

	public function nonce(): void {
		wp_nonce_field( $this->page, $this->page, false );
	}

	public function is_saving_data(): bool {
		if ( ! empty( $this->get_page ) &&
			 isset( $_POST[ $this->page ] ) &&
			 wp_verify_nonce( $_POST[ $this->page ], $this->page )
		) {
			return true;
		}

		return false;
	}

	public function tabs(): void {
		$prefix = admin_url( 'admin.php' );

		if ( ! empty( $this->available_tabs ) ) {
			foreach ( $this->available_tabs as $key => $tab ) {
				if ( $this->tab === $key ) {
					$active_class = 'nav-tab-active';
				} else {
					$active_class = '';
				}
				$uri       = $prefix . '?page=' . $this->page . '&tab=' . $key;
				$navtabs[] = '<a id="' . esc_attr( $key ) . '-tab" class="nav-tab ' . esc_attr( $active_class ) . '" title="' . esc_attr( $tab ) . '" href="' . esc_attr( $uri ) . '">' . esc_html( $tab ) . '</a>';
			}
		}

		if ( count( $navtabs ) > 1 ) {
			?>
			<h2 class="nav-tab-wrapper">
			<?php
			echo wp_kses(
				implode( $navtabs ),
				array(
					'a' => array(
						'id'    => true,
						'class' => true,
						'title' => true,
						'href'  => true,
					),
				)
			);
			?>
			</h2>
			<?php
		}
	}
}
