<?php
$id=$_POST['inputid'];
$name = $_POST['inputname'];
$username = $_POST['inputusername'];
$password = $_POST['inputPassword5'];
$cpassword = $_POST['inputPassword4'];
$address = $_POST['inputAddress'];
$add_array = explode(',',$address);
$city =$_POST['inputCity'];
$state =$_POST['inputState'];
$pincode = $_POST['inputZip'];
$mobileno = $_POST['inputmobileno'];
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
$s="SELECT mem_username from farmers where mem_id=$id";
$result = $conn->query($s);
$row=mysqli_fetch_assoc($result);
$s2=(string)$row['mem_username'];
$sql1 = "UPDATE farmers SET mem_name='$name',mem_username='$username', mem_doorno='$add_array[0]', mem_street='$add_array[1]' 
where mem_id=$id";
$sql3 = "UPDATE mem_login SET mem_username='$username', mem_password='$password' 
where mem_username='$s2'";

$sql5 = "UPDATE mem_phone set mem_mobileno = $mobileno where mem_id=$id";





if ($conn->query($sql1) == TRUE && $conn->query($sql3) == TRUE  && $conn->query($sql5) == TRUE ) {
  echo "New record created successfully";
  header("Location: Farmer.php");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


?>