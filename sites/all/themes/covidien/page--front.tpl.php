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

  
<div class="home-content">  
    <div id="slideshow">
            <div class="slides">
                <ul>
                    <li id="slide-one">
                        <?php
          $block = module_invoke('nodeblock', 'block_view', '103');
          print render($block['content']); 
?>
<?php
          $block = module_invoke('views', 'block_view', 'covidien_stories-block_5');
          print render($block['content']); 
?>
                    </li>
                    <li id="slide-two">
                        
                        <?php
          $block = module_invoke('nodeblock', 'block_view', '104');
          print render($block['content']); 
?>
<?php
          $block = module_invoke('views', 'block_view', 'covidien_stories-block_6');
          print render($block['content']); 
?>
                    </li>
                    <li id="slide-three">
                        
                        <?php
          $block = module_invoke('nodeblock', 'block_view', '105');
          print render($block['content']); 
?>
<?php
          $block = module_invoke('views', 'block_view', 'covidien_stories-block_7');
          print render($block['content']); 
?>

                    </li>
                    <li id="slide-four">
                        
                        <?php
          $block = module_invoke('nodeblock', 'block_view', '106');
          print render($block['content']); 
?>
<?php
          $block = module_invoke('views', 'block_view', 'covidien_stories-block_8');
          print render($block['content']); 
?>
                    </li>
                </ul>
            </div>
            <ul class="slides-nav">
                <li id="tab1"><a href="#slide-one"><?php $node = node_load(103);
print $node->title; ?></a></li>
                <li id="tab2"><a href="#slide-two"><?php $node = node_load(104);
print $node->title; ?></a></li>
                <li id="tab3"><a href="#slide-three"><?php $node = node_load(105);
print $node->title; ?></a></li>
                <li id="tab4" class="active"><a href="#slide-four"><?php $node = node_load(106);
print $node->title; ?></a></li>
            </ul>
        </div>

 <?php echo render($page['banner_area']); ?>
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
          <?php print render($page['right_sidebar']); ?>  
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
