<?php
// SNS Upsell Product
add_shortcode('sns_woo_upsell_products', 'sns_woo_upsell_products_template');
add_action('vc_after_init', 'sns_woo_upsell_products_settings');
function sns_woo_upsell_products_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('sns_woo_upsell_products'))
        include $template;
    return ob_get_clean();
}
function sns_woo_upsell_products_settings() {
	$extra_class = mbstore_extra_class();
	vc_map( array(
		"name" => esc_html__("SNS Woo Upsell Products",'mbstore-shortcodes'),
		"base" => "sns_woo_upsell_products",
		"icon" => "sns_icon_woo_upsell_products",
		"class" => "sns_woo_upsell_products",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Display Upsell products. Just applies in Product Page",'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"admin_label" => true,
				"value" =>  esc_html__("Upsell Products", 'mbstore-shortcodes'),
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}