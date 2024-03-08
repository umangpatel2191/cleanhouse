<?php
include '../../conn.php';

$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);


$sql = "select * from admins where (username='$username' OR email='$username') AND password='$password'";

$res = mysqli_query($conn, $sql);
$success = false;
if (mysqli_num_rows($res) > 0) {
    $success = true;
    
    $sql = "select * from admins where username='$username' OR email='$username'";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
    $fullName = $row['name'];
    $username = $row['username'];
    $email = $row['email'];

    session_start();
    $_SESSION["admin_login"] = "true";
    $_SESSION["admin_fullname"] = $fullName;
    $_SESSION["admin_username"] = $username;
    $_SESSION["admin_email"] = $email;
    $_SESSION["admin_timeout"] = time() + 60 * 60 * 24;
}else{
    $success = false;
}
$data["success"] = $success;
echo json_encode($data);
?>