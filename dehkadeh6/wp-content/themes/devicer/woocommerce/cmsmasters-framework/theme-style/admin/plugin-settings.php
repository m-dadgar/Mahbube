<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 *
 * CMSMasters WooCommerce Admin Settings
 * Created by CMSMasters
 *
 */


/* Single Settings */
function devicer_woocommerce_options_general_fields($options, $tab) {
	if ($tab == 'header') {
		$options[] = array(
			'section' => 'header_section',
			'id' => 'devicer' . '_woocommerce_cart_dropdown',
			'title' => esc_html__('Header WooCommerce Cart', 'devicer'),
			'desc' => esc_html__('show', 'devicer'),
			'type' => 'checkbox',
			'std' => 0
		);
	}

	return $options;
}

add_filter('cmsmasters_options_general_fields_filter', 'devicer_woocommerce_options_general_fields', 10, 2);

