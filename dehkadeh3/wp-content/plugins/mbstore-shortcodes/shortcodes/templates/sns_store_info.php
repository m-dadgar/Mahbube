<?php
$output = '';
$id = rand().time();
$atts = vc_map_get_attributes( 'sns_store_info', $atts );
extract( $atts );
$class = 'sns-store-info';
$store_info = new WPBakeryShortCode_SNS_Store_Info( array( 'base' => 'sns_store_info' ) );
$class .= ' '.$store_info->getCSSAnimation( $css_animation );
if ($extra_class) $class .= ' '.esc_attr($extra_class);
$output = '<div class="'.$class.'">';
if ( $logo_store ) {
	$logo_store = preg_replace('/[^\d]/', '', $logo_store);
	$img_src =   wp_get_attachment_image_src( $logo_store , '');
	$output .= '<div class="store-logo"><img src="'.$img_src[0].'" alt="'.esc_html__("Store Logo",'mbstore-shortcodes').'"/></div>';
}
if ( strip_tags($short_intro) != '' ) {
	$output .= '<div class="store-intro">'.$short_intro.'</div>';
}
if ( $address ) {
	$output .= '<div class="store-address"><span class="vc_icon_element-icon '.esc_attr($icon_address).'"></span>'.wp_kses( $address, array('br'=> array()) ).'</div>';
}
if ( $email || $email2 ) {
	$output .= '<div class="store-email"><span class="vc_icon_element-icon '.esc_attr($icon_email).'"></span>';
	$email_html = '';
	if ( $email != '' ) {
		if ( strpos($email, ':') == false ) {
			$email_html .= '<a href="mailto:'.esc_html($email).'">'.esc_html($email).'</a>';
		}else{
			$email_html .= esc_html($email);
		}
	}
	if ( $email2 != '' ) {
		if ( $email_html != '' ) { $email_html .= '<br/>'; }
		if ( strpos($email2, ':') == false ) {
			$email_html .= '<a href="mailto:'.esc_html($email2).'">'.esc_html($email2).'</a>';
		}else{
			$email_html .= esc_html($email2);
		}
	}
	$output .= $email_html.'</div>';
}
if ( $phone || $phone2 ) {
	$output .= '<div class="store-phone"><span class="vc_icon_element-icon '.esc_attr($icon_phone).'"></span>';
	$phone_html = '';
	if ( $phone != '' ) {
		if ( strpos($phone, ':') == false ) {
			$phone_html .= '<a href="tel:'.str_replace(' ', '', esc_html($phone) ).'">'.esc_html($phone).'</a>';
		}else{
			$phone_html .= esc_html($phone);
		}
	}
	if ( $phone2 != '' ) {
		if ( $phone_html != '' ) { $phone_html .= '<br/>'; }
		if ( strpos($phone2, ':') == false ) {
			$phone_html .= '<a href="tel:'.str_replace(' ', '', esc_html($phone2) ).'">'.esc_html($phone2).'</a>';
		}else{
			$phone_html .= esc_html($phone2);
		}
	}
	$output .= $phone_html.'</div>';
}

$output .= '</div>';

echo $output;