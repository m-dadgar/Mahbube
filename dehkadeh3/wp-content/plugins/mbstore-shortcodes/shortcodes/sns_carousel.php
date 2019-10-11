<?php
// SNS Carousel
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_SNS_Carousel extends WPBakeryShortCodesContainer {
    }
}
add_shortcode('sns_carousel', 'mbstore_carousel_template');
add_action('vc_after_init', 'mbstore_carousel_settings');
function mbstore_carousel_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_carousel'))
        include $template;
    return ob_get_clean();
}
function mbstore_carousel_settings() {
	$extra_class = mbstore_extra_class();
	$css_animation = mbstore_css_animation();
	if ( function_exists('vc_map') ) vc_map( array(
		"name" => esc_html__("SNS Carousel",'mbstore-shortcodes'),
		"base" => "sns_carousel",
		"class" => "sns_carousel",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Carousel for other shortcodes",'mbstore-shortcodes' ),
	    "as_parent" => array('except' => 'sns_carousel'),
	    "content_element" => true,
	    "show_settings_on_create" => true,
	    "is_container" => true,
	    "js_view" => 'VcColumnView',
	    "params" => array(
	        // add params same as with any other content element
	        array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"admin_label" => true,
				"value" => "",
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Slider Type",'mbstore-shortcodes'),
				"param_name" => "slider_type",
				"value" => array(
					esc_html__("Horizontal",'mbstore-shortcodes') => 'h',
					esc_html__("Vertical",'mbstore-shortcodes') =>  'v'
				)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Navigation",'mbstore-shortcodes'),
				"param_name" => "show_nav",
				"value" => array(
					esc_html__("No",'mbstore-shortcodes') => '0',
					esc_html__("Yes",'mbstore-shortcodes') =>  '1'
				)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Paging",'mbstore-shortcodes'),
				"param_name" => "show_paging",
				"value" => array(
					esc_html__("No",'mbstore-shortcodes') => '0',
					esc_html__("Yes",'mbstore-shortcodes') =>  '1'
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Paging with Image",'mbstore-shortcodes'),
				"param_name" => "show_dotimg",
				"value" => array(
					esc_html__("No",'mbstore-shortcodes') => '0',
					esc_html__("Yes",'mbstore-shortcodes') =>  '1'
				),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number row on column",'mbstore-shortcodes'),
				"param_name" => "row",
				"value" => esc_html__("1",'mbstore-shortcodes'),
			),
	        array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number items on Desktop",'mbstore-shortcodes'),
				"param_name" => "n_desktop",
				"value" => esc_html__("1",'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number items on Tablet Landscape",'mbstore-shortcodes'),
				"param_name" => "n_tablet",
				"value" => esc_html__("1",'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number items on Tablet Portrait",'mbstore-shortcodes'),
				"param_name" => "n_tabletp",
				"admin_label" => true,
				"value" =>  esc_html__("1", 'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number items on Mobile Landscape",'mbstore-shortcodes'),
				"param_name" => "n_mobile_l",
				"value" => esc_html__("1",'mbstore-shortcodes'),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number items on Mobile Portrait",'mbstore-shortcodes'),
				"param_name" => "n_mobile_p",
				"value" => esc_html__("1",'mbstore-shortcodes'),
			),
			$css_animation,
			$extra_class,
	    ),
	) );
}
