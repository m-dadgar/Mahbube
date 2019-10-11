<?php 
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.1
 * 
 * Header Bottom Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = devicer_get_global_options();
if (($cmsmasters_option['devicer' . '_header_styles'] == "default" && $cmsmasters_option['devicer' . '_header_search_bottom'] != 0) || ($cmsmasters_option['devicer' . '_header_styles'] != "default") || ($cmsmasters_option['devicer' . '_header_styles'] == "default" && $cmsmasters_option['devicer' . '_second_menu_enable'] != 0)) {
	echo '<div class="header_bot" data-height="' . esc_attr($cmsmasters_option['devicer' . '_header_bot_height']) . '">' . 
		'<div class="header_bot_outer">' . 
			'<div class="header_bot_inner">';
				echo '<span class="header_bot_border_top"></span>';
				
				
				do_action('cmsmasters_before_header_bot', $cmsmasters_option);
				
					echo '<!-- Start Navigation -->';
					if ($cmsmasters_option['devicer' . '_second_menu_enable'] == 1) {
					echo '<div class="bot_nav_cat_inner"><div class="bot_nav_cat">';		
						if ($cmsmasters_option['devicer' . '_second_menu_open'] == 1 && is_front_page()) {
							echo '<button class="bot_cat_button"><div class="cat_ico_block"><span></span></div>'.$cmsmasters_option['devicer' . '_category_menu_title'].'</button>
								<nav class="bot_nav_cat_wrap cat_open_default">';
						} else {
							echo '<button class="bot_cat_button"><div class="cat_ico_block"><span></span></div>'.$cmsmasters_option['devicer' . '_category_menu_title'].'</button>
								<nav class="bot_nav_cat_wrap">';
						}
								
								wp_nav_menu(array( 
									'theme_location' => 	'cat_menu', 
									'menu_id' => 			'cat_menu', 
									'menu_class' => 		'cat_menu', 
									'link_before' => 		'<span class="nav_item_wrap">', 
									'link_after' => 		'</span>' 
								));
								
							echo '</nav>' . 
					'</div></div>';
					}


					if ($cmsmasters_option['devicer' . '_header_styles'] != 'default') {
						if ($cmsmasters_option['devicer' . '_second_menu_enable'] == 1) {
							echo '<div class="resp_bot_nav_wrap cat_menu_enable">' .
							'<div class="resp_bot_nav_outer">';
								echo '<span>';
								echo esc_html__('Menu', 'devicer');
								echo '</span>';
								echo  '<a class="responsive_nav resp_bot_nav" href="' . esc_js("javascript:void(0)") . '">' . 
										'<span></span>' . 
									'</a>' . 
								'</div>' . 
							'</div>';
						}
						
						if (
							CMSMASTERS_WOOCOMMERCE && 
							$cmsmasters_option['devicer' . '_header_styles'] == 'c_nav' 
						) {
							devicer_woocommerce_header_cart_link(); 
						}
					}


					if (
						$cmsmasters_option['devicer' . '_header_search_bottom'] && 
						$cmsmasters_option['devicer' . '_header_styles'] == 'default'
					) {
						echo '<div class="bot_search_but_wrap">' . 
							'<a href="' . esc_js("javascript:void(0)") . '" class="bot_search_but cmsmasters_header_search_but cmsmasters_icon_custom_search"></a>';
							devicer_get_header_search_form($cmsmasters_option); 
						echo '</div>';
					}

					
					if ($cmsmasters_option['devicer' . '_header_styles'] != 'default') {
						echo '<div class="bot_nav_wrap">' . 
							'<nav>';
								
								$nav_args = array( 
									'theme_location' => 	'primary', 
									'menu_id' => 			'navigation', 
									'menu_class' => 		'bot_nav navigation', 
									'link_before' => 		'<span class="nav_item_wrap">', 
									'link_after' => 		'</span>', 
									'fallback_cb' => 		false
								);
								
								
								if (class_exists('Walker_Cmsmasters_Nav_Mega_Menu')) {
									$nav_args['walker'] = new Walker_Cmsmasters_Nav_Mega_Menu();
								}
								
								
								wp_nav_menu($nav_args);
								
							echo '</nav>' . 
						'</div>';
					}
					'<!-- Finish Navigation -->';

				do_action('cmsmasters_after_header_bot', $cmsmasters_option);
			echo '</div>' . 
		'</div>' . 
	'</div>';
}