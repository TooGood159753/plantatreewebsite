<?php
	session_start();
	$message = "";

	$host = "us-cdbr-iron-east-02.cleardb.net";
	$user = "b74160f7bd6416";
	$pswd = "3ce40478";
	$dbnm = "heroku_26350cbea1b7381";
	
	$username = $_POST["uname"];
	$password = $_POST["pword"];
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
	//Write query get user database to begin check/
	$query = "SELECT * FROM user";
	
	if(!$conn)
	{
		echo "<p>Error Connecting to The User Database, Follow The Link Below To Return To The Login Page</p>";
		echo "<a href = 'index.php'>Login</a>";
	}
	else
	{
		echo "<p>Connection Successful</p>";
	
	
	$result = mysqli_query($conn, $query);

	if(!$result)
		{
			//auto redirects back to login page (index.php) update text for fail condition
			//header("location:index.php");
			echo "<p>No Results</p>";
		}
	else
		{
			echo "<p>Got Information</p>";
			if(mysqli_num_rows($result) > 0)
			{
				//while($row = mysqli_fetch_assoc($result)
				//{
					echo "<p>TEST</p>";
				//}
			}
		}
	}
	
?>