<?php
if (isset($_GET["id"]))
{
    $id = $_GET["id"];

    $conn = mysqli_connect("localhost","root","","student");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM record WHERE id='$id'";
    $conn->query($sql);
}
header("Location:index.php");
exit;
?>