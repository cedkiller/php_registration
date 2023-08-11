<?php

$conn = mysqli_connect("localhost","root","","student");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "select * from record";
$result = mysqli_query($conn,$query);

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
    <br><br>
    <h1 style="text-align: center; font-size: 25px;">Student Registration</h1>
    <br>
    <div class="div">
        <div class="div2">
            <br><br><br><br><br><br><br><br><br>
            <div class="form">
                <div>
                    <br>
                    <form action="add.php" method="POST">
                        <label for="" class="label">Name <span style="color: red;">*</span></label><br>
                        <input type="text" placeholder="Enter your name" name="Name" id="Name" class="input" required><br>
                        <label for="" class="label2">Stud_ID <span style="color: red;">*</span></label><br>
                        <input type="text" placeholder="Enter your student number" name="Stud_ID" id="Stud_ID" class="input2" required><br>
                        <label for="" class="label3">Course <span style="color: red;">*</span></label><br>
                        <input type="text" placeholder="Enter your course" name="Course" id="Course" class="input3" required><br>
                        <center><input type="submit" value="Submit" class="submit"></center><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="div2">
            <br><br><br><br><br><br><br><br><br>
            <center>
                <table class="table">
                    <tr style="background: black;">
                        <th style="color: aliceblue;">Name</th>
                        <th style="color: aliceblue;">Stud_ID</th>
                        <th style="color: aliceblue;">Course</th>
                        <th style="color: aliceblue;">Edit</th>
                        <th style="color: aliceblue;">Delete</th>
                    </tr>
                    <tr>
                        <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                         ?>
                         <td><?php echo $row['Name']; ?></td>
                         <td><?php echo $row['Stud_ID']; ?></td>
                         <td><?php echo $row['Course']; ?></td>
                         <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="ed">Edit</a></td>
                         <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="del">Delete</a></td>

                    </tr>
                         <?php
                        }

                        ?>
                </table>
            </center>
        </div>
    </div>
</body>
</html>