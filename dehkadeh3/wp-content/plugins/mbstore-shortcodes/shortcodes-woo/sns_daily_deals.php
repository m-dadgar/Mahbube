<?php
// SNS Product
add_shortcode('sns_daily_deals', 'mbstore_daily_deals_template');
add_action('vc_after_init', 'mbstore_daily_deals_settings');
function mbstore_daily_deals_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('sns_daily_deals'))
        include $template;
    return ob_get_clean();
}
function mbstore_daily_deals_settings() {
	$extra_class = mbstore_extra_class();
	$woocat_value = mbstore_woo_cat();
	// Autocomplete product
    if ( class_exists('Vc_Vendor_Woocommerce') ){
        $mbstore_vcwoo = 'Vc_Vendor_Woocommerce';
        add_filter( 'vc_autocomplete_sns_daily_deals_ids_callback', array(&$mbstore_vcwoo, 'productIdAutocompleteSuggester',), 10, 1 ); // Get suggestion(find). Must return an array
        add_filter( 'vc_autocomplete_sns_daily_deals_ids_render', array(&$mbstore_vcwoo, 'productIdAutocompleteRender',), 10, 1 ); // Render exact product. Must return an array (label,value)
    }
	vc_map( array(
		"name" => esc_html__("SNS Daily Deals",'mbstore-shortcodes'),
		"base" => "sns_daily_deals",
		"icon" => "sns_icon_products",
		"class" => "sns_daily_deals",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Display sale products with count down",'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"admin_label" => true,
				"value" =>  esc_html__("Daily deals", 'mbstore-shortcodes'),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Deal style",'mbstore-shortcodes'),
				"param_name" => "style",
				"admin_label" => true,
				"value" => array(
					esc_html__("Display time coutdown for box",'mbstore-shortcodes') => '1',
					esc_html__("Dispplay time count down for each product",'mbstore-shortcodes') => '2',
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Time to countdown",'mbstore-shortcodes'),
				"param_name" => "time_countdown",
				"admin_label" => true,
				"value" =>  esc_html__("2018/12/08", 'mbstore-shortcodes'),
				'description' => __( 'Date format is: Y/m/d. Example: 2018/12/08', 'mbstore-shortcodes' ),
				'dependency' => array(
					'element' => 'style',
					'value' => '1',
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Display products via",'mbstore-shortcodes'),
				"param_name" => "products_via",
				"admin_label" => true,
				"value" => array(
					esc_html__("Auto query to database",'mbstore-shortcodes') => '1',
					esc_html__("Select by manually",'mbstore-shortcodes') => '2',
				),
			),
			array(
				'type' => 'autocomplete',
				'heading' => __( 'Select products', 'mbstore-shortcodes' ),
				'param_name' => 'ids',
				'settings' => array(
					'multiple' => true,
					'sortable' => true,
					'unique_values' => true,
					// In UI show results except selected. NB! You should manually check values in backend
				),
				'save_always' => true,
				'description' => __( 'You can typing id or product name to input form', 'mbstore-shortcodes' ),
				'dependency' => array(
					'element' => 'products_via',
					'value' => '2',
				),
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"value" => $woocat_value,
				"heading" => esc_html__("Select Category",'mbstore-shortcodes'),
				"param_name" => "lit_cat",
				"description" => esc_html__("If you don't select any category, It mean is selected all category", 'mbstore-shortcodes'),
				'dependency' => array(
					'element' => 'products_via',
					'value' => '1',
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
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Product number limit",'mbstore-shortcodes'),
				"param_name" => "number_limit",
				"value" => "10",
				'dependency' => array(
					'element' => 'products_via',
					'value' => '1',
				),
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
				"value" => "1"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number Column display screen Tablet Landscape",'mbstore-shortcodes'),
				"param_name" => "number_tablet",
				"value" => "1"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number Column display screen Tablet Portrait",'mbstore-shortcodes'),
				"param_name" => "number_tabletp",
				"value" => "1"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number Column display Mobile Landscape",'mbstore-shortcodes'),
				"param_name" => "number_mobilel",
				"value" => "1"
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