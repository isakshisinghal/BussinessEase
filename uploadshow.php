<div class="wrapper ">
    <div class="sidebar" data-color="orange">
     


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
                        Cid
                      </th>
                      <th>
                        File Name
                      </th>
                      
                    </thead>
                    <tbody>
                     <?php
                      $servername = "localhost";
                      $username = "root";
                      $password = "root";
                      $dbname = "testsql";
                      // Create connection
                      $conn = mysqli_connect($servername, $username, $password, $dbname);
                      // Check connection
                      if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                      }
                      $sql = "SELECT cid,file_name FROM fileupload";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {?>
                          <tr><?php
                          echo  "<td>".$row["cid"]."</td><td><img src='photo/$row[file_name]' alt='$row[file_name]' width='200' height='100''></td>";?></tr><?php
                        }
                      } 
                     ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>