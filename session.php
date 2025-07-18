<?php
include "koneksi.php";
session_start();
if(!isset($_SESSION['login_user'])){
    // Jika belum login, redirect ke index
    header("location: index.php");
    exit();
}
$user_check = $_SESSION['login_user'];
$sql = "select * from user where username='$user_check'";
$ses = mysqli_query($konek_db, $sql);
$row = mysqli_fetch_assoc($ses);
$login_session = $row['nama'];

?>