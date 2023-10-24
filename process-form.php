<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rooms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,"3307");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$rollno = $_POST["rollno"];
$roomno = $_POST["roomno"];
$password = $_POST["password"];

// Check if room number already exists in database
$sql = "SELECT * FROM book WHERE roomno = '$roomno'";
$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  // Room is already booked
  echo  '<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-footer">
      <a href="form.html"><button type="button" class="btn btn-primary" >Sorry the room is already booked</button></a>
      </div>
      
    </div>
  </div>
</div>';
} else {
  // Room is available, so store details in the database
  $sql = "INSERT INTO book (rollno, roomno,password) VALUES ('$rollno', '$roomno','$password')";
  if ($conn->query($sql) === TRUE) {
    echo '<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-footer">
        <a href="form.html"><button type="button" class="btn btn-primary" >Booking successfull</button></a>
        </div>
        
      </div>
    </div>
  </div>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
