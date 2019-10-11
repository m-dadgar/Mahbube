<?php
$output = '';
$atts = vc_map_get_attributes( 'mbstore_products_ajaxtab', $atts );
extract( $atts );

if( class_exists('WooCommerce') ){
	$uq = rand().time();
	$class = 'sns-products-ajaxtab woocommerce';
	$class .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
	$class .= esc_attr($css_animation);
	if ( $box_style != '' ) {
		$class .= ' box-style-'.$box_style;
	}else{
		$class .= ' box-style-1';
	}
	if (!$title) $class .= ' no-heading';
	if (!$number_limit) $number_limit = '-1';
	$data = '';
	$data .= ' data-tabtype="'.esc_attr($tab_type).'"';
	$data .= ' data-template="'.esc_attr($content_tab_template).'"';
	if ( $tab_type == '1' ) {
		$class .= ' ajaxtab-byorderby';
		$data .= ' data-desktop="'.esc_attr($number_desktop).'"';
		$data .= ' data-tabletl="'.esc_attr($number_tablet).'"';
		$data .= ' data-tabletp="'.esc_attr($number_tabletp).'"';
		$data .= ' data-mobilel="'.esc_attr($number_mobilel).'"';
		$data .= ' data-mobilep="'.esc_attr($number_mobilep).'"';
		$data .= ' data-row="'.esc_attr($number_row).'"';
		$data .= ' data-limit="'.esc_attr( $number_limit ).'"';
		$data .= ' data-effect="'.esc_attr($effect).'"';
		$data .= ' data-cat="'.esc_attr( $cat ).'"';
		$data .= ' data-uq="'.esc_attr($uq).'"';
	}elseif( $tab_type == '2' ){
		$class .= ' ajaxtab-bycat';
		$data .= ' data-desktop="'.esc_attr($number_desktop).'"';
		$data .= ' data-tabletl="'.esc_attr($number_tablet).'"';
		$data .= ' data-tabletp="'.esc_attr($number_tabletp).'"';
		$data .= ' data-mobilel="'.esc_attr($number_mobilel).'"';
		$data .= ' data-mobilep="'.esc_attr($number_mobilep).'"';
		$data .= ' data-row="'.esc_attr($number_row).'"';
		$data .= ' data-limit="'.esc_attr( $number_limit ).'"';
		$data .= ' data-effect="'.esc_attr($effect).'"';
		$data .= ' data-order="'.esc_attr( $orderby ).'"';
		$data .= ' data-uq="'.esc_attr($uq).'"';
	}
	if ( $content_tab_template != '2' ){
		$class .= ' template-carousel';
		$data .= ' data-autoplay="'.esc_attr( $autoplay ).'"';
		wp_enqueue_script('owlcarousel');
	}else {
		$class .= ' template-loadmore';
		$data .= ' data-showmore="'.esc_attr($num_showmore).'"';
	}
	// Start html
	ob_start(); ?>
<div id="sns_products_ajaxtab_<?php echo $uq; ?>" class="<?php echo $class;?>"<?php echo $data;?>>
	<div class="header-tab">
		<?php if ($title) : ?>
		<h2 class="wpb_heading">
			<span><?php echo esc_attr($title); ?></span>
			<?php if ($sub_text && $box_style == '2') : ?>
			<p class="sub-text"><?php echo esc_attr($sub_text); ?></p>
			<?php endif; ?>
		</h2>
		<?php endif; ?>
		<?php if ($sub_text && $box_style != '2') : ?>
			<p class="sub-text"><?php echo esc_attr($sub_text); ?></p>
		<?php endif; ?>
		<?php
		if ( $tab_type == '1' ){
			include mbstore_shortcode_woo_template('product-tab/tab-items-orderby'); 
		}elseif ( $tab_type == '2' ) {
			include mbstore_shortcode_woo_template('product-tab/tab-items-cat'); 
		}?>
		<?php
		$link_viewall = vc_build_link($link_viewall); 
		if ( $link_viewall['url'] != '' ) { ?>
			<a class="view-all" title="<?php echo $link_viewall['title']; ?>" href="<?php echo $link_viewall['url']; ?>"><?php echo esc_html__('View all', 'mbstore-shortcodes'); ?></a>
		<?php
		} ?>
	</div>
	<?php 
	if( $ids ) {
		$args = array(
			    'post_type' 		=> 'product',
			    'posts_per_page' 	=> '-1',
			    'post__in'			=> explode(',', $ids),
			    'post_status' 		=> 'publish'
	    );
		$special_loop = new WP_Query($args);
	}
	?>
	<div class="content-tab<?php echo ( $ids && $special_loop->have_posts() ) ? ' have-special-box':''; ?>">
		<?php if( $ids && $special_loop->have_posts() ) : ?>
		<div class="special-box">
			<div class="product_list grid owl-carousel">
				<?php
				while ( $special_loop->have_posts() ) : $special_loop->the_post();
				    wc_get_template( 'vc/item-special.php');
				endwhile;
				?>
			</div>
		</div>
		<?php endif;
		wp_reset_postdata();
		?>
		<div class="content-tab-inner">
			<?php
			include mbstore_shortcode_woo_template('product-tab/tab-content'); 
			?>
		</div>
	</div>
</div>
	<?php
	$output .= ob_get_clean();
}
echo $output;
