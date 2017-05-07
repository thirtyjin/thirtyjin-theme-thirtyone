

//All custom JS not relating to theme options goes here
jQuery(document).ready(function($) {

/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/

  /* Grab our vars ---------------------------------------------------------------*/
	var quoteOptions = $('#thirtyone_post_format_quote_meta_box'),
	    quoteTrigger = $('#post-format-quote'),
	  	linkOptions = $('#thirtyone_post_format_links_meta_box'),
	  	linkTrigger = $('#post-format-link'),
	  	audioOptions = $('#thirtyone_post_format_audio_meta_box'),
	  	audioTrigger = $('#post-format-audio'),
	  	videoOptions = $('#thirtyone_post_format_video_meta_box'),
	  	videoTrigger = $('#post-format-video'),
	  	galleryOptions = $('#thirtyjin-metabox-post-image'),
	  	galleryTrigger = $('#post-format-gallery'),
	  	
	  	group = jQuery('#post-formats-select input');

  /* Hide and show sections as needed --------------------------------------------*/
  thirtyjinHideAll(null);	
	
	group.change( function() {
		thirtyjinHideAll(null);		
		
		if($(this).val() == 'quote') {
			quoteOptions.css('display', 'block');		
		} else if($(this).val() == 'link') {
			linkOptions.css('display', 'block');
		} else if($(this).val() == 'audio') {
			audioOptions.css('display', 'block');
		} else if($(this).val() == 'video') {
			videoOptions.css('display', 'block');
		} else if($(this).val() =='gallery') {
		    galleryOptions.css('display', 'block');
		}
	});
	
	if(quoteTrigger.is(':checked'))
		quoteOptions.css('display', 'block');
		
	if(linkTrigger.is(':checked'))
		linkOptions.css('display', 'block');
		
	if(audioTrigger.is(':checked'))
		audioOptions.css('display', 'block');
		
	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');

	if(galleryTrigger.is(':checked'))
		galleryOptions.css('display', 'block');
		
  function thirtyjinHideAll(notThisOne) {
		videoOptions.css('display', 'none');
		quoteOptions.css('display', 'none');
		linkOptions.css('display', 'none');
		audioOptions.css('display', 'none');
		galleryOptions.css('display', 'none');
  }
	
});