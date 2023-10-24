<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo '<div class="modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-footer">
				  <button type="button" class="btn btn-primary">Invalid Username</button>
				</div>
			  </div>
			</div>
		  </div>';
		}else
		{
			echo  '<div class="modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			  
				<div class="modal-footer">
				  <button type="button" class="btn btn-primary">Invalid username</button>
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

		background-color: #F1D3B3;
		margin: auto;
		width: 300px;
		padding: 20px;
		margin-top: 90px;
	}
	.name{
		margin-left: 600px;;
	}
	body{
		background-image: url('images/pic4.jpg');
		background-size: 100%;
	}
	h1{
	margin-top: 140px;
		color: #FFDCA9;
	}
	h3{
		color: red;
	}
	 
	</style>
	<h1> <center>HOSTEL MANAGEMENT SYSTEM </center></h1>


	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
			
		   <label>Username</label>

			<input id="text" type="text" name="user_name"><br><br>
			<label>Password</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>
			<h3> New user? <a href="signup.php">Click to Signup</a><br><br></h3>
			<h3> Admin?Click here to continue <a href="admin.php" >Login </a>
		
			
		</form>
	</div>
	</div>
	
</body>
</html>