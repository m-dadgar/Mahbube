<?php
add_action( 'tgmpa_register', 'sns_plugin_activation' );
function sns_plugin_activation() {
    $plugins = array(
            // install Redux Framework, it on wordpress.org/plugins
            array(
                'name'      => esc_html__('Redux Framework', 'mbstore'),
                'slug'      => 'redux-framework',
                'required'  => true,
            ),
            array(
                'name'               => esc_html__('Meta Box', 'mbstore'),
                'slug'               => 'meta-box',
                'required'           => true,
            ),
            array(
                'name'                  => esc_html__('Slider Revolution', 'mbstore'),
                'slug'                  => 'revslider',
                'source'                => 'revslider.zip',
                'required'              => true,
            ),
            array(
                'name'                  => esc_html__('WPBakery Visual Composer', 'mbstore'),
                'slug'                  => 'js_composer',
                'source'                => 'js_composer.zip',
                'required'              => true,
            ),
            array(
                'name'                  => esc_html__('MBStore Extra', 'mbstore'),
                'slug'                  => 'mbstore-extra',
                'source'                => 'mbstore-extra.zip',
                'required'              => true,
            ),
            array(
                'name'                  => esc_html__('MBStore Shortcodes', 'mbstore'),
                'slug'                  => 'mbstore-shortcodes',
                'source'                => 'mbstore-shortcodes.zip',
                'required'              => true,
            ),
            array(
                'name'               => esc_html__('WooCommerce - excelling eCommerce', 'mbstore'),
                'slug'               => 'woocommerce',
                'required'           => true,
            ),
            array(
                'name'               => esc_html__('YITH WooCommerce Wishlist', 'mbstore'),
                'slug'               => 'yith-woocommerce-wishlist',
                'required'           => true,
            ),
            array(
                'name'               => esc_html__('YITH WooCommerce Compare', 'mbstore'),
                'slug'               => 'yith-woocommerce-compare',
                'required'           => true,
            ),
            array(
                'name'               => esc_html__('YITH WooCommerce Quick View', 'mbstore'),
                'slug'               => 'yith-woocommerce-quick-view',
                'required'           => true,
            ),
	    	array(
	    		'name'               => esc_html__('YITH WooCommerce Ajax Product Filter', 'mbstore'),
	    		'slug'               => 'yith-woocommerce-ajax-navigation',
	    		'required'           => true,
	    	),
            array(
                'name'               => esc_html__('Newsletter', 'mbstore'),
                'slug'               => 'newsletter',
                'required'           => true,
            ),
            array(
                'name'               => esc_html__('Contact Form 7', 'mbstore'),
                'slug'               => 'contact-form-7',
                'required'           => true,
            ),
            array(
                'name'               => esc_html__('Instagram Feed', 'mbstore'),
                'slug'               => 'instagram-feed',
                'required'           => true,
            ),
            array(
                'name'               => esc_html__('Simple Share Buttons Adder', 'mbstore'),
                'slug'               => 'simple-share-buttons-adder',
                'required'           => true,
            ),
        );
  
    $config = array(
        'default_path' => esc_url('http://demo.snstheme.com/wp/resource/q2-2019/'),
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Is show notices or not?
        'dismissable'  => false,                   // If false then user cannot colose notices above.
        'is_automatic' => false,                    // If false thene plugin cannot auto active after install.
    );
    tgmpa( $plugins, $config );
}