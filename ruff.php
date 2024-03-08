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

                        