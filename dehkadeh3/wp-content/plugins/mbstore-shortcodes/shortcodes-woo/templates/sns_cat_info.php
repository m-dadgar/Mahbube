<?php
$output = '';
$atts = vc_map_get_attributes( 'sns_cat_info', $atts );
extract( $atts );
if( class_exists('WooCommerce') ){
	$uq = rand().time();
	$class = 'sns-cat-info';
	$class .= ( esc_attr($style) !='' )?' style-'.esc_attr($style):'';
	$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
	$class .= ' '.esc_attr( mbstore_getCSSAnimation( $css_animation ) );
	if ( $box_align ) {
		$class .= ' align-'.esc_attr($box_align);
	}
	$output .= '<div class="'.$class.'">';
	$cat_info = get_term_by('slug', $cat, 'product_cat'); 
	if($cat && $cat_info != false){ 
		$output .= '<a class="cat-img" href="'.get_term_link($cat, 'product_cat').'"><span>';
		if($cat_image != ''){
			$cat_image = preg_replace('/[^\d]/', '', $cat_image);
			$img =   wp_get_attachment_image_src( $cat_image , '');
			$output .= '<img src="'.$img[0].'" alt="'.$cat_info->name.'" />';
		}
		$output .= '</span></a>';
		$output .= '<div class="cat-info">';
			if ( $style == '1' ) {
				if($custom_number ){
					$output .= '<div class="custom-number">'.$custom_number.'</div>';
				}
				$output .= '<h4 class="cat-title"><a data-hover="'.$cat_info->name.'" href="'.get_term_link($cat, 'product_cat').'">'.$cat_info->name.'</a></h4>';
			}elseif($style == '2' || $style == '4'){
				$output .= '<h4 class="cat-title"><a data-hover="'.$cat_info->name.'" href="'.get_term_link($cat, 'product_cat').'">'.$cat_info->name;
				if ( $show_prd_num == '1' ){
					$output .= '<span class="cat-prd-num">('.$cat_info->count.')</span>';
				}
				$output .= '</a></h4>';
			}elseif($style == '3'){
				$output .= '<h4 class="cat-title"><a data-hover="'.$cat_info->name.'" href="'.get_term_link($cat, 'product_cat').'">'.$cat_info->name.'</a>';
				if ( $show_prd_num == '1' ){
					$output .= '<span class="cat-prd-num">'.$cat_info->count.'</span>';
				}
				$output .= '</h4>';
			}
		$output .= '</div>';
	}else{
		$output .= '<p>'.esc_html__('Please select Category', 'mbstore-shortcodes').'</p>';
	}
	$output .= '</div>';
}
echo $output;