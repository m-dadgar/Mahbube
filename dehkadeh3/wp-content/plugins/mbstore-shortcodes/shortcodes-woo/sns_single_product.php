<?php
// SNS Product
add_shortcode('sns_single_product', 'mbstore_single_product_template');
add_action('vc_after_init', 'mbstore_single_product_settings');
function mbstore_single_product_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('sns_single_product'))
        include $template;
    return ob_get_clean();
}
function mbstore_single_product_settings() {
	$extra_class = mbstore_extra_class();
	$woocat_value = mbstore_woo_cat();
	// Autocomplete product
    if ( class_exists('Vc_Vendor_Woocommerce') ){
        $mbstore_vcwoo = 'Vc_Vendor_Woocommerce';
        add_filter( 'vc_autocomplete_sns_single_product_ids_callback', array(&$mbstore_vcwoo, 'productIdAutocompleteSuggester',), 10, 1 ); // Get suggestion(find). Must return an array
        add_filter( 'vc_autocomplete_sns_single_product_ids_render', array(&$mbstore_vcwoo, 'productIdAutocompleteRender',), 10, 1 ); // Render exact product. Must return an array (label,value)
    }
	vc_map( array(
		"name" => esc_html__("SNS Single Product",'mbstore-shortcodes'),
		"base" => "sns_single_product",
		"icon" => "sns_icon_single_product",
		"class" => "sns_single_product",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Show product via id, name",'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Use label?", 'mbstore-shortcodes'),
				"param_name" => "label",
				"value" => esc_html__("Hot product",'mbstore-shortcodes'),
				'description' => __( 'Example: Hot product', 'mbstore-shortcodes' ),
			),
			array(
				'type' => 'autocomplete',
				'heading' => __( 'Select special products', 'mbstore-shortcodes' ),
				'param_name' => 'ids',
				'settings' => array(
					'multiple' => true,
					'sortable' => true,
					'unique_values' => true,
					// In UI show results except selected. NB! You should manually check values in backend
				),
				'save_always' => true,
				'description' => __( 'You can typing id or product name to input form. And should select products are On sale and Manage stock', 'mbstore-shortcodes' ),
			),
			// array(
			// 	"type" => "checkbox",
			// 	"class" => "",
			// 	"heading" => esc_html__("Show Product Images?",'mbstore-shortcodes'),
			// 	"param_name" => "show_image",
			// ),
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}