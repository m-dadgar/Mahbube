<?php
$output = '';
$id = rand().time();
$atts = vc_map_get_attributes( 'sns_vertical_menu', $atts );
extract( $atts );
if ($css_animation) $class .= ' '.esc_attr($css_animation);
if ($extra_class) $class .= ' '.esc_attr($extra_class);
if( $nav_menu ):
	echo '<div class="sns-vertical-menu">';
	if ( $title != '' ) echo '<h3 class="wpb_heading"><span>'.esc_html($title).'</span></h3>';
    wp_nav_menu( array(
                'menu' => $nav_menu,
                'container' => false, 
                'walker' => new mbstore_Megamenu_Front,
                'menu_class' => 'vertical-style hidden-sm hidden-xs'
    ) ); 
    echo '<div class="sns-respmenu hidden-lg hidden-md">';
    wp_nav_menu( array(
   				'container' => false, 
   				'menu' => $nav_menu,
   				'menu_class' => 'nav-sidebar resp-nav'
    ) );
    echo '</div>';
    echo '</div>';
else:
    echo '<p>'.esc_html__('Please select menu for shortcode SNS Vertical Menu', 'mbstore-shortcodes').'</p>';
endif;