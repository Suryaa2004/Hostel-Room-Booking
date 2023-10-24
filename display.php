<!DOCTYPE html>
<html>
<head>
	<title>Displaying database column in HTML table</title>
</head>
<style>
	h1{
		color: white;
	}
		
		table {
			margin: auto;
			border-collapse: collapse;
			width: 80%;
			max-width: 800px;
			font-family: Arial, sans-serif;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
			color: red;
		}
		tr{
			color: white;
		}
		tr:hover {
			background-color: red;
		}
		#set{
			background-color: black;
			margin: auto;
		width: 300px;
		padding: 20px;
		margin-top: 90px;
		}
		body{
			background-image: url('images/image1.jpg');
			background-size: 100%;
		}
	</style>
<body>
	<h1>Booking details of Hostel Rooms</h1>
	<table>
		<tr>
			<th>Roll Number </th>
			<th>Room number</th>
		</tr>
		<?php
			// Connect to database
			$conn = mysqli_connect("localhost", "root", "", "rooms","3307");

			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			// Query database to retrieve column data
			$sql = "SELECT  rollno,roomno FROM book";
			$result = mysqli_query($conn, $sql);

			// Display data in HTML table
			if (mysqli_num_rows($result) > 0) {
			    while($row = mysqli_fetch_assoc($result)) {
			        echo "<tr><td>" . $row["roomno"] . "</td> <td>" . $row["rollno"] . "</td></tr>";
			    }
			} else {
			    echo "0 results";
			}

			mysqli_close($conn);
		?>
	</table>
	<a href="admin.php"><button>Go Back</button></a>
</body>
</html>
