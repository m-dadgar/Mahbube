<?php 
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.0
 * 
 * Theme Settings Defaults
 * Created by CMSMasters
 * 
 */


/* Theme Settings General Default Values */
if (!function_exists('devicer_settings_general_defaults')) {

function devicer_settings_general_defaults($id = false) {
	$settings = array( 
		'general' => array( 
			'devicer' . '_theme_layout' => 			'liquid', 
			'devicer' . '_logo_type' => 				'image', 
			'devicer' . '_logo_url' => 				'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo.png', 
			'devicer' . '_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_retina.png', 
			'devicer' . '_logo_title' => 			get_bloginfo('name') ? get_bloginfo('name') : 'Devicer', 
			'devicer' . '_logo_subtitle' => 			'', 
			'devicer' . '_logo_custom_color' => 		1, 
			'devicer' . '_logo_title_color' => 		'', 
			'devicer' . '_logo_subtitle_color' => 	'' 
		), 
		'bg' => array( 
			'devicer' . '_bg_col' => 			'#ffffff', 
			'devicer' . '_bg_img_enable' => 		0, 
			'devicer' . '_bg_img' => 			'', 
			'devicer' . '_bg_rep' => 			'no-repeat', 
			'devicer' . '_bg_pos' => 			'top center', 
			'devicer' . '_bg_att' => 			'scroll', 
			'devicer' . '_bg_size' => 			'cover' 
		), 
		'header' => array( 
			'devicer' . '_fixed_header' => 					1, 
			'devicer' . '_header_overlaps' => 				1, 
			'devicer' . '_header_top_line' => 				0, 
			'devicer' . '_header_top_height' => 				'40', 
			'devicer' . '_header_top_line_short_info' => 	'Welcome to Device <span class="cmsmasters_customer_care">Customer Care</span>  <a href="tel:1-800-667-8280">1-800-667-8280</a>', 
			'devicer' . '_header_top_line_add_cont' => 		'nav', 
			'devicer' . '_header_styles' => 					'l_nav', 
			'devicer' . '_header_mid_height' => 				'110', 
			'devicer' . '_header_bot_height' => 				'52',
			'devicer' . '_header_search' => 					1, 
			'devicer' . '_header_add_cont' => 				'none', 
			'devicer' . '_header_add_cont_cust_html' => 		'',
			'devicer' . '_woocommerce_cart_dropdown' => 	0,
			'devicer' . '_second_menu_enable' => 					0, 
			'devicer' . '_category_menu_title' => 					'Categories', 
			'devicer' . '_second_menu_open' => 					1
		), 
		'content' => array( 
			'devicer' . '_layout' => 					'r_sidebar', 
			'devicer' . '_archives_layout' => 			'r_sidebar', 
			'devicer' . '_search_layout' => 			'r_sidebar', 
			'devicer' . '_other_layout' => 			'r_sidebar', 
			'devicer' . '_heading_alignment' => 			'left', 
			'devicer' . '_heading_scheme' => 			'default', 
			'devicer' . '_heading_bg_image_enable' => 	0, 
			'devicer' . '_heading_bg_image' => 			'', 
			'devicer' . '_heading_bg_repeat' => 			'no-repeat', 
			'devicer' . '_heading_bg_attachment' => 		'scroll', 
			'devicer' . '_heading_bg_size' => 			'cover', 
			'devicer' . '_heading_bg_color' => 			'', 
			'devicer' . '_heading_height' => 			'115', 
			'devicer' . '_breadcrumbs' => 				1, 
			'devicer' . '_bottom_scheme' => 				'footer', 
			'devicer' . '_bottom_sidebar' => 			0, 
			'devicer' . '_bottom_sidebar_layout' => 		'14141414' 
		), 
		'footer' => array( 
			'devicer' . '_footer_scheme' => 					'footer', 
			'devicer' . '_footer_type' => 					'small', 
			'devicer' . '_footer_additional_content' => 		'social', 
			'devicer' . '_footer_logo' => 					1, 
			'devicer' . '_footer_logo_url' => 				'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer.png', 
			'devicer' . '_footer_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer_retina.png', 
			'devicer' . '_footer_nav' => 					1, 
			'devicer' . '_footer_social' => 					1, 
			'devicer' . '_footer_html' => 					'', 
			'devicer' . '_footer_copyright' => 				'Devicer' . ' &copy; ' . date('Y') . '/ ' . esc_html__('All Rights Reserved', 'devicer') 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}


/* Theme Settings Fonts Default Values */
if (!function_exists('devicer_settings_font_defaults')) {

function devicer_settings_font_defaults($id = false) {
	$settings = array( 
		'content' => array( 
			'devicer' . '_content_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'14', 
				'line_height' => 		'24', 
				'font_weight' => 		'400', 
				'font_style' => 		'normal' 
			) 
		), 
		'link' => array( 
			'devicer' . '_link_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'15', 
				'line_height' => 		'24', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'devicer' . '_link_hover_decoration' => 	'none' 
		), 
		'nav' => array( 
			'devicer' . '_nav_title_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'devicer' . '_nav_dropdown_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			) 
		), 
		'heading' => array( 
			'devicer' . '_h1_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'36', 
				'line_height' => 		'44', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'devicer' . '_h2_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'28', 
				'line_height' => 		'38', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'devicer' . '_h3_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'20', 
				'line_height' => 		'26', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'devicer' . '_h4_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'18', 
				'line_height' => 		'24', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'devicer' . '_h5_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'16', 
				'line_height' => 		'24', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'devicer' . '_h6_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			) 
		), 
		'other' => array( 
			'devicer' . '_button_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'12', 
				'line_height' => 		'40', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'devicer' . '_small_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'devicer' . '_input_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal' 
			), 
			'devicer' . '_quote_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Heebo:100,300,400,500,700,800,900', 
				'font_size' => 			'24', 
				'line_height' => 		'36', 
				'font_weight' => 		'300', 
				'font_style' => 		'italic' 
			) 
		),
		'google' => array( 
			'devicer' . '_google_web_fonts' => array( 
				'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic|Titillium Web', 
				'Roboto:300,300italic,400,400italic,500,500italic,700,700italic|Roboto', 
				'Roboto+Condensed:400,400italic,700,700italic|Roboto Condensed', 
				'Open+Sans:300,300italic,400,400italic,700,700italic|Open Sans', 
				'Open+Sans+Condensed:300,300italic,700|Open Sans Condensed', 
				'Droid+Sans:400,700|Droid Sans', 
				'Droid+Serif:400,400italic,700,700italic|Droid Serif', 
				'PT+Sans:400,400italic,700,700italic|PT Sans', 
				'PT+Sans+Caption:400,700|PT Sans Caption', 
				'PT+Sans+Narrow:400,700|PT Sans Narrow', 
				'PT+Serif:400,400italic,700,700italic|PT Serif', 
				'Ubuntu:400,400italic,700,700italic|Ubuntu', 
				'Ubuntu+Condensed|Ubuntu Condensed', 
				'Headland+One|Headland One', 
				'Source+Sans+Pro:300,300italic,400,400italic,700,700italic|Source Sans Pro', 
				'Lato:400,400italic,700,700italic|Lato', 
				'Cuprum:400,400italic,700,700italic|Cuprum', 
				'Oswald:300,400,700|Oswald', 
				'Yanone+Kaffeesatz:300,400,700|Yanone Kaffeesatz', 
				'Lobster|Lobster', 
				'Lobster+Two:400,400italic,700,700italic|Lobster Two', 
				'Questrial|Questrial', 
				'Raleway:300,400,500,600,700|Raleway', 
				'Dosis:300,400,500,700|Dosis', 
				'Cutive+Mono|Cutive Mono', 
				'Quicksand:300,400,700|Quicksand', 
				'Montserrat:400,700|Montserrat', 
				'Cookie|Cookie',
				'Heebo:100,300,400,500,700,800,900|Heebo'
			) 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// WP Color Picker Palettes
if (!function_exists('cmsmasters_color_picker_palettes')) {

function cmsmasters_color_picker_palettes() {
	$palettes = array( 
		'#4a4a4d', 
		'#3452ff', 
		'#8f8f93', 
		'#29292a', 
		'#ffffff', 
		'#f2f2f2', 
		'#dddddd', 
		'#fdc346' 
	);
	
	
	return $palettes;
}

}



// Theme Settings Color Schemes Default Colors
if (!function_exists('devicer_color_schemes_defaults')) {

function devicer_color_schemes_defaults($id = false) {
	$settings = array( 
		'default' => array( // content default color scheme
			'color' => 		'#4a4a4d', 
			'link' => 		'#3452ff', 
			'hover' => 		'#8f8f93', 
			'heading' => 	'#29292a', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#f2f2f2', 
			'border' => 	'#dddddd', 
			'secondary' => 	'#fdc346' 
		), 
		'header' => array( // Header color scheme
			'mid_color' => 		'#2e2e2e', 
			'mid_link' => 		'#2e2e2e', 
			'mid_hover' => 		'#3452ff', 
			'mid_bg' => 		'rgba(255,255,255,0)', 
			'mid_bg_scroll' => 	'#ffffff', 
			'mid_border' => 	'#dddddd', 
			'bot_color' => 		'#2e2e2e', 
			'bot_link' => 		'#2e2e2e', 
			'bot_hover' => 		'#3452ff', 
			'bot_bg' => 		'rgba(255,255,255,0)', 
			'bot_bg_scroll' => 	'#ffffff', 
			'bot_border' => 	'rgba(255,255,255,0)' 
		), 
		'navigation' => array( // Navigation color scheme
			'title_link' => 			'#2e2e2e', 
			'title_link_hover' => 		'#3452ff', 
			'title_link_current' => 	'#3452ff', 
			'title_link_subtitle' => 	'#a0a0a0', 
			'title_link_bg' => 			'#ffffff', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_bg_current' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_text' => 			'#a0a0a0', 
			'dropdown_bg' => 			'#ffffff', 
			'dropdown_border' => 		'#e6e6e6', 
			'dropdown_link' => 			'#29292a', 
			'dropdown_link_hover' => 	'#29292a', 
			'dropdown_link_subtitle' => '#a0a0a0', 
			'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
			'dropdown_link_border' => 	'rgba(255,255,255,0)' 
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 					'#8f8f93', 
			'link' => 					'#29292a', 
			'hover' => 					'#3452ff', 
			'bg' => 					'#f2f2f2', 
			'border' => 				'rgba(255,255,255,0.1)', 
			'title_link' => 			'#4a4a4d', 
			'title_link_hover' => 		'#3452ff', 
			'title_link_bg' => 			'#f2f2f2', 
			'title_link_bg_hover' => 	'#f2f2f2', 
			'title_link_border' => 		'#f2f2f2', 
			'dropdown_bg' => 			'#353536', 
			'dropdown_border' => 		'#353536', 
			'dropdown_link' => 			'rgba(255,255,255,0.5)', 
			'dropdown_link_hover' => 	'#ffffff', 
			'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
			'dropdown_link_border' => 	'#353536' 
		), 
		'footer' => array( // Footer color scheme
			'color' => 		'#727272', 
			'link' => 		'#727272', 
			'hover' => 		'#ffffff', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#212121', 
			'alternate' => 	'#212121', 
			'border' => 	'#383838', 
			'secondary' => 	'#727272' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'#4a4a4d', 
			'link' => 		'#3452ff', 
			'hover' => 		'#8f8f93', 
			'heading' => 	'#29292a', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#f2f2f2', 
			'border' => 	'#dddddd', 
			'secondary' => 	'#fdc346' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'#4a4a4d', 
			'link' => 		'#3452ff', 
			'hover' => 		'#8f8f93', 
			'heading' => 	'#29292a', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#f2f2f2', 
			'border' => 	'#dddddd', 
			'secondary' => 	'#fdc346' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'#4a4a4d', 
			'link' => 		'#3452ff', 
			'hover' => 		'#8f8f93', 
			'heading' => 	'#29292a', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#f2f2f2', 
			'border' => 	'#dddddd', 
			'secondary' => 	'#fdc346' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Elements Default Values
if (!function_exists('devicer_settings_element_defaults')) {

function devicer_settings_element_defaults($id = false) {
	$settings = array( 
		'sidebar' => array( 
			'devicer' . '_sidebar' => 	'' 
		), 
		'icon' => array( 
			'devicer' . '_social_icons' => array( 
				'cmsmasters-icon-facebook-1|#|' . esc_html__('Facebook', 'devicer') . '|true||', 
				'cmsmasters-icon-gplus-1|#|' . esc_html__('Google+', 'devicer') . '|true||', 
				'cmsmasters-icon-instagram|#|' . esc_html__('Instagram', 'devicer') . '|true||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'devicer') . '|true||', 
				'cmsmasters-icon-youtube-play|#|' . esc_html__('YouTube', 'devicer') . '|true||' 
			) 
		), 
		'lightbox' => array( 
			'devicer' . '_ilightbox_skin' => 					'dark', 
			'devicer' . '_ilightbox_path' => 					'vertical', 
			'devicer' . '_ilightbox_infinite' => 				0, 
			'devicer' . '_ilightbox_aspect_ratio' => 			1, 
			'devicer' . '_ilightbox_mobile_optimizer' => 		1, 
			'devicer' . '_ilightbox_max_scale' => 				1, 
			'devicer' . '_ilightbox_min_scale' => 				0.2, 
			'devicer' . '_ilightbox_inner_toolbar' => 			0, 
			'devicer' . '_ilightbox_smart_recognition' => 		0, 
			'devicer' . '_ilightbox_fullscreen_one_slide' => 	0, 
			'devicer' . '_ilightbox_fullscreen_viewport' => 	'center', 
			'devicer' . '_ilightbox_controls_toolbar' => 		1, 
			'devicer' . '_ilightbox_controls_arrows' => 		0, 
			'devicer' . '_ilightbox_controls_fullscreen' => 	1, 
			'devicer' . '_ilightbox_controls_thumbnail' => 		1, 
			'devicer' . '_ilightbox_controls_keyboard' => 		1, 
			'devicer' . '_ilightbox_controls_mousewheel' => 	1, 
			'devicer' . '_ilightbox_controls_swipe' => 			1, 
			'devicer' . '_ilightbox_controls_slideshow' => 		0 
		), 
		'sitemap' => array( 
			'devicer' . '_sitemap_nav' => 			1, 
			'devicer' . '_sitemap_categs' => 		1, 
			'devicer' . '_sitemap_tags' => 			1, 
			'devicer' . '_sitemap_month' => 		1, 
			'devicer' . '_sitemap_pj_categs' => 	1, 
			'devicer' . '_sitemap_pj_tags' => 		1 
		), 
		'error' => array( 
			'devicer' . '_error_color' => 				'#313131', 
			'devicer' . '_error_bg_color' => 			'#ffffff', 
			'devicer' . '_error_bg_img_enable' => 		0, 
			'devicer' . '_error_bg_image' => 			'', 
			'devicer' . '_error_bg_rep' => 				'no-repeat', 
			'devicer' . '_error_bg_pos' => 				'top center', 
			'devicer' . '_error_bg_att' => 				'scroll', 
			'devicer' . '_error_bg_size' => 			'cover', 
			'devicer' . '_error_search' => 				1, 
			'devicer' . '_error_sitemap_button' =>		1, 
			'devicer' . '_error_sitemap_link' => 		'' 
		), 
		'code' => array( 
			'devicer' . '_custom_css' => 			'', 
			'devicer' . '_custom_js' => 			'', 
			'devicer' . '_gmap_api_key' => 			'', 
			'devicer' . '_api_key' => 				'', 
			'devicer' . '_api_secret' => 			'', 
			'devicer' . '_access_token' => 			'', 
			'devicer' . '_access_token_secret' => 	'' 
		), 
		'recaptcha' => array( 
			'devicer' . '_recaptcha_public_key' => 		'', 
			'devicer' . '_recaptcha_private_key' => 	'' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Single Posts Default Values
if (!function_exists('devicer_settings_single_defaults')) {

function devicer_settings_single_defaults($id = false) {
	$settings = array( 
		'post' => array( 
			'devicer' . '_blog_post_layout' => 			'fullwidth', 
			'devicer' . '_blog_post_title' => 			1, 
			'devicer' . '_blog_post_date' => 			1, 
			'devicer' . '_blog_post_cat' => 			1, 
			'devicer' . '_blog_post_author' => 			1, 
			'devicer' . '_blog_post_comment' => 		1, 
			'devicer' . '_blog_post_tag' => 			1, 
			'devicer' . '_blog_post_like' => 			1, 
			'devicer' . '_blog_post_nav_box' => 		1, 
			'devicer' . '_blog_post_nav_order_cat' => 	0, 
			'devicer' . '_blog_post_share_box' => 		1, 
			'devicer' . '_blog_post_author_box' => 		1, 
			'devicer' . '_blog_more_posts_box' => 		'popular', 
			'devicer' . '_blog_more_posts_count' => 	'3', 
			'devicer' . '_blog_more_posts_pause' => 	'5' 
		), 
		'project' => array( 
			'devicer' . '_portfolio_project_title' => 			1, 
			'devicer' . '_portfolio_project_details_title' => 	esc_html__('Project details', 'devicer'), 
			'devicer' . '_portfolio_project_date' => 			1, 
			'devicer' . '_portfolio_project_cat' => 			1, 
			'devicer' . '_portfolio_project_author' => 			1, 
			'devicer' . '_portfolio_project_comment' => 		0, 
			'devicer' . '_portfolio_project_tag' => 			0, 
			'devicer' . '_portfolio_project_like' => 			1, 
			'devicer' . '_portfolio_project_link' => 			0, 
			'devicer' . '_portfolio_project_share_box' => 		1, 
			'devicer' . '_portfolio_project_nav_box' => 		1, 
			'devicer' . '_portfolio_project_nav_order_cat' => 	0,
			'devicer' . '_portfolio_project_author_box' => 		1, 
			'devicer' . '_portfolio_more_projects_box' => 		'popular', 
			'devicer' . '_portfolio_more_projects_count' => 	'4', 
			'devicer' . '_portfolio_more_projects_pause' => 	'5', 
			'devicer' . '_portfolio_project_slug' => 			'project', 
			'devicer' . '_portfolio_pj_categs_slug' => 			'pj-categs', 
			'devicer' . '_portfolio_pj_tags_slug' => 			'pj-tags' 
		), 
		'profile' => array( 
			'devicer' . '_profile_post_title' => 			1, 
			'devicer' . '_profile_post_details_title' => 	esc_html__('Profile details', 'devicer'), 
			'devicer' . '_profile_post_cat' => 				1, 
			'devicer' . '_profile_post_comment' => 			1, 
			'devicer' . '_profile_post_like' => 			1, 
			'devicer' . '_profile_post_nav_box' => 			1,
			'devicer' . '_profile_post_nav_order_cat' => 	0,  
			'devicer' . '_profile_post_share_box' => 		1, 
			'devicer' . '_profile_post_slug' => 			'profile', 
			'devicer' . '_profile_pl_categs_slug' => 		'pl-categs' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Project Puzzle Proportion */
if (!function_exists('devicer_project_puzzle_proportion')) {

function devicer_project_puzzle_proportion() {
	return 0.7069;
}

}



/* Project Puzzle Proportion */
if (!function_exists('devicer_project_puzzle_large_gar_parameters')) {

function devicer_project_puzzle_large_gar_parameters() {
	$parameter = array ( 
		'container_width' 		=> 1160, 
		'bottomStaticPadding' 	=> 2 
	);
	
	
	return $parameter;
}

}



/* Theme Image Thumbnails Size */
if (!function_exists('devicer_get_image_thumbnail_list')) {

function devicer_get_image_thumbnail_list() {
	$list = array( 
		'cmsmasters-small-thumb' => array( 
			'width' => 		75, 
			'height' => 	75, 
			'crop' => 		true 
		), 
		'cmsmasters-square-thumb' => array( 
			'width' => 		300, 
			'height' => 	300, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Square', 'devicer') 
		), 
		'cmsmasters-blog-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	366, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Masonry Blog', 'devicer') 
		), 
		'cmsmasters-project-thumb' => array( 
			'width' => 		580, 
			'height' => 	410, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project', 'devicer') 
		), 
		'cmsmasters-project-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Project', 'devicer') 
		), 
		'post-thumbnail' => array( 
			'width' => 		860, 
			'height' => 	575, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Featured', 'devicer') 
		), 
		'cmsmasters-masonry-thumb' => array( 
			'width' => 		860, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry', 'devicer') 
		), 
		'cmsmasters-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	770, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Full', 'devicer') 
		), 
		'cmsmasters-project-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	820, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project Full', 'devicer') 
		), 
		'cmsmasters-full-masonry-thumb' => array( 
			'width' => 		1160, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Full', 'devicer') 
		) 
	);
	
	
	return $list;
}

}



/* Project Post Type Registration Rename */
if (!function_exists('devicer_project_labels')) {

function devicer_project_labels() {
	return array( 
		'name' => 					esc_html__('Projects', 'devicer'), 
		'singular_name' => 			esc_html__('Project', 'devicer'), 
		'menu_name' => 				esc_html__('Projects', 'devicer'), 
		'all_items' => 				esc_html__('All Projects', 'devicer'), 
		'add_new' => 				esc_html__('Add New', 'devicer'), 
		'add_new_item' => 			esc_html__('Add New Project', 'devicer'), 
		'edit_item' => 				esc_html__('Edit Project', 'devicer'), 
		'new_item' => 				esc_html__('New Project', 'devicer'), 
		'view_item' => 				esc_html__('View Project', 'devicer'), 
		'search_items' => 			esc_html__('Search Projects', 'devicer'), 
		'not_found' => 				esc_html__('No projects found', 'devicer'), 
		'not_found_in_trash' => 	esc_html__('No projects found in Trash', 'devicer') 
	);
}

}

// add_filter('cmsmasters_project_labels_filter', 'devicer_project_labels');


if (!function_exists('devicer_pj_categs_labels')) {

function devicer_pj_categs_labels() {
	return array( 
		'name' => 					esc_html__('Project Categories', 'devicer'), 
		'singular_name' => 			esc_html__('Project Category', 'devicer') 
	);
}

}

// add_filter('cmsmasters_pj_categs_labels_filter', 'devicer_pj_categs_labels');


if (!function_exists('devicer_pj_tags_labels')) {

function devicer_pj_tags_labels() {
	return array( 
		'name' => 					esc_html__('Project Tags', 'devicer'), 
		'singular_name' => 			esc_html__('Project Tag', 'devicer') 
	);
}

}

// add_filter('cmsmasters_pj_tags_labels_filter', 'devicer_pj_tags_labels');



/* Profile Post Type Registration Rename */
if (!function_exists('devicer_profile_labels')) {

function devicer_profile_labels() {
	return array( 
		'name' => 					esc_html__('Profiles', 'devicer'), 
		'singular_name' => 			esc_html__('Profiles', 'devicer'), 
		'menu_name' => 				esc_html__('Profiles', 'devicer'), 
		'all_items' => 				esc_html__('All Profiles', 'devicer'), 
		'add_new' => 				esc_html__('Add New', 'devicer'), 
		'add_new_item' => 			esc_html__('Add New Profile', 'devicer'), 
		'edit_item' => 				esc_html__('Edit Profile', 'devicer'), 
		'new_item' => 				esc_html__('New Profile', 'devicer'), 
		'view_item' => 				esc_html__('View Profile', 'devicer'), 
		'search_items' => 			esc_html__('Search Profiles', 'devicer'), 
		'not_found' => 				esc_html__('No Profiles found', 'devicer'), 
		'not_found_in_trash' => 	esc_html__('No Profiles found in Trash', 'devicer') 
	);
}

}

// add_filter('cmsmasters_profile_labels_filter', 'devicer_profile_labels');


if (!function_exists('devicer_pl_categs_labels')) {

function devicer_pl_categs_labels() {
	return array( 
		'name' => 					esc_html__('Profile Categories', 'devicer'), 
		'singular_name' => 			esc_html__('Profile Category', 'devicer') 
	);
}

}

// add_filter('cmsmasters_pl_categs_labels_filter', 'devicer_pl_categs_labels');

