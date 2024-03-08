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
	echo "<script>alert('sorry,your database server is not connected');</script>";

}
$sql="delete  from items where id='$pid'";
if($conn->query($sql)==true)
{
	echo "<script>alert('Product is deleted successfully!!');document.location.href='../add_laundry.php';</script>";
}
else
{
	echo "<script>alert('Product is not deleted,plaese try again');document.location.href='../add_laundry.php';</script>";
}
?>
?>
</body>
</html>