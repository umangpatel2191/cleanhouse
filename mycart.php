<?php 
 session_start();
if(isset($_SESSION['username'])==null)
{
    echo "<script>alert('You have to login first');document.location.href='login.php';</script>";
}
else{
	$uid = $_SESSION['username'];
}
?>
<?php include 'conn.php'?>
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

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <?php
    include "include/header.html";
    ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-5 pb-2 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Cart</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="index.php">Home</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white disabled" href="pricing.php">Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Your Cart Items</h6>
            <!-- <h1 class="display-4 text-center mb-5">The Best Price</h1> -->
            <div class="row">
                <?php
                    $sql = "SELECT * FROM cart WHERE username='$uid'";
                    $result = $conn->query($sql);
                    $price = 0; 
                    
                    if ($result->num_rows > 0) {
                    // output data of each row
                    $price = 0;
                    while($row = $result->fetch_assoc()) {
                        $price+=$row["item_price"];

                        echo '<div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <style>
                            #round_img_'.$row["id"].'{
                                background-image: url("uploads/'.$row["item_image"].'");
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
                            <h5 class="" style="color:black; font-weight:bold !important; ">'.$row["Item_name"].'</h5>
                            <h1 class="display-4 mb-0" style="color:black;">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>'.$row["item_price"].'<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ pcs</small>
                            </h1>
                        </div><br/>
                       
                        <a href="modules/removecart.php?pid='.$row['id'].'" class="btn btn-secondary py-2 px-4">Remove</a>

                    </div>
                </div>';
                    }
                    // echo "$price";
                    }else{
                        echo "zero items in your cart!";
                    }
                ?>

               
            </div>
            <a href="pricing.php"  class="btn btn-secondary " >Add More Service</a>
                <form method="post" action="myorder.php" style="margin-left: 200px; margin-top: -37px;" >
                        <input type="hidden" name="price" value="<?php echo $price ?>" > </input>
                        <?php if($price != 0){echo '<input type="submit"  class="btn btn-secondary"   name="submit" value="Place Order"></input>';} ?>
                </form>
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