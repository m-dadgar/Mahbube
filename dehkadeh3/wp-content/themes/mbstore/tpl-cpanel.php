<?php
$buy = mbstore_themeoption('tf_p_link');
?>
<div id="sns_cpanel">
	<!-- <div id="sns_cpanel_content"> -->
	    <div id="sns_cpanel_content" class="cpanel-set">
	    	<div class="envato-buy"><a href="<?php echo esc_url($buy); ?>" title="<?php echo esc_html__('Buy theme now', 'mbstore'); ?>" target="_blank"><i class="fa fa-shopping-cart"></i><?php echo esc_html__('Buy theme now', 'mbstore'); ?></a></div>
	    	<div class="qr-code">
	    		<p><img src="<?php echo MBSTORE_THEME_URI; ?>/assets/img/qrcode.jpg" alt="<?php echo esc_html__('View on mobile', 'mbstore'); ?>"/></p>
	    		<p><span><?php echo esc_html__('View on mobile', 'mbstore'); ?></span></p>
	    	</div>
	    	<div class="demos">
	    		<h4><?php echo esc_html__('Lets explore our demos!', 'mbstore'); ?></h4>
	    		<div class="demo demo-1">
	    			<a class="img" href="http://demo.snstheme.com/wp/mbstore/" title="<?php echo esc_html__('Home #1', 'mbstore'); ?>">
	    				<img src="http://doc.snstheme.com/wp/mbstore/home-1.jpg" alt="<?php echo esc_html__('Home #1', 'mbstore'); ?>"/>
	    			</a>
	    			<a href="http://demo.snstheme.com/wp/mbstore/" title="<?php echo esc_html__('Home #1', 'mbstore'); ?>">
	    				<span><?php echo esc_html__('Home #1', 'mbstore'); ?></span>
	    			</a>
	    		</div>
	    		<div class="demo demo-2">
	    			<a class="img" href="http://demo.snstheme.com/wp/mbstore/home-2/" title="<?php echo esc_html__('Home #2', 'mbstore'); ?>">
	    				<img src="http://doc.snstheme.com/wp/mbstore/home-2.jpg" alt="<?php echo esc_html__('Home #2', 'mbstore'); ?>"/>
	    			</a>
	    			<a href="http://demo.snstheme.com/wp/mbstore/home-2/" title="<?php echo esc_html__('Home #2', 'mbstore'); ?>">
	    				<span><?php echo esc_html__('Home #2', 'mbstore'); ?></span>
	    			</a>
	    		</div>
	    		<div class="demo demo-3">
	    			<a class="img" href="http://demo.snstheme.com/wp/mbstore/home-3/" title="<?php echo esc_html__('Home #3', 'mbstore'); ?>">
	    				<img src="http://doc.snstheme.com/wp/mbstore/home-3.jpg" alt="<?php echo esc_html__('Home #3', 'mbstore'); ?>"/>
	    			</a>
	    			<a href="http://demo.snstheme.com/wp/mbstore/home-3/" title="<?php echo esc_html__('Home #3', 'mbstore'); ?>">
	    				<span><?php echo esc_html__('Home #3', 'mbstore'); ?></span>
	    			</a>
	    		</div>
	    	</div>
	    </div>
	<!-- </div> -->
    <div id="sns_cpanel_btn">
    	<a class="link-buy" href="<?php echo esc_url($buy); ?>" title="<?php echo esc_html__('Buy Theme Now', 'mbstore'); ?>" data-toggle="tooltip" data-original-title="<?php echo esc_html__('Buy Theme Now', 'mbstore'); ?>" data-placement="right" target="_blank">
    		<img src="<?php echo MBSTORE_THEME_URI; ?>/assets/img/envato.png" alt="<?php echo esc_html__('Buy Theme Now', 'mbstore'); ?>"/>
    	</a>
    	<a class="view-demo" href="#" title="<?php echo esc_html__('View All Demos', 'mbstore'); ?>" data-toggle="tooltip" data-original-title="<?php echo esc_html__('View All Demos', 'mbstore'); ?>" data-placement="right">
    		<i class="fa fa-desktop"></i>
    	</a>
    	<a class="link-doc" href="http://doc.snstheme.com/wp/mbstore/" title="<?php echo esc_html__('Live Documentation', 'mbstore'); ?>" data-toggle="tooltip" data-original-title="<?php echo esc_html__('Live Documentation', 'mbstore'); ?>" data-placement="right" target="_blank">
    		<i class="fa fa-life-saver"></i>
    	</a>
    </div>
</div>
<span class="overlay"></span>