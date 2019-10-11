/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.0
 * 
 * Script for Admin Panel
 * Created by CMSMasters
 * 
 */


jQuery(document).ready(function() { 
	"use strict";
	
	jQuery('#ywpc_position_product').closest('.form-table').hide().prev('h2').hide();


	jQuery('input[name=ywpc_template]').closest('tr').hide();

	jQuery('.ywpc-appearance').closest('tr').hide();

	jQuery('#ywpc_text_font_size').closest('tr').hide();

	jQuery('#ywpc_timer_font_size').closest('tr').hide();

	jQuery('#ywpc_text_font_size_loop').closest('tr').hide();

	jQuery('#ywpc_timer_font_size_loop').closest('tr').hide();

	jQuery('#ywpc_text_color').closest('tr').hide();

	jQuery('#ywpc_border_color').closest('tr').hide();

	jQuery('#ywpc_back_color').closest('tr').hide();

	jQuery('#ywpc_timer_fore_color').closest('tr').hide();

	jQuery('#ywpc_timer_back_color').closest('tr').hide();

	jQuery('#ywpc_bar_fore_color').closest('tr').hide();

	jQuery('#ywpc_bar_back_color').closest('tr').hide();
} );

