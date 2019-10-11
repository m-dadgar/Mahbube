<?php
// SNS Shopby Categories
add_shortcode('sns_shopby_categories', 'mbstore_shopby_categories_template');
add_action('vc_after_init', 'mbstore_shopby_categories_settings');
function mbstore_shopby_categories_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('sns_shopby_categories'))
        include $template;
    return ob_get_clean();
}
function mbstore_shopby_categories_settings() {
	$extra_class = mbstore_extra_class();
	$woocat_value = mbstore_woo_cat();
	vc_map( array(
		"name" => esc_html__("SNS Shop by Categories",'dsk-shortcodes'),
		"base" => "sns_shopby_categories",
		"icon" => "sns_icon_products",
		"class" => "sns_shopby_categories",
		"category" => esc_html__("MBStore",'dsk-shortcodes'),
		"description" => esc_html__( "Display categories shop",'dsk-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'dsk-shortcodes'),
				"param_name" => "title",
				"admin_label" => true,
				"value" =>  esc_html__("Your Main Category Name", 'dsk-shortcodes'),
			),
			array(
		      "type" => "attach_image",
		      "heading" => esc_html__("Image for this box - main category", 'dsk-shortcodes'),
		      "param_name" => "cat_image",
		    ),
			array(
				"type" => "checkbox",
				"class" => "",
				"value" => $woocat_value,
				"heading" => esc_html__("Select Category List",'dsk-shortcodes'),
				"param_name" => "lit_cat",
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Main category link', 'dsk-shortcodes' ),
				'param_name' => 'link',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Want to use link View All?', 'dsk-shortcodes' ),
				'param_name' => 'viewall',
				"value" => array(
					esc_html__("Yes",'mbstore-shortcodes') => '1',
					esc_html__("No",'mbstore-shortcodes') => '2',
				),
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}