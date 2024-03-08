<?php 
 session_start();
  $_SESSION["logedin"] = "true";
  

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php
$pid=$_GET['pid'];

$servername="localhost";
$username="root";
$password="";
$dbName="clean_house";
$conn=new mysqli($servername,$username,$password,$dbName);
if($conn->connect_error)
{
	echo "<script>alert('your server is not connected');</script>";
}
	$sqlselect="select * from cart where id='$pid'";
	$result=$conn->query($sqlselect);

	while($row=$result->fetch_assoc())
	{
		$amount=$row["item_price"];
		$image=$row["item_image"];
		$pname=$row["Item_name"];
		

	}
	$sql="insert into order(username,item_name,item_price,item_img)values('',$pname','$amount','$image')";

	if($conn->query($sql))
	{
		echo "<script>alert('Your selected product is successfully added into cart');document.location.href='myorder.php';</script>";
	}
	else
	{
		echo "<script>alert('your product is not added into cart,please try again ');document.location.href='mycart.php';</script>";
	}




?>
</body>
</html>