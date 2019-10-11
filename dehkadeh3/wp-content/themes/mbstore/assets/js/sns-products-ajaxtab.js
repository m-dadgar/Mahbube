(function ($) {
	"use strict";
	$(document).ready(function() {
		SnsPrdAjaxtab.oCarousel('.sns-products-ajaxtab.template-carousel');
		SnsPrdAjaxtab.init();
	});
	// Begin Class: SnsPrdAjaxtab
	var SnsPrdAjaxtab = {
        init: function() {
        	$('.sns-products-ajaxtab').each(function(){
        		var $this_box_id = $(this).attr('id');
        		$('#'+$this_box_id+' .nav-tabs').find("li").first().addClass("active").find('a').addClass('tab-loaded');
				$('#'+$this_box_id+' ul.dropdown-menu').find("li").first().addClass("active").find('a').addClass('tab-loaded');
				$('#'+$this_box_id+' .content-tab-inner .prdlist-content').css({'overflow':'hidden', 'height':'0'});
				$('#'+$this_box_id+' .content-tab-inner').find(".prdlist-content").first().addClass("active in").css({'overflow':'', 'height':''});
				if ( $('#'+$this_box_id).hasClass('template-loadmore') ) {
					SnsPrdAjaxtab.loadMore('#' + $this_box_id, $('#'+$this_box_id+' .nav-tabs').find("li").first().find('a').attr('href'), $('#'+$this_box_id+' .nav-tabs').find("li").first().find('a').attr('href') + ' .sns-woo-loadmore');
				}
				SnsPrdAjaxtab.tabItemCarousel();
				SnsPrdAjaxtab.specialPCarousel();
        		$(this).find('.nav-tabs a, ul.dropdown-menu > li a').each(function(){
        			$(this).on('click', function(){
						var $this = $(this);
						var tab_content_id 		= $(this).attr('href');
						var eclass = 'animate-'+Math.floor((Math.random() * 1000000000));
						var order, cat;
						if ( $('#'+$this_box_id).attr('data-tabtype') == '1' ) {
							order = $(this).attr('data-order'); 
							cat = $('#' + $this_box_id).attr('data-cat');
						}else{
							cat = $(this).attr('data-cat'); 
							order = $('#' + $this_box_id).attr('data-order');
						}
						if( !$(this).parent().hasClass('active') ){
							// Load tab products
							if( ! $this.hasClass('tab-loaded') ){
								$('#'+$this_box_id+' .content-tab-inner').addClass('tab-loading');
								$.ajax({
					                url: ajaxurl,
					                data:{
					                	action 				: 'sns_products_ajaxtab',
					                	box_id				: $this_box_id,
					                	tab_content_id 		: tab_content_id.replace( '#', '' ),
										order 				: order,
										cat 				: cat,
										limit 				: $('#' + $this_box_id).attr('data-limit'),
										uq 					: $('#' + $this_box_id).attr('data-uq'),
										effect 				: $('#' + $this_box_id).attr('data-effect'),
										row                 : $('#' + $this_box_id).attr('data-row'),
										template            : $('#' + $this_box_id).attr('data-template'),
										tab_type			: $('#' + $this_box_id).attr('data-tab_type'),
										eclass				: eclass,
										number_desktop            : $('#' + $this_box_id).attr('data-desktop'),
										number_tablet             : $('#' + $this_box_id).attr('data-tabletl'),
										number_tabletp            : $('#' + $this_box_id).attr('data-tabletp'),
										number_mobilel            : $('#' + $this_box_id).attr('data-mobilel'),
										number_mobilep            : $('#' + $this_box_id).attr('data-mobilep'),

					                },
					                type: 'POST',
					                success: function(data){
					                	if( data!='' ){
					                		$this.addClass('tab-loaded');
						                	$('#'+$this_box_id+' .content-tab-inner').removeClass('tab-loading');
						                	$('#'+$this_box_id+' .content-tab-inner').append(data);
						                	if ( '4' == $('#' + $this_box_id).attr('data-template') ) {
						                		var src_banner = $( '#'+$this_box_id+' .hidden .'+tab_content_id.replace( '#', '' ) ).attr('data-img');
						                		$('#'+$this_box_id+' .content-tab-inner '+tab_content_id+' .banner-link').html('<img src="'+src_banner+'"/>');
						                	}
						                	if ( $('#'+$this_box_id).hasClass('template-carousel') ) {
						                		SnsPrdAjaxtab.oCarousel('#' + $this_box_id, tab_content_id);
						                	}else{
						                		SnsPrdAjaxtab.loadMore('#' + $this_box_id, tab_content_id, tab_content_id + ' .sns-woo-loadmore');
						                	}
						                	// lazy load image
						                	if( $('body').hasClass('use_lazyload') ){
												$(tab_content_id).find('img.lazy').each(function(){
													$(this).lazyload();
												});
												var timeout = setTimeout(function() {
											        $(tab_content_id).find("img.lazy:not(.loaded)").trigger("appear")
											    }, 1200);
											}
											// Tab content
											$('#'+$this_box_id+' .prdlist-content').removeClass('active').removeClass('in').css({'overflow':'hidden', 'height':'0'});
											$('#'+$this_box_id).find(tab_content_id).addClass('active').addClass('in').css({'overflow':'', 'height':''});
											SnsPrdAjaxtab.setAnimate( '#'+$this_box_id+ ' .content-tab-inner '+tab_content_id, eclass );
						                }
					                }
					            });
							}else{
								// Tab content
								$('#'+$this_box_id+' .prdlist-content').removeClass('active').removeClass('in').css({'overflow':'hidden', 'height':'0'});
								$('#'+$this_box_id).find(tab_content_id).addClass('active').addClass('in').css({'overflow':'', 'height':''});
								// Reset effect
								SnsPrdAjaxtab.resetAnimate($(this), $this_box_id);
							}
							// Tab title
							$('#'+$this_box_id+' .nav-tabs li').removeClass('active'); $('#'+$this_box_id+' ul.dropdown-menu li').removeClass('active');
							$(this).parent('li').addClass('active');
							if( tab_content_id.indexOf('drop_') == 1){
								tab_content_id = tab_content_id.replace('drop_', '');
								$('#'+$this_box_id+' .nav-tabs li').each(function(){
									if ( $(this).find('a').attr('href') == tab_content_id ) $(this).addClass('active');
								})	
							}else{
								$('#'+$this_box_id+' ul.dropdown-menu li').each(function(){
									if ( $(this).find('a').attr('href').replace('drop_', '') == tab_content_id ) $(this).addClass('active');
								})
							}
							return false;
						}
						
					});
				});
        	});
        },
        tabItemCarousel: function (){
        	$('.sns-products-ajaxtab .header-tab .nav-tabs.have-icon').owlCarousel({
				dots: false,
				nav: false,
                items : 10,
                // loop:true, autoplay: true, autoplayHoverPause: true,
                responsive : {
                    0 : { items: 3 },
                    480 : { items: 4 },
                    768 : { items: 7 },
                    992 : { items: 8 },
                    1200 : { items: 10 }
                },
			});
        },
        specialPCarousel: function() {
        	$('.sns-products-ajaxtab .special-box .owl-carousel').each(function(){
				if ( $(this).length > 0 ){
					$(this).owlCarousel({
						dots: false,
						nav: true,
		                items : 1,
		                loop:true,
		                responsive : {
		                    0 : { items: 1 },
		                    480 : { items: 1 },
		                    768 : { items: 1 },
		                    992 : { items: 1 },
		                    1200 : { items: 1 }
		                },
					});
				}
			});
        },
        oCarousel: function(box, wrap) {
        	if ( typeof wrap == 'undefined') var wrap = '';
        	$(box).each(function(){
				if ( $(this).length > 0 && $(this).find('div.ajaxtab-products').find('> *').length > 0 ){
					var wrapc = (wrap == '') ? $(this).find('div.ajaxtab-products') : $(wrap).find('div.ajaxtab-products') ;
					var p_size = (wrap == '') ? $(this).find('div.ajaxtab-products').data('size') : $(wrap).find('div.ajaxtab-products').data('size');
					wrapc.owlCarousel({
						loop: ( p_size > $(this).data('desktop') ) ? true : false,
						dots: false,
						nav: true,
						autoplay: ( $(this).data('autoplay')=='1' )? true : false, autoplayHoverPause: true,
		                items : $(this).data('desktop'),
		                responsive : {
		                	0	: { items: 1 },
		                    360 : { items: $(this).data('mobilep')},
		                    480 : { items: $(this).data('mobilel') },
		                    768 : { items: $(this).data('tabletp') },
		                    992 : { items: $(this).data('tabletl') },
		                    1200 : { items: $(this).data('desktop') }
		                },
					});
				}
			});
        },
        loadMore: function(box, tab_content, readmore) {
			if ( typeof readmore == 'undefined') var readmore = '.sns-woo-loadmore';
			$(readmore).each(function() {
				$(this).on('click', function(){
					if( !$(this).hasClass('loaded') ){
						var btnid, showmore, start, order, cat, loadtext, loadingtext, loadedtext, eclass;
						btnid       = $(this).attr('id');
						start       = $(this).attr('data-start');
						showmore    = $( box ).attr('data-showmore');
		            	loadtext    = $(this).attr('data-loadtext');
		            	loadingtext = $(this).attr('data-loadingtext');
		            	loadedtext  = $(this).attr('data-loadedtext');
		            	eclass = 'animate-'+Math.floor((Math.random() * 1000000000));

		            	$( '#'+btnid ).html(loadingtext); $( '#'+btnid ).addClass('loading');

			            $.ajax({
			                url: ajaxurl,
			                data:{
			                	action 		: 'sns_wooloadmore',
			                	start       : start,
			                	order       : $(this).attr('data-order'),
			                	cat         : $(this).attr('data-cat'),
			                	eclass      : eclass,
			                	showmore 				  : showmore,
			                	number_desktop            : $( box ).attr('data-desktop'),
								number_tablet             : $( box ).attr('data-tabletl'),
								number_tabletp            : $( box ).attr('data-tabletp'),
								number_mobilel            : $( box ).attr('data-mobilel'),
								number_mobilep            : $( box ).attr('data-mobilep'),
			                },
			                type: 'POST',
			                success: function(data){
			                	if( data!='' ){
			                		$( box + ' ' + tab_content + ' .product_list' ).append(data);
			                		// lazy load image
				                	if( $('body').hasClass('use_lazyload') ){
										$(tab_content).find('img.lazy').each(function(){
											$(this).lazyload();
										});
										var timeout = setTimeout(function() {
									        $(tab_content).find("img.lazy:not(.loaded)").trigger("appear")
									    }, 1200);
									}

			                		SnsPrdAjaxtab.setAnimate( box + ' ' + tab_content, eclass, start );
				                	$( '#'+btnid ).removeClass('loading');
				                	if( (parseInt(start) + parseInt(showmore)) > $( box + ' ' + tab_content + ' .product_list .type-product' ).size() ){
				                		$( '#'+btnid ).html(loadedtext);
				                		$( '#'+btnid ).addClass('loaded');
				                	}else{
				                		$( '#'+btnid ).html(loadtext);
				                	}
				                	$( '#'+btnid ).attr('data-start', parseInt(start) + parseInt(showmore));
				                }else{
				                	$( '#'+btnid ).html(loadedtext);
				                	$( '#'+btnid ).addClass('loaded');
				                }
			                }
			            });
			        }else{
			         	return false;
			        }
			    });
			});
		},
        setAnimate: function (el, eclass, index = 0){
			var morec = '';
			if( $(el+' .product_list').hasClass('owl-carousel') ){
			 	morec = '.owl-item.active ';
			}
			$(el+' .product_list '+morec+'.type-product').each(function(i){
				if ( i-index > 0 ){
					$(this).attr("style", "-webkit-animation-delay:" + (i-index) * 250 + "ms;"
		                + "-moz-animation-delay:" + (i-index) * 250 + "ms;"
		                + "-o-animation-delay:" + (i-index) * 250 + "ms;"
		                + "animation-delay:" + (i-index) * 250 + "ms;");
				}
				if (i == $(el+' .product_list '+morec+'.type-product').size() -1) {
		            $(el+' .product_list').addClass("play");
		            if( morec!='' ){
		            	setTimeout(function(){
		            		SnsPrdAjaxtab.delAnimate(el);
		            	}, i*250+700);
		            }
		        }
			});
		},
		resetAnimate: function (tab, boxid){
			var eclass, contentid;
	    	eclass = 'animate-'+Math.floor((Math.random() * 1000000000));
	    	contentid = tab.attr('href');
	    	//
	    	$('#'+boxid+' .product_list').removeClass('play');
	    	$('#'+boxid+' .product_list .type-product').removeClass('item-animate');
	    	$('#'+boxid+' .product_list .type-product').attr('style', '');
	    	// Remove class with prefix animate-
	    	var classNames = [];
			$('#'+boxid+' .product_list .type-product').each(function(i, tab){
			    var name = (tab.className.match(/(^|\s)(animate\-[^\s]*)/) || [,,''])[2];
			    if(name){
			        classNames.push(name);
			        $(tab).removeClass(name);
			    }
			});
	    	//
	    	$('#'+boxid+' '+contentid+' .product_list .type-product').addClass('item-animate').addClass(eclass);
	    	// Set effect
		    SnsPrdAjaxtab.setAnimate('#'+boxid+' '+contentid, eclass );

		},
		delAnimate: function(el){
			if( $(el+' .product_list > div').hasClass('item-animate') ) $(el+' .product_list .type-product').removeClass('item-animate');
		},
    }
})(jQuery);