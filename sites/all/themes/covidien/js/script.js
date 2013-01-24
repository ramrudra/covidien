(function ($) {
Drupal.behaviors.covidien = {
attach: function(context, settings) {
$(document).ready(function(){
    
//popup script
    jQuery(".slider").click(function(){
        jQuery(".main_content").animate({right:"120px"});
        });
      jQuery(".left_content").click(function(){
        jQuery(".main_content").animate({right:"-720px"});  
        }); //toggle

    $(".slider, .left_content").click(function(){
  $("#overlay, #shosh").toggle();
});

    $(".close img").click(function(){
  $("#overlay, #shosh").css("display","none");
  jQuery(".main_content").animate({right:"-720px"}); 

});
//popup script


//Locations Popups
//popup script - 1
    jQuery(".views-row-1 .slider").click(function(){
        jQuery(".views-row-1 .main_content").animate({right:"120px"});
        });
      jQuery(".views-row-1 .left_content").click(function(){
        jQuery(".views-row-1 .main_content").animate({right:"-720px"});  
        }); //toggle

    $(".views-row-1 .slider, .views-row-1 .left_content").click(function(){
  $(".views-row-1 .overlay, .views-row-1 .shosh").toggle();
});

    $(".views-row-1 .close img").click(function(){
  $(".views-row-1 .overlay, .views-row-1 .shosh").css("display","none");
  jQuery(".views-row-1 .main_content").animate({right:"-720px"}); 

});
//End popup script - 1

//popup script - 2
    jQuery(".views-row-2 .slider").click(function(){
        jQuery(".views-row-2 .main_content").animate({right:"120px"});
        });
      jQuery(".views-row-2 .left_content").click(function(){
        jQuery(".views-row-2 .main_content").animate({right:"-720px"});  
        }); //toggle

    $(".views-row-2 .slider, .views-row-2 .left_content").click(function(){
  $(".views-row-2 .overlay, .views-row-2 .shosh").toggle();
});

    $(".views-row-2 .close img").click(function(){
  $(".views-row-2 .overlay, .views-row-2 .shosh").css("display","none");
  jQuery(".views-row-2 .main_content").animate({right:"-720px"}); 

});
//End popup script - 2

//popup script - 3
    jQuery(".views-row-3 .slider").click(function(){
        jQuery(".views-row-3 .main_content").animate({right:"120px"});
        });
      jQuery(".views-row-3 .left_content").click(function(){
        jQuery(".views-row-3 .main_content").animate({right:"-720px"});  
        }); //toggle

    $(".views-row-3 .slider, .views-row-3 .left_content").click(function(){
  $(".views-row-3 .overlay, .views-row-3 .shosh").toggle();
});

    $(".views-row-3 .close img").click(function(){
  $(".views-row-3 .overlay, .views-row-3 .shosh").css("display","none");
  jQuery(".views-row-3 .main_content").animate({right:"-720px"}); 

});
//End popup script - 3

//End Locations Popup

//Classes to li quick-tabs

$slideshow = {
    context: false,
    tabs: false,
    timeout: 6000,      // time before next slide appears (in ms)
    slideSpeed: 1000,   // time it takes to slide in each slide (in ms)
    tabSpeed: 300,      // time it takes to slide in each slide (in ms) when clicking through tabs
    startingSlide: 3,
    //fx: 'scrollLeft',   // the slide effect to use
    init: function() {
        // set the context to help speed up selectors/improve performance
        this.context = $('#slideshow');
        // set tabs to current hard coded navigation items
        this.tabs = $('ul.slides-nav li', this.context);
        // remove hard coded navigation items from DOM
        // because they aren't hooked up to jQuery cycle
        this.tabs.remove();
        // prepare slideshow and jQuery cycle tabs
        this.prepareSlideshow();
    },
    prepareSlideshow: function() {
        // initialise the jquery cycle plugin -
        // for information on the options set below go to:
        // http://malsup.com/jquery/cycle/options.html
        $("div.slides > ul", $slideshow.context).cycle({
            fx: $slideshow.fx,
            timeout: $slideshow.timeout,
            speed: $slideshow.slideSpeed,
            fastOnEvent: $slideshow.tabSpeed,
            pager: $("ul.slides-nav", $slideshow.context),
            pagerAnchorBuilder: $slideshow.prepareTabs,
            before: $slideshow.activateTab,
            startingSlide: 3,
            pauseOnPagerHover: true,
            pause: true
        });
    },
    prepareTabs: function(i, slide) {
        // return markup from hardcoded tabs for use as jQuery cycle tabs
        // (attaches necessary jQuery cycle events to tabs)
        return $slideshow.tabs.eq(i);
    },
    activateTab: function(currentSlide, nextSlide) {
        // get the active tab
        var activeTab = $('a[href="#' + nextSlide.id + '"]', $slideshow.context);
        // if there is an active tab
        if(activeTab.length) {
            // remove active styling from all other tabs
            $slideshow.tabs.removeClass('active');
            // add active styling to active button
            activeTab.parent().addClass('active');
        }
    }
};
$(function() {
    // initialise the slideshow when the DOM is ready
    $slideshow.init();
});

//Active Class to li//

$('.historyBox ul li').click(function() {
    $('.historyBox ul li').removeClass('active');
    $(this).addClass('active');
});

//End active class li//

//popup script - home
if (jQuery('#slideshow')) {
    jQuery('#layout').append("<div id='fixPopup'></div>");
    jQuery(".views-row-1 .slider").click(function(){
        jQuery('#fixPopup').html("");
        jQuery('#fixPopup').html( jQuery(this).parentsUntil(".views-row-1").parent().clone() );
        jQuery(this).parentsUntil(".views-row-1").parent().hide();
        jQuery('#fixPopup .main_content').css({right:"-720px"});
        jQuery('#fixPopup .main_content').animate({right:"120px"});
    });

    jQuery("#fixPopup").delegate(".left_content", "click", function(){
        jQuery(".views-row-1").show();
        jQuery('#fixPopup .main_content').animate({right:"-720px"}, function() { 
            jQuery('#fixPopup').html("");
            $(".views-row-1 .overlay, .views-row-1 .shosh").hide();
        });
    }); //toggle

    jQuery("#fixPopup").delegate(".views-row-1 .close img", "click", function(){
        jQuery(".views-row-1").show();
        jQuery('#fixPopup .main_content').animate({right:"-720px"}, function() { 
            jQuery('#fixPopup').html(""); 
            $(".views-row-1 .overlay, .views-row-1 .shosh").hide();
        });
    });
}
//End popup script - home

 //Changes by Kaido
// Advanced search searchboxes
$("#edit-jf option").click(function() {
$('#edit-jf1 option:nth-child(1)').attr('selected','selected');
});


$("#edit-jf1").click(function() {
  $('#edit-jf option:selected').removeAttr('selected');
});


// Advanced search
$('#openadv').click(function() {
$('#advancedbox').toggle('', function() {
    // Animation complete.
  });
});
  }); //document.ready
}
};
})(jQuery);    





