<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://efraim.cat
 * @since             1.0.0
 * @package           Nic_App_Login
 *
 * @wordpress-plugin
 * Plugin Name:       nic-app login
 * Plugin URI:        https://nic-app.com/nic-app-login
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Efraim Bayarri
 * Author URI:        https://efraim.cat
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nic-app-login
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NIC_APP_LOGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nic-app-login-activator.php
 */
function activate_nic_app_login() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nic-app-login-activator.php';
	Nic_App_Login_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nic-app-login-deactivator.php
 */
function deactivate_nic_app_login() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nic-app-login-deactivator.php';
	Nic_App_Login_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nic_app_login' );
register_deactivation_hook( __FILE__, 'deactivate_nic_app_login' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nic-app-login.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nic_app_login() {

	$plugin = new Nic_App_Login();
	$plugin->run();

}
run_nic_app_login();
