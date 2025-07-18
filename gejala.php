<?php
include('koneksi.php');
 
if(isset($_SESSION['login_user'])){
header("location: about.php");
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
        <li class="active"><a href="gejala.php">GEJALA PENYAKIT KULIT</a></li>
        <li><a href="basispengetahuan.php">BASIS PENGETAHUAN PENYAKIT KULIT MANUSIA</a></li>
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
<br>
<a href="ainputgejala.php"><button type="button" class="btn btn-default">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Gejala
</button></a>
        <br><br>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Gejala</th>
                            <th>Gejala</th>
                            <th>Bagian Kulit</th>
                            <th>Jenis Penyakit Kulit</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM gejala";
                    $hasil = mysqli_query($konek_db, $query);
                    $id = 0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $id++;
                        echo "<tr>\n";
                        echo "<td>".$id."</td>\n";
                        echo "<td>".$data['idgejala']."</td>\n";
                        echo "<td>".$data['gejala']."</td>\n";
                        echo "<td>".(isset($data['bagiankulit']) ? $data['bagiankulit'] : '-')."</td>\n";
                        echo "<td>".(isset($data['jeniskulit']) ? $data['jeniskulit'] : '-')."</td>\n";
                        echo "<td><a href='aeditgejala.php?id=".$data['idgejala']."'><i class='glyphicon glyphicon-pencil'></i></a> || <a href='adeletegejala.php?id=".$data['idgejala']."' onclick='return checkDelete()'><i class='glyphicon glyphicon-trash'></i></a></td>\n";
                        echo "</tr>\n";
                    }
                    ?>
                    </tbody>
                </table><br><br><br><br><br>
            </div>
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
