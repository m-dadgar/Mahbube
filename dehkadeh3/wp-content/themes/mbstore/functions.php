<?php
define( 'MBSTORE_THEME_DIR', get_template_directory() );
define( 'MBSTORE_THEME_URI', get_template_directory_uri() );
require_once( MBSTORE_THEME_DIR.'/framework/init.php' );
/** 
 *   Initialize Visual Composer in the theme.
 **/
add_action( 'vc_before_init', 'mbstore_vc_setastheme' );
function mbstore_vc_setastheme() {
	if ( function_exists('vc_set_as_theme') ) vc_set_as_theme(true);
}
/** 
 *	Width of content, it's max width of content without sidebar.
 **/
if ( ! isset( $content_width ) ) { $content_width = 660; }

/** 
 *	Set base function for theme.
 **/
if ( ! function_exists( 'mbstore_setup' ) ) {
    function mbstore_setup() {
        global $mbstore_opt;
    	// Load default theme textdomain.
        load_theme_textdomain( 'mbstore' , MBSTORE_THEME_DIR . '/languages' );
		// Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
		// Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
        // Add title-tag, it auto title of head
        add_theme_support( 'title-tag' );
        // Enable support for Post Formats.
        add_theme_support( 'post-formats',
            array(
                'video', 'quote', 'link', 'gallery'
            )
        );
        // Register images size
        add_image_size('mbstore_blog_tiny_thumb', 70, 70, true);
        add_image_size('mbstore_blog_137100_thumb', 137, 100, true);
        add_image_size('mbstore_blog_default_thumb', 870, 580, true);
        if(class_exists('WooCommerce')){
            add_image_size('mbstore_woo_7084_thumb', 70,84, true);
            add_image_size('mbstore_woo_83100_thumb', 83,100, true);
            add_image_size('mbstore_woo_170207_thumb', 170,207, true);
            add_image_size('mbstore_woo_470580_thumb', 470,580, true);
        }
		//Setup the WordPress core custom background & custom header feature.
         $default_background = array(
            'default-color' => '#FFF',
        );
        add_theme_support( 'custom-background', $default_background );
        $default_header = array();
        add_theme_support( 'custom-header', $default_header );
        // Register navigations
	    register_nav_menus( array(
			'main_navigation' => esc_html__( 'Main navigation', 'mbstore' ),
            'categories_navigation'  => esc_html__( 'Categories navigation', 'mbstore' ),
            'main_categories_navigation'  => esc_html__( 'Main Categories navigation', 'mbstore' ),
		) );
    }
    add_action ( 'after_setup_theme', 'mbstore_setup' );
}

/** 
    Add class for body
 **/
add_filter( 'body_class', 'mbstore_bodyclass' );
function mbstore_bodyclass( $classes ) {
    if ( mbstore_themeoption('use_boxedlayout', 0) == 1) {
        $classes[] = 'boxed-layout';
    }
    $classes[] = 'layout-type-'.mbstore_layouttype('layouttype', 'm-r');
    if( mbstore_themeoption('advance_tooltip', 1) == 1){
        $classes[] = 'use-tooltip';
    }
    if( mbstore_themeoption('use_stickmenu') == 1){
        $classes[] = 'use_stickmenu';
    }
    if ( mbstore_themeoption('woo_uselazyload') == 1 ){
        $classes[] = 'use_lazyload';
    }
    if ( is_page() && mbstore_metabox('useslideshow') == 1 && mbstore_metabox('revolutionslider') != '' ) {
        $classes[] = 'use-slideshow';
    }
    if ( is_page() && mbstore_metabox('page_class') != '' ) {
        $classes[] = mbstore_metabox('page_class');
    }
    if ( !mbstore_hasbreadcrumbs() ) {
        $classes[] = 'no-breadcrumb';
    }
    $classes[] = 'header-'.mbstore_getoption('header_style', 'style3');
    $classes[] = 'footer-'.mbstore_getoption('footer_layout', '2');
    if ( mbstore_getoption('enable_search_cat') == true ) $classes[] = 'enable-search-cat';
    if(class_exists('WooCommerce')){
        global $product;
        $classes[] = 'woocommerce';
        if( is_product() && $product->get_type() === 'variable' && mbstore_themeoption('woo_designvariations', 1) == 1 && mbstore_getoption('use_variation_thumb', 1) == 1 ){
            $classes[] = 'use-variation-thumb';
        }
        if( is_product() ){
            $classes[] = 'product-bg-box-'.mbstore_getoption('woo_bg_box_style', 1);
        }
        if ( is_product_category() ) {
            $cat_slideshow = mbstore_woo_cat_option( 'product_cat_slideshow' );
        } elseif ( is_shop() ) {
            $cat_slideshow = mbstore_getoption('revolutionslider');
        }
        if( !empty($cat_slideshow) ) { $classes[] = 'have-cat-slideshow'; }
    }

    return $classes;
}

