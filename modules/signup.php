<?php
include '../conn.php';

$address = $_POST["address"];
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password = md5($password);
$pincode = $_POST["pincode"];
$phone_no = $_POST["phone-number"];

$save = true;
$emailExist = false;
$usernameExist = false;
$phoneNoExist = false;
$sql = "select * from users where username='$username'";

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    $usernameExist = true;
}

$sql = "select * from users where email='$email'";

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    $emailExist = true;
}

$sql = "select * from users where phone_no='$phone_no'";

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    $phoneNoExist = true;
}
if($phoneNoExist || $emailExist || $usernameExist){
    $save = false;
}
$register = false;
$error = false;
if($save){
    $sql = "INSERT INTO users (name, username, email, phone_no, password, address, pincode)
    VALUES ('$name', '$username', '$email', '$phone_no', '$password', '$address', '$pincode')";
    
    if ($conn->query($sql) === TRUE) {
      $register = true;
    } else {
      $error = true;
    }
}
$data["register"] = $register;
$data["error"] = $error;
$data["emailExist"] = $emailExist;
$data["usernameExist"] = $usernameExist;
$data["phoneNoExist"] = $phoneNoExist;

echo json_encode($data);
?>