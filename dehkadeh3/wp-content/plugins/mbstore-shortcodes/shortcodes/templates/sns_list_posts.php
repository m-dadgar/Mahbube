<?php
wp_enqueue_script('owlcarousel');
$output = '';
$atts = vc_map_get_attributes( 'sns_list_posts', $atts );
extract( $atts );

global $post;
$args = array(
	'post_status' => 'publish',
	'post_type' => 'post',
	'orderby' => ($orderby) ? $orderby : 'date',
	'order' => ($sortorder) ? $sortorder : 'DESC',
	'posts_per_page' => (int)$number_limit,
	'ignore_sticky_posts' => 1,
);
$lp_query = new WP_Query( $args );
$uq = rand().time();
$class = 'sns-list-posts';
$class .= ( trim($extra_class)!='' )?' '.esc_attr($extra_class):'';
$list_posts = new WPBakeryShortCode_SNS_List_Post( array( 'base' => 'sns_list_posts' ) );
$class .= ' '.$list_posts->getCSSAnimation( $css_animation );
$class .= ' style-'.esc_attr($style);

if( $lp_query->have_posts() ) :
	$output .= '<div id="sns_listposts'.$uq.'" class="'.$class.'">';
	if ( $title != '' ) $output .= '<h3 class="wpb_heading"><span>'.esc_attr($title).'</span></h3>';
	$output .= '<div class="list-post">';
	$i=0;
	while ( $lp_query->have_posts() ) : $lp_query->the_post();
		$i++;
		$output .= '<div class="item-post">';
		if ( $style == '4' && $i ==1 ) {
			if ( get_post_format() == 'video' && function_exists('rwmb_meta') && rwmb_meta('mbstore_post_video') ) : 
		        $output .= '<div class="video-thumb video-responsive">'.rwmb_meta('mbstore_post_video').'</div>';
		    elseif ( get_post_format() == 'gallery' && function_exists('rwmb_meta') && rwmb_meta('mbstore_post_gallery') ) :
		        $output .= '<div class="gallery-thumb">
		            <div class="thumb-container owl-carousel">';
		            foreach (rwmb_meta('mbstore_post_gallery', 'type=image') as $image) {
		            	$src = $image['full_url'];
		            	if ( $image['sizes']['mbstore_blog_default_thumb']['file'] ) {
		            		$src = str_replace($image['name'], $image['sizes']['mbstore_blog_default_thumb']['file'], $image['full_url']);
		            	}
		               $output .= '<div class="item"><img alt="'.esc_attr($image['alt']).'" src="'.esc_attr($src).'"/></div>';
		            }
		        $output .= '</div></div>';
		    else :
		    	$output .= '<div class="post-img"><a href="'.esc_url( get_permalink() ).'">'.get_the_post_thumbnail($post->ID, 'mbstore_blog_default_thumb').'</a></div>';
			endif;
			$output .= '<div class="post-title">
						<a href="'.esc_url( get_permalink() ).'">'.get_the_title() . '.</a></div>';
		}else{
			if ( $style == '3' || $style == '4' ) {
				$output .= '<div class="post-img"><a href="'.esc_url( get_permalink() ).'">'.get_the_post_thumbnail($post->ID, 'mbstore_blog_137100_thumb').'</a></div>';
			}
			if ( $style == '1' ) {
				$output .= '<div class="post-img"><a href="'.esc_url( get_permalink() ).'">'.get_the_post_thumbnail($post->ID, 'mbstore_blog_tiny_thumb').'</a></div>';
			}
			if ( $style == '4' ) {
				$output .= '<div class="post-title">
						<a href="'.esc_url( get_permalink() ).'">'.get_the_title() . '.</a></div>
						<div class="post-desc">'.mbstore_excerpt(23, '...' ).'</div>';
			}else{
				$output .= '<div class="post-title">
						<a href="'.esc_url( get_permalink() ).'">'.get_the_title() . '.</a></div>
						<div class="post-author">' . esc_html__('By ', 'mbstore-shortcodes') . 
							'<a class="author-link" href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" ref="author">'.get_the_author_meta('display_name').'</a>
						</div>';
			}
		}
		$output .= '</div>';
	endwhile;
	$output .= '</div>';
	$output .= '</div>';
endif;
wp_reset_postdata();
echo $output;
