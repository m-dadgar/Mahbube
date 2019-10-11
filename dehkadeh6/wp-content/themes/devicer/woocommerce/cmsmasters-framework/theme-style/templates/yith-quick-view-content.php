<?php
/**
 * @cmsmasters_package 	Devicer
 * @cmsmasters_version 	1.0.0
 */


$cmsmasters_product_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_product_sharing_box', true);


while ( have_posts() ) : the_post(); ?>

	<div class="product">
		
		<?php
		if ( defined( 'YITH_WCQV_PREMIUM' ) ) {
			if ( !post_password_required() ) {
				?>
				<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>
					
					<?php do_action( 'yith_wcqv_product_image' ); ?>
					
					<?php do_action( 'yith_wcqv_before_product_summary' ); ?>
					
					<div class="summary entry-summary">
						<div class="summary-content">
							<div class="cmsmasters_product_title_info_wrap">
								<div class="cmsmasters_product_title_wrap">
									<?php woocommerce_template_single_title(); ?>
								</div>
								<div class="cmsmasters_product_info_wrap">
									<?php 
									woocommerce_template_single_price();
									
									devicer_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
									?>
								</div>
							</div>
							<div class="cmsmasters_product_content">
								<?php woocommerce_template_single_excerpt(); ?>
							</div>
							<?php
							woocommerce_template_single_add_to_cart();
							
							
							if( get_option( 'yith-wcqv-details-button') == 'yes' ) {
								
								$label = esc_html( get_option( 'yith-wcqv-details-button-label' ) );
								$link  = get_permalink( $product->get_id() );

								echo '<a href="' . $link . '" class="yith-wcqv-view-details button">' . $label . '</a>';
							}
							
							woocommerce_template_single_sharing();
							
							woocommerce_template_single_meta();
							
							
							if ($cmsmasters_product_sharing_box == 'true') {
								devicer_sharing_box();
							}
							?>
						</div>
					</div>
					
					<?php do_action( 'yith_wcqv_after_product_summary' ); ?>
					
				</div>
				<?php
			} else {
				echo get_the_password_form();
			}
		} else {
			?>
			<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('product'); ?>>
			
				<?php do_action( 'yith_wcqv_product_image' ); ?>
				
				<div class="summary entry-summary">
					<div class="summary-content">
						<div class="cmsmasters_product_title_info_wrap">
							<div class="cmsmasters_product_title_wrap">
								<?php woocommerce_template_single_title(); ?>
							</div>
							<div class="cmsmasters_product_info_wrap">
								<?php 
								woocommerce_template_single_price();
								
								devicer_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
								?>
							</div>
						</div>
						<div class="cmsmasters_product_content">
							<?php woocommerce_template_single_excerpt(); ?>
						</div>
						<?php
						woocommerce_template_single_add_to_cart();
						
						woocommerce_template_single_sharing();
						
						woocommerce_template_single_meta();
						
						
						if ($cmsmasters_product_sharing_box == 'true') {
							devicer_sharing_box();
						}
						?>
					</div>
				</div>
				
			</div>
			<?php
		}
		?>
		
	</div>

<?php endwhile; // end of the loop.