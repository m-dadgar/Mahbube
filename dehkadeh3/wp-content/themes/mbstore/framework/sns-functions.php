<?php
/*
 * Get theme option
 */
function mbstore_themeoption($option, $default = '', $key = ''){
	global $mbstore_opt;
	$value = '';
	// Get config via theme option
	if($key !== ''){
		if ( isset($mbstore_opt[$option][$key]) && $mbstore_opt[$option][$key] ) $value = $mbstore_opt[$option][$key];
	}else{
		if ( isset($mbstore_opt[$option]) && $mbstore_opt[$option] ) $value = $mbstore_opt[$option];
	}
	// Get config via cookie
	if ( isset($_COOKIE['mbstore_'.$option]) && $_COOKIE['mbstore_'.$option] != '' ) {
		$value = $_COOKIE['mbstore_'.$option];
	}
	// Return value when exists ReduxFramework
	if($value || class_exists( 'ReduxFramework' ))
		return $value; 
	// Return default value
	return $default;
}
/*
 * Set theme option
 */
function mbstore_set_themeoption($key, $value){
	global $mbstore_opt;
	if ( $key != '' && $value != '' )
		$mbstore_opt[$key] = $value;
}
/*
 * Get theme & post/page option
 */
function mbstore_getoption($option, $default = '', $type = null){
	global $post;
    $value = ''; $value1 = '';
    $value = mbstore_themeoption($option, $default);
    if ( $type == 'image' && is_array($value) ){
    	if ( $value['url'] == '' ) {
    		$value = $default;
    	}else{
    		$value = $value['url'];
    	}
    }
    // Get config via page/product config
    if ( function_exists('rwmb_meta') ){
    	// Just page/product have rwmb_meta 
    	if( ( class_exists('WooCommerce') && is_woocommerce() ) || is_page() ){
    		$value1 = rwmb_meta('mbstore_'.$option);
	    	if ( ( !is_array($value1) && trim($value1) == '' ) || ( is_array($value1) && empty($value1) ) ) {
	    		if ( class_exists('WooCommerce') ) {
		    		if ( is_product() ){
		    			$value1 = rwmb_meta('mbstore_'.$option, array(), $post->ID);
		    		}elseif( is_shop() ) { // for shop page
		    			$value1 = rwmb_meta('mbstore_'.$option, array(), get_option('woocommerce_shop_page_id'));
		    		}
		    	}
	    	}else{
	    		if ( $type == 'image' ){
			    	foreach ( $value1 as $img ) {
			    		$value1 = $img['full_url'];
			    	}
			    }
	    	}
    	}
	}
	if ( ( ( !is_array($value1) && trim($value1) == '' ) || ( is_array($value1) && empty($value1) )  ) && $default ) {
		if ( $value != '' ) {
			return $value;
		}else{
			return $default;
		}
	}
    if ( $value1 != '' ) return $value1;
    if ( $value != '' ) return $value;
	return $default;
}
/*
 * Get theme & post/page option
 */
function mbstore_woo_cat_option($option, $default = '', $type = null){
    $value = ''; $value1 = '';
    $value = mbstore_themeoption($option, $default);
    if ( $type == 'image' ){
    	if ( $value['url'] == '' ) {
    		$value = $default;
    	}else{
    		$value = $value['url'];
    	}
    }
    if( class_exists('WooCommerce') && is_woocommerce() && is_product_category() ){
        $cate = get_queried_object();
        $value1 = mbstore_get_term_byid( $cate->term_id, 'mbstore_'.$option );
    }
    if ( ( ( !is_array($value1) && trim($value1) == '' ) || ( is_array($value1) && empty($value1) )  ) && $default ) {
		if ( $value != '' ) {
			return $value;
		}else{
			return $default;
		}
	}
    if ( $value1 != '' ) return $value1;
    if ( $value != '' ) return $value;
	return $default;
}
/*
 * Get meta box data
 */
