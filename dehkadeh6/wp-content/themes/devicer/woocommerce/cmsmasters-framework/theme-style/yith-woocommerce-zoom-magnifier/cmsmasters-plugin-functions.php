<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Zoom Magnifier Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts for Yith WooCommerce Zoom Magnifier Plugin */
require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-zoom-magnifier/function/plugin-colors.php');

require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-zoom-magnifier/function/plugin-fonts.php');



/* Register CSS Styles and Scripts for Yith WooCommerce Zoom Magnifier Plugin */
function devicer_yith_woocommerce_zoom_magnifier_register_styles_scripts() {

	wp_enqueue_style('devicer-yith-woocommerce-zoom-magnifier-style', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-zoom-magnifier/css/plugin-style.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('devicer-yith-woocommerce-zoom-magnifier-adaptive', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-zoom-magnifier/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('devicer-yith-woocommerce-zoom-magnifier-rtl', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-zoom-magnifier/css/plugin-rtl.css', array(), '1.0.0', 'screen');
	}
	
}

add_action('wp_enqueue_scripts', 'devicer_yith_woocommerce_zoom_magnifier_register_styles_scripts');


/* Yith WooCommerce Zoom Default */
function devicer_zoom_defaults() {
	if (!get_option('cmsmasters_devicer_zoom_first_active')) {
		update_option('yith_wcmg_slider_responsive', 'no');
		update_option('yith_wcmg_slider_items', '6');
		
		add_option('cmsmasters_devicer_zoom_first_active', 'true');
	}
}

add_action('init', 'devicer_zoom_defaults');