<?php
// SNS Cat Info
add_shortcode('sns_cat_info', 'mbstore_cat_info_template');
add_action('vc_after_init', 'mbstore_cat_info_settings');
function mbstore_cat_info_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('sns_cat_info'))
        include $template;
    return ob_get_clean();
}
function mbstore_cat_info_settings() {
	$extra_class = mbstore_extra_class();
	$categories = mbstore_woo_cat(0);
	$woocat_value_drop =  array();
	mbstore_woo_cat_level(0, 0, $categories, 0, $woocat_value_drop);
	vc_map( array(
		"name" => esc_html__("SNS Cat Info",'mbstore-shortcodes'),
		"base" => "sns_cat_info",
		"icon" => "sns_icon_cat_info",
		"class" => "sns_cat_info",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "WooCommerce category info",'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "dropdown",
				'multiple' => true,
				"class" => "",
				"value" => $woocat_value_drop,
				"param_name" => "cat"
			),
			array(
		      "type" => "attach_image",
		      "heading" => esc_html__("Image for Category", 'mbstore-shortcodes'),
		      "param_name" => "cat_image",
		    ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style",'mbstore-shortcodes'),
				"param_name" => "style",
				"value" => array(
					esc_html__('Style 1', 'mbstore-shortcodes') => "1",
					esc_html__('Style 2', 'mbstore-shortcodes') => "2",
					esc_html__('Style 3', 'mbstore-shortcodes') => "3",
					esc_html__('Style 4', 'mbstore-shortcodes') => "4",
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Custom number",'mbstore-shortcodes'),
				"param_name" => "custom_number",
				"value" =>  "",
				'dependency' => array(
					'element' => 'style',
					'value' => array('1'),
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Align of box",'mbstore-shortcodes'),
				"param_name" => "box_align",
				"value" => array(
					esc_html__('Left', 'mbstore-shortcodes') => "left",
					esc_html__('Center', 'mbstore-shortcodes') => "center",
					esc_html__('Right', 'mbstore-shortcodes') => "right",
				),
				'dependency' => array(
					'element' => 'style',
					'value' => array('1'),
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show product number of Category",'mbstore-shortcodes'),
				"param_name" => "show_prd_num",
				"value" => array(
					esc_html__("Yes",'mbstore-shortcodes') => '1',
					esc_html__("No",'mbstore-shortcodes') => '2',
				),
				'dependency' => array(
					'element' => 'style',
					'value' => array('2', '3'),
				),
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}