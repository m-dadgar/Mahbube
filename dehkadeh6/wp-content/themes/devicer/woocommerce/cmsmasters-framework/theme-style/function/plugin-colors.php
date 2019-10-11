<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * WooCommerce Colors Rules
 * Created by CMSMasters
 * 
 */


function devicer_woocommerce_colors($custom_css) {
	$cmsmasters_option = devicer_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} WooCommerce Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}.cmsmasters_product .cmsmasters_product_cat a,
	{$rule}.cmsmasters_product .price,
	{$rule}.widget > .product_list_widget .amount,
	{$rule}.cmsmasters_product .cmsmasters_product_button,
	{$rule}.shop_table.woocommerce-checkout-review-order-table tbody tr *,
	{$rule}.shop_table.woocommerce-checkout-review-order-table tfoot tr *,
	{$rule}.shop_attributes th,
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}ul.order_details strong,
	{$rule}.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item.current_tab > a,
	{$rule}.cmsmasters_single_product .product_meta a,
	{$rule}.cmsmasters_single_product .compare.button,
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content,
	{$rule}.cmsmasters_single_product .add_to_wishlist.button,
	{$rule}.cmsmasters_single_product .product_meta .sku,
	{$rule}.cmsmasters_single_product .share_posts a:before,
	{$rule}.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item > a,
	{$rule}.shop_table.order_details tbody tr *,
	{$rule}.shop_table.order_details tfoot tr *,
	{$rule}.woocommerce-MyAccount-content fieldset,
	{$rule}.woocommerce-MyAccount-content legend, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}.select2-container .select2-selection--single .select2-selection__rendered {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.required,
	{$rule}.shop_table .actions .coupon input[type=submit],
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a,
	{$rule}.shop_table a:not(.button):hover,
	{$rule}.widget_layered_nav ul li a:hover, 
	{$rule}.widget_layered_nav ul li.chosen a, 
	{$rule}.widget_layered_nav_filters ul li a:hover, 
	{$rule}.cmsmasters_product .cmsmasters_product_cat,
	{$rule}.cmsmasters_product .cmsmasters_product_cat a,
	{$rule}.cmsmasters_products .product-category .cmsmasters_product_wrapper_border .woocommerce-loop-category__title:hover,
	{$rule}.widget_layered_nav_filters ul li.chosen a, 
	{$rule}table.variations .reset_variations,
	{$rule}.cmsmasters_single_product .price del + ins,
	{$rule}.widget > .product_list_widget del + ins .amount,
	{$rule}.cmsmasters_product .price del + ins,
	{$rule}.cmsmasters_single_product .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner span,
	{$rule}.widget_shopping_cart .total *,
	{$rule}.cmsmasters_single_product .product_meta a:hover,
	{$rule}.cmsmasters_single_product .compare.button:hover,
	{$rule}.cmsmasters_single_product .add_to_wishlist.button:hover,
	{$rule}.cmsmasters_single_product .share_posts a:hover:before,
	{$rule}.shop_table.woocommerce-checkout-review-order-table tfoot .order-total *,
	{$rule}.shop_table.order_details tfoot tr:last-child *, 
	{$rule}.widget_product_categories ul li a:hover, 
	{$rule}.widget_product_categories ul li.current-cat a,
	{$rule}.woocommerce-store-notice .woocommerce-store-notice__dismiss-link {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.input-checkbox + label:after,
	{$rule}.input-radio + label:after,
	{$rule}input.shipping_method + label:after,
	{$rule}.shop_table .actions .coupon input[type=submit]:hover,
	{$rule}ul.order_details li,
	{$rule}.onsale,
	{$rule}.cmsmasters_product .cmsmasters_product_button:hover,
	{$rule}.widget_price_filter .price_slider_amount .button:hover,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a:hover,
	{$rule}.woocommerce-MyAccount-navigation > ul > li.is-active > a,
	{$rule}.widget_price_filter .ui-slider-range,
	{$rule}.woocommerce-store-notice {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}.shop_table .actions .coupon input[type=submit]:hover,
	{$rule}.cmsmasters_product:hover .cmsmasters_product_wrapper_border,
	{$rule}.cmsmasters_product:hover,
	{$rule}.cmsmasters_products .product-category:hover .cmsmasters_product_wrapper_border,
	{$rule}.cmsmasters_products .product-category:hover,
	{$rule}.cmsmasters_product .cmsmasters_product_button:hover,
	{$rule}.widget_price_filter .price_slider_amount .button:hover,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a:hover,
	{$rule}.woocommerce-MyAccount-navigation > ul > li.is-active > a,
	{$rule}.select2-container.select2-container--open .select2-selection--single,
	{$rule}.select2-container.select2-container--focus .select2-selection--single {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}

	{$rule}.cmsmasters_product:hover {
		-webkit-box-shadow:inset 0px 0px 0px 1px rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_link']) . ", 1);
		-moz-box-shadow:inset 0px 0px 0px 1px rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_link']) . ", 1);
		box-shadow:inset 0px 0px 0px 1px rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_link']) . ", 1);
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}table.variations .reset_variations:hover,
	{$rule}.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item.current_tab > a:hover,
	{$rule}.cmsmasters_tabs.cmsmasters_woo_tabs .cmsmasters_tabs_list_item > a:hover,
	{$rule}.cmsmasters_single_product .price del,
	{$rule}.widget > .product_list_widget del .amount,
	{$rule}.widget > .product_list_widget a:hover,
	{$rule}.cmsmasters_single_product .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner a:hover,
	{$rule}.widget_shopping_cart .cart_list a:hover,
	{$rule}.cmsmasters_product .price del {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}#page .remove:hover:before,
	{$rule}.out-of-stock,
	{$rule}.widget_price_filter .price_slider_amount .button,
	{$rule}.stock,
	{$rule}#page .remove:hover:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.link_hover_color,
	{$rule}.widget_price_filter .price_slider_amount .button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.cmsmasters_product .cmsmasters_product_cat a:hover,
	{$rule}.cmsmasters_single_product .price,
	{$rule}.widget > .product_list_widget a,
	{$rule}.cmsmasters_products .product-category .cmsmasters_product_wrapper_border mark,
	{$rule}.widget_shopping_cart .cart_list a,
	{$rule}.cmsmasters_product .price,
	{$rule}.quantity input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}.widget_shopping_cart .total strong,
	{$rule}.widget_price_filter .price_slider_amount .price_label,
	{$rule}.cmsmasters_woo_wrap_result .woocommerce-result-count,
	{$rule}.shop_table a:not(.button), 
	{$rule}.cmsmasters_single_product .product_meta .product_meta_title,
	{$rule}.cmsmasters_single_product .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner a,
	{$rule}.cmsmasters_single_product .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner,
	{$rule}.cart_totals table,
	{$rule}.widget_layered_nav ul li, 
	{$rule}.widget_layered_nav ul li a, 
	{$rule}.widget_layered_nav_filters ul li, 
	{$rule}.widget_layered_nav_filters ul li a, 
	{$rule}.widget_product_categories ul li, 
	{$rule}.widget_product_categories ul li a {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.widget_price_filter .ui-slider-handle,
	{$rule}#page .remove:before,
	{$rule}#page .remove:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.shop_table .actions .coupon input[type=submit]:hover,
	{$rule}ul.order_details li,
	{$rule}.out-of-stock,
	{$rule}.cmsmasters_product .cmsmasters_product_button:hover,
	{$rule}.widget_price_filter .price_slider_amount .button,
	{$rule}.stock,
	{$rule}.woocommerce-store-notice, 
	{$rule}.woocommerce-store-notice p a, 
	{$rule}.woocommerce-store-notice p a:hover,
	{$rule}.onsale,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a:hover,
	{$rule}.woocommerce-MyAccount-navigation > ul > li.is-active > a {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_product .cmsmasters_product_add_wrap,
	{$rule}.select2-container .select2-choice,
	{$rule}.select2-container.select2-drop-above .select2-choice,
	{$rule}.select2-container.select2-container-active .select2-choice,
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice,
	{$rule}.select2-results,
	{$rule}.input-checkbox + label:before,
	{$rule}.input-radio + label:before,
	{$rule}input.shipping_method + label:before,
	{$rule}.shop_table .actions .coupon input[type=submit],
	{$rule}ul.order_details strong,
	{$rule}.cmsmasters_product .cmsmasters_product_wrapper_border,
	{$rule}.cmsmasters_product .cmsmasters_product_add_wrap,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a,
	{$rule}.woocommerce-MyAccount-content fieldset,
	{$rule}.woocommerce-MyAccount-content legend,
	{$rule}.woocommerce-store-notice .woocommerce-store-notice__dismiss-link,
	{$rule}.select2-container .select2-selection--single {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box,
	{$rule}.woocommerce-info,
	{$rule}.cmsmasters_product .cmsmasters_compare_btn,
	{$rule}.products .product .cmsmasters_add_wishlist_button .yith-wcwl-add-button img,
	{$rule}.cmsmasters_product .cmsmasters_quick_view_button,
	{$rule}.cmsmasters_product .cmsmasters_theme_icon_wishlist,
	{$rule}.woocommerce-message,
	{$rule}.woocommerce-error {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_alternate']) . "
	}

	{$rule}.cmsmasters_product .cmsmasters_theme_icon_wishlist {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box:after {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['devicer' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_star_rating .cmsmasters_star_trans_wrap, 
	{$rule}.comment-form-rating .stars > span {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_border']) . "
	}

	{$rule}.widget_price_filter .price_slider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_woo_comments .commentlist .comment,
	{$rule}div.products,
	{$rule}.input-checkbox + label:before,
	{$rule}.input-radio + label:before,
	{$rule}input.shipping_method + label:before,
	{$rule}.woocommerce-checkout-payment,
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box,
	{$rule}.woocommerce-info,
	{$rule}.cmsmasters_woo_comments .commentlist .comment .cmsmasters_comment_item_cont,
	{$rule}.woocommerce-message,
	{$rule}.woocommerce-error,
	{$rule}.cmsmasters_product .cmsmasters_product_wrapper_border,
	{$rule}.cmsmasters_products .product-category .cmsmasters_product_wrapper_border,
	{$rule}.customer_details,
	{$rule}.widget > .product_list_widget img,
	{$rule}.widget_shopping_cart .cart_list img,
	{$rule}.cmsmasters_product .cmsmasters_product_button,
	{$rule}.shop_table .actions .coupon input[type=submit],
	{$rule}.select2-container .select2-choice,
	{$rule}.select2-container.select2-drop-above .select2-choice,
	{$rule}.cart_totals table th,
	{$rule}.widget_product_categories ul li,
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content,
	{$rule}.yith_magnifier_zoom,
	{$rule}.cmsmasters_product_left_column .yith_magnifier_gallery li a,
	{$rule}.cart_totals table td,
	{$rule}ul.order_details li strong,
	{$rule}.cmsmasters_mailpoet .cmsmasters_mailpoet_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}.cmsmasters_single_product .cmsmasters_product_image img,
	{$rule}.cmsmasters_single_product .cmsmasters_product_thumbs .cmsmasters_product_thumb img,
	{$rule}.woocommerce-MyAccount-navigation > ul > li > a,
	{$rule}.shop_table .cart_item,
	{$rule}section.products,
	{$rule}.select2-dropdown,
	{$rule}.select2-container .select2-selection--single {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.select2-container.select2-container--open .select2-dropdown--below,
	{$rule}.select2-container.select2-container--focus .select2-dropdown--below {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['devicer' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box:before,
	{$rule}.select2-container.select2-container--open .select2-dropdown--above,
	{$rule}.select2-container.select2-container--focus .select2-dropdown--above {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['devicer' . '_' . $scheme . '_border']) . "
	}

	{$rule}.cmsmasters_product {
		-webkit-box-shadow:inset 0px 0px 0px 1px rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_border']) . ", 1);
		-moz-box-shadow:inset 0px 0px 0px 1px rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_border']) . ", 1);
		box-shadow:inset 0px 0px 0px 1px rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_border']) . ", 1);
	}
	/* Finish Borders Color */
	
	
	/* Start Secondary Color */
	{$rule}.comment-form-rating .stars > span a:hover,
	{$rule}.cmsmasters_star_rating .cmsmasters_star_color_wrap,
	{$rule}.comment-form-rating .stars > span a.active {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_secondary']) . "
	}
	
	
	
	 {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_secondary']) . "
	}
	
	 {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_secondary']) . "
	}
	
	/* Finish Secondary Color */

	/* Start Custom Shadow */
	{$rule}.cmsmasters_product:hover {
		box-shadow:0px 0px 20px 1px rgba(0,0,0,0.1);
	}
	/* Finish Custom Shadow */

/***************** Finish {$title} WooCommerce Color Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('devicer_theme_colors_secondary_filter', 'devicer_woocommerce_colors');

