(function( $ ) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */


// var tooltipSpan = document.getElementById('mahadasha_hover');

// window.onmousemove = function (e) {
//     var x = e.clientX,
//         y = e.clientY;
//     mahadasha_hover.style.top = (y + 20) + 'px';
//     mahadasha_hover.style.left = (x + 20) + 'px';
// };
    
 

     $(document).ready(function(){
          
        var currentRequest = null;
        var paryantardasha_response_ajax = null;

        var timezone_offset_minutes = new Date().getTimezoneOffset();
        timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;

        // Timezone difference in minutes such as 330 or -360 or 0
        console.log(timezone_offset_minutes); 

        // Set a cookie
        createCookie( 'vedic_astro_timezone_offset', timezone_offset_minutes );
        
                   
        /**
         * Vedicastro service show
         *
         */
         $('.kundli_vedic_group input.user_location_city').on('input',function(e) {

            var intval = $(this).val().length;
            var list_selector = $(this); 
            if (intval >= 3) {
                $(this).closest('form').find('.spinner_page').show();
                list_selector.closest('.kundli_vedic_group').find('.crossImage').hide();
                var location = $(this).val();
                currentRequest = $.ajax({
                url: vedicastro_public_ajax_object.ajax_url,
                type: 'post',
                data: {
                    action  : 'vedicastro_location_ajax',
                    location  : location,
                },
                beforeSend : function(){
                    if(currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                    success: function (res) {
                    $(this).closest('form').find('.spinner_page').hide();
                    var obj = JSON.parse(res);

                    if(obj.status == 'success'){
                        
                      
                     
                        list_selector.closest('.kundli_vedic_group').find('.location_list').html('');

                      var a =  list_selector.closest('.kundli_vedic_group').find('.location_list').html(obj.html);

                         list_selector.closest('.kundli_vedic_group').find('.location_list').show();
                         list_selector.closest('.kundli_vedic_group').find('.spinner_page').hide();
                          list_selector.closest('.kundli_vedic_group').find('.crossImage').show();
                          $('.crossImage').click(function(){
                             list_selector.closest('.kundli_vedic_group').find('input').val('');
                             list_selector.closest('.kundli_vedic_group').find('.location_list').hide();
                             $(this).hide();
                              currentRequest.abort();
                          });
                    }else{
                       list_selector.closest('.kundli_vedic_group').find('.location_list').html(obj.html);
                        list_selector.closest('.kundli_vedic_group').find('.location_list').hide();
                    }

                    list_selector.closest('.kundli_vedic_group').find('.location_list li').click(function(){
                        var location = $(this).children('.country').text();
                        var lat = $(this).data('lat');
                        var lon = $(this).data('lon');
                        var tz = $(this).data('tz');
                        list_selector.closest('.kundli_vedic_group').find('.location').val(location);
                        list_selector.closest('form').find('.user_location_latitude').val(lat);
                        list_selector.closest('form').find('.user_location_longitude').val(lon);
                        list_selector.closest('form').find('.user_location_timezone').val(tz);
                        list_selector.closest('.kundli_vedic_group').find('.location_list').hide();
                        $(this).closest('form').find('.spinner_page').hide();
                  });
                },
                complete: function(res) {
                    $(this).closest('form').find('.spinner_page').hide();
                }
            });
                               
            }

        });

        /** Kundali tab click event */
        $(document).on( 'click', '#lagan_chart_tabs_menu_data li a', function(e){
            e.preventDefault();
        });
         /** matching location **/
         $('.kundli_vedic_group input.matching_location_city').on('keyup',function(e) {

            var intval = $(this).val().length;
            var list_selector = $(this); 
            if (intval >= 3) {
                $(this).nextAll('.spinner_page').show();
                list_selector.closest('.kundli_vedic_group').find('.crossImage').hide();
                var location = $(this).val();
               currentRequest = $.ajax({
                url: vedicastro_public_ajax_object.ajax_url,
                type: 'post',
                data: {
                    action  : 'vedicastro_location_ajax',
                    location  : location,
                },
                beforeSend : function(){
                    if(currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                success: function(res) {
                    $(this).closest('form').find('.spinner_page').hide();
                    var obj = JSON.parse(res);

                    if(obj.status == 'success'){
                        
                        list_selector.closest('.kundli_vedic_group').find('.location_list').html('');
                        var a =  list_selector.closest('.kundli_vedic_group').find('.location_list').html(obj.html);
                        list_selector.closest('.kundli_vedic_group').find('.location_list').show();
                        list_selector.closest('.kundli_vedic_group').find('.spinner_page').hide();
                        list_selector.closest('.kundli_vedic_group').find('.crossImage').show();
                        $('.crossImage').click(function(){
                            list_selector.closest('.kundli_vedic_group').find('input').val('');
                            list_selector.closest('.kundli_vedic_group').find('.location_list').hide();
                            $(this).hide();
                            currentRequest.abort();
                        });
                    }else{
                       list_selector.closest('.kundli_vedic_group').find('.location_list').html(obj.message);
                        list_selector.closest('.kundli_vedic_group').find('.location_list').hide();
                    }

                    list_selector.closest('.kundli_vedic_group').find('.location_list li').click(function(){
                        var location = $(this).children('.country').text();
                        var lat = $(this).data('lat');
                        var lon = $(this).data('lon');
                        var tz = $(this).data('tz');

                        list_selector.closest('.kundli_vedic_group').find('.location').val(location);
                        list_selector.parents('.maching_data_form_login').find('.user_location_latitude').val(lat);
                        list_selector.parents('.maching_data_form_login').find('.user_location_longitude').val(lon);
                        list_selector.parents('.maching_data_form_login').find('.user_location_timezone').val(tz);                      
                        list_selector.closest('.kundli_vedic_group').find('.location_list').hide();
                        $(this).closest('form').find('.spinner_page').hide();
                  });
                },
                complete: function(res) {
                    $(this).closest('form').find('.spinner_page').hide();
                }
            });
                               
            } 
            
         });
    
         /* moon calandes location

         */
        $('.choose_services_col_box').on('click', function(){
            $('.choose_services_col_box.active').removeClass('active');
            $(this).addClass('active');
        });

        /**
         * Vedicastro prediction change on daily, weekly, yearly tab click
         *
         */
         $('#astro_content_menu_data .vedicastro-click').on('click', function (e) {
             e.preventDefault();
            vedic_astro_prediction(this);
        });

        /**
         * Vedicastro prediction change on zodiac signs
         *
         */
         $('.zodics_sign_tab .vedicastro-click').on('click', function (e) {
            e.preventDefault();
            vedic_astro_prediction(this);
        });

        /**
         * Vedicastro week drop-down change
         *
         */
         $(document).on('change', '#predictions_data #choose_services_row #week', function (e) {
            e.preventDefault();
            vedic_astro_prediction(this);
        });

        /**
         * Vedicastro language drop-down change
         *
         */


        $(document).on('change', '#predictions_data #lang2', function(){
            var user_lang = $(this).val();
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#predictions_data #astro_content_menu_data .vedicastro-click.active').click();
        });

        $(document).on('change', '#moon_calendar_data #lang2', function(){
            var user_lang = $(this).val();
            createCookie('astro_user_lang',user_lang,1);
            moon_calender_load();
        });

        $(document).on('change', '#panchang-monthly #lang2', function(){
            var user_lang = $(this).val();
            createCookie('astro_user_lang',user_lang,1);
            monthly_calender_load();
        });

         $(document).on('change', '#panchang_sec_data #lang2', function(){
            var user_lang = $(this).val();           
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#panchang_sec_data #panchang-submit').click();
        });

        $(document).on('change', '#service-retro #lang2', function(){
            var user_lang = $(this).val();
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#service-retro #retro-submit').click();
        });

        $(document).on('change', '#hura-mahurats #lang2', function(){
            var user_lang = $(this).val();           
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#hura-mahurats #hora-submit').click();
        });

        $(document).on('change', '#choghadiya-mahurat #lang2', function(){
            var user_lang = $(this).val();           
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#choghadiya-mahurat #choghadiya-submit').click();
        });

         $(document).on('change', '#sade-sati-kundli #lang2', function(){
            var user_lang = $(this).val();           
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#sade-sati-kundli #sade-sati-submit').click();
        });

          $(document).on('change', '#numberology_sec_data #lang2', function(){
            var user_lang = $(this).val();           
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#numberology_sec_data #numberology-submit').click();
        });

         $(document).on('change', '#gem-rudhraksh #lang2', function(){
            var user_lang = $(this).val();           
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#gem-rudhraksh #rudraksh-submit').click();
        });

        $(document).on('change', '#service-kundli #lang2', function(){
            var user_lang = $(this).val();           
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#service-kundli #kundali-submit').click();
        });

         $(document).on('change', '#service-matching #lang2', function(){
            var user_lang = $(this).val();           
            createCookie('astro_user_lang',user_lang,1);
            jQuery('#service-matching .vedicastro_button.active').click();
        });

        /**
         * Vedicastro on page load prediction
         *
         */
        
         
         $(window).load(function () {
             
            // prediction url submit form //
             
            $.urlParam = function(name){
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                if (results==null) {
                return null;
                }
                return decodeURI(results[1]) || 0;
             }
             
             var zodaics = decodeURIComponent($.urlParam('zodiac'));
             var lag_val = decodeURIComponent($.urlParam('lang'));
             var cycle_val = decodeURIComponent($.urlParam('cycle'));
                       
             if (zodaics !== "null") {
               $('.zodics_sign_tab').removeClass("active");
               $('.choose_services_row').find('[data-title=' + zodaics + ']').parent().addClass("active prediction_active");
               $('.zodics_sign_tab').parent().css("display", "none");
               $('.zodics_sign_tab.active').parent().css("display", "block");
               $('.zodics_sign_tab.active').parents('.choose_services_row').css("display", "inline-block");
             }

             if (lag_val !== "null") {
                 $('#multi_form_data').find('[value=' + lag_val + ']').attr("selected", "selected");
             }
             
             if (cycle_val !== "null") {
                 $('.astro_content_menu .cycles').removeClass('active');
                 $('.cycles').find('[data-prediction=' + cycle_val + ']').parent().addClass("active");
             }

              
            // prediction url submit form end // 
           
            var prediction = $('#predictions_data').length;
            if ( prediction) {
                vedic_astro_prediction($('#predictions_data #astro_content_menu_data .vedicastro-click:first'));
             }
             
            // No form submit - Numerology
            var numerology_no_form = $(document).find('.astro_box_row.display_none #form-numberology').length;
           
            if ( numerology_no_form ) {
                var numberology_name = $('#numberology-name').val();
                var numberology_date = $('#numberology-date').val();
                if ( numberology_name ) {
                    $('#numberology-submit').click();
                  } else {
                    $('#numerology-data').html('<span class="astro-error-response">Name field is missing</span>');
                }
            }
            // No form submit - Kundli
            var kundli_no_form = $(document).find('.astro_box_row.display_none #form-kundali').length;
            
            if ( kundli_no_form ) {
                var kundli_name = $('#kundali-name').val();
                if ( kundli_name ) {
                    $('#kundali-submit').click();   
                   
                    $('#lagan_chart_tabs_main').css('display' , 'block');
                    $('#lagan_chart_tabs_main').html('<span class="astro-error-response">Name field is missing</span>');
                }
            }
            // No form submit - Panchang
            var panchang_no_form = $(document).find('.astro_box_row.display_none #form-panchang').length;
            if ( panchang_no_form ) {
                var panchang_time = $('#panchang-time').val();
                var panchang_date = $('#panchang-date').val();
                if ( panchang_date ) {
                    if ( panchang_time ) {
                        $('#panchang-submit').click();
                    } else {
                        $('#vedicastro-panchang').html('<span class="astro-error-response">Time field is missing</span>');
                    }
                } else {
                    $('#vedicastro-panchang').html('<span class="astro-error-response">Date field is missing</span>');
                }
            }

            // No form submit - matching
            var matching_no_form = $(document).find('.astro_box_row.display_none #form-matching').length;
            if ( matching_no_form ) {
                var boyname = $('#boy-name').val();
                var girlname = $('#girl-name').val();
                 
                  if (girlname) {
                        if(boyname){
                           $('.vedicastro_button.active').trigger('click');
                        }else{
                          $('#maching-results').css('display','block');
                          $('#maching-results').html('<span class="astro-error-response">Boy Name field is missing</span>');
                        }                    
                   } else {
                    $('#maching-results').css('display','block');
                    $('#maching-results').html('<span class="astro-error-response">Girl Name field is missing</span>');
                 }
            }

            // No form submit - Retro
            var retro_no_form = $(document).find('.astro_box_row.display_none #form-retro').length;
            if ( retro_no_form ) {
                $('#retro-submit').click();
            }
            // No form submit - Hora mahurat
            var hora_mahurat_no_form = $(document).find('.astro_box_row.display_none #form-hora').length;
            if ( hora_mahurat_no_form ) {
                $('#hora-submit').click();
            }
            // No form submit - gem & rudhraksh  
            var gem_rudh_no_form = $(document).find('.astro_box_row.display_none #form-rudraksh').length;
         
            if ( gem_rudh_no_form ) {
               
                var rudraksh_name = $('#rudraksh-name').val();
                if ( rudraksh_name ) {
                   $('#rudraksh-submit').click();
                  } else {
                    $('#rudraksh_res_data').css('display','block');
                    $('#rudraksh_res_data').html('<span class="astro-error-response">Name  field is missing</span>');
                }
            }
            // No form submit - choghadiya mahurat
            var choghadiya_mahurat_no_form = $(document).find('.astro_box_row.display_none #form-choghadiya').length;

            if ( choghadiya_mahurat_no_form ) {
                $('#choghadiya-submit').click();
            }
            // No form submit - sade sati  mahurat
            var sade_sati_no_form = $(document).find('.astro_box_row.display_none #form-sade-sati').length;
            if ( sade_sati_no_form ) {
                var sade_sati_name = $('#sade-sati-name').val();
                if ( sade_sati_name ) {
                   $('#sade-sati-submit').click();
                  } else {
                    $('#sade_sati_res_data').css('display','block');
                    $('#sade_sati_res_data').html('<span class="astro-error-response">Sade Sati Name  field is missing</span>');
                }
            }
           
            // No form submit - Moon Calender
            var moon_calc_no_form = $(document).find('.astro_box_row.display_none #form-panchang-moon').length;
            if ( moon_calc_no_form ) {
                $('#panchang-moon-submit').click();
            }
            // No form submit - Panchang – Monthly Calendar
            var panchang_calc_no_form = $(document).find('.astro_box_row.display_none #form-panchang-monthly').length;
            if ( panchang_calc_no_form ) {
                $('#panchang-monthly-submit').click();
            }
         });

         /**
         * gem & rudhraksh form submit
         *
         */
           $('#rudraksh-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-rudraksh").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
            var offset = new Date().getTimezoneOffset();
            var formatted = -(offset / 60);
            var form_data = $('#form-rudraksh').serializeArray();
            $.ajax({
                url: vedicastro_public_ajax_object.ajax_url,
                type: 'post',
                data: {
                    action  : 'vedicastro_gem_rudraksh_ajax',
                    form_data  : form_data,
                    time_zone : formatted,
                },
                beforeSend: function() {
                    $(".Preloader").fadeIn("slow");                                                         
                },
                success: function(res) {
                    $('#gem-rudhraksh .display_nones').css('display', 'block');  
                    $(".Preloader").css('display', 'none');
                   var obj = JSON.parse(res);

                    if(obj.status == 'success'){  
                        $('#rudraksh_res_data').html('');
                        $('#rudraksh_res_data').html(obj.dosh_data);
                    }else{      
                        $(".Preloader").css('display', 'none');
                        $('#rudraksh_res_data').html('<div class="error">'+obj.message+'</div>');
                    }
                }
            });
        }
        });
        /**
         * Vedicastro kundali form submit
         *
         */
         $('#kundali-submit').on('click', function (e) {
         
            e.preventDefault();
            var error = 0;
            var form_data = $("#form-kundali").serializeArray();             
            var kundali_form_data = $("#form-kundali").serialize();
            createCookie('kundali_form_data',kundali_form_data,1/24);
            $.each(form_data, function (i, field) {
                if ($('#' + field.name).val() == '') {
                    $('#' + field.name).addClass('kundli-error');
                    error = 1;
                } else {
                    $('#' + field.name).removeClass('kundli-error');
                }
            });
            if (error == 0) {
                var offset = new Date().getTimezoneOffset();
                var formatted = -(offset / 60);
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action: 'vedicastro_kundali_ajax',
                        form_data: form_data,
                        time_zone: formatted,
                    },
                    beforeSend: function () {
                        $(".Preloader").fadeIn("slow");
                    },
                    success: function (res) {
                         $("#service-kundli .display_nones").css('display', 'block');
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if (obj.status == 'success') {
                            $('#lagan-chart-tabs-main-kundli').html(obj.html);
                            $('#kundli-lagan-chart').html(obj.lagna_data);
                            $('div[data-section="vedicastro-kundli-section"]').remove();
                            $('.chart_type').after(obj.lagna_text_data);
                            $('#kundli-navamsa').html(obj.navamsa_data);
                            $('.d9navmasa').html(obj.imgdata);
                            $('div[data-lagan-content="planets"]').after(obj.mahadasha_data);
                            $('div[data-lagan-content="mahadasha"]').after(obj.ashtakvarga_data);
                            $('div[data-lagan-content="ashtakvarga"]').after(obj.dosh_data);
                            $('div[data-lagan-content="doshas"]').after(obj.horoscope_prediction_data);

                            /**
                             * Vedicastro kundali active tab
                             *
                             */
                            $('.kundali').on('click', function () {
                                $('.kundali.active').removeClass('active');
                                $(this).addClass('active');
                                var lagan_id = $(this).attr('data-lagan-id');
                                if (lagan_id != '' || lagan_id != undefined) {
                                    $('.lagan_chart_birth.display_block').removeClass('display_block');
                                    $('div[data-lagan-content="' + lagan_id + '"]').addClass('display_block');
                                }
                            });

                            /**
                             * Vedicastro mahadasha hover
                             */
                             $('.mahadasha_hover .mahadasha_hover_data tbody tr').mouseover(function () {
                                $('#mahadasha_hover').css('display', 'block');
                            
							      var trlength = $(this).index()+1;
                                 // console.log("trlength"+trlength);
								 var parent_top=$(this).closest('.mahadasha_hover').css("top");
								 // console.log(parent_top);
                                 var trlength_count =parseInt(parent_top)+40 + trlength * 40.61;
								 // console.log("trlength_count"+trlength_count);
                               $('.mahadasha_subhover').css("top",trlength_count+'px');
                              });
                              $('.mahadasha_hover .mahadasha_hover_data tbody').mouseout(function () {
                                $('#mahadasha_hover').css('display', 'none');
                                console.log("NO");
                              })
                            $('.mahadasha_table_data tbody tr').hover(function () {
								var maintrlength = $(this).index()+1;
                                var maintrlength_count = 40.61 + maintrlength * 40.61;
                                $('.mahadasha_hover').css("top",maintrlength_count+'px');
                                $('.mahadasha_table_data tbody tr').removeClass('active');
                                $(this).addClass('active');
                                var mahadasha_tb = $(this).attr('mahadasha-id');
                                $('.mahadasha_hover').addClass("display_none").removeClass("display_block");
                                $('div[mahadasha-content="' + mahadasha_tb + '"]').addClass("display_block").removeClass("display_none");

                                
                            });
                             $('.mahadasha_hover .mahadasha_hover_data tr').hover(function () {
                                var maha_antar_dasha = $(this).attr('data_antardasha');
                                var maha_antar_grah = $(this).attr('antardasha_grah');

                                if ( maha_antar_dasha && maha_antar_grah ) {

                                    paryantardasha_response_ajax = $.ajax({
                                        url: vedicastro_public_ajax_object.ajax_url,
                                        type: 'post',
                                        data: {
                                            action  : 'paryantardasha_response_ajax',
                                            mdad : maha_antar_dasha,
                                            mahadasha  : maha_antar_grah
                                        },
                                        beforeSend: function() {                                
                                            if(paryantardasha_response_ajax != null) {
                                                paryantardasha_response_ajax.abort();
                                            }
                                        },

                                        success: function(res) {
                                           var obj = JSON.parse(res); 
                                           if (obj.status == 'success') {
                                            $('.mahadasha_subhover').attr('mahadasha-subhover',obj.mdad);
                                            $('.mahadasha_subhover').html(obj.pratyantar_res);
                                           }else{
                                             $('.mahadasha_subhover').attr('mahadasha-subhover',obj.mdad);
                                             $('.mahadasha_subhover').html(obj.pratyantar_res);
                                           }
                                        }
                                    });
                                }
                            });

                             
                            /**
                             * Vedicastro mahadasha hover out side click
                             */
                            $('.mahadasha_hover').on('click', function () {
                                $(this).removeClass('display_block');
                                $('.mahadasha_table_data tbody tr').removeClass('active');
                            });

                            /**
                            * Chart image change
                            */
                            $('#chart_content_menu_data').on('change', function () {
                                $('.drop_lagan_chart_content p').text(jQuery(this).find(':selected').text());
                                $('#kundali-divisional-chart-code').val(jQuery(this).find(':selected').attr('data-code'));
                                $('#kundali-submit').trigger('click');
                            });

                            /**
                            * Chart Style
                            */
                            $('div[data-section="vedicastro-kundli-section"] > a').on('click', function (e) {
                                e.preventDefault();
                                var style = $(this).attr('data-style');
                                $('#kundali-style').val(style);
                                $('#kundali-submit').trigger('click');
                            });
                        } else {
                            $(".Preloader").css('display', 'none');
                            $('#lagan-chart-tabs-main-kundli').html('<div class="error">' + obj.message + '</div>');
                        }
                    }
                });
            }
        });

        /**
         * Vedicastro macthing submit
         */
         $('a.matching-button').on('click', function (e) {
             e.preventDefault();
           $('a.matching-button').removeClass('active');
            var buttonid = $(this).attr('data-match-id');
             $(this).addClass('active');
            var error = 0;
            var x = $("#form-matching").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
                $('#matching-loader').addClass('display_block');
                var offset = new Date().getTimezoneOffset();
                var formatted = -(offset / 60);
                var form_data = $('#form-matching').serializeArray();
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action  : 'vedicastro_matching_ajax',
                        form_data  : form_data,
                        time_zone : formatted,
                        buttonid : buttonid,
                    },
                    beforeSend: function() {                                
                        $(".Preloader").fadeIn("slow");    
                    },
                    success: function (res) {
                        $('#service-matching .display_nones').css('display', 'block');
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if (obj.status == 'success') {
                           $('#maching-results').html(obj.maching_results);
                            $('.lagan_chart_tabs_main .maching_data_menu > li').on('click', function () {
                                var maching_chart = $(this).attr('maching_chart-id');
                                $('.lagan_chart_tabs_main .maching_data_menu > li').removeClass('active');
                                $(this).addClass('active');
                                $('.maching_tab_data').addClass("display_none").removeClass("display_block");
                                $('div[maching_chart-content="' + maching_chart + '"]').addClass("display_block").removeClass("display_none");
                            });

                            /**
                            * Boy chart image change
                            */
                            $('#chart_content_menu_data_boy').on('change', function(){
                                $('.drop_lagan_chart_content p').text(jQuery(this).find(':selected').text());
                                $('#boy-divisional-chart-code').val(jQuery(this).find(':selected').attr('data-code'));
                                $('.vedicastro_button.active').trigger('click');
                            });

                            /**
                            * Chart Boy Style
                            */
                            $('div[data-section="vedicastro-boychart-name"] > a').on('click', function (e) {
                                e.preventDefault();
                                var style = $(this).attr('data-style');
                                $('#boy-style').val(style);
                                $('.vedicastro_button.active').trigger('click');
                            });

                            /**
                            * Girl chart image change
                            */
                            $('#chart_content_menu_data_girl').on('change', function () {                                 
                                $('.drop_lagan_chart_content p').text(jQuery(this).find(':selected').text());
                                $('#girl-divisional-chart-code').val(jQuery(this).find(':selected').attr('data-code'));
                                $('.vedicastro_button.active').trigger('click');
                            });

                            /**
                            * Chart Girl Style
                            */
                            $('div[data-section="vedicastro-girlchart-name"] > a').on('click', function (e) {
                                e.preventDefault();
                                var style = $(this).attr('data-style');
                                $('#girl-style').val(style);
                                $('.vedicastro_button.active').trigger('click');
                            });
                        }
                        else{
                            $('#maching-results').html(obj.message);
                        }
                          $('#matching-loader').removeClass('display_block');
                    }
                });
            }
        });

        /**
        * Vedicastro panchang submit
        */
        $('#panchang-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-panchang").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
                var offset = new Date().getTimezoneOffset();
                var formatted = -(offset / 60);
                var form_data = $('#form-panchang').serializeArray();
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action  : 'vedicastro_panchang_ajax',
                        form_data  : form_data,
                        time_zone : formatted,
                    },
                    beforeSend: function() {                                
                        $(".Preloader").fadeIn("slow");                           
                    },
                    success: function(res) {
                        $("#panchang_sec_data .display_nones").css('display', 'block');
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if(obj.status == 'success'){
                            $('#vedicastro-panchang').html(obj.html);
                        }else{
                            $('#vedicastro-panchang').html(obj.message);
                        }
                    }
                });
            }
        });


        /**
        * Vedicastro sade sati  submit
        */
        $('#sade-sati-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-sade-sati").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
            var offset = new Date().getTimezoneOffset();
            var formatted = -(offset / 60);
            var form_data = $('#form-sade-sati').serializeArray();				
            $.ajax({
                url: vedicastro_public_ajax_object.ajax_url,
                type: 'post', 
                data: {
                    action  : 'vedicastro_sade_sati_ajax',
                    form_data  : form_data,
                    time_zone : formatted,
                },
                beforeSend: function() {
                    $(".Preloader").fadeIn("slow");                                                         
                },
                success: function(res) {
                  
                    $(".Preloader").css('display', 'none');
                    var obj = JSON.parse(res);
                    if(obj.status == 'success'){
						 $('#sade-sati-kundli  .display_nones').css('display', 'block');
                        $('#sade-sati-kundli #today_img_chart').html(obj.img_chart);
                        $('#sade_sati_res_data').html(obj.dosh_data);
                        $('#sade_sati_res_data').removeClass('display_nones');
                    }else{      
                        $(".Preloader").css('display', 'none');
                        $('#sade_sati_res_data').html('<div class="error">'+obj.message+'</div>');
                    }
                }
            });
        }
        });
        /**
        * Vedicastro retro submit
        */
        $('#retro-submit').on('click', function(e){
            e.preventDefault();
            $('#service-retro .display_nones').css('display', 'block');
            var error = 0;
            var x = $("#form-retro").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
                var form_data = $('#form-retro').serializeArray();
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action  : 'vedicastro_retro_ajax',
                        form_data  : form_data,
                    },
                    beforeSend: function() {                                
                        $(".Preloader").fadeIn("slow");                           
                    },
                    success: function(res) {      
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if(obj.status == 'success'){
                            $('#retro-planites').html(obj.html);
                        }else{
                            $('#retro-planites').html(obj.message);
                        }
                    }
                });
            }
        });
        $('#form-panchang-moon').on('submit', function(e){
            e.preventDefault();
            moon_calender_load();
            return false;
        });
        $('#form-panchang-monthly').on('submit', function(e){
            e.preventDefault();
            monthly_calender_load();
            return false;
        });
        
        /**
        * Vedicastro numerology submit
        */

        $('#numberology-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-numberology").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
                var form_data = $('#form-numberology').serializeArray();
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action  : 'vedicastro_numberology_ajax',
                        form_data  : form_data,
                    },
                    beforeSend: function() {                                
                        $(".Preloader").fadeIn("slow");                           
                    },
                    success: function(res) {   
                        $('#numberology_sec_data .display_nones').css('display', 'block');   
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if(obj.status == 'success'){
                            $('#personal-day-number').html(obj.personal_day_number);
                            $('#numerology-data').html(obj.numerology_html);
                        }else{
                            $('#personal-day-number').html(obj.message);
                        }
                    }
                });
            }
        });

        /**
        * Vedicastro hora mahurat submit
        */
        $('#hora-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-hora").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
            var offset = new Date().getTimezoneOffset();
            var formatted = -(offset / 60);
            var form_data = $('#form-hora').serializeArray();
            $.ajax({
                url: vedicastro_public_ajax_object.ajax_url,
                type: 'post',
                data: {
                    action  : 'vedicastro_hora_muhurats_ajax',
                    form_data  : form_data,
                    time_zone : formatted,
                },
                beforeSend: function() {
                    $(".Preloader").fadeIn("slow");                                                         
                },
                success: function(res) {
                    $('#hura-mahurats .display_nones').css('display', 'block');   
                    $(".Preloader").css('display', 'none');
                    var obj = JSON.parse(res);
                    if(obj.status == 'success'){  
                      
                        $('#hora_data').html(obj.dosh_data);
                    }else{  
                        $('#hora_data').html(obj.message);
                    }
                }
            });
        }
        });

        /**
        * Vedicastro numerology submit
        */
        $('#choghadiya-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-choghadiya").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
            var offset = new Date().getTimezoneOffset();
            var formatted = -(offset / 60);
            var form_data = $('#form-choghadiya').serializeArray();
            
            $.ajax({
                url: vedicastro_public_ajax_object.ajax_url,
                type: 'post',
                data: {
                    action  : 'vedicastro_choghadiya_muhurats_ajax',
                    form_data  : form_data,
                    time_zone : formatted,
                },
                beforeSend: function() {
                    $(".Preloader").fadeIn("slow");                                                         
                },
                success: function(res) {
                    $('#choghadiya-mahurat .display_nones').css('display', 'block');   
                    $(".Preloader").css('display', 'none');
                    var obj = JSON.parse(res);
                    if(obj.status == 'success'){  
                        $('#choghadiya_data').html(obj.dosh_data);
                    }else{      
                        $(".Preloader").css('display', 'none');
                        $('#choghadiya_data').html('<div class="error">'+obj.message+'</div>');
                    }
                }
            });
        }
        });

            $('form[name="multi_form_data"] #lang2').on('change', function(){
                var user_lang = $(this).val();
                $('.astro_user_lang').val(user_lang);
                createCookie('astro_user_lang',user_lang,1);
            });
          
     });

})( jQuery );

