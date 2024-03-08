<?php 
 session_start();
if(isset($_SESSION['username'])==null)
{
    echo "<script>alert('You have to login first');document.location.href='login.php';</script>";
}
else{
	$uname = $_SESSION['username'];
	$uid = $_SESSION['id'];
}
?>
<?php include 'conn.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Clean House-contact page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white pr-3" href="">FAQs</a>
                        <span class="text-white">|</span>
                        <a class="text-white px-3" href="contact.php">Help</a>
                        <span class="text-white">|</span>
                        <a class="text-white pl-3" href="">Support</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-white pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="mycart.php" class="fa fa-shopping-cart" style="font-size:20px; color:white; margin-left:25px;" padding="100px"></a>
                         <a href="profile.php">
                            <i class='far fa-id-badge' style='font-size:25px; color: white;margin-left: 30px;'></i>
                             </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-secondary"><span class="text-primary">Clean</span>House</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link ">Home</a>
                        <a href="about.php" class="nav-item nav-link">About </a>
                        <a href="service.php" class="nav-item nav-link">Services</a>
                        <a href="pricing.php" class="nav-item nav-link">Price List</a>
                        <a href="#why" class="nav-item nav-link">Why Us ?</a>
                        <a href="contact.php" class="nav-item nav-link">Contact Us</a> 
                        <?php 
                        if(!(isset($_SESSION["logedin"]))){     
                      echo  '<a href="login.php" class="nav-item nav-link">Log-in</a>';
                        }else{
                            echo '<a href="logout.php" class="nav-item nav-link">Log-Out</a>';
                        }
                     ?>  
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-5 pb-2 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Profile</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="index.php">Home</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white disabled" href="profile.php">Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container" style="max-width: 900px;">
            <div class="row">
              <?php
                    $sql = "SELECT * FROM users WHERE id='$uid'";
                    $result = $conn->query($sql);
                   
                    
                    if ($result->num_rows > 0) {
                    // output data of each row
                  
                    while($row = $result->fetch_assoc()) 
                    {   
            		 echo   '<div class="col-12">
                    <div class="contact-form"><h1>Your Profile</h1>
                        <div id="success"></div>
                        <form  id="contactForm"  method="post" >
                            <div class="control-group"><h4>Your Name</h4>
                                <input type="text" class="form-control" id="name" name="name" value="'. $row["name"]  .'" required="required"  />
                                <p class="help-block text-danger"></p>
                            </div>
                             <div class="control-group"><h4>Your Username</h4>
                                <input type="text" class="form-control" id="name" name="username" value="'. $row["username"]  .'	" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group"><h4>Your Email</h4>
                                <input type="text" class="form-control" id="name" name="email" value="'. $row["email"]  .'	" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group"><h4>Your Phone</h4>
                                <input type="text" class="form-control" id="name" name="phone" value="'. $row["phone_no"]  .'" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                             <div class="control-group"><h4>Your Address</h4>
                                <input type="text" class="form-control" id="name" name="address" value="'. $row["address"]  .'" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                             <div class="control-group"><h4>Your Area Pincode</h4>
                                <input type="text" class="form-control" id="name" name="pincode" value="'. $row["pincode"]  .'" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                           
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit"  name="submit">Update Profile</button>
                               <a href="modules/removeuser.php?uid='.$row['id'].'" class="btn btn-primary py-3 px-5">Delete Profile</a>
                            </div>
                            </form>';
                            $action = isset($_POST['submit']);
                             if($action != null){
                             	$action = $_POST['submit'];
                             	$name = $_POST['name'];
                             	$username = $_POST['username'];
                             	$email = $_POST['email'];
                             	$phone = $_POST['phone'];
                             	$address = $_POST['address'];
                             	$pincode = $_POST['pincode'];

                             	$sqlin = "UPDATE `users` SET `name`='$name',`username`='$username',`email`='$email',`phone_no`='$phone',`address`='$address',`pincode`='$pincode' WHERE id='$uid'";
                             	if($conn->query($sqlin)==true)
			      				 {
					      		 echo "<script>alert('your record is updated successfull');document.location.href='profile.php';</script>";
			      			 	}
			      			 	else
			      			 	{
					      		 echo "<script>alert('your detail is not updated');</script>";
			      			 } 
                             } 

                          

                           
               	echo     '</div>
                </div>';
                      }
                   
                    } 
                  

                ?>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <!-- Todays order Start -->
    <div class="sidebar_cont">
   
   <div style="width:100%; min-height:100vh; padding:20px">
       <div class="table_view">
           <h2>Your Today Orders</h2>
           <table class="table">
           <thead>
               <tr>
               
              
               <th scope="col">username</th>
               <th scope="col">email</th>
               <th scope="col">phone_no</th>
               <th scope="col">address</th>
               <th scope="col">total</th>
               <th scope="col">status</th>
               <th scope="col">pdf</th>
               <th scope="col">Date & Time </th>
               <th scope="col">Action</th>
               </tr>
           </thead>
           <tbody>
               <?php 
              	$date = date("Y-m-d");
                  $queryss="SELECT * FROM `order` WHERE username='$uname' AND datetime >= now() - INTERVAL 1 DAY;";
                //$queryss="SELECT * FROM `order`  WHERE username='$uname'";
                
                $query_runsss=mysqli_query($conn,$queryss);
                echo $conn->error;
               
               if ($query_runsss->num_rows > 0) {
                 // output data of each row
                 while($row = $query_runsss->fetch_assoc()) {  
                   echo '<tr>
                   
                   <td>'.$row["username"].'</td>
                   <td>'.$row["email"].'</td>
                   <td>'.$row["phone"].'</td>
                   <td>'.$row["address"].'</td>
                   <td>'.$row["total"].'</td>
                   <td>'.$row["status"].'</td>
                   <td>'.$row["pdf"].'</td>
                   <td>'.$row["datetime"].'</td>
             <td> <a href="modules/removeorder.php?oid='.$row['order_id'].'">Cancel Order</a></td>

                   
                   </tr>';
                 }
               }
               else{
                   echo "No Orders are found";
               }
               ?>
               
           </tbody>
           </table>
       </div>
       </div>
       </div> </div>
    <!-- Todays order End -->
    <!-- Orders Start -->
    <div class="sidebar_cont">
   
    <div style="width:100%; min-height:100vh; padding:20px">
        <div class="table_view">
            <h2>Your Privious Orders</h2>
            <table class="table">
            <thead>
                <tr>
                
               
                <th scope="col">username</th>
                <th scope="col">email</th>
                <th scope="col">phone_no</th>
                <th scope="col">address</th>
                <th scope="col">total</th>
                <th scope="col">status</th>
                <th scope="col">pdf</th>
                <th scope="col">Date & Time </th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
               //	 $date = date("Y-m-d");
                //  $queryss="SELECT datetime FROM order WHERE datetime order by date($date)";
                 $queryss="SELECT * FROM `order`  WHERE username='$uname'";
                 
                 $query_runsss=mysqli_query($conn,$queryss);
                 echo $conn->error;
                
                if ($query_runsss->num_rows > 0) {
                  // output data of each row
                  while($row = $query_runsss->fetch_assoc()) {  
                    echo '<tr>
                    <th scope="row">'.$row["order_id"].'
                    <td>'.$row["username"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["phone"].'</td>
                    <td>'.$row["address"].'</td>
                    <td>'.$row["total"].'</td>
                    <td>'.$row["status"].'</td>
                    <td>'.$row["pdf"].'</td>
                    <td>'.$row["datetime"].'</td>

                    
                    </tr>';
                  }
                }
                else{
                	echo "No Orders are found";
                }
                ?>
                
            </tbody>
            </table>
        </div>
        </div>
        </div> </div>
    <!-- Orders End -->


    <!-- Footer Start -->
    <?php
        include "include/footer.html";
    ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <!-- <script src="mail/contact.js"></script> -->

    <!-- Template Javascript -->
 <!-- <script src="js/main.js"></script> -->
</body>

</html>