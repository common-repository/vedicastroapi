<?php
class Vedicastro_Shortcode
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
		add_shortcode('vedicastro-services-shortcode', array($this, 'vedicastro_choose_services_shortcode'));
		add_shortcode('vedicastro-all-in-one-shortcode', array($this, 'vedicastro_all_in_one_shortcode'));
		add_shortcode('vedicastro-prediction-shortcode', array($this, 'vedicastro_horoscope_shortcode'));
		add_shortcode('vedicastro-kundali-shortcode', array($this, 'vedicastro_kundali_shortcode'));
		add_shortcode('vedicastro-matching-shortcode', array($this, 'vedicastro_matching_shortcode'));
		add_shortcode('vedicastro-panchang-shortcode', array($this, 'vedicastro_panchang_shortcode'));
		add_shortcode('vedicastro-panchang-moon-calendar-shortcode', array($this, 'vedicastro_panchang_moon_calendar_shortcode'));
		add_shortcode('vedicastro-sade-sati-shortcode', array($this, 'vedicastro_sade_sati_shortcode'));
		add_shortcode('vedicastro-retro-shortcode', array($this, 'vedicastro_retro_shortcode'));
		add_shortcode('vedicastro-numberology-shortcode', array($this, 'vedicastro_numberology_shortcode'));
		add_shortcode('vedicastro-panchang-monthly-calendar-shortcode', array($this, 'vedicastro_panchang_monthly_calendar_shortcode'));
		add_shortcode('vedicastro-hora-muhurats-shortcode', array($this, 'vedicastro_hora_muhurats_shortcode'));
		add_shortcode('vedicastro-choghadiya-muhurats-shortcode', array($this, 'vedicastro_choghadiya_muhurats_shortcode'));
		add_shortcode('vedicastro-gem-stone-rudraksh-shortcode', array($this, 'vedicastro_gem_stone_rudraksh_shortcode'));
	}

	/**
	 * Vedicastro zodics list
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_zodics_list()
	{

		$zodics = array(
			'aries'       => __('Aries', 'vedic-astro-api'),
			'taurus'      => __('Taurus', 'vedic-astro-api'),
			'gemini'      => __('Gemini', 'vedic-astro-api'),
			'cancer'      => __('Cancer', 'vedic-astro-api'),
			'leo'         => __('Leo', 'vedic-astro-api'),
			'virgo' 	  => __('Virgo', 'vedic-astro-api'),
			'libra'  	  => __('Libra', 'vedic-astro-api'),
			'scorpio'     => __('Scorpio', 'vedic-astro-api'),
			'sagittarius' => __('Sagittarius', 'vedic-astro-api'),
			'capricorn'   => __('Capricorn', 'vedic-astro-api'),
			'aquarius'    => __('Aquarius', 'vedic-astro-api'),
			'pisces'      => __('Pisces', 'vedic-astro-api'),
		);

		return $zodics;
	}

	/**
	 * Vedicastro cycles list
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_cycles_list()
	{

		$cycles = array(
			'daily'       => __('Daily', 'vedic-astro-api'),
			'weekly'      => __('Weekly', 'vedic-astro-api'),
			'yearly'      => __('Yearly', 'vedic-astro-api'),
		);

		return $cycles;
	}

	/**
	 * Vedicastro cycles list
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_days_list()
	{

		$days = array(
			'today'       => __('Today', 'vedic-astro-api'),
			'tomorrow'    => __('Tomorrow', 'vedic-astro-api'),
		);

		return $days;
	}

	/**
	 * Vedicastro weekly list
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_weekly_list()
	{

		$weekly = array(
			'thisweek'    => __('This Week', 'vedic-astro-api'),
			'nextweek'    => __('Next Week', 'vedic-astro-api'),
		);

		return $weekly;
	}

	/**
	 * Vedicastro choose services
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_services_data()
	{

		$data = array(
			'id'    => 'choose-a-service',
			'title' => __('Choose a service', 'vedic-astro-api'),
			'data'  => array(
				array(
					'id'    => 'predictions_data',
					'title' => __('Prediction', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/horoscope',
					'type'  => 'png',
				),
				array(
					'id'    => 'service-kundli',
					'title' => __('Kundli', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/kundli',
					'type'  => 'png',
				),
				array(
					'id'    => 'service-matching',
					'title' => __('Matching', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/matching',
					'type'  => 'png',
				),
				array(
					'id'    => 'panchang_sec_data',
					'title' => __('Panchang', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/panchang',
					'type'  => 'png',
				),
				array(
					'id'    => 'moon_calendar_data',
					'title' => __('Moon Calender', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/panchang',
					'type'  => 'png',
				),
				array(
					'id'    => 'panchang-monthly',
					'title' => __('Monthly Calender', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/panchang',
					'type'  => 'png',
				),
				array(
					'id'    => 'service-retro',
					'title' => __('Retro', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/retro',
					'type'  => 'png',
				),
				array(
					'id'    => 'numberology_sec_data',
					'title' => __('Numerology', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/numerology',
					'type'  => 'png',
				),
				array(
					'id'    => 'choghadiya-mahurat',
					'title' => __('Choghadiya Mahurat', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/horoscope',
					'type'  => 'png',
				),
				array(
					'id'    => 'hura-mahurats',
					'title' => __('Hura Mahurats', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/horoscope',
					'type'  => 'png',
				),
				array(
					'id'    => 'sade-sati-kundli',
					'title' => __('Sade Sati', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/horoscope',
					'type'  => 'png',
				),
				array(
					'id'    => 'gem-rudhraksh',
					'title' => __('Gem & Rudhraksh', 'vedic-astro-api'),
					'image' => VEDICASTRO_URL . 'public/images/horoscope',
					'type'  => 'png',
				),
			),
		);
		return $data;
	}

	/**
	 * Vedicastro get previous page url 
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_get_previous_page_url()
	{

		$output = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) ? sanitize_text_field($_SERVER['HTTP_REFERER']) : '#';

		return $output;
	}

	/** 
	 * vedicastro form padding title and border remove
	 * 
	 */
	public function vedicastro_form_padding()
	{

		$vedicastro_setting = get_option('vedicastro_setting');
		$vedicastro_title = "";
		$vedicastro_border = "";

		if (is_array($vedicastro_setting) && !empty($vedicastro_setting)) :

			foreach ($vedicastro_setting as $valk => $valv) :

				switch ($valk):

					case "vedicastro_title_show":

						$vedicastro_title = !empty($valv) ? $valv : "";

						break;

					case "vedicastro_border_show":

						$vedicastro_border = !empty($valv) ? $valv : "";

						break;

				endswitch;

			endforeach;

		endif;

		if (!empty($vedicastro_title)) {

			$vedicastro_title_show = '';
		} else {

			$vedicastro_title_show = 'astro_box_heading';
		}

		if (!empty($vedicastro_border)) {

			$vedicastro_border_show = '';
		} else {

			$vedicastro_border_show = 'padding-unset';
		}

		$output = array(

			"vedicastro_title_show"  => $vedicastro_title_show,
			"vedicastro_border_show" => $vedicastro_border_show,

		);

		return $output;
	}

	/**
	 * Vedicastro choose services
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_choose_services_shortcode() {

		$html = '';
		// Padding border and title form classes
		$form_padding = $this->vedicastro_form_padding();
		$vedicastro_border_show = $form_padding["vedicastro_border_show"];
		$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		$data = $this->vedicastro_services_data();

		if (is_array($data) && !empty($data)) :

			$html .= wp_kses_post(sprintf(__('<section class="choose_services p-15 %s" id="choose_services_data"><div class="astro_container"><div class="choose_services_box bdr-gray prl-40 %s"><div class="astro_box "><div class="choose_services_box_content">', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show)));

			if (!empty($data['title'])) :

				if (empty($vedicastro_title_show)) {

					$html .= wp_kses_post(sprintf(__('<div class="choose_services_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">%s</h2></div>', 'vedic-astro-api'), __($data['title'], 'vedic-astro-api')));
				}

			endif;

			$html .= wp_kses_post(sprintf(__('<div class="choose_services_row">', 'vedic-astro-api')));

			if (!empty($data['data'])) :

				$i = 1;

				foreach ($data['data'] as $data_key => $data_val) :

					if ($i == 1) :

						$class = 'choose_services_col_box active bdr-gray mlr-15';

					else :

						$class = 'choose_services_col_box bdr-gray mlr-15';

					endif;

					$html .= wp_kses_post(sprintf(__('<div class="choose_services_col-3"><div class="%s"><a href="#%s"><div class="astro_logo text_center"><img src="%s" class="img_fluid"></div><div class="astro_logo_content text_center"><h3 class="fs-16 lh-20 m_0 clr-black1 fw-700">%s</h3></div></a></div></div>', 'vedic-astro-api'), esc_attr($class), esc_attr($data_val['id']), esc_url($data_val['image'] . '.' . $data_val['type']), __($data_val['title'], 'vedic-astro-api')));

					$i++;

				endforeach;

			endif;

			$html .= wp_kses_post(sprintf(__('</div></div></div></div></div></section>', 'vedic-astro-api')));

		endif;

		return $html;
	}

	/**
	 * Vedicastro horoscope shortcode
	 *
	 * @since    1.0.0
	 */
	 public function vedicastro_all_in_one_shortcode() {

		$output = '';
		$output .= do_shortcode('[vedicastro-services-shortcode]');
		$output .= do_shortcode('[vedicastro-prediction-shortcode]');
		$output .= do_shortcode('[vedicastro-kundali-shortcode]');
		$output .= do_shortcode('[vedicastro-sade-sati-shortcode]');
		$output .= do_shortcode('[vedicastro-gem-stone-rudraksh-shortcode]');
		$output .= do_shortcode('[vedicastro-matching-shortcode]');
		$output .= do_shortcode('[vedicastro-panchang-shortcode]');
		$output .= do_shortcode('[vedicastro-panchang-moon-calendar-shortcode]');
		$output .= do_shortcode('[vedicastro-panchang-monthly-calendar-shortcode]');
		$output .= do_shortcode('[vedicastro-retro-shortcode]');
		$output .= do_shortcode('[vedicastro-hora-muhurats-shortcode]');
		$output .= do_shortcode('[vedicastro-choghadiya-muhurats-shortcode]');
		$output .= do_shortcode('[vedicastro-numberology-shortcode]');

		return $output;
	 }

	/**
	 * Vedicastro horoscope shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_horoscope_shortcode($atts) {

		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro-panchang-shortcode'
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}

		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';

		$output = $zodics = $cycles = '';
		$zodics = $this->vedicastro_zodics_list();
		$cycles = $this->vedicastro_cycles_list();
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$vedicastro_border_show = '';
		$vedicastro_title_show = '';

		// Padding border and title form classes
		$form_padding = $this->vedicastro_form_padding();

		if (is_array($form_padding) && !empty($form_padding)) {

			$vedicastro_border_show = !empty($form_padding["vedicastro_border_show"]) ? $form_padding["vedicastro_border_show"] : '';
			$vedicastro_title_show = !empty($form_padding["vedicastro_title_show"]) ? $form_padding["vedicastro_title_show"] : '';
		}

		$output .= sprintf(__('<section class="predictions_sec p-15 %s" id="predictions_data"><div class="astro_container"><div class="choose_services_box  bdr-gray prl-40 %s"><div class="astro_box %s %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_title_show),  esc_attr($vedicastro_form), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Predictions', 'vedic-astro-api'));

		$output .= $this->get_language_form();

		$output .= wp_nonce_field('prediction_nonce_field', 'prediction_nonce', true, false);

		$output .= sprintf(__('</div><div class="zodic_sign prl-40 %s"><div class="choose_services_row">', 'vedic-astro-api'), esc_attr($vedicastro_border_show));

		if (is_array($zodics) && !empty($zodics)) :

			$i = 1;

			foreach ($zodics as $key => $val) :

				if ($i == 1) :

					$class = 'zodics_sign_tab active';

				else :

					$class = 'zodics_sign_tab';

				endif;

				$output .= sprintf(__('<div class="astro_col" data-zodic="%d"><div class="%s"><a href="#" class="vedicastro-zodic-sign vedicastro-click" data-click="zodic-sign" data-zodic_id="%d" data-title="%s"><div class="zodics_icon text_center"><img src="%s" class="img_fluid" alt="icon"><img src="%s" class="img_fluid" alt="icon"></div><div class="zodics_content text_center"><p class="m_0 fs-10 clr-blue">%s</p></div></a></div></div>', 'vedic-astro-api'), absint($i), esc_attr($class), absint($i), esc_attr($key), esc_url(VEDICASTRO_URL . 'public/images/zodics/' . $key . '.svg'), esc_url(VEDICASTRO_URL . 'public/images/zodics/' . $key . '_w.svg'), esc_html($val));

				$i++;

			endforeach;

		endif;

		$output .= sprintf(__('</div><div class="zodic_data d_block" data_tab="1"><div class="astro_content_tabs">', 'vedic-astro-api'));

		if (!empty($cycles)) :

			$output .= sprintf(__('<ul class="astro_content_menu p_0 display_flex" id="astro_content_menu_data">', 'vedic-astro-api'));

			$j = 1;

			foreach ($cycles as $cycles_key => $cycles_val) :

				if ($j == 1) :

					$cycles_class = 'vedicastro-click cycles active';

				else :

					$cycles_class = 'vedicastro-click cycles';

				endif;

				$output .= sprintf(__('<li class="%s" data_id="%d" data-click="cycles" data-title="%s"><a href="#" class="clr-gray fs-16 lh-24" data-prediction="%s">%s</a></li>', 'vedic-astro-api'), esc_attr($cycles_class), absint($j), esc_attr($cycles_key), esc_attr($cycles_key), esc_html($cycles_val, 'vedic-astro-api'));

				$j++;

			endforeach;

			$output .= sprintf(__('</ul>', 'vedic-astro-api'));

		endif;

		$output .= sprintf(__('</div><div class="daily_horoscope" id="choose_services_row">', 'vedic-astro-api'));

		$k = 1;

		foreach ($cycles as $cycles_key => $cycles_val) :

			if ($k == 1) :

				$section_class = 'display_block vedicastro-horoscope-predictions vedicastro-horoscope-' . $cycles_key;

			else :

				$section_class = 'vedicastro-horoscope-predictions vedicastro-horoscope-' . $cycles_key;

			endif;

			$output .= sprintf(__('<div class="%s" data_content="%d"></div>', 'vedic-astro-api'), esc_attr($section_class), absint($k));

			$k++;

		endforeach;

		$output .= sprintf(__('</div></div></div></div></div></section>', 'vedic-astro-api'));

		return $output;

	}

	/**
	 * Vedicastro form field data
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_form_field_data() {

		$output = array(
			'options' => array(
				array(
					'id'          => 'kundali-name',
					'name'        => 'kundali-name',
					'type'        => 'text',
					'title'       => __('Name', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Name', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),

				array(
					'id'          => 'kundali-date',
					'name'        => 'kundali-date',
					'type'        => 'date',
					'title'       => __('Date', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Date', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'kundali-time',
					'name'        => 'kundali-time',
					'type'        => 'time',
					'title'       => __('Time', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Time', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'kundali-location',
					'name'        => 'kundali-location',
					'type'        => 'text',
					'title'       => __('Location', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Location', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check location user_location_city',
					'value'       => 'Delhi',
				),
				array(
					'id'          => 'kundali-divisional-chart-code',
					'name'        => 'kundali-divisional-chart-code',
					'type'        => 'hidden',
					'data-label-class' => 'fs-16 lh-24',
					'data-input-class' => 'fs-16 lh-24 check location ',
					'value'       => 'D9',
				),
				array(
					'id'          => 'kundali-style',
					'name'        => 'kundali-style',
					'type'        => 'hidden',
					'data-label-class' => 'fs-16 lh-24',
					'data-input-class' => 'fs-16 lh-24 check location ',
					'value'       => 'north',
				),
				array(
					'id'          => 'kundali-submit',
					'name'        => 'kundali-submit',
					'type'        => 'submit',
					'data-input-class' => 'get_submit vedicastro_button',
					'value'       => __('Get Kundli', 'vedic-astro-api'),
				),
			),
		);

		return $output;
	}

	/**
	 * Vedicastro kundali form
	 *
	 * @since    1.0.0
	 */

	public function vedicastro_form( $args ) {

		$html = '';
		$data = $this->vedicastro_form_field_data();
		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : sanitize_text_field($this->user_selected_lang());
		$location_latitude = isset($_REQUEST['user_location_latitude']) ? floatval($_REQUEST['user_location_latitude']) : floatval(VAAPI_LOCATION_LATITUDE);
		$location_longitude = isset($_REQUEST['user_location_longitude']) ? floatval($_REQUEST['user_location_longitude']) : floatval(VAAPI_LOCATION_LONGITUDE);
		$location_timezone = isset($_REQUEST['user_location_timezone']) ? floatval($_REQUEST['user_location_timezone']) : floatval(VAAPI_LOCATION_TIMEZONE);


		$html .= sprintf(__('<form  method="%s" name="%s" id="%s">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));
	
		$html .= wp_nonce_field('kundli_nonce_field', 'kundli_nonce', true, false); 

		$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" id value="%s">', 'vedic-astro-api'), esc_attr($user_lang));

		$html .= sprintf(__('<input type="hidden" name="user_location_latitude" class="user_location_latitude" value="%f">', 'vedic-astro-api'), floatval($location_latitude));

		$html .= sprintf(__('<input type="hidden" name="user_location_longitude" class="user_location_longitude" value="%f">', 'vedic-astro-api'), floatval($location_longitude));

		$html .= sprintf(__('<input type="hidden" name="user_location_timezone" class="user_location_timezone" value="%f">', 'vedic-astro-api'), floatval($location_timezone));

		/****/
		
		if ( $args['view_data'] == 'no') {
			$html .= sprintf(__('<input type="hidden" name="view_data" class="view_data" value="%s">', 'vedic-astro-api'), esc_attr('no'));
		} else {
			$html .= sprintf(__('<input type="hidden" name="view_data" class="view_data" value="%s">', 'vedic-astro-api'), esc_attr('yes'));
		}
	
        /*****/

		$html .= sprintf(__('<div class="kundli_vedic_login_form"><div class="kundli_vedic_login_form">', 'vedic-astro-api'));

		if ( is_array( $data ) && is_array( $data['options'] ) && !empty( $data['options'] ) ) :

			foreach ($data['options'] as $key => $val) :

				if (isset($_REQUEST[$val['name']])) {

					$val['value'] = sanitize_text_field($_REQUEST[$val['name']]);
				}

				switch ($key):

					case 0:

						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

						$html .= $this->vedicastro_form_field($val);

						$html .= sprintf(__('</div>', 'vedic-astro-api'));

						break;

					case 1:

						if ($key == 0 || $key == 1) :

							if ($key == 0) :

								$html .= sprintf(__('<div class="astro_col-8"><div class="kundli_vedic_group">', 'vedic-astro-api'));

							endif;

							if ($key == 1) :

								$html .= sprintf(__('<div class="astro_col-12"><div class="kundli_vedic_group">', 'vedic-astro-api'));

							endif;

							$html .= $this->vedicastro_form_field($val);

							$html .= sprintf(__('</div></div>', 'vedic-astro-api'));

						endif;

						break;

					case 2:

						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

						$html .= $this->vedicastro_form_field($val);

						$html .= sprintf(__('</div>', 'vedic-astro-api'));

						break;

					case 3:

						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

						$html .= $this->vedicastro_form_field($val);

						$html .= $this->get_location_dropdown();

						$html .= sprintf(__('</div>', 'vedic-astro-api'));

						break;

					case 4:

						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

						$html .= $this->vedicastro_form_field($val);

						$html .= sprintf(__('</div>', 'vedic-astro-api'));

						break;

					case 5:

						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

						$html .= $this->vedicastro_form_field($val);

						$html .= sprintf(__('</div>', 'vedic-astro-api'));

						$html= apply_filters('vaapi_kundli_form_fields', $html, $args);

						break;

					case 6:

						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

						$html .= $this->vedicastro_form_field($val);

						$html .= sprintf(__('</div>', 'vedic-astro-api'));

						break;

				endswitch;

			endforeach;
		endif;

		$html .= sprintf(__('</div></form>', 'vedic-astro-api'));

		return $html;
	}

	/*
	--- Vedicastro panchang form input field -----
	*/

	public function vedicastro_panchang_form_field_data()
	{
		$output = '';
		$output = array(
			'options' => array(
				array(
					'id'          => 'panchang-date',
					'name'        => 'panchang-date',
					'type'        => 'date',
					'title'       => __('Date', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Date', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'panchang-time',
					'name'        => 'panchang-time',
					'type'        => 'time',
					'title'       => __('Time', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Time', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'panchang-location',
					'name'        => 'panchang-location',
					'type'        => 'text',
					'title'       => __('location', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('location', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check location user_location_city',
					'value'		 => 'Delhi',
				),
				array(
					'id'          => 'panchang-submit',
					'name'        => 'panchang-submit',
					'type'        => 'submit',
					'data-input-class' => 'get_submit vedicastro_button',
					'value'       => __('Get Panchang', 'vedic-astro-api'),
				),
			),
		);
		return $output;
	}
	
	/**
	 * Vedicastro user selected language
	 *
	 * @since    1.0.0
	 */
	public function user_selected_lang() {

		$vedicastro_setting = get_option('vedicastro_setting');
		$user_lang = 'en';

		if (array_key_exists('astro_user_lang', $_COOKIE)) {

			$user_lang = sanitize_text_field($_COOKIE['astro_user_lang']);
		} elseif (is_array($vedicastro_setting) && !empty($vedicastro_setting)) {

			if (array_key_exists('vedicastro_language', $vedicastro_setting)) {

				$vedicastro_language_arr = explode(',', $vedicastro_setting['vedicastro_language']);

				if (is_array($vedicastro_language_arr) && !empty($vedicastro_language_arr)) {

					$user_lang = $vedicastro_language_arr[0];
				}
			}
		} else {

			$user_lang = 'en';
		}

		return $user_lang;
	}

	public function vedic_field_planet() {
		$output = '';
		$states = array(
			'Sun'     => 'Sun',
			'Moon'    => 'Moon',
			'Mercury' => 'Mercury',
			'Venus'   => 'Venus',
			'Mars'    => 'Mars',
			'Jupiter' => 'Jupiter',
			'Saturn'  => 'Saturn',
			'Rahu'    => 'Rahu',
			'Ketu'    => 'Ketu',
		);
		$output .= '<label for="planet" class="fs-16 lh-24 text-color ">Planet</label>
			                 <select id="planet" name="planet" class="state_list">
						          <option value="" selected="selected">
						            Select Planet
						          </option>';
		foreach ($states as $key => $state) {
			if ($state == "") {
				$state = $key;
			};
			$output .= '<option value="' . esc_attr($key) . '">' . esc_html($state) . '</option>';
		}
		$output .= '</select>';
		return $output;
	}

	/*
	--- Vedicastro panchang form  ----- 
	*/
	public function vedicastro_panchang_form($args)
	{
		$data = $this->vedicastro_panchang_form_field_data();
			$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();
			$location_latitude = isset($_REQUEST['user_location_latitude']) ? floatval($_REQUEST['user_location_latitude']) : floatval(VAAPI_LOCATION_LATITUDE);
			$location_longitude = isset($_REQUEST['user_location_longitude']) ? floatval($_REQUEST['user_location_longitude']) : floatval(VAAPI_LOCATION_LONGITUDE);
			$location_timezone = isset($_REQUEST['user_location_timezone']) ? floatval($_REQUEST['user_location_timezone']) : floatval(VAAPI_LOCATION_TIMEZONE);
			
			$html = sprintf(__('<form method="%s" name="%s" id="%s"><div class="kundli_vedic_login_form">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));
			
			$html .= wp_nonce_field('panchang_nonce_field', 'panchang_nonce', true, false);

			$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s"><input type="hidden" name="user_location_latitude" class="user_location_latitude" value="%f"><input type="hidden" name="user_location_longitude" class="user_location_longitude" value="%f"><input type="hidden" name="user_location_timezone" class="user_location_timezone" value="%f">', 'vedic-astro-api'), esc_attr($user_lang), floatval($location_latitude), floatval($location_longitude),floatval($location_timezone)); 
			
				if (!empty($data['options'])) :
					foreach ($data['options'] as $key => $val) :
						if (isset($_REQUEST[$val['name']])) {
							$val['value'] = sanitize_text_field($_REQUEST[$val['name']]);
						}
						switch ($key):
							case 0:
							case 1:
								if ($key == 0) : 
									$html .= sprintf(__('<div class="kundli_vedic_group">
										<div class="astro_col-8">
											<div class="kundli_vedic_group">', 'vedic-astro-api'));
													$html .= $this->vedicastro_form_field($val);
									$html .= sprintf(__('</div></div>', 'vedic-astro-api'));
								endif;
								if ($key == 1) : 
										$html .= sprintf(__('<div class="astro_col-4">
											<div class="kundli_vedic_group">', 'vedic-astro-api'));
													$html .= $this->vedicastro_form_field($val);
										$html .= sprintf(__('</div></div>', 'vedic-astro-api'));
								endif;
								if ($key == 1) : 
									$html .= sprintf(__('</div>', 'vedic-astro-api'));
								endif;
								break;
							case 2: 
									$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
										$html .= $this->vedicastro_form_field($val);
										$html .= $this->get_location_dropdown($val);
									$html .= sprintf(__('</div>', 'vedic-astro-api'));
							break;
							case 3:
									$html .= sprintf(__('<div class="kundli_vedic_group ">', 'vedic-astro-api'));
										$html .= $this->vedicastro_form_field($val);
									$html .= sprintf(__('</div>', 'vedic-astro-api'));
							break;								
						endswitch;
					endforeach;
				endif;
				$html .= sprintf(__('</div></form>', 'vedic-astro-api')); 
		return $html;
	}

	/**
	 * Vedicastro form field
	 *
	 * @since    1.0.0
	 */


	public function vedicastro_form_field( $fields ) {

					$html = '';
		$field_type = isset($fields['type']) && is_array($fields) ? $fields['type'] : '';

		if (!empty($field_type)) :

			if ($field_type == 'hidden') {

				$html .= sprintf(__('<input id="%s" name="%s" type="hidden" value="%s" class="%s text-color" readonly>', 'vedic-astro-api'), esc_attr($fields['id']), esc_attr($fields['name']), esc_attr($fields['value']), esc_attr($fields['data-input-class']));
			} elseif ($field_type == 'text' || $field_type == 'date' || $field_type == 'time' || $field_type == 'month' || $field_type == 'submit') {

				if ($field_type == 'date') {

					$field_val = isset($fields['value']) ? $this->vaapi_validate_date_field($fields['value']) : date('Y-m-d');
				} elseif ($field_type == 'time') {

					$timezone_offset = isset($_COOKIE['vedic_astro_timezone_offset']) ? absint($_COOKIE['vedic_astro_timezone_offset']) : 0;

					$field_val = date('H:i:s', strtotime('+' . $timezone_offset . 'minutes'));
				} else {

					$field_val = isset($fields['value']) ? $fields['value'] : '';
				}


				if ($field_type == 'submit') {

					$html .= sprintf(__('<input id="%s" name="%s" type="%s" value="%s" class="%s text-color">', 'vedic-astro-api'), esc_attr($fields['id']), esc_attr($fields['name']), esc_attr($field_type), esc_attr($field_val), esc_attr($fields['data-input-class']));
				} else {

					$html .= sprintf(__('<label for="%s" class="%s text-color">%s</label>', 'vedic-astro-api'), esc_attr($fields['id']), esc_attr($fields['data-label-class']), esc_html__($fields['title'], 'vedic-astro-api'));

					$html .= sprintf(__('<input id="%s" name="%s" type="%s" value="%s" class="%s text-color" placeholder="%s">', 'vedic-astro-api'), esc_attr($fields['id']), esc_attr($fields['name']), esc_attr($field_type), esc_attr($field_val), esc_attr($fields['data-input-class']), esc_attr($fields['placeholder']));
				}
			} elseif ($field_type == 'anchor') {

				$html .= sprintf(__('<a href="#" class="%s text-color" data-match-id="%s">%s</a>', 'vedic-astro-api'), esc_attr($fields['data-input-class']), esc_attr($fields['data-id']), esc_html__($fields['value'], 'vedic-astro-api'));
			}

		endif;

		return $html;
	}

	/**
	 * Vedicastro kundali shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_kundali_shortcode($atts)
	{

		$html = '';
		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
				'view_data'=> 'yes',
			),
			$atts,
			'vedicastro-choghadiya-shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-kundali',
			'form-id'   => 'form-kundali',
		);

		if (!empty($atts)) {
			// Check for both 'show_form' and 'view_data' attributes
			if (
				array_key_exists('show_form', $atts) && $atts['show_form'] == 'no' &&
				array_key_exists('view_data', $atts) && $atts['view_data'] == 'no'
			) {
				// Both attributes are set to 'no'
				$args['show_form'] = 'no';
				$args['view_data'] = 'no';
			} else {
				// Use default values or provided values for 'show_form'
				$args['show_form'] = array_key_exists('show_form', $atts) ? $atts['show_form'] : 'yes';
		
				// Use default values or provided values for 'view_data'
				$args['view_data'] = array_key_exists('view_data', $atts) ? $atts['view_data'] : 'yes';
			}
		} else {
			// Default values if no attributes are provided
			$args['show_form'] = 'yes';
			$args['view_data'] = 'yes';
		}

		$previous_page_url = $this->vedicastro_get_previous_page_url();

		/* padding border and title form */
		$form_padding = $this->vedicastro_form_padding();
		$vedicastro_border_show = $form_padding["vedicastro_border_show"];
		$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		/* padding,border and title form */

		$html .= sprintf( __( '<section class="kundli_sec p-15 %s" id="service-kundli"><div class="astro_container"><div class="choose_services_box bdr-gray prl-40 %s"><div class="astro_box %s %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api' ), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_title_show), esc_attr($args['show_form'] == 'yes' ? '' : ' display_none'), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Kundli', 'vedic-astro-api') );

		$html .= $this->get_language_form();

		$html .= sprintf( __( '</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form">', 'vedic-astro-api' ), esc_attr($args['show_form'] == 'yes' ? '' : 'display_none'), esc_attr($vedicastro_border_show) );
													
		$html .= $this->vedicastro_form($args);

		$html .= sprintf( __( '</div></div></div></div><div class="astro_box display_nones"><div class="astro_boxes"><div id="kundli-lagan-chart"></div><div class="chart_type"></div></div></div></div><div class="lagan_chart_tabs_main display_nones %s" id="lagan-chart-tabs-main-kundli"></div></div></section>', 'vedic-astro-api' ), esc_attr($vedicastro_border_show) );
		
		return $html;
	}

	/**
	 * Vedicastro matchiing field data
	 *
	 * @since    1.0.0
	*/

	public function vedicastro_matching_form_field_data()
	{
		$output = '';
		$output = array(
			'options' => array(
				'boy-form' => array(
					'title' => __('Boy’s Details', 'vedic-astro-api'),
					'field' => array(

						array(
							'id'          => 'boy-name',
							'name'        => 'boy-name',
							'type'        => 'text',
							'title'       => __('Name', 'vedic-astro-api'),
							'data-label-class' => 'fs-16 lh-24',
							'placeholder' => __('Name', 'vedic-astro-api'),
							'data-input-class' => 'fs-16 lh-24 check',

						),
						array(
							'id'          => 'boy-date',
							'name'        => 'boy-date',
							'type'        => 'date',
							'title'       => __('Boy Date', 'vedic-astro-api'),
							'data-label-class' => 'fs-16 lh-24',
							'placeholder' => __('Date', 'vedic-astro-api'),
							'data-input-class' => 'fs-16 lh-24 check',
						),
						array(
							'id'          => 'boy-time',
							'name'        => 'boy-time',
							'type'        => 'time',
							'title'       => __('Time of Birth', 'vedic-astro-api'),
							'data-label-class' => 'fs-16 lh-24',
							'placeholder' => __('Time', 'vedic-astro-api'),
							'data-input-class' => 'fs-16 lh-24 check',
						),
						array(
							'id'          => 'boy-location',
							'name'        => 'boy-location',
							'type'        => 'text',
							'title'       => __('location', 'vedic-astro-api'),
							'data-label-class' => 'fs-16 lh-24',
							'placeholder' => __('location', 'vedic-astro-api'),
							'data-input-class' => 'fs-16 lh-24 check location matching_location_city',
							'value'        => 'Delhi',
						),

						array(
							'id'          => 'boy-style',
							'name'        => 'boy-style',
							'type'        => 'hidden',
							'data-label-class' => 'fs-16 lh-24',
							'data-input-class' => 'fs-16 lh-24 check location',
							'value'       => 'north',
						),

						array(
							'id'          => 'boy-divisional-chart-code',
							'name'        => 'boy-divisional-chart-code',
							'type'        => 'hidden',
							'data-label-class' => 'fs-16 lh-24',
							'data-input-class' => 'fs-16 lh-24 check location',
							'value'       => 'D9',
						),
					)
				),
				'girl-form' => array(
					'title' => __('Girl’s Details', 'vedic-astro-api'),
					'field' => array(
						array(
							'id'          => 'girl-name',
							'name'        => 'girl-name',
							'type'        => 'text',
							'title'       => __('Name', 'vedic-astro-api'),
							'data-label-class' => 'fs-16 lh-24',
							'placeholder' => __('Name', 'vedic-astro-api'),
							'data-input-class' => 'fs-16 lh-24 check',

						),
						array(
							'id'          => 'girl-date',
							'name'        => 'girl-date',
							'type'        => 'date',
							'title'       => __('Girl Date', 'vedic-astro-api'),
							'data-label-class' => 'fs-16 lh-24',
							'placeholder' => __('Date', 'vedic-astro-api'),
							'data-input-class' => 'fs-16 lh-24 check',
						),
						array(
							'id'          => 'girl-time',
							'name'        => 'girl-time',
							'type'        => 'time',
							'title'       => __('Time of Birth', 'vedic-astro-api'),
							'data-label-class' => 'fs-16 lh-24',
							'placeholder' => __('Time', 'vedic-astro-api'),
							'data-input-class' => 'fs-16 lh-24 check',
						),
						array(
							'id'          => 'girl-location',
							'name'        => 'girl-location',
							'type'        => 'text',
							'title'       => __('location', 'vedic-astro-api'),
							'data-label-class' => 'fs-16 lh-24',
							'placeholder' => __('location', 'vedic-astro-api'),
							'data-input-class' => 'fs-16 lh-24 check location matching_location_city',
							'value'        => 'Delhi',
						),

						array(
							'id'          => 'girl-style',
							'name'        => 'girl-style',
							'type'        => 'hidden',
							'data-label-class' => 'fs-16 lh-24',
							'data-input-class' => 'fs-16 lh-24 check location',
							'value'       => 'north',
						),
						array(
							'id'          => 'girl-divisional-chart-code',
							'name'        => 'girl-divisional-chart-code',
							'type'        => 'hidden',
							'data-label-class' => 'fs-16 lh-24',
							'data-input-class' => 'fs-16 lh-24 check location',
							'value'       => 'D9',
						),

					)
				),
			),
		);
		return $output;
	}

	/**
	 * Vedicastro matching form
	 *
	 * @since    1.0.0
	*/

	public function vedicastro_matching_form($args)
	{

		$data = $this->vedicastro_matching_form_field_data();
		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();

		$boy_location_latitude = isset($_REQUEST['boy_location_latitude']) ? floatval($_REQUEST['boy_location_latitude']) : floatval(VAAPI_LOCATION_LATITUDE);
		$boy_location_longitude = isset($_REQUEST['boy_location_longitude']) ? floatval($_REQUEST['boy_location_longitude']) : floatval(VAAPI_LOCATION_LONGITUDE);
		$boy_location_timezone = isset($_REQUEST['boy_location_timezone']) ? floatval($_REQUEST['boy_location_timezone']) : floatval(VAAPI_LOCATION_TIMEZONE);

		$girl_location_latitude = isset($_REQUEST['girl_location_latitude']) ? floatval($_REQUEST['girl_location_latitude']) : floatval(VAAPI_LOCATION_LATITUDE);
		$girl_location_longitude = isset($_REQUEST['girl_location_longitude']) ? floatval($_REQUEST['girl_location_longitude']) : floatval(VAAPI_LOCATION_LONGITUDE);
		$girl_location_timezone = isset($_REQUEST['girl_location_timezone']) ? floatval($_REQUEST['girl_location_timezone']) : floatval(VAAPI_LOCATION_TIMEZONE);
		
		if (!empty($data['options'])) :

			$html = sprintf(__('<form method="%s" name="%s" id="%s"><div class="choose_services_row">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));

			$html .= wp_nonce_field('matching_nonce_field', 'matching_nonce', true, false); 

			$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s">', 'vedic-astro-api'), esc_attr($user_lang));
			foreach ($data['options'] as $data_key => $data_val) :
				if ($data_val['title'] == 'Boy’s Details') {

					$latlon = sprintf(__('<input type="hidden" name="boy_location_latitude" class="user_location_latitude" value="%f">
					<input type="hidden" name="boy_location_longitude" class="user_location_longitude" value="%f">
					<input type="hidden" name="boy_location_timezone" class="user_location_timezone" value="%f">', 'vedic-astro-api'), floatval($boy_location_latitude), floatval($boy_location_longitude), floatval($boy_location_timezone));
				}
				if ($data_val['title'] == 'Girl’s Details') {

					$latlon =  sprintf(__('<input type="hidden" name="girl_location_latitude" class="user_location_latitude" value="%f">
					<input type="hidden" name="girl_location_longitude" class="user_location_longitude" value="%f">
					<input type="hidden" name="girl_location_timezone" class="user_location_timezone" value="%f">', 'vedic-astro-api'), floatval($girl_location_latitude), floatval($girl_location_longitude), floatval($girl_location_timezone));
				}
					$html .= sprintf(__('<div class="astro_col-5">','vedic-astro-api'));
					if ($data_key == 'girl-form') :
					$html .= sprintf(__('<div class="kundli_vedic_form maching_data_form">','vedic-astro-api'));
					endif;
				if (!empty($data_val['title'])) :
					$html .= sprintf(__('<div class="kundli_vedic_login_form maching_data_form_login">
											<h4 class="fs-20 lh-24 fw-700 clr-black text-color m_0">%s</h4>%s','vedic-astro-api'), esc_html($data_val['title']), __($latlon));

					foreach ($data_val['field'] as $data_val_key => $data_val_val) :
						if (isset($_REQUEST[$data_val_val['name']])) {
							$data_val_val['value'] = sanitize_text_field($_REQUEST[$data_val_val['name']]);
						}
						switch ($data_val_key):
							case 0:	
								$html .= sprintf(__('<div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($data_val_val);
								$html .= sprintf(__('</div>', 'vedic-astro-api'));			
							break;
							case 1:
							case 2:
								if ($data_val_key == 1) :	
								$html .= sprintf(__('<div class="choose_services_row"><div class="astro_col-8"><div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($data_val_val);
								$html .= sprintf(__('</div></div>', 'vedic-astro-api'));	
								endif;
								if ($data_val_key == 2) :	
									$html .= sprintf(__('<div class="astro_col-4"><div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($data_val_val);
									$html .= sprintf(__('</div></div></div>', 'vedic-astro-api'));	
								endif;
							break;
							case 3:	
								$html .= sprintf(__('<div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($data_val_val);
									$html .= $this->get_location_dropdown();
								$html .= sprintf(__('</div>', 'vedic-astro-api'));	
							break;
							case 4:
								$html .= sprintf(__('<div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($data_val_val);
									$html .= $this->get_location_dropdown();
								$html .= sprintf(__('</div>', 'vedic-astro-api'));
							break;	
							case 5:
								$html .= sprintf(__('<div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($data_val_val);
									$html .= $this->get_location_dropdown();
								$html .= sprintf(__('</div>', 'vedic-astro-api'));
							break;	
							case 6:
								$html .= sprintf(__('<div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($data_val_val);
									$html .= $this->get_location_dropdown();
								$html .= sprintf(__('</div>', 'vedic-astro-api'));
							break;
						endswitch;
					endforeach;	
					$html .= sprintf(__('</div>', 'vedic-astro-api'));
				endif;
				if ($data_key == 'girl-form') :
					$html .= sprintf(__('</div>', 'vedic-astro-api'));
				endif;
				$html .= sprintf(__('</div>', 'vedic-astro-api'));
			endforeach;
			$html .= sprintf(__('</div></form>', 'vedic-astro-api'));
		endif;
		return $html;
	}

	/**
	 * Vedicastro panchang moon field data
	 *
	 * @since    1.0.0
	*/

	public function vedicastro_panchang_moon_field_data()
	{
		$output = '';
		$output = array(
			'options' => array(
				array(
					'id'          => 'panchang-moon-date',
					'name'        => 'panchang-moon-date',
					'type'        => 'month',
					'title'       => __('Month', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Month', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),

				array(
					'id'          => 'panchang-moon-location',
					'name'        => 'panchang-moon-location',
					'type'        => 'text',
					'title'       => __('location', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('location', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check location',
				),

				array(
					'id'          => 'panchang-moon-submit',
					'name'        => 'panchang-moon-submit',
					'type'        => 'submit',
					'data-input-class' => 'get_submit vedicastro_button',
					'value'       => __('Get Moon Calendar', 'vedic-astro-api'),
				),
			),
		);
		return $output;
	}

	/**
	 * Vedicastro panchang moon form
	 *
	 * @since    1.0.0
	 */

	public function vedicastro_panchang_moon_form($args)
	{
		$data = $this->vedicastro_panchang_moon_field_data();
		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();

		$html = sprintf(__('<form method="%s" name="%s" id="%s">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));

		$html .= wp_nonce_field('moon_nonce_field', 'moon_nonce', true, false);

		$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s"><div class="kundli_vedic_login_form">', 'vedic-astro-api'), esc_attr($user_lang) );

		$html .=  $this->get_current_year_dropdown();

		$html .= sprintf(__('<div class="kundli_vedic_group"><input id="panchang-moon-submit" name="panchang-moon-submit" type="submit" class="get_submit vedicastro_button" value="Get Moon Calender"></div></div></form>', 'vedic-astro-api') );

		return $html;
	}

	/**
	 * Vedicastro retro form field data
	 *
	 * @since    1.0.0
	*/

	public function vedicastro_retro_form_field_data()
	{
		$output = array(
			'options' => array(
				array(
					'id'          => 'retro-year',
					'name'        => 'retro-year',
					'type'        => 'text',
					'title'       => __('Year', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Enter Year', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
					'value'		  => 2022
				),
				array(
					'id'          => 'retro-submit',
					'name'        => 'retro-submit',
					'type'        => 'submit',
					'data-input-class' => 'get_submit vedicastro_button',
					'value'       => __('Get RetroGrade Data', 'vedic-astro-api'),
				),
			),
		);
		return $output;
	}

	/**
	 * Vedicastro panchang form
	 *
	 * @since    1.0.0
	*/

	public function vedicastro_retro_form($args)
	{
		$data = $this->vedicastro_retro_form_field_data();
		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : sanitize_text_field($this->user_selected_lang());
		//$planet = $this->vedic_field_planet();

	
		$html = sprintf(__('<form method="%s" name="%s" id="%s">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));
		$html .= wp_nonce_field('retro_nonce_field', 'retro_nonce', true, false); 

		$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s">', 'vedic-astro-api'), esc_attr($user_lang));

		$html .= sprintf(__('<div class="kundli_vedic_login_form">', 'vedic-astro-api'));

				if (is_array($data) && is_array($data['options']) && !empty($data['options'])) :
					foreach ($data['options'] as $val) :
						if (isset($_REQUEST[$val['name']])) {
							$val['value'] = sanitize_text_field($_REQUEST[$val['name']]);
						}

						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

						$html .= $this->vedicastro_form_field($val);

						$html .= sprintf(__('</div>', 'vedic-astro-api'));

					endforeach;
				endif; 

			$html .= sprintf(__('</div></form>', 'vedic-astro-api'));

		return $html;
	}

	/**
	 * Vedicastro retro shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_retro_shortcode($atts)
	{
		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro-retro-shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-retro',
			'form-id'   => 'form-retro',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}

		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$form_padding = $this->vedicastro_form_padding();

		if ( is_array( $form_padding ) && !empty( $form_padding ) ) {
			$vedicastro_border_show = $form_padding["vedicastro_border_show"];
			$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		} else {
			$vedicastro_border_show = '';
			$vedicastro_title_show = '';
		}

		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

		$html = sprintf(__('<section class="retro_sec p-15 %s" id="service-retro"><div class="astro_container"><div class="choose_services_box retro_main bdr-gray prl-40 %s"><div class="astro_box %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_section_class), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Retro', 'vedic-astro-api'));

		$html .= $this->get_language_form();

		$html .= sprintf(__('</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form">', 'vedic-astro-api'), esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));

		$html .= $this->vedicastro_retro_form($args);
		$html .= sprintf(__('</div></div></div></div><div class="retro_planites display_nones %s" id="retro-planites"></div></div></div></section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show));

		return $html;
	}

	/**
	 * Vedicastro numerology form field data
	 *
	 * @since    1.0.0
	*/
	public function vedicastro_numberology_form_field_data()
	{
		$output = '';
		$output = array(
			'options' => array(
				array(
					'id'          => 'numberology-name',
					'name'        => 'numberology-name',
					'type'        => 'text',
					'title'       => __('Name', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Name', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'numberology-date',
					'name'        => 'numberology-date',
					'type'        => 'date',
					'title'       => __('Date', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Date', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'numberology-time',
					'name'        => 'numberology-time',
					'type'        => 'time',
					'title'       => __('Time', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Time', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'numberology-submit',
					'name'        => 'numberology-submit',
					'type'        => 'submit',
					'data-input-class' => 'get_submit vedicastro_button',
					'value'       => __('Get Numerology', 'vedic-astro-api'),
				),
			),
		);
		return $output;
	}

	/**
	 * Vedicastro numberology form
	 *
	 * @since    1.0.0
	 */

	public function vedicastro_numberology_form($args)
	{
		$data = $this->vedicastro_numberology_form_field_data();
		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();

		$html = sprintf(__('<form method="%s" name="%s" id="%s">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));

		$html .= wp_nonce_field('numrology_nonce_field', 'numrology_nonce', true, false);
		
		$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s"><div class="kundli_vedic_login_form">', 'vedic-astro-api'), esc_attr($user_lang));

		if (is_array($data) && is_array($data['options']) && !empty($data['options'])) :

			foreach ($data['options'] as $key => $val) :
				if (isset($_REQUEST[$val['name']])) {
					$val['value'] = sanitize_text_field($_REQUEST[$val['name']]);
				}
				switch ($key):
					case 0:
						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

						$html .=  $this->vedicastro_form_field($val);

						$html .= sprintf(__('</div>', 'vedic-astro-api'));

						break;
					case 1:
					case 2:
						if ($key == 1) :
							$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

							$html .=  $this->vedicastro_form_field($val);

							$html .= sprintf(__('</div>', 'vedic-astro-api'));
						endif;
						break;
					case 3:
						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));

						$html .=  $this->vedicastro_form_field($val);

						$html .= sprintf(__('</div>', 'vedic-astro-api'));
					break;
				endswitch;
			endforeach;
		endif;
		$html .= sprintf(__('</div></form>', 'vedic-astro-api'));
		return $html;
	}
	/**
	 * Vedicastro numerology shortcode
	 *
	 * @since    1.0.0
	*/


	public function vedicastro_numberology_shortcode($atts)
	{
		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro-numberology-shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-numberology',
			'form-id'   => 'form-numberology',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}

		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$form_padding = $this->vedicastro_form_padding();

		if ( is_array( $form_padding ) && !empty( $form_padding ) ) {
			$vedicastro_border_show = $form_padding["vedicastro_border_show"];
			$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		} else {
			$vedicastro_border_show = '';
			$vedicastro_title_show = '';
		}

		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

		$html = sprintf(__('<section class="numberology_sec p-15 %s" id="numberology_sec_data"><div class="astro_container"><div class="choose_services_box numerology_main bdr-gray prl-40 %s"><div class="astro_box %s %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_title_show), esc_attr($vedicastro_form), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Numerology', 'vedic-astro-api'));

		$html .= $this->get_language_form();
		
		$html .= sprintf(__('</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form">', 'vedic-astro-api'), esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));

		$html .= $this->vedicastro_numberology_form($args);

		$html .= sprintf(__('</div></div></div></div><div class="Numerology_count_number" id="numerology-data"></div></div><div class="astro_col-5 display_nones %s" id="personal-day-number"></div></section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show));
		return $html;
	}

	/**
	 * Vedicastro language form
	 *
	 * @since    1.0.0
	*/

	public function get_language_form() {

		$html = '';
		$user_lang = $this->user_selected_lang();
		$vedicastro_setting = get_option('vedicastro_setting');

		if ( is_array( $vedicastro_setting ) && !empty( $vedicastro_setting )) {
			$vedicastro_language = $vedicastro_setting['vedicastro_language'];

			$vedicastro_language_arr = explode(',', $vedicastro_language);

			$states = array(
				'en'     => 'English',
				'ta'     => 'Tamil',
				'ka'     => 'Kannada',
				'te'     => 'Telgu',
				'hi'     => 'Hindi',
				'ml'     => 'Malayalam',
				'be'     => 'Bengali',
				'sp'     => 'spanish',
				'fr'     => 'French',
			);
			
			$html .= sprintf(__('<div class="multi_lang">', 'vedic-astro-api'));

			$html .= sprintf(__('<form class="multi_form" action="#" method="post" id="multi_form_data" name="multi_form_data">', 'vedic-astro-api'));

			$html .= sprintf(__('<div class="custom-select"><label for="lang2" class="clr-gray fs-14">%s</label>', 'vedic-astro-api'), __('Languages', 'vedic-astro-api') );

			$html .= sprintf(__('<select id="lang2" name="lang" class="clr-gray fs-14">', 'vedic-astro-api'));

			if (is_array($vedicastro_language_arr) && !empty($vedicastro_language_arr)) {

				foreach ($vedicastro_language_arr as $value) {

					if ($value == "") {

						$value = "en";
					}

					$html .= sprintf(__('<option value="%s" %s>%s</option>', 'vedic-astro-api'), esc_attr($value), esc_attr(selected($user_lang, $value, false)), esc_html__($states[$value]));
					
				}

			}

			$html .= sprintf(__('</select>', 'vedic-astro-api'));

			$html .= sprintf(__('</div></form></div>', 'vedic-astro-api'));

		}

		return $html;

	}

	/*
	* --- Vedicastro location dropdown ----- *
	*/

	public function get_location_dropdown()
	{

		$html = sprintf( __('<div class="spinner_page"><div class="spinner_box"><div></div></div></div><div class="crossImage"><img src="%s"></div><ul class="location_list"></ul>', 'vedic-astro-api' ), esc_url( VEDICASTRO_URL . 'public/images/icon/cross.png' ) );

		return $html;
	}

	/**
	 * Vedicastro Year Dropdown
	 *
	 * @since    1.0.0
	*/


	public function get_current_year_dropdown()
	{			
		$year = isset($_REQUEST['panchang-moon-year']) ? sanitize_text_field($_REQUEST['panchang-moon-year']) : date('Y');

		$html = sprintf(__('<div class="astro_select"><p class="m_0 fs-14 lh-20 fw-400 clr-black">%s</p><div class="custom-select"><select id="pachang1" name="panchang-moon-month" class="clr-black fs-14 fw-600">', 'vedic-astro-api'), __('Select a Month', 'vedic-astro-api') );
		
		for ($i = 0; $i < 12; $i++) {
			$time = strtotime(sprintf('%d months', $i));   
			$label = date('F', $time);   
			$value = date('n', $time);
			$selected = ($label == date('F') ) ? ' selected' :'';
			$html .= sprintf(__('<option %s value="%d">%s</option>', 'vedic-astro-api'), esc_attr($selected), esc_attr($value), esc_html($label) );
		}

		$html .= sprintf(__('</select></div></div><div class="kundli_vedic_group"><label for="panchang-moon-year" class="fs-16 lh-24 text-color ">%s</label><input id="panchang-moon-year" name="panchang-moon-year" class="clr-black fs-14 fw-600" value="%d"></div>', 'vedic-astro-api'), __('Enter an Year', 'vedic-astro-api'), esc_attr($year) );

		return $html;
	}

	/**
	 * Vedicastro panchang moon calendar shortcode
	 *
	 * @since    1.0.0
	*/

	public function vedicastro_panchang_moon_calendar_shortcode($atts)
	{

		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro-panchang-moon-calendar-shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-panchang-moon',
			'form-id'   => 'form-panchang-moon',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}

		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$form_padding = $this->vedicastro_form_padding();

		if ( is_array( $form_padding ) && !empty( $form_padding ) ) {
			$vedicastro_border_show = $form_padding["vedicastro_border_show"];
			$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		} else {
			$vedicastro_border_show = '';
			$vedicastro_title_show = '';
		}

		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

		$html = sprintf(__('<section class="moon_calendar_sec p-15 %s" id="moon_calendar_data"><div class="astro_container"><div class="choose_services_box bdr-gray prl-40 %s"><div class="astro_box %s %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_title_show), esc_attr($vedicastro_form), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Moon Calendar', 'vedic-astro-api') );

		$html .= $this->get_language_form();

		$html .= sprintf(__('</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form">', 'vedic-astro-api'), esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));

		$html .= $this->vedicastro_panchang_moon_form($args);

		$html .= sprintf(__('</div></div></div></div><div class="aquarius_sign display_nones %s" id="panchang-moon-data"></div></div></div></section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show));

		return $html;
	}

	/*
	* --- Vedicastro Monthly calender shortcode ----- *
	*/

	public function vedicastro_panchang_monthly_calendar_shortcode($atts)
	{
		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro-panchang-shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-panchang-monthly',
			'form-id'   => 'form-panchang-monthly',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}

		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$form_padding = $this->vedicastro_form_padding();

		if ( is_array( $form_padding ) && !empty( $form_padding ) ) {
			$vedicastro_border_show = $form_padding["vedicastro_border_show"];
			$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		} else {
			$vedicastro_border_show = '';
			$vedicastro_title_show = '';
		}
		
		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

		$html = sprintf(__('<section class="panchang_calendar_sec p-15 %s" id="panchang-monthly"><div class="astro_container"><div class="choose_services_box  bdr-gray prl-40 %s"><div class="astro_box %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_section_class), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Panchang -  Monthly Calendar', 'vedic-astro-api'));

		$html .= $this->get_language_form();

		$html .= sprintf(__('</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form">', 'vedic-astro-api'), esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));

		$html .=  $this->vedicastro_panchang_monyhly_form($args);

		$html .= sprintf(__('</div></div></div></div><div class="aquarius_sign display_nones %s" id="panchang-monthly-data"></div></div></div></section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show));

		return $html;

	}

	/*
	* --- Vedicastro Monthly calender form ----- *
	*/

	public function vedicastro_panchang_monyhly_form($args)
	{

		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();

		$html = sprintf(__('<form method="%s" name="%s" id="%s">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));

		$html .= wp_nonce_field('monthly_nonce_field', 'monthly_nonce', true, false);

		$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s"><div class="kundli_vedic_login_form">', 'vedic-astro-api'), esc_attr($user_lang));

		$html .= $this->get_current_year_dropdown();

		$html .= sprintf(__('<div class="kundli_vedic_group"><input id="panchang-monthly-submit" name="panchang-monthly-submit" type="submit" class="get_submit vedicastro_button" value="Get Monthly calender"></div></div></form>', 'vedic-astro-api'));

		return $html;
		
	}
	/*
	* --- Vedicastro hora mahurat shortcode ----- *
	*/
	public function vedicastro_hora_muhurats_shortcode($atts)
	{
		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro-hora-mahurat-shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-hora',
			'form-id'   => 'form-hora',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}

		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		/* padding border and title form */
		$form_padding = $this->vedicastro_form_padding();

		if ( is_array( $form_padding ) && !empty( $form_padding ) ) {

		$vedicastro_border_show = $form_padding["vedicastro_border_show"];
		$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		}
		else {
			$vedicastro_border_show = '';
			$vedicastro_title_show = '';
		}
		/* padding,border and title form */
		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

			$html = sprintf(__('<section class="panchang_sec p-15 %s" id="hura-mahurats">
			<div class="astro_container">
				<div class="choose_services_box bdr-gray prl-40 %s">
					<div class="astro_box %s">
						<div class="heading_title">
							<h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">
								<span>
									<a href="%s">
										<img src="%s" class="img_fluid" alt="arrow_left">
									</a>
								</span>
								<span>%s</span>
							</h2>
						</div>
						','vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show),esc_attr( $vedicastro_section_class ),esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Hora Mahurat', 'vedic-astro-api'));
	
						$html .= $this->get_language_form(); 
			

				$html .= sprintf(__('</div>
					<div class="astro_box_row %s">
						<div class="astro_grid %s">
							<div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue">
								<div class="kundli_vedic_form">','vedic-astro-api'),esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));
								$html .=  $this->vedicastro_form_hora_muhurat($args); 
								$html .= sprintf(__('</div>
							</div>
						</div>
					</div></div>
					<div class="lagan_chart_tabs_main display_nones %s" id="hora_data">
					</div>	
					<div class="lagan_chart_tabs_main display_nones %s" id="hora_err">
					</div>
		
		</div>
		</section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show));

		return $html;
	}
	
	/*
	* --- Vedicastro hora mahurat form ----- *
	*/

	public function vedicastro_form_hora_muhurat($args)
	{
		$data = $this->vedicastro_hora_mahurat_form_data();
	
		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();
		$location_latitude = isset($_REQUEST['user_location_latitude']) ? floatval($_REQUEST['user_location_latitude']) : floatval(VAAPI_LOCATION_LATITUDE);
		$location_longitude = isset($_REQUEST['user_location_longitude']) ? floatval($_REQUEST['user_location_longitude']) : floatval(VAAPI_LOCATION_LONGITUDE);
		$location_timezone = isset($_REQUEST['user_location_timezone']) ? floatval($_REQUEST['user_location_timezone']) : floatval(VAAPI_LOCATION_TIMEZONE);

		$html = sprintf(__('<form method="%s" name="%s" id="%s"><div class="kundli_vedic_login_form">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));

		$html .= wp_nonce_field('hora_nonce_field', 'hora_nonce', true, false); 

		$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s"><input type="hidden" name="user_location_latitude" class="user_location_latitude" value="%s"><input type="hidden" name="user_location_longitude" class="user_location_longitude" value="%s"><input type="hidden" name="user_location_timezone" class="user_location_timezone" value="%s">', 'vedic-astro-api'), esc_attr($user_lang), esc_attr($location_latitude), esc_attr($location_longitude),esc_attr($location_timezone));
		

	
				$html .= sprintf(__('<div class="kundli_vedic_login_form">','vedic-astro-api'));
				if (!empty($data['options'])) :
						foreach ($data['options'] as $key => $val) :
							if (isset($_REQUEST[$val['name']])) {
								$val['value'] = sanitize_text_field($_REQUEST[$val['name']]);
							}
							switch ($key):
								case 0:
								case 1: 
									$html .= sprintf(__('<div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val); 
									$html .= sprintf(__('</div>','vedic-astro-api'));
								break;
								case 2: 
									$html .= sprintf(__('<div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val); 
									$html .= $this->get_location_dropdown(); 
									$html .= sprintf(__('</div>','vedic-astro-api'));
								break;
								case 3: 
									$html .= sprintf(__('<div class="kundli_vedic_group">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val); 
									$html .= sprintf(__('</div>','vedic-astro-api'));
								break;
							endswitch;
						endforeach;
				endif;				
			$html .= sprintf(__('</div></form>','vedic-astro-api'));
		return $html;
	}

	/*
	* --- Vedicastro hora mahurat form data ----- *
	*/

	public function vedicastro_hora_mahurat_form_data()
	{
		$output = '';
		$output = array(
			'options' => array(

				array(
					'id'          => 'hora-date',
					'name'        => 'hora-date',
					'type'        => 'date',
					'title'       => __('Date', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Date', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'hora-time',
					'name'        => 'hora-time',
					'type'        => 'time',
					'title'       => __('Time', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Time', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'hora-location',
					'name'        => 'hora-location',
					'type'        => 'text',
					'title'       => __('location', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('location', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check location user_location_city',
					'value'		 => 'Delhi',
				),
				array(
					'id'          => 'hora-submit',
					'name'        => 'hora-submit',
					'type'        => 'submit',
					'data-input-class' => 'get_submit vedicastro_button',
					'value'       => __('Get Hora Mahurat ', 'vedic-astro-api'),
				),
			),
		);
		return $output;
	}

	/* 
	* --- Vedicastro choghadiya muhurats form Shortcode ---- *
	*/
	public function vedicastro_choghadiya_muhurats_shortcode($atts)
	{
		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro_choghadiya_muhurats_shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-choghadiya',
			'form-id'   => 'form-choghadiya',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}
		/* padding border and title form */
		$form_padding = $this->vedicastro_form_padding();
		$vedicastro_border_show = $form_padding["vedicastro_border_show"];
		$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		/* padding,border and title form */

		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

		$previous_page_url = $this->vedicastro_get_previous_page_url();

			$html = sprintf(__('<section class="panchang_sec p-15 %s" id="choghadiya-mahurat"><div class="astro_container"><div class="choose_services_box  bdr-gray prl-40 %s"><div class="astro_box %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_section_class), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Choghadiya Mahurat', 'vedic-astro-api'));

			$html .= $this->get_language_form();

			$html .= sprintf(__('</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form">', 'vedic-astro-api'), esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));

			$html .= $this->vedicastro_form_choghadiya_muhurat($args);

			$html .= sprintf(__('</div></div></div></div><div class="lagan_chart_tabs_main display_nones %s" id="choghadiya_data" > </div></div> </div></section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show));

		return $html;
	}

	/*
	* --- Vedicastro panchang shortcode ----- *
	*/
	public function vedicastro_panchang_shortcode($atts)
	{
		$atts = shortcode_atts(
		array(
			'show_form' => 'yes',
		),
		$atts,
		'vedicastro-panchang-shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-panchang',
			'form-id'   => 'form-panchang',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}

		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		/* padding border and title form */
		$form_padding = $this->vedicastro_form_padding();
		$vedicastro_border_show = $form_padding["vedicastro_border_show"];
		$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		/* padding,border and title form */

		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

			$html = sprintf(__('<section class="panchang_sec p-15 %s" id="panchang_sec_data"><div class="astro_container"><div class="choose_services_box  bdr-gray prl-40 %s"><div class="astro_box %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_section_class), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Panchang', 'vedic-astro-api'));

			$html .= $this->get_language_form();

			$html .= sprintf(__('</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form">', 'vedic-astro-api'), esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));

			$html .= $this->vedicastro_panchang_form($args);

			$html .= sprintf(__('</div></div></div></div><div class="panchang_group display_nones %s" id="vedicastro-panchang"></div></div></div></section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show));

		return $html;
	}

	/*
	--- Vedicastro choghadiya form input field -----
	*/
	public function vedicastro_choghadiya_mahurat_form_data()
	{
		$output = '';
		$output = array(
			'options' => array(

				array(
					'id'          => 'choghadiya-date',
					'name'        => 'choghadiya-date',
					'type'        => 'date',
					'title'       => __('Date', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Date', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'choghadiya-time',
					'name'        => 'choghadiya-time',
					'type'        => 'time',
					'title'       => __('Time', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Time', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'choghadiya-location',
					'name'        => 'choghadiya-location',
					'type'        => 'text',
					'title'       => __('location', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('location', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check location user_location_city',
					'value'		 => 'Delhi',
				),
				array(
					'id'          => 'choghadiya-submit',
					'name'        => 'choghadiya-submit',
					'type'        => 'submit',
					'data-input-class' => 'get_submit vedicastro_button',
					'value'       => __('Get choghadiya', 'vedic-astro-api'),
				),
			),
		);
		return $output;
	}

	/*
	--- Vedicastro choghadiya form  -----
	*/

	public function vedicastro_form_choghadiya_muhurat($args)
	{
		$data = $this->vedicastro_choghadiya_mahurat_form_data();
		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();
		$location_latitude = isset($_REQUEST['user_location_latitude']) ? floatval($_REQUEST['user_location_latitude']) : floatval(VAAPI_LOCATION_LATITUDE);
		$location_longitude = isset($_REQUEST['user_location_longitude']) ? floatval($_REQUEST['user_location_longitude']) : floatval(VAAPI_LOCATION_LONGITUDE);
		$location_timezone = isset($_REQUEST['user_location_timezone']) ? floatval($_REQUEST['user_location_timezone']) : floatval(VAAPI_LOCATION_TIMEZONE);
		
		$html = sprintf(__('<form method="%s" name="%s" id="%s"><div class="kundli_vedic_login_form">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));
		
		$html .= wp_nonce_field('choghadiya_nonce_field', 'choghadiya_nonce', true, false);

		$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s"><input type="hidden" name="user_location_latitude" class="user_location_latitude" value="%s"><input type="hidden" name="user_location_longitude" class="user_location_longitude" value="%s"><input type="hidden" name="user_location_timezone" class="user_location_timezone" value="%s">', 'vedic-astro-api'), esc_attr($user_lang), esc_attr($location_latitude), esc_attr($location_longitude),esc_attr($location_timezone)); 
		$html .= sprintf(__('<div class="kundli_vedic_login_form">', 'vedic-astro-api'));
			if (!empty($data['options'])) :
				foreach ($data['options'] as $key => $val) :
					if (isset($_REQUEST[$val['name']])) {
						$val['value'] = sanitize_text_field($_REQUEST[$val['name']]);
					}
					switch ($key):
						case 0:
						case 1: 
						$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val);
						$html .= sprintf(__('</div>', 'vedic-astro-api'));
						break;
						case 2: 
							$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val);
									$html .= $this->get_location_dropdown($val);
							$html .= sprintf(__('</div>', 'vedic-astro-api'));
						break;
						case 3:
							$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
								$html .= $this->vedicastro_form_field($val);
							$html .= sprintf(__('</div>', 'vedic-astro-api'));
						break;
					endswitch;
				endforeach;
			endif; 
			
		$html .= sprintf(__('</div></div> </form>', 'vedic-astro-api'));
		
		return $html;
	}
		
	/* 
	* ---  Vedicastro Gem & rudhraksh  Shortcode ---- *
	*/
	
	public function vedicastro_gem_stone_rudraksh_shortcode($atts)
	{
		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro-panchang-shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-rudraksh',
			'form-id'   => 'form-rudraksh',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}

		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();
		$previous_page_url = $this->vedicastro_get_previous_page_url();

		/* padding border and title form */
		$form_padding = $this->vedicastro_form_padding();
		$vedicastro_border_show = $form_padding["vedicastro_border_show"];
		$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		/* padding,border and title form */

		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

			$html = sprintf(__('<section class="panchang_sec p-15 %s" id="gem-rudhraksh"><div class="astro_container"><div class="choose_services_box  bdr-gray prl-40 %s"><div class="astro_box %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_section_class), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Gem Stone & Rudraksh', 'vedic-astro-api'));

			$html .= $this->get_language_form();

			$html .= sprintf(__('</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form">', 'vedic-astro-api'), esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));

			$html .= $this->vedicastro_form_rudhraksh($args);

			$html .= sprintf(__('</div></div></div></div> <div class="lagan_chart_tabs_main display_nones %s" id="rudraksh_res_data"></div><div class="lagan_chart_tabs_main display_nones %s" id="rudraksh_res"></div></div></div></section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show));

			return $html;
		
	}

	/* 
		---  Vedicastro Gem & rudhraksh form  ---- 
	*/

	public function vedicastro_form_rudhraksh($args)
	{

		$data = $this->vedicastro_form_rudhraksh_field_data();
		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();
		$location_latitude = isset($_REQUEST['user_location_latitude']) ? floatval($_REQUEST['user_location_latitude']) : floatval(VAAPI_LOCATION_LATITUDE);
		$location_longitude = isset($_REQUEST['user_location_longitude']) ? floatval($_REQUEST['user_location_longitude']) : floatval(VAAPI_LOCATION_LONGITUDE);
		$location_timezone = isset($_REQUEST['user_location_timezone']) ? floatval($_REQUEST['user_location_timezone']) : floatval(VAAPI_LOCATION_TIMEZONE);
		
			$html = sprintf(__('<form method="%s" name="%s" id="%s"><div class="kundli_vedic_login_form">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));

			$html .= wp_nonce_field('rudhraksh_nonce_field', 'rudhraksh_nonce', true, false); 

			$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s"><input type="hidden" name="user_location_latitude" class="user_location_latitude" value="%s"><input type="hidden" name="user_location_longitude" class="user_location_longitude" value="%s"><input type="hidden" name="user_location_timezone" class="user_location_timezone" value="%s">', 'vedic-astro-api'), esc_attr($user_lang), esc_attr($location_latitude), esc_attr($location_longitude),esc_attr($location_timezone));

			if (!empty($data['options'])) :
				foreach ($data['options'] as $key => $val) :
					if (isset($_REQUEST[$val['name']])) {
						$val['value'] = sanitize_text_field($_REQUEST[$val['name']]);
					}
					switch ($key):
						case 0:
						case 1:
							if ($key == 0) :
								$html .= sprintf(__('<div class="astro_col-12">
									<div class="kundli_vedic_group">', 'vedic-astro-api'));
											$html .= $this->vedicastro_form_field($val);
								$html .= sprintf(__('</div> </div>', 'vedic-astro-api'));
									
							endif;
							if ($key == 1) : 
								$html .= sprintf(__('<div class="kundli_vedic_group kundli_key">
									<div class="astro_col-8">
										<div class="kundli_vedic_group">', 'vedic-astro-api'));
											$html .= $this->vedicastro_form_field($val);
								$html .= sprintf(__('</div> </div>', 'vedic-astro-api'));
							endif;
							break;
						case 2:
							$html .= sprintf(__('<div class="astro_col-4">
									<div class="kundli_vedic_group">', 'vedic-astro-api'));
											$html .= $this->vedicastro_form_field($val);
								$html .= sprintf(__('</div> </div> </div>', 'vedic-astro-api'));										
						break;
						case 3: 
							$html .= sprintf(__('<div class="astro_col-12">
									<div class="kundli_vedic_group">', 'vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val);
									$html .= $this->get_location_dropdown($val);
								$html .= sprintf(__('</div> </div> ', 'vedic-astro-api'));									
						break;
						case 4: 
							$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val);
							$html .= sprintf(__('</div> ', 'vedic-astro-api'));
						break;
					endswitch;
				endforeach;
			endif; 
		$html .= sprintf(__('</div> </form>', 'vedic-astro-api'));
		
		return $html;
	}

	/* 
		---  Vedicastro Gem & rudhraksh input form field  ---- 
	*/

	public function vedicastro_form_rudhraksh_field_data()
	{
		$output = '';
		$output = array(
			'options' => array(
				array(
					'id'          => 'rudraksh-name',
					'name'        => 'rudraksh-name',
					'type'        => 'text',
					'title'       => __('Name', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Name', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),

				array(
					'id'          => 'rudraksh-date',
					'name'        => 'rudraksh-date',
					'type'        => 'date',
					'title'       => __('Date', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Date', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'rudraksh-time',
					'name'        => 'rudraksh-time',
					'type'        => 'time',
					'title'       => __('Time', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Time', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'rudraksh-location',
					'name'        => 'rudraksh-location',
					'type'        => 'text',
					'title'       => __('location', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('location', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check location user_location_city',
					'value'		 =>  'Delhi',
				),
				array(
					'id'          => 'rudraksh-submit',
					'name'        => 'rudraksh-submit',
					'type'        => 'submit',
					'data-input-class' => 'get_submit vedicastro_button',
					'value'       => __('get  rudraksh', 'vedic-astro-api'),
				),
			),
		);
		return $output;
	}

	/* 
	 * --- Vedicastro sade sati  Shortcode ---- *
	*/

	public function vedicastro_sade_sati_shortcode($atts)
	{
		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro-panchang-shortcode'
		);

		$args = array(
			'method' => 'post',
			'form-name' => 'form-sade-sati',
			'form-id' => 'form-sade-sati',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}
		
		$previous_page_url = $this->vedicastro_get_previous_page_url();

		/* padding border and title form */
		$form_padding = $this->vedicastro_form_padding();
		$vedicastro_border_show = $form_padding["vedicastro_border_show"];
		$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		/* padding,border and title form */

		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

			$html = sprintf(__('<section class="choose_services  kundli_sec p-15 %s" id="sade-sati-kundli"><div class="astro_container"><div class="choose_services_box  bdr-gray prl-40 %s"><div class="astro_box %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_section_class), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Sade sati', 'vedic-astro-api'));

			$html .= $this->get_language_form();

			$html .= sprintf(__('</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form">', 'vedic-astro-api'), esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));

			$html .= $this->vedicastro_form_sade_sati($args);

			$html .= sprintf(__('</div></div></div><div class="astro_grid" id="today_img_chart"></div></div> <div class="lagan_chart_tabs_main display_nones %s" id="sade_sati_res_data"></div></div></div></section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show));

			return $html;
						
	}

	/* 
	 * --- Vedicastro sade sati  form   ---- *
	*/

	public function vedicastro_form_sade_sati($args)
	{
		$data = $this->vedicastro_sade_sati_form_data();
		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();
		$location_latitude = isset($_REQUEST['user_location_latitude']) ? floatval($_REQUEST['user_location_latitude']) : floatval(VAAPI_LOCATION_LATITUDE);
		$location_longitude = isset($_REQUEST['user_location_longitude']) ? floatval($_REQUEST['user_location_longitude']) : floatval(VAAPI_LOCATION_LONGITUDE);
		$location_timezone = isset($_REQUEST['user_location_timezone']) ? floatval($_REQUEST['user_location_timezone']) : floatval(VAAPI_LOCATION_TIMEZONE);
		
			$html = sprintf(__('<form method="%s" name="%s" id="%s"><div class="kundli_vedic_login_form">', 'vedic-astro-api'), esc_attr($args['method']), esc_attr($args['form-name']), esc_attr($args['form-id']));

			$html .= wp_nonce_field('sade_sati_nonce_field', 'sade_sati_nonce', true, false); 

			$html .= sprintf(__('<input type="hidden" name="lang" class="astro_user_lang" value="%s"><input type="hidden" name="user_location_latitude" class="user_location_latitude" value="%s"><input type="hidden" name="user_location_longitude" class="user_location_longitude" value="%s"><input type="hidden" name="user_location_timezone" class="user_location_timezone" value="%s">', 'vedic-astro-api'), esc_attr($user_lang), esc_attr($location_latitude), esc_attr($location_longitude),esc_attr($location_timezone));

			if (!empty($data['options'])) :
				foreach ($data['options'] as $key => $val) :
					if (isset($_REQUEST[$val['name']])) {
						$val['value'] = sanitize_text_field($_REQUEST[$val['name']]);
					}
					switch ($key):
						case 0: 
							$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
								$html .= $this->vedicastro_form_field($val);
							$html .= sprintf(__('</div>', 'vedic-astro-api'));

						break;
						case 1:
						case 2:
							if ($key == 1) : 
								$html .= sprintf(__('<div class="choose_services_row">
									<div class="astro_col-8">
										<div class="kundli_vedic_group">', 'vedic-astro-api'));
												$html .= $this->vedicastro_form_field($val);
										$html .= sprintf(__('</div></div>', 'vedic-astro-api'));
								endif;
							if ($key == 2) :
									$html .= sprintf(__('<div class="astro_col-4">
										<div class="kundli_vedic_group">', 'vedic-astro-api'));
												$html .= $this->vedicastro_form_field($val);
											$html .= sprintf(__('</div></div>', 'vedic-astro-api'));
								endif;
							if ($key == 2) :
								$html .= sprintf(__('</div>', 'vedic-astro-api'));
								endif;
							break;
						case 3: 
								$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val);
									$html .= $this->get_location_dropdown($val);												
								$html .= sprintf(__('</div>', 'vedic-astro-api'));
							break;
							case 4: 
								$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val);
								$html .= sprintf(__('</div>', 'vedic-astro-api'));
						break;
						case 5: 
								$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val);
								$html .= sprintf(__('</div>', 'vedic-astro-api'));
						break;
						case 6: 
								$html .= sprintf(__('<div class="kundli_vedic_group">', 'vedic-astro-api'));
									$html .= $this->vedicastro_form_field($val);
								$html .= sprintf(__('</div>', 'vedic-astro-api'));
						break;
					endswitch;
				endforeach;
			endif; 
			$html .= sprintf(__('</div> </form>', 'vedic-astro-api'));
		return  $html;
			
	}	
	
	/* 
	 * --- Vedicastro sade sati  form input field  ---- *
	*/

	public function vedicastro_sade_sati_form_data()
	{
		$output = '';
		$output = array(
			'options' => array(
				array(
					'id'          => 'sade-sati-name',
					'name'        => 'sade-sati-name',
					'type'        => 'text',
					'title'       => __('Name', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Name', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),

				array(
					'id'          => 'sade-sati-date',
					'name'        => 'sade-sati-date',
					'type'        => 'date',
					'title'       => __('Date', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Date', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'sade-sati-time',
					'name'        => 'sade-sati-time',
					'type'        => 'time',
					'title'       => __('Time', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('Time', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check',
				),
				array(
					'id'          => 'sade-sati-location',
					'name'        => 'sade-sati-location',
					'type'        => 'text',
					'title'       => __('location', 'vedic-astro-api'),
					'data-label-class' => 'fs-16 lh-24',
					'placeholder' => __('location', 'vedic-astro-api'),
					'data-input-class' => 'fs-16 lh-24 check location user_location_city',
					'value'		 =>  'Delhi',
				),
				array(
					'id'          => 'sade-sati-submit',
					'name'        => 'sade-sati-submit',
					'type'        => 'submit',
					'data-input-class' => 'get_submit vedicastro_button',
					'value'       => __('Get Sadesati', 'vedic-astro-api'),
				),
			),
		);
		return $output;
	}

	/**
	 * Vedicastro matching shortcode
	*/

	public function vedicastro_matching_shortcode($atts)
	{
		$atts = shortcode_atts(
			array(
				'show_form' => 'yes',
			),
			$atts,
			'vedicastro-matching-shortcode'
		);

		$args = array(
			'method'    => 'post',
			'form-name' => 'form-matching',
			'form-id'   => 'form-matching',
		);

		if (!empty($atts) && array_key_exists('show_form', $atts) && $atts['show_form'] == 'no') {
			$args['show_form'] = 'no';
		} else {
			$args['show_form'] = 'yes';
		}

		$user_lang = isset($_REQUEST['lang']) ? sanitize_text_field($_REQUEST['lang']) : $this->user_selected_lang();
		$previous_page_url = $this->vedicastro_get_previous_page_url();


		/* padding border and title form */
		$form_padding = $this->vedicastro_form_padding();
		$vedicastro_border_show = $form_padding["vedicastro_border_show"];
		$vedicastro_title_show = $form_padding["vedicastro_title_show"];
		/* padding,border and title form */


		$vedicastro_form = $args['show_form'] == 'yes' ? '' : ' display_none';
		$vedicastro_section_class = $vedicastro_title_show . $vedicastro_form;

		$html = sprintf(__('<section class="panchang_sec p-15 %s" id="service-matching"><div class="astro_container"><div class="choose_services_box  bdr-gray prl-40 %s"><div class="astro_box %s"><div class="heading_title"><h2 class="fs-40 lh-48 clr-black1 fw-700 m_0"><span><a href="%s"><img src="%s" class="img_fluid" alt="arrow_left"></a></span><span>%s</span></h2></div>', 'vedic-astro-api'), esc_attr($vedicastro_border_show), esc_attr($vedicastro_border_show), esc_attr($vedicastro_section_class), esc_url($previous_page_url), esc_url(VEDICASTRO_URL . 'public/images/icon/arrow_left.png'), __('Matching', 'vedic-astro-api'));

		$html .= $this->get_language_form();

		$html .= sprintf(__('</div><div class="astro_box_row %s"><div class="astro_grid %s"><div class="kundli_vedic bdr-gray1 bg-grey1 bg-sky-blue"><div class="kundli_vedic_form maching_data_form">', 'vedic-astro-api'), esc_attr($vedicastro_form), esc_attr($vedicastro_border_show));

		$html .= $this->vedicastro_matching_form($args);
		$html .= $this->vedicastro_matching_buttion_wrapper($args);

		$html .= sprintf(__('</div></div></div></div><div class="maching_main_tab_all_chart display_nones %s" id="maching-results"></div></div> </div></section>', 'vedic-astro-api'), esc_attr($vedicastro_border_show));

		return $html;
	}

	/**
	 * Vedicastro matching button wrapper
	 *
	 * @since    1.0.0
	*/

	public function vedicastro_matching_buttion_wrapper()
	{
		$data = $this->vedicastro_matching_button();
		if (!empty($data)) :
			
			$html = sprintf(__('<div class="indian_maching_data">
					<div class="choose_services_row">','vedic-astro-api'));
						
						foreach ($data as $data_key => $data_val) :
							if (isset($_REQUEST['get-matching'])) {
								$data_val['data-id'] = sanitize_text_field($_REQUEST['get-matching']);
							} 
							$html .= sprintf(__('<div class="astro_col-6">
								<div class="indian_maching vedicastro_tab_button  mlr-15">','vedic-astro-api'));
									$html .= $this->vedicastro_form_field($data_val	);
							$html .= sprintf(__('</div></div>', 'vedic-astro-api'));
						endforeach;
			$html .= sprintf(__('</div></div>', 'vedic-astro-api'));
		endif;
		return $html;
	}
	
	/**
	 * Vedicastro matching button
	 *
	 * @since    1.0.0
	*/
	public function vedicastro_matching_button()
	{
		$button = '';
		$button = array(
			array(
				'id'          => 'north-indian-submit',
				'name'        => 'north-indian-submit',
				'type'        => 'anchor',
				'data-input-class' => 'fs-16 lh-24 fw-400 active matching-button vedicastro_button ',
				'data-id'     => 'north-indian',
				'value'       => __('Get North Indian Matching', 'vedic-astro-api'),
			),

			array(
				'id'          => 'south-indian-submit',
				'name'        => 'south-indian-submit',
				'type'        => 'anchor',
				'data-input-class' => 'fs-16 lh-24 fw-400 matching-button vedicastro_button',
				'data-id'     => 'south-indian',
				'value'       => __('Get South Indian matching', 'vedic-astro-api'),

			)
		);
		return $button;
	}

	/**
	 * Vedicastro date valiate 
	 *
	 * @since    1.0.0
	*/
	public function vaapi_validate_date_field( $date, $format = 'Y-m-d' )
	{
		
			if (!$date) {
				return date($format);
			}

			$dateformat = 	preg_replace("([^0-9/-])", "", $date);

		    return  $dateformat;
			
	}

}
