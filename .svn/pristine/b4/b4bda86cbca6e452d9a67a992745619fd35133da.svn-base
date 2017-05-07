jQuery(document).ready(function(){ 

	function reloadLikes(who) {
		var text = jQuery("#" + who).text();
		var patt= /(\d)+/;
		
		var num = patt.exec(text);
		num[0]++;
		text = text.replace(patt,num[0]);
		if(num[0] == 1) {
			text = text.replace('people like','person likes');
		} else if(num[0] == 2) {
			text = text.replace('person likes','people like');
		} //elseif
		jQuery("#" + who).text(text);
	} //reloadLikes
	
	
	jQuery(".likeThis").click(function() {
		var classes = jQuery(this).attr("class");
		classes = classes.split(" ");
		
		if(classes[1] == "done") {
			return false;
		}
		var classes = jQuery(this).addClass("done");
		var id = jQuery(this).attr("id");
		id = id.split("like-");
		jQuery.ajax({
		  type: "POST",
		  url: "index.php",
		  data: "likepost=" + id[1],
		  success: reloadLikes("like-" + id[1])
		}); 
		
		
		return false;
	});

});