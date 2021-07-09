<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Update Items
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
                <h5 class="title">Update Item Details</h5>
              </div> 
              <div class="card-body">
              <form method="post" enctype="multipart/form-data">
              <div class="form-group">

              
              <?php 
                include '../../Mycon.php';
                $cid=$_REQUEST['cid'];
                $get=$_REQUEST['del'];
                $connect = new Mycon("minor");
                $cat;
                $sql1="select category from category where cid='$cid'"; 
                $res=$connect->allinfo($sql1);
                if (mysqli_num_rows($res) > 0) {
                while($row =mysqli_fetch_assoc($res)) {
                  global $cat;
                  $cat=$row["category"];
                  }
                }
                $sql2="select * from items where item_name='$get'";
                $itemname;
                $itemdesp;
                $itemprice;
                $brand;
                $img;
                $res1=$connect->allinfo($sql2);
                if (mysqli_num_rows($res1) > 0) {
                while($row =mysqli_fetch_assoc($res1)) {
                  global $itemname;
                  $itemname=$row["item_name"];
                  global $itemdesp;
                  $itemdesp=$row["item_description"];
                  global $itemprice;
                  $itemprice=$row["price"];
                  global $brand;
                  $brand=$row["company_name"];
                  global $upimg;
                  $img=$row["file_name"];
                  }
                }


              ?>


                <label>Category</label>
                <input type="text" class="form-control" disabled value="<?php global $cat;echo $cat; ?>">
                <label>Item Name</label>
                <input type="text"  class="form-control" id="iname" disabled name="iname" value="<?php global $itemname;echo $itemname; ?>" >
                <label>Item Description</label>
                <div class="form-group">
                <textarea rows="3" cols="80" class="form-control" id="idesp" name="idesp" ><?php global $itemdesp;echo $itemdesp; ?></textarea></div>
                <label>Price</label>
                <input type="text" class="form-control" id="iprice" name="iprice" value="<?php global $itemprice;echo $itemprice; ?>">
                <label>Brand</label>
                <input type="text" class="form-control" id="ibrand" name="ibrand" value="<?php global $brand;echo $brand; ?>" >
                <label>Upload Image</label>
                </div>
                <input type="file" name="upload" id="upload" />
                <div class="form-group">
                <br><input type="submit" name="submit" class="space">
              </div>
              </form>
            </div>
          </div>
          </div>
          <div class="col-md-4">
    <div class="card card-user">
    <div class="image" style="height:400px" >
    <img src="items_images/<?php global $img;echo $img;?>" alt="image">
    </div>
    </div>
    </div>
    </div>
  </div>
  
  <?php

if(isset($_POST["submit"]))
{
      global $img;
      $fname=$img;
      if ($_FILES['upload']['size'] == 0 )
      {
        $des=$_POST["idesp"];
        $pri=$_post["iprice"];
        $bra=$_post["ibrand"];
        global $itemname;
        global $connect;
        global $fname;
        $query1="update items set item_description='$des',price='$pri',comapny_name='$bra',file_name='$fname' where item_name='$itemname'";
        $connect->insert($query1);

      }
      else
      {
        global $itemname;
        global $fname;
        global $img;
        $des=$_POST["idesp"];
        $pri=$_post["iprice"];
        $bra=$_post["ibrand"];
        $query2="update items set item_description='$des',price='$pri',comapny_name='$bra',file_name='$fname' where item_name='$itemname'";
        $fname=$_FILES["upload"]["name"];
        if($img!="")
        {
          unlink("items_images/$img");
        }
        move_uploaded_file($_FILES['upload']['tmp_name'],"items_images/$fname");
        global $connect;
        $connect->insert($query2);
      }
      ?>
      <script>window.location="http://localhost:8888/myphp/minor/minor_inner/examples/item_show.php";  
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