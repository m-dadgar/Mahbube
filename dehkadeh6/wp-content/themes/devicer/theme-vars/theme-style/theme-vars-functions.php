<?php
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version 	1.0.0
 * 
 * Theme Vars Functions
 * Created by CMSMasters
 * 
 */


/* Register CSS Styles */
function devicer_vars_register_css_styles() {
	wp_enqueue_style('devicer-theme-vars-style', get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/css/vars-style.css', array('devicer-retina'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'devicer_vars_register_css_styles');

