<?php global $base_url, $theme_path; ?>
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
  <div id="home-content">
  <div class="homeBanner"><img src="<?php echo $base_url."/".$theme_path; ?>/images/home-banner.jpg" alt="" />
  <div class="leftslider">
  <h1>Are you innovative?</h1>
  <p>Lorem ipsum dolor sit amet, cotetur ad
iscing elit. Curabur cursus elit et mauris is volutpat vestibum. Nulla in laoreeaq</p>
  </div>
  <div class="slider">
  <div class="arrow"><a href="#"><img src="<?php echo $base_url."/".$theme_path; ?>/images/slider-arrow.png"></a></div>
  <div class="left">
  <div><img src="<?php echo $base_url."/".$theme_path; ?>/images/banner-slider-img.png"></div>
  <p>Covidien Stories: <span>"Why my disability 
is no barrier to my...</span></p>
</div>
  </div>
  
  <div class="bannerNav">
  <ul>
   <li class="caring"><a href="#">Are you caring?</a></li>
    <li class="global"><a href="#">Are you global?</a></li>
     <li class="innovative-active"><a href="#">Are you innovative?</a></li>
      <li class="covidien"><a href="#">Are you Covidien?</a></li>
  
  </ul>
  
  </div>
  </div>
  <div id="leftCol">
  <?php print $messages; ?>
  <div class="intro">
     <?php if ($page['home_about']): ?>        
          <?php print render($page['home_about']); ?>      
     <?php endif; ?>
    </div>
  <div class="location">
  <h2>Locations</h2>
   <?php if ($page['home_locations']): ?>        
          <?php print render($page['home_locations']); ?>      
     <?php endif; ?>
  
  </div>
  <div class="field">
  <h2>Covidien Cares</h2>
  <?php if ($page['home_cares']): ?>        
          <?php print render($page['home_cares']); ?>      
     <?php endif; ?>
   </div>
  </div>
  <div id="rightCol">
  <h1>Careers@Covidien</h1>
  <div>
  <select>
  <option>Select a job function</option>
  </select>
  </div>
  <h3>Latest Covidien Careers</h3>
  <ul>
  <li><a href="#">Software Development Engineer, Principal
Location: Boston, United States</a></li>
<li><a href="#">Software Development Engineer, Principal
Location: Boston, United States</a></li>
<li><a href="#">Software Development Engineer, Principal
Location: Boston, United States</a></li>
<li><a href="#">Software Development Engineer, Principal
Location: Boston, United States</a></li>
<li><a href="#">Software Development Engineer, Principal
Location: Boston, United States</a></li>
  </ul>
  <div class="clr"></div>
  <div class="btn"><a href="#">More Results</a></div>
    <div class="graybtn"><a href="#">Advanced Search</a></div>
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