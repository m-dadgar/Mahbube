<?php
/**
 * @cmsmasters_package 	Devicer
 * @cmsmasters_version 	1.0.0
 */

 
global $product;

$attachment_ids = $product->get_gallery_image_ids();


// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

if (defined('YITH_WCQV_PREMIUM')) {
	$position = get_option('yith-wcqv-button-position');
}

?>
<div id="yith-woocompare-related" class="woocommerce" <?php if( $iframe ) echo 'data-iframe="1"' ?>>
	<h3 class="yith-woocompare-related-title"><?php echo esc_html($related_title) ?></h3>
	<div class="yith-woocompare-related-wrapper">
		<ul class="related-products products cmsmasters_products">
			<?php foreach( $products as $product_id ) : $product = wc_get_product( $product_id ); ?>
				<li class="ralated-product product">
					<?php
					do_action( 'yith_woocompare_before_single_related_product' );
					?>
					<article class="cmsmasters_product">
						<div class="product-image cmsmasters_product_img">
							<?php
							wc_get_template( 'loop/sale-flash.php' );
							echo wp_kses_post($product->get_image('shop_catalog'));
							
							
							if (CMSMASTERS_WCQV || CMSMASTERS_WCWL || CMSMASTERS_WOOCOMPARE) {
								echo '<div class="cmsmasters_product_features">';
									
									/* WooCommerce Wishlist add to button */
									if (CMSMASTERS_WCWL) {
										echo '<div class="cmsmasters_product_wishlist_button_wrap">';
											devicer_add_wishlist_button();
										echo '</div>';
									}
									
									/* WooCommerce Compare button */
									if(CMSMASTERS_WOOCOMPARE) {
										echo '<div class="cmsmasters_product_compare_button_wrap">';
											if (get_option('yith_woocompare_compare_button_in_products_list') == 'yes') {
												devicer_compare_button('list');
											}
										echo '</div>';
									}
									
									/* WooCommerce Quick View add to button */
									if (CMSMASTERS_WCQV) {
										echo '<div class="cmsmasters_product_view_button_wrap">';
											devicer_quick_view_button();
										echo '</div>';
									}
								
								echo '</div>';
							}
				
							woocommerce_show_product_loop_sale_flash();
							
							$availability = $product->get_availability();

							if (esc_attr($availability['class']) == 'out-of-stock') {
								echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '"><span>' . esc_html( $availability['availability'] ) . '</span></span>', $availability['availability']);
							}
							?>
						</div>
						<div class="cmsmasters_product_inner">
							<?php 
							if (get_the_terms($product->get_id(), 'product_cat')) {
								echo '<div class="cmsmasters_product_cat entry-meta">' . 
									devicer_get_the_category_list($product->get_id(), 'product_cat', ', ') . 
								'</div>';
							}
							
							
							remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
							remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
							
							if(CMSMASTERS_WCQV) {
								remove_action( 'woocommerce_before_shop_loop_item_title', array(YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
							}
							
							do_action( 'woocommerce_before_shop_loop_item_title' );
							
							
							remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
							
							do_action( 'woocommerce_shop_loop_item_title' );
							?>
							<header class="cmsmasters_product_header entry-header">
								<h4 class="cmsmasters_product_title entry-title">
									<a href="<?php the_permalink($product->get_id()); ?>"><?php echo wp_kses_post($product->get_title()); ?></a>
								</h4>
							</header>
							<div class="cmsmasters_product_info">
							<?php
								woocommerce_template_loop_price();
								
								devicer_woocommerce_add_to_cart_button();
								
								devicer_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
								
								
								remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
								remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
								
								do_action( 'woocommerce_after_shop_loop_item_title' );
							?>
						</div>
					</div>
					<?php
					remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
					remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
					?>
					</article>

					<?php
					do_action( 'yith_woocompare_after_single_related_product' );
					?>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php if( count( $products ) >= get_option( 'yith-woocompare-related-visible-num' ) && get_option('yith-woocompare-related-navigation') == 'yes' ) : ?>
			<div class="related-slider-nav">
				<div class="related-slider-nav-prev"></div>
				<div class="related-slider-nav-next"></div>
			</div>
		<?php endif ?>

	</div>
</div>