<div class="block-product-inner grid-view product-inner">
	<div class="item-inner">
<?php
/**
 * woocommerce_before_shop_loop_item hook.
 *
 * @hooked woocommerce_template_loop_product_link_open - 10
 */
do_action( 'woocommerce_before_shop_loop_item' );
?>
		<div class="item-img clearfix">
			<div class="item-img-info">
				<?php do_action( 'mbstore_woo_before_product_image' ); ?>
				<a class="product-image" href="<?php the_permalink(); ?>">
<?php
/**
 * woocommerce_before_shop_loop_item_title hook.
 *
 * @hooked woocommerce_show_product_loop_sale_flash - 10
 * @hooked mbstore_product_thumbnail - 11
 */

do_action( 'woocommerce_before_shop_loop_item_title' );
?>
				</a>
				<div class="after-product-image">
					<?php do_action( 'mbstore_woo_after_product_image' ); ?>
				</div>
			</div>
		</div>
		<div class="item-info">
			<div class="item-content">
<?php
/**
 * woocommerce_shop_loop_item_title hook.
 *
 * @hooked woocommerce_template_loop_product_title - 10
 */
// do_action( 'woocommerce_shop_loop_item_title' );

/**
 * woocommerce_after_shop_loop_item_title hook.
 *
 * @hooked woocommerce_template_loop_rating - 5
 * @hooked woocommerce_template_loop_price - 10
 */
add_action('mbstore_grid_after_shop_loop_item_title', 'woocommerce_template_loop_product_title', 1);
add_action( 'mbstore_grid_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); 
add_action( 'mbstore_grid_after_shop_loop_item_title', 'mbstore_template_loop_price', 10 ); 

do_action( 'mbstore_grid_after_shop_loop_item_title' );
?>
			</div>
			<div class="buttons-action">
<?php
/**
 * woocommerce_after_shop_loop_item hook.
 *
 * @hooked woocommerce_template_loop_product_link_close - 5
 * @hooked woocommerce_template_loop_add_to_cart - 10
 */
do_action( 'woocommerce_after_shop_loop_item' );
?>
			</div>
		</div>
	</div>
</div>
