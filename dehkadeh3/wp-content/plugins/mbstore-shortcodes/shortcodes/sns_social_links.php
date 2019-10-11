<?php
// SNS Social Links
class WPBakeryShortCode_SNS_Social_Links extends WPBakeryShortCode {
	function __construct( $settings ) {
		parent::__construct( $settings );
	}
}
add_shortcode('sns_social_links', 'mbstore_social_links_template');
add_action('vc_after_init', 'mbstore_social_links_settings');
function mbstore_social_links_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_social_links'))
        include $template;
    return ob_get_clean();
}
function mbstore_social_links_settings() {
	$extra_class = mbstore_extra_class();
	vc_map( array(
		"name"  => esc_html__("SNS Social Links", 'mbstore-shortcodes'),
		"base" => "sns_social_links",
		"show_settings_on_create" => true ,
		"is_container" => false ,
		"icon" => "vc_icon_snstheme",
		"class" => "vc_icon_snstheme",
		"content_element" => true ,
		"category" => esc_html__('MBStore', 'mbstore-shortcodes'),
		'description' => esc_html__( 'Display link to your social links', 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Label for Follow us", 'mbstore-shortcodes'),
				"param_name" => "label_followus" ,
				"value" => esc_html__("Follow us on:", 'mbstore-shortcodes')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style",'mbstore-shortcodes'),
				"param_name" => "style",
				"value" => array(
					esc_html__("Show name too - rounded",'mbstore-shortcodes') => '1',
					esc_html__("Just show icon - circle",'mbstore-shortcodes') => '2',
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Facebook link", 'mbstore-shortcodes'),
				"param_name" => "facebook_link" ,
				"value" => ""
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Goolgle Plus link", 'mbstore-shortcodes'),
				"param_name" => "google_link" ,
				"value" => ""
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Twitter link", 'mbstore-shortcodes'),
				"param_name" => "twitter_link" ,
				"value" => ""
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Youtube link", 'mbstore-shortcodes'),
				"param_name" => "youtube_link" ,
				"value" => ""
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Pinterest link", 'mbstore-shortcodes'),
				"param_name" => "pinterest_link" ,
				"value" => ""
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Instagram link", 'mbstore-shortcodes'),
				"param_name" => "instagram_link" ,
				"value" => ""
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	));
}