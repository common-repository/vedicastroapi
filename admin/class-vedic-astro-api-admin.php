<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sohamsolution.com
 * @since      1.0.0
 *
 * @package    Vedic_Astro_Api
 * @subpackage Vedic_Astro_Api/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vedic_Astro_Api
 * @subpackage Vedic_Astro_Api/admin
 * @author     Vedic Astro <care@vedicastroapi.com>
 */
class Vedic_Astro_Api_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action('admin_menu', array($this, 'vedicastro_create_admin_menu'));
		add_action('wp_ajax_vedicastro_form_data_ajax', array($this, 'vedicastro_form_data_ajax'));
		add_action('wp_ajax_nopriv_vedicastro_form_data_ajax', array($this, 'vedicastro_form_data_ajax'));
		add_action('vaapi_admin_setting_tabs', array($this, 'vedicastro_setting_page'));
		add_action('vaapi_admin_setting_tabs', array($this, 'vedicastro_shortcode_lists_page'));
		add_action('vaapi_admin_setting_tabs', array($this, 'vedicastro_without_form_url'));
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vedic_Astro_Api_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vedic_Astro_Api_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, VEDICASTRO_URL . 'admin/css/vedic-astro-api-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vedic_Astro_Api_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vedic_Astro_Api_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, VEDICASTRO_URL . 'admin/js/vedic-astro-api-admin.js', array('jquery'), $this->version, false);
		wp_localize_script($this->plugin_name, 'vedicastro_admin_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	}

	/**
	 * Vedicastro create admin menu
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_create_admin_menu()
	{
		add_menu_page('VedicAstroAPI', 'VedicAstroAPI', 'manage_options', 'vedicastro-settings', array($this, 'vedicastro_pages'), esc_url(VEDICASTRO_URL . 'admin/images/vedicastro-white-icon.svg'));
	}

	/**
	 * Register vedicastro setting options.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_option_fields()
	{
		$data = array(
			'vedicastro_setting' => $this->vaapi_allowed_options(),
			'vedicastro_shortcode_lists' => $this->vedicastro_shortcode_list(),
		);
		return $data;
	}

	/**
	 * Vedicastro sign list.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_sign_list()
	{
		$data = array(
			'sun'	=> __('Sun Sign', 'vedic-astro-api'),
			'moon'	=> __('Moon Sign', 'vedic-astro-api'),
		);
		return $data;
	}

	/**
	 * Vedicastro shortcode list.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_shortcode_list()
	{
		$data = array(
			'vedicastro-all-in-one-shortcode'	                       => __('All in One Shortcode', 'vedic-astro-api'),
			'vedicastro-prediction-shortcode'	                       => __('Predictions Shortcode', 'vedic-astro-api'),
			'vedicastro-kundali-shortcode'	                           => __('Kundali Shortcode', 'vedic-astro-api'),
			'vedicastro-sade-sati-shortcode'	                       => __('Sade Sati Shortcode', 'vedic-astro-api'),
			'vedicastro-gem-stone-rudraksh-shortcode'	               => __('Gem & Rudhraksh Shortcode', 'vedic-astro-api'),
			'vedicastro-matching-shortcode'	                           => __('Matching Shortcode', 'vedic-astro-api'),
			'vedicastro-panchang-shortcode'	                           => __('Panchang Shortcode', 'vedic-astro-api'),
			'vedicastro-panchang-monthly-calendar-shortcode'	       => __('Monthly Panchang Shortcode', 'vedic-astro-api'),
			'vedicastro-panchang-moon-calendar-shortcode'              => __('Panchang Moon Calendar Shortcode', 'vedic-astro-api'),
			'vedicastro-retro-shortcode'                               => __('Retro Shortcode', 'vedic-astro-api'),
			'vedicastro-hora-muhurats-shortcode'                       => __('Hora mahurat Shortcode', 'vedic-astro-api'),
			'vedicastro-choghadiya-muhurats-shortcode'	               => __('Choghadiya Shortcode', 'vedic-astro-api'),
			'vedicastro-panchang-moon-calendar-shortcode'	           => __('Moon Calender Shortcode', 'vedic-astro-api'),
			'vedicastro-numberology-shortcode'                         => __('Numerology Shortcode', 'vedic-astro-api'),
		);
		$new_data = apply_filters('vedicastro_form_shortcodes_list', $data);

		return $new_data;
	}

	/**
	 * Vedicastro menu pages.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_pages()
	{
		$original_html = wp_kses_post(sprintf(
			__('<div class="wrap"><h1>%s</h1><div class="vedicastro-setting-list"><ul class="tabs"><li class="tab-link current" data-tab="tab-1"><strong>%s</strong></li><li class="tab-link" data-tab="tab-2"><strong>%s</strong></li><li class="tab-link" data-tab="tab-3"><strong>%s</strong></li></ul>', 'vedic-astro-api'),
			__('Vedicastro API Settings', 'vedic-astro-api'),
			__('API Settings', 'vedic-astro-api'),
			__('Vedicastro Shortcode List', 'vedic-astro-api'),
			__('Without Form Submit Action', 'vedic-astro-api')
		));

		// Apply the filter to the HTML content
		$html = apply_filters('vedicastro_setting_tab_modify', $original_html);

		// Echo the modified HTML content
		echo $html;

		do_action('vaapi_before_admin_setting_tabs');

		do_action('vaapi_admin_setting_tabs');

		do_action('vaapi_after_admin_setting_tabs');

		echo wp_kses_post(sprintf(__('</div></div>', 'vedic-astro-api')));
	}

	public function vedicastro_without_form_url_data()
	{

		$vaapi_site_url = sanitize_url(get_site_url());

		$data = array(

			'data'  => array(
				array(
					'title' => __('Moon Calender – No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-panchang-moon-calendar-shortcode show_form="no"]',
					'url'   => $vaapi_site_url . "/moon-calender-no-form/?panchang-moon-month=12&panchang-moon-year=2022&lang=en",
					'type'  => array(
						'panchang-moon-month' =>  '(ex: 1 )  1,2,3,4,5,---12  (optional)',
						'panchang-moon-year'  =>  '(ex: 2023 ) Year number (optional)) ',
						'lang'                =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Prediction  – No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-prediction-shortcode show_form="no"]',
					'url'   => $vaapi_site_url . "/prediction-no-form/?zodiac=aries&lang=en",
					'type'  => array(
						'zodiac' =>  'zodaic ex:- aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn,  aquarius, pisces (optional)',
						'lang'   =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Sade Sati - No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-sade-sati-shortcode show_form="no"]',
					'url' => $vaapi_site_url . "/sade-sati-no-form/?sade-sati-name=ram&sade-sati-date=2023-06-08&sade-sati-time=12:30&sade-sati-location=Delhi&user_location_latitude=" . VAAPI_LOCATION_LATITUDE . "&user_location_longitude=9" . VAAPI_LOCATION_LONGITUDE . "&user_location_timezone=" . VAAPI_LOCATION_TIMEZONE . "&lang=hi",
					'type'  => array(
						'sade-sati-name'           =>  '(ex: yourname )    (Required)',
						'sade-sati-date'           =>  '(ex: 2023-06-08 )   Date of Birth - YYYY-MM-DD (optional)',
						'sade-sati-time'           =>  '(ex: 12:00 )      Time in Hours - HH:MM (optional)',
						'user_location_latitude'   =>  '(ex: ' . VAAPI_LOCATION_LATITUDE . ' )    Latitude with decimals (optional) ',
						'user_location_longitude'  =>  '(ex: ' . VAAPI_LOCATION_LONGITUDE . ' )   Longitude in decimals (optional)',
						'user_location_timezone'   =>  '(ex: ' . VAAPI_LOCATION_TIMEZONE . ' )   TimeZone in jumps of 0.5 - (ex: 5:30 will be 5.5, 5:45 will be 5.75) (optional)',
						'lang'                     =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Gem stone & Rudhraksh - No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-gem-stone-rudraksh-shortcode show_form="no"]',
					'url' => $vaapi_site_url . "/gem-rudhraksh-no-form/?rudraksh-name=ram&rudraksh-time=12:30&rudraksh-date=2023-06-08&rudraksh-location=Delhi&user_location_latitude=" . VAAPI_LOCATION_LATITUDE . "&user_location_longitude=9" . VAAPI_LOCATION_LONGITUDE . "&user_location_timezone=" . VAAPI_LOCATION_TIMEZONE . "&lang=hi",
					'type'  => array(
						'rudraksh-name'            =>  '(ex: yourname )    (Required)',
						'rudraksh-time'            =>  '(ex: 12:00 )      Time in Hours - HH:MM (optional)',
						'rudraksh-date'            =>  '(ex: 2023-06-08 )   Date  - YYYY-MM-DD (optional)',
						'user_location_latitude'   =>  '(ex: ' . VAAPI_LOCATION_LATITUDE . ' )   Latitude with decimals (optional) ',
						'user_location_longitude'  =>  '(ex: ' . VAAPI_LOCATION_LONGITUDE . ' )   Longitude in decimals (optional)',
						'user_location_timezone'   =>  '(ex: ' . VAAPI_LOCATION_TIMEZONE . ' )   TimeZone in jumps of 0.5 - (ex: 5:30 will be 5.5, 5:45 will be 5.75) (optional)',
						'lang'                     =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Hora mahurat - No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-hora-muhurats-shortcode  show_form="no"]',
					'url' => $vaapi_site_url . "/hora-mahurat-no-form/?hora-date=2023-06-08&hora-time=12:30&hora-location=Delhi&user_location_latitude=" . VAAPI_LOCATION_LATITUDE . "&user_location_longitude=" . VAAPI_LOCATION_LONGITUDE . "&user_location_timezone=" . VAAPI_LOCATION_TIMEZONE . "&lang=hi",
					'type'  => array(
						'hora-date'                 =>   '(ex: 2023-06-08 )   Date - YYYY-MM-DD (optional)',
						'hora-time'                 =>   '(ex: 12:00 )      Time in Hours - HH:MM (optional)',
						'user_location_latitude'   =>  '(ex: ' . VAAPI_LOCATION_LATITUDE . ' )    Latitude with decimals (optional) ',
						'user_location_longitude'   =>  '(ex: ' . VAAPI_LOCATION_LONGITUDE . ' )   Longitude in decimals (optional)',
						'user_location_timezone'    =>  '(ex: ' . VAAPI_LOCATION_TIMEZONE . ' )   TimeZone in jumps of 0.5 - (ex: 5:30 will be 5.5, 5:45 will be 5.75) (optional)',
						'lang'                      =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Choghadiya - No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-choghadiya-muhurats-shortcode show_form="no"]',
					'url' => $vaapi_site_url . "/choghadiya-no-form/?choghadiya-date=2023-03-02&choghadiya-time=12:35&choghadiya-location=Delhi&user_location_latitude=" . VAAPI_LOCATION_LATITUDE . "&user_location_longitude=" . VAAPI_LOCATION_LONGITUDE . "&user_location_timezone=" . VAAPI_LOCATION_TIMEZONE . "&lang=hi",
					'type'  => array(
						'choghadiya-date'          =>  '(ex: 2023-06-08 )   Date - YYYY-MM-DD (optional)',
						'choghadiya-time'          =>  '(ex: 12:00 )      Time in Hours - HH:MM (optional)',
						'user_location_latitude'   =>  '(ex: ' . VAAPI_LOCATION_LATITUDE . ' )    Latitude with decimals (optional) ',
						'user_location_longitude'  =>  '(ex: ' . VAAPI_LOCATION_LONGITUDE . ')   Longitude in decimals (optional)',
						'user_location_timezone'   =>  '(ex: ' . VAAPI_LOCATION_TIMEZONE . ' )   TimeZone in jumps of 0.5 - (ex: 5:30 will be 5.5, 5:45 will be 5.75) (optional)',
						'lang'                     =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Numerology – No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-numberology-shortcode show_form="no"]',
					'url' => $vaapi_site_url . "/numerology-no-form/?numberology-name=dfgd&numberology-date=2022-06-08&lang=en",
					'type'  => array(
						'numberology-name'       =>  '(ex: yourname )    (Required)',
						'numberology-date'       =>  '(ex: 2023-06-08 )   Date - YYYY-MM-DD (optional)',
						'lang'                   =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Panchang – Monthly Calendar - No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-panchang-monthly-calendar-shortcode show_form="no"]',
					'url' => $vaapi_site_url . "/monthly-calender-no-form/?panchang-moon-month=11&panchang-moon-year=2022&lang=en",
					'type'  => array(
						'panchang-moon-month'    =>  '(ex: 1 )  1,2,3,4,5,---12  (optional)',
						'panchang-moon-year'     =>  '(ex: 2023 ) Year number (optional)) ',
						'lang'                   =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Panchang – No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-panchang-shortcode show_form="no"]',
					'url' => $vaapi_site_url . "/panchang-no-form/?panchang-date=2022-10-08&panchang-time=18:30&user_location_latitude=" . VAAPI_LOCATION_LATITUDE . "&user_location_longitude=" . VAAPI_LOCATION_LONGITUDE . "&user_location_timezone=" . VAAPI_LOCATION_TIMEZONE . "&lang=hi",
					'type'  => array(
						'panchang-date'            =>  '(ex: 2023-06-08 )   Date - YYYY-MM-DD (optional)',
						'panchang-time'            =>  '(ex: 12:00 )      Time in Hours - HH:MM (optional)',
						'user_location_latitude'   =>  '(ex: ' . VAAPI_LOCATION_LATITUDE . ' )   Latitude with decimals (optional) ',
						'user_location_longitude'  =>  '(ex: ' . VAAPI_LOCATION_LONGITUDE . ' )   Longitude in decimals (optional)',
						'user_location_timezone'   =>  '(ex: ' . VAAPI_LOCATION_TIMEZONE . ' )   TimeZone in jumps of 0.5 - (ex: 5:30 will be 5.5, 5:45 will be 5.75) (optional)',
						'lang'                     =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Retro – No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-retro-shortcode show_form="no"]',
					'url' => $vaapi_site_url . "/retro-no-form/?retro-year=2022&lang=en",
					'type'  => array(
						'retro-year'             =>  '(ex: 2021 ) Year till 2799 (optional)',
						'lang'                   =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Matching – No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-matching-shortcode show_form="no"]',
					'url' => $vaapi_site_url . "/matching-no-form/?boy-name=ram&boy_location_latitude=28.65&boy_location_timezone=" . VAAPI_LOCATION_TIMEZONE . "&boy_location_longitude=" . VAAPI_LOCATION_LONGITUDE . "&boy-date=2023-06-08&boy-time=12:30&boy-style=north&boy-divisional-chart-code=D9&girl-name=sita&girl_location_timezone=" . VAAPI_LOCATION_TIMEZONE . "&girl_location_longitude=" . VAAPI_LOCATION_LONGITUDE . "&girl_location_latitude=" . VAAPI_LOCATION_LATITUDE . "&girl-date=2023-06-08&girl-time=12:30&girl-style=south&girl-divisional-chart-code=D7&get-matching=north-indian&lang=hi",
					'type'  => array(
						'boy-name'                =>  '(ex: name )    (Required)',
						'boy_location_latitude'   =>  '(ex: ' . VAAPI_LOCATION_LATITUDE . ' )   Latitude with decimals (optional)',
						'boy_location_longitude'  =>  '(ex: ' . VAAPI_LOCATION_LONGITUDE . ')   Longitude in decimals (optional)',
						'boy_location_timezone'   =>  '(ex: ' . VAAPI_LOCATION_TIMEZONE . ' )   TimeZone in jumps of 0.5 - (ex: 5:30 will be 5.5, 5:45 will be 5.75) (optional)',
						'boy-date'                =>  '(ex: 2023-06-08 )   Date of Birth - YYYY-MM-DD (optional)',
						'boy-time'                =>  '(ex: 12:00 )      Time of Birth in Hours - HH:MM (optional)',
						'boy-divisional-chart-code' => '(ex D7 ) D1,D3,D3-s,D7,D9,D10,D10-R,D12,D16,D20,D24,D24-R,D40,D45,D60,D30,chalit,sun,moon (optional)',
						'boy-style'               =>  '(ex: north ) north (or) south (optional)',
						'girl-name'               =>  '(ex: name )    (Required)',
						'girl_location_latitude'  =>  '(ex: ' . VAAPI_LOCATION_LATITUDE . ' )   Latitude with decimals (optional)',
						'girl_location_longitude' =>  '(ex: ' . VAAPI_LOCATION_LONGITUDE . ' )   Longitude in decimals (optional)',
						'girl_location_timezone'  =>  '(ex: ' . VAAPI_LOCATION_TIMEZONE . ' )   TimeZone in jumps of 0.5 - (ex: 5:30 will be 5.5, 5:45 will be 5.75) (optional)',
						'girl-date'               =>  '(ex: 2023-06-08 )   Date of Birth - YYYY-MM-DD (optional)',
						'girl-time'               =>  '(ex: 12:00 )      Time of Birth in Hours - HH:MM (optional)',
						'girl-divisional-chart-code' => '(ex D9 ) D1,D3,D3-s,D7,D9,D10,D10-R,D12,D16,D20,D24,D24-R,D40,D45,D60,D30,chalit,sun,moon (optional)',
						'girl-style'              =>  '(ex: north ) north (or) south (optional)',
						'get-matching'            =>  '(ex: north-indian ) north-indian (or) south-indian (optional)',
						'lang'                    =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
				array(
					'title' => __('Kundali – No Form', 'vedic-astro-api'),
					'shortcode' => '[vedicastro-kundali-shortcode show_form="no"]',
					'url' => $vaapi_site_url . "/kundli-no-form/?kundali-name=ram&kundali-date=2023-06-08&kundali-time=12:00&user_location_latitude=28.65&user_location_longitude=77.23&user_location_timezone=" . VAAPI_LOCATION_TIMEZONE . "&kundali-style=north&kundali-divisional-chart-code=D7&lang=en",
					'type'  => array(
						'kundali-name'               =>  '(ex: name )    (Required)',
						'kundali-date'               =>  '(ex: 2023-06-08 )   Date of Birth - YYYY-MM-DD (optional)',
						'kundali-time'               =>  '(ex: 12:00 )      Time of Birth in Hours - HH:MM (optional)',
						'user_location_latitude'     =>  '(ex: ' . VAAPI_LOCATION_LATITUDE . ' )   Latitude with decimals (optional)',
						'user_location_longitude'    =>  '(ex: ' . VAAPI_LOCATION_LONGITUDE . ' )   Longitude in decimals (optional)',
						'user_location_timezone'     =>  '(ex: ' . VAAPI_LOCATION_TIMEZONE . ' )   TimeZone in jumps of 0.5 - (ex: 5:30 will be 5.5, 5:45 will be 5.75) (optional)',
						'kundali-style'              =>   '(ex: north) north or south (optional)',
						'kundali-divisional-chart-code' => '(ex: D9) D1,D3,D3-s,D7,D9,D10,D10-R,D12,D16,D20,D24,D24-R,D40,D45,D60,D30,chalit,sun,moon (optional)',
						'lang'                       =>  'Response language- en,hi,ka,ta,te,ml,be,sp,fr  (optional)',
					),
				),
			),
		);

		$new_data = apply_filters('vedicastro_no_form_shortcodes_list', $data);
		return $new_data;
	}

	public function vedicastro_without_form_url()
	{
		$data = $this->vedicastro_without_form_url_data();

		echo wp_kses_post(sprintf(__('<div id="tab-3" class="tab-content" data-tab="vedicastro-lists"><h3>%s</h3>', 'vedic-astro-api'), __('Without Form Submit Action URL', 'vedic-astro-api')));

		if (is_array($data) && !empty($data) && array_key_exists('data', $data) && is_array($data['data'])) {

			foreach ($data['data'] as $data_key => $data_val) :

				echo wp_kses_post(sprintf(__('<div class="form-group w-50 float-left_url"><div class="form-group w-25 float-left"><label for="vedicastro_shortcode_name" class="withoutform">%s</label><label>%s</label></div><div class="form-group w-25 "><label for="">%s</label><div class="pameter_option"><label>%s</label>', 'vedic-astro-api'), esc_html($data_val['title']), esc_html($data_val['shortcode']), esc_url($data_val['url']), __('Parameters', 'vedic-astro-api')));

				foreach ($data_val['type'] as $data_key => $data_val) :

					echo wp_kses_post(sprintf(__('<div class="parameter"><div class="parameter_key">%s</div><div>-</div><div class="parameter_value">%s</div>
					</div>', 'vedic-astro-api'), esc_html($data_key, 'vedic-astro-api'), esc_html($data_val, 'vedic-astro-api')));

				endforeach;

				echo wp_kses_post(sprintf(__('</div></div></div>', 'vedic-astro-api')));

			endforeach;

			echo wp_kses_post(sprintf(__('</div>', 'vedic-astro-api')));
		}
	}

	/**
	 * Vedicastro setting page.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_setting_page()
	{
		$output = $args = $vedicastro_apikey = $vedicastro_sign_list = $api_status = $vedicastro_title_show = $vedicastro_border_show = $vedicastro_language_show = '';
		$args = $this->vedicastro_option_fields();
		$vedicastro_bg_color = '#ebf5ff';
		$vedicastro_form_color = '#000000';
		$vedicastro_button_bg_color = '#007bff';
		$vedicastro_form_border_color = '#007bff';
		$vedicastro_button_color = '#ffffff';
		$vedicastro_button_border_color = '#007bff';
		$vedicastro_button_tab_color = '#ebf5ff';
		$vedicastro_button_tab_bg_color = '#007bff';
		$vedicastro_chart_color = '#000000';
		$vedicastro_language = 'en';
		$allowed_options = $this->vaapi_allowed_options();
		$vedicastro_setting = get_option('vedicastro_setting');

		if (is_array($vedicastro_setting) && !empty($vedicastro_setting)) :

			foreach ($vedicastro_setting as $valk => $valv) :

				$vkey = sanitize_key($valk);

				if (in_array($vkey, $allowed_options)) {

					$$vkey = !empty($valv) ? sanitize_text_field($valv) : '';
				}

			endforeach;

		else :

			$vedicastro_title_show    = "checked";
			$vedicastro_border_show   = "checked";

		endif;

		$vedicastro_sign_arr = $this->vedicastro_sign_list();
		$vedicastro_lang_list = $this->vedic_field_lang_admin();
		$vaapi_valid_form_tags = is_array($this->vaapi_add_allowed_form_tags()) && !empty($this->vaapi_add_allowed_form_tags()) ? $this->vaapi_add_allowed_form_tags() : wp_kses_allowed_html('post');
		$vaapi_valid_input_tags = is_array($this->vaapi_add_allowed_input_tags()) && !empty($this->vaapi_add_allowed_input_tags()) ? $this->vaapi_add_allowed_input_tags() : wp_kses_allowed_html('post');
		$vaapi_valid_select_tags = is_array($this->vaapi_add_allowed_select_tags()) && !empty($this->vaapi_add_allowed_select_tags()) ? $this->vaapi_add_allowed_select_tags() : wp_kses_allowed_html('post');
		$vedicastro_language_arr = explode(',', $vedicastro_language);

		echo wp_kses_post(sprintf(__('<div id="tab-1" class="tab-content current" data-tab="vedicastro-setting">', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<form id="vedicastro-setting" method="post" action="options.php" class="form-container">', 'vedic-astro-api')), $vaapi_valid_form_tags);

		settings_fields('vedicastro-setting');
		do_settings_sections('vedicastro-setting');

		echo wp_kses_post(sprintf(__('<div class="form-group w-50 float-left"><label for="vedicastro_status">%s</label>', 'vedic-astro-api'), __('Status', 'vedic-astro-api')));

		if (!empty($api_status) && $api_status == 'connected') :

			echo wp_kses_post(sprintf(__('<span class="status positive">%s</span>', 'vedic-astro-api'), __('Connected', 'vedic-astro-api')));

		else :

			echo wp_kses_post(sprintf(__('<span class="status neutral">%s</span>', 'vedic-astro-api'), __('Not Connected', 'vedic-astro-api')));

		endif;

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left"><label for="vedicastro_apikey">%s</label>', 'vedic-astro-api'), __('API Key', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="text" id="vedicastro_apikey" name="vedicastro_apikey" value="%s" class="form-control" placeholder="%s">', 'vedic-astro-api'), esc_attr($vedicastro_apikey), __('Please enter API Key.', 'vedic-astro-api')), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('<a href="%s" target="_blank">%s</a></div>', 'vedic-astro-api'), esc_url('https://vedicastroapi.com/'), __('Get Vedic Astro API Here', 'vedic-astro-api')));

		if (is_array($vedicastro_sign_arr) && !empty($vedicastro_sign_arr)) :

			echo wp_kses_post(sprintf(__('<div class="form-group w-50 float-left"><label for="vedicastro_list">%s</label>', 'vedic-astro-api'), __('Vedic Astro Sign', 'vedic-astro-api')));

			echo wp_kses(sprintf(__('<select id="vedicastro_sign_list" name="vedicastro_sign_list"><option value="">%s</option>', 'vedic-astro-api'), __('Select Sign', 'vedic-astro-api')),  $vaapi_valid_select_tags);

			foreach ($vedicastro_sign_arr as $vedicastro_sign_key => $vedicastro_sign_val) :
				if ($vedicastro_sign_list == $vedicastro_sign_key) :
					echo wp_kses(sprintf(__('<option value="%s" selected>%s</option>', 'vedic-astro-api'), esc_attr($vedicastro_sign_key), esc_html($vedicastro_sign_val)), $vaapi_valid_select_tags);;
				else :
					echo wp_kses(sprintf(__('<option value="%s">%s</option>', 'vedic-astro-api'), esc_attr($vedicastro_sign_key), esc_html($vedicastro_sign_val)),  $vaapi_valid_select_tags);
				endif;
			endforeach;

			echo wp_kses(sprintf(__('</select>', 'vedic-astro-api')), $vaapi_valid_select_tags);

			echo wp_kses_post(sprintf(__('</div>', 'vedic-astro-api')));

		endif;

		if (is_array($vedicastro_lang_list) && !empty($vedicastro_lang_list)) :

			echo wp_kses_post(sprintf(__('<div class="form-group w-50 float-left"><label for="vedicastro_language">%s</label>', 'vedic-astro-api'), __('Language', 'vedic-astro-api')));

			foreach ($vedicastro_lang_list as $vedicastro_lang_key => $vedicastro_lang_val) :
				if (is_array($vedicastro_language_arr)) {
					if (in_array($vedicastro_lang_key, $vedicastro_language_arr)) {
						$vedicastro_language_show = 'checked';
					} else {
						$vedicastro_language_show = '';
					}
				}
				echo wp_kses(sprintf(__('<input type="checkbox" id="vedicastro_language" name="vedicastro_language[]" value="%s" %s>', 'vedic-astro-api'), esc_attr($vedicastro_lang_key), esc_attr($vedicastro_language_show)), $vaapi_valid_input_tags);

				echo wp_kses_post(sprintf(__('<span>%s </span>', 'vedic-astro-api'), esc_html($vedicastro_lang_val), 'vedic-astro-api'));

			endforeach;

			echo wp_kses_post(sprintf(__('</div>', 'vedic-astro-api')));

		endif;

		echo wp_kses_post(sprintf(__('<div class="form-group w-50 float-left"><label for="vedicastro_bg_color">%s</label>', 'vedic-astro-api'), __('Background Color', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="color" id="vedicastro_bg_color" name="vedicastro_bg_color" value="%s" class="form-control">', 'vedic-astro-api'), esc_attr($vedicastro_bg_color)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left"><label for="vedicastro_form_color">%s</label>', 'vedic-astro-api'), __('Form Text Color', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="color" id="vedicastro_form_color" name="vedicastro_form_color" value="%s" class="form-control">', 'vedic-astro-api'), esc_attr($vedicastro_form_color)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left"><label for="vedicastro_form_border_color">%s</label>', 'vedic-astro-api'), __('Form  Border Color', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="color" id="vedicastro_form_border_color" name="vedicastro_form_border_color" value="%s" class="form-control">', 'vedic-astro-api'), esc_attr($vedicastro_form_border_color)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left"><label for="vedicastro_button_bg_color">%s</label>', 'vedic-astro-api'), __('Button Background Color', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="color" id="vedicastro_button_bg_color" name="vedicastro_button_bg_color" value="%s" class="form-control">', 'vedic-astro-api'), esc_attr($vedicastro_button_bg_color)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left"><label for="vedicastro_button_color">%s</label>', 'vedic-astro-api'), __('Button Color', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="color" id="vedicastro_button_color" name="vedicastro_button_color" value="%s" class="form-control">', 'vedic-astro-api'), esc_attr($vedicastro_button_color)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left"><label for="vedicastro_button_border_color">%s</label>', 'vedic-astro-api'), __('Button Border Color', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="color" id="vedicastro_button_border_color" name="vedicastro_button_border_color" value="%s" class="form-control">', 'vedic-astro-api'), esc_attr($vedicastro_button_border_color)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left"><label for="vedicastro_button_tab_bg_color">%s</label>', 'vedic-astro-api'), __('Button Tab Active Background Color ', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="color" id="vedicastro_button_tab_bg_color" name="vedicastro_button_tab_bg_color" value="%s" class="form-control">', 'vedic-astro-api'), esc_attr($vedicastro_button_tab_bg_color)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left"><label for="vedicastro_button_tab_color">%s</label>', 'vedic-astro-api'), __('Button Tab Active Color', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="color" id="vedicastro_button_tab_color" name="vedicastro_button_tab_color" value="%s" class="form-control">', 'vedic-astro-api'), esc_attr($vedicastro_button_tab_color)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left"><label for="vedicastro_chart_color">%s</label>', 'vedic-astro-api'), __('Chart Color', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="color" id="vedicastro_chart_color" name="vedicastro_chart_color" value="%s" class="form-control">', 'vedic-astro-api'), esc_attr($vedicastro_chart_color)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('</div><div class="form-group w-50 float-left heading_title_border">', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="checkbox" id="vedicastro_title_check" name="vedicastro_title_show" value="checked" %s>', 'vedic-astro-api'), esc_attr($vedicastro_title_show)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('<label for="vedicastro_title_show">%s</label></div><div class="form-group w-50 float-left heading_title_border">', 'vedic-astro-api'), __('Show Title On The Page', 'vedic-astro-api')));

		echo wp_kses(sprintf(__('<input type="checkbox" id="vedicastro_border_check" name="vedicastro_border_show" value="checked" %s>', 'vedic-astro-api'), esc_attr($vedicastro_border_show)), $vaapi_valid_input_tags);

		echo wp_kses_post(sprintf(__('<label for="vedicastro_border_check">%s</label><br></div>', 'vedic-astro-api'), __('Show Border Outside from  Form and Data', 'vedic-astro-api')));

		echo wp_kses_post(sprintf(__('<button type="button" id="vedicastro_from_submit_btn" class="btn vedicastro_from_submit_btn">%s<img src="%s" class="LoderImg vedicastro-hide"> </button>', 'vedic-astro-api'), __('Save', 'vedic-astro-api'), esc_url(plugin_dir_url(__DIR__) . 'admin/images/loder.gif')));

		echo wp_kses(sprintf(__('</form>', 'vedic-astro-api')), $vaapi_valid_form_tags);

		echo wp_kses_post(sprintf(__('</div>', 'vedic-astro-api')));

		return $output;
	}

	/**
	 * Vedicastro shortcode list page.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_shortcode_lists_page()
	{
		$shortcode_list = $this->vedicastro_option_fields();

		if (is_array($shortcode_list) && array_key_exists('vedicastro_shortcode_lists', $shortcode_list) && is_array($shortcode_list['vedicastro_shortcode_lists'])) :
			echo wp_kses_post(sprintf(__('<div id="tab-2" class="tab-content" data-tab="vedicastro-lists"><h3>%s</h3><div class="form-group w-50 float-left">', 'vedic-astro-api'), __('Vedic Astro Shortcode Lists', 'vedic-astro-api')));

			if (!empty($shortcode_list['vedicastro_shortcode_lists'])) {
				foreach ($shortcode_list['vedicastro_shortcode_lists'] as $shortcode_list_key => $shortcode_list_val) :

					echo wp_kses_post(sprintf(__('<div class="form-group w-25 float-left"><label for="vedicastro_shortcode_name">%s</label></div><div class="form-group w-25 float-right">[%s]</div>', 'vedic-astro-api'), esc_html($shortcode_list_val), esc_html($shortcode_list_key)));

				endforeach;
			}

			echo wp_kses_post(sprintf(__('</div></div>', 'vedic-astro-api')));

		endif;
	}

	/**
	 * Register vedicastro setting register.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_settings_register()
	{
		$args = $this->vedicastro_option_fields();
		if (!empty($args)) :
			foreach ($args as $key => $val) :
				switch ($key) {
					case 'vedicastro_setting':
						foreach ($val as $valk => $valv) :
							register_setting('vedicastro-setting', sanitize_text_field($valv));
						endforeach;
						break;
				}
			endforeach;
		endif;
	}

	/**
	 * Vedicastro form data ajax
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_form_data_ajax()
	{
		$fields_data = array();
		$vedicastro_sign_list_dash = '';
		$form_data = $_POST['formdata'];

		if (is_array($form_data) && !empty($form_data)) {

			$allowed_options = $this->vaapi_allowed_options();
			$selected_lang = array();

			foreach ($form_data as $data) {

				$data_key = sanitize_key($data['name']);

				if ($data_key == "vedicastro_sign_list" && empty($data['value'])) {

					$data['value'] = 'sun';
				}

				if (in_array($data_key, $allowed_options)) {

					if ('vedicastro_language' == $data_key) {

						$selected_lang[] = $data['value'];

						$$data_key = is_array($selected_lang) ? $selected_lang : array('en');

						/*} elseif ( 'vedicastro_title_show' == $data_key || 'vedicastro_border_show' == $data_key ) {

						$$data_key = !empty ( $data['value'] ) ? sanitize_text_field( $data['value'] ) : '';
						$fields_data[ $data_key ] = $$data_key;
					*/
					} else {

						$$data_key = !empty($data['value']) ? sanitize_text_field($data['value']) : '';
						$fields_data[$data_key] = $$data_key;
					}
				}
			}

			if (is_array($selected_lang) && !empty($selected_lang)) {

				$fields_data['vedicastro_language'] = implode(',', $selected_lang);
			} else {

				$fields_data['vedicastro_language'] = 'en';
			}

			if (!empty($vedicastro_sign_list)) {
				$vedicastro_sign_list_dash = '-' . $vedicastro_sign_list;
			} else {
				$vedicastro_sign_list_dash = '-sun';
			}

			$prediction = 'daily' . $vedicastro_sign_list_dash;
			$zodic_sign = 1;
			$date = date('d/m/Y');

			$api_data = array(
				'zodiac'  => $zodic_sign,
				'date' 	  => $date,
				'api_key' => $vedicastro_apikey,
			);

			$buil_query = build_query($api_data);
			$url = VEDIC_ASTRO_API_ROOT_URL . 'prediction/' . $prediction . '?' . $buil_query;
			$response = wp_remote_get($url);

			if (is_array($response) && !empty($response)) {

				$get_json = $response['body'];
			} else {

				$get_json = '';
			}

			if (is_string($get_json) && !empty($get_json) && is_array(json_decode($get_json, true))) {

				$get_data = json_decode($get_json, true);

				if (is_array($get_data) && !empty($get_data)) {

					if ($get_data['status'] == 200) :

						$fields_data['status']            = 1;
						$fields_data['api_status']        = 'connected';

						echo json_encode(array('status' => absint($fields_data['status']), 'form' => 'vedicastro-setting', 'api_status' => esc_html($fields_data['api_status'])));

					else :

						$fields_data['vedicastro_apikey'] = '';
						$fields_data['status']            = 0;
						$fields_data['api_status']        = 'disconnected';

						echo json_encode(array('status' => absint($fields_data['status']), 'form' => 'vedicastro-setting', 'api_status' => esc_html($fields_data['api_status'])));

					endif;
				}
			} else {

				$fields_data['vedicastro_apikey'] = '';
				$fields_data['status']            = 0;
				$fields_data['api_status']        = $get_json['response'];

				echo json_encode(array('status' => absint($fields_data['status']), 'form' => 'vedicastro-setting', 'api_status' => esc_html($fields_data['api_status'])));
			}
		}

		update_option('vedicastro_setting', $fields_data);

		wp_die();
	}

	public function vedic_field_lang_admin()
	{
		$states = array(
			'en'     => __('English', 'vedic-astro-api'),
			'ta'     => __('Tamil', 'vedic-astro-api'),
			'ka'     => __('Kannada', 'vedic-astro-api'),
			'te'     => __('Telegu', 'vedic-astro-api'),
			'hi'     => __('Hindi', 'vedic-astro-api'),
			'ml'     => __('Malayalam', 'vedic-astro-api'),
			'be'     => __('Bengali', 'vedic-astro-api'),
			'sp'     => __('Spanish', 'vedic-astro-api'),
			'fr'     => __('French', 'vedic-astro-api'),
		);
		return $states;
	}

	public function vaapi_add_allowed_form_tags()
	{

		$tags['form']  = array(
			'id'       		=> true,
			'method'   		=> true,
			'action'   		=> true,
			'class'    		=> true,
		);

		return $tags;
	}

	public function vaapi_add_allowed_input_tags()
	{

		$tags['input'] = array(
			'type'    		=> true,
			'id'	  		=> true,
			'value'   		=> true,
			'class'	  		=> true,
			'placeholder'  	=> true,
			'name'	  		=> true,
			'checked'		=> true,
		);

		return $tags;
	}

	public function vaapi_add_allowed_select_tags()
	{

		$tags['select'] = array(
			'id'	  		=> true,
			'class'	  		=> true,
			'name'	  		=> true,
		);

		$tags['option'] = array(
			'selected'	  		=> true,
			'value'	  		=> true,
		);

		return $tags;
	}

	public function vaapi_allowed_options()
	{

		return array('vedicastro_apikey', 'vedicastro_sign_list', 'vedicastro_bg_color', 'vedicastro_button_bg_color', 'vedicastro_form_border_color', 'vedicastro_button_color', 'vedicastro_button_border_color', 'vedicastro_button_border_color', 'vedicastro_button_tab_color', 'vedicastro_button_tab_bg_color', 'vedicastro_form_color', 'vedicastro_chart_color', 'vedicastro_title_show', 'vedicastro_border_show', 'vedicastro_language', 'status', 'api_status');
	}
}
