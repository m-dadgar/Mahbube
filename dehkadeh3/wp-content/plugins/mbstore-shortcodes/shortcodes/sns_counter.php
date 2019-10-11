<?php
// SNS Member
add_shortcode('sns_counter', 'mbstore_counter_template');
add_action('vc_after_init', 'mbstore_counter_settings');
function mbstore_counter_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_counter'))
        include $template;
    return ob_get_clean();
}
function mbstore_counter_settings() {
	$extra_class = mbstore_extra_class();
	vc_map( array(
		"name"  => esc_html__("SNS Counter", 'mbstore-shortcodes'),
		"base" => "sns_counter",
		"show_settings_on_create" => true ,
		"is_container" => false ,
		"icon" => "vc_icon_snstheme",
		"class" => "vc_icon_snstheme",
		"content_element" => true ,
		"category" => esc_html__('MBStore', 'mbstore-shortcodes'),
		'description' => esc_html__( 'Display box count to', 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Use icon?","mbstore-shortcodes"),
				"param_name" => "enable_icon",
				"value" => array(
					esc_html__('Yes', 'mbstore-shortcodes') => "1",
					esc_html__('No', 'mbstore-shortcodes') => "0"
				),
				"description" => ""
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'mbstore-shortcodes' ),
				'value' => array(
					esc_html__( 'Font Awesome', 'mbstore-shortcodes' ) => 'fontawesome',
					esc_html__( 'Linecons', 'mbstore-shortcodes' ) => 'linecons',
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'mbstore-shortcodes' ),
				'dependency' => array(
					'element' => 'enable_icon',
					'value' => '1',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'mbstore-shortcodes' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-adjust', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'mbstore-shortcodes' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'mbstore-shortcodes' ),
				'param_name' => 'icon_linecons',
				'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 4000, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'mbstore-shortcodes' ),
			),
			array(
				"type" => "colorpicker",
				"value" => "",
				"heading" => esc_html__("Color for icon", "mbstore-shortcodes"),
				"param_name" => "icon_color",
				'dependency' => array(
					'element' => 'enable_icon',
					'value' => '1',
				),
		    ),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Font size for icon", "mbstore-shortcodes"),
				"param_name" => "icon_font_size" ,
				"description" => esc_html__("It's font-size for icon you sellected, example: 24px", "mbstore-shortcodes"),
				'dependency' => array(
					'element' => 'enable_icon',
					'value' => '1',
				),
			),
	  
		  	array(
		      "type" => "textfield",
		      "heading" => esc_html__("Value to Count", "mbstore-shortcodes"),
		      "param_name" => "value" ,
			  "description" => "This value must be an integer", 
			  "admin_label" => true
		    ),
		    array(
				"type" => "colorpicker",
				"value" => "",
				"heading" => esc_html__("Color for Value", "mbstore-shortcodes"),
				"param_name" => "value_color"
		    ),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Font size for Value", "mbstore-shortcodes"),
				"param_name" => "value_font_size" ,
				"description" => esc_html__("It's font-size for Value, example: 18px", "mbstore-shortcodes")
			),
		    array(
		      "type" => "textfield",
		      "heading" => esc_html__("Unit", "mbstore-shortcodes"),
		      "param_name" => "unit",
			  "description" => 'You can use any text such as % , cm or any other . Leave Blank if you do not want to display any unit value'
		    ),
		    array(
		      "type" => "textfield",
		      "heading" => esc_html__("Counter Title", "mbstore-shortcodes"),
		      "param_name" => "title" ,
			  "value" => esc_html__("Your Title Goes Here...","mbstore-shortcodes"),
		    ),
		    array(
				"type" => "colorpicker",
				"value" => "",
				"heading" => esc_html__("Color for Title", "mbstore-shortcodes"),
				"param_name" => "title_color"
		    ),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Font size for Title", "mbstore-shortcodes"),
				"param_name" => "title_font_size" ,
				"description" => esc_html__("It's font-size for Title, example: 12px", "mbstore-shortcodes")
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("From to count", "mbstore-shortcodes"),
				"param_name" => "from" ,
				"value"		=> "0",
				"description" => esc_html__("The number the element should start at, example: 0", "mbstore-shortcodes")
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Speed to count", "mbstore-shortcodes"),
				"param_name" => "speed",
				"value"		=> "900",
				"description" => esc_html__("How long it should take to count between the target numbers, example: 900", "mbstore-shortcodes")
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Interval to count", "mbstore-shortcodes"),
				"param_name" => "interval",
				"value"		=> "10",
				"description" => esc_html__("How often the element should be updated, example: 10", "mbstore-shortcodes")
			),
			$extra_class,
			vc_map_add_css_animation(),
	  	)

	));
}