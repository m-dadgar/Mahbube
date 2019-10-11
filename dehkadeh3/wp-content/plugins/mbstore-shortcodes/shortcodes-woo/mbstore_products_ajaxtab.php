<?php
// MBStore Product Ajax Tab
add_shortcode('mbstore_products_ajaxtab', 'mbstore_products_ajaxtab_template');
add_action('vc_after_init', 'mbstore_products_ajaxtab_settings');
function mbstore_products_ajaxtab_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('mbstore_products_ajaxtab'))
        include $template;
    return ob_get_clean();
}
function mbstore_products_ajaxtab_settings() {
	$extra_class = mbstore_extra_class();
	$woocat_value = mbstore_woo_cat();
	$categories = mbstore_woo_cat(0);
	$woocat_value_drop =  array();
	mbstore_woo_cat_level(0, 0, $categories, 0, $woocat_value_drop);
	// Autocomplete product
    if ( class_exists('Vc_Vendor_Woocommerce') ){
        $mbstore_vcwoo = 'Vc_Vendor_Woocommerce';
        add_filter( 'vc_autocomplete_mbstore_products_ajaxtab_ids_callback', array(&$mbstore_vcwoo, 'productIdAutocompleteSuggester',), 10, 1 ); // Get suggestion(find). Must return an array
        add_filter( 'vc_autocomplete_mbstore_products_ajaxtab_render', array(&$mbstore_vcwoo, 'productIdAutocompleteRender',), 10, 1 ); // Render exact product. Must return an array (label,value)
    }
	vc_map( array(
		"name" => esc_html__("Products Ajax Tab",'mbstore-shortcodes'),
		"base" => "mbstore_products_ajaxtab",
		"icon" => "icon_mbstore_products_ajaxtab",
		"class" => "mbstore_products_ajaxtab",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Products Ajax Tab",'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"admin_label" => true,
				"value" =>  esc_html__("The title", 'mbstore-shortcodes'),
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
				"heading" => esc_html__("Tab by?",'mbstore-shortcodes'),
				"param_name" => "tab_type",
				"admin_label" => true,
				"value" => array(
					esc_html__("Order by",'mbstore-shortcodes') => '1',
					esc_html__("Category",'mbstore-shortcodes') => '2',
				),
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select tab to display",'mbstore-shortcodes'),
				"param_name" => "orderby_tab",
				"value" => array(
					esc_html__('Latest', 'mbstore-shortcodes') => "recent",
					esc_html__('Best Seller', 'mbstore-shortcodes') => "best_selling",
					esc_html__('Top Rated', 'mbstore-shortcodes') => "top_rate",
					esc_html__('Special Product', 'mbstore-shortcodes') => "on_sale",
					esc_html__('Featured Product', 'mbstore-shortcodes') => "featured_product",
					esc_html__('Recent Review', 'mbstore-shortcodes') => "recent_review",
				),
				"description" => "",
				'dependency' => array(
					'element' => 'tab_type',
					'value' => '1',
				),
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select tab to display",'mbstore-shortcodes'),
				"param_name" => "cat_tab",
				"value" => $woocat_value,
				"description" => "",
				'dependency' => array(
					'element' => 'tab_type',
					'value' => '2',
				),
			),
			array(
		      "type" => "attach_images",
		      "heading" => esc_html__("Want to use Icons for tab?", 'mbstore-shortcodes'),
		      "param_name" => "icon_cat",
		      'description' => esc_html__( 'Drag and drop image to sort oder. The oder of icon is the same with the oder of category above', 'mbstore-shortcodes' ),
		      'dependency' => array(
					'element' => 'tab_type',
					'value' => '2',
				),
		    ),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Want to show tab All Category?",'mbstore-shortcodes'),
				"param_name" => "show_tab_all",
				"value" => array(
					esc_html__('Yes', 'mbstore-shortcodes') => "1",
					esc_html__('No', 'mbstore-shortcodes') => "2",
				),
				'dependency' => array(
					'element' => 'tab_type',
					'value' => '2',
				),
			),
			array(
				'type' => 'vc_link',
				'heading' => __( 'Want use URL (Link) to view all', 'mbstore-shortcodes' ),
				'param_name' => 'link_viewall',
				'description' => __( 'Add link view all in right header box', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "checkbox",
				"value" => $woocat_value,
				"heading" => esc_html__("Choice categories",'mbstore-shortcodes'),
				"param_name" => "cat",
				"description" => esc_html__('If you dont choice, That mean it will query all category','mbstore-shortcodes'),
				'dependency' => array(
					'element' => 'tab_type',
					'value' => '1',
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order by",'mbstore-shortcodes'),
				"param_name" => "orderby",
				"value" => array(
					esc_html__('Latest', 'mbstore-shortcodes') => "recent",
					esc_html__('Best Seller', 'mbstore-shortcodes') => "best_selling",
					esc_html__('Top Rated', 'mbstore-shortcodes') => "top_rate",
					esc_html__('Special Product', 'mbstore-shortcodes') => "on_sale",
					esc_html__('Featured Product', 'mbstore-shortcodes') => "featured_product",
					esc_html__('Recent Review', 'mbstore-shortcodes') => "recent_review",
				),
				'dependency' => array(
					'element' => 'tab_type',
					'value' => '2',
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Template for each tab content",'mbstore-shortcodes'),
				"param_name" => "content_tab_template",
				"admin_label" => true,
				"value" => array(
					esc_html__("Carousel",'mbstore-shortcodes') => '1',
					esc_html__("Grid and Load more button",'mbstore-shortcodes') => '2',
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Box style",'mbstore-shortcodes'),
				"param_name" => "box_style",
				"admin_label" => true,
				"value" => array(
					esc_html__("Style 1",'mbstore-shortcodes') => '1',
					esc_html__("Style 2",'mbstore-shortcodes') => '2',
					esc_html__("Style 3",'mbstore-shortcodes') => '3',
					esc_html__("Style 4",'mbstore-shortcodes') => '4',
					esc_html__("Style 5",'mbstore-shortcodes') => '5',
					esc_html__("Style 6",'mbstore-shortcodes') => '6',
				),
				"description" => esc_html__("This option defined some style for box as title, tabs, navigation, paging, ...", 'mbstore-shortcodes')
			),
			array(
				'type' => 'autocomplete',
				'heading' => __( 'Want to show some special products?', 'mbstore-shortcodes' ),
				'param_name' => 'ids',
				'settings' => array(
					'multiple' => true,
					'sortable' => true,
					'unique_values' => true,
					// In UI show results except selected. NB! You should manually check values in backend
				),
				'save_always' => true,
				'description' => __( 'Special product like sale off product, It has sale price date. You can typing id or product name to input form', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "dropdown",
				'multiple' => true,
				"class" => "",
				"value" => array(
					esc_html__('No Effect', 'mbstore-shortcodes') => "simple-effect",
					esc_html__('fadeIn', 'mbstore-shortcodes') => "fadeIn",
					esc_html__('fadeInUp', 'mbstore-shortcodes') => "fadeInUp",
					esc_html__('fadeInDown', 'mbstore-shortcodes') => "fadeInDown",
					esc_html__('fadeInRight', 'mbstore-shortcodes') => "fadeInRight",
					esc_html__('fadeInLeft', 'mbstore-shortcodes') => "fadeInLeft",
					esc_html__('bounceIn', 'mbstore-shortcodes') => "bounceIn",
					esc_html__('bounceInUp', 'mbstore-shortcodes') => "bounceInUp",
					esc_html__('bounceInDown', 'mbstore-shortcodes') => "bounceInDown",
					esc_html__('bounceInLeft', 'mbstore-shortcodes') => "bounceInLeft",
					esc_html__('bounceInRight', 'mbstore-shortcodes') => "bounceInRight",
					esc_html__('zoomIn', 'mbstore-shortcodes') => "zoomIn",
					esc_html__('zoomInUp', 'mbstore-shortcodes') => "zoomInUp",
					esc_html__('zoomInDown', 'mbstore-shortcodes') => "zoomInDown",
					esc_html__('zoomInLeft', 'mbstore-shortcodes') => "zoomInLeft",
					esc_html__('zoomInRight', 'mbstore-shortcodes') => "zoomInRight",

				),
				"heading" => esc_html__("Effect to show product in tab",'mbstore-shortcodes'),
				"param_name" => "effect",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number product limit for each tab",'mbstore-shortcodes'),
				"param_name" => "number_limit",
				"admin_label" => true,
				"value" =>  esc_html__("16", 'mbstore-shortcodes'),
				'dependency' => array(
					'element' => 'content_tab_template',
					'value' => '1',
				),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number product will show more with each click load more button",'mbstore-shortcodes'),
				"param_name" => "num_showmore",
				"value" => "6",
				'dependency' => array(
					'element' => 'content_tab_template',
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
				"class" => "",
				"heading" => esc_html__("Number Row per Column",'mbstore-shortcodes'),
				"param_name" => "number_row",
				"value" => "1"
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number product per column to display on Desktop",'mbstore-shortcodes'),
				"param_name" => "number_desktop",
				"admin_label" => true,
				"value" =>  esc_html__("5", 'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number product per column to display on Tablet Landscape",'mbstore-shortcodes'),
				"param_name" => "number_tablet",
				"admin_label" => true,
				"value" =>  esc_html__("3", 'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number product per column to display on Tablet Portrait",'mbstore-shortcodes'),
				"param_name" => "number_tabletp",
				"admin_label" => true,
				"value" =>  esc_html__("2", 'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number product per column to display on Mobile Landscape",'mbstore-shortcodes'),
				"param_name" => "number_mobilel",
				"admin_label" => true,
				"value" =>  esc_html__("2", 'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number product per column to display on Nobile Portrait",'mbstore-shortcodes'),
				"param_name" => "number_mobilep",
				"admin_label" => true,
				"value" =>  esc_html__("1", 'mbstore-shortcodes'),
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}