<?php
// SNS Info Box
add_shortcode('sns_loginregister', 'mbstore_loginregistertemplate');
add_action('vc_after_init', 'mbstore_loginregistersettings');
function mbstore_loginregistertemplate($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_loginregister'))
        include $template;
    return ob_get_clean();
}
function mbstore_loginregistersettings() {
	$extra_class = mbstore_extra_class();
    vc_map( array(
		"name"  => esc_html__("SNS Login and Register", 'mbstore-shortcodes'),
		"base" => "sns_loginregister",
		"show_settings_on_create" => true ,
		"is_container" => false ,
		"icon" => "vc_icon_snstheme",
		"class" => "vc_icon_snstheme",
		"content_element" => true ,
		"category" => esc_html__('MBStore', 'mbstore-shortcodes'),
		'description' => esc_html__( 'Contain login, register link, welcome text,....', 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Want to use welcome text", 'mbstore-shortcodes'),
				"param_name" => "welcome_text",
				"value" => "",
				'description' => __( 'Example: Hello/Hi/Welcome...', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Login text link", 'mbstore-shortcodes'),
				"param_name" => "login_text" ,
				"description" => esc_html__("Example: Login", 'mbstore-shortcodes'),
				"value" => esc_html__("Login", 'mbstore-shortcodes')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Want to use seperator between Login and Register?", 'mbstore-shortcodes'),
				"param_name" => "seperator",
				"value" => esc_html__("|",'mbstore-shortcodes'),
				'description' => __( 'Example: or', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Register text link", 'mbstore-shortcodes'),
				"param_name" => "register_text" ,
				"description" => esc_html__("Example: Sign up", 'mbstore-shortcodes'),
				"value" => esc_html__("Register", 'mbstore-shortcodes')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Logout text link", 'mbstore-shortcodes'),
				"param_name" => "logout_text" ,
				"description" => esc_html__("Example: Logout", 'mbstore-shortcodes'),
				"value" => esc_html__("Logout", 'mbstore-shortcodes')
			),
			$extra_class,
			vc_map_add_css_animation(),
		)
	));
}