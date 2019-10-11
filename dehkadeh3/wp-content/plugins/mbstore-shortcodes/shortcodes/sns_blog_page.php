<?php
// SNS Blog Page
add_shortcode('sns_blog_page', 'mbstore_blog_page_template');
add_action('vc_after_init', 'mbstore_blog_page_settings');
function mbstore_blog_page_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_blog_page'))
        include $template;
    return ob_get_clean();
}
function mbstore_blog_page_settings() {
	$extra_class = mbstore_extra_class();
	$css_animation = mbstore_css_animation();
	$cat_value = mbstore_cat();
	vc_map( array(
		"name" => esc_html__("SNS Blog Page",'mbstore-shortcodes'),
		"base" => "sns_blog_page",
		"icon" => "sns_icon_blogpage",
		"class" => "sns_blogpage",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "To create blog page with some style", 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "checkbox",
				"value" => $cat_value,
				"class" => "",
				"heading" => esc_html__("Categories",'mbstore-shortcodes'),
				"description" => esc_html__( "If you dont sellect category, the default is sellected all category", 'mbstore-shortcodes' ),
				"param_name" => "category"
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Blog Style",'mbstore-shortcodes'),
				"param_name" => "blog_type",
				"value" => array(
					esc_html__("Blog Default",'mbstore-shortcodes') 	=> "default",
					esc_html__("Blog List",'mbstore-shortcodes') 	=>  "list",
					esc_html__("Blog Masonry",'mbstore-shortcodes')			=>  "masonry",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Page Navigation",'mbstore-shortcodes'),
				"param_name" => "pagination",
				"value" => array(
					esc_html__("Default",'mbstore-shortcodes') => 'def',
					esc_html__("Ajax click load more",'mbstore-shortcodes') =>  'ajax',
					esc_html__("Ajax auto load more",'mbstore-shortcodes') =>  'ajax2'
				),
				'description' => esc_html__('Choose Type of navigation.','mbstore-shortcodes')
			),
            array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number post with each load more",'mbstore-shortcodes'),
				"param_name" => "masonry_numload",
				"value" => "3",
				'dependency' => array(
					'element' => 'pagination',
					'value' => array('ajax', 'ajax2')
				),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Post per pages",'mbstore-shortcodes'),
				"param_name" => "posts_per_page",
				"value" => "6"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Excerpt Length",'mbstore-shortcodes'),
				"param_name" => "excerpt_length",
				'description' => esc_html__('Just apply for Blog Style is Blog List','mbstore-shortcodes'),
				'dependency' => array(
					'element' => 'blog_type',
					'value' => 'list'
				),
				"value" => "25"
			),
			
			
			$css_animation,
			$extra_class,
		)
	) );
}