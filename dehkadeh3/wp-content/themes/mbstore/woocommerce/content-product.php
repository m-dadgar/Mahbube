<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php post_class(); ?>>
<?php wc_get_template( 'vc/item-grid.php' ); ?>
<?php if ( !is_product() && !is_cart() ) : ?>
	<div class="list-view product-inner">
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<div class="item-img">
			<a class="product-image" href="<?php the_permalink(); ?>">
	<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	?>
			</a>
			<?php mbstore_item_wishlist(); ?>
		</div>
		<div class="product-shop">
			<h3 class="item-title">
			 	<a href="<?php the_permalink(); ?>">
			 		<?php the_title(); ?>
			 	</a>
			</h3>
			<?php
			
			add_action( 'mbstore_after_shop_list_loop_item_title', 'woocommerce_template_single_excerpt', 8 );
			add_action( 'mbstore_after_shop_list_loop_item_title', 'woocommerce_template_loop_rating', 5 ); 
			add_action( 'mbstore_after_shop_list_loop_item_title', 'woocommerce_template_loop_price', 10 ); 
			do_action( 'mbstore_after_shop_list_loop_item_title' );
			?>
			<div class="prd-buttons">
				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
</div>
