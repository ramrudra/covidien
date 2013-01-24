<?php global $base_url, $theme_path; ?>
<?php
?>

  <?php if (!$page): ?> 
   <?php if ($node->field_summary_image['und'][0]['filename']): ?>
     <a href="javascript:;" onclick="laodData('<?php echo $node->nid;?>');">
	 <img alt="" src="<?php echo $base_url;?>/sites/default/files/<?php echo $node->field_summary_image['und'][0]['filename'];?>">
	 </a>
   <?php endif; ?>
   <h4><a href="javascript:;" onclick="laodData('<?php echo $node->nid;?>');"><?php print $node->field_history_year['und'][0]['value'];?> </a></h4>
   <p> <?php echo substr(strip_tags( $node->body['und'][0]['value']) ,0,100); ?> 
  <?php endif; ?>
  
  
 <?php if ($page): ?>   
<div id="node-<?php print $node->nid; ?>">

  
  

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>

</div>
<?php endif; ?>