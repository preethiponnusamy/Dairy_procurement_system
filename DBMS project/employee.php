
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="home.css">
    
        <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
        <title>Employee details</title>
          
       
    </head>
   <body  style="background-image: url('https://cdn5.vectorstock.com/i/1000x1000/68/44/hands-raising-up-raised-colorful-arms-vector-19956844.jpg');">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Organic Milk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="homepage.html">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      
        
      
      </nav>
      <div>
        <h1 id ="result" style="text-align: center;"> Welcome to Organic Milk </h1>
        <h3 style="text-align: center;">EMPLOYEE</h3>
      </div>
      <div>
      <br>
      <br>
      <br>
      </div>
    <form method="POST" action="">
      <div class="form-row">
              <div class="form-group col-md-3">
                 <label for="inputid">EMP ID</label>
                  <input type="text" class="form-control" id="inputid" name="inputid" required>
                </div>
                <div class="form-group col-md-3">
                  <Button class="btn btn-primary" name='fec'  type='submit'>fetch</button>
                </div>
         </div> 
      </form>  
      <div class="form-row" id="disp">  
         <?php
         if(isset($_POST['fec'])){
          $id=$_POST['inputid'];
          $servername = "localhost";
          $dbusername = "root";
          $dbpassword = "";
          $dbname = "dairy_procurement_system";
          
          $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
          // Check connection
         if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
         }
        $sq1="SELECT * FROM employee where emp_id=$id";
        $results = $conn->query($sq1);
        $rows=mysqli_fetch_assoc($results);
        if ($results->num_rows > 0) ?> <?php{
        ?>
        <div class="form-group col-md-3">
          <label for="inputdept">department</label>
          <input type="text" class="form-control" id="inputdept" name="inputid" value='<?php echo $rows['department']?>'>
        </div>
        <div class="form-group col-md-3">
          <label for="inputsal">Salary</label>
          <input type="text" class="form-control" id="inputsal" name="inputsal" value='<?php echo $rows['salary']?>'>
        </div> 
        <div class="form-group col-md-3">
          <label for="inputdate">Joined Date</label>
          <input type="text" class="form-control" id="inputdate" name="inputdate" value='<?php echo $rows['join_date']?>'>
        </div>
        <?php } ?>   
        
      </div>
    </body>
</html>