function mbstore_widgetlocations(){
    // Register widgetized locations
    if(function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => esc_html__( 'Widget Area','mbstore' ),
            'id'   => 'sidebar-1', // sidebar-1 for defualt
            'description'   => esc_html__( 'These are widgets for the Widget Area.','mbstore' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title"><span>',
            'after_title'   => '</span></h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__( 'Woo Sidebar','mbstore' ),
            'id'   => 'woo-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title"><span>',
            'after_title'   => '</span></h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__( 'Woo Sidebar - Horizontal','mbstore' ),
            'id'   => 'woo-sidebar-horizontal',
            'before_widget' => '<div id="%1$s" class="widget woo-sidebar-horizontal %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));
        register_sidebar(array(
            'name' => esc_html__( 'Blog Sidebar','mbstore' ),
            'id'   => 'blog-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title"><span>',
            'after_title'   => '</span></h3>',
        ));
      
    }
}
add_action( 'widgets_init', 'mbstore_widgetlocations' );
/** 
 *	Add styles & scripts
 **/
function mbstore_scripts() {
	global $mbstore_opt, $wp_query;
    $optimize = '.min'; $optimize = '';
	// Enqueue style
	$css_file = mbstore_css_file();
	wp_enqueue_style('bootstrap', MBSTORE_THEME_URI . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('owlcarousel', MBSTORE_THEME_URI . '/assets/css/owl.carousel.min.css');
    wp_enqueue_style('slick', MBSTORE_THEME_URI . '/assets/css/slick.min.css');
    wp_enqueue_style('flaticon', MBSTORE_THEME_URI . '/assets/fonts/flat-icon/flaticon.css');
	wp_enqueue_style('font-awesome', MBSTORE_THEME_URI . '/assets/fonts/awesome/css/font-awesome.min.css');
    wp_enqueue_style('mbstore-ie9', MBSTORE_THEME_URI . '/assets/css/ie9.css');
    wp_enqueue_style('select2', MBSTORE_THEME_URI . '/assets/css/select2.min.css' );
    if(class_exists('WooCommerce')){
        if ( mbstore_themeoption('woo_usepopupimage', 1) == 1 ) {
            wp_enqueue_style( 'woocommerce_prettyPhoto_css' );
        }
    }
	wp_enqueue_style('mbstore-theme-style', MBSTORE_THEME_URI . '/assets/css/' . $css_file);

    wp_register_script('slick', MBSTORE_THEME_URI . '/assets/js/slick'.$optimize.'.js', array('jquery'), '', true); wp_enqueue_script('slick');
	wp_register_script('owlcarousel', MBSTORE_THEME_URI . '/assets/js/owl.carousel.min.js', array('jquery'), '', true);
    wp_enqueue_script('owlcarousel'); // Alway enqueue
	wp_register_script('masonry', MBSTORE_THEME_URI . '/assets/js/masonry.pkgd.min.js', array('jquery'), '', true);
    wp_enqueue_script('isotope', MBSTORE_THEME_URI . '/assets/js/isotope.pkgd.min.js', array('jquery'), '', true);
	wp_register_script('imagesloaded', MBSTORE_THEME_URI . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), '', true);
    wp_register_script('mbstore-blog-ajax', MBSTORE_THEME_URI . '/assets/js/sns-blog-ajax.js', array('jquery'), '', true);
	
    // Enqueue script
    wp_enqueue_script('countdown', MBSTORE_THEME_URI . '/assets/countdown/jquery.countdown.min.js', array('jquery'), '2.1.0', true);
    wp_enqueue_script('bootstrap', MBSTORE_THEME_URI . '/assets/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('bootstrap-tabdrop', MBSTORE_THEME_URI . '/assets/js/bootstrap-tabdrop.min.js', array('jquery'), '', true);
    wp_enqueue_script('select2', MBSTORE_THEME_URI.'/assets/js/select2.min.js', array(), '', true);
    if( mbstore_themeoption('woo_uselazyload', 0) == 1 ) wp_enqueue_script('lazyload', MBSTORE_THEME_URI . '/assets/js/jquery.lazyload'.$optimize.'.js', array(), '', true);
    wp_enqueue_script('waitforimages', MBSTORE_THEME_URI.'/assets/js/jquery.waitforimages'.$optimize.'.js', array(), '', true);
    
    if(class_exists('WooCommerce')){
        if ( mbstore_themeoption('woo_usepopupimage', 1) == 1 ) {
            wp_enqueue_script( 'prettyPhoto' );
        }
        if ( defined('MBSTORE_SHORTCODES_URL') && null !== MBSTORE_SHORTCODES_URL ) {
            wp_enqueue_script('sns-products-ajaxtab', MBSTORE_THEME_URI . '/assets/js/sns-products-ajaxtab'.$optimize.'.js', array('jquery'), '', true);
        }
        if( mbstore_themeoption('woo_usecloudzoom', 1) == 1 ) {
            wp_enqueue_script('jquery-elevatezoom', MBSTORE_THEME_URI.'/assets/js/jquery.elevatezoom'.$optimize.'.js', array('jquery'), '', true);
        }
        wp_enqueue_script('mbstore-woocommerce', MBSTORE_THEME_URI.'/assets/js/sns-woocommerce.js', array('jquery'), '', true);
    }
    wp_enqueue_script('mbstore-script', MBSTORE_THEME_URI . '/assets/js/sns-script.js', array('jquery'), '', true);
    // IE
    wp_enqueue_script('html5shiv', MBSTORE_THEME_URI . '/assets/js/html5shiv.min.js', array('jquery'), '');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
    wp_enqueue_script('respond', MBSTORE_THEME_URI . '/assets/js/respond.min.js', array('jquery'), '');
    wp_script_add_data('respond', 'conditional', 'lt IE 9');
    // Add style inline with option in admin theme option
    wp_add_inline_style('mbstore-theme-style', mbstore_cssinline());
    // Add inline scritp
    wp_add_inline_script('mbstore-script', mbstore_jsinline());
    // Code to declare the URL to the file handing the AJAX request
    $js_params = array(
    	'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'query_vars' => $wp_query->query_vars
    );
    wp_localize_script('ajax-request', 'sns', $js_params);
    
}
add_action( 'wp_enqueue_scripts', 'mbstore_scripts' );

/*
 * Enqueue admin styles and scripts
 */
function mbstore_admin_styles_scripts(){
	wp_enqueue_style('mbstore-admin-style', MBSTORE_THEME_URI.'/assets/css/admin-style.css');
	wp_enqueue_style( 'wp-color-picker' );
	
	wp_enqueue_media();
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script('mbstore-admin-template', MBSTORE_THEME_URI.'/assets/js/sns-admin-template.js', array( 'jquery', 'wp-color-picker' ), false, true);
}
add_action('admin_enqueue_scripts', 'mbstore_admin_styles_scripts');

// Editor style
add_editor_style('assets/css/editor-style.css');
/**
 * CSS inline
**/
function mbstore_cssinline(){
    global $mbstore_opt;
    $inline_css = '';
    // Body style
    $bodycss = '';
    if (mbstore_themeoption('use_boxedlayout') == 1) {
        if( $mbstore_opt['body_bg_type'] == 'img' ){
            $bodycss .= 'background-image: url('.$mbstore_opt['body_bg_type_img']['url'].');';
        }
    }
    if(isset($mbstore_opt['body_font']) && is_array($mbstore_opt['body_font'])) {
        $body_font = '';
        foreach($mbstore_opt['body_font'] as $propety => $value)
            if($value != 'true' && $value != 'false' && $value != '' && $propety != 'subsets' && $propety != 'google' )
                $body_font .= $propety . ':' . $value . ';';
        
        if($body_font != '') $bodycss .= $body_font;
    }
    $inline_css .= 'body {'.$bodycss.'}';
    return $inline_css;
}

/* 
 * Add tpl footer
 */
function mbstore_tplfooter() {
    ob_start();
    require MBSTORE_THEME_DIR . '/tpl-footer.php';
    echo ob_get_clean();
}
add_action('wp_footer', 'mbstore_tplfooter');
/* 
 * Custom js inline and js in admin panel theme
 */
function mbstore_jsinline() {
    // write out custom code
    $output = '';
    ob_start();
    ?>
    if (typeof ajaxurl == 'undefined') {
        var ajaxurl = '<?php echo esc_js( admin_url('admin-ajax.php') ); ?>';
    }
    var sns_sp_var = [];
    sns_sp_var['poup'] = '<?php echo (mbstore_themeoption('woo_usepopupimage', 1)) ? 1 : 0 ; ?>';
    sns_sp_var['zoom'] = '<?php echo (mbstore_themeoption('woo_usecloudzoom', 1)) ? 1 : 0 ; ?>';
    sns_sp_var['zoomtype'] = '<?php echo mbstore_getoption('woo_zoomtype', 'lens'); ?>';
    sns_sp_var['zoommobile'] = '<?php echo (mbstore_themeoption('woo_usezoommobile', 0)) ? 1 : 0 ; ?>';
    sns_sp_var['thumbnum'] = '<?php echo mbstore_themeoption('woo_thumb_num', 5) ; ?>';
    sns_sp_var['lenssize'] = '<?php echo mbstore_themeoption('woo_lenssize', 200) ; ?>';
    sns_sp_var['lensshape'] = '<?php echo mbstore_themeoption('woo_lensshape', 'round') ; ?>';
    <?php
    if(class_exists('WooCommerce')){
        global $product;
        $theID = get_the_id();
        $product = wc_get_product( $theID );
        if( is_product() && $product->get_type() === 'variable' && mbstore_themeoption('woo_designvariations', 1) == 1 ){
            $attributes = $product->get_attributes(); ?>
            var sns_arr_attr = {};
            <?php foreach ( $attributes as $attribute ) :
                if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
                    continue;
                } else {}
                $terms = wc_get_product_terms( $product->get_id(), $attribute['name'], array( 'fields' => 'all' ) );
                $type = '';
                $key_val = array();
                $i = 0;
                foreach ($terms as $term) { $i++;
                    $type = mbstore_get_term_byid( $term->term_id, 'mbstore_product_attribute_type' );
                    $type = ($type == '') ? 'text' : $type;
                    switch ($type) {
                        case 'color':
                            if( mbstore_getoption('use_variation_thumb', 1) == 1){
                                $available_variations = $product->get_available_variations();
                                foreach ($available_variations as $available_variation) {
                                    if($term->slug === $available_variation['attributes']["attribute_$term->taxonomy"]){
                                        $image_src = get_post_thumbnail_id( $available_variation['variation_id'] ); 
                                        $image_src = wp_get_attachment_image_src( $image_src, 'shop_catalog');
                                        $image_src = isset($image_src['0']) ? $image_src['0'] : '';
                                        $key_val[$term->slug] = $image_src;
                                    }
                                }
                            }else {
                                $key_val[$term->slug] = mbstore_get_term_byid( $term->term_id, 'mbstore_product_attribute_color' );
                            }
                            break;
                        default: // type is text
                            $key_val[$term->slug] = $term->name;
                            break;
                    }
                }
                ?>

                var attributeName = '<?php echo esc_attr($attribute['name']) ?>';
                var data_type = '<?php echo esc_attr($type); ?>';
                var key_val = {};
                <?php foreach ($key_val as $key => $value):?>
                    key_val['<?php echo esc_attr($key) ?>'] = '<?php echo esc_attr($value) ?>';
                <?php endforeach;?>
                sns_arr_attr['attribute_' + attributeName] = {'type': data_type, key_val};
            <?php endforeach;
        }
    }
    $output = ob_get_clean();
    return $output;
}
/** 
 *  Quick view for product list style
 **/
function mbstore_quickview_liststyle(){ //return;
    if ( !class_exists('YITH_WCQV_Frontend') ) return;
    global $product;
    $product_id = 0;
    // get product id
    ! $product_id && $product_id = yit_get_prop( $product, 'id', true );
    $button = '<a href="#" class="button yith-wcqv-button" data-product_id="' . esc_attr($product_id) . '">'.esc_html__('Quick view', 'mbstore').'</a>';
    echo apply_filters( 'yith_add_quick_view_button_html', $button, esc_html__('Quick view', 'mbstore'), $product );
}
/** 
 *	Tile for page, post
 **/
function mbstore_pagetitle(){
	// Disable title in page
	if( is_page() && function_exists('rwmb_meta') && rwmb_meta('mbstore_showtitle') == '2' ) return;
	// Show title in page, single post
	if( is_single() || is_page() || ( is_home() && get_option( 'show_on_front' ) == 'page' ) ) : ?>
		<h1 class="page-header">
            <span><?php the_title(); ?></span>
        </h1>
        
    <?php 
    // Show title for category page
    elseif ( is_category() ) : ?>
        <h1 class="page-header">
            <span><?php single_cat_title(); ?></span>
        </h1>
    <?php
    // Author
    elseif ( is_author() ) : ?>
        <h1 class="page-header">
            <span>
        <?php
            printf( esc_html__( 'All posts by: %s', 'mbstore' ), get_the_author() );
        ?>
            </span>
        </h1>
        <?php if ( get_the_author_meta( 'description' ) ) : ?>
        <header class="archive-header">
            <div class="author-description"><p><?php the_author_meta( 'description' ); ?></p></div>
        </header>
        <?php endif; ?>
    <?php 
    // Tag
    elseif ( is_tag() ) : ?>
        <h1 class="page-header">
            <span>
            <?php printf( esc_html__( 'Tag Archives: %s', 'mbstore' ), single_tag_title( '', false ) ); ?>
            </span>
        </h1>
        <?php
        $term_description = term_description();
        if ( ! empty( $term_description ) ) : ?>
        <header class="archive-header">
            <?php printf( '<div class="taxonomy-description">%s</div>', $term_description ); ?>
        </header>
        <?php endif; ?>
    <?php 
    // Search
    elseif ( is_search() ) : ?>
    <h1 class="page-header"><span><?php printf( esc_html__( 'Search Results for: %s', 'mbstore' ), get_search_query() ); ?></span></h1>
    <?php
    // Archive
    elseif ( is_archive() ) : ?>
        <?php the_archive_title( '<h2 class="page-header">', '</h2>' ); ?>
        <?php
        if( get_the_archive_description() ): ?>
        <header class="archive-header">
            <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
        </header>
        <?php    
        endif;
        ?>
    <?php
    // Default
    else : ?>
        <h1 class="page-header">
            <span><?php the_title(); ?></span>
        </h1>
    <?php
	endif;
}

// Excerpt Function
if(!function_exists('mbstore_excerpt')){
    function mbstore_excerpt($limit, $afterlimit='[...]') {
        $limit = ($limit) ? $limit : 55 ;
        $excerpt = get_the_excerpt();
        if( $excerpt != '' ){
           $excerpt = explode(' ', strip_tags( $excerpt ), intval($limit));
        }else{
            $excerpt = explode(' ', strip_tags(get_the_content( )), intval($limit));
        }
        if ( count($excerpt) >= $limit ) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).' '.$afterlimit;
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
        return strip_shortcodes( $excerpt );
    }
}

