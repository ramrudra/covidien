<?php global $base_url, $theme_path;  ?>
<script type="text/javascript">
	/*function showOlder(value) {
		if(value == 5) {
		} else {
			var previous = value - 5;
			var nextVal = value + 1;
			jQuery(".views-row-"+value).css("display","block");
			jQuery(".views-row-"+previous).css("display","none");
			jQuery("#older").html('<a href="javascript:;" onclick="showOlder('+nextVal+');">Older</a>');
			
			jQuery("#reccent").html('<a href="javascript:;" onclick="showRecent('+previous+');">More Recent</a>');
		}
		
		
	}*/

  function showOlder(value, clearTimer) {
  if (typeof clearTimer == "undefined") clearTimer = true;
  if(value == 5) {
  } else {
    if (jQuery('.view-history .views-row').length > value) {
   var previous = value - 5;
   var nextVal = value + 1;
   jQuery(".view-history .views-row-"+value).css("display","block");
   jQuery(".view-history .views-row-"+previous).css("display","none");
   jQuery(".view-history .views-row-"+ (previous+1)).find('a:first').click();
   jQuery("#older").html('<a href="javascript:;" onclick="showOlder('+nextVal+');">Older</a>');
   jQuery("#reccent").html('<a href="javascript:;" onclick="showRecent('+previous+');">More Recent</a>');
    }
    }
    if (clearTimer) {
     clearInterval(history_timer);
    }
 }

 
var history_counter = 4;
 var history_timer = null;
 history_timer = setInterval( function() {
   showOlder(history_counter, false);
   history_counter++;
   if (jQuery('.view-history .views-row').length == history_counter) {
    history_counter = 4;
    jQuery('.view-history .views-row').each( function(idx) {
     if (idx > history_counter) {
      jQuery(this).hide();
     } else {
      jQuery(this).show();
     }
    });
   }
  }, 9000);


  /*function showOlder(value) {
    if(value == 5) {
    } else {
      if (jQuery('.view-history .views-row').length > value) {
        var previous = value - 5;
        var nextVal = value + 1;
        jQuery(".view-history .views-row-"+value).css("display","block");
        jQuery(".view-history .views-row-"+previous).css("display","none");
        jQuery("#older").html('<a href="javascript:;" onclick="showOlder('+nextVal+');">Older</a>');
        
        jQuery("#reccent").html('<a href="javascript:;" onclick="showRecent('+previous+');">More Recent</a>');
    }
  }
	}*/

	function showRecent(value) {
		if(value == 0) {
		} else {
			var previous = value + 5;
			var nextVal = value - 1;
			
			jQuery(".view-history .views-row-"+value).css("display","block");
			jQuery(".view-history .views-row-"+previous).css("display","none");
			
			jQuery("#reccent").html('<a href="javascript:;" onclick="showRecent('+nextVal+');">More Recent</a>');
			jQuery("#older").html('<a href="javascript:;" onclick="showOlder('+previous+');">Older</a>');
      clearInterval(history_timer);
		}

		
		
		
	}
	function laodData(id) {
		
		jQuery.post("<?php echo $base_url;?>/history_detail",{Action:'load_data',id:id}, function(data){
			  jQuery('#rightCol').html(data);

			  
		});
	}

</script>

     
<div id="layout">
<div id="head">
    <div id="logo"><a href="<?php echo $base_url;?>"><img src="<?php print $logo ?>" alt="" /></a></div>
</div>
  <div id="header">

    <div class="top-bar">
     <ul>
      <li class="lang"><a href="#">Language</a>
       <ul>
        <li><a href="#">English</a></li>
        <li><a href="#">French</a></li>
       </ul>
      
      </li>
      
     </ul>
         </div>

     <div class="head-search">
        <input type="text" value="Covidien.com" />
        <input type="button" value="" class="btn" />
      </div>
<div id="mainNav">
   <?php if ($primary_nav): print $primary_nav; endif; ?>
<div class="clr"></div>
</div>    
  </div>
  
  <!-- Content and banner area -->
  

  
<div id="about-us">
   <?php echo render($page['banner_area']); ?>
  <div id="leftCol">
  <div class="leftNav">
  <h2>About us</h2>
<?php if ($page['aboutus_leftside']): ?>        
          <?php print render($page['aboutus_leftside']); ?>      
     <?php endif; ?>
  <!--<ul>
   <li class="active"><a href="#">History</a></li>
   <li><a href="#">Pharmaceuticals</a></li>
   <li><a href="#">Respiratory & Monitoring Solutions</a></li>
   <li><a href="#">Surgical Solutions</a></li>
   <li><a href="#">Vascular Therapies</a></li>
    <li><a href="#">News & Events<span></span></a></li>
  </ul>-->
  </div>
  <div class="clr"></div>
  <?php
          $block = module_invoke('views', 'block_view', 'widget_blocks-block_4');
          print render($block['content']); 
?>
  
  
  </div>
  <div id="midCol">
   <h2>Covidien History</h2>
   <div class="more" id="reccent">
  <a href="javascript:;" onclick="showRecent(0);">More recent</a>
   </div>
   <?php print render($page['content']); ?>
   
   <div class="older" id="older"><a href="javascript:;" onclick="showOlder(6);">Older</a></div>
   
  </div>
  <div id="rightCol">
  <?php if ($page['history_detail']): ?>        
          <?php print render($page['history_detail']); ?>      
     <?php endif; ?>
  
  
  </div>
  <div class="clr"></div>
 
  </div>

<div id="footer">
     <div class="footerNav">
	 <?php if ($page['footer_links']): ?>        
          <?php print render($page['footer_links']); ?>      
     <?php endif; ?>
	<div class="clr"></div>     
     </div>
     <div class="socail-share">     
     <?php if ($page['social_share']): ?>        
          <?php print render($page['social_share']); ?>      
     <?php endif; ?>
     </div>
  <div class="clr"></div>     
	 <?php if ($page['copyright']): ?>        
          <?php print render($page['copyright']); ?>      
     <?php endif; ?>	
     <div class="clr"></div>
</div>
</div>         

<script type="text/javascript">
jQuery(".view-history .views-row").eq(0).addClass("active");
</script>
          