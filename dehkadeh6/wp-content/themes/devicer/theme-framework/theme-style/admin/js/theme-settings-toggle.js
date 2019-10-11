/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.0
 * 
 * Theme Admin Settings Toggles Scripts
 * Created by CMSMasters
 * 
 */


(function ($) { 
	"use strict";
	
	/* General 'Header' Tab Fields Load */
	if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'default') {
		$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').show();
		$('#' + cmsmasters_theme_settings.shortname + '_header_search_bottom').parents('tr').show();
		$('#' + cmsmasters_theme_settings.shortname + '_header_search').parents('tr').hide();
	}
	
	
	if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'c_nav') {
		$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').hide();
	}
	
	
	if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_add_cont"]:checked').val() !== 'cust_html') {
		$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').hide();
	}
	
	if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'default') {
		$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').show();
	}

	if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() !== 'default') {
		$('#' + cmsmasters_theme_settings.shortname + '_header_search_bottom').parents('tr').hide();
	}

	if ($('#' + cmsmasters_theme_settings.shortname + '_second_menu_enable').is(':not(:checked)')) {
		$('#' + cmsmasters_theme_settings.shortname + '_category_menu_title').parents('tr').hide();
		$('#' + cmsmasters_theme_settings.shortname + '_second_menu_open').parents('tr').hide();
	}
	
	
	/* General 'Header' Tab Fields Change */
	$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]').on('change', function () {
		if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'default') {
			$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').show();
		}
	} );

	$('#' + cmsmasters_theme_settings.shortname + '_second_menu_enable').on('change', function () { 
		if ($('#' + cmsmasters_theme_settings.shortname + '_second_menu_enable').is(':checked')) {
			$('#' + cmsmasters_theme_settings.shortname + '_category_menu_title').parents('tr').show();
			$('#' + cmsmasters_theme_settings.shortname + '_second_menu_open').parents('tr').show();
		} else {
			$('#' + cmsmasters_theme_settings.shortname + '_category_menu_title').parents('tr').hide();
			$('#' + cmsmasters_theme_settings.shortname + '_second_menu_open').parents('tr').hide();
		}
	} );

	
	
	$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]').on('change', function () { 
		if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'default') {
			$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').show();
			$('#' + cmsmasters_theme_settings.shortname + '_header_search_bottom').parents('tr').show();
			$('#' + cmsmasters_theme_settings.shortname + '_header_search').parents('tr').hide();
		} else if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]:checked').val() === 'c_nav') {
			$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').hide();
			$('#' + cmsmasters_theme_settings.shortname + '_second_menu_enable').parents('tr').hide();
		} else {
			$('#' + cmsmasters_theme_settings.shortname + '_second_menu_enable').parents('tr').show();
			$('#' + cmsmasters_theme_settings.shortname + '_header_search').parents('tr').show();
			$('#' + cmsmasters_theme_settings.shortname + '_header_search_bottom').parents('tr').hide();
			if ($('input[name*="' + cmsmasters_theme_settings.shortname + '_header_add_cont"]:checked').val() === 'cust_html') {
				$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').show();
			} else {
				$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').hide();
			}
		}
	} );
} )(jQuery);

