<?php
// SNS Product/Post Tags
add_shortcode('sns_tags', 'mbstore_tags_template');
add_action('vc_after_init', 'mbstore_tags_settings');
function mbstore_tags_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_woo_template('sns_tags'))
        include $template;
    return ob_get_clean();
}
function mbstore_tags_settings() {
	$extra_class = mbstore_extra_class();
	$tags_woo = mbstore_woo_tags_array();
	vc_map( array(
		"name" => esc_html__("SNS Tags",'mbstore-shortcodes'),
		"base" => "sns_tags",
		"icon" => "sns_icon_tags",
		"class" => "sns_tags",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Display tags of Products/Post",'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"admin_label" => true,
				"value" =>  "",
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Title inline with Tags', 'mbstore-shortcodes' ),
				'param_name' => 'title_inline',
				'value' => array( __( 'Yes', 'mbstore-shortcodes' ) => 'yes' ),
			),
			// array(
			// 	"type" => "textfield",
			// 	"heading" => esc_html__("Separator between tags",'mbstore-shortcodes'),
			// 	"param_name" => "separator",
			// 	"value" => "",
			// ),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Tags Display",'mbstore-shortcodes'),
				"param_name" => "tags_display",
				"value" => array(
					esc_html__('For select', 'mbstore-shortcodes') => "select",
					esc_html__('Query for limit', 'mbstore-shortcodes') => "query",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Tag Taxonomy",'mbstore-shortcodes'),
				"param_name" => "tag_taxonomy",
				"value" => array(
					esc_html__('Post', 'mbstore-shortcodes') => "post_tag",
					esc_html__('Product', 'mbstore-shortcodes') => "product_tag",
				),
				'dependency' => array(
					'element' => 'tags_display',
					'value' => 'query',
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Tag number limit",'mbstore-shortcodes'),
				"param_name" => "number_limit",
				"value" => "10",
				"description" => esc_html__( "The number to query tags for display",'mbstore-shortcodes' ),
				'dependency' => array(
					'element' => 'tags_display',
					'value' => 'query',
				),
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => esc_html__("Tag List",'mbstore-shortcodes'),
				"param_name" => "tag_list",
				"value" => $tags_woo,
				'dependency' => array(
					'element' => 'tags_display',
					'value' => 'select',
				),
			),
			
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}