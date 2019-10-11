<?php
// SNS List Post
class WPBakeryShortCode_SNS_List_Post extends WPBakeryShortCode {
	function __construct( $settings ) {
		parent::__construct( $settings );
	}
}
add_shortcode('sns_list_posts', 'mbstore_list_posts_template');
add_action('vc_after_init', 'mbstore_list_posts_settings');
function mbstore_list_posts_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_list_posts'))
        include $template;
    return ob_get_clean();
}
function mbstore_list_posts_settings() {
	$extra_class = mbstore_extra_class();
		vc_map( array(
		"name" => esc_html__("SNS List Post",'mbstore-shortcodes'),
		"base" => "sns_list_posts",
		"icon" => "sns_icon_listposts",
		"class" => "sns_listposts",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Show List Posts", 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"value" =>  esc_html__("Latest News",'mbstore-shortcodes'),
				"admin_label" => true,
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Template style",'mbstore-shortcodes'),
				"param_name" => "style",
				"value" => array(
					esc_html__("Style 1",'mbstore-shortcodes') =>  '1',
					esc_html__("Style 2",'mbstore-shortcodes') =>  '2',
					esc_html__("Style 3",'mbstore-shortcodes') =>  '3',
					esc_html__("Style 4",'mbstore-shortcodes') =>  '4',
				),
				"admin_label" => true
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Posts number limit",'mbstore-shortcodes'),
				"param_name" => "number_limit",
				"value" => "4",
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
			vc_map_add_css_animation(),
			$extra_class,
		)
	) );
}