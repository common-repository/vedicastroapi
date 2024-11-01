<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sohamsolution.com
 * @since             1.0.0
 * @package           Vedic_Astro_Api
 *
 * @wordpress-plugin
 * Plugin Name:       VedicAstroAPI
 * Plugin URI:        https://vedicastroapi.com
 * Description:       Horoscope and Astrology is the first vedic astrology plugin that lets you generate horoscope reports based on the birth details.
 * Version:           1.0.11
 * Author:            Vedic Astro API
 * Author URI:        https://sohamsolution.com
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       vedic-astro-api
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
define( 'VEDIC_ASTRO_API_VERSION', '1.0.11' );
define( 'VEDICASTRO_URL', plugin_dir_url( __FILE__ ) );
define( 'VEDIC_ASTRO_API_ROOT_URL', 'https://api.vedicastroapi.com/v3-json/' );
define( 'VAAPI_LOCATION_LATITUDE', 28.65195 );
define( 'VAAPI_LOCATION_LONGITUDE', 77.23149 );
define( 'VAAPI_LOCATION_TIMEZONE', 5.5 );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vedic-astro-api-activator.php
 */
function activate_vedic_astro_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vedic-astro-api-activator.php';
	Vedic_Astro_Api_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vedic-astro-api-deactivator.php
 */
function deactivate_vedic_astro_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vedic-astro-api-deactivator.php';
	Vedic_Astro_Api_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vedic_astro_api' );
register_deactivation_hook( __FILE__, 'deactivate_vedic_astro_api' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vedic-astro-api.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vedic_astro_api() {

	$plugin = new Vedic_Astro_Api();
	$plugin->run();

}
run_vedic_astro_api();
