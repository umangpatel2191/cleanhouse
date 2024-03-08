<?php 
 session_start();
if(isset($_SESSION['username'])!=null)
{
	$uname = $_SESSION['username'];
	$uid = $_SESSION['id'];
}
?>
<?php include 'conn.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CleanHouse-pricing page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
                        <a href="pricing.php" class="nav-item nav-link active">Price List</a>
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
                    <h1 class="mb-4 mb-md-0 text-white">Pricing Plan</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="index.php">Home</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white disabled" href="pricing.php">Price List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Our Pricing Plan</h6>
            <h1 class="display-4 text-center mb-5">The Best Price</h1>
            <div class="row">
                <?php
                    $sql = "SELECT * FROM items ORDER BY ID DESC";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {


                        echo '<div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <style>
                            #round_img_'.$row["id"].'{
                                background-image: url("uploads/'.$row["item_img"].'");
                                background-size: contain;
                                opacity: 0.5;
                                background-color: #0000004a !important;
                                background-blend-mode: multiply;
                                background-repeat: no-repeat;
                                background-position-x: center;
                                background-position-y: center;
                            }
                        </style>
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-secondary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;" id="round_img_'.$row["id"].'">
                            <h5 class="" style="color:black; font-weight:bold !important; ">'.$row["item_name"].'</h5>
                            <h1 class="display-4 mb-0" style="color:black;">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>'.$row["price_per_kg"].'<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/pcs</small>
                            </h1>
                        </div><br/>
                        <a href="modules/addtocart.php?pid='.$row['id'].' " class="btn btn-secondary py-2 px-4">Add To Cart</a>
                    </div>
                </div>';
                    }
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->


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
    <script src="mail/contact.js"></script>

   
</body>

</html>