// Word Limiter
function mbstore_limitwords($string, $word_limit) {
    $words = explode(' ', $string);
    if ( $word_limit < count($words) ){
        return implode(' ', array_slice($words, 0, $word_limit)) . ' ...';
    }else{
        return implode(' ', array_slice($words, 0, $word_limit));
    }
}
function mbstore_limitcharacter($string, $character_limit) {
    if ( $character_limit < strlen($string) ){
        return substr($string, 0, $character_limit) . ' ...';
    }else{
        return $string;
    }
}
//
if(!function_exists('mbstore_sharebox')){
    function mbstore_sharebox( $layout='',$args=array() ){
        if ( class_exists('SimpleShareButtonsAdder\Plugin') ) {
        ?>
        <div class="post-share-block">
            <?php echo do_shortcode('[ssba-buttons]'); ?>
        </div>
        <?php
        }
    }
}
//
if(!function_exists('mbstore_relatedpost')){
    function mbstore_relatedpost(){
        global $post;
        if($post){
        	$post_id = $post->ID;
        }else{
        	// Return if cannot find any post
        }
        
        $relate_count = mbstore_themeoption('related_num');
        $get_related_post_by = mbstore_themeoption('related_posts_by');

        $args = array(
            'post_status' => 'publish',
            'posts_per_page' => $relate_count,
            'orderby' => 'date',
            'ignore_sticky_posts' => 1,
            'post__not_in' => array ($post_id)
        );
        
        if($get_related_post_by == 'cat'){
        	$categories = wp_get_post_categories($post_id);
        	$args['category__in'] = $categories;
        }else{
        	$posttags = wp_get_post_tags($post_id);
        	
        	$array_tags = array();
        	if($posttags){
        		foreach ($posttags as $tag){
        			$tags = $tag->term_id;
        			array_push($array_tags, $tags);
        		}
        	}
        	$args['tag__in'] = $array_tags;
        }
        
        $relates = new WP_Query( $args );
        $template_name = '/framework/tpl/posts/related_post.php';
        if(is_file(MBSTORE_THEME_DIR.$template_name)) {
            include(MBSTORE_THEME_DIR.$template_name);
        }
        wp_reset_postdata();
    }
}

