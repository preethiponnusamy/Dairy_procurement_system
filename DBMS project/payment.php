<?php
$psid=$_GET['inputpsid'];
$am=$_GET['inputamt'];
$sn=$_GET['inputsn'];
$mid=$_GET['inputmi'];
$bd=$_GET['inputbd'];

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

$sql1 = "INSERT INTO bills (mem_id, ps_id, society_no, bdate, amount)
VALUES ($mid, $psid, $sn, '$bd', $am)";


if ($conn->query($sql1) == TRUE ) {
  echo "New record created successfully";
  ?>
  <script type="text/javascript">
   alert("payment successfull");
   window.location.href = "pay.html";
</script>
  <?php
} else {
  
}

$conn->close();


?>