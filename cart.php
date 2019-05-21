<html>
<?php
	
	session_start();
	
	echo "<p>",$_SESSION["chosenstore"],"</p>";
	echo "<p>",$_SESSION["username"],"</p>";
	echo "<p>",$_SESSION["userid"],"</p>";
	echo "<p>",$_SESSION["item1"],"</p>";
	echo "<p>",$_SESSION["item2"],"</p>";
	echo "<p>",$_SESSION["item3"],"</p>";
	echo "<p>",$_SESSION["item4"],"</p>";
	
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$user = "b74160f7bd6416";
	$pswd = "3ce40478";
	$dbnm = "heroku_26350cbea1b7381";
	
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
	$query = "INSERT INTO purchases(storename,username,userid,item1,item2,item3,item4) VALUES (",$_SESSION["chosenstore"],",
																								",$_SESSION["username"],",
																								",$_SESSION["userid"],",
																								",$_SESSION["item1"],",
																								",$_SESSION["item2"],",
																								",$_SESSION["item3"],",
																								",$_SESSION["item4"],")";
	
?>
</html>