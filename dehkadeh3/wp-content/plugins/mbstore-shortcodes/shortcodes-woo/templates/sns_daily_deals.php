<?php
$output = '';
$atts = vc_map_get_attributes( 'sns_daily_deals', $atts );
extract( $atts );
if( class_exists('WooCommerce') ){
	$uq = rand().time();
	$class = 'sns-daily-deals woocommerce';
	$class .=' style-'.$style;
	$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
	if ($css_animation) $class .= ' '.esc_attr($css_animation);
	$data = 'data-usenav="'.$use_nav.'"';
	$data .= ' data-usepaging="'.$use_paging.'"';
	$data .= ' data-desktop="'.$number_desktop.'"';
	$data .= ' data-tabletl="'.$number_tablet.'"';
	$data .= ' data-tabletp="'.$number_tabletp.'"';
	$data .= ' data-mobilel="'.$number_mobilel.'"';
	$data .= ' data-mobilep="'.$number_mobilep.'"';
	wp_enqueue_script('owlcarousel');
	if ( $products_via == '1' ) {
		if (!$number_limit) $number_limit = '-1';
		$loop = mbstore_woo_query('on_sale', $number_limit, $lit_cat);
	}else {
		if( $ids ) {
			$args = array(
				    'post_type' 		=> 'product',
				    'posts_per_page' 	=> '-1',
				    'post__in'			=> explode(',', $ids),
				    'post_status' 		=> 'publish'
		    );
			$loop = new WP_Query($args);
		}
	}
	$output .= '<div class="'.$class.'" '.$data.'>';
	if ( $title || ( $time_countdown && $style == '1') ) :
		$header_class = "deal-header";
		$output .= '<div class="'.$header_class.'"><div class="inner">';
		if ($title) $output .= '<h2 class="wpb_heading"><span>'.esc_attr($title).'</span></h2>';
		if ($time_countdown && $style == '1') : 
			// Set sale price date to default 10 days for http://demo.snstheme.com/
	        if($_SERVER['SERVER_NAME'] == 'demo.snstheme.com' || $_SERVER['SERVER_NAME'] == 'dev.snsgroup.me' ){
	            if ( $time_countdown <= date('Y/m/d') ) {
	            	$time_countdown = date('Y/m/d', strtotime('+1 days'));
	            }
	        }
	        wp_enqueue_script('countdown');
	        $output .= '<div class="time time-count-down" id="sns-tcd-'.$uq.'" data-date="'.$time_countdown.'">
	            <div class="clock-digi">
	            	<div><div class="day"></div><span>'.esc_html__("d", "mbstore").'</span></div>
	                <div><div class="hours"></div><span>'.esc_html__("h", "mbstore").'</span></div>
	                <div><div class="minutes"></div><span>'.esc_html__("m", "mbstore").'</span></div>
	                <div><div class="seconds"></div><span>'.esc_html__("s", "mbstore").'</span></div>
	            </div>
	        </div>';
		endif;
		$output .= '</div></div>';
	endif;
	if( $loop->have_posts() ) :
		ob_start();
			echo '<div class="sproduct-content">';
			echo '<div class="prdlist-content">';
			if ($style == '1') { echo '<div class="s-products product_list grid owl-carousel">'; }
			else { echo '<div class="s-products product_list list owl-carousel">'; }
			$i = 0;
			while ( $loop->have_posts() ) : $loop->the_post();
				if ( $number_row && $number_row > 1 ){
					if ( $i == 0 || $i%$number_row == 0 ) {
						echo '<div class="item-row">';
					}
				}
			    wc_get_template( 'vc/item-grid-deal'.$style.'.php');
			    if ( $number_row && $number_row > 1 ){
			    	if ( $loop->post_count == $i+1 || ($i+1)%$number_row == 0 ){
			    		echo '</div>';
			    	}
			    	$i++;
			    }
			endwhile;
			echo '</div>';
		$output .= ob_get_clean();
		$output .= '</div>';
		$output .= '</div>';
	else:
		$output .= '<p>'.esc_html__('There are no products matching to show', 'mbstore-shortcodes').'</p>';
	endif;
	$output .= '</div>';
	wp_reset_postdata();
}
echo $output;
