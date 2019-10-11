<?php
// SNS Info Box
add_shortcode('sns_info_inline', 'mbstore_info_inline_template');
add_action('vc_after_init', 'mbstore_info_inline_settings');
function mbstore_info_inline_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_info_inline'))
        include $template;
    return ob_get_clean();
}
function mbstore_info_inline_settings() {
	$extra_class = mbstore_extra_class();
    vc_map( array(
		"name"  => esc_html__("SNS Info Inline", 'mbstore-shortcodes'),
		"base" => "sns_info_inline",
		"show_settings_on_create" => true ,
		"is_container" => false ,
		"icon" => "vc_icon_snstheme",
		"class" => "vc_icon_snstheme",
		"content_element" => true ,
		"category" => esc_html__('MBStore', 'mbstore-shortcodes'),
		'description' => esc_html__( 'Contain: icon, title, link, ... and display inline', 'mbstore-shortcodes' ),
		"params" => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Style', 'mbstore-shortcodes' ),
				'value' => array(
					esc_html__( 'Default', 'mbstore-shortcodes' ) => '',
					esc_html__( 'Social', 'mbstore-shortcodes' ) => 'social',
					esc_html__( 'Social Rounded', 'mbstore-shortcodes' ) => 'social_rounded',
				),
				'param_name' => 'style',
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Use icon?', 'mbstore-shortcodes' ),
				'param_name' => 'use_icon',
				'description' => __( 'Use icon in content', 'mbstore-shortcodes' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'mbstore-shortcodes' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-adjust', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'use_icon',
					'value' => 'true',
				),
				'description' => esc_html__( 'Select icon from library.', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Font size for Icon", 'mbstore-shortcodes'),
				"param_name" => "icon_fontsize",
				"value" => esc_html__("18px",'mbstore-shortcodes'),
				'dependency' => array(
					'element' => 'use_icon',
					'value' => 'true',
				),
				'description' => __( 'Example: 18px', 'mbstore-shortcodes' ),
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Use label?', 'mbstore-shortcodes' ),
				'param_name' => 'use_label',
				'description' => __( 'Use label in content', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Label", 'mbstore-shortcodes'),
				"param_name" => "label",
				"value" => esc_html__("Your label here ...",'mbstore-shortcodes'),
				'dependency' => array(
					'element' => 'use_label',
					'value' => 'true',
				),
				"admin_label" => true 
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Use link?', 'mbstore-shortcodes' ),
				'param_name' => 'use_link',
				'description' => __( 'Use link in content', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Link", 'mbstore-shortcodes'),
				"param_name" => "link" ,
				"description" => esc_html__("Enter the  link. Do't forget to include http:// ", 'mbstore-shortcodes'),
				'dependency' => array(
					'element' => 'use_link',
					'value' => 'true',
				),
				"value" => esc_html__("http://", 'mbstore-shortcodes')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Link type', 'mbstore-shortcodes' ),
				'value' => array(
					esc_html__( 'Default', 'mbstore-shortcodes' ) => '0',
					esc_html__( 'Use mailto:', 'mbstore-shortcodes' ) => '1',
					esc_html__( 'Use tel:', 'mbstore-shortcodes' ) => '2',
				),
				'dependency' => array(
					'element' => 'use_link',
					'value' => 'true',
				),
				'param_name' => 'href_type',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Link target', 'mbstore-shortcodes' ),
				'value' => array(
					esc_html__( 'Same window', 'mbstore-shortcodes' ) => '_self',
					esc_html__( 'New window', 'mbstore-shortcodes' ) => '_blank',
				),
				'dependency' => array(
					'element' => 'use_link',
					'value' => 'true',
				),
				'param_name' => 'target',
			),
			$extra_class,
			vc_map_add_css_animation(),
		)
	));
}