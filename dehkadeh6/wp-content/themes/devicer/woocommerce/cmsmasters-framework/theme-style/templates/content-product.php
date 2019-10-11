<?php
/**
 * @cmsmasters_package 	Devicer
 * @cmsmasters_version 	1.0.0
 */


global $product;


// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
	<article class="cmsmasters_product">
		<div class="cmsmasters_product_wrapper_border">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		
		do_action( 'woocommerce_before_shop_loop_item' );
		?>
		<figure class="cmsmasters_product_img">
			<a href="<?php the_permalink(); ?>">
				<?php woocommerce_template_loop_product_thumbnail(); ?>
			</a>
			<div class="cmsmasters_product_sale_wrap">
			<?php 
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
							devicer_compare_button('list');
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
					echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</span>', $availability['availability']);
				}
			?>
			</div>
		</figure>
		<div class="cmsmasters_product_inner">
			<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
			
			do_action( 'woocommerce_before_shop_loop_item_title' );
			
			/**
			* Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			
			do_action( 'woocommerce_shop_loop_item_title' );
			?>
			<header class="cmsmasters_product_header entry-header">
				<?php 
					if (get_the_terms($product->get_id(), 'product_cat')) {
						echo '<div class="cmsmasters_product_cat entry-meta">' . 
							devicer_get_the_category_list($product->get_id(), 'product_cat', ', ') . 
						'</div>';
					}
				?>
				<h3 class="cmsmasters_product_title entry-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>
			</header>
			
			<div class="cmsmasters_product_info_wrap">
				<div class="cmsmasters_product_info">
				<?php
					woocommerce_template_loop_price();
					
					/**
					 * Hook: woocommerce_after_shop_loop_item_title.
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
					remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
					
					do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
				</div>
				<?php
				devicer_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
				if ( 
					$product->is_purchasable() && 
					$product->is_type( 'simple' ) && 
					$product->is_in_stock() 
				) {
					echo '<div class="cmsmasters_product_add_wrap">' . 
						'<div class="cmsmasters_product_add_inner">';
							devicer_woocommerce_add_to_cart_button();
						echo '</div>' . 
					'</div>';
				}
				?>
			</div>
		</div>
		<?php
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

		if(CMSMASTERS_WCQV) {
			remove_action( 'woocommerce_after_shop_loop_item', array(YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
		}
		
		
		if(CMSMASTERS_WOOCOMPARE) {
			global $yith_woocompare;
			
			$compare = $yith_woocompare->obj;
			
			if (get_option('yith_woocompare_compare_button_in_products_list') == 'yes') {
				remove_action('woocommerce_after_shop_loop_item', array($compare, 'add_compare_link'), 20);
			}
		}
		
		do_action( 'woocommerce_after_shop_loop_item' );
		do_action( 'cmsmasters_countdown_action' );
		?>
	</div>
	</article>
</li>