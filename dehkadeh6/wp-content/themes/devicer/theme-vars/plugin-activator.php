<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * TGM-Plugin-Activation 2.6.1
 * Created by CMSMasters
 * 
 */


require_once(get_template_directory() . '/framework/class/class-tgm-plugin-activation.php');


if (!function_exists('devicer_register_theme_plugins')) {

function devicer_register_theme_plugins() { 
	$plugins = array( 
		array( 
			'name'					=> esc_html__('CMSMasters Contact Form Builder', 'devicer'), 
			'slug'					=> 'cmsmasters-contact-form-builder', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-contact-form-builder.zip', 
			'required'				=> false, 
			'version'				=> '1.4.7', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Content Composer', 'devicer'), 
			'slug'					=> 'cmsmasters-content-composer', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-content-composer.zip', 
			'required'				=> true, 
			'version'				=> '2.3.8', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Custom Fonts', 'devicer'), 
			'slug'					=> 'cmsmasters-custom-fonts', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-custom-fonts.zip', 
			'required'				=> true, 
			'version'				=> '1.0.1', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Mega Menu', 'devicer'), 
			'slug'					=> 'cmsmasters-mega-menu', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-mega-menu.zip', 
			'required'				=> true, 
			'version'				=> '1.2.9',
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Importer', 'devicer'), 
			'slug'					=> 'cmsmasters-importer', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-importer.zip', 
			'required'				=> true, 
			'version'				=> '1.0.5', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('LayerSlider WP', 'devicer'), 
			'slug' 					=> 'LayerSlider', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/LayerSlider.zip', 
			'required'				=> false, 
			'version'				=> '6.8.2', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('Revolution Slider', 'devicer'), 
			'slug' 					=> 'revslider', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/revslider.zip', 
			'required'				=> false, 
			'version'				=> '5.4.8.3', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('Envato Market', 'devicer'), 
			'slug'					=> 'envato-market', 
			'source'				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('GDPR Cookie Consent', 'devicer'), 
			'slug'					=> 'cookie-law-info', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('WooCommerce', 'devicer'), 
			'slug' 					=> 'woocommerce', 
			'required'				=> false 
		),
		array( 
			'name' 					=> esc_html__('YITH WooCommerce Compare', 'devicer'), 
			'slug' 					=> 'yith-woocommerce-compare', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('Yith WooCommerce Quick View', 'devicer'), 
			'slug'					=> 'yith-woocommerce-quick-view', 
			'required'				=> false 
		 ),
		 array( 
			'name'					=> esc_html__('Yith WooCommerce Zoom Magnifier', 'devicer'), 
			'slug'					=> 'yith-woocommerce-zoom-magnifier', 
			'required'				=> false 
 		),
		array( 
			'name' 					=> esc_html__('Contact Form 7', 'devicer'), 
			'slug' 					=> 'contact-form-7', 
			'required' 				=> false 
		), 
		array( 
			'name' 					=> esc_html__('WordPress SEO by Yoast', 'devicer'), 
			'slug' 					=> 'wordpress-seo', 
			'required' 				=> false 
		), 
		array( 
			'name'					=> esc_html__('MailPoet 3', 'devicer'), 
			'slug'					=> 'mailpoet', 
			'required'				=> false 
		)
	);
	

	if (!CMSMASTERS_WCPC_PREMIUM) {
		$plugins_countdown = array (
			array( 
				'name' 					=> esc_html__('YITH WooCommerce Product Countdown', 'devicer'), 
				'slug' 					=> 'yith-woocommerce-product-countdown', 
				'source'				=> get_template_directory() . '/theme-vars/plugins/yith-woocommerce-product-countdown.zip', 
				'required'				=> false, 
				'version'				=> '1.2.6', 
				'force_activation'		=> false, 
				'force_deactivation' 	=> false 
			)
		);
	} 


	if (!CMSMASTERS_WCWL_PREMIUM) {
		$plugins_wishlist = array (
			array( 
				'name' 					=> esc_html__('YITH WooCommerce Wishlist', 'devicer'), 
				'slug' 					=> 'yith-woocommerce-wishlist', 
				'required'				=> false 
			)
		);
	}

	if (!CMSMASTERS_WCAS_PREMIUM) {
		$plugins_ajax_search = array (
			array( 
				'name' 					=> esc_html__('YITH WooCommerce Ajax Search', 'devicer'), 
				'slug' 					=> 'yith-woocommerce-ajax-search', 
				'required'				=> false 
			)
		);
	}
	
	
	
	$config = array( 
		'id' => 			'devicer', 
		'menu' => 			'theme-required-plugins', 
		'strings' => array( 
			'page_title' => 	esc_html__('Theme Required & Recommended Plugins', 'devicer'), 
			'menu_title' => 	esc_html__('Theme Plugins', 'devicer'), 
			'return' => 		esc_html__('Return to Theme Required & Recommended Plugins', 'devicer') 
		) 
	);

	if (!CMSMASTERS_WCPC_PREMIUM || !CMSMASTERS_WCWL_PREMIUM || !CMSMASTERS_WCAS_PREMIUM) {
		if (!CMSMASTERS_WCPC_PREMIUM) {
			$plugins_all = array_merge($plugins, $plugins_countdown);
			tgmpa($plugins_all, $config);
		}

		if ( !CMSMASTERS_WCAS_PREMIUM) {
			$plugins_ajax_merge = array_merge($plugins, $plugins_ajax_search);
			tgmpa($plugins_ajax_merge, $config);
		}

		if ( !CMSMASTERS_WCWL_PREMIUM) {
			$plugins_wishlist_merge = array_merge($plugins, $plugins_wishlist);
			tgmpa($plugins_wishlist_merge, $config);
		}
		
	} else {
		tgmpa($plugins, $config);
	}
	
}

}

add_action('tgmpa_register', 'devicer_register_theme_plugins');

