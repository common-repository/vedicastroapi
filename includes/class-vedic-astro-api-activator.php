<?php

/**
 * Fired during plugin activation
 *
 * @link       https://sohamsolution.com
 * @since      1.0.0
 *
 * @package    Vedic_Astro_Api
 * @subpackage Vedic_Astro_Api/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Vedic_Astro_Api
 * @subpackage Vedic_Astro_Api/includes
 * @author     Vedic Astro <care@vedicastroapi.com>
 */
class Vedic_Astro_Api_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$data = array(
			'vedicastro_sign_list' 		     => 'sun',
			'vedicastro_language' 		     => array( 'en', 'ta', 'ka', 'te', 'hi', 'ml', 'be', 'sp', 'fr' ),
			'vedicastro_bg_color' 		     => '#ebf5ff',
			'vedicastro_button_bg_color'     => '#007bff',
			'vedicastro_form_border_color'   => '#007bff',
			'vedicastro_button_color'        => '#ffffff',
			'vedicastro_button_border_color' => '#007bff',
			'vedicastro_button_tab_color'    => '#ebf5ff',
			'vedicastro_button_tab_bg_color' => '#007bff',
			'vedicastro_form_color'          => '#000000',
			'vedicastro_chart_color'         => '#000000',
			'vedicastro_title_show'          => 'checked',
			'vedicastro_border_show'         => 'checked',
		);
		
		add_option( 'vedicastro_setting', json_encode( $data ) );
	}

}
