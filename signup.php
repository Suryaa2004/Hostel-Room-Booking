<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo '<div class="modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-footer">
				  <button type="button" class="btn btn-primary">please enter valid information</button>
				</div>
			  </div>
			</div>
		  </div>';
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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

		background-color: #E5BA73;
		margin: auto;
		width: 300px;
		padding: 20px;
		margin-top: 90px;
	}
	.name{
		margin-left: 600px;;
	}
	body{
		background-image: url('images/pic1.avif');
	}
	h1{
	margin-top: 140px;
		color: #E5BA73;
	}
	h3{
		color: red;
	}
	 
	</style>
    
<h1> <center>HOSTEL MANAGEMENT SYSTEM </center></h1>

	<div id="box">
		
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			<label>Username</label>
             <input id="text" type="text" name="user_name"><br><br>
			 <label>Password</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button"  type="submit" value="Signup"><br><br>

			<h3> Existing user? <a href="login.php">Click to Login</a><br><br></h3>
		</form>
		
	
</body>
</html>