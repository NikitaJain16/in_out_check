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
    <style>
        #myInput {
            background-position: 10px 12px;
            background-repeat: no-repeat;
            /* Do not repeat the icon image */
            width: 80vw;
            /* Full-width */
            font-size: 16px;
            /* Increase font-size */
            padding: 12px 20px 12px 40px;
            /* Add some padding */
            border: 1px solid #ddd;
            /* Add a grey border */
            margin-bottom: 12px;
            /* Add some space below the input */
        }
        
        #myTable {
            border-collapse: collapse;
            /* Collapse borders */
            width: 100%;
            /* Full-width */
            border: 1px solid #ddd;
            /* Add a grey border */
            font-size: 18px;
            /* Increase font-size */
        }
        
        #myTable th,
        #myTable td {
            text-align: left;
            /* Left-align text */
            padding: 12px;
            color: black;
            /* Add padding */
        }
        
        #myTable td {
            color: white;
        }
        
        #myTable tr {
            /* color: white; */
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid #ddd;
        }
        
        #myTable tr.header,
        #myTable tr:hover {
            /* Add a grey background color to the table header and on hover */
            background-color: #f1f1f19f;
            color: black;
        }
        .enquiry_heading {
            margin: 0px;
            height: 5vh;
            display: flex;
            /* flex-direction: row; */
            justify-content: space-around;
            align-items: center;
            background-color: grey;
        }
        .set{
            background-color: black !important;
            color: white !important;
        }
    </style>
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
    <div class="main_body" style="margin: 0px; height: max-content; display: block; padding: 0px; ">
        <a href="enquiry_html.php" style="color:white; display: inline-block; text-align: center; width: 49.5vw; padding-top: 1vh; padding-bottom: 1.2vh;">Current Data</a>
        <a href="enquiry_html2.php" style="background-color: rgba(181, 176, 176, 0.899); color: black; display: inline-block; text-align: center; width: 49.5vw; padding-top: 1vh; padding-bottom: 1.2vh;">General Data</a>
    </div>
    <!-- js code to implement search -->
    <script>
        function myFunction() {
            // Declare variables 
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            $rollno = input;
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <!-- body of file starts here  -->
    <?php
    include('enquiry.php');
    $query="SELECT `ROLLNO`,`OUT_TIME`,`PURPOSE`,`LOCATION`,`IN_TIME` FROM `practicum4`.`IN_OUT_TABLE`";
    $result = mysqli_query($con, $query);
    ?>
    <div class="main_body" style="margin-top:0px;">
        <div class="sect">
            <h1>Enquire using roll no.!</h1>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by roll no..">

            <table id="myTable">
                <tr class="header">
                    <th>Serial No.</th>
                    <th>Roll No</th>
                    <th>Out Time</th>
                    <th>Purpose</th>
                    <th>Location</th>
                    <th>In Time</th>
                </tr>
                <?php
                    if (mysqli_num_rows($result) > 0) {
                    $sn=1;
                    while($data = mysqli_fetch_assoc($result)) {
                    ?>
                <tr>
                    <td><?php echo $sn; ?></td>
                    <td><?php echo $data['ROLLNO']; ?></td>
                    <td><?php echo $data['OUT_TIME']; ?></td>
                    <td><?php echo $data['PURPOSE']; ?></td>
                    <td><?php echo $data['LOCATION']; ?></td>
                    <td><?php echo $data['IN_TIME']; ?></td>
                </tr>
                <?php
                     $sn++;}} else { ?>
                    <tr>
                    <td colspan="8">No data found</td>
                    </tr>
                <?php } ?>
            </table>
            
        </div>
       
    </div>
</body>

</html>