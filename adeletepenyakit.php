<?php
include('koneksi.php');
// Hapus data penyakit kulit berdasarkan idpenyakit
if(isset($_GET['id']) && $_GET['id'] != ''){
    $id = mysqli_real_escape_string($konek_db, $_GET['id']);
    $query = "DELETE FROM penyakit WHERE idpenyakit='$id'";
    mysqli_query($konek_db, $query);
}
header("location:hamadanpenyakit.php");
?>