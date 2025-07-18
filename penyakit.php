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
  <link rel="stylesheet" href="../css/style.css">
  <style>
    /* Paksa penggunaan variable warna kulit manusia jika root tidak terbaca karena path css */
    body {
      background-color: #fbe8d3 !important;
      color: #4b2e05 !important;
    }
    .navbar, .navbar-inverse {
      background-color: #e2b18c !important;
      border-color: #c68642 !important;
      color: #4b2e05 !important;
    }
    .navbar-inverse .navbar-nav > li > a,
    .navbar-inverse .navbar-brand {
      color: #4b2e05 !important;
    }
    .navbar-inverse .navbar-nav > .active > a,
    .navbar-inverse .navbar-nav > .active > a:focus,
    .navbar-inverse .navbar-nav > .active > a:hover {
      background-color: #c68642 !important;
      color: #fff !important;
    }
    .table > thead > tr > th {
      background-color: #f5c6a5 !important;
      color: #4b2e05 !important;
    }
    .table > tbody > tr > td {
      background-color: #fff8f3 !important;
      color: #4b2e05 !important;
    }
    .btn-default {
      background-color: #f5c6a5 !important;
      border-color: #e2b18c !important;
      color: #4b2e05 !important;
    }
    .btn-default:hover, .btn-default:focus {
      background-color: #e2b18c !important;
      border-color: #c68642 !important;
      color: #fff !important;
    }
    .sidenav {
      background-color: #f5c6a5 !important;
      color: #4b2e05 !important;
    }
    .box-body {
      background-color: #fbe8d3 !important;
    }
    footer {
      background-color: #8d5524 !important;
      color: #fff !important;
    }
  </style>
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
        <li class="active"><a href="penyakit.php">NAMA PENYAKIT KULIT</a></li>
        <li><a href="gejala.php">GEJALA PENYAKIT KULIT</a></li>
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
<a href="ainputpenyakit.php"><button type="button" class="btn btn-default">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</button></a>
        <br><br>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Bagian Kulit</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                     <?php
if(isset($_POST['bagiankulit']))
if($_POST['bagiankulit']!="Bagian Kulit"){	
$queri="Select * From penyakit where bagiankulit = \"".$_POST['bagiankulit']."\"";
$hasil=mysqli_query ($konek_db,$queri);   
$id = 0;
while ($data = mysqli_fetch_array ($hasil)){  
             $id++; 
             echo "      
                    <tr>  
                    <td>".$id."</td>
                    <td>".$data[0]."</td>  
                    <td>".$data[1]."</td>  
                    <td>".$data[2]."</td>  
                    <td><a href=\"adetailpenyakit.php?id=".$data[0]."\"><i class='glyphicon glyphicon-search'></i></a>"." || <a href=\"aeditpenyakit.php?id=".$data[0]."\"><i class='glyphicon glyphicon-pencil'></i></a>"." || <a href=\"adeletepenyakit.php?id=".$data[0]."\" onclick='return checkDelete()'><i class='glyphicon glyphicon-trash'></i></a>"."</td>
                </tr>   
            ";      
            }
}
 ?>  
</table><br><br><br><br><br>
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
