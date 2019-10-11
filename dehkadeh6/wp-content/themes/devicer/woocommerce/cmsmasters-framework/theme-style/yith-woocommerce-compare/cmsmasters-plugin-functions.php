<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Compare Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts for Yith WooCommerce Compare Plugin */
require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/function/plugin-template-functions.php');

require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/function/plugin-colors.php');

require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/function/plugin-fonts.php');



/* Register CSS Styles and Scripts for Yith WooCommerce Compare Plugin */
function devicer_yith_woocommerce_compare_register_styles_scripts() {

	wp_enqueue_style('devicer-yith-woocommerce-compare-style', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/css/plugin-style.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('devicer-yith-woocommerce-compare-adaptive', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('devicer-yith-woocommerce-compare-rtl', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/css/plugin-rtl.css', array(), '1.0.0', 'screen');
	}
	
}

add_action('wp_enqueue_scripts', 'devicer_yith_woocommerce_compare_register_styles_scripts');



/* Yith WooCommerce Compare Default */
function devicer_compare_options_default() {
	update_option('yith_woocompare_compare_button_in_products_list', 'yes');
}

add_action('activate_yith-woocommerce-compare/init.php', 'devicer_compare_options_default');



/* Yith WooCommerce Compare Default */
function devicer_compare_premium_options_default() {
	update_option('yith_woocompare_use_page_popup', 'page');
}

add_action('activate_yith-woocommerce-compare-premium/init.php', 'devicer_compare_premium_options_default');