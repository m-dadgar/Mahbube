<?php
// SNS Info Box
add_shortcode('sns_popup_video', 'mbstore_popup_video_template');
add_action('vc_after_init', 'mbstore_popup_video_settings');
function mbstore_popup_video_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_popup_video'))
        include $template;
    return ob_get_clean();
}
function mbstore_popup_video_settings() {
	$extra_class = mbstore_extra_class();
    vc_map( array(
		"name"  => esc_html__("SNS Popup Video", 'mbstore-shortcodes'),
		"base" => "sns_popup_video",
		"show_settings_on_create" => true ,
		"is_container" => false ,
		"icon" => "vc_icon_snstheme",
		"class" => "vc_icon_snstheme",
		"content_element" => true ,
		"category" => esc_html__('MBStore', 'mbstore-shortcodes'),
		'description' => esc_html__( 'Popup video', 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Video link", 'mbstore-shortcodes'),
				"param_name" => "video_link" ,
				"description" => esc_html__("You can use video url from Youtube, Vimeo", 'mbstore-shortcodes'),
				"value" => "",
			),
			array(
				'type' => 'vc_link',
				'heading' => __( 'Want use Learn more link?', 'mbstore-shortcodes' ),
				'param_name' => 'product_link',
			),
			array(
		      "type" => "attach_image",
		      "heading" => esc_html__("Background image for video", 'mbstore-shortcodes'),
		      "param_name" => "bg_image_video",
		    ),
		    array(
				"type" => "textfield",
				"heading" => esc_html__("Height for wrap", 'mbstore-shortcodes'),
				"param_name" => "height_wrap" ,
				"value" => esc_html__("680px", 'mbstore-shortcodes')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title", 'mbstore-shortcodes'),
				"param_name" => "title",
				"value" => esc_html__("Your Title Here ...",'mbstore-shortcodes'),
				"admin_label" => true 
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Sub title", 'mbstore-shortcodes'),
				"param_name" => "sub_title" ,
				"value" => esc_html__("Your sub title here ...",'mbstore-shortcodes')
			),
			$extra_class,
			vc_map_add_css_animation(),
		)
	));
}