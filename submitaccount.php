<?php
	session_start();
	
	$uname = $_POST["uname"];
	$pword = $_POST["pword"];
	$email = $_POST["email"];
	
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$user = "b74160f7bd6416";
	$pswd = "3ce40478";
	$dbnm = "heroku_26350cbea1b7381";
	
	if(isset($_SESSION["messagealt"]))
	{
		$_SESSION["messagealt"] = "  ";
	}
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
	
	if(!$conn)
	{
		$_SESSION["messagealt"] = "Error Connecting To The Database."; //Error connecting to DB
		header('location:cart.php');
		exit;
	}
	else
	{
		
		
		$query = "INSERT INTO user(username,password,email) VALUES ('$uname','$pword','$email')";
		
		
		$result = mysqli_query($conn, $query);
		
		
		if($result)
		{
			
			echo "<p>Created Your Account " + $uname + "</p>";
			echo "<a href = 'index.php'>Return To Login Page</a>";
		}
		else
		{
			echo "<p>Failed to Create Your Account</p> + ";
			echo "<a href = 'createaccount.php'>Return To Account Creation</a>";
		}
		
		
		
	}

?>