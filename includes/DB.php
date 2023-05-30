<?php
/**
 * The Plugin Page
 *
 * @since 1.0.0
 */

namespace Timetable\Includes;

defined( 'ABSPATH' ) || exit;

class DB {
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 */
	public static $instance;

	/**
	 * Tables prefix.
	 *
	 * @since   1.0.0
	 */
	public $prefix = TT_PREFIX;

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
	 * Register the plugin table.
	 *
	 * @since   1.0.0
	 */
	public function setup_tables() {

		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();
		$prefix = $wpdb->prefix . $this->prefix . '_';

		$sql = "CREATE TABLE " . $prefix . "settings (
			setting_id bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			setting_name varchar(191) NOT NULL,
			setting_value longtext NOT NULL
		) $charset_collate;";

		$sql .= "CREATE TABLE " . $prefix . "timetables (
			timetable_id bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			timetable_name text NOT NULL,
			timetable_description text NOT NULL,
			date_time datetime NOT NULL,
			editing_with bigint(20) NOT NULL,
			timetable_data longtext NOT NULL
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}
}
