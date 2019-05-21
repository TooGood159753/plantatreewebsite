<?php
	//addtocart
	$treecode = $_POST["buyingtree"];
	$gardencode = $_POST["buyinggarden"];
	
	$_SESSION["chosenstore"] = $_POST["storepass"];
	
	if(!empty($treecode))
	{
		if(!isset($_SESSION["item1"]))
		{
		$_SESSION["item1"] += $treecode;
		}
		else if(!isset($_SESSION["item2"]))
		{
		$_SESSION["item2"] += $treecode;
		}
		else if(!isset($_SESSION["item3"]))
		{
		$_SESSION["item3"] += $treecode;
		}
		else if(!isset($_SESSION["item4"]))
		{
		$_SESSION["item4"] += $treecode;
		}
	}
	if(!empty($gardencode))
	{
		if(!isset($_SESSION["item1"]))
		{
		$_SESSION["item1"] += $gardencode;
		}
		else if(!isset($_SESSION["item2"]))
		{
		$_SESSION["item2"] += $gardencode;
		}
		else if(!isset($_SESSION["item3"]))
		{
		$_SESSION["item3"] += $gardencode;
		}
		else if(!isset($_SESSION["item4"]))
		{
		$_SESSION["item4"] += $gardencode;
		}
	}
	
	header('location:store.php');
	exit;
?>