/*
 * Function to display number of posts.
 */
function mbstore_get_post_views($post_id){
	$count_key = 'post_views_count';
	$count = get_post_meta($post_id, $count_key, true);
	if($count == ''){
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
		return esc_html__('0 view', 'mbstore');
	}
	return $count. esc_html__(' View', 'mbstore');
}

/*
 * Function to count views.
 */
function mbstore_set_post_views($post_id){
	$count_key = 'post_views_count';
	$count = get_post_meta($post_id, $count_key, true);
	if($count == ''){
		$count = 0;
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
	}else{
		$count++;
		update_post_meta($post_id, $count_key, $count);
	}
}
/*
* Redmore for excerpt
*/
function mbstore_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }
    $link = sprintf(
        '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
        esc_url( get_permalink( get_the_ID() ) ),
        '<span>'.esc_html__('Read More', 'mbstore').'</span>'
    );
    return $link;
}
add_filter( 'excerpt_more', 'mbstore_excerpt_more' );

/*
* Comment
*/
function mbstore_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <?php $add_below = ''; ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
        <div class="comment-body">
            <div class="comment-user-meta">
                <?php echo get_avatar($comment, 80); ?>
                <div class="comment-head">
                    <h4 class="comment-user"><?php echo get_comment_author_link(); ?></h4>
                    <div class="date">
                        <?php 
                        printf(esc_html__('%1$s at %2$s', 'mbstore'), get_comment_date(),  get_comment_time()) 
                        ?>
                    </div>
                    <div class="comment-meta">
                        <?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'mbstore'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'])))?>
                        <?php edit_comment_link(esc_html__('Edit', 'mbstore'),'  ','') ?>
                    </div>
                </div>
                <?php if ($comment->comment_type != 'pingback'): ?>
                <div class="comment-content">
                    <?php if ($comment->comment_approved == '0') : ?>
                    <p>
                        <em><?php echo esc_html__('Your comment is awaiting moderation.', 'mbstore') ?></em><br />
                    </p>
                    <?php endif; ?>
                     <?php comment_text() ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
  <?php 
}
/** 
 *	Breadcrumbs
 **/
