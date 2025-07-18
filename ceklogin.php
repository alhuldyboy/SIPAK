<?php
include('koneksi.php');
session_start();
$username= $_POST['username'];
$password=$_POST['password'];
$error='';
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query = "SELECT * FROM user WHERE username='$username' and password='$password'";
$result = $konek_db->query($query) or die($konek_db->error.__LINE__);
if($result->num_rows > 0) {
    $_SESSION['login_user']=$username;
    header('location:homeadmin.php');
    exit();
} else {
    header('location:salahlogin.php');
    exit();
}
?>