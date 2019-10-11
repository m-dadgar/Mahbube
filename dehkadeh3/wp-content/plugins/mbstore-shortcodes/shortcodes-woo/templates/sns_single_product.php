<?php
$output = '';
$atts = vc_map_get_attributes( 'sns_single_product', $atts );
extract( $atts );
if( class_exists('WooCommerce') ){
	$uq = rand().time();
	$class = 'sns-single-product';
	$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
	if ($css_animation) $class .= ' '.esc_attr($css_animation);
	$output .= '<div class="'.$class.'">';
	if( $ids ) :
		$args = array(
			    'post_type' 		=> 'product',
			    'posts_per_page' 	=> '-1',
			    'post__in'			=> explode(',', $ids),
			    'post_status' 		=> 'publish'
	    );
		$prds = new WP_Query($args);
		if( $prds->have_posts() ) :
			ob_start();
			if ( $label ) echo '<div class="box-label"><span>'.$label.'</span></div>';
			while ( $prds->have_posts() ) : $prds->the_post(); ?>
				<h3 class="item-title">
				 	<a href="<?php the_permalink(); ?>">
				 		<?php the_title(); ?>
				 	</a>
				</h3>
				<?php
			    add_action( 'mbstore_single_product_content', 'woocommerce_template_single_excerpt', 6 );
			    add_action( 'mbstore_single_product_content', 'woocommerce_template_loop_price', 7 );
			    do_action( 'mbstore_single_product_content' );
			endwhile;
			$output .= ob_get_clean();
		endif;
		wp_reset_postdata();
	else:
		$output .= '<p>'.esc_html('Please select products in admin panel of shortcodes', 'mbstore-shortcodes').'</p>';
	endif;
	$output .= '</div>';
}
echo $output;
