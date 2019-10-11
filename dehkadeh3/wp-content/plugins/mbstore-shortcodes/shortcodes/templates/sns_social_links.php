<?php
$output = '';
$id = rand().time();
$atts = vc_map_get_attributes( 'sns_social_links', $atts );
extract( $atts );
$class = 'sns-social-links';
$class .= ' style-'.$style;
$social_links = new WPBakeryShortCode_SNS_Social_Links( array( 'base' => 'sns_social_links' ) );
$class .= ' '.$social_links->getCSSAnimation( $css_animation );
if ($extra_class) $class .= ' '.esc_attr($extra_class);
$output = '<div class="'.$class.'">';
if ( $facebook_link || $google_link || $twitter_link || $pinterest_link || $instagram_link ) {
	if ( $label_followus ) {
		$output .= '<h3 class="wpb_heading"><span>'.esc_attr($label_followus).'</span></h3>';
	}
	$output .= '<div class="follow-us">';
	if ( $facebook_link ){
		$output .= '<a title="'.esc_html__("Follow us on Facebook", 'mbstore-shortcodes').'" href="'.$facebook_link.'"><i class="fa fa-facebook"></i>'.esc_html__('Facebook', 'mbstore-shortcodes').'</a>';
	}
	if ( $google_link ){
		$output .= '<a title="'.esc_html__("Follow us on Google Plus", 'mbstore-shortcodes').'" href="'.$google_link.'"><i class="fa fa-google-plus"></i>'.esc_html__('Google Plus', 'mbstore-shortcodes').'</a>';
	}
	if ( $twitter_link ){
		$output .= '<a title="'.esc_html__("Follow us on Twitter", 'mbstore-shortcodes').'" href="'.$twitter_link.'"><i class="fa fa-twitter"></i>'.esc_html__('Twitter', 'mbstore-shortcodes').'</a>';
	}
	if ( $youtube_link ){
		$output .= '<a title="'.esc_html__("Follow us on Youtube", 'mbstore-shortcodes').'" href="'.$youtube_link.'"><i class="fa fa-youtube-play"></i>'.esc_html__('Youtube', 'mbstore-shortcodes').'</a>';
	}
	if ( $pinterest_link ){
		$output .= '<a title="'.esc_html__("Follow us on Pinterest", 'mbstore-shortcodes').'" href="'.$pinterest_link.'"><i class="fa fa-pinterest"></i>'.esc_html__('Pinterest', 'mbstore-shortcodes').'</a>';
	}
	if ( $instagram_link ){
		$output .= '<a title="'.esc_html__("Follow us on Instagran", 'mbstore-shortcodes').'" href="'.$instagram_link.'"><i class="fa fa-instagram"></i>'.esc_html__('Instagran', 'mbstore-shortcodes').'</a>';
	}
	$output .= '</div>';
}
$output .= '</div>';

echo $output;