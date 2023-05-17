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
$out_time=$_POST['out_time'];
$purpose=$_POST['purpose'];  
$location=$_POST['location'];
$query="INSERT INTO `practicum4`.`IN_OUT_TABLE`(`ROLLNO`,`OUT_TIME`,`PURPOSE`,`LOCATION`) values ('$rollno','$out_time','$purpose','$location')";
// ECHO $query;
if($con->query($query)==TRUE){
    // echo "suc";
  // echo "Data Inserted Successfully!";
  $insert=true;
}
else{
    // echo "fuc";
//   echo "ERROR : $query <br> $con->error";
  $insert=false;
}
$con->close();
// echo "end";
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
     <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
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

         <!-- out time form  -->
         <form method="POST" action="out_submit.php">
           <?php
           if($insert){
             echo "<p id='submit_msg'>Data Entered Successfully!</p>";
           }
           else{
             echo "<p id='error_msg'>Data Insertion Aborted!</p>";
           }
             ?>
             <h1>Please fill before leaving the campus...</h1>
             <div class="info-bar">
                 <label for="rollno">Roll No. : </label>
                 <input type="text" required="" name="rollno" id="rollno">
             </div>
             <div class="info-bar">
                 <label for="out_time">Out Time : </label>
                 <input type="datetime-local" name="out_time" id="out_time" required="">
             </div>
             <div class="info-bar">
                 <label for="purpose">Purpose : </label>
                 <input type="text" name="purpose" id="purpose" required="">
             </div>
             <div class="info-bar">
                 <label for="location">Location: </label>
                 <input type="text" name="location" id="location">
             </div>
             <div class="info-bar">
             <input type="submit" value="Submit" name="submit" class="form_btn">
             </div>
         </form>
     </div>
 </body>
 </html