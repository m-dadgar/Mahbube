<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Zoom Magnifier Fonts Rules
 * Created by CMSMasters
 * 
 */


function devicer_yith_woocommerce_zoom_magnifier_fonts($custom_css) {
	$cmsmasters_option = devicer_get_global_options();
	
	
	$custom_css .= "
/***************** Start Yith WooCommerce Zoom Magnifier Font Styles ******************/
	
	
	
/***************** Finish Yith WooCommerce Zoom Magnifier Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('devicer_theme_fonts_filter', 'devicer_yith_woocommerce_zoom_magnifier_fonts');

