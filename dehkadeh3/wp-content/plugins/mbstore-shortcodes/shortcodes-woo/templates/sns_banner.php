<?php
$output = '';
$atts = vc_map_get_attributes( 'sns_banner', $atts );
extract( $atts );
if( class_exists('WooCommerce') ){
	$uq = rand().time();
	$class = 'sns-banner';
	$class .= ( esc_attr($style) !='' )?' style-'.esc_attr($style):'';
	$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
	$class .= ' '.esc_attr( mbstore_getCSSAnimation( $css_animation ) );
	if($banner_image != ''){
		$banner_image = preg_replace('/[^\d]/', '', $banner_image);
		$img = wp_get_attachment_image_src( $banner_image , '');
		$output .= '<div class="'.$class.'">';
		if ( $style == '1' ) {
			$output .= '<div class="img-banner"><img src="'.$img[0].'"/></div>';
			if( $link_type == '1' && $custom_link != '' && $links_label != '' ){
				$output .= '<a class="banner-link" href="'.$custom_link.'"><span>'.$links_label.'</span></a>';
			}elseif($link_type == '2' && $cat ){
				$cat_info = get_term_by('slug', $cat, 'product_cat');
				$cat_link = ( $cat_info != false ) ? get_term_link($cat, 'product_cat') : '';
				$cat_label = ( $links_label != '' ) ? $links_label : $cat_info->name ;
				$output .= '<a class="banner-link" href="'.$cat_link.'"><span>'.$cat_label.'</span></a>';
			}
		}
		if ( $style == '2' ) {
			$cat_info = get_term_by('slug', $cat, 'product_cat');
			$output .= '<div class="img-banner"><img src="'.$img[0].'"/></div>';
			$style = '';
			if ( $text_color ) {
				$style = ' style="color:'.$text_color.'"';
			}
			$title = '';
			if ( $custom_title ){
				$title = $custom_title;
			}else{
				if ( $cat_info && $cat_info->name ){
					$title = $cat_info->name;
				}
			}
			$output .= '<div class="banner-text"'.$style.'>';
			if ( $title ) {
				$output .= '<h3 class="title">'.$title.'</h3>';
			}
			if( $link_type == '1' && $custom_link != '' && $links_label != '' ){
				$output .= '<a class="banner-link" href="'.$custom_link.'"><span>'.$links_label.'</span></a>';
			}elseif($link_type == '2' && $cat ){
				$cat_label = ( $links_label != '' ) ? $links_label : $cat_info->name ;
				$cat_link = ( $cat_info != false ) ? get_term_link($cat, 'product_cat') : '';
				$output .= '<a class="banner-link" href="'.$cat_link.'"><span>'.$cat_label.'</span></a>';
			}
			$output .= '</div>';
		}
		$output .= '</div>';
	}
}
echo $output;