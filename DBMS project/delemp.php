<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dairy_procurement_system";

$empid=$_POST['inputempid'];
$name2=$_POST['inputname2'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$s="SELECT account_no,emp_username,emp_pincode from employee where emp_id=$empid";
$result = $conn->query($s);
$row=mysqli_fetch_assoc($result);
$s1=(int)$row['emp_pincode'];
$s2=(string)$row['emp_username'];
$s3=(int)$row['account_no'];

$sql1 = "DELETE FROM employee where emp_id=$empid";
$sql3="DELETE FROM emp_login where emp_username='$s2'";
$sql4="DELETE FROM emp_phone where emp_id=$empid";
$sql5="DELETE from bank_details where account_no=$s3";



if ($conn->query($sql1) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE && $conn->query($sql5) === TRUE) {
  echo "Record deleted successfully";
  header("Location: admin.html");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
