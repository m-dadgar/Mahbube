<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Ajax Search Colors Rules
 * Created by CMSMasters
 * 
 */


function devicer_yith_woocommerce_ajax_search_colors($custom_css) {
	$cmsmasters_option = devicer_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Yith WooCommerce Ajax Search Colors Scheme Rules ******************/
	
	/* Start Main Content Font Color */
	{$rule}.yith_wcas_result_content .amount,
	{$rule}.yith_woocommerce_ajax_search .yith-ajaxsearchform-container .autocomplete-suggestions > div,
	{$rule}.yith_wcas_result_content .yith_wcas_result_excerpt {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.woocommerce .autocomplete-suggestion .title strong,
	{$rule}.yith_woocommerce_ajax_search > .yith-ajaxsearchform-container:not(.cmsmasters_ajax_search_premium) .autocomplete-suggestions > div:hover,
	{$rule}.yith_woocommerce_ajax_search .yith-ajaxsearchform-container button:empty:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.woocommerce .autocomplete-suggestion  span.yith_wcas_result_on_sale, 
	{$rule}.autocomplete-suggestion  span.yith_wcas_result_on_sale {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.yith_wcas_result_content .yith_wcas_result_categories,
	{$rule}.yith_wcas_result_content .badges {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.yith_wcas_result_content .badges .yith_wcas_result_outofstock {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.yith_woocommerce_ajax_search .yith-ajaxsearchform-container button:empty,
	{$rule}.yith_wcas_result_content .title {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.woocommerce .autocomplete-suggestion  span.yith_wcas_result_on_sale, 
	{$rule}.autocomplete-suggestion  span.yith_wcas_result_on_sale {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.yith_woocommerce_ajax_search .yith-ajaxsearchform-container .autocomplete-suggestions,
	{$rule}.yith_woocommerce_ajax_search .yith-ajaxsearchform-container .autocomplete-suggestions > div,
	{$rule}.yith_woocommerce_ajax_search .yith-ajaxsearchform-container button:empty {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}

	@media only screen and (max-width: 1024px) {
		{$rule}#yith-ajaxsearchform select,
		{$rule}.yith-ajaxsearchform_form select {
			" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		}
	}
	/* Finish Main Background Color */
	
	
	/* Start Borders Color */
	{$rule}.yith_woocommerce_ajax_search .yith-ajaxsearchform-container .autocomplete-suggestions {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

	
/***************** Finish {$title} Yith WooCommerce Ajax Search Colors Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('devicer_theme_colors_secondary_filter', 'devicer_yith_woocommerce_ajax_search_colors');

