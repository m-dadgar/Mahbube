<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.1
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function devicer_theme_colors_primary() {
	$cmsmasters_option = devicer_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme == 'default') ? ".headline_outer *," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	{$rule}textarea,
	{$rule}.cmsmasters_button,
	{$rule}.button,
	{$rule}.cmsmasters-form-builder .form_info.submit_wrap .cmsmasters_button,
	{$rule}button,
	{$rule}select,
	{$rule}option,
	{$rule}.cmsmasters_twitter_wrap .twr_icon,
	{$rule}.cmsmasters_pricing_table .cmsmasters_period,
	{$rule}.header_mid input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}.cmsmasters_quotes_slider .cmsmasters_quote_subtitle,
	{$rule}.cmsmasters_quotes_slider .cmsmasters_quote_site,
	{$rule}.cmsmasters_quotes_slider .cmsmasters_quote_site a,
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quote_subtitle,
	{$rule}.header_mid select,
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quote_site,
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quote_site a {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_color']) . "
	}

	{$rule}textarea {
		color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_color']) . ", 1);
	}

	{$rule}input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]) {
		color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_color']) . ", 1);
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	" . (($scheme == 'footer') ? ".footer .social_wrap a," : '') . "
	{$rule}a,
	{$rule}.color_2,
	{$rule}.cmsmasters_open_profile .profile_social_icons_list a:hover,
	{$rule}.cmsmasters_likes a:hover,
	{$rule}.cmsmasters_likes a.active,
	{$rule}.cmsmasters_comments a:hover,
	{$rule}.cmsmasters_comments a.active,
	{$rule}.cmsmasters_icon_wrap a .cmsmasters_simple_icon,
	{$rule}.cmsmasters_wrap_more_items.cmsmasters_loading:before,
	{$rule}.cmsmasters_profile_header .cmsmasters_profile_title a:hover,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_heading_left .icon_box_heading:before,
	{$rule}.bypostauthor > .comment-body .alignleft:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a:hover,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_pricing_table .feature_list li .feature_icon:before,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:hover,
	{$rule}.cmsmasters_header_search_form .search_bar_wrap .search_button button:hover,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but.current,
	{$rule}.widget_custom_twitter_entries .tweet_time:before,
	{$rule}.cmsmasters_post_default .cmsmasters_theme_icon_sticky:before,
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_header .cmsmasters_post_title a:hover,
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_header .cmsmasters_post_title a:hover,
	{$rule}.cmsmasters_profile_vertical .profile_social_icons_list a:hover,
	{$rule}.cmsmasters_profile_horizontal .profile_social_icons_list a:hover,
	{$rule}.cmsmasters_post_default .cmsmasters_post_cont .cmsmasters_post_cont_info a .cmsmasters_post_date,
	{$rule}.cmsmasters_prev_arrow span:before, 
	{$rule}.cmsmasters_next_arrow span:before,
	{$rule}.cmsmasters_post_default .cmsmasters_post_header .cmsmasters_post_title a:hover,
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_header .cmsmasters_slider_post_title a:hover,
	{$rule}.cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner span:not([class]), 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a:hover,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_edit a,
	{$rule}.cmsmasters_mailpoet .cmsmasters_mailpoet_form .wysija-submit,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_meta a,
	{$rule}.post_nav > span.cmsmasters_next_post a:hover,
	{$rule}.post_nav > span.cmsmasters_prev_post a:hover,
	{$rule}.cmsmasters_product_single_shortcode .cmsmasters_product .cmsmasters_product_title a:hover,
	{$rule}.cmsmasters_product .cmsmasters_product_title a:hover,
	{$rule}.search_bar_wrap .search_button button:hover,
	{$rule}.error_cont .error_button_wrap a:hover,
	{$rule}.cmsmasters_content_slider .owl-buttons > div,
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_cont_info a:hover,
	{$rule}.cmsmasters_wrap_items_loader .cmsmasters_items_loader,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a,
	{$rule}.cmsmasters_project_puzzle .cmsmasters_project_category a:hover,
	{$rule}.cmsmasters_open_project .owl-buttons > div > span > span:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	" . (($scheme == 'default') ? "mark," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme} mark," : '') . "
	{$rule}.img_placeholder_small,
	{$rule}.img_placeholder,
	{$rule}.cmsmasters_clients_slider_wrap.enable_arrow_control .owl-buttons > div > span:before, 
	{$rule}.cmsmasters_clients_slider_wrap.enable_arrow_control .owl-buttons > div > span:after,
	{$rule}.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner,
	{$rule}.cmsmasters_profile_horizontal .cmsmasters_img_wrap.no_image > span,
	{$rule}.cmsmasters_profile_vertical .cmsmasters_img_wrap.no_image > span,
	{$rule}.post_nav > span > span:before,
	{$rule}.post_nav > span > span:after,
	{$rule}.cmsmasters_project_grid .cmsmasters_open_post_link,
	{$rule}.cmsmasters_project_grid .cmsmasters_open_post_link:hover,
	{$rule}.cmsmasters_project_puzzle .cmsmasters_open_post_link,
	{$rule}.cmsmasters_project_puzzle .cmsmasters_open_post_link:hover,
	{$rule}.cmsmasters_project_puzzle .cmsmasters_img_rollover .cmsmasters_open_link,
	{$rule}.cmsmasters_project_puzzle .cmsmasters_img_rollover .cmsmasters_open_link:hover,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:after, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:after, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:after,
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:after,
	{$rule}.cmsmasters_button:hover,
	{$rule}.button:hover,
	{$rule}input[type=submit]:hover,
	{$rule}input[type=button]:hover,
	{$rule}button:hover,
	{$rule}.cmsmasters-form-builder .form_info.submit_wrap .cmsmasters_button:hover,
	{$rule}table thead th,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item.current_tab a span:after,
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_header_search_form button,
	{$rule}.error_cont .error_button_wrap a,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_item:hover .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_content_slider .owl-pagination > div:hover,
	{$rule}.cmsmasters_content_slider .owl-pagination > div.active,
	{$rule}.cmsmasters_notice .notice_close:hover,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:hover:before,
	{$rule}.cmsmasters_post_timeline:hover .cmsmasters_post_timeline_circle,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:hover:after,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but.current:before,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but.current:after,
	{$rule}.post_nav > span a:hover + span:before,
	{$rule}.post_nav > span a:hover + span:after,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_default .cmsmasters_owl_slider .owl-pagination > div:hover,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_default .cmsmasters_owl_slider .owl-pagination > div.active,
	{$rule}.cmsmasters_post_masonry .cmsmasters_owl_slider .owl-pagination > div:hover,
	{$rule}.cmsmasters_post_masonry .cmsmasters_owl_slider .owl-pagination > div.active,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_timeline .cmsmasters_owl_slider .owl-pagination > div:hover,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_timeline .cmsmasters_owl_slider .owl-pagination > div.active,
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_wrap .cmsmasters_toggle_title a:after,
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_wrap.current_toggle .cmsmasters_toggle_title a:after,
	{$rule}.cmsmasters_open_post .cmsmasters_owl_slider .owl-pagination > div:hover,
	{$rule}.cmsmasters_open_post .cmsmasters_owl_slider .owl-pagination > div.active,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers > span:before,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers > span:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_header_search_form {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_link']) . ", .95);
	}
	
	{$rule}.cmsmasters_profile_horizontal .cmsmasters_img_social_wrap .profile_social_icons {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_link']) . ", .75);
	}
	
	{$rule}input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]):focus,
	{$rule}textarea:focus,
	{$rule}.cmsmasters_button:hover,
	{$rule}.button:hover,
	{$rule}input[type=submit]:hover,
	{$rule}input[type=button]:hover,
	{$rule}button:hover,
	{$rule}.cmsmasters-form-builder .form_info.submit_wrap .cmsmasters_button:hover,
	{$rule}table thead th,
	{$rule}.cmsmasters_header_search_form button,
	{$rule}.error_cont .error_button_wrap a,
	{$rule}.cmsmasters_content_slider .owl-pagination > div:hover,
	{$rule}.cmsmasters_content_slider .owl-pagination > div.active,
	{$rule}.cmsmasters_notice .notice_close:hover,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_default .cmsmasters_owl_slider .owl-pagination > div:hover,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_default .cmsmasters_owl_slider .owl-pagination > div.active,
	{$rule}.cmsmasters_post_masonry .cmsmasters_owl_slider .owl-pagination > div:hover,
	{$rule}.cmsmasters_post_masonry .cmsmasters_owl_slider .owl-pagination > div.active,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_timeline .cmsmasters_owl_slider .owl-pagination > div:hover,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_timeline .cmsmasters_owl_slider .owl-pagination > div.active,
	{$rule}.cmsmasters_open_post .cmsmasters_owl_slider .owl-pagination > div:hover,
	{$rule}.cmsmasters_open_post .cmsmasters_owl_slider .owl-pagination > div.active,
	{$rule}.post_nav {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}

	@media only screen and (max-width: 540px) {
		{$rule}.cmsmasters_mailpoet .cmsmasters_mailpoet_form .wysija-submit:hover {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		}

		
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	" . (($scheme == 'footer') ? ".footer .social_wrap a:hover," : '') . "
	" . (($scheme == 'default') ? ".headline_outer a:hover," : '') . "
	{$rule}a:hover,
	{$rule}h1 a:hover,
	{$rule}h2 a:hover,
	{$rule}h3 a:hover,
	{$rule}h4 a:hover,
	{$rule}h5 a:hover,
	{$rule}h6 a:hover,
	{$rule}.cmsmasters_open_profile .profile_social_icons_list a,
	{$rule}.cmsmasters_likes a,
	{$rule}.cmsmasters_comments a,
	{$rule}a.cmsmasters_cat_color:hover,
	{$rule}.cmsmasters_post_default .cmsmasters_post_cont .cmsmasters_post_cont_info  a:hover .cmsmasters_post_date,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_edit a:hover,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_meta a:hover,
	{$rule}.subpage_nav > span,
	{$rule}.cmsmasters_content_slider .owl-buttons > div:hover,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a:before,
	{$rule}.cmsmasters_post_default .cmsmasters_post_cont_info .cmsmasters_post_date,
	{$rule}.cmsmasters_icon_box .icon_box_text,
	{$rule}.cmsmasters_open_post .cmsmasters_post_cont_info *,
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_cont_info *,
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_cont_info *,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a:hover,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item.current_tab a:hover,
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title a:hover,
	{$rule}.cmsmasters_toggles .current_toggle .cmsmasters_toggle_title a,
	{$rule}.cmsmasters_profile_horizontal .cmsmasters_profile_header .cmsmasters_profile_subtitle,
	{$rule}.cmsmasters_profile_vertical .cmsmasters_profile_header .cmsmasters_profile_subtitle,
	{$rule}.cmsmasters_profile_vertical .profile_social_icons_list a,
	{$rule}.cmsmasters_profile_horizontal .profile_social_icons_list a,
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_cont_info,
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_cont_info *,
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date,
	{$rule}.cmsmasters_comment_item .cmsmasters_comment_item_date,
	{$rule}.cmsmasters_wrap_items_loader .cmsmasters_items_loader:hover,
	{$rule}.cmsmasters_post_category + .cmsmasters_post_author:before,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a:hover,
	{$rule}.cmsmasters_mailpoet .cmsmasters_mailpoet_form .wysija-submit:hover,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a,
	{$rule}.cmsmasters_project_puzzle .cmsmasters_project_category a,
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_type,
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a:hover,
	{$rule}.cmsmasters_open_project .owl-buttons > div:hover > span > span:before,
	{$rule}.widget_recent_entries .post-date,
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top:hover," : '') . " 
	{$rule}.cmsmasters_clients_slider_wrap.enable_arrow_control .owl-buttons > div:hover > span:before, 
	{$rule}.cmsmasters_clients_slider_wrap.enable_arrow_control .owl-buttons > div:hover > span:after,
	{$rule}.post_nav > span a + span:before,
	{$rule}.post_nav > span a + span:after,
	{$rule}.owl-pagination .owl-page:hover,
	{$rule}.owl-pagination .owl-page.active,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers:hover > span:before,
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers:hover > span:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
	}

	@media only screen and (max-width: 1024px) {
		.cmsmasters_header_search_form .search_bar_wrap .search_button button:hover {
			" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_hover']) . "
		}
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}h1,
	{$rule}h2,
	{$rule}h3,
	{$rule}h4,
	{$rule}h5,
	{$rule}h6,
	{$rule}h1 a,
	{$rule}h2 a,
	{$rule}h3 a,
	{$rule}h4 a,
	{$rule}h5 a,
	{$rule}h6 a,
	{$rule}fieldset legend,
	{$rule}blockquote,
	{$rule}blockquote footer,
	{$rule}table tfoot th,
	{$rule}table tfoot td,
	{$rule}table caption,
	{$rule}.cmsmasters_dropcap.type1,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li a:before,
	{$rule}.cmsmasters_stats .cmsmasters_stat_title,
	{$rule}.cmsmasters_post_default .cmsmasters_post_header .cmsmasters_post_title a,
	{$rule}.cmsmasters_stats .cmsmasters_stat_counter_wrap,
	{$rule}.cmsmasters_stats .cmsmasters_stat_inner:before,
	{$rule}.cmsmasters_notice .notice_close,
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title a,
	{$rule}.cmsmasters_twitter_wrap .published,
	{$rule}.cmsmasters_pricing_table .cmsmasters_price_wrap,
	{$rule}.cmsmasters_header_search_form .search_bar_wrap .search_button button,
	{$rule}.cmsmasters_quotes_slider .cmsmasters_quote_content,
	{$rule}.cmsmasters_post_default .cmsmasters_post_read_more:hover,
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_read_more:hover,
	{$rule}.search_bar_wrap .search_button button,
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_read_more:hover,
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_read_more:hover,
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_wrap.current_toggle .cmsmasters_toggle_title a,
	{$rule}.cmsmasters_likes a span, 
	{$rule}.cmsmasters_comments a span,
	{$rule}.cmsmasters_profile_header .cmsmasters_profile_title a,
	{$rule}.cmsmasters_quotes_slider .cmsmasters_quote_site a:hover,
	{$rule}.cmsmasters_prev_arrow:hover span:before, 
	{$rule}.cmsmasters_next_arrow:hover span:before,
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quote_content,
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quote_site a:hover,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item.current_tab a,
	{$rule}.post_nav > span.cmsmasters_next_post a,
	{$rule}.post_nav > span.cmsmasters_prev_post a, 
	{$rule}.cmsmasters_open_profile .profile_details_item_title,
	{$rule}.cmsmasters_open_profile .profile_features_item_title,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but,
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a,
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date span,
	{$rule}.cmsmasters_open_project .project_details_item_title,
	{$rule}.cmsmasters_open_project .project_features_item_title,
	{$rule}#wp-calendar thead th,
	{$rule}.widget_custom_contact_info_entries span,
	{$rule}.widget_custom_twitter_entries .tweet_time {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_icon_list_items .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}form .formError .formErrorContent,
	{$rule}.cmsmasters_hover_slider .cmsmasters_hover_slider_thumbs a:before,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:before,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item.pricing_best .cmsmasters_pricing_item_inner {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . "
	}

	{$rule}input::-webkit-input-placeholder {
		color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . ", .5);
	}
	
	{$rule}input:-moz-placeholder {
		color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . ", .5);
	}
	
	{$rule}textarea::-webkit-input-placeholder {
		color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . ", .5);
	}

	{$rule}textarea:-moz-placeholder {
		color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . ", .5);
	}

	{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range])::-webkit-input-placeholder {
		color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . ", 0.5);
		font-weight: 400;
	}

	{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]):-moz-placeholder {
		color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_heading']) . ", 0.5);
		font-weight: 400;
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	{$rule}mark,
	{$rule}.img_placeholder_small,
	{$rule}.img_placeholder,
	{$rule}form .formError .formErrorContent,
	{$rule}table thead th,
	{$rule}.cmsmasters_button:hover,
	{$rule}.button:hover,
	{$rule}input[type=submit]:hover,
	{$rule}input[type=button]:hover,
	{$rule}button:hover,
	{$rule}.cmsmasters-form-builder .form_info.submit_wrap .cmsmasters_button:hover,
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_header_search_form .cmsmasters_header_search_form_close,
	{$rule}.cmsmasters_header_search_form button,
	{$rule}.cmsmasters_icon_wrap a .cmsmasters_simple_icon,
	{$rule}.cmsmasters_header_search_form button:hover,
	{$rule}.error_cont .error_button_wrap a,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon_wrap,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_notice .notice_close:hover,
	{$rule}.cmsmasters_profile_horizontal .cmsmasters_img_social_wrap .profile_social_icons_list a,
	{$rule}.cmsmasters_profile_horizontal .cmsmasters_img_wrap.no_image > span,
	{$rule}.cmsmasters_profile_vertical .cmsmasters_img_wrap.no_image > span {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_header_search_form input::-webkit-input-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_header_search_form input:-moz-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	" . (($scheme == 'default') ? ".middle_inner," : '') . "
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:before,
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:before,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:before,
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:before,
	{$rule}input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}textarea,
	{$rule}option,
	{$rule}.cmsmasters_button,
	{$rule}.button,
	{$rule}input[type=submit],
	{$rule}input[type=button],
	{$rule}button,
	{$rule}.cmsmasters-form-builder .form_info.submit_wrap .cmsmasters_button,
	{$rule}.error_cont .error_button_wrap a:hover,
	{$rule}.cmsmasters_clients_item span,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before,
	{$rule}.cmsmasters_content_slider .owl-buttons > div,
	{$rule}.cmsmasters_notice .notice_close,
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_cont_wrap_inner,
	{$rule}.cmsmasters_wrap_items_loader .cmsmasters_items_loader,
	{$rule}.cmsmasters_wrap_items_loader .cmsmasters_items_loader:hover,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a:hover,
	{$rule}.header_mid .cmsmasters_header_search_form,
	{$rule}.header_bot .cmsmasters_header_search_form,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but,
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:hover,
	{$rule}.cmsmasters_prev_arrow, 
	{$rule}.cmsmasters_next_arrow, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button,
	{$rule}.cmsmasters_project_grid .cmsmasters_project_footer,
	{$rule}.cmsmasters_project_puzzle .project_inner_cont,
	{$rule}.cmsmasters_open_project .owl-buttons > div,
	.header_bot input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}.header_mid input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}#wp-calendar thead th,
	{$rule}.widget_custom_popular_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_title,
	{$rule}.widget_custom_latest_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_title {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_header_search_form button:hover,
	{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]):focus,
	{$rule}.cmsmasters_content_slider .owl-pagination > div,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_default .cmsmasters_owl_slider .owl-pagination > div,
	{$rule}.cmsmasters_post_masonry .cmsmasters_owl_slider .owl-pagination > div,
	{$rule}#page:not(.fullwidth) .cmsmasters_post_timeline .cmsmasters_owl_slider .owl-pagination > div,
	{$rule}.cmsmasters_open_post .cmsmasters_owl_slider .owl-pagination > div {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}

	@media only screen and (max-width: 1024px) {
		{$rule}.cmsmasters_header_search_form .search_bar_wrap .search_button button,
		{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]) {
			" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		}

		{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range])::-webkit-input-placeholder {
			color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . ", 1);
			font-weight: 400;
		}
	
		{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]):-moz-placeholder {
			color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . ", 1);
			font-weight: 400;
		}
	}

	@media only screen and (max-width: 540px) {
		{$rule}.cmsmasters_mailpoet .cmsmasters_mailpoet_form .wysija-submit {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		}

		{$rule}.cmsmasters_mailpoet .cmsmasters_mailpoet_form .wysija-submit:hover {
			" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		}

	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}fieldset,
	{$rule}fieldset legend,
	{$rule}.cmsmasters_featured_block,
	{$rule}.gallery-item .gallery-icon,
	{$rule}.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_alternate']) . "
	}

	{$rule}#page #yith-ajaxsearchform select, 
	{$rule}#page .yith-ajaxsearchform_form select {
		background-color: rgba(" . cmsmasters_color2rgb($cmsmasters_option['devicer' . '_' . $scheme . '_alternate']) . ", 0.3);
	}

	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive:before,
	{$rule}.blog.timeline:before,
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_timeline_circle,
	{$rule}.headline_outer .headline_inner .headline_inner_border:after,
	{$rule}ul li:before,
	{$rule}.owl-pagination .owl-page {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_border']) . "
	}
	
	" . (($scheme == 'footer') ? ".footer" : '') . "
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_info, 
	{$rule}input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}textarea,
	{$rule}select,
	{$rule}option,
	{$rule}hr,
	{$rule}table td,
	{$rule}table th,
	{$rule}.cmsmasters_button,
	{$rule}.button,
	{$rule}input[type=submit],
	{$rule}input[type=button],
	{$rule}button,
	{$rule}.wp-caption,
	{$rule}.cmsmasters-form-builder .form_info.submit_wrap .cmsmasters_button,
	{$rule}.cmsmasters_divider,
	{$rule}.cmsmasters_widget_divider,
	{$rule}.cmsmasters_img.with_caption,
	{$rule}.cmsmasters_icon_wrap .cmsmasters_simple_icon, 
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_icon:after,
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:before,
	{$rule}.error_cont .error_button_wrap a:hover,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:after,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:after,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_icon_list_type_block .cmsmasters_icon_list_item,
	{$rule}.cmsmasters_gallery .cmsmasters_gallery_item.cmsmasters_caption figure,
	{$rule}.cmsmasters_notice,
	{$rule}.cmsmasters_notice .notice_close,
	{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list_item,
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_wrap,
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_wrap,
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item_inner,
	{$rule}.cmsmasters_open_profile .profile_details_item,
	{$rule}.cmsmasters_post_default .cmsmasters_post_cont,
	{$rule}.cmsmasters_post_default .cmsmasters_img_wrap,
	{$rule}.cmsmasters_open_profile .profile_features_item,
	{$rule}.owl-pagination .owl-page,
	{$rule}#page #yith-ajaxsearchform select, 
	{$rule}#page .yith-ajaxsearchform_form select,
	{$rule}.cmsmasters_wrap_pagination,
	{$rule}.cmsmasters_wrap_items_loader,
	{$rule}.cmsmasters_open_project .project_details_item,
	{$rule}.headline_outer .headline_inner .headline_inner_border,
	{$rule}.cmsmasters_open_project .project_features_item,
	{$rule}.widget_custom_contact_info_entries > span,
	{$rule}.widget_nav_menu ul li a,
	{$rule}.widget_custom_twitter_entries ul li {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_border']) . "
	}

	{$rule}.footer {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_footer_border']) . "
	}
	/* Finish Borders Color */


	/* Finish Secondary Color */

	
	/* Start Header Bottom Custom Rules */
	{$rule}.header_bot ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['devicer' . '_header_mid_hover']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.header_bot ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['devicer' . '_header_mid_hover']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Header Bottom Custom Rules */

	
	/* Start Custom Rules */
	{$rule}::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . ";
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_footer' . '_hover']) . "
	}
	
	{$rule}::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	";
	
	
	if ($scheme != 'default') {
		$custom_css .= "
		.cmsmasters_color_scheme_{$scheme}.cmsmasters_row_top_zigzag:before, 
		.cmsmasters_color_scheme_{$scheme}.cmsmasters_row_bot_zigzag:after {
			background-image: -webkit-linear-gradient(135deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-webkit-linear-gradient(45deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -moz-linear-gradient(135deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-moz-linear-gradient(45deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -ms-linear-gradient(135deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-ms-linear-gradient(45deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -o-linear-gradient(135deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-o-linear-gradient(45deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: linear-gradient(315deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					linear-gradient(45deg, " . $cmsmasters_option['devicer' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
		}
		";
	}
	
	
	$custom_css .= "
	/* Finish Custom Rules */

/***************** Finish {$title} Color Scheme Rules ******************/


/***************** Start {$title} Button Color Scheme Rules ******************/
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_bd_underline {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bd_underline:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:hover, 
	{$rule}.cmsmasters_button.cm.sms_but_bg_expand_hor:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:after {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['devicer' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['devicer' . '_' . $scheme . '_bg']) . "
	}

/***************** Finish {$title} Button Color Scheme Rules ******************/


";
	}
	
	
	return apply_filters('devicer_theme_colors_primary_filter', $custom_css);
}

