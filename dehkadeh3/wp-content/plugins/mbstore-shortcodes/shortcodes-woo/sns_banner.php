<?php
// SNS Banner
add_shortcode('sns_banner', 'mbstore_banner_template');
add_action('vc_after_init', 'mbstore_banner_settings');
function mbstore_banner_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('sns_banner'))
        include $template;
    return ob_get_clean();
}
function mbstore_banner_settings() {
	$extra_class = mbstore_extra_class();
	$categories = mbstore_woo_cat(0);
	$woocat_value_drop =  array();
	mbstore_woo_cat_level(0, 0, $categories, 0, $woocat_value_drop);
	vc_map( array(
		"name" => esc_html__("SNS Banner",'mbstore-shortcodes'),
		"base" => "sns_banner",
		"icon" => "sns_icon_banner",
		"class" => "sns_banner",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Banner for Product WooCommerce",'mbstore-shortcodes' ),
		"params" => array(
			array(
		      "type" => "attach_image",
		      "heading" => esc_html__("Banner image", 'mbstore-shortcodes'),
		      "param_name" => "banner_image",
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
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Want to use custom title?",'mbstore-shortcodes'),
				"param_name" => "custom_title",
				"value" =>  "",
				'dependency' => array(
					'element' => 'style',
					'value' => array('2'),
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Link's label",'mbstore-shortcodes'),
				"param_name" => "links_label",
				"value" =>  esc_html__("View all", 'mbstore-shortcodes'),
				'dependency' => array(
					'element' => 'style',
					'value' => array('1', '2'),
				),
			),
			array(
				"type" => "colorpicker",
				"value" => "",
				"heading" => esc_html__("Color Title & Link label", 'mbstore-shortcodes'),
				"param_name" => "text_color",
				'dependency' => array(
					'element' => 'style',
					'value' => array('2'),
				),
		    ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Link type",'mbstore-shortcodes'),
				"param_name" => "link_type",
				"value" => array(
					esc_html__('None', 'mbstore-shortcodes') => "",
					esc_html__('Custom', 'mbstore-shortcodes') => "1",
					esc_html__('Category', 'mbstore-shortcodes') => "2",
				),
			),
			array(
				"type" => "dropdown",
				'multiple' => true,
				"class" => "",
				"value" => $woocat_value_drop,
				"param_name" => "cat",
				'dependency' => array(
					'element' => 'link_type',
					'value' => array('2'),
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Custom link",'mbstore-shortcodes'),
				"param_name" => "custom_link",
				"value" =>  "http://",
				'dependency' => array(
					'element' => 'link_type',
					'value' => array('1'),
				),
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}