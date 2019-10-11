<?php
// SNS List Post
class WPBakeryShortCode_SNS_Special_List_Posts extends WPBakeryShortCode {
	function __construct( $settings ) {
		parent::__construct( $settings );
	}
}
add_shortcode('sns_special_list_posts', 'mbstore_special_list_posts_template');
add_action('vc_after_init', 'mbstore_special_list_posts_settings');
function mbstore_special_list_posts_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_special_list_posts'))
        include $template;
    return ob_get_clean();
}
function mbstore_special_list_posts_settings() {
	$extra_class = mbstore_extra_class();
		vc_map( array(
		"name" => esc_html__("SNS Special List Post",'mbstore-shortcodes'),
		"base" => "sns_special_list_posts",
		"icon" => "sns_icon_speciallistposts",
		"class" => "sns_speciallistposts",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Show Special List Posts", 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Posts number limit",'mbstore-shortcodes'),
				"param_name" => "number_limit",
				"value" => "6",
				"admin_label" => true
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order By",'mbstore-shortcodes'),
				"param_name" => "orderby",
				"class" => "",
				"value" => array(
					esc_html__("Date",'mbstore-shortcodes') => 'date',
					esc_html__("Title",'mbstore-shortcodes') =>  'title',
					esc_html__("author",'mbstore-shortcodes') =>  'author',
					esc_html__("Random",'mbstore-shortcodes') =>  'rand',
					esc_html__("Comment Count",'mbstore-shortcodes') =>  'comment_count',
					esc_html__("Menu Order",'mbstore-shortcodes') =>  'menu_order',
				),
				"admin_label" => true
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Sort order",'mbstore-shortcodes'),
				"param_name" => "sortorder",
				"class" => "",
				"value" => array(
					esc_html__("ASC",'mbstore-shortcodes') => 'ASC',
					esc_html__("DESC",'mbstore-shortcodes') =>  'DESC',
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Use Navigation",'mbstore-shortcodes'),
				"param_name" => "use_nav",
				"value" => array(
					esc_html__("Yes",'mbstore-shortcodes') => '1',
					esc_html__("No",'mbstore-shortcodes') => '2',
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Use Paging",'mbstore-shortcodes'),
				"param_name" => "use_paging",
				"value" => array(
					esc_html__("No",'mbstore-shortcodes') => '2',
					esc_html__("Yes",'mbstore-shortcodes') => '1',
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Auto play",'mbstore-shortcodes'),
				"param_name" => "autoplay",
				"value" => array(
					esc_html__("No",'mbstore-shortcodes') => '2',
					esc_html__("Yes",'mbstore-shortcodes') => '1',
				),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number small item display screen Desktop",'mbstore-shortcodes'),
				"param_name" => "number_desktop",
				"value" => "3"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number small item display screen Tablet Landscape",'mbstore-shortcodes'),
				"param_name" => "number_tablet",
				"value" => "3"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number small item display screen Tablet Portrait",'mbstore-shortcodes'),
				"param_name" => "number_tabletp",
				"value" => "2"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number small item display Mobile Landscape",'mbstore-shortcodes'),
				"param_name" => "number_mobilel",
				"value" => "2"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number small item display screen Mobile Portrait",'mbstore-shortcodes'),
				"param_name" => "number_mobilep",
				"value" => "1"
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}