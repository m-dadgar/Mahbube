<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.1
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
if (!function_exists('devicer_system_fonts_list')) {
	function devicer_system_fonts_list() {
		$fonts = array( 
			"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
			"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
			"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
			"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
			"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
			"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
			"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
			"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
			"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
			"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Text Decorations List
if (!function_exists('devicer_text_decoration_list')) {
	function devicer_text_decoration_list() {
		$list = array( 
			'none' => esc_html__('none', 'devicer'), 
			'underline' => esc_html__('underline', 'devicer'), 
			'overline' => esc_html__('overline', 'devicer'), 
			'line-through' => esc_html__('line-through', 'devicer'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Custom Color Schemes
if (!function_exists('devicer_custom_color_schemes_list')) {
	function devicer_custom_color_schemes_list() {
		$list = array( 
			'first' => esc_html__('Custom 1', 'devicer'), 
			'second' => esc_html__('Custom 2', 'devicer'), 
			'third' => esc_html__('Custom 3', 'devicer') 
		);
		
		
		return apply_filters('devicer_custom_color_schemes_list_filter', $list);
	}
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Require Files Function
if (!function_exists('devicer_locate_template')) {
	function devicer_locate_template($template_names, $require_once = true, $load = true) {
		$located = '';
		
		
		foreach ((array) $template_names as $template_name) {
			if (!$template_name) {
				continue;
			}
			
			
			if (file_exists(get_stylesheet_directory() . '/' . $template_name)) {
				$located = get_stylesheet_directory() . '/' . $template_name;
				
				
				break;
			} elseif (file_exists(get_template_directory() . '/' . $template_name)) {
				$located = get_template_directory() . '/' . $template_name;
				
				
				break;
			}
		}
		
		
		if ($load && $located != '') {
			if ($require_once) {
				require_once($located);
			} else {
				require($located);
			}
		}
		
		
		return $located;
	}
}



// CMSMasters Content Composer Plugin Compatibility
define('CMSMASTERS_CONTENT_COMPOSER', true);

// CMSMasters Donations Plugin Compatibility
define('CMSMASTERS_DONATIONS', false);

// CMSMasters Events Schedule Plugin Compatibility
define('CMSMASTERS_EVENTS_SCHEDULE', false);

// CMSMasters Contact Form Builder Plugin Compatibility
define('CMSMASTERS_CONTACT_FORM_BUILDER', true);

// CMSMasters Mega Menu Plugin Compatibility
define('CMSMASTERS_MEGA_MENU', true);

// CMSMasters Sermons Plugin Compatibility
define('CMSMASTERS_SERMONS', false);

// CMSMasters Importer Compatibility
define('CMSMASTERS_IMPORTER', true);

// CMSMasters Custom Fonts Compatibility
define('CMSMASTERS_CUSTOM_FONTS', true);

// WooCommerce Plugin Compatibility
define('CMSMASTERS_WOOCOMMERCE', class_exists('woocommerce') ? true : false);

// Yith WooCommerce Ajax Search Plugin Compatibility
define('CMSMASTERS_WCAS', (class_exists('YITH_WCAS') && CMSMASTERS_WOOCOMMERCE) ? true : false);

// Yith WooCommerce Ajax Search Premium Plugin Compatibility
define('CMSMASTERS_WCAS_PREMIUM', (defined('YITH_WCAS_PREMIUM') && CMSMASTERS_WOOCOMMERCE) ? true : false);

// Yith WooCommerce Quick View Plugin Compatibility
define('CMSMASTERS_WCQV', (class_exists('YITH_WCQV') && CMSMASTERS_WOOCOMMERCE) ? true : false);

// Yith WooCommerce Zoom Magnifier Plugin Compatibility
define('CMSMASTERS_WCMG', (class_exists('YITH_WooCommerce_Zoom_Magnifier') && CMSMASTERS_WOOCOMMERCE) ? true : false);

// Yith WooCommerce Wishlist Plugin Compatibility
define('CMSMASTERS_WCWL', (class_exists('YITH_WCWL') && CMSMASTERS_WOOCOMMERCE) ? true : false);

// Yith WooCommerce Wishlist Premium Plugin Compatibility
define('CMSMASTERS_WCWL_PREMIUM', (class_exists('YITH_WCWL_Premium') && CMSMASTERS_WOOCOMMERCE) ? true : false);

// Yith WooCommerce Product Countdown Plugin Compatibility
define('CMSMASTERS_WCPC', (class_exists( 'YITH_WC_Product_Countdown' ) && CMSMASTERS_WOOCOMMERCE) ? true : false);

// Yith WooCommerce Product Countdown Premium Plugin Compatibility
define('CMSMASTERS_WCPC_PREMIUM', (class_exists( 'YITH_WC_Product_Countdown_Premium' ) && CMSMASTERS_WOOCOMMERCE) ? true : false);

// Yith WooCommerce Compare Plugin Compatibility
define('CMSMASTERS_WOOCOMPARE', (class_exists('YITH_WOOCOMPARE') && CMSMASTERS_WOOCOMMERCE) ? true : false);

// The Events Calendar Plugin Compatibility
define('CMSMASTERS_TRIBE_EVENTS', class_exists('Tribe__Events__Main') ? false : false);

// Timetable Responsive Schedule For WordPress Plugin Compatibility
define('CMSMASTERS_TIMETABLE', function_exists('timetable_events_init') ? false : false);

// LearnPress Plugin Compatibility
define('CMSMASTERS_LEARNPRESS', class_exists('LearnPress') ? false : false);

// WordPress Event Ticketing Plugin Compatibility
define('CMSMASTERS_TC_EVENTS', class_exists('TC') ? false : false);

// Instagram Feed Plugin Compatibility
define('CMSMASTERS_INSTAGRAM_FEED', function_exists('sb_instagram_activate') ? false : false);

// MailPoet Plugin Compatibility
define('CMSMASTERS_MAILPOET', (class_exists('WYSIJA') || class_exists('\MailPoet\Config\Initializer')) ? true : false);

// Theme Style Compatibility
define('CMSMASTERS_THEME_STYLE_COMPATIBILITY', false);

// Theme Style
define('CMSMASTERS_THEME_STYLE', (CMSMASTERS_THEME_STYLE_COMPATIBILITY && get_option('cmsmasters_devicer_theme_style') ? get_option('cmsmasters_devicer_theme_style') : ''));

// Theme Colored Categories Compatibility
define('CMSMASTERS_COLORED_CATEGORIES', false);

// Theme Categories Icon Compatibility
define('CMSMASTERS_CATEGORIES_ICON', false);

// Theme Projects Compatibility
define('CMSMASTERS_PROJECT_COMPATIBLE', true);

// Theme Profiles Compatibility
define('CMSMASTERS_PROFILE_COMPATIBLE', true);

// Theme Developer Mode
define('CMSMASTERS_DEVELOPER_MODE', false);

// Change FS Method
if (!defined('FS_METHOD')) {
	define('FS_METHOD', 'direct');
}

// Theme Settings All Theme Styles
if (!function_exists('devicer_all_theme_styles')) {
	function devicer_all_theme_styles() {
		$out = array( 
			'Default|', 
			'Theme Style 1|1', 
			'Theme Style 2|2' 
		);
		
		
		return $out;
	}
}



// Theme Settings All Color Schemes List
if (!function_exists('devicer_all_color_schemes_list')) {
	function devicer_all_color_schemes_list() {
		$list = array( 
			'default' => 		esc_html__('Default', 'devicer'), 
			'header' => 		esc_html__('Header', 'devicer'), 
			'navigation' => 	esc_html__('Navigation', 'devicer'), 
			'header_top' => 	esc_html__('Header Top', 'devicer'), 
			'footer' => 		esc_html__('Footer', 'devicer') 
		);
		
		
		$out = array_merge($list, devicer_custom_color_schemes_list());
		
		
		return apply_filters('cmsmasters_all_color_schemes_list_filter', $out);
	}
}



// CMSMasters Framework Directories Constants
define('CMSMASTERS_FRAMEWORK', get_template_directory() . '/framework');
define('CMSMASTERS_ADMIN', CMSMASTERS_FRAMEWORK . '/admin');
define('CMSMASTERS_SETTINGS', CMSMASTERS_ADMIN . '/settings');
define('CMSMASTERS_OPTIONS', CMSMASTERS_ADMIN . '/options');
define('CMSMASTERS_ADMIN_INC', CMSMASTERS_ADMIN . '/inc');
define('CMSMASTERS_CLASS', CMSMASTERS_FRAMEWORK . '/class');
define('CMSMASTERS_FUNCTION', CMSMASTERS_FRAMEWORK . '/function');
define('CMSMASTERS_VARS', get_template_directory() . '/theme-vars');
define('CMSMASTERS_VARS_STYLE', CMSMASTERS_VARS . '/theme-style' . CMSMASTERS_THEME_STYLE);
define('CMSMASTERS_DEMO_FILES_PATH', CMSMASTERS_VARS_STYLE . '/admin/demo-content/');



// Load Framework Parts
require_once(CMSMASTERS_CLASS . '/browser.php');

if (class_exists('Cmsmasters_Theme_Importer')) {
	require_once(CMSMASTERS_VARS_STYLE . '/admin/demo-content-importer.php');
}

require_once(CMSMASTERS_VARS_STYLE . '/admin/theme-settings-defaults.php');

require_once(CMSMASTERS_ADMIN_INC . '/config-functions.php');

require_once(CMSMASTERS_FUNCTION . '/general-functions.php');

require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/theme-functions.php');

require_once(CMSMASTERS_VARS_STYLE . '/theme-vars-functions.php');

require_once(CMSMASTERS_VARS . '/plugin-activator.php');

require_once(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings.php');

require_once(CMSMASTERS_OPTIONS . '/cmsmasters-theme-options.php');

require_once(CMSMASTERS_ADMIN_INC . '/admin-scripts.php');

require_once(CMSMASTERS_FUNCTION . '/breadcrumbs.php');

require_once(CMSMASTERS_FUNCTION . '/likes.php');

require_once(CMSMASTERS_FUNCTION . '/views.php');

require_once(CMSMASTERS_FUNCTION . '/pagination.php');


$cmsmasters_wp_version = get_bloginfo('version');

if (version_compare($cmsmasters_wp_version, '5', '>=') || function_exists('is_gutenberg_page')) {
	require_once(get_template_directory() . '/gutenberg/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-module-functions.php');
}

// Theme Colored Categories functions
if (CMSMASTERS_COLORED_CATEGORIES) {
	require_once(CMSMASTERS_FUNCTION . '/theme-colored-categories.php');
}

// Theme Categories Icon functions
if (CMSMASTERS_CATEGORIES_ICON) {
	require_once(CMSMASTERS_FUNCTION . '/theme-categories-icon.php');
}

// CMSMASTERS Donations functions
if (CMSMASTERS_DONATIONS && class_exists('Cmsmasters_Donations')) {
	require_once(get_template_directory() . '/cmsmasters-donations/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// CMSMasters Events Schedule functions
if (CMSMASTERS_EVENTS_SCHEDULE && class_exists('Cmsmasters_Events_Schedule')) {
	require_once(get_template_directory() . '/cmsmasters-events-schedule/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// CMSMasters Sermons functions
if (CMSMASTERS_SERMONS && class_exists('Cmsmasters_Sermons')) {
	require_once(get_template_directory() . '/cmsmasters-sermons/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// WooCommerce functions
if (CMSMASTERS_WOOCOMMERCE) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// Yith WooCommerce Quick View functions
if (CMSMASTERS_WCQV) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-quick-view/cmsmasters-plugin-functions.php');
}

// Yith WooCommerce Zoom Magnifier functions
if (CMSMASTERS_WCMG) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-zoom-magnifier/cmsmasters-plugin-functions.php');
}

// Yith WooCommerce Wishlist functions
if (CMSMASTERS_WCWL) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-wishlist/cmsmasters-plugin-functions.php');
}

// Yith WooCommerce Ajax Search functions
if (CMSMASTERS_WCAS) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-ajax-search/cmsmasters-plugin-functions.php');
}

// Yith WooCommerce Wishlist functions
if (CMSMASTERS_WCPC) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-product-countdown/cmsmasters-plugin-functions.php');
}

// Yith WooCommerce Compare functions
if (CMSMASTERS_WOOCOMPARE) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-compare/cmsmasters-plugin-functions.php');
}

// Tribe Events functions
if (CMSMASTERS_TRIBE_EVENTS) {
	require_once(get_template_directory() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// Timetable functions
if (CMSMASTERS_TIMETABLE) {
	require_once(get_template_directory() . '/timetable/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// LearnPress functions
if (CMSMASTERS_LEARNPRESS) {
	require_once(get_template_directory() . '/learnpress/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
	
	function devicer_change_template_for_learnpress() {
		return 'learnpress/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/templates';
	}
	
	add_filter('learn_press_template_path', 'devicer_change_template_for_learnpress');
}

// TC Events functions
if (CMSMASTERS_TC_EVENTS) {
	require_once(get_template_directory() . '/tc-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// Instagram Feed functions
if (CMSMASTERS_INSTAGRAM_FEED) {
	require_once(get_template_directory() . '/instagram-feed/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}



// Load Theme Local File
if (!function_exists('devicer_load_theme_textdomain')) {
	function devicer_load_theme_textdomain() {
		load_theme_textdomain('devicer', get_template_directory() . '/theme-vars/languages');
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'devicer_load_theme_textdomain')) {
	add_action('after_setup_theme', 'devicer_load_theme_textdomain');
}



// Framework Activation & Data Import
if (!function_exists('devicer_theme_activation')) {
	function devicer_theme_activation() {
		if (get_option('cmsmasters_active_theme') != 'devicer') {
			add_option('cmsmasters_active_theme', 'devicer', '', 'yes');
			
			
			devicer_add_global_options();
			
			
			devicer_add_global_icons();
			
			
			wp_redirect(esc_url(admin_url('admin.php?page=cmsmasters-settings&upgraded=true')));
		}
	}
}

add_action('after_switch_theme', 'devicer_theme_activation');



// Framework Deactivation
if (!function_exists('devicer_theme_deactivation')) {
	function devicer_theme_deactivation() {
		delete_option('cmsmasters_active_theme');
	}
}

add_action('switch_theme', 'devicer_theme_deactivation');

// Plugin Activation Regenerate Styles
if (!function_exists('devicer_plugin_activation')) {
	function devicer_plugin_activation() {
		update_option('cmsmasters_plugin_activation', 'true');
	}
}

add_action('activated_plugin', 'devicer_plugin_activation');


if (!function_exists('devicer_plugin_activation_regenerate')) {
	function devicer_plugin_activation_regenerate() {
		if (!get_option('cmsmasters_plugin_activation')) {
			add_option('cmsmasters_plugin_activation', 'false');
		}
		
		if (get_option('cmsmasters_plugin_activation') != 'false') {
			devicer_regenerate_styles();

			devicer_add_global_options();
			
			devicer_add_global_icons();
			
			update_option('cmsmasters_plugin_activation', 'false');
		}
	}
}

add_action('init', 'devicer_plugin_activation_regenerate');

function devicer_run_reinit_import_options($post_id, $key, $value) {
	if (!get_post_meta($post_id, 'cmsmasters_heading', true)) {
		$custom_post_meta_fields = devicer_get_custom_all_meta_fields();
		
		foreach ($custom_post_meta_fields as $field) {
			if ( 
				$field['type'] != 'tabs' && 
				$field['type'] != 'tab_start' && 
				$field['type'] != 'tab_finish' && 
				$field['type'] != 'content_start' && 
				$field['type'] != 'content_finish' 
			) {
				update_post_meta($post_id, $field['id'], $field['std']);
			}
		}
	}

	if ($key === 'cmsmasters_composer_show' && $value === 'true') {
		update_post_meta($post_id, 'cmsmasters_gutenberg_show', 'true');
	}
}

add_action('import_post_meta', 'devicer_run_reinit_import_options', 10, 3);