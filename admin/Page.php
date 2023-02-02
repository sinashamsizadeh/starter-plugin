<?php
/**
 * The Plugin Page
 *
 * @since 1.0.0
 */

namespace Timetable\Admin;

defined( 'ABSPATH' ) || exit;

class Page {

	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 */
	public static $instance;

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
	}

	/**
	 * Add plugin page.
	 *
	 * @since 1.0.0
	 */
	public function add_menu_page() {
		add_menu_page(
			__( 'Timetable', 'timetable' ),
			__( 'Timetable', 'timetable' ),
			'manage_options',
			'timetable',
			[$this, 'plugin_page'],
			'dashicons-calendar-alt',
		);
	}

	/**
	 * plugin page output.
	 *
	 * @since 1.0.0
	 */
	public function plugin_page() {
		echo '<div id="timetable"></div>';
	}

	/**
	 * plugin page output.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

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
		 * Before Timetable enqueue scripts.
		 *
		 * Fires before Timetable scripts are enqueued.
		 *
		 * @since 1.0.0
		 */
		do_action( 'timetable/before_enqueue_scripts' );

		wp_enqueue_script( 'timetable-script', $script_url, $script_asset['dependencies'], $script_asset['version'], true );

		/**
		 * After Timetable enqueue scripts.
		 *
		 * Fires after Timetable scripts are enqueued.
		 *
		 * @since 1.0.0
		 */
		do_action( 'timetable/after_enqueue_scripts' );

        wp_localize_script(
            'timetable-script',
            'timeTableApp',
            [
				'url'	=> esc_url_raw( rest_url() ),
                'nonce'	=> wp_create_nonce( 'wp_rest' ),
			]
        );

	}


}
