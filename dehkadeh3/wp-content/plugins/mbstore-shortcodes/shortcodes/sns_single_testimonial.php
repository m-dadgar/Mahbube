<?php
// SNS Single Testimonial
add_shortcode('sns_single_testimonial', 'mbstore_single_testimonial_template');
add_action('vc_after_init', 'mbstore_single_testimonial_settings');
function mbstore_single_testimonial_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_single_testimonial'))
        include $template;
    return ob_get_clean();
}
function mbstore_single_testimonial_settings() {
	$extra_class = mbstore_extra_class();
	$css_animation = mbstore_css_animation();
	
	vc_map( array(
		"name"  => esc_html__("SNS Single Testimonial", 'mbstore-shortcodes'),
		"base" => "sns_single_testimonial",
		"show_settings_on_create" => true ,
		"is_container" => false ,
		"icon" => "vc_icon_snstheme",
		"class" => "vc_icon_snstheme",
		"content_element" => true ,
		"category" => esc_html__('MBStore', 'mbstore-shortcodes'),
		'description' => esc_html__( 'Display single Testimonial', 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textarea",
				"heading" => esc_html__("Testimonial content", 'mbstore-shortcodes'),
				"param_name" => "testimonial_content"
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style",'mbstore-shortcodes'),
				"param_name" => "style",
				"value" => array(
					esc_html__("Style1",'mbstore-shortcodes') => 'style1',
					esc_html__("Style2",'mbstore-shortcodes') => 'style2',
				),
			),
			array(
		        "type" => "attach_image",
		        "heading" => esc_html__("Author avatar", 'mbstore-shortcodes'),
		        "param_name" => "author_avatar",
		    ),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Author name",'mbstore-shortcodes'),
				"param_name" => "author_name",
				"admin_label" => true,
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Author position",'mbstore-shortcodes'),
				"param_name" => "author_position",
				"admin_label" => true,
			),
			
			$extra_class,
			$css_animation,
		)
	));
}