function vedic_astro_prediction(e, second = '') {
        var zodiac_sign = '';
        var cycle = '';
        var day = '';
        var week = '';
        var typee = '';
        var element_type = jQuery(e).prop('nodeName');
        var week_val = jQuery(document).find('#predictions_data #choose_services_row #week').val();
        if ( !week_val ) {
            week_val = 'thisweek';
        }
        var element_id = jQuery(e).attr('id');
        if (element_type == 'SELECT' && element_id == 'week') {
            var vedicastro_click = 'weekly';
        } else {
            var vedicastro_click = jQuery(e).attr('data-click');
        }
        
        var vedicastro_title = jQuery(e).attr('data-title');
        var lang = jQuery('#predictions_data #lang2 option:selected').val();
        
        switch(vedicastro_click){
            case 'zodic-sign':
                jQuery('.zodics_sign_tab').removeClass('active');
                jQuery(e).closest('.zodics_sign_tab').addClass('active');
                zodiac_sign = jQuery(e).attr('data-zodic_id');
                cycle = jQuery('.cycles.active > a').attr('data-prediction');
                vedicastro_title = jQuery('#astro_content_menu_data .vedicastro-click.active').attr('data-title');
            break;
            case 'cycles':
                jQuery('.cycles').removeClass('active');
                jQuery(e).addClass('active');
                jQuery('.astro_content_sub_tab_main.display_block').removeClass('display_block').addClass('display_none');
                var get_id = jQuery(e).attr('data_id');
                jQuery('div[data_content="'+get_id+'"]').removeClass('display_none').addClass('display_block');
                zodiac_sign = jQuery('.zodics_sign_tab.active > a').attr('data-zodic_id');
                cycle = jQuery('.vedicastro-click.active > a').attr('data-prediction');
    
            if(vedicastro_title == 'weekly') {
                week = week_val
            }
    
            break;
            case 'days':
                jQuery('.days').removeClass('active');
                jQuery(e).addClass('active');
                zodiac_sign = jQuery('.zodics_sign_tab.active > a').attr('data-zodic_id');
                cycle = jQuery('.cycles.active > a').attr('data-prediction');
                day = vedicastro_title;
            break;
            case 'weekly':
                jQuery('.weekly').removeClass('active');
                jQuery(e).addClass('active');
                zodiac_sign = jQuery('.zodics_sign_tab.active > a').attr('data-zodic_id');
                cycle = jQuery('.cycles.active > a').attr('data-prediction');
                week = week_val;
            break;
            case 'yearly':
                jQuery('.yearly').removeClass('active');
                jQuery(e).addClass('active');
                zodiac_sign = jQuery('.zodics_sign_tab.active > a').attr('data-zodic_id');
                cycle = jQuery('.cycles.active > a').attr('data-prediction');
            break;
        }
        nonce = jQuery('#prediction_nonce').val();
       
        typee = vedicastro_title;
        jQuery.ajax({
            url: vedicastro_public_ajax_object.ajax_url,
            type: 'post',
            data: {
                action  : 'vedicastro_prediction_ajax',
                zodiac  : zodiac_sign,
                cycle   : cycle,
                nonce   : nonce,
                day     : day,
                week    : week,
                typee   : typee,
                lang    : lang,
            },
            beforeSend: function() {
                jQuery(".Preloader").fadeIn("slow");                                                         
            },
            success: function(res) {

                jQuery('#choose_services_row .vedicastro-horoscope-predictions').html('').removeClass('display_block');
                jQuery(".Preloader").css('display', 'none');
                var obj = JSON.parse(res);
                if(obj.status == 'success'){
                    jQuery('#choose_services_row .vedicastro-horoscope-'+ vedicastro_title).html(obj.html).addClass('display_block');
                }else{
                    jQuery('#choose_services_row .vedicastro-horoscope-predictions').html('');
                    jQuery('#choose_services_row .vedicastro-horoscope-weekly').html(obj.html);                       
                }
            }
        });
    }
