<?php 
//echo "Umar".$_POST['id'];

$my_node = node_load($_POST['id']);
?>

<h2> <?php echo $my_node->title; ?> </h2>


 <?php echo $my_node->body['und'][0]['value']; ?>

