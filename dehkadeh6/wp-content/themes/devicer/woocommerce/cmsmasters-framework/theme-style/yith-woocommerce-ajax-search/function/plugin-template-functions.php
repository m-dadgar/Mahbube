<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Ajax Search Template Functions
 * Created by CMSMasters
 * 
 */


/* Ajax Search for Header Search */
function devicer_yith_woocommerce_ajax_search_header_search_form() {
	return do_shortcode('[yith_woocommerce_ajax_search]');
}

add_filter('devicer_get_header_search_form_filter', 'devicer_yith_woocommerce_ajax_search_header_search_form');