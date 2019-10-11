<?php
// SNS More Categories
add_shortcode('sns_more_categories', 'mbstore_more_categories_template');
add_action('vc_after_init', 'mbstore_more_categories_settings');
function mbstore_more_categories_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('sns_more_categories'))
        include $template;
    return ob_get_clean();
}
function mbstore_more_categories_settings() {
	$extra_class = mbstore_extra_class();
	$woocat_value = mbstore_woo_cat();
	vc_map( array(
		"name" => esc_html__("SNS More Categories",'mbstore-shortcodes'),
		"base" => "sns_more_categories",
		"icon" => "sns_icon_products",
		"class" => "sns_more_categories",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Display categories shop",'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"admin_label" => true,
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"value" => $woocat_value,
				"heading" => esc_html__("Select Category",'mbstore-shortcodes'),
				"param_name" => "lit_cat",
			),
			array(
		      "type" => "attach_images",
		      "heading" => esc_html__("Image for Category", 'mbstore-shortcodes'),
		      "param_name" => "icon_cat",
		      'description' => esc_html__( 'Drag and drop image to sort oder. The oder of icon is the same with the oder of category above', 'mbstore-shortcodes' ),
		      'dependency' => array(
					'element' => 'tab_type',
					'value' => '2',
				),
		    ),
		    array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Auto play",'mbstore-shortcodes'),
				"param_name" => "autoplay",
				"value" => array(
					esc_html__("No",'mbstore-shortcodes') => '2',
					esc_html__("Yes",'mbstore-shortcodes') => '1',
				),
				'dependency' => array(
					'element' => 'content_tab_template',
					'value' => '1',
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number item per row to display on Desktop",'mbstore-shortcodes'),
				"param_name" => "number_desktop",
				"admin_label" => true,
				"value" =>  esc_html__("5", 'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number item per row to display on Tablet Landscape",'mbstore-shortcodes'),
				"param_name" => "number_tablet",
				"admin_label" => true,
				"value" =>  esc_html__("3", 'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number item per row to display on Tablet Portrait",'mbstore-shortcodes'),
				"param_name" => "number_tabletp",
				"admin_label" => true,
				"value" =>  esc_html__("2", 'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number item per row to display on Mobile Landscape",'mbstore-shortcodes'),
				"param_name" => "number_mobilel",
				"admin_label" => true,
				"value" =>  esc_html__("2", 'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number item per row to display on Nobile Portrait",'mbstore-shortcodes'),
				"param_name" => "number_mobilep",
				"admin_label" => true,
				"value" =>  esc_html__("1", 'mbstore-shortcodes'),
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}