<?php
$output = '';
$id = rand().time();
$atts = vc_map_get_attributes( 'sns_single_testimonial', $atts );
extract( $atts );
$class = 'sns-single-testimonial';
$class .= ' '.esc_attr($style);
if ($css_animation) $class .= ' '.esc_attr($css_animation);
if ($extra_class) $class .= ' '.esc_attr($extra_class);
if( $author_avatar != '' ) $class .= ' have-avatar';
$output = '<div class="'.$class.'"><div class="inner">';
if( $author_avatar != '' ){
	$author_avatar = preg_replace('/[^\d]/', '', $author_avatar);
	$img =   wp_get_attachment_image_src( $author_avatar , '');
	$output .= '<div class="avatar"><img src="'.$img[0].'"/></div>';
}
if ( $testimonial_content != '' ) 
$output .= '<div class="content">'.esc_html($testimonial_content).'</div>';
$output .= '<div class="info">';
if ( $author_name != '' ) $output .= '<div class="name"><span class="label">'.esc_html__('By:', 'mbstore-shortcodes'). '</span><span>' .esc_html($author_name).'</span></div>';
if ( $author_position != '' ) $output .= '<div class="position"><span class="label">'.esc_html__('Position:', 'mbstore-shortcodes'). '</span><span>'. esc_html($author_position).'</span></div>';
$output .= '</div>';
$output .= '</div></div>';
echo $output;