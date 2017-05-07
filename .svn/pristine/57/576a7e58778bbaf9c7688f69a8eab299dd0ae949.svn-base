(function ()
{
	
	
	// create thirtyjinShortcodes plugin
	tinymce.create("tinymce.plugins.thirtyjinShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("thirtyjinPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert ThirtyJin Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "thirtyjin_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('thirtyjin_button', {
                    title: "Insert ThirtyJin Shortcode",
					image: ZillaShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b)
				{	
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Tabs", "tabs" );
					a.addWithPopup( b, "Accordions", "accordions" );
					a.addWithPopup( b, "Toggle", "toggle" );
					a.addWithPopup( b, "Icon-Text", "icon-text" );
					a.addWithPopup( b, "Icon-span", "icon-span" );
					a.addWithPopup( b, "Checklist", "checklist" );
					a.addWithPopup( b, "Highlight", "highlight" );
					a.addWithPopup( b, "Divider", "divider" );
					a.addWithPopup( b, "Boxes", "box" );
					a.addWithPopup( b, "Tooltips", "tooltip" );
					a.addWithPopup( b, "Quote", "quote" );
					a.addWithPopup( b, "Dropcap", "dropcap" );
					a.addWithPopup( b, "image", "image" );
					a.addWithPopup( b, "messages", "messages" );
					a.addWithPopup( b, "recentportfolio", "recentportfolio" );
					a.addWithPopup( b, "gallery_slideshow", "gallery_slideshow" );
					a.addWithPopup( b, "clients", "clients" );
					
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("thirtyjinPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'ThirtyJin Shortcodes',
				author: 'Thirty Jin',
				authorurl: 'http://www.thirtyjin.com',
				infourl: 'http://www.thirtyjin.com',
				version: "1.0"
			}
		}
	});
	
	// add thirtyjinShortcodes plugin
	tinymce.PluginManager.add("thirtyjinShortcodes", tinymce.plugins.thirtyjinShortcodes);
})();