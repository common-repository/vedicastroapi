<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sohamsolution.com
 * @since      1.0.0
 *
 * @package    Vedic_Astro_Api
 * @subpackage Vedic_Astro_Api/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Vedic_Astro_Api
 * @subpackage Vedic_Astro_Api/includes
 * @author     Vedic Astro <care@vedicastroapi.com>
 */
class Vedic_Astro_Api_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'vedic-astro-api',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
