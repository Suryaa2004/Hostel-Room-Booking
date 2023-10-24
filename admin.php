<?php 

session_start();

	include("connections.php");
	//include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from admin where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						//$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: new.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: black;
		margin: auto;
		width: 300px;
		padding: 20px;
		margin-top: 90px;
	}
	.name{
		margin-left: 600px;;
	}
	body{
		background-image: url('images/pic.jpg');
		background-size: 100%;
	}
	h1{
	margin-top: 140px;
		color: black;
	}
	h3{
		color: red;
	}
	label{
		color: white;
	}
	 
	</style>
	<h1> <center>HOSTEL MANAGEMENT SYSTEM </center></h1>


	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
			
		   <label>Username</label>

			<input id="text" type="text" name="username"><br><br>
			<label>Password</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>
			
			
		</form>
	</div>
	</div>
	
</body>
</html>