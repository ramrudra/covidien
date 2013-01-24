
<?php if (!$teaser) { ?>

<?php $back = l(t('Back to Search page'),'location/search', array('attributes' => array('class' => array('back'))));
 // $back2 = l(t('Back to Search Result'),'location/search',  array('attributes' => array('class' => array('link'))));

 ?>

<div id="job_page">
	<p><?php echo $back ?></p>
	<div class="heading"><?php echo t('Job Title'); ?>: <span><?php print $title;?><span></span></span></div>
	<div class="job_details">
	<?php echo render($content['field_job_id']); ?>
	<?php echo render($content['field_location_full_name']); ?>
	</div>
	<?php if(isset($content['body'])) { ?>
	<div class="job_desc"><h2><?php echo t('Job Description'); ?></h2></div>
  <?php echo render($content['body']) ?>
	<?php } ?>
	<div id="career-page-bar">
        <div class="email-job-desc"><a href="#" class="link"><?php echo t('Email Job Description'); ?></a> | <?php echo $back ?></div>
      <div align="right"><span class="buttons"><a href="<?php echo $content['field_job_link']['#items'][0]['url']; ?>" class="link"><?php echo t('Apply'); ?></a></span></div></div>
     <div style="clear:both"></div>
</div> 
<?php } ?>