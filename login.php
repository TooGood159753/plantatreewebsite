<?php
	session_start();
	
	if (!isset ($_SESSION["username"])) 
	{ 
		$_SESSION["username"] = ""; 
	}
	if (!isset ($_SESSION["password"])) 
	{ 
		$_SESSION["password"] = ""; 
	}


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
		$_SESSION["message"] = "Error Connecting to The User Database, Follow The Link Below To Return To The Login Page";
		//header("location:index.php");
		header("location:main.php");
	}
	else
	{
		//$_SESSION["message"] = "Connection Successful";
	
	
	$result = mysqli_query($conn, $query);

	if(!$result)
		{
			//auto redirects back to login page (index.php) update text for fail condition
			//header("location:index.php");
			$_SESSION["message"] = "No Results";
			header("location:index.php");
		}
	else
		{
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					if($row["username"] == $username && $row["password"] == $password)
					{
						$_SESSION["message"] = "User Located</p>";
						$_SESSION["username"] = $row["username"];
						$_SESSION["userid"] = $row["userid"];
						header("location:main.php");
					}
					else
					{
						$_SESSION["message"] = "Not in the System, Signup Now!";
						header("location:index.php");
					}
				}
			}
		}
	}
	
?>