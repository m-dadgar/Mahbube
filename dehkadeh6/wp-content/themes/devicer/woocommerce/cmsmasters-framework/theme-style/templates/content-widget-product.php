<?php
/**
 * @cmsmasters_package 	Devicer
 * @cmsmasters_version 	1.0.1
 */


global $product; 

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>

<li>
<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

	<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php echo devicer_return_content( $product->get_image() ); ?>
		<span class="product-title"><?php wp_kses_post( $product->get_name() ); ?></span>
	</a>
	<?php 
	echo '<div class="price">';
	echo devicer_return_content( $product->get_price_html()) ;
	echo '</div>';
	if ( ! empty( $show_rating ) ) : 
		devicer_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
	endif;
	do_action( 'woocommerce_widget_product_item_end', $args );
	?>
</li>