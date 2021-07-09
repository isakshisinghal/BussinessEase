   <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a  class="simple-text logo-mini">
          @SS
        </a>
        <a  class="simple-text logo-normal">
          Business Ease
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          
            <a href="./dashboard.php">
            <li class="<?php $link=$_SERVER['REQUEST_URI'];if ($link=="/myphp/minor/minor_inner/examples/dashboard.php") {echo "active"; } else  {echo "noactive";}?>">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
            <a href="./icons.php">
            <li class="<?php $link=$_SERVER['REQUEST_URI'];if ($link=="/myphp/minor/minor_inner/examples/icons.php") {echo "active"; } else  {echo "noactive";}?>">
              <i class="now-ui-icons education_atom"></i>
              <p>Icons</p>
            </a>
          </li>
 
            <a href="./map.php">
            <li class="<?php $link=$_SERVER['REQUEST_URI'];if ($link=="/myphp/minor/minor_inner/examples/map.php") {echo "active"; } else  {echo "noactive";}?>">
              <i class="now-ui-icons location_map-big"></i>
              <p>Maps</p>
            </a>
          </li>

          <a href="./addItems.php">
            <li class="<?php $link=$_SERVER['REQUEST_URI'];if ($link=="/myphp/minor/minor_inner/examples/addItems.php") {echo "active"; } else  {echo "noactive";}?>">
            <i class="now-ui-icons shopping_cart-simple"></i>
              <p>Add Items</p>
            </a>
          </li>
          <a href="./item_show.php">
            <li class="<?php $link=$_SERVER['REQUEST_URI'];if ($link=="/myphp/minor/minor_inner/examples/item_show.php") {echo "active"; } else  {echo "noactive";}?>">
              <i class="now-ui-icons education_paper"></i>
              <p>Item Details</p>
            </a>
          </li>
          
            
          
            <a href="./user.php">
            <li class="<?php $link=$_SERVER['REQUEST_URI'];if ($link=="/myphp/minor/minor_inner/examples/user.php") {echo "active"; } else  {echo "noactive";}?>">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
        
            <a href="./tables.php">
            <li class="<?php $link=$_SERVER['REQUEST_URI'];if ($link=="/myphp/minor/minor_inner/examples/tables.php") {echo "active"; } else  {echo "noactive";}?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Table List</p>
            </a>
          </li>
          
            
          
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Created By Sakshi Singhal</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            
          </div>
        </div>
      </nav>
      <!-- End Navbar -->