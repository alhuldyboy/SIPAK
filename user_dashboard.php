<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
    header('location: index.php');
    exit();
}
// Cek role user, jika admin redirect ke halaman admin
if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
    header('location: homeadmin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Sistem Pakar Penyakit Kulit</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="user_dashboard.php">Beranda</a></li>
      <li><a href="diagnosa.php">Diagnosa</a></li>
      <li><a href="daftarpenyakit.php">Daftar Penyakit</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <h2 class="text-center">Selamat Datang, <?php echo htmlspecialchars($_SESSION['login_user']); ?>!</h2>
  <p class="text-center">Anda hanya dapat melakukan pencarian diagnosa dan melihat hasilnya. Untuk menambah, mengedit, atau menghapus data hanya dapat dilakukan oleh admin.</p>
  <div class="panel panel-default">
    <div class="panel-heading">Riwayat Diagnosa Anda</div>
    <div class="panel-body">
      <p>Silakan gunakan menu <b>Diagnosa</b> untuk melakukan pencarian penyakit kulit berdasarkan gejala yang Anda alami.</p>
      <!-- Jika ingin menampilkan riwayat diagnosa user, tambahkan query di sini -->
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <p>Sistem Pakar Diagnosa Penyakit Kulit Manusia</p>
</footer>
</body>
</html>
