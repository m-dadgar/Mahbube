<?php
// SNS Store Info
class WPBakeryShortCode_SNS_Store_Info extends WPBakeryShortCode {
	function __construct( $settings ) {
		parent::__construct( $settings );
	}
}
add_shortcode('sns_store_info', 'mbstore_store_info_template');
add_action('vc_after_init', 'mbstore_store_info_settings');
function mbstore_store_info_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_store_info'))
        include $template;
    return ob_get_clean();
}
function mbstore_store_info_settings() {
	$extra_class = mbstore_extra_class();
	vc_map( array(
		"name"  => esc_html__("SNS Store Info", 'mbstore-shortcodes'),
		"base" => "sns_store_info",
		"show_settings_on_create" => true ,
		"is_container" => false ,
		"icon" => "vc_icon_snstheme",
		"class" => "vc_icon_snstheme",
		"content_element" => true ,
		"category" => esc_html__('MBStore', 'mbstore-shortcodes'),
		'description' => esc_html__( 'Store info: Address, Phone, Email, ...', 'mbstore-shortcodes' ),
		"params" => array(
			array(
		      "type" => "attach_image",
		      "heading" => esc_html__("Logo Store", 'mbstore-shortcodes'),
		      "param_name" => "logo_store",
		    ),
			array(
				"type" => "textarea_html",
				"heading" => esc_html__("Short Intro", 'mbstore-shortcodes'),
				'holder' => 'p',
				"param_name" => "short_intro"
			),
		    array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon for Address', 'mbstore-shortcodes' ),
				'param_name' => 'icon_address',
				'value' => 'fa fa-adjust',
				'settings' => array(
					'emptyIcon' => false,
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Address", 'mbstore-shortcodes'),
				"param_name" => "address"
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon for Phone Number', 'mbstore-shortcodes' ),
				'param_name' => 'icon_phone',
				'value' => 'fa fa-adjust',
				'settings' => array(
					'emptyIcon' => false,
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Phone Number 1", 'mbstore-shortcodes'),
				"param_name" => "phone"
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Phone Number 2", 'mbstore-shortcodes'),
				"param_name" => "phone2"
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon for Email', 'mbstore-shortcodes' ),
				'param_name' => 'icon_email',
				'value' => 'fa fa-adjust',
				'settings' => array(
					'emptyIcon' => false,
					'iconsPerPage' => 4000,
				),
				'description' => esc_html__( 'Select icon from library.', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Email 1", 'mbstore-shortcodes'),
				"param_name" => "email"
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Email 2", 'mbstore-shortcodes'),
				"param_name" => "email2"
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	));
}