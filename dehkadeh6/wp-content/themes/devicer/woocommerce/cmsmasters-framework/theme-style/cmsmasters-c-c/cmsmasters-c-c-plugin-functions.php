<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * WooCommerce Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function devicer_woocommerce_register_c_c_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('devicer-woocommerce-extend', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-plugin-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('devicer-woocommerce-extend', 'cmsmasters_woocommerce_shortcodes', array( 
			'product_ids' => 								devicer_woocommerce_product_ids(), 
			'product_cat' => 								devicer_woocommerce_product_cat(), 
			'products_title' =>								esc_html__('Products', 'devicer'), 
			'products_shortcode_title' =>					esc_html__('WooCommerce Shortcode', 'devicer'), 
			'products_shortcode_descr' =>					esc_html__('Choose a WooCommerce shortcode to use', 'devicer'), 
			'choice_recent_products' =>						esc_html__('Recent Products', 'devicer'), 
			'choice_featured_products' =>					esc_html__('Featured Products', 'devicer'), 
			'choice_product_categories' =>					esc_html__('Product Categories', 'devicer'), 
			'choice_sale_products' =>						esc_html__('Sale Products', 'devicer'), 
			'choice_best_selling_products' =>				esc_html__('Best Selling Products', 'devicer'), 
			'choice_top_rated_products' =>					esc_html__('Top Rated Products', 'devicer'),
			'choice_small_product' =>						esc_html__('Small Product', 'devicer'),
			'choice_full_product' =>						esc_html__('Full Product', 'devicer'),   
			'products_field_orderby_descr' =>				esc_html__("Choose your products 'order by' parameter", 'devicer'), 
			'products_field_orderby_descr_note' =>			esc_html__("Sorting will not be applied for", 'devicer'), 
			'products_field_prod_number_title' =>			esc_html__('Number of Products', 'devicer'), 
			'products_field_prod_number_descr' =>			esc_html__('Enter the number of products for showing per page', 'devicer'), 
			'products_field_col_count_descr' =>				esc_html__('Choose number of products per row', 'devicer'), 
			'selected_products_title' =>					esc_html__('Selected Products', 'devicer'),
			'single_products_shortcode_title' =>			esc_html__('Select Style', 'devicer'),
			'product_signle_field_prmeta_title' =>			esc_html__('Product Metadata', 'devicer'),
			'product_single_field_prmeta_descr' =>			esc_html__('Choose product metadata you want to be shown', 'devicer'),
			'product_single_field_choice_descriptions' =>	esc_html__('Description', 'devicer'),
			'product_single_field_choice_rating' =>			esc_html__('Rating', 'devicer'),
			'product_single_field_choice_price' =>			esc_html__('Price', 'devicer'),
			'single_products_title' =>						esc_html__('Single Products', 'devicer'),  
			'selected_products_field_ids' => 				esc_html__('Products', 'devicer'), 
			'selected_products_field_ids_descr' => 			esc_html__('Choose products to be shown', 'devicer'), 
			'selected_products_field_ids_descr_note' => 	esc_html__('All products will be shown if empty', 'devicer') 
		));
	}
}

add_action('admin_enqueue_scripts', 'devicer_woocommerce_register_c_c_scripts');



/* Product IDs */
function devicer_woocommerce_product_ids() {
	$product_ids = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'product'
	));
	
	
	$out = array();
	
	
	if (!empty($product_ids)) {
		foreach ($product_ids as $product_id) {
			$out[$product_id->ID] = esc_html($product_id->post_title);
		}
	}
	
	
	return $out;
}



/* Product Categories */
function devicer_woocommerce_product_cat() {
	$categories = get_terms('product_cat', array( 
		'hide_empty' => 0 
	));
	
	
	$out = array();
	
	
	if (!empty($categories)) {
		foreach ($categories as $category) {
			$out[$category->slug] = esc_html($category->name);
		}
	}
	
	
	return $out;
}

