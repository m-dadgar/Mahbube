<?php
$atts = vc_map_get_attributes( 'sns_carousel', $atts );
extract( $atts );
$class = 'sns-carousel';
$class .= ($show_dotimg == 1)? ' show-dotimg':'';
$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
$class .= esc_attr($css_animation);
$output = '';
$content_class = '';
if ( $slider_type == 'v' ){
	wp_enqueue_script('slick');
}else{
	wp_enqueue_script('owlcarousel'); $content_class .= ' owl-carousel';
}
?>
<div class="<?php echo $class; ?>" data-type="<?php echo esc_attr($slider_type); ?>" data-nav="<?php echo esc_attr($show_nav);?>" data-paging="<?php echo esc_attr($show_paging);?>" data-showdotimg="<?php echo esc_attr($show_dotimg);?>" data-row="<?php echo esc_attr($row); ?>" data-desktop="<?php echo esc_attr($n_desktop); ?>" data-tabletl="<?php echo  esc_attr($n_tablet); ?>" data-tabletp="<?php echo  esc_attr($n_tabletp); ?>" data-mobilel="<?php echo  esc_attr($n_mobile_l); ?>" data-mobilep="<?php echo  esc_attr($n_mobile_p); ?>">
<?php
if ( $title ) $output .= '<h2 class="wpb_heading"><span>'.esc_html($title).'</span></h2> ';
	$output .= '<div class="carousel-content'.$content_class.'">';
	$output .= wpb_js_remove_wpautop( $content );
	$output .= '</div>';
	echo $output;
?>
</div>