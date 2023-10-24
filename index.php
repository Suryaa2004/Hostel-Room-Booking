<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<title>My Hostel Website</title>
<link rel="stylesheet" href="css/style.css">
		
</head>
<body>
	
	<nav>
		<nav class="navbar navbar-expand-lg navbar-dark">
			<a class="navbar-brand" href="#">REC</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">contact</a>
				</li>
				
				
				
			</ul>
			</div>
		</nav>
		
	</nav>
	<header>
		Welcome  <?php echo $user_data['user_name']; ?>
	</header>
	<div class="menu">
		<a href="book.html">Book the Room</a>
		<a href="query.html">Change the Room</a>
		<a href="delete.html">Vacate the Room</a>
	</div>
</body>
</html>

