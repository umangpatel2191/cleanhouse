<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
$id=$_GET['uid'];
$servername="localhost";
$username="root";
$password="";
$dbName="clean_house";
$conn=new mysqli($servername,$username,$password,$dbName);
if($conn->connect_error)
{
	echo "<script>alert('sorry,your database server is not connected');</script>";

}
$sql="DELETE FROM `users` WHERE  id='$id'";
if($conn->query($sql)==true)
{
	echo "<script>alert('Your profile is deleted!!');document.location.href='logout.php';</script>";
}
else
{
	echo "<script>alert(' something went wrong,plaese try again');document.location.href='logout.php';</script>";
}
?>
?>
</body>
</html>