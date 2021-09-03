<?php

$vn2 = $_POST['inputvn2'];
$rn = $_POST['inputrs'];
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


$s="SELECT vehicle_no from routes where route_no=$rn";
$result = $conn->query($s);
$row=mysqli_fetch_assoc($result);
$s2=(string)$row['vehicle_no'];


$sql1 = "DELETE FROM routes where route_no=$rn";
$sql3="DELETE FROM route_details where vehicle_no='$s2'";



if ($conn->query($sql1) == TRUE && $conn->query($sql3) == TRUE) {
  echo "New record created successfully";
  header("Location: route.html");
} else {
  
}

$conn->close();


?>