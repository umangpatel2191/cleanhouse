<?php 
 session_start();
if(isset($_SESSION['username'])!=null)
{
	$uname = $_SESSION['username'];
	$uid = $_SESSION['id'];
}
?>
<?php include 'conn.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CleanHouse-homepage</title>
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
                        <a href="index.php" class="nav-item nav-link active">Home</a>
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

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Laundry & Dry Cleaning</h4>
                            <h1 class="display-3 text-white mb-md-4">Best For Laundry Services</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Laundry & Dry Cleaning</h4>
                            <h1 class="display-3 text-white mb-md-4">Highly Professional Staff</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-secondary" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Contact Info Start -->
    <div class="container-fluid contact-info mt-5 mb-4">
        <div class="container" style="padding: 0 30px;">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex">
                        <i class="fa fa-2x fa-map-marker-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Our Location</h5>
                            <p class="m-0 text-white">14,Drive-In rd,opp T.V. tower, thaltej,Ahemdabad,Gujarat.-380052.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-primary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-envelope text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Email Us</h5>
                            <p class="m-0 text-white">t.kvachheta@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-phone-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Call Us</h5>
                            <p class="m-0 text-white">+91 95588 47791</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-0 pt-lg-4">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid" src="img/about.jpg" alt="">
                </div>
                <div class="col-lg-7 mt-5 mt-lg-0 pl-lg-5">
                    <h6 class="text-secondary text-uppercase font-weight-medium mb-3">Learn About Us</h6>
                    <h1 class="mb-4">We Are Quality Laundry Provider In Your City</h1>
                    <h5 class="font-weight-medium font-italic mb-4"> Drop the dirty clothes here, and spend the day without worry.</h5>
                    <p class="mb-2">Clean House provides premium washing and dry cleaning service. We pick up your dirty duds from your doorstep and deliver fresh, clean clothes back at your doorstep. Clean House provides affordable and convenient way of getting your wash, laundry and dryclean done with prime quality. Our instant pickup at a slot chosen by you with a turnaround time of 48 hours provides you laundry and dry cleaning with best quality. 
                    </p>
                    <div class="row">
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">Quality Laundry Service</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">Express Fast Delivery</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">Highly Professional Staff</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">100% Satisfaction Guarantee</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Services Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Our Services</h6>
            <h1 class="display-4 text-center mb-5">What We Offer</h1>
            <div class="row">
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <!-- <div class="d-inline-flex align-items-center justify-content-center bg-white shadow rounded-circle mb-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-3x fa-cloud-sun text-secondary"></i>
                        </div> --><img src="img/drycleaning.png"  style="border-radius: 50%; height: 150px; width: 150px;">
                        <h4 class="font-weight-bold m-0">Dry Cleaning</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <img src="img/petrol.png"  style="border-radius: 50%; height: 150px; width: 250px;">
                        <h4 class="font-weight-bold m-0">Petrol Washing</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <img src="img/ironing.jpg"  style="border-radius: 50%; height: 150px; width: 150px;">
                        <h4 class="font-weight-bold m-0">Ironing</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <img src="img/accessories.jpg"  style="border-radius: 50%; height: 150px; width: 150px;">
                        <h4 class="font-weight-bold m-0">Accessories</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Features Start -->
    <div id="why" class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-0 my-lg-5 pt-0 pt-lg-5 pr-lg-5">
                    <h6 class="text-secondary text-uppercase font-weight-medium mb-3">Our Features</h6>
                    <h1 class="mb-4">Why Choose Us</h1>
                    <p>We are professionals in the laundry and dry cleaning business, which means we always stay up to date on the latest technologies, cleaning methods, and solutions for dealing with stains or delicate fabrics. Plus, we maintain the highest standards of business integrity by following local and national regulations and environmental safety rules. We are passionate about changing the way you think about laundry !</p>
                    <div class="row">
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">10</h1>
                            <h5 class="font-weight-bold">Years Expereince</h5>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">250</h1>
                            <h5 class="font-weight-bold">Expert Worker</h5>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">1250</h1>
                            <h5 class="font-weight-bold">Happy Clients</h5>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <h1 class="text-secondary" data-toggle="counter-up">9550</h1>
                            <h5 class="font-weight-bold">Dry Cleaning</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex flex-column align-items-center justify-content-center bg-secondary h-100 py-5 px-3">
                        <i class="fa fa-5x fa-certificate text-white mb-5"></i>
                        <h1 class="display-1 text-white mb-3">10+</h1>
                        <h1 class="text-white m-0">Years Experience</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Working Process Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Working Process</h6>
            <h1 class="display-4 text-center mb-5">How We Work</h1>
            <div class="row">
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <img src="img/schedule2.png"  style="border-radius: 50%; height: 150px; width: 150px;">
                        <h4 class="font-weight-bold m-0">Schedule</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <img src="img/freepickup.png"  style="border-radius: 50%; height: 150px; width: 150px;">
                        <h4 class="font-weight-bold m-0">Free Pickup</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <img src="img/processing.png"  style="border-radius: 50%; height: 150px; width: 150px;">
                        <h4 class="font-weight-bold m-0">Process</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pb-1">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4" style="height: 300px;">
                        <img src="img/freeshipping.png"  style="border-radius: 50%; height: 150px; width: 150px;">
                        <h4 class="font-weight-bold m-0">Free Shipping</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Working Process End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Our Pricing Plan</h6>
            <h1 class="display-4 text-center mb-5">The Best Price</h1>
            <div class="row">
                <?php
                    $sql = "SELECT * FROM items ORDER BY ID DESC LIMIT 3";
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
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>'.$row["price_per_kg"].'<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ pcs</small>
                            </h1>
                        </div>
                        <a href="pricing.php" class="btn btn-secondary py-2 px-4">Book Your Laundry</a>
                    </div>
                </div>';
                    }
                    }
                ?>
            </div>
            <a href="pricing.php"><button style="float:right" class="btn btn-secondary py-2 px-4">Show more</button></a>
        </div>
    </div>
    <!-- Pricing Plan End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Testimonial</h6>
            <h1 class="display-4 text-center mb-5">Our Clients Say</h1>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item">
                    <img class="position-relative rounded-circle bg-white shadow mx-auto" src="img/testimonial-1.jpg" style="width: 100px; height: 100px; padding: 12px; margin-bottom: -50px; z-index: 1;" alt="">
                    <div class="bg-light text-center p-4 pt-0">
                        <h5 class="font-weight-medium mt-5">John milton</h5>
                        <p class="text-muted font-italic">School teacher</p>
                        <p class="m-0">Clean-House turned around my order in less than 24 hours, and it was so easy to get it picked up and dropped off to my hotel, Thanks so much.</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img class="position-relative rounded-circle bg-white shadow mx-auto" src="img/testimonial-2.jpg" style="width: 100px; height: 100px; padding: 12px; margin-bottom: -50px; z-index: 1;" alt="">
                    <div class="bg-light text-center p-4 pt-0">
                        <h5 class="font-weight-medium mt-5">Milie carter</h5>
                        <p class="text-muted font-italic">Cheif</p>
                        <p class="m-0">Clean-House saved us when our washer and dryer broke down. They are prompt, friendly, and the clothes always come back perfect. 5 stars for sure!</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img class="position-relative rounded-circle bg-white shadow mx-auto" src="img/testimonial-3.jpg" style="width: 100px; height: 100px; padding: 12px; margin-bottom: -50px; z-index: 1;" alt="">
                    <div class="bg-light text-center p-4 pt-0">
                        <h5 class="font-weight-medium mt-5">Tom davis</h5>
                        <p class="text-muted font-italic">Real Estate</p>
                        <p class="m-0">We love that we can schedule our pick-ups and deliveries at our convenience, so we are never left guessing. Thank you so much!</p>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img class="position-relative rounded-circle bg-white shadow mx-auto" src="img/testimonial-4.jpg" style="width: 100px; height: 100px; padding: 12px; margin-bottom: -50px; z-index: 1;" alt="">
                    <div class="bg-light text-center p-4 pt-0">
                        <h5 class="font-weight-medium mt-5">jenny willioms</h5>
                        <p class="text-muted font-italic">student</p>
                        <p class="m-0">Excellent service! Very professional! Laundry picked up and delivered promptly. Very happy with this service! Thank you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
   
    <!-- Footer End -->
    <?php
        include "include/footer.html";
    ?>

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>