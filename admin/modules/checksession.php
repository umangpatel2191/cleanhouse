<?php
session_start();
if(isset($_SESSION['admin_login'])){
    $timeout = $_SESSION['admin_timeout'];
    $curentTime = time();
    if($curentTime > $timeout){
        session_destroy();
        header("location: login.php");
    }
}else{
    header("location: login.php");
}
?>