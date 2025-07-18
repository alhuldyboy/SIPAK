<?php
include "session.php";
// Cek apakah user login sebagai admin
$is_admin = isset($_SESSION['login_user']) && $_SESSION['login_user'] == 'admin';
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
<script>
$(document).ready( function () {
    $('#example1').DataTable();  
} );
</script>
</head>
<body>

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
      <?php if($is_admin): ?>
      <a href="abasispengetahuan.php"><button type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      </button></a>
      <?php endif; ?>
      <br><br>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Penyakit</th>
              <th>Nama Penyakit</th>
              <th>Gejala</th>
              <?php if($is_admin): ?><th>Aksi</th><?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $hasil = mysqli_query($konek_db, "SELECT * FROM basispengetahuan");
            while ($data = mysqli_fetch_array($hasil)) {
              echo "<tr>";
              echo "<td>" . $no++ . "</td>";
              echo "<td>" . $data['namapenyakit'] . "</td>";
              echo "<td>" . $data['gejala'] . "</td>";
              if($is_admin) {
                echo "<td><a href=\"adeletebasispengetahuan.php?id=".$data['namapenyakit']."\" onclick='return checkDelete()'><i class='glyphicon glyphicon-trash'></i></a></td>";
              }
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
  </div>
</div>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Yakin menghapus data ini?');
}
</script>
    
<footer class="container-fluid text-center">
  <p>Sistem Pakar Diagnosa Penyakit Kulit Manusia</p>
</footer>

</body>
</html>
