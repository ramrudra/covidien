
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
  
  <!-- Content and banner area -->
  
<?php 
      if(!isset($node)) { ?>
	  
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
  <div id="innerpage_leftcol">
	  	  <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>	 
	  <?php if ($title): ?>
		<h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
	  <?php endif; ?>	 
	  <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
	  <?php print render($tabs2); ?>
	  <?php print $messages; ?>
	    
	<?php print render($page['content']); ?>
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
	  
 <?php 	} else {  
	   if($node->type == "career_page" or $node->type == "culture_page" or $node->type == "about_us_page") {  ?>
	   
 <!-- Content and banner for career pages -->	
    
<div id="careers" class="careers">
  <div class="banner"><img style="margin-bottom:-3px" src="<?php echo $base_url."/".$theme_path; ?>/images/banner-img.png" alt="" />
  
  <div class="slider">
  <div class="arrow"><a href="#"><img src="<?php echo $base_url."/".$theme_path; ?>/images/slider-arrow.png" /></a></div>
  <div class="left">
  <div><img src="<?php echo $base_url."/".$theme_path; ?>/images/banner-slider-img.png" /></div>
  <p>Covidien Stories: <span>"Why my disability 
is no barrier to my...</span></p>
</div>
  </div>
  </div>
  <div id="leftCol">
  <?php if($node->type == "career_page")
      echo "<h2>Careers</h2>";
	   elseif($node->type == "culture_page")
        echo "<h2>Covidien Culture</h2>";
		elseif($node->type == "about_us_page")
		{
        echo "<h2>About Us</h2>"; 
	   print render($page['aboutus_leftside']);  
		}
		?>
		
	 <?php if ($page['career_leftside']): ?>        
          <?php print render($page['career_leftside']); ?>      
     <?php endif; ?>
  
    
  <!--<ul>
   <li class="active"><a href="#">Job Functions</a>
   <ul>
   <li class="active"><a href="#">Communication</a></li>
   <li><a href="#">Customer Operations</a></li>
   <li><a href="#">Engineering</a></li>
   <li><a href="#">Environmental Health & Safety</a></li>
   <li><a href="#">Finance</a></li>
   <li><a href="#">Human Resources</a></li>
   <li><a href="#">Information Services</a></li>
   <li><a href="#">Legal</a></li>
   <li><a href="#">Manufacturing</a></li>
   <li><a href="#">Marketing</a></li>
   <li><a href="#">Medical & Clinical Affairs</a></li>
   <li><a href="#">Operational Excellence</a></li>
   <li><a href="#">Project Management</a></li>
   <li><a href="#">Procurement/Logistics</a></li>
   <li><a href="#">Quality</a></li>
   <li><a href="#">Regulatory Affairs</a></li>
   <li><a href="#">Research & Development</a></li>
   <li><a href="#">Sales</a></li>
   <li><a href="#">Strategy & Business</a></li>
      <li><a href="#">Development & Licencing</a></li>

   </ul>
  </li>
  </ul>-->
  
  
  </div>
  <div id="midCol">
      <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
	  <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
	  <?php print render($tabs2); ?>
	  <?php print $messages; ?>	 
	  <?php if ($title): ?> <h2><?php print $title; ?></h2><?php endif; ?>
  <?php print render($page['content']); ?>
   
  </div>
  <div id="rightCol">
  <div class="box">
  <h2>Careers@Covidien</h2>
  <div>
  <select>
  <option>Select a job function</option>
  </select>
  <p>There are 943 openings globally.</p>
  </div>  
  <div class="clr"></div>
  <div class="btn"><a href="#">Search</a></div>
    <div class="graybtn"><a href="#">Advanced Search</a></div>
  <div class="clr"></div>
  </div>
 
 <div class="location">
  <h2>Locations</h2>
  <p>A truly global company</p>
    <div class="btn"><a href="#">Start Exploring</a></div>
 </div>
  </div>
  <div class="clr"></div>
 
  </div>
	   
	<?php } elseif($node->type == "job") { 
	
	  ?>
	  <div id="job">
<div id="left-col">
 <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>	 
	  	 
	  <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
	  <?php print render($tabs2); ?>
	  <?php print $messages; ?>
	    
	<?php print render($page['content']); ?>
</div>

  <div id="rightCol">
<h2>Alert me to careers</h2>
<ul>
<li><select><option>Job Function</option></select></li>
<li><select><option>Country</option></select></li>
<li><select><option>City</option></select></li>
<li><input type="text" value="Enter your Email address" /></li>
<li><span>Agree to <a href="#">Terms and Conditions</a></span><input type="checkbox" /></li>
<li><input type="submit" value="Submit" /></li>

</ul>
  </div>
  <div class="clr"></div>
 
  </div>
	  
	  
	  
	 <?php } else { ?> 
  
  
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
  <div id="innerpage_leftcol">
	 
	  <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
	 
	  <?php if ($title): ?>
		<h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
	  <?php endif; ?>
	 
	  <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
	  <?php print render($tabs2); ?>
	  <?php print $messages; ?>
	 	  
	<?php print render($page['content']); ?>
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
  
   
 <?php } }?>

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
          