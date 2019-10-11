<?php
/*
Plugin Name: MBStore Extra
Plugin URI: http://snstheme.com
Description: Extra some featured for MBStore theme.
Version: 1.0
Author URI: http://snstheme.com
License: GPL2+
*/

// don't load directly
if (!defined('ABSPATH'))
    die('-1');

class MBSTORE_Extra{
	function __construct(){
		// Load text domain
	    load_plugin_textdomain( 'mbstore-extra', false, dirname( plugin_basename(__FILE__) ) . '/languages' );
	    require "lib/scssphp/scss.inc.php";
		require "lib/scssphp/compass/compass.inc.php";
	}
}
function mbstore_load_extra(){
	global $mbstore_extra;
	$mbstore_extra = new MBSTORE_Extra();
}
add_action( 'plugins_loaded', 'mbstore_load_extra' );
// Begin: Define Post Type: post-wcode
class MBSTORE_PostWCode{
	function __construct(){
		// Load text domain
        load_plugin_textdomain( 'mbstore-extra', false, dirname( plugin_basename(__FILE__) ) . '/languages' );
		add_action('init', array($this,'addPostWCodeType'));
	}
	function addPostWCodeType(){
		$labels = array(
			'name' => __( 'Post WCode', 'mbstore-extra' ),
			'singular_name' => __( 'Post WCode', 'mbstore-extra' ),
			'add_new' => __( 'Add New Post WCode', 'mbstore-extra' ),
			'add_new_item' => __( 'Add New Post WCode', 'mbstore-extra' ),
			'edit_item' => __( 'Edit Post WCode', 'mbstore-extra' ),
			'new_item' => __( 'New Post WCode', 'mbstore-extra' ),
			'view_item' => __( 'View Post WCode', 'mbstore-extra' ),
			'search_items' => __( 'Search Post WCode', 'mbstore-extra' ),
			'not_found' => __( 'No Post WCode found', 'mbstore-extra' ),
			'not_found_in_trash' => __( 'No Post WCode found in Trash', 'mbstore-extra' ),
			'parent_item_colon' => __( 'Parent Post WCode:', 'mbstore-extra' ),
			'menu_name' => __( 'Post WCode', 'mbstore-extra' ),
		);

		$args = array(
		    'labels' => $labels,
		    'exclude_from_search' => true,
            'has_archive' => false,
            'public' => true,
            'menu_icon'   => 'dashicons-media-code',
            'rewrite' => true,
            'supports' => array('title', 'editor'),
            'can_export' => true,
            'show_in_nav_menus' => false
		);
		register_post_type( 'post-wcode', $args );
	}
}
function mbstore_load_postwcode(){
	global $mbstore_postwcode;
	$mbstore_postwcode = new MBSTORE_PostWCode();
}
add_action( 'plugins_loaded', 'mbstore_load_postwcode' );
// End: Define Post Type: post-code
// Begin: Define widget
class MBSTORE_Widget_PostWCode extends WP_Widget {
    public function __construct() {
        parent::__construct(
			'postcode-widget',
			esc_html__( 'Post WCode', 'mbstore-extra' ),
			array( "description" => esc_html__("Display somes shortcodes via slug of Post WCode", 'mbstore-extra') )
		);
	}
	function widget($args, $instance) {
		extract($args);
        $title = '';
        if (isset($instance['title']))
		    $title = apply_filters('widget_title', $instance['title']);
        $output = '';
        if ($instance['name']) {
            $output = do_shortcode('[mbstore_postwcode name="' . $instance['name'] . '"]');
        }
        if (!$output) return;
        //echo $before_widget;
		if ($title) {
			echo $before_title . $title . $after_title;
		}
        echo $output;
        //echo $after_widget;
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['name'] = $new_instance['name'];
		return $instance;
	}
	function form($instance) {
		$defaults = array();
		$instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php esc_html_e('Title:', 'mbstore-extra'); ?>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset($instance['title'])) echo $instance['title']; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('name'); ?>">
                <?php esc_html_e('Slug of Post WCode:', 'mbstore-extra'); ?>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" value="<?php if (isset($instance['name'])) echo $instance['name']; ?>" />
            </label>
        </p>
	    <?php
	}
}
class MBSTORE_Widget_Vertical_Menu extends WP_Widget {
	function __construct(){
		parent::__construct(
			'MBSTORE_Widget_Vertical_Menu',
			esc_html__( 'MBStore Vertical Menu', 'mbstore' ),
			array( "description" => esc_html__("Add a vertical menu to your sidebar.", 'mbstore') )
		);
	}
	function widget( $args, $instance ) {
		// Get menu
		$ver_menu = ! empty( $instance['ver_menu'] ) ? wp_get_nav_menu_object( $instance['ver_menu'] ) : false;
		if ( !$ver_menu )
			return;
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		echo $args['before_widget'];
		?>
		<div class="sns-vertical-menu hidden-md hidden-sm hidden-xs">
		<?php
			if ( !empty($instance['title']) )
				echo $args['before_title'] . $instance['title'] . $args['after_title'];
			?>
			<?php 
			$nav_menu_args = array(
				'fallback_cb' => '',
				'menu'        => $ver_menu
			);
			 wp_nav_menu( array(
   				'container' => false, 
   				'menu' => $ver_menu,
   				'walker' => new mbstore_Megamenu_Front,
   				'menu_class' => 'vertical-style'
       		) ); 
			?>
		</div>
		<div class="sns-respmenu hidden-lg">
		    <?php
		    if ( !empty($instance['title']) )
				echo $args['before_title'] . $instance['title'] . $args['after_title'];
            wp_nav_menu( array(
   				'container' => false, 
   				'menu' => $ver_menu,
   				'menu_class' => 'nav-sidebar resp-nav'
           	) );
			?>
		</div>
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
		}
		if ( ! empty( $new_instance['ver_menu'] ) ) {
			$instance['ver_menu'] = (int) $new_instance['ver_menu'];
		}
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$ver_menu = isset( $instance['ver_menu'] ) ? $instance['ver_menu'] : '';
		// Get menus
		$menus = wp_get_nav_menus();
		?>
		<div class="sns-vertical-menu-widget-form-controls" style="width: 100%; vertical-align: top; display: inline-block; margin-bottom: 15px;" <?php if ( empty( $menus ) ) { echo ' style="display:none" '; } ?>>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'mbstore' ) ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'ver_menu' ); ?>"><?php esc_html_e( 'Select Menu:', 'mbstore'); ?></label><br />
				<select id="<?php echo $this->get_field_id( 'ver_menu' ); ?>" name="<?php echo $this->get_field_name( 'ver_menu' ); ?>">
					<option value="0"><?php esc_html_e( '&mdash; Select &mdash;', 'mbstore' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $ver_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
		</div>
		<?php
	}
}
function mbstore_load_widgets() {
    register_widget( 'MBSTORE_Widget_PostWCode' );
    register_widget( 'MBSTORE_Widget_Vertical_Menu' );
}
add_action('widgets_init', 'mbstore_load_widgets');
// End: Define widget
// Add Custom CSS for mbstore_postwcode
add_action( 'wp_head', 'mbstore_load_postwcode_css', 1000 );
function mbstore_load_postwcode_css(){
	$args = array(
			'post_type' => 'post-wcode',
			'post_status' => 'publish', 
			'posts_per_page' => -1
	);
	$wcode = new WP_Query($args);
	$output = '';
	$output .= '<style type="text/css">';
	if ( $wcode->have_posts() ) {
		while ( $wcode->have_posts() ) { // echo '->'.get_the_ID().'<br/>';
			$wcode->the_post();
			$wcode_css = get_post_meta( get_the_ID(), '_wpb_post_custom_css', true );
			$wcode_css .= get_post_meta( get_the_ID(), '_wpb_shortcodes_custom_css', true );
		    if ( ! empty( $wcode_css ) ) {
		        $output .= $wcode_css;
		    }
		}
	}
    $output .= '</style>';
    wp_reset_postdata();
    echo $output;
}