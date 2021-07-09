
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Item Details
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
                <h4 class="card-title">Item Details</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-primary">
                      <th>
                        S.No
                      </th>
                      <th>
                        Item 
                      </th>
                      <th>
                        Item Name
                      </th>
                      <th>
                        Item Description
                      </th>
                      <th >
                        Price
                      </th>
                    </thead>
                    <tbody>
                    <?php 
                    include '../../Mycon.php';
                    $connect = new Mycon("minor");
                    $query = "select * from items";
                    $res=$connect->allinfo($query);
                    if (mysqli_num_rows($res) > 0) {
                    while($row =mysqli_fetch_assoc($res)) {
                    ?>
                    <tr><?php
                    echo  "<td>".$row["cid"]."</td><td><img height='150' width='110' src='items_images/".$row["file_name"]."'/></td><td>".$row["item_name"]."</td><td>".$row["item_description"]."</td><td>".$row["price"]."<td><form method='POST'><input type='hidden' name='cid' value='".$row["cid"]."' ><input type='hidden' name='del' value='".$row["item_name"]."' ><input type='hidden' name='imgn' value='".$row["file_name"]."' ><input type='submit' name='update' formaction='update_item.php' value='UPDATE'><input type='submit' name='submit' value='DELETE'></form></td></td>";?></tr><?php
                    }
                } 
                ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <?php 
            if(isset($_POST["submit"]))
            {
              $inam=$_POST["del"];
              $imgn=$_POST["imgn"];
              global $connect;
              // sql to delete a record
              $sql = "DELETE FROM items WHERE item_name='$inam'";
              if ($connect->insert($sql) )
              {
                unlink("items_images/$imgn");
                echo "<script>window.location='item_show.php'; </script>";
              }
            }
            if(isset($_POST["update"]))
            {
              
              echo "<script>window.location='update_item.php'; </script>";
            }
          ?>
          
<?php include'footer1.php'?>