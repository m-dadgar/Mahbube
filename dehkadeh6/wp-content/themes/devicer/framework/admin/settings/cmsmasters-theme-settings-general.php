<?php 
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function devicer_options_general_tabs() {
	$cmsmasters_option = devicer_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'devicer');
	
	if ($cmsmasters_option['devicer' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'devicer');
	}
	
	if (CMSMASTERS_THEME_STYLE_COMPATIBILITY) {
		$tabs['theme_style'] = esc_attr__('Theme Style', 'devicer');
	}
	
	$tabs['header'] = esc_attr__('Header', 'devicer');
	$tabs['content'] = esc_attr__('Content', 'devicer');
	$tabs['footer'] = esc_attr__('Footer', 'devicer');
	
	return apply_filters('cmsmasters_options_general_tabs_filter', $tabs);
}


function devicer_options_general_sections() {
	$tab = devicer_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'devicer');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'devicer');
		
		break;
	case 'theme_style':
		$sections = array();
		
		$sections['theme_style_section'] = esc_attr__('Theme Design Style', 'devicer');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'devicer');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'devicer');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'devicer');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_sections_filter', $sections, $tab);
} 


function devicer_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = devicer_get_the_tab();
	}
	
	$options = array();
	
	
	$defaults = devicer_settings_general_defaults();
	
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'devicer' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_theme_layout'], 
			'choices' => array( 
				esc_html__('Liquid', 'devicer') . '|liquid', 
				esc_html__('Boxed', 'devicer') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'devicer' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_logo_type'], 
			'choices' => array( 
				esc_html__('Image', 'devicer') . '|image', 
				esc_html__('Text', 'devicer') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'devicer' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'devicer'), 
			'desc' => esc_html__('Choose your website logo image.', 'devicer'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['devicer' . '_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'devicer' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'devicer'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'devicer'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['devicer' . '_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'devicer' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_logo_title'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'devicer' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_logo_subtitle'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'devicer' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'devicer'), 
			'desc' => esc_html__('enable', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_logo_custom_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'devicer' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'devicer'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['devicer' . '_logo_title_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'devicer' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'devicer'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['devicer' . '_logo_subtitle_color'] 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'devicer' . '_bg_col', 
			'title' => esc_html__('Background Color', 'devicer'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => $defaults[$tab]['devicer' . '_bg_col'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'devicer' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'devicer' . '_bg_img', 
			'title' => esc_html__('Background Image', 'devicer'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'devicer'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['devicer' . '_bg_img'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'devicer' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'devicer') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'devicer') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'devicer') . '|repeat-y', 
				esc_html__('Repeat', 'devicer') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'devicer' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'devicer'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['devicer' . '_bg_pos'], 
			'choices' => array( 
				esc_html__('Top Left', 'devicer') . '|top left', 
				esc_html__('Top Center', 'devicer') . '|top center', 
				esc_html__('Top Right', 'devicer') . '|top right', 
				esc_html__('Center Left', 'devicer') . '|center left', 
				esc_html__('Center Center', 'devicer') . '|center center', 
				esc_html__('Center Right', 'devicer') . '|center right', 
				esc_html__('Bottom Left', 'devicer') . '|bottom left', 
				esc_html__('Bottom Center', 'devicer') . '|bottom center', 
				esc_html__('Bottom Right', 'devicer') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'devicer' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'devicer') . '|scroll', 
				esc_html__('Fixed', 'devicer') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'devicer' . '_bg_size', 
			'title' => esc_html__('Background Size', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'devicer') . '|auto', 
				esc_html__('Cover', 'devicer') . '|cover', 
				esc_html__('Contain', 'devicer') . '|contain' 
			) 
		);
		
		break;
	case 'theme_style':
		$options[] = array( 
			'section' => 'theme_style_section', 
			'id' => 'devicer' . '_theme_style', 
			'title' => esc_html__('Choose Theme Style', 'devicer'), 
			'desc' => '', 
			'type' => 'select_theme_style', 
			'std' => '', 
			'choices' => devicer_all_theme_styles() 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'devicer'), 
			'desc' => esc_html__('enable', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_fixed_header'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'devicer'), 
			'desc' => esc_html__('enable', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_header_overlaps'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_header_top_line'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'devicer'), 
			'desc' => esc_html__('pixels', 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_header_top_height'], 
			'min' => '10' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'devicer'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'devicer') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['devicer' . '_header_top_line_short_info'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_header_top_line_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'devicer') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'devicer') . '|social', 
				esc_html__('Top Line Navigation (will be shown if set in Appearance - Menus tab)', 'devicer') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_header_styles'], 
			'choices' => array( 
				esc_html__('Default Style', 'devicer') . '|default', 
				esc_html__('Compact Style Left Navigation', 'devicer') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'devicer') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'devicer') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'devicer'), 
			'desc' => esc_html__('pixels', 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_header_mid_height'], 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'devicer'), 
			'desc' => esc_html__('pixels', 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_header_bot_height'], 
			'min' => '20' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_search', 
			'title' => esc_html__('Header Search', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_header_search'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_header_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'devicer') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'devicer') . '|social', 
				esc_html__('Header Custom HTML', 'devicer') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'devicer' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'devicer'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'devicer') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['devicer' . '_header_add_cont_cust_html'], 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'devicer'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'devicer'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['devicer' . '_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'devicer'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Archive Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'devicer'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['devicer' . '_archives_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'devicer'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Search Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'devicer'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['devicer' . '_search_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'devicer'), 
			'desc' => esc_html__('Layout for pages of non-listed types. Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'devicer'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['devicer' . '_other_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_heading_alignment'], 
			'choices' => array( 
				esc_html__('Left', 'devicer') . '|left', 
				esc_html__('Right', 'devicer') . '|right', 
				esc_html__('Center', 'devicer') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_heading_scheme', 
			'title' => esc_html__('Heading Color Scheme by Default', 'devicer'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['devicer' . '_heading_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_heading_bg_image_enable'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'devicer'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'devicer'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['devicer' . '_heading_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_heading_bg_repeat'], 
			'choices' => array( 
				esc_html__('No Repeat', 'devicer') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'devicer') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'devicer') . '|repeat-y', 
				esc_html__('Repeat', 'devicer') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_heading_bg_attachment'], 
			'choices' => array( 
				esc_html__('Scroll', 'devicer') . '|scroll', 
				esc_html__('Fixed', 'devicer') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_heading_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'devicer') . '|auto', 
				esc_html__('Cover', 'devicer') . '|cover', 
				esc_html__('Contain', 'devicer') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'devicer'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => $defaults[$tab]['devicer' . '_heading_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'devicer'), 
			'desc' => esc_html__('pixels', 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_heading_height'], 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_breadcrumbs'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Color Scheme', 'devicer'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['devicer' . '_bottom_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'devicer'), 
			'desc' => esc_html__('show', 'devicer') . '<br><br>' . esc_html__('Please make sure to add widgets in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_bottom_sidebar'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'devicer' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'devicer'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['devicer' . '_bottom_sidebar_layout'], 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_scheme', 
			'title' => esc_html__('Footer Color Scheme', 'devicer'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['devicer' . '_footer_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_footer_type'], 
			'choices' => array( 
				esc_html__('Default', 'devicer') . '|default', 
				esc_html__('Small', 'devicer') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_footer_additional_content'], 
			'choices' => array( 
				esc_html__('None', 'devicer') . '|none', 
				esc_html__('Footer Navigation (will be shown if set in Appearance - Menus tab)', 'devicer') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'devicer') . '|social', 
				esc_html__('Custom HTML', 'devicer') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_footer_logo'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'devicer'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'devicer'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['devicer' . '_footer_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'devicer'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'devicer'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['devicer' . '_footer_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_footer_nav'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_footer_social'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'devicer'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'devicer') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['devicer' . '_footer_html'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'devicer' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_footer_copyright'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_fields_filter', $options, $tab);
}

