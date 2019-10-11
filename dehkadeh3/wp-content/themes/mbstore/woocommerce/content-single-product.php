<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="second_block gallery_type_<?php echo esc_attr(mbstore_getoption('woo_gallery_type', 'h')); ?>">
		<div class="primary_block container"><div class="row">
			<div class="entry-img col-xs-6 col-phone-12">
				<div class="inner">
<?php
	/**
	 * woocommerce_before_single_product_summary hook.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
?>
				</div>
			</div>
			<div class="summary entry-summary col-xs-6 col-phone-12">

	<?php
		/**
		 * woocommerce_single_product_summary hook.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 */
		do_action( 'woocommerce_single_product_summary' );
	?>
			</div><!-- .summary -->
		</div></div>
	</div>
	<div class="product-main-content">
		<div class="container"><div class="row">
		<?php if ( mbstore_getoption('product_content_sb') != '' ) : ?>
			<div class="product-data-tabs col-lg-9 col-md-8">
				<?php woocommerce_output_product_data_tabs(); ?>
			</div>
			<div class="inner-sidebar right col-lg-3 col-md-4">
				<?php echo do_shortcode('[mbstore_postwcode name="'.esc_attr(mbstore_getoption('product_content_sb')).'"]'); ?>
			</div>
		<?php else : ?>
			<div class="product-data-tabs col-md-12">
				<?php woocommerce_output_product_data_tabs(); ?>
			</div>
		<?php endif; ?>
		</div></div>
	</div>
	<?php
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		// Upsells Product
	    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	    if (mbstore_themeoption('woo_upsells') == 1 && mbstore_layouttype('layouttype', 'm') == 'm' ) {
	        add_action( 'woocommerce_after_single_product_summary', 'mbstore_woo_output_upsells', 15 );
	    }
	    if ( ! function_exists( 'mbstore_woo_output_upsells' ) ) {
	        function mbstore_woo_output_upsells() {
	            woocommerce_upsell_display( mbstore_themeoption('woo_upsells_num', 8), 1 ); // Display n products in rows of 1
	        }
	    }
	    // Related Product
	    if (mbstore_themeoption('woo_related') != 1){
	        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 10);
	    }else{
	        add_filter( 'woocommerce_output_related_products_args', 'mbstore_woo_output_related' );
	        function mbstore_woo_output_related( $args ) {
	            $args['posts_per_page'] = mbstore_themeoption('woo_related_num', 6); // n related products
	            $args['columns'] = 1; // arranged in 1 columns
	            return $args;
	        }
	    }
	?>
	<div class="product-bottom"><div class="container">
	<?php
		do_action( 'woocommerce_after_single_product_summary' );
	?>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
	</div></div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>