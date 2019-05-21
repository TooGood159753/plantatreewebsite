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
		$_SESSION["messagealt"] = "Error Connecting To The Order Database."; //Error cnnecting to DB
		header('location:cart.php');
		exit;
	}
	else
	{
		
		
		$query = "INSERT INTO user(username,password,email) VALUES ('$uname','$pword','$email')";
		
		
		$result = mysqli_query($conn, $query);
		
		/*
		if($result)
		{
			
			$_SESSION["messagealt"] = "Your Order Had Been Placed, Go To Your Account Page To See Your Order History"; //Order Made/Added To Database
			header('location:cart.php');
			exit;
		}
		else
		{
			$_SESSION["messagealt"]"Failed To Place Your Order, Please Try Again Later"; //Failed To Input Order
			header('location:cart.php');
			exit;
		}
		*/
		
		
	}

?>