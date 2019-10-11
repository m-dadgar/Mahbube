<?php get_header(); ?>
<!-- Content -->
<div id="sns_content">
	<div class="container">
		<div class="row sns-content sns-woocommerce-page">
			<?php mbstore_leftcol(); ?>
			<div class="<?php echo mbstore_maincolclass(); ?>">
			    <?php
		    	if( is_product() ){
					wc_get_template( 'single-product.php' );
				}else{
					wc_get_template( 'archive-product.php' );
				}
				?>
			</div>
			<?php mbstore_rightcol(); ?>
		</div>
	</div>
</div>
<!-- End Content -->
<?php get_footer(); ?>