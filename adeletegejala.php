<?php
include('koneksi.php');
// Hapus data gejala penyakit kulit berdasarkan idgejala
if(isset($_GET['id']) && $_GET['id'] != ''){
    $id = mysqli_real_escape_string($konek_db, $_GET['id']);
    $query = "DELETE FROM gejala WHERE idgejala='$id'";
    mysqli_query($konek_db, $query);
}
header("location:gejala.php");
?>