<?php 
 session_start();
//   $_SESSION['uid'] = $uid;
	$uid = $_SESSION['username'];
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
	$sqlselect="select * from items where id='$pid'";
	$result=$conn->query($sqlselect);

	while($row=$result->fetch_assoc())
	{
		$amount=$row["price_per_kg"];
		$image=$row["item_img"];
		$pname=$row["item_name"];
		

	}
	$sql="insert into cart(username,item_name,item_price,item_image)values('$uid','$pname','$amount','$image')";

	if($conn->query($sql))
	{
		echo "<script>alert('Your selected product is successfully added into cart');document.location.href='../pricing.php';</script>";
	}
	else
	{
		echo $conn->error();
		echo "<script>alert('your product is not added into cart,please try again ');document.location.href='addtocart.php';</script>";
	}




?>
</body>
</html>