function mbstore_metabox($field_id, $args = array()){
	if( !function_exists('rwmb_meta') ){
		return '';
	}
	$field_id = 'mbstore_'.$field_id;
	if( function_exists('is_shop') && is_shop() ) {
		return rwmb_meta($field_id, $args, get_option('woocommerce_shop_page_id'));
	}
	return rwmb_meta($field_id, $args);
}
function mbstore_get_term_byid($term_id, $key, $default = ''){
	$value = get_term_meta( $term_id, $key );
    $value = ( is_array($value) && isset($value[0]) && $value[0] != '' ) ? $value[0] : $default; //var_dump($key.': '.$value. ' & default: '.$default);
    return $value;
}
/*
 * Css file
 */
function mbstore_css_file(){
	$compile_obj = new MBStoreCompileSass();
	$optimize = '';
	$theme_color = mbstore_getoption('theme_color', '#55bc75');
	// Get page meta data
	if ( is_page() && function_exists('rwmb_meta') && rwmb_meta('mbstore_page_themecolor') == 1) {
		$theme_color = rwmb_meta('mbstore_theme_color') != '' ? rwmb_meta('mbstore_theme_color') : $theme_color;
	}
	$body_color = mbstore_themeoption('body_font', '#666666', 'color');
	$scss_compile = mbstore_themeoption('advance_scss_compile', '1');
	$scss_format = mbstore_themeoption('advance_scss_format', 'scss_formatter_compressed');
	// Compile scss and get css file name
	$css_file = $compile_obj->mbstore_getstyle(
		$scss_compile,
		array('dir' => MBSTORE_THEME_DIR . '/assets/scss/', 'name' => 'theme'),
		array('dir' => MBSTORE_THEME_DIR . '/assets/css/', 'name' => 'theme'),
		$scss_format,
		array(
			'$color1' => $theme_color,
			'$color' => $body_color,
		)
	);
	return $css_file;
}
/**
 * Layout type
**/
function mbstore_layouttype($option='layouttype', $default=''){
	$layouttype = mbstore_getoption($option, $default);
	if( class_exists('WooCommerce') && is_woocommerce() ){
		//$layouttype = mbstore_metabox('mbstore_layouttype', $default);
		if( is_product_category() ){
			$cate = get_queried_object();
			$layouttype = mbstore_get_term_byid($cate->term_id, 'mbstore_product_cat_layout');
			if ( trim($layouttype) == '' ) $layouttype = 'l-m';
		}
		if( is_product_tag() ){
			$layouttype = 'l-m';
		}
		if( is_product() ){ 
			$layouttype = 'm';
		}
	}
	if ( trim($layouttype) == '' ) $layouttype = 'm-r';
	return $layouttype;
}
/**
 * Left Column
**/
function mbstore_leftcol(){
	$layouttype = mbstore_layouttype('layouttype', 'm-r');
	if ( $layouttype == '' || $layouttype == 'm-r' || $layouttype == 'm' ) 
		return '';
	?>
	<div class="col-md-3 sns-left">
		<?php
	    if( class_exists('WooCommerce') && is_woocommerce() ){
	        if( is_product() ){
	    		dynamic_sidebar('product-sidebar');
	    	}else{
	        	if( is_active_sidebar( 'woo-sidebar' ) ) {
		        	dynamic_sidebar( 'woo-sidebar' ); 
		        }else{
		        	dynamic_sidebar('widget-area');
		        }
	        }
	    }else{
	        if( mbstore_getoption('leftsidebar') != '' && is_active_sidebar( mbstore_getoption('leftsidebar') ) ) {
	        	dynamic_sidebar( mbstore_getoption('leftsidebar') ); 
	        }else{
	        	dynamic_sidebar('widget-area');
	        }
	    } ?>
	</div>
	<?php
 }
