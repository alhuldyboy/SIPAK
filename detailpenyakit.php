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
  <style>
.navbar-nav > .active > a,
.navbar-nav > .active > a:focus,
.navbar-nav > .active > a:hover {
  background-color: #222 !important;
  color: #fff !important;
}
</style>
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
        <li><a href="index.php">BERANDA</a></li>
        <li><a href="diagnosa.php">DIAGNOSA PENYAKIT KULIT</a></li>
        <li><a href="daftarpenyakit.php">DAFTAR PENYAKIT KULIT</a></li>
        <li><a href="about.php">ABOUT</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" id="myBtn"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
      <h2 class="text-center">DETAIL PENYAKIT</h2>
      <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">ID :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM penyakit where idpenyakit='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='idpenyakit' readonly value='".$data['idpenyakit']."'><br>";
                    }
                ?>
     		 </div>
        </div>	
        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">NAMA :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM penyakit where idpenyakit='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='namapenyakit' readonly value='".$data['namapenyakit']."'><br>";
                    }
                ?>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">JENIS :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM penyakit where idpenyakit='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='jenistanaman' readonly value='".(isset($data['jenistanaman']) ? $data['jenistanaman'] : '-')."'><br>";
                    }
                ?>
     		 </div>
        </div>	
        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">GEJALA :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM penyakit p, basispengetahuan b where p.idpenyakit='".$_GET['id']."' and p.namapenyakit=b.namapenyakit";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='jenistanaman' readonly value='".$data['gejala']."'><br>";
                    }
                echo "<input type='text'  class='form-control' id='jenistanaman' readonly value=''><br>";
                ?>
     		 </div>
        </div>	
         <div class="form-group" method="POST">
        <br><label class="control-label col-sm-2">PENANGANAN MEDIS :</label>
        <div class="col-sm-10">
          <?php
            $tampil = "SELECT * FROM penyakit WHERE idpenyakit='".$_GET['id']."'";
            $sql = mysqli_query($konek_db, $tampil);
            while($data = mysqli_fetch_array($sql)) {
              echo "<textarea class='form-control' rows='4' readonly>".(isset($data['penanganan']) ? $data['penanganan'] : '-')."</textarea><br>";
            }
          ?>
        </div>
      </div>
      <div class="form-group" method="POST">
        <br><label class="control-label col-sm-2">SARAN PENCEGAHAN :</label>
        <div class="col-sm-10">
          <?php
            $tampil = "SELECT * FROM penyakit WHERE idpenyakit='".$_GET['id']."'";
            $sql = mysqli_query($konek_db, $tampil);
            while($data = mysqli_fetch_array($sql)) {
              echo "<textarea class='form-control' rows='4' readonly>".(isset($data['pencegahan']) ? $data['pencegahan'] : '-')."</textarea><br>";
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
         <form role="form" method="post" action="ceklogin.php">
            <div class="form-group" method="post">
              <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" id="password" placeholder="Enter username">
            </div>
            <div class="form-group" method="post">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
              <button type="submit" id="submit" nama="submit" class="btn btn-primary btn-block" method="post"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
      </div>
    </div>
  </div> 
<footer class="container-fluid text-center">
  <p>Sistem Pakar Diagnosa Penyakit Kulit Manusia</p>
</footer>

</body>
</html>
