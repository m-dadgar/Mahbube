<!-- Footer -->
<?php 
	$footer_layout = mbstore_getoption('footer_layout', '2'); ?>	
	<div id="sns_footer" class="sns-footer <?php echo 'footer-'.$footer_layout; ?>">
		<div class="container">
	<?php
	$default_html = wp_kses(__( '<div class="row"><div class="col-md-12 copyright">© 2018 SNSTheme. All Rights Reserved. Developed By <a href="%s">%s</a></div></div>', 'mbstore' ), array(
												'a' => array(
													'href' => array(),
													'class' => array(),
												),
												'div' => array(
													'class' => array(),
												),
												'strong' => array(
													'class' => array(),
												), 
											) );
	if ( !is_404() ) {
		if ( $footer_layout != '') {
			$f_wcode = new WP_Query(array( 'name' => 'footer-'.$footer_layout, 'post_type' => 'post-wcode' ));
		    if ($f_wcode->have_posts()) {
		        echo do_shortcode('[mbstore_postwcode name="footer-'.$footer_layout.'"]');
		    }else{
		    	printf( $default_html, esc_url(home_url('/')), esc_html__('SNSTheme', 'mbstore') );
		    }
		    wp_reset_postdata();
		}else{
			printf( $default_html, esc_url(home_url('/')), esc_html__('SNSTheme', 'mbstore') );
		}
	}else{
		printf( $default_html, esc_url(home_url('/')), esc_html__('SNSTheme', 'mbstore') );
	}
	?>
		</div>
	</div>
	<?php
	$advance_scrolltotop = mbstore_themeoption('advance_scrolltotop', 1);
	$advance_cpanel = mbstore_themeoption('advance_cpanel', 0);
	if ( $advance_scrolltotop == 1 || $advance_cpanel == 1 ) : ?>
	<!-- Tools -->
	<div id="sns_tools">
		<?php 
		if ( $advance_scrolltotop == 1 ) : ?>
		<div class="sns-croll-to-top">
			<a href="#" id="sns-totop"></a>
		</div>
		<?php
		endif;
		if ( $advance_cpanel == 1 ) : 
			get_template_part( 'tpl-cpanel');
		endif;
		?>
	</div>
	<?php endif; ?>
</div>