function mbstore_hasbreadcrumbs(){
    $showbreadcrumbs = mbstore_themeoption('showbreadcrump', 1);
    if ( get_post_type( get_the_ID() ) == 'page' ) :
        if ( is_front_page() || ( mbstore_metabox('showbreadcrump', '2') == '2' ) ) :
            $showbreadcrumbs = 0;
        endif;
    endif;
    if ( $showbreadcrumbs == 1 && !is_front_page()  && !is_404()) :
        return true;
    else:
        return false;
    endif;
}
function mbstore_getbreadcrumbs(){
    if ( mbstore_hasbreadcrumbs() ) : 
        $bread_class = '';
        ?>
        <div id="sns_breadcrumbs" class="wrap<?php echo esc_attr($bread_class); ?>">
            <div class="container">
                <?php 
                $template_name = '/tpl-breadcrumb.php';
                if(is_file(MBSTORE_THEME_DIR.$template_name)) {
                    if( strpos($bread_class, 'have-bg-img') != false ) {
                        echo '<div class="inner">';
                            include(MBSTORE_THEME_DIR.$template_name);
                            woocommerce_template_single_title();
                        echo '</div>';
                    }else{
                        include(MBSTORE_THEME_DIR.$template_name);
                    }
                }
                ?>
            </div>
        </div>
    <?php endif;
    // Add somebody after main menu & breadcrumbs
    do_action('mbstore_after_mainmenu');
}
add_action( 'wp_ajax_mbstore_wlupdatenumber', 'mbstore_wl_update_number' );
add_action( 'wp_ajax_nopriv_mbstore_wlupdatenumber', 'mbstore_wl_update_number' );
function mbstore_wl_update_number(){ 
    if ( function_exists('YITH_WCWL') ) {
        die( json_encode(YITH_WCWL()->count_products()) );
    }
}
/** 
 *  Search Ajax From
 **/
