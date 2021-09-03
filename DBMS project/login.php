<?php
$username = $_POST['inputusername'];
$password = $_POST['inputPassword'];
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
$s="SELECT * FROM emp_login where emp_username='$username'";
$result = $conn->query($s);
$row=mysqli_fetch_assoc($result);
$s1=(string)$row['emp_password'];
$s2=(string)$row['emp_username'];
$sq="SELECT * FROM mem_login where mem_username='$username'";
$results = $conn->query($sq);
$rows=mysqli_fetch_assoc($results);
$s3=(string)$rows['mem_password'];
$s4=(string)$rows['mem_username'];
echo $s3;
if($result->num_rows > 0){
  $sql="SELECT department from employee where emp_username='$username'";
  $res = $conn->query($sql);
  $r=mysqli_fetch_assoc($res);
  $s5=(string)$r['department'];
      if ($username==$s2 && $password==$s1) {
        if ($s5=="admin"){
         header("Location: admin.html");
        } else {
          if ($s5=="route supervisor") {
            header("Location: route.html");
          } else {
            if ($s5=="payment supervisor") {
              header("Location: pay.html");
            } else {
              header("Location: employee.php");
            }
            
          }
          
        }
        
        
      } else {
        ?>
        <script type="text/javascript">
        alert("wrong username or password");
        window.location.href = "login_register.html";
        </script>
       <?php
      }
      
}
else{
    if($results->num_rows > 0){
        if ($username==$s4 && $password==$s3) {
            header("Location: Farmer.php");
        } else {
          ?>
          <script type="text/javascript">
          alert("wrong username or password");
          window.location.href = "login_register.html";
          </script>
         <?php
        }
        

    }
    else{
      ?>
      <script type="text/javascript">
      alert("wrong username or password");
      window.location.href = "login_register.html";
      </script>
     <?php
    }
}
$conn->close();
?>