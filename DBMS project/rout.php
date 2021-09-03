<?php
$rsid = $_POST['inputrsid'];
$sn = $_POST['inputsn'];
$vn1= $_POST['inputvn'];
$p1 = $_POST['inputp1'];
$p2 =$_POST['inputp2'];
$p3 =$_POST['inputp3'];
$p4 = $_POST['inputp4'];
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "dairy_procurement_system";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql1 = "INSERT INTO routes (rs_id, society_no, vehicle_no)
VALUES ('$rsid', $sn, '$vn1')";
$sql2 = "INSERT INTO route_details (vehicle_no, place1, place2, place3, place4)
VALUES ('$vn1', '$p1', '$p2', '$p3', '$p4')";



if ($conn->query($sql1) == TRUE && $conn->query($sql2) == TRUE) {
  echo "New record created successfully";
  header("Location: route.html");
} else {
  
}

$conn->close();


?>