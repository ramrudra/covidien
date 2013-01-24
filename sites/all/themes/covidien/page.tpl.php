<?php 

// Theres need for only content page then we will use this config.
  if (isset($_GET['oc'])) {
     echo render($page['content']);
  } else {
?>


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

    
 <?php  if(isset($node) && ($node->type == "career_page" or $node->type == "culture_page" or $node->type == "about_us_page")) {  ?>
     
 <!-- Content and banner for career pages --> 

<div id="careers" class="careers">

<?php echo render($page['banner_area']); ?>

  <?php
if ($node->nid == "9"){
?>
  <?php
  $block = module_invoke('nodeblock', 'block_view', '113');
  print render($block['content']); 
?>
<?php   // Loads floating banners 
  $block = module_invoke('views', 'block_view', 'covidien_stories-block_2');
  print render($block['content']); ?>
 <?php } ?>
<!-- End career Page -->
<!-- career Page -->

<?php
if ($node->nid == "92"){
?>
  <?php
          $block = module_invoke('nodeblock', 'block_view', '114');
          print render($block['content']); 
?>
<?php
          $block = module_invoke('views', 'block_view', 'covidien_stories-block_3');
          print render($block['content']); 
?>  <?php
}
?>
<!-- End career Page -->
<!-- About Page -->

<?php
if ($node->nid == "93"){
?>


  <?php
          $block = module_invoke('nodeblock', 'block_view', '115');
          print render($block['content']); 
?> 
<?php
          $block = module_invoke('views', 'block_view', 'covidien_stories-block_4');
          print render($block['content']); 
?> <?php
}
?>
<!-- About Page -->
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
       
<?php echo render($page['right_sidebar']); ?>

  <div class="clr"></div>
 
  </div>
     
  <?php

  /// If job or search page

   }  elseif ((isset($node) && ($node->type == "job")) || (arg(1)=='search')) { 


    ?>
    
    <div id="job">
    <?php echo render($page['banner_area']); ?>

<div id="left-col">
 <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>   
       
    <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($tabs2); ?>
    <?php print $messages; ?>
      
  <?php print render($page['content']); ?>
</div>

  <div id="rightCol">
<?php echo render($page['right_sidebar']); ?>
  </div>
  <div class="clr"></div>
 
  </div>
    
   <?php } else { ?> 
  
  
  <div id="home-content">
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

<?php if((isset($node) && $node->type=='job') || (arg(0)=='location')) { ?>
<div id="rightCol">
     <?php echo render($page['right_sidebar']) ?>

  <?php
          $block = module_invoke('views', 'block_view', 'covidien_stories-block_1');
          print render($block['content']); 
?>

 </div>
<?php } ?>  
  <div class="clr"></div>
 </div>
  
   
 <?php } ?>

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
<?php } // Simple page content ends ?>
