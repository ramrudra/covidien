


<div class="banner">
  <?php if (isset($node->field_story_video_id[LANGUAGE_NONE][0]['value'])) { ?>
  <div class="video-slider" style="backgroLANGUAGE_NONE: none;">
    <div><a href=<?php echo "http://player.vimeo.com/video/".$node->field_story_video_id[LANGUAGE_NONE][0]['value']; ?> rel="shadowbox"><img style=" margin-top: -25px;
    margin-left: -69px;
    background: whitesmoke;
    padding: 10px;" src="<?php echo "/sites/default/files/story-images/" . $node->field_story_video_thumbnail[LANGUAGE_NONE][0]['filename'];?>"/></a></div>
  
  </div>
 <?php }
else
  { ?>
 
  <div class="slider">
  <div class="arrow"><a><img src="/sites/all/themes/covidien/images/slider-arrow.png" /></a></div>

  <div class="left">
    <?php if (isset($node->field_story_image[LANGUAGE_NONE][0]['filename'])) { ?>
  <div><img style="width: 194px; height: 64px;" src="<?php echo "/sites/default/files/story-images/".$node->field_story_image[LANGUAGE_NONE][0]['filename'];?>" /></div>
  <?php } ?>
  <?php if (isset($node->field_trimmed_text[LANGUAGE_NONE][0]['value'])) { ?>
<p>Covidien Stories: <span><?php print $node->field_trimmed_text[LANGUAGE_NONE][0]['value']."...";?></span></p>
  <?php } ?>
</div>
  </div>
  <?php }
  ?>
  </div>
  <div class="overlay"></div>
    
    <div class="shosh">
        
            <div class="div_mid"><!-- Begin: div_mid -->
  
                
                  <div class="main_content">
                        
                      <div class="close"><img src="/sites/all/themes/covidien/images/cross_btn.png" width="80" height="26" onclick="exit();"/></div>
                      <div class="left_content"><!-- Begin: left_content -->
                        
                        <div class="arrow"><!-- Begin: arrow -->
                            
                                <img src="/sites/all/themes/covidien/images/arrow_left.png" width="18" height="35" alt="arrow" />
                            
                        </div><!-- End: arrow -->
                            
                        <div class="left_img"><!-- Begin: left_img -->
                            
                                <?php if (isset($node->field_story_image[LANGUAGE_NONE][0]['filename'])) { ?>
  <div><img src="<?php echo "/sites/default/files/story-images/".$node->field_story_image[LANGUAGE_NONE][0]['filename'];?>" /></div>
  <?php } ?>
  <?php if (isset($node->field_trimmed_text[LANGUAGE_NONE][0]['value'])) { ?>
                          <p>Covidien Stories: <span><?php print $node->field_trimmed_text[LANGUAGE_NONE][0]['value']."...";?></span></p>
                            <?php } ?>
                        </div><!-- End: left_img -->
                        
                      </div><!-- End: left_content -->
                        
                      <div class="right_content"><!-- Begin: right_content -->
                            
                        <h3><?php print $node->title; ?></h3>
                        <?php if (isset($node->body[LANGUAGE_NONE][0]['value'])) { ?>
                        <?php print $node->body[LANGUAGE_NONE][0]['value']; ?>
                        <?php } ?>
                      </div><!-- End: right_content -->
                      
                   </div>
                      
                
                
            </div><!-- End: div_mid -->

    </div>