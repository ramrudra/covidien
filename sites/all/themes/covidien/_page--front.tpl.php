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

  <?php
          $block = module_invoke('quicktabs', 'block_view', 'banner_tabs');
          print render($block['content']); 
?>


  <div class="home-content">
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