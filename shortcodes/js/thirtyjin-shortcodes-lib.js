jQuery(document).ready(function($) {


	/*-----------------------------------------------------------------------------------*/
	/*	jquery ui tabs
	/*-----------------------------------------------------------------------------------*/		
		
	$(".thirtyjin-tabs").tabs();
	
	/*-----------------------------------------------------------------------------------*/
	/*	jquery ui accordion
	/*-----------------------------------------------------------------------------------*/	
	$(".thirtyjin_accordion").accordion();	

	
	/*-----------------------------------------------------------------------------------*/
	/*	shortcode toggle
	/*-----------------------------------------------------------------------------------*/		
	$(".thirtyjin-toggle").each( function () {
		if($(this).attr('data-id') == 'closed') {
			$(this).accordion({ header: '.thirtyjin-toggle-title', collapsible: true, active: false  });
		} else {
			$(this).accordion({ header: '.thirtyjin-toggle-title', collapsible: true});
		}
	});



	/*-----------------------------------------------------------------------------------*/
	/*	tooltip
	/*-----------------------------------------------------------------------------------*/
	jQuery('.et-tooltip').hover(function(){
		//$et_tooltip = jQuery('.et-tooltip');
		jQuery('.et-tooltip').live('mouseover mouseout', function(event){
			if (event.type == 'mouseover') {
				jQuery(this).find('.et-tooltip-box').animate({ opacity: 'show', bottom: '25px' }, 300);
			} else {
				jQuery(this).find('.et-tooltip-box').animate({ opacity: 'hide', bottom: '35px' }, 300);
			}
		});
	});


	
});