function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

function moon_calender_load(){
    var error = 0;
    var x = jQuery("#form-panchang-moon").serializeArray();
    jQuery.each(x, function(i, field){
        if(jQuery('#'+field.name).val() == '' ){
            jQuery('#'+field.name).addClass('kundli-error');
            error = 1;
        }else{
            jQuery('#'+field.name).removeClass('kundli-error');
        }
    });
    if(error == 0){
        var offset = new Date().getTimezoneOffset();
        var formatted = -(offset / 60);
        var form_data = jQuery('#form-panchang-moon').serializeArray();
        jQuery.ajax({
            url: vedicastro_public_ajax_object.ajax_url,
            type: 'post',
            data: {
                action  : 'vedicastro_panchang_moon_ajax',
                form_data  : form_data,
                time_zone : formatted,
            },
            beforeSend: function() {                                
                jQuery(".Preloader").fadeIn("slow");                           
            },
            success: function(res) {  
                jQuery('#moon_calendar_data .display_nones').css('display', 'block');       
                jQuery(".Preloader").css('display', 'none');
                var obj = JSON.parse(res);
                if(obj.status == 'success'){
                    jQuery('#panchang-moon-data').html(obj.html);
                }else{
                    jQuery('#panchang-moon-data').html(obj.message);
                }
            }
        });
    }
}

