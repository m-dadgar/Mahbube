<?php 
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.0
 * 
 * Admin Panel Fonts Options
 * Created by CMSMasters
 * 
 */


function devicer_options_font_tabs() {
	$tabs = array();
	
	$tabs['content'] = esc_attr__('Content', 'devicer');
	$tabs['link'] = esc_attr__('Links', 'devicer');
	$tabs['nav'] = esc_attr__('Navigation', 'devicer');
	$tabs['heading'] = esc_attr__('Heading', 'devicer');
	$tabs['other'] = esc_attr__('Other', 'devicer');
	$tabs['google'] = esc_attr__('Google Fonts', 'devicer');
	
	return apply_filters('cmsmasters_options_font_tabs_filter', $tabs);
}


function devicer_options_font_sections() {
	$tab = devicer_get_the_tab();
	
	switch ($tab) {
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_html__('Content Font Options', 'devicer');
		
		break;
	case 'link':
		$sections = array();
		
		$sections['link_section'] = esc_html__('Links Font Options', 'devicer');
		
		break;
	case 'nav':
		$sections = array();
		
		$sections['nav_section'] = esc_html__('Navigation Font Options', 'devicer');
		
		break;
	case 'heading':
		$sections = array();
		
		$sections['heading_section'] = esc_html__('Headings Font Options', 'devicer');
		
		break;
	case 'other':
		$sections = array();
		
		$sections['other_section'] = esc_html__('Other Fonts Options', 'devicer');
		
		break;
	case 'google':
		$sections = array();
		
		$sections['google_section'] = esc_html__('Serving Google Fonts from CDN', 'devicer');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_font_sections_filter', $sections, $tab);
} 


function devicer_options_font_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = devicer_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = devicer_settings_font_defaults();
	
	
	switch ($tab) {
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_content_font', 
			'title' => esc_html__('Main Content Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_content_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'link':
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'devicer' . '_link_font', 
			'title' => esc_html__('Links Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_link_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'devicer' . '_link_hover_decoration', 
			'title' => esc_html__('Links Hover Text Decoration', 'devicer'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['devicer' . '_link_hover_decoration'], 
			'choices' => devicer_text_decoration_list() 
		);
		
		break;
	case 'nav':
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'devicer' . '_nav_title_font', 
			'title' => esc_html__('Navigation Title Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_nav_title_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'devicer' . '_nav_dropdown_font', 
			'title' => esc_html__('Navigation Dropdown Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_nav_dropdown_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		break;
	case 'heading':
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'devicer' . '_h1_font', 
			'title' => esc_html__('H1 Tag Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_h1_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'devicer' . '_h2_font', 
			'title' => esc_html__('H2 Tag Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_h2_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'devicer' . '_h3_font', 
			'title' => esc_html__('H3 Tag Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_h3_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'devicer' . '_h4_font', 
			'title' => esc_html__('H4 Tag Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_h4_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'devicer' . '_h5_font', 
			'title' => esc_html__('H5 Tag Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_h5_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'devicer' . '_h6_font', 
			'title' => esc_html__('H6 Tag Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_h6_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		break;
	case 'other':
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'devicer' . '_button_font', 
			'title' => esc_html__('Button Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_button_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'devicer' . '_small_font', 
			'title' => esc_html__('Small Tag Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_small_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'devicer' . '_input_font', 
			'title' => esc_html__('Text Fields Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_input_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'devicer' . '_quote_font', 
			'title' => esc_html__('Blockquote Font', 'devicer'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['devicer' . '_quote_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'google':
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'devicer' . '_google_web_fonts', 
			'title' => esc_html__('Google Fonts', 'devicer'), 
			'desc' => '', 
			'type' => 'google_web_fonts', 
			'std' => $defaults[$tab]['devicer' . '_google_web_fonts'] 
		);
		
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'devicer' . '_google_web_fonts_subset', 
			'title' => esc_html__('Google Fonts Subset', 'devicer'), 
			'desc' => '', 
			'type' => 'select_multiple', 
			'std' => '', 
			'choices' => array( 
				esc_html__('Latin Extended', 'devicer') . '|' . 'latin-ext', 
				esc_html__('Arabic', 'devicer') . '|' . 'arabic', 
				esc_html__('Cyrillic', 'devicer') . '|' . 'cyrillic', 
				esc_html__('Cyrillic Extended', 'devicer') . '|' . 'cyrillic-ext', 
				esc_html__('Greek', 'devicer') . '|' . 'greek', 
				esc_html__('Greek Extended', 'devicer') . '|' . 'greek-ext', 
				esc_html__('Vietnamese', 'devicer') . '|' . 'vietnamese', 
				esc_html__('Japanese', 'devicer') . '|' . 'japanese', 
				esc_html__('Korean', 'devicer') . '|' . 'korean', 
				esc_html__('Thai', 'devicer') . '|' . 'thai', 
				esc_html__('Bengali', 'devicer') . '|' . 'bengali', 
				esc_html__('Devanagari', 'devicer') . '|' . 'devanagari', 
				esc_html__('Gujarati', 'devicer') . '|' . 'gujarati', 
				esc_html__('Gurmukhi', 'devicer') . '|' . 'gurmukhi', 
				esc_html__('Hebrew', 'devicer') . '|' . 'hebrew', 
				esc_html__('Kannada', 'devicer') . '|' . 'kannada', 
				esc_html__('Khmer', 'devicer') . '|' . 'khmer', 
				esc_html__('Malayalam', 'devicer') . '|' . 'malayalam', 
				esc_html__('Myanmar', 'devicer') . '|' . 'myanmar', 
				esc_html__('Oriya', 'devicer') . '|' . 'oriya', 
				esc_html__('Sinhala', 'devicer') . '|' . 'sinhala', 
				esc_html__('Tamil', 'devicer') . '|' . 'tamil', 
				esc_html__('Telugu', 'devicer') . '|' . 'telugu' 
			) 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_font_fields_filter', $options, $tab);	
}

