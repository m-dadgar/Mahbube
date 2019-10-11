<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
if ( empty( $class ) ) {
	$class = '';
}
?>
<div <?php post_class($class); ?>>
	<div class="block-product-inner list-view">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>
			<div class="item-img">
					<a class="product-image" href="<?php the_permalink(); ?>">
	<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked mbstore_product_thumbnail - 11
	 */
	add_action('mbstore_dailydeal2_item_image', 'woocommerce_show_product_loop_sale_flash', 10);
	add_action('mbstore_dailydeal2_item_image', 'mbstore_special_product_thumbnail', 15);
	do_action( 'mbstore_dailydeal2_item_image' );
	?>
					</a>
					<?php mbstore_quickview_liststyle(); ?>
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
	add_action('mbstore_dailydeal2_after_item_title', 'woocommerce_template_loop_product_title', 5);
	add_action('mbstore_dailydeal2_after_item_title', 'woocommerce_template_loop_rating', 10);
	add_action('mbstore_dailydeal2_after_item_title', 'woocommerce_template_loop_price', 15);
	add_action('mbstore_dailydeal2_after_item_title', 'mbstore_woo_plist_countdown', 20);
	do_action( 'mbstore_dailydeal2_after_item_title' );
	?>
					<a class="viewmore btn" href="<?php the_permalink(); ?>"><?php echo esc_html__('View Detail', 'mbstore'); ?></a>
				</div>
			</div>
	</div>
</div>
