<?php global $base_url, $theme_path; ?>
<?php
?>

  <?php if (!$page): ?>   
   <img alt="" src="<?php echo $base_url."/".$theme_path; ?>/images/pic1.jpg">
   
   <h4><?php print $title;?></h4>
   <p>Maecenas porttitor congue massa. Fusce posduere, magna sed pulvinar ultricies.</p>  
  <?php endif; ?>
  
  
 <?php if ($page): ?>   
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>

<script src="<?php print $theme_path;?>/js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php print $theme_path;?>/css/jquery-ui.css"></link>
<script type="text/javascript" src="http://j.maxmind.com/app/geoip.js"></script>

    <script>
var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();

var places = [];
var popup_content = [];
var address = [];
var address_position = 0;
listajax();

var timeout = 600;
function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(52.40, -3.61);
    var myOptions = {
      zoom: 2,
      center: latlng,
      mapTypeId: 'roadmap'
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    addMarker(address_position);
}

function addMarker(position)
{
    geocoder.geocode({'address': address[position]}, function(results, status)
    {
        if (status == google.maps.GeocoderStatus.OK) {
            places[position] = results[0].geometry.location;

			var image = new google.maps.MarkerImage('<?php echo $base_url; ?>/sites/all/themes/covidien/images/orange.png',
				// This marker is 20 pixels wide by 32 pixels tall.
				new google.maps.Size(20, 32),
				// The origin for this image is 0,0.
				new google.maps.Point(0,0),
				// The anchor for this image is the base of the flagpole at 0,32.
				new google.maps.Point(0, 32));

			var marker = new google.maps.Marker({
                position: places[position],
                map: map,
				icon: image
            });
			
            google.maps.event.addListener(marker, 'click', function() {
                if (!infowindow) {
                    infowindow = new google.maps.InfoWindow();
                }
				var load_content = "covidien/location/details/" + popup_content[position] + '?simplycontent';
				var link1 = "<a href='#' class='link'>"+popup_content[position]+"</a>";
//				Shadowbox.open({ content: Drupal.settings.basePath +"covidien/location/details/"+popup_content[position], type: "iframe", player: "iframe", title: "", height: 700, width: 1000 });
                infowindow.setContent(link1);
                infowindow.open(map, marker);
                jQuery('.link').click(function() {
				$('#search-location-result').load( load_content );
				$('#innerpage_leftcol .content').hide();
        $('#search-location-result').show();
		});
            });
        }
        else
        {
            if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT)
            {
                setTimeout(function() { addMarker(position); }, (timeout * 3));
            }
        }
        address_position++;
        if (address_position < address.length)
        {
            setTimeout(function() { addMarker(address_position); }, (timeout));
        }
    });
}

function getDetails(lat,lon,title) {
	jQuery('#lat').val(lat);
	jQuery('#lon').val(lon);
	jQuery('#title').val(title);
	jQuery("form#search_frm").submit();
}

	function listajax() {
			jQuery.ajax({ 
			type: 'POST', 
			url: Drupal.settings.basePath + 'covidien/location/details', 
			data: { 'name' : ''}, 
			success: function(data) { 
				if(data != '0') { address = data.split(','); popup_content=address; initialize(); }
			} 
		});
	}
	
		function getSelectValue() {
			 var val = jQuery('#jobfamily').val();
				document.search_frm.action = Drupal.settings.basePath + 'covidien/location/search/title/'+val;
				jQuery("form#search_frm").submit();
		}
		
		function getextValue() {
			 var val = jQuery('#jobloc').val();
				document.search_frm.action = Drupal.settings.basePath + 'covidien/location/search/country/'+val;
				jQuery("form#search_frm").submit();
		}
		function getlocation() {
			var lat = geoip_latitude(); 
			var lon = geoip_longitude();
			var latlng = new google.maps.LatLng(lat, lon);
			map.setZoom(4);
			map.setCenter(latlng);
		}
jQuery(function() {
		
var availableTags = <?php print getLocationCity();?>;
jQuery( "#jobloc" ).autocomplete({
            
source: availableTags
        
});
    
});
    </script>
<div id="node-<?php print $node->nid; ?>">

  
  

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
     // print render($content);
    ?>
	<div align="right" style="margin:10px; margin-top:-20px;"><a href="#" style="padding:5px; border:1px solid #DDD;color:#003878" onclick="getlocation()">Covidien Near You</a> <a href="#" style="padding:5px; border:1px solid #DDD;background-color:#003878; color:#fff">Global View</a></div>
	<div class="job_search">
	<form id="search_frm" name="search_frm" action="<?php print $base_url; ?>/covidien/location/search" method="post">
	<span><input type="text" id="jobloc" name="jobloc" /> <input type="button" id="search" name="search" value="Submit" class="submit_btn" onclick="getextValue()" /></span>
	<select name="jobfamily" id="jobfamily" onchange="getSelectValue()">
	<option value="">Select a job function</option>
	<? 	$jobs = getAllJobs();
		foreach($jobs as $job) { ?>
		<option value="<?php print $job;?>"><?php print $job;?></option>
	<?php } ?>
	</select>
	<input type="hidden" name="title" id="title" value="" />
</form>
</div>
<div id="map_canvas" style="width: 100%; height:500px; margin:50px 0px; clear:both"></div>
  </div>
<div id="search-location-result"></div>
<div class="show"><a href="#" class="link">show</a></div>
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</div>
<script>
  $('div.show').click(function() {
    $('#innerpage_leftcol .content').show();
    $('#search-location-result').hide();
  });
	initialize();
</script>
<?php endif; ?>
