<?php 
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function devicer_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'devicer');
	
	if (class_exists('Cmsmasters_Content_Composer')) {
		$tabs['icon'] = esc_attr__('Social Icons', 'devicer');
	}
	
	$tabs['lightbox'] = esc_attr__('Lightbox', 'devicer');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'devicer');
	$tabs['error'] = esc_attr__('404', 'devicer');
	$tabs['code'] = esc_attr__('Custom Codes', 'devicer');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'devicer');
	}
	
	return apply_filters('cmsmasters_options_element_tabs_filter', $tabs);
}


function devicer_options_element_sections() {
	$tab = devicer_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'devicer');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'devicer');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'devicer');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'devicer');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'devicer');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'devicer');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'devicer');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_sections_filter', $sections, $tab);	
} 


function devicer_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = devicer_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = devicer_settings_element_defaults();
	
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'devicer' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'devicer'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => $defaults[$tab]['devicer' . '_sidebar'] 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'devicer' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'devicer'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => $defaults[$tab]['devicer' . '_social_icons'] 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'devicer'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_skin'], 
			'choices' => array( 
				esc_html__('Dark', 'devicer') . '|dark', 
				esc_html__('Light', 'devicer') . '|light', 
				esc_html__('Mac', 'devicer') . '|mac', 
				esc_html__('Metro Black', 'devicer') . '|metro-black', 
				esc_html__('Metro White', 'devicer') . '|metro-white', 
				esc_html__('Parade', 'devicer') . '|parade', 
				esc_html__('Smooth', 'devicer') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'devicer'), 
			'desc' => esc_html__('Sets path for switching windows', 'devicer'), 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_path'], 
			'choices' => array( 
				esc_html__('Vertical', 'devicer') . '|vertical', 
				esc_html__('Horizontal', 'devicer') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'devicer'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_infinite'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'devicer'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_aspect_ratio'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'devicer'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_mobile_optimizer'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'devicer'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_max_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'devicer'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_min_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'devicer'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_inner_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'devicer'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_smart_recognition'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'devicer'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_fullscreen_one_slide'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'devicer'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'devicer'), 
			'type' => 'select', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_fullscreen_viewport'], 
			'choices' => array( 
				esc_html__('Center', 'devicer') . '|center', 
				esc_html__('Fit', 'devicer') . '|fit', 
				esc_html__('Fill', 'devicer') . '|fill', 
				esc_html__('Stretch', 'devicer') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'devicer'), 
			'desc' => esc_html__('Sets buttons be available or not', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_controls_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'devicer'), 
			'desc' => esc_html__('Enable the arrow buttons', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_controls_arrows'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'devicer'), 
			'desc' => esc_html__('Sets the fullscreen button', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_controls_fullscreen'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'devicer'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_controls_thumbnail'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'devicer'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_controls_keyboard'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'devicer'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_controls_mousewheel'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'devicer'), 
			'desc' => esc_html__('Sets the swipe navigation', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_controls_swipe'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'devicer' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'devicer'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_ilightbox_controls_slideshow'] 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'devicer' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_sitemap_nav'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'devicer' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_sitemap_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'devicer' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_sitemap_tags'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'devicer' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_sitemap_month'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'devicer' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_sitemap_pj_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'devicer' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_sitemap_pj_tags'] 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_color', 
			'title' => esc_html__('Text Color', 'devicer'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['devicer' . '_error_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'devicer'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['devicer' . '_error_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_error_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'devicer'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'devicer'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['devicer' . '_error_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_error_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'devicer') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'devicer') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'devicer') . '|repeat-y', 
				esc_html__('Repeat', 'devicer') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'devicer'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['devicer' . '_error_bg_pos'], 
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
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_error_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'devicer') . '|scroll', 
				esc_html__('Fixed', 'devicer') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'devicer'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['devicer' . '_error_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'devicer') . '|auto', 
				esc_html__('Cover', 'devicer') . '|cover', 
				esc_html__('Contain', 'devicer') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_search', 
			'title' => esc_html__('Search Line', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_error_search'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_error_sitemap_button'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'devicer' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_error_sitemap_link'], 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'devicer' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'devicer'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['devicer' . '_custom_css'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'devicer' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'devicer'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['devicer' . '_custom_js'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'devicer' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_gmap_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'devicer' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'devicer' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_api_secret'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'devicer' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_access_token'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'devicer' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_access_token_secret'], 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'devicer' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_recaptcha_public_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'devicer' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'devicer'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_recaptcha_private_key'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_fields_filter', $options, $tab);	
}

