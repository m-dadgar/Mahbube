<?php
$output = '';
$atts = vc_map_get_attributes( 'sns_products', $atts );
extract( $atts );
if( class_exists('WooCommerce') ){
	if (!$number_limit) $number_limit = '-1';
	$loop = mbstore_woo_query($orderby, $number_limit, $lit_cat);
	$uq = rand().time();
	$class = 'sns-products woocommerce';
	$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
	if ( $modeview == '1'){
		$class .= ' gird-mode';
	}else{
		$class .= ' list-mode';
	}
	if ( $box_style != '' ) {
		$class .= ' box-style-'.$box_style;
	}
	if ($css_animation) $class .= ' '.esc_attr($css_animation);
	$data = 'data-usenav="'.$use_nav.'"';
	$data .= ' data-usepaging="'.$use_paging.'"';
	$data .= ' data-autoplay="'.$autoplay.'"';
	$data .= ' data-desktop="'.$number_desktop.'"';
	$data .= ' data-tabletl="'.$number_tablet.'"';
	$data .= ' data-tabletp="'.$number_tabletp.'"';
	$data .= ' data-mobilel="'.$number_mobilel.'"';
	$data .= ' data-mobilep="'.$number_mobilep.'"';
	wp_enqueue_script('owlcarousel');
	$output .= '<div class="'.$class.'" '.$data.'>';
	if ($title || $sub_text ){
		$output .= '<div class="box-head"><h2 class="wpb_heading"><span>'.esc_attr($title).'</span></h2>';
		$link_viewall = vc_build_link($link_viewall);
		if ( $link_viewall['url'] != '' ) $output .= '<a class="view-all" title="'.$link_viewall['title'].'" href="'.$link_viewall['url'].'">'.esc_html__('View all', 'mbstore-shortcodes').'</a>';
		if ( $sub_text ) $output .= '<p class="sub-text">' . $sub_text . '</p>';
		$output .= '</div>';
	}
	$output .= '<div class="sproduct-content">';
	if( $loop->have_posts() ) :
		
		ob_start();
		if( $modeview == '1' ){
			echo '<div class="prdlist-content">';
			echo '<div class="s-products product_list grid owl-carousel">';
			$i = 0;
			while ( $loop->have_posts() ) : $loop->the_post();
				if ( $number_row && $number_row > 1 ){
					if ( $i == 0 || $i%$number_row == 0 ) {
						echo '<div class="item-row">';
					}
				}
			    wc_get_template( 'vc/grid.php');
			    if ( $number_row && $number_row > 1 ){
			    	if ( $loop->post_count == $i+1 || ($i+1)%$number_row == 0 ){
			    		echo '</div>';
			    	}
			    	$i++;
			    }
			endwhile;
			echo '</div>';
		}elseif ( $modeview == '2' ) {
			echo '<div class="prdlist-content">';
			echo '<div class="s-products product_list list thumb-type-'.$thumb_type.' owl-carousel">';
			$i = 0;
			while ( $loop->have_posts() ) : $loop->the_post();
				if ( $number_row && $number_row > 1 ){
					if ( $i == 0 || $i%$number_row == 0 ) {
						echo '<div class="item-row">';
					}
				}
			    wc_get_template( 'vc/item-list'.$thumb_type.'.php');
			    if ( $number_row && $number_row > 1 ){
			    	if ( $loop->post_count == $i+1 || ($i+1)%$number_row == 0 ){
			    		echo '</div>';
			    	}
			    	$i++;
			    }
			endwhile;
			echo '</div>';
		}
		$output .= ob_get_clean();
		$output .= '</div>';
	else:
		$output .= '<p>'.esc_html__('There are no products matching to show', 'mbstore-shortcodes').'</p>';
	endif;
	$output .= '</div>';
	$output .= '</div>';
	wp_reset_postdata(); // Because mbstore_woo_query return WP_Query
}
echo $output;
