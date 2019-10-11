<?php
/**
 * @cmsmasters_package 	Devicer
 * @cmsmasters_version 	1.0.0
 */


global $product;


// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

$cmsmasters_metadata = explode(',', $cmsmasters_product_metadata);

$descriptions = in_array('descriptions', $cmsmasters_metadata) ? true : false;
$rating = in_array('rating', $cmsmasters_metadata) ? true : false;
$price = in_array('price', $cmsmasters_metadata) ? true : false;
?>
<li <?php post_class(); ?>>
	<article class="cmsmasters_product">
		<div class="cmsmasters_product_wrapper_border">
		<?php
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		
		do_action( 'woocommerce_before_shop_loop_item' );

		$attachment_ids = $product->get_gallery_image_ids();
		?>
		<figure class="cmsmasters_product_img">
			<a href="<?php the_permalink(); ?>">
				<?php 
					$cmsmasters_product_thumb_size = ($single_products_shortcode == 'small_product' ? 'medium' : 'large');
					
					echo woocommerce_get_product_thumbnail($cmsmasters_product_thumb_size);
				?>
			</a>
			<div class="cmsmasters_product_sale_wrap">
			<?php 
				woocommerce_show_product_loop_sale_flash();
				
				$availability = $product->get_availability();

				if (esc_attr($availability['class']) == 'out-of-stock') {
					echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</span>', $availability['availability']);
				}
			?>
			</div>
		</figure>
		<div class="cmsmasters_product_inner">
			<?php
				remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
				remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
				
				do_action( 'woocommerce_before_shop_loop_item_title' );
				
				
				remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			
				do_action( 'woocommerce_shop_loop_item_title' );
			?>
			<header class="cmsmasters_product_header entry-header">
				<?php 
					if($rating) {
						devicer_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full'); 
					} 
				?>
				<h3 class="cmsmasters_product_title entry-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>
			</header>
			<div class="cmsmasters_product_info_wrap">
				<div class="cmsmasters_product_info">
				<?php
					if($price) {
						woocommerce_template_loop_price();
					}
					
					remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
					remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
					
					do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
				</div>
				<?php 
					if ($descriptions) { 
						the_excerpt(); 
					}

					if (CMSMASTERS_WCPC) {
						global $post;
						
						$cd_product_id = $post->ID;
						$cd_product = wc_get_product( $cd_product_id );

						$cd_product_args = array(
							'items' => array(
								$post->ID => array(
									'before'   => 'false',
									'end_date' => yit_get_prop( $cd_product, '_ywpc_sale_price_dates_to' ),
								)
							), 
							'class' => 'ywpc-countdown-loop'
						);

						$cmsmasters_product_countdown = new YITH_WC_Product_Countdown();
						
						$cmsmasters_product_countdown->add_timer_product('both', $cd_product_args);
					}
				?>
			</div>
		</div>
		<?php
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		
		do_action( 'woocommerce_after_shop_loop_item' );
		?>
	</div>
	</article>
</li>