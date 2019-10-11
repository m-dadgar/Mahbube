<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * WooCommerce Content Composer Shortcodes
 * Created by CMSMasters
 * 
 */


function devicer_woocommerce_shortcodes($shortcodes) {
	$shortcodes[] = 'cmsmasters_products';
	
	$shortcodes[] = 'cmsmasters_selected_products';

	$shortcodes[] = 'cmsmasters_selected_single_products';
	
	
	return $shortcodes;
}

add_filter('cmsmasters_custom_shortcodes_filter', 'devicer_woocommerce_shortcodes');


/**
 * Products
 */
function cmsmasters_products($atts, $content = null) {
	extract(shortcode_atts(array( 
		'shortcode_id' => 			'', 
		'products_shortcode' => 	'recent_products', 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'count' => 					'10', 
		'columns' => 				'4', 
		'classes' => 				'' 
	), $atts));
	
	
    $out = '<div class="cmsmasters_products_shortcode' . ' cmsmasters_' . $products_shortcode . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	if (!is_admin()) {
		$out .= do_shortcode('[' . $products_shortcode . ' ' . (($products_shortcode != 'best_selling_products' && $products_shortcode != 'top_rated_products') ? 'orderby="' . $orderby . '" order="' . $order . '" ' : '') . 'limit="' . $count . '" columns="' . $columns . '"]');
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}



/**
 * Selected Products
 */
function cmsmasters_selected_products($atts, $content = null) {
	extract(shortcode_atts(array( 
		'shortcode_id' => 			'', 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'ids' => 					'', 
		'columns' => 				'4', 
		'classes' => 				'' 
	), $atts));
	
	
    $out = '<div class="cmsmasters_selected_products_shortcode' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	if (!is_admin()) {
		$out .= do_shortcode('[products orderby="' . $orderby . '" order="' . $order . '" columns="' . $columns . '" ids="' . $ids . '"]');
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}


/**
 * Single Products
 */
 function cmsmasters_selected_single_products($atts, $content = null) {
	$new_atts = apply_filters('cmsmasters_product_category_atts_filter', array( 
		'shortcode_id' => 				'', 
		'single_products_shortcode' => 	'small_product', 
		'ids' => 						'',
		'product_metadata' => 			'', 
		'classes' => 					'' 
    ) );
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = $shortcode_id;
	
	
	$product_category_atts = array(
		'cmsmasters_product_metadata' 	=> $product_metadata,
		'single_products_shortcode'		=> $single_products_shortcode
	);
	
	
	$include_ids = explode(',', $ids);
	
	
    $args = array( 
		'post_type' => 				'product', 
		'posts_per_page' => 		-1, 
		'post__in' => 				$include_ids, 
		'ignore_sticky_posts' => 	true 
	);
	
	
	$query = new WP_Query($args);
	
	
	$out = '';
	
	
	if ($query->have_posts()) : 
	
		$out .= '<div id="cmsmasters_product_single_shortcode_' . esc_attr($unique_id) . '" class="cmsmasters_product_single_shortcode' . 
		(($classes != '') ? ' ' . $classes : '') . ' ' . $single_products_shortcode . '"'.
		'>';
		
			$out .= '<div class="woocommerce">' . 
				'<ul class="products cmsmasters_products">';
			
					while ($query->have_posts()) : $query->the_post();
						
						$out .= cmsmasters_composer_ob_load_template('woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/template/content-product-single-shortcode.php', $product_category_atts);
						
					endwhile;
					
				$out .= '</ul>' . 
			'</div>';
			
			
		$out .= '</div>';
		
	endif;
	
	
	wp_reset_postdata();
	
	
	return $out;
}