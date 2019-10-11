<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Wishlist Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts for Yith WooCommerce Wishlist Plugin */
require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/function/plugin-template-functions.php');

require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/function/plugin-colors.php');

require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/function/plugin-fonts.php');



/* Register CSS Styles and Scripts for Yith WooCommerce Wishlist Plugin */
function devicer_yith_woocommerce_wishlist_register_styles_scripts() {

	wp_enqueue_style('devicer-yith-woocommerce-wishlist-style', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/css/plugin-style.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('devicer-yith-woocommerce-wishlist-adaptive', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
	
	
	if (is_rtl()) {
		wp_enqueue_style('devicer-yith-woocommerce-wishlist-rtl', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/css/plugin-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	// Scripts
	wp_enqueue_script('devicer-yith-woocommerce-wishlist-script', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/js/jquery.plugin-script.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'devicer_yith_woocommerce_wishlist_register_styles_scripts');

/* Yith WooCommerce Wish List Default */
function devicer_wishlist_defaults() {
	if (!get_option('cmsmasters_devicer_wish_list_first_active')) {
		update_option('yith_wcwl_use_button', 'yes');
		update_option('select2-yith_wcwl_add_to_wishlist_icon-container', 'select2-yith_wcwl_add_to_wishlist_icon-result-glje-fa-heart-o');
		
		add_option('cmsmasters_devicer_wish_list_first_active', 'true');
	}
}

add_action('init', 'devicer_wishlist_defaults');

/* Yith WooCommerce Wish List Premium Default */
function devicer_wishlist_premium_defaults() {
	if (!get_option('cmsmasters_devicer_wish_list_premium_first_active')) {
		if (CMSMASTERS_WCWL_PREMIUM) {
			update_option('yith_wcwl_use_button', 'yes');
			update_option('select2-yith_wcwl_add_to_wishlist_icon-container', 'select2-yith_wcwl_add_to_wishlist_icon-result-glje-fa-heart-o');
			
			add_option('cmsmasters_devicer_wish_list_premium_first_active', 'true');
		}
	}
}

add_action('init', 'devicer_wishlist_premium_defaults');
