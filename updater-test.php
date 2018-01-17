<?php

/**
 * Plugin Name:     Updater test
 * Plugin URI:      https://maitheme.com/
 * Description:     Test the update.
 *
 * Version:         0.1.0
 *
 * Author:          MaiTheme.com
 * Author URI:      https://maitheme.com
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

final class Updater_Tester {

	/**
	 * @var Updater_Tester The one true Updater_Tester
	 * @since 1.0.0
	 */
	private static $instance;

	/**
	 * Main Updater_Tester Instance.
	 *
	 * Insures that only one instance of Updater_Tester exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since   1.0.0
	 * @static  var array $instance
	 * @see     Updater_Tester()
	 * @return  object | Updater_Tester The one true Updater_Tester
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			// Setup the setup
			self::$instance = new Updater_Tester;
			// Methods
			self::$instance->includes();
			self::$instance->write();
			self::$instance->hooks();
		}
		return self::$instance;
	}

	/**
	 * Load the necessary files.
	 * Setup the updater.
	 *
	 * @uses    https://github.com/YahnisElsts/plugin-update-checker/
	 * @uses    https://github.com/afragen/wp-dependency-installer/
	 *
	 * @return  void
	 */
	function includes() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/plugin-update-checker/plugin-update-checker.php'; // v 4.4
		$updater = Puc_v4_Factory::buildUpdateChecker( 'https://github.com/maithemewp/mai-engine-installer/', __FILE__, 'mai-pro-engine' );
	}

}

/**
 * The main function for that returns Updater_Tester
 *
 * @return object|Updater_Tester The one true Updater_Tester Instance.
 */
function Updater_Tester() {
	if ( ! is_admin() ) {
		return;
	}
	return Updater_Tester::instance();
}

// Get Updater_Tester Running.
Updater_Tester();
