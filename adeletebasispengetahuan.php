<?php
include('koneksi.php');
// Hapus data basis pengetahuan penyakit kulit berdasarkan namapenyakit dan gejala
if(isset($_GET['id']) && isset($_GET['gejala'])){
    $namapenyakit = mysqli_real_escape_string($konek_db, $_GET['id']);
    $gejala = mysqli_real_escape_string($konek_db, $_GET['gejala']);
    $query = "DELETE FROM basispengetahuan WHERE namapenyakit='$namapenyakit' AND gejala='$gejala'";
    mysqli_query($konek_db, $query);
}
header("location:basispengetahuan.php");
?>