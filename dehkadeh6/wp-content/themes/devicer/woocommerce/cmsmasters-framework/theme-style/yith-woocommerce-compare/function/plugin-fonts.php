<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Compare Fonts Rules
 * Created by CMSMasters
 * 
 */


function devicer_yith_woocommerce_compare_fonts($custom_css) {
	$cmsmasters_option = devicer_get_global_options();
	
	
	$custom_css .= "
/***************** Start Yith WooCommerce Compare Font Styles ******************/
	
	/* Start Content Font */
	body.yith-woocompare-popup,
	.yith-woocompare-widget a.clear-all,
	.yith-woocompare-widget ul.products-list li .title {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_content_font_google_font']) . $cmsmasters_option['devicer' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_content_font_font_style'] . ";
	}
	
	.yith-woocompare-widget ul.products-list li .title {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_content_font_font_size'] + 1) . "px;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	.cmsmasters_compare_btn {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_link_font_google_font']) . $cmsmasters_option['devicer' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['devicer' . '_link_font_text_decoration'] . ";
	}
	/* Finish Link Font */
	
	
	/* Start H2 Font */
	body.yith-woocompare-popup h1,
	.yith-woocompare-share-title {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_h2_font_google_font']) . $cmsmasters_option['devicer' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['devicer' . '_h2_font_text_decoration'] . ";
	}
	/* Finish H2 Font */
	
	
	/* Start H5 Font */
	#yith-woocompare table.compare-list tbody th,
	#yith-woocompare-cat-nav .yith-woocompare-nav-list li > * {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_h5_font_google_font']) . $cmsmasters_option['devicer' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['devicer' . '_h5_font_text_decoration'] . ";
	}
	
	#yith-woocompare-cat-nav .yith-woocompare-nav-list li > * {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h5_font_font_size'] -3) . "px;}
	/* Finish H5 Font */
	
	
	/* Start Button Font */
	.yith-woocompare-popup table.compare-list .product_info .button, 
	#page table.compare-list .product_info .button, 
	.yith-woocompare-popup table.compare-list .add-to-cart .button, 
	#page table.compare-list .add-to-cart .button, 
	.yith-woocompare-popup table.compare-list .added_to_cart, 
	#page table.compare-list .added_to_cart, 
	.yith-woocompare-popup .cmsmasters_woocompare_related .related-products .button, 
	#page .cmsmasters_woocompare_related .related-products .button,
	.yith-woocompare-widget a.compare {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_button_font_google_font']) . $cmsmasters_option['devicer' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_button_font_text_transform'] . ";
	}
	
	.yith-woocompare-popup table.compare-list .product_info .button, 
	#page table.compare-list .product_info .button, 
	.yith-woocompare-popup table.compare-list .add-to-cart .button, 
	#page table.compare-list .add-to-cart .button, 
	.yith-woocompare-popup table.compare-list .added_to_cart, 
	#page table.compare-list .added_to_cart, 
	.yith-woocompare-popup .cmsmasters_woocompare_related .related-products .button, 
	#page .cmsmasters_woocompare_related .related-products .button,
	.yith-woocompare-widget a.compare {
		line-height:" . ((int) $cmsmasters_option['devicer' . '_button_font_line_height'] -10) . "px;
	}
	/* Finish Button Font */
	
/***************** Finish Yith WooCommerce Compare Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('devicer_theme_fonts_filter', 'devicer_yith_woocommerce_compare_fonts');