/**
 * Right Column
**/
 function mbstore_rightcol(){
 	$layouttype = mbstore_layouttype('layouttype', 'm-r');
	if ( $layouttype == '' || $layouttype == 'l-m' || $layouttype == 'm' ) 
		return '';
	?>
	<div class="col-md-3 sns-right">
		<?php
	    if( class_exists('WooCommerce') && is_woocommerce() ){
	    	if( is_product() ){
	    		dynamic_sidebar('product-sidebar');
	    	}else{
	        	if( is_active_sidebar( 'woo-sidebar' ) ) {
		        	dynamic_sidebar( 'woo-sidebar' ); 
		        }else{
		        	dynamic_sidebar('widget-area');
		        }
	        }
	    }else{
	        if( mbstore_getoption('rightsidebar') != '' && is_active_sidebar( mbstore_getoption('rightsidebar') ) ) {
	        	dynamic_sidebar( mbstore_getoption('rightsidebar') ); 
	        }else{
	        	dynamic_sidebar('widget-area');
	        }
	    } ?>
	</div>
	<?php
 }
/**
 * Main class
**/
function mbstore_maincolclass(){
	$layouttype = mbstore_layouttype('layouttype', 'm-r');
	$mclass = 'sns-main';
	if ( $layouttype == 'l-m' ) {
		$mclass .= ' col-md-9 main-left';
	}elseif( $layouttype == 'm-r' ){
		$mclass .= ' col-md-9 main-right';
	}elseif ( $layouttype == 'l-m-r' ) {
		$mclass .= ' col-md-6 main-center';
	}else{
		$mclass .= ' col-md-12';
	}
	return $mclass;
}
/**
 * Return number of published sticky posts
**/
function mbstore_get_sticky_posts_count(){
	global $wpdb;
	$sticky_posts = array_map('absint', (array)get_option('sticky_posts') );
	return count($sticky_posts) > 0 ? $wpdb->get_var( $wpdb->prepare( "SELECT COUNT( 1 ) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND ID IN (".implode(',', $sticky_posts).")" ) ) : 0;
}

/**
 * Display Ajax loading
 */
function mbstore_paging_nav_ajax( $content_div = '#snsmain', $template = '' ){
	// Don't print empty markup if there is only one page.
	if( $GLOBALS['wp_query']->max_num_pages < 2 ){
		return;
	}
	$label1 = esc_html__('Load more', 'mbstore');
	$label2 = esc_html__('Loading', 'mbstore');
	if ( mbstore_themeoption('pagination') == 'ajax2' ){
		$class = 'load-more auto-load';
		$label1 = $label2;
	}else{
		$class = 'load-more click-load';
	}
	?>
	<nav class="navigation-ajax" role="navigation">
		<a href="<?php echo esc_url('javascript:void(0)'); ?>" 
			data-target="<?php echo esc_attr($content_div);?>" 
			data-template="<?php echo esc_attr($template); ?>" 
			data-numload="<?php echo esc_attr(mbstore_themeoption('masonry_numload', 3))?>" 
			data-label="<?php echo esc_attr($label1); ?>"
			data-labelload="<?php echo esc_attr($label2); ?>"
			id="navigation-ajax" 
			class="<?php echo esc_attr($class); ?>">
			<?php echo esc_html($label1); ?>
		</a>
	</nav>
	<?php
}
/*
 * Ajax page navigation
 */
