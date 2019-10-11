<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Theme Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function devicer_theme_register_c_c_scripts() {
	global $pagenow;
	
	if (CMSMASTERS_WOOCOMMERCE) {
		$cmsmasters_woo_exists = 'true';
	} else {
		$cmsmasters_woo_exists = 'false';
	}
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('devicer-composer-shortcodes-extend', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-theme-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		

		if (CMSMASTERS_WOOCOMMERCE) {
			wp_localize_script('devicer-composer-shortcodes-extend', 'cmsmasters_theme_shortcodes', array( 
				/* Client */
				'client_field_logo_overlay_title' => 			esc_attr__('Logo Overlay', 'devicer'), 
				'client_field_logo_overlay_descr' => 			esc_attr__('Choose this client logo overlay', 'devicer'), 
				/* Pricing Table */
				'pricing_offer_field_best_offer_bd_title' => 	esc_attr__('Best Offer Border Color', 'devicer'), 
				'pricing_offer_field_best_offer_bd_descr' => 	esc_attr__('Choose border color for this pricing table best offer', 'devicer'),
				'cmsmasters_woo_exists' => 					$cmsmasters_woo_exists, 
				'product_cat' => 								devicer_woocommerce_product_cat(), 
				'posts_slider_field_poststype_choice_product' => esc_attr__('Shop products', 'devicer'), 
				'posts_slider_field_prcateg_title' => 		esc_attr__('Product Categories', 'devicer'), 
				'posts_slider_field_prcateg_descr' => 		esc_attr__('Show product associated with certain categories', 'devicer'), 
				'posts_slider_field_prcateg_descr_note' => 	esc_attr__('If you dont choose any product categories, all your product will be shown', 'devicer'), 
				'posts_slider_field_prmeta_title' => 		esc_attr__('Product Metadata', 'devicer'), 
				'posts_slider_field_prmeta_descr' => 		esc_attr__('Choose product metadata you want to be shown', 'devicer'), 
				'choice_rating' => 							esc_attr__('Rating', 'devicer'), 
				'choice_price' => 							esc_attr__('Price', 'devicer'), 
			));
		} else {
			wp_localize_script('devicer-composer-shortcodes-extend', 'cmsmasters_theme_shortcodes', array( 
				/* Client */
				'client_field_logo_overlay_title' => 			esc_attr__('Logo Overlay', 'devicer'), 
				'client_field_logo_overlay_descr' => 			esc_attr__('Choose this client logo overlay', 'devicer'), 
				/* Pricing Table */
				'pricing_offer_field_best_offer_bd_title' => 	esc_attr__('Best Offer Border Color', 'devicer'), 
				'pricing_offer_field_best_offer_bd_descr' => 	esc_attr__('Choose border color for this pricing table best offer', 'devicer'),
				'cmsmasters_woo_exists' => 					$cmsmasters_woo_exists, 
				'posts_slider_field_poststype_choice_product' => esc_attr__('Shop products', 'devicer'), 
				'posts_slider_field_prcateg_title' => 		esc_attr__('Product Categories', 'devicer'), 
				'posts_slider_field_prcateg_descr' => 		esc_attr__('Show product associated with certain categories', 'devicer'), 
				'posts_slider_field_prcateg_descr_note' => 	esc_attr__('If you dont choose any product categories, all your product will be shown', 'devicer'), 
				'posts_slider_field_prmeta_title' => 		esc_attr__('Product Metadata', 'devicer'), 
				'posts_slider_field_prmeta_descr' => 		esc_attr__('Choose product metadata you want to be shown', 'devicer'), 
				'choice_rating' => 							esc_attr__('Rating', 'devicer'), 
				'choice_price' => 							esc_attr__('Price', 'devicer'), 
			));
		}
	}
}

add_action('admin_enqueue_scripts', 'devicer_theme_register_c_c_scripts');


// Counters Shortcode Attributes Filter
add_filter('cmsmasters_client_atts_filter', 'cmsmasters_client_atts');

function cmsmasters_client_atts() {
	return array( 
		'shortcode_id' => 	'', 
		'logo' => 			'', 
		'logo_overlay' => 	'', 
		'link' => 			'', 
		'target' => 		'blank', 
		'classes' => 		'' 
	);
}


// Posts Slider Shortcode Attributes Filter
add_filter('cmsmasters_posts_slider_atts_filter', 'cmsmasters_posts_slider_atts');

function cmsmasters_posts_slider_atts() {
	return array( 
		'shortcode_id' => 			'', 
		'orderby' => 				'', 
		'order' => 					'', 
		'post_type' => 				'', 
		'blog_categories' => 		'', 
		'portfolio_categories' => 	'', 
		'columns' => 				'', 
		'count' => 					'', 
		'pause' => 					'', 
		'speed' => 					'', 
		'blog_metadata' => 			'', 
		'portfolio_metadata' => 	'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'',
		'product_metadata' => 		'rating,title,categories,price', 
		'product_categories' => 	''  
	);
}
