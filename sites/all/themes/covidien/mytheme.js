( function($) {
jQuery(document).ready(function () { 

//	alert("hello first");
	jQuery("#mydivid").click(function () {
	var myvariable=$("#mydivid a").attr("href");
	var nmyvar=myvariable.split("/");
	var nodeid=nmyvar[1];
	alert(nmyvar[1]);
	
	
	$.ajax({
                type: "POST",
                data: ({
                n : nodeid}),
                url: "http://educationpalace.com/covidien/artist_second",
                success: function(data) {
                     $(".guest_popup").html(data);
            
          }
         
		  
        });
	
	
	
	return false;
	});

}); 
})( jQuery );