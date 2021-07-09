<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Add Worker
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
</head>



<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
   
<?php include 'nav.php'?>

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Profile</h5>
                <?php
                  if(isset($_GET['s']))
                  {
                    ?> <span style="color:green"><?php echo "Worker Added Successfully";?></span><?php
                  }
                ?>

  <?php

if(isset($_POST["submit"]))
{
    include '../../Mycon.php';
    $connect = new Mycon("minor");
    $id=$_POST["id"];
            $firstname=$_POST["firstname"];
            $lastname=$_POST["lastname"];
            $city=$_POST["city"];
            $pin=$_POST["pin"];
            $address=$_POST["address"];
            $email=$_POST["email"];
            $about=$_POST["about"];
            $query = "insert into worker values($id,'$firstname','$lastname','$email','$city',$pin,'$address','$about')";
            //echo $query;
          // echo $connect->insert($query);
    if($connect->insert($query))
    {
     ?>
      <script>window.location="http://localhost:8888/myphp/minor/minor_inner/examples/user.php?s=1";  
      </script>
     <?php
       
    }
    else
    {
      echo "Error";
    }
}
?>    
           

              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled placeholder="Company" value="Business Ease">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>UserID</label>
                        <input type="text" class="form-control"  readonly value="<?php include '../../Mycon.php'; $con=new Mycon("minor"); $qu="Select id from worker"; echo $con->countTotal($qu)+1 ?>" name="id">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" required placeholder="Email" name="email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" required class="form-control" placeholder="First Name" name="firstname">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" required placeholder="Last Name" name="lastname">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" required placeholder="Home Address" name="address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" name="city" >
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" disabled value="India">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" required placeholder="ZIP Code" name="pin">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description(not more than 1000 words)" name="about"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 px-1">
                      <div class="space">
                        <input type="submit" name="submit"> </div>
                      </div>
                    </div>
                  </div>
                </form>
                
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/backgrounddd.jpeg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="../assets/img/bg5.jpeg" alt="...">
                    <h5 class="title">Sakshi Singhal</h5>
                  </a>
                  <p class="description">
                    @businessease
                  </p>
                </div>
                <p class="description text-center">
                  <i>If opportunity doesn't knock </i><br>
                  <i>build the door</i> <br>
                </p>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

   
    </div>
  </div>
<?php include'footer.php'?>


<style>
  

  .space
  {
    margin-left:315px;
  }
    
</style>
  