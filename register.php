<?php
include('koneksi.php');
// Registrasi pengguna baru untuk sistem pakar penyakit kulit manusia
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($konek_db, $_POST['username']);
    $password = mysqli_real_escape_string($konek_db, $_POST['password']);
    $nama = mysqli_real_escape_string($konek_db, $_POST['nama']);
    // Cek username sudah ada atau belum
    $cek = mysqli_query($konek_db, "SELECT * FROM user WHERE username='$username'");
    if(mysqli_num_rows($cek) > 0){
        echo '<script>alert("Username sudah terdaftar!");</script>';
    } else {
        $query = "INSERT INTO user (username, password, nama) VALUES ('$username', '$password', '$nama')";
        if(mysqli_query($konek_db, $query)){
            echo '<script>alert("Registrasi berhasil! Silakan login ke Sistem Pakar Penyakit Kulit Manusia."); window.location="index.php";</script>';
        } else {
            echo '<script>alert("Registrasi gagal! Mohon coba lagi.");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registrasi Pengguna Baru | Sistem Pakar Penyakit Kulit Manusia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#fbe8d3;">
<div class="container" style="max-width:500px;margin-top:50px;">
  <div class="panel panel-primary">
    <div class="panel-heading text-center"><b>Registrasi Pengguna Baru</b></div>
    <div class="panel-body">
      <form method="post" action="">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
        <a href="index.php" class="btn btn-default btn-block">Kembali ke Login</a>
      </form>
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <p>Sistem Pakar Diagnosa Penyakit Kulit Manusia</p>
</footer>
</body>
</html>
