<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
wp_reset_postdata();
if (mbstore_themeoption('woo_upsells') == 1 && mbstore_layouttype('layouttype', 'm') != 'm' ) {
	$output = '';
	$atts = vc_map_get_attributes( 'sns_woo_upsell_products', $atts );
	extract( $atts );
	$class = 'sns-woo-upsell-products';
	$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
	$class .= ' '.esc_attr( mbstore_getCSSAnimation( $css_animation ) );
	$output = '<div class="' . esc_attr( $class ) . '">';
	ob_start();
		global $product, $woocommerce_loop;
		if ( ! $product ) {
			return;
		}
		$limit = '-1'; $columns = 4; $orderby = 'rand'; $order = 'desc';
		// Handle the legacy filter which controlled posts per page etc.
		$args = apply_filters( 'woocommerce_upsell_display_args', array(
			'posts_per_page' => $limit,
			'orderby'        => $orderby,
			'columns'        => $columns,
		) );
		$woocommerce_loop['name']    = 'up-sells';
		$woocommerce_loop['columns'] = apply_filters( 'woocommerce_upsells_columns', isset( $args['columns'] ) ? $args['columns'] : $columns );
		$orderby                     = apply_filters( 'woocommerce_upsells_orderby', isset( $args['orderby'] ) ? $args['orderby'] : $orderby );
		$limit                       = apply_filters( 'woocommerce_upsells_total', isset( $args['posts_per_page'] ) ? $args['posts_per_page'] : $limit );

		// Get visble upsells then sort them at random, then limit result set.
		$upsells = wc_products_array_orderby( array_filter( array_map( 'wc_get_product', $product->get_upsell_ids() ), 'wc_products_array_filter_visible' ), $orderby, $order );
		$upsells = $limit > 0 ? array_slice( $upsells, 0, $limit ) : $upsells;

		wc_get_template( 'single-product/up-sells-list.php', array(
			'upsells' => $upsells,

			// Not used now, but used in previous version of up-sells.php.
			'posts_per_page' => $limit,
			'orderby'        => $orderby,
			'columns'        => $columns,
		) );
	$output .= ob_get_clean();
	$output .= '</div>';
	echo $output;
}
?>