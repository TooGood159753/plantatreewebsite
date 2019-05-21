<?php
	//PAGE COMPLETE DO NOT ADJUST UNLESS NEEDED
	session_start();
	
	$_SESSION = array();
	
	session_destroy();
	
	header('location:index.php');
	exit;
?>
