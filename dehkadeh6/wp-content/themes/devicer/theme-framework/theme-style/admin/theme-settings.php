<?php 
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.0
 * 
 * Theme Admin Settings
 * Created by CMSMasters
 * 
 */


/* Color Settings */
function devicer_theme_options_color_fields($options, $tab) {
	$defaults = devicer_color_schemes_defaults();
	
	
	if ($tab != 'header' && $tab != 'navigation' && $tab != 'header_top') {
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => 'devicer' . '_' . $tab . '_secondary', 
			'title' => esc_html__('Secondary Color', 'devicer'), 
			'desc' => esc_html__('Secondary color for some elements', 'devicer'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['secondary'] : $defaults['default']['secondary'] 
		);
	}
	
	
	return $options;
}

add_filter('cmsmasters_options_color_fields_filter', 'devicer_theme_options_color_fields', 10, 2);

/* General Settings */
function devicer_theme_options_general_fields($options, $tab) {
	if ($tab == 'header') {
		foreach ($options as $option) {
			if ($option['id'] == 'devicer_header_styles') {
				$option['choices'] = array( 
					esc_html__('Default Style', 'devicer') . '|default', 
					esc_html__('Compact Style Left Navigation', 'devicer') . '|l_nav',
					esc_html__('Compact Style Right Navigation', 'devicer') . '|r_nav'
				);
				
				
				$new_options[] = $option;
			} elseif ($option['id'] == 'devicer_header_search') {
				$option['title'] = esc_html__('Header Search Middle', 'devicer');
				
				
				$new_options[] = $option;
				
				
				$new_options[] = array( 
					'section' => 'header_section', 
					'id' => 'devicer' . '_header_search_bottom', 
					'title' => esc_html__('Header Search Bottom', 'devicer'), 
					'desc' => esc_html__('show', 'devicer'), 
					'type' => 'checkbox', 
					'std' => 1 
				);
			} else {
				$new_options[] = $option;
			}
		}
		
		
		$new_options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_second_menu_enable', 
			'title' => esc_html__('Category Menu', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$new_options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_category_menu_title', 
			'title' => esc_html__('Category Menu Title', 'devicer'), 
			'desc' => '',
			'type' => 'text', 
			'std' => 'Categories'
		);
		
		$new_options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_second_menu_open', 
			'title' => esc_html__('Category Menu Opened', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		
		$options = $new_options;
	}
	
	
	return $options;
}

add_filter('cmsmasters_options_general_fields_filter', 'devicer_theme_options_general_fields', 10, 2);