if( !function_exists('mbstore_get_searchform') ){
    function mbstore_get_searchform($search_box_type = 'def'){
        $exists_woo = (class_exists('WooCommerce'))?true:false;
        if( $exists_woo ){
            $taxonomy = 'product_cat';
            $post_type = 'product';
            $placeholder_text = esc_attr__('Enter keywords ...', 'mbstore');
        }else{
            $taxonomy = 'category';
            $post_type = 'post';
            $placeholder_text = esc_attr__('Enter keywords ...', 'mbstore');
        }
        $options = '<option value="">'.esc_html__('All categories', 'mbstore').'</option>';
        $options .= mbstore_get_searchform_option($taxonomy, 0, 0);
        $uq = rand().time();
        echo '<div class="sns-searchwrap" data-useajaxsearch="true" data-usecat-ajaxsearch="true">';
        echo '<div class="sns-ajaxsearchbox">
        <form method="get" id="search_form_' . $uq . '" action="' . esc_url( home_url( '/'  ) ) . '">';
        if( $search_box_type != 'hide_cat' ){
            echo '<select class="select-cat" name="cat">' . $options . '</select>';
        }
        echo '
        <div class="search-input">
            <input type="text" value="' . get_search_query() . '" name="s" id="s_' . $uq . '" placeholder="' . esc_attr($placeholder_text) . '" autocomplete="off" />
            <button type="submit">
                '. esc_html__('Search', 'mbstore') .'
            </button>
            <input type="hidden" name="post_type" value="' . esc_attr($post_type) . '" />
            <input type="hidden" name="taxonomy" value="' . esc_attr($taxonomy) . '" />
         </div>
        </form></div>';
        echo '<div class="sbtn-close"></div></div>';
    }
}

