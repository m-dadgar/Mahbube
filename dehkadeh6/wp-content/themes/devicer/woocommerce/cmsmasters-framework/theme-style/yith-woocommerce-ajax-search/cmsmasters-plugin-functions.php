<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Yith WooCommerce Ajax Search Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts for Yith WooCommerce Ajax Search Plugin */
require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-ajax-search/function/plugin-template-functions.php');

require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-ajax-search/function/plugin-colors.php');

require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-ajax-search/function/plugin-fonts.php');



/* Register CSS Styles and Scripts for Yith WooCommerce Ajax Search Plugin */
function devicer_yith_woocommerce_ajax_search_register_styles_scripts() {

	wp_enqueue_style('devicer-yith-woocommerce-ajax-search-style', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-ajax-search/css/plugin-style.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('devicer-yith-woocommerce-ajax-search-adaptive', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-ajax-search/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('devicer-yith-woocommerce-ajax-search-rtl', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-ajax-search/css/plugin-rtl.css', array(), '1.0.0', 'screen');
	}
	
}

add_action('wp_enqueue_scripts', 'devicer_yith_woocommerce_ajax_search_register_styles_scripts');



/* Yith WooCommerce Ajax Search Default */
function devicer_ajax_search_colors_default() {
	if (!get_option('cmsmasters_devicer_ajax_search_first_active')) {
		update_option('yith_wcas_search_submit_label', '');
		
		add_option('cmsmasters_devicer_ajax_search_first_active', 'true');
	}
}

add_action('init', 'devicer_ajax_search_colors_default');

/* Yith WooCommerce Ajax Search Premium Default */
if (defined('YITH_WCAS_PREMIUM')) {
	function devicer_ajax_search_premium_colors_default() {
		if (!get_option('cmsmasters_devicer_ajax_search_premium_first_active')) {
			update_option('yith_wcas_sale_badge_bgcolor', '');
			update_option('yith_wcas_sale_badge_color', '');
			update_option('yith_wcas_featured_badge_bgcolor', '');
			update_option('yith_wcas_featured_badge_color', '');
			update_option('yith_wcas_outofstock_badge_bgcolor', '');
			update_option('yith_wcas_outofstock_badge_color', '');
			update_option('yith_wcas_search_title_color', '');
			
			add_option('cmsmasters_devicer_ajax_search_premium_first_active', 'true');
		}
	}

	add_action('init', 'devicer_ajax_search_premium_colors_default');
}

function devicer_wpse_remove_inline_style_search( $handler ) {
	wp_style_is( $handler, 'enqueued' ) 
 && wp_style_add_data( 'yith_wcas_frontend', 'after', '' );
}


function devicer_ajax_search_inline_style() {
	$padding_to_item          = ( get_option( 'yith_wcas_show_sale_badge' ) == 'yes' ) ? '20px' : '0px';
	$sale_badge_bgcolor       = get_option( 'yith_wcas_sale_badge_bgcolor' );
	$sale_badge_color         = get_option( 'yith_wcas_sale_badge_color' );
	$outofstock_badge_bgcolor = get_option( 'yith_wcas_outofstock_badge_bgcolor' );
	$outofstock_badge_color   = get_option( 'yith_wcas_outofstock_badge_color' );
	$featured_badge_bgcolor   = get_option( 'yith_wcas_featured_badge_bgcolor' );
	$featured_badge_color     = get_option( 'yith_wcas_featured_badge_color' );
	$thumb_size               = get_option( 'yith_wcas_search_show_thumbnail_dim' );
	$title_color              = get_option( 'yith_wcas_search_title_color' );
	$min_height               = $thumb_size + 10;

	devicer_wpse_remove_inline_style_search('yith_wcas_frontend');
	
	$custom_css = "";

	if ($padding_to_item != "") {
		$custom_css .= ".autocomplete-suggestion{
			padding-right: {$padding_to_item};
		}";
	}

	if ($sale_badge_bgcolor != "") {
		$custom_css .= ".woocommerce .autocomplete-suggestion  span.yith_wcas_result_on_sale,
		.autocomplete-suggestion  span.yith_wcas_result_on_sale{
				background: {$sale_badge_bgcolor};
				color: {$sale_badge_color}
		}";
	}

	if ($outofstock_badge_bgcolor != "") {
		$custom_css .= ".woocommerce .autocomplete-suggestion  span.yith_wcas_result_outofstock,
		.autocomplete-suggestion  span.yith_wcas_result_outofstock{
				background: {$outofstock_badge_bgcolor};
				color: {$outofstock_badge_color}
		}";
	}

	if ($featured_badge_bgcolor != "") {
		$custom_css .= ".woocommerce .autocomplete-suggestion  span.yith_wcas_result_featured,
		.autocomplete-suggestion  span.yith_wcas_result_featured{
				background: {$featured_badge_bgcolor};
				color: {$featured_badge_color}
		}";
	}

	if ($thumb_size != "") {
		$custom_css .= ".autocomplete-suggestion img{
			width: {$thumb_size}px;
		}";
	}

	if ($title_color != "") {
		$custom_css .= ".autocomplete-suggestion .yith_wcas_result_content .title{
			color: {$title_color};
		}";
	}

	if( get_option( 'yith_wcas_show_thumbnail' ) != 'none'){
		$custom_css .= ".autocomplete-suggestion{
							min-height: {$min_height}px;
						}";
	}
	wp_add_inline_style( 'yith_wcas_frontend', $custom_css );
}

add_action( 'wp_print_styles', 'devicer_ajax_search_inline_style');