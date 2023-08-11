<?php 
$conn = mysqli_connect("localhost","root","","student");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = "";
$Name = "";
$Stud_ID = "";
$Course = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (!isset($_GET['id']))
    {
        header("Location:index.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM record WHERE id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    if (!$row)
    {
        header("Location:index.php");
        exit;
    }

    $name = $row["Name"];
    $Stud_ID = $row["Stud_ID"];
    $Course = $row["Course"];
}

else {
    $id = $_POST["id"];
    $name = $_POST["Name"];
    $Stud_ID = $_POST["Stud_ID"];
    $Course = $_POST["Course"];

    $sql = "UPDATE record SET name = '$name', Stud_ID = '$Stud_ID', Course = '$Course' WHERE id = '$id'";
    $result = $conn->query($sql);
    header("Location:index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
    <div class="form">
                <div>
                    <br>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label for="" class="label">Name <span style="color: red;">*</span></label><br>
                        <input type="text" placeholder="Enter your name" name="Name" id="Name" value="<?php echo $Name; ?>" class="input" required><br>
                        <label for="" class="label2">Stud_ID <span style="color: red;">*</span></label><br>
                        <input type="text" placeholder="Enter your student number" name="Stud_ID" id="Stud_ID" value="<?php echo $Stud_ID; ?>" class="input2" required><br>
                        <label for="" class="label3">Course <span style="color: red;">*</span></label><br>
                        <input type="text" placeholder="Enter your course" name="Course" id="Course" value="<?php echo $Course; ?>" class="input3" required><br>
                        <center><input type="submit" value="Submit" class="submit"></center><br>
                    </form>
                </div>
            </div>
    </center>
</body>
</html>