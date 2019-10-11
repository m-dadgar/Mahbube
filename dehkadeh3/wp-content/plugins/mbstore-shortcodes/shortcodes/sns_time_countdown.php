<?php
// SNS Time Count Down
add_shortcode('sns_time_countdown', 'mbstore_time_countdown_template');
add_action('vc_after_init', 'mbstore_time_countdown_settings');
function mbstore_time_countdown_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_time_countdown'))
        include $template;
    return ob_get_clean();
}
function mbstore_time_countdown_settings() {
	$extra_class = mbstore_extra_class();
	vc_map( array(
		"name"  => esc_html__("SNS Time Count Down", 'mbstore-shortcodes'),
		"base" => "sns_time_countdown",
		"show_settings_on_create" => true ,
		"is_container" => false ,
		"icon" => "vc_icon_snstheme",
		"class" => "vc_icon_snstheme",
		"content_element" => true ,
		"category" => esc_html__('MBStore', 'mbstore-shortcodes'),
		'description' => esc_html__( 'Show time count down', 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Date", 'mbstore-shortcodes'),
				"param_name" => "thedate" ,
				"value" => '2017/10/02',
				'description' => esc_html__( 'The format date is Y/m/d. EX: 2017/10/02', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style",'mbstore-shortcodes'),
				"param_name" => "style",
				"value" => array(
					esc_html__("Style1",'mbstore-shortcodes') => 'style1',
					esc_html__("Style2",'mbstore-shortcodes') => 'style2',
					esc_html__("Style3",'mbstore-shortcodes') => 'style3',
				),
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	));
}