<?php
include '../conn.php';

if(isset($_POST["email"])){
    $username = $_POST["email"];
    // $row = 
}
if(isset($_POST["password"])){
    $password = $_POST["password"];
    $password = md5($password);
}

$sql = "select * from users where (username='$username' OR email='$username') AND password='$password'";

$res = mysqli_query($conn, $sql);
$success = false;
if (mysqli_num_rows($res) > 0) {
    $success = true;
    
    $sql = "select * from users where username='$username' OR email='$username'";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
    $uid = $row['id'];
    $fullName = $row['name'];
    $username = $row['username'];
    $email = $row['email'];

    session_start();
    $_SESSION["logedin"] = "true";
    $_SESSION['id'] = $uid;
    $_SESSION["fullname"] = $fullName;
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    $_SESSION["timeout"] = time() + 60 * 60 * 24 * 30;
}else{
    $success = false;
}
$data["success"] = $success;
echo json_encode($data);
?>