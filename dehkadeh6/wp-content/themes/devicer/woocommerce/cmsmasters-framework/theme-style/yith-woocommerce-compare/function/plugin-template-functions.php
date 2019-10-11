<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Compare Plugin Functions
 * Created by CMSMasters
 * 
 */


/* Yith WooCommerce Compare Button */
function devicer_compare_button($type = '') {
	global $product;
	$product_id = ! is_null( $product ) ? yit_get_prop( $product, 'id', true ) : 0;

	// return if product doesn't exist
	if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
		return;

	$is_button = ! isset( $button_or_link ) || ! $button_or_link ? get_option( 'yith_woocompare_is_button' ) : $button_or_link;

	if ( ! isset( $button_text ) || $button_text == 'default' ) {
		$button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'devicer' ) );
		yit_wpml_register_string( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
		$button_text = yit_wpml_string_translate( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
	}

	printf( '<a href="%s" class="%s cmsmasters_compare_btn" data-product_id="%d" rel="nofollow" title="' . esc_attr__('Compare', 'devicer') . '">%s</a>', devicer_compare_add_product_url( $product_id ), 'compare' . ( $is_button == 'button' ? ' button' : '' ), $product_id, $button_text );
}


/* Yith WooCommerce URL to add the product into the comparison table */
function devicer_compare_add_product_url( $product_id ) {
	$action_add = 'yith-woocompare-add-product';
	$url_args = array(
		'action' => 'asd',
		'id' => $product_id
	);
	return apply_filters( 'yith_woocompare_add_product_url', esc_url_raw( add_query_arg( $url_args ) ), $action_add );
}