<?php
/**
 * Manager.
 *
 * @package Timetable
 */

namespace Timetable;

defined( 'ABSPATH' ) || exit;

final class Manager {

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
		$this->setup();
	}

	/**
	 * Hooks.
	 *
	 * @since 1.0.0
	 */
	private function hooks() {
		register_activation_hook( __FILE__, [$this, 'install'] );
		add_action( 'init', [ $this, 'load_plugin_textdomain'] );
	}


	/**
	 * Installation functions on activation.
	 *
	 * @since 1.0.0
	 */
	private function install() {

	}

	/**
	 * Load the cfb dependencies.
	 *
	 * @since 1.0.0
	 */
	private function setup() {
		apply_filters(
			'cfb_dependencies',
			[
				'admin_page' => Admin\Page::instance()
			]
		);

		/**
		 * Plugin loaded hook
		 */
		do_action( 'Timetable/loaded' );
	}

	/**
     * Load the localisation file.
     *
     * @since   1.0.0
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain( 'timetable', false, basename( dirname( __FILE__ ) ) . '/languages' );
    }


}
