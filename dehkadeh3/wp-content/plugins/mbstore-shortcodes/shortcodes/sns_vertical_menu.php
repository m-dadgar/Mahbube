<?php
// SNS Vertical Menu
add_shortcode('sns_vertical_menu', 'mbstore_vertical_menu_template');
add_action('vc_after_init', 'mbstore_vertical_menu_settings');
function mbstore_vertical_menu_template($atts, $content = null) {
    ob_start();
    if ($template = mbstore_shortcode_template('sns_vertical_menu'))
        include $template;
    return ob_get_clean();
}
function mbstore_vertical_menu_settings() {
	$extra_class = mbstore_extra_class();
	$custom_menus = array();
	if ( 'vc_edit_form' === vc_post_param( 'action' ) && vc_verify_admin_nonce() ) {
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
		if ( is_array( $menus ) && ! empty( $menus ) ) {
			foreach ( $menus as $single_menu ) {
				if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->term_id ) ) {
					$custom_menus[ $single_menu->name ] = $single_menu->term_id;
				}
			}
		}
	}
	vc_map( array(
		"name"  => esc_html__("SNS Vertical Menu", 'mbstore-shortcodes'),
		"base" => "sns_vertical_menu",
		"show_settings_on_create" => true ,
		"is_container" => false ,
		"icon" => "vc_icon_snstheme",
		"class" => "vc_icon_snstheme",
		"content_element" => true ,
		"category" => esc_html__('MBStore', 'mbstore-shortcodes'),
		'description' => esc_html__( 'Display menu with vertical style ...', 'mbstore-shortcodes' ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title",'mbstore-shortcodes'),
				"param_name" => "title",
				"value" =>  esc_html__("All Categories",'mbstore-shortcodes'),
				"admin_label" => true,
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Menu', 'mbstore-shortcodes' ),
				'param_name' => 'nav_menu',
				'value' => $custom_menus,
				'description' => empty( $custom_menus ) ? esc_html__( 'Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu.', 'mbstore-shortcodes' ) : esc_html__( 'Select menu to display.', 'mbstore-shortcodes' ),
				'admin_label' => true,
				'save_always' => true,
			),
			vc_map_add_css_animation(),
			$extra_class,
		)
	));
}