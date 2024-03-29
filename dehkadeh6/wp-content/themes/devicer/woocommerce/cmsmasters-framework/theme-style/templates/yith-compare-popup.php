<?php
/**
 * WooCommerce Compare page
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Compare
 * @version 1.1.4
 */

// remove the style of woocommerce
if( defined('WOOCOMMERCE_USE_CSS') && WOOCOMMERCE_USE_CSS ) wp_dequeue_style('woocommerce_frontend_styles');

$is_iframe  = (bool)( isset( $_REQUEST['iframe'] ) && $_REQUEST['iframe'] );

wp_enqueue_script( 'jquery-fixedheadertable', YITH_WOOCOMPARE_ASSETS_URL . '/js/jquery.dataTables.min.js', array('jquery'), '1.10.7', true );
wp_enqueue_script( 'jquery-fixedcolumns', YITH_WOOCOMPARE_ASSETS_URL . '/js/FixedColumns.min.js', array('jquery', 'jquery-fixedheadertable' ), '3.0.4', true );
wp_enqueue_script( 'yith_woocompare_owl', YITH_WOOCOMPARE_ASSETS_URL . '/js/owl.carousel.min.js', array( 'jquery' ), '2.0.0', true );
wp_enqueue_script( 'jquery-imagesloaded', YITH_WOOCOMPARE_ASSETS_URL . '/js/imagesloaded.pkgd.min.js', array('jquery'), '3.1.8', true );

/** FIX WOO 2.1 */
$wc_get_template = function_exists('wc_get_template') ? 'wc_get_template' : 'woocommerce_get_template';

$table_text = get_option( 'yith_woocompare_table_text' );

?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if gt IE 9]>
<html class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if !IE]>
<html <?php language_attributes() ?>>
<![endif]-->

