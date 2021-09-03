<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dairy_procurement_system";
$memid=$_POST['inputmemid'];
$name1=$_POST['inputname1'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$s="SELECT account_no,mem_username,mem_pincode from farmers where mem_id=$memid";
$result = $conn->query($s);
$row=mysqli_fetch_assoc($result);
$s1=(int)$row['mem_pincode'];
$s2=(string)$row['mem_username'];
$s3=(int)$row['account_no'];
$sql1 = "DELETE FROM farmers where mem_id=$memid";
$sql2="DELETE FROM mem_phone where mem_id=$memid";
$sql3="DELETE FROM mem_login where mem_username='$s2'";
$sql5="DELETE from bank_details where account_no=$s1";
 

if ($conn->query($sql1) == TRUE && $conn->query($sql2) == TRUE && $conn->query($sql3) == TRUE && $conn->query($sql5) == TRUE ) {
  echo "Record deleted successfully";
  header("Location: admin.html");
} else {
   echo "wrong";
}

$conn->close();
?>
