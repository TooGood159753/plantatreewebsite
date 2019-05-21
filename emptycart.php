<?php
	session_start();
	
	$_SESSION["chosenstore"] = "";
	$_SESSION["item1"] = "";
	$_SESSION["item2"] = "";
	$_SESSION["item3"] = "";
	$_SESSION["item4"] = "";
	
	header('location:main.php');
	exit;
?>