function mbstore_ajax_load_next_page(){
	// Get current layout
	global $mbstore_blog_layout;
	$mbstore_blog_layout = isset($_POST['mbstore_blog_layout']) ? esc_html($_POST['mbstore_blog_layout']) : '';
	if( $mbstore_blog_layout == '' ) $mbstore_blog_layout = mbstore_getoption('blog_type');
	// Get current page
	$page = $_POST['page'];
	// Number of published sticky posts
	$sticky_posts = mbstore_get_sticky_posts_count();
	// Current query vars
	$vars = $_POST['vars'];
	// Convert string value into corresponding data types
	foreach ($vars as $key => $value){
		if( is_numeric($value) ) $vars[$key] = intval($value);
		if( $value == 'false' ) $vars[$key] = false;
		if( $value == 'true' ) $vars[$key] = true;
	}
	// Item template file 
	$template = $_POST['template'];
	// Return next page
	$page = intval($page) + 1;
	$posts_per_page = $_POST['numload'];
    if( $page == 2 && $vars['posts_per_page'] ){
        $offset = $vars['posts_per_page'];
    }else{
        $offset = $vars['posts_per_page'] + ($page - 2) * $posts_per_page;
    }
	// Get more posts per page than necessary to detect if there are more posts
	$args = array('post_status'=>'publish', 'posts_per_page'=>$posts_per_page + 1, 'offset'=>$offset);
	$args = array_merge($vars, $args);
	// Remove unnecessary variables
	unset($args['paged']);
	unset($args['p']);
	unset($args['page']);
	unset($args['pagename']); // This is necessary in case Posts Page is set to static page
	$query = new WP_Query($args);
	$idx = 0;
	if( $query->have_posts() ){
		while ( $query->have_posts() ){
			$query->the_post();
			$idx = $idx + 1;
			if( $idx < $posts_per_page + 1 )
				get_template_part($template, get_post_format());
		}
		if( $query->post_count <= $posts_per_page ){
			// There are no more posts
			// Print a flag to detect
			echo '<div id="sns-load-more-no-posts" class="no-posts"><!-- --></div>';
		}
	}else{
		// No posts found
	}
	/* Restore original Post Data*/
	wp_reset_postdata();
	die('');
}
// When the request action is "load_more", the mbstore_ajax_load_next_page() will be called
add_action('wp_ajax_load_more', 'mbstore_ajax_load_next_page');
add_action('wp_ajax_nopriv_load_more', 'mbstore_ajax_load_next_page');

function remove_img_attr ($html)
{
    return preg_replace('/(sizes|width|height)="\d+"\s/', "", $html);
}


/**
 * Display navigation to next/previous post when applicable.
 */
function mbstore_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous ) {
		return;
	}?>
	<div class="post-standard-navigation navigation post-navigation" role="navigation">
    	<?php 
    	if( $previous ):?>
        <div class="nav-previous">
            <div class="area-content">
            	<?php
            	previous_post_link('%link',''); // link overlay
                ?>
                <div class="nav-content">
                	<?php 
                		previous_post_link( '<div class="nav-post-link">%link</div>', _x( 'Previous post', 'Previous post link', 'mbstore' ) );
						previous_post_link( '<div class="nav-post-title">%link</div>');
					?>	
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if( $next ): ?>
        <div class="nav-next">
            <div class="area-content ">
            	<?php
            	next_post_link( '%link',''); // link overlay
                ?>
                <div class="nav-content">
                	<?php 
                		next_post_link( '<div class="nav-post-link">%link</div>', _x( 'Next post', 'Next post link', 'mbstore' ) );
						next_post_link( '<div class="nav-post-title">%link</div>');
					?>
                </div>
            </div>
        </div>
        <?php endif; ?>
	</div>
	<?php
}

if ( mbstore_themeoption('advance_cpanel', 0) == 1 ){
	// Set cookie theme option
	add_action( 'wp_ajax_sns_setcookies', 'mbstore_setcookies' );
	add_action( 'wp_ajax_nopriv_sns_setcookies', 'mbstore_setcookies' );
	// Reset cookie theme option
	add_action( 'wp_ajax_sns_resetcookies', 'mbstore_resetcookies' );
	add_action( 'wp_ajax_nopriv_sns_resetcookies', 'mbstore_resetcookies' );
	function mbstore_setcookies(){
		setcookie('mbstore_'.$_POST['key'], $_POST['value'], time()+3600*24*1, '/'); // 1 day
	}
	function mbstore_resetcookies(){
		setcookie('mbstore_advance_scss_compile', '', 0, '/');
		setcookie('mbstore_use_boxedlayout', '', 0, '/');
		setcookie('mbstore_use_stickmenu', '', 0, '/');
	}
}