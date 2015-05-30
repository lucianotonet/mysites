<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://lucianotonet.com
 * @since             1.0.0
 * @package           Mysites
 *
 * @wordpress-plugin
 * Plugin Name:       MySites
 * Plugin URI:        https://github.com/tonetlds/mysites
 * Description:       WordPress plugin. List all sites that current user is user and this plugin is installed.
 * Version:           1.0.0
 * Author:            Luciano Tonet
 * Author URI:        http://lucianotonet.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mysites
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mysites-activator.php
 */
function activate_mysites() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mysites-activator.php';
	Mysites_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mysites-deactivator.php
 */
function deactivate_mysites() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mysites-deactivator.php';
	Mysites_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mysites' );
register_deactivation_hook( __FILE__, 'deactivate_mysites' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mysites.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mysites() {

	$plugin = new Mysites();
	$plugin->run();

}
run_mysites();
