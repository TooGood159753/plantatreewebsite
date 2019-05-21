<?php
	
	session_start();
	
	echo "<p>",$_SESSION["userid"],"</p>";
	echo "<p>",$_SESSION["chosenstore"],"</p>";
	echo "<p>",$_SESSION["item1"],"</p>";
	echo "<p>",$_SESSION["item2"],"</p>";
	echo "<p>",$_SESSION["item3"],"</p>";
	echo "<p>",$_SESSION["item4"],"</p>";
	
?>