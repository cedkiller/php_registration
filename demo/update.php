<?php
$id = $_GET['id'];
$Name = $_POST['Name'];
$Stud_ID = $_POST['Stud_ID'];
$Course = $_POST['Course'];

// Create connection
$conn = new mysqli("localhost","root","","student");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE record SET Name='$Name', Stud_ID='$Stud_ID', Course='$Course' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>