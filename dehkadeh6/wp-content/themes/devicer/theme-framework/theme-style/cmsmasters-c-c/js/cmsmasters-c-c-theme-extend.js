/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.0
 * 
 * Theme Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */



/**
 * Сlient Extend
 */

var cmsmasters_client_new_fields = {};


for (var id in cmsmastersMultipleShortcodes.cmsmasters_client.fields) {
	if (id === 'link') {
		cmsmasters_client_new_fields['logo_overlay'] = { 
			type : 			'upload', 
			title : 		cmsmasters_theme_shortcodes.client_field_logo_overlay_title, 
			descr : 		cmsmasters_theme_shortcodes.client_field_logo_overlay_descr, 
			def : 			'', 
			required : 		true, 
			width : 		'half', 
			frame : 		'post', 
			library : 		'image', 
			multiple : 		false, 
			description : 	false, 
			caption : 		false, 
			align : 		false, 
			link : 			false, 
			size : 			false 
		};
		
		
		cmsmasters_client_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_client.fields[id];
	} else {
		cmsmasters_client_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_client.fields[id];
	}
}


cmsmastersMultipleShortcodes.cmsmasters_client.fields = cmsmasters_client_new_fields;



/**
 * Stats Extend
 */

var cmsmasters_stats_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_stats.fields) {
	if (id === 'type') {
		delete cmsmastersShortcodes.cmsmasters_stats.fields[id];
	} else if (id === 'count') {
		cmsmastersShortcodes.cmsmasters_stats.fields[id]['depend'] = 'mode:circles';
		
		
		cmsmasters_stats_new_fields[id] = cmsmastersShortcodes.cmsmasters_stats.fields[id];
	} else {
		cmsmasters_stats_new_fields[id] = cmsmastersShortcodes.cmsmasters_stats.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_stats.fields = cmsmasters_stats_new_fields;



/**
 * Pricing Table Extend
 */

var cmsmasters_pricing_table_item_new_fields = {};


for (var id in cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields) {
	if (id === 'best_bg_color') {
		cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields[id]['title'] = cmsmasters_theme_shortcodes.pricing_offer_field_best_offer_bd_title;
		cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields[id]['descr'] = cmsmasters_theme_shortcodes.pricing_offer_field_best_offer_bd_descr;
		
		cmsmasters_pricing_table_item_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields[id];
	} else {
		cmsmasters_pricing_table_item_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields[id];
	}
}


cmsmastersMultipleShortcodes.cmsmasters_pricing_table_item.fields = cmsmasters_pricing_table_item_new_fields;



/**
 * Posts Slider Extend
 */

var cmsmasters_posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (cmsmasters_theme_shortcodes.cmsmasters_woo_exists === 'true') {
		if (id === 'post_type') {
			cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises'] = {
				'post' : 		cmsmasters_shortcodes.posts_slider_field_poststype_choice_post, 
				'project' : 	cmsmasters_shortcodes.posts_slider_field_poststype_choice_project, 
				'product' : 	cmsmasters_theme_shortcodes.posts_slider_field_poststype_choice_product 
			};
			
			
			cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
		} else if (id === 'portfolio_categories') {
			cmsmasters_posts_slider_new_fields['product_categories'] = {
				type : 		'select_multiple', 
				title : 	cmsmasters_theme_shortcodes.posts_slider_field_prcateg_title, 
				descr : 	cmsmasters_theme_shortcodes.posts_slider_field_prcateg_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_theme_shortcodes.posts_slider_field_prcateg_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_theme_shortcodes.product_cat, 
				depend : 	'post_type:product' 
			}; 
				
			cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
		} else if (id === 'portfolio_metadata') {
			cmsmasters_posts_slider_new_fields['product_metadata'] = {
				type : 		'checkbox', 
				title : 	cmsmasters_theme_shortcodes.posts_slider_field_prmeta_title, 
				descr : 	cmsmasters_theme_shortcodes.posts_slider_field_prmeta_descr, 
				def : 		'rating,title,categories,price', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'rating' : 		cmsmasters_theme_shortcodes.choice_rating, 
							'title' : 		cmsmasters_shortcodes.choice_title, 
							'categories' : 	cmsmasters_shortcodes.choice_categories, 
							'price' : 		cmsmasters_theme_shortcodes.choice_price 
				}, 
				depend : 	'post_type:product' 
			}; 
				
			cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
		} else {
			cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
		}
	}


	if (id === 'amount') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'columns') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'portfolio_metadata') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises']['excerpt'];
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = cmsmasters_posts_slider_new_fields;



/**
 * Blog Extend
 */

var cmsmasters_blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	if (id === 'filter_text') {
		delete cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		cmsmasters_blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = cmsmasters_blog_new_fields;



/**
 * Portfolio Extend
 */

var cmsmasters_portfolio_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_portfolio.fields) {
	if (id === 'filter_text') {
		delete cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else {
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_portfolio.fields = cmsmasters_portfolio_new_fields;
