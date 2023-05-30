<?php
/*
 * Plugin Name:       Starter
 * Plugin URI:        https://wordpress.com/plugins/starter
 * Description:       Build your custom starter with ease.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            AweCodeBox
 * Author URI:        https://profiles.wordpress.org/awecodebox/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       starter
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'TT_VERSION', '1.0.0' );
define( 'TT_PATH', plugin_dir_path( __FILE__ ) );
define( 'TT_URL', plugin_dir_url( __FILE__ ) );
define( 'TT_PREFIX', 'starter' );

require TT_PATH . 'vendor/autoload.php';

/**
 * Get an instance of the Plugin class.
 *
 * @since 1.0.0
 */
if ( class_exists( 'Starter\Manager' ) ) {

	Starter\Manager::instance();
}

/**
 * Fire installation functions by plugin activation.
 *
 * @since 1.0.0
 */
function starter_activation() {
	Starter\Manager::instance()->install();
}
register_activation_hook( __FILE__, 'starter_activation' );