function monthly_calender_load(){
    var error = 0;
    var x = jQuery("#form-panchang-monthly").serializeArray();
    jQuery.each(x, function(i, field){
        if(jQuery('#'+field.name).val() == '' ){
            jQuery('#'+field.name).addClass('kundli-error');
            error = 1;
        }else{
            jQuery('#'+field.name).removeClass('kundli-error');
        }
    });
    if(error == 0){
        var offset = new Date().getTimezoneOffset();
        var formatted = -(offset / 60);
        var form_data = jQuery('#form-panchang-monthly').serializeArray();
        jQuery.ajax({
            url: vedicastro_public_ajax_object.ajax_url,
            type: 'post',
            data: {
                action  : 'vedicastro_panchang_monthly_ajax',
                form_data  : form_data,
                time_zone : formatted,
            },
            beforeSend: function() {                                
                jQuery(".Preloader").fadeIn("slow");                           
            },
            success: function(res) { 
                  jQuery('#panchang-monthly .display_nones').css('display', 'block');           
                jQuery(".Preloader").css('display', 'none');
                var obj = JSON.parse(res);
                if(obj.status == 'success'){
                    jQuery('#panchang-monthly-data').html(obj.html);
                }else{
                    jQuery('#panchang-monthly-data').html(obj.message);
                }
            }
        });
    }
}