<!-- START HEAD -->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=devicer-width" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" />

    <?php wp_head() ?>

    <?php do_action( 'yith_woocompare_popup_head' ) ?>

    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_ASSETS_URL ?>/css/colorbox.css"/>
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_ASSETS_URL ?>/css/jquery.dataTables.css"/>
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_ASSETS_URL ?>/css/owl.carousel.css"/>
    <link rel="stylesheet" href="<?php echo esc_html($this->stylesheet_url()) ?>" type="text/css" />
   
	<?php 		
		wp_enqueue_style('devicer-theme-style-duplicate', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'screen, print');
		
		$upload_dir = wp_upload_dir();
		
		$style_dir = str_replace('\\', '/', $upload_dir['basedir'] . '/cmsmasters_styles');
		
		
		$cmsmasters_styles_dir = get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/styles/';
		
		
		if (is_dir($style_dir) && get_option('cmsmasters_style_exists_' . 'devicer')) {
			$cmsmasters_styles_dir = $upload_dir['baseurl'] . '/cmsmasters_styles/';
		}
		
		wp_enqueue_style('devicer-fonts-schemes-duplicate', $cmsmasters_styles_dir . 'devicer' . '.css', array(), '1.0.0', 'screen'); 
		
		

		wp_enqueue_style('devicer-style-duplicate', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/style.css', array(), '1.0.0', 'screen, print');
		wp_enqueue_style('devicer-adaptive-duplicate', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/adaptive.css', array(), '1.0.0', 'screen, print');
		wp_enqueue_style('devicer-retina-duplicate', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/retina.css', array(), '1.0.0', 'screen');
		
		
		wp_enqueue_style('devicer-icons-duplicate', get_template_directory_uri() . '/css/fontello.css', array(), '1.0.0', 'screen');
		wp_enqueue_style('devicer-icons-custom-duplicate', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/fontello-custom.css', array(), '1.0.0', 'screen');
	
	
		wp_enqueue_style('devicer-woocommerce-style-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-style.css', array(), '1.0.0', 'screen');
		wp_enqueue_style('devicer-woocommerce-adaptive-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
		
		
		wp_enqueue_style('devicer-yith-woocommerce-compare-style-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/css/plugin-style.css', array(), '1.0.0', 'screen');
		wp_enqueue_style('devicer-yith-woocommerce-compare-adaptive-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
		
		if (CMSMASTERS_WCWL) {
			wp_enqueue_style('devicer-yith-woocommerce-wishlist-style-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/css/plugin-style.css', array(), '1.0.0', 'screen');
			wp_enqueue_style('devicer-yith-woocommerce-wishlist-adaptive-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
		}
		
		if (CMSMASTERS_WCQV) {
			wp_enqueue_style('devicer-yith-woocommerce-quick-view-style-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-quick-view/css/plugin-style.css', array(), '1.0.0', 'screen');
			wp_enqueue_style('devicer-yith-woocommerce-quick-view-adaptive-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-quick-view/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
		}
		
		if (is_rtl()) {
			wp_enqueue_style('devicer-rtl-duplicate', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/rtl.css', array(), '1.0.0', 'screen');
			
			wp_enqueue_style('devicer-woocommerce-rtl-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-rtl.css', array(), '1.0.0', 'screen');
			
			wp_enqueue_style('devicer-yith-woocommerce-compare-rtl-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/css/plugin-rtl.css', array(), '1.0.0', 'screen');
			
			if (CMSMASTERS_WCWL) {
				wp_enqueue_style('devicer-yith-woocommerce-wishlist-rtl-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/css/plugin-rtl.css', array(), '1.0.0', 'screen');
			}
			
			if (CMSMASTERS_WCQV) {
				wp_enqueue_style('devicer-yith-woocommerce-quick-view-rtl-duplicate', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-quick-view/css/plugin-rtl.css', array(), '1.0.0', 'screen');
			}
		}
	?>
   
   <style type="text/css">
        body.loading {
            background: url("<?php echo YITH_WOOCOMPARE_URL ?>assets/images/colorbox/loading.gif") no-repeat scroll center center transparent;
        }
    </style>
</head>
<!-- END HEAD -->

<?php global $product; ?>

<!-- START BODY -->
<body <?php body_class('woocommerce yith-woocompare-popup') ?>>

<h1>
    <?php echo esc_html($table_text) ?>
</h1>

<?php $wc_get_template( 'yith-compare-table.php', $args, '', YITH_WOOCOMPARE_TEMPLATE_PATH . '/' ); ?>

<?php if( wp_script_is( 'responsive-theme', 'enqueued' ) ) wp_dequeue_script( 'responsive-theme' ) ?><?php if( wp_script_is( 'responsive-theme', 'enqueued' ) ) wp_dequeue_script( 'responsive-theme' ) ?>
<?php do_action( 'wp_print_footer_scripts' ); ?>

<script type="text/javascript">

    jQuery(document).ready(function($){

        $('a').attr('target', '_parent');

	    var body = $('body'),
            redirect_to_cart = false,
            button_clicked;

        $(document).on('click', 'a.add_to_cart_button', function(){
            button_clicked = $(this);
            button_clicked.block({message: null, overlayCSS: {background: '#fff url(' + woocommerce_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6}});
        });

        // close colorbox if redirect to cart is active after add to cart
        body.on( 'adding_to_cart', function ( $thisbutton, data ) {
            if( wc_add_to_cart_params.cart_redirect_after_add == 'yes' ) {
                wc_add_to_cart_params.cart_redirect_after_add = 'no';
                redirect_to_cart = true;
            }
        });

        // remove add to cart button after added
	    body.on('added_to_cart', function( ev, fragments, cart_hash, button ){

            if( redirect_to_cart == true ) {
                // redirect
                parent.window.location = wc_add_to_cart_params.cart_url;
                return;
            }

            button_clicked.hide();

            $('a').attr('target', '_parent');

            // Replace fragments
            if ( fragments ) {
                $.each(fragments, function(key, value) {
                    $(key, window.parent.document).replaceWith(value);
                });
            }
        });
    });

</script>

</body>
</html>