<?php
// SNSEvon Post WCode
add_shortcode('mbstore_postwcode', 'mbstore_postwcode_template');
add_action('vc_after_init', 'mbstore_postwcode_settings');
function mbstore_postwcode_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('mbstore_postwcode'))
        include $template;
    return ob_get_clean();
}
function mbstore_postwcode_settings() {
    vc_map( array(
		"name" => esc_html__("Post WCode",'mbstore-shortcodes'),
		"base" => "mbstore_postwcode",
		"icon" => "mbstore_icon_postwcode",
		"class" => "mbstore_postwcode",
		"category" => esc_html__("MBStore",'mbstore-shortcodes'),
		"description" => esc_html__( "Display somes shortcodes via slug of Post WCode",'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"admin_label" => true,
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Slug of Post WCode",'mbstore-shortcodes'),
				"param_name" => "name",
				"admin_label" => true,
			),
		)
    ));
}