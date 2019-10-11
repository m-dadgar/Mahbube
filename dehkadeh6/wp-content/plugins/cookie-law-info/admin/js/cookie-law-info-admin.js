(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	 $(function() {
	 	$('.my-color-field').wpColorPicker();

	 	var cli_nav_tab=$('.cookie-law-info-tab-head .nav-tab');
	 	if(cli_nav_tab.length>0)
	 	{
		 	cli_nav_tab.click(function(){
		 		var cli_tab_hash=$(this).attr('href');
		 		cli_nav_tab.removeClass('nav-tab-active');
		 		$(this).addClass('nav-tab-active');
		 		cli_tab_hash=cli_tab_hash.charAt(0)=='#' ? cli_tab_hash.substring(1) : cli_tab_hash;
		 		var cli_tab_elm=$('div[data-id="'+cli_tab_hash+'"]');
		 		$('.cookie-law-info-tab-content').hide();
		 		if(cli_tab_elm.length>0)
		 		{	 			
		 			cli_tab_elm.fadeIn();
		 		}
		 	});
		 	var location_hash=window.location.hash;
		 	if(location_hash!="")
		 	{
		 		var cli_tab_hash=location_hash.charAt(0)=='#' ? location_hash.substring(1) : location_hash;
		 		if(cli_tab_hash!="")
		 		{
		 			$('div[data-id="'+cli_tab_hash+'"]').show();
		 			$('a[href="#'+cli_tab_hash+'"]').addClass('nav-tab-active');
		 		}
		 	}else
		 	{
		 		cli_nav_tab.eq(0).click();
		 	}		 	
		}
		$('.cli_sub_tab li').click(function(){
			var trgt=$(this).attr('data-target');
			var prnt=$(this).parent('.cli_sub_tab');
			var ctnr=prnt.siblings('.cli_sub_tab_container');
			prnt.find('li a').css({'color':'#0073aa','cursor':'pointer'});
			$(this).find('a').css({'color':'#ccc','cursor':'default'});
			ctnr.find('.cli_sub_tab_content').hide();
			ctnr.find('.cli_sub_tab_content[data-id="'+trgt+'"]').fadeIn();
		});
		$('.cli_sub_tab').each(function(){
			var elm=$(this).children('li').eq(0);
			elm.click();
		});
		$('#cli_settings_form').submit(function(e){
			var submit_action=$('#cli_update_action').val();
			if(submit_action=='delete_all_settings')
			{
				//return;
			}
			e.preventDefault();
			var data=$(this).serialize();
			var url=$(this).attr('action');
			var spinner=$(this).find('.spinner');
			var submit_btn=$(this).find('input[type="submit"]');
			spinner.css({'visibility':'visible'});
			submit_btn.css({'opacity':'.5','cursor':'default'}).prop('disabled',true);			
			$.ajax({
				url:url,
				type:'POST',
				data:data+'&cli_settings_ajax_update='+submit_action,
				success:function(data)
				{
					spinner.css({'visibility':'hidden'});
					submit_btn.css({'opacity':'1','cursor':'pointer'}).prop('disabled',false);
					if(submit_action=='delete_all_settings')
					{
						cli_notify_msg.success(cli_reset_settings_success_message);
						setTimeout(function(){
							window.location.reload(true);
						},1000);
					}else
					{
						cli_notify_msg.success(cli_settings_success_message);
					}
					cli_bar_active_msg();
				},
				error:function () 
				{
					spinner.css({'visibility':'hidden'});
					submit_btn.css({'opacity':'1','cursor':'pointer'}).prop('disabled',false);
					if(submit_action=='delete_all_settings')
					{
						cli_notify_msg.error(cli_reset_settings_error_message);
					}else
					{
						cli_notify_msg.error(cli_settings_error_message);
					}
				}
			});
		});

		//=====================
		function cli_scroll_accept_er()
		{	
			if($('[name="cookie_bar_as_field"] option:selected').val()=='popup' && $('[name="popup_overlay_field"]:checked').val()=='true' && $('[name="scroll_close_field"]:checked').val()=='true')
			{
				$('.cli_scroll_accept_er').show();
				//$('label[for="scroll_close_field"]').css({'color':'red'});
			}else
			{
				$('.cli_scroll_accept_er').hide();
				//$('label[for="scroll_close_field"]').css({'color':'#23282d'});	
			}
		}
		cli_scroll_accept_er();
		$('[name="cookie_bar_as_field"]').change(function(){
			cli_scroll_accept_er();
		});
		$('[name="popup_overlay_field"], [name="scroll_close_field"]').click(function(){
			cli_scroll_accept_er();
		});
		//=====================

		function cli_bar_active_msg()
		{
			$('.cli_bar_state tr').hide();
			if($('input[type="radio"].cli_bar_on').is(':checked'))
			{
				$('.cli_bar_state tr.cli_bar_on').show();
			}else
			{
				$('.cli_bar_state tr.cli_bar_off').show();	
			}
		}
		var cli_form_toggler=
		{
			set:function()
			{
				$('select.cli_form_toggle').each(function(){
					cli_form_toggler.toggle($(this));
				});
				$('input[type="radio"].cli_form_toggle').each(function(){
					if($(this).is(':checked'))
					{
						cli_form_toggler.toggle($(this));
					}
				});
				$('select.cli_form_toggle').change(function(){
					cli_form_toggler.toggle($(this));
				});
				$('input[type="radio"].cli_form_toggle').click(function(){
					if($(this).is(':checked'))
					{
						cli_form_toggler.toggle($(this));
					}
				});
			},
			toggle:function(elm)
			{
				var vl=elm.val();
				var trgt=elm.attr('cli_frm_tgl-target');
				$('[cli_frm_tgl-id="'+trgt+'"]').hide();
				var selcted_trget=$('[cli_frm_tgl-id="'+trgt+'"]').filter(function(){
					return $(this).attr('cli_frm_tgl-val')==vl;
				});
				selcted_trget.show();
				selcted_trget.find('th').each(function(){
					var prnt=$(this).parent('tr');
					var sub_lvl=1;
					if(typeof prnt.attr('cli_frm_tgl-lvl') !== typeof undefined && prnt.attr('cli_frm_tgl-lvl') !== false)
					{
						sub_lvl=prnt.attr('cli_frm_tgl-lvl');
					}
					var lft_margin=sub_lvl*15;
					$(this).find('label').css({'margin-left':'0px'}).stop(true,true).animate({'margin-left':lft_margin+'px'});
				});

				
			}
		}
		$('#button_2_page_field').on('change',function(){
			if($('.cli_privacy_page_not_exists_er').length>0)
			{
				$('.cli_privacy_page_not_exists_er').remove();
			}
		});

		cli_form_toggler.set();

	 });
})( jQuery );
var cli_notify_msg=
{
	error:function(message)
	{
		var er_elm=jQuery('<div class="notify_msg" style="background:#dd4c27; border:solid 1px #dd431c;">'+message+'</div>');				
		this.setNotify(er_elm);
	},
	success:function(message)
	{
		var suss_elm=jQuery('<div class="notify_msg" style="background:#1de026; border:solid 1px #2bcc1c;">'+message+'</div>');				
		this.setNotify(suss_elm);
	},
	setNotify:function(elm)
	{
		jQuery('body').append(elm);
		elm.stop(true,true).animate({'opacity':1,'top':'50px'},1000);
		setTimeout(function(){
			elm.animate({'opacity':0,'top':'100px'},1000,function(){
				elm.remove();
			});
		},3000);
	}
}
function cli_store_settings_btn_click(vl)
{
	document.getElementById('cli_update_action').value=vl;
}