if( !function_exists('mbstore_get_searchform_option') ){
    function mbstore_get_searchform_option($taxonomy = 'product_cat', $parent = 0, $level = 0){
        $options = '';
        $spacing = '';
        for( $i = 0; $i < $level * 3 ; $i++ ){
            $spacing .= '&nbsp;';
        }
        $args = array(
            'number'        => '',
            'hide_empty'   => 1,
            'orderby'      =>'name',
            'order'        =>'asc',
            'parent'       => $parent
        );
        $select = '';
        $categories = get_terms($taxonomy, $args);
        if( is_search() &&  isset($_GET['cat']) && $_GET['cat'] != '' ){
            $select = $_GET['cat'];
        }
        $level++;
        $selected = '';
        if( is_array($categories) ){
            foreach( $categories as $cat ){
                if ($select == $cat->slug) $selected = ' selected';
                else  $selected = '';
                $options .= '<option value="' . esc_attr($cat->slug) . '"'.esc_attr($selected).'>' . esc_html($spacing) . esc_html($cat->name) . '</option>';
                $options .= mbstore_get_searchform_option($taxonomy, $cat->term_id, $level);
            }
        }
        return $options;
    }
}

/** 
 *  Search by Title only From
 **/
function mbstore_search_by_title_only( $search )  {  
    global $wpdb, $wp_query;
    if ( empty( $search ) )  
        return $search; // skip processing - no search term in query  
    $q = $wp_query->query_vars;  
    $n = ! empty( $q['exact'] ) ? '' : '%';  
    $search =  
    $searchand = '';  
    foreach ( (array) $q['search_terms'] as $term ) {  
        $term = esc_sql( $wpdb->esc_like( $term ) );  
        $like = $n . $term . $n;
        $search .= $wpdb->prepare( "{$searchand}($wpdb->posts.post_title LIKE %s)", $like );
        $searchand = ' AND ';  
    }  
    if ( ! empty( $search ) ) {  
        $search = " AND ({$search}) ";  
        if ( ! is_user_logged_in() )  
            $search .= " AND ($wpdb->posts.post_password = '') ";  
    } 
    return $search;  
}  
if ( mbstore_themeoption('search_title_only') == true ) add_filter( 'posts_search', 'mbstore_search_by_title_only', 10, 2 );

/**
 * Ajax search action
 **/
add_action( 'wp_ajax_mbstore_ajax_search', 'mbstore_ajax_search' );
add_action( 'wp_ajax_nopriv_mbstore_ajax_search', 'mbstore_ajax_search' );
if( !function_exists('mbstore_ajax_search') ){
    function mbstore_ajax_search(){
        global $post;
        $exists_woo = (class_exists('WooCommerce'))?true:false;
        if( $exists_woo ){
            $taxonomy = 'product_cat';
            $post_type = 'product';
        }else{
            $taxonomy = 'category';
            $post_type = 'post';
        }
        if ( mbstore_getoption('enable_search_cat') == true ) $num_result = 6;
        else $num_result = 6;
        //$num_result = -1;
        $keywords = $_POST['keywords'];
        $category = isset($_POST['category'])? $_POST['category']: '';
        $args = array(
            'post_type'        => $post_type,
            'post_status'      => 'publish',
            's'                => $keywords,
            'posts_per_page'   => $num_result
        );
        if( $exists_woo && mbstore_themeoption('search_title_only') != true ){
            $args['meta_query'] = array(
                array(
                    'key'       => '_visibility',
                    'value'     => array('catalog', 'visible'),
                    'compare'   => 'IN'
                )
            );
        }
        if( $category != '' ){
            $args['tax_query'] = array(
                array(
                    'taxonomy'  => $taxonomy,
                    'terms'     => $category,
                    'field'     => 'slug'
                )
            );
        } 
        $results = new WP_Query($args);
        if( $results->have_posts() ){
            $extra_class = '';
            if( isset($results->post_count, $results->found_posts) && $results->found_posts > $results->post_count ){
                $extra_class = 'allcat-result';
            }
            $html = '<ul class="'.esc_attr($extra_class).'">';
            while( $results->have_posts() ){
                $results->the_post();
                $link = get_permalink($post->ID);
                $image = '';
                if( $post_type == 'product' ){
                    $product = wc_get_product($post->ID);
                    $image = $product->get_image();
                }
                else if( has_post_thumbnail($post->ID) ){
                    $image = get_the_post_thumbnail($post->ID, 'thumbnail');
                }
                $html .= '<li>';
                    if( $image ){
                        $html .= '<div class="thumbnail">';
                            $html .= '<a href="'.esc_url($link).'">'. $image .'</a>';
                        $html .= '</div>';
                    }
                    $html .= '<div class="meta">';
                        $html .= '<a href="'.esc_url($link).'" class="title">'. mbstore_ajaxsearch_highlight_key($post->post_title, $keywords) .'</a>';
                        if( $post_type == 'product' ){
                            if( $price_html = $product->get_price_html() ){
                                $html .= '<span class="price">'. $price_html .'</span>';
                            }
                        }
                    $html .= '</div>';
                $html .= '</li>';
            }
            $html .= '</ul>';
            if( isset($results->post_count, $results->found_posts) && $results->found_posts > $results->post_count ){
                $viewall_text = sprintf( esc_html__('View all %d results', 'mbstore'), $results->found_posts );
                $html .= '<div class="viewall-result">';
                    $html .= '<a href="#">'. $viewall_text .'</a>';
                $html .= '</div>';
            }
            wp_reset_postdata();
            
            $return = array();
            $return['html'] = $html;
            $return['keywords'] = $keywords;
            die( json_encode($return) );
        }else{
            wp_reset_postdata();
            $return = array();
            if( $exists_woo ){
                $return['html'] = esc_html__('No products were found matching your selection', 'mbstore');
            }else{
                $return['html'] = esc_html__('No post were found matching your selection', 'mbstore');
            }  
            $return['keywords'] = $keywords;
            die( json_encode($return) );
        }
    }
}
/**
 *  Highlight search key
 **/
