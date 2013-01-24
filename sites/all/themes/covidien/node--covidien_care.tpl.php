<?php if (isset($node->field_care_imgae['und'][0]['filename'])) { ?>
  <div><img style="float: left; margin: 0px 15px;" src="<?php echo "/sites/default/files/".$node->field_care_imgae['und'][0]['filename'];?>" /></div>
  <?php } ?>

  <?php print $node->body['und'][0]['value']; ?>