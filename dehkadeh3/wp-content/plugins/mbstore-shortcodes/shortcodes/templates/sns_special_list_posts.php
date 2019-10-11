<?php
wp_enqueue_script('owlcarousel');
$output = '';
$atts = vc_map_get_attributes( 'sns_special_list_posts', $atts );
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
$class = 'sns-special-list-posts';
$class .= ( trim($extra_class)!='' )?' '.esc_attr($extra_class):'';
$list_posts = new WPBakeryShortCode_SNS_Special_List_Posts( array( 'base' => 'sns_special_list_posts' ) );
$class .= ' '.$list_posts->getCSSAnimation( $css_animation );

$data = 'data-usenav="'.$use_nav.'"';
$data .= ' data-usepaging="'.$use_paging.'"';
$data .= ' data-autoplay="'.$autoplay.'"';
$data .= ' data-desktop="'.$number_desktop.'"';
$data .= ' data-tabletl="'.$number_tablet.'"';
$data .= ' data-tabletp="'.$number_tabletp.'"';
$data .= ' data-mobilel="'.$number_mobilel.'"';
$data .= ' data-mobilep="'.$number_mobilep.'"';

if( $lp_query->have_posts() ) :
	$output .= '<div id="sns_speciallistposts'.$uq.'" class="'.$class.'">';
	$output .= '<div class="list-post">';
	$i=0;
	while ( $lp_query->have_posts() ) : $lp_query->the_post();
		$i++;
		if ( $i == 1 ) {
			$output .= '<div class="big-item-post"><div class="inner">';
			$output .= '<div class="post-title">
		 				<a href="'.esc_url( get_permalink() ).'"><span>'.str_replace(' ', '</span><span>', get_the_title() ) . '</span></a></div>
		 				<div class="post-meta">
		 				<div class="post-author">'.esc_html__('By', 'mbstore-shortcodes').'<a class="author-link" href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'. get_the_author_meta('display_name').'</a></div>
		 				<div class="post-date">'.get_the_date().'</div>
		 				</div>';
			$output .= '</div></div>';
		}else{
			if ( $i == 2 ) {
				$output .= '<div class="list-small-item owl-carousel" '.$data.'>';
			}
			$output .= '<div class="small-item-post">';
			$output .= '<div class="post-img"><a href="'.esc_url( get_permalink() ).'">'.get_the_post_thumbnail($post->ID, 'mbstore_blog_tiny_thumb').'</a></div>';
			$output .= '<div class="post-title">
		 				<a href="'.esc_url( get_permalink() ).'">'.get_the_title() . '</a></div>
		 				<div class="post-meta">
		 				<div class="post-author">'.esc_html__('By', 'mbstore-shortcodes').'<a class="author-link" href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'. get_the_author_meta('display_name').'</a></div>
		 				<div class="post-date">'.get_the_date().'</div>
		 				</div>';
			$output .= '</div>';

			if ( $i == $lp_query->post_count ) {
				$output .= '</div>';
			}
		}
	endwhile;
	$output .= '</div>';
	$output .= '</div>';
endif;
wp_reset_postdata();
echo $output;
