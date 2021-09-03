<?php
$name = $_GET['search'];
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

$sq1="SELECT * FROM society_address where society_city='$name'";
$results = $conn->query($sq1);
$rows=mysqli_fetch_assoc($results);
$s=(string)$rows['society_city'];

if ($results->num_rows > 0) {
  
  ?>
  <script type="text/javascript">
   alert("society exist in your place");
   window.location.href = "homepage.html";
</script>
  <?php
  
} else {
     ?>
  <script type="text/javascript">
   alert("society doesn't exist in your place");
   window.location.href = "homepage.html";
</script>
  <?php
}

$conn->close();


?>