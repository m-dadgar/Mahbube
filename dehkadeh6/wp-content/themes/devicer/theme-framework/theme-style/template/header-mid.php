<?php 
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.1
 * 
 * Header Middle Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = devicer_get_global_options();


echo '<div class="header_mid' . (($cmsmasters_option['devicer' . '_header_styles'] == 'default' || ($cmsmasters_option['devicer' . '_header_styles'] == 'l_nav' && $cmsmasters_option['devicer' . '_second_menu_enable'] == 0) || ($cmsmasters_option['devicer' . '_header_styles'] == 'r_nav' && $cmsmasters_option['devicer' . '_second_menu_enable'] == 0)) ? ' default_mid_header' : '') . '" data-height="' . esc_attr($cmsmasters_option['devicer' . '_header_mid_height']) . '">' . 
	'<div class="header_mid_outer">';
		if (($cmsmasters_option['devicer' . '_header_add_cont'] == 'social' && 
		isset($cmsmasters_option['devicer' . '_social_icons'])) || ($cmsmasters_option['devicer' . '_header_add_cont'] == 'cust_html' && 
		$cmsmasters_option['devicer' . '_header_add_cont_cust_html'] !== '')) {
			echo '<div class="header_mid_inner cmsmasters_social_html_enable">';
		} else {
			echo '<div class="header_mid_inner">';
		}
			do_action('cmsmasters_before_header_mid', $cmsmasters_option);
			
			do_action('cmsmasters_before_logo', $cmsmasters_option);
			echo '<div class="logo_wrap">';
				
				devicer_logo();
				
			echo '</div>';
			
			if (
				$cmsmasters_option['devicer' . '_header_styles'] != 'default' && 
				$cmsmasters_option['devicer' . '_header_styles'] != 'c_nav'
			) { 
				if (
					$cmsmasters_option['devicer' . '_header_add_cont'] == 'cust_html' && 
					$cmsmasters_option['devicer' . '_header_add_cont_cust_html'] !== ''
				) {
					echo '<div class="slogan_wrap">' . 
						'<div class="slogan_wrap_inner">' . 
							'<div class="slogan_wrap_text">' . 
								stripslashes($cmsmasters_option['devicer' . '_header_add_cont_cust_html']) . 
							'</div>' . 
						'</div>' . 
					'</div>';
				} elseif (
					$cmsmasters_option['devicer' . '_header_add_cont'] == 'social' && 
					isset($cmsmasters_option['devicer' . '_social_icons'])
				) {
					devicer_social_icons();
				}
			} else if ($cmsmasters_option['devicer' . '_header_styles'] == 'default') { 
				if ($cmsmasters_option['devicer' . '_header_add_cont_cust_html'] !== '') {
					echo '<div class="slogan_wrap">' . 
						'<div class="slogan_wrap_inner">' . 
							'<div class="slogan_wrap_text">' . 
								stripslashes($cmsmasters_option['devicer' . '_header_add_cont_cust_html']) . 
							'</div>' . 
						'</div>' . 
					'</div>';
				}
			}
			
			
			do_action('cmsmasters_after_logo', $cmsmasters_option);
			
			
			if ($cmsmasters_option['devicer' . '_header_styles'] == 'default' || ($cmsmasters_option['devicer' . '_header_styles'] == 'l_nav' && $cmsmasters_option['devicer' . '_second_menu_enable'] == 0) || ($cmsmasters_option['devicer' . '_header_styles'] == 'r_nav' && $cmsmasters_option['devicer' . '_second_menu_enable'] == 0)) {
				echo '<div class="resp_mid_nav_wrap">' . 
					'<div class="resp_mid_nav_outer">' . 
						'<a class="responsive_nav resp_mid_nav" href="' . esc_js("javascript:void(0)") . '">' . 
							'<span></span>' . 
						'</a>' . 
					'</div>' . 
				'</div>';
			}

			
			if (
				$cmsmasters_option['devicer' . '_header_search'] && 
				$cmsmasters_option['devicer' . '_header_styles'] != 'default'
			) {
				echo '<div class="mid_search_but_wrap">' ;
					devicer_get_header_search_form($cmsmasters_option); 
				echo '</div>';
			}

			if (
				CMSMASTERS_WOOCOMMERCE && 
				$cmsmasters_option['devicer' . '_header_styles'] != 'c_nav' 
			) {
				devicer_woocommerce_header_cart_link(); 
			}

			echo '<div class="mid_search_but_wrap_resp">' . 
				'<a href="' . esc_js("javascript:void(0)") . '" class="mid_search_but cmsmasters_header_search_but cmsmasters_icon_custom_search"></a>';
			echo '</div>';

			
			
			if ($cmsmasters_option['devicer' . '_header_styles'] == 'default' || ($cmsmasters_option['devicer' . '_header_styles'] == 'l_nav' && $cmsmasters_option['devicer' . '_second_menu_enable'] == 0) || ($cmsmasters_option['devicer' . '_header_styles'] == 'r_nav' && $cmsmasters_option['devicer' . '_second_menu_enable'] == 0)) {
				echo '<!-- Start Navigation -->';
					if (($cmsmasters_option['devicer' . '_header_styles'] == 'l_nav' && $cmsmasters_option['devicer' . '_second_menu_enable'] == 0) || ($cmsmasters_option['devicer' . '_header_styles'] == 'r_nav' && $cmsmasters_option['devicer' . '_second_menu_enable'] == 0)) {
						echo '<div class="mid_nav_wrap cmsmasters_no_category_menu">';
					} else {
						echo '<div class="mid_nav_wrap">';
					}
					echo '<nav>';
						
						if ($cmsmasters_option['devicer' . '_header_styles'] == 'default') {
							$nav_args = array( 
								'theme_location' => 	'primary', 
								'menu_id' => 			'navigation', 
								'menu_class' => 		'mid_nav navigation', 
								'link_before' => 		'<span class="nav_item_wrap">', 
								'link_after' => 		'</span>', 
								'fallback_cb' => 		false
							);
						} else {
							$nav_args = array( 
								'theme_location' => 	'primary', 
								'menu_id' => 			'navigation_mid', 
								'menu_class' => 		'mid_nav navigation', 
								'link_before' => 		'<span class="nav_item_wrap">', 
								'link_after' => 		'</span>', 
								'fallback_cb' => 		false
							);
						}
						
						
						if (class_exists('Walker_Cmsmasters_Nav_Mega_Menu')) {
							$nav_args['walker'] = new Walker_Cmsmasters_Nav_Mega_Menu();
						}
						
						
						wp_nav_menu($nav_args);
						
					echo '</nav>' . 
				'</div>' . 
				'<!-- Finish Navigation -->';
			}
			
			
			do_action('cmsmasters_after_header_mid', $cmsmasters_option);
		echo '</div>' . 
	'</div>' . 
'</div>';

