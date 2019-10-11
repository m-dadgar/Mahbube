<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Compare Colors Rules
 * Created by CMSMasters
 * 
 */


function devicer_yith_woocommerce_compare_colors($custom_css) {
	$cmsmasters_option = devicer_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Yith WooCommerce Compare Colors Scheme Rules ******************/
	
	/* Start Primary Color */
	/* Finish Primary Color */
	
	
	/* Start Primary Color */
	{$rule}table.compare-list  .product_title:hover,
	{$rule}.yith-woocompare-popup table.compare-list  tr.stock td.in-stock,
	{$rule}#page table.compare-list  tr.stock td.in-stock,
	{$rule}#yith-woocompare-share ul li a:hover,
	{$rule}.yith-woocompare-widget ul.products-list li .title:hover,
	{$rule}.cmsmasters_product .cmsmasters_theme_icon_wishlist:hover,
	{$rule}.cmsmasters_compare_btn.added,
	{$rule}.cmsmasters_compare_btn:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}#page table.compare-list .product_info .button:hover, 
	{$rule}#page table.compare-list .add-to-cart .button:hover, 
	{$rule}#page table.compare-list .added_to_cart:hover, 
	{$rule}table.compare-list .add-to-cart td a:hover,
	{$rule}#page .cmsmasters_woocompare_related .related-products .button:hover,
	{$rule}.yith-woocompare-widget a.compare:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}#yith-woocompare-share ul li a {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}#page .cmsmasters_woocompare_related .related-products .button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}table.compare-list  .product_title,
	{$rule}#yith-woocompare-share h3,
	{$rule}#yith-woocompare-cat-nav .yith-woocompare-nav-list li > *,
	{$rule}.yith-woocompare-widget .products-list li .remove:before,
	{$rule}.yith-woocompare-widget ul.products-list li .title,
	{$rule}.cmsmasters_product .cmsmasters_theme_icon_wishlist,
	{$rule}.cmsmasters_compare_btn {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}#yith-woocompare-cat-nav .yith-woocompare-nav-list li > *:after,
	{$rule}#page .cmsmasters_woocompare_related .related-products .button:hover,
	{$rule}#page table.compare-list .product_info .button, 
	{$rule}#page table.compare-list .add-to-cart .button, 
	{$rule}#page table.compare-list .added_to_cart, 
	{$rule}.yith-woocompare-widget a.compare {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}#page table.compare-list .product_info .button, 
	{$rule}#page table.compare-list .add-to-cart .button, 
	{$rule}#page table.compare-list .added_to_cart, 
	{$rule}#page .cmsmasters_woocompare_related .related-products .button,
	{$rule}.yith-woocompare-widget a.compare {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.yith-woocompare-popup table.compare-list  tr.stock td.in-stock,
	{$rule}#page table.compare-list  tr.stock td.in-stock,
	{$rule}#page .yith-woocompare-widget .products-list li .remove:hover,
	{$rule}.yith-woocompare-widget ul.products-list li .remove,
	{$rule}.cmsmasters_compare_btn .blockUI.blockOverlay {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Borders Color */
	{$rule}#yith-woocompare table.dataTable.compare-list tbody th, 
	{$rule}#yith-woocompare table.dataTable.compare-list tbody td,
	{$rule}#yith-woocompare-cat-nav .yith-woocompare-nav-list,
	{$rule}.yith-woocompare-widget ul.products-list li .remove {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */
	
/***************** Finish {$title} Yith WooCommerce Compare Colors Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('devicer_theme_colors_secondary_filter', 'devicer_yith_woocommerce_compare_colors');

