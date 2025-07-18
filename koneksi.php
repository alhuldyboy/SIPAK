<?php  
// Koneksi ke database untuk sistem pakar penyakit kulit manusia
$host = 'localhost';  
$user = 'root';        
$password = '';        
$database = 'sbp';    
    
$konek_db = mysqli_connect($host, $user, $password, $database);      
if (!$konek_db) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}
?>