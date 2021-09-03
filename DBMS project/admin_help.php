<?php
$name = $_POST['inputname'];
$username = $_POST['inputusername'];
$password = $_POST['inputPassword5'];
$address = $_POST['inputAddress'];
$add_array = explode(',',$address);
$city =$_POST['inputCity'];
$state =$_POST['inputState'];
$pincode = $_POST['inputZip'];
$mobileno = $_POST['inputmobileno'];
$dob=$_POST['inputdob'];
$date=$_POST['inputdate'];
$salary=$_POST['inputsalary'];
$depart=$_POST['inputdept'];
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

$sql1 = "INSERT INTO employee (fname, account_no, emp_username, emp_doorno, emp_street, emp_pincode, emp_dob, salary, department, join_date)
VALUES ('$name', $accountno, '$username', '$add_array[0]', '$add_array[1]', $pincode, '$dob', $salary, '$depart', '$date')";
$sql2 = "INSERT INTO emp_address (emp_pincode, emp_city, emp_state)
VALUES ( $pincode, '$add_array[2]', '$state')";
$sql3 = "INSERT INTO emp_login ( emp_username, emp_password)
VALUES ( '$username', '$password')";
$sql4 = "INSERT INTO bank_details ( account_no, bankname, branch, bank_city, bank_state)
VALUES ($accountno, '$bankname', '$branch', '$bcity', '$bstate')";
$sql5 = "INSERT INTO emp_phone (emp_mobileno)
VALUES ('$mobileno')";
$sql6 = "INSERT INTO code (branch, IFSC_code, MICR_code)
VALUES ('$branch', '$ifsc', '$micr')";
$conn->query($sql2);
$conn->query($sql6);


if ($conn->query($sql1) == TRUE &&  $conn->query($sql3) == TRUE && $conn->query($sql4) == TRUE && $conn->query($sql5) == TRUE ) {
  echo "New record created successfully";
  header("Location: admin.html");
} else {
  echo $conn->connect_error;
}

$conn->close();


?>