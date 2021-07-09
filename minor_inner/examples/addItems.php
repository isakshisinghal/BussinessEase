<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Add Items
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
        <div class="row" style="width:100%">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Items</h5>
                <?php
                  if(isset($_GET['s']))
                  {
                    ?> <span style="color:green"><?php echo "Added Successfully";?></span><?php
                  }
                ?>
              </div> 
              <div class="card-body">
              <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Category</label>
                <input list="categoryy" class="form-control" name="cat" id="cat" required>
                <datalist id="categoryy">
                <?php 
                include '../../Mycon.php';
                $connect = new Mycon("minor");
                $query = "select * from category";
                $res=$connect->allinfo($query);
                if (mysqli_num_rows($res) > 0) {
                while($row =mysqli_fetch_assoc($res)) {
                  echo "<option value='$row[category]'> ";
                                    }
                } 
                ?>
                </datalist>
               
                
                <label>Item Name</label>
                <input type="text"  class="form-control" id="iname" name="iname" required>
                <label>Item Description</label>
                <div class="form-group">
                <textarea rows="3" cols="80" class="form-control" id="idesp" name="idesp" required placeholder="Add details of product" name="about"></textarea></div>
                <label>Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
                <label>Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
                <label>Upload Image</label>
                </div>
                <input type="file" name="upload" id="upload" required />
                <div class="form-group">
                <br><input type="submit" name="submit" class="space">
              </div>
              </form>
            </div>
          </div>
          </div>
          <div class="col-md-4">
    <div class="card card-user">
    <div class="image" style="height:230px" >
    <img src="../assets/img/OnlineShopping.jpg" alt="...">
    </div>
    <div class="card-body">
    <img src="../assets/img/shopping.jpg" alt="...">
    </div>
    </div>
    </div>
    </div>
  </div>
  
  <?php

if(isset($_POST["submit"]))
{
  
    global $connect;
    $cat=$_POST["cat"];
    $in=$_POST["iname"];
    $desp=$_POST["idesp"];
    $price=$_POST["price"];
    $brand=$_POST["brand"];
    $fname=$_FILES["upload"]["name"];
    move_uploaded_file($_FILES['upload']['tmp_name'],"items_images/$fname");
    $connect->check_insert("CALL check_insert('$cat','$in','$desp','$price','$brand','$fname')");
    
      ?>
      <script>window.location="http://localhost:8888/myphp/minor/minor_inner/examples/addItems.php?s=1";  
      </script>
     <?php
    
}
?>    
<?php include'footer.php'?>


<style>
.space
  {
    margin-left:315px;
  }
</style>