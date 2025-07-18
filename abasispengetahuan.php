<?php
include "session.php";
if(isset($_POST['submit'])){
  $gejala_utama = mysqli_real_escape_string($konek_db, $_POST['gejala_utama']);
  $gejala_penunjang = mysqli_real_escape_string($konek_db, $_POST['gejala_penunjang']);
  $gejala_lainnya = mysqli_real_escape_string($konek_db, $_POST['gejala_lainnya']);
  $kondisi_khusus = mysqli_real_escape_string($konek_db, $_POST['kondisi_khusus']);
  // Contoh: Simpan ke tabel basispengetahuan (atau tabel lain sesuai struktur Anda)
  // Silakan sesuaikan field dan query berikut dengan struktur tabel Anda
  $query = "INSERT INTO basispengetahuan (gejala, namapenyakit) VALUES
    ('$gejala_utama', 'Gejala Utama'),
    ('$gejala_penunjang', 'Gejala Penunjang'),
    ('$gejala_lainnya', 'Gejala Lainnya'),
    ('$kondisi_khusus', 'Kondisi Khusus')";
  if(mysqli_query($konek_db, $query)){
    echo '<script>alert("Data berhasil disimpan!"); window.location="basispengetahuan.php";</script>';
    exit();
  } else {
    echo '<script>alert("Gagal menyimpan data!");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #fff;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="homeadmin.php">BERANDA</a></li>
        <li><a href="penyakit.php">NAMA PENYAKIT KULIT</a></li>
        <li><a href="gejala.php">GEJALA PENYAKIT KULIT</a></li>
        <li class="active"><a href="basispengetahuan.php">BASIS PENGETAHUAN PENYAKIT KULIT MANUSIA</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
          </div>
    <div class="col-sm-8 text-left"> 
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="text-center" style="margin:0;">BASIS PENGETAHUAN PENYAKIT KULIT MANUSIA</h3></div>
        <div class="panel-body">
          <form id="form2" name="form2" method="post" action="">
            <div class="panel panel-info">
              <div class="panel-heading">no Kode Penyakit&nbsp;&nbsp;&nbsp;Nama Penyakit&nbsp;&nbsp;&nbsp;Gejala&nbsp;&nbsp;&nbsp;Aksi</div>
              <div class="panel-body">
                <textarea class="form-control" name="gejala_utama" rows="3" placeholder="Masukkan gejala utama di sini"></textarea>
              </div>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">no Kode Penyakit&nbsp;&nbsp;&nbsp;Nama Penyakit&nbsp;&nbsp;&nbsp;Gejala&nbsp;&nbsp;&nbsp;Aksi</div>
              <div class="panel-body">
              </div>
            </div>
            <br><button type="submit" name ="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Daftar Basis Pengetahuan</div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Gejala</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($konek_db, "SELECT p.idpenyakit, p.namapenyakit, b.gejala FROM basispengetahuan b JOIN penyakit p ON b.namapenyakit = p.namapenyakit");
              while($data = mysqli_fetch_array($query)) {
                echo '<tr>';
                echo '<td>' . $no++ . '</td>';
                echo '<td>' . $data['idpenyakit'] . '</td>';
                echo '<td>' . $data['namapenyakit'] . '</td>';
                echo '<td>' . $data['gejala'] . '</td>';
                echo '<td><a href="adeletebasispengetahuan.php?id=' . $data['idpenyakit'] . '" onclick="return confirm(\'Yakin menghapus data ini?\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

<footer class="container-fluid text-center">
  <p>Sistem Pakar Diagnosa Penyakit Kulit Manusia</p>
</footer>

</body>
</html>
