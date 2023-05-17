<?php

$server = "localhost";
$username = "root";
$password ="";

$con = mysqli_connect($server,$username,$password);
if(!$con){
    die("connection to this database failed due to ".mysqli_connect_error());
}
// echo "connected to db successfully";
// $query="SELECT `ROLLNO`,`OUT_TIME`,`PURPOSE`,`LOCATION`,`IN_TIME` FROM IN_OUT_TABLE";
// $result=mysqli_query($con,$query);
// $table="IN_OUT_TABLE";
// $columns=['ROLLNO','OUT_TIME','PURPOSE','LOCATION','IN_TIME'];
// $fetchData = fetch_data($db, $tableName, $columns);
// function fetch_data($db, $tableName, $columns){
//     if(empty($con)){
//      $msg= "Database connection error";
//     }elseif (empty($columns) || !is_array($columns)) {
//      $msg="Columns Name must be defined in an indexed array";
//     }elseif(empty($tableName)){
//       $msg= "Table Name is empty";
//    }else{
//    $columnName = implode(", ", $columns);
//    $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id DESC";
//    $result = $CON->query($query);
//    if($result== true){ 
//         if ($result->num_rows > 0) {
//         $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
//         $msg= $row;
//         } 
//         else{
//        $msg= "No Data Found"; 
//         }
//    }
//    else{
//      $msg= mysqli_error($db);
//    }
//    }
//    return $msg;
// }   
?>