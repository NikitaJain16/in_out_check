<?php
$insert=false;
if(isset($_POST['submit'])){
$server = "localhost";
$username = "root";
$password ="";

$con = mysqli_connect($server,$username,$password);
if(!$con){
    die("connection to this database failed due to ".mysqli_connect_error());
}
// echo "connected to db successfully";
$rollno=$_POST['rollno'];
$in_time=$_POST['in_time'];
$query="UPDATE `practicum4`.`IN_OUT_TABLE` set `IN_TIME`='$in_time' where `ROLLNO`=$rollno";
// ECHO $query;
if($con->query($query)==TRUE){
  // echo "Data Inserted Successfully!";
  $insert=true;
}
else{
  // echo "ERROR : $query <br> $con->error";
  $insert=false;
}
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Nikita's Project</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- navbar is here  -->
    <nav>
        <h2>IIITU</h2>
        <div>
            <a href="index.html">Home</a>
            
            <a href="enquiry.html">Enquiry</a>
            <a href="out_form.html">Out_Form</a>
            <a href="in_form.html">In_Form</a>
            <a href="contact_us.html">Contact Us</a>
        </div>
    </nav>
    <hr>
    <!-- body of file starts here  -->
    <div class="main_body">
        <form action="in_form.php" method="post">
        <?php
          if($insert){
            echo "<p id='submit_msg'>Data Entered Successfully!</p>";
          }
          else{
            echo "<p id='error_msg'>Data Insertion Aborted!</p>";
          }
            ?>
            <h1>Please fill before entering the campus...</h1>
            <div class="info-bar">
                <label for="rollno">Roll No. : </label>
                <input type="text" required="" name="rollno" id="rollno">
            </div>
            <div class="info-bar">
                <label for="in_time">In Time : </label>
                <input type="datetime-local" name="in_time" id="in_time" required="">
            </div>
            <div class="info-bar">
                <input type="submit" name="submit" value="Submit" class="form_btn">
            </div>
        </form>
    </div>
</body>

</html>