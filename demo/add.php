<?php
// add database data

$Name = $_POST['Name'];
$Stud_ID = $_POST['Stud_ID'];
$Course = $_POST['Course'];

// Create connection
$conn = mysqli_connect("localhost","root","","student");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO record (Name, Stud_ID, Course)
VALUES ('$Name', '$Stud_ID', '$Course')";

if (mysqli_query($conn, $sql)) {
  header("Location:index.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
