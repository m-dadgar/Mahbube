<?php
// Declare WooCommerce support in theme
add_action( 'after_setup_theme', 'mbstore_woocommerce_support' );
function mbstore_woocommerce_support() {
    add_theme_support( 'woocommerce');
}
if(class_exists('WooCommerce')){
    // Remove each woo style one by one
    add_filter( 'woocommerce_enqueue_styles', 'mbstore_dequeue_woostyles' );
    function mbstore_dequeue_woostyles( $enqueue_styles ) {
        unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
        unset( $enqueue_styles['woocommerce-layout'] );     // Remove the layout
        unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
        return $enqueue_styles;
    }
    /*
     * Archive Product
     */
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
    add_action( 'woocommerce_before_shop_loop', 'mbstore_archive_wrapper_start', 1 );
    add_action( 'woocommerce_after_main_content', 'mbstore_archive_wrapper_end', 10 );
    
    function mbstore_archive_wrapper_start() {
        if ( is_shop() || is_product_category() || is_product_tag() ) {
            echo '<div class="listing-product-main"><div class="listing-product-wrap">';
        }
    }
    function mbstore_archive_wrapper_end() {
        if ( is_shop() || is_product_category() || is_product_tag() ) echo '</div></div>';
    }
    remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
    add_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 1 );
    add_action( 'woocommerce_before_shop_loop', 'mbstore_archive_before_toolbar_top', 3);
    add_action( 'woocommerce_before_shop_loop', 'mbstore_archive_begin_toolbar_top', 3);
    add_action( 'woocommerce_before_shop_loop', 'mbstore_archive_modeview', 4);
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    add_action( 'woocommerce_before_shop_loop', 'woocommerce_pagination', 30);
    add_action( 'woocommerce_before_shop_loop', 'mbstore_archive_end_toolbar', 31);
    add_action( 'woocommerce_after_shop_loop', 'mbstore_archive_begin_toolbar_bottom', 1);
    add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 5);
    add_action( 'woocommerce_after_shop_loop', 'mbstore_archive_end_toolbar', 31);
    add_action( 'woocommerce_before_shop_loop', 'mbstore_archive_after_toolbar_top', 32 );
    // Set modeview
    add_action( 'wp_ajax_sns_setgridcols','mbstore_set_gridcols' );
    add_action( 'wp_ajax_nopriv_sns_setgridcols', 'mbstore_set_gridcols' );
    function mbstore_set_gridcols(){
        setcookie('sns_woo_gridcols', $_POST['gridcols'] , time()+3600*24*100, '/');
    }
    function mbstore_archive_after_toolbar_top(){
        if ( mbstore_woo_cat_option('woo_usefilterhoz') == true && is_active_sidebar('woo-sidebar-horizontal') ){
            echo '<div class="after-toolbar-top">';
            if ( mbstore_woo_cat_option('woo_usefilterhoz') == true && is_active_sidebar('woo-sidebar-horizontal') ) {
                echo '<div class="filter-widgets">';
                dynamic_sidebar('woo-sidebar-horizontal');
                echo '</div>';
            }
            echo '</div>';
        }
    }
    function mbstore_archive_before_toolbar_top(){
        echo '<div class="before-toolbar-top">';
        if ( apply_filters( 'woocommerce_show_page_title', true ) ) :
        echo '<h1 class="page-title">';
            woocommerce_page_title();
        echo '</h1>';
        woocommerce_result_count();
        endif;
        echo '</div>';
    }
    function mbstore_archive_begin_toolbar_top(){
        echo '<div class="toolbar toolbar-top">';
    }
    function mbstore_archive_begin_toolbar_bottom(){
        echo '<div class="toolbar toolbar-bottom">';
    }
    function mbstore_archive_end_toolbar(){
        echo '</div>';
    }
    function mbstore_archive_modeview(){
        $modeview = 'grid';
        if (isset($_COOKIE['sns_woo_list_modeview']) && $_COOKIE['sns_woo_list_modeview']== 'list') {
            $modeview = 'list';
        }?>
        <ul class="mode-view pull-left">
            <li class="grid1">
                <a class="grid<?php echo ($modeview=='grid')?' active':''; ?>" data-mode="grid" href="#" title="<?php echo esc_attr__('Grid', 'mbstore'); ?>">
                    <span><?php echo esc_html__('Grid', 'mbstore'); ?></span>
                </a>
            </li>
            <li class="list1">
                <a class="list<?php echo ($modeview=='list')?' active':''; ?>" data-mode="list" href="#" title="<?php echo esc_attr__('List', 'mbstore'); ?>">
                    <span><?php echo esc_html__('List', 'mbstore'); ?></span>
                </a>
            </li>
        </ul>
        <?php
    }
    // Set modeview
    add_action( 'wp_ajax_sns_setmodeview','mbstore_set_modeview' );
    add_action( 'wp_ajax_nopriv_sns_setmodeview', 'mbstore_set_modeview' );
    function mbstore_set_modeview(){
        setcookie('sns_woo_list_modeview', $_POST['mode'] , time()+3600*24*100, '/');
    }
    // Slideshow
    add_action( 'mbstore_after_mainmenu', 'mbstore_woo_cat_slideshow', 15 );
    function mbstore_woo_cat_slideshow(){
        $cat_slideshow = '';
        if ( is_product_category() ) {
            $cat_slideshow = mbstore_woo_cat_option( 'product_cat_slideshow' );
        } elseif ( is_shop() ) {
            $cat_slideshow = mbstore_getoption('revolutionslider');
        }
        if( !empty($cat_slideshow) ) { ?>
            <div class="cat-slideshow wrap">
                <div class="container">
                <?php echo do_shortcode('[rev_slider '.esc_attr($cat_slideshow).' ]'); ?>
                </div>
            </div>
        <?php
        }
    }
    // Sub cats
    add_action( 'woocommerce_before_main_content', 'mbstore_archive_subcategories', 16);
    function mbstore_archive_subcategories(){ ?>
        <?php
        $display_type = woocommerce_get_loop_display_mode();
        if ( 'subcategories' === $display_type || 'both' === $display_type ) { ?>
        <ul class="sub-cats">
        <?php
            woocommerce_output_product_categories( array(
                'parent_id' => is_product_category() ? get_queried_object_id() : 0,
            ) ); ?>
        </ul>
        <?php
        }
    }
    // Number product per page
    add_filter( 'loop_shop_per_page', 'mbstore_woo_shop_perpage' );
    function mbstore_woo_shop_perpage() {
        if(is_product_category()){
            $mbstore_number_perpage = mbstore_woo_cat_option( 'number_perpage' );
            if( $mbstore_number_perpage != '' )
                return $mbstore_number_perpage;
        }
        return mbstore_themeoption('woo_number_perpage', 12);
    }
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    add_action( 'woocommerce_after_shop_loop_item', 'mbstore_item_addtocart', 10);
    
    add_action( 'woocommerce_after_shop_loop_item', 'mbstore_item_compare', 12);
    add_action( 'mbstore_woo_after_product_image', 'mbstore_item_ico_excerpt', 10);
    add_action( 'mbstore_woo_after_product_image', 'mbstore_item_wishlist', 11);
    add_action( 'mbstore_woo_before_product_image', 'mbstore_item_short_desc', 10 );
    
    function mbstore_item_short_desc(){
        if ( mbstore_getoption('woo_clickdesc') == 1) {
            echo '<div class="sort-desc">'; woocommerce_template_single_excerpt(); echo '</div>';
        }
    }
    function mbstore_item_ico_excerpt(){
        if ( mbstore_getoption('woo_clickdesc') == 1) { 
            echo '<span class="ico-excerpt"><i class="fa fa-info-circle"></i></span>';
        }
    }
    function mbstore_template_loop_price() {
        global $product; ?>
        <span class="price">
            <?php if ( $price_html = $product->get_price_html() ) : ?>
            <?php printf( $price_html, array(
                                                'span' => array(
                                                    'class' => array(),
                                                ),
                                                'div' => array(
                                                    'class' => array(),
                                                ),
                                            ) ); ?>
            <?php endif; ?>
        </span>
        <?php
    }
    function mbstore_item_addtocart( $args = array() ) {
        global $product;
        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode( ' ', array_filter( array(
                    'button',
                    'product_type_' . $product->get_type(),
                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                    $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                ) ) ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );
            $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
            ?>
            <div class="cart-wrap">
            <?php 
            wc_get_template( 'loop/add-to-cart.php', $args );
            ?>
            </div>
            <?php
        }
    }
    function mbstore_item_wishlist(){
        if( class_exists( 'YITH_WCWL' ) ) {
            echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
        }
    }
    function mbstore_item_wishlist2(){
        if( class_exists( 'YITH_WCWL' ) ) {
            apply_filters( 'yith_wcwl_button_label', 'Wishlist' );
            echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
        }
    }
    function mbstore_item_compare(){
        global $product;
        if( class_exists( 'YITH_Woocompare' ) ) {
            $action_add = 'yith-woocompare-add-product';
            $url_args = array(
                'action' => $action_add,
                'id' => $product->get_id()
            );
            ?>
            <a href="<?php echo esc_url( wp_nonce_url( add_query_arg( $url_args ), $action_add ) ); ?>" class="compare btn btn-primary-outline" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>">
            <?php echo esc_html__( 'Compare', 'mbstore' ); ?>
            </a>
            <?php
        }
    }
    // Override thumbnail
    function mbstore_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
        if(mbstore_themeoption('woo_uselazyload') == 1){
            $id = get_post_thumbnail_id();
            $src = wp_get_attachment_image_src($id, $size);
            $alt = get_the_title($id);
            $class = ( isset($attr['class']) ) ? $attr['class'] : '';
            if (strpos($class, 'lazy') !== false) {
                if ( strpos($class, 'attachment-mbstore_woo_470580_thumb') !== false) {
                    $html = '<img src="'.MBSTORE_THEME_URI.'/assets/img/prod_loading2.gif" alt="'.esc_attr($alt).'" data-original="' . esc_url($src[0]) . '" class="' . esc_attr($class) . '" />';
                } else {
                    $html = '<img src="'.MBSTORE_THEME_URI.'/assets/img/prod_loading.gif" alt="'.esc_attr($alt).'" data-original="' . esc_url($src[0]) . '" class="' . esc_attr($class) . '" />';
                }
            }
        }
        return $html;
    }
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    add_action( 'woocommerce_before_shop_loop_item_title', 'mbstore_product_thumbnail', 11 );
    add_filter('post_thumbnail_html', 'mbstore_post_thumbnail_html', 99, 5);
    function mbstore_product_thumbnail(){
        global $post;
        $size = 'shop_catalog';
        if ( has_post_thumbnail() ) {
            if( mbstore_themeoption('woo_uselazyload') == 1 ){
                echo get_the_post_thumbnail( $post->ID, $size, array('class' => "lazy attachment-$size") );
            }else{
                echo get_the_post_thumbnail( $post->ID, $size );
            }
        } elseif ( wc_placeholder_img_src() ) {
            echo wc_placeholder_img( $size );
        }
    }
    function mbstore_special_product_thumbnail(){
        global $post;
        $size = 'mbstore_woo_470580_thumb';
        if ( has_post_thumbnail() ) {
            if( mbstore_themeoption('woo_uselazyload') == 1 ){
                echo get_the_post_thumbnail( $post->ID, $size, array('class' => "lazy attachment-$size") );
            }else{
                echo get_the_post_thumbnail( $post->ID, $size );
            }
        } elseif ( wc_placeholder_img_src() ) {
            echo wc_placeholder_img( $size );
        }
    }
    function mbstore_single_product_thumbnail(){
        global $post;
        $size = 'shop_single';
        if ( has_post_thumbnail() ) {
            if( mbstore_themeoption('woo_uselazyload') == 1 ){
                echo get_the_post_thumbnail( $post->ID, $size, array('class' => "lazy attachment-$size") );
            }else{
                echo get_the_post_thumbnail( $post->ID, $size );
            }
        } elseif ( wc_placeholder_img_src() ) {
            echo wc_placeholder_img( $size );
        }
    }
    function woocommerce_show_product_loop_sale_flash(){
        global $post, $product;
        if ( $product->is_on_sale() ) :
            if ( $product->get_type() == 'variable' || $product->get_type() == 'grouped' ){
                echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale! ', 'mbstore' ) . '</span>', $post, $product );
            }else{
                $price = wc_price( $product->get_regular_price() - $product->get_sale_price(), array('decimals' => 0) ) . $product->get_price_suffix();
                $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
                echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">-' . $percentage . '%</span>', $post, $product );
            }
        endif;
    }
    add_action('woocommerce_single_product_summary', 'mbstore_woo_single_countdown', 25);
    function mbstore_woo_single_countdown () {
        global $post, $product;
        // Get the Sale Price Date To of the product
        $sale_price_dates_to = ( $date = get_post_meta( $post->ID, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
        if(!empty($sale_price_dates_to)):
            // Set sale price date to default 10 days for http://demo.snstheme.com/
            if( strpos(site_url(), 'demo.snstheme.com') || strpos(site_url(), 'dev.snsgroup.me') ){
                if($sale_price_dates_to == 0) $sale_price_dates_to = date('Y/m/d', strtotime('+10 days'));
            }
            $uq = rand().time();
            ?>
            <div class="time-count-down" id="sns-tcd-<?php echo esc_attr($uq); ?>" data-date="<?php echo esc_attr($sale_price_dates_to); ?>">
                <div class="clock-digi">
                    <div><div class="day"></div><?php esc_html_e('Days', 'mbstore');?></div>
                    <div><div class="hours"></div><?php esc_html_e('Hours', 'mbstore');?></div>
                    <div><div class="minutes"></div><?php esc_html_e('Mins', 'mbstore');?></div>
                    <div><div class="seconds"></div><?php esc_html_e('Secs', 'mbstore');?></div>
                </div>
            </div>
        <?php endif;
    }
    function mbstore_woo_pgrid_countdown () {
        global $post, $product;
        // Get the Sale Price Date To of the product
        $sale_price_dates_to = ( $date = get_post_meta( $post->ID, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
        if(!empty($sale_price_dates_to)):
            // Set sale price date to default 10 days for http://demo.snstheme.com/
            if( strpos(site_url(), 'demo.snstheme.com') || strpos(site_url(), 'dev.snsgroup.me') ){
                if($sale_price_dates_to == 0) $sale_price_dates_to = date('Y/m/d', strtotime('+10 days'));
            }
            $uq = rand().time();
            ?>
            <div class="time-count-down" id="sns-tcd-<?php echo esc_attr($uq); ?>" data-date="<?php echo esc_attr($sale_price_dates_to); ?>">
                <div class="offer-label"><?php esc_html_e('Offer end in:', 'mbstore');?></div>
                <div class="clock-digi">
                    <div><div class="day"></div><?php esc_html_e('Days', 'mbstore');?></div>
                    <div><div class="hours"></div><?php esc_html_e('Hours', 'mbstore');?></div>
                    <div><div class="minutes"></div><?php esc_html_e('Mins', 'mbstore');?></div>
                    <div><div class="seconds"></div><?php esc_html_e('Secs', 'mbstore');?></div>
                </div>
            </div>
        <?php endif;
    }
    function mbstore_woo_plist_countdown () {
        global $post, $product;
        // Get the Sale Price Date To of the product
        $sale_price_dates_to = ( $date = get_post_meta( $post->ID, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
        if( !empty($sale_price_dates_to) || strpos(site_url(), 'demo.snstheme.com') || strpos(site_url(), 'dev.snsgroup.me') ):
            // Set sale price date to default 10 days for http://demo.snstheme.com/
            if( strpos(site_url(), 'demo.snstheme.com') || strpos(site_url(), 'dev.snsgroup.me') ){
                if($sale_price_dates_to == 0) $sale_price_dates_to = date('Y/m/d', strtotime('+10 days'));
            }
            $uq = rand().time();
            ?>
            <div class="time-count-down" id="sns-tcd-<?php echo esc_attr($uq); ?>" data-date="<?php echo esc_attr($sale_price_dates_to); ?>">
                <div class="clock-digi">
                    <div><div class="day"></div><?php esc_html_e('Days', 'mbstore');?></div>
                    <div><div class="hours"></div><?php esc_html_e('Hours', 'mbstore');?></div>
                    <div><div class="minutes"></div><?php esc_html_e('Mins', 'mbstore');?></div>
                    <div><div class="seconds"></div><?php esc_html_e('Secs', 'mbstore');?></div>
                </div>
            </div>
        <?php endif;
    }
    function mbstore_discount_percent(){
        global $product;
        if ( $product->get_sale_price() ) {
            echo '<span class="badge-discount-percent">-' . round ( ( ( $product->get_regular_price() - $product->get_sale_price() ) * 100 ) / $product->get_regular_price() ) . '%</span>';
        }
    }
    
    function mbstore_woo_query($type, $post_per_page=-1, $cat='', $offset=0, $paged=1){
        global $woocommerce;
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $post_per_page,
            'post_status' => 'publish',
            'offset'            => $offset,
            'paged' => $paged
        );
        switch ($type) {
            case 'best_selling':
                $args['meta_key']='total_sales';
                $args['orderby']='meta_value_num';
                $args['ignore_sticky_posts']   = 1;
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                break;
            case 'featured_product':
                $args['ignore_sticky_posts']=1;
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                $args['post__in'] = wc_get_featured_product_ids();
                break;
            case 'top_rate':
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby']  = array(
                    'meta_value_num' => 'DESC',
                    'ID'             => 'ASC',
                );
                break;
            case 'recent':
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                break;
            case 'on_sale':
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                $args['post__in'] = wc_get_product_ids_on_sale();
                break;
            case 'hot_deal':
                global $wpdb;
                $query = $wpdb->prepare("
                    SELECT posts.ID, posts.post_parent
                    FROM {$wpdb->prefix}posts posts
                    INNER JOIN {$wpdb->prefix}postmeta ON (posts.ID = {$wpdb->prefix}postmeta.post_id)
                    INNER JOIN {$wpdb->prefix}postmeta AS mt1 ON (posts.ID = mt1.post_id)
                    WHERE
                        posts.post_status = 'publish'
                        AND  (mt1.meta_key = '_sale_price_dates_to' AND mt1.meta_value >= %s) 
                        GROUP BY posts.ID 
                        ORDER BY %s", time(), "ASC");
                $product_ids_raw = $wpdb->get_results($query);
                $product_ids_hotdeal = array();
                foreach ( $product_ids_raw as $product_raw ) {
                    if(!empty($product_raw->post_parent)){
                        $product_ids_hotdeal[] = $product_raw->post_parent;
                    }else{
                        $product_ids_hotdeal[] = $product_raw->ID;  
                    }
                }
                $product_ids_hotdeal = array_unique($product_ids_hotdeal);
                if ( is_array($product_ids_hotdeal) && count($product_ids_hotdeal) == 0 ) {
                    $product_ids_hotdeal = wc_get_product_ids_on_sale(); 
                }
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                $args['post__in'] = $product_ids_hotdeal;
                break;
            case 'recent_review':
                if($post_per_page == -1) $_limit = 4;
                else $_limit = $post_per_page;
                global $wpdb;
                $query = $wpdb->prepare( "
                    SELECT c.comment_post_ID 
                    FROM {$wpdb->prefix}posts p, {$wpdb->prefix}comments c 
                    WHERE p.ID = c.comment_post_ID AND c.comment_approved > %d 
                    AND p.post_type = %s AND p.post_status = %s
                    AND p.comment_count > %d ORDER BY c.comment_date ASC" ,
                    0, 'product', 'publish', 0 );
                $results = $wpdb->get_results($query, OBJECT);
                $_pids = array();
                foreach ($results as $re) {
                    if(!in_array($re->comment_post_ID, $_pids))
                        $_pids[] = $re->comment_post_ID;
                    if(count($_pids) == $_limit)
                        break;
                }
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                $args['post__in'] = $_pids;
                break;
        }
        if($cat!=''){
            $args['product_cat']= $cat;
        }
        return new WP_Query($args);
    }
    /*
     * Single Product
     */
    // Share box in product page
    if ( mbstore_themeoption('woo_sharebox') == 1 ) {
        add_action('woocommerce_share', 'mbstore_sharebox', 22);
    }
    // Rename product tab
    add_filter( 'woocommerce_product_tabs', 'mbstore_woo_rename_tabs', 98 );
    function mbstore_woo_rename_tabs( $tabs ) {
        if ( isset($tabs['description']) ) {
            $tabs['description']['title'] = esc_html__( 'Description', 'mbstore' );
        }
        if ( isset($tabs['additional_information']) ) {
            $tabs['additional_information']['title'] = esc_html__( 'Additional','mbstore' );   // Rename the additional information tab
        }
        return $tabs;
    }
    // Add clear for product summary
    add_action( 'woocommerce_single_product_summary', 'mbstore_woo_addclear', 35 );
    function mbstore_woo_addclear() {
        echo '<div class="clear"></div>';
    }
    // Cross sells
    add_filter( 'woocommerce_cross_sells_total', 'limit_woocommerce_cross_sells_total' );
    function limit_woocommerce_cross_sells_total() {
        return 6;
    }
    // Re-render rating
    add_filter( 'woocommerce_product_get_rating_html', 'mbstore_get_rating_html', 100, 2 );
    function mbstore_get_rating_html(){
        global $woocommerce, $product;
        if( $product && $product->get_average_rating() ) $rating = $product->get_average_rating();
        if( isset($rating) && $rating > 0){
            $rating_html  = '<div class="star-rating" title="' . sprintf( esc_attr__( 'Rated %s out of 5', 'mbstore' ), $rating ) . '">';
            $rating_html .= '<span class="value" data-width="' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . esc_html__( 'out of 5', 'mbstore' ) . '</span>';
        }else{
            $rating_html  = '<div class="star-rating">';
        }
        $rating_html .= '</div>';
        return $rating_html;
    }
    function mbstore_woo_product_list_title() {
        echo '<h3 class="item-title woocommerce-loop-product__title"><a href="'.get_the_permalink().'" title="'.get_the_title().'">' . mbstore_limitcharacter( get_the_title(), 25) . '</a></h3>';
    }
    // Override product title
    function woocommerce_template_loop_product_title() {
        echo '<h3 class="item-title woocommerce-loop-product__title"><a href="'.get_the_permalink().'" title="'.get_the_title().'">' . get_the_title() . '</a></h3>';
    }
    function mbstore_list_viewdetail(){
         echo '<div class="view-detail"><a class="btn btn-viewdetail" href="'.get_the_permalink().'" title="'.get_the_title().'">' . esc_html__('View detail', 'mbstore') . '</a></div>';
    }
    // Class for Woo
	class mbstore_Woocommerce{
        public $revsliders = array();
		public static function getInstance(){
			static $_instance;
			if( !$_instance ){
				$_instance = new mbstore_Woocommerce();
			}
			return $_instance;
		}
		public function __construct(){
            global $wpdb;
            $this->revsliders[0] = 'Select a slider';
            if ( class_exists('RevSlider') ) {
                $query = $wpdb->prepare("
                    SELECT * 
                    FROM {$wpdb->prefix}revslider_sliders 
                    ORDER BY %s"
                    , "ASC");
                $get_sliders = $wpdb->get_results($query);
                if($get_sliders) {
                    foreach($get_sliders as $slider) {
                       $this->revsliders[$slider->alias] = $slider->title;
                   }
                }
            }
            // Add Taxonomy product_cat custom meta fields
            add_action('product_cat_add_form_fields', array(&$this, 'mbstore_product_cat_add_new_meta_field'), 20, 3);
            add_action('product_cat_edit_form_fields', array(&$this, 'mbstore_product_cat_edit_meta_field'), 20, 3);
            // Save extra taxonomy fields callback function
            add_action( 'edit_term', array(&$this,'mbstore_save_product_cat_custom_meta'), 10, 3 );
            add_action( 'created_term', array(&$this,'mbstore_save_product_cat_custom_meta'), 10, 3 );
            // Add Taxonomy product_attributes custom meta fields
            $attribute_taxonomies = wc_get_attribute_taxonomies();
            if ( $attribute_taxonomies ) {
                foreach ( $attribute_taxonomies as $attribute) {
                    add_action( 'pa_' . $attribute->attribute_name . '_add_form_fields', array(&$this, 'mbstore_product_attribute_add_new_meta_field'), 20, 3 );
                    add_action( 'pa_' . $attribute->attribute_name . '_edit_form_fields', array(&$this, 'mbstore_product_attribute_edit_meta_field'), 20, 3);
                    add_action( 'pa_' . $attribute->attribute_name . '_edit_form_fields', array(&$this, 'mbstore_termattr_js'));
                    add_action( 'pa_' . $attribute->attribute_name . '_add_form_fields', array(&$this, 'mbstore_termattr_js'));
                    add_action( 'edit_term', array(&$this,'mbstore_product_attribute_save_custom_meta'), 10, 3 );
                    add_action( 'created_term', array(&$this,'mbstore_product_attribute_save_custom_meta'), 10, 3 );
                }
            }
		}
        // Add term page
        public function mbstore_product_cat_add_new_meta_field(){
            // This will add the custom meta field  to the add new term page
            $revsliders = $this->revsliders;
            ?>
            <div class="form-field term-mbstore_woo_pageingtoolbartop">
                <label for="mbstore_woo_pageingtoolbartop"><?php esc_html_e( "Use pageing before Toolbar Top", 'mbstore' ); ?></label>
                <select name="mbstore_woo_pageingtoolbartop" id="mbstore_woo_pageingtoolbartop">
                    <option value=""><?php esc_html_e('Default', 'mbstore');?></option>
                    <option value="1"><?php esc_html_e('Yes', 'mbstore');?></option>
                    <option value="0"><?php esc_html_e('No', 'mbstore');?></option>
                </select>
            </div>
            <div class="form-field term-mbstore_woo_usefilterhoz">
                <label for="mbstore_woo_usefilterhoz"><?php esc_html_e( "Use filter horizontal", 'mbstore' ); ?></label>
                <select name="mbstore_woo_usefilterhoz" id="mbstore_woo_usefilterhoz">
                    <option value=""><?php esc_html_e('Default', 'mbstore');?></option>
                    <option value="1"><?php esc_html_e('Yes', 'mbstore');?></option>
                    <option value="0"><?php esc_html_e('No', 'mbstore');?></option>
                </select>
            </div>
            <div class="form-field term-mbstore_product_cat_slideshow">
                <label for="mbstore_product_cat_slideshow"><?php esc_html_e( 'Slideshow', 'mbstore' ); ?></label>
                <select name="mbstore_product_cat_slideshow" id="mbstore_product_cat_slideshow">
                    <?php
                    foreach ($revsliders as $key => $value):?>
                       <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <p class="description"><?php esc_html_e( 'Select Slideshow.','mbstore' ); ?></p>
            </div>
            <div class="form-field term-mbstore_product_cat_layout">
                <label for="mbstore_product_cat_layout"><?php esc_html_e( 'Layout', 'mbstore' ); ?></label>
                <select name="mbstore_product_cat_layout" id="mbstore_product_cat_layout">
                    <option value=""><?php esc_html_e('Default (Layout of Shop page)', 'mbstore');?></option>
                    <option value="m"><?php esc_html_e('Fullwidth', 'mbstore');?></option>
                    <option value="l-m"><?php esc_html_e('Left Sidebar', 'mbstore');?></option>
                    <option value="m-r"><?php esc_html_e('Right Sidebar', 'mbstore');?></option>
                </select>
                <p class="description"><?php esc_html_e( 'Set the layout fullwidth or has sidebar (Woo Sidebar).','mbstore' ); ?></p>
            </div>
            <div class="form-field term-mbstore_woo_grid_col">
                <label for="mbstore_woo_grid_col"><?php esc_html_e( 'Grid columns', 'mbstore' ); ?></label>
                <select name="mbstore_woo_grid_col" id="mbstore_woo_grid_col">
                    <option value=""><?php esc_html_e('Default', 'mbstore');?></option>
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="1">6</option>
                </select>
                <p class="description"><?php esc_html_e( 'We are using grid bootstap - 12 cols layout. Default use in Theme Options.','mbstore' ); ?></p>
            </div>
            <div class="form-field term-mbstore_number_perpage">
                <label for="mbstore_number_perpage"><?php esc_html_e( 'Number products per listing page', 'mbstore' ); ?></label>
                <input name="mbstore_number_perpage" id="mbstore_number_perpage" type="text" value="12" size="40">
            </div>
            <?php
        }
        // Edit term page
        public function mbstore_product_cat_edit_meta_field($term, $taxonomy){
            $revsliders = $this->revsliders;
            $mbstore_woo_pageingtoolbartop = mbstore_get_term_byid( $term->term_id, 'mbstore_woo_pageingtoolbartop' );
            $mbstore_woo_usefilterhoz = mbstore_get_term_byid( $term->term_id, 'mbstore_woo_usefilterhoz' );
            $mbstore_product_cat_slideshow = mbstore_get_term_byid( $term->term_id, 'mbstore_product_cat_slideshow' );
            $mbstore_product_cat_layout = mbstore_get_term_byid( $term->term_id, 'mbstore_product_cat_layout' );
            $mbstore_woo_grid_col = mbstore_get_term_byid( $term->term_id, 'mbstore_woo_grid_col' );
            $mbstore_number_perpage = mbstore_get_term_byid( $term->term_id, 'mbstore_number_perpage' );
            ?>
            
            <tr class="form-field term-mbstore_woo_pageingtoolbartop">
                <th><label for="mbstore_woo_pageingtoolbartop"><?php esc_html_e( "Use pageing before Toolbar Top", 'mbstore' ); ?></label></th>
                <td>
                    <select name="mbstore_woo_pageingtoolbartop" id="mbstore_woo_pageingtoolbartop">
                        <option value="" <?php selected($mbstore_woo_pageingtoolbartop, '', true)?>><?php esc_html_e('Default', 'mbstore');?></option>
                        <option value="1" <?php selected($mbstore_woo_pageingtoolbartop, '1', true)?>><?php esc_html_e('Yes', 'mbstore');?></option>
                        <option value="0" <?php selected($mbstore_woo_pageingtoolbartop, '0', true)?>><?php esc_html_e('No', 'mbstore');?></option>
                    </select>
                </td>
            </tr>
            <tr class="form-field term-mbstore_woo_usefilterhoz">
                <th scope="row"><label for="mbstore_woo_usefilterhoz"><?php esc_html_e( "Use filter horizontal", 'mbstore' ); ?></label></th>
                <td>
                    <select name="mbstore_woo_usefilterhoz" id="mbstore_woo_usefilterhoz">
                        <option value="" <?php selected($mbstore_woo_usefilterhoz, '', true)?>><?php esc_html_e('Default', 'mbstore');?></option>
                        <option value="1" <?php selected($mbstore_woo_usefilterhoz, '1', true)?>><?php esc_html_e('Yes', 'mbstore');?></option>
                        <option value="0" <?php selected($mbstore_woo_usefilterhoz, '0', true)?>><?php esc_html_e('No', 'mbstore');?></option>
                    </select>
                </td>
            </tr>
            <tr class="form-field mbstore_product_cat_slideshow">
                <th scope="row"><label for="mbstore_product_cat_slideshow"><?php esc_html_e( 'Slideshow', 'mbstore' ); ?></label></th>
                <td>
                    <select name="mbstore_product_cat_slideshow" id="mbstore_product_cat_slideshow">
                        <?php
                        foreach ($revsliders as $key => $value):?>
                           <option value="<?php echo esc_attr($key); ?>" <?php selected($mbstore_product_cat_slideshow, $key, true)?>><?php echo esc_html($value); ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                    <p class="description"><?php esc_html_e( 'Select Slideshow.','mbstore' ); ?></p>
                </td>
            </tr>
            <tr class="form-field mbstore_product_cat_layout">
                <th scope="row"><label for="mbstore_product_cat_layout"><?php esc_html_e( 'Layout', 'mbstore' ); ?></label></th>
                <td>
                    <select name="mbstore_product_cat_layout" id="mbstore_product_cat_layout">
                        <option value="" <?php selected($mbstore_product_cat_layout, '', true)?>><?php esc_html_e('Default (Layout of Shop page)', 'mbstore');?></option>
                        <option value="m" <?php selected($mbstore_product_cat_layout, 'm', true)?>><?php esc_html_e('Fullwidth', 'mbstore');?></option>
                        <option value="l-m" <?php selected($mbstore_product_cat_layout, 'l-m', true)?>><?php esc_html_e('Left Sidebar', 'mbstore');?></option>
                        <option value="m-r" <?php selected($mbstore_product_cat_layout, 'm-r', true)?>><?php esc_html_e('Right Sidebar', 'mbstore');?></option>
                    </select>
                    
                    <p class="description"><?php esc_html_e( 'Set the layout fullwidth or has sidebar (Woo Sidebar).','mbstore' ); ?></p>
                </td>
            </tr>
            <tr class="form-field mbstore_woo_grid_col">
                <th scope="row"><label for="mbstore_woo_grid_col"><?php esc_html_e( 'Grid columns', 'mbstore' ); ?></label></th>
                <td>
                    <select name="mbstore_woo_grid_col" id="mbstore_woo_grid_col">
                        <option value="" <?php selected($mbstore_woo_grid_col, '', true)?>><?php esc_html_e('Default', 'mbstore');?></option>
                        <option value="1" <?php selected($mbstore_woo_grid_col, '1', true)?>>1</option>
                        <option value="2" <?php selected($mbstore_woo_grid_col, '2', true)?>>2</option>
                        <option value="3" <?php selected($mbstore_woo_grid_col, '3', true)?>>3</option>
                        <option value="4" <?php selected($mbstore_woo_grid_col, '4', true)?>>4</option>
                        <option value="5" <?php selected($mbstore_woo_grid_col, '5', true)?>>5</option>
                        <option value="6" <?php selected($mbstore_woo_grid_col, '6', true)?>>6</option>
                    </select>
                    <p class="description"><?php esc_html_e( 'We are using grid bootstap - 12 cols layout. Default use in Theme Options.','mbstore' ); ?></p>
                </td>
            </tr>
            <tr class="form-field mbstore_number_perpage">
                <th scope="row"><label for="mbstore_number_perpage"><?php esc_html_e( 'Number products per listing page', 'mbstore' ); ?></label></th>
                <td>
                    <input name="mbstore_number_perpage" id="mbstore_number_perpage" type="text" value="<?php echo esc_attr($mbstore_number_perpage);?>" size="40">
                </td>
            </tr>
            <?php
        }
        // Save term page
        public function mbstore_save_product_cat_custom_meta($term_id, $tt_id, $taxonomy){
            $fields = array(
                'mbstore_woo_pageingtoolbartop',
                'mbstore_woo_usefilterhoz',
                'mbstore_product_cat_slideshow',
                'mbstore_product_cat_layout',
                'mbstore_woo_grid_col',
                'mbstore_number_perpage'
            );
            foreach ($fields as $field){
                if( isset($_POST[$field]) ){
                    $value = $_POST[$field];
                    update_woocommerce_term_meta($term_id, $field, $value);
                }
            }
        }
        //Add term page for product_attribute
        public function mbstore_product_attribute_add_new_meta_field(){
            // This will add the custom meta field  to the add new term page
            ?>
            <div class="form-field term-mbstore_product_attribute_type">
                <label for="mbstore_product_attribute_type"><?php esc_html_e( 'Type', 'mbstore' ); ?></label>
                <select name="mbstore_product_attribute_type" id="mbstore_product_attribute_type">
                    <option value="text"><?php esc_html_e('Text', 'mbstore');?></option>
                    <option value="color"><?php esc_html_e('Color Picker', 'mbstore');?></option>
                </select>
                <p class="description"></p>
            </div>
            <div class="form-field term-mbstore_product_attribute_color">
                <label for="mbstore_product_attribute_color"><?php esc_html_e( 'Color Picker', 'mbstore' ); ?></label>
                <input type="text" class="colorpicker sns-colorpicker" value="" name="mbstore_product_attribute_color"/>
                <p class="description"></p>
            </div>
            <?php
        }
        // Term attribute js
        function mbstore_termattr_js(){
            wp_enqueue_script('mbstore-termattr', MBSTORE_THEME_URI . '/assets/js/sns-woo-termattr.js', array('jquery'), '', true);
        }
        // Edit term page
        public function mbstore_product_attribute_edit_meta_field($term, $taxonomy){
            $mbstore_product_attribute_type = mbstore_get_term_byid( $term->term_id, 'mbstore_product_attribute_type' );
            $mbstore_product_attribute_color = mbstore_get_term_byid( $term->term_id, 'mbstore_product_attribute_color' );
            ?>
            <tr class="form-field mbstore_product_attribute_type">
                <th scope="row"><label for="mbstore_product_attribute_type"><?php esc_html_e( 'Type', 'mbstore' ); ?></label></th>
                <td>
                    <select name="mbstore_product_attribute_type" id="mbstore_product_attribute_type">
                        <option value="text" <?php selected($mbstore_product_attribute_type, 'text', true)?>><?php esc_html_e('Text', 'mbstore');?></option>
                        <option value="color" <?php selected($mbstore_product_attribute_type, 'color', true)?>><?php esc_html_e('Color Picker', 'mbstore');?></option>
                    </select>
                    <p class="description"></p>
                </td>
            </tr>
            <tr class="form-field term-mbstore_product_attribute_color">
                <th scope="row"><label for="mbstore_product_attribute_color"><?php esc_html_e( 'Color Picker', 'mbstore' ); ?></label></th>
                <td>
                    <input type="text" class="colorpicker sns-colorpicker" value="<?php echo esc_attr( $mbstore_product_attribute_color );?>" name="mbstore_product_attribute_color"/>
                    <p class="description"></p>
                </td>
            </tr>
            <?php
        }
        // Save term page
        public function mbstore_product_attribute_save_custom_meta($term_id, $tt_id, $taxonomy){
            $fields = array(
                'mbstore_product_attribute_type',
                'mbstore_product_attribute_color',
                'mbstore_product_attribute_image_id'
            );
            foreach ($fields as $field){
                if( isset($_POST[$field]) ){
                    $value = !empty($_POST[$field]) ? $_POST[$field] : '';
                    
                    update_woocommerce_term_meta($term_id, $field, $value);
                }
            }
        }
	}
	mbstore_Woocommerce::getInstance();
}
