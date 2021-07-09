
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Table List
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
     
<?php include'nav.php'?>

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Worker's List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-primary">
                      <th>
                        Worker ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th >
                        City
                      </th>
                    </thead>
                    <tbody>
                     <?php
                      $servername = "localhost";
                      $username = "root";
                      $password = "root";
                      $dbname = "minor";
                      // Create connection
                      $conn = mysqli_connect($servername, $username, $password, $dbname);
                      // Check connection
                      if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                      }
                      $sql = "SELECT firstname,lastname, email, city, id FROM worker";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {?>
                          <tr><?php
                          echo  "<td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td><td>".$row["email"]."</td><td>".$row["city"]."<td><form method='POST'><input type='hidden' name='email' value='".$row["email"]."' ><input type='submit' name='submit' value='delete'></form></td>"."</td>";?></tr><?php
                        }
                      } 
                     ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--<script>
             /*$(document).ready(function() {
              $('input').click(function()
              {
                $em=$(this).attr('id');

                
              })
             }); */
          </script>
-->

          <?php 
            if(isset($_POST["submit"]))
            {
              $id=$_POST["email"];
              $servername = "localhost";
              $username = "root";
              $password = "root";
              $dbname = "minor";
              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              // sql to delete a record
              $sql = "DELETE FROM worker WHERE email='$id'";
              //echo "Hello";
              if ($conn->query($sql) === TRUE) {
              echo "<script>window.location='tables.php'; </script>";}
             }
          ?>
          
<?php include'footer1.php'?>