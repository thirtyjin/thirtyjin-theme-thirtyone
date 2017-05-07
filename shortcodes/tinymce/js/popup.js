
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var thirtyjins = {
    	loadVals: function()
    	{
    		var shortcode = $('#_thirtyjin_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.thirtyjin-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('thirtyjin_', ''),		// gets rid of the thirtyjin_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_thirtyjin_ushortcode').remove();
    		$('#thirtyjin-sc-form-table').prepend('<div id="_thirtyjin_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_thirtyjin_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.thirtyjin-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('thirtyjin_', '')		// gets rid of the thirtyjin_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_thirtyjin_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_thirtyjin_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_thirtyjin_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_thirtyjin_ushortcode').remove();
    		$('#thirtyjin-sc-form-table').prepend('<div id="_thirtyjin_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				thirtyjinPopup = $('#thirtyjin-popup');

            tbWindow.css({
                height: thirtyjinPopup.outerHeight(),
                width: thirtyjinPopup.outerWidth()+20,
                marginLeft: -(thirtyjinPopup.outerWidth()/2)
            });

			ajaxCont.css({
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: (tbWindow.outerHeight()-47),
				overflow: 'auto', // IMPORTANT
				overflowX: 'hidden', // IMPORTANT
				width: thirtyjinPopup.outerWidth()+20
			});
			
			$('#thirtyjin-popup').addClass('no_preview');
    	},
    	load: function()
    	{
    		var	thirtyjins = this,
    			popup = $('#thirtyjin-popup'),
    			form = $('#thirtyjin-sc-form', popup),
    			shortcode = $('#_thirtyjin_shortcode', form).text(),
    			popupType = $('#_thirtyjin_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		thirtyjins.resizeTB();
    		$(window).resize(function() { thirtyjins.resizeTB() });
    		
    		// initialise
    		thirtyjins.loadVals();
    		thirtyjins.children();
    		thirtyjins.cLoadVals();
    		
    		// update on children value change
    		$('.thirtyjin-cinput', form).live('change', function() {
    			thirtyjins.cLoadVals();
    		});
    		
    		// update on value change
    		$('.thirtyjin-input', form).change(function() {
    			thirtyjins.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.thirtyjin-insert', form).click(function() {    		 			
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_thirtyjin_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}
    
    // run
    $('#thirtyjin-popup').livequery( function() { thirtyjins.load(); } );
});