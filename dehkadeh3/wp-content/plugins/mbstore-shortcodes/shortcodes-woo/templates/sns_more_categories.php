<?php
$output = '';
$atts = vc_map_get_attributes( 'sns_more_categories', $atts );
extract( $atts );
if( class_exists('WooCommerce') ){
	$uq = rand().time();
	$class = 'sns-more-categories';
	$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
	if ($css_animation) $class .= ' '.esc_attr($css_animation);

	$data = 'data-autoplay="'.esc_attr( $autoplay ).'"';
	$data .= ' data-desktop="'.esc_attr($number_desktop).'"';
	$data .= ' data-tabletl="'.esc_attr($number_tablet).'"';
	$data .= ' data-tabletp="'.esc_attr($number_tabletp).'"';
	$data .= ' data-mobilel="'.esc_attr($number_mobilel).'"';
	$data .= ' data-mobilep="'.esc_attr($number_mobilep).'"';

	//if ( $icon_cat || $lit_cat ) { return; }

	$icon_cat = explode(',', $icon_cat);
	$output .= '<div id="sns_more_categories_'.$uq.'" class="'.$class.'" '.$data.'>';
	if ( $title ) $output .= '<h3 class="wpb_heading"><span>'.esc_attr($title).'</span></h3>';
	if ( $lit_cat ) {
		$output .= '<div class="content"><div class="list-cats owl-carousel">';
		$categories = explode(',', $lit_cat);
		$i=0;
		foreach ($categories as $category):
			$cat_i = get_term_by('slug', $category, 'product_cat');
			if( !empty($cat_i->term_id) ):
				$output .= '<div class="item">';
				if ( isset($icon_cat[$i]) ) {
					$output .= '<a class="cat-img" href="'.get_term_link($cat_i->term_id, 'product_cat').'" title="'.esc_attr($cat_i->name).'"><span>'.wp_get_attachment_image($icon_cat[$i], 'full').'</span></a>';
				}
				$output .= '<a class="cat-name" href="'.get_term_link($cat_i->term_id, 'product_cat').'" title="'.esc_attr($cat_i->name).'">'.$cat_i->name.'</a>';
				$output .= '</div>';
			endif;
			$i++;
		endforeach;
		$output .= '</div></div>';
	}

	$output .= '</div>';
}
echo $output;
