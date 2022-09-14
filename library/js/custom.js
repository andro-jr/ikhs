/**
 * Shopstar Theme Custom Functionality
 *
 */
( function( $ ) {
    
	$( document ).ready( function() {
		shopstar_image_has_loaded();
		
	    $('.hiddenUntilLoadedImageContainer img, img.hideUntilLoaded').one("load", function() {
	    }).each(function() {
	    	if (this.complete) {
	    		$(this).trigger( 'load' );
	    	}
	    });
	    
	    // Themify Product Filter
    	$( document ).on( 'wpf_ajax_success', function() {
    		shopstar_image_has_loaded();
    	} );
	    
    	// Jetpack infinite scroll
    	$( document.body ).on( 'post-load', function () {
    		shopstar_image_has_loaded();
    	} );
    	
        // Add button to sub-menu item to show nested pages / Only used on mobile
        $( '.main-navigation li.page_item_has_children, .main-navigation li.menu-item-has-children' ).prepend( '<span class="submenu-toggle"><i class="otb-fa otb-fa-angle-right"></i></span>' );
        
        // Add a hover class to navigation menu items when focused
        $( '.main-navigation a' ).on( 'focus blur', function() {
        	$( this ).parents( 'li' ).toggleClass( 'hover' );
        });
        
        // Mobile nav sub-menu toggle button
        $( '.main-navigation a[href="#"], .submenu-toggle' ).bind( 'click', function(e) {
        	e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
            $(this).parent().find('.otb-fa:first').toggleClass('otb-fa-angle-right').toggleClass('otb-fa-angle-down');
        });
        
        var focused_mobile_menu_item;
        
        // Remove all hover classes from menu items when anything  on the page is clicked
        $( document ).bind( 'click', function(e) {
        	if ( e.target != focused_mobile_menu_item ) {
        		$( 'body.mobile-device .main-navigation li.menu-item-has-children' ).removeClass('hover');
        	}
        	
        	focused_mobile_menu_item = null;
        });

        // 
        $( 'body.mobile-device .main-navigation li.menu-item-has-children > a' ).bind( 'click', function(e) {
        	e.preventDefault();
        	menu_item = $(this).parent();

        	// If a menu item with a submenu is clicked that doesn't have a # for a URL show the submenu
        	if ( menu_item.find('a').attr('href') != '#' && !menu_item.hasClass('hover') ) {
        		focused_mobile_menu_item = e.target;        		
        		menu_item.addClass('hover');
        		
        	// If the submenu is already displaying then go to it's URL
        	} else if ( menu_item.hasClass('hover') ) {
        		window.location.href = menu_item.find('a').attr('href');
        	}
        });        
        
        shopstar_set_slider_height();
        
        // Mobile menu toggle button
        $( '.main-navigation .menu-toggle' ).click( function(e){
            $( 'body' ).toggleClass( 'show-main-menu' );
        });
        $( '.main-navigation .close-button' ).click( function(e){
            $( '.main-navigation .menu-toggle' ).click();
        });
    	
        // Search Show / Hide
    	var searchHeight = $(".search-slidedown").height();
    	
        $(".search-button").click(function(e){
        	e.preventDefault();
        	
        	if ( !$(".search-slidedown").hasClass('open') ) {
	        	$(".search-slidedown").addClass('open');
	        	$(".search-slidedown").animate( { opacity: 1 }, 150 );
	            $(".search-slidedown .search-field").focus();
        	} else {
	        	$(".search-slidedown").removeClass('open');
	        	$(".search-slidedown").animate( { opacity: 0 }, 150 );
        	}
        });
        
        // Don't search if no keywords have been entered
        $(".search-submit").bind('click', function(event) {
        	if ( $(this).parents(".search-form").find(".search-field").val() == "") event.preventDefault();
        });
    	
    	var element;
    	
    	if ( $('.slider-container').length > 0) {
    		element = $('.slider-container');
    	} else {
    		element = $('.site-content');
    	}
    	
    });




    
    function shopstar_set_search_block_position() {
    	if ( $('.search-button').length > 0 ) {
    		$('.search-slidedown .search-block').css('left', $('.search-button').position().left - ( $('.search-slidedown .search-block').width() - $('.search-button').width() ) );
    	}
    }
    
    $(window).resize(function () {
    	shopstar_set_search_block_position();
    });
    
    $(window).on('load', function() {
    	shopstar_init_home_slider();
    	shopstar_set_search_block_position();
    });

    $(window).scroll(function() {
    	if ( $(".search-slidedown").hasClass('open') ) {
    	}
    });
    
    if ( $(".header-image img").length > 0 ) {
	    var img = $('<img/>');
	    img.attr("src", $(".header-image img").attr("src") ); 
		
	    img.on('load', function() {
	    	$('.header-image').removeClass('loading');
	    	$('.header-image').css('height', 'auto');
		});
    }       
    
    function shopstar_set_slider_height() {
        // Set the height of the slider to the height of the first slide's image
    	var firstSlide  = $(".slider-container.default .slider .slide:eq(0)");
    	var headerImage = $(".header-image img");
    	if ( firstSlide.length > 0 ) {
    		var firstSlideImage = firstSlide.find('img').first();
    		
    		if ( firstSlideImage.length > 0) {
    			
    			if ( firstSlideImage.attr('height') > 0 ) {
    				
    				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
    				var firstSlideImageWidth  = firstSlideImage.attr('width');
    				var firstSlideImageHeight = firstSlideImage.attr('height');
    				var sliderWidth = $('.slider-container').width();
    				var widthPercentage;
    				var widthRatio;
    				
    				widthRatio = sliderWidth / firstSlideImageWidth;
    				
    				$('.slider-container.loading').css('height', Math.round( widthRatio * firstSlideImageHeight ) );
    			}
    		}
    	} else if ( headerImage.length > 0 ) {
    		
    		if ( headerImage.attr('height') > 0 ) {

				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
				var headerImageWidth  = headerImage.attr('width');
				var headerImageHeight = headerImage.attr('height');
				var headerImageContainerWidth = $('.header-image').width();
				var widthPercentage;
				var widthRatio;
				
				widthRatio = headerImageContainerWidth / headerImageWidth;
				
				$('.header-image.loading').css('height', Math.round( widthRatio * headerImageHeight ) );
    		}
    	}
    }
    
    function shopstar_image_has_loaded() {
    	var container;

    	$('.hiddenUntilLoadedImageContainer img').on('load', function(){
	    	container = $(this).parents('.hiddenUntilLoadedImageContainer');
	    	container.removeClass('loading');
	    	
	    	(function(container){
	    	    setTimeout(function() {
	    	    	//container.addClass('transition');
	    	    }, 50);
	    	})(container);
	    });
    	
	    $('img.hideUntilLoaded').on('load', function(){
	    	container = $(this).parents('.featured-image-container');
	    	
	    	if ( ( container.hasClass('round') || container.hasClass('square') || container.hasClass('tall') || container.hasClass('medium') || container.hasClass('short') ) ) {
	    		container.css('background-image', 'url("' + $(this).attr('src') + '")' );
		    	
	    		if ( !container.hasClass('disable-style-for-mobile') ) {
	    			$(this).remove();
	    		}
	    	}
	    	
	    	container.removeClass('loading');
	    	
	    	(function(container){ 
	    	    setTimeout(function() { 
	    	    	//container.addClass('transition');
	    	    }, 50);
	    	})(container);	    	
	    });
	}    
    
    function shopstar_init_home_slider() {
    	if ( $('.slider').length ) {
    		
	        $(".slider").carouFredSel({
	            responsive: true,
	            circular: true,
	            infinite: false,
	            width: 1200,
	            height: 'variable',
	            items: {
	                visible: 1,
	                width: 1200,
	                height: 'variable'
	            },
	            onCreate: function(items) {
	            	$('.slider-container.default').css('height', 'auto');
	            	$('.slider-container.default').removeClass('loading');
	            },
	            scroll: {
	                fx: 'uncover-fade',
	                duration: shopstarSliderTransitionSpeed
	            },
	            auto: false,
	            pagination: '.slider-container.default .pagination',
	            prev: '.slider-container.default .prev',
	            next: '.slider-container.default .next',
		        swipe: {
		        	onTouch: true
		        }
	        });
	        
    	}
    }


    //adding class to woocommerce
    if ($("body").hasClass("page-template-seller-header-and-footer")) {
       $('div.woocommerce').addClass('myaccount-css'); 
    }
		
    //adding cat filter to the first on map page
	// $("#wcfmsc_store_categories").prependTo(".wcfmmp-store-search-form");

 	//removing other tabs from store category page
	// var $store_cat = $("div.store_info_parallal:last").find("span").text().trim();

	// if($store_cat == "Online winkel in de buurt" ){
	
		$('.tab_links').each(function(){// id of ul
			var li = $(this).find('li')//get each li in ul
		  
		//   alert(li.text())//get text of each li
		  $('.tab_links li:contains(Producten), li:contains(Retourprocedure), li:contains(Volgers)').hide();
		  $('#products').hide();
		  });
	// }

	// if($store_cat == "Offline winkel in de buurt" ){
	
	// 	$('.tab_links').each(function(){// id of ul
	// 		var li = $(this).find('li')//get each li in ul
		  
	// 	//   alert(li.text())//get text of each li
	// 	  $('.tab_links li:contains(Producten), li:contains(Followers), li:contains(Retourprocedure)').hide();
	// 	  $('#products').hide();

	// 	  })
		
	// }

	$("input[name*='wcfmvm_custom_infos[partner-website-url]']").attr("placeholder", "https://www.jouwurl.nl/");

	// $("#wcfm_membership_registration_form_expander").after("<p>Als je op 'Registratie afronden' klikt, ga je akkoord met de Algemene voorwaarden van ikhouvanshoppen <a target='_blank' href='/algemene-voorwaarden-partners/'>partner</a>.</p>");
	
	$('ul.select2-selection__rendered').after('<div id="space">hello</div>');

	$("input[name*='wcfmvm_custom_infos[partner-website-url]']").after("<p>Start je url met http://www..... of https://www....<p/>");

	//removing prodoct page tab if no content available


	var className = $('div#tab-additional_information:eq(0)').children().html();
	if(className != 'Extra informatie' ){
		$('li#tab-title-additional_information').hide();
	}
 

	//category page filter js

	$('#secondary ul:not([class])').hide();

	$('li[data-parent="0"]').click(function (e) {
		e.stopPropagation();
		$(this).children('#secondary ul:not([class])').show();
		$('#secondary li[data-parent="0"]').not(this).children('.filter-top ul:not([class])').hide();

		// checkbox if checked
	  if (!$('.wpfFilterWrapper .wpfCheckbox>input[type="checkbox"]').is(':checked') ) {
    		$('#secondary ul:not([class])').hide();
    }

 	});


 	//see more homepage


    $('.elementor-element-724b1db .see-more').click(function(e) {
	  e.preventDefault();
	  $('#welcome-2nd-p').slideToggle().show();
	  $(this).text(function(i, t) {
	    return t == 'Lees minder' ? 'Lees verder' : 'Lees minder';
	  });
	});


    //vendor dashboard
	// $('.page-id-5101 .wcfm_menu_wcfm-settings .wcfm_menu_item').addClass('active');



    
} )( jQuery );




