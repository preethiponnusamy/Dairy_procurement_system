<?php
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
$dob=$_POST['inputdob'];
$accountno = $_POST['exampleInputaccountno'];
$bankname = $_POST['inputbk'];
$ifsc=$_POST['inputIFSC'];
$micr=$_POST['inputMICR'];
$branch=$_POST['branch'];
$bcity =$_POST['City'];
$bstate = $_POST['State'];
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

$sql1 = "INSERT INTO farmers (mem_name, account_no, mem_username, mem_doorno, mem_street, mem_pincode, mem_dob)
VALUES ('$name', $accountno, '$username', '$add_array[0]', '$add_array[1]', $pincode, '$dob')";
$sql2 = "INSERT INTO mem_address (mem_pincode, mem_city, mem_state)
VALUES ( $pincode, '$add_array[2]', '$state')";
$sql3 = "INSERT INTO mem_login ( mem_username, mem_password)
VALUES ( '$username', '$password')";
$sql4 = "INSERT INTO bank_details ( account_no, bankname, branch, bank_city, bank_state)
VALUES ($accountno, '$bankname', '$branch', '$bcity', '$bstate')";
$sql5 = "INSERT INTO mem_phone (mem_mobileno)
VALUES ('$mobileno')";
$sql6 = "INSERT INTO code (branch, IFSC_code, MICR_code)
VALUES ('$branch', '$ifsc', '$micr')";
$conn->query($sql2);
$conn->query($sql6);



if ($conn->query($sql1) == TRUE && $conn->query($sql3) == TRUE && $conn->query($sql4) == TRUE && $conn->query($sql5) == TRUE ) {
  echo "New record created successfully";
  header("Location: Farmer.php");
} else {
  
}

$conn->close();


?>