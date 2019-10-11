<?php 
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.1
 * 
 * WooCommerce Template Functions
 * Created by CMSMasters
 * 
 */


/* WooCommerce Dynamic Cart */
function devicer_woocommerce_cart_dropdown($cmsmasters_option) {
	global $woocommerce;
	
	
	$cart_count = $woocommerce->cart->get_cart_contents_count();
	$cart_total = $woocommerce->cart->get_cart_subtotal();
	
	
	if (
		$cmsmasters_option['devicer' . '_header_styles'] != 'c_nav' &&
		isset($cmsmasters_option['devicer' . '_woocommerce_cart_dropdown']) &&
		$cmsmasters_option['devicer' . '_woocommerce_cart_dropdown']
	) {
		echo '<div class="cmsmasters_dynamic_cart_wrap">' . 
			'<div class="cmsmasters_dynamic_cart">' . 
				'<a href="' . esc_js("javascript:void(0)") . '" class="cmsmasters_dynamic_cart_button">' . 
					'<span class="count_wrap cmsmasters_icon_custom_cart_1">' . 
						'<span class="count cmsmasters_dynamic_cart_count">' . esc_html($cart_count) . '</span>' .
					'</span>' . 
				'</a>' . 
				'<div class="cmsmasters_cart_info"><p>'.esc_html__('Your Cart', 'devicer') .'</p><p class="cmsmasters_subtotal_shop">'. $woocommerce->cart->get_cart_subtotal() .'</p></div>'.
				'<div class="widget_shopping_cart_content"></div>' . 
			'</div>' . 
		'</div>';
	}
}

add_action('cmsmasters_after_logo', 'devicer_woocommerce_cart_dropdown');


/* WooCommerce Dynamic Cart */
function devicer_bottom_woocommerce_cart_dropdown($cmsmasters_option) {
	global $woocommerce;
	
	
	$cart_count = $woocommerce->cart->get_cart_contents_count();
	
	
	if ($cmsmasters_option['devicer' . '_header_styles'] == 'c_nav') {
		echo '<div class="cmsmasters_dynamic_cart_wrap">' . 
			'<div class="cmsmasters_dynamic_cart">' . 
				'<a href="' . esc_js("javascript:void(0)") . '" class="cmsmasters_dynamic_cart_button">' . 
					'<span class="count_wrap cmsmasters_icon_custom_cart_1">' . 
						'<span class="count">' . esc_html($cart_count) . '</span>' . 
					'</span>' . 
				'</a>' . 
				'<div class="widget_shopping_cart_content"></div>' . 
			'</div>' . 
		'</div>';
	}
}

add_action('cmsmasters_after_header_bot', 'devicer_bottom_woocommerce_cart_dropdown');

/* Woocommerce Dynamic cart count update after ajax */
function devicer_woocommerce_cart_dropdown_count_update($fragments) {
	global $woocommerce;
	
	
	ob_start();
	
	
	echo '<span class="count cmsmasters_dynamic_cart_count">' . $woocommerce->cart->get_cart_contents_count() . '</span>';
	
	$fragments['span.cmsmasters_dynamic_cart_count'] = ob_get_clean();
	
	
	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'devicer_woocommerce_cart_dropdown_count_update');

/* Woocommerce Dynamic cart subtotal update after ajax */
function devicer_woocommerce_header_subtotal_count($dynamic_subtotal) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<span><?php echo wp_kses_post($woocommerce->cart->get_cart_subtotal()); ?></span>
	<?php
	
	$dynamic_subtotal['.cmsmasters_subtotal_shop span'] = ob_get_clean();
	
	return $dynamic_subtotal;
}

add_filter('woocommerce_add_to_cart_fragments', 'devicer_woocommerce_header_subtotal_count');


