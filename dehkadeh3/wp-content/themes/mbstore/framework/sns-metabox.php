<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'mbstore_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function mbstore_register_meta_boxes( $meta_boxes ){
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'mbstore_';
	global $wpdb, $mbstore_opt;
	$revsliders =array();
	$revsliders[0] = esc_html__("Don't use", "mbstore");
	if ( class_exists('RevSlider') ) {
		$query = $wpdb->prepare("
			SELECT * 
			FROM {$wpdb->prefix}revslider_sliders 
			ORDER BY %s"
			, "ASC");
	    $get_sliders = $wpdb->get_results($query);
	    if($get_sliders) {
		    foreach($get_sliders as $slider) {
			   $revsliders[$slider->alias] = $slider->title;
		   }
	    }
	}
	//
	$default_layout = 'm-r';
	if ( isset($mbstore_opt['blog_layout']) ) $default_layout = $mbstore_opt['blog_layout'];
	//
	$siderbars = array();
	foreach ($GLOBALS['wp_registered_sidebars'] as $sidebars) {
		$siderbars[ $sidebars['id']] = $sidebars['name'];
	}
	// Layout config
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'sns_productcfg',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Product Config', 'mbstore' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'product' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		// 'autosave'   => true,
		// List of meta fields

		'fields'     => array(
			array(
				'name'    => esc_html__( 'Background Box Styles', 'mbstore' ),
				'id'       => "{$prefix}woo_bg_box_style",
				'type'     => 'select',
				'std'  => '',
				'options'  => array(
					''  => esc_html__( 'Default', 'mbstore' ),
					'1'  => esc_html__( 'Background color for Second block of Product', 'mbstore' ),
					'2'  => esc_html__( 'Background color for Main content of Product', 'mbstore' ),
				)
			),
			array(
				'name'    => esc_html__( 'Gallery Thumbnail Type', 'mbstore' ),
				'id'       => "{$prefix}woo_gallery_type",
				'type'     => 'select',
				'std'  => '',
				'options'  => array(
					''  => esc_html__( 'Default', 'mbstore' ),
					'h'  => esc_html__( 'Horizontal', 'mbstore' ),
					'v'  => esc_html__( 'Vertical', 'mbstore' ),
				)
			),
			array(
				'name'    	=> esc_html__( 'Want to use second box for Product Main Content?', 'mbstore' ),
				'id'       	=> "{$prefix}product_content_sb",
				'type'     	=> 'text',
				'std'  		=> 'product-content-sidebar',
				'desc'		=> esc_html__('Enter slug of Post WCode(Use Post WCode to make content). Example: product-content-sidebar', 'mbstore'),
			),
		  	array(
				'name'    => esc_html__( 'Zoom Type for Cloud Zoom', 'mbstore' ),
				'id'       => "{$prefix}woo_zoomtype",
				'type'     => 'select',
				'std'  => '',
				'options'  => array(
					''  => esc_html__( 'Default', 'mbstore' ),
					'lens'  => esc_html__( 'Lens', 'mbstore' ),
					'inner'  => esc_html__( 'Inner', 'mbstore' ),
				),
				'desc'		=> '',
			),
			array(
				'id'    => "{$prefix}product_video",
				'name'  => esc_html__( 'Product Video', 'mbstore' ),
				'type'  => 'oembed',
				// Allow to clone? Default is false
				'clone' => false,
				'desc'		  => esc_html__( 'Enter your video url(youtube, video)', 'mbstore' ),
				// Input size
				'size'  => 50,
			),
			array(
				'name'    => esc_html__( 'Use Variation Thumbnail for Variable product', 'mbstore' ),
				'id'       => "{$prefix}use_variation_thumb",
				'type'     => 'select',
				'std'  => 1,
				'options'  => array(
					1  => esc_html__( 'Yes', 'mbstore' ),
					0  => esc_html__( 'No', 'mbstore' ),
				),
				'desc'		=> esc_html__('Just applies for Variable Product', 'mbstore'),
			),
		)
	);
	// Layout config
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'sns_layout',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Layout Config', 'mbstore' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		// 'autosave'   => true,
		// List of meta fields

		'fields'     => array(
			// Layout Type
			array(
				'name'        => esc_html__( 'Layout Type', 'mbstore' ),
				'id'          => "{$prefix}layouttype",
				'type'        => 'layouttype',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'm' => esc_html__( 'Without Sidebar', 'mbstore' ),
					'l-m' => esc_html__( 'Use Left Sidebar', 'mbstore' ),
					'm-r' => esc_html__( 'Use Right Sidebar', 'mbstore' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => $default_layout,
				'placeholder' => esc_html__( '--- Select a layout type ---', 'mbstore' ),
			),
			// Left Sidebar
			array(
				'name'  => esc_html__( 'Left Sidebar', 'mbstore' ),
				'id'    => "{$prefix}leftsidebar",
				'type'  => 'select',
				'options'	=> $siderbars,
				'multiple'	=> false,
				'std'		=> 'left-sidebar',
				'placeholder' => esc_html__( '--- Select a sidebar ---', 'mbstore' ),
			),
			// Right Sidebar
			array(
				'name'  => esc_html__( 'Right Sidebar', 'mbstore' ),
				'id'    => "{$prefix}rightsidebar",
				'type'  => 'select',
				'options'	=> $siderbars,
				'multiple'	=> false,
				'std'		=> 'right-sidebar',
				'placeholder' => esc_html__( '--- Select a sidebar ---', 'mbstore' ),
			),
			
		)
	);
	
	$menus = get_terms('nav_menu', array( 'hide_empty' => false ));
	$menu_options[''] = esc_html__('Default Menu...', 'mbstore');
	foreach ( $menus as $menu ){
		$menu_options[$menu->term_id] = $menu->name;
	}
	
	// Page config
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'sns_pageconfig',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Page Config', 'mbstore' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		// 'autosave'   => true,
		// List of meta fields

		'fields'     => array(
			array(
				'name'    => esc_html__( 'Want use custom logo?', 'mbstore' ),
				'id'      => "{$prefix}header_logo",
				'type'    => 'image_advanced',
				'desc'		=> esc_html__('It priority more than Logon in theme option', 'mbstore'),
			),
			array(
				'name'    => esc_html__( 'Header Style', 'mbstore' ),
				'id'       => "{$prefix}header_style",
				'type'     => 'select',
				'std'  => '',
				'options'  => array(
					''   	  => esc_html__( 'Default', 'mbstore' ),
					'style1'  => esc_html__( 'Style1', 'mbstore' ),
					'style2'  => esc_html__( 'Style2', 'mbstore' ),
					'style3'  => esc_html__( 'Style3', 'mbstore' ),
				),
				'desc'		=> esc_html__('Select Header style. ', 'mbstore'),
			),
			array(
				'name'    => esc_html__( 'The type show content of Vertical menu', 'mbstore' ),
				'id'       => "{$prefix}type_show_vm",
				'type'     => 'select',
				'std'  => '',
				'options'  => array(
					'hover'   	  => esc_html__( 'Hover show content', 'mbstore' ),
					'active'  => esc_html__( 'Always show content', 'mbstore' ),
				),
				'desc'		=> esc_html__('The type show content of Vertical menu in header', 'mbstore'),
			),
			array(
				'name'    => esc_html__( 'Enable Search Category for Live Ajax Search', 'mbstore' ),
				'id'       => "{$prefix}enable_search_cat",
				'type'     => 'select',
				'std'  => '',
				'options'  => array(
					''   	  => esc_html__( 'Default', 'mbstore' ),
					true  => esc_html__( 'Yes', 'mbstore' ),
					false  => esc_html__( 'No', 'mbstore' ),
				),
			),
			array(
				'name'    => esc_html__( 'Use Slideshow', 'mbstore' ),
				'id'      => "{$prefix}useslideshow",
				'type'    => 'radio',
				'options' => array(
					'1' => esc_html__( 'Yes', 'mbstore' ),
					'2' => esc_html__( 'No', 'mbstore' ),
				),
				'std'         => '2',
			),
			array(
				'name'    => esc_html__( 'Select Slideshow', 'mbstore' ),
				'id'      => "{$prefix}revolutionslider",
				'type'    => 'select',
				'options' =>  $revsliders ,
				'std'         => '',
			),
			array(
				'name'    => esc_html__( 'Show Title', 'mbstore' ),
				'id'      => "{$prefix}showtitle",
				'type'    => 'radio',
				'options' => array(
					'1' => esc_html__( 'Yes', 'mbstore' ),
					'2' => esc_html__( 'No', 'mbstore' ),
				),
				'std'         => '1',
			),
			array(
				'name'    => esc_html__( 'Show Breadcrumbs', 'mbstore' ),
				'id'      => "{$prefix}showbreadcrump",
				'type'    => 'radio',
				'options' => array(
					'1' => esc_html__( 'Yes', 'mbstore' ),
					'2' => esc_html__( 'No', 'mbstore' ),
				),
				'std'         => '',
				'desc' => esc_html__( 'Dont apply for Front page.', 'mbstore' ),
			),
			array(
				'name'    => esc_html__( 'Footer Style', 'mbstore' ),
				'id'       => "{$prefix}footer_layout",
				'type'     => 'select',
				'std'  => '',
				'options'  => array(
					''  => esc_html__( 'Default', 'mbstore' ),
					'1'  => esc_html__( 'Footer 1', 'mbstore' ),
					'2'  => esc_html__( 'Footer 2', 'mbstore' ),
					'3'  => esc_html__( 'Footer 3', 'mbstore' ),
					'4'  => esc_html__( 'Footer 4', 'mbstore' ),
					'blank'  => esc_html__( 'Blank', 'mbstore'),
				),
				'desc'		=> esc_html__('Select Footer layout. "Default" to use in Theme Options.', 'mbstore'),
			),
			array(
				'name'    => esc_html__( 'Config Theme Color for this page?', 'mbstore' ),
				'id'      => "{$prefix}page_themecolor",
				'type'    => 'radio',
				'options' => array(
					'1' => esc_html__( 'Yes', 'mbstore' ),
					'2' => esc_html__( 'No', 'mbstore' ),
				),
				'std'         => '2',
			),
			array(
				'name' => esc_html__( 'Sellect Theme Color', 'mbstore' ),
				'id'   => "{$prefix}theme_color",
				'type' => 'color',
				'desc' => esc_html__( 'It will priority than Theme Color in Theme Option panel', 'mbstore' ),
			),
			array(
				'name'    	=> esc_html__( 'Want to use page class?', 'mbstore' ),
				'id'       	=> "{$prefix}page_class",
				'type'     	=> 'text',
				'std'  		=> '',
				'desc'		=> esc_html__('It is a class css to add some special style, and just for this page', 'mbstore'),
			),
		)
	);
	// Post format - Gallery
	$meta_boxes[] = array(
	    	'id' => 'sns-post-gallery',
		    'title' =>  esc_html__('Gallery Settings','mbstore'),
	    	'description' => '',
    		'pages'      => array( 'post' ), // Post type
	    	'context'    => 'normal',
		    'priority'   => 'high',
	    	'fields' => array(
			     array(
			        'name'		=> 'Gallery Images',
			        'desc'	    => 'Upload Images for post Gallery ( Limit is 15 Images ).',
			        'type'      => 'image_advanced',
			        'id'	    => "{$prefix}post_gallery",
	         		'max_file_uploads' => 15 
	        	)
			)
	);
	// Post format - Video
    $meta_boxes[] = array(
		'id' => 'sns-post-video',
		'title' => esc_html__('Featured Video','mbstore'),
		'description' => '',
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array( 
		    array(
				'id'    => "{$prefix}post_video",
				'name'  => esc_html__( 'Video', 'mbstore' ),
				'type'  => 'oembed',
				// Allow to clone? Default is false
				'clone' => false,
				// Input size
				'size'  => 50,
			)
		)
	);
	// Post format - Audio
    $meta_boxes[] = array(
		'id' => 'sns-post-audio',
		'title' => esc_html__('Featured Audio','mbstore'),
		'description' => '',
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array( 
		    array(
				'id'    => "{$prefix}post_audio",
				'name'  => esc_html__( 'Audio', 'mbstore' ),
				'type'  => 'oembed',
				// Allow to clone? Default is false
				'clone' => false,
				// Input size
				'size'  => 50,
			)
		)
	);
	// Post format - quote
    $meta_boxes[] = array(
		'id' => 'sns-post-quote',
		'title' => esc_html__('Featured Quote','mbstore'),
		'description' => '',
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array( 
		    array(
				'id'    => "{$prefix}post_quotecontent",
				'name'  => esc_html__( 'Quote Content', 'mbstore' ),
				'type'  => 'textarea',
				// Allow to clone? Default is false
				'clone' => false,
			),
			array(
				'id'      => "{$prefix}post_quoteauthor",
				'name'    => esc_html__( 'Quote author', 'mbstore' ),
				'type'    => 'text',
				'clone' => false,
			),
		)
	);
	// Post format - Link
    $meta_boxes[] = array(
		'id' => 'sns-post-link',
		'title' => esc_html__('Link Settings','mbstore'),
		'description' => '',
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array( 
		    array(
				'id'    => "{$prefix}post_linkurl",
				'name'  => esc_html__( 'Link URL', 'mbstore' ),
				'type'  => 'text',
				// Allow to clone? Default is false
				'clone' => false,
			),
			array(
				'id'      => "{$prefix}post_linktitle",
				'name'    => esc_html__( 'Link Title', 'mbstore' ),
				'type'    => 'text',
				'clone' => false,
			),
		)
	);

	return $meta_boxes;
}


if ( class_exists( 'RWMB_Field' ) ) {
	class RWMB_Layouttype_Field extends RWMB_Select_Field {
		static function admin_enqueue_scripts(){
			wp_enqueue_style( 'sns-imgselect', MBSTORE_THEME_URI . '/framework/meta-box/img-select.css' );
		}
	}
	// Js for metabox fields action
	add_action( 'admin_print_scripts', 'mbstore_metabox_adminjs');
    function mbstore_metabox_adminjs(){
		wp_enqueue_script('mbstore-imgselect', MBSTORE_THEME_URI . '/framework/meta-box/sns-metabox.js', array('jquery'), '', true);
	}
}
