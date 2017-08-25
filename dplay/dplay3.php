<?php 
	header('Content-Type:application/force-download');
	header('Location:'.$_GET['url']);
?>