<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Product Countdown Colors Rules
 * Created by CMSMasters
 * 
 */


function devicer_yith_woocommerce_product_countdown_colors($custom_css) {
	$cmsmasters_option = devicer_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Yith WooCommerce Product Countdown Colors Scheme Rules ******************/
	
	/* Start Primary Color */
	/* Finish Primary Color */

	/* Start Headings Color */
	{$rule}.ywpc-countdown>.ywpc-header, 
	{$rule}.ywpc-countdown-loop > .ywpc-header,
	{$rule}.ywpc-sale-bar>.ywpc-header {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */

	/* Start Main Background Color */
	{$rule}.ywpc-countdown {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
/***************** Finish {$title} Yith WooCommerce Product Countdown Colors Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('devicer_theme_colors_secondary_filter', 'devicer_yith_woocommerce_product_countdown_colors');

