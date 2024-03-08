<?php
echo '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="nav-side-menu">
    <div class="brand"><?php echo $_SESSION["admin_fullname"]; ?></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed ">
                  <a href="add_laundry.php"><i class="fa fa-plus" aria-hidden="true"></i> add/remove </a>
                </li>
               
                <li data-toggle="collapse" data-target="#new-1" class="collapsed">
                <a href="#"><i class="fa fa-cart-arrow-down" style="font-size:20px"></i> Orders <span class="arrow"></span></a>
              </li>
              <ul class="sub-menu collapse" id="new-1">
                <li><a href="order.php">Today  </a></li>
                <li><a href="allorder.php">All</a></li>
              </ul>

          </ul>
               

                <li>
                <a href="users.php">
                <i class="fa fa-user fa-lg"></i>Users
                </a>
                </li>


                

                 <li data-toggle="collapse" data-target="#new-4" class="collapsed">
                  <a href="#"><i class="fa fa-credit-card" style="font-size:18px"></i> Payment Status <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new-4">
                  <li><a href="todaypayment.php">Today  </a></li>
                  <li><a href="paymentstatus.php">All</a></li>
                </ul>

            </ul>
     </div>
</div>';
?>