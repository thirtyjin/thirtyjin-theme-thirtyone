jQuery(document).ready(function(){
	
	
	$('#site-logo').mouseover(function(){
		$('#site-description').fadeIn(200);
	});
	$('#site-logo').mouseout(function(){
		$('#site-description').fadeOut(500);
	});
	
	
/*-----------------------------------------------------------------------------------*/
/*	Back to Top  
/*-----------------------------------------------------------------------------------*/	
	var topLink = jQuery('#back-to-top');
	
	function tz_backToTop(topLink) {
		if(jQuery(window).scrollTop() > 0) {
			topLink.fadeIn(200);
		} else {
			topLink.fadeOut(200);
		}
	}

	jQuery(window).scroll( function() {
		tz_backToTop(topLink);
	});

	topLink.click( function() {
		jQuery('html, body').stop().animate({scrollTop:0}, 500);
		return false;
	});
	
	
	
/*-----------------------------------------------------------------------------------*/
/*	Back to Top - Divider top  
/*-----------------------------------------------------------------------------------*/	
	jQuery('.top').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow'); 
		return false; 
	}); 


	
/*-----------------------------------------------------------------------------------*/
/*	Navigation Menu   
/*-----------------------------------------------------------------------------------*/	

/*jQuery("#menu-main-menu li").hover(
		function(){
			jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(300);
		},
		function(){
			jQuery(this).find('ul:first').css({visibility: "hidden"});
		});*/

	
	
	
	/*-----------------------------------------------------------------------------------*/
	/*  Dropdown for Responsive Nav
	/*-----------------------------------------------------------------------------------*/

    // Create the dropdown base
    $("<select />").appendTo("nav");
    
    // Create default option "Go to..."
    $("<option />", {
       "selected": "selected",
       "value"   : "",
       "text"    : "Navigation"
    }).appendTo("nav select");
    
    // Populate dropdown with menu items
    $("nav a").each(function() {
     var el = $(this);
     
     if(el.parents('.sub-menu').length) {
         $('<option />', {
             'value': el.attr('href'),
             'text':  '- ' + el.text()
         }).appendTo('nav select');
     } else {
         $('<option />', {
             'value': el.attr('href'),
             'text': el.text()
         }).appendTo('nav select');
     }
     
     });
    
	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
    $("nav select").change(function() {
      window.location = $(this).find("option:selected").val();
    });
		    	
	
	

	
/*-----------------------------------------------------------------------------------*/
/*	images hover 
/*-----------------------------------------------------------------------------------*/


	jQuery('#hover_img').hover(function(){
		jQuery ('#hover_img').live('mouseover mouseout', function(event){
			if (event.type == 'mouseover'){
				jQuery(this).find('#hover_img_go').fadeIn("fast");
				jQuery(this).find('#hover_img_link').fadeTo("fast",0.5);
				
			} else {
				jQuery(this).find('#hover_img_go').fadeOut("fast");
				jQuery(this).find('#hover_img_link').animate({ opacity: 1.0}, 300);
				
			}
		})
	});

	
	
	

    /* Fix IE quirks ------------------------------*/
    if( jQuery('body').hasClass('ie8') || jQuery('body').hasClass('ie7') ) {
        var portfolioImages = jQuery('.post-thumb-overlay').siblings('img');
        
        portfolioImages.hover(
            function() {
                jQuery(this).animate({
                    opacity: .4
                }, 300);
            },
            function() {
                jQuery(this).animate({
                    opacity: 1
                }, 300);
            }
        );
    }
    
    if( jQuery('body').hasClass('ie') && jQuery('body').hasClass('single-portfolio') ) {
        jQuery('.entry-content').columnize({ columns: 2 });
    }


/*-----------------------------------------------------------------------------------*/
/*	Hello bar
/*-----------------------------------------------------------------------------------*/
			
		
	jQuery('#hello_bar #close_bar').click( function () {
		jQuery('#hello_bar').animate({marginTop: -40}, 200, function() {
			jQuery('#open_bar').animate({marginTop: 0}, 200).animate({marginTop: -5}, 90).animate({marginTop: 0}, 90);
			jQuery.cookie("helloBar", "close", { path: '/' });
		});
		
	});
	
	jQuery('#open_bar').click( function () {
		jQuery(this).animate({marginTop: -200}, 400, '', function () {
			jQuery('#hello_bar').animate({marginTop: 0}, 200).animate({marginTop: -5}, 90).animate({marginTop: 0}, 90)
			jQuery.cookie("helloBar", "open", { path: '/' });
		});
	});
	
	if(jQuery.cookie("helloBar") === 'close')
	{
		jQuery('#hello_bar').css("marginTop", -40);
		jQuery('#open_bar').css("marginTop", 0);
	}
	else
	{
		jQuery('#hello_bar').css("marginTop", 0);
		jQuery('#open_bar').css("marginTop", -100);
	}
		
	
	
	
/*-----------------------------------------------------------------------------------*/
/*	Isotope Portfolio archive V2
/*-----------------------------------------------------------------------------------*/

if( jQuery().isotope ) {
	jQuery( function() {
		  // init Isotope
		  var container = jQuery('.isotope').isotope({
		    itemSelector: '.isotope-item',
		    layoutMode: 'fitRows'
		  });
		// filter functions
		  var filterFns = {
		    // show if number is greater than 50
		    numberGreaterThan50: function() {
		      var number = jQuery(this).find('.number').text();
		      return parseInt( number, 10 ) > 50;
		    },
		    // show if name ends with -ium
		    ium: function() {
		      var name = jQuery(this).find('.name').text();
		      return name.match( /ium$/ );
		    }
		  };
		  // bind filter button click
		  jQuery('#filters').on( 'click', 'button', function() {
		    var filterValue = jQuery( this ).attr('data-filter');
		    // use filterFn if matches value
		    filterValue = filterFns[ filterValue ] || filterValue;
		    container.isotope({ filter: filterValue });
		  });
		  
		  // change is-checked class on buttons
		  jQuery('.filters-button-group').each( function( i, buttonGroup ) {
		    var buttonGroup = jQuery( buttonGroup );
		    buttonGroup.on( 'click', 'button', function() {
		      buttonGroup.find('.is-checked').removeClass('is-checked');
		      jQuery( this ).addClass('is-checked');
		    });
		  });
		  
		});
}
/* Isotope V2 end -------------------------------------*/




/*-----------------------------------------------------------------------------------*/
/*	iPhone/iPad Scalability - http://cl.ly/Hyjj
/*-----------------------------------------------------------------------------------*/

	if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
        var viewportmeta = document.querySelector('meta[name="viewport"]');
        if (viewportmeta) {
            viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=1';
            document.body.addEventListener('gesturestart', function () {
                viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
            }, false);
        }
    }

    
    
/*-----------------------------------------------------------------------------------*/
/*	Slideshow carouFredSel
/*-----------------------------------------------------------------------------------*/   
    
	jQuery('#slideshow_page').carouFredSel({

		responsive: true,
		width: '100%',
		height: "variable",
		prev: '#prev_slideshow_page',
		next: '#next_slideshow_page',
		pagination: "#pagination_slideshow_pager",
		swipe: {
			onMouse: true,
			onTouch: true
		},
		auto: {
			play: true,
			delay: 10000
		},
		items: {
			visible: {
				min: 1,
				max: 1
			},
			height 		: "variable" 
		}
	});   	
	
	
    
/*-----------------------------------------------------------------------------------*/
/*	freebies slidershow carouFredSel
/*-----------------------------------------------------------------------------------*/   
    
	jQuery('#freebies_slidershow').carouFredSel({

		responsive: true,
		width: '100%',
		height: "variable",
		prev: '#prev_slideshow_page',
		next: '#next_slideshow_page',
		pagination: "#pagination_slideshow_pager",
		swipe: {
			onMouse: true,
			onTouch: true
		},
		auto: {
			play: false,
			delay: 10000
		},
		items: {
			visible: {
				min: 1,
				max: 1
			},
			height 		: "variable" 
		}
	});   	
			
    
	jQuery('#freebies_slidershow_2').carouFredSel({

		responsive: true,
		width: '100%',
		height: "variable",
		prev: '#prev_slideshow_page_2',
		next: '#next_slideshow_page_2',
		pagination: "#pagination_slideshow_pager_2",
		swipe: {
			onMouse: true,
			onTouch: true
		},
		auto: {
			play: false,
			delay: 10000
		},
		items: {
			visible: {
				min: 1,
				max: 1
			},
			height 		: "variable" 
		}
	});   	
			
    
	jQuery('#freebies_slidershow_3').carouFredSel({

		responsive: true,
		width: '100%',
		height: "variable",
		prev: '#prev_slideshow_page_3',
		next: '#next_slideshow_page_3',
		pagination: "#pagination_slideshow_pager_3",
		swipe: {
			onMouse: true,
			onTouch: true
		},
		auto: {
			play: false,
			delay: 10000
		},
		items: {
			visible: {
				min: 1,
				max: 1
			},
			height 		: "variable" 
		}
	});  	

	
	
/*-----------------------------------------------------------------------------------*/
/*	initialise sticky.js
/*-----------------------------------------------------------------------------------*/  

	jQuery(document).ready(function(){
		jQuery("#main-navigation").sticky({ topSpacing: 0 });
		jQuery("#ads").sticky({ topSpacing: 60 });
    });

  
	
	
	

/*-----------------------------------------------------------------------------------*/
/*	Loading Bar nprogress
/*-----------------------------------------------------------------------------------*/  
	
	jQuery('body').show();
	
	NProgress.start();

	setTimeout(function() { NProgress.done(); jQuery('.fade').removeClass('out'); }, 1000);
	
	/*document.onreadystatechange=function(){ 
		if(document.readyState=="complete"){ 
		        setTimeout(function() { NProgress.done();  jQuery('.fade').removeClass('out'); }, 1000);
		    } 
	} */

	

/*-----------------------------------------------------------------------------------*/
/*	hover tips
/*-----------------------------------------------------------------------------------*/ 
	
	jQuery('.weibo, .facebook, .twitter, .dribbble, .flickr, .linkedin, .rss, .email, .googleplus').poshytip({
		className: 'tip-sns',
		showOn:'hover',
		allowTipHover: true,
		fade: true,
		slide: false,
		alignTo: 'target',
		alignX: 'center',
		alignY: 'bottom',
		offsetY: 6,
		showTimeout: 1
	});
	
	jQuery('.weixin').poshytip({
		content: '<img src="' + jQuery('.weixin').attr('title') + '" alt="Weixin Dimensional Code" />',
		className: 'tip-sns',
		//followCursor: true,
		showOn:'hover',
		allowTipHover: true,
		fade: true,
		slide: false,
		alignTo: 'target', //cursor,target
		alignX: 'center',
		alignY: 'bottom',
		offsetY: 6,
		showTimeout: 1
	});
	
	

	
	jQuery.stellar({
		horizontalScrolling: false,
		//verticalOffset: 20,
		//horizontalOffset: 10,
		//scrollProperty: 'transform'
	});

	
	
	
	
	
	jQuery('.section').waypoint(function(direction) {
		// do stuff
		$('.hero-image').fadeIn( 2500 );
	}, { offset: '50%' }
	);



    

}); // END. jQuery(document).ready(function()

