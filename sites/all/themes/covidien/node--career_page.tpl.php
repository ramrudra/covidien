
     <?php if (isset($node->field_video_id['und'][0]['value'])) { ?>
  <div><a href=<?php echo "http://player.vimeo.com/video/".$node->field_video_id['und'][0]['value']; ?> rel="shadowbox"><img src="<?php echo "/sites/default/files/".$node->field_video_thumbnail['und'][0]['filename'];?>"/></a></div>
<?php } ?>
      <?php print $node->body['und'][0]['value']; ?>
 
