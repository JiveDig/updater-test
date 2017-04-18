<?php
/**
 * Plugin Name:     Updater test
 * Plugin URI:      https://bizbudding.com
 * Description:     Testing the GHU class
 * Version:         1.0.0
 *
 * GitHub URI:      https://github.com/JiveDig/updater-test/
 *
 * Author:          BizBudding, Mike Hemberger
 * Author URI:      https://bizbudding.com
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Updater_Test' ) ) :

/**
 * Main Updater_Test Class.
 *
 * @since 1.0.0
 */
final class Updater_Test {

    /**
     * @var Updater_Test The one true Updater_Test
     * @since 1.0.0
     */
    private static $instance;

    /**
     * Main Updater_Test Instance.
     *
     * Insures that only one instance of Updater_Test exists in memory at any one
     * time. Also prevents needing to define globals all over the place.
     *
     * @since   1.0.0
     * @static  var array $instance
     * @uses    Updater_Test::setup_constants() Setup the constants needed.
     * @uses    Updater_Test::includes() Include the required files.
     * @see     Updater_Test()
     * @return  object | Updater_Test The one true Updater_Test
     */
    public static function instance() {
        if ( ! isset( self::$instance ) ) {
            // Setup the setup
            self::$instance = new Updater_Test;
            // Methods
            self::$instance->setup_constants();
            self::$instance->includes();
        }
        return self::$instance;
    }

    /**
     * Throw error on object clone.
     *
     * The whole idea of the singleton design pattern is that there is a single
     * object therefore, we don't want the object to be cloned.
     *
     * @since   1.0.0
     * @access  protected
     * @return  void
     */
    public function __clone() {
        // Cloning instances of the class is forbidden.
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'Updater_Test' ), '1.0' );
    }

    /**
     * Disable unserializing of the class.
     *
     * @since   1.0.0
     * @access  protected
     * @return  void
     */
    public function __wakeup() {
        // Unserializing instances of the class is forbidden.
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'Updater_Test' ), '1.0' );
    }

    /**
     * Setup plugin constants.
     *
     * @access  private
     * @since   1.0.0
     * @return  void
     */
    private function setup_constants() {

        // Plugin version.
        if ( ! defined( 'UPDATER_TEST_VERSION' ) ) {
            define( 'UPDATER_TEST_VERSION', '1.0.1' );
        }

        // Plugin Folder Path.
        if ( ! defined( 'UPDATER_TEST_PLUGIN_DIR' ) ) {
            define( 'UPDATER_TEST_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
        }

        // Plugin Includes Path
        if ( ! defined( 'UPDATER_TEST_INCLUDES_DIR' ) ) {
            define( 'UPDATER_TEST_INCLUDES_DIR', UPDATER_TEST_PLUGIN_DIR . 'includes/' );
        }

        // Plugin Folder URL.
        if ( ! defined( 'UPDATER_TEST_PLUGIN_URL' ) ) {
            define( 'UPDATER_TEST_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        }

        // Plugin Root File.
        if ( ! defined( 'UPDATER_TEST_PLUGIN_FILE' ) ) {
            define( 'UPDATER_TEST_PLUGIN_FILE', __FILE__ );
        }

        // Plugin Base Name
        if ( ! defined( 'UPDATER_TEST_BASENAME' ) ) {
            define( 'UPDATER_TEST_BASENAME', dirname( plugin_basename( __FILE__ ) ) );
        }

    }

    /**
     * Include required files.
     *
     * @access  private
     * @since   1.0.0
     * @return  void
     */
    private function includes() {
        foreach ( glob( UPDATER_TEST_INCLUDES_DIR . '*.php' ) as $file ) { include $file; }
    }

}
endif; // End if class_exists check.

/**
 * The main function for that returns Updater_Test
 *
 * The main function responsible for returning the one true Updater_Test
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $plugin = Updater_Test(); ?>
 *
 * @since 1.0.0
 *
 * @return object|Updater_Test The one true Updater_Test Instance.
 */
function Updater_Test() {
    return Updater_Test::instance();
}

// Get Updater_Test Running.
Updater_Test();
