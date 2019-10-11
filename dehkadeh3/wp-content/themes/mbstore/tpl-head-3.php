<!-- Header -->
<div id="sns_header" class="wrap <?php echo esc_attr(mbstore_getoption('header_style', 'style3')); ?>">
	<?php
	$th_wcode = new WP_Query(array( 'name' => 'top-header-2', 'post_type' => 'post-wcode' ));
	if ($th_wcode->have_posts()) { ?>
	    <div class="top-header visible-lg visible-md">
			<div class="container">
				<?php echo do_shortcode('[mbstore_postwcode name="top-header-2"]'); ?>
			</div>
		</div>
		<?php
	}
	wp_reset_postdata(); ?>
	<div class="main-header">
		<div class="container">
			<div class="row">
				<?php 
				$class_mh = ' col-lg-6 col-md-6 col-sm-6 col-phone-12';
				if ( class_exists('WooCommerce') ) {
					$class_mh = ' have-woocommerce col-lg-3 col-md-3 col-sm-3 col-phone-12';
				}
				?>
				<div class="header-logo<?php echo esc_attr($class_mh); ?>">
					<div id="logo">
						<?php $logourl = mbstore_getoption('header_logo', MBSTORE_THEME_URI.'/assets/img/logo.png', 'image'); ?>
						<a href="<?php echo esc_url( home_url('/') ) ?>" title="<?php bloginfo( 'sitename' ); ?>">
							<img src="<?php echo esc_attr($logourl); ?>" alt="<?php bloginfo( 'sitename' ); ?>"/>
						</a>
					</div>		
				</div>
				<div class="search col-lg-6 col-md-6 col-sm-6">
					<?php
					if ( mbstore_getoption('enable_search_cat') == true ) mbstore_get_searchform('def');
					else mbstore_get_searchform('hide_cat');
					?>
				</div>
				<?php
				if ( class_exists('WooCommerce') ) : ?>
				<div class="header-right col-lg-3 col-md-3 col-sm-3">
					<div class="mini-cart sns-ajaxcart pull-right">
						<a href="<?php echo wc_get_cart_url(); ?>" class="tongle">
							<span class="cart-number"><?php echo sizeof( WC()->cart->get_cart() );?></span>
						</a>
						<?php if ( !is_cart() && !is_checkout() ) : ?>
							<div class="content">
								<div class="cart-title"><h4><?php echo esc_html__("My cart", "mbstore"); ?></h4></div>
								<div class="block-inner">
									<?php the_widget( 'WC_Widget_Cart', 'title= ', array('before_title' => '', 'after_title' => '') ); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
					
					<?php
					if ( class_exists( 'YITH_Woocompare_Widget') ) { ?>
					<div class="mini-compare hidden-xs">
						<a class="tongle" href="#">
							<span class="number">
								<?php 
								if ( isset($_COOKIE['yith_woocompare_list']) ) {
									echo count(json_decode($_COOKIE['yith_woocompare_list'])); 
								}else{ 
									echo '0';
								}
								?>
							</span>
						</a>
						<div class="content">
							<?php the_widget( 'YITH_Woocompare_Widget', 'title='.esc_attr__('Compare', 'mbstore'), '' ); ?>
						</div>
					</div>
					<?php
					}?>
					<?php
					if ( function_exists('YITH_WCWL') ) { ?>
					<div class="mini-wishlist">
						<a class="tongle" href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>">
							<span class="number"><?php echo YITH_WCWL()->count_products(); ?></span>						
						</a>
					</div>
					<?php
					}?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div id="sns_menu" class="menu-header<?php echo ( has_nav_menu('categories_navigation') ) ? ' have-menu-vertical' : '' ; ?>"><div class="container">
		<?php
	    if(has_nav_menu('categories_navigation')): ?>
		<div id="sns_mainmenu_vertical" class="all-cats<?php echo (mbstore_metabox('type_show_vm') == 'active')?' a-click active':''; ?>">
			<div class="tongle"><?php echo esc_html__('All Categories', 'mbstore'); ?></div>
            <div class="content hidden">
            <?php
	           wp_nav_menu( array(
	           				'theme_location' => 'categories_navigation',
	           				'container' => false, 
	           				'menu_id' => 'categories_navigation',
	           				'walker' => new mbstore_Megamenu_Front,
	           				'menu_class' => 'vertical-style all-categories'
	           	) );
	           	?>
	           	<a class="more-cat hidden" href="#" title="<?php echo esc_attr__('More Categories','mbstore'); ?>"><?php echo esc_html__('More Categories','mbstore'); ?><i class="fa fa-angle-down"></i></a>
				<a class="less-cat hidden" href="#" title="<?php echo esc_attr__('Less Categories','mbstore'); ?>"><?php echo esc_html__('Less Categories','mbstore'); ?><i class="fa fa-angle-up"></i></a>
			</div>
		</div>
		<?php
		endif; ?>
		<div id="sns_mainmenu">
			<?php
                if(has_nav_menu('main_navigation')):
		           wp_nav_menu( array(
		           				'theme_location' => 'main_navigation',
		           				'container' => false, 
		           				'menu_id' => 'main_navigation',
		           				'walker' => new mbstore_Megamenu_Front,
		           				'menu_class' => 'nav navbar-nav visible-lg visible-md'
		           	) );
				else:
					echo '<p class="main_navigation_alert">'.esc_html__('Please sellect menu for Main navigation', 'mbstore').'</p>';
				endif;
			?>
			<div class="menu-sidebar visible-sm visible-xs">
				<div class="btn-navbar leftsidebar"><span class="overlay"></span></div>
				<div class="btn-navbar offcanvas"><span class="overlay"></span></div>
				<div class="btn-navbar rightsidebar"><span class="overlay"></span></div>
			</div>
			<?php
			if(has_nav_menu('main_navigation')):
	           	wp_nav_menu( array(
	           				'theme_location' => 'main_navigation',
	           				'container' => false,
	           				'menu_id' => 'main_menu_sidebar',
	           				'menu_class' => 'resp-nav'
	           	) ); 
			else:
				echo '<div id="main_menu_sidebar"><p class="main_navigation_alert">'.esc_html__('Please sellect menu for Main navigation', 'mbstore').'</p></div>';
			endif;
			?>
		</div>
	</div></div>
</div>
<!-- SlideShow -->
<?php mbstore_slideshow_wrap(); ?>
<!-- Breadcrump -->
<?php mbstore_getbreadcrumbs(); ?>