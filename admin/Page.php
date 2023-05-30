<?php
/**
 * The Plugin Page
 *
 * @since 1.0.0
 */

namespace Starter\Admin;

defined( 'ABSPATH' ) || exit;

class Page {

	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 */
	public static $instance;


	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 */
	public $name = 'Starter';

	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 */
	public $slug = 'starter';


	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 */

	/**
	 * Provides access to a single instance of a module using the singleton pattern.
	 *
	 * @since   1.0.0
	 *
	 * @return  object
	 */
	public static function instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {
		$this->hooks();
	}

	/**
	 * Hooks.
	 *
	 * @since 1.0.0
	 */
	private function hooks() {
		add_action( 'admin_menu', [$this, 'add_menu_page'] );
		add_action( 'admin_enqueue_scripts', [$this, 'enqueue_scripts'] );
		add_filter( 'admin_body_class', [$this, 'wp_menu'], 10, 1 );
		add_filter( 'in_admin_header', [$this, 'remove_all_notices'] );
	}

	/**
	 * collaps wp menu.
	 *
	 * @since 1.0.0
	 */
	public function remove_all_notices( $classes ) {

		global $current_screen;

		if ( strpos( $current_screen->id, $this->slug ) ) {
			remove_all_actions( 'admin_notices' );
		}
	}

	/**
	 * collaps wp menu.
	 *
	 * @since 1.0.0
	 */
	public function wp_menu( $classes ) {

		global $current_screen;

		if ( strpos( $current_screen->id, $this->slug ) ) {
			return $classes .'folded sticky-menu';
		}
	}

	/**
	 * Add plugin page.
	 *
	 * @since 1.0.0
	 */
	public function add_menu_page() {
		add_menu_page(
			__( $this->name, 'starter' ),
			__( $this->name, 'starter' ),
			'manage_options',
			$this->slug,
			[$this, 'plugin_page'],
			'dashicons-calendar-alt',
		);

		add_submenu_page(
			$this->slug,
			__( 'Dashboard', 'starter' ),
			__( 'Dashboard', 'starter' ),
			'manage_options',
			'starter-dashboard',
			[$this, 'plugin_page'],
			1
		);

		add_submenu_page(
			$this->slug,
			__( 'Analytics', 'starter' ),
			__( 'Analytics', 'starter' ),
			'manage_options',
			'starter-analytics',
			[$this, 'plugin_page'],
		);

		add_submenu_page(
			$this->slug,
			__( 'Settings', 'starter' ),
			__( 'Settings', 'starter' ),
			'manage_options',
			'starter-settings',
			[$this, 'plugin_page'],
		);
	}

	/**
	 * plugin page output.
	 *
	 * @since 1.0.0
	 */
	public function plugin_page() {
		echo '<div id="starter"></div>';
	}

	/**
	 * plugin page output.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

		global $current_screen;

		if ( strpos( $current_screen->id, $this->slug ) ) {

			$script_path       = TT_PATH . 'build/index.js';
			$script_asset_path = TT_PATH . 'build/index.asset.php';
			$script_url        = TT_URL . 'build/index.js';
			$script_asset      = file_exists( $script_asset_path )
				? require $script_asset_path
				: [
					'dependencies' => array(),
					'version' => filemtime( $script_path ),
				];

			/**
			 * Before Starter enqueue scripts.
			 *
			 * Fires before Starter scripts are enqueued.
			 *
			 * @since 1.0.0
			 */
			do_action( 'starter/before_enqueue_scripts' );

			wp_enqueue_script( 'starter-script', $script_url, $script_asset['dependencies'], $script_asset['version'], true );

			/**
			 * After Starter enqueue scripts.
			 *
			 * Fires after Starter scripts are enqueued.
			 *
			 * @since 1.0.0
			 */
			do_action( 'starter/after_enqueue_scripts' );

			wp_localize_script(
				'starter-script',
				'StarterApp',
				[
					'url'	=> esc_url_raw( rest_url() ),
					'nonce'	=> wp_create_nonce( 'wp_rest' ),
				]
			);


		}

	}


}
