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
        <li class="active"><a href="index.php">BERANDA</a></li>
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
      <center><h2>SISTEM PAKAR DIAGNOSA PENYAKIT KULIT MANUSIA
      </h2></center><br>
        <div class="panel panel-info">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <p align="justify">
                      Kulit manusia merupakan organ terbesar yang memiliki peran penting dalam melindungi tubuh dari berbagai ancaman eksternal, seperti bakteri, virus, dan zat berbahaya lainnya. Selain sebagai pelindung, kulit juga berfungsi dalam mengatur suhu tubuh, mengeluarkan zat sisa melalui keringat, serta sebagai indera peraba yang sangat sensitif. Namun, kulit juga rentan terhadap berbagai penyakit dan gangguan yang dapat memengaruhi kesehatan serta kenyamanan seseorang. Melalui sistem pakar ini, diharapkan dapat membantu masyarakat dalam mengenali dan mendiagnosa penyakit kulit secara dini, sehingga penanganan yang tepat dapat segera dilakukan. Semoga sistem ini dapat menjadi sarana edukasi dan konsultasi yang bermanfaat bagi semua pengguna.
                    </p>
            </div>
        </div>
      
    </div>
  </div>
</div>
  <!-- Modal -->
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
              <input type="text" class="form-control" name="username" placeholder="Enter username">
            </div>
            <div class="form-group" method="post">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block" method="post"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
          <hr>
          <div class="text-center">
            <a href="#" id="showRegister">Belum punya akun? Register di sini</a>
          </div>
          <form id="registerForm" method="post" action="register.php" style="display:none; margin-top:20px;">
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
            <button type="submit" name="submit" class="btn btn-success btn-block">Register</button>
            <a href="#" id="showLogin" class="btn btn-default btn-block">Kembali ke Login</a>
          </form>
        </div>
      </div>
        
        
   
        
    </div>
  </div> 

<footer class="container-fluid text-center">
  <p>Izza not Izzy</p>
</footer>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
    $("#showRegister").click(function(e){
        e.preventDefault();
        $("form[role='form']").hide();
        $("#registerForm").show();
        $(this).hide();
    });
    $("#showLogin").click(function(e){
        e.preventDefault();
        $("#registerForm").hide();
        $("form[role='form']").show();
        $("#showRegister").show();
    });
});
</script>

</body>
</html>
