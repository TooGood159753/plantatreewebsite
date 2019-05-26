
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
<head>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body bgcolor="#E6E6FA">


	<?php
		
		echo "<a href='profile.php'>View Purchase in Profile</a>";
		
		echo "<p>",$_SESSION["messagealt"],"</p>";
	?>
</body>
</html>	