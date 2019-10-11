<?php
$output = '';
$atts = vc_map_get_attributes( 'sns_shopby_categories', $atts );
extract( $atts );
if( class_exists('WooCommerce') ){
	$uq = rand().time();
	$class = 'sns-shopby-categories';
	$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
	if ($css_animation) $class .= ' '.esc_attr($css_animation);
	
	$output .= '<div id="sns_shopby_categories_'.$uq.'" class="'.$class.'">';
	if ( ! empty( $link ) ) {
		$link = vc_build_link( $link );
	}
	if($cat_image != ''){
		$cat_image = preg_replace('/[^\d]/', '', $cat_image);
		$img =   wp_get_attachment_image_src( $cat_image , '');
		$output .= '<div class="cat-img">';
		if ( isset($link['url']) ) {
			$output .= '<a href="' . esc_url( $link['url'] ) . '"'
		               . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
		               . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
		               . '>';
		}
		$output .= '<img src="'.$img[0].'" alt="' .$link['title']. '"/>';
		if ( isset($link['url']) ) {
			$output .= '</a>';
		}
		$output .= '</div>';
	}
	if ( $title ) {
		$output .= '<h4 class="wpb_heading">';
		if ( isset($link['url']) ) {
			$output .= '<a href="' . esc_url( $link['url'] ) . '"'
		               . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
		               . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
		               . '>';
		}
		$output .= '<span>'.esc_attr($title).'</span>';
		if ( isset($link['url']) ) {
			$output .= '</a>';
		}
		$output .= '</h4>';
	}
	if ( $lit_cat || ($viewall == '1' && isset($link['url'])) ) :
		$output .= '<div class="content">';
		if ( $lit_cat ) {
			$output .= '<ul class="list-cats">';
			$categories = explode(',', $lit_cat);
			foreach ($categories as $category):
				$cat_i = get_term_by('slug', $category, 'product_cat');
				if( !empty($cat_i->term_id) ):
					$output .= '<li><a href="'.get_term_link($cat_i->term_id, 'product_cat').'" title="'.esc_attr($cat_i->name).'">'.$cat_i->name.'</a></li>';
				endif;
			endforeach;
			$output .= '</ul>';
		}
		if ( $viewall == '1' && isset($link['url']) ) {
			$output .= '<a class="view-all" href="' . esc_url( $link['url'] ) . '"'
			               . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
			               . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
			               . '>' . esc_html__('View all', 'mbstore-shortcodes') . '</a>';
		}
		$output .= '</div>';
	endif;
	$output .= '</div>';
}
echo $output;