if(!!window.performance && window.performance.navigation.type == 2)
{
    window.location.reload();
}


jQuery("#owl-demo-vcontact").owlCarousel({
			navigation: true,
			navigationText: [
			"<i class='spkrslid_lftarrow2 fa fa-angle-left'></i>",
			"<i class='spkrslid_rgtarrow2 fa fa-angle-right'></i>"
			],
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: false,
			//autoPlay: 5000,
			stopOnHover: false,
			dots: true,
			items: 3,
			responsive: {
				0: {
					items: 1
				},
				468: {
					items: 1
				},
				768: {
					items: 3
				},
				1000: {
					items: 3
				}
			}
		});

// custom js frontend
jQuery(document).ready(function ($) {
    function filterToggleAppend() {
        if (!$('body').hasClass('archive')) {
            return;
        }

        const filterContainer = $('#secondary'),
            filterBody = filterContainer.find('.WpfWoofiltersWidget');

        filterContainer.addClass('filter-toggle-container');
        filterContainer.append('<button id="filterToggleBtn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 17v2h6v-2H3zM3 5v2h10V5H3zm10 16v-2h8v-2h-8v-2h-2v6h2zM7 9v2H3v2h4v2h2V9H7zm14 4v-2H11v2h10zm-6-4h2V7h4V5h-4V3h-2v6z"/></svg></button>');

        filterBody.addClass('filter-toggle-body');
        filterBody.prepend('<button id="filterToggleExit" class="filter-toggle-exit"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H3V5h18v14zM9.41 15.95L12 13.36l2.59 2.59L16 14.54l-2.59-2.59L16 9.36l-1.41-1.41L12 10.54 9.41 7.95 8 9.36l2.59 2.59L8 14.54z"/></svg></button>');
		filterBody.append('<button id="filterToggleApply" class="filter-toggle-exit">Toepassen</button>');

        const filterToggleBtn = filterContainer.find('#filterToggleBtn'),
            filterToggleExit = filterBody.find('.filter-toggle-exit');

        filterToggle(filterBody, filterToggleBtn, filterToggleExit);
    }

    filterToggleAppend();

    function filterToggle(filterBody, filterToggleBtn, filterToggleExit) {
        filterToggleBtn.click(function () {
            filterBody.addClass('active');
        })

        filterToggleExit.click(function () {
            filterBody.removeClass('active');
        })
    }

    $('#tab-description').children().each(function () {
        $(this).removeAttr('style')
    })
});




$('body').on('click', '.single_add_to_cart_button', function(){//delegated
        console.log("click");

    })