<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * WooCommerce Fonts Rules
 * Created by CMSMasters
 * 
 */


function devicer_woocommerce_fonts($custom_css) {
	$cmsmasters_option = devicer_get_global_options();
	
	
	$custom_css .= "
/***************** Start WooCommerce Font Styles ******************/

	/* Start Content Font */
	.cart_totals table td strong,
	.shop_attributes th, 
	.woocommerce-product-details__short-description,
	.cmsmasters_product .cmsmasters_product_cat,
	.cmsmasters_product .cmsmasters_product_cat a,
	.widget_shopping_cart .total *,
	.widget_shopping_cart .cart_list .quantity *, 
	.widget > .product_list_widget .amount,
	.widget > .product_list_widget del .amount,
	.widget_price_filter .price_slider_amount .price_label,
	.cmsmasters_single_product .product_meta a,
	.cmsmasters_single_product .add_to_wishlist.button,
	.shop_table.woocommerce-checkout-review-order-table tbody tr *,
	.shop_table.woocommerce-checkout-review-order-table tfoot tr *,
	ul.order_details strong,
	.cmsmasters_product_single_shortcode .cmsmasters_product .cmsmasters_product_info_wrap,
	.shop_table.order_details tbody tr *,
	.shop_table.order_details tfoot tr * {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_content_font_google_font']) . $cmsmasters_option['devicer' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_content_font_font_style'] . ";
	}

	.widget_shopping_cart .cart_list .quantity *,
	.widget > .product_list_widget .amount {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_content_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_content_font_line_height'] + 2) . "px;
	}

	.woocommerce-product-details__short-description {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_content_font_font_size'] + 1) . "px;
	}

	.onsale,
	.out-of-stock,
	.stock {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_content_font_line_height'] - 1) . "px;
		text-transform: uppercase;
		font-weight: 500;
	}
	
	.cmsmasters_dynamic_cart_wrap .cmsmasters_cart_info,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list .quantity {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_content_font_line_height'] - 2) . "px;
	}

	.cmsmasters_dynamic_cart_wrap .cmsmasters_cart_info {
		line-height:" . ((int) $cmsmasters_option['devicer' . '_content_font_line_height'] - 4) . "px;
	}

	.cmsmasters_dynamic_cart_wrap .cmsmasters_cart_info .amount {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_content_font_font_size'] + 2) . "px;
	}

	#page #yith-ajaxsearchform select,
	#page .yith-ajaxsearchform_form select {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_content_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_content_font_line_height'] - 1) . "px;
		font-weight: 400;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	#page table.variations .reset_variations,
	#page table.variations tr td.label,
	.shop_table .product-name a,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_link_font_google_font']) . $cmsmasters_option['devicer' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['devicer' . '_link_font_text_decoration'] . ";
	}
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	.cmsmasters_single_product .product_title {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_h1_font_google_font']) . $cmsmasters_option['devicer' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['devicer' . '_h1_font_text_decoration'] . ";
	}
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	.cmsmasters_single_product .price {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_h2_font_google_font']) . $cmsmasters_option['devicer' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['devicer' . '_h2_font_text_decoration'] . ";
	}
	
	.cmsmasters_single_product .price ins:before {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h2_font_font_size'] - 6) . "px;
	}

	.cmsmasters_single_product .price {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h2_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_h2_font_line_height'] - 4) . "px;
		font-weight: 400;
	}
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.cmsmasters_product .price,
	.cmsmasters_product .cmsmasters_product_button,
	.cross-sells h2,
	.cart_totals > h2,
	.cart_totals table .cart-subtotal th,
	.cart_totals table .order-total th,
	ul.order_details {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_h4_font_google_font']) . $cmsmasters_option['devicer' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['devicer' . '_h4_font_text_decoration'] . ";
	}
	
	.cmsmasters_product .price del {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h4_font_font_size'] - 4) . "px;
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.shipping-calculator-button,
	.widget_layered_nav ul li, 
	.cmsmasters_product .cmsmasters_product_title a,
	.product-category .cmsmasters_product_wrapper_border .woocommerce-loop-category__title,
	.cmsmasters_product_single_shortcode.full_product .cmsmasters_product .cmsmasters_product_title a,
	.cmsmasters_product .cmsmasters_product_button,
	.widget_layered_nav ul li a, 
	.widget_layered_nav_filters ul li, 
	.cmsmasters_single_product .product_meta .product_meta_title,
	.cmsmasters_single_product .share_posts .share_posts_title,
	.cmsmasters_single_product .compare.button,
	.cmsmasters_single_product .add_to_wishlist.button,
	.shop_table thead th,
	.widgettitle,
	.widget > .product_list_widget a,
	.widget_shopping_cart .cart_list a,
	.widget_layered_nav_filters ul li a, 
	.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item.current_tab > a,
	.cmsmasters_woo_wrap_result .woocommerce-ordering .orderby,
	.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item > a,
	.cmsmasters_single_product .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner *,
	.widget_product_categories ul li, 
	.widget_product_categories ul li a {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_h5_font_google_font']) . $cmsmasters_option['devicer' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['devicer' . '_h5_font_text_decoration'] . ";
	}
	
	.shipping-calculator-button,
	.cmsmasters_product_single_shortcode.small_product .cmsmasters_product .cmsmasters_product_title a {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_h5_font_line_height'] + 2) . "px;
	}

	.cmsmasters_product_single_shortcode.full_product .cmsmasters_product .cmsmasters_product_title a {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h5_font_font_size'] + 6) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_h5_font_line_height'] + 6) . "px;
	}

	.cmsmasters_product .cmsmasters_product_button {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h5_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_h5_font_line_height'] - 4) . "px;
		text-transform: uppercase;
	}

	.cmsmasters_single_product .product_meta .product_meta_title,
	.cmsmasters_single_product .compare.button, 
	.cmsmasters_single_product .add_to_wishlist.button,
	.widget > .product_list_widget a,
	.widget_product_categories ul li a,
	.widget_shopping_cart .cart_list a,
	.cmsmasters_single_product .share_posts .share_posts_title {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h5_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_h5_font_line_height'] - 2) . "px;
	}

	.cmsmasters_single_product .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner * {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h5_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['devicer' . '_h5_font_line_height'] - 2) . "px;
		font-weight: 400;
	}

	.cmsmasters_woo_wrap_result .woocommerce-ordering .orderby,
	.shop_table thead th {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h5_font_font_size'] - 1) . "px;
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.cmsmasters_woo_comments .commentlist .comment .cmsmasters_comment_item_cont_info .cmsmasters_comment_item_date,
	.cmsmasters_woo_comments .commentlist .comment .cmsmasters_comment_item_cont_info .star-rating,
	.cmsmasters_single_product .price del,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_h6_font_google_font']) . $cmsmasters_option['devicer' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['devicer' . '_h6_font_text_decoration'] . ";
	}
	
	.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item > a {
		font-size:" . ((int) $cmsmasters_option['devicer' . '_h6_font_font_size'] + 1) . "px;
	}

	.cmsmasters_single_product .price del {
		font-weight: 400;
		text-decoration: line-through;
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	.woocommerce-MyAccount-navigation > ul > li > a {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_button_font_google_font']) . $cmsmasters_option['devicer' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['devicer' . '_button_font_text_transform'] . ";
	}
	
	.widget_shopping_cart .buttons .button,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button {
		line-height:" . ((int) $cmsmasters_option['devicer' . '_button_font_line_height'] - 4) . "px;
	}

	.widget_price_filter .price_slider_amount .button {
		line-height: 30px;
	}
	/* Finish Button Font */
	
	
	/* Start Text Fields Font */
	.select2-dropdown {
		font-family:" . devicer_get_google_font($cmsmasters_option['devicer' . '_input_font_google_font']) . $cmsmasters_option['devicer' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['devicer' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['devicer' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['devicer' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['devicer' . '_input_font_font_style'] . ";
	}
	/* Finish Text Fields Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish WooCommerce Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('devicer_theme_fonts_filter', 'devicer_woocommerce_fonts');

