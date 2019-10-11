<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "mbstore_themeoptions";
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'            => esc_html__( 'MBStore', 'mbstore' ),
        'page_title'            => esc_html__( 'MBStore', 'mbstore' ),
        
        'dev_mode'             => false,
        'show_options_object'   => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        // OPTIONAL -> Give you extra features
        'page_priority'        => 50,
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'mbstore' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'mbstore' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'mbstore' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'mbstore' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'mbstore' );
    Redux::setHelpSidebar( $opt_name, $content );

    // Import Demo Content
    $desc = ''; $i_message = '';
    if ( !class_exists('WP_Importer') || !defined('WP_LOAD_IMPORTERS') ) {
        $subtitle = '
            <p><label><i class="fa fa-exclamation-circle"></i>  Please follow the check list bellow to enable import function:</label></p>
            <ul class="i_message">';
        if ( !class_exists('WP_Importer') ) {
            $subtitle .= '<li><i class="fa fa-angle-double-right"></i> Need install and active plugin <a href="'.esc_url("https://wordpress.org/plugins/wordpress-importer/").'" target="_blank">Wordpress Importer</a></li>';
        }
        if( !defined('WP_LOAD_IMPORTERS') ){
            $subtitle .= "<li><i class='fa fa-angle-double-right'></i> Need add <code>define('WP_LOAD_IMPORTERS', true);</code> to file wp-config.php</li>";
        }
        $subtitle .= '</ul>';
    }else{
        $subtitle = '<input type=\'button\' class=\'button\' name=\'btn_sampledata\' id=\'btn_sampledata\' value=\'Import\' />';
        $subtitle .= '
            <div class=\'sns-importprocess\'>
                <div  class=\'sns-importprocess-width\'></div>
            </div>
            <span id=\'sns-importmsg\'><span class=\'status\'></span></span>
            <div id="sns-import-tablecontent">
                <label>List contents will import:</label>
                <ul>
                  <li class="theme-cfg"><i class="fa fa-hand-pointer-o"></i>Theme config</li>
                  <li class="revslider-cfg"><i class="fa fa-hand-pointer-o"></i>Revolution Slider config</li>
                  <li class="all-content"><i class="fa fa-hand-pointer-o"></i>All contents</li>
                  <li class="widget-cfg"><i class="fa fa-hand-pointer-o"></i>Widget config</li>
                  <li class="media1-files"><i class="fa fa-hand-pointer-o"></i>Media pack 1</li>
                  <li class="media2-files"><i class="fa fa-hand-pointer-o"></i>Media pack 2</li>
                  <li class="media3-files"><i class="fa fa-hand-pointer-o"></i>Media pack 3</li>
                  <li class="media4-files"><i class="fa fa-hand-pointer-o"></i>Media pack 4</li>
                </ul>
            </div>
        ';
    }
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-briefcase',
        'title' => esc_html__('Demo content', 'mbstore'),
        'fields' => array(
            array(
                'title' => '',
                'subtitle' => $subtitle,
                'desc'  => $desc,
                'id' => 'theme_data',
                'icon' => true,
                'type' => 'image_select',
                'default' => 'mbstore',
                'options' => array(
                    'sns_logo' => get_template_directory_uri().'/assets/img/logo.png',
                ),
            )
        )
    ) );
    // General
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'General', 'mbstore' ),
        'icon'      => 'el-icon-cog',
        'id'               => 'general',
        'customizer_width' => '400px'
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Color, Layout', 'mbstore' ),
        'id'               => 'general-layout',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'theme_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Theme Color', 'mbstore' ),
                'default'  => '#55bc75',
                'transparent'   => false
            ),
            array(
                'id'       => 'use_boxedlayout',
                'type'     => 'switch',
                'title'    => esc_html__( 'Use Boxed Layout', 'mbstore' ),
                'default'  => false,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'body_bg',
                'type'     => 'background',
                'output'   => array( 'body' ),
                'title'    => esc_html__( 'Body Background', 'mbstore' ),
                'background-image' => false,
                'preview'   => false,
            ),
            array(
                'id'       => 'body_bg_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Body Background Image', 'mbstore' ),
                'options'  => array(
                    'none'      => esc_html__( 'No image', 'mbstore' ),
                    'img'       => esc_html__( 'Image', 'mbstore' ),
                ),
                'default'  => 'img',
                'select2'  => array( 'allowClear' => false ),
                'required' => array( 'use_boxedlayout', '=', '1' )
            ),
            array(
                'id'        => 'body_bg_type_img',
                'type'      => 'media',
                'title'     => esc_html__( 'Body Background type img', 'mbstore' ),
                'default'  => '',
                'required' => array( 'body_bg_type', '=', array( 'img' ) ),
            ),
            
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Fonts', 'mbstore' ),
        'id'               => 'general-font',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => 'body_font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Body font', 'mbstore' ),
                'line-height'   => false,
                'text-align'   => false,
                'color'         => true,
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-size'   => '14px',
                    'font-family' => 'Montserrat',
                    'font-weight' => '500',
                    'color'       => '#666666'
                ),
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Breadcrumbs', 'mbstore' ),
        'id'               => 'general-breadcrumb',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'showbreadcrump',
                'type'     => 'switch',
                'title'    => 'Show Breadcrumbs',
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Header', 'mbstore' ),
        'icon'      => 'el el-brush',
        'fields'    => array(
            array(
                'id'       => 'header_style',
                'type' => 'select',
                'title'    => esc_html__( 'Header Style', 'mbstore' ),
                'default'  => 'style3',
                'options' => array(
                    'style1'        => esc_html__( 'Style1', 'mbstore'),
                    'style2'        => esc_html__( 'Style2', 'mbstore'),
                    'style3'        => esc_html__( 'Style3', 'mbstore'),
                ),
                'desc'      => esc_html__( 'Select Header Style', 'mbstore' ),
            ),
            array(
                'id'       => 'enable_search_cat',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Search Category for Live Ajax Search', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'search_title_only',
                'type'     => 'switch',
                'title'    => esc_html__( 'Search by Title only', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'        => 'header_logo',
                'type'      => 'media',
                'default'   => '',
                'title'     => esc_html__( 'Logo', 'mbstore' ),
                'subtitle'  => esc_html__( 'If this is not selected, This theme will be display logo with "theme/mbstore/img/logo.png"', 'mbstore' ),
                'desc'      => esc_html__( 'Image that you want to use as logo', 'mbstore' ),
            ),
            array(
                'id'       => 'use_stickmenu',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Sticky Menu', 'mbstore' ),
                'subtitle' => esc_html__( 'Keep menu on top when scroll down/up', 'mbstore' ),
                'default'  => false,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Footer', 'mbstore' ),
        'icon'      => 'el el-link',
        'fields'    => array(
            array(
                'title' => esc_html__( 'Style', 'mbstore'),
                'id' => 'footer_layout',
                'type'  => 'select',
                'multiselect' => false,
                'options' => array(
                    '1'      => esc_html__( 'Footer 1', 'mbstore'),
                    '2'      => esc_html__( 'Footer 2', 'mbstore'),
                    '3'      => esc_html__( 'Footer 3', 'mbstore'),
                    '4'      => esc_html__( 'Footer 4', 'mbstore'),
                    'blank'        => esc_html__( 'Blank', 'mbstore'),
                ),
                'default'  => '2'
            ), 
        )
    ));
    // Blog
    $siderbars = array(
        'widget-area' => esc_html__( 'Main Sidebar', 'mbstore' ),
        'product-sidebar' => esc_html__( 'Product Sidebar', 'mbstore' ),
        'blog-sidebar' => esc_html__( 'Blog Sidebar', 'mbstore' ),
        'woo-sidebar' => esc_html__( 'Woo Sidebar', 'mbstore' ),
    );
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Blog', 'mbstore' ),
        'icon'      => 'el el-file-edit',
        'id'               => 'blog',
        'customizer_width' => '400px'
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Pages', 'mbstore' ),
        'id'               => 'blog-page',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'layouttype',
                'type'     => 'image_select',
                'title'    => esc_html__('Default Blog Layout', 'mbstore'), 
                'options'  => array(
                    'm'      => array(
                        'alt'   => esc_html__( 'Without Sidebar', 'mbstore' ), 
                        'img'   => MBSTORE_THEME_URI.'/assets/img/admin/m.jpg'
                    ),
                    'l-m'      => array(
                        'alt'   => esc_html__( 'Use Left Sidebar', 'mbstore' ), 
                        'img'   => MBSTORE_THEME_URI.'/assets/img/admin/l-m.jpg'
                    ),
                    'm-r'      => array(
                        'alt'  => esc_html__( 'Use Right Sidebar', 'mbstore' ), 
                        'img'  => MBSTORE_THEME_URI.'/assets/img/admin/m-r.jpg'
                    ),
                ),
                'default' => 'm-r'
            ),
            // Left Sidebar
            array(
                'title'  => esc_html__( 'Left Sidebar', 'mbstore' ),
                'id'    => "leftsidebar",
                'type'  => 'select',
                'options'   => $siderbars,
                'multiselect'   => false,
                'required' => array( 'layouttype', '=', array( 'l-m', 'l-m-r' ) )
            ),
            // Right Sidebar
            array(
                'title'  => esc_html__( 'Right Sidebar', 'mbstore' ),
                'id'    => "rightsidebar",
                'type'  => 'select',
                'options'   => $siderbars,
                'multiselect'   => false,
                'required' => array( 'layouttype', '=', array( 'm-r', 'l-m-r' ) )
            ),
            array( 
                'title' => esc_html__( 'Blog Style', 'mbstore'),
                'id' => 'blog_type',
                'default' => 'default',
                'type' => 'select',
                'multiselect' => false ,
                'options' => array(
                    'default'       => esc_html__( 'Blog Default', 'mbstore'),
                    'list'       => esc_html__( 'Blog List', 'mbstore'),
                    'masonry'       => esc_html__( 'Blog Masonry', 'mbstore'),
                )
            ),
            array(
                'id'        => 'pagination',
                'title'     => esc_html__( 'Page Navigation', 'mbstore'),
                'desc'      => esc_html__('Choose Type of navigation for blog and any listing page.', 'mbstore'),
                'default'   => 'def',
                'type'      => 'select',
                'multiselect' => false ,
                'options'   => array(
                    'def'   => esc_html__('Default', 'mbstore'),
                    'ajax'  =>  esc_html__('Ajax click load more', 'mbstore'),
                    'ajax2'  =>  esc_html__('Ajax auto load more', 'mbstore'),
                ),
            ),
            array(
                'id'       => 'masonry_numload',
                'type'     => 'text',
                'title'    => esc_html__( 'Number post with each load more', 'mbstore' ),
                'default'  => '3',
                'required' => array( 'pagination', '=', array( 'ajax', 'ajax2' ) )
            ),
            array(
                'id'       => 'show_categories',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Categories for Blog Entries Page', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'show_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Date for Blog Entries Page', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            
            array(
                'id'       => 'show_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Author for Blog Entries Page', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'show_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Tags for Blog Entries Page', 'mbstore' ),
                'default'  => false,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'show_comment_count',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Comment Count', 'mbstore' ),
                'default'  => false,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'excerpt_length',
                'type'     => 'text',
                'title'    => esc_html__( 'Blog Excerpt Length', 'mbstore' ),
                'subtitle' => esc_html__( 'Just apply for Blog Style is Blog List', 'mbstore' ),
                'default'  => '75',
                'required' => array( 'blog_type', '=', 'list' )
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post', 'mbstore' ),
        'id'               => 'blog-singlepost',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'show_postauthor',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Author Info on Post Detail', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'enalble_related',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Related Posts on Post Detail', 'mbstore' ),
                'default'  => false,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'        => 'related_posts_by',
                'title'     => esc_html__( 'Related Post By', 'mbstore'),
                'desc'      => esc_html__('Get related post by Categories or Tags', 'mbstore'),
                'default'   => 'cat',
                'type'      => 'select',
                'multiselect' => false ,
                'options'   => array(
                    'cat'   => 'Categories',
                    'tag'   =>  'Tags',
                ),
                'required' => array( 'enalble_related', '=', true )
            ),
            array(
                'id'       => 'related_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Related Posts Number', 'mbstore' ),
                'default'  => '5',
                'required' => array( 'enalble_related', '=', true )
            ),
            array(
                'id'       => 'show_postsharebox',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Share Box on Post Detail', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
        )
    ));
    // WooCommerce
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Woo', 'mbstore' ),
        'icon'      => 'el el-shopping-cart',
        'id'               => 'woo',
        'desc'             => esc_html__( 'These are really basic fields!', 'mbstore' ),
        'customizer_width' => '400px'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Archives Pages', 'mbstore' ),
        'id'               => 'woo-shoppage',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'woo_uselazyload',
                'type'     => 'switch',
                'title'    => esc_html__( 'Use lazyload for Product Image', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_pageingtoolbartop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Use pageing before Toolbar Top', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_usefilterhoz',
                'type'     => 'switch',
                'title'    => esc_html__( 'Use filter horizontal', 'mbstore' ),
                'subtitle'  => esc_html__( 'To use this option you need add Widget for sidebar Woo Sidebar - Horizontal', 'mbstore' ),
                'default'  => false,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'        => 'woo_list_modeview',
                'type'      => 'select',
                'title'     => esc_html__( 'Default mode view for archives page', 'mbstore' ),
                'options'  => array(
                    'grid' => esc_html__( 'Grid', 'mbstore' ),
                    'list' => esc_html__( 'List', 'mbstore' ),
                ),
                'default'  => 'grid'
            ),
            array(
                'id'       => 'woo_grid_col',
                'type'     => 'select',
                'title'    => esc_html__( 'Default Grid columns', 'mbstore' ),
                'subtitle'  => esc_html__( 'We are using grid bootstap - 12 cols layout', 'mbstore' ),
                'default'  => '4',
                'options'  => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                ),
            ),
            array(
                'id'       => 'woo_clickdesc',
                'type'     => 'switch',
                'title'    => esc_html__( 'Click to show short description?', 'mbstore' ),
                'subtitle'  => esc_html__( 'Apply for product grid', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_number_perpage',
                'type'     => 'text',
                'title'    => esc_html__( 'Number products per listing page', 'mbstore' ),
                'default'  => '12',
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Product', 'mbstore' ),
        'id'               => 'woo-singleproduct',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'woo_bg_box_style',
                'type'     => 'select',  
                'title'    => esc_html__( 'Background Box Styles', 'mbstore' ),
                'options'  => array(
                    '1'      => esc_html__( 'Background color for Second block of Product', 'mbstore' ),
                    '2'     => esc_html__( 'Background color for Main content of Product', 'mbstore' ),                                             
                ),
                'default'  => '1',       
            ),
            array(
                'id'       => 'woo_usecloudzoom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Image Zoom', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_usezoommobile',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Image Zoom on Mobile', 'mbstore' ),
                'default'  => false,
                'on'       => 'Yes',
                'off'      => 'No',
                'required' => array( 'woo_usecloudzoom', '=', true )
            ),
            array(
                'id'       => 'woo_zoomtype',
                'type'     => 'select',  
                'title'    => esc_html__( 'Zoom Type for Cloud Zoom', 'mbstore' ),
                'options'  => array(
                    'lens'      => esc_html__( 'Lens', 'mbstore' ),
                    'inner'     => esc_html__( 'Inner', 'mbstore' ),                                             
                ),
                'default'  => 'lens',       
                'required' => array( 'woo_usecloudzoom', '=', true )    
            ),
            array(
                'id'       => 'woo_lensshape',
                'type'     => 'select',  
                'title'    => esc_html__( 'Lens Shape', 'mbstore' ),
                'options'  => array(
                    'round'     => esc_html__( 'Round', 'mbstore' ),
                    'square'    => esc_html__( 'Square', 'mbstore' ),                                            
                ),
                'default'  => 'round',       
                'required' => array( 'woo_zoomtype', '=', 'lens' )  
            ),
            array(
                'id'       => 'woo_lenssize',
                'type'     => 'text',  
                'title'    => esc_html__( 'Lens Size', 'mbstore' ),
                'default'  => '200',       
                'required' => array( 'woo_zoomtype', '=', 'lens' )  
            ),
            array(
                'id'       => 'woo_usepopupimage',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Popup Image', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_usethumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Thumbnail', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_gallery_type',
                'type'     => 'select',  
                'title'    => esc_html__( 'Gallery Thumbnail Type', 'mbstore' ),
                'default'  => 'h',
                'options'  => array(
                    'h'     => esc_html__( 'Horizontal', 'mbstore' ),
                    'v'      => esc_html__( 'Vertical', 'mbstore' ),
                ),
                'required' => array( 'woo_usethumb', '=', '1' )
            ),
            array(
                'id'       => 'woo_thumb_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Number Thumbnail to display', 'mbstore' ),
                'required' => array( 'woo_usethumb', '=', '1' ),
                'default'  => '4',
            ),
            array(
                'id'       => 'woo_designvariations',
                'type'     => 'switch',
                'title'    => esc_html__( 'Re-design Variations Form', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_sharebox',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Share box', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_upsells',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Upsells Products', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_upsells_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Number limit of Upsells Products', 'mbstore' ),
                'required' => array( 'woo_upsells', '=', '1' ),
                'default'  => '6',
            ),
            array(
                'id'       => 'woo_related',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Related Products', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'woo_related_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Number limit of Related Products', 'mbstore' ),
                'required' => array( 'woo_related', '=', '1' ),
                'default'  => '6',
            ),
        )
    ));
    // Not Found
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Page Not Found', 'mbstore' ),
        'icon'      => 'el el-warning-sign',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'bg_404',
                'type'     => 'media',
                'title'    => esc_html__("Image for 404 not found page", 'mbstore'),
            ),
            array(
                'id'       => 'notfound_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'mbstore' ),
                'default'  => esc_html__('OOPS!', 'mbstore'),
            ),
            array(
                'id'       => 'notfound_content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Message Content', 'mbstore' ),
                'default'  => esc_html__('It looks like that page no longer exists', 'mbstore'),
            ),
        )
    ));
    // Advance
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Advance', 'mbstore' ),
        'icon'      => 'el el-wrench',
        'fields'    => array(
            array(
                'id'       => 'advance_tooltip',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Tooltip', 'mbstore' ),
                'default'  => false,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'advance_cpanel',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Cpanel', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'       => 'tf_p_link',
                'type'     => 'text',
                'title'    => esc_html__( 'Link to purchase theme', 'mbstore' ),
                'default'  => esc_html__('https://1.envato.market/c/1267228/275988/4415?subId1=from_demo&u=https%3A%2F%2Fthemeforest.net%2Fitem%2Fmbstore-digital-woocommerce-wordpress-theme%2F22510477', 'mbstore'),
                'required' => array( 'advance_cpanel', '=', '1' )
            ),
            array(
                'id'       => 'advance_scrolltotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Button Scroll To Top', 'mbstore' ),
                'default'  => true,
                'on'       => 'Yes',
                'off'      => 'No',
            ),
            array(
                'id'        => 'advance_scss_compile',
                'type'      => 'select',
                'title'     => esc_html__( 'SCSS Compile', 'mbstore' ),
                'options'  => array(
                    '1' => esc_html__( 'Only compile when don\'t have the css file', 'mbstore' ),
                    '2' => esc_html__( 'Alway compile', 'mbstore' ),
                ),
                'default'  => '1'
            ),
            array(
                'id'        => 'advance_scss_format',
                'type'      => 'select',
                'title'     => esc_html__( 'CSS Format', 'mbstore' ),
                'options'  => array(
                    'scss_formatter' => esc_html__( 'scss_formatter', 'mbstore' ),
                    'scss_formatter_nested' => esc_html__( 'scss_formatter_nested', 'mbstore' ),
                    'scss_formatter_compressed' => esc_html__( 'scss_formatter_compressed', 'mbstore' ),
                ),
                'default'  => 'scss_formatter_compressed'
            ),
        )
    ));


