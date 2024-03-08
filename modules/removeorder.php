<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
$id=$_GET['oid'];
$servername="localhost";
$username="root";
$password="";
$dbName="clean_house";
$conn=new mysqli($servername,$username,$password,$dbName);
if($conn->connect_error)
{
	echo "<script>alert('sorry,your database server is not connected');</script>";

}
$sql="DELETE FROM `order` WHERE  order_id='$id'";
if($conn->query($sql)==true)
{
	echo "<script>alert('order is removed successfully!!');document.location.href='../profile.php';</script>";
}
else
{
	echo "<script>alert(' order is not deleted,plaese try again');document.location.href='../profile.php';</script>";
}
?>
?>
</body>
</html>