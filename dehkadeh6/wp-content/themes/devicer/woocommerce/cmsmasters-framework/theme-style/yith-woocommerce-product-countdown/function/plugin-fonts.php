<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Product Countdown Fonts Rules
 * Created by CMSMasters
 * 
 */


function devicer_yith_woocommerce_product_countdown_fonts($custom_css) {
	$cmsmasters_option = devicer_get_global_options();
	
	
	$custom_css .= "
/***************** Start Yith WooCommerce Product Countdown Font Styles ******************/
/* Start Content Font */
.ywpc-countdown-loop > .ywpc-timer > div > .ywpc-label
{
	font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_content_font_google_font']) . $cmsmasters_option['devicer' . '_content_font_system_font'] . ";
	font-size:" . $cmsmasters_option['devicer' . '_content_font_font_size'] . "px;
	line-height:" . $cmsmasters_option['devicer' . '_content_font_line_height'] . "px;
	font-weight:" . $cmsmasters_option['devicer' . '_content_font_font_weight'] . ";
	font-style:" . $cmsmasters_option['devicer' . '_content_font_font_style'] . ";
}
.ywpc-countdown-loop > .ywpc-timer > div > .ywpc-label {
	font-size:" . ((int) $cmsmasters_option['devicer' . '_content_font_font_size'] - 1) . "px;
	line-height:" . ((int) $cmsmasters_option['devicer' . '_content_font_line_height'] - 10) . "px;
}
/* Finish Content Font */

/* Start H3 Font */
.full_product .ywpc-countdown-loop>.ywpc-timer>div>.ywpc-amount>span {
	font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_h3_font_google_font']) . $cmsmasters_option['devicer' . '_h3_font_system_font'] . ";
	font-size:" . $cmsmasters_option['devicer' . '_h3_font_font_size'] . "px;
	line-height:" . $cmsmasters_option['devicer' . '_h3_font_line_height'] . "px;
	font-weight:" . $cmsmasters_option['devicer' . '_h3_font_font_weight'] . ";
	font-style:" . $cmsmasters_option['devicer' . '_h3_font_font_style'] . ";
	text-transform:" . $cmsmasters_option['devicer' . '_h3_font_text_transform'] . ";
	text-decoration:" . $cmsmasters_option['devicer' . '_h3_font_text_decoration'] . ";
}

.full_product .ywpc-countdown-loop>.ywpc-timer>div>.ywpc-amount>span {
	font-size:" . ((int) $cmsmasters_option['devicer' . '_h3_font_font_size'] + 6) . "px;
	line-height:" . ((int) $cmsmasters_option['devicer' . '_h3_font_font_size'] + 6) . "px;
}
/* Finish H3 Font */

/* Start H5 Font */
.ywpc-countdown>.ywpc-header,
.ywpc-countdown-loop>.ywpc-header,
.full_product .ywpc-countdown-loop>.ywpc-header,  
.ywpc-sale-bar>.ywpc-header {
	font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_h5_font_google_font']) . $cmsmasters_option['devicer' . '_h5_font_system_font'] . ";
	font-size:" . $cmsmasters_option['devicer' . '_h5_font_font_size'] . "px;
	line-height:" . $cmsmasters_option['devicer' . '_h5_font_line_height'] . "px;
	font-weight:" . $cmsmasters_option['devicer' . '_h5_font_font_weight'] . ";
	font-style:" . $cmsmasters_option['devicer' . '_h5_font_font_style'] . ";
	text-transform:" . $cmsmasters_option['devicer' . '_h5_font_text_transform'] . ";
	text-decoration:" . $cmsmasters_option['devicer' . '_h5_font_text_decoration'] . ";
}

.ywpc-countdown-loop>.ywpc-timer>div>.ywpc-amount>span {
	font-size:" . ((int) $cmsmasters_option['devicer' . '_h5_font_font_size'] + 2) . "px;
}

.ywpc-countdown-loop>.ywpc-header {
	font-size:" . ((int) $cmsmasters_option['devicer' . '_h5_font_font_size'] - 2) . "px;
}

/* Finish H5 Font */
	
	
/***************** Finish Yith WooCommerce Product Countdown Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('devicer_theme_fonts_filter', 'devicer_yith_woocommerce_product_countdown_fonts');

