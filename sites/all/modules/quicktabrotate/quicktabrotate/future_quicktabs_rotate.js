

(function ($) {
Drupal.behaviors.covidien = {
attach: function(context, settings) {

// $Id$
/**
 * Rotate trough all our quicktabs, using 
 * jQuery functions to display them
 * Thanks to tje wonderful jQuery book Drupal 6 JavaScript and jQuery
 */

// Our namespace:
var QuicktabsRotate = QuicktabsRotate || {};

/** Initialize the Quicktabs rotation.
 * 
 */
QuicktabsRotate.init = function() {
	var tabs = $(".quicktabs-tabpage");
	var tabtitles = $("#quicktabs-banner_tabs li");
	//check how many tabs we have
	if (tabs.size() <= 2) {
		return;
	}
	QuicktabsRotate.counter = 0;
	QuicktabsRotate.tabs = tabs;
	QuicktabsRotate.tabtitles = tabtitles;
	setInterval(QuicktabsRotate.periodicRefresh, 17000);
};

/** 
 * Callback function to change show a new sticky.
 */
QuicktabsRotate.periodicRefresh = function() {
	var tabs = QuicktabsRotate.tabs;
	var tabtitles = QuicktabsRotate.tabtitles;
	var count =QuicktabsRotate.counter;
	var lastTab = tabs.size() -1;
	var newcount;
	
	if (count == lastTab) {
		newcount = QuicktabsRotate.counter = 0;
	} else {
		newcount = QuicktabsRotate.counter = count + 1;
	}
	//loop over all our quicktabs
	for (var i=0;i<=count;i++) {
		if(i != newcount) {
			tabtitles.eq(i).removeClass('active');
			//with more then 10 quicktabs, this can be a performance drain.
			//but we never know where the user clicked so we need to do this for confirmation...
			tabs.eq(i).hide();
		}
		tabs.eq(newcount).fadeIn('slow');
		tabtitles.eq(newcount).addClass('active');
	};
}

$(document).ready(QuicktabsRotate.init);
}

};
})(jQuery);    
