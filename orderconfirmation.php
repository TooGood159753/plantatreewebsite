
<?php
	session_start();
	
	
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$user = "b74160f7bd6416";
	$pswd = "3ce40478";
	$dbnm = "heroku_26350cbea1b7381";
	
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);

	$chosenstore = $_SESSION["chosenstore"];
	$username = $_SESSION["username"];
	$userid =$_SESSION["userid"];
	$price =$_POST["price"];
	$address =$_POST["address"];
	$payment= $_POST["payment"];
	
	$sql = "INSERT INTO purchase(storename,username,price,userid,address,payment)VALUES('$chosenstore','$username','$price','$userid','$address','$payment' )";
	if ($conn->query($sql) === TRUE) {
    echo "Order Successfully Placed! View the order in your profile.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
	
	
	
?>
<html>
<body bgcolor="#E6E6FA">


	<?php
		
		echo "<a href='profile.php'>View Purchase in Profile</a>";
		
		echo "<p>",$_SESSION["messagealt"],"</p>";
	?>
</body>
</html>	