<?php
// SNS Product
add_shortcode('sns_products', 'mbstore_products_template');
add_action('vc_after_init', 'mbstore_products_settings');
function mbstore_products_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('sns_products'))
        include $template;
    return ob_get_clean();
}
function mbstore_products_settings() {
	$extra_class = mbstore_extra_class();
	$woocat_value = mbstore_woo_cat();
	vc_map( array(
		"name" => esc_html__("SNS Products",'mbstore-shortcodes'),
		"base" => "sns_products",
		"icon" => "sns_icon_products",
		"class" => "sns_products",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "WooCommerce products",'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"admin_label" => true,
				"value" =>  esc_html__("New Products", 'mbstore-shortcodes'),
			),
			array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link) to view all', 'mbstore-shortcodes' ),
				'param_name' => 'link_viewall',
				'description' => __( 'Add link view all in right box', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Want to show sub text?",'mbstore-shortcodes'),
				"param_name" => "sub_text",
				"admin_label" => true,
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Box style",'mbstore-shortcodes'),
				"param_name" => "box_style",
				"admin_label" => true,
				"value" => array(
					esc_html__("Blank",'mbstore-shortcodes') => 'blank',
					esc_html__("Style 1",'mbstore-shortcodes') => '1',
					esc_html__("Style 2",'mbstore-shortcodes') => '2',
					esc_html__("Style 3",'mbstore-shortcodes') => '3',
					esc_html__("Style 4",'mbstore-shortcodes') => '4',
					esc_html__("Style 5",'mbstore-shortcodes') => '5',
				),
				"description" => esc_html__("This option define some style for box as title, navigation, paging, ...", 'mbstore-shortcodes')
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"value" => $woocat_value,
				"heading" => esc_html__("Select Category",'mbstore-shortcodes'),
				"param_name" => "lit_cat",
				"description" => esc_html__("If you don't select any category, It mean is selected all category", 'mbstore-shortcodes')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Order By",'mbstore-shortcodes'),
				"param_name" => "orderby",
				"value" => array(
					esc_html__('Latest products', 'mbstore-shortcodes') => "recent",
					esc_html__('Best seller products', 'mbstore-shortcodes') => "best_selling",
					esc_html__('Top rated products', 'mbstore-shortcodes') => "top_rate",
					esc_html__('On sale products', 'mbstore-shortcodes') => "on_sale",
					esc_html__('Hot deal', 'mbstore-shortcodes') => "hot_deal",
					esc_html__('Featured products', 'mbstore-shortcodes') => "featured_product",
					esc_html__('Recent review', 'mbstore-shortcodes') => "recent_review",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Mode View",'mbstore-shortcodes'),
				"param_name" => "modeview",
				"admin_label" => true,
				"value" => array(
					esc_html__("Gird",'mbstore-shortcodes') => '1',
					esc_html__("List",'mbstore-shortcodes') => '2',
				),
				"description" => esc_html__("Mode View", 'mbstore-shortcodes')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Thumbnail type",'mbstore-shortcodes'),
				"param_name" => "thumb_type",
				"value" => array(
					esc_html__("Shop Thumbnail",'mbstore-shortcodes') => '',
					esc_html__("MBStore 70x84 Thumbnail",'mbstore-shortcodes') => '7084',
					esc_html__("MBStore 83x100 Thumbnail",'mbstore-shortcodes') => '83100',
					esc_html__("MBStore 170x207 Thumbnail",'mbstore-shortcodes') => '170207',
				),
				'dependency' => array(
					'element' => 'modeview',
					'value' => '2',
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Use Navigation",'mbstore-shortcodes'),
				"param_name" => "use_nav",
				"value" => array(
					esc_html__("Yes",'mbstore-shortcodes') => '1',
					esc_html__("No",'mbstore-shortcodes') => '2',
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Use Paging",'mbstore-shortcodes'),
				"param_name" => "use_paging",
				"value" => array(
					esc_html__("No",'mbstore-shortcodes') => '2',
					esc_html__("Yes",'mbstore-shortcodes') => '1',
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
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Product number limit",'mbstore-shortcodes'),
				"param_name" => "number_limit",
				"value" => "10",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number Row per Column",'mbstore-shortcodes'),
				"param_name" => "number_row",
				"value" => "1"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number Column display screen Desktop",'mbstore-shortcodes'),
				"param_name" => "number_desktop",
				"value" => "5"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number Column display screen Tablet Landscape",'mbstore-shortcodes'),
				"param_name" => "number_tablet",
				"value" => "4"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number Column display screen Tablet Portrait",'mbstore-shortcodes'),
				"param_name" => "number_tabletp",
				"value" => "4"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number Column display Mobile Landscape",'mbstore-shortcodes'),
				"param_name" => "number_mobilel",
				"value" => "2"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number Column display screen Mobile Portrait",'mbstore-shortcodes'),
				"param_name" => "number_mobilep",
				"value" => "1"
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}