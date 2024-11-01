<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sohamsolution.com
 * @since      1.0.0
 *
 * @package    Vedic_Astro_Api
 * @subpackage Vedic_Astro_Api/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Vedic_Astro_Api
 * @subpackage Vedic_Astro_Api/public
 * @author     Vedic Astro 
 * <care@vedicastroapi.com>
 */
class Vedic_Astro_Api_Public
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
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        add_action("wp_ajax_vedicastro_prediction_ajax", [
            $this,
            "vedicastro_prediction_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_prediction_ajax", [
            $this,
            "vedicastro_prediction_ajax",
        ]);
        add_action("wp_ajax_vedicastro_location_ajax", [
            $this,
            "vedicastro_location_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_location_ajax", [
            $this,
            "vedicastro_location_ajax",
        ]);

        add_action("wp_ajax_vedicastro_kundali_ajax", [
            $this,
            "vedicastro_kundali_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_kundali_ajax", [
            $this,
            "vedicastro_kundali_ajax",
        ]);
        add_action("wp_ajax_vedicastro_matching_ajax", [
            $this,
            "vedicastro_matching_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_matching_ajax", [
            $this,
            "vedicastro_matching_ajax",
        ]);
        add_action("wp_ajax_vedicastro_panchang_moon_ajax", [
            $this,
            "vedicastro_panchang_moon_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_panchang_moon_ajax", [
            $this,
            "vedicastro_panchang_moon_ajax",
        ]);
        add_action("wp_ajax_vedicastro_panchang_ajax", [
            $this,
            "vedicastro_panchang_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_panchang_ajax", [
            $this,
            "vedicastro_panchang_ajax",
        ]);
        add_action("wp_ajax_vedicastro_retro_ajax", [
            $this,
            "vedicastro_retro_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_retro_ajax", [
            $this,
            "vedicastro_retro_ajax",
        ]);
        add_action("wp_ajax_vedicastro_numberology_ajax", [
            $this,
            "vedicastro_numberology_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_numberology_ajax", [
            $this,
            "vedicastro_numberology_ajax",
        ]);
        add_action("wp_body_open", [$this, "vedicastro_preloader"]);

        add_action("wp_ajax_vedicastro_panchang_monthly_ajax", [
            $this,
            "vedicastro_panchang_monthly_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_panchang_monthly_ajax", [
            $this,
            "vedicastro_panchang_monthly_ajax",
        ]);

        add_action("wp_ajax_vedicastro_hora_muhurats_ajax", [
            $this,
            "vedicastro_hora_muhurats_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_hora_muhurats_ajax", [
            $this,
            "vedicastro_hora_muhurats_ajax",
        ]);

        add_action("wp_ajax_vedicastro_choghadiya_muhurats_ajax", [
            $this,
            "vedicastro_choghadiya_muhurats_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_choghadiya_muhurats_ajax", [
            $this,
            "vedicastro_choghadiya_muhurats_ajax",
        ]);

        add_action("wp_ajax_vedicastro_sade_sati_ajax", [
            $this,
            "vedicastro_sade_sati_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_sade_sati_ajax", [
            $this,
            "vedicastro_sade_sati_ajax",
        ]);

        add_action("wp_ajax_vedicastro_gem_rudraksh_ajax", [
            $this,
            "vedicastro_gem_rudraksh_ajax",
        ]);
        add_action("wp_ajax_nopriv_vedicastro_gem_rudraksh_ajax", [
            $this,
            "vedicastro_gem_rudraksh_ajax",
        ]);

        add_action("wp_ajax_paryantardasha_response_ajax", [
            $this,
            "paryantardasha_response_ajax",
        ]);
        add_action("wp_ajax_nopriv_paryantardasha_response_ajax", [
            $this,
            "paryantardasha_response_ajax",
        ]);
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
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

        wp_enqueue_style(
            "vedicastro-circle",
            VEDICASTRO_URL . "public/css/vedicastro-circle.css",
            [],
            $this->version,
            "all"
        );
        wp_enqueue_style(
            $this->plugin_name,
            VEDICASTRO_URL . "public/css/vedic-astro-api-public.css",
            [],
            $this->version,
            "all"
        );
        wp_enqueue_style(
            "vedicastro-reset",
            VEDICASTRO_URL . "public/css/vedicastro-reset.css",
            [],
            $this->version,
            "all"
        );
        wp_enqueue_style(
            "vedicastro-responsive",
            VEDICASTRO_URL . "public/css/vedicastro-responsive.css",
            [],
            $this->version,
            "all"
        );
        wp_enqueue_style(
            "google-fonts",
            "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap",
            false
        );
        $custom_css = "";
        $vedicastro_setting = get_option("vedicastro_setting");

        if (is_array($vedicastro_setting) && !empty($vedicastro_setting)) {

            $vedicastro_bg_color = !empty($vedicastro_setting["vedicastro_bg_color"])
                ? sanitize_text_field($vedicastro_setting["vedicastro_bg_color"])
                : "#ebf5ff";
            $vedicastro_form_border_color = !empty($vedicastro_setting["vedicastro_form_border_color"])
                ? sanitize_text_field($vedicastro_setting["vedicastro_form_border_color"])
                : "#007bff";
            $vedicastro_form_color = !empty($vedicastro_setting["vedicastro_form_color"])
                ? sanitize_text_field($vedicastro_setting["vedicastro_form_color"])
                : "#000000";
            $vedicastro_button_bg_color = !empty($vedicastro_setting["vedicastro_button_bg_color"])
                ? sanitize_text_field($vedicastro_setting["vedicastro_button_bg_color"])
                : "#007bff";
            $vedicastro_button_color = !empty($vedicastro_setting["vedicastro_button_color"])
                ? sanitize_text_field($vedicastro_setting["vedicastro_button_color"])
                : "#ffffff";
            $vedicastro_button_border_color = !empty($vedicastro_setting["vedicastro_button_border_color"])
                ? sanitize_text_field($vedicastro_setting["vedicastro_button_border_color"])
                : "#007bff";
            $vedicastro_button_tab_color = !empty($vedicastro_setting["vedicastro_button_tab_color"])
                ? sanitize_text_field($vedicastro_setting["vedicastro_button_tab_color"])
                : "#ebf5ff";
            $vedicastro_button_tab_bg_color = !empty($vedicastro_setting["vedicastro_button_tab_bg_color"])
                ? sanitize_text_field($vedicastro_setting["vedicastro_button_tab_bg_color"])
                : "#007bff";

            if (
                !empty($vedicastro_bg_color) ||
                !empty($vedicastro_form_border_color)
            ) :
                $custom_css .=
                    '.bg-sky-blue {
                                        background: ' .
                    esc_attr($vedicastro_bg_color) .
                    ' !important;
                                        border: 1px solid ' .
                    esc_attr($vedicastro_form_border_color) .
                    ' !important;
                                    }';
            endif;
            if (!empty($vedicastro_form_color)) :
                $custom_css .=
                    '.text-color , ::-webkit-input-placeholder { 
                                        color: ' .
                    esc_attr($vedicastro_form_color) .
                    ' !important;
                                    }';
            endif;
            if (
                !empty($vedicastro_button_color) ||
                !empty($vedicastro_button_bg_color) ||
                !empty($vedicastro_button_border_color)
            ) :
                $custom_css .=
                    '.vedicastro_tab_button a.active {
                                        background: ' .
                    esc_attr($vedicastro_button_bg_color) .
                    ' !important;
                                        color: ' .
                    esc_attr($vedicastro_button_tab_color) .
                    ' !important;
                                        border: 1px solid ' .
                    esc_attr($vedicastro_button_border_color) .
                    ' !important;
                                    }';
            endif;
            if (
                !empty($vedicastro_button_tab_bg_color) ||
                !empty($vedicastro_button_color)
            ) :
                $custom_css .=
                    '.vedicastro_button {
                                        color: ' .
                    esc_attr($vedicastro_button_color) .
                    ' !important;
                                        background: ' .
                    esc_attr($vedicastro_button_tab_bg_color) .
                    ' !important;
                                        border: 1px solid ' .
                    esc_attr($vedicastro_button_border_color) .
                    ' !important;
                                    }';
            endif;
            wp_add_inline_style($this->plugin_name, $custom_css);
        }
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
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

        wp_enqueue_script(
            $this->plugin_name,
            VEDICASTRO_URL . "public/js/vedic-astro-api-public.js",
            ["jquery"],
            $this->version,
            false
        );
        wp_localize_script(
            $this->plugin_name,
            "vedicastro_public_ajax_object",
            array("ajax_url" => esc_url(admin_url("admin-ajax.php")))
        );
    }

    /**
     * Vedicastro preloader
     *
     * @since    1.0.0
     */
    public function vedicastro_preloader()
    {

        echo wp_kses_post(sprintf(__('<section class="Preloader" style="display:none;">
            <div class="LoaderSection">
                <div class="loader_center">
                    <div class="loader">
                        <img src="%s" class="img_fluid"></div>
                        <div class="status fs-24">%s</div>
                    </div>
                </div>
            </section>', 'vedic-astro-api'), esc_url(VEDICASTRO_URL . "public/images/spinner_loader.gif"), __('Loading...', 'vedic-astro-api')));
    }

    /**
     * Vedicastro google api key
     *
     * @since    1.0.0
     */
    public function vedicastro_google_api_key()
    {
        $output = "";
        $vedicastro_setting = get_option('vedicastro_setting');
        $vedicastro_apikey = '';

        if (is_array($vedicastro_setting) && !empty($vedicastro_setting)) :

            foreach ($vedicastro_setting as $valk => $valv) :

                switch ($valk):

                    case "vedicastro_apikey":

                        $vedicastro_apikey = !empty($valv) ? sanitize_text_field($valv) : "";

                        break;

                endswitch;

            endforeach;

            $output = $vedicastro_apikey;

        endif;

        return $output;
    }

    /**
     * Vedicastro get chart color
     *
     * @since    1.0.0
     */
    public function vedicastro_get_chart_color()
    {
        $output = "";
        $vedicastro_setting = json_decode(
            get_option("vedicastro_setting"),
            true
        );
        if (!empty($vedicastro_setting)) :
            foreach ($vedicastro_setting as $valk => $valv) :
                switch ($valk):
                    case "vedicastro_chart_color":
                        $vedicastro_chart_color = !empty($valv)
                            ? str_replace("#", "%23", $valv)
                            : str_replace("#", "%23", "#000000");
                        break;
                endswitch;
            endforeach;
        endif;
        if (!empty($vedicastro_chart_color)) :
            $output = $vedicastro_chart_color;
        else :
            $output = str_replace("#", "%23", "#000000");
        endif;
        return $output;
    }

    /**
     * Vedicastro api
     *
     * @since    1.0.0
     */
    public function vedicastro_prediction_api($prediction, $api_data)
    {
        $output = "";
        $buil_query = build_query($api_data);
        $url =
            VEDIC_ASTRO_API_ROOT_URL .
            'prediction/' .
            $prediction .
            "?" .
            $buil_query;
        $response = wp_remote_get($url);

        $output = json_decode($response["body"], true);
        return $output;
    }

    /**
     * Vedicastro api
     *
     * @since    1.0.0
     */
    public function vedicastro_api($endpoint, $api_data)
    {

        $output = array();
        $buil_query = build_query($api_data);
        $url = VEDIC_ASTRO_API_ROOT_URL . '' . $endpoint . "?" . $buil_query;
        $response = wp_remote_get($url);

        if (is_array($response) && !empty($response)) {

            $output = json_decode($response["body"], true);
        }

        return $output;
    }

    /**
     * Vedicastro google api
     *
     * @since    1.0.0
     */
    public function vedicastro_google_api($api_data)
    {
        $output = "";
        $buil_query = build_query($api_data);
        $url =
            VEDIC_ASTRO_API_ROOT_URL . "utilities/geo-search?" .
            $buil_query;
        $response = wp_remote_get($url);
        $output = json_decode($response["body"], true);
        return $output;
    }

    /**
     * Vedicastro mahadasha api
     *
     * @since    1.0.0
     */
    public function vedicastro_mahadasha_api($endpoint, $api_data)
    {
        $output = "";
        $buil_query = build_query($api_data);
        $url =
            VEDIC_ASTRO_API_ROOT_URL .
            '' .
            $endpoint .
            "?" .
            $buil_query;
        $response = wp_remote_get($url);
        $output = json_decode($response["body"], true);
        return $output;
    }

    /**
     * Vedicastro ashtakvarga api
     *
     * @since    1.0.0
     */
    public function vedicastro_ashtakvarga_api($endpoint, $api_data)
    {
        $output = "";
        $buil_query = build_query($api_data);
        $url =
            VEDIC_ASTRO_API_ROOT_URL .
            '' .
            $endpoint .
            "?" .
            $buil_query;
        $response = wp_remote_get($url);
        $output = json_decode($response["body"], true);
        return $output;
    }

    /**
     * Vedicastro SVG api
     *
     * @since    1.0.0
     */
    public function vedicastro_svg_api($endpoint, $api_data)
    {
        $output = "";
        $buil_query = build_query($api_data);
        $url =
            VEDIC_ASTRO_API_ROOT_URL .
            '' .
            $endpoint .
            "?" .
            $buil_query;
        $response = wp_remote_get($url);
        $output = $response["body"];
        return $output;
    }

    /**
     * Vedicastro chart data
     *
     * @since    1.0.0
     */

    public function vedicastro_chart_data()
    {
        $output = array(
            "D1" => __("Lagna", "vedic-astro-api"),
            "D3" => __("Dreshkana", "vedic-astro-api"),
            "D3-s" => __("D3-Somanatha", "vedic-astro-api"),
            "D7" => __("Saptamsa", "vedic-astro-api"),
            "D9" => __("Navamsa", "vedic-astro-api"),
            "D10" => __("Dasamsa", "vedic-astro-api"),
            "D10-R" => __("Dasamsa-EvenReverse", "vedic-astro-api"),
            "D12" => __("Dwadasamsa", "vedic-astro-api"),
            "D16" => __("Shodashamsa", "vedic-astro-api"),
            "D20" => __("Vimsamsa", "vedic-astro-api"),
            "D24" => __("ChaturVimshamsha", "vedic-astro-api"),
            "D24-R" => __("D24-R", "vedic-astro-api"),
            "D30" => __("Trimshamsha", "vedic-astro-api"),
            "D40" => __("KhaVedamsa", "vedic-astro-api"),
            "D45" => __("AkshaVedamsa", "vedic-astro-api"),
            "D60" => __("Shastiamsha", "vedic-astro-api"),
            "chalit" => __("Bhav-Chalit", "vedic-astro-api"),
        );
        return $output;
    }

    /**
     * Vedicastro chart image dropdown
     *
     * @since    1.0.0
     */
    public function vedicastro_chart_img_dropdown($data, $id, $ul_id, $class = "")
    {

        $output = "";
        $chart_data = $this->vedicastro_chart_data();

        if (!empty($data)) :

            foreach ($chart_data as $vedicastro_chart_key => $vedicastro_chart_val) :

                if ($vedicastro_chart_key == $data) :

                    $text = sprintf(__('%s - %s', "vedic-astro-api"), $vedicastro_chart_key, $vedicastro_chart_val);

                endif;

            endforeach;

        else :

            $text = __("D9 Navamsha", "vedic-astro-api");

        endif;

        if (is_array($chart_data) && !empty($chart_data)) :

            $output .= sprintf(__('<div class="vedicastro-chart-img-dropdown %s"><div class="drop_lagan_chart_content"><p class="fs-16 lh-24 fw-700 clr-blue  text_center">%s</p><div class="chart-wrapper" id="%s-wrapper"><label>%s</label><select class="chart-content-menu p_0" id="%s">', 'vedic-astro-api'), esc_attr($class), esc_html($text),  esc_attr($ul_id), __("Change", "vedic-astro-api"), esc_attr($ul_id));

            foreach ($chart_data as $chart_data_key => $chart_data_val) :

                $chart_data_key_val = $chart_data_key . ' - ' . $chart_data_val;

                $output .= sprintf(__('<option value="%s" %s data-code="%s" data-code-title="%s">%s</option>', 'vedic-astro-api'), esc_attr($chart_data_key), selected($data, $chart_data_key, false), esc_attr($chart_data_key), esc_attr($chart_data_val), esc_html($chart_data_key_val));

            endforeach;

            $output .= sprintf(__('</select></div></div></div>', 'vedic-astro-api'));

        endif;

        return $output;
    }

    /**
     * Vedicastro change style
     *
     * @since    1.0.0
     */

    public function vedicastro_change_style($style, $section)
    {

        $html = '';
        $text = "";
        if ($style == "north") :
            $style = "south";
            $text = "Click here for South Style";
        else :
            $style = "north";
            $text = "Click here for North Style";
        endif;

        $html .= sprintf(__('<div class="vedicastro-lagan-chart-contents" data-section="%s"><p class="fs-16 lh-24 fw-700 clr-blue text_center">%s</p><a href="#" data-style="%s">%s</a></div>', 'vedic-astro-api'), esc_attr($section), __("Lagna Chart", "vedic-astro-api"), esc_attr($style), esc_html($text));

        return $html;
    }

    /*
        *vedicastro location ajax end
        */

    public function vedicastro_location_ajax()
    {

        $output = "";
        $location = isset($_POST["location"]) ? sanitize_text_field($_POST["location"]) : 'Delhi';
        $api_key = $this->vedicastro_google_api_key();

        if (is_string($api_key) && !empty($api_key)) {

            $api_google_data = [
                "city" => $location,
                "api_key" => $api_key,
            ];

            $get_google_location = $this->vedicastro_google_api($api_google_data);

            if (is_array($get_google_location) && !empty($get_google_location)) {

                $status = $get_google_location["status"];

                if ($status == 200) :

                    $response = $get_google_location["response"];

                    foreach ($response as $key) :

                        if (!empty($key["current_dst"])) {

                            $timezone = $key["tz_dst"];
                        } else {

                            $timezone = $key["tz"];
                        }

                        $timezonearray = str_split($timezone);

                        if ($timezonearray[0] != '-') {

                            $string1         = '+';
                            $string2         = $timezone;
                            $countrytimezone = $string1 . '' . $string2;
                        } else {

                            $countrytimezone = $timezone;
                        }

                        $output .= sprintf(__('<li data-lat="%f" data-lon="%f" data-tz="%f"><p class="country">%s</p><span>Timezone: %s</span></li>', 'vedic-astro-api'), floatval($key["coordinates"][0]), floatval($key["coordinates"][1]), floatval($timezone), esc_html($key["full_name"]), esc_html($countrytimezone));

                    /*$output .= '<li data-lat="' . esc_attr( $key["coordinates"][0] ) . '" data-lon="' . esc_attr( $key["coordinates"][1] ) . '" data-tz="' . esc_attr( $timezone ) . '"><p class="country">' . esc_html( $key["full_name"] ) . "</p>
                                <span>" . 'Timezone: ' . esc_html( $countrytimezone ) . " </span>
                            </li>";*/

                    endforeach;

                    echo json_encode(array("status" => "success", "html" => $output));

                else :

                    echo json_encode(
                        array(
                            "status" => "error",
                            "message" => __("Something went wrong", "vedic-astro-api"),
                        )
                    );

                endif;
            } else {

                echo json_encode(
                    array(
                        "status" => "error",
                        "message" => __("No result found", "vedic-astro-api"),
                    )
                );
            }
        } else {

            echo json_encode(
                array(
                    "status" => "error",
                    "message" => __("API key missing", "vedic-astro-api"),
                )
            );
        }

        wp_die();
    }
    /*
    *vedicastro location ajax end
    *?

        /*
         * Vedicastro predection ajax
        *
        * @since    1.0.0
        */

    public function vedicastro_prediction_ajax()
    {
        $output = '';
        $nonce_value = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : '';

        if (
            empty($nonce_value) || !wp_verify_nonce($nonce_value, 'prediction_nonce_field')
        ) {

            json_encode(
                array(
                    "status" => "error",
                    "message" => __("No result found", 'vedic-astro-api'),
                )
            );

            wp_die();
        } else {

            $zodic_sign = isset($_POST['zodiac']) ? sanitize_text_field($_POST['zodiac']) : '';
            $cycle = isset($_POST['cycle']) ? sanitize_text_field($_POST['cycle']) : '';

            $type = isset($_POST['typee']) ? sanitize_text_field($_POST['typee']) : '';
            $todadata = date('d/m/Y');
            $language = isset($_POST['lang']) ? sanitize_text_field($_POST['lang']) : '';

            switch ($cycle):

                case 'daily':

                    $day = isset($_POST['day']) ? sanitize_text_field($_POST['day']) : '';
                    $tomorrow = date("d/m/Y", strtotime("+1 day"));

                    if (!empty($day)) :

                        if ($day == 'today') :

                            $api_data['date'] = $todadata;

                        else :

                            $api_data['date'] = $tomorrow;

                        endif;

                    else :

                        $api_data['date'] = $todadata;

                    endif;

                    break;

                case 'weekly':

                    $week = isset($_POST['week']) ? sanitize_text_field($_POST['week']) : '';

                    if (!empty($week)) :

                        if ($week == 'thisweek') :

                            $api_data['week'] = 'thisweek';

                        else :

                            $api_data['week'] = 'nextweek';

                        endif;

                    else :

                        $api_data['week'] = 'thisweek';

                    endif;

                    break;

                case 'yearly':

                    $api_data['year'] = date('Y');

                    break;

            endswitch;

            $vedicastro_setting = get_option('vedicastro_setting');

            if (is_array($vedicastro_setting) && !empty($vedicastro_setting)) :

                foreach ($vedicastro_setting as $valk => $valv) :

                    switch ($valk):

                        case 'vedicastro_apikey':

                            $api_key = !empty($valv) ? $valv : '';

                            break;

                        case 'vedicastro_sign_list':

                            $vedicastro_sign = !empty($valv) ? $valv : '';

                            break;

                    endswitch;

                endforeach;

            endif;

            $api_data['zodiac'] = $zodic_sign;
            $api_data['lang'] = $language;
            $api_data['show_same'] = true;
            $api_data['type'] = 'big';
            $api_data['split'] = true;
            $api_data['api_key'] = $api_key;
            $vedicastro_sign_list_dash = '';

            if ($vedicastro_sign && $cycle != 'yearly') {
                $vedicastro_sign_list_dash = '-' . $vedicastro_sign;
            }


            $prediction = $cycle . $vedicastro_sign_list_dash;

            $get_data = $this->vedicastro_prediction_api($prediction, $api_data);

            //print_r($get_data);

            $status = $get_data['status'];

            if ($status == 200) :
                $response = $get_data['response'];
                $i = 1;

                switch ($cycle):
                    case 'daily':
                        $days = $this->vedicastro_days_list();
                        if (!empty($days)) :
                            if (isset($response['lucky_color'])) {
                                $lucky_colors = $response['lucky_color'];
                            } else {
                                $lucky_colors = '';
                            }
                            $lucky_num = implode(',', $response['lucky_number']);
                            $output .= '<div class="daily_head">
                                <h4 class="clr-black fs-20 fw-500">Total</h4>
                                <p class="clr-black1 fs-14"><strong class="lucky_clr fw-700">Lucky Color:</strong><span class="clr_' . esc_attr($lucky_colors) . ' clr">' . esc_html__($lucky_colors, 'vedic-astro-api') . '</span><span class="lucky_color_code" style="background-color: ' . esc_attr($response['lucky_color_code']) . '"></span></p>
                                <p class="clr-black1 fs-14"><strong class="lucky_num fw-700">Lucky Number:</strong><span class="number_luck">' . esc_html__($lucky_num, "vedic-astro-api") . '</span></p>
                            </div>';
                        endif;
                        break;
                    case 'weekly':
                        $weekly = $this->vedicastro_weekly_list();
                        /* var_dump( $api_data['week'] );
                        Var_dump($weekly_key);*/
                        if (!empty($weekly)) :
                            $output .= '<div class="daily_head">
                                <form class="multi_form" action="#" method="post" id="multi_form_data" name="multi_form_data">
                                <div class="custom-select">
                                    <select id="week" class="clr-gray fs-14" data-click="cycles" data-title="weekly">';
                            foreach ($weekly as $weekly_key => $weekly_val) :
                                $output .= '<option value="' . esc_attr($weekly_key) . '" ' . selected($api_data['week'], $weekly_key, false) . '>' . esc_html__($weekly_val, 'vedic-astro-api') . '</option>';
                            endforeach;
                            $output .= '</select>
                                </div>
                                </form>
                            </div>';
                        endif;
                        break;
                    case 'yearly':
                        $cat_arr = $this->get_predictions_categories();

                        foreach ($response as $k => $data) :
                            $total_score = absint($data['score']) /* 100*/;
                            $total_color = 'gradient_blue';
                            $output .= '<div class="daily_head">
                                <h4 class="clr-black fs-20 fw-500">' . esc_html__($data['period'], 'vedic-astro-api') . ', ' . date('Y') . '</h4>
                            </div>';
                            $output .= '<div class="gradient_row">';
                            $output .= '<div class="gradient_box">
                                    <div class="gradient_clr ' . esc_attr($total_color) . '">
                                        <div class="gradient_left">
                                            <span class="fs-40 fw-600 lh-48">' . esc_html__($total_score, 'vedic-astro-api') . '<sub class="fs-10 lh-40">%</sub></span>
                                            <p class="fs-20 lh-24 fw-500">Total</p>                             
                                        </div>
                                    </div>
                                    <div class="gradient_content bdr-gray">
                                        <p class="fs-14 lh-21 clr-darkblack">' . esc_html__($data['prediction'], 'vedic-astro-api') . '</p>
                                    </div>
                                </div>';

                            foreach ($data as $key => $val) {
                                if (in_array($key, $cat_arr) && !empty($data[$key])) {
                                    $score = absint($data[$key]['score']) /* 100*/;
                                    $prediction = $data[$key]['prediction'];
                                    $color = $this->get_prediction_score_color($score);
                                    $score_for = ucwords(str_replace('_', ' ', $key));
                                    $output .= '<div class="gradient_box">
                                            <div class="gradient_clr ' . esc_attr($color) . '">
                                            <div class="gradient_left">
                                                <span class="fs-40 fw-600 lh-48">' . esc_html__($score, 'vedic-astro-api') . '<sub class="fs-10 lh-40">%</sub></span>
                                                <p class="fs-20 lh-24 fw-500">' . esc_html__($score_for, 'vedic-astro-api') . '</p>
                                            </div>
                                            </div>
                                            <div class="gradient_content bdr-gray">
                                            <p class="fs-14 lh-21 clr-darkblack">' . esc_html__($prediction, 'vedic-astro-api') . '</p>
                                            </div>
                                        </div>';
                                }
                            }
                            $output .= '</div>';

                        endforeach;
                        break;
                endswitch;

                if (!empty($response['bot_response'])) :
                    $output .= '<div class="gradient_row">';

                    foreach (array_reverse($response['bot_response']) as $k => $data) :
                        $class = $this->get_prediction_score_color($data['score']);

                        if ($i == 1) :
                            $new_class = 'vedicastro-horoscope-daily';
                        else :
                            $new_class = '';
                        endif;

                        $score_for = ucwords(str_replace('_', ' ', $k));

                        if ($score_for == 'Total Score') {
                            $score_for = 'Total';
                            $class = 'gradient_blue';
                        }

                        $output .= '<div class="gradient_box ' . esc_attr($new_class) . '">
                        <div class="gradient_clr ' . esc_attr($class) . '">
                            <div class="gradient_left">
                                <span class="fs-40 fw-600 lh-48">' . esc_html__($data['score'], 'vedic-astro-api') . '<sub class="fs-10 lh-40">%</sub></span>
                                <p class="fs-20 lh-24 fw-500">' . esc_html__($score_for, 'vedic-astro-api') . '</p>                              
                            </div>
                        </div>
                        <div class="gradient_content bdr-gray">
                            <p class="fs-14 lh-21 clr-darkblack">' . esc_html__($data['split_response'], 'vedic-astro-api') . '</p>
                        </div>
                    </div>';
                        $i++;
                    endforeach;
                endif;

                echo json_encode(array('status' => 'success', 'code' => 200, 'html' => $output));
            else :
                echo json_encode(array('status' => 'error', 'code' => 404, 'html' => '<div class="error">' . __($get_data['response'], 'vedic-astro-api') . '</div>'));
            endif;
            wp_die();
        }
    }

    /**
     * Vedicastro horoscope prediction details
     *
     * @since    1.0.0
     */

    public function vedicastro_horoscope_preddiction_details($horoscope_prediction)
    {

        $html = '';

        if (is_array($horoscope_prediction) && !empty($horoscope_prediction)) :

            $horoscope_predictions_en = $horoscope_prediction['get_data_prediction_character_en']['response'];
            $factors_val =  $horoscope_prediction['horoscope_prediction_response'];

            $html .= sprintf(__('<div class="lagan_chart_birth prediction" data-lagan-content="prediction"><div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500">%s</h4></div><div class="choose_services_row"><div class="astro_col-12"><div class="lagan_chart_birth_table mlr-15"><div class="prediction_grid">', 'vedic-astro-api'), __("Prediction", "vedic-astro-api"));

            $get_type_english = count($horoscope_predictions_en);

            for ($i = 0; $i < $get_type_english; $i++) :

                $day_type_en = $horoscope_predictions_en[$i]["lord_strength"];

                if ($day_type_en == "Neutral") {

                    $type_class = "clr-blue_prediction";
                } elseif ($day_type_en == "Debilitated") {

                    $type_class = "clr-red_prediction";
                } elseif ($day_type_en == "Exalted" || $day_type_en == "Strong") {

                    $type_class = "clr-green_prediction";
                }

                $html .= sprintf(__('<div class="dashas_dosh"><div class="dashas_dosh_content"><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span></p><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span></span></p><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span>%s</span></p><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span>%s</span></p><p class="fs-14 lh-20 fw-400"><span class="fw-700 >">%s</span><span class="clr-green fw-600 %s">%s</span></p><h4 class="fs-14 lh-20 fw-700">%s</h4><p class="fs-14 lh-20 fw-400">%s</p></div></div>', 'vedic-astro-api'), esc_html($factors_val[$i]["verbal_location"]), __("Lord Considered :", "vedic-astro-api"), __("Lord Current Zodiac Position :", "vedic-astro-api"), esc_html($factors_val[$i]["current_zodiac"]), __("Lord of Zodiac :", "vedic-astro-api"), esc_html($factors_val[$i]["lord_of_zodiac"]), __("Strength :",  "vedic-astro-api"), esc_attr($type_class), esc_html($factors_val[$i]["lord_strength"]), __("Predictions", "vedic-astro-api"), esc_html($factors_val[$i]["personalised_prediction"]));

            endfor;

            $html .= sprintf(__('</div></div></div></div></div>', 'vedic-astro-api'));

        endif;

        return $html;
    }

    /**
     * Vedicastro kundali ajax
     *
     * @since    1.0.0
     */
    public function vedicastro_kundali_ajax()
    {

        $html = '';
        $form_data = $_POST['form_data'];
        $kundali_name = '';
        $kundali_date = date('Y-m-d');
        $kundali_times = 0;
        $timezone = VAAPI_LOCATION_TIMEZONE;
        $latitude = VAAPI_LOCATION_LATITUDE;
        $longitude = VAAPI_LOCATION_LONGITUDE;
        $kundali_location = 'Delhi';
        $languages = 'en';
        $kundali_divisional_chart_code = 'D9';
        $style = 'north';
        $kundali_location_name = '';

        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {

                $data_key = sanitize_key($data['name']);

                if ($data_key == 'kundli_nonce') {

                    if (!wp_verify_nonce($data['value'], 'kundli_nonce_field')) {

                        echo json_encode(
                            array(
                                "status" => "error",
                                "message" => __("Something went wrong", 'vedic-astro-api'),
                            )
                        );

                        wp_die();
                    }
                } else {

                    if ($data_key == 'kundali-name') {

                        $kundali_name = sanitize_text_field($data['value']);

                        if (empty($kundali_name)) {

                            echo json_encode(
                                array(
                                    "status" => "error",
                                    "message" => __("Name is missing", 'vedic-astro-api'),
                                )
                            );

                            wp_die();
                        }
                    } elseif ($data_key == 'kundali-date') {

                        $kundali_date = $this->vaapi_validate_date_field($data['value']);
                    } elseif ($data_key == 'kundali-time') {

                        $kundali_times = $data['value'];
                    } elseif ($data_key == 'user_location_timezone') {

                        $timezone = floatval($data['value']);
                    } elseif ($data_key == 'user_location_latitude') {

                        $latitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_longitude') {

                        $longitude = floatval($data['value']);
                    } elseif ($data_key == 'kundali-location') {

                        $kundali_location = floatval($data['value']);
                        $kundali_location_name = $data['value'];
                        
                    } elseif ($data_key == 'lang') {

                        $languages = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'kundali-divisional-chart-code') {

                        $kundali_divisional_chart_code = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'kundali-style') {

                        $style = sanitize_text_field($data['value']);
                    }
                }

            }


            $kundli_endpoint = "horoscope/planet-details";
            $kundli_image_endpoint = "horoscope/chart-image";
            $kundli_prediction_endpoint = "horoscope/personal-characteristics";
            $kundli_planet_report_endpoint = "horoscope/planet-report";
            $mahadasha_endpoint = "dashas/maha-dasha";
            $antardasha_endpoint = "dashas/antar-dasha";
            $ashtakvarga_endpoint = "horoscope/ashtakvarga";
            $kaalsarpdosh_endpoint = "dosha/kaalsarp-dosh";
            $mangaldosh_endpoint = "dosha/mangal-dosh";
            $manglik_endpoint = "dosha/manglik-dosh";
            $pitradosh_endpoint = "dosha/pitra-dosh";
            $papasamaya_endpoint = "dosha/papasamaya";
            $api_key = $this->vedicastro_google_api_key();
            $kundali_time = date("H:i", strtotime($kundali_times));


            if (empty($api_key)) {

                echo json_encode(
                    array(
                        "status" => "error",
                        "message" => __("API key is missing", 'vedic-astro-api'),
                    )
                );

                wp_die();
            }
            $api_data = array(
                "dob" => date("d/m/Y", strtotime($kundali_date)),
                "tob" => $kundali_time,
                "lat" => $latitude,
                "lon" => $longitude,
                "tz" => $timezone,
                "lang" => $languages,
                "api_key" => $api_key,
            );

            $api_lagna_data = array(
                "dob" => date("d/m/Y", strtotime($kundali_date)),
                "tob" => $kundali_time,
                "lat" => $latitude,
                "lon" => $longitude,
                "tz" => $timezone,
                "style" => $style,
                "lang" => $languages,
                "api_key" => $api_key,
            );

            $api_navamsa_data = array(
                "dob" => date("d/m/Y", strtotime($kundali_date)),
                "tob" => $kundali_time,
                "lat" => $latitude,
                "lon" => $longitude,
                "tz" => $timezone,
                "div" => $kundali_divisional_chart_code,
                "style" => $style,
                "lang" => $languages,
                "api_key" => $api_key,
            );

            $api_data_en = array(
                "dob" => date("d/m/Y", strtotime($kundali_date)),
                "tob" => $kundali_time,
                "lat" => $latitude,
                "lon" => $longitude,
                "tz" => $timezone,
                "lang" => 'en',
                "api_key" => $api_key,
            );

            $api_mahadasha_data = $api_data;
            $api_ashtakvarga_data = $api_data;
            $api_doash_data = $api_data;
            $get_data = $this->vedicastro_api($kundli_endpoint, $api_data);

            /***********Code adde for api addon upto this if condtion of value */
            $status = '';
            if($get_data['status']== 200){
                $status = $get_data;
            }else{
                $status = $get_data;
            }



            do_action('vaapi_after_basic_api_data_render', $form_data, $status); 

            $is_addon_activated = apply_filters('is_addon_activated', false);
            
            $field_values = array_column($form_data, 'value', 'name');
            
            if(!$is_addon_activated){
                $field_values['view_data'] = 'yes';
            }
            

            //Check the parameter view_data value is equal to no 
            if (isset($field_values['view_data']) && $field_values['view_data'] == 'yes') { 

            $get_data_prediction_character = $this->vedicastro_api(
                $kundli_prediction_endpoint,
                $api_data
            );

            if (is_array($get_data_prediction_character) && !empty($get_data_prediction_character)) {

                $status = isset($get_data_prediction_character["status"]) ? absint($get_data_prediction_character["status"]) : 0;

                if ($status == 200) :


                    $get_data_prediction_character_en = $this->vedicastro_api(
                        $kundli_prediction_endpoint,
                        $api_data_en
                    );

                    $get_lagna_chart_data = $this->vedicastro_svg_api(
                        $kundli_image_endpoint,
                        $api_lagna_data
                    );

                    $get_navamsa_data = $this->vedicastro_svg_api(
                        $kundli_image_endpoint,
                        $api_navamsa_data
                    );

                    $get_mahadasha_data = $this->vedicastro_mahadasha_api(
                        $mahadasha_endpoint,
                        $api_mahadasha_data
                    );

                    $get_antardasha_data = $this->vedicastro_mahadasha_api(
                        $antardasha_endpoint,
                        $api_mahadasha_data
                    );

                    $get_antardasha_data_en = $this->vedicastro_mahadasha_api(
                        $antardasha_endpoint,
                        $api_data_en
                    );

                    $get_ashtakvarga_data = $this->vedicastro_ashtakvarga_api(
                        $ashtakvarga_endpoint,
                        $api_ashtakvarga_data
                    );

                    $get_kaalsarpdosh_data = $this->vedicastro_api(
                        $kaalsarpdosh_endpoint,
                        $api_doash_data
                    );

                    $get_mangaldosh_data = $this->vedicastro_api(
                        $mangaldosh_endpoint,
                        $api_doash_data
                    );
                    $get_manglik_data = $this->vedicastro_api(
                        $manglik_endpoint,
                        $api_doash_data
                    );

                    $get_pitradosh_data = $this->vedicastro_api(
                        $pitradosh_endpoint,
                        $api_doash_data
                    );
                    $get_papasamaya_data = $this->vedicastro_api(
                        $papasamaya_endpoint,
                        $api_doash_data
                    );

                    $dosh_data = [
                        "kaalsarpdosh" => $get_kaalsarpdosh_data,
                        "mangaldosh" => $get_mangaldosh_data,
                        "manglikdosh" => $get_manglik_data,
                        "pitradosh" => $get_pitradosh_data,
                        "papasamaya" => $get_papasamaya_data,
                    ];

                    $response = $get_data["response"];
                    $lagna_response = $get_lagna_chart_data;
                    $navamsa_response = $get_navamsa_data;
                    $mahadasha_response = $get_mahadasha_data["response"];
                    $antardasha_response = $get_antardasha_data["response"];
                    $antardasha_response_en = $get_antardasha_data_en["response"];
                    $ashtakvarga_response = $get_ashtakvarga_data["response"];
                    $horoscope_prediction_response = $get_data_prediction_character["response"];
                    $horoscope_prediction_response_en = $get_data_prediction_character_en["response"];
                    $horoscope_prediction = [
                        "horoscope_prediction_response" => $horoscope_prediction_response,
                        "get_data_prediction_character_en" => $get_data_prediction_character_en,
                    ];

                    $response["name"] = $kundali_name;
                    $response["date_of_birth"] = date("d/m/Y", strtotime($kundali_date));
                    $response["time_of_birth"] = $kundali_time;
                    $response["place_of_birth"] = $kundali_location;

                    $tabs_name = is_array($this->vedicastro_kundali_tab_data()) ? $this->vedicastro_kundali_tab_data() : array();

                    $data = apply_filters('vedicastro_kundali_tabs_name', $tabs_name);

                    $html .= sprintf(__('<div class="astro_content_tabs lagan_chart_tabs_main_data"><ul class="astro_content_menu p_0 display_flex lagan_chart_tabs_menu" id="lagan_chart_tabs_menu_data">', 'vedic-astro-api'));

                    if (is_array($data) && !empty($data)) :

                        $i = 1;

                        foreach ($data as $key => $val) :

                            if ($i == 1) :

                                $class = "kundali active";

                            else :

                                $class = "kundali";

                            endif;

                            $html .= sprintf(__('<li class="%s" data-lagan-id="%s"><a href="#" class="clr-gray fs-16 lh-24">%s</a></li>', 'vedic-astro-api'), esc_attr($class), esc_attr($key), esc_html__($val, "vedic-astro-api"));

                            $i++;

                        endforeach;
                       
                    endif;

                    $html .= sprintf(__('</ul></div>', 'vedic-astro-api'));

                    $html .= $this->vedicastro_birth_details($response);

                    $mahadasha_html = $this->vedicastro_mahadasha_details(
                        $mahadasha_response,
                        $antardasha_response,
                        $antardasha_response_en
                    );

                    $ashtakvarga_html = $this->vedicastro_ashtakvarga_details(
                        $ashtakvarga_response
                    );

                    $prediction_html = $this->vedicastro_horoscope_preddiction_details(
                        $horoscope_prediction
                    );

                    $dosh = $this->vedicastro_dosh_details($dosh_data);

                    $img_dropdown = $this->vedicastro_chart_img_dropdown(
                        $kundali_divisional_chart_code,
                        "vedicastro-chart-image",
                        "chart_content_menu_data",
                        "vedicastro-kundali"
                    );

                    $lagna_text_data = $this->vedicastro_change_style(
                        $style,
                        "vedicastro-kundli-section"
                    );
                    
                    echo json_encode([
                        "status" => "success",
                        "html" => $html,
                        "lagna_data" => $lagna_response,
                        "lagna_text_data" => $lagna_text_data,
                        "imgdata" => $img_dropdown,
                        "navamsa_data" => $navamsa_response,
                        "mahadasha_data" => $mahadasha_html,
                        "ashtakvarga_data" => $ashtakvarga_html,
                        "dosh_data" => $dosh,
                        "horoscope_prediction_data" => $prediction_html,
                    ]);

                else :

                    echo json_encode([
                        "status" => "error",
                        "message" => __("No result found", 'vedic-astro-api'),
                    ]);
                    
                endif;

                wp_die();
            } else {

                echo json_encode([
                    "status" => "error",
                    "message" => __("Something went wrong", 'vedic-astro-api'),
                ]);

                wp_die();
            }
            
        }

        }
    }

    /**
     * Vedicastro kundali tab data
     *
     * @since    1.0.0
     */
    public function vedicastro_kundali_tab_data()
    {

        $output = array(
            "birth-details" => __("Birth Details", 'vedic-astro-api'),
            "planets" => __("Planets", 'vedic-astro-api'),
            "mahadasha" => __("Mahadasha", 'vedic-astro-api'),
            "ashtakvarga" => __("Ashtakvarga", 'vedic-astro-api'),
            "doshas" => __("Doshas", 'vedic-astro-api'),
            "prediction" => __("Prediction", 'vedic-astro-api'),
        );

        return $output;
    }

    /**
     * Vedicastro birth details
     *
     * @since    1.0.0
     */
    public function vedicastro_birth_details($response)
    {

        $html = '';
        $data = [];
        $planets = [];
        $key_array = array();

        $new_key = [
            "name",
            "date_of_birth",
            "day_of_birth",
            "time_of_birth",
            "place_of_birth",
            "current_dasa",
            "birth_dasa",
            "yoga",
            "nakshatra",
            "lucky_gem",
            "lucky_num",
            "lucky_colors",
            "lucky_letters",
            "lucky_name_start",
        ];

        $child_key = [
            "ayanamsa",
            "karana",
            "yoga",
            "day_of_birth",
            "day_lord",
            "hora_lord",
            "sunrise_at_birth",
            "sunset_at_birth",
            "tithi",
        ];

        for ($i = 0; $i <= 20; $i++) {

            $key_array[] = $i;
        }

        if (is_array($response) &&  !empty($response)) :

            foreach ($response as $key => $val) :

                if (in_array($key, $key_array, true)) :

                    $planets[$key] = $val;
                    unset($response[$key]);

                endif;

            endforeach;

            foreach ($response as $key => $val) :
                if (in_array($key, $new_key, true)) :
                    if (is_array($val)) :
                        $data[$key] = implode(",", $val);
                    else :
                        $data[$key] = $val;
                    endif;
                elseif ($key == "panchang" && is_array($val)) :
                    foreach ($val as $val_key => $val_val) :
                        if (in_array($val_key, $child_key)) :
                            switch ($val_key):
                                case "ayanamsa":
                                case "day_of_birth":
                                case "day_lord":
                                case "hora_lord":
                                case "sunrise_at_birth":
                                case "sunset_at_birth":
                                case "karana":
                                case "yoga":
                                case "tithi":
                                    $data[$val_key] = $val_val;
                                    break;
                            endswitch;
                        endif;
                    endforeach;
                endif;
            endforeach;
        endif;

        $html .= sprintf(__('<div class="lagan_chart_birth display_block" data-lagan-content="birth-details"><div class="lagan_chart_birth_title"> <h4 class="fs-20 lh-24 fw-500">%s</h4></div><div class="data_navmasa"><div class="choose_services_row"><div class="astro_col-5"><div class="lagan_chart_birth_table mlr-15"><table class="lagan_birth_table_data" border="1"><thead><tr><th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th><th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th></tr></thead><tbody>', 'vedic-astro=api'),  __("Birth Details", "vedic-astro-api"), __("Title", "vedic-astro-api"), __("Value", "vedic-astro-api"));

        if (is_array($data) && !empty($data)) :

            foreach ($data as $res_key => $res_val) :

                switch ($res_key):

                    case "name":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>'), __("Name", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "date_of_birth":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Date of Birth", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "time_of_birth":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Time of Birth", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "place_of_birth":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Place of Birth", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "current_dasa":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span>
                                </td>
                            </tr>', 'vedic-astro-api'), __("Current Dasa", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "birth_dasa":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Dasha At Birth", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "hora_lord":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Hora Lord",   "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "day_lord":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Day Lord", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "karana":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Karana",  "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "yoga":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Yoga",   "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "nakshatra":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Nakshatra",  "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "tithi":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Tithi",   "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "sunrise_at_birth":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Sunrise", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "sunset_at_birth":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Sunset",  "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "ayanamsa":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Ayanamsa", "vedic-astro-api"), esc_html($res_val));

                        break;

                endswitch;

            endforeach;

        endif;

        $html .= sprintf(__('</tbody></table></div></div></div><div class="astro_col-5 chart_birth"><div class="kundli_lagan_chart kundli_lagan_chart_part mlr-15 position_relative" id="kundli-navamsa"></div><div class="d9navmasa"></div></div>', 'vedic-astro-api'));

        $luckcy = $data["lucky_gem"];

        if (!empty($luckcy)) :

            $html .= sprintf(__('<div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500">%s</h4><div class="choose_services_row"><div class="astro_col-5"><div class="lagan_chart_birth_table mlr-15"><table class="lagan_birth_table_data" border="1"><thead><tr><th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th><th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th></tr></thead><tbody>', 'vedic-astro-api'), __("Other Details", "vedic-astro-api"), __("Title",   "vedic-astro-api"), __("Value", "vedic-astro-api"));

            foreach ($data as $res_key => $res_val) :

                switch ($res_key):

                    case "lucky_gem":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Lucky Gem", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "lucky_num":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Lucky Number", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "lucky_colors":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Lucky Colors",   "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "lucky_letters":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Lucky latters", "vedic-astro-api"), esc_html($res_val));

                        break;

                    case "lucky_name_start":

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __("Baby Name Start", "vedic-astro-api"), esc_html($res_val));

                        break;

                endswitch;

            endforeach;

            $html .= sprintf(__('</tbody></table></div></div></div></div>', 'vedic-astro-api'));

        endif;

        $html .= sprintf(__('</div></div>', 'vedic-astro-api'));

        $html .= $this->vedicastro_planetary_details($planets);

        return $html;
    }


    /**
     * Vedicastro planetary details
     *
     * @since    1.0.0
     */
    public function vedicastro_planetary_details($planetary_data)
    {

        $html = "";

        $html .= sprintf(__('<div class="lagan_chart_birth" data-lagan-content="planets"><div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500">%s</h4></div>', 'vedic-astro-api'), __("Planetary Details", "vedic-astro-api"));

        if (is_array($planetary_data) && !empty($planetary_data)) :

            $html .= sprintf(__('<div class="choose_services_row"><div class="astro_col-12"><div class="lagan_chart_birth_table mlr-15"><table class="lagan_birth_table_data planetary_table_data" border="1"><thead><tr><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th></tr></thead><tbody>', 'vedic-astro-api'), __("Planet",  "vedic-astro-api"), __("House", "vedic-astro-api"), __("Zodiac", "vedic-astro-api"), __("Nakshatra", "vedic-astro-api"), __("Degre in Sign", "vedic-astro-api"), __("Degrees", "vedic-astro-api"));

            foreach ($planetary_data as $planetary_key => $planetary_val) :

                if (array_key_exists('retro', $planetary_val) && $planetary_val['retro'] == 1) {

                    $retro = $planetary_val["full_name"] . ' (Retro)';
                } else {

                    $retro = $planetary_val["full_name"];
                }

                $nakshatra = $planetary_val["nakshatra"] . ' pada ' . $planetary_val["nakshatra_pada"];

                $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), esc_html($retro),  esc_html($planetary_val["house"]), esc_html($planetary_val["zodiac"]), esc_html($nakshatra), esc_html($planetary_val["local_degree"]), esc_html($planetary_val["global_degree"]));

            endforeach;

            $html .= sprintf(__('</tbody></table></div></div></div>', 'vedic-astro-api'), __("Sorry Planetry  Data are not availabel", "vedic-astro-api"));
        else :

            $html .= sprintf(__('<h5>%s</h5>', 'vedic-astro-api'), __("Sorry Planetry  Data are not availabel", "vedic-astro-api"));

        endif;

        $html .= sprintf(__('</div>', 'vedic-astro-api'));
        return $html;
    }

    /**
     * Vedicastro mahadasha details
     *
     * @since    1.0.0
     */
    public function vedicastro_mahadasha_details($mahadasha_details, $antardasha_details, $antardasha_details_en)
    {

        $html = '';

        if (is_array($mahadasha_details) && !empty($mahadasha_details)) :

            $html .= sprintf(__('<div class="lagan_chart_birth mahadashas_antradashas" data-lagan-content="mahadasha"><div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500">%s</h4></div><div class="choose_services_row position_relative"><div class="astro_col-5"><div class="lagan_chart_birth_table mlr-15"><table class="lagan_birth_table_data mahadasha_table_data" border="1"><thead><tr><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th></tr></thead><tbody>', 'vedic-astro-api'), __("Mahadashas &amp; Antradashas",  "vedic-astro-api"), __("Planet", "vedic-astro-api"), __("MahaDasha (End date)",   "vedic-astro-api"));

            if (is_array($mahadasha_details["mahadasha"]) && !empty($mahadasha_details["mahadasha"])) :

                $i = 0;

                foreach ($mahadasha_details["mahadasha"] as $mahadasha_key => $mahadasha_val) :

                    $html .= sprintf(__('<tr mahadasha-id="%s"><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), esc_attr($mahadasha_details["mahadasha"][$i]), esc_html($mahadasha_details["mahadasha"][$i]), esc_html($mahadasha_details["mahadasha_order"][$i]));

                    $i++;

                endforeach;

                $html .= sprintf(__('</tbody></table></div>', 'vedic-astro-api'));

                for ($l = 0; $l < count($mahadasha_details["mahadasha"]); $l++) :

                    $html .= sprintf(__('<div class="lagan_chart_birth_table mlr-15 mahadasha_hover display_none" mahadasha-content="%s"><table class="lagan_birth_table_data mahadasha_hover_data" border="1"><thead><tr><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th></tr></thead><tbody>', 'vedic-astro-api'), esc_attr($mahadasha_details["mahadasha"][$l]), __("Antardasha Planet", "vedic-astro-api"), __("End Dates", "vedic-astro-api"));

                    if (is_array($antardasha_details["antardashas"][$l]) && !empty($antardasha_details["antardashas"][$l])) :

                        $j = 0;
                        $k = 0;

                        foreach ($antardasha_details["antardashas"] as $mahadasha_key => $mahadasha_val) :

                            $html .= sprintf(__('<tr data_antardasha="%s" antardasha_grah="%s"><td><span class="fw-400 lh-20 fs-14 clr-black1">%s</span></td><td><span class="fw-400 lh-20 fs-14 clr-black1">%s</span></td></tr>', 'vedic-astro-api'), esc_attr($antardasha_details_en["antardashas"][$l][$k]), esc_attr($antardasha_details["antardashas"][$l][$k]), esc_html($antardasha_details["antardashas"][$l][$k]), esc_html($antardasha_details["antardasha_order"][$l][$k]));

                            $k++;

                        endforeach;

                    endif;

                    $html .= sprintf(__('</tbody></table></div>', 'vedic-astro-api'));

                endfor;

            endif;

            $html .= sprintf(__('<div class="lagan_chart_birth_table mahadasha_subhover" mahadasha-subhover="" id="mahadasha_hover"></div></div></div></div>', 'vedic-astro-api'));

        endif;

        return $html;
    }

    /**
     * Vedicastro ashtakvarga details
     *
     * @since    1.0.0
     */
    public function vedicastro_ashtakvarga_details($ashtakvarga_details)
    {

        $html = '';

        if (is_array($ashtakvarga_details) && !empty($ashtakvarga_details)) :

            $row = count($ashtakvarga_details["ashtakvarga_order"]);
            $col = count($ashtakvarga_details["ashtakvarga_points"]);
            //$ashtakvarga_details["ashtakvarga_total"];

            $html .= sprintf(__('<div class="lagan_chart_birth ashtakvarga" data-lagan-content="ashtakvarga"><div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500">%s</h4></div><div class="choose_services_row"><div class="astro_col-10"><div class="lagan_chart_birth_table mlr-15"><table class="lagan_birth_table_data planetary_table_data" border="1"><colgroup><col span="8" style="background-color:#fff;"><col span="1" style="background-color:#E9ECEF;"></colgroup><thead><tr><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th></tr></thead><tbody>', 'vedic-astro-api'), __("Ashtakvarga", "vedic-astro-api"), __("Zodiacs", "vedic-astro-api"), __("Sun", "vedic-astro-api"), __("Moon", "vedic-astro-api"), __("Mars",   "vedic-astro-api"), __("Mercury", "vedic-astro-api"), __("Jupiter", "vedic-astro-api"), __("Venus",  "vedic-astro-api"), __("Saturn", "vedic-astro-api"), __("Total", "vedic-astro-api"));

            for ($i = 0; $i < $row; $i++) :

                $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>', 'vedic-astro-api'), esc_html($ashtakvarga_details["ashtakvarga_order"][$i]));

                for ($j = 0; $j < $col; $j++) :

                    $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>', 'vedic-astro-api'), esc_html($ashtakvarga_details["ashtakvarga_points"][$i][$j]));

                endfor;

                $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), esc_html($ashtakvarga_details["ashtakvarga_total"][$i]));

            endfor;

            $html .= sprintf(__('</tbody></table></div></div></div>', 'vedic-astro-api'));


        endif;

        return $html;
    }


    /**
     * Vedicastro dosh factors
     *
     * @since    1.0.0
     */
    public function vedicastro_dosh_factors()
    {
        $output = "";
        $output = ["mars", "moon", "venus", "saturn", "rahu"];
        return $output;
    }

    /**
     * Vedicastro dosh factors title
     *
     * @since    1.0.0
     */
    public function vedicastro_dosh_factors_title()
    {
        $output = "";
        $output = [
            "mars" => __("Mars", "vedic-astro-api"),
            "moon" => __("Moon", "vedic-astro-api"),
            "venus" => __("Venus", "vedic-astro-api"),
            "saturn" => __("Saturn", "vedic-astro-api"),
            "rahu" => __("Rahu", "vedic-astro-api"),
        ];
        return $output;
    }

    /**
     * Vedicastro dosh details
     *
     * @since    1.0.0
     */
    public function vedicastro_dosh_details($dosh_data)
    {

        $html = '';

        if (is_array($dosh_data) && !empty($dosh_data)) :

            $dosh_factors = $this->vedicastro_dosh_factors();
            $dosh_factors_title = $this->vedicastro_dosh_factors_title();

            $mangaldosharray = $dosh_data["mangaldosh"];
            $kallsharparray = $dosh_data["kaalsarpdosh"];
            if (array_key_exists('response', $mangaldosharray) && array_key_exists('message', $kallsharparray)) {
                $mangaldosh = $dosh_data["mangaldosh"]["response"];
                $kaalsarpdosh = $dosh_data["kaalsarpdosh"]["response"];
            } else {
                $mangaldosh = '';
                $kaalsarpdosh = '';
            }

            $pitradosh = $dosh_data["pitradosh"]["response"];
            $manglikdosh = $dosh_data["manglikdosh"]["response"];
            $papasamaya = $dosh_data["papasamaya"]["response"];

            $html .= sprintf(__('<div class="lagan_chart_birth dashas" data-lagan-content="doshas"><div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500"></h4></div><div class="dashas_group">', 'vedic-astro-api'), __("Doshas", "vedic-astro-api"));

            if (is_array($kaalsarpdosh) && !empty($kaalsarpdosh["is_dosha_present"]) && $kaalsarpdosh["is_dosha_present"] == 1) :

                $html .= sprintf(__('<div class="choose_services_row"><div class="astro_col-12"><div class="dashas_dosh mlr-15 ptlr_15"><div class="choose_services_row"><div class="astro_col-6"><div class="dashas_dosh_content mlr-15">', 'vedic-astro-api'));

                if ($kaalsarpdosh["is_dosha_present"] == 1) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span> %s</span></p>', 'vedic-astro-api'), __("Kaal Sarp Dosh", "vedic-astro-api"), __("Yes, Present", "vedic-astro-api"));

                endif;

                if ($kaalsarpdosh["kalatra_by_saturn"] == 1) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span> %s</span></p>', 'vedic-astro-api'), __("Kalatra Dosh by Saturn",  "vedic-astro-api"), __("Yes, Present",  "vedic-astro-api"));

                endif;

                if ($kaalsarpdosh["kalatra_by_rahuketu"] == 1) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span> %s</span></p>', 'vedic-astro-api'), __("Kalatra Dosh by Rahu &amp; Ketu", "vedic-astro-api"), __("Yes, Present", "vedic-astro-api"));

                endif;

                $html .= sprintf(__('</div></div><div class="astro_col-12"><div class="dashas_dosh_content p_15"><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span> %s</span></p></div></div><div class="astro_col-12"><div class="dashas_dosh_content  p_15"><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span> "%s</span></p></div></div>', 'vedic-astro-api'), __("Effect",   "vedic-astro-api"), esc_html($kaalsarpdosh["bot_response"]), __("Ketu-Rahu Axis ", "vedic-astro-api"), esc_html($kaalsarpdosh["rahu_ketu_axis"]));

                if (is_array($kaalsarpdosh["remedies"]) && !empty($kaalsarpdosh["remedies"])) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400  p_15"><span class="fw-700">%s:-</span></p><div class="astro_col-12"><ul class="dosh mlr-5">', 'vedic-astroa-api'), __("Dosha Factors", 'vedic-astro-api'));

                    foreach ($kaalsarpdosh["remedies"] as $factors_val) :

                        $html .= sprintf(__('<li class="fs-14 lh-20 fw-400"><span class="fw-700"></span><span> %s</span></li>', 'vedic-astro-api'), esc_html($factors_val));

                    endforeach;

                    $html .= sprintf(__('</ul></div>', 'vedic-astro-api'));

                endif;

                $html .= sprintf(__('</div></div></div></div>', 'vedic-astro-api'));

            endif;

            if (is_array($mangaldosh) && !empty($mangaldosh) && $mangaldosh["is_dosha_present"] == 1) :

                if (empty($mangaldosh["score"])) :

                    $mangaldosh["score"] = 0;

                endif;

                $html .= sprintf(__('<div class="choose_services_row"><div class="astro_col-12"><div class="dashas_dosh mlr-15 ptlr_15"><div class="choose_services_row"><div class="astro_col-10"><div class="dashas_dosh_content mlr-15"><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span>%s</span></p>', 'vedic-astro-api'), __("Mangal Dosh",  "vedic-astro-api"), esc_html($mangaldosh["bot_response"]));

                if (is_array($mangaldosh["factors"]) && !empty($mangaldosh["factors"])) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s:-</span></p>', 'vedic-astro-api'), __("Dosha Factors",  "vedic-astro-api"));

                    foreach ($mangaldosh["factors"] as $factors_key => $factors_val) :

                        if (in_array($factors_key, $dosh_factors)) :

                            $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span> %s</span></p>', 'vedic-astro-api'), esc_html($dosh_factors_title[$factors_key]), esc_html($factors_val));

                        endif;

                    endforeach;
                endif;

                $html .= sprintf(__('</div></div></div></div></div></div>', 'vedic-astro-api'));

            endif;

            if (is_array($manglikdosh) && !empty($manglikdosh) && $manglikdosh["manglik_by_mars"] == 1) :

                if (empty($manglikdosh["score"])) :

                    $manglikdosh["score"] = 0;

                endif;

                $html .= sprintf(__('<div class="choose_services_row"><div class="astro_col-12"><div class="dashas_dosh mlr-15 ptlr_15"><div class="choose_services_row"><div class="astro_col-10"><div class="dashas_dosh_content mlr-15"><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span>%s</span></p></div></div>', 'vedic-astro-api'), __("Manglik Dosh", "vedic-astro-api"), esc_html($manglikdosh["score"]));

                if (is_array($manglikdosh["factors"]) && !empty($manglikdosh["factors"])) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400 mlr-5 p_15"><span class="fw-700">%s :-</span></p><div class="astro_col-12">
                    <ul class="dosh mlr-5">', 'vedic-astro-api'), __("Dosha Factors",  "vedic-astro-api"));

                    foreach ($manglikdosh["factors"] as $factors_val) :

                        $html .= sprintf(__('<li class="fs-14 lh-20 fw-400"><span class="fw-700"></span><span> %s</span></li>', 'vedic-astro-api'), esc_html($factors_val));

                    endforeach;

                    $html .= sprintf(__('</ul></div>', 'vedic-astro-api'));

                endif;

                $html .= sprintf(__('</div></div></div></div>', 'vedic-astro-api'));

            endif;

            if (is_array($pitradosh) && !empty($pitradosh) && $pitradosh["is_dosha_present"] == 1) :

                $html .= sprintf(__('<div class="choose_services_row"><div class="astro_col-12"><div class="dashas_dosh mlr-15 ptlr_15"><div class="choose_services_row"><div class="astro_col-10"><div class="dashas_dosh_content mlr-15"><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span>%s</span></p></div></div>', 'vedic-astro-api'), __("Pitra Dosha :",   "vedic-astro-api"), esc_html($pitradosh["bot_response"]));

                if (is_array($pitradosh["effects"]) && !empty($pitradosh["effects"])) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400 mlr-15 p_15"><span class="fw-700">%s:-</span></p><div class="astro_col-12"><ul class="dosh mlr-15">', 'vedic-astro-api'), __("Effects", "vedic-astro-api"));

                    foreach ($pitradosh["effects"]  as $factors_val) :

                        $html .= sprintf(__('<li class="fs-14 lh-20 fw-400"><span class="fw-700"></span><span> %s</span></li>', 'vedic-astro-api'), esc_html($factors_val));

                    endforeach;

                    $html .= sprintf(__('</ul></div>', 'vedic-astro-api'));

                endif;

                if (is_array($pitradosh["remedies"]) && !empty($pitradosh["remedies"])) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400 mlr-15 p_15"><span class="fw-700">%s :-</span></p><div class="astro_col-12"><ul class="dosh mlr-15">', 'vedic-astro-api'), __("Remedies", 'vedic-astro-api'));

                    foreach ($pitradosh["remedies"] as $factors_val) :

                        $html .= sprintf(__('<li class="fs-14 lh-20 fw-400"><span class="fw-700"></span><span> %s</span></li>', 'vedic-astro-api'), esc_html($factors_val));

                    endforeach;

                    $html .= sprintf(__('</ul></div>', 'vedic-astro-api'));

                endif;

                $html .= sprintf(__('</div></div></div></div>', 'vedic-astro-api'));

            endif;

            if (is_array($papasamaya) && !empty($papasamaya)) :

                $html .= sprintf(__('<div class="choose_services_row"><div class="astro_col-12"><div class="dashas_dosh mlr-15 ptlr_15"><div class="choose_services_row"><div class="astro_col-10"><div class="dashas_dosh_content mlr-15"><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span></span></p>', 'vedic-astro-api'), __("Papasamaya Points",  "vedic-astro-api"));

                if (!empty($papasamaya["rahu_papa"])) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s : </span><span>%s</span></p>', 'vedic-astro-api'), __("Papa points by Rahu", "vedic-astro-api"), esc_html($papasamaya["rahu_papa"]));

                endif;

                if (!empty($papasamaya["saturn_papa"])) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s : </span><span> %s</span></p>', 'vedic-astro-api'), __("Papa points by Saturn", "vedic-astro-api"), esc_html($papasamaya["saturn_papa"]));

                endif;

                if (!empty($papasamaya["mars_papa"])) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s : </span><span>%s</span></p>', 'vedic-astro-api'), __("Papa points by mars", "vedic-astro-api"), esc_html($papasamaya["mars_papa"]));

                endif;

                if (!empty($papasamaya["saturn_papa"])) :

                    $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s : </span><span>%s</span></p>', 'vedic-astro-api'), __("Papa points by sun", "vedic-astro-api"), esc_html($papasamaya["sun_papa"]));
                endif;

                $html .= sprintf(__('</div></div></div></div></div></div>', 'vedic-astro-api'));


            endif;

            $html .= sprintf(__('</div></div>', 'vedic-astro-api'));

        endif;


        return $html;
    }

    /**
     * Vedicastro maching ajax
     *
     * @since    1.0.0
     */

    public function vedicastro_matching_ajax()
    {
        $output = $indian_endpoint = $style = $india_face = $matching_html = $score = $bot_response = $total = $lagna_style = "";

        $form_data = $_POST['form_data'];
        $lang = 'en';
        $boy_date = date('Y-m-d');
        $boy_tob = '';
        $boy_name = '';
        $boy_style = '';
        $boy_chart_code = '';
        $boy_tz = VAAPI_LOCATION_TIMEZONE;
        $boy_lat = VAAPI_LOCATION_LATITUDE;
        $boy_lon = VAAPI_LOCATION_LONGITUDE;

        $girl_date = date('Y-m-d');
        $girl_tob = '';
        $girl_name = '';
        $girl_style = '';
        $girl_chart_code = '';
        $girl_tz = VAAPI_LOCATION_TIMEZONE;
        $girl_lat = VAAPI_LOCATION_LATITUDE;
        $girl_lon = VAAPI_LOCATION_LONGITUDE;

        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {

                $data_key = sanitize_key($data['name']);


                if ($data_key == 'matching_nonce') {

                    if (!wp_verify_nonce($data['value'], 'matching_nonce_field')) {

                        echo json_encode(
                            array(
                                "status" => "error",
                                "message" => __("Something wrong Please try again", 'vedic-astro-api'),
                            )
                        );

                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $lang = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'boy-name') {

                        $boy_name = sanitize_text_field($data['value']);

                        if (empty($boy_name)) {

                            echo json_encode(
                                array(
                                    "status" => "error",
                                    "message" => __("Boy Name is missing", 'vedic-astro-api'),
                                )
                            );

                            wp_die();
                        }
                    } elseif ($data_key == 'boy-date') {

                        $boy_date = $this->vaapi_validate_date_field($data['value']);
                    } elseif ($data_key == 'boy-time') {

                        $boy_times = absint($data['value']);

                        $boy_tob = date("h:i", strtotime($boy_times));
                    } elseif ($data_key == 'boy_location_latitude') {

                        $boy_lat = floatval($data['value']);
                    } elseif ($data_key == 'boy_location_longitude') {

                        $boy_lon = floatval($data['value']);
                    } elseif ($data_key == 'boy_location_timezone') {

                        $boy_tz = floatval($data['value']);
                    } elseif ($data_key == 'boy-divisional-chart-code') {

                        $boy_chart_code = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'boy-style') {

                        $boy_style = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'girl-name') {

                        $girl_name = sanitize_text_field($data['value']);

                        if (empty($girl_name)) {

                            echo json_encode(
                                array(
                                    "status" => "error",
                                    "message" => __(" Girl Name is missing", 'vedic-astro-api'),
                                )
                            );

                            wp_die();
                        }
                    } elseif ($data_key == 'girl-date') {

                        $girl_date = $this->vaapi_validate_date_field($data['value']);
                    } elseif ($data_key == 'girl-time') {

                        $girl_times = absint($data['value']);

                        $girl_tob = date("h:i", strtotime($girl_times));
                    } elseif ($data_key == 'girl_location_latitude') {

                        $girl_lat = floatval($data['value']);
                    } elseif ($data_key == 'girl_location_longitude') {

                        $girl_lon = floatval($data['value']);
                    } elseif ($data_key == 'girl_location_timezone') {

                        $girl_tz = floatval($data['value']);
                    } elseif ($data_key == 'girl-divisional-chart-code') {

                        $girl_chart_code = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'girl-style') {

                        $girl_style = sanitize_text_field($data['value']);
                    }
                }
            }
            $button_id = sanitize_text_field(trim($_POST["buttonid"]));


            $api_key = $this->vedicastro_google_api_key();

            if (empty($api_key)) {

                echo json_encode([
                    "status" => "false",
                    "maching_results" => __("Something wrong Please try again", 'vedic-astro-api'),
                ]);

                wp_die();
            } else {
                if ($button_id == "north-indian") :
                    $astro_details = "matching/ashtakoot-with-astro-details";
                    $indian_endpoint = "matching/ashtakoot";
                    $style = __("North Style", "vedic-astro-api");
                    $lagna_style = __("north", "vedic-astro-api");
                    $india_face = __("Ashtakoot", "vedic-astro-api");
                    $total = 36;
                elseif ($button_id == "south-indian") :
                    $astro_details = "matching/dashakoot-with-astro-details";
                    $indian_endpoint = "matching/dashakoot";
                    $style = __("South Style", "vedic-astro-api");
                    $lagna_style = __("south", "vedic-astro-api");
                    $india_face = __("Dashakoot", "vedic-astro-api");
                    $total = 10;
                endif;

                $aggregate_endpoint = "matching/aggregate";
                $starmatch_endpoint = "matching/starmatch";
                $papasamaya_endpoint = "matching/papasamaya";
                $western_endpoint = "matching/western";

                $api_data = [
                    "boy_dob" => date("d/m/Y", strtotime($boy_date)),
                    "boy_tob" => $boy_tob,
                    "boy_lat" => $boy_lat,
                    "boy_lon" => $boy_lon,
                    "boy_tz" => $boy_tz,
                    "girl_dob" => date("d/m/Y", strtotime($girl_date)),
                    "girl_tob" => $girl_tob,
                    "girl_lat" => $girl_lat,
                    "girl_lon" => $girl_lon,
                    "girl_tz" => $girl_tz,
                    "api_key" => $api_key,
                    "lang" => $lang,
                ];



                $datap = [
                    "tara",
                    "gana",
                    "yoni",
                    "bhakoot",
                    "grahamaitri",
                    "vasya",
                    "nadi",
                    "varna",
                    "dina",
                    "mahendra",
                    "sthree",
                    "rasi",
                    "rasiathi",
                    "rajju",
                    "vedha",
                ];

                $area_of_life = [
                    "tara" => __("Destiny", 'vedic-astro-api'),
                    "gana" => __("Guna Level", 'vedic-astro-api'),
                    "yoni" => __("Mentality", 'vedic-astro-api'),
                    "bhakoot" => __("Love", 'vedic-astro-api'),
                    "grahamaitri" => __("Temperaments", 'vedic-astro-api'),
                    "vasya" => __("Dominance", 'vedic-astro-api'),
                    "nadi" => __("Health", 'vedic-astro-api'),
                    "varna" => __("Work", 'vedic-astro-api'),
                    "dina" => __("Health", 'vedic-astro-api'),
                    "mahendra" => __("Progency and status", 'vedic-astro-api'),
                    "sthree" => __("Prosperity", 'vedic-astro-api'),
                    "rasi" => __("Progency Continuity", 'vedic-astro-api'),
                    "rasiathi" => __("Mental Compatibility", 'vedic-astro-api'),
                    "rajju" => __("Bond Longevity", 'vedic-astro-api'),
                    "vedha" => __("Stability", 'vedic-astro-api'),
                ];

                $data_title = [
                    "tara" => __("Tara", 'vedic-astro-api'),
                    "gana" => __("Gana", 'vedic-astro-api'),
                    "yoni" => __("Yoni", 'vedic-astro-api'),
                    "bhakoot" => __("Bhakoot", 'vedic-astro-api'),
                    "grahamaitri" => __("Grahamaitri", 'vedic-astro-api'),
                    "vasya" => __("Vasya", 'vedic-astro-api'),
                    "nadi" => __("Nadi", 'vedic-astro-api'),
                    "varna" => __("Varna", 'vedic-astro-api'),
                    "dina" => __("Dina", 'vedic-astro-api'),
                    "mahendra" => __("Mahendra", 'vedic-astro-api'),
                    "sthree" => __("Sthree", 'vedic-astro-api'),
                    "rasi" => __("Rasi", 'vedic-astro-api'),
                    "rasiathi" => __("Rasiathi", 'vedic-astro-api'),
                    "rajju" => __("Rajju", 'vedic-astro-api'),
                    "vedha" => __("Vedha", 'vedic-astro-api'),
                ];
                $response_data = [
                    "tara" => ["boy_tara", "girl_tara", "tara"],
                    "gana" => ["boy_gana", "girl_gana", "gana"],
                    "yoni" => ["boy_yoni", "girl_yoni", "yoni"],
                    "bhakoot" => ["boy_rasi_name", "girl_rasi_name", "bhakoot"],
                    "grahamaitri" => ["boy_lord", "girl_lord", "grahamaitri"],
                    "vasya" => ["boy_vasya", "girl_vasya", "vasya"],
                    "nadi" => ["boy_nadi", "girl_nadi", "nadi"],
                    "varna" => ["boy_varna", "girl_varna", "varna"],
                    "dina" => ["boy_star", "girl_star", "dina"],
                    "mahendra" => ["boy_star", "girl_star", "mahendra"],
                    "sthree" => ["boy_star", "girl_star", "sthree"],
                    "rasi" => ["boy_rasi", "girl_rasi", "rasi"],
                    "rasiathi" => ["boy_lord", "girl_lord", "rasiathi"],
                    "rajju" => ["boy_rajju", "girl_rajju", "rajju"],
                    "vedha" => ["boy_star", "girl_star", "vedha"],
                ];
                $matching_aggregate_match = "matching/aggregate-match";
                $matching_data = $this->vedicastro_api($indian_endpoint, $api_data);

                $matching_data_agrreegate = $this->vedicastro_api(
                    $matching_aggregate_match,
                    $api_data
                );
                $matching_astkot_astro_details = $this->vedicastro_api(
                    $astro_details,
                    $api_data
                );

                $matching_endpoint = "horoscope/planet-details";
                $api_boy_data = [
                    "dob" => date("d/m/Y", strtotime($boy_date)),
                    "tob" => $boy_tob,
                    "lat" => $boy_lat,
                    "lon" => $boy_lon,
                    "tz" => $boy_tz,
                    "api_key" => $api_key,
                    "lang" => $lang,
                ];

                $api_girl_data = [
                    "dob" => date("d/m/Y", strtotime($girl_date)),
                    "tob" => $girl_tob,
                    "lat" => $girl_lat,
                    "lon" => $girl_lon,
                    "tz" => $girl_tz,
                    "api_key" => $api_key,
                    "lang" => $lang,
                ];
                $get_boy_data = $this->vedicastro_api(
                    $matching_endpoint,
                    $api_boy_data
                );

                $get_girl_data = $this->vedicastro_api(
                    $matching_endpoint,
                    $api_girl_data
                );

                $status = $matching_data["status"];
                $matching_image_endpoint = "horoscope/chart-image";

                $api_lagna_boy_data = [
                    "dob" => date("d/m/Y", strtotime($boy_date)),
                    "tob" => $boy_tob,
                    "lat" => $boy_lat,
                    "lon" => $boy_lon,
                    "tz" => $boy_tz,
                    "div" => "D1",
                    "style" => $boy_style,
                    //                             "color" => $get_color,
                    "api_key" => $api_key,
                    "lang" => $lang,
                ];
                $api_lagna_girl_data = [
                    "dob" => date("d/m/Y", strtotime($girl_date)),
                    "tob" => $girl_tob,
                    "lat" => $girl_lat,
                    "lon" => $girl_lon,
                    "tz" => $girl_tz,
                    "div" => "D1",
                    "style" => $girl_style,
                    //                             "color" => $get_color,
                    "api_key" => $api_key,
                    "lang" => $lang,
                ];
                $api_navamsha_boy_data = [
                    "dob" => date("d/m/Y", strtotime($boy_date)),
                    "tob" => $boy_tob,
                    "lat" => $boy_lat,
                    "lon" => $boy_lon,
                    "tz" => $boy_tz,
                    "div" => $boy_chart_code,
                    "style" => $boy_style,
                    //                             "color" => $get_color,
                    "api_key" => $api_key,
                    "lang" => $lang,
                ];
                $api_navamsha_girl_data = [
                    "dob" => date("d/m/Y", strtotime($girl_date)),
                    "tob" => $girl_tob,
                    "lat" => $girl_lat,
                    "lon" => $girl_lon,
                    "tz" => $girl_tz,
                    "div" => $girl_chart_code,
                    "style" => $girl_style,
                    //                             "color" => $get_color,
                    "api_key" => $api_key,
                    "lang" => $lang,
                ];
                $get_lagna_boy_chart_data = $this->vedicastro_svg_api(
                    $matching_image_endpoint,
                    $api_lagna_boy_data
                );

                $get_navamsha_boy_chart_data = $this->vedicastro_svg_api(
                    $matching_image_endpoint,
                    $api_navamsha_boy_data
                );

                $get_navamsha_girl_chart_data = $this->vedicastro_svg_api(
                    $matching_image_endpoint,
                    $api_navamsha_girl_data
                );

                $get_lagna_girl_chart_data = $this->vedicastro_svg_api(
                    $matching_image_endpoint,
                    $api_lagna_girl_data
                );


                if (is_array($matching_data) && !empty($matching_data)) {

                    if ($status == 200) :

                        $get_boy_response = $get_boy_data["response"];
                        $get_astro_detais = $matching_astkot_astro_details["response"];
                        $get_doshas_detais = $matching_data_agrreegate["response"];
                        $get_lagna_boy_response = $get_lagna_boy_chart_data;
                        $get_girl_response = $get_girl_data["response"];
                        $get_lagna_girl_response = $get_lagna_girl_chart_data;
                        $get_navamsha_boy_response = $get_navamsha_boy_chart_data;
                        $get_navamsha_girl_response = $get_navamsha_girl_chart_data;

                    endif;
                    $html = '';
                    if (!empty($matching_data["response"])) {
                        $html .= sprintf(__(' <div class="match_details"><div class="match_title"> <h4 class="clr-black fw-500 fs-20 lh-24">%s %s %s</h4></div> <div class="choose_services_row position_relative"> <div class="astro_col-9"><div class="lagan_chart_birth_table mlr-15 maching_table"><table class="lagan_birth_table_data maching_table_data" border="1"><thead>', 'vedic-astro-api'), esc_html($india_face), __(" Match Details ", "vedic-astro-api"), esc_html($india_face));

                        $html .= sprintf(__('<tr><th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th><th class="clr-black1"> <span class="fw-700 lh-20 fs-14">%s</span></th> <th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th><th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th> <th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span> </th></tr></thead><tbody>', 'vedic-astro-api'), __("Planet", "vedic-astro-api"),  __("Boy", "vedic-astro-api"), __("Girl", "vedic-astro-api"), __("Score", "vedic-astro-api"), __("Area of Life", "vedic-astro-api"),);

                        $score = [];
                        $score_msg = [];
                        foreach ($matching_data["response"] as $matching_data_key => $response) :
                            if ($matching_data_key == "score") :
                                $score[] = $response;
                            endif;
                            if ($matching_data_key ==   "bot_response") :
                                $score_msg[] = $response;
                            endif;
                            if (in_array($matching_data_key, $datap)) :
                                $html .= sprintf(__(' <tr> <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>', "vedic-astro-api"), esc_html($matching_data_key));

                            endif;
                            if (is_array($response) || is_object($response)) :
                                foreach ($response as $response_key => $response_value) :

                                    if ($button_id == "south-indian" && $response_key != "full_score") :
                                        $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span> </td>', "vedic-astro-api"), esc_html($response_value));
                                    elseif ($response_key != "boy_rasi" && $response_key != "girl_rasi" &&  $response_key != "full_score") :
                                        $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>', "vedic-astro-api"), esc_html($response_value));
                                    endif;
                                endforeach;
                            endif;
                        endforeach;

                        $str = $score_msg[0];
                        $str_value = explode(",", $str);

                        $html .= sprintf(__('<tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span> </td><td class="clr-black1">
                                                                <span class="fw-700 lh-20 fs-14"></span>  </td><td class="clr-black1"><span class="fw-700 lh-20 fs-14"></span> </td><td class="clr-black1"><span class="fw-700 lh-20 fs-14"><span>%s</span> <span class="fw-400">/ %s </span></span></td> <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span> </td> </tr> </tbody> </table></div></div>', 'vedic-astro-api'), __('Total', 'vedic-astro-api'), esc_html($score[0]), esc_html($total), esc_html(end($str_value)));

                        $html .= sprintf(__('<div class="astro_col-3 ssss"><div class="maching_info mlr-15"><div class="maching_info_data text_center"> <h4 class="clr-black fw-500 fs-28 m_0"><span class="fw-700 fs-56"> %s </span>/ %s</h4><p class="clr-black fw-400 fs-16 m_0">%s</p> 
                                                </div></div></div> </div></div>', "vedic-astro-api"), esc_html($score[0]), esc_html($total), esc_html(end($str_value)));

                        $html .= sprintf(__('<div class="lagan_chart_tabs_main"><div class="astro_content_tabs lagan_chart_tabs_main_data"><ul class="astro_content_menu p_0 display_flex lagan_chart_tabs_menu maching_data_menu" id="maching_data"><li class="active" maching_chart-id="1"><a href="javascript:void(0)" class="clr-gray fs-16 lh-24">%s</a></li><li maching_chart-id="2" class=""><a href="javascript:void(0)" class="clr-gray fs-16 lh-24">%s</a></li><li maching_chart-id="3" class=""><a href="javascript:void(0)" class="clr-gray fs-16 lh-24">%s</a></li></ul></div><div class="maching_tab_data display_block" maching_chart-content="1">', "vedic-astro-api"), __("Chart Details", "vedic-astro-api"), __("Planets", "vedic-astro-api"), __("Astro", "vedic-astro-api"),);


                        $html .=  $this->vedicastro_matching_chart(
                            $get_lagna_boy_response,
                            $get_lagna_girl_response,
                            $get_navamsha_boy_response,
                            $get_navamsha_girl_response,
                            $boy_chart_code,
                            $girl_chart_code,
                            $boy_style,
                            $girl_style
                        );

                        $html .= sprintf(__('</div> <div class="maching_tab_data display_none" maching_chart-content="2">', "vedic-astro-api"));

                        $html .=  $this->vedicastro_matching_plante_boy($get_boy_response);

                        $html .=  $this->vedicastro_matching_plante_girl($get_girl_response);
                        $html .= sprintf(__('</div> <div class="maching_tab_data display_none" maching_chart-content="3">', 'vedic-astro-api'));
                        $html .=  $this->vedicastro_matching_dosha_astro_details($get_doshas_detais);

                        $html .= $this->vedicastro_matching_astro_details($get_astro_detais);

                        $html .= sprintf(__('</div> </div>', "vedic-astro-api"));



                        echo json_encode(["status" => "success", "maching_results" => $html]);
                        wp_die();
                    } else {
                        echo json_encode([
                            "status" => "false",
                            "maching_results" => __("No result are found", 'vedic-astro-api'),
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "false",
                        "message" => __("Something wrong Please try again", 'vedic-astro-api'),
                    ]);
                    wp_die();
                }
            }
        } else {
            echo json_encode([
                "status" => "false",
                "maching_results" => __("Something wrong Please try again", 'vedic-astro-api'),
            ]);

            wp_die();
        }
    }

    /**
     * Vedicastro matching Astro Details
     *
     * @since    1.0.0
     */

    public function vedicastro_matching_astro_details($get_astro_detais)
    {
        $html = '';
        $boy_astro_details = $get_astro_detais["boy_astro_details"];
        if (is_array($get_astro_detais) &&  array_key_exists('lucky_gem', $boy_astro_details)) {
            $boy_lucky_gem = $boy_astro_details["lucky_gem"];

            $boy_lucky_gems = implode(", ", $boy_lucky_gem);

            $boy_lucky_num = $boy_astro_details["lucky_num"];
            $boy_lucky_nums = implode(", ", $boy_lucky_num);

            $boy_lucky_color = $boy_astro_details["lucky_colors"];
            $boy_lucky_colors = implode(", ", $boy_lucky_color);

            $boy_lucky_letter = $boy_astro_details["lucky_letters"];
            $boy_lucky_letters = implode(", ", $boy_lucky_letter);

            $boy_lucky_name_start = $boy_astro_details["lucky_name_start"];
            $boy_lucky_name_starts = implode(", ", $boy_lucky_name_start);


            $html .= sprintf(__('<div class="astor_tab_grid">
                <div class="astro_box_grid">
                    <div class="lagan_chart_birth_title">
                        <h4 class="fs-20 lh-24 fw-700">%s</h4><div class="astrotab_grid"></div><div class="boy_birth_table"><table class="lagan_birth_table_data" border="1"><tbody>', 'vedic-astro-api'), __('Boy Astro Details', 'vedic-astro-api'));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14"></span></td>
                                    </tr>', 'vedic-astro-api'), __('Ascendant/Lagna', 'vedic-astro-api'));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Nakshatra', 'vedic-astro-api'), esc_html($boy_astro_details["nakshatra"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Raasi/Moon Zodiac', 'vedic-astro-api'), esc_html($boy_astro_details["rasi"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Paya', 'vedic-astro-api'), esc_html($boy_astro_details["paya"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Tatva', 'vedic-astro-api'), esc_html($boy_astro_details["tatva"]));
            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Birth Dasa', 'vedic-astro-api'), esc_html($boy_astro_details["birth_dasa"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Birth Dasa Start', 'vedic-astro-api'), esc_html($boy_astro_details["birth_dasa_time"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Current Dasa', 'vedic-astro-api'), esc_html($boy_astro_details["current_dasa"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Current Dasa End', 'vedic-astro-api'), esc_html($boy_astro_details["current_dasa_time"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Lucky Gem', 'vedic-astro-api'), esc_html($boy_lucky_gems));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Lucky Number', 'vedic-astro-api'), esc_html($boy_lucky_nums));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Lucky Colors', 'vedic-astro-api'), esc_html($boy_lucky_colors));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Lucky Letters', 'vedic-astro-api'), esc_html($boy_lucky_letters));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr></tbody> </table> </div> </div></div>', 'vedic-astro-api'), __('Lucky Name Start', 'vedic-astro-api'), esc_html($boy_lucky_name_starts));

            $girl_astro_details = $get_astro_detais["girl_astro_details"];

            $girl_lucky_gem = $girl_astro_details["lucky_gem"];
            $girl_lucky_gems = implode(", ", $girl_lucky_gem);

            $girl_lucky_num = $girl_astro_details["lucky_num"];
            $girl_lucky_nums = implode(", ", $girl_lucky_num);

            $girl_lucky_color = $girl_astro_details["lucky_colors"];
            $girl_lucky_colors = implode(", ", $girl_lucky_color);

            $girl_lucky_letter = $girl_astro_details["lucky_letters"];
            $girl_lucky_letters = implode(", ", $girl_lucky_letter);

            $girl_lucky_name_start = $girl_astro_details["lucky_name_start"];
            $girl_lucky_name_starts = implode(", ", $girl_lucky_name_start);

            $html .= sprintf(__('<div class="astro_box_grid">
                    <div class="lagan_chart_birth_title">
                        <h4 class="fs-20 lh-24 fw-700">%s</h4><div class="astrotab_grid"></div><div class="boy_birth_table"><table class="lagan_birth_table_data" border="1"><tbody>', 'vedic-astro-api'), __('Girl Astro Details', 'vedic-astro-api'));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14"></span></td>
                                    </tr>', 'vedic-astro-api'), __('Ascendant/Lagna', 'vedic-astro-api'));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Nakshatra', 'vedic-astro-api'), esc_html($girl_astro_details["nakshatra"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Raasi/Moon Zodiac', 'vedic-astro-api'), esc_html($girl_astro_details["rasi"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Paya', 'vedic-astro-api'), esc_html($girl_astro_details["paya"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Tatva', 'vedic-astro-api'), esc_html($girl_astro_details["tatva"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Birth Dasa', 'vedic-astro-api'), esc_html($girl_astro_details["birth_dasa"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Birth Dasa Start', 'vedic-astro-api'), esc_html($girl_astro_details["birth_dasa_time"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Current Dasa', 'vedic-astro-api'), esc_html($girl_astro_details["current_dasa"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Current Dasa End', 'vedic-astro-api'), esc_html($girl_astro_details["current_dasa_time"]));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Lucky Gem', 'vedic-astro-api'), esc_html($girl_lucky_gems));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Lucky Number', 'vedic-astro-api'), esc_html($girl_lucky_nums));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Lucky Colors', 'vedic-astro-api'), esc_html($boy_lucky_colors));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), __('Lucky Letters', 'vedic-astro-api'), esc_html($girl_lucky_letters));

            $html .= sprintf(__(' <tr><td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr></tbody> </table> </div> </div></div></div>', 'vedic-astro-api'), __('Lucky Name Start', 'vedic-astro-api'), esc_html($girl_lucky_name_starts));
        }

        return $html;
    }

    /** vedicastro matching dosha details details **/

    public function vedicastro_matching_dosha_astro_details($get_doshas_detais)
    {
        $html = '';
        $mangaldosh_boy = $get_doshas_detais["mangaldosh_points"]["boy"];
        if ($mangaldosh_boy == 1) {
            $mangaldosh_boy = "true";
        } elseif ($mangaldosh_boy == "") {
            $mangaldosh_boy = "false";
        }

        $mangaldosh_girl = $get_doshas_detais["mangaldosh_points"]["girl"];
        if ($mangaldosh_girl == 1) {
            $mangaldosh_girl = "true";
        } elseif ($mangaldosh_girl == "") {
            $mangaldosh_girl = "false";
        }

        $pitradosh_boy = $get_doshas_detais["pitradosh_points"]["boy"];
        if ($pitradosh_boy == 1) {
            $pitradosh_boy = "true";
        } elseif ($pitradosh_boy == "") {
            $pitradosh_boy = "false";
        }

        $pitradosh_girl = $get_doshas_detais["pitradosh_points"]["girl"];
        if ($pitradosh_girl == 1) {
            $pitradosh_girl = "true";
        } elseif ($pitradosh_girl == "") {
            $pitradosh_girl = "false";
        }

        $kaalsarp_boy = $get_doshas_detais["kaalsarp_points"]["boy"];
        if ($kaalsarp_boy == 1) {
            $kaalsarp_boy = "true";
        } elseif ($kaalsarp_boy == "") {
            $kaalsarp_boy = "false";
        }

        $kaalsarp_girl = $get_doshas_detais["kaalsarp_points"]["girl"];
        if ($kaalsarp_girl == 1) {
            $kaalsarp_girl = "true";
        } elseif ($kaalsarp_girl == "") {
            $kaalsarp_girl = "false";
        }

        $manglikdosh_saturn_boy =
            $get_doshas_detais["manglikdosh_saturn_points"]["boy"];
        if ($manglikdosh_saturn_boy == 1) {
            $manglikdosh_saturn_boy = "true";
        } elseif ($manglikdosh_saturn_boy == "") {
            $manglikdosh_saturn_boy = "false";
        }

        $manglikdosh_saturn_girl =
            $get_doshas_detais["manglikdosh_saturn_points"]["girl"];
        if ($manglikdosh_saturn_girl == 1) {
            $manglikdosh_saturn_girl = "true";
        } elseif ($manglikdosh_saturn_girl == "") {
            $manglikdosh_saturn_girl = "false";
        }

        $manglikdosh_rahuketu_boy =
            $get_doshas_detais["manglikdosh_rahuketu_points"]["boy"];
        if ($manglikdosh_rahuketu_boy == 1) {
            $manglikdosh_rahuketu_boy = "true";
        } elseif ($manglikdosh_rahuketu_boy == "") {
            $manglikdosh_rahuketu_boy = "false";
        }

        $manglikdosh_rahuketu_girl =
            $get_doshas_detais["manglikdosh_rahuketu_points"]["girl"];
        if ($manglikdosh_rahuketu_girl == 1) {
            $manglikdosh_rahuketu_girl = "true";
        } elseif ($manglikdosh_rahuketu_girl == "") {
            $manglikdosh_rahuketu_girl = "false";
        }

        $html .= sprintf(__('<div class="astor_tab_grid">
                    <div class="astro_box_grid">
                        <div class="lagan_chart_birth_title">
                            <h4 class="fs-20 lh-24 fw-700">%s</h4> <div class="astrotab_grid"></div>
                            <div class="dash_table"><table class="lagan_birth_table_data" border="1"><thead>', 'vedic-astro-api'), __('Dosha Details', ''));

        $html .= sprintf(__('<tr><th  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th>
                                    <th  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th>
                                    <th  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th> </tr></thead><tbody>', 'vedic-astro-api'), __('Title', 'vedic-astro-api'), __('Boy', 'vedic-astro-api'), __('Girl', 'vedic-astro-api'));

        $html .= sprintf(__('<tr><td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __('Mangal Dosh', 'vedic-astro-api'), esc_html($mangaldosh_boy), esc_html($mangaldosh_girl));

        $html .= sprintf(__('<tr><td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __('Pitra Dosh', 'vedic-astro-api'), esc_html($pitradosh_boy), esc_html($pitradosh_girl));

        $html .= sprintf(__('<tr><td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __('KaalSarp Dosh', 'vedic-astro-api'), esc_html($kaalsarp_boy), esc_html($kaalsarp_girl));

        $html .= sprintf(__('<tr><td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __('Manglik Dosh - Saturn', 'vedic-astro-api'), esc_html($manglikdosh_saturn_boy), esc_html($manglikdosh_saturn_girl));

        $html .= sprintf(__('<tr><td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                    <td  class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), __('Manglik Dosh - Rahu &amp; Ketu', 'vedic-astro-api'), esc_html($manglikdosh_rahuketu_boy), esc_html($manglikdosh_rahuketu_girl));

        $html .= sprintf(__(' </tbody></table></div> </div></div> <div class="dasha_details "> <p class="clr-black1 fs-16 lh-24 fw-400 bg-grey1">%s</p></div></div>', 'vedic-astro-api'), esc_html($get_doshas_detais["extended_response"]));
        return $html;
    }

    /**
     * Vedicastro matching plante boy
     *
     * @since    1.0.0
     */

    public function vedicastro_matching_plante_boy($get_boy_response)
    {
        $html = '';
        $planets = [];
        $key_array = [
            0, 1, 2,  3, 4, 5, 6, 7, 8,  9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
        ];
        if (!empty($get_boy_response)) :
            foreach ($get_boy_response as $key => $val) :
                if (in_array($key, $key_array, true)) :
                    $planets[$key] = $val;
                    unset($get_boy_response[$key]);
                endif;
            endforeach;
        endif;

        $html .= sprintf(__('<div class="boy_planetary">
                                <div class="lagan_chart_birth_title">
                                    <h4 class="fs-20 lh-24 fw-500">%s</h4></div>
                                        <div class="choose_services_row">
                                            <div class="astro_col-12">
                                            <div class="lagan_chart_birth_table mlr-15"><table class="lagan_birth_table_data planetary_table_data" border="1">
                                            <thead>', 'vedic-astro-api'), __('Boy’s Planetary Details', 'vedic-astro-api'));

        $html .= sprintf(__('<tr><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                        <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                        <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                        <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                        <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                        <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th></tr></thead><tbody>', 'vedic-astro-api'), __('Planet', 'vedic-astro-api'), __('House', 'vedic-astro-api'), __('Zodiac', 'vedic-astro-api'), __('Nakshatra', 'vedic-astro-api'), __('Degree in Sign', 'vedic-astro-api'), __('Degrees', 'vedic-astro-api'));
        foreach ($planets  as $planetary_key =>  $planetary_val) :
            $html .= sprintf(__('<tr> <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>', 'vedic-astro-api'), esc_html($planetary_val["full_name"]), esc_html($planetary_val["house"]),  esc_html($planetary_val["zodiac"]));

            if (array_key_exists('nakshatra', $planetary_val)) {
                $nakshatra = $planetary_val["nakshatra"];
            } else {
                $nakshatra = '';
            }
            $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s %s %s ) </span></td>', 'vedic-astro-api'), esc_html($nakshatra), __('( Pada', 'vedic-astro-api'), esc_html($planetary_val["nakshatra_pada"]));

            $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>', 'vedic-astro-api'), esc_html($planetary_val["local_degree"]));

            $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), esc_html($planetary_val["global_degree"]));
        endforeach;
        $html .= sprintf(__(' </tbody></table></div></div></div></div>', 'vedic-astro-api'), esc_html($planetary_val["global_degree"]));

        return $html;
    }

    /**
     * Vedicastro matching plante girl
     *
     * @since    1.0.0
     */

    public function vedicastro_matching_plante_girl($get_girl_response)
    {
        $html = '';
        $girl_planets = [];
        $key_array = [
            0, 1, 2,  3, 4, 5, 6, 7, 8,  9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
        ];
        if (!empty($get_girl_response)) :
            foreach ($get_girl_response as $key => $val) :
                if (in_array($key, $key_array, true)) :
                    $girl_planets[$key] = $val;
                    unset($get_girl_response[$key]);
                endif;
            endforeach;
        endif;
        $html .= sprintf(__('<div class="boy_planetary">
                                <div class="lagan_chart_birth_title">
                                    <h4 class="fs-20 lh-24 fw-500">%s</h4></div>
                                        <div class="choose_services_row">
                                            <div class="astro_col-12">
                                            <div class="lagan_chart_birth_table mlr-15"><table class="lagan_birth_table_data planetary_table_data" border="1">
                                            <thead>', 'vedic-astro-api'), __('Girl’s Planetary Details', 'vedic-astro-api'));
        $html .= sprintf(__('<tr><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                    <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                    <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                    <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                    <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th>
                                    <th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th></tr></thead><tbody>', 'vedic-astro-api'), __('Planet', 'vedic-astro-api'), __('House', 'vedic-astro-api'), __('Zodiac', 'vedic-astro-api'), __('Nakshatra', 'vedic-astro-api'), __('Degree in Sign', 'vedic-astro-api'), __('Degrees', 'vedic-astro-api'));

        foreach ($girl_planets as $planetary_key => $planetary_val) :

            $html .= sprintf(__('<tr> <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>', 'vedic-astro-api'), esc_html($planetary_val["full_name"]), esc_html($planetary_val["house"]),  esc_html($planetary_val["zodiac"]));

            if (array_key_exists('nakshatra', $planetary_val)) {
                $nakshatra = $planetary_val["nakshatra"];
            } else {
                $nakshatra = '';
            }
            $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s %s %s )</span></td>', 'vedic-astro-api'), esc_html($nakshatra), __('( Pada', 'vedic-astro-api'), esc_html($planetary_val["nakshatra_pada"]));

            $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>', 'vedic-astro-api'), esc_html($planetary_val["local_degree"]));

            $html .= sprintf(__('<td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td></tr>', 'vedic-astro-api'), esc_html($planetary_val["global_degree"]));
        endforeach;
        $html .= sprintf(__(' </tbody></table></div></div></div></div>', 'vedic-astro-api'), esc_html($planetary_val["global_degree"]));

        return $html;
    }

    /**
     * Vedicastro Moon Calender ajax
     *
     * @since    1.0.0
     */

    public function vedicastro_panchang_moon_ajax()
    {
        $output = "";

        $form_data = $_POST['form_data'];

        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {
                $data_key = sanitize_key($data['name']);

                if ($data_key == 'moon_nonce') {

                    if (!wp_verify_nonce($data['value'], 'moon_nonce_field')) {

                        echo json_encode(array("status" => "error", "message" => __("Something went wrong", 'vedic-astro-api'),));

                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $user_lang = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'panchang-moon-month') {

                        $panchang_moon_month = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'panchang-moon-year') {

                        $panchang_moon_year =  sanitize_text_field($data['value']);
                    }
                }
            }

            $year = (int) $panchang_moon_year;
            $month = (int) $panchang_moon_month;
            $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $moonphase_endpoint = "panchang/moon-calendar";
            $api_key = $this->vedicastro_google_api_key();
            $get_moonphase_data = [];
            $first_day = 01;
            $ndate = $month . "/" . $first_day . "/" . $year;
            $api_moonphase_data = [
                "date" => date("d/m/Y", strtotime($ndate)),
                "api_key" => $api_key,
                "lang" => $user_lang,
            ];

            $get_moonphase_data = $this->vedicastro_api(
                $moonphase_endpoint,
                $api_moonphase_data
            );
            $get_moonphase_data_res = $get_moonphase_data["response"];

            if (
                is_array($get_moonphase_data) &&
                $get_moonphase_data["status"] == 200
            ) {
                $api_moonphase_data_english = [
                    "api_key" => $api_key,
                    "date" => date("d/m/Y", strtotime($ndate)),
                    "lang" => "en",
                ];
                $get_moonphase_data_en = $this->vedicastro_api(
                    $moonphase_endpoint,
                    $api_moonphase_data_english
                );
                $get_moonphase_data_en_res = $get_moonphase_data_en["response"];

                $get_monthly_panchang = [
                    "get_moonphase_data" => $get_moonphase_data_res,
                    "get_moonphase_data_en" => $get_moonphase_data_en_res,
                    "year" => $year,
                    "month" => $month,
                ];
            }

            if (is_array($get_moonphase_data) && !empty($get_moonphase_data)) :
                $output = $this->vedicastro_moon_data_details(
                    $get_monthly_panchang
                );
            endif;
            echo json_encode(["status" => "success", "html" => $output]);
            wp_die();
        }
    }

    /**
     * Vedicastro retro ajax
     *
     * @since    1.0.0
     */
    public function vedicastro_retro_ajax()
    {
        $form_data = $_POST['form_data'];
        $html = '';
        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {

                $data_key = sanitize_key($data['name']);


                if ($data_key == 'retro_nonce') {

                    if (!wp_verify_nonce($data['value'], 'retro_nonce_field')) {

                        echo json_encode(
                            array(
                                "status" => "error",
                                "message" => __("Something went wrong", 'vedic-astro-api'),
                            )
                        );

                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $lang = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'retro-year') {

                        $retro_year = absint($data['value']);
                    }
                }
            }

            $planets_data = array(
                'mercury' => __('Mercury', 'vedic-astro-api'),
                'venus'   => __('Venus', 'vedic-astro-api'),
                'mars'    => __('Mars', 'vedic-astro-api'),
                'saturn'  => __('Saturn', 'vedic-astro-api'),
                'jupiter' => __('Jupiter', 'vedic-astro-api'),
                'rahu'    => __('Rahu', 'vedic-astro-api'),
            );
            $findretro_endpoint = 'panchang/retrogrades';
            $api_key = $this->vedicastro_google_api_key();

            if (empty($api_key)) {

                echo json_encode(
                    array(
                        "status" => "error",
                        "message" => __("API key is missing", 'vedic-astro-api'),
                    )
                );

                wp_die();
            }

            if (!empty($planets_data)) :
                foreach ($planets_data as $planets_key => $planets_val) :
                    $api_retro_data[] = array(
                        'year'      => $retro_year,
                        'planet'    => $planets_key,
                        'api_key'   => $api_key,
                        'lang'      => $lang
                    );
                endforeach;
            endif;

            if (!empty($api_retro_data)) :
                foreach ($api_retro_data as $api_retro_key => $api_retro_val) :
                    $get_all_planet_data[] = array_merge($this->vedicastro_api($findretro_endpoint, $api_retro_val), array('planet' => $api_retro_data[$api_retro_key]['planet']));
                endforeach;
            endif;

            if (!empty($get_all_planet_data)) :
                $html .= sprintf(__('<div class="choose_services_row">', 'vedic-astro-api'));
                foreach ($get_all_planet_data as $get_all_planet_key => $get_all_planet_val) :
                    if ($get_all_planet_val['status'] == 200 && $get_all_planet_val['response']['status'] == 1) :

                        $html .= sprintf(__('<div class="astro_col-6">
                                <div class="retro_planites_box position_relative"> 
                                        <p class="fs-16 lh-24 text-black fw-400">%s</p>', 'vedic-astro-api'), esc_html__($get_all_planet_val['response']['bot_response']));

                        $html .= sprintf(__(' <div class="planites"> 
                                                        <img src="%s" class="img_fluid">', 'vedic-astro-api'), esc_url(VEDICASTRO_URL . 'public/images/planet/' . $get_all_planet_val['planet'] . '.png', "vedic-astro-api"));

                        $html .= sprintf(__(' <span class="fs-20 fw-500 lh-24 clr-black">%s</span>', 'vedic-astro-api'), esc_html__($planets_data[$get_all_planet_val['planet']]));

                        $html .= sprintf(__(' </div>
                                    </div>
                            </div>', 'vedic-astro-api'));
                    endif;
                endforeach;

                $html .= sprintf(__(' </div> ', 'vedic-astro-api'));
            endif;

            echo json_encode(array('status' => 'success', 'html' => $html));
            wp_die();
        } else {
            echo json_encode(array("status" => "error", "message" => __("Something went wrong", 'vedic-astro-api'),));
            wp_die();
        }
    }

    /**
     * Vedicastro moon data details
     *
     * @since    1.0.0
     */

    public function vedicastro_moon_data_details($get_monthly_panchang)
    {
        $html = '';
        if (is_array($get_monthly_panchang) && !empty($get_monthly_panchang)) :
            $day = '01';
            $month = $get_monthly_panchang['month'];
            $year = $get_monthly_panchang['year'];
            $moon_name_english_image = $get_monthly_panchang['get_moonphase_data_en'];
            $get_name_english_image = count($moon_name_english_image);
            $dateObj   = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
            $get_moonphase_data = $get_monthly_panchang['get_moonphase_data'];

            ob_start();
            if (is_array($get_moonphase_data) &&  !empty($get_moonphase_data)) {
                $enddate = date("t", mktime(0, 0, 0, $month, $day, $year));  // day count month
                $s = date("w", mktime(0, 0, 0, $month, 1, $year));      // day start week month 

                $html .= sprintf(__('<div class="lagan_chart_birth_title">', 'vedic-astro-api'));
                $html .= sprintf(__('<h4 class="fs-32 fw-500 clr-black">%s <span class="calendar_val">%s</span></h4>', 'vedic-astro-api'), 'Moon Calendar for the month of', $monthName);
                $html .= sprintf(__('<table class="calender moon"><tbody style="text-align:center;"><tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>', 'vedic-astro-api'), __('Sunday', 'vedic-astro-api'), __('Monday', 'vedic-astro-api'), __('Tuesday', 'vedic-astro-api'), __('Wednesday', 'vedic-astro-api'), __('Thursday', 'vedic-astro-api'), __('Friday', 'vedic-astro-api'), __('Satuarday', 'vedic-astro-api'));

                if ($s == 5 && $enddate == 30 || $s == 5 && $enddate == 31) {
                    $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                    $d = 1;

                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        $state_en = $moon_name_english_image[$i]['state'];
                        if ($d == 31) {
                            $html .= $this->get_moon_phase_details_html($get_moonphase_data[$i], $state_en);
                        }
                        $d = $d + 1;
                    }

                    $s = 4;
                    for ($ds = 1; $ds <= $s; $ds++) {
                        $html .= sprintf(__('<td></td>', 'vedic-astro-api'));
                    }
                    $d = 1;

                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        $state_en = $moon_name_english_image[$i]['state'];
                        if ($d <= 30) {
                            // w 6 day count number 123456
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
                                $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                            }
                            $html .= $this->get_moon_phase_details_html($get_moonphase_data[$i], $state_en);

                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
                                $html .= sprintf(__('</tr>', 'vedic-astro-api'));
                            }
                        }
                        $d = $d + 1;
                    }
                } elseif ($s == 6 && $enddate == 30) {
                    $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        $state_en = $moon_name_english_image[$i]['state'];
                        if ($d == 30) {
                            $html .= $this->get_moon_phase_details_html($get_moonphase_data[$i], $state_en);
                        } elseif ($d == 31) {
                            $html .= $this->get_moon_phase_details_html($get_moonphase_data[$i], $state_en);
                        }
                        $d = $d + 1;
                    }
                    $s = 4;
                    for ($ds = 1; $ds <= $s; $ds++) {
                        $html .= sprintf(__('<td></td>', 'vedic-astro-api'));
                    }
                    $d = 1;

                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        $state_en = $moon_name_english_image[$i]['state'];

                        // datetime divide days and date
                        if ($d <= 29) {
                            // w 6 day count number 123456
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
                                $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                            }
                            $html .= $this->get_moon_phase_details_html($get_moonphase_data[$i], $state_en);

                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
                                $html .= sprintf(__('</tr>', 'vedic-astro-api'));
                            }
                        }
                        $d = $d + 1;
                    }
                } elseif ($s == 6 && $enddate == 31) {
                    $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        $state_en = $moon_name_english_image[$i]['state'];

                        // datetime divide days and date
                        if ($d == 30) {
                            $html .= $this->get_moon_phase_details_html($get_moonphase_data[$i], $state_en);
                        } elseif ($d == 31) {
                            $html .=  $this->get_moon_phase_details_html($get_moonphase_data[$i], $state_en);
                        }
                        $d = $d + 1;
                    }
                    $s = 4;
                    for ($ds = 1; $ds <= $s; $ds++) {
                        $html .= sprintf(__('<td></td>', 'vedic-astro-api'));
                    }
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        $state_en = $moon_name_english_image[$i]['state'];

                        // datetime divide days and date
                        if ($d <= 29) {
                            // w 6 day count number 123456
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
                                $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                            }
                            $html .=  $this->get_moon_phase_details_html($get_moonphase_data[$i], $state_en);
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
                                $html .= sprintf(__('</tr>', 'vedic-astro-api'));
                            }
                        }
                        $d = $d + 1;
                    }
                } else {
                    if ($s != 0) {
                        $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                    }
                    for ($ds = 1; $ds <= $s; $ds++) {
                        $html .= sprintf(__('<td></td>', 'vedic-astro-api'));
                    }
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        $state_en = $moon_name_english_image[$i]['state'];

                        // w 6 day count number 123456
                        if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
                            $html .= sprintf(__('</tr>', 'vedic-astro-api'));
                        }
                        $html .= $this->get_moon_phase_details_html($get_moonphase_data[$i], $state_en);

                        if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
                            $html .= sprintf(__('</tr>', 'vedic-astro-api'));
                        }
                        $d = $d + 1;
                    }
                }

                $html .= sprintf(__('</tbody></table>', 'vedic-astro-api'));
            }
        endif;
        return $html;
    }
    /**
     * Vedicastro numberology ajax
     *
     * @since    1.0.0
     */
    public function vedicastro_numberology_ajax()
    {
        $personal_day_number = '';
        $form_data = $_POST['form_data'];

        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {
                $data_key = sanitize_key($data['name']);

                if ($data_key == 'numrology_nonce') {

                    if (!wp_verify_nonce($data['value'], 'numrology_nonce_field')) {

                        echo json_encode(array("status" => "error", "message" => __("Something went wrong", 'vedic-astro-api'),));

                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $lang = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'numberology-name') {

                        $numberology_name = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'numberology-date') {

                        $numberology_date =  $this->vaapi_validate_date_field($data['value']);
                    }
                }
            }

            $numberology_personal_day_endpoint = 'prediction/day-number';
            $numerology_endpoint = 'prediction/numerology';
            $api_key = $this->vedicastro_google_api_key();

            if (empty($api_key)) {

                echo json_encode(array("status" => "error", "message" => __("API key is missing", 'vedic-astro-api'),));

                wp_die();
            }

            $api_daynumber  = array(
                'dob'     => date('d/m/Y', strtotime($numberology_date)),
                'lang'    => $lang,
                'api_key' => $api_key
            );

            $numberology_personal_day_data = $this->vedicastro_api($numberology_personal_day_endpoint, $api_daynumber);

            $day_number_status = $numberology_personal_day_data['status'];
            $api_numrology  = array(
                'name'    => $numberology_name,
                'date'    => date('d/m/Y', strtotime($numberology_date)),
                'lang'    => $lang,
                'api_key' => $api_key
            );

            $numerology_data = $this->vedicastro_api($numerology_endpoint, $api_numrology);

            $numerology_status = $numerology_data['status'];
            if (!empty($day_number_status) && $day_number_status == 200) :

                $personal_day_number .= sprintf(__('<div class="kundli_vedic mlr-15 bdr-gray bg-white"><div class="kundli_vedic_form Numerology_vedic_form Numerology_vedic_form1"><div class="kundli_vedic_login_form Numerology_form_get"><h4 class="fs-20 lh-24 fw-500 clr-black m_0">%s</h4><div class="Numerology_vedic_number text_center"><h4 class="fs-48 m_0 clr-pink fw-500">%s</h4>', 'vedic-astro-api'), esc_html__($numberology_personal_day_data['response']['title'], 'vedic-astro-api'), esc_html__($numberology_personal_day_data['response']['number'], 'vedic-astro-api'));

                if ($numberology_personal_day_data['response']['master'] == true) :
                    $personal_day_number .= sprintf(__('<span class="clr-pink fs-8 lh-12 fw-700">%s</span>', 'vedic-astro-api'), esc_html__('Master Number', 'vedic-astro-api'));
                endif;

                $personal_day_number .= sprintf(__('</div>', 'vedic-astro-api'));

                if (!empty($numberology_personal_day_data['response']['meaning'])) :
                    $personal_day_number .= sprintf(__('<div class="Numerology_vedic_content">
                                    <p class="fs-10 lh-15 text-black">%s</p>
                                </div>', 'vedic-astro-api'), esc_html__($numberology_personal_day_data['response']['meaning'], 'vedic-astro-api'));
                endif;

                $personal_day_number .= sprintf(__('</div></div></div>', 'vedic-astro-api'));

            endif;

            $numerology_html = '';
            if (!empty($numerology_status) && $numerology_status == 200) :

                $response = $numerology_data['response'];
                $numerology_html .= sprintf(__('<div class="numberlogy_grid">', 'vedic-astro-api'));

                if (!empty($response) && is_array($response)) :

                    foreach ($response as $response_key => $response_val) :

                        if ($response_key == 'destiny') {
                            $mast_number = ' Master Number';
                        } else {
                            $mast_number = '';
                        }

                        $numerology_html .= sprintf(__('<div class="dashas_dosh"><div class="dashas_box numberlogy_box"><div class="dashas_dosh_content"><h4 class="fs-20 lh-30 fw-700">%s</h4><p class="fs-16 lh-24 clr-black29 fw-400"><strong class="fs-24 lh-24 fw-700">%s</strong><span class="fs-16 lh-24 clr-black29 fw-400">%s %s</span></p>', 'vedic-astro-api'), esc_html__($response_val['title'], 'vedic-astro-api'), esc_html__($response_val['number'], 'vedic-astro-api'), esc_html__($response_val['title'] . ' Number', 'vedic-astro-api'), esc_html__($mast_number, 'vedic-astro-api'));

                        if (!empty($response_val['meaning'])) :
                            $numerology_html .= sprintf(__('<h4 class="fs-16 lh-24 clr-black29 fw-500">%s</h4><p class="fs-16 lh-24 clr-black29 fw-400">%s</p>', 'vedic-astro-api'), esc_html__('Meaning', 'vedic-astro-api'), esc_html__($response_val['meaning'], 'vedic-astro-api'));
                        endif;

                        if (!empty($response_val['description'])) :

                            $numerology_html .= sprintf(__('<h4 class="fs-16 lh-24 clr-black29 fw-500">%s</h4><p class="fs-16 lh-24 clr-black29 fw-400">%s</p>', 'vedic-astro-api'), esc_html__('Description', 'vedic-astro-api'), esc_html__($response_val['description'], 'vedic-astro-api'));
                        endif;

                        $numerology_html .= sprintf(__('</div></div></div>', 'vedic-astro-api'));

                    endforeach;

                endif;

                $numerology_html .= sprintf(__('</div>', 'vedic-astro-api'));

            endif;

            echo json_encode(array('status' => 'success', 'personal_day_number' => $personal_day_number, 'numerology_html' => $numerology_html));
            wp_die();
        }
    }

    /**
     * Vedicastro Moon Phase Details html  ajax
     *
     * @since    1.0.0
     */

    public function get_moon_phase_details_html($get_moonphase_data, $state_en)
    {
        if (array_key_exists('state', $get_moonphase_data)) {
            $state = $get_moonphase_data["state"];
        } else {
            $state = '';
        }
        $moon_date = $get_moonphase_data["date"];
        //         $state = $get_moonphase_data["state"];
        $luminance = $get_moonphase_data["luminance"];
        $phase = $get_moonphase_data["phase"];
        $paksha = $get_moonphase_data["paksha"];

        $html = sprintf(__('<td><div class="moon"><p> %s </p><div class="moon_shape"><p> %s </p></div><div class="moon_img"><img src=" %s" class="img_fluid"></div></div><div class="tithi"><p> %s </p><p> %s </p></div><div><p> %s </p></div></td>', 'vedic-astro-api'), esc_html__($moon_date, 'vedic-astro-api'),  esc_html__($state, "vedic-astro-api"), esc_url(VEDICASTRO_URL .  "public/images/moon/" . $state_en . ".png"),  esc_html__($luminance . " luminance", "vedic-astro-api"), esc_html__($phase . "Phase", "vedic-astro-api"), esc_html__($paksha, "vedic-astro-api"));

        return $html;
    }

    /**
     * ----- Vedicastro Monthly calender ajax ---- *
     */
    public function vedicastro_panchang_monthly_ajax()
    {
        $form_data = $_POST['form_data'];

        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {
                $data_key = sanitize_key($data['name']);

                if ($data_key == 'monthly_nonce') {

                    if (!wp_verify_nonce($data['value'], 'monthly_nonce_field')) {

                        echo json_encode(array("status" => "error", "message" => __("Something went wrong", 'vedic-astro-api'),));

                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $language = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'panchang-moon-month') {

                        $panchang_monthly_date = $this->vaapi_validate_date_field($data['value']);
                    } elseif ($data_key == 'panchang-moon-year') {

                        $panchang_monthly_year =  $this->vaapi_validate_date_field($data['value']);
                    }
                }
            }

            $year = (int) $panchang_monthly_year;
            $month = (int) $panchang_monthly_date;
            $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $monthly_endpoint = "panchang/monthly-panchang";
            $api_key = $this->vedicastro_google_api_key();
            $i = "1";
            $ndate = $month . "/" . $i . "/" . $year;

            if (!empty($total_days)) :
                $api_data = [
                    "api_key" => $api_key,
                    "date" => date("d/m/Y", strtotime($ndate)),
                    "lang" => $language,
                ];
                $get_monthly_data = $this->vedicastro_api(
                    $monthly_endpoint,
                    $api_data
                );

                if (is_array($get_monthly_data) && $get_monthly_data["status"] == 200) {
                    $api_data_en = [
                        "api_key" => $api_key,
                        "date" => date("d/m/Y", strtotime($ndate)),
                        "lang" => "en",
                    ];
                    $get_monthly_data_en = $this->vedicastro_api(
                        $monthly_endpoint,
                        $api_data_en
                    );

                    $get_monthly_panchang = [
                        "get_monthly_data" => $get_monthly_data["response"],
                        "get_monthly_data_en" => $get_monthly_data_en["response"],
                        "year" => $year,
                        "month" => $month,
                    ];
                    if (!empty($get_monthly_data)) :
                        $get_monthly_html = $this->vedicastro_monthly_data_details(
                            $get_monthly_panchang
                        );
                    endif;
                    echo json_encode(["status" => "success", "html" => $get_monthly_html]);
                    wp_die();
                } else {
                    echo json_encode(array("status" => "error", "message" => __("Something went wrong", 'vedic-astro-api')));
                    wp_die();
                }

            endif;
        } else {
            echo json_encode(array("status" => "error", "message" => __("Something went wrong", 'vedic-astro-api')));
            wp_die();
        }
    }

    /* 
        * ----- Gem & Rudraksh Ajax ---- *
        */
    public function vedicastro_gem_rudraksh_ajax()
    {
        $form_data = $_POST['form_data'];
        $rudraksh_date = date('Y-m-d');
        $rudraksh_name = '';
        $rudraksh_time = '';
        $timezone = VAAPI_LOCATION_TIMEZONE;
        $latitude = VAAPI_LOCATION_LATITUDE;
        $longitude = VAAPI_LOCATION_LONGITUDE;
        $languages = 'en';

        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {

                $data_key = sanitize_key($data['name']);


                if ($data_key == 'rudhraksh_nonce') {

                    if (!wp_verify_nonce($data['value'], 'rudhraksh_nonce_field')) {

                        echo json_encode(
                            array(
                                "status" => "error",
                                "message" => __("Something went wrong", 'vedic-astro-api'),
                            )
                        );

                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $languages = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'rudraksh-name') {

                        $rudraksh_name = sanitize_text_field($data['value']);

                        if (empty($rudraksh_name)) {

                            echo json_encode(
                                array(
                                    "status" => "error",
                                    "message" => __("Name is missing", 'vedic-astro-api'),
                                )
                            );

                            wp_die();
                        }
                    } elseif ($data_key == 'rudraksh-date') {

                        $rudraksh_date = $this->vaapi_validate_date_field($data['value']);
                    } elseif ($data_key == 'rudraksh-time') {

                        $rudraksh_times = absint($data['value']);

                        $rudraksh_time = date("h:i", strtotime($rudraksh_times));
                    } elseif ($data_key == 'user_location_latitude') {

                        $latitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_longitude') {

                        $longitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_timezone') {

                        $timezone = floatval($data['value']);
                    } elseif ($data_key == 'rudraksh-location') {

                        $rudraksh_location = sanitize_text_field($data['value']);
                    }
                }
            }

            $api_key = $this->vedicastro_google_api_key();

            if (empty($api_key)) {

                echo json_encode(
                    array(
                        "status" => "error",
                        "message" => __("API key is missing", 'vedic-astro-api'),
                    )
                );

                wp_die();
            } else {

                $rudhraksh_endpoint = "extended-horoscope/rudraksh-suggestion";
                $gem_suggestion_endpoint = "extended-horoscope/gem-suggestion";

                $api_data = [
                    "dob"   => date("d/m/Y", strtotime($rudraksh_date)),
                    "tob"   => $rudraksh_time,
                    "lat"   => $latitude,
                    "lon"   => $longitude,
                    "tz"    => $timezone,
                    "lang"  => $languages,
                    "api_key" => $api_key,
                ];

                $get_data_rudhraksh = $this->vedicastro_api(
                    $rudhraksh_endpoint,
                    $api_data
                );

                $gem_suggestion_data = $this->vedicastro_api(
                    $gem_suggestion_endpoint,
                    $api_data
                );

                $dosh_data = [
                    "get_data_rudhraksh"  => $get_data_rudhraksh,
                    "gem_suggestion_data" => $gem_suggestion_data,
                ];

                $status = $get_data_rudhraksh["status"];
                if (is_array($get_data_rudhraksh) && !empty($get_data_rudhraksh)) {
                    if ($status == 200) {
                        $response = $get_data_rudhraksh["response"];
                        $dosh = $this->vedicastro_rudhraksh_gem_details($dosh_data);

                        echo json_encode(["status" => "success", "dosh_data" => $dosh]);
                    } else {
                        echo json_encode([
                            "status" => "error",
                            "message" => __("No result found", 'vedic-astro-api'),
                        ]);
                    }
                    wp_die();
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" => __("No result found", 'vedic-astro-api'),
                    ]);
                    wp_die();
                }
            }
        } else {
            echo json_encode(
                array(
                    "status" => "error",
                    "message" => __("Something  wrong Please Try Again", 'vedic-astro-api'),
                )
            );

            wp_die();
        }
    }

    /* 
        * ----- Gem & Rudraksh Details  ---- *
        */

    public function vedicastro_rudhraksh_gem_details($dosh_data)
    {
        if (!empty($dosh_data)) :

            $dosh_factors = $this->vedicastro_dosh_factors();
            $dosh_factors_title = $this->vedicastro_dosh_factors_title();
            $get_data_rudhraksh = $dosh_data["get_data_rudhraksh"]["response"];
            $gem_suggestion_data =
                $dosh_data["gem_suggestion_data"]["response"];
            $get_data_wealth = $get_data_rudhraksh["mukhi_for_money"];
            $mukhi_for_money = implode(", ", $get_data_wealth);
            $mukhi_for_disease_cure =
                $get_data_rudhraksh["mukhi_for_disease_cure"];
            $mukhi_for_disease = $get_data_rudhraksh["mukhi_description"];
            if (is_array($mukhi_for_disease)) :
                $mukhi_description = $mukhi_for_disease[0];
            else :
                $mukhi_description = $mukhi_for_disease;
            endif;

            $mukhi_for_disease = implode(", ", $mukhi_for_disease_cure);
            $diseases_cure = $gem_suggestion_data["diseases_cure"];
            $flaws_effect = $gem_suggestion_data["flaw_results"];

            $gem_mukhi_for_disease = implode(", ", $diseases_cure);


            $html = sprintf(__('<div class="sde_sati_group"><div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500">%s</h4></div><div class="dashas_dosh"><div class="dashas_box"><div class="dashas_dosh_content">', 'vedic-astro-api'), __("Rudraksh", "vedic-astro-api"));

            $html .= sprintf(__('<h4 class="fs-14 lh-20 fw-700">%s</h4><p class="fs-14 lh-20 fw-400">%s</p><h4 class="fs-14 lh-20 fw-700">%s</h4><p class="fs-14 lh-20 fw-400"><span>%s</span></p>', 'vedic-astro-api'), __("Short Read :", "vedic-astro-api"), esc_html($get_data_rudhraksh["bot_response"]), __("Recommendation", "vedic-astro-api"), esc_html($mukhi_description),);

            $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span>%s</span></p>', 'vedic-astro-api'), __("Mukhi For Wealth :", "vedic-astro-api"), esc_html($mukhi_for_money));

            $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span>%s</span></p></div></div></div>', 'vedic-astro-api'), __("Mukhi For Disease :", "vedic-astro-api"), esc_html($mukhi_for_disease));

            $html .= sprintf(__('<div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500">%s</h4></div><div class="dashas_dosh"><div class="dashas_box">
                    <div class="dashas_dosh_content"> ', 'vedic-astro-api'), __("Gem Stone", "vedic-astro-api"));

            $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span>%s</span></p>', 'vedic-astro-api'), __("You are recommended to wear -", "vedic-astro-api"), __("Emerald (Also called Panna)", "vedic-astro-api"));

            $html .= sprintf(__('<h4 class="fs-14 lh-20 fw-700">%s</h4><p class="fs-14 lh-20 fw-400">%s</p><p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span></span></p>', 'vedic-astro-api'), esc_html__("Description :", "vedic-astro-api"), esc_html($gem_suggestion_data["description"]), __("Benefits :", "vedic-astro-api"));

            $html .= sprintf(__('<p class="fs-14 lh-20 fw-400">
                                    <span class="fw-700">%s</span>
                                    <span>%s</span></p><p class="fs-14 lh-20 fw-400">
                                    <span class="fw-700">%s</span>
                                    <span>%s</span></p>', 'vedic-astro-api'), __("Diseases Cure :", "vedic-astro-api"), esc_html($gem_mukhi_for_disease), __("Time to wear :", "vedic-astro-api"), esc_html($gem_suggestion_data["time_to_wear_short"]));


            $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span>
                            <span>%s</span></p><p class="fs-14 lh-20 fw-400">
                            <span class="fw-700">%s</span>
                            <span>%s</span></p>', 'vedic-astro-api'), __("Method to wear :", "vedic-astro-api"), esc_html($gem_suggestion_data["methods"]), __("Mantra :", "vedic-astro-api"), esc_html($gem_suggestion_data["mantra"]));



            $html .= sprintf(__('<h4 class="fs-14 lh-20 fw-700">%s</h4>
                        <table class="lagan_birth_table_data" border="1">
                            <tbody>', 'vedic-astro-api'), __("Flaws &amp; Effects :", "vedic-astro-api"));

            foreach ($flaws_effect as $valk) {

                $html .= sprintf(__('<tr>
                                        <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                        <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                    </tr>', 'vedic-astro-api'), esc_html($valk['flaw_type']), esc_html($valk['flaw_effects']));
            }
            $html .= sprintf(__('</tbody></table></div></div></div></div>', 'vedic-astro-api'));
        endif;
        return $html;
    }

    /* 
        ----- Sade Sati Ajax -----
        */
    public function vedicastro_sade_sati_ajax()
    {

        $form_data = $_POST['form_data'];
        $sadesati_date = date('Y-m-d');
        $sadesati_name = '';
        $sadesati_time = '';
        $timezone = VAAPI_LOCATION_TIMEZONE;
        $latitude = VAAPI_LOCATION_LATITUDE;
        $longitude = VAAPI_LOCATION_LONGITUDE;
        $languages = 'en';


        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {

                $data_key = sanitize_key($data['name']);


                if ($data_key == 'sade_sati_nonce') {

                    if (!wp_verify_nonce($data['value'], 'sade_sati_nonce_field')) {

                        echo json_encode(
                            array(
                                "status" => "error",
                                "message" => __("Something went wrong", 'vedic-astro-api'),
                            )
                        );

                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $languages = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'sade-sati-name') {

                        $sadesati_name = sanitize_text_field($data['value']);

                        if (empty($sadesati_name)) {

                            echo json_encode(
                                array(
                                    "status" => "error",
                                    "message" => __("Name is missing", 'vedic-astro-api'),
                                )
                            );

                            wp_die();
                        }
                    } elseif ($data_key == 'sade-sati-date') {

                        $sadesati_date = $this->vaapi_validate_date_field($data['value']);
                    } elseif ($data_key == 'sade-sati-time') {

                        $sadesati_times = absint($data['value']);

                        $sadesati_time = date("h:i", strtotime($sadesati_times));
                    } elseif ($data_key == 'user_location_latitude') {

                        $latitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_longitude') {

                        $longitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_timezone') {

                        $timezone = floatval($data['value']);
                    }
                }
            }

            $sadesati_endpoint = "extended-horoscope/current-sade-sati";
            $sadesati_image_chart = "horoscope/chart-image";
            $api_key = $this->vedicastro_google_api_key();

            if (empty($api_key)) {

                echo json_encode(
                    array(
                        "status" => "error",
                        "message" => __("API key is missing", 'vedic-astro-api'),
                    )
                );

                wp_die();
            } else {

                $api_data = [
                    "dob"         => date("d/m/Y", strtotime($sadesati_date)),
                    "tob"         => $sadesati_time,
                    "lat"         => $latitude,
                    "lon"         => $longitude,
                    "tz"          => $timezone,
                    "lang"        => $languages,
                    "api_key"     => $api_key,
                ];

                $get_data_sadesati = $this->vedicastro_api(
                    $sadesati_endpoint,
                    $api_data
                );

                $get_sadesati_chart_data = $this->vedicastro_svg_api(
                    $sadesati_image_chart,
                    $api_data
                );

                $dosh_data = [
                    "get_data_sadesati" => $get_data_sadesati,
                ];

                $status = $get_data_sadesati["status"];
                if (is_array($get_data_sadesati) && !empty($get_data_sadesati)) {

                    if ($status == 200) {

                        $dosh = $this->vedicastro_sade_sati_details($dosh_data);

                        echo json_encode([
                            "status" => "success",
                            "dosh_data" =>  $dosh,
                            "img_chart" =>  $get_sadesati_chart_data,
                        ]);
                    } else {

                        echo json_encode([
                            "status" => "error",
                            "message" => __("No result found", 'vedic-astro-api'),
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" => __("No result found", 'vedic-astro-api'),
                    ]);
                }
            }
        } else {
            echo json_encode(
                [
                    "status" => "error",
                    "message" => __("Something  wrong Please Try Again", 'vedic-astro-api'),
                ]
            );
        }
        wp_die();
    }

    /* 
        ----- Sade Sati Details -----
        */

    public function vedicastro_sade_sati_details($dosh_data)
    {

        if (!empty($dosh_data)) :

            $get_data_sadesati = $dosh_data["get_data_sadesati"]["response"];

            $sadesati_description = $get_data_sadesati["description"];
            $sadesati_remedies = $get_data_sadesati["remedies"];
            $shani_period_type = $get_data_sadesati["shani_period_type"];

            $saturn_retrograde = $get_data_sadesati["saturn_retrograde"];
            $bot_response = $get_data_sadesati["bot_response"];

            $age = $get_data_sadesati["age"];

            $html = '';

            $html .= sprintf(__('<div class="sde_sati_group"><div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500">%s</h4></div><div class="dashas_dosh"><div class="dashas_box"> <div class="dashas_dosh_content"><p class="fs-14 lh-30 fw-400">', 'vedic-astro-api'), __("Sade Sati Predictions", "vedic-astro-api"));

            $html .= sprintf(__('<span class="fw-700">%s</span><span>%s</span> <br><span class="d_block">%s</span></p>', 'vedic-astro-api'), __("Period Type :", "vedic-astro-api"), esc_html($shani_period_type), esc_html($bot_response));

            $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span>%s</span></p>', 'vedic-astro-api'), __("Saturn in RetroGrade :", "vedic-astro-api"), esc_html($saturn_retrograde));

            $html .= sprintf(__('<p class="fs-14 lh-20 fw-400"><span class="fw-700">%s</span><span class="clr-green fw-600">%s</span></p>', 'vedic-astro-api'), __("Age", "vedic-astro-api"), esc_html($age));

            $html .= sprintf(__('<h4 class="fs-14 lh-20 fw-700">%s</h4><p class="fs-14 lh-20 fw-400">%s </p> <h4 class="fs-14 lh-30 fw-700">%s</h4>', 'vedic-astro-api'), __("Remedies", "vedic-astro-api"), esc_html($sadesati_description), __("Description of Sade Sati :", "vedic-astro-api"));

            $factors_keys = 1;
            $html .= sprintf(__('<ol class=remidiess> ', 'vedic-astro-api'));

            foreach ($sadesati_remedies as $factors_key => $factors_val) :

                $html .= sprintf(__('<li class="fs-14 lh-20 fw-400">%s</li> ', 'vedic-astro-api'), esc_html($factors_val));

            endforeach;

            $html .= sprintf(__('</ol></div></div></div></div>', 'vedic-astro-api'));


        endif;
        return $html;
    }

    /* 
        Monthly Data  Details
        */

    public function vedicastro_monthly_data_details($get_monthly_panchang)
    {
        $html = '';
        if (!empty($get_monthly_panchang)) :
            $month = $get_monthly_panchang['month'];
            $year = $get_monthly_panchang['year'];
            $dateObj   = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
            $monthly_calender_data = $get_monthly_panchang['get_monthly_data'];
            $get_monthly_data_en = $get_monthly_panchang['get_monthly_data_en'];
            $day = '01';
            $get_name_english_image = count($get_monthly_data_en);
            $enddate = date("t", mktime(0, 0, 0, $month, $day, $year)); // day count month
            $s = date("w", mktime(0, 0, 0, $month, 1, $year)); // day start week month

            if (!empty($monthly_calender_data)) {

                $html .= sprintf(__('<div class="lagan_chart_birth_title">
                    <h4 class="fs-32 fw-500 clr-black">%s <span class="calendar_val">%s</span></h4>', 'vedic-astro-api'), __('Calendar for the month of', 'vedic-astro-api'), esc_html($monthName));
                $html .= sprintf(
                    __('<table class="calender">
                    <tbody style="text-align:center;">
                        <tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                        </tr>', 'vedic-astro-api'),
                    __('Sunday', 'vedic-astro-api'),
                    __('Monday', 'vedic-astro-api'),
                    __('Tuesday', 'vedic-astro-api'),
                    __('Wednesday', 'vedic-astro-api'),
                    __('Thursday', 'vedic-astro-api'),
                    __('Friday', 'vedic-astro-api'),
                    __('Satuarday', 'vedic-astro-api')
                );

                if ($s == 5 && $enddate == 30 || $s == 5 && $enddate == 31) {
                    $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        if ($d == 31) {
                            $html .=  $this->get_monthly_panchang_html($monthly_calender_data[$i], $get_monthly_data_en[$i]);
                        }
                        $d = $d + 1;
                    }

                    $s = 4;
                    for ($ds = 1; $ds <= $s; $ds++) {
                        $html .= sprintf(__('<td></td>', 'vedic-astro-api'));
                    }
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        if ($d <= 30) {
                            // w 6 day count number 123456
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
                                $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                            }

                            $html .= $this->get_monthly_panchang_html($monthly_calender_data[$i], $get_monthly_data_en[$i]);

                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
                                $html .= sprintf(__('</tr>', 'vedic-astro-api'));
                            }
                        }
                        $d = $d + 1;
                    }
                } elseif ($s == 6 && $enddate == 30) {
                    $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        if ($d == 30) {
                            $html .= $this->get_monthly_panchang_html($monthly_calender_data[$i], $get_monthly_data_en[$i]);
                        } elseif ($d == 31) {
                            $html .= $this->get_monthly_panchang_html($monthly_calender_data[$i], $get_monthly_data_en[$i]);
                        }
                        $d = $d + 1;
                    }
                    $s = 4;
                    for ($ds = 1; $ds <= $s; $ds++) {
                        $html .= sprintf(__('<td></td>', 'vedic-astro-api'));
                    }
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        if ($d <= 29) {

                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
                                $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                            }
                            $html .=  $this->get_monthly_panchang_html($monthly_calender_data[$i], $get_monthly_data_en[$i]);
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
                                $html .= sprintf(__('</tr>', 'vedic-astro-api'));
                            }
                        }
                        $d = $d + 1;
                    }
                } elseif ($s == 6 && $enddate == 31) {
                    $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        if ($d == 30) {
                            $html .= $this->get_monthly_panchang_html($monthly_calender_data[$i], $get_monthly_data_en[$i]);
                        } elseif ($d == 31) {
                            $html .= $this->get_monthly_panchang_html($monthly_calender_data[$i], $get_monthly_data_en[$i]);
                        }
                        $d = $d + 1;
                    }
                    $s = 4;
                    for ($ds = 1; $ds <= $s; $ds++) {
                        $html .= sprintf(__('<td></td>', 'vedic-astro-api'));
                    }
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        if ($d <= 29) {
                            // w 6 day count number 123456
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
                                $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                            }

                            $html .= $this->get_monthly_panchang_html($monthly_calender_data[$i], $get_monthly_data_en[$i]);
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
                                $html .= sprintf(__('</tr>', 'vedic-astro-api'));
                            }
                        }
                        $d = $d + 1;
                    }
                } else {
                    if ($s != 0) {
                        $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                    }
                    for ($ds = 1; $ds <= $s; $ds++) {

                        $html .= sprintf(__('<td></td>', 'vedic-astro-api'));
                    }
                    $d = 1;
                    for ($i = 0; $i < $get_name_english_image; $i++) {
                        // w 6 day count number 123456
                        if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
                            $html .= sprintf(__('<tr>', 'vedic-astro-api'));
                        }
                        $html .= $this->get_monthly_panchang_html($monthly_calender_data[$i], $get_monthly_data_en[$i]);

                        if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
                            $html .= sprintf(__('</tr>', 'vedic-astro-api'));
                        }
                        $d = $d + 1;
                    }
                }
                $html .= sprintf(__('
                        </tbody>
                        </table>', 'vedic-astro-api'));
            }
        endif;
        return  $html;
    }

    /**
     * ----- Vedicastro Monthly html  ---- *
     */

    public function get_monthly_panchang_html($monthly_calender_data, $get_monthly_data_en)
    {
        if (array_key_exists('name', $monthly_calender_data['tithi'])) {
            $tithi = $monthly_calender_data['tithi']['name'];
        } else {
            $tithi = '';
        }

        $monthdate = $get_monthly_data_en['date'];
        $sunrise_time = $get_monthly_data_en['advanced_details']['sun_rise'];
        $sun_set_time = $get_monthly_data_en['advanced_details']['sun_set'];
        $sunrise = date('h:i', strtotime($sunrise_time));
        $sunset = date('h:i', strtotime($sun_set_time));
        $days = date('D', strtotime($monthdate));
        $mont = date('M', strtotime($monthdate));
        $date = date('d', strtotime($monthdate));
        $html = '';
        $html .= sprintf(__(' <td>
                <div class="tithi">
                    <p>
                        <span></span>
                        <span>%s</span>
                    </p>
                    <p>%s</p>
                </div>
                <div class="date">
                    <p>', 'vedic-astro-api'), __('.Utt', 'vedic-astro-api'), esc_html($tithi));

        $html .= sprintf(
            __(' <span> <img src="%s" class="img_fluid"> </span>
                        <span>%s</span>
                    </p>
                    <p>
                        <span>%s</span> %s 
                    </p>', 'vedic-astro-api'),
            esc_url(VEDICASTRO_URL . 'public/images/icon/vaadin_sun-rise-4.png'),
            esc_html($sunrise),
            esc_html($mont),
            esc_html($date)
        );
        $html .= sprintf(
            __('<p>
                        <span>
                            <img src="%s" class="img_fluid">
                        </span>
                        <span>%s</span>
                    </p>
                </div>', 'vedic-astro-api'),
            esc_url(VEDICASTRO_URL . 'public/images/icon/vaadin_sun-rise-3.png'),
            esc_html($sunset)
        );
        $html .= sprintf(__(' <div class="sagitta_box">
                    <p>
                        <span>
                            <img src="%s" class="img_fluid">
                        </span>
                        <span> %s</span>
                    </p>
                    <p>', 'vedic-astro-api'), esc_url(VEDICASTRO_URL . 'public/images/icon/sagita.png'), __('Sagitta', 'vedic-astro-api'));
        $html .= sprintf(
            __(' <span>
                            <img src="%s" class="img_fluid">
                        </span>
                        <span>%s</span>
                    </p>
                </div>', 'vedic-astro-api'),
            esc_url(VEDICASTRO_URL . 'public/images/icon/Frame.png'),
            __('Anuradha', 'vedic-astro-api')
        );
        $html .= sprintf(__(' <div class="tithi_box">
                    <p><span> %d </span></p>
                    <p><span>%s <br> %s</span></p>
                </div>
            </td>', 'vedic-astro-api'), absint(20), __('Phalguna/Panguni', 'vedic-astro-api'), __('Magha/Maasi', 'vedic-astro-api'));

        return $html;
    }

    /**
     * ----- Vedicastro panchang ajax ---- *
     */
    public function vedicastro_panchang_ajax()
    {

        $form_data = $_POST['form_data'];
        $panchang_date = date('Y-m-d');
        $panchang_time = '';
        $user_location_timezone = VAAPI_LOCATION_TIMEZONE;
        $user_location_latitude = VAAPI_LOCATION_LATITUDE;
        $user_location_longitude = VAAPI_LOCATION_LONGITUDE;
        $lang = 'en';

        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {

                $data_key = sanitize_key($data['name']);


                if ($data_key == 'panchang_nonce') {

                    if (!wp_verify_nonce($data['value'], 'panchang_nonce_field')) {
                        echo json_encode(array(
                            "status" => "error",
                            "message" => __("Something went wrong", 'vedic-astro-api'),
                        ));
                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $lang = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'panchang-date') {

                        $panchang_date = $this->vaapi_validate_date_field($data['value']);
                    } elseif ($data_key == 'panchang-time') {

                        $panchang_times = absint($data['value']);

                        $panchang_time = date("h:i", strtotime($panchang_times));
                    } elseif ($data_key == 'user_location_latitude') {

                        $user_location_latitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_longitude') {

                        $user_location_longitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_timezone') {

                        $user_location_timezone = floatval($data['value']);
                    }
                }
            }
            $api_key = $this->vedicastro_google_api_key();

            if (empty($api_key)) {
                echo json_encode(array(
                    "status" => "error",
                    "message" => __("API key is missing", 'vedic-astro-api'),
                ));
                wp_die();
            } else {

                $api_panchang_data = array(
                    'api_key'   => $api_key,
                    'date'      => date('d/m/Y', strtotime($panchang_date)),
                    'time'      => $panchang_time,
                    'lat'       => $user_location_latitude,
                    'lon'       => $user_location_longitude,
                    'tz'        => $user_location_timezone,
                    'lang'      => $lang
                );

                $panchang_endpoint = 'panchang/panchang';
                $moonrise_endpoint = 'panchang/moonrise';

                $get_data = $this->vedicastro_api($panchang_endpoint, $api_panchang_data);
                $status = $get_data['status'];
                if (is_array($get_data) && !empty($get_data)) {
                    if ($status == 200) {

                        $response = $get_data['response'];
                        $time_data = array('rahukaal', 'gulika', 'yamakanta');
                        $time_title = array(
                            'rahukaal'  => __('Rahu Kaal', 'vedic-astro-api'),
                            'gulika'    => __('Gulika', 'vedic-astro-api'),
                            'yamakanta' => __('Yama kanta', 'vedic-astro-api'),
                        );
                        $day_data = array('tithi', 'nakshatra', 'karana', 'yoga', 'ayanamsa', 'rasi');
                        $day_title = array(
                            'tithi'     => __('Tithi', 'vedic-astro-api'),
                            'nakshatra' => __('Nakshatra', 'vedic-astro-api'),
                            'karana'     => __('Karana', 'vedic-astro-api'),
                            'yoga'      => __('Yoga', 'vedic-astro-api'),
                            'ayanamsa'  => __('Ayanamsa', 'vedic-astro-api'),
                            'rasi'      => __('Rasi', 'vedic-astro-api'),
                        );
                        $timing_details = array();
                        if (!empty($response)) :
                            foreach ($response as $key => $val) :
                                if (in_array($key, $time_data)) :
                                    $timing_details[$key] = $val;
                                endif;
                            endforeach;
                        endif;
                        $day_details = array();
                        if (!empty($response)) :
                            foreach ($response as $key => $val) :
                                if (in_array($key, $day_data)) :
                                    $day_details[] = array_merge(array('title' => $day_title[$key]), $val);
                                endif;
                            endforeach;
                        endif;
                        $api_moonphase_data = array(
                            'date'     => date('d/m/Y', strtotime($panchang_date)),
                            'tz'       => $user_location_timezone,
                            'api_key'  => $api_key,
                            'lat'      => $user_location_latitude,
                            'lon'      => $user_location_longitude,
                            'time'     => $panchang_time,
                            'lang'      => $lang
                        );
                        $get_moonrise_data = $this->vedicastro_api($moonrise_endpoint, $api_moonphase_data);
                        $moonrise_status = $get_moonrise_data['status'];
                        $moon_type = '';
                        $moon_type_response = '';
                        if (!empty($moonrise_status)  && $moonrise_status == 200 && array_key_exists('moonType', $get_moonrise_data['response'])) {
                            $moon_type = $get_moonrise_data['response']['moonType'];
                            $moon_type_response = $get_moonrise_data['response']['bot_response'];
                        }
                        $panchang_sunrises = "It’s a "  . $response['day']['name']  . ", rising from the Aquarius sign";
                        $panchang_sun_time = date('h:i', strtotime($response['advanced_details']['sun_set']));
                        $panchang_sunrise_time = date('h:i', strtotime($response['advanced_details']['sun_rise']));
                        $panchang_moonrise_time = date('h:i', strtotime($response['advanced_details']['moon_rise']));
                        $panchang_moonset_time = date('h:i', strtotime($response['advanced_details']['moon_set']));

                        $html = sprintf(__('    <div class="lagan_chart_birth_title">
                                        <h4 class="fs-32 fw-500 clr-black">%s</div>', "vedic-astro-api"), esc_html($panchang_sunrises));

                        $html .= sprintf(__(' <div class="aquarius_sign_data"> <div class="aquarius_part d_flex"><div class="aquarius_content"><span>
                                                    <img src="%s"></span></div>', "vedic-astro-api"), esc_url(VEDICASTRO_URL . 'public/images/icon/image2.png'));

                        $html .= sprintf(__('<div class="aquarius_content"><p class="m_0 fs-14 lh-20 fw-400 clr-black"><span>%s</br>%s</span></p></div></div>', "vedic-astro-api"), __("sunrise", "vedic-astro-api"), esc_html($panchang_sunrise_time));

                        $html .= sprintf(__('<div class="aquarius_part d_flex"><div class="aquarius_content"><span> <img src="%s" class="image_fluid"></span>  </div><div class="aquarius_content"><p class="m_0 fs-14 lh-20 fw-400 clr-black"><span>%s</br>%s</span></p></div></div>', "vedic-astro-api"),  esc_url(VEDICASTRO_URL . 'public/images/icon/Image1.png'), __("Sunset", "vedic-astro-api"), esc_html($panchang_sun_time));

                        $html .= sprintf(__('<div class="aquarius_part d_flex"><div class="aquarius_content"><span> <img src="%s" class="image_fluid"></span>  </div><div class="aquarius_content"><p class="m_0 fs-14 lh-20 fw-400 clr-black"><span>%s</br>%s</span></p></div></div>', "vedic-astro-api"),  esc_url(VEDICASTRO_URL . 'public/images/icon/image3.png'), __("Moonrise", "vedic-astro-api"), esc_html($panchang_moonrise_time));


                        $html .= sprintf(__('<div class="aquarius_part d_flex"><div class="aquarius_content"><span> <img src="%s" class="image_fluid"></span>  </div><div class="aquarius_content"><p class="m_0 fs-14 lh-20 fw-400 clr-black"><span>%s</br>%s</span></p></div></div></div>', "vedic-astro-api"),  esc_url(VEDICASTRO_URL . 'public/images/icon/image3.png'), __("Moonset", "vedic-astro-api"), esc_html($panchang_moonset_time));

                        $html .= sprintf(__(' <div class="astor_tab_grid">
                                                            <div class="astro_box_grid">
                                                                <div class="lagan_chart_birth_title">
                                                                    <h4 class="fs-20 lh-24 fw-500">%s</h4><div class="astrotab_grid"></div>
                                                                    <div class="zodiacdetails_table">
                                                                    <table class="lagan_birth_table_data" border="1"><tbody>', "vedic-astro-api"), __("Zodiac Details", "vedic-astro-api"));
                        $html .= sprintf(__('  <tr>
                                                                <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                                            </tr>', "vedic-astro-api"), __("Zodiac", "vedic-astro-api"), esc_html($response['rasi']['name']));

                        $html .= sprintf(__('  <tr>
                                                                <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                                            </tr>', "vedic-astro-api"), __("Day", "vedic-astro-api"), esc_html($response['advanced_details']['vaara']));

                        $html .= sprintf(__('  <tr>
                                                                <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                                            </tr></tbody></table> </div></div></div>', "vedic-astro-api"), __("Moon Yogini Nivas", "vedic-astro-api"), esc_html($response['advanced_details']['moon_yogini_nivas']));
                        if (!empty($timing_details)) {
                            $html .= sprintf(__('<div class="astro_box_grid">
                                                            <div class="lagan_chart_birth_title">
                                                                <h4 class="fs-20 lh-24 fw-500">%s </h4>  <div class="astrotab_grid"></div>
                                                                <div class="timingdetails_table">
                                                                <table class="lagan_birth_table_data" border="1"><tbody>', "vedic-astro-api"), __("Timing Details", "vedic-astro-api"));

                            foreach ($timing_details as $timing_key => $timing_val) {
                                $html .= sprintf(__('  <tr>
                                                                <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
                                                            </tr>', "vedic-astro-api"), esc_html($time_title[$timing_key]), esc_html($timing_val));
                            }
                            $html .= sprintf(__('   </tbody> </table></div></div></div> ', "vedic-astro-api"));
                        }
                        $html .= sprintf(__('</div>', "vedic-astro-api"));

                        if (!empty($day_details)) {
                            $html .= sprintf(__('<div class="astro_box_grid panchang_day_details">
                                            <div class="lagan_chart_birth_title">
                                                <h4 class="fs-20 lh-24 fw-500">%s<div class="day_details_table"> <table class="lagan_birth_table_data" border="1"><thead>', "vedic-astro-api"), __("Day Details", "vedic-astro-api"));
                            $html .= sprintf(__('  <tr>
                                                                <th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th>
                                                                <th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th>
                                                                <th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th>
                                                                <th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th>
                                                                <th class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></th></thead><tbody>', "vedic-astro-api"), __("Title", "vedic-astro-api"),  __("Name", "vedic-astro-api"),  __("Diety", "vedic-astro-api"),  __("Start", "vedic-astro-api"),  __("End", "vedic-astro-api"));

                            $start_date = date('d - M - Y', strtotime($panchang_date));
                            $end_date = date('d - M - Y', strtotime("+1 day", strtotime($panchang_date)));
                            foreach ($day_details as $day_key => $day_val) {

                                $count = count($day_val);
                                if ($count > 2) {
                                    $start_time = $day_val['start'];
                                    $end_time = $day_val['end'];
                                    $date_times_start =  $start_date . " @ " . $start_time;
                                    $date_times_end =  $end_date . " @ " . $end_time;

                                    if (array_key_exists('name', $day_val) && array_key_exists('diety', $day_val)) {
                                        $day_val_name = $day_val['name'];
                                        $day_val_diety = $day_val['diety'];
                                    } else {
                                        $day_val_name = '';
                                        $day_val_diety = '';
                                    }

                                    $html .= sprintf(__('<tr>
             <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
             <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
             <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
             <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td>
             <td class="clr-black1"><span class="fw-400 lh-20 fs-14">%s</span></td> 
			 </tr>', "vedic-astro-api"), esc_html($day_val['title']), esc_html($day_val_name), esc_html($day_val_diety), esc_html($date_times_start), esc_html($date_times_end));
                                }
                            }
                            $html .= sprintf(__('</tr>', "vedic-astro-api"));
                            $search_time = date('h:i a', strtotime($panchang_time));
                            $search_datetime = $start_date . " @ " . $search_time;
                            $html .= sprintf(__('<td class="clr-black1 bg-white" colspan="5"><span class="fw-400 lh-20 fs-14 text-center">%s</span></td> </tr></tbody></table></div></div> </div><div class="astor_tab_grid">', "vedic-astro-api"), esc_html($search_datetime));
                        }
                        $masa_details = $response['advanced_details']['masa'];
                        if (is_array($masa_details) && !empty($masa_details)) :
                            $html .= sprintf(__('<div class="astro_box_grid">
                                                                <div class="lagan_chart_birth_title">
                                                                <h4 class="fs-20 lh-24 fw-500">%s</h4>
                                                                <div class="astrotab_grid"></div>
                                                                <div class="Masa_table">
                                                                    <table class="lagan_birth_table_data" border="1"><tbody>', "vedic-astro-api"), __("Masa Details", "vedic-astro-api"));
                            $adhik_maasa = ($masa_details['adhik_maasa'] ? 'Yes' : 'No');
                            $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Ayana", "vedic-astro-api"), esc_html($masa_details['ayana']));

                            $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Purnimanta", "vedic-astro-api"), esc_html($masa_details['purnimanta_name']));
                            $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Amanta", "vedic-astro-api"), esc_html($masa_details['amanta_name']));
                            $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Adhik Maasa", "vedic-astro-api"), esc_html($adhik_maasa));
                            $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Ritu", "vedic-astro-api"), esc_html($masa_details['ritu']));
                            $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr></tbody></table></div></div> </div>', "vedic-astro-api"), __("Ritu Tamil", "vedic-astro-api"), esc_html($masa_details['ritu_tamil']));
                        endif;
                        $years_details = $response['advanced_details']['years'];
                        if (is_array($years_details) && !empty($years_details)) :
                            $html .= sprintf(__('<div class="astro_box_grid">
                                                                    <div class="lagan_chart_birth_title">
                                                                    <h4 class="fs-20 lh-24 fw-500">%s</h4>
                                                                        <div class="astrotab_grid"></div>
                                                                        <div class="samvatsara_table">
                                                                            <table class="lagan_birth_table_data" border="1">
                                                                                <tbody> ', "vedic-astro-api"), __("Samvatsara(Year) Details", "vedic-astro-api"));
                            $html .= sprintf(__('<tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Kali", "vedic-astro-api"), esc_html($years_details['kali']));
                            $html .= sprintf(__('<tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Kali Samvaat Name", "vedic-astro-api"), esc_html($years_details['kali_samvaat_name']));
                            $html .= sprintf(__('<tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Saka", "vedic-astro-api"), esc_html($years_details['saka']));
                            $html .= sprintf(__('<tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Saka Samwaat Name", "vedic-astro-api"), esc_html($years_details['saka_samvaat_name']));
                            $html .= sprintf(__('<tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr>', "vedic-astro-api"), __("Vikram Samwaat", "vedic-astro-api"), esc_html($years_details['vikram_samvaat']));
                            $html .= sprintf(__('<tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    </tr> </tbody> </table></div> </div></div>', "vedic-astro-api"), __("Vikram Samwaat Name", "vedic-astro-api"), esc_html($years_details['vikram_samvaat_name']));
                        endif;
                        $html .= sprintf(__('</div> <div class="astor_tab_grid">
                                                                <div class="astro_box_grid">
                                                                    <div class="lagan_chart_birth_title">
                                                                        <h4 class="fs-20 lh-24 fw-500">%s</h4>
                                                                        <div class="astrotab_grid"></div>
                                                                        <div class="other_details_table">
                                                                            <table class="lagan_birth_table_data" border="1">
                                                                                <tbody>', "vedic-astro-api"), __("Other Details", "vedic-astro-api"));

                        $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                </tr>  ', "vedic-astro-api"), __("Abhijit Muhurt Start", "vedic-astro-api"), esc_html($response['advanced_details']['abhijit_muhurta']['start']));
                        $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                </tr>  ', "vedic-astro-api"), __("Abhijit Muhurt End", "vedic-astro-api"), esc_html($response['advanced_details']['abhijit_muhurta']['end']));
                        $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                </tr>  ', "vedic-astro-api"), __("Next Full Moon", "vedic-astro-api"), esc_html($response['advanced_details']['next_full_moon']));
                        $html .= sprintf(__(' <tr>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                    <td class="clr-black1"><span class="fw-700 lh-20 fs-14">%s</span></td>
                                                                </tr>  </tbody></table> </div></div></div></div> ', "vedic-astro-api"), __("Next New Moon", "vedic-astro-api"), esc_html($response['advanced_details']['next_new_moon']));


                        echo json_encode(array('status' => 'success', 'html' => $html));
                        wp_die();
                    } else {
                        echo json_encode(array(
                            "status" => "error",
                            "message" => __("Something wrong try again", 'vedic-astro-api'),
                        ));
                        wp_die();
                    }
                } else {
                    echo json_encode(array(
                        "status" => "error",
                        "message" => __("Something wrong try again", 'vedic-astro-api'),
                    ));
                    wp_die();
                }
            }
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => __("Something wrong try again", 'vedic-astro-api'),
            ));
            wp_die();
        }
    }

    /* 
        --- Choghadiya mahurat Ajax ----
        */

    public function vedicastro_choghadiya_muhurats_ajax()
    {

        $form_data = $_POST['form_data'];
        $choghadiya_date = date('Y-m-d');
        $choghadiya_time = '';
        $timezone = VAAPI_LOCATION_TIMEZONE;
        $latitude = VAAPI_LOCATION_LATITUDE;
        $longitude = VAAPI_LOCATION_LONGITUDE;
        $languages = 'en';

        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {

                $data_key = sanitize_key($data['name']);


                if ($data_key == 'choghadiya_nonce') {

                    if (!wp_verify_nonce($data['value'], 'choghadiya_nonce_field')) {
                        echo json_encode(array(
                            "status" => "error",
                            "message" => __("Something went wrong", 'vedic-astro-api'),
                        ));
                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $languages = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'choghadiya-date') {

                        $choghadiya_date = $this->vaapi_validate_date_field($data['value']);
                    } elseif ($data_key == 'sade-sati-time') {

                        $choghadiya_times = absint($data['value']);

                        $choghadiya_time = date("h:i", strtotime($choghadiya_times));
                    } elseif ($data_key == 'user_location_latitude') {

                        $latitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_longitude') {

                        $longitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_timezone') {

                        $timezone = floatval($data['value']);
                    }
                }
            }

            $api_key = $this->vedicastro_google_api_key();
            if (empty($api_key)) {

                echo json_encode(array(
                    "status" => "error",
                    "message" => __("API key is missing", 'vedic-astro-api'),
                ));
                wp_die();
            } else {

                $choghadiya_endpoint = "panchang/choghadiya-muhurta";
                $api_data = [
                    "date"           => date("d/m/Y", strtotime($choghadiya_date)),
                    "tob"            => $choghadiya_time,
                    "lat"            => $latitude,
                    "lon"            => $longitude,
                    "tz"             => $timezone,
                    "lang"           => $languages,
                    "api_key"        => $api_key,
                ];

                $api_data_english = [
                    "date"      => date("d/m/Y", strtotime($choghadiya_date)),
                    "tob"       => $choghadiya_time,
                    "lat"       => $latitude,
                    "lon"       => $longitude,
                    "tz"        => $timezone,
                    "lang"      => "en",
                    "api_key"   => $api_key,
                ];
                $get_data_choghadiya_english = $this->vedicastro_api(
                    $choghadiya_endpoint,
                    $api_data_english
                );


                $get_data_choghadiya = $this->vedicastro_api(
                    $choghadiya_endpoint,
                    $api_data
                );

                $dosh_data = [
                    "get_data_choghadiya" => $get_data_choghadiya,
                    "get_data_choghadiya_english" => $get_data_choghadiya_english,
                    "choghadiya_date" => $choghadiya_date,
                ];

                $status = $get_data_choghadiya["status"];
                if (is_array($get_data_choghadiya) && !empty($get_data_choghadiya)) {

                    if ($status == 200) {
                        $response = $get_data_choghadiya["response"];

                        $dosh = $this->vedicastro_choghadiya_details($dosh_data);

                        echo json_encode(["status" => "success", "dosh_data" => $dosh]);
                    } else {
                        echo json_encode([
                            "status" => "error",
                            "message" => __("No result found", 'vedic-astro-api'),
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" => __("No result found", 'vedic-astro-api'),
                    ]);
                }
            }
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => __("Something  wrong Please Try Again", 'vedic-astro-api'),
            ));
        }
        wp_die();
    }

    /* 
        --- Choghadiya mahurat Details ----
        */
    public function vedicastro_choghadiya_details($dosh_data)
    {
        if (!empty($dosh_data)) :
            $html = '';
            $get_data_choghadiy_english = $dosh_data["get_data_choghadiya_english"]["response"];

            $get_data_choghadiya = $dosh_data["get_data_choghadiya"]["response"];
            $choghadiya_date = $dosh_data["choghadiya_date"];
            $choghadiya_dates = date("d/m/Y", strtotime($choghadiya_date));

            $day_data_choghadiya = $get_data_choghadiya["day"];
            $night_data_choghadiya = $get_data_choghadiya["night"];
            $full_day_choghadiya = array_merge(
                $day_data_choghadiya,
                $night_data_choghadiya
            );

            $day_data_choghadiya_en = $get_data_choghadiy_english["day"];
            $night_data_choghadiya_en = $get_data_choghadiy_english["night"];
            $full_day_choghadiya_en = array_merge(
                $day_data_choghadiya_en,
                $night_data_choghadiya_en
            );

            $html .= sprintf(__('<div class="astro_box_grid"><div class="lagan_chart_birth_title"><h4 class="fs-20 lh-24 fw-500">%s %s</h4></div><div class="boy_birth_table"><table class="lagan_birth_table_data" border="1"><tbody>', 'vedic-astro-api'), __("List of Choghadiya Muhurtas for", "vedic-astro-api"), esc_html($choghadiya_dates));

            $get_type_english = count($full_day_choghadiya_en);
            for ($i = 0; $i < $get_type_english; $i++) :
                $day_type_en = $full_day_choghadiya_en[$i]["type"];
                if ($day_type_en == "Auspicious") {
                    $type_class = "clr-green";
                } elseif ($day_type_en == "Inauspicious") {
                    $type_class = "clr-red";
                } elseif ($day_type_en == "Good") {
                    $type_class = "clr-green";
                }
                $day_start = $full_day_choghadiya[$i]["start"];
                $day_end = $full_day_choghadiya[$i]["end"];
                $day_muhurat = $full_day_choghadiya[$i]["muhurat"];
                $day_type = $full_day_choghadiya[$i]["type"];
                $html .= sprintf(__('<tr><td class="clr-black1">
                                    <span class="fw-700 lh-20 fs-14">%s</span></td>', 'vedic-astro-api'), esc_html($day_muhurat));

                $html .= sprintf(__(' <td class="clr-black1">
                                <span class="fw-700 lh-20 fs-14 %s">%s</span>
                                </td>', 'vedic-astro-api'), esc_attr($type_class), esc_html($day_type));

                $html .= sprintf(__(' <td class="clr-black1">
                                <span class="fw-700 lh-20 fs-14">%s %s %s</span>
                                </td></tr>', 'vedic-astro-api'),  esc_html($day_start), __("to", "vedic-astro-api"), esc_html($day_end));

            endfor;

            $html .= sprintf(__('</tbody></table></div></div> ', 'vedic-astro-api'));

        endif;
        return $html;
    }

    /**
     * Vedicastro matching chart
     *
     * @since    1.0.0
     */

    public function vedicastro_matching_chart(
        $get_lagna_boy_response,
        $get_lagna_girl_response,
        $get_navamsha_boy_response,
        $get_navamsha_girl_response,
        $boy_chart_code,
        $girl_chart_code,
        $boy_style,
        $girl_style
    ) {
        $html = '';
        $html .= sprintf(__('<div class="maching_tab_data display_block" maching_chart-content="1">
                                    <div class="maching_data_main_tab maching_data_boy_tab">
                                        <div class="lagan_chart_birth_title">
                                            <h4 class="fs-20 lh-24 fw-500">%s</h4></div>', 'vedic-astro-api'), __('Boy’s Charts (Name)', 'vedic-astro-api'));

        $html .= sprintf(__('<div class="choose_services_row">
                                        <div class="astro_col-6">
                                            <div class="kundli_lagan_chart mlr-15 ">%s</div>', 'vedic-astro-api'), __($get_lagna_boy_response));
        $html .= $this->vedicastro_change_style($boy_style, "vedicastro-boychart-name");

        $html .= sprintf(__('</div><div class="astro_col-6">
                                        <div class="kundli_lagan_chart mlr-15 bb">%s</div>', 'vedic-astro-api'), __($get_navamsha_boy_response));

        $html .= $this->vedicastro_chart_img_dropdown($boy_chart_code, "vedicastro-boy-chart-image", "chart_content_menu_data_boy", "vedicastro-boy-chart");

        $html .= sprintf(__('</div></div><div class="maching_data_main_tab maching_data_girl_tab">
                                            <div class="lagan_chart_birth_title">
                                                <h4 class="fs-20 lh-24 fw-500">%s</div></div>', 'vedic-astro-api'), __('Girls’s Charts (Name)', 'vedic-astro-api'));

        $html .= sprintf(__('<div class="choose_services_row"><div class="astro_col-6"><div class="kundli_lagan_chart mlr-15 gg">%s</div>', 'vedic-astro-api'), __($get_lagna_girl_response));

        $html .= $this->vedicastro_change_style($girl_style,  "vedicastro-girlchart-name");

        $html .= sprintf(__('</div>
                            <div class="astro_col-6">
                                <div class="kundli_lagan_chart mlr-15 gg">%s</div>', 'vedic-astro-api'), __($get_navamsha_girl_response));
        $html .=  $this->vedicastro_chart_img_dropdown($girl_chart_code, "vedicastro-girl-chart-image",  "chart_content_menu_data_girl", "vedicastro-girl-chart");

        $html .= sprintf(__('</div></div></div></div></div>', 'vedic-astro-api'));

        return $html;
    }

    /* 
        Hora muhurats Ajax 
        */

    public function vedicastro_hora_muhurats_ajax()
    {
        $form_data = $_POST['form_data'];
        $hora_time = '';
        $hora_date = date('Y-m-d');
        $latitude  = VAAPI_LOCATION_LATITUDE;
        $longitude = VAAPI_LOCATION_LONGITUDE;
        $timezone  = VAAPI_LOCATION_TIMEZONE;
        $languages = 'en';


        if (is_array($form_data) && !empty($form_data)) {

            foreach ($form_data as $key => $data) {

                $data_key = sanitize_key($data['name']);
                if ($data_key == 'hora_nonce') {

                    if (!wp_verify_nonce($data['value'], 'hora_nonce_field')) {

                        echo json_encode(
                            array(
                                "status" => "error",
                                "message" => __("Something went wrong", 'vedic-astro-api'),
                            )
                        );

                        wp_die();
                    }
                } else {

                    if ($data_key == 'lang') {

                        $languages = sanitize_text_field($data['value']);
                    } elseif ($data_key == 'hora-date') {

                        $hora_date = $this->vaapi_validate_date_field($data['value']);
                    } elseif ($data_key == 'hora-time') {

                        $hora_times = absint($data['value']);

                        $hora_time = date("h:i", strtotime($hora_times));
                    } elseif ($data_key == 'user_location_latitude') {

                        $latitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_longitude') {

                        $longitude = floatval($data['value']);
                    } elseif ($data_key == 'user_location_timezone') {

                        $timezone = floatval($data['value']);
                    }
                }
            }

            $hora_endpoint = "panchang/hora-muhurta";
            $api_key = $this->vedicastro_google_api_key();

            if (empty($api_key)) {

                echo json_encode(
                    array(
                        "status" => "error",
                        "message" => __("API key is missing", 'vedic-astro-api'),
                    )
                );

                wp_die();
            } else {

                $api_data = [
                    "date"  => date("d/m/Y", strtotime($hora_date)),
                    "tob"   => $hora_time,
                    "lat"   => $latitude,
                    "lon"   => $longitude,
                    "tz"   => $timezone,
                    "lang"  => $languages,
                    "api_key" => $api_key,
                ];

                $get_data_hora = $this->vedicastro_api($hora_endpoint, $api_data);
                $dosh_data = [
                    "hora_data" => $get_data_hora,
                    "hora_date" => $hora_date,
                ];
                $status = $get_data_hora["status"];

                if (is_array($get_data_hora) && !empty($get_data_hora)) {

                    if ($status == 200) {
                        $response = $get_data_hora["response"];
                        $dosh = $this->vedicastro_hora_details($dosh_data);

                        echo json_encode([
                            "status" => "success",
                            "dosh_data" => $dosh,
                        ]);
                    } else {

                        echo json_encode([
                            "status" => "error",
                            "message" => __("No result found", 'vedic-astro-api'),
                        ]);
                    }
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" => __("No result found", 'vedic-astro-api'),
                    ]);
                }
            }
        } else {
            echo json_encode(
                array(
                    "status" => "error",
                    "message" => __("Something  wrong Please Try Again", 'vedic-astro-api'),
                )
            );
        }
        wp_die();
    }

    /* 
        Hora muhurats Details  
        */

    public function vedicastro_hora_details($dosh_data)
    {
        if (!empty($dosh_data)) :
            $html = '';
            $get_data_hora = $dosh_data["hora_data"]["response"];
            $hora_date = $dosh_data["hora_date"];
            $hora_dates = date("d/m/Y", strtotime($hora_date));
            $hora_data_api = $get_data_hora["horas"];

            $html .= sprintf(__('<div class="astro_box_grid">
                <div class="lagan_chart_birth_title">
                <h4 class="fs-20 lh-24 fw-500">%s %s </h4>', 'vedic-astro-api'), __('List of Horas for', 'vedic-astro-api'), esc_html($hora_dates));

            foreach ($hora_data_api as $factors_val1) :
                $horas_start = $factors_val1["start"];
                $horas_end = $factors_val1["end"];
                $hora = $factors_val1["hora"];
                $hora_benefits = $factors_val1["benefits"];
                $hora_lucky_gem = $factors_val1["lucky_gem"];

                $html .= sprintf(__('<div class="hora_table">
                        <table class="lagan_birth_table_data" border="1">
                            <tbody>
                                <tr>
                                    <td class="clr-black1">
                                        <span class="fw-700 lh-20 fs-14">%s </span>
                                    </td>', 'vedic-astro-api'), esc_html($hora));
                $html .= sprintf(__('<td class="clr-black1">
                                        <span class="fw-400 lh-20 fs-14">%s %s %s</span>', 'vedic-astro-api'), esc_html($horas_start), __('to', 'vedic-astro-api'), esc_html($horas_end));

                $html .= sprintf(__('</td>
                                    <td class="clr-black1">
                                        <span class="fw-400 lh-20 fs-14"> %s</span>
                                    </td>
                                </tr>', 'vedic-astro-api'), esc_html($hora_lucky_gem));
                $html .= sprintf(__(' <tr>
                                    <td class="clr-black1 bg-white" colspan="3">
                                        <span class="fw-400 lh-20 fs-14 text-center"> %s </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>', 'vedic-astro-api'), esc_html($hora_benefits));
            endforeach;
            $html .= sprintf(__('</div>
                </div>', 'vedic-astro-api'));
        endif;
        return $html;
    }

    /* 
           paryantardasha ajax  
        */

    public function paryantardasha_response_ajax()
    {

        $html = '';
        $mdad = isset($_POST['mdad']) ? sanitize_text_field($_POST['mdad']) : '';
        $paryantar_mahadasha = isset($_POST['mahadasha']) ? sanitize_text_field($_POST['mahadasha']) : '';

        if (!empty($mdad) && !empty($paryantar_mahadasha)) {
            $maha_antar_dasha = explode("/", $mdad);
            $paryantardasha_endpoint = "dashas/specific-sub-dasha";
            if (isset($_COOKIE['kundali_form_data'])) {
                parse_str($_COOKIE['kundali_form_data'], $form_data);
                //$form_data = $_COOKIE['kundali_form_data'];
                $kundali_date = isset($form_data['kundali-date']) ? sanitize_text_field(trim($form_data["kundali-date"])) : '';
                $kundali_times = isset($form_data['kundali-time']) ? sanitize_text_field(trim($form_data["kundali-time"])) : '';
                $kundali_time = date("h:i", strtotime($kundali_times));
                $timezone = isset($form_data['user_location_timezone']) ? floatval($form_data["user_location_timezone"]) : VAAPI_LOCATION_TIMEZONE;
                $latitude = isset($form_data['user_location_longitude']) ? floatval($form_data["user_location_longitude"]) : VAAPI_LOCATION_LONGITUDE;
                $longitude = isset($form_data['user_location_latitude']) ? floatval($form_data["user_location_latitude"]) : VAAPI_LOCATION_LATITUDE;
                $languages = isset($form_data['lang']) ? sanitize_text_field(trim($form_data["lang"])) : '';
                $api_key = $this->vedicastro_google_api_key();

                $api_data = [
                    "dob"  => date("d/m/Y", strtotime($kundali_date)),
                    "tob"  => $kundali_time,
                    "lat"  => $latitude,
                    "lon"  => $longitude,
                    "tz"   => $timezone,
                    "lang" => $languages,
                    "api_key" => $api_key
                ];

                if (is_array($maha_antar_dasha) && !empty($maha_antar_dasha)) {
                    if ($maha_antar_dasha[0]) {
                        $api_data["md"] = $maha_antar_dasha[0];
                    }
                    if ($maha_antar_dasha[1]) {
                        $api_data["ad"] = $maha_antar_dasha[1];
                    }
                }

                $get_antardasha_data = $this->vedicastro_mahadasha_api(
                    $paryantardasha_endpoint,
                    $api_data
                );

                if (is_array($get_antardasha_data) && $get_antardasha_data['status'] == 200 && !empty($get_antardasha_data['response'])) {

                    $html .= sprintf(__('<table class="lagan_birth_table_data mahadasha_hover_data" border="1"><thead><tr><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th><th><span class="fw-700 lh-20 fs-14 clr-black1">%s</span></th></tr></thead><tbody>', 'vedic-astro-api'), __('Paryantar Dasha', 'vedic-astro-api'), __('End Dates', 'vedic-astro-api'));

                    foreach ($get_antardasha_data['response']['paryantardasha'] as $key => $paryantar_dasha) {

                        $html .= sprintf(__('<tr><td><span class="fw-400 lh-20 fs-14 clr-black1">%s/%s</span></td><td><span class="fw-400 lh-20 fs-14 clr-black1">%s</span></td></tr>', 'vedic-astro-api'), esc_html($paryantar_mahadasha), esc_html($paryantar_dasha['name']), esc_html($paryantar_dasha['end']));
                    }

                    $html .= sprintf(__('</tbody></table>', 'vedic-astro-api'));

                    echo json_encode(["status" => "success", "pratyantar_res" => $html, 'mdad' => $mdad]);

                    wp_die();
                } else {

                    echo json_encode(["status" => "false", "pratyantar_res" => __("No result found", 'vedic-astro-api')]);

                    wp_die();
                }
            } else {

                echo json_encode(["status" => "false", "pratyantar_res" => __("Something went wrong", 'vedic-astro-api')]);

                wp_die();
            }
        } else {

            echo json_encode(["status" => "false", "pratyantar_res" => __("Something went wrong", 'vedic-astro-api')]);

            wp_die();
        }
    }

    /* 
           form validate date  
        */
    public function vaapi_validate_date_field($date, $format = 'Y-m-d')
    {

        if (!$date) {
            return date($format);
        }
        return preg_replace("([^0-9/-])", "", $date);
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

    public function get_prediction_score_color($score)
    {
        $color = "";
        if ($score <= 30) :
            $color = "gradient_pink";
        elseif ($score > 30 && $score <= 60) :
            $color = "gradient_gold";
        elseif ($score > 60 && $score <= 90) :
            $color = "gradient_green";
        elseif ($score > 90) :
            $color = "gradient_skyblue";
        endif;
        return $color;
    }

    public function get_predictions_categories()
    {
        $cats = [
            "health",
            "relationship",
            "career",
            "travel",
            "family",
            "friends",
            "finances",
            "status",
        ];
        return $cats;
    }

//    public function save_kundli_user_data($name, $date, $time, $location)
//     {
//         global $wpdb;
    
//         $table_name = $wpdb->prefix . 'vedic_astro_kundli_user_details'; 
    
//         $data = array(
//             'name' => sanitize_text_field($name),
//             'date' => date('Y-m-d', strtotime($date)),
//             'time' => $time,
//             'location' => sanitize_text_field($location),
//             // Add more columns as needed
//         );
    
//         $wpdb->insert($table_name, $data);
//     }
    
}