if( !function_exists('mbstore_ajaxsearch_highlight_key') ){
    function mbstore_ajaxsearch_highlight_key($string, $keywords){
        $hl_string = '';
        $position_left = stripos($string, $keywords);
        if( $position_left !== false ){
            $position_right = $position_left + strlen($keywords);
            $hl_string_rightsection = substr($string, $position_right);
            $highlight = substr($string, $position_left, strlen($keywords));
            $hl_string_leftsection = stristr($string, $keywords, true);
            $hl_string = $hl_string_leftsection . '<span class="hightlight">' . $highlight . '</span>' . $hl_string_rightsection;
        } else{
            $hl_string = $string;
        }
        return $hl_string;
    }
}

/**
 *  Match with default search
 **/
add_filter('woocommerce_get_catalog_ordering_args', 'mbstore_woo_get_catalog_ordering_args');
if( !function_exists('mbstore_woo_get_catalog_ordering_args') ){
    function mbstore_woo_get_catalog_ordering_args( $args ){
        if( class_exists('WooCommerce') && is_search() && !isset($_GET['orderby']) && get_option( 'woocommerce_default_catalog_orderby' ) == 'menu_order' 
            && 1==1 ){
            $args['orderby'] = '';
            $args['order'] = '';
        }
        return $args;
    }
}
/**
 * Slideshow wrap
 **/
function mbstore_slideshow_wrap($container = false){
    if ( is_page() && mbstore_metabox('useslideshow') == 1 ): ?>
    <div id="sns_slideshow" class="wrap">
        <?php
        if ( $container == true ) {
            echo '<div class="container">'.do_shortcode('[rev_slider '.esc_attr(mbstore_metabox('revolutionslider')).' ]').'</div>'; 
        }else{
            echo do_shortcode('[rev_slider '.esc_attr(mbstore_metabox('revolutionslider')).' ]'); 
        }
        ?>
    </div>
    <?php
    endif;
}
/** 
 * Sample data 
 **/
add_action( 'admin_enqueue_scripts', 'mbstore_importlib' );
function mbstore_importlib(){
    wp_enqueue_script('sampledata', MBSTORE_THEME_URI . '/framework/sample-data/assets/script.js', array('jquery'), '', true);
    wp_enqueue_style('sampledata-css', MBSTORE_THEME_URI . '/framework/sample-data/assets/style.css');
}
add_action( 'wp_ajax_sampledata', 'mbstore_importsampledata' );
function mbstore_importsampledata(){
    include_once(MBSTORE_THEME_DIR . '/framework/sample-data/sns-importdata.php');
    mbstore_importdata();
}


/* update info from dehkadeh-wp.ir */
include_once ( dirname(__FILE__) . '/dw/dw.php' );



/* theme admin RTL */
function load_dw_admin_rtl() {
	if( is_rtl() )
		wp_enqueue_style( 'theme_dw_admin_rtl', get_template_directory_uri() . '/dw/admin-rtl.css' );
}
add_action( 'admin_enqueue_scripts', 'load_dw_admin_rtl' );