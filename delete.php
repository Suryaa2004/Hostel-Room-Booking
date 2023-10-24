<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'rooms',"3307");

// Check for errors
if (!$conn) {
  die('Error: ' . mysqli_connect_error());
}

// Get the ID value and password from the form submission
$rollno = $_POST['rollno'];
$password = $_POST['password'];

// Build the SQL query
$sql = "DELETE FROM book WHERE rollno = '$rollno' AND password = '$password'";

// Execute the query
if (mysqli_query($conn, $sql)) {
  // Check if the query affected any rows
  if (mysqli_affected_rows($conn) > 0) {
    echo '<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-footer">
      <a href="index.php"><button type="button" class="btn btn-primary" >Your Room has been vacated Successfully</button></a>
      </div>
      </div>
    </div>
    </div>';
  } else {
    echo '<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-footer">
      <a href="index.php"><button type="button" class="btn btn-primary" >invalid data</button></a>
      </div>
      </div>
    </div>
    </div>';
  }
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>