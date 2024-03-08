<?php
    session_start();
    $uid = $_SESSION['username'];
    $email = $_SESSION['email'];
?>
<?php
    if(isset($_POST['submit']))
    {
        if(isset($_POST['price']))
        {
           $price=$_POST['price'];
        }
        else{
            echo "internal error";
            die();
        }
    }
?>
<?php include 'conn.php'?>

<?php
// if(isset($_POST["checkoutSubmit"])){
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];
//     $price_1 = $_POST['total'];
//     $price = $_POST['total'];
    
//     $sql = "INSERT INTO `order` (`username`, `email`, `phone`, `address`, `total`) VALUES ( '$username', '$email', '$phone', '$address', '$price_1');";
    
//     if($conn->query($sql)==TRUE)
//     {
//          echo "<script>alert('Order Placed successfully');document.location.href='payment.php';</script>";
        
//     }else{
//         echo $conn->error;
//     }
// }
//else{
   // echo "404";
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout - PHP Shopping Cart Tutorial</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
</head>
<body>
    
<div class="container">
    <h1>CHECKOUT</h1>
    <div class="col-12">
        <div class="checkout">
            <div class="row">
               
                <!-- <div class="col-md-12">
                    <div class="alert alert-success"></div>
                </div>
            
                <div class="col-md-12">
                    <div class="alert alert-danger"></div>
                </div> -->
              
				
                
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Contact Details</h4>
                    <form method="post" action="checkout/index.php">
                        
                            <div class="mb-3">
                                <label for="first_name">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $uid ?>" readonly>
                            </div>
                          
                        
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone No</label>
                            <input type="text" class="form-control" name="phone" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Address</label>
                            <input type="text" class="form-control" name="address" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Total Amount</label>
                            <input type="text" class="form-control" name="total" value="<?php echo $price ?>" required>
                        </div>
                        
                        <!-- <input type="hidden" name="price-1" value="<?php echo $price ?>"/> -->
                      <input class="btn btn-success btn-block" style="background-color: #46C6CE;" type="submit" name="submit" value="Place Order">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>