<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Product Countdown Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts for Yith WooCommerce Product Countdown Plugin */
require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-product-countdown/function/plugin-colors.php');

require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-product-countdown/function/plugin-fonts.php');



/* Register CSS Styles and Scripts for Yith WooCommerce Product Countdown Plugin */
function devicer_yith_woocommerce_product_countdown_register_styles_scripts() {
	wp_enqueue_style('devicer-yith-woocommerce-product-countdown-style', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-product-countdown/css/plugin-style.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('devicer-yith-woocommerce-product-countdown-adaptive', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-product-countdown/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
	

	if (is_rtl()) {
		wp_enqueue_style('devicer-yith-woocommerce-product-countdown-rtl', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-product-countdown/css/plugin-rtl.css', array(), '1.0.0', 'screen');
	}
}

add_action('wp_enqueue_scripts', 'devicer_yith_woocommerce_product_countdown_register_styles_scripts');



/* Register CSS Styles and Scripts for Yith WooCommerce Product Countdown Plugin admin page */
function devicer_yith_woocommerce_product_countdown_register_admin_scripts() {
	wp_enqueue_script('devicer-yith-woocommerce-product-countdown-admin-script', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-product-countdown/admin/js/plugin-admin-scripts.js', array('jquery'), '1.0.0', true);
}
	
add_action('admin_enqueue_scripts', 'devicer_yith_woocommerce_product_countdown_register_admin_scripts');


/* WooCommerce Countdown Single Product Action */
function devicer_woocommerce_countdown_single_product_action() {
	return 'cmsmasters_countdown_single_product_action';
}

add_filter('ywpc_override_standard_position', 'devicer_woocommerce_countdown_single_product_action');


/* WooCommerce Countdown Archive Product Action */
function devicer_woocommerce_countdown_archive_product_action() {
	return 'cmsmasters_countdown_archive_product_action';
}

add_filter('ywpc_override_standard_position_loop', 'devicer_woocommerce_countdown_archive_product_action'); 

if (defined('YITH_WPC_PREMIUM')) {
	function devicer_countdown_premium_defaults() {
		if (!get_option('cmsmasters_devicer_countdown_premium_first_active')) {
			update_option('ywpc_timer_title', '');
			
			add_option('cmsmasters_devicer_countdown_premium_first_active', 'true');
		}
	}

	add_action('init', 'devicer_countdown_premium_defaults');
}