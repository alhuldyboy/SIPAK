<?php
// Logout untuk sistem pakar penyakit kulit manusia
session_start();
session_destroy();
echo "<script>alert('Terima kasih, Anda Berhasil Logout dari Sistem Pakar Penyakit Kulit Manusia'); window.location='index.php';</script>";
?>