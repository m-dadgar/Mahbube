<?php
/**
 * @cmsmasters_package 	Devicer
 * @cmsmasters_version 	1.0.0
 */


global $product;


list($cmsmasters_layout) = devicer_theme_page_layout_scheme();

function devicer_related_products_args($args) {
	$args['posts_per_page'] = 3;
	$args['columns'] = 3;
	
	return $args;
}


/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );


if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$cmsmasters_id = get_the_ID();
$cmsmasters_heading = get_post_meta($cmsmasters_id, 'cmsmasters_heading', true);
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="cmsmasters_single_product">
	<?php echo '<div class="cmsmasters_breadcrumbs">' . 
						'<div class="cmsmasters_breadcrumbs_aligner"></div>' . 
						'<div class="cmsmasters_breadcrumbs_inner">';
					
					
					if (CMSMASTERS_WOOCOMMERCE && is_woocommerce()) {
						woocommerce_breadcrumb();
					} elseif (function_exists('yoast_breadcrumb')) {
						$yoast_enable = get_option('wpseo_internallinks');
						
						
						if ($yoast_enable['breadcrumbs-enable']) {
							yoast_breadcrumb();
						} else {
							devicer_breadcrumbs();
						}
					} else {
						devicer_breadcrumbs();
					}
					
					
					echo '</div>' . 
					'</div>';
					?>
		<div class="cmsmasters_product_left_column">
		<?php
			$availability = $product->get_availability();

			if (esc_attr($availability['class']) == 'out-of-stock') {
				echo '<div class="cmsmasters_product_sale_wrap">';
					echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</span>', $availability['availability']);
				echo '</div>';
			}
			
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary');
		?>
		</div>
		<div class="summary entry-summary cmsmasters_product_right_column">
			<div class="cmsmasters_product_title_wrap">
				<?php
					if ($cmsmasters_heading == 'disabled') {
						echo '<h1 class="product_title entry-title">' . get_the_title() . '</h1>'; 
					} else {
						echo '<h2 class="product_title entry-title">' . get_the_title() . '</h2>'; 
					}
				?>
			</div>
			<div class="cmsmasters_product_info_wrap">
				<?php 
					devicer_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
					
					woocommerce_template_single_price();

					do_action('cmsmasters_countdown_single_product_action');
				?>
			</div>
			
			<?php

			if ($post->post_excerpt != '' ) {
				echo '<div class="cmsmasters_product_content">';
					woocommerce_template_single_excerpt();
				echo '</div>';
			}

			woocommerce_template_single_add_to_cart();
			
			woocommerce_template_single_sharing();
			
			woocommerce_template_single_meta();

			devicer_sharing_box(esc_html__('Share:', 'devicer'), 'h6');
			

			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
			
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>
	<?php
		if ($cmsmasters_layout != 'fullwidth') {
			add_filter('woocommerce_output_related_products_args', 'devicer_related_products_args');
		}
		
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