/* WooCommerce Header Cart */
function devicer_woocommerce_header_cart_link() {
	global $woocommerce;
	
	
	$cart_count = $woocommerce->cart->get_cart_contents_count();
	
	
	echo '<a href="' . esc_url(wc_get_cart_url()) . '" class="cmsmasters_header_cart_link">' . 
		'<span class="count_wrap cmsmasters_icon_custom_cart_1">' . 
			'<span class="count">' . esc_html($cart_count) . '</span>' . 
		'</span>' . 
	'</a>';
}


/* WooCommerce Add to Cart Button */
function devicer_woocommerce_add_to_cart_button() {
	global $woocommerce, 
		$product;
	
	
	if ( 
		$product->is_purchasable() && 
		$product->is_type( 'simple' ) && 
		$product->is_in_stock() 
	) {
		echo '<a href="' . esc_url($product->add_to_cart_url()) . '" data-product_id="' . esc_attr($product->get_id()) . '" data-product_sku="' . esc_attr($product->get_sku()) . '" class="cmsmasters_product_button add_to_cart_button cmsmasters_add_to_cart_button product_type_simple ajax_add_to_cart" title="' . esc_attr__('Add to Cart', 'devicer') . '">' . 
			'<span>' . esc_html__('Add to Cart', 'devicer') . '</span>' . 
		'</a>' . 
		'<a href="' . esc_url(wc_get_cart_url()) . '" class="cmsmasters_product_button added_to_cart wc-forward" title="' . esc_attr__('View Cart', 'devicer') . '">' . 
			'<span>' . esc_html__('View Cart', 'devicer') . '</span>' . 
		'</a>';
	}
}


/* WooCommerce Rating */
function devicer_woocommerce_rating($icon_trans = '', $icon_color = '', $in_review = false, $comment_id = '', $show = true) {
	global $product;
	
	
	if (get_option( 'woocommerce_enable_review_rating') === 'no') {
		return;
	}
	
	
	$rating = (($in_review) ? intval(get_comment_meta($comment_id, 'rating', true)) : ($product->get_average_rating() ? $product->get_average_rating() : '0'));
	
	$itemtype = $in_review ? 'Rating' : 'AggregateRating';
	
	
	$out = "
<div class=\"cmsmasters_star_rating\" itemscope itemtype=\"http://schema.org/{$itemtype}\" title=\"" . sprintf(esc_html__('Rated %s out of 5', 'devicer'), $rating) . "\">
<div class=\"cmsmasters_star_trans_wrap\">
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
</div>
<div class=\"cmsmasters_star_color_wrap\" data-width=\"width:" . (($rating / 5) * 100) . "%\">
	<div class=\"cmsmasters_star_color_inner\">
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
	</div>
</div>
<span class=\"rating dn\"><strong itemprop=\"ratingValue\">" . esc_html($rating) . "</strong> " . esc_html__('out of 5', 'devicer') . "</span>
</div>
";
	
	
	if ($show) {
		echo devicer_return_content($out);
	} else {
		return $out;
	}
}


/* WooCommerce Price Format */
function devicer_woocommerce_price_format($format, $currency_pos) {
	$format = '%2$s<span>%1$s</span>';

	switch ( $currency_pos ) {
		case 'left' :
			$format = '<span>%1$s</span>%2$s';
		break;
		case 'right' :
			$format = '%2$s<span>%1$s</span>';
		break;
		case 'left_space' :
			$format = '<span>%1$s&nbsp;</span>%2$s';
		break;
		case 'right_space' :
			$format = '%2$s<span>&nbsp;%1$s</span>';
		break;
	}
	
	return $format;
}
 
add_action('woocommerce_price_format', 'devicer_woocommerce_price_format', 1, 2);

/* WooCommerce Sale Flash */
function devicer_woocommerce_sale_flash_out($content) {
	return '<div class="cmsmasters_product_sale_wrap">'. $content .'</div>';
}
add_filter('woocommerce_sale_flash', 'devicer_woocommerce_sale